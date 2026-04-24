<?php

$product_summary = [
    'id' => 'ORD-12345',
    'product_name' => 'Wireless Headphones Premium Edition',
    'quantity' => 2,
    'customer_name' => 'Intan Nur',
    'shipping_address' => 'Dahromo 2, Segoroyoso, Pleret, Bantul, DI Yogyakarta',
    'order_date' => '14 Desember 2025',
    'estimated_arrival' => '17-18 Desember 2025',
    'price' => 250000,
    'total_payment' => 500000,
    'status' => 'Perlu Dikirim'
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Penjual - Penjual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e5e7eb;
            display: flex;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .app-container {
            width: 100%;
            max-width: 390px;
            height: 844px;
            background-color: #F8F8F8;
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border-radius: 25px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .scrollable-content {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 100px;
        }

        .scrollable-content::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>

    <div class="app-container">

        <div class="bg-orange-600 text-white px-6 pt-4 pb-2">

            <div class="flex items-center py-4 gap-3">
                <button onclick="window.history.back()" class="active:opacity-70 transition">
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                </button>
                <h1 class="text-lg font-semibold">Ringkasan Produk</h1>
            </div>
        </div>

        <div class="scrollable-content">
            <div class="bg-orange-50 border-b border-orange-100 p-4 flex items-center gap-3">
                <i data-lucide="info" class="w-5 h-5 text-orange-600"></i>
                <p class="text-[11px] text-orange-800">Pesanan ini sedang menunggu pengemasan. Silakan kirim sebelum batas waktu.</p>
            </div>

            <div class="p-4 space-y-3">

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-start">
                    <div class="space-y-1">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Nama Produk</p>
                        <h2 class="text-sm font-bold text-gray-800"><?= $product_summary['product_name'] ?></h2>
                    </div>
                    <button class="bg-orange-600 text-white text-[10px] px-4 py-1.5 rounded-lg font-bold shadow-sm active:scale-95 transition">Edit</button>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <div class="space-y-1">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Jumlah Pesanan</p>
                        <p class="text-sm font-bold text-gray-700"><?= $product_summary['quantity'] ?> Pcs</p>
                    </div>
                    <button class="bg-orange-600 text-white text-[10px] px-4 py-1.5 rounded-lg font-bold shadow-sm active:scale-95 transition">Edit</button>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-start">
                    <div class="space-y-1 flex-1 pr-4">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Alamat Pengiriman</p>
                        <p class="text-xs font-bold text-gray-800 mt-1"><?= $product_summary['customer_name'] ?></p>
                        <p class="text-[11px] text-gray-500 leading-relaxed"><?= $product_summary['shipping_address'] ?></p>
                    </div>
                    <button class="bg-orange-600 text-white text-[10px] px-4 py-1.5 rounded-lg font-bold shadow-sm active:scale-95 transition">Edit</button>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 space-y-4">
                    <div class="flex justify-between items-center">
                        <div class="space-y-1">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Tanggal Pesan</p>
                            <p class="text-xs font-bold text-gray-700"><?= $product_summary['order_date'] ?></p>
                        </div>
                        <button class="bg-orange-600 text-white text-[10px] px-4 py-1.5 rounded-lg font-bold shadow-sm active:scale-95 transition">Edit</button>
                    </div>
                    <div class="border-t border-gray-50 pt-3 flex justify-between items-center">
                        <div class="space-y-1">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Estimasi Tiba</p>
                            <p class="text-xs font-bold text-gray-700"><?= $product_summary['estimated_arrival'] ?></p>
                        </div>
                        <button class="bg-orange-600 text-white text-[10px] px-4 py-1.5 rounded-lg font-bold shadow-sm active:scale-95 transition">Edit</button>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-3">Rincian Pembayaran</p>
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Harga Satuan</span>
                            <span class="text-gray-800 font-medium">Rp <?= number_format($product_summary['price'], 0, ',', '.') ?></span>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Total Pesanan (<?= $product_summary['quantity'] ?>x)</span>
                            <span class="text-gray-800 font-bold">Rp <?= number_format($product_summary['total_payment'], 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 px-2">
                    <button onclick="saveProduct()" class="w-full bg-orange-600 text-white font-bold py-4 rounded-full shadow-lg active:scale-95 hover:bg-orange-700 transition-all flex items-center justify-center gap-2">
                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                        Simpan Perubahan
                    </button>
                    <button class="w-full mt-3 bg-white text-gray-500 font-bold py-3 rounded-full border border-gray-200 text-sm active:bg-gray-50 transition-all">
                        Batalkan
                    </button>
                </div>
            </div>
        </div>

        <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[389px] h-20 bg-white border-t rounded-t-[25px] rounded-b-[25px] shadow-[0px_-2px_10px_rgba(0,0,0,0.05)] flex justify-around items-center px-5 pb-4 z-50">
            <a href="index_penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="layout-grid" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Dashboard</span>
            </a>
            <a href="pesanan_penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="shopping-bag" class="w-6 h-6 flex items-center justify-center text-orange-600"></i>
                <span class="text-[9px] text-orange-600 font-bold font-montserrat text-brand transition-colors">Produk</span>
            </a>
            <a href="tambah_produk_penjualan.php" class="relative -top-4 bg-white p-3 rounded-full shadow-lg cursor-pointer hover:scale-105 transition">
                <div class="bg-orange-600 w-12 h-12 rounded-full flex items-center justify-center text-white">
                    <i data-lucide="plus" class="w-6 h-6"></i>
                </div>
            </a>
            <a href="notifikasi_penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="bell" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Notifikasi</span>
            </a>
            <a href="penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="user" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Saya</span>
            </a>
        </div>

    </div>

    <script>
        function saveProduct() {
            const btn = event.currentTarget;
            const originalContent = btn.innerHTML;

            btn.innerHTML = '<i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i> Menyimpan...';
            lucide.createIcons();
            btn.disabled = true;
            btn.classList.add('opacity-80');

            setTimeout(() => {
                btn.innerHTML = '<i data-lucide="check" class="w-5 h-5"></i> Berhasil Disimpan!';
                btn.classList.replace('bg-orange-600', 'bg-green-600');
                lucide.createIcons();

                setTimeout(() => {
                    btn.innerHTML = originalContent;
                    btn.classList.replace('bg-green-600', 'bg-orange-600');
                    btn.disabled = false;
                    btn.classList.remove('opacity-80');
                    lucide.createIcons();
                }, 2000);
            }, 1500);
        }

        function initLucide() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            } else {
                setTimeout(initLucide, 100);
            }
        }

        window.onload = function() {
            initLucide();

            function updateClock() {
                const now = new Date();
                const timeStr = String(now.getHours()).padStart(2, '0') + ':' +
                    String(now.getMinutes()).padStart(2, '0');
                const timeEl = document.getElementById('current-time');
                if (timeEl) timeEl.innerText = timeStr;
            }
            setInterval(updateClock, 1000);
            updateClock();
        };
    </script>
</body>

</html>