<?php
// Simulasi Backend Logic - PHP (Data dinamis dari Database/Java Service)
$stats = [
    'shipped' => 250,
    'total_weight' => '5,000 kg',
    'avg_delivery' => '10 Hari'
];

$shipments = [
    [
        'rute' => 'Karawang, Jawa Barat',
        'driver' => 'Alex Johnson',
        'time' => '10:00 AM, Nov 5th',
        'type' => 'Keberangkatan'
    ],
    [
        'rute' => 'Pati, Jawa Tengah',
        'driver' => 'Maria Garcia',
        'time' => '1:00 PM, Nov 5th',
        'type' => 'Rute'
    ],
    [
        'rute' => 'Bantul, Yogyakarta',
        'driver' => 'John Doe',
        'time' => '8:00 AM, Nov 6th',
        'type' => 'Kedatangan'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik & Catat - Middle Mile</title>
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

    <!-- Mobile Container: h-screen dan radius 25px -->
    <div class="w-full max-w-[384px] h-screen bg-white shadow-2xl relative flex flex-col md:rounded-[25px] overflow-hidden">

        <!-- HEADER ORANGE & STATUS BAR -->
        <div class="flex-none bg-orange-600 z-50">
            <!-- STATUS BAR -->
            <div class="px-6 pt-5 pb-2">
                <div class="flex justify-between items-center text-white">
                    <span class="text-xs font-semibold" id="current-time">09:41</span>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                        </svg>
                        <div class="flex items-center">
                            <div class="w-5 h-2.5 border border-white rounded-[2px] p-[1px] flex items-center">
                                <div class="bg-white h-full w-[70%] rounded-[1px]"></div>
                            </div>
                            <div class="w-[2px] h-1 bg-white ml-[1px] rounded-sm"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PROFILE SECTION (Sesuai Desain: White Background Box) -->
            <div class="px-6 py-6 bg-white mx-6 mb-6 rounded-2xl shadow-lg flex items-center gap-4 border border-gray-100">
                <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-orange-100 flex-none">
                    <img src="admin.png" alt="Profile" class="w-full h-full object-cover">
                </div>
                <div class="overflow-hidden">
                    <h2 class="text-slate-900 text-xl font-bold font-montserrat truncate">Package Statistics</h2>
                    <p class="text-gray-500 text-sm font-montserrat tracking-tight">@admin.middle.mile</p>
                </div>
            </div>
        </div>

        <!-- CONTENT AREA (Scrollable) -->
        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pb-24">

            <!-- STATS GRID (Sesuai Desain: 3 Icons & Numbers) -->
            <div class="px-6 py-6 grid grid-cols-3 gap-2">
                <!-- Stat 1 -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center mb-3 text-white shadow-md group-hover:scale-110 transition-transform">
                        <i class="fas fa-box"></i>
                    </div>
                    <span class="text-slate-900 text-lg font-bold font-montserrat leading-tight"><?php echo $stats['shipped']; ?></span>
                    <p class="text-gray-400 text-[10px] uppercase font-bold mt-1 font-montserrat">Packages shipped</p>
                </div>
                <!-- Stat 2 -->
                <div class="flex flex-col items-center text-center group border-x border-gray-200">
                    <div class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center mb-3 text-white shadow-md group-hover:scale-110 transition-transform">
                        <i class="fas fa-weight-hanging"></i>
                    </div>
                    <span class="text-slate-900 text-lg font-bold font-montserrat leading-tight"><?php echo $stats['total_weight']; ?></span>
                    <p class="text-gray-400 text-[10px] uppercase font-bold mt-1 font-montserrat">Total weight</p>
                </div>
                <!-- Stat 3 -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center mb-3 text-white shadow-md group-hover:scale-110 transition-transform">
                        <i class="fas fa-clock"></i>
                    </div>
                    <span class="text-slate-900 text-lg font-bold font-montserrat leading-tight"><?php echo $stats['avg_delivery']; ?></span>
                    <p class="text-gray-400 text-[10px] uppercase font-bold mt-1 font-montserrat leading-none">Average delivery time</p>
                </div>
            </div>

            <!-- SHIPMENT LIST SECTION -->
            <div class="px-6 space-y-4">
                <h3 class="text-slate-800 font-bold font-montserrat text-base">Riwayat Terbaru</h3>

                <?php foreach ($shipments as $item): ?>
                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 hover:border-orange-200 transition-colors">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center gap-2">
                                <div class="w-1.5 h-1.5 rounded-full bg-orange-600"></div>
                                <span class="text-slate-800 text-sm font-semibold font-montserrat">Rute: <?php echo $item['rute']; ?></span>
                            </div>
                            <span class="text-[9px] font-bold text-orange-600 bg-orange-50 px-2 py-0.5 rounded uppercase"><?php echo $item['type']; ?></span>
                        </div>
                        <div class="space-y-1 ml-3.5">
                            <div class="flex items-center gap-2 text-xs text-gray-500 font-montserrat">
                                <i class="far fa-user w-3"></i>
                                <span>Driver: <?php echo $item['driver']; ?></span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-gray-400 font-montserrat">
                                <i class="far fa-calendar-alt w-3"></i>
                                <span><?php echo $item['time']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <!-- FOOTER BUTTON: INPUT BARU (Sesuai Desain: Fixed Bottom) -->
        <div class="flex-none p-6 bg-white border-t border-gray-100 shadow-[0px_-4px_15px_rgba(0,0,0,0.05)]">
            <div class="flex gap-3">
                <button onclick="location.href='tracking.php'" class="flex-1 h-12 bg-orange-50 text-orange-600 hover:bg-orange-100 active:scale-95 font-bold font-montserrat rounded-xl shadow-sm flex items-center justify-center gap-2 transition-all border border-orange-200">
                    <i class="fas fa-map-marker-alt text-sm"></i>
                    <span>Tracking</span>
                </button>

                <button onclick="location.href='input.php'" class="flex-1 h-12 bg-orange-600 text-white hover:bg-orange-700 active:scale-95 font-bold font-montserrat rounded-xl shadow-sm flex items-center justify-center gap-2 transition-all">
                    <i class="fas fa-plus-circle text-sm"></i>
                    <span>Input Baru</span>
                </button>
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