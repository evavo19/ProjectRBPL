<?php
// Simulasi Backend Logic - PHP & Database (Simulasi integrasi Java)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data dari form
    $dataPaket = $_POST['data_paket'];
    $resi = $_POST['resi'];
    $tujuan = $_POST['tujuan'];

    /**
     * Logic Backend (Simulasi Java/Spring Boot API)
     * public ResponseEntity<?> savePackage(PackageRequest request) {
     * packageService.save(request);
     * return ResponseEntity.ok("Success");
     * }
     */
    
    // Simulasi Query SQL: 
    // "INSERT INTO middle_mile_log (data_paket, resi, tujuan) VALUES ('$dataPaket', '$resi', '$tujuan')"
    
    $success = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data - Middle Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-200 flex justify-center">

    <!-- Mobile Container: h-screen dan radius 25px sesuai desain sebelumnya -->
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
            <div class="px-6 py-4 flex items-center gap-4">
                <a href="javascript:history.back()" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white">Catat Data</h1>
            </div>
        </div>

        <!-- CONTENT AREA (Scrollable) -->
        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50">
            <form id="inputForm" method="POST" class="px-6 py-8 space-y-6">
                
                <!-- Input Group 1: Data Paket -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <label class="text-slate-800 text-lg font-medium font-poppins">Data Paket</label>
                    <div class="relative">
                        <input type="text" name="data_paket" placeholder="Enter ..." 
                            class="w-full h-11 px-4 bg-white border border-gray-200 shadow-sm rounded-lg text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                    </div>
                </div>

                <!-- Input Group 2: Resi -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <label class="text-slate-800 text-lg font-medium font-poppins">Resi</label>
                    <div class="relative">
                        <input type="text" name="resi" placeholder="Enter ..." 
                            class="w-full h-11 px-4 bg-white border border-gray-200 shadow-sm rounded-lg text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                    </div>
                </div>

                <!-- Input Group 3: Tujuan Pengiriman -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <label class="text-slate-800 text-lg font-medium font-poppins">Tujuan Pengiriman</label>
                    <div class="relative">
                        <input type="text" name="tujuan" placeholder="Enter ..." 
                            class="w-full h-11 px-4 bg-white border border-gray-200 shadow-sm rounded-lg text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                    </div>
                </div>

            </form>
        </div>

        <!-- FOOTER BUTTON (Fixed Bottom) -->
        <div class="flex-none p-6 bg-white border-t border-gray-100 shadow-[0px_-4px_10px_rgba(0,0,0,0.05)]">
            <button type="button" onclick="handleSave()" class="w-full h-12 bg-orange-600 hover:bg-orange-700 active:scale-95 text-white font-semibold font-montserrat rounded-lg shadow-lg flex items-center justify-center transition-all">
                Simpan
            </button>
        </div>

    </div>

    <!-- SUCCESS NOTIFICATION OVERLAY -->
    <div id="successModal" class="fixed inset-0 bg-black/60 z-[100] hidden items-center justify-center p-6 backdrop-blur-sm">
        <div class="bg-white rounded-[30px] p-8 w-full max-w-[320px] text-center shadow-2xl">
            <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-2">Tersimpan!</h3>
            <p class="text-gray-500 text-sm mb-8 font-montserrat">Data admin middle mile telah berhasil dicatat ke sistem.</p>
            <button onclick="location.href='catat.php'" class="w-full py-4 bg-slate-900 text-white rounded-xl font-bold hover:bg-black transition-colors">Oke</button>
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

        function handleSave() {
            const btn = document.querySelector('button');
            const originalText = btn.innerHTML;
            
            // Simulasi proses simpan
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-circle-notch animate-spin mr-2"></i> Memproses...';

            setTimeout(() => {
                btn.disabled = false;
                btn.innerHTML = originalText;
                document.getElementById('successModal').classList.remove('hidden');
                document.getElementById('successModal').classList.add('flex');
                document.getElementById('inputForm').reset();
            }, 1500);
        }
    </script>
</body>
</html>