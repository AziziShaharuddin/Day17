<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\JWTAuth;
// use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Authenticate;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('create-user', function(){
    //create a new user in the user table, and will direct to a page with response of 'user created'
    $user = new User();
    $user->name = 'Zack';
    $user->email = 'zack@gmail.com';
    $user->password = bcrypt('password');
    $user->save();

    // return response()->json('The user has been created');

});

Route::get('queue-email', function(){

    $email_list['email'] = 'aziziee95@gmail.com';
    $user = User::whereId(2)->first();
    $email_list['user'] = $user;
    dispatch(new \App\Jobs\QueueJob($email_list));


    // $email = new QueueEmail($email_list);
    // Mail::to($email_list['email'])->send($email);

    return response()->json($email_list['email']);

    // dd('Send Email Successfully');
});

//url will start with admin/
Route::prefix('admin')->group(function () {
    Route::any('/', [AdminController::class, 'login'])->name('login'); //give the name, then create middleware for whichever route that you only want access once login
    Route::any('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function() {

        //dashboard
        Route::any('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        //User Management
        Route::any('/user', [AdminController::class, 'user'])->name('admin.user');
        Route::any('/user/edit/{id}', [AdminController::class, 'userEdit'])->name('user.edit'); //->name('admin.user.edit')
        Route::any('/user/delete/{id}', [AdminController::class, 'userDelete'])->name('user.delete');

        //Job Management
        Route::any('/job', [AdminController::class, 'job'])->name('admin.job');
        Route::any('/job/edit/{id}', [AdminController::class, 'jobEdit'])->name('job.edit');
        Route::any('/job/del', [AdminController::class, 'jobDelete'])->name('job.delete');

        //Department Management
        Route::any('/department', [AdminController::class, 'department'])->name('admin.department');
        Route::any('/department/edit/{id}', [AdminController::class, 'departmentEdit'])->name('department.edit');
        Route::any('/department/delete', [AdminController::class, 'departmentDelete'])->name('department.delete');
    });
});

// Route::get('create-user', function(){
  
//     $user = new User();
//     $user->name = 'Azizi';

// });

Route::get('queue-email', function(){
  
    $email_list['email'] = 'suehok@gmail.com';
  
    dispatch(new \App\Jobs\QueueJob($email_list));
  
    return response()->json($email_list['email']);
});