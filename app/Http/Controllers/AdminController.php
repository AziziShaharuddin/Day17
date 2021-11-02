<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;

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
        return view ('admin.dashboard');
    }

    public function user () {
        $users = User::get();
        $users = User::paginate(10);

        return view ('admin.user', ["users"=>$users]);
    }

    public function job () {
        $jobs = Job::get();
        $jobs = Job::paginate(10);

        return view ('admin.job', ["jobs"=>$jobs]);
    }

    public function department () {
        $departments = Department::get();
        $departments = Department::paginate(10);

        return view ('admin.department', ["departments"=>$departments]);
    }

    public function logout(){
        if (Auth::check()){
            Auth::logout();
        }
        return redirect('admin');
    }
}
