<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Module;

use App\Models\Consultant;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ConsultantController extends Controller

{
    /* Send for display_users*/
    public function index()
    {
        $consultant = Consultant::latest()->get();
        return view('dashboard.admin.display_consultants',compact('consultant'));
    }
    /* Send for display_users*/

    function create(Request $request){
        //Validate inputs
        $request->validate([
            'name'=>'required',
            'department'=>'required',
            'email'=>'required',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);

        $consultant = new Consultant();
        $consultant->name = $request->name;
        $consultant->department = $request->department;
        $consultant->email = $request->email;
        $consultant->password = \Hash::make($request->password);
        $save = $consultant->save();

        if($save){
            Alert::success('Success', 'Consultant Created Successfully')->autoClose(1500);
            return redirect()->route("admin.createconsultant");
        }else{
            return redirect()->back()->with('Fail','Something went wrong');
        }
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:30'
        ],[
            'email'=>'Not an valid Consultant, Please check the mail ID'
        ]);

        $creds = $request->only('email','password');

        if(Auth::guard('consultant')->attempt($creds)){
            return redirect()->route('consultant.home');
        }else{
            return  redirect()->route('consultant.login')->with('Fail','Incorrect Username or Password');
        }
    }

    function logout(){
        Auth::guard('consultant')->logout();
        return redirect('/consultant/login');
    }

    public function update(Request $request){

        $page = Consultant::find(request("myid"));

        if($page) {
            $page->name = request("uname");
            $page->email = request("email");
            $page->department = request("dept");
            $page->created_at = request("cdate");
            $page->save();
        }

        Alert::success('Success', 'Ticket Update Successfully')->autoClose(1500);

        return view("dashboard.admin.display_consultants");

    }

    public function delete($id)
    {
        Consultant::find($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);

    }

}
