

<?php echo $__env->make('modal.wishlist', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('modal.createProduct', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3 align-items-center">
            <h3 class="mb-4">Daftar Sepatu</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
                Tambah Produk
            </button>
        </div>
        <div class="row" id="container-barang">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <img src="<?php echo e(asset('storage/' . $item->product_image)); ?>" class="card-img-top"
                                alt="<?php echo e($item->product_name); ?>" style="height: 250px; object-fit: cover;" />
                            <h5 class="card-title"><?php echo e($item->product_name); ?></h5>

                            <p class="card-text harga-text text-danger mb-1">
                                Harga: Rp <?php echo e(number_format($item->product_price, 0, ',', '.')); ?>

                            </p>

                            <p class="card-text stok-text mb-3">Stok: <?php echo e($item->product_stock); ?></p>
                            <div class="d-flex gap-2 mt-auto">
                                <button class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                                    data-bs-target="#editProdukModal<?php echo e($item->product_id); ?>">Update</button>

                                <form action="<?php echo e(route('products.destroy', $item->product_id)); ?>" method="POST"
                                    class="w-100 m-0"
                                    onsubmit="return confirm('Yakin ingin menghapus produk <?php echo e($item->product_name); ?>?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->make('modal.updateProduct', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH Z:\laragon\www\Praktikum_SIWEB_WEEK8\resources\views/product.blade.php ENDPATH**/ ?>