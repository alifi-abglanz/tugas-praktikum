@php
    $selectedCategories = old('categories', $product->categories->pluck('id')->all() ?? []);
@endphp

<div class="grid gap-6 lg:grid-cols-[2fr_1fr]">
    <div class="space-y-4">
        <x-form-input label="Nama Produk" name="name" :value="$product->name" />

        <div class="space-y-2">
            <label for="description" class="block text-sm font-medium text-stone-700">Deskripsi</label>
            <textarea id="description" name="description" rows="5" class="w-full rounded-lg border border-stone-300 bg-white px-4 py-2.5 outline-none transition focus:border-stone-900">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <x-form-input label="Harga" name="price" type="number" min="0" step="0.01" :value="$product->price" />
            <x-form-input label="Stok" name="stock" type="number" min="0" :value="$product->stock" />
        </div>
    </div>

    <div class="rounded-2xl border border-stone-200 p-5">
        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.2em] text-stone-500">Kategori</p>
        <div class="space-y-3">
            @foreach ($categories as $category)
                <label class="flex items-center gap-3 text-sm text-stone-700">
                    <input
                        type="checkbox"
                        name="categories[]"
                        value="{{ $category->id }}"
                        class="size-4 rounded border-stone-300 text-stone-900 focus:ring-stone-900"
                        @checked(in_array($category->id, $selectedCategories))
                    >
                    <span>{{ $category->name }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div>

<div class="mt-6 flex gap-3">
    <button type="submit" class="rounded-lg bg-stone-900 px-4 py-3 text-sm font-semibold text-white">
        Simpan
    </button>
    <a href="{{ route('admin.products.index') }}" class="rounded-lg border border-stone-300 px-4 py-3 text-sm font-semibold text-stone-700">
        Batal
    </a>
</div>
