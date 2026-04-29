<?php

$deliveryData = [
    'rute_saat_ini' => 'Dalam Perjalanan',
    'checkpoint_berikutnya' => 'Hub A',
    'total_paket' => 17,
    'paket_terkirim' => 15,
    'estimasi_tiba' => 'Selasa, 15:00',
    'harga_total' => 'Rp156.000',
    'paket_utama' => [
        'nama' => 'Paket Elektronik',
        'ukuran' => 'Besar',
        'tujuan' => 'Hub Utama'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengiriman - Driver Middle Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .app-container {
            width: 100%;
            max-width: 390px;
            min-height: 100vh;
            background-color: #FFFFFF;
            margin: 0 auto;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            border: none;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="flex justify-center items-start sm:items-center">

    <div class="app-container overflow-hidden flex flex-col">

        <div class="px-6 py-4 flex justify-between items-center mt-5">
            <h1 class="text-xl font-bold text-gray-800 tracking-tight">Status Pengiriman</h1>
            <button class="p-2.5 bg-black rounded-xl text-white shadow-lg active:scale-90 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto no-scrollbar px-5 pb-32">

            <div class="bg-white rounded-[24px] p-6 shadow-[0_10px_30px_rgba(0,0,0,0.08)] border border-gray-50 mt-2">
                <div class="flex justify-between items-center mb-5">
                    <span class="font-montserrat font-bold text-sm text-gray-800 uppercase tracking-wider">Detail Paket</span>
                    <button class="text-[10px] font-bold text-blue-600 tracking-tight border-b border-blue-200">
                        + TAMBAH PAKET
                    </button>
                </div>

                <div class="flex gap-4 items-center">
                    <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center border border-gray-100">
                        <span class="text-3xl">📦</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <h2 class="font-bold text-sm text-gray-900"><?php echo $deliveryData['paket_utama']['nama']; ?></h2>
                            <span class="font-bold text-brand text-sm"><?php echo $deliveryData['harga_total']; ?></span>
                        </div>
                        <p class="text-[11px] text-gray-400 mt-1 leading-relaxed">
                            Ukuran: <?php echo $deliveryData['paket_utama']['ukuran']; ?> <br>
                            Tujuan: <?php echo $deliveryData['paket_utama']['tujuan']; ?>
                        </p>
                    </div>
                </div>

                <div class="mt-6 pt-5 border-t border-dashed border-gray-200">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="bg-orange-100 text-orange-600 text-[9px] px-2.5 py-1 rounded-lg font-bold uppercase tracking-widest">
                            <?php echo $deliveryData['rute_saat_ini']; ?>
                        </span>
                        <span class="text-[10px] font-bold text-gray-300">PERBARUI</span>
                    </div>
                    <p class="text-xs font-semibold text-gray-700">
                        Menuju <?php echo $deliveryData['checkpoint_berikutnya']; ?><br>
                        <span class="text-gray-400 font-normal">Perkiraan Tiba: <?php echo $deliveryData['estimasi_tiba']; ?></span>
                    </p>
                </div>
            </div>

            <div class="mt-8 px-1">
                <div class="flex justify-between items-center font-montserrat">
                    <span class="font-bold text-gray-800 text-sm">Total Muatan Paket:</span>
                    <span class="font-bold text-xl text-brand"><?php echo $deliveryData['total_paket']; ?></span>
                </div>
                <p class="text-[11px] text-gray-400 mt-1 italic tracking-tight text-center sm:text-left">
                    "Pastikan semua segel aman sebelum konfirmasi"
                </p>
            </div>

            <div class="mt-8 space-y-4">
                <button class="w-full bg-brand hover:brightness-110 text-white font-bold py-4 rounded-2xl transition shadow-lg shadow-orange-100 active:scale-[0.98]">
                    Gunakan Pintasan Rute
                </button>
                <a href="/Operator_Last_Mile/index_operator.php" class="w-full bg-zinc-900 hover:bg-black text-white font-bold py-4 rounded-2xl transition shadow-lg shadow-gray-200 active:scale-[0.98] flex items-center justify-center">
                    Konfirmasi Tiba di Hub
                </a>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 bg-white h-20 shadow-[0_-10px_30px_rgba(0,0,0,0.03)] flex justify-around items-center px-10 rounded-t-[35px] border-t border-gray-50 z-50">
            <button class="text-brand transition-colors p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </button>
            <a href="pengiriman_driver.php" class="text-gray-400 hover:text-brand transition-colors p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </a>
            <a href="profil_driver.php" class="text-gray-400 hover:text-brand transition-colors p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </a>
        </div>

    </div>

</body>

</html>