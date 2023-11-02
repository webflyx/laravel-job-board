<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MyJobApplicationController extends Controller
{

    public function index()
    {
        $applications = auth()->user()->jobApplications()
            ->with([
                "job" => fn($query) => $query->withCount('jobApplications')->withAvg("jobApplications", "expected_salary") ,
                "job.employer"
            ])->latest()->get();
        
        return view("job.my_job_application.index", compact("applications"));
    }


    public function destroy(string $id)
    {
        //

    }
}
