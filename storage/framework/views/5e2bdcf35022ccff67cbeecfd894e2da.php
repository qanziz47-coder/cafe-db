

<?php $__env->startSection('title', 'Pesanan Saya'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .order-card {
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.05);
        border-radius: 20px;
        transition: all 0.3s;
        overflow: hidden;
    }
    .order-card:hover {
        border-color: rgba(200,168,124,0.2);
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
    }
    .order-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid rgba(255,255,255,0.04);
    }
    .order-item:last-child {
        border-bottom: none;
    }
    .order-item .item-name {
        color: #fff;
        font-weight: 400;
        font-size: 15px;
    }
    .order-item .item-price {
        color: #c8a87c;
        font-weight: 600;
        font-size: 15px;
    }
    .order-item .item-qty {
        color: rgba(255,255,255,0.3);
        font-size: 14px;
        margin: 0 15px;
    }
    .order-item .qty-control {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .order-item .qty-control button {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        color: #fff;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 16px;
    }
    .order-item .qty-control button:hover {
        background: #c8a87c;
        border-color: #c8a87c;
        color: #0a0a0a;
    }
    .order-item .qty-control span {
        color: #fff;
        font-weight: 500;
        min-width: 20px;
        text-align: center;
    }
    .payment-summary {
        background: rgba(255,255,255,0.02);
        border-radius: 16px;
        padding: 20px;
        margin-top: 15px;
    }
    .payment-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        color: rgba(255,255,255,0.6);
        font-size: 14px;
    }
    .payment-row.total {
        border-top: 1px solid rgba(255,255,255,0.08);
        margin-top: 8px;
        padding-top: 15px;
        font-size: 18px;
        font-weight: 700;
        color: #c8a87c;
    }
    .btn-bayar {
        background: #c8a87c;
        border: none;
        color: #0a0a0a;
        padding: 14px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 16px;
        letter-spacing: 1px;
        transition: all 0.3s;
        width: 100%;
        margin-top: 15px;
    }
    .btn-bayar:hover {
        background: #d4b88c;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(200,168,124,0.3);
        color: #0a0a0a;
    }
    .btn-bayar:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }
    .menu-item-card {
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.05);
        border-radius: 16px;
        padding: 15px;
        transition: all 0.3s;
        cursor: pointer;
    }
    .menu-item-card:hover {
        border-color: rgba(200,168,124,0.2);
        background: rgba(255,255,255,0.04);
    }
    .menu-item-card .menu-name {
        color: #fff;
        font-weight: 500;
        font-size: 14px;
    }
    .menu-item-card .menu-price {
        color: #c8a87c;
        font-weight: 600;
        font-size: 14px;
    }
    .menu-item-card .btn-add {
        background: #c8a87c;
        border: none;
        color: #0a0a0a;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .menu-item-card .btn-add:hover {
        background: #d4b88c;
        transform: scale(1.05);
    }
    .badge-status {
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 500;
    }
</style>

<div class="container mt-4">
    <div class="row">
        <!-- Kolom Kiri: Daftar Pesanan -->
        <div class="col-lg-7">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 style="font-family: 'Playfair Display', serif; color: #fff;">
                        <span style="color: #c8a87c;">☕</span> Coffee Shop
                    </h2>
                    <p style="color: rgba(255,255,255,0.3); font-weight: 300; margin: 0;">
                        <i class="bi bi-cart"></i> Pesanan Anda
                    </p>
                </div>
                <?php if(session('success')): ?>
                    <div class="alert" style="background: rgba(40,167,69,0.1); border: 1px solid rgba(40,167,69,0.2); border-radius: 12px; color: #28a745; padding: 10px 18px; margin: 0;">
                        <i class="bi bi-check-circle"></i> <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
            </div>

            <?php if($orders->isEmpty()): ?>
                <div class="text-center py-5" style="background: rgba(255,255,255,0.02); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05);">
                    <i class="bi bi-cart" style="font-size: 64px; color: rgba(200,168,124,0.3);"></i>
                    <h4 style="color: rgba(255,255,255,0.5); margin-top: 15px;">Keranjang Kosong</h4>
                    <p style="color: rgba(255,255,255,0.3);">Mulai pesan menu favorit Anda!</p>
                    <a href="<?php echo e(route('customer.index')); ?>" class="btn" style="background: #c8a87c; color: #0a0a0a; border-radius: 50px; padding: 12px 30px; margin-top: 10px; font-weight: 600;">
                        <i class="bi bi-eye"></i> Lihat Menu
                    </a>
                </div>
            <?php else: ?>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="order-card mb-4">
                        <div style="padding: 20px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span style="color: rgba(255,255,255,0.3); font-size: 13px;">
                                        <i class="bi bi-clock"></i> <?php echo e($order->created_at->format('d M Y, H:i')); ?>

                                    </span>
                                    <span class="badge-status" style="background: 
                                        <?php if($order->status == 'pending'): ?> rgba(255,193,7,0.2); color: #ffc107;
                                        <?php elseif($order->status == 'processing'): ?> rgba(13,202,240,0.2); color: #0dcaf0;
                                        <?php elseif($order->status == 'completed'): ?> rgba(40,167,69,0.2); color: #28a745;
                                        <?php else: ?> rgba(220,53,69,0.2); color: #dc3545;
                                        <?php endif; ?>
                                    ">
                                        <?php echo e(ucfirst($order->status)); ?>

                                    </span>
                                </div>
                                <span style="color: rgba(255,255,255,0.2); font-size: 13px;">#<?php echo e($order->order_number); ?></span>
                            </div>

                            <!-- Item Pesanan -->
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="order-item">
                                    <div>
                                        <span class="item-name"><?php echo e($item->menu->nama); ?></span>
                                        <span class="item-qty">× <?php echo e($item->quantity); ?></span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <span class="item-price">Rp <?php echo e(number_format($item->price * $item->quantity, 0, ',', '.')); ?></span>
                                        <div class="qty-control">
                                            <form action="<?php echo e(route('orders.update-qty', $item)); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <input type="hidden" name="quantity" value="<?php echo e($item->quantity - 1); ?>">
                                                <button type="submit" <?php echo e($item->quantity <= 1 ? 'disabled' : ''); ?>>-</button>
                                            </form>
                                            <span><?php echo e($item->quantity); ?></span>
                                            <form action="<?php echo e(route('orders.update-qty', $item)); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <input type="hidden" name="quantity" value="<?php echo e($item->quantity + 1); ?>">
                                                <button type="submit">+</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <!-- Payment Summary -->
                            <div class="payment-summary">
                                <div class="payment-row">
                                    <span>Subtotal</span>
                                    <span>Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></span>
                                </div>
                                <div class="payment-row">
                                    <span>Pajak (0%)</span>
                                    <span>Rp 0</span>
                                </div>
                                <div class="payment-row total">
                                    <span>Total</span>
                                    <span>Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></span>
                                </div>
                                <a href="<?php echo e(route('orders.show', $order)); ?>" class="btn-bayar">
                                    <i class="bi bi-credit-card"></i> BAYAR
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="mt-4">
                    <?php echo e($orders->links('pagination::bootstrap-5')); ?>

                </div>
            <?php endif; ?>
        </div>

        <!-- Kolom Kanan: Menu Cepat -->
        <div class="col-lg-5">
            <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); border-radius: 20px; padding: 25px; position: sticky; top: 100px;">
                <h5 style="color: #fff; font-family: 'Playfair Display', serif; margin-bottom: 20px;">
                    <i class="bi bi-plus-circle" style="color: #c8a87c;"></i> Tambah Menu
                </h5>
                <p style="color: rgba(255,255,255,0.3); font-size: 13px; margin-bottom: 15px;">
                    Klik tombol + untuk menambah ke pesanan
                </p>

                <?php
                    $allMenus = App\Models\Menu::where('tersedia', true)->take(5)->get();
                ?>

                <?php $__currentLoopData = $allMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="menu-item-card mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="menu-name"><?php echo e($menu->nama); ?></div>
                                <div class="menu-price">Rp <?php echo e(number_format($menu->harga, 0, ',', '.')); ?></div>
                            </div>
                            <a href="<?php echo e(route('orders.add-item', $menu)); ?>" class="btn-add">
                                <i class="bi bi-plus"></i> Tambah
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="text-center mt-3">
                    <a href="<?php echo e(route('customer.index')); ?>" style="color: rgba(255,255,255,0.3); text-decoration: none; font-size: 13px;">
                        <i class="bi bi-eye"></i> Lihat semua menu →
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cafe\resources\views/orders/index.blade.php ENDPATH**/ ?>