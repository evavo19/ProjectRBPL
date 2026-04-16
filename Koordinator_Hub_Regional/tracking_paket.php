<?php
/**
 * Simulasi Data Tracking Paket
 */
$stats = [
    'in_transit' => '1,245',
    'active_drivers' => '87',
    'availability' => '96%'
];

$packages = [
    ['id' => '#12345', 'status' => 'In Transit', 'status_color' => 'text-orange-600 bg-orange-50'],
    ['id' => '#67890', 'status' => 'Delivered', 'status_color' => 'text-green-600 bg-green-50'],
    ['id' => '#11223', 'status' => 'Pending', 'status_color' => 'text-gray-500 bg-gray-50'],
    ['id' => '#12347', 'status' => 'In Transit', 'status_color' => 'text-orange-600 bg-orange-50']
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Paket - Middle Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-200 flex justify-center">

    <!-- Mobile Container (Radius 25px) -->
    <div class="w-full max-w-[384px] h-screen bg-white shadow-2xl relative flex flex-col md:rounded-[25px] overflow-hidden">
        
        <!-- HEADER SECTION -->
        <div class="flex-none bg-orange-600 z-50">
            <!-- STATUS BAR -->
            <div class="px-6 pt-5 pb-2">
                <div class="flex justify-between items-center text-white">
                    <span class="text-xs font-semibold" id="current-time">09:41</span>
                    <div class="flex items-center gap-1.5">
                        <i class="fas fa-signal text-[10px]"></i>
                        <div class="flex items-center">
                            <div class="w-5 h-2.5 border border-white rounded-[2px] p-[1px] flex items-center">
                                <div class="bg-white h-full w-[70%] rounded-[1px]"></div>
                            </div>
                            <div class="w-[2px] h-1 bg-white ml-[1px] rounded-sm"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TITLE BAR -->
            <div class="px-6 py-4 flex items-center gap-4 border-b border-orange-500/30">
                <a href="halaman_utama.php" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white font-montserrat tracking-tight">Tracking Paket</h1>
            </div>
        </div>

        <!-- CONTENT AREA -->
        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pb-24">
            
            <!-- Quick Stats -->
            <div class="p-6 space-y-3">
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <span class="text-sm font-bold text-slate-700">Packages in Transit</span>
                    <span class="text-xl font-bold text-orange-600 font-montserrat"><?php echo $stats['in_transit']; ?></span>
                </div>
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <span class="text-sm font-bold text-slate-700">Active Drivers</span>
                    <span class="text-xl font-bold text-orange-600 font-montserrat"><?php echo $stats['active_drivers']; ?></span>
                </div>
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <span class="text-sm font-bold text-slate-700">Vehicle Availability</span>
                    <span class="text-xl font-bold text-orange-600 font-montserrat"><?php echo $stats['availability']; ?></span>
                </div>
            </div>

            <!-- Package List -->
            <div class="px-6 pb-6">
                <h2 class="text-lg font-bold text-slate-800 font-montserrat mb-4">Monitoring Paket</h2>
                <div class="space-y-4">
                    <?php foreach ($packages as $pkg): ?>
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 transition-all hover:shadow-md">
                        <!-- Container Flex Row untuk menyejajarkan kiri dan kanan -->
                        <div class="flex justify-between items-center">
                            <!-- Sisi Kiri: ID dan Status -->
                            <div class="flex flex-col items-start text-left">
                                <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Package ID</p>
                                <h3 class="text-base font-bold text-slate-800 font-montserrat mb-2"><?php echo $pkg['id']; ?></h3>
                                <div class="inline-block px-3 py-1 rounded-lg text-[10px] font-bold uppercase <?php echo $pkg['status_color']; ?>">
                                    <?php echo $pkg['status']; ?>
                                </div>
                            </div>
                            
                            <!-- Sisi Kanan: Button View Details (Terpusat secara vertikal terhadap konten kiri) -->
                            <button onclick="window.location.href='konfirmasi_paket.php'" class="px-5 py-2.5 bg-orange-600 text-white text-[11px] font-bold rounded-xl shadow-lg shadow-orange-100 active:scale-95 transition-all">
                                View Details
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali ke Halaman Utama (Floating Button) -->
        <div class="absolute bottom-6 left-0 right-0 px-6 flex justify-center pointer-events-none">
            <a href="halaman_utama.php" class="pointer-events-auto bg-slate-900 text-white px-6 py-3.5 rounded-2xl font-bold font-montserrat shadow-2xl flex items-center gap-3 active:scale-95 transition-all">
                <i class="fas fa-home"></i>
                <span class="text-sm uppercase tracking-wider">Halaman Utama</span>
            </a>
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