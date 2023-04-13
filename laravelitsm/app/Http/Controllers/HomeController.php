<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ticketss = Ticket::where('created_by', Auth::guard()->user()->name)
            ->get();

        $tickettypes = DB::table('tickets')
            ->where('created_by', Auth::guard()->user()->name)
            ->select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->get();

        $messages = Message::where('to', Auth::guard()->user()->name)
            ->where('is_read','0')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->unique('ticket');
        $msgcount = count($messages);
        $tktcount = count($ticketss);
        $ticket_week = Ticket::where('created_by', Auth::guard()->user()->name)
                       ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $ticket_week_count = count($ticket_week);

        $ticket_days = Ticket::select(DB::raw("(COUNT(*)) as count"),DB::raw("DAYNAME(created_at) as dayname"))
            ->where('created_by', Auth::guard()->user()->name)
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereYear('created_at', date('Y'))
            ->groupBy('dayname')
            ->get();


        return view('home',compact('ticketss','messages','msgcount','tktcount','ticket_week','ticket_week_count','ticket_days','tickettypes'));
    }
}
