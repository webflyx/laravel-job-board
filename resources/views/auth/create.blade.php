<x-layout>
    <h1 class="text-center text-3xl mb-10 font-semibold">Sign in to your account</h1>
    <x-card>
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div>
                <label class="font-semibold" for="email">E-mail</label>
                <x-input-text name="email" />
            </div>
            <div class="mt-4">
                <label class="font-semibold" for="password">Password</label>
                <x-input-text type="password" name="password" />
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center space-x-2">
                    <input class="rounded" type="checkbox" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <a class="text-blue-700 underline" href="{{ route('auth.create') }}">Forger password?</a>
                </div>
            </div>
            <x-button class="mt-4 w-full">Login</x-button>
        </form>
    </x-card>
</x-layout>