<?php
$packageId = isset($_GET['id']) ? $_GET['id'] : 'PKG12345';
$destination = isset($_GET['dest']) ? $_GET['dest'] : 'Bantul, Yogyakarta';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newDest = $_POST['new_destination'];
    $notes = $_POST['notes'];

    $success = true;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit & Konfirmasi Paket - Operator Sortation Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .font-roboto {
            font-family: 'Roboto', sans-serif;
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
            <div class="px-6 py-4 flex items-center gap-4">
                <a href="javascript:history.back()" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white">Status Sortir</h1>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50">
            <form id="confirmForm" method="POST" class="px-6 py-6 space-y-6">

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                    <h2 class="text-slate-800 text-lg font-bold font-roboto mb-4 flex items-center gap-2">
                        <i class="fas fa-box-open text-orange-600 text-sm"></i>
                        Package Summary
                    </h2>
                    <div class="space-y-3 font-roboto text-sm text-gray-600">
                        <div class="flex justify-between border-b border-gray-50 pb-2">
                            <span>Package ID</span>
                            <span class="font-bold text-slate-800"><?php echo $packageId; ?></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-50 pb-2">
                            <span>Weight</span>
                            <span class="font-bold text-slate-800">5kg</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-50 pb-2">
                            <span>Dimensions</span>
                            <span class="font-bold text-slate-800">30x20x15 cm</span>
                        </div>
                        <div class="pt-2">
                            <span class="text-gray-400 block text-[10px] uppercase font-bold mb-1">Current Destination</span>
                            <p class="text-orange-600 font-bold text-base leading-tight"><?php echo $destination; ?></p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                    <h2 class="text-slate-800 text-lg font-bold font-roboto mb-4 flex items-center gap-2">
                        <i class="fas fa-edit text-orange-600 text-sm"></i>
                        Edit Destination
                    </h2>
                    <div class="space-y-4">
                        <div class="relative">
                            <input type="text" name="new_destination" placeholder="Enter new destination"
                                class="w-full pl-4 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-orange-500 focus:bg-white outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2 ml-1">Catatan Tambahan</label>
                            <textarea name="notes" rows="3" placeholder="Tambahkan deskripsi paket..."
                                class="w-full p-4 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-orange-500 focus:bg-white outline-none transition-all"></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 mb-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-slate-800 text-base font-bold font-roboto">Confirmation</h2>
                            <p class="text-[11px] text-gray-400">Pastikan tujuan sudah sesuai</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" required class="sr-only peer">
                            <div class="w-12 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-6 peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                        </label>
                    </div>
                </div>
            </form>
        </div>

        <div class="flex-none p-6 bg-white border-t border-gray-100 z-50">
            <button onclick="handleSubmit()" class="w-full h-14 bg-orange-600 hover:bg-orange-700 active:scale-95 text-white font-bold rounded-2xl shadow-lg shadow-orange-100 flex items-center justify-center gap-3 transition-all">
                <span>Teruskan Ke Hub Regional</span>
                <i class="fas fa-chevron-right text-xs"></i>
            </button>
        </div>

    </div>

    <div id="successModal" class="fixed inset-0 bg-black/60 z-[100] hidden items-center justify-center p-6 backdrop-blur-sm">
        <div class="bg-white rounded-[30px] p-8 w-full max-w-[320px] text-center shadow-2xl">
            <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-2">Berhasil!</h3>
            <p class="text-gray-500 text-sm mb-8">Data paket diperbarui dan diteruskan ke Admin Middle Mile.</p>
            <button onclick="location.href='/Admin_Middle_Mile/catat_admin.php'" class="w-full py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-black transition-colors">Selesai</button>
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

        function handleSubmit() {
            const btn = document.querySelector('button');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-circle-notch animate-spin"></i> Memproses...';

            setTimeout(() => {
                document.getElementById('successModal').classList.remove('hidden');
                document.getElementById('successModal').classList.add('flex');
            }, 1200);
        }
    </script>
</body>

</html>