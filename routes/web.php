<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

 $jobs = [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '£25,000'
            ],
            [
                'id'=> 2,
                'title'=> 'Manager',
                'salary' => '£20,000'
            ],
            [
                'id'=> 3,
                'title'=> 'Programmer',
                'salary' => '£18,000'
            ]
            ];

Route::get("/", function () {
    return view('home');
});

Route::get('/jobs', function () use($jobs) {
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function($id) use($jobs) {
            
            $selectedJob = Arr::first($jobs, fn($job) => $job['id'] == $id); 

        
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