<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengiriman - Kurir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F3F4F6;
            margin: 0;
            padding: 0;
        }

        .mobile-container {
            max-width: 390px;
            margin: 0 auto;
            /* Mengubah min-height agar tidak memaksa memanjang jika konten sedikit */
            min-height: 100vh;
            background: #FFFFFF;
            position: relative;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            border-radius: 25px;
            overflow: hidden;
        }

        .header-white {
            background: #FFFFFF;
            border-bottom: 1px solid #F3F4F6;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border: 1px solid #E5E7EB;
            border-radius: 20px;
            overflow: hidden;
            background: white;
        }

        .stats-item {
            border: 0.5px solid #F3F4F6;
            padding: 12px 10px;
            text-align: center;
        }

        .custom-shadow {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
        }

        .text-brand {
            color: #FF5C35;
        }

        .bg-brand {
            background-color: #FF5C35;
        }

        .bottom-nav {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 65px;
            background: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-top: 1px solid #F3F4F6;
            box-shadow: 0px -4px 15px rgba(0, 0, 0, 0.03);
            z-index: 100;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex: 1;
            color: #9CA3AF;
            text-decoration: none;
            transition: all 0.2s;
        }

        .nav-item.active {
            color: #FF5C35;
        }

        .nav-text {
            font-size: 10px;
            font-weight: 600;
            margin-top: 2px;
        }
    </style>
</head>

<body>

    <div class="mobile-container">
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

        <!-- Header Section -->
        <div class="header-white px-6 py-4">
            <div class="flex items-center justify-between mb-4">
                <a href="pelacakan_pengiriman.php" class="w-9 h-9 flex items-center justify-center bg-gray-100 rounded-full text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="text-lg font-bold text-gray-800">Status Pengiriman</h1>
                <div class="w-9"></div>
            </div>

            <div class="stats-grid mb-6 custom-shadow">
                <div class="stats-item">
                    <p class="text-[9px] font-bold text-brand uppercase mb-1">Penjemputan Berikutnya</p>
                    <p class="text-sm font-bold text-gray-900">14:00</p>
                </div>
                <div class="stats-item">
                    <p class="text-[9px] font-bold text-brand uppercase mb-1">Pengantaran Terakhir</p>
                    <p class="text-sm font-bold text-gray-900">Selesai</p>
                </div>
                <div class="stats-item">
                    <p class="text-[9px] font-bold text-brand uppercase mb-1">Total Paket</p>
                    <p class="text-sm font-bold text-gray-900">17 Paket</p>
                </div>
                <div class="stats-item">
                    <p class="text-[9px] font-bold text-brand uppercase mb-1">Paket Terkirim</p>
                    <p class="text-sm font-bold text-gray-900">12 Paket</p>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="px-6 py-4 bg-gray-50/50 flex-1">
            <div class="space-y-3">
                <div class="bg-white p-4 rounded-xl flex justify-between items-center custom-shadow border border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-1.5 h-6 bg-brand rounded-full"></div>
                        <span class="font-bold text-gray-800">Package A</span>
                    </div>
                    <span class="text-xs text-gray-500 font-medium">Bantul</span>
                </div>
                <div class="bg-white p-4 rounded-xl flex justify-between items-center custom-shadow border border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-1.5 h-6 bg-brand rounded-full"></div>
                        <span class="font-bold text-gray-800">Package E</span>
                    </div>
                    <span class="text-xs text-gray-500 font-medium">Bantul</span>
                </div>
                <div class="bg-white p-4 rounded-xl flex justify-between items-center custom-shadow border border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-1.5 h-6 bg-brand rounded-full"></div>
                        <span class="font-bold text-gray-800">Package F</span>
                    </div>
                    <span class="text-xs text-gray-500 font-medium">Bantul</span>
                </div>
                <div class="bg-white p-4 rounded-xl flex justify-between items-center custom-shadow border border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-1.5 h-6 bg-brand rounded-full"></div>
                        <span class="font-bold text-gray-800">Package B</span>
                    </div>
                    <span class="text-xs text-gray-500 font-medium">Sleman</span>
                </div>
            </div>
        </div>

        <!-- BOTTOM NAVIGATION BAR -->
        <nav class="bottom-nav">
            <div class="absolute bottom-0 left-0 right-0 bg-white h-20 flex justify-around items-center px-2 rounded-t-3xl shadow-[0_-8px_30px_rgba(0,0,0,0.05)] border-t border-gray-100">

                <a href="pelacakan_pengiriman.php" class="nav-item active">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="nav-text">Beranda</span>
                </a>
                <a href="cari.php" class="nav-item hover:text-[#FF5C35] transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="nav-text">Cari</span>
                </a>
                <a href="tambah.php" class="nav-item hover:text-[#FF5C35] transition-all duration-200">
                    <div class="bg-gray-100 p-1.5 rounded-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <span class="nav-text">Tambah</span>
                </a>
                <a href="manager.php" class="nav-item hover:text-[#FF5C35] transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="nav-text">Pesan</span>
                </a>
                <a href="profil_kurir.php" class="nav-item hover:text-[#FF5C35] transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="nav-text">Profil</span>
                </a>
        </nav>

    </div>

</body>

</html>