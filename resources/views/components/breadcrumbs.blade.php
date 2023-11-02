<nav {{ $attributes }}>
    <ul class="flex gap-3">
        <li>
            <a class="font-medium" href="/">Home</a>
        </li>
        @foreach ($links as $label => $link)
            <li>
                →
            </li>
            <li>
                @if ($link)
                    <a class="font-medium"  href="{{ $link }}">{{ $label }}</a>
                @else
                    <span class="text-slate-600 ">{{ $label }}</span>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
