<?php
session_start();
require '../config/db.php';

if (!isset($_SESSION['pembeli_id'])) {
    header("Location: login_pembeli.php");
    exit();
}

$id = $_SESSION['pembeli_id'];

$query = "SELECT * FROM pembeli WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);


$identifier = $userData['identifier'] ?? 'User';
$username = strstr($identifier, '@', true) ?: $identifier;

$user_data = [
    'username' => $username,
    'shopeepay' => 100000,
    'koin' => 1000,
    'tier' => 'Silver Member',
    'followers' => 20,
    'following' => 5,
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Shopee</title>
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

        .app-container {
            width: 390px;
            height: 100vh;
            background-color: #f8f8f8;
            border-radius: 32px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            max-width: 100%;
        }

        .sticky-header {
            background: linear-gradient(180deg, #F54D2D 0%, #FF6433 100%);
            flex-shrink: 0;
            border-radius: 0 0 28px 28px;
        }

        .scroll-content {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 80px;
        }

        .scroll-content::-webkit-scrollbar {
            display: none;
        }

        .section-card {
            background-color: white;
            margin-top: 8px;
            border-bottom: 1px solid #f0f0f0;
        }
    </style>
</head>

<body>

    <div class="app-container">

        <div class="sticky-header">

            <div class="px-6 pt-6 pb-3 flex justify-end gap-4 text-white">
                <i data-lucide="settings" class="w-5 h-5 cursor-pointer"></i>
                <a href="keranjang_pembeli.php" class="text-white">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                </a>
                <i data-lucide="message-circle" class="w-5 h-5 cursor-pointer"></i>
            </div>

            <div class="px-6 pb-6 flex items-center gap-4">
                <div class="relative">
                    <img src="assets/profil.png" class="w-16 h-16 rounded-full border-2 border-white/50 object-cover shadow-lg">
                    <div class="absolute bottom-0 right-0 bg-gray-200 rounded-full p-1 border border-white">
                        <i data-lucide="camera" class="w-3 h-3 text-gray-600"></i>
                    </div>
                </div>
                <div class="text-white">
                    <h2 class="font-bold text-lg leading-tight"><?= $user_data['username'] ?></h2>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="bg-white/20 backdrop-blur-md px-2 py-0.5 rounded-full text-[10px] font-medium border border-white/30">
                            <?= $user_data['tier'] ?>
                        </span>
                        <i data-lucide="chevron-right" class="w-3 h-3 opacity-70"></i>
                    </div>
                    <div class="flex items-center gap-3 mt-2 text-[10px] opacity-90">
                        <span>Pengikut <?= $user_data['followers'] ?></span>
                        <div class="w-px h-2 bg-white/40"></div>
                        <span>Mengikuti <?= $user_data['following'] ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-content">

            <div class="section-card p-4">
                <div class="flex justify-between items-center mb-3">
                    <div class="flex items-center gap-2">
                        <i data-lucide="clipboard-list" class="w-4 h-4 text-blue-600"></i>
                        <h3 class="text-xs font-bold text-gray-700 uppercase">Pesanan Saya</h3>
                    </div>
                    <div class="flex items-center gap-1 text-gray-400">
                        <span class="text-[10px]">Lihat Riwayat Pesanan</span>
                        <i data-lucide="chevron-right" class="w-3 h-3"></i>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="flex flex-col items-center gap-1.5">
                        <i data-lucide="wallet" class="w-6 h-6 text-gray-600"></i>
                        <span class="text-[9px] text-gray-500">Belum Bayar</span>
                    </div>
                    <div class="flex flex-col items-center gap-1.5">
                        <i data-lucide="package" class="w-6 h-6 text-gray-600"></i>
                        <span class="text-[9px] text-gray-500">Dikemas</span>
                    </div>
                    <div class="flex flex-col items-center gap-1.5">
                        <i data-lucide="truck" class="w-6 h-6 text-gray-600"></i>
                        <span class="text-[9px] text-gray-500">Dikirim</span>
                    </div>
                    <div class="flex flex-col items-center gap-1.5">
                        <i data-lucide="star" class="w-6 h-6 text-gray-600"></i>
                        <span class="text-[9px] text-gray-500">Beri Penilaian</span>
                    </div>
                </div>
            </div>

            <div class="section-card py-4">
                <div class="px-4 mb-4 flex items-center gap-2">
                    <i data-lucide="wallet-minimal" class="w-4 h-4 text-orange-600"></i>
                    <h3 class="text-xs font-bold text-gray-700 uppercase">Dompet Saya</h3>
                </div>
                <div class="grid grid-cols-4 divide-x divide-gray-100">
                    <div class="flex flex-col items-center px-1">
                        <span class="text-[10px] font-bold text-gray-800">Rp<?= number_format($user_data['shopeepay'], 0, ',', '.') ?></span>
                        <span class="text-[8px] text-gray-400">ShopeePay</span>
                    </div>
                    <div class="flex flex-col items-center px-1">
                        <span class="text-[10px] font-bold text-gray-800"><?= number_format($user_data['koin'], 0, ',', '.') ?></span>
                        <span class="text-[8px] text-gray-400">Koin Shopee</span>
                    </div>
                    <div class="flex flex-col items-center px-1">
                        <span class="text-[10px] font-bold text-gray-800">10</span>
                        <span class="text-[8px] text-gray-400">Voucher Saya</span>
                    </div>
                    <div class="flex flex-col items-center px-1">
                        <span class="text-[10px] font-bold text-gray-800">Aktifkan</span>
                        <span class="text-[8px] text-gray-400">SpayLater</span>
                    </div>
                </div>
            </div>

            <div class="section-card p-4">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center gap-2">
                        <i data-lucide="badge-dollar-sign" class="w-4 h-4 text-orange-600"></i>
                        <h3 class="text-xs font-bold text-gray-700 uppercase">Keuangan</h3>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-gray-300"></i>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm">
                            <i data-lucide="credit-card" class="w-6 h-6 text-orange-600"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-700">SPayLater</p>
                            <p class="text-[8px] text-orange-600">Sisa Limit Rp0</p>
                        </div>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm">
                            <i data-lucide="hand-coins" class="w-6 h-6 text-orange-600"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-700">SPinjam</p>
                            <p class="text-[8px] text-orange-600">Hingga 100JT</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-card pb-4">
                <?php foreach ($menu_items as $menu): ?>
                    <div class="flex justify-between items-center p-4 border-b border-gray-50 active:bg-gray-50">
                        <div class="flex items-center gap-3">
                            <i data-lucide="<?= $menu['icon'] ?>" class="w-5 h-5 <?= $menu['color'] ?>"></i>
                            <span class="text-xs text-gray-600 font-medium"><?= $menu['name'] ?></span>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-gray-300"></i>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="absolute bottom-0 left-0 right-0 bg-white/95 backdrop-blur-md shadow-[0_-4px_20px_rgba(0,0,0,0.08)] flex justify-around items-center py-3 z-50 rounded-b-3xl">
            <a href="dashboard_pembeli.php" class="flex flex-col items-center gap-0.5 group transition-all duration-200">
                <i data-lucide="home" class="w-6 h-6 text-gray-400 group-hover:text-orange-600"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600">Beranda</span>
            </a>

            <a href="#" class="flex flex-col items-center gap-0.5 group transition-all duration-200">
                <i data-lucide="flame" class="w-6 h-6 text-gray-400 group-hover:text-orange-600"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600">Trending</span>
            </a>

            <a href="#" class="flex flex-col items-center gap-0.5 group transition-all duration-200">
                <i data-lucide="play-circle" class="w-6 h-6 text-gray-400 group-hover:text-orange-600"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600">Live & Video</span>
            </a>

            <a href="#" class="flex flex-col items-center gap-0.5 group relative transition-all duration-200">
                <div class="relative">
                    <i data-lucide="bell" class="w-6 h-6 text-gray-400 group-hover:text-orange-600"></i>
                    <span class="absolute -top-1 -right-1 bg-orange-600 text-white text-[7px] px-1 rounded-full border border-white">5</span>
                </div>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600">Notifikasi</span>
            </a>

            <a href="profil_pembeli.php" class="flex flex-col items-center gap-0.5 group transition-all duration-200">
                <i data-lucide="user" class="w-6 h-6 text-orange-600 scale-110"></i>
                <span class="text-[9px] text-orange-600 font-bold">Saya</span>
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