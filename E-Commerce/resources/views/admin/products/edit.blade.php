<x-layouts.app title="Edit Produk">
    <div class="mb-6">
        <p class="text-sm uppercase tracking-[0.3em] text-stone-500">Admin Panel</p>
        <h1 class="text-3xl font-bold">Edit Produk</h1>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm">
        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.products.form')
        </form>
    </div>
</x-layouts.app>
