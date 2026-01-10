<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
         $jobs = Job::with('employer')->latest()->simplePaginate(50);
         return view('jobs.index', [
        'jobs' => $jobs,
    ]);
    }

    public function create() 
    {
        return view('jobs.create');
    }

    public function show()
    {
        
    }

    public function store(Request $request)
    {
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
    }

    public function edit(Job $job)
    {
       return view('jobs.edit', [
        'job' => $job,
    ]);
    }

    public function update(Job $job, Request $request)
    {
          //validate
    request()->validate([
        'title' => ['required', 'string', 'min:3'],
        'salary' => ['required', 'string'],
    ]);
    //authorize on hold for later

    //update the job // and persist
    
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),

    ]);

        //redirect to the job page

    return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();
    return redirect('jobs');
    }
}
