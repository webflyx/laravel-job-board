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
        $this->authorize('viewAnyEmployer', Job::class);

        $jobs = auth()->user()->employer->jobs()
            ->with('employer','jobApplications', 'jobApplications.user')
            ->withTrashed()
            ->latest()->get();

        return view("employer.my_job.index", compact("jobs"));
    }

    public function create()
    {
        $this->authorize('viewAnyEmployer', Job::class);
        return view("employer.my_job.create");
    }

    public function store(JobRequest $request)
    {
        $this->authorize('create', Job::class);

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
        $this->authorize('update', $myJob);
        return  view('employer.my_job.edit', ['job' => $myJob]);
    }

    public function update(JobRequest $request, Employer $employer, Job $myJob)
    {
        $myJob->update($request->validated());

        return redirect()->route('employer.my-jobs.index', $employer)->with('success', 'Job successfully updated');
    }

    public function destroy(Employer $employer, Job $myJob)
    {
        $myJob->delete();
        return redirect()->route('employer.my-jobs.index', $employer)->with('success', 'Job successfully deleted');
    }
}
