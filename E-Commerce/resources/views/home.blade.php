<x-layouts.app title="Home">
    <section class="mb-8 rounded-3xl bg-stone-900 px-6 py-10 text-white">
        <p class="mb-2 text-sm uppercase tracking-[0.3em] text-stone-300">UTS SIWEB</p>
        <h1 class="mb-3 text-4xl font-bold">Landing Page Produk</h1>
        <p class="max-w-2xl text-stone-300">
            Halaman ini menampilkan seluruh produk beserta kategori. User dapat menambahkan produk ke keranjang berbasis session.
        </p>
    </section>

    <section>
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-2xl font-bold">Daftar Produk</h2>
            @auth
                @if (! auth()->user()->isAdmin())
                    <a href="{{ route('cart.index') }}" class="rounded-lg bg-white px-4 py-2 text-sm font-semibold text-stone-900 shadow-sm">
                        Lihat Cart
                    </a>
                @endif
            @endauth
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($products as $product)
                <article class="rounded-2xl bg-white p-5 shadow-sm">
                    <div class="mb-4 flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                            <p class="mt-1 text-sm text-stone-500">Stok: {{ $product->stock }}</p>
                        </div>
                        <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-800">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div>

                    <p class="mb-4 text-sm leading-6 text-stone-600">{{ $product->description }}</p>

                    <div class="mb-5 flex flex-wrap gap-2">
                        @foreach ($product->categories as $category)
                            <span class="rounded-full bg-stone-100 px-3 py-1 text-xs font-medium text-stone-700">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>

                    @auth
                        @if (! auth()->user()->isAdmin())
                            <form action="{{ route('cart.store', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full rounded-lg bg-stone-900 px-4 py-3 text-sm font-semibold text-white">
                                    Tambah ke Keranjang
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block rounded-lg bg-stone-900 px-4 py-3 text-center text-sm font-semibold text-white">
                            Login untuk beli
                        </a>
                    @endauth
                </article>
            @empty
                <div class="rounded-2xl bg-white p-6 text-stone-600 shadow-sm">
                    Belum ada produk.
                </div>
            @endforelse
        </div>
    </section>
</x-layouts.app>
