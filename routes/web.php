<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

//url will start with admin/
Route::prefix('admin')->group(function () {
    Route::any('/', [AdminController::class, 'login']);
    Route::any('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::any('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::any('/user', [AdminController::class, 'user'])->name('admin.user');
    Route::any('/job', [AdminController::class, 'job'])->name('admin.job');
    Route::any('/department', [AdminController::class, 'department'])->name('admin.department');
});

