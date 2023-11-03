<x-layout>
    <div class="mb-10 flex justify-between items-center">
        <h1 class="text-center text-3xl font-semibold">My Jobs</h1>
        <x-link-button href="{{ route('employer.my-jobs.create', auth()->user()->employer) }}">Create</x-link-button>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :$job :show="false" :description="false" :application="false" class="mb-4" >
            
            <x-link-button class="my-4" href="{{ route('employer.my-jobs.edit', [auth()->user(), $job]) }}">Edit</x-link-button>

            <div class="mt-6">
                @forelse ($job->jobApplications as $application)
                    <div class="flex justify-between items-center mt-6 border-t border-slate-300 py-2">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>{{ $application->created_at->diffForHumans() }}</div>
                            <div>Download CV</div>
                        </div>
                        <div>{{ number_format($application->expected_salary) }}</div>
                    </div> 
                @empty
                   <div>Not applicants yet.</div> 
                @endforelse
            </div>
            
        </x-job-card>
    @empty
        <x-card>
            <div class="text-xl text-center font-medium">Create your first job</div>
            <x-link-button class="mx-auto mt-6"
                href="{{ route('employer.my-jobs.create', auth()->user()) }}">Create</x-link-button>
        </x-card>
    @endforelse
</x-layout>
