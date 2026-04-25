<?php

$upcoming_trips = [
    [
        'route' => 'Karawang, Jawa Barat',
        'driver' => 'Alex Johnson',
        'time' => '10:00 AM, Nov 5th',
        'type' => 'Keberangkatan'
    ],
    [
        'route' => 'Pati, Jawa Tengah',
        'driver' => 'Maria Garcia',
        'time' => '1:00 PM, Nov 5th',
        'type' => 'Keberangkatan'
    ],
    [
        'route' => 'Bantul, Yogyakarta',
        'driver' => 'John Doe',
        'time' => '08:00 AM, Nov 6th',
        'type' => 'Kedatangan'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribusi - Koordinator Hub Regional</title>
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

    <div class="w-full max-w-[384px] h-screen bg-white shadow-2xl relative flex flex-col md:rounded-[25px] overflow-hidden">
        
        <div class="flex-none bg-orange-600 z-50">

            <div class="px-6 py-4 flex items-center gap-4 border-b border-orange-500/30">
                <a href="halaman_utama.php" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white font-montserrat tracking-tight">Distribusi</h1>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pb-10">
            
            <div class="p-6">
                <h2 class="text-slate-800 text-lg font-bold font-montserrat mb-4">Truck Schedule</h2>
                <div class="w-full aspect-[4/3] bg-lime-100 rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&q=80&w=600" 
                         class="w-full h-full object-cover opacity-80" alt="Map Preview">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-sm p-3 rounded-xl border border-white/50 shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-truck text-orange-600"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase">Live Update</p>
                                <p class="text-xs font-bold text-slate-800">4 Truk dalam perjalanan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 space-y-4">
                <div class="flex justify-between items-end">
                    <h2 class="text-slate-800 text-lg font-bold font-montserrat">Upcoming Trips</h2>
                    <span class="text-[10px] font-bold text-orange-600 uppercase mb-1">See All</span>
                </div>

                <div class="space-y-4">
                    <?php foreach ($upcoming_trips as $trip): ?>
                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 outline outline-1 outline-black/5 hover:border-orange-200 transition-colors">
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full <?php echo $trip['type'] == 'Keberangkatan' ? 'bg-green-500' : 'bg-blue-500'; ?>"></div>
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider"><?php echo $trip['type']; ?></span>
                            </div>
                            <i class="fas fa-ellipsis-h text-gray-300"></i>
                        </div>
                        
                        <div class="space-y-2">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-map-marker-alt text-orange-600 text-xs w-4"></i>
                                <p class="text-sm font-semibold text-slate-800"><?php echo $trip['route']; ?></p>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-user text-gray-400 text-xs w-4"></i>
                                <p class="text-[13px] text-gray-600 font-medium">Driver: <?php echo $trip['driver']; ?></p>
                            </div>
                            <div class="flex items-center gap-3 pt-2 border-t border-gray-50 mt-2">
                                <i class="far fa-clock text-gray-400 text-xs w-4"></i>
                                <p class="text-[12px] text-gray-500 italic"><?php echo $trip['time']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <button class="w-full mt-4 py-4 bg-orange-600 text-white rounded-2xl font-bold font-montserrat shadow-lg shadow-orange-100 active:scale-95 transition-all flex items-center justify-center gap-3">
                    <i class="fas fa-plus-circle"></i>
                    <span>Add Schedule</span>
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