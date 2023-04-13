<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Consultant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Module;


use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;


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
        return view('dashboard.admin.ticket.ticket',compact('tickets'));
    }
    public function report()
    {
        $tickets = Ticket::latest()->get();
        $projects = Project::latest()->get();
        $modules = Module::latest()->get();
        $users = User::latest()->get();
        $consultants = Consultant::latest()->get();
        return view('dashboard.admin.report.report',compact('tickets','projects','modules','users','consultants'));
    }


/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.ticket.create');
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
            'severity'=>'required',
            'profile_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = Ticket::create([
            'type' => request('type'),
            'summary' => request('summary'),
            'description' => request('description'),
            'level' => request('level'),
            'responsible' => request('responsible'),
            'severity' => request('severity'),
            'status' => value('1'),
            'fileformat'=> value($request->profile_avatar->extension()),
            'created_by' => value(Auth::guard()->user()->name),
        ])->id;

        $imageName = $id.'.'.$request->profile_avatar->extension();

        $request->profile_avatar->move(public_path('screenshots'), $imageName);

        Alert::success('Success', 'Ticket Created Successfully')->autoClose(1500);

        return redirect()->route('admin.ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $consultants = Consultant::latest()->get();
        return view('dashboard.admin.ticket.show', compact('ticket'),compact('consultants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
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
        $status = '';
        $request->validate([
            'type'=>'required',
            'summary'=>'required',
            'description'=>'required',
            'level'=>'required',
            'responsible'=>'required',
            'severity'=>'required',
        ]);

        if (request("assigned") != '' ){
            $status = '2';
        }

        $ticket->type = request("type");
        $ticket->summary = request("summary");
        $ticket->description = request("description");
        $ticket->level = request("level");
        $ticket->severity = request("severity");
        $ticket->responsible = request("assigned");
        $ticket->assignedto = value('');
        $ticket->assignedat = value(Carbon::now());
        $ticket->status = value($status);
        $ticket->save();

        Alert::success('Success', 'Ticket Updated Successfully')->autoClose(1500);

        return redirect()->route("admin.ticket");

    }

    public function delete($id)
    {
        Ticket::destroy($id);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
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
}
