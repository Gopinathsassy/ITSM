<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'Not an Admin, Please check the mail ID'
        ]);

        $creds = $request->only('email','password');

        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }else{
            return  redirect()->route('admin.login')->with('Fail','Incorrect Username or Password');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
