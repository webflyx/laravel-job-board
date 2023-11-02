<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobsController;

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

Route::get('', fn() => to_route('jobs.index'));
Route::resource('jobs', JobController::class)->only(['index', 'show']);

Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::get('logout', fn() => to_route('auth.destroy'))->name('logout');

Route::resource('auth', AuthController::class)->only(['create', 'store', 'destroy']);

Route::middleware('auth')->group(function () {
    Route::resource('job.application', JobApplicationController::class)->only(['create', 'store']);

    Route::resource('my-job-application', MyJobApplicationController::class)->only(['index', 'destroy']);

    Route::resource('employer', EmployerController::class)->only(['create', 'store']);

    Route::resource('employer.my-jobs', MyJobsController::class)->only(['index']);
    Route::middleware('employer')->resource('employer.my-jobs', MyJobsController::class)->only(['index']);
});