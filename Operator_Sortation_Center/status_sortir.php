<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Sortir - Operator Sortation Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Poppins:wght@400;600&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex justify-center">

    <div class="w-full max-w-[384px] min-h-screen bg-white shadow-2xl relative md:rounded-[25px] overflow-hidden flex flex-col">

        <div class="bg-white text-black p-4 pb-6">
            <div class="flex items-center gap-4">
                <h1 class="text-xl font-semibold">Status Sortir</h1>
            </div>
        </div>

        <div class="flex-1 px-6 pb-10">
            
            <div class="bg-orange-600 rounded-2xl p-4 shadow-lg mb-6 overflow-hidden">
                <div class="relative w-full aspect-video bg-gray-200 rounded-xl flex items-center justify-center border-2 border-dashed border-white/50">
                    <img id="scanner-preview" class="w-full h-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=400" alt="Scanner View" />
                    <div class="absolute inset-0 border-[30px] border-black/20 pointer-events-none"></div>
                    <div class="absolute w-4/5 h-0.5 bg-orange-400 top-1/2 -translate-y-1/2 animate-pulse shadow-[0_0_15px_rgba(251,146,60,1)]"></div>
                </div>
                <p class="text-white text-center text-xs mt-3 font-montserrat font-medium">Posisikan Barcode di Tengah Frame</p>
            </div>

            <div class="relative mb-6">
                <div class="flex items-center bg-white border border-gray-200 rounded-xl shadow-sm px-4 py-3.5 focus-within:ring-2 focus-within:ring-orange-500 transition-all">
                    <i class="fas fa-barcode text-gray-400 mr-3"></i>
                    <input type="text" id="package-code" placeholder="Scan or enter package code" 
                           class="w-full outline-none text-sm font-montserrat bg-transparent" />
                    <button onclick="fetchPackageData()" class="ml-2 text-orange-600 font-bold text-xs uppercase tracking-wider">Cek</button>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm mb-6 transition-all hover:shadow-md">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1.5 h-6 bg-orange-600 rounded-full"></div>
                    <h2 class="text-lg font-semibold font-montserrat">Package Information</h2>
                </div>
                
                <div class="space-y-4 font-montserrat text-sm">
                    <div class="flex justify-between items-start">
                        <span class="text-gray-500">Destination:</span>
                        <span id="dest-val" class="text-right font-semibold max-w-[60%] text-slate-800">Triwidadi, Pajangan, Bantul, Yogyakarta</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Status:</span>
                        <span id="status-val" class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase">In Transit</span>
                    </div>
                    <div class="flex justify-between items-center border-t border-gray-50 pt-4">
                        <span class="text-gray-500">Weight:</span>
                        <span id="weight-val" class="font-bold text-slate-800">2.5 kg</span>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm mb-8">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1.5 h-6 bg-red-500 rounded-full"></div>
                    <h2 class="text-lg font-semibold font-montserrat">Alerts / Notes</h2>
                </div>
                
                <ul class="space-y-4">
                    <li class="flex items-center gap-3 text-sm text-gray-700 font-montserrat">
                        <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-hand-holding-heart text-orange-600"></i>
                        </div>
                        Handle with care
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-700 font-montserrat">
                        <div class="w-8 h-8 bg-red-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-wine-glass text-red-600"></i>
                        </div>
                        <span class="text-red-600 font-semibold">Fragile Items</span>
                    </li>
                </ul>
            </div>

            <div class="text-center">
                <a href="detail_riwayat_sortir.php" class="text-blue-500 text-xs font-semibold hover:underline flex items-center justify-center gap-1">
                    Lihat detail riwayat sortir <i class="fas fa-chevron-right text-[10px]"></i>
                </a>
            </div>
        </div>
    </div>

    <script>
        async function fetchPackageData() {
            const codeInput = document.getElementById('package-code');
            const statusVal = document.getElementById('status-val');
            
            if(!codeInput || !codeInput.value) return;

            statusVal.innerText = "Loading...";
            
            setTimeout(() => {
                statusVal.innerText = "Sorting Center";
                statusVal.className = "px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase";
            }, 800);
        }
    </script>
</body>
</html>