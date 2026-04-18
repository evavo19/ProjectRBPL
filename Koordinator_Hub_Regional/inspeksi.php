<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspeksi Kendaraan - Koordinator Hub Regional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        input[type="checkbox"]:checked+label { color: #ea580c; font-weight: 600; }
        
        .modal-animate { animation: modalIn 0.3s ease-out forwards; }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
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
                        <div class="w-5 h-2.5 border border-white rounded-[2px] p-[1px] flex items-center">
                            <div class="bg-white h-full w-[70%] rounded-[1px]"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 flex items-center gap-4 border-b border-orange-500/30">
                <a href="javascript:history.back()" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white font-montserrat tracking-tight">Inspeksi</h1>
            </div>
        </div>

        <form id="inspectionForm" class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pb-32">
            <div class="p-6 space-y-6">
                <h2 class="text-slate-800 text-lg font-bold font-montserrat mb-2">Inspeksi Kendaraan</h2>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 outline outline-1 outline-black/5">
                    <h3 class="text-black text-lg font-semibold font-poppins mb-4 border-b border-gray-50 pb-2">Checklist Inspeksi</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="ban" class="w-5 h-5 accent-orange-600 rounded">
                            <label for="ban" class="text-sm font-montserrat text-gray-700">Kondisi Ban</label>
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="rem" class="w-5 h-5 accent-orange-600 rounded">
                            <label for="rem" class="text-sm font-montserrat text-gray-700">Fungsi Rem</label>
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="lampu" class="w-5 h-5 accent-orange-600 rounded">
                            <label for="lampu" class="text-sm font-montserrat text-gray-700">Lampu dan Sinyal</label>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 outline outline-1 outline-black/5">
                    <h3 class="text-black text-lg font-semibold font-poppins mb-3">Hasil Inspeksi</h3>
                    <input type="text" placeholder="Masukkan hasil..." class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none shadow-sm">
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 outline outline-1 outline-black/5">
                    <h3 class="text-black text-lg font-semibold font-montserrat mb-3">Komentar</h3>
                    <textarea rows="4" placeholder="Tambahkan catatan..." class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none shadow-sm"></textarea>
                </div>
            </div>
        </form>

        <div class="absolute bottom-0 left-0 right-0 bg-white p-6 shadow-[2px_-2px_10px_0px_rgba(3,3,3,0.10)] border-t border-gray-100">
            <button type="button" onclick="handleKirim()" id="btnKirim" class="w-full py-4 bg-orange-600 text-white rounded-2xl font-bold font-montserrat shadow-lg shadow-orange-100 active:scale-95 transition-all flex justify-center items-center gap-2">
                <span id="btnText">Kirim Hasil</span>
            </button>
        </div>

    </div>

    <div id="successModal" class="fixed inset-0 bg-black/60 z-[100] hidden flex items-center justify-center p-6 backdrop-blur-sm">
        <div class="bg-white rounded-[30px] p-8 w-full max-w-[320px] text-center shadow-2xl modal-animate">
            <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                <i class="fas fa-check-double"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-2 font-montserrat">Data Terkirim</h3>
            <p class="text-gray-500 text-sm mb-8 font-poppins">Laporan inspeksi kendaraan telah berhasil disimpan ke sistem.</p>
            <button onclick="window.location.href='halaman_utama.php'" class="w-full py-4 bg-slate-900 text-white rounded-xl font-bold hover:bg-black transition-colors">Selesai</button>
        </div>
    </div>

    <script>
        function handleKirim() {
            const btn = document.getElementById('btnKirim');
            const btnText = document.getElementById('btnText');
            const modal = document.getElementById('successModal');

            btn.disabled = true;
            btn.classList.replace('bg-orange-600', 'bg-orange-400');
            btnText.innerHTML = '<i class="fas fa-circle-notch animate-spin"></i> Mengirim...';

            setTimeout(() => {
                btnText.innerText = "Berhasil!";
                btn.classList.replace('bg-orange-400', 'bg-green-600');

                setTimeout(() => {
                    modal.classList.remove('hidden');
                }, 500);

            }, 1500);
        }

        function updateClock() {
            const now = new Date();
            const clockEl = document.getElementById('current-time');
            if (clockEl) clockEl.textContent = String(now.getHours()).padStart(2, '0') + ":" + String(now.getMinutes()).padStart(2, '0');
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>