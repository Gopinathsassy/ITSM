<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $modules = Module::latest()->get();
        return view('dashboard.admin.report.report',compact('modules'));
    }
}
