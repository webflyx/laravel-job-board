<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => false]" />
    <div>
        @foreach ($jobs as $job)
            <x-job-card :$job :show="true" class="mb-4" />
        @endforeach
    </div>
</x-layout>