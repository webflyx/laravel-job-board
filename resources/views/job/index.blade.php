<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => false]" />

    <x-card class="mb-4">
        <form id="form-filter" action="{{ route('jobs.index') }}" method="GET">
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col space-y-1">
                    <label class="font-medium" for="search">Search</label>
                    <x-input-text name="search" value="{{ request('search') }}" placeholder="Search..." formId="form-filter" />
                </div>
                <div class="flex flex-col space-y-1">
                    <label class="font-medium" for="min_salary">Salary</label>
                    <div class="flex space-x-2 w-full">
                        <x-input-text name="min_salary" value="{{ request('min_salary') }}" placeholder="From" formId="form-filter" />
                        <x-input-text name="max_salary" value="{{ request('max_salary') }}" placeholder="To" formId="form-filter" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="font-medium">Experience</div>
                    <x-input-radio name="experience" label="All" value="" />
                    @foreach ($experiences as $experience)
                        <x-input-radio name="experience" label="{{ Str::ucfirst($experience) }}" value="{{ strtolower($experience) }}" />
                    @endforeach
                </div>
                <div class="flex flex-col">
                    <div class="font-medium">Category</div>
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
            <x-job-card :$job :show="true" :description="false" class="mb-4" />
        @endforeach
    </div>
</x-layout>
