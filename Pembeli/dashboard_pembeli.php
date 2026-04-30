<?php

$user_data = [
    'username' => 'Pembeli_Shopee',
    'shopeepay' => 100000,
    'koin' => 1000,
    'spaylater_promo' => 'Diskon 100%'
];

$categories = [
    ['name' => 'Pulsa, Tagihan, d...', 'icon' => 'smartphone', 'color' => 'text-teal-500'],
    ['name' => 'ShopeeFood', 'icon' => 'utensils-crosses', 'color' => 'text-orange-500'],
    ['name' => 'ShopeeVIP', 'icon' => 'crown', 'color' => 'text-red-500'],
    ['name' => 'Shopee Games', 'icon' => 'gamepad-2', 'color' => 'text-blue-500'],
    ['name' => 'FitCheck Diskon 25%', 'icon' => 'shirt', 'color' => 'text-orange-600'],
];

$live_products = [
    ['id' => 1, 'img' => 'https://picsum.photos/seed/v1/150/200'],
    ['id' => 2, 'img' => 'https://picsum.photos/seed/v2/150/200'],
];

$video_products = [
    ['id' => 3, 'img' => 'https://picsum.photos/seed/v3/150/200'],
    ['id' => 4, 'img' => 'https://picsum.photos/seed/v4/150/200'],
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopee Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .app-container {
            width: 390px;
            height: 100vh;
            background-color: #FFFFFF;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow-y: auto;
            position: relative;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            max-width: 100%;
        }

        .bg-shopee-orange {
            background-color: #F54D2D;
        }

        .header-gradient {
            background: linear-gradient(180deg, #F54D2D 0%, #FF6433 100%);
        }
    </style>
</head>

<body>

    <div class="app-container shadow-2xl">

        <div class="header-gradient pb-10">
            <div class="px-4 pt-10 flex items-center gap-3">
                <div class="flex-1 bg-white rounded-sm flex items-center px-3 py-1.5 gap-2 shadow-sm">
                    <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
                    <input type="text" placeholder="Cari di Shopee" class="text-xs w-full outline-none text-gray-800 bg-transparent">
                    <i data-lucide="camera" class="w-4 h-4 text-gray-400"></i>
                </div>
                <div class="flex gap-3 text-white">
                    <a href="keranjang_pembeli.php">
                        <i data-lucide="shopping-cart" class="w-6 h-6"></i>
                    </a>
                    <i data-lucide="message-circle" class="w-6 h-6"></i>
                </div>
            </div>
        </div>

        <div class="mx-3 -mt-5 relative z-10 bg-white rounded-md shadow-md border border-gray-50 p-3 flex items-center">
            <div class="pr-3 text-orange-600 border-r border-gray-100">
                <i data-lucide="scan-line" class="w-8 h-8"></i>
            </div>

            <div class="flex flex-1 justify-around items-center px-2">
                <div class="flex flex-col items-start">
                    <div class="flex items-center gap-1">
                        <i data-lucide="wallet" class="w-3.5 h-3.5 text-orange-600"></i>
                        <span class="text-[10px] font-bold">Rp100.000</span>
                    </div>
                    <p class="text-[8px] text-gray-400">Gratis Isi Saldo</p>
                </div>

                <div class="flex flex-col items-start">
                    <div class="flex items-center gap-1">
                        <i data-lucide="coins" class="w-3.5 h-3.5 text-yellow-500"></i>
                        <span class="text-[10px] font-bold">1.000</span>
                    </div>
                    <p class="text-[8px] text-gray-400">Klaim 25RB</p>
                </div>

                <div class="flex flex-col items-start">
                    <div class="flex items-center gap-1">
                        <i data-lucide="credit-card" class="w-3.5 h-3.5 text-orange-600"></i>
                        <span class="text-[10px] font-bold">SPayLater</span>
                    </div>
                    <p class="text-[8px] text-gray-400">Diskon 100%</p>
                </div>
            </div>

            <div class="pl-2 border-l border-gray-100">
                <div class="w-7 h-7 rounded-full bg-orange-600 flex items-center justify-center text-white font-bold text-[10px] shadow-sm">
                    Rp
                </div>
            </div>
        </div>

        <div class="p-4 bg-white">
            <div class="grid grid-cols-5 gap-y-4">
                <?php foreach ($categories as $cat): ?>
                    <div class="flex flex-col items-center gap-1.5">
                        <div class="w-12 h-12 bg-white rounded-xl border border-gray-100 flex items-center justify-center shadow-sm">
                            <?php if ($cat['name'] == 'ShopeeFood'): ?>
                                <img src="assets/shopeefood-driver.png" class="w-10 h-10 object-contain" alt="ShopeeFood">
                            <?php else: ?>
                                <i data-lucide="<?= $cat['icon'] ?>" class="w-7 h-7 <?= $cat['color'] ?>"></i>
                            <?php endif; ?>
                        </div>
                        <span class="text-[9px] text-center text-gray-600 font-medium leading-tight"><?= $cat['name'] ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="flex justify-center gap-1 mt-4">
                <div class="w-4 h-1 bg-orange-500 rounded-full"></div>
                <div class="w-1 h-1 bg-gray-200 rounded-full"></div>
            </div>
        </div>

        <div class="px-3 mt-2">
            <div class="rounded-xl overflow-hidden h-40 bg-orange-50 relative">
                <img src="https://picsum.photos/seed/shopee1212/800/400" class="w-full h-full object-cover">
                <div class="absolute bottom-3 left-3 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full">
                    <span class="text-white text-[10px] font-bold">12.12 Birthday Sale</span>
                </div>
            </div>
        </div>

        <div class="p-3 grid grid-cols-2 gap-3 mt-2">
            <div class="bg-white p-3 rounded-xl border border-gray-50 shopee-shadow">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-[#F54D2D] font-bold text-xs italic">Shopee Live</h2>
                    <i data-lucide="chevron-right" class="w-3 h-3 text-gray-300"></i>
                </div>
                <div class="grid grid-cols-2 gap-1.5">
                    <div class="aspect-[3/4] bg-gray-100 rounded-lg overflow-hidden">
                        <img src="https://picsum.photos/seed/live1/100/150" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-[3/4] bg-gray-100 rounded-lg overflow-hidden">
                        <img src="https://picsum.photos/seed/live2/100/150" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            <div class="bg-white p-3 rounded-xl border border-gray-50 shopee-shadow">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-[#F54D2D] font-bold text-xs italic">Shopee Video</h2>
                    <i data-lucide="chevron-right" class="w-3 h-3 text-gray-300"></i>
                </div>
                <div class="grid grid-cols-2 gap-1.5">
                    <div class="aspect-[3/4] bg-gray-100 rounded-lg overflow-hidden">
                        <img src="https://picsum.photos/seed/vid1/100/150" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-[3/4] bg-gray-100 rounded-lg overflow-hidden">
                        <img src="https://picsum.photos/seed/vid2/100/150" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-2 left-1/2 -translate-x-1/2 w-[100%] max-w-[400px] bg-white shadow-[0_-8px_30px_rgba(0,0,0,0.08)] border-t border-gray-100 flex justify-around items-center py-4 z-50 rounded-t-3xl">
            <a href="#" class="flex flex-col items-center gap-0.5 group transition-all duration-200">
                <i data-lucide="home" class="w-6 h-6 text-orange-600 group-hover:scale-110"></i>
                <span class="text-[9px] text-orange-600 font-bold">Beranda</span>
            </a>

            <a href="#" class="flex flex-col items-center gap-0.5 group transition-all duration-200">
                <i data-lucide="flame" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 group-hover:scale-110"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600">Trending</span>
            </a>

            <a href="#" class="flex flex-col items-center gap-0.5 group transition-all duration-200">
                <i data-lucide="play-circle" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 group-hover:scale-110"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600">Live & Video</span>
            </a>

            <a href="#" class="flex flex-col items-center gap-0.5 group relative transition-all duration-200">
                <div class="relative">
                    <i data-lucide="bell" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 group-hover:scale-110"></i>
                    <span class="absolute -top-1 -right-1 bg-orange-600 text-white text-[7px] px-1 rounded-full border border-white">5</span>
                </div>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600">Notifikasi</span>
            </a>

            <a href="profil_pembeli.php" class="flex flex-col items-center gap-0.5 group transition-all duration-200">
                <i data-lucide="user" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 group-hover:scale-110"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600">Saya</span>
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

            function updateClock() {
                const now = new Date();
                const timeStr = String(now.getHours()).padStart(2, '0') + ':' +
                    String(now.getMinutes()).padStart(2, '0');
                const clockElement = document.getElementById('clock');
                if (clockElement) clockElement.innerText = timeStr;
            }
            setInterval(updateClock, 1000);
            updateClock();
        };
    </script>
</body>

</html>