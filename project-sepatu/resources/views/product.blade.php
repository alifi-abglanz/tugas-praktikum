<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk | Cibaduyut Shoes</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav>
        <div class="nav-title">Cibaduyut Shoes.
             <button id="btn-theme" class="btn-outline-light btn-sm">
                Mode Gelap
             </button>
        </div>

        <div style="margin: 10px; display:flex; align-items:center; gap: 20px; color:#fff;">
            <span>Halo, <strong>{{ session('user') }}</strong></span>
            <a href="{{ route('indeks') }}" class="btn-outline-light btn-sm">Beranda</a>
            <a href="{{ route('logout') }}" class="btn-outline-light btn-sm">Logout</a>
        </div>
    </nav>

    <section class="hero" style="height: 35vh; margin-bottom: 32px; background-image: url('{{ asset('assets/background.jpg') }}'); background-size: cover; background-position: center;">
        <div class="hero-content">
            <h1>Daftar Produk</h1>
            <p>Menampilkan semua produk yang tersimpan di database.</p>
        </div>
    </section>

    <div class="container">
        @if (session('success'))
            <div style="margin-bottom: 20px; padding: 14px 18px; border-radius: 12px; background: #d1fae5; color: #065f46;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="margin-bottom: 20px; padding: 14px 18px; border-radius: 12px; background: #fee2e2; color: #991b1b;">
                <strong>Data produk belum valid.</strong>
                <ul style="margin: 10px 0 0 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; gap: 16px; flex-wrap: wrap;">
            <div>
                <h2 style="margin: 0;">Semua Produk</h2>
                <p style="margin: 6px 0 0; opacity: 0.8;">Total produk: {{ $products->count() }}</p>
            </div>
            <a href="#product-modal" class="btn-main" id="open-product-modal">Tambah Produk</a>
        </div>

        <div class="product-grid">
            @forelse ($products as $item)
                <div class="card">
                    <img src="{{ asset('assets/background.jpg') }}" alt="{{ $item->product_name }}">
                    <div class="card-body">
                        <div>
                            <div class="card-title">{{ $item->product_name }}</div>
                            <p class="card-desc">
                                Kategori: {{ $item->category->category_name ?? 'Tanpa kategori' }}
                            </p>
                            <p class="stok-text">Stok: {{ $item->product_stock }}</p>
                        </div>
                        <h3>IDR {{ number_format($item->product_price, 0, ',', '.') }}</h3>
                        <a href="#" class="btn-main">Belanja Sekarang</a>
                    </div>
                </div>
            @empty
                <div class="card" style="grid-column: 1 / -1;">
                    <div class="card-body">
                        <div class="card-title">Belum ada produk</div>
                        <p class="card-desc">Data produk dari database masih kosong. Tambahkan data terlebih dahulu agar tampil di halaman ini.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <div class="modal-overlay {{ $errors->any() ? 'is-open' : '' }}" id="product-modal">
        <div class="modal-card">
            <div class="modal-header">
                <div>
                    <h3>Tambah Produk</h3>
                    <p>Masukkan data produk baru ke database.</p>
                </div>
                <a href="#" class="modal-close" id="close-product-modal" aria-label="Tutup modal">&times;</a>
            </div>

            <form action="{{ route('products.store') }}" method="POST" class="product-form">
                @csrf

                <label class="input-label" for="product_name">Nama Produk</label>
                <input
                    type="text"
                    id="product_name"
                    name="product_name"
                    class="text-input"
                    value="{{ old('product_name') }}"
                    required
                >

                <label class="input-label" for="category_id">Kategori</label>
                <select id="category_id" name="category_id" class="text-input" required>
                    <option value="">Pilih kategori</option>
                    @foreach ($category as $cat)
                        <option value="{{ $cat->category_id }}" {{ old('category_id') == $cat->category_id ? 'selected' : '' }}>
                            {{ $cat->category_name }}
                        </option>
                    @endforeach
                </select>

                <label class="input-label" for="product_price">Harga Produk</label>
                <input
                    type="number"
                    id="product_price"
                    name="product_price"
                    class="text-input"
                    value="{{ old('product_price') }}"
                    min="0"
                    required
                >

                <label class="input-label" for="product_stock">Stok Produk</label>
                <input
                    type="number"
                    id="product_stock"
                    name="product_stock"
                    class="text-input"
                    value="{{ old('product_stock') }}"
                    min="0"
                    required
                >

                <div class="modal-actions">
                    <a href="#" class="btn-outline-light modal-cancel" id="cancel-product-modal">Batal</a>
                    <button type="submit" class="btn-main">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Cibaduyut Shoes.</p>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
