<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Job::class);

        $filters = request()->only([
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category'
        ]);

        $jobs = Job::with('employer')->filter($filters);

        $jobs = $jobs->latest()->get();

        return view('job.index', ['jobs' => $jobs, 'categories' => Job::$categories, 'experiences' => Job::$experience]);
    }

    public function show(Job $job)
    {
        $this->authorize('view', $job);
        
        return view('job.show', compact('job'));
    }

}
