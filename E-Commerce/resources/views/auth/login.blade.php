<x-layouts.app title="Login">
    <div class="mx-auto max-w-md rounded-2xl bg-white p-6 shadow-sm">
        <h1 class="mb-6 text-2xl font-bold">Login</h1>

        <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
            @csrf
            <x-form-input label="Email" name="email" type="email" />
            <x-form-input label="Password" name="password" type="password" />

            <button type="submit" class="w-full rounded-lg bg-stone-900 px-4 py-3 font-semibold text-white">
                Masuk
            </button>
        </form>

        <p class="mt-4 text-sm text-stone-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-semibold text-stone-900">Register</a>
        </p>
    </div>
</x-layouts.app>
