<?php

/**
 * Logika Backend (Simulasi Database)
 * Memisahkan data berdasarkan kategori Status Pengiriman dan Notifikasi.
 */

// Data khusus perjalanan paket (Status Pengiriman)
$delivery_status = [
    [
        'order_id' => 'ORD-12345',
        'title' => 'Paket dalam perjalanan ke Hub Jakarta',
        'location' => 'Jakarta Selatan',
        'time' => '10:15',
        'status_code' => 'transit',
        'icon' => 'truck'
    ],
    [
        'order_id' => 'ORD-12290',
        'title' => 'Kurir telah menjemput paket',
        'location' => 'Bantul, Yogyakarta',
        'time' => '09:30',
        'status_code' => 'pickup',
        'icon' => 'package'
    ],
    [
        'order_id' => 'ORD-12110',
        'title' => 'Menunggu Pick Up oleh Kurir J&T',
        'location' => 'Toko Anda',
        'time' => 'Kemarin',
        'status_code' => 'pending',
        'icon' => 'clock'
    ]
];

// Data notifikasi interaksi (Notifikasi Toko)
$shop_notifications = [
    [
        'type' => 'rating',
        'title' => 'Intan Nur memberikan bintang 5 ⭐',
        'desc' => '"Produknya sangat bagus, pengiriman cepat!"',
        'time' => '1 jam lalu',
        'is_unread' => true,
        'icon' => 'star'
    ],
    [
        'type' => 'received',
        'title' => 'Paket telah diterima oleh Pembeli',
        'desc' => 'Pesanan ORD-12001 selesai otomatis oleh sistem.',
        'time' => '3 jam lalu',
        'is_unread' => true,
        'icon' => 'user-check'
    ],
    [
        'type' => 'checkout',
        'title' => 'Pesanan Baru: Wireless Headphone',
        'desc' => 'Pembeli: Eva Dewi. Segera atur pengiriman.',
        'time' => 'Kemarin',
        'is_unread' => false,
        'icon' => 'shopping-cart'
    ],
    [
        'type' => 'cancelled',
        'title' => 'Pembatalan Paket: ORD-11990',
        'desc' => 'Alasan: Berubah pikiran.',
        'time' => '2 hari lalu',
        'is_unread' => false,
        'icon' => 'x-circle'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Pesanan - Shopee Seller</title>
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

        .unread-indicator {
            width: 8px;
            height: 8px;
            background-color: #ea580c;
            border-radius: 50%;
        }

        .tab-active {
            color: #ea580c;
            border-bottom: 2px solid #ea580c;
        }
    </style>
</head>

<body>

    <div class="app-container">

        <!-- HEADER / STATUS BAR -->
        <div class="bg-orange-600 text-white px-6 pt-4 pb-2 z-20 shadow-md">

            <!-- Title Header -->
            <div class="flex items-center py-4 gap-3">
                <button onclick="window.history.back()" class="active:opacity-70 transition">
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                </button>
                <h1 class="text-lg font-semibold">Aktivitas Toko</h1>
            </div>
        </div>

        <div class="scrollable-content">
            <!-- TAB SELECTOR -->
            <div class="flex bg-white border-b sticky top-0 z-30">
                <button id="tab-delivery" onclick="switchTab('delivery')" class="flex-1 py-3 text-xs font-bold tab-active transition-all">Status Pengiriman</button>
                <button id="tab-notif" onclick="switchTab('notif')" class="flex-1 py-3 text-xs font-bold text-gray-400 transition-all">Notifikasi Toko</button>
            </div>

            <!-- SECTION: STATUS PENGIRIMAN -->
            <div id="content-delivery" class="p-4 space-y-4">
                <div class="bg-orange-50 p-3 rounded-lg flex items-center gap-3 mb-2">
                    <i data-lucide="info" class="w-4 h-4 text-orange-600"></i>
                    <p class="text-[10px] text-orange-800">Pantau pergerakan kurir secara real-time untuk semua pesanan aktif.</p>
                </div>

                <?php foreach ($delivery_status as $item): ?>
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 flex items-start gap-4 active:bg-gray-50 transition">
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                                <i data-lucide="<?= $item['icon'] ?>" class="w-5 h-5"></i>
                            </div>
                            <div class="w-0.5 h-10 bg-gray-100 rounded-full"></div>
                        </div>
                        <div class="flex-1 space-y-1">
                            <div class="flex justify-between items-center">
                                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-tight"><?= $item['order_id'] ?></span>
                                <span class="text-[10px] text-gray-400"><?= $item['time'] ?></span>
                            </div>
                            <p class="text-xs text-gray-800 font-bold"><?= $item['title'] ?></p>
                            <div class="flex items-center gap-1 text-[11px] text-gray-500">
                                <i data-lucide="map-pin" class="w-3 h-3"></i>
                                <span><?= $item['location'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- SECTION: NOTIFIKASI TOKO -->
            <div id="content-notif" class="hidden p-4 space-y-3">
                <?php foreach ($shop_notifications as $notif): ?>
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 flex items-start gap-4 active:bg-gray-50 transition relative">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center <?= $notif['is_unread'] ? 'bg-orange-100 text-orange-600' : 'bg-gray-100 text-gray-400' ?>">
                            <i data-lucide="<?= $notif['icon'] ?>" class="w-5 h-5"></i>
                        </div>

                        <div class="flex-1 space-y-1">
                            <div class="flex justify-between items-center">
                                <span class="text-[10px] text-gray-400 font-medium"><?= $notif['time'] ?></span>
                                <?php if ($notif['is_unread']): ?>
                                    <div class="unread-indicator"></div>
                                <?php endif; ?>
                            </div>
                            <p class="text-xs text-gray-800 font-bold"><?= $notif['title'] ?></p>
                            <p class="text-[11px] text-gray-500 italic leading-snug">"<?= $notif['desc'] ?>"</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- EMPTY STATE SPACER -->
            <div class="py-10 text-center">
                <p class="text-[10px] text-gray-400 italic">Sudah menampilkan semua data terbaru</p>
            </div>
        </div>

        <!-- BOTTOM NAVIGATION -->
        <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[389px] h-20 bg-white border-t rounded-t-[25px] rounded-b-[25px] shadow-[0px_-2px_10px_rgba(0,0,0,0.05)] flex justify-around items-center px-5 pb-4 z-50">
            <a href="index_penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="layout-grid" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Dashboard</span>
            </a>
            <a href="pesanan.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="shopping-bag" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Produk</span>
            </a>
            <a href="tambah_produk.php" class="relative -top-4 bg-white p-3 rounded-full shadow-lg cursor-pointer hover:scale-105 transition">
                <div class="bg-orange-600 w-12 h-12 rounded-full flex items-center justify-center text-white">
                    <i data-lucide="plus" class="w-6 h-6"></i>
                </div>
            </a>
            <a href="notifikasi.php" class="flex flex-col items-center gap-1 cursor-pointer group text-orange-600">
                <i data-lucide="bell" class="w-6 h-6 flex items-center justify-center text-orange-600"></i>
                <span class="text-[9px] text-orange-600 font-bold font-montserrat text-brand transition-colors">Notifikasi</span>
            </a>
            <a href="penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="user" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Saya</span>
            </a>
        </div>

    </div>

    <script>
        function switchTab(type) {
            const tabDelivery = document.getElementById('tab-delivery');
            const tabNotif = document.getElementById('tab-notif');
            const contentDelivery = document.getElementById('content-delivery');
            const contentNotif = document.getElementById('content-notif');

            if (type === 'delivery') {
                tabDelivery.classList.add('tab-active', 'text-orange-600');
                tabDelivery.classList.remove('text-gray-400');
                tabNotif.classList.remove('tab-active', 'text-orange-600');
                tabNotif.classList.add('text-gray-400');

                contentDelivery.classList.remove('hidden');
                contentNotif.classList.add('hidden');
            } else {
                tabNotif.classList.add('tab-active', 'text-orange-600');
                tabNotif.classList.remove('text-gray-400');
                tabDelivery.classList.remove('tab-active', 'text-orange-600');
                tabDelivery.classList.add('text-gray-400');

                contentNotif.classList.remove('hidden');
                contentDelivery.classList.add('hidden');
            }
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