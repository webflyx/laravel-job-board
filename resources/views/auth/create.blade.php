<x-layout>
    <h1 class="text-center text-3xl mb-10 font-semibold">Sign in to your account</h1>
    <x-card>
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div>
                <x-label for="email" :required="true">E-mail</x-label>
                <x-input-text name="email"  />
            </div>
            <div class="mt-4">
                <x-label for="password" :required="true">Password</x-label>
                <x-input-text type="password" name="password" />
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center space-x-2">
                    <input class="rounded" type="checkbox" name="remember">
                    <x-label for="remember" class="mb-0">Remember me</x-label>
                </div>
                <div>
                    <a class="text-blue-700 underline" href="{{ route('auth.create') }}">Forger password?</a>
                </div>
            </div>
            @if (session('error'))
                <div class="my-2 text-red-500 font-medium">{{ session('error') }}</div>
            @endif
            <x-button class="mt-4 w-full">Login</x-button>
        </form>
    </x-card>
</x-layout>