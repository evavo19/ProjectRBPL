<?php

$cart_items = [
    [
        'id' => 1,
        'shop_name' => 'Jims Honey Yogyakarta',
        'product_name' => 'Jims Honey Isabelle Bag',
        'variant' => 'Black',
        'price' => 98368,
        'original_price' => 115987,
        'quantity' => 1,
        'image' => 'https://picsum.photos/seed/bag/200/200',
        'selected' => true
    ],
    [
        'id' => 2,
        'shop_name' => 'Tupperware Bantul',
        'product_name' => 'Tupperware Eco 500ml',
        'variant' => 'Navy',
        'price' => 73900,
        'original_price' => 91000,
        'quantity' => 3,
        'image' => 'https://picsum.photos/seed/bottle/200/200',
        'selected' => false
    ]
];

$total_price = 0;
$selected_count = 0;
foreach ($cart_items as $item) {
    if ($item['selected']) {
        $total_price += ($item['price'] * $item['quantity']);
        $selected_count++;
    }
}
$savings = 17093;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f5f5f5; margin: 0; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        .app-container {
            width: 390px; height: 100vh; background-color: #f5f5f5;
            border-radius: 25px; box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            overflow-y: auto; position: relative; display: flex;
            flex-direction: column; margin: 0 auto; max-width: 100%; padding-bottom: 90px;
        }
        .header-gradient { background: linear-gradient(180deg, #F54D2D 0%, #FF6433 100%); }
        .custom-checkbox {
            appearance: none; width: 18px; height: 18px;
            border: 1px solid #d1d5db; border-radius: 2px; cursor: pointer;
            position: relative; background-color: white; flex-shrink: 0;
        }
        .custom-checkbox:checked { background-color: #F54D2D; border-color: #F54D2D; }
        .custom-checkbox:checked::after {
            content: '✓'; color: white; position: absolute;
            top: 50%; left: 50%; transform: translate(-50%, -50%);
            font-size: 11px; font-weight: bold;
        }
    </style>
</head>
<body class="flex justify-center">

<div class="app-container shadow-2xl bg-gray-50">

    <!-- HEADER -->
    <div class="header-gradient sticky top-0 z-50 shadow-md">
        <div class="flex justify-between items-center px-8 pt-6 pb-2 text-white"></div>
        <div class="flex items-center justify-between px-4 pb-4 pt-1 text-white">
            <div class="flex items-center gap-3">
                <button onclick="window.history.back()">
                    <i data-lucide="arrow-left" class="w-6 h-6"></i>
                </button>
                <h1 class="text-base font-medium font-poppins">Keranjang Saya (<?= count($cart_items) ?>)</h1>
            </div>
            <div class="flex items-center gap-4">
                <button class="text-sm font-poppins font-medium">Ubah</button>
                <i data-lucide="message-circle" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    <!-- LIST KERANJANG -->
    <div class="mt-3 space-y-3 px-2">
        <?php foreach ($cart_items as $item): ?>
        <div class="bg-white rounded-md p-3 shadow-sm" data-item-id="<?= $item['id'] ?>">
            <div class="flex items-center justify-between border-b border-gray-50 pb-2 mb-3">
                <div class="flex items-center gap-3">
                    <input type="checkbox" class="custom-checkbox shop-checkbox" data-item="<?= $item['id'] ?>" <?= $item['selected'] ? 'checked' : '' ?>>
                    <div class="flex items-center gap-1">
                        <i data-lucide="store" class="w-4 h-4 text-gray-600"></i>
                        <span class="text-xs font-bold text-gray-800"><?= $item['shop_name'] ?></span>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div class="flex gap-3">
                <div class="flex items-center pt-2 self-start">
                    <input type="checkbox" class="custom-checkbox product-checkbox"
                        data-item="<?= $item['id'] ?>"
                        data-price="<?= $item['price'] ?>"
                        data-original-price="<?= $item['original_price'] ?>"
                        data-qty="<?= $item['quantity'] ?>"
                        data-name="<?= htmlspecialchars($item['product_name']) ?>"
                        data-variant="<?= $item['variant'] ?>"
                        data-shop="<?= htmlspecialchars($item['shop_name']) ?>"
                        data-image="<?= $item['image'] ?>"
                        <?= $item['selected'] ? 'checked' : '' ?>>
                </div>
                <img src="<?= $item['image'] ?>" alt="Product" class="w-20 h-20 rounded object-cover border border-gray-100">
                <div class="flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-[11px] text-gray-800 line-clamp-2 leading-tight"><?= $item['product_name'] ?></h3>
                        <div class="mt-1 inline-flex items-center gap-1 bg-gray-50 border border-gray-100 px-1.5 py-0.5 rounded text-[10px] text-gray-500">
                            <span>Variasi: <?= $item['variant'] ?></span>
                            <i data-lucide="chevron-down" class="w-3 h-3"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-end mt-2">
                        <span class="text-[#F54D2D] font-bold text-sm">Rp<?= number_format($item['price'], 0, ',', '.') ?></span>
                        <div class="flex items-center border border-gray-200 rounded-sm">
                            <button class="w-6 h-6 flex items-center justify-center text-gray-400 border-r border-gray-200 qty-btn" data-action="minus" data-item="<?= $item['id'] ?>">-</button>
                            <span class="w-8 text-center text-[11px] qty-display" data-item="<?= $item['id'] ?>"><?= $item['quantity'] ?></span>
                            <button class="w-6 h-6 flex items-center justify-center text-gray-600 border-l border-gray-200 qty-btn" data-action="plus" data-item="<?= $item['id'] ?>">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- FOOTER -->
    <div class="absolute bottom-0 left-0 w-full bg-white border-t border-gray-100 z-[60] shadow-[0_-10px_20px_rgba(0,0,0,0.03)]">
        <div class="px-4 py-2 border-b border-gray-50 flex flex-col gap-2">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <i data-lucide="ticket" class="w-5 h-5 text-[#F54D2D]"></i>
                    <span class="text-[11px] text-gray-600">Voucher Shopee</span>
                </div>
                <div class="flex items-center text-gray-400">
                    <span class="text-[11px]">Gunakan/masukkan kode</span>
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-full bg-yellow-400 flex items-center justify-center text-[9px] font-bold text-white shadow-sm">S</div>
                    <span class="text-[11px] text-gray-600">Tukarkan 47 Koin Shopee</span>
                </div>
                <div class="w-7 h-3.5 bg-gray-200 rounded-full relative">
                    <div class="absolute right-0.5 top-0.5 w-2.5 h-2.5 bg-white rounded-full shadow-sm"></div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between pl-4">
            <div class="flex items-center gap-2 py-3">
                <input type="checkbox" id="check-all" class="custom-checkbox">
                <span class="text-xs text-gray-600">Semua</span>
            </div>
            <div class="flex items-center h-full">
                <div class="text-right px-3 py-1">
                    <div class="flex items-center justify-end gap-1">
                        <span class="text-xs text-gray-800">Total</span>
                        <span class="text-[#F54D2D] font-bold text-base" id="total-price">Rp<?= number_format($total_price, 0, ',', '.') ?></span>
                    </div>
                    <p class="text-[9px] text-[#F54D2D]">Hemat Rp<?= number_format($savings, 0, ',', '.') ?></p>
                </div>
                <button onclick="goToCheckout()" class="header-gradient text-white px-8 py-5 font-bold text-sm font-poppins h-full inline-block">
                    Checkout (<span id="checkout-count"><?= $selected_count ?></span>)
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function formatRupiah(angka) {
    return 'Rp' + angka.toLocaleString('id-ID');
}

function updateTotal() {
    let total = 0, count = 0;
    document.querySelectorAll('.product-checkbox').forEach(function(cb) {
        if (cb.checked) {
            const itemId = cb.dataset.item;
            const qtyEl = document.querySelector('.qty-display[data-item="' + itemId + '"]');
            const price = parseInt(cb.dataset.price);
            const qty = qtyEl ? parseInt(qtyEl.textContent) : parseInt(cb.dataset.qty);
            total += price * qty;
            count++;
        }
    });
    document.getElementById('total-price').textContent = formatRupiah(total);
    document.getElementById('checkout-count').textContent = count;
}

function updateCheckAll() {
    const allProduct = document.querySelectorAll('.product-checkbox');
    const allChecked = Array.from(allProduct).every(cb => cb.checked);
    document.getElementById('check-all').checked = allChecked;
}

document.querySelectorAll('.shop-checkbox').forEach(function(shopCb) {
    shopCb.addEventListener('change', function() {
        const itemId = this.dataset.item;
        const productCb = document.querySelector('.product-checkbox[data-item="' + itemId + '"]');
        if (productCb) productCb.checked = this.checked;
        updateTotal(); updateCheckAll();
    });
});

document.querySelectorAll('.product-checkbox').forEach(function(productCb) {
    productCb.addEventListener('change', function() {
        const itemId = this.dataset.item;
        const shopCb = document.querySelector('.shop-checkbox[data-item="' + itemId + '"]');
        if (shopCb) shopCb.checked = this.checked;
        updateTotal(); updateCheckAll();
    });
});

document.getElementById('check-all').addEventListener('change', function() {
    document.querySelectorAll('.shop-checkbox').forEach(cb => cb.checked = this.checked);
    document.querySelectorAll('.product-checkbox').forEach(cb => cb.checked = this.checked);
    updateTotal();
});

document.querySelectorAll('.qty-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        const itemId = this.dataset.item;
        const action = this.dataset.action;
        const qtyEl = document.querySelector('.qty-display[data-item="' + itemId + '"]');
        let qty = parseInt(qtyEl.textContent);
        if (action === 'plus') qty++;
        else if (action === 'minus' && qty > 1) qty--;
        qtyEl.textContent = qty;
        const productCb = document.querySelector('.product-checkbox[data-item="' + itemId + '"]');
        if (productCb) productCb.dataset.qty = qty;
        updateTotal();
    });
});

