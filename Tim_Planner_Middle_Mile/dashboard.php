<?php

$stats = [
    'waktu' => "9:27",
    'update_terakhir' => date('d M Y, H:i'),
    'persen_armada' => 75,
    'data_hub' => [
        ['nama' => 'Hub Utara', 'jumlah' => 1200],
        ['nama' => 'Hub Timur', 'jumlah' => 980],
        ['nama' => 'Hub Selatan', 'jumlah' => 1450],
    ]
];

function formatRibuan($n)
{
    return number_format($n, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Tim Planner Middle Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
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
            margin: 0;
            display: flex;
            justify-content: center;
            min-height: 100vh;
            padding: 0;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .app-container {
            width: 100%;
            max-width: 390px;
            background: white;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            border-radius: 25px;
            overflow: hidden;
            height: 175vh;
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

<body class="font-poppins">

    <div class="app-container no-scrollbar">

        <div class="px-5 flex justify-between items-center mt-8">
            <div class="flex items-center gap-3">
                <a href="index.php" class="w-9 h-9 bg-gray-100 rounded-full flex items-center justify-center text-gray-700 hover:bg-gray-200 active:scale-95 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <a href="/Driver_Middle_Mile/index_driver.php" class="text-lg font-bold font-montserrat uppercase text-gray-800">Perencana Armada</a>
            </div>
            <a href="profil.php">
                <img src="assets/profil.png"
                    class="w-8 h-8 rounded-full object-cover cursor-pointer transition-all hover:scale-105 active:scale-95">
            </a>
        </div>

        <div class="px-5 mt-8 space-y-7 mb-10">
            <div class="space-y-3">
                <h2 class="text-xl font-bold text-gray-900">Ringkasan Dasbor</h2>
                <img src="assets/ringkasandasbor.png" alt="Grafik Ringkasan" class="w-full h-full object-cover border border-gray-100 rounded-xl">
            </div>

            <div class="space-y-3">
                <h2 class="text-xl font-bold text-gray-900">Tujuan Hub</h2>
                <img src="assets/tujuanhub.png" alt="Peta Hub" class="w-full h-full object-cover border border-gray-100 rounded-xl">
            </div>

            <div class="space-y-3">
                <h2 class="text-xl font-bold text-gray-900">Status Armada</h2>
                <div class="w-full h-44 bg-white rounded-[20px] shadow-sm border border-gray-100 p-4 flex flex-col items-center justify-center">
                    <div class="w-28 h-28 relative border-8 border-gray-50 rounded-full flex items-center justify-center">
                        <div class="absolute inset-0 border-8 border-brand rounded-full border-t-transparent -rotate-45"></div>
                        <div class="text-center">
                            <span class="text-2xl font-bold text-gray-800"><?php echo $stats['persen_armada']; ?>%</span>
                            <p class="text-[10px] font-bold uppercase text-gray-400">Aktif</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <h2 class="text-xl font-bold text-gray-900">Jumlah Paket per Hub</h2>
                <div class="space-y-2.5">
                    <?php foreach ($stats['data_hub'] as $hub): ?>
                        <div class="w-full h-14 bg-brand rounded-xl flex items-center px-6 shadow-md transition-transform active:scale-[0.98] cursor-pointer">
                            <span class="text-white font-semibold text-sm"><?php echo $hub['nama']; ?> — <?php echo formatRibuan($hub['jumlah']); ?> paket</span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="flex flex-col items-center space-y-4 pt-4 pb-12">
                <div class="space-y-3 pt-4 pb-12">
                    <a href="perencanaan.php" class="py-3 px-6 bg-white rounded-full shadow-[0_8px_20px_rgba(0,0,0,0.15)] flex items-center px-4 gap-4">
                        <img src="assets/schedule.png" class="w-10 h-10 object-contain">
                        <span class="text-brand font-bold text-sm uppercase tracking-wide">Manajemen Jadwal</span>
                    </a>

                    <a href="perencanaan.php" class="py-3 px-6 bg-white rounded-full shadow-[0_8px_20px_rgba(0,0,0,0.15)] flex items-center px-4 gap-4">
                        <img src="assets/route.png" class="w-10 h-10 object-contain">
                        <span class="text-brand font-bold text-sm uppercase tracking-wide">Perencanaan Rute</span>
                    </a>
                </div>

            </div>
        </div>

</body>

</html>