<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

use App\Mail\AssignTicketMail;
use App\Mail\CreatedTicketMail;
use App\Models\Consultant;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Module;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Pusher\Pusher;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Musonza\Chat\Traits\Messageable;
use App\Models\Message;
use Illuminate\Support\Facades\Response;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::latest()->get();
        return view('dashboard.consultant.ticket.ticket',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $consultants = Consultant::latest()->get();

       	$consultantfiles = [];
        $userfiles = [];

        $userdirectory = public_path('screenshots/'.$ticket->id.'/user');

        $consultantdirectory = public_path('screenshots/'.$ticket->id.'/consultant');

        if(File::exists($userdirectory)) {
            $userfiles = File::allFiles($userdirectory);
        }


        if(File::exists($consultantdirectory)) {
            $consultantfiles = File::allFiles($consultantdirectory);
        }

        $values = DB::select("select count(is_read) as unread from messages where is_read = 0 and messages.to = '".Auth::guard()->user()->name."' and ticket = '".$ticket->id."' group by ticket");

        return view('dashboard.consultant.ticket.show', compact('ticket','consultants','values','userfiles','consultantfiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $ticket->status = value('4');
        $ticket->completedat = value(Carbon::now());
        $ticket->save();

        Alert::success('Success', 'Ticket Updated Successfully')->autoClose(1500);

        return redirect()->route("consultant.ticket");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {

//        if(request ('request') !=''){
//            $ticket->status = value('7');
//            $ticket->date_time_input_request = value(Carbon::now());
//            if (request("ctime") != ""){
//                $ticket->change_time = request("ctime");
//            }
//        }
//
//        if (request ('request1') =='request1'){
//            $ticket->status = value('3');
//        }

        if(request ('uinput') == 'uinput'){
            $ticket->status = value("7");
            $ticket->WUI = value("tick");
        }


        /*this is for chnage time checkbox function*/
        if (request ('ctime') != ''){
            $ticket->type = value('Change');
            $ticket->time_app_status = value('Request');
            $ticket->status = value('7');
//            if (request ('ctime') !=''){
                $ticket->change_time = request ('ctime');
//            }
            $ticket->date_time_input_request = value(Carbon::now());

        }
        if (request("close_status") != ""){
            $ticket->close_status = request("close_status");
        }else{
            $ticket->close_status = '';
        }

//        if (request ('ctime') == ''){
//            $ticket->status = value('3');
//        }
        /*this is for chnage time checkbox function*/

        if ($ticket->status == ('3') ){

                $ticket -> reassign = value(Carbon::now());
//                $ticket -> status =value ('2');
//                $ticket->responsible = request("responsible");
                if(request("responsible") !=""){
                $ticket->responsible = request("responsible");

                    if (request("responsible") != Auth::guard('consultant')->user()->name ){

                        $query1 = Consultant::where('name',request("responsible"))->value('department');

                        $ticket->modulename = value($query1);

                        $ticket->assignedto = value("");
                        $ticket->status = value("2");
                    }
                    else{
                        $ticket->assignedto =request("responsible");
                        $ticket->status = value("3");
                    }
                 }

                if (request("severity") !=""){
                    $ticket->severity = request("severity");
                }
                if (request("level") !=""){
                    $ticket->level = request("level");
                }

                if(request("type") !=""){
                    $ticket->type = request("type");
//                    if (request("ctime") != ""){
//                        $ticket->change_time = request("ctime");
//                    }
                }
//                else
//                {
//                    $ticket->type = value("Change");
//                    if (request("ctime") != ""){
//                        $ticket->change_time = request("ctime");
//                    }
//                    $ticket->date_time_input_request = value(Carbon::now());
//                    $ticket->status = value("7");
//                }
//            $ticket->close_status = request("close_status");

        }

        else{
//
//            $request->validate([
//                'assigned1'=>'required',
//            ]);

            if($ticket->status == '2'){
                $ticket->responsible = request("responsible");
                $ticket->acceptedat = value(Carbon::now());
                $ticket->status = ('3');
                $ticket->assignedto =request("responsible");
            }

            if($ticket->status == '1'){
                $ticket->assignedto = value(Auth::guard('consultant')->user()->name);
                $ticket->responsible = request("responsible");
                $ticket->assignedat = value(Carbon::now());
                $ticket->acceptedat = value(Carbon::now());
                $ticket->status = ('3');

                try{
                    $to = DB::table('consultants')->select('email')->where('name','=',Auth::guard('consultant')->user()->name)->first();

                    $details = [
                        'title' => 'Ticket '.$ticket->id.' has been assigned to you ',
                        'topic'  => 'Ticket details and Login With Link : http://itsm.saiteck.in',
                        
                        'type'  =>  'Ticket Type : '.$ticket->type,
                        'summary'=> 'Ticket Summary : '.$ticket->summary,
                        'level'  => 'Ticket Level : '.$ticket->level,
                        'responsible' => 'Responsible : '.$ticket->responsible,
                        'severity' => 'Ticket Severity : '.$ticket->severity
                        
                        
                        
                        
                    ];

                    Mail::to($to->email)->send(new AssignTicketMail($details));
                }
                catch (\Exception $e) {

                    $Dataa = "Status";
                }



            }
               if (request ('uinput') == ''){
            $ticket->status = value("3");
            $ticket->WUI = value("");
        }
        }

        $ticket->save();

        Alert::success('Success', 'Ticket Updated Successfully')->autoClose(1500);

        return redirect()->route("consultant.ticket");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
    /*meassege send get*/
    public function getMessage($ticket, Request $request)
    {
        $sender = request('sender');
        $receiver = request('receiver');

        Message::where(['from'=>$sender,'to'=>$receiver])->update(['is_read'=>1]);

        $messages = Message::where(function ($query) use ($sender,$receiver,$ticket){
            $query->where('from',$sender)->where('ticket',$ticket);
        })->orWhere(function ($query) use ($sender,$receiver,$ticket){
            $query->where('to',$sender)->where('ticket',$ticket);
        })->get();

        return $messages;
    }

    public function sendMessage(Request $request){
        $sender = request('sender');
        $receiver = request('receiver');
        $ticket = request('ticket');
        $message = request('message');

        $data = new Message();
        $data->from = $sender;
        $data->to = $receiver;
        $data->ticket = $ticket;
        $data->message = $message;
        $data->is_read = 0;

        $data->save();

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $sender,'to' => $receiver,'ticket' => $ticket];
        $pusher->trigger('my-channel','my-event',$data);
    }
    /*meassege send get*/
  public function getFile($ticket,$filename)
    {
        $userdirectory = public_path('screenshots/'.$ticket.'/consultant/'.$filename);

        if(File::exists($userdirectory)) {
            $type = File::mimeType(public_path('screenshots/'.$ticket.'/consultant/'.$filename));
            $headers =[
                'Content-Description' => 'File Transfer',
                'Content-Type' => $type,
            ];
            return Response::download(public_path('screenshots/'.$ticket.'/consultant/'.$filename),$filename, $headers);
        }else{
            $type = File::mimeType(public_path('screenshots/'.$ticket.'/user/'.$filename));
            $headers =[
                'Content-Description' => 'File Transfer',
                'Content-Type' => $type,
            ];
            return Response::download(public_path('screenshots/'.$ticket.'/user/'.$filename),$filename, $headers);
        }
    }

    public function uploadedFile($ticket)
    {
        $userdirectory = public_path('screenshots/'.$ticket.'/consultant');
        $userfiles = File::allFiles($userdirectory);

        $filenamearray = [];

        foreach ($userfiles as $userfile){
            $filename = basename($userfile);
            array_push($filenamearray,$filename);
        }

        return $filenamearray;
    }

    public function fileupload($ticket,Request $request)
    {
        if($request->hasFile('file')) {
            $image = $request->file('file');

            $image_name = time().$image->getClientOriginalName();

            $image->move(public_path('screenshots/'.$ticket.'/consultant'), $image_name);
        }
    }
}
