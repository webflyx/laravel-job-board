<label for="{{ $name }}">
    <input
        @if (!$value) 
            @checked(!request($name))
        @else
            @checked(request($name) == $value) 
        @endif
        type="radio" name='{{ $name }}' value="{{ $value }}">
    <span>{{ $label }}</span>
</label>