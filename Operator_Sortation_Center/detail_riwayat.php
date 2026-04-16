<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Riwayat Sortir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Poppins:wght@400;600&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-roboto { font-family: 'Roboto', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-gray-200 flex justify-center">

    <!-- Mobile Container: Ditambahkan kembali rounded-[25px] agar semua sudut melengkung -->
    <div class="w-full max-w-[384px] h-screen bg-white shadow-2xl relative flex flex-col md:rounded-[25px] overflow-hidden">
        
        <!-- BAGIAN YANG TIDAK IKUT SCROLL (FIXED AT TOP) -->
        <div class="flex-none bg-white z-50">
            <!-- STATUS BAR -->
            <div class="px-6 pt-5 pb-2 border-b border-gray-50">
                <div class="flex justify-between items-center text-black">
                    <span class="text-xs font-semibold" id="current-time">09:41</span>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                        </svg>
                        <div class="flex items-center">
                            <div class="w-5 h-2.5 border border-black rounded-[2px] p-[1px] flex items-center">
                                <div class="bg-black h-full w-[70%] rounded-[1px]"></div>
                            </div>
                            <div class="w-[2px] h-1 bg-black ml-[1px] rounded-sm"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HEADER TITLE -->
            <div class="px-6 py-4 flex items-center gap-4 border-b border-gray-100">
                <a href="status_sortir.php" class="p-2 -ml-2 hover:bg-gray-100 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-black"></i>
                </a>
                <h1 class="text-xl font-semibold text-black">Riwayat Sortir</h1>
            </div>
        </div>

        <!-- LIST RIWAYAT (BAGIAN YANG BISA DI-SCROLL) -->
        <div class="flex-1 px-6 py-6 space-y-4 overflow-y-auto hide-scrollbar bg-white">
            
            <!-- Item 1 -->
            <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-base font-semibold text-slate-800 font-roboto">Package ID: #10247</span>
                    <span class="px-3 py-1 bg-green-600 text-white text-[10px] rounded font-roboto uppercase">Sorted</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500 font-roboto mb-3">
                    <i class="fas fa-map-marker-alt text-orange-600 text-xs"></i>
                    Tujuan: Bantul, Yogyakarta
                </div>
                <a href="konfirmasi_paket.php" class="block w-full py-2 bg-orange-50 text-orange-600 border border-orange-200 rounded-lg text-center text-xs font-bold hover:bg-orange-600 hover:text-white transition-all">
                    Edit & Teruskan ke Hub <i class="fas fa-edit ml-1"></i>
                </a>
            </div>

            <!-- Item 2 -->
            <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-base font-semibold text-slate-800 font-roboto">Package ID: #10249</span>
                    <span class="px-3 py-1 bg-green-600 text-white text-[10px] rounded font-roboto uppercase">Sorted</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500 font-roboto mb-3">
                    <i class="fas fa-map-marker-alt text-orange-600 text-xs"></i>
                    Tujuan: Sleman, Yogyakarta
                </div>
                <a href="konfirmasi_paket.php" class="block w-full py-2 bg-orange-50 text-orange-600 border border-orange-200 rounded-lg text-center text-xs font-bold hover:bg-orange-600 hover:text-white transition-all">
                    Edit & Teruskan ke Hub <i class="fas fa-edit ml-1"></i>
                </a>
            </div>

            <!-- Duplicate items for scrolling demo -->
            <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm opacity-60">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-base font-semibold text-slate-800 font-roboto">Package ID: #10245</span>
                    <span class="px-3 py-1 bg-gray-400 text-white text-[10px] rounded font-roboto uppercase">Completed</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500 font-roboto">
                    <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                    Tujuan: Karawang, Jawa Barat
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm opacity-60">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-base font-semibold text-slate-800 font-roboto">Package ID: #10244</span>
                    <span class="px-3 py-1 bg-gray-400 text-white text-[10px] rounded font-roboto uppercase">Completed</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500 font-roboto">
                    <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                    Tujuan: Jakarta Timur, DKI
                </div>
            </div>

        </div>

        <!-- FOOTER SUMMARY (FIXED AT BOTTOM) -->
        <div class="flex-none bg-white border-t border-gray-100 px-6 py-5 z-40">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Total Hari Ini</p>
                    <p class="text-lg font-bold text-slate-800">128 Paket</p>
                </div>
                <a href="konfirmasi_paket.php" class="bg-orange-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-md active:scale-95 transition-transform">
                    Laporkan
                </a>
            </div>
        </div>
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const clockEl = document.getElementById('current-time');
            if (clockEl) clockEl.textContent = `${hours}:${minutes}`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>