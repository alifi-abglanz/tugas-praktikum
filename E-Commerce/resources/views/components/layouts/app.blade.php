<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'E-Commerce Sederhana' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app-fallback.css') }}">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-stone-100 text-stone-900">
    <div class="min-h-screen">
        <header class="border-b border-stone-200 bg-white">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
                <a href="{{ route('home') }}" class="text-xl font-bold text-stone-900">E-Commerce Sederhana</a>
                <nav class="flex items-center gap-3 text-sm">
                    <a href="{{ route('home') }}" class="rounded-md px-3 py-2 hover:bg-stone-100">Home</a>

                    @auth
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('admin.products.index') }}" class="rounded-md px-3 py-2 hover:bg-stone-100">Admin</a>
                        @else
                            <a href="{{ route('cart.index') }}" class="rounded-md px-3 py-2 hover:bg-stone-100">Cart</a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="rounded-md bg-stone-900 px-3 py-2 text-white">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 hover:bg-stone-100">Login</a>
                        <a href="{{ route('register') }}" class="rounded-md bg-stone-900 px-3 py-2 text-white">Register</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="mx-auto max-w-6xl px-4 py-8">
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>
