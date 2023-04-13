<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Module;

class UserController extends Controller
{
    /* Send for display_users*/
    public function index()
    {
        $users = User::latest()->get();
        return view('dashboard.admin.display_users',compact('users'));
    }
    /* Send for display_users*/

      function create(Request $request){
        //Validate inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
//            'proj_name'=>'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->proj_name = value('');
        $save = $user->save();

        if($save){
            return redirect()->back()->with('Success','User Created Successfully');
        }else{
            return redirect()->back()->with('Fail','Something went wrong');
        }
    }


    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'Not an valid User, Please check the mail ID'
        ]);

        $creds = $request->only('email','password');

        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.home');
        }else{
            return  redirect()->route('user.login')->with('Fail','Incorrect Username or Password');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/user/login');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);

    }

}
