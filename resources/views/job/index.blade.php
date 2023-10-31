<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => false]" />
    <div>
        @foreach ($jobs as $job)
            <x-card class="mb-4">
                <x-job-card :$job />
                <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
            </x-card>
        @endforeach
    </div>
</x-layout>