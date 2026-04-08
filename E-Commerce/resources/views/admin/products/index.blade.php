<x-layouts.app title="Admin Produk">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-stone-500">Admin Panel</p>
            <h1 class="text-3xl font-bold">Kelola Produk</h1>
        </div>
        <a href="{{ route('admin.products.create') }}" class="rounded-lg bg-stone-900 px-4 py-3 text-sm font-semibold text-white">
            Tambah Produk
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
        <table class="min-w-full divide-y divide-stone-200">
            <thead class="bg-stone-50">
                <tr class="text-left text-sm font-semibold text-stone-700">
                    <th class="px-4 py-3">Produk</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100 text-sm">
                @forelse ($products as $product)
                    <tr>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-stone-900">{{ $product->name }}</p>
                            <p class="text-stone-500">{{ $product->description }}</p>
                        </td>
                        <td class="px-4 py-4">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-4">{{ $product->stock }}</td>
                        <td class="px-4 py-4">
                            <div class="flex flex-wrap gap-2">
                                @foreach ($product->categories as $category)
                                    <span class="rounded-full bg-stone-100 px-2 py-1 text-xs text-stone-700">{{ $category->name }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="rounded-lg bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-800">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-stone-500">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</x-layouts.app>
