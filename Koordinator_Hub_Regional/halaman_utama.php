<?php


$stats = [
    'fleet_active' => 42,
    'total_packages' => 1250,
    'in_transit' => 85,
    'delivery_schedule' => 12
];


?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Koordinator Hub Regional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

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

    <div class="w-full max-w-[384px] h-screen bg-white shadow-2xl relative flex flex-col md:rounded-[25px] overflow-hidden">

        <div class="flex-none bg-orange-600 z-50">

            <div class="px-6 py-6 pb-10">
                <a href="/project_rbpl/Tim_Planner_Middle_Mile/index.php" class="text-white text-2xl font-bold font-montserrat tracking-tight">Halaman Utama</a>
                <p class="text-orange-100 text-xs mt-1 opacity-90">Koordinator Hub Regional</p>
            </div>
        </div>

        <div class="px-6 -mt-6 z-50">
            <div class="bg-white rounded-xl shadow-xl border border-gray-100 flex items-center px-4 py-3.5 gap-3">
                <i class="fas fa-search text-gray-400 text-sm"></i>
                <input type="text" placeholder="Search fleet data..." class="text-sm w-full outline-none font-montserrat text-slate-600 bg-transparent">
                <div class="w-px h-4 bg-gray-200"></div>
                <i class="fas fa-sliders-h text-orange-600 cursor-pointer"></i>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pt-8 pb-10 px-6">

            <div class="flex justify-between mb-8 border-b border-gray-100 pb-2 overflow-x-auto hide-scrollbar">
                <div class="flex flex-col items-center min-w-[80px] cursor-pointer">
                    <span class="text-sm font-bold text-orange-600 transition-colors duration-200">Fleet</span>
                    <span class="text-[9px] text-orange-600 uppercase font-bold tracking-tighter">Overview</span>
                    <div class="w-6 h-1 bg-orange-600 rounded-full mt-1.5"></div>
                </div>

                <a href="vehicle.php" class="flex flex-col items-center min-w-[80px] cursor-pointer transition-all duration-200 hover:scale-105 group">
                    <span class="text-sm font-bold text-gray-400 transition-colors duration-200 group-hover:text-orange-600">Vehicle</span>
                    <span class="text-[9px] text-gray-300 uppercase font-bold tracking-tighter group-hover:text-orange-600">Status</span>
                </a>

                <a href="inspeksi.php"
                    class="flex flex-col items-center min-w-[80px] cursor-pointer transition-all duration-200 hover:scale-105 group">
                    <span class="text-sm font-bold text-gray-400 transition-colors duration-200 group-hover:text-orange-600">Inspeksi</span>
                    <span class="text-[9px] text-gray-300 uppercase font-bold tracking-tighter group-hover:text-orange-600">Harian</span>
                </a>

            </div>

            <div class="grid grid-cols-2 gap-4">
                <div onclick="location.href='rekapan_inspeksi.php'" class="bg-orange-600 rounded-2xl p-4 h-40 flex flex-col justify-between shadow-lg shadow-orange-100 active:scale-95 transition-all cursor-pointer">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-invoice text-white text-xl"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold font-montserrat text-sm leading-tight">Rekap</p>
                        <p class="text-white font-bold font-montserrat text-sm leading-tight">Inspeksi</p>
                    </div>
                </div>

                <div onclick="location.href='tracking_paket.php'" class="bg-orange-600 rounded-2xl p-4 h-40 flex flex-col justify-between shadow-lg shadow-orange-100 active:scale-95 transition-all cursor-pointer">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold font-montserrat text-sm leading-tight">Tracking</p>
                        <p class="text-white font-bold font-montserrat text-sm leading-tight">Paket</p>
                    </div>
                </div>

                <a href="jadwal_truck.php" class="bg-orange-600 rounded-2xl p-4 h-40 flex flex-col justify-between shadow-lg shadow-orange-100 active:scale-95 transition-all cursor-pointer">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold font-montserrat text-sm leading-tight">Jadwal</p>
                        <p class="text-white font-bold font-montserrat text-sm leading-tight">Truk</p>
                    </div>
                </a>

                <a href="intransit_update.php" class="bg-orange-600 rounded-2xl p-4 h-40 flex flex-col justify-between shadow-lg shadow-orange-100 active:scale-95 transition-all cursor-pointer">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-route text-white text-xl"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold font-montserrat text-sm leading-tight">In-Transit</p>
                        <p class="text-white font-bold font-montserrat text-sm leading-tight">Updates</p>
                    </div>
                </a>

                <a href="distribusi.php"
                    class="col-span-2 bg-orange-600 rounded-2xl p-6 h-32 flex items-center justify-between shadow-lg shadow-orange-100 active:scale-95 transition-all cursor-pointer relative overflow-hidden mt-2">

                    <div class="z-10">
                        <p class="text-white font-bold font-montserrat text-lg">Distribusi</p>
                        <p class="text-orange-100 text-[10px] mt-1">Monitoring arus barang regional</p>
                    </div>

                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-md z-10">
                        <i class="fas fa-boxes text-white text-2xl"></i>
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-orange-500 rounded-full opacity-50"></div>
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