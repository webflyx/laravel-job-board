<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Application' => false]" />
    <x-job-card :$job :show="false" :description="false" :application="false" />

    <x-card class="mt-4">
        <h2 class="text-xl font-medium mb-4">Your Job Application</h2>

        <form action="{{ route('job.application.store', $job) }}" method="POST">
            @csrf
            <div>
                <label for="expected_salary" class="mb-1 block font-medium">Expected Salary</label>
                <x-input-text type="number" name="expected_salary" />
                @error('expected_salary')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <x-button type="submit" class="w-full mt-4">Apply</x-button>
        </form>
    </x-card>
</x-layout>