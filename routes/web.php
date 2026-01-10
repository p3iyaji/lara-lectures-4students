<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;


Route::get("/", function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer')->latest()->simplePaginate(50)
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs/store', function () {
    request()->validate([
        'title' => ['required','string', 'min:3'],
        'salary' => ['required','string'],
    ]);
    
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id'=> 2
    ]);
    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {

    $selectedJob = Job::find($id);


    return view('jobs.show', [
        'job' => $selectedJob,
    ]);
});




Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
