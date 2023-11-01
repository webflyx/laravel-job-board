<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{

    public function create(Job $job)
    {
        return view("job.application.create", compact("job"));
    }


    public function store(Job $job, Request $request)
    {
        JobApplication::create([
            'job_id' => $job->id,
            'user_id' => auth()->user()->id,
            ...$request->validate(
                ['expected_salary' => 'required|numeric|min:1|max:1000000'],
            )
        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'Job application submitted.');
    }

    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
