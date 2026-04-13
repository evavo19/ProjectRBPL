<?php

/**
 * BACKEND LOGIC (PHP)
 * Mengambil data statistik pengiriman untuk kurir yang sedang login
 */
$currentTime = date('H:i');
$currentDate = date('d.m.Y');

// Simulasi data dari Database
$stats = [
    'total_paket' => 24,
    'terkirim' => 18,
    'bukti_kirim' => 18,
    'tertunda' => 6
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kurir - Pelacakan Pengiriman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#EF4C29', // Warna orange brand sesuai permintaan
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .app-container {
            width: 100%;
            max-width: 390px;
            height: 844px;
            background-color: #FFFFFF;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border-radius: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .grid-card {
            border: 1px solid #F1F5F9;
            background-color: #FFFFFF;
            transition: all 0.2s;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
        }

        .grid-card:active {
            scale: 0.95;
            background-color: #FFF7F5;
        }

        /* Custom Scrollbar for hidden feel */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body>

    <div class="app-container">
        <!-- STATUS BAR -->
        <div class="flex justify-between items-center px-8 pt-6 pb-2 bg-white sticky top-0 z-50">
            <span class="text-xs font-bold font-poppins"><?php echo date('H:i'); ?></span>
            <div class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                </svg>
                <div class="w-5 h-2.5 border border-black rounded-[2px] p-[1px] flex justify-start items-center">
                    <div class="bg-black h-full w-[70%] rounded-[1px]"></div>
                </div>
            </div>
        </div>

        <!-- TOP NAVIGATION -->
        <div class="flex items-center px-6 mt-4 gap-4">
            <div class="w-6 h-6 flex items-center justify-center rounded-lg shadow-md overflow-hidden">
                <img src="assets/frame.png" alt="Logo" class="w-full h-full object-cover">
            </div>
            <h2 class="font-['Montserrat'] font-bold text-lg text-gray-800">Pelacakan Pengiriman</h2>
        </div>

        <!-- TIME & DATE DISPLAY -->
        <div class="flex flex-col items-center mt-12">
            <h1 class="font-['Montserrat'] text-6xl font-normal text-black tracking-tighter">
                <?php echo $currentTime; ?>
            </h1>
            <p class="font-['Montserrat'] text-xl text-gray-400 mt-2">
                <?php echo $currentDate; ?>
            </p>
        </div>

        <!-- BRAND LOGO -->
        <div class="flex justify-center mt-8 px-6">
            <img class="w-full max-w-[212px] h-20 object-contain" src="assets/logo.png" alt="Logo" />
        </div>

        <!-- STATS GRID -->
        <div class="grid grid-cols-2 gap-6 px-8 mt-10">
            <a href="pengiriman_paket.php" class="grid-card flex flex-col items-center justify-center p-6 rounded-2xl">
                <div class="w-12 h-12 bg-brand rounded-xl flex items-center justify-center mb-3 shadow-lg shadow-orange-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <span class="font-bold text-gray-700">Paket</span>
                <span class="text-brand font-bold text-xl"><?php echo $stats['total_paket']; ?></span>
            </a>

            <!-- Terkirim -->
            <div class="grid-card flex flex-col items-center justify-center p-6 rounded-2xl">
                <div class="w-12 h-12 bg-brand rounded-xl flex items-center justify-center mb-3 shadow-lg shadow-orange-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <span class="font-bold text-gray-700">Terkirim</span>
                <span class="text-brand font-bold text-xl"><?php echo $stats['terkirim']; ?></span>
            </div>

            <!-- Bukti Kirim -->
            <div class="grid-card flex flex-col items-center justify-center p-6 rounded-2xl">
                <div class="w-12 h-12 bg-brand rounded-xl flex items-center justify-center mb-3 shadow-lg shadow-orange-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <span class="font-bold text-gray-700 text-sm">Bukti Kirim</span>
                <span class="text-brand font-bold text-xl"><?php echo $stats['bukti_kirim']; ?></span>
            </div>

            <!-- Tertunda -->
            <div class="grid-card flex flex-col items-center justify-center p-6 rounded-2xl">
                <div class="w-12 h-12 bg-brand rounded-xl flex items-center justify-center mb-3 shadow-lg shadow-orange-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="font-bold text-gray-700">Tertunda</span>
                <span class="text-brand font-bold text-xl"><?php echo $stats['tertunda']; ?></span>
            </div>
        </div>

        <!-- BOTTOM NAVIGATION BAR -->
        <div class="absolute bottom-0 left-0 right-0 bg-white h-20 flex justify-around items-center px-2 rounded-t-3xl shadow-[0_-8px_30px_rgba(0,0,0,0.05)] border-t border-gray-100">

            <!-- Beranda (Active) -->
            <a href="panduan_paket.php" class="nav-item group flex flex-col items-center justify-center w-16">
                <div class="w-6 h-6 flex items-center justify-center text-brand">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <span class="text-[10px] font-bold font-montserrat text-brand transition-colors">Beranda</span>
            </a>

            <!-- Cari -->
            <a href="cari.php" class="nav-item group flex flex-col items-center justify-center w-16">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-gray-400 group-hover:text-brand transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span class="text-[10px] font-bold text-gray-400 mt-1 group-hover:text-brand transition-colors">
                    Cari
                </span>
            </a>

            <!-- Tambah -->
            <a href="tambah.php" class="nav-item group flex flex-col items-center justify-center w-16">
                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 group-hover:text-brand transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-gray-400 group-hover:text-brand transition-colors"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="text-[10px] font-bold text-gray-400 mt-1 group-hover:text-brand transition-colors">
                    Tambah
                </span>
            </a>

            <!-- Pesan -->
            <a href="manager.php" class="nav-item group flex flex-col items-center justify-center w-16">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-gray-400 group-hover:text-brand transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span class="text-[10px] font-bold text-gray-400 mt-1 group-hover:text-brand transition-colors">
                    Pesan
                </span>
            </a>

            <!-- Profil -->
            <a href="profil_kurir.php" class="nav-item group flex flex-col items-center justify-center w-16">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-gray-400 group-hover:text-brand transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-[10px] font-bold text-gray-400 mt-1 group-hover:text-brand transition-colors">
                    Profil
                </span>
            </a>
        </div>

    </div>

</body>

</html>