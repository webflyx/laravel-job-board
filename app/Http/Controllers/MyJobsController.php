<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MyJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        return view("employer.my_job.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("employer.my_job.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:5|max:5000',
            'salary' => 'required|numeric|min:1|max:1000000',
            'location' => 'required|string|min:3|max:255',
            'category' => 'required|in:' . implode(',',Job::$categories),
            'experience' => 'required|in:' . implode(',',Job::$experience),
        ]);

        // $newJob = $job->create([
        //     ...$validateData,
        //     'employer_id' => auth()->user()->id,
        // ]);

        auth()->user()->employer->jobs()->create($validateData);

        return redirect()->route('employer.my-jobs.index', auth()->user())->with('success','Job successfully added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
