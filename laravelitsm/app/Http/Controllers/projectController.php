<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\User_assign_project;
use http\Env\Response;
use Illuminate\Http\Request;
/* add the model link*/
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Module;
use Illuminate\Routing\Controller;


use Illuminate\Support\Facades\Auth;
/* add the model link*/
class projectController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('dashboard.admin.createuser',compact('projects'));
    }

/* Send for display_projects*/
    public function index1()
    {
        $projects = Project::latest()->get();
        return view('dashboard.admin.display_projects',compact('projects'));
    }
/* Send for display_projects*/


//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
    function create(Request $request){
        //Validate inputs
        $request->validate([
            'proj_name'=>'required',
            'proj_code'=>'required',
            'proj_type'=>'required',
            'company_name'=>'required',
            'id_project'=>'required',
            'company_location'=>'required'
        ]);

        $project = new Project();
        $project->proj_name = $request->proj_name;
        $project->proj_code = $request->proj_code;
        $project->proj_type = $request->proj_type;
        $project->company_name = $request->company_name;
        $project->company_location = $request->company_location;
        $project->id_project = $request->id_project;
        $save = $project->save();

        if($save){
            return redirect()->back()->with('Success','User Created Successfully');
        }else{
            return redirect()->back()->with('Fail','Something went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function user_project_assign(Request $request)
    {
        $project_code = value(0);
        $project_name = request('project_name');
        $name = request('nameee');
        $email = request('emailee');

        for( $count=0; $count < count($name); $count++)
        {
            $id = User_assign_project::create([
                'project_code' => value($project_code),
                'project_name' => value($project_name),
                'user_name' => value($name)[$count],
                'email' => value($email)[$count],
            ])->id;

        }
        return $id;
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function user_assign_projects()
    {
        $projects = Project::latest()->get();
        $users = User::latest()->get();
        return view('dashboard.admin.user_assign_projects',compact('projects', 'users'));

    }

    public function check_project ()
    {
        $projectee = User_assign_project::where('project_name', '=', request('project_name'))->get();
        return $projectee;
    }

    public function check_email_project ()
    {

        $project_name = request('project_name');


                $projectee = User_assign_project::where('project_name', '=', request('project_name'))->pluck("user_name");
                $all_user = User::all();

                return response()->json([
                    'assign_user' => $projectee,
                    'all_users' => $all_user
//                    'dataas3' => $projectee
                ]);




//                $project11 = DB::table('user_assign_projects')
//                    ->join('users', 'user_assign_projects.email', '=', 'users.email')
//                    ->where('user_assign_projects.user_name','=','users.name')
//                    ->where('user_assign_projects.project_name','!=', request('project_name'))->select('name')->distinct()->get();
//                return $project11;

//            }else{
//                $project1 = User::latest()->get();
//                return $project1;
//            }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

        $page = Project::find(request("myid"));

        if($page) {
            $page->proj_name = request("pname");
            $page->proj_code = request("pcode");
            $page->proj_type = request("ptype");
            $page->id_project = request("psp");
            $page->company_name = request("cname");
            $page->company_location = request("cloc");
            $page->save();
        }

        Alert::success('Success', 'Ticket Update Successfully')->autoClose(1500);

        return redirect()->route("admin.display_projects");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete($id)
    {
        Project::destroy($id);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
