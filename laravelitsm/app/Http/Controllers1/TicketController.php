<?php

namespace App\Http\Controllers;

use App\Mail\CloseTicketMail;
use App\Mail\CreatedTicketMail;
use App\Models\Ticket;
use App\Models\Consultant;
use App\Models\User_assign_project;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Pusher\Pusher;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use App\Models\Message;
use App\Models\Module;
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
        $ticketss = Ticket::where('created_by', Auth::guard()->user()->name)
            ->get();
        $messages = Message::where('to', Auth::guard()->user()->name)
            ->where('is_read','0')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->unique('ticket');
        $msgcount = count($messages);
        $tktcount = count($ticketss);
        return view('ticket.ticket',compact('tickets','msgcount','tktcount','ticketss','messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultants = Consultant::latest()->get();
        $modules = Module::latest()->get();
        $user_assign_projects = User_assign_project::latest()->where("email", "=", Auth::guard()->user()->email)->get();

        $ticketss = Ticket::where('created_by', Auth::guard()->user()->name)
            ->get();
        $messages = Message::where('to', Auth::guard()->user()->name)
            ->where('is_read','0')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->unique('ticket');
        $msgcount = count($messages);
        $tktcount = count($ticketss);

        return view('ticket.create',compact('consultants','ticketss','messages','msgcount','tktcount','modules','user_assign_projects'));
    }
    public function getModule($module)
    {

        $consultants = Consultant::where(function ($query) use ($module){
            $query->where('department',$module);
        })->get();

        return $consultants;
    }
    public function report()
    {
        $tickets = Ticket::latest()->where('created_by', Auth::guard()->user()->name)-> get();
        $projects = Project::latest()->get();
        $modules = Module::latest()->get();
        $users = User::latest()->get();
        $consultants = Consultant::latest()->get();

        $messages = Message::where('to', Auth::guard()->user()->name)
            ->where('is_read','0')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->unique('ticket');
        $msgcount = count($messages);
        $ticketss = Ticket::where('created_by', Auth::guard()->user()->name)
            ->get();
        $tktcount = count($ticketss);
        return view('report.report',compact('tickets','tktcount','messages','projects','modules','users','consultants'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       public function store(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'summary'=>'required',
            'description'=>'required',
            'level'=>'required',
            'responsible'=>'required',
            'modulename'=>'required',
            'severity'=>'required',
            'select_project'=>'required',
            'profile_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileformat = '';

        if (request('profile_avatar') != null){
            $fileformat = value($request->profile_avatar->extension());
        }

        $id = Ticket::create([
//            'id' => value('22'),
            'type' => request('type'),
            'summary' => request('summary'),
            'description' => request('description'),
            'level' => request('level'),
            'responsible' => request('responsible'),
            'severity' => request('severity'),
            'modulename' => request('modulename'),
            'status' => value('1'),
            'fileformat'=> value($fileformat),
            'created_by' => value(Auth::guard()->user()->name),
            'assignedto' => value(''),
            'solution' => value(''),
            'reassign' => value(''),
            'change_time' => value(''),
            'time_app_status' => value(''),
            'cancel_reson' => value(''),
            'WUI' => value(''),
            'nosolutionsent' => value(''),
            'response_sent' => value(''),
            'project' => request('select_project'),
        ])->id;

        if (request('profile_avatar') != null){
            $imageName = $id.'.'.$request->profile_avatar->extension();
            $request->profile_avatar->move('screenshots', $imageName);
        }

        /*Mils*/
      $to = DB::table('consultants')->select('email')->where('name','=',request('responsible'))->first();

       $details = [
            'title' => 'Ticket has been created '.$id,
            'topic'  => 'Open Ticket Available with the below details:',
            'type'  =>  'Ticket Type : '.request('type'),
            'summary'=> 'Ticket Summary : '.request('summary'),
            'level'  => 'Ticket Level : '.request('level'),
            'responsible' => 'Responsible : '.request('responsible'),
            'severity' => 'Ticket Severity : '.request('severity')
        ];
        
        Mail::to($to->email)->send(new CreatedTicketMail($details));

        return $id;

//
//        Alert::success('Success', 'Ticket '.$id.' Created Successfully')->autoClose(1500);
//
//        return redirect()->route('user.ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    /*fgfgd*/
    public function show(Ticket $ticket)
    {
        $consultants = Consultant::latest()->get();

      	$consultantfiles = [];
        $userfiles = [];

        $ticketss = Ticket::where('created_by', Auth::guard()->user()->name)
            ->get();
        $messages = Message::where('to', Auth::guard()->user()->name)
            ->where('is_read','0')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->unique('ticket');
        $msgcount = count($messages);
        $tktcount = count($ticketss);

      $userdirectory = public_path('screenshots/'.$ticket->id.'/user');

        $consultantdirectory = public_path('screenshots/'.$ticket->id.'/consultant');

        if(File::exists($userdirectory)) {
            $userfiles = File::allFiles($userdirectory);
        }


        if(File::exists($consultantdirectory)) {
            $consultantfiles = File::allFiles($consultantdirectory);
        }

        $values = DB::select("select count(is_read) as unread from messages where is_read = 0 and messages.to = '".Auth::guard()->user()->name."' and ticket = '".$ticket->id."' group by ticket");

        return view('ticket.show', compact('ticket','consultants','values','ticketss','messages','msgcount','tktcount','userfiles','consultantfiles'));
    }
    /*fgfgd*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $ticket->status = value('5');
        $ticket->completedat = value(Carbon::now());
        $ticket->save();

        $to = DB::table('consultants')->select('email')->where('name','=',$ticket->responsible)->first();

        $details = [
            'title' => 'Ticket '.$ticket->project.'_'.$ticket->modulename.'_'.date('my', strtotime($ticket->created_at)).'_'.$ticket->id.' has been closed ',
            'completedat'  => 'Completed at:'.value(Carbon::now())
        ];

        Mail::to($to->email)->send(new CloseTicketMail($details));

        return redirect()->route("user.ticket");
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

        if ($ticket-> status == '1' ){
            $request->validate([
                'type'=>'required',
                'summary'=>'required',
                'description'=>'required',
                'level'=>'required',
                'responsible'=>'required',
                'severity'=>'required',
                'profile_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);
            if($request->profile_avatar != null){
                $extension = $request->profile_avatar->extension();

                if (File::exists('screenshots/'.$ticket->id.'.'.$ticket->fileformat)) {
                    File::delete('screenshots/'.$ticket->id.'.'.$ticket->fileformat);
                }
                $ticket->fileformat = value($extension);
                $imageName = $ticket->id.'.'.$extension;

                $request->profile_avatar->move(public_path('screenshots'), $imageName);
            }
            $ticket->type = request("type");
            $ticket->summary = request("summary");
            $ticket->description = request("description");
            $ticket->level = request("level");
            $ticket->severity = request("severity");
            $ticket->responsible = request("responsible");
            $ticket->assignedto = value("");

            $ticket->save();

            Alert::success('Success', 'Ticket '.$ticket->id.' Updated Successfully')->autoClose(1500);

            return redirect()->route("user.ticket");
        }
        if ($ticket-> status == '2') {

            $ticket->responsible = request("responsible");
            $ticket->assignedto = value("");

            $ticket->save();

            Alert::success('Success', 'Ticket '.$ticket->id.' Updated Successfully')->autoClose(1500);

            return redirect()->route("user.ticket");
        }

        if($ticket->status == '7'){
            $ticket->status =value('3');
            $ticket->time_app_status =value('Approved');
            $ticket->change_time =request("ctime");

            $ticket->save();

            Alert::success('Success', 'Ticket '.$ticket->id.' Updated Successfully')->autoClose(1500);

            return redirect()->route("user.ticket");
        }

    }

    public function delete($id)
    {
        Ticket::destroy($id);
        return response()->json([
            'success' => 'Ticket '.$id.' deleted successfully!'
        ]);
    }

    public function cancel(Request $request){
        $page = Ticket::find(request("myid"));
        if($page) {
            $page->cancel_reson = request("reson");
            $page->status = value("6");
            $page->save();
        }
        Alert::success('Success', 'Ticket Cancelled Successfully')->autoClose(1500);

        return redirect()->route("user.ticket");

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

    /*msessenge send get*/

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
    /*msessenge send get*/
  public function fileupload($ticket,Request $request)
    {
        if($request->hasFile('file')) {
            $image = $request->file('file');

            $image_name = time().$image->getClientOriginalName();

            $image->move(public_path('screenshots/'.$ticket.'/user'), $image_name);
        }
    }

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
        $userdirectory = public_path('screenshots/'.$ticket.'/user');
        $userfiles = File::allFiles($userdirectory);

        $filenamearray = [];

        foreach ($userfiles as $userfile){
           $filename = basename($userfile);
           array_push($filenamearray,$filename);
        }



        return $filenamearray;
    }
}
