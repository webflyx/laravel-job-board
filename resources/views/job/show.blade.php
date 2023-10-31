<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => false ]" />
        <x-job-card :$job :show="false" />
</x-layout>