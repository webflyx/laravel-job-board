<div {{ $attributes->class('border shadow-md p-4 bg-slate-50 rounded-md') }}>
    <div class="flex justify-between items-center">
        <div class="text-lg font-medium">{{ $job->title }}</div>
        <div class="text-slate-600 ">${{ number_format($job->salary) }}</div>
    </div>
    <div class="flex justify-between items-center mt-2 ">
        <div class="flex gap-4">
            <div>{{ $job->employer->company_name }}</div>
            <div class="text-slate-600 ">{{ $job->location }}</div>
        </div>
        <div class="flex gap-2">
            <x-tag>
                <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
                    {{ Str::ucfirst($job->experience) }}
                </a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
                    {{ Str::ucfirst($job->category) }}
                </a>
            </x-tag>
        </div>
    </div>

    @if ($description)
        <p class="my-6 text-slate-700">{!! nl2br(e($job->description)) !!}</p>
    @endif


    @if ($show)
        <x-link-button :href="route('jobs.show', $job)" class="mt-3">Show</x-link-button>
    @endif
</div>
