<?php

$seller_data = [
    'shop_name' => 'Seller Operations',
    'shop_url' => 'shopee.co.id/selleroperations',
    'avatar' => 'https://picsum.photos/seed/shop123/200/200',
    'announcements' => [
        ['title' => 'JUALAN DI SHOPEE JADI SEMAKIN HANDAL', 'subtitle' => 'KAMPUS SHOPEE', 'color' => 'bg-orange-600'],
    ],
    'stats' => [
        'perlu_dikirim' => 3,
        'pembatalan' => 0,
        'pengembalian' => 0,
        'penilaian_perlu_dibalas' => 2
    ]
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Penjual</title>
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
            border-radius: 25px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: visible;
            clip-path: inset(0 round 25px);
        }

        .scrollable-content {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 80px;
        }

        .scrollable-content::-webkit-scrollbar {
            display: none;
        }

        .shadow-custom-inset {
            box-shadow: inset 0px 4px 4px 0px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="app-container">
        <div class="bg-orange-600 text-white sticky top-0 z-50 px-6 pt-4 pb-2">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center gap-3">
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                    <h1 class="text-lg font-semibold">Toko Saya</h1>
                </div>
                <div class="flex gap-4">
                    <i data-lucide="search" class="w-5 h-5"></i>
                    <i data-lucide="plus-square" class="w-5 h-5"></i>
                    <i data-lucide="message-circle" class="w-5 h-5"></i>
                </div>
            </div>
        </div>

        <div class="scrollable-content">

            <div class="bg-white p-4 flex items-center justify-between shadow-sm border-b">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 rounded-full bg-gray-200 border-2 border-gray-100 overflow-hidden">
                        <img src="<?= $seller_data['avatar'] ?>" alt="Shop Avatar" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h2 class="font-bold text-gray-800"><?= $seller_data['shop_name'] ?></h2>
                        <p class="text-[10px] text-gray-500"><?= $seller_data['shop_url'] ?></p>
                    </div>
                </div>
                <button class="border border-orange-600 text-orange-600 text-[10px] px-3 py-1 rounded-md font-medium active:bg-orange-50">
                    Kunjungi Toko
                </button>
            </div>

            <div class="mt-4 px-4">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-sm font-bold text-gray-800">Pengumuman Penjual</h3>
                    <span class="text-[10px] text-gray-400">Lainnya ></span>
                </div>
                <div class="w-full h-32 bg-orange-600 rounded-xl relative overflow-hidden flex flex-col justify-center items-center text-center p-4">
                    <div class="absolute -top-10 -right-10 w-24 h-24 bg-orange-400 rounded-full opacity-50"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-orange-600 rounded-full opacity-50"></div>

                    <h4 class="text-white font-bold text-sm z-10">JUALAN DI SHOPEE<br>JADI SEMAKIN HANDAL</h4>
                    <div class="mt-2 bg-white text-orange-600 px-3 py-1 rounded-full text-[9px] font-bold z-10 shadow-sm">
                        KAMPUS SHOPEE
                    </div>

                    <div class="absolute bottom-2 flex gap-1">
                        <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></div>
                        <div class="w-1.5 h-1.5 bg-orange-300 rounded-full"></div>
                        <div class="w-1.5 h-1.5 bg-orange-300 rounded-full"></div>
                    </div>
                </div>
            </div>

            <div class="mt-6 px-4 py-3 bg-white border-y border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-sm font-bold text-gray-800">Status Pesanan</h3>
                    <span class="text-[10px] text-gray-400">Riwayat Penjualan ></span>
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-8 bg-gray-50 rounded-lg flex items-center justify-center mb-1 shadow-sm font-bold text-gray-800">
                            <?= $seller_data['stats']['perlu_dikirim'] ?>
                        </div>
                        <span class="text-[9px] text-gray-500 text-center">Perlu Dikirim</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-8 bg-gray-50 rounded-lg flex items-center justify-center mb-1 shadow-sm font-bold text-gray-800">
                            <?= $seller_data['stats']['pembatalan'] ?>
                        </div>
                        <span class="text-[9px] text-gray-500 text-center">Pembatalan</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-8 bg-gray-50 rounded-lg flex items-center justify-center mb-1 shadow-sm font-bold text-gray-800">
                            <?= $seller_data['stats']['pengembalian'] ?>
                        </div>
                        <span class="text-[9px] text-gray-500 text-center">Pengembalian</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-8 bg-gray-50 rounded-lg flex items-center justify-center mb-1 shadow-sm font-bold text-gray-800">
                            <?= $seller_data['stats']['penilaian_perlu_dibalas'] ?>
                        </div>
                        <span class="text-[9px] text-gray-600 text-center leading-tight">Penilaian Perlu Dibalas</span>
                    </div>
                </div>
            </div>

            <div class="mt-2 grid grid-cols-3 gap-y-6 p-6 bg-white"> 
                <div class="flex flex-col items-center gap-2">
                    <a href="/project_rbpl/Kurir/welcome.php" class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <i data-lucide="package" class="w-6 h-6"></i>
                    </a>
                    <span class="text-[10px] font-medium text-gray-700">Kirim Paket</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <i data-lucide="wallet" class="w-6 h-6"></i>
                    </div>
                    <span class="text-[10px] font-medium text-gray-700">Keuangan</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <i data-lucide="trending-up" class="w-6 h-6"></i>
                    </div>
                    <span class="text-[10px] font-medium text-gray-700">Performa Toko</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <i data-lucide="megaphone" class="w-6 h-6"></i>
                    </div>
                    <span class="text-[10px] font-medium text-gray-700">Promosi Toko</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <i data-lucide="shopping-bag" class="w-6 h-6"></i>
                    </div>
                    <span class="text-[10px] font-medium text-gray-700 text-center">Program Penjualan</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <i data-lucide="help-circle" class="w-6 h-6"></i>
                    </div>
                    <span class="text-[10px] font-medium text-gray-700">Pusat Bantuan</span>
                </div>
            </div>
        </div>

        <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[389px] h-20 bg-white border-t rounded-t-[25px] rounded-b-[25px] shadow-[0px_-2px_10px_rgba(0,0,0,0.05)] flex justify-around items-center px-5 pb-4 z-50">

            <a href="index.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="layout-grid" class="w-6 h-6 flex items-center justify-center text-orange-600"></i>
                <span class="text-[9px] text-orange-600 font-bold font-montserrat text-brand transition-colors">Dashboard</span>
            </a>

            <a href="pesanan_penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="shopping-bag" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Produk</span>
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
        function initLucide() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            } else {
                setTimeout(initLucide, 100);
            }
        }

        window.onload = function() {
            initLucide();

        };
    </script>
</body>

</html>