<?php

/**
 * Backend Logic (Simulasi Database)
 * Data rincian pesanan pembeli
 */
$user_address = [
    'name' => 'Eva Dewi Agustin',
    'phone' => '+62 812-3456-7890',
    'address' => 'Plambongan Triwidadi Pajangan Bantul, Yogyakarta RT 03, PAJANGAN, KAB. BANTUL, DI YOGYAKARTA, ID 55751'
];

$product = [
    'shop' => 'Jims Honey Yogyakarta',
    'name' => 'Jims Honey Isabelle Bag',
    'variant' => 'Black',
    'price' => 98368,
    'original_price' => 115987,
    'image' => 'https://picsum.photos/seed/bag2/200/200',
    'protection_fee' => 500
];

$shipping = [
    'type' => 'Reguler',
    'cost' => 8000,
    'eta' => '17 - 20 Des',
    'promo' => 'Gratis Ongkir'
];

$billing = [
    'subtotal_product' => 98368,
    'subtotal_shipping' => 8000,
    'service_fee' => 1000,
    'shipping_discount' => -8000,
    'voucher_discount' => -5000,
];

$total_payment = array_sum($billing);
$total_savings = 21619;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Shopee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .app-container {
            width: 390px;
            height: 100vh;
            background: #f3f4f6;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow-y: auto;
            overflow-x: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            max-width: 100%;
            padding-bottom: 100px;
        }

        .header-gradient {
            background: linear-gradient(180deg, #F54D2D 0%, #FF6433 100%);
        }

        .shopee-border {
            border-left: 3px solid #F54D2D;
        }

        .app-container {
            scrollbar-width: none;
            /* Firefox */
        }

        .app-container::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari */
        }
    </style>
</head>

<body class="flex justify-center">

    <div class="app-container shadow-2xl overflow-x-hidden">

        <!-- HEADER INTEGRATED -->
        <div class="header-gradient sticky top-0 z-50">
            <!-- STATUS BAR (Menyatu) -->
            <div class="flex justify-between items-center px-8 pt-6 pb-2 text-white">
                <span class="text-xs font-semibold font-poppins" id="clock">09:27</span>
                <div class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                    </svg>
                    <div class="w-5 h-2.5 border border-white rounded-[2px] p-[1px] flex justify-start items-center">
                        <div class="bg-white h-full w-[70%] rounded-[1px]"></div>
                    </div>
                </div>
            </div>

            <!-- Navbar Checkout -->
            <div class="flex items-center px-4 pb-4 pt-1 text-white gap-3">
                <button onclick="window.history.back()">
                    <i data-lucide="arrow-left" class="w-6 h-6"></i>
                </button>
                <h1 class="text-lg font-medium font-poppins">Checkout</h1>
            </div>
        </div>

        <!-- ALAMAT PENGIRIMAN -->
        <div class="bg-white p-4 relative mb-2">
            <div class="flex items-start gap-3">
                <i data-lucide="map-pin" class="w-5 h-5 text-[#F54D2D] mt-0.5"></i>
                <div class="flex-1">
                    <h2 class="text-xs font-medium text-gray-800">Alamat Pengiriman</h2>
                    <div class="mt-2 text-[11px] leading-relaxed">
                        <span class="font-bold text-gray-900"><?= $user_address['name'] ?></span>
                        <span class="text-gray-500 ml-1"><?= $user_address['phone'] ?></span>
                        <p class="text-gray-600 mt-1"><?= $user_address['address'] ?></p>
                    </div>
                </div>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400 mt-1"></i>
            </div>
            <!-- Border Garis Warna-warni Shopee Style -->
            <div class="absolute bottom-0 left-0 w-full h-1 bg-repeat-x" style="background-image: linear-gradient(90deg, #f54d2d 25%, #ffffff 25%, #ffffff 50%, #4a90e2 50%, #4a90e2 75%, #ffffff 75%, #ffffff 100%); background-size: 40px 100%;"></div>
        </div>

        <!-- PRODUK & TOKO -->
        <div class="bg-white mb-2">
            <div class="p-4 border-b border-gray-50 flex items-center gap-2">
                <span class="bg-[#F54D2D] text-white text-[9px] px-1 rounded font-bold uppercase">Star</span>
                <span class="text-xs font-bold"><?= $product['shop'] ?></span>
            </div>

            <div class="p-4 flex gap-3">
                <img src="<?= $product['image'] ?>" class="w-20 h-20 rounded border border-gray-100 object-cover">
                <div class="flex-1">
                    <h3 class="text-xs text-gray-800 line-clamp-2"><?= $product['name'] ?></h3>
                    <p class="text-[10px] text-gray-400 mt-1">Variasi: <?= $product['variant'] ?></p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="text-xs font-bold">Rp<?= number_format($product['price'], 0, ',', '.') ?></span>
                        <span class="text-[10px] text-gray-300 line-through">Rp<?= number_format($product['original_price'], 0, ',', '.') ?></span>
                    </div>
                </div>
            </div>

            <!-- Proteksi Kerusakan -->
            <div class="mx-4 p-3 bg-gray-50 rounded flex items-start gap-3 mb-4">
                <input type="checkbox" checked class="mt-1 accent-[#F54D2D]">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <span class="text-[11px] font-medium">Proteksi Kerusakan</span>
                        <span class="text-[11px]">Rp<?= number_format($product['protection_fee'], 0, ',', '.') ?></span>
                    </div>
                    <p class="text-[10px] text-gray-500 mt-0.5">Melindungi produkmu dari kerusakan total selama 6 bulan. <span class="text-blue-500">Pelajari</span></p>
                </div>
            </div>
        </div>

        <!-- OPSI PENGIRIMAN -->
        <div class="bg-blue-50/30 p-4 mb-2 border-y border-gray-100">
            <div class="flex justify-between items-center mb-3">
                <span class="text-xs font-medium text-gray-800">Opsi Pengiriman</span>
                <div class="flex items-center text-blue-600 font-medium">
                    <span class="text-[11px]">Lihat Semua</span>
                    <i data-lucide="chevron-right" class="w-3 h-3"></i>
                </div>
            </div>
            <div class="shopee-border pl-3">
                <div class="flex justify-between items-center">
                    <span class="text-xs font-bold text-gray-900"><?= $shipping['type'] ?></span>
                    <span class="text-xs font-medium">Rp<?= number_format($shipping['cost'], 0, ',', '.') ?></span>
                </div>
                <p class="text-[10px] text-teal-600 mt-1">Garansi tiba <?= $shipping['eta'] ?></p>
                <p class="text-[10px] text-gray-400 mt-1 leading-tight">Voucher s/d Rp10.000 jika pesanan belum tiba 20 Des 2025.</p>
                <div class="mt-2 flex items-center gap-1">
                    <span class="text-[10px] text-teal-600 bg-teal-50 px-1 rounded">Gratis Ongkir</span>
                </div>
            </div>
        </div>

        <!-- VOUCHER & KOIN -->
        <div class="bg-white mb-2 divide-y divide-gray-50">
            <div class="p-4 flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <i data-lucide="ticket" class="w-5 h-5 text-[#F54D2D]"></i>
                    <span class="text-xs text-gray-800">Voucher Shopee</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-[10px] text-[#F54D2D] border border-[#F54D2D] px-1 rounded">-Rp.5rb</span>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                </div>
            </div>
            <div class="p-4 flex justify-between items-center opacity-50">
                <div class="flex items-center gap-2">
                    <i data-lucide="coins" class="w-5 h-5 text-yellow-500"></i>
                    <span class="text-xs text-gray-800">Tukarkan 47 Koin Shopee</span>
                </div>
                <div class="w-8 h-4 bg-gray-200 rounded-full relative">
                    <div class="absolute left-0.5 top-0.5 w-3 h-3 bg-white rounded-full shadow-sm"></div>
                </div>
            </div>
        </div>

        <!-- METODE PEMBAYARAN -->
        <div class="bg-white mb-2 divide-y divide-gray-50">
            <div class="p-4 flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <i data-lucide="credit-card" class="w-5 h-5 text-[#F54D2D]"></i>
                    <span class="text-xs text-gray-800">Metode Pembayaran</span>
                </div>
                <div class="flex items-center gap-1">
                    <span class="text-[11px] text-gray-800 font-medium">SPayLater</span>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                </div>
            </div>
            <div class="p-4 flex justify-between items-center">
                <span class="text-[11px] text-gray-500 italic">Aktifkan sekarang & dapatkan Bonus 50RB</span>
                <button class="text-[11px] text-[#F54D2D] font-bold border border-[#F54D2D] px-3 py-1 rounded">Ajukan Uang</button>
            </div>
        </div>

        <!-- RINCIAN PEMBAYARAN -->
        <div class="bg-white p-4 mb-2">
            <h2 class="text-xs font-bold text-gray-800 mb-3">Rincian Pembayaran</h2>
            <div class="space-y-2">
                <div class="flex justify-between text-[11px] text-gray-500">
                    <span>Subtotal untuk Produk</span>
                    <span>Rp<?= number_format($billing['subtotal_product'], 0, ',', '.') ?></span>
                </div>
                <div class="flex justify-between text-[11px] text-gray-500">
                    <span>Subtotal Pengiriman</span>
                    <span>Rp<?= number_format($billing['subtotal_shipping'], 0, ',', '.') ?></span>
                </div>
                <div class="flex justify-between text-[11px] text-gray-500">
                    <span>Biaya Layanan</span>
                    <span>Rp<?= number_format($billing['service_fee'], 0, ',', '.') ?></span>
                </div>
                <div class="flex justify-between text-[11px] text-gray-500">
                    <span>Total Diskon Pengiriman</span>
                    <span class="text-[#F54D2D]">-Rp<?= number_format(abs($billing['shipping_discount']), 0, ',', '.') ?></span>
                </div>
                <div class="flex justify-between text-[11px] text-gray-500">
                    <span>Voucher Diskon</span>
                    <span class="text-[#F54D2D]">-Rp<?= number_format(abs($billing['voucher_discount']), 0, ',', '.') ?></span>
                </div>
                <div class="flex justify-between text-sm font-bold text-gray-800 pt-2 border-t border-gray-50">
                    <span>Total Pembayaran</span>
                    <span class="text-[#F54D2D]">Rp<?= number_format($total_payment, 0, ',', '.') ?></span>
                </div>
            </div>
        </div>

        <!-- STICKY BOTTOM BUTTON -->
        <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[390px] bg-white border-t border-gray-100 flex items-center justify-end z-[100] shadow-lg rounded-b-[25px] overflow-hidden">
            <div class="text-right px-2">
                <div class="text-[10px] text-gray-800">Total Pembayaran</div>
                <div class="text-[#F54D2D] font-bold text-base">Rp<?= number_format($total_payment, 0, ',', '.') ?></div>
                <div class="text-[9px] text-[#F54D2D]">Hemat Rp<?= number_format($total_savings, 0, ',', '.') ?></div>
            </div>
            <a href="beranda2.php" class="header-gradient text-white px-8 py-5 font-bold text-sm font-poppins inline-block">
                Buat Pesanan
            </a>
        </div>
    </div>

    </div>

    <script>
        function initLucide() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            } else {
                setTimeout(initLucide, 100);
            }
        }

        function updateClock() {
            const now = new Date();
            const timeStr = String(now.getHours()).padStart(2, '0') + ':' +
                String(now.getMinutes()).padStart(2, '0');
            const clockElement = document.getElementById('clock');
            if (clockElement) clockElement.innerText = timeStr;
        }

        window.onload = function() {
            initLucide();
            setInterval(updateClock, 1000);
            updateClock();
        };
    </script>
</body>

</html>