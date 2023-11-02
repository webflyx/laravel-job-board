<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), 'My Job Applications' => false]" />

    <div>
        @forelse ($applications as $application)
            <x-job-card class="mb-4" :job="$application->job" :show="true" :description="false" :application="false">
                <div class="mt-4 flex justify-between items-center">
                    <div>
                        <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                        <div>Expected Salary: ${{ number_format($application->expected_salary) }}</div>
                        <div>{{ Str::plural('Applicant', $application->job->job_applications_count) }}: {{ $application->job->job_applications_count }}</div>
                        <div>Average asking salary: ${{ number_format($application->job->job_applications_avg_expected_salary) }}</div>
                    </div>
                    <div>r</div>
                </div>
            </x-job-card>

        @empty
            <div>No active applications found</div>
        @endforelse
    </div>

</x-layout>
