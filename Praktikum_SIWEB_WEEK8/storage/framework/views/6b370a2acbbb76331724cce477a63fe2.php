
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Toko Sepatu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo e(route('products')); ?>">Produk</a>
                </li>
                </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal"
                    data-bs-target="#wishlistModal" onclick="tampilkanWishlist()">
                    ⭐ Wishlist (<span id="wishlist-count">0</span>)
                </button>

                <button id="btn-theme" class="btn btn-outline-light btn-sm me-2">
                    Mode Gelap
                </button>

                <?php if(session()->has('user')): ?>
                    <span class="text-white me-3">
                        <?php echo e(session('user')); ?>

                    </span>

                    <a href="<?php echo e(route('logout')); ?>" class="btn btn-danger btn-sm">
                        Logout
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-warning btn-sm">
                        Login
                    </a>
                <?php endif; ?>

            </div>
    </div>
</nav>

<?php /**PATH Z:\laragon\www\Praktikum_SIWEB_WEEK8\resources\views/partials/navbar.blade.php ENDPATH**/ ?>