<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;



Route::get("/", function () {
    return view('home');
});

//displays all jobs
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
        'title' => ['required', 'string', 'min:3'],
        'salary' => ['required', 'string'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 2
    ]);
    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {

    $selectedJob = Job::find($id);


    return view('jobs.show', [
        'job' => $selectedJob,
    ]);
});

Route::get('/jobs/{id}/edit', function ($id) {

    $selectedJob = Job::find($id);


    return view('jobs.edit', [
        'job' => $selectedJob,
    ]);
});

Route::patch('/jobs/{id}', function ($id) {

    //validate
    request()->validate([
        'title' => ['required', 'string', 'min:3'],
        'salary' => ['required', 'string'],
    ]);
    //authorize on hold for later

    //update the job // and persist
    $job = Job::findOrFail($id);
     
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),

    ]);

        //redirect to the job page

    return redirect('/jobs/' . $job->id);

});

Route::delete('/jobs/{id}', function ($id) {

    //authorize (on hold for now)

    //find the job
    $selectedJob = Job::findOrFail($id);
    $selectedJob->delete();


    return redirect('jobs');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
