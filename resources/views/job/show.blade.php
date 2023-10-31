<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => false ]" />
    <x-card>
        <x-job-card :$job></x-job-card>
    </x-card>
</x-layout>