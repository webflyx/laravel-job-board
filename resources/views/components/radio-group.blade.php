@if (array_is_list($options))

    <fieldset class="flex flex-col">
        @foreach ($options as $option)
            <div class="flex items-center gap-2">
                <input @if ($check) @checked($check === $option ) @endif type="radio"
                    id="{{ $option }}" name='{{ $name }}' value="{{ $option }}">
                <label for="{{ $option }}">{{ $option }}</label>
            </div>
        @endforeach
        @error($name)
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </fieldset>

@else

    <fieldset class="flex flex-col">
        @foreach ($options as $key => $val)
            <div class="flex items-center gap-2">
                <input @if ($check) @checked($check === $val ) @endif type="radio"
                    id="{{ $val }}" name='{{ $name }}' value="{{ $val }}">
                <label for="{{ $val }}">{{ $key }}</label>
            </div>
        @endforeach
        @error($name)
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </fieldset>
    
@endif
