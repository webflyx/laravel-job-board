<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => false]" />

    <x-card x-data="" class="mb-4">
        <form x-ref="filters" action="{{ route('jobs.index') }}" method="GET">
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col space-y-1">
                    <x-label for="search">Search</x-label>
                    <x-input-text name="search" value="{{ request('search') }}" placeholder="Search..." formRef="filters" />
                </div>
                <div class="flex flex-col space-y-1">
                    <x-label for="min_salary">Salary</x-label>
                    <div class="flex space-x-2 w-full">
                        <x-input-text name="min_salary" value="{{ request('min_salary') }}" placeholder="From" formRef="filters" />
                        <x-input-text name="max_salary" value="{{ request('max_salary') }}" placeholder="To" formRef="filters" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <x-label for="experience">Experience</x-label>
                    <x-input-radio name="experience" label="All" value="" />
                    @foreach ($experiences as $experience)
                        <x-input-radio name="experience" label="{{ Str::ucfirst($experience) }}" value="{{ strtolower($experience) }}" />
                    @endforeach
                </div>
                <div class="flex flex-col">
                    <x-label for="category">Category</x-label>
                    <x-input-radio name="category" label="All" value="" />
                    @foreach ($categories as $category)
                        <x-input-radio name="category" label="{{ Str::ucfirst($category) }}" value="{{ $category }}" />
                    @endforeach
                </div>
            </div>
            <x-button class="mt-4 w-full">Filter</x-button>
        </form>
    </x-card>

    <div>
        @foreach ($jobs as $job)
            <x-job-card :$job :show="true" :description="false" :application="false" class="mb-4" />
        @endforeach
    </div>
</x-layout>