// ============================================================
// STEP 1: Kumpulkan data item yang dipilih → simpan ke localStorage
// ============================================================
function goToCheckout() {
    const selectedItems = [];
    document.querySelectorAll('.product-checkbox:checked').forEach(function(cb) {
        const itemId = cb.dataset.item;
        const qtyEl = document.querySelector('.qty-display[data-item="' + itemId + '"]');
        selectedItems.push({
            id: itemId,
            shop_name: cb.dataset.shop,
            product_name: cb.dataset.name,
            variant: cb.dataset.variant,
            price: parseInt(cb.dataset.price),
            original_price: parseInt(cb.dataset.originalPrice),
            quantity: qtyEl ? parseInt(qtyEl.textContent) : parseInt(cb.dataset.qty),
            image: cb.dataset.image
        });
    });

    if (selectedItems.length === 0) {
        alert('Pilih minimal 1 produk untuk checkout!');
        return;
    }

    // Simpan ke localStorage agar bisa dibaca checkout.php
    localStorage.setItem('checkoutItems', JSON.stringify(selectedItems));
    window.location.href = 'checkout_pembeli.php';
}

function initLucide() {
    if (typeof lucide !== 'undefined') lucide.createIcons();
    else setTimeout(initLucide, 100);
}

window.onload = function() {
    initLucide();
    updateTotal();
    updateCheckAll();
};
</script>
</body>
</html>