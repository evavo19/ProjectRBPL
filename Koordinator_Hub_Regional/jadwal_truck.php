<?php

$departure_list = [
    [
        'id' => 'TRK-001',
        'plate' => 'B 1234 KGA',
        'driver' => 'Ahmad Subarjo',
        'destination' => 'Surabaya, Jawa Timur',
        'departure_time' => '08:00 WIB',
        'load_status' => 'Full Load',
        'status' => 'Siap Berangkat'
    ],
    [
        'id' => 'TRK-002',
        'plate' => 'D 5678 VBT',
        'driver' => 'Budi Santoso',
        'destination' => 'Bandung, Jawa Barat',
        'departure_time' => '09:30 WIB',
        'load_status' => 'Partial Load',
        'status' => 'Pemuatan'
    ],
    [
        'id' => 'TRK-003',
        'plate' => 'H 9012 LOP',
        'driver' => 'Siti Aminah',
        'destination' => 'Semarang, Jawa Tengah',
        'departure_time' => '11:00 WIB',
        'load_status' => 'Empty',
        'status' => 'Antre'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Keberangkatan Truk - Koordinator Hub Regional</title>
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

            <div class="px-6 py-4 flex items-center gap-4 border-b border-orange-500/30">
                <a href="distribusi.php" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white font-montserrat tracking-tight">Keberangkatan</h1>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pb-24">
            
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-slate-800 text-lg font-bold font-montserrat">Jadwal Hari Ini</h2>
                        <p class="text-xs text-gray-400 font-medium"><?php echo date('d M Y'); ?></p>
                    </div>
                    <div class="bg-orange-100 px-3 py-1.5 rounded-lg">
                        <span class="text-orange-700 text-xs font-bold"><?php echo count($departure_list); ?> Armada</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <?php foreach ($departure_list as $truck): ?>
                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 transition-all hover:shadow-md">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center border border-gray-100">
                                    <i class="fas fa-truck-moving text-orange-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase leading-none mb-1"><?php echo $truck['id']; ?></p>
                                    <p class="text-sm font-bold text-slate-800 leading-none"><?php echo $truck['plate']; ?></p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase <?php 
                                echo $truck['status'] == 'Siap Berangkat' ? 'bg-green-100 text-green-700' : 
                                    ($truck['status'] == 'Pemuatan' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600'); 
                            ?>">
                                <?php echo $truck['status']; ?>
                            </span>
                        </div>

                        <div class="grid grid-cols-2 gap-4 border-t border-gray-50 pt-4">
                            <div class="space-y-3">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-user text-[10px] text-gray-400"></i>
                                    <p class="text-[11px] text-gray-600 font-medium"><?php echo $truck['driver']; ?></p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-clock text-[10px] text-gray-400"></i>
                                    <p class="text-[11px] text-gray-600 font-medium"><?php echo $truck['departure_time']; ?></p>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-map-marker-alt text-[10px] text-orange-600"></i>
                                    <p class="text-[11px] text-gray-600 font-semibold truncate"><?php echo $truck['destination']; ?></p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-box text-[10px] text-gray-400"></i>
                                    <p class="text-[11px] text-gray-600 font-medium"><?php echo $truck['load_status']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex gap-2">
                            <button class="flex-1 py-2.5 bg-gray-900 text-white rounded-xl text-[11px] font-bold hover:bg-black transition-colors">
                                Detail Dokumen
                            </button>
                            <button class="flex-1 py-2.5 bg-orange-600 text-white rounded-xl text-[11px] font-bold shadow-lg shadow-orange-100 hover:bg-orange-700 transition-colors">
                                Mulai Perjalanan
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="absolute bottom-6 left-0 right-0 px-6 flex justify-center pointer-events-none">
            <a href="halaman_utama.php" class="pointer-events-auto bg-slate-900 text-white px-6 py-3.5 rounded-2xl font-bold font-montserrat shadow-2xl flex items-center gap-3 active:scale-95 transition-all">
                <i class="fas fa-home"></i>
                <span class="text-sm">Halaman Utama</span>
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