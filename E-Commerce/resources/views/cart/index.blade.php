<x-layouts.app title="Keranjang">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-stone-500">Session Cart</p>
            <h1 class="text-3xl font-bold">Keranjang Belanja</h1>
        </div>
        <a href="{{ route('home') }}" class="rounded-lg border border-stone-300 px-4 py-3 text-sm font-semibold text-stone-700">
            Kembali Belanja
        </a>
    </div>

    <div class="grid gap-6 lg:grid-cols-[2fr_1fr]">
        <div class="space-y-4">
            @forelse ($cartItems as $item)
                <div class="rounded-2xl bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h2 class="text-lg font-bold">{{ $item['name'] }}</h2>
                            <p class="mt-1 text-sm text-stone-500">Jumlah: {{ $item['quantity'] }}</p>
                            <p class="mt-2 text-sm text-stone-700">
                                Subtotal: Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </p>
                        </div>

                        <form action="{{ route('cart.destroy', $item['product_id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-lg bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl bg-white p-6 text-stone-500 shadow-sm">
                    Keranjang masih kosong.
                </div>
            @endforelse
        </div>

        <aside class="h-fit rounded-2xl bg-stone-900 p-6 text-white shadow-sm">
            <p class="text-sm uppercase tracking-[0.3em] text-stone-400">Ringkasan</p>
            <div class="mt-4 flex items-center justify-between">
                <span>Total</span>
                <span class="text-2xl font-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <p class="mt-4 text-sm text-stone-300">
                Keranjang ini disimpan menggunakan session tanpa tabel database tambahan.
            </p>
        </aside>
    </div>
</x-layouts.app>
