<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Application' => false]" />
    <x-job-card :$job :show="false" :description="false" :application="false" />

    <x-card class="mt-4">
        <h2 class="text-xl font-medium mb-4">Your Job Application</h2>

        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <x-label for='expected_salary' :required="true">Expected Salary</x-label>
                <x-input-text type="number" name="expected_salary" value="{{ old('expected_salary') }}" />

            </div>

            <div class="mt-4">
                <x-label for="cv" :required="true">Your CV</x-label>
                <x-input-text type="file" name="cv" class="p-4" />
            </div>

            <x-button type="submit" class="w-full mt-4">Apply</x-button>
        </form>
    </x-card>
</x-layout>