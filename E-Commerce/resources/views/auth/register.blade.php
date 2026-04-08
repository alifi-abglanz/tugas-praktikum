<x-layouts.app title="Register">
    <div class="mx-auto max-w-md rounded-2xl bg-white p-6 shadow-sm">
        <h1 class="mb-6 text-2xl font-bold">Register</h1>

        <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
            @csrf
            <x-form-input label="Nama" name="name" />
            <x-form-input label="Email" name="email" type="email" />
            <x-form-input label="Password" name="password" type="password" />
            <x-form-input label="Konfirmasi Password" name="password_confirmation" type="password" />

            <button type="submit" class="w-full rounded-lg bg-stone-900 px-4 py-3 font-semibold text-white">
                Daftar
            </button>
        </form>

        <p class="mt-4 text-sm text-stone-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-semibold text-stone-900">Login</a>
        </p>
    </div>
</x-layouts.app>
