<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => false]" />
    <x-job-card :$job :show="false" :description="true" :application="true" />

    <x-card class="my-6">
        <h2 class="text-xl font-semibold border-b pb-2 border-slate-200">Other jobs by {{ $job->employer->company_name }}</h2>

        <div class="m-4 ">
            @forelse ($job->employer->jobs as $otherJob)
                <a href={{ route('jobs.show', $otherJob->id) }} class="flex justify-between items-center">
                    <div class="mb-4">
                        <div class="font-medium ">{{ $otherJob->title }} </div>
                        <div class="text-slate-500">{{ $otherJob->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="text-slate-600">${{ $otherJob->salary }} </div>
                </a>
            @empty
                Other jobs not found
            @endforelse
        </div>
    </x-card>
</x-layout>
