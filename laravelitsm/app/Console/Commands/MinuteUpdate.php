<?php

namespace App\Console\Commands;

use App\Mail\UnresponseMail;
use App\Models\Ticket;
use Illuminate\Console\Command;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MinuteUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $tickets = Ticket::all();
        $now = Carbon::now();

        foreach($tickets as $ticket){
            $createdat = $ticket->created_at;
            if ($ticket->assignedto == ''){
                    $responsetime = $createdat->diffInMinutes($now);
                    if($ticket->response_sent == ''){
                        if ($responsetime >= 15){

                            $to = DB::table('admins')->select('email')->where('name','=','Admin')->first();

                            $to_user = DB::table('users')->select('email')->where('name','=',$ticket->created_by)->first();

                            $details = [
                                'title' => 'Ticket number '.$ticket->id.' is Un-Assigned for too long',
                                'topic'  => 'A ticket is Un-Assigned for so Long',
                                'type'  =>  'Ticket Type : '.$ticket->type,
                                'summary'=> 'Ticket Summary : '.$ticket->summary,
                                'level'  => 'Ticket Level : '.$ticket->level,
                                'responsible' => 'Responsible : '.$ticket->responsible,
                                'severity' => 'Ticket Severity : '.$ticket->severity,
                                'createdby' => 'Created by : '.$ticket->created_by,
                            ];

                            Mail::to($to->email)->send(new UnresponseMail($details));
                            Mail::to($to_user->email)->send(new UnresponseMail($details));
                        }
                        $ticket->response_sent = value('yes');
                        $ticket->save();
                    }

               }
        }

   return 0;
    }
}
