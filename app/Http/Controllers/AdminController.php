<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeJob;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
// use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\Authenticate;

class AdminController extends Controller
{
    //
    
    public function login(Request $request) {

        if($request->isMethod('post')){
            $credentials = $request->validate([                
                'email' => ['required','email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                if(Auth::user()->role==1){
                    $request->session()->regenerate();

                    //get the token
                    $jwt_token = JWTAuth::attempt($credentials);
                    session(['jwt_token' => $jwt_token]);

                    // return redirect()->intended('admin/dashboard');
                    return redirect()->route('admin.dashboard');
                }
                else {
                    return redirect('/');
                }
            }

            return back()->withErrors([
                'email'=>'The provide credentials do not meet our record',
            ]);
        
        }
        return view ('admin.login');
    }

    public function dashboard () {
        $jwt_token = session('jwt_token');
        $jobCount = EmployeeJob::get()->count();
        $userCount = User::get()->count();
        $departmentCount = Department::get()->count();
        return view ('admin.dashboard', compact('jwt_token', 'jobCount', 'departmentCount', 'userCount'));
        // return view ('admin.dashboard', ["jobCount"=>$jobCount, "departmentCount" =>$departmentCount, "userCount"=>$userCount]);
    }

    public function user () {
        $users = User::get();
        $users = User::paginate(10);

        return view ('admin.user', ["users"=>$users]);
    }

    public function userEdit(Request $request) {

        $users = User::where("id", $request->id)->first(); 
        $status="";

        if(isset($request->name)){
            $users->name = $request->name;
            $users->email = $request->email;
            $users->save();
            $status="Record $users->id updated";
            return redirect('admin/user/edit/'.$users->id)->with('status',$status);
        }

        return view('admin.edit',["users"=>$users])->with('status',$status); //  in laravel use . to separate the folder instead of /
    }

    public function userDelete(Request $request) {
        $users = User::where("id", $request->id);
        $users->delete();
        return redirect('admin/user/');
    }

    public function job () {
        $jobs = EmployeeJob::get();
        $jobs = EmployeeJob::paginate(10);

        return view ('admin.job', ["jobs"=>$jobs]);
    }

    public function jobEdit(Request $request) {

        $jobs = EmployeeJob::where("id", $request->id)->first(); 
        $status="";

        if(isset($request->title)){
            $jobs->title = $request->title;
            $jobs->description = $request->description;
            $jobs->min_salary = $request->min_salary;
            $jobs->max_salart = $request->max_salart;
            $jobs->save();
            $status="Record $jobs->id updated";
            return redirect('admin/job/edit/'.$jobs->id)->with('status',$status);
        }

        return view('admin.job.edit',["jobs"=>$jobs])->with('status',$status); //  in laravel use . to separate the folder instead of /
    }

    public function jobDelete(Request $request) {
        $jobs = EmployeeJob::where("id", $request->id);
        $status="";
        
        // if (isset($request->title)){
        //     $jobs->title = $request->title;
        //     $jobs->description = $request->description;
        //     $jobs->min_salary = $request->min_salary;
        //     $jobs->max_salart = $request->max_salart;
        //     $jobs->delete();
        //     return redirect('admin/job/');
        // }
        $jobs->delete();
        return redirect('admin/job/');
    }

    public function department () {
        $departments = Department::get();
        $departments = Department::paginate(10);

        return view ('admin.department', ["departments"=>$departments]);
    }
  
    public function departmentEdit(Request $request) {

        $departments = Department::where("id", $request->id)->first(); 
        $status="";

        if(isset($request->department_name)){
            $departments->department_name = $request->department_name;
            $departments->save();
            $status="Record $departments->id updated";
            return redirect('admin/department/edit/'.$departments->id)->with('status',$status);
        }

        return view('admin.department.edit',["departments"=>$departments])->with('status',$status); //  in laravel use . to separate the folder instead of /
    }

    public function departmentDelete(Request $request) {
        $departments = Department::where("id", $request->id);
        $departments->delete();
        return redirect('admin/department/');
    }

    public function logout(){
        if (Auth::check()){
            Auth::logout();
        }
        return redirect('admin');
    }
}
