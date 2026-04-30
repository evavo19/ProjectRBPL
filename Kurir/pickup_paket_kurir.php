<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pickup Paket - Kurir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#EF4C29',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .app-container {
            width: 390px;
            height: 725px;
            background-color: white;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .view-content {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 100px;
            scroll-behavior: smooth;
        }

        .view-content::-webkit-scrollbar {
            display: none;
        }

        .hidden-view {
            display: none;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-up {
            animation: slideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .nav-active {
            color: #EF4C29 !important;
        }

        .nav-active i {
            transform: scale(1.1);
            transition: transform 0.2s;
        }

        .scan-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 100;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .scanner-box {
            width: 250px;
            height: 250px;
            border: 2px solid white;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }

        .scanner-line {
            width: 100%;
            height: 2px;
            background: #EF4C29;
            position: absolute;
            top: 0;
            box-shadow: 0 0 15px #EF4C29;
            animation: scanAnim 2s infinite linear;
        }

        @keyframes scanAnim {
            0% {
                top: 0;
            }

            100% {
                top: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="app-container">

    <div id="scan-view" class="scan-overlay">
            <div class="scanner-box">
                <div class="scanner-line"></div>
                <div class="absolute inset-0 border-[40px] border-black/40"></div>
            </div>
            <p class="text-white mt-8 font-poppins text-center px-10">Arahkan kamera ke QR Code di paket untuk konfirmasi otomatis</p>
            <button onclick="closeScan()" class="mt-10 bg-white/10 hover:bg-white/20 text-white px-8 py-3 rounded-2xl border border-white/20 backdrop-blur-md">Batal</button>
        </div>

        <div id="view-pickup" class="view-content animate-up">
            <div class="px-6 pt-8 pb-4">
                <div class="flex justify-between items-center mb-1">
                    <h1 class="text-[10px] font-bold font-montserrat text-brand uppercase tracking-[0.2em]">Tugas Penjemputan</h1>
                    <button onclick="openScan()" class="p-2 bg-orange-50 rounded-xl text-brand hover:bg-brand hover:text-white transition-all duration-300">
                        <i data-lucide="scan-barcode" class="w-5 h-5"></i>
                    </button>
                </div>
                <h2 class="text-2xl font-bold font-poppins text-gray-900 leading-tight">Halo, Muhammad! 👋</h2>
                <p class="text-gray-400 text-xs mt-1 font-poppins">Kamu punya <span id="task-count-text" class="text-brand font-bold">2 paket</span> yang harus dijemput.</p>

                <div id="empty-tasks" class="hidden flex flex-col items-center justify-center mt-20 text-center animate-up">
                    <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="sparkles" class="w-16 h-16 text-gray-200"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Semua paket sudah di-pickup!</h3>
                    <p class="text-gray-400 text-xs px-10 mt-2">Kerja bagus! Silahkan beristirahat sejenak sambil menunggu jadwal berikutnya.</p>
                </div>

                <div id="task-list" class="mt-8 space-y-4">

                <div class="task-card bg-white p-5 rounded-[2.5rem] border border-gray-100 shadow-[0_10px_20px_-10px_rgba(0,0,0,0.05)]" id="task-1">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-50 to-orange-100 rounded-3xl flex items-center justify-center text-brand font-bold text-xl border border-orange-100 shadow-inner">
                                B
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h4 class="font-bold text-gray-900 text-[15px] font-poppins">Berkah Mart</h4>
                                    <span class="text-[10px] font-bold text-brand bg-orange-50 px-2 py-1 rounded-lg">14:00</span>
                                </div>
                                <p class="text-[11px] text-gray-400 font-medium mt-1 flex items-center gap-1">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i> Jl. Malioboro No. 10
                                </p>
                                <p class="text-[10px] text-gray-300 font-mono mt-1">Ref: RES-99221</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 mt-5">
                            <button class="bg-gray-50 text-gray-500 py-3 rounded-2xl text-[11px] font-bold hover:bg-orange-100 hover:text-orange-600 transition-all duration-300 flex items-center justify-center gap-2 active:scale-95 group">
                                <i data-lucide="navigation" class="w-3.5 h-3.5 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i> NAVIGASI
                            </button>
                            <button onclick="markAsPicked('1', 'Berkah Mart', 'RES-99221')" class="bg-brand text-white py-3 rounded-2xl text-[11px] font-bold shadow-lg shadow-brand/20 hover:bg-orange-400 hover:shadow-orange-400/40 transition-all duration-300 active:scale-95">
                                KONFIRMASI
                            </button>
                        </div>
                    </div>

                    <div class="task-card bg-white p-5 rounded-[2.5rem] border border-gray-100 shadow-[0_10px_20px_-10px_rgba(0,0,0,0.05)]" id="task-2">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-50 to-orange-100 rounded-3xl flex items-center justify-center text-brand font-bold text-xl border border-orange-100 shadow-inner">
                                S
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h4 class="font-bold text-gray-900 text-[15px] font-poppins">Sinar Jaya</h4>
                                    <span class="text-[10px] font-bold text-brand bg-orange-50 px-2 py-1 rounded-lg">15:30</span>
                                </div>
                                <p class="text-[11px] text-gray-400 font-medium mt-1 flex items-center gap-1">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i> Jl. Gejayan No. 45
                                </p>
                                <p class="text-[10px] text-gray-300 font-mono mt-1">Ref: RES-88112</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 mt-5">
                            <button class="bg-gray-50 text-gray-500 py-3 rounded-2xl text-[11px] font-bold hover:bg-orange-100 hover:text-orange-600 transition-all duration-300 flex items-center justify-center gap-2 active:scale-95 group">
                                <i data-lucide="navigation" class="w-3.5 h-3.5 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i> NAVIGASI
                            </button>
                            <button onclick="markAsPicked('2', 'Sinar Jaya', 'RES-88112')" class="bg-brand text-white py-3 rounded-2xl text-[11px] font-bold shadow-lg shadow-brand/20 hover:bg-orange-400 hover:shadow-orange-400/40 transition-all duration-300 active:scale-95">
                                KONFIRMASI
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="view-history" class="view-content hidden-view animate-up">
            <div class="px-6 pt-8 pb-4">
                <h1 class="text-[10px] font-bold font-montserrat text-brand uppercase tracking-[0.2em]">Data Riwayat</h1>
                <h2 class="text-2xl font-bold font-poppins text-gray-900 leading-tight">Selesai Hari Ini</h2>

                <div class="mt-6 bg-gray-900 p-6 rounded-[2.5rem] flex justify-between items-center text-white relative overflow-hidden">
                    <a href="/project_rbpl/Operator_Sortation_Center/status_sortir.php" class="absolute right-[-10px] top-[-10px] opacity-10">
                        <i data-lucide="package" class="w-24 h-24"></i>
                    </a>
                    <div class="relative z-10">
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Total Pickup</p>
                        <p id="history-count" class="text-3xl font-bold font-poppins mt-1">0 <span class="text-sm font-normal text-gray-400">Paket</span></p>
                    </div>
                    <div class="w-12 h-12 bg-brand rounded-2xl flex items-center justify-center shadow-lg shadow-brand/30">
                        <i data-lucide="check" class="w-6 h-6 text-white"></i>
                    </div>
                </div>

                <div id="history-list" class="mt-8 space-y-3">
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 w-full h-24 bg-white/80 backdrop-blur-xl border-t border-gray-100 flex justify-around items-center px-8 pb-4 z-40">
            <button onclick="switchView('pickup')" id="nav-pickup" class="flex flex-col items-center nav-active group transition-all duration-300">
                <i data-lucide="layout-grid" class="w-6 h-6 group-hover:scale-125 group-hover:text-orange-600 transition-all duration-300"></i>
                <span class="text-[10px] font-bold mt-1.5 font-poppins uppercase tracking-tighter group-hover:text-orange-600">Beranda</span>
            </button>

            <button onclick="openScan()" class="relative -top-10 w-16 h-16 bg-brand rounded-full flex items-center justify-center text-white shadow-xl shadow-brand/40 border-4 border-white active:scale-90 hover:bg-orange-400 hover:shadow-orange-400/50 transition-all duration-300">
                <i data-lucide="scan" class="w-7 h-7"></i>
            </button>

            <button onclick="switchView('history')" id="nav-history" class="flex flex-col items-center text-gray-300 group transition-all duration-300">
                <i data-lucide="history" class="w-6 h-6 group-hover:scale-125 group-hover:text-orange-600 transition-all duration-300"></i>
                <span class="text-[10px] font-bold mt-1.5 font-poppins uppercase tracking-tighter group-hover:text-orange-600">Riwayat</span>
            </button>
        </div>
    </div>

    <script>
        let tasksRemaining = 2;

        function checkEmptyState() {
            const list = document.getElementById('task-list');
            const empty = document.getElementById('empty-tasks');
            const counterText = document.getElementById('task-count-text');

            if (tasksRemaining === 0) {
                list.classList.add('hidden');
                empty.classList.remove('hidden');
                counterText.innerText = "tidak ada paket";

                setTimeout(() => {
                    switchView('history');
                }, 1200);
            } else {
                list.classList.remove('hidden');
                empty.classList.add('hidden');
                counterText.innerText = tasksRemaining + " paket";
            }
        }

        function switchView(viewName) {
            const pickupView = document.getElementById('view-pickup');
            const historyView = document.getElementById('view-history');
            const navPickup = document.getElementById('nav-pickup');
            const navHistory = document.getElementById('nav-history');

            if (viewName === 'pickup') {
                pickupView.classList.remove('hidden-view');
                historyView.classList.add('hidden-view');
                navPickup.classList.add('nav-active');
                navPickup.classList.remove('text-gray-300');
                navHistory.classList.add('text-gray-300');
                navHistory.classList.remove('nav-active');
            } else {
                historyView.classList.remove('hidden-view');
                pickupView.classList.add('hidden-view');
                navHistory.classList.add('nav-active');
                navHistory.classList.remove('text-gray-300');
                navPickup.classList.add('text-gray-300');
                navPickup.classList.remove('nav-active');
            }
        }

        function openScan() {
            document.getElementById('scan-view').style.display = 'flex';
        }

        function closeScan() {
            document.getElementById('scan-view').style.display = 'none';
        }

        function markAsPicked(id, name, resi) {
            const now = new Date();
            const timeStr = now.getHours().toString().padStart(2, '0') + ":" + now.getMinutes().toString().padStart(2, '0');

            const card = document.getElementById('task-' + id);
            if (!card) return;

            card.style.transform = 'scale(0.9) translateY(-20px)';
            card.style.opacity = '0';
            card.style.transition = 'all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';

            setTimeout(() => {
                card.remove();
                tasksRemaining--;
                checkEmptyState();

                const historyList = document.getElementById('history-list');
                const newItem = `
                    <div class="flex items-center gap-4 p-4 bg-white rounded-3xl border border-gray-50 shadow-sm animate-up">
                        <div class="w-10 h-10 rounded-2xl bg-green-50 flex items-center justify-center text-green-500">
                            <i data-lucide="package-check" class="w-5 h-5"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-[13px] font-bold text-gray-800 font-poppins">${name}</p>
                            <div class="flex justify-between items-center mt-0.5">
                                <p class="text-[10px] text-gray-400 font-mono">${resi}</p>
                                <p class="text-[9px] text-green-600 font-bold bg-green-50 px-2 py-0.5 rounded-md">PICKED UP • ${timeStr}</p>
                            </div>
                        </div>
                    </div>
                `;
                historyList.insertAdjacentHTML('afterbegin', newItem);

                const countElem = document.getElementById('history-count');
                const currentCount = parseInt(countElem.innerText);
                countElem.innerHTML = `${currentCount + 1} <span class="text-sm font-normal text-gray-400">Paket</span>`;

                lucide.createIcons();
            }, 500);
        }

        lucide.createIcons();
    </script>
</body>

</html>