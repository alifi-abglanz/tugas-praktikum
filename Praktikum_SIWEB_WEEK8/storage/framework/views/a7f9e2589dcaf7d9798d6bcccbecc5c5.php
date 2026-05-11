<div class="modal fade" id="editProdukModal<?php echo e($item->product_id); ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(route('products.update', $item->product_id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Update Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="product_name" value="<?php echo e($item->product_name); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-control" name="category_id" required>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->category_id); ?>" <?php echo e($item->category_id == $cat->category_id ? 'selected' : ''); ?>>
                                    <?php echo e($cat->category_name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" name="product_price" value="<?php echo e($item->product_price); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok Produk</label>
                        <input type="number" class="form-control" name="product_stock" value="<?php echo e($item->product_stock); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ganti Gambar Produk (Opsional)</label>
                        <div class="mb-2">
                            <img src="<?php echo e(asset('storage/' . $item->product_image)); ?>" alt="Current Image" class="img-thumbnail" style="width: 100px;">
                        </div>
                        <input type="file" class="form-control" name="product_image">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH Z:\laragon\www\Praktikum_SIWEB_WEEK8\resources\views/modal/updateProduct.blade.php ENDPATH**/ ?>