<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), 'My Job Applications' => false]" />

    <div>
        @forelse ($applications as $application)
            <x-job-card class="mb-4" :job="$application->job" :show="true" :description="false" :application="false" />
        @empty
            <div>No active applications found</div>
        @endforelse
    </div>

</x-layout>
