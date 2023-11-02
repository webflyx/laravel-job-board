<x-layout>
    <h1 class="text-center text-3xl mb-10 font-semibold">Register as Employer</h1>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div>
                <x-label for="company_name" :required="true">Company Name</x-label>
                <x-input-text name="company_name"  />
            </div>
            <x-button class="mt-4 w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>