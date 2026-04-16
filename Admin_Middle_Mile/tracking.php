<?php
// Simulasi Backend Logic - PHP (Data dinamis dari Database/Java Service)
$packages = [
    ['id' => '12345', 'status' => 'In Transit', 'color' => 'orange'],
    ['id' => '67890', 'status' => 'Delivered', 'color' => 'green'],
    ['id' => '11223', 'status' => 'Pending', 'color' => 'gray'],
    ['id' => '12347', 'status' => 'In Transit', 'color' => 'orange'],
    ['id' => '12350', 'status' => 'In Transit', 'color' => 'orange'],
];

/**
 * Logic Backend (Simulasi Java/Spring Boot)
 * @GetMapping("/api/packages/tracking")
 * public List<PackageDTO> getAllTracking() {
 * return packageService.findAllActiveTracking();
 * }
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking - Middle Mile</title>
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

            <!-- HEADER TITLE -->
            <div class="px-6 py-4 flex items-center gap-4 border-b border-orange-500/30">
                <a href="javascript:history.back()" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white">Tracking</h1>
            </div>
        </div>

        <!-- CONTENT AREA (Scrollable) -->
        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pb-4 px-6 py-6">
            
            <div class="space-y-4">
                <?php foreach ($packages as $pkg): ?>
                <!-- Package Card -->
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex justify-between items-center outline outline-1 outline-black/5 hover:border-orange-300 transition-colors">
                    <div class="space-y-1">
                        <h3 class="text-slate-900 text-base font-medium font-montserrat">Package #<?php echo $pkg['id']; ?></h3>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full <?php 
                                echo $pkg['status'] === 'Delivered' ? 'bg-green-500' : ($pkg['status'] === 'Pending' ? 'bg-gray-400' : 'bg-orange-500'); 
                            ?>"></span>
                            <p class="text-gray-500 text-sm font-montserrat">Status: <?php echo $pkg['status']; ?></p>
                        </div>
                    </div>
                    
                    <button onclick="location.href='catat.php?id=<?php echo $pkg['id']; ?>'" 
                        class="px-4 py-2 bg-orange-600 text-white text-xs font-semibold font-montserrat rounded-lg hover:bg-orange-700 active:scale-95 transition-all shadow-md shadow-orange-100">
                        View Details
                    </button>
                </div>
                <?php endforeach; ?>
            </div>

        </div>

        <!-- FOOTER BUTTON: INPUT BARU (Sama seperti catat.php) -->
        <div class="flex-none p-6 bg-white border-t border-gray-100 shadow-[0px_-4px_15px_rgba(0,0,0,0.05)]">
            <button onclick="location.href='input.php'" class="w-full h-12 bg-white border-2 border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white active:scale-95 font-bold font-montserrat rounded-xl shadow-sm flex items-center justify-center gap-2 transition-all">
                <i class="fas fa-plus-circle text-sm"></i>
                <span>Input Baru</span>
            </button>
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