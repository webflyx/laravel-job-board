<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;

class MyJobsController extends Controller
{

    public function index()
    {  
        $jobs = auth()->user()->employer->jobs()
            ->with('employer','jobApplications', 'jobApplications.user')
            ->latest()->get();

        return view("employer.my_job.index", compact("jobs"));
    }

    public function create()
    {
        return view("employer.my_job.create");
    }

    public function store(JobRequest $request)
    {
        $validateData = $request->validated();

        // $newJob = $job->create([
        //     ...$validateData,
        //     'employer_id' => auth()->user()->id,
        // ]);

        auth()->user()->employer->jobs()->create($validateData);

        return redirect()->route('employer.my-jobs.index', auth()->user())->with('success','Job successfully added!');

    }

    public function edit(string $id, Job $myJob)
    {
        return  view('employer.my_job.edit', ['job' => $myJob]);
    }

    public function update(JobRequest $request, string $id, Job $myJob)
    {
        $myJob->update($request->validated());

        return redirect()->route('employer.my-jobs.index', auth()->user())->with('success', 'Job successfully updated');
    }

    public function destroy(string $id)
    {
        //
    }
}
