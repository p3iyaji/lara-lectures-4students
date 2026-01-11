<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;

Route::get("/", function () {
    return view('home');
});

Route::view('/', 'home');

Route::get('test', function () {
    //Mail::to('p3.iyaji@gmail.com')->send(new JobPosted());
    dispatch(function() {
        logger('hello from the queue!');
    })->delay(5);

    return 'Done';
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('login', [SessionController::class, 'login'])->name('login');
Route::post('login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

//displays all jobs
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');

    Route::get('/jobs/create', 'create');

    Route::post('/jobs', 'store');

    // Route Model Binding 
    Route::get('/jobs/{job}', 'show');

    Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('edit', 'job');

        //Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('edit', 'job');


    Route::patch('/jobs/{job}', 'update');

    Route::delete('/jobs/{job}', 'destroy');
});

//Route::resource('jobs', JobController::class);

// Route::resource('jobs', JobController::class, [
//     'except' => ['edit'],
//     //'only' => ['edit']
// ]);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
