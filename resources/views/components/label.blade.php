<label for="{{ $for }}" {{ $attributes->class(['mb-1 block font-medium']) }}>
    {{ $slot }}
@if ($required)
    <i>*</i>
@endif
</label>