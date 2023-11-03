<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), 'Edit' => false]" />

    <x-card class="mt-4">
        <h2 class="text-xl font-medium mb-4">Edit Job</h2>

        <form action="{{ route('employer.my-jobs.update', [auth()->user()->employer, $job]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-label for='title' :required="true">Job Title</x-label>
                    <x-input-text type="text" name="title" value="{{ $job->title }}" />
                </div>
                <div>
                    <x-label for='location' :required="true">Location</x-label>
                    <x-input-text type="text" name="location" value="{{ $job->location }}" />
                </div>
            </div>
            <div class="mb-4">
                <x-label for='salary' :required="true">Salary</x-label>
                <x-input-text type="text" name="salary" value="{{ $job->salary }}" />
            </div>
            <div class="mb-4">
                <x-label for='description' :required="true">Description</x-label>
                <textarea
                    class="border w-full rounded-md ring-1 ring-slate-300 focus:ring-2 focus:ring-slate-500 px-4 py-2 {{ $errors->has('description') ? 'border-red-500' : '' }}"
                    name="description" rows="3">{{ $job->description }}</textarea>
                @error('description')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex flex-col">
                    <x-label for="experience">Experience</x-label>
                    <x-radio-group :check="$job->experience" name="experience" :options="\App\Models\Job::$experience" />
                </div>
                <div class="flex flex-col">
                    <x-label for="category">Category</x-label>
                    <x-radio-group :check="$job->category" name="category" :options="\App\Models\Job::$categories" />
                </div>
            </div>
            <x-button type="submit" class="w-full mt-4">Edit</x-button>
        </form>
    </x-card>
</x-layout>
