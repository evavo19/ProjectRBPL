<?php

$trip_info = [
    'trip_id' => 'TRIP-2024-001',
    'truck_id' => 'TRK-001',
    'plate' => 'B 1234 KGA',
    'driver' => 'Ahmad Subarjo',
    'origin' => 'Jakarta (Hub Barat)',
    'destination' => 'Surabaya (Hub Timur)',
    'current_location' => 'Rest Area KM 57',
    'status' => 'In Transit'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Perjalanan - Middle Mile</title>
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
                <a href="jadwal_truck_berangkat.php" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white font-montserrat tracking-tight">Update In-Transit</h1>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pb-32">
            
            <div class="p-6">
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[10px] font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded-md uppercase"><?php echo $trip_info['trip_id']; ?></span>
                        <span class="text-xs font-semibold text-green-600 flex items-center gap-1">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span> Aktif
                        </span>
                    </div>
                    
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-slate-900 rounded-xl flex items-center justify-center text-white text-xl">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 leading-none"><?php echo $trip_info['plate']; ?></h3>
                            <p class="text-xs text-gray-400 mt-1"><?php echo $trip_info['driver']; ?></p>
                        </div>
                    </div>

                    <div class="space-y-3 pt-3 border-t border-gray-50">
                        <div class="flex items-start gap-3">
                            <div class="flex flex-col items-center gap-1 mt-1">
                                <div class="w-2 h-2 rounded-full bg-orange-600"></div>
                                <div class="w-0.5 h-6 bg-gray-200"></div>
                                <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                            </div>
                            <div class="flex-1">
                                <p class="text-[10px] text-gray-400 font-bold uppercase">Asal</p>
                                <p class="text-xs font-semibold text-slate-700"><?php echo $trip_info['origin']; ?></p>
                                <p class="text-[10px] text-gray-400 font-bold uppercase mt-2">Tujuan</p>
                                <p class="text-xs font-semibold text-slate-700"><?php echo $trip_info['destination']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <form id="updateForm" class="space-y-6">
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                        <h3 class="text-sm font-bold text-slate-800 mb-4 font-montserrat uppercase tracking-wider">Update Lokasi Saat Ini</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="text-[11px] font-bold text-gray-400 uppercase mb-2 block">Lokasi Sekarang</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-orange-600">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <input type="text" value="<?php echo $trip_info['current_location']; ?>" 
                                           class="w-full pl-10 pr-4 py-3.5 bg-gray-50 border border-gray-100 rounded-xl text-sm font-medium focus:ring-2 focus:ring-orange-500 outline-none">
                                </div>
                            </div>

                            <div>
                                <label class="text-[11px] font-bold text-gray-400 uppercase mb-2 block">Status Kendaraan</label>
                                <select class="w-full px-4 py-3.5 bg-gray-50 border border-gray-100 rounded-xl text-sm font-medium focus:ring-2 focus:ring-orange-500 outline-none appearance-none">
                                    <option>Lancar (Normal)</option>
                                    <option>Macet Parah</option>
                                    <option>Istirahat/Rest Area</option>
                                    <option>Kendala Teknis</option>
                                    <option>Bongkar Muat</option>
                                </select>
                            </div>

                            <div>
                                <label class="text-[11px] font-bold text-gray-400 uppercase mb-2 block">Catatan Perjalanan</label>
                                <textarea rows="3" placeholder="Tambahkan catatan jika ada..." 
                                          class="w-full px-4 py-3.5 bg-gray-50 border border-gray-100 rounded-xl text-sm font-medium focus:ring-2 focus:ring-orange-500 outline-none"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 bg-white p-6 shadow-[2px_-2px_10px_0px_rgba(3,3,3,0.05)] border-t border-gray-100">
            <button type="button" onclick="submitUpdate()" id="btnSubmit" class="w-full py-4 bg-orange-600 text-white rounded-2xl font-bold font-montserrat shadow-lg shadow-orange-100 active:scale-95 transition-all flex justify-center items-center gap-2">
                <span id="btnText">Simpan Update</span>
            </button>
            <a href="halaman_utama.php" class="mt-4 block text-center text-gray-400 text-xs font-bold font-montserrat uppercase tracking-widest">Batalkan</a>
        </div>

    </div>

    <div id="successModal" class="fixed inset-0 bg-black/60 z-[100] hidden items-center justify-center p-6 backdrop-blur-sm">
        <div class="bg-white rounded-[30px] p-8 w-full max-w-[320px] text-center shadow-2xl scale-90 animate-in fade-in zoom-in duration-300">
            <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                <i class="fas fa-check-double"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-2 font-montserrat">Update Berhasil</h3>
            <p class="text-gray-500 text-sm mb-8 font-poppins">Lokasi armada telah diperbarui di sistem monitoring pusat.</p>
            <button onclick="window.location.href='halaman_utama.php'" class="w-full py-4 bg-slate-900 text-white rounded-xl font-bold hover:bg-black transition-colors">Selesai</button>
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

        function submitUpdate() {
            const btn = document.getElementById('btnSubmit');
            const text = document.getElementById('btnText');
            
            btn.disabled = true;
            btn.classList.replace('bg-orange-600', 'bg-orange-400');
            text.innerHTML = '<i class="fas fa-circle-notch animate-spin"></i> Memproses...';

            setTimeout(() => {
                text.innerText = "Disimpan!";
                btn.classList.replace('bg-orange-400', 'bg-green-600');
                
                setTimeout(() => {
                    document.getElementById('successModal').classList.remove('hidden');
                    document.getElementById('successModal').classList.add('flex');
                }, 500);
            }, 1500);
        }
    </script>
</body>
</html>