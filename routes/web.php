<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;


Route::get("/", function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::with('employer')->simplePaginate(50)
    ]);
});

Route::get('/jobs/{id}', function($id) {
            
            $selectedJob = Job::find($id);

        
            return view('/job', [
                'job' => $selectedJob,
            ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});