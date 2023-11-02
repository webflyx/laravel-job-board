<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\JobApplicationRequest;

class JobApplicationController extends Controller
{
    public function create(Job $job)
    {
        $this->authorize('apply', $job);
        return view('job.application.create', compact('job'));
    }

    public function store(Job $job, JobApplicationRequest $request)
    {
        $this->authorize('apply', $job);

        $validatedData = $request->validated();

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private');

        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted.');
    }

    public function destroy(string $id)
    {
        //
    }
}