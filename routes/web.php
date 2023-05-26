<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',                                   [App\Http\Controllers\DashboardController::class, 'home'])->name('job_add');
Route::get('job_add',                             [App\Http\Controllers\DashboardController::class, 'view_job_add'])->name('job_add')->middleware('auth');
Route::post('submit_job',                         [App\Http\Controllers\DashboardController::class, 'submit_job'])->name('submit_details')->middleware('auth');
Route::get('delete_job/{id}',                     [App\Http\Controllers\DashboardController::class, 'delete_job'])->name('delete_job')->middleware('auth');
Route::get('jobs_view',                           [App\Http\Controllers\DashboardController::class, 'view_jobs_view'])->name('jobs_view')->middleware('auth');
Route::get('job_submit/{id}',                     [App\Http\Controllers\DashboardController::class, 'view_job_submit'])->name('job_submit')->middleware('auth');
Route::post('apply_job/{id}',                     [App\Http\Controllers\DashboardController::class, 'apply_job'])->name('apply_job')->middleware('auth');
Route::get('apply_job_view',                      [App\Http\Controllers\DashboardController::class, 'view_apply_job'])->name('apply_job_view')->middleware('auth');
//download_dock
Route::get('download_dock/{id}',                  [App\Http\Controllers\DashboardController::class, 'download_dock'])->name('download_dock')->middleware('auth');
//delete_apply_job
Route::get('delete_apply_job/{id}',               [App\Http\Controllers\DashboardController::class, 'delete_apply_job'])->name('delete_job')->middleware('auth');
//change_user_details
Route::get('change_user_details',                 [App\Http\Controllers\DashboardController::class, 'change_user_details'])->name('change_user_details')->middleware('auth');
Route::post('changePassword',                     [App\Http\Controllers\DashboardController::class, 'changePassword'])->name('changePassword')->middleware('auth');
Route::post('changename',                         [App\Http\Controllers\DashboardController::class, 'changename'])->name('changename')->middleware('auth');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
