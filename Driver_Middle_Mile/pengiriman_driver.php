<?php

$deliveryData = [
    'rute_saat_ini' => 'Dalam Perjalanan',
    'checkpoint_berikutnya' => 'Hub A',
    'total_paket' => 17,
    'paket_terkirim' => 15,
    'daftar_paket' => [
        ['nama' => 'Package A', 'lokasi' => 'Bantul'],
        ['nama' => 'Package B', 'lokasi' => 'Bantul'],
        ['nama' => 'Package C', 'lokasi' => 'Bantul'],
        ['nama' => 'Package D', 'lokasi' => 'Sleman'],
        ['nama' => 'Package E', 'lokasi' => 'Sleman'],
    ]
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengiriman - Driver Middle Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
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
            background-color: #f3f4f6;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .app-container {
            width: 390px;
            height: 100vh;
            max-height: 844px;
            background-color: #FFFFFF;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
            isolation: isolate;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .status-card {
            border: 1px solid #e5e7eb;
            border-radius: 20px;
        }
    </style>
</head>

<body>

    <div class="app-container">

        <div class="sticky-header-content pt-0 px-0 sticky top-0 z-50 bg-white">
            <div class="py-4 flex items-center justify-center relative mt-8">
                <a href="index_driver.php" class="absolute left-5 w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-700 hover:bg-gray-200 active:scale-95 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-xl font-bold text-black">Pengiriman</h1>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto no-scrollbar px-6 pt-4 pb-20">
            <div class="status-card p-5 mt-2 mb-8 relative">
                <div class="grid grid-cols-2 gap-4 relative">
                    <div class="absolute left-1/2 top-2 bottom-2 w-[1px] bg-gray-300 -ml-[0.5px]"></div>

                    <div class="text-center">
                        <p class="text-brand text-[10px] font-bold uppercase tracking-wide">Rute Saat Ini</p>
                        <p class="text-black text-sm font-bold mt-1"><?php echo $deliveryData['rute_saat_ini']; ?></p>

                        <div class="mt-6">
                            <p class="text-brand text-[10px] font-bold uppercase tracking-wide">Total Paket</p>
                            <p class="text-black text-sm font-bold mt-1"><?php echo $deliveryData['total_paket']; ?> Paket</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="text-brand text-[10px] font-bold uppercase tracking-wide leading-tight">Pos Pemeriksaan Berikutnya</p>
                        <p class="text-black text-sm font-bold mt-1"><?php echo $deliveryData['checkpoint_berikutnya']; ?></p>

                        <div class="mt-6">
                            <p class="text-brand text-[10px] font-bold uppercase tracking-wide">Paket Terkirim</p>
                            <p class="text-black text-sm font-bold mt-1"><?php echo $deliveryData['paket_terkirim']; ?> Paket</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <?php foreach ($deliveryData['daftar_paket'] as $paket): ?>
                    <div class="bg-white rounded-xl p-4 flex justify-between items-center shadow-[0_4px_10px_rgba(0,0,0,0.05)] border border-gray-50">
                        <span class="text-neutral-800 text-lg font-bold"><?php echo $paket['nama']; ?></span>
                        <span class="text-neutral-500 text-lg font-medium"><?php echo $paket['lokasi']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-10 mb-5">
                <a href="status_pengiriman_driver.php"
                    onclick="this.innerText='Memproses...'"
                    class="block w-full text-center py-4 bg-brand text-white rounded-lg font-bold text-lg shadow-lg active:scale-95 transition-transform">
                    Perbarui Status
                </a>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 bg-white h-20 shadow-[0_-10px_30px_rgba(0,0,0,0.03)] flex justify-around items-center px-10 rounded-t-[35px] border-t border-gray-50 z-50">
            <a href="status_pengiriman_driver.php" class="text-gray-400 hover:text-brand transition-colors p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>
            <button class="text-brand transition-all scale-110 p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </button>
            <a href="profil_driver.php" class="text-gray-400 hover:text-brand transition-colors p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </a>
        </div>

    </div>

</body>

</html>