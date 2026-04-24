<?php
session_start();

require '../config/db.php';

if (!isset($_SESSION['penjual_id'])) {
    header("Location: login_penjual.php");
    exit();
}

$id = $_SESSION['penjual_id'];

$query = "SELECT * FROM profil_penjual WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);

$nama = $userData['nama'] ?? 'User';

$kata = explode(' ', trim($nama));

$inisial = '';
foreach ($kata as $k) {
    if (!empty($k)) {
        $inisial .= strtoupper($k[0]);
    }
    if (strlen($inisial) == 3) break;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Penjual - Penjual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#EF4C29',
                    }
                }
            }
        }
    </script>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            background-color: #f3f4f6;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .app-container {
            width: 390px;
            height: 740px;
            background-color: white;
            border-radius: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: visible;
            display: flex;
            flex-direction: column;
            position: relative;
            font-family: 'Poppins', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .profile-header-bg {
            background: linear-gradient(180deg, #f23911 0%, #f29d9d 100%);
            height: 250px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 40px;
            z-index: 10;
        }

        .content-area {
            flex: 1;
            overflow-y: auto;
            position: relative;
            z-index: 20;
        }
    </style>
</head>

<body>

    <div class="app-container">
        <div class="profile-header-bg"></div>

        <div class="content-area no-scrollbar px-6 mt-6 pb-32 sticky top-0">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <div class="w-28 h-28 rounded-full border-4 border-white shadow-xl overflow-hidden bg-gray-100">
                        <img src="<?php echo $userData['name'] ?? 'https://placehold.co/130x130/EF4C29/white?text=' . $inisial; ?>">
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute bottom-1 right-1 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md text-brand border border-gray-100">
                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                    </div>
                </div>
                <h2 class="mt-4 text-xl font-bold font-['Montserrat'] text-white"><?php echo $userData['nama']; ?></h2>
                <p class="text-orange-50 text-xs font-medium opacity-90 tracking-widest uppercase">ID: Seller-<?php echo $userData['mulai_jual']; ?></p>
            </div>

            <div class="mt-20 space-y-4">
                <div class="space-y-3">
                    <label class="text-[10px] font-bold text-gray-400 ml-1 uppercase tracking-wider">Email Address</label>
                    <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-sm flex items-center gap-3">
                        <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <span class="text-gray-700 font-medium text-sm"><?php echo $userData['email']; ?></span>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-[10px] font-bold text-gray-400 ml-1 uppercase tracking-wider">Mulai Jual Sejak</label>
                    <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-sm flex items-center gap-3">
                        <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                            <i data-lucide="calendar" class="w-4 h-4"></i>
                        </div>
                        <span class="text-gray-700 font-medium text-sm"><?php echo $userData['mulai_jual']; ?></span>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-[10px] font-bold text-gray-400 ml-1 uppercase tracking-wider">Lokasi Toko</label>
                    <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-sm flex items-center gap-3">
                        <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                            <i data-lucide="map-pin" class="w-4 h-4"></i>
                        </div>
                        <span class="text-gray-700 font-medium text-sm"><?php echo $userData['alamat']; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[389px] h-20 bg-white border-t rounded-t-[25px] rounded-b-[25px] shadow-[0px_-2px_10px_rgba(0,0,0,0.05)] flex justify-around items-center px-5 pb-4 z-50">
            <a href="index_penjual.php" class="flex flex-col items-center gap-1 group">
                <i data-lucide="layout-grid" class="w-6 h-6 text-gray-400 group-hover:text-brand transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-brand transition">Dashboard</span>
            </a>
            <a href="pesanan_penjual.php" class="flex flex-col items-center gap-1 group">
                <i data-lucide="shopping-bag" class="w-6 h-6 text-gray-400 group-hover:text-brand transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-brand transition">Produk</span>
            </a>
            <a href="tambah_produk_penjualan.php" class="relative -top-4 bg-white p-3 rounded-full shadow-lg hover:scale-105 transition">
                <div class="bg-orange-600 w-12 h-12 rounded-full flex items-center justify-center text-white">
                    <i data-lucide="plus" class="w-6 h-6"></i>
                </div>
            </a>
            <a href="notifikasi_penjual.php" class="flex flex-col items-center gap-1 group">
                <i data-lucide="bell" class="w-6 h-6 text-gray-400 group-hover:text-brand transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-brand transition">Notifikasi</span>
            </a>
            <a href="penjual.php" class="flex flex-col items-center gap-1 text-brand">
                <i data-lucide="user" class="w-6 h-6"></i>
                <span class="text-[9px] font-bold">Saya</span>
            </a>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function updateTime() {
            const now = new Date();
            const time = now.getHours().toString().padStart(2, '0') + ":" +
                now.getMinutes().toString().padStart(2, '0');

            document.getElementById('current-time').innerText = time;
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>
</body>

</html>