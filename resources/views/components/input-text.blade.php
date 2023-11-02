<div class="relative">
    <input class="border-0 w-full rounded-md ring-1 ring-slate-300 focus:ring-2 focus:ring-slate-500 px-4 py-2"
        id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}" 
        x-ref="input-{{ $name }}" />
    @if ($formRef)
    <button type="button" @click="$refs['input-{{$name}}'].value = ''; $refs['{{$formRef}}'].submit()" >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-9 absolute top-0 right-0 text-slate-500 hover:text-slate-700 h-full px-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    @endif
</div>
