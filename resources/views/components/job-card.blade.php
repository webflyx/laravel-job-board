<div {{ $attributes->class('border shadow-md p-4 bg-slate-50 rounded-md') }}>
    <div class="flex justify-between items-center">
        <div class="text-lg font-medium">{{ $job->title }}</div>
        <div class="text-slate-600 ">${{ number_format($job->salary) }}</div>
    </div>
    <div class="flex justify-between items-center mt-2 ">
        <div class="flex gap-4">
            <div>Company Name</div>
            <div class="text-slate-600 ">{{ $job->location }}</div>
        </div>
        <div class="flex gap-2">
            <x-tag>{{ Str::ucfirst($job->experience) }}</x-tag>
            <x-tag>{{ $job->category }}</x-tag>
        </div>
    </div>
    <p class="my-6 text-slate-700">{!! nl2br(e($job->description)) !!}</p>

    @if ($show)
        <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
    @endif
</div>