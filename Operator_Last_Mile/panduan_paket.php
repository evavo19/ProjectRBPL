<?php

/**
 * BACKEND LOGIC (JAVA-STYLE PHP IMPLEMENTATION)
 */

class Paket
{
    public $id;
    public $nomorPaket;
    public $penerima;
    public $alamat;
    public $tenggat;

    public function __construct($id, $nomorPaket, $penerima, $alamat, $tenggat)
    {
        $this->id = $id;
        $this->nomorPaket = $nomorPaket;
        $this->penerima = $penerima;
        $this->alamat = $alamat;
        $this->tenggat = $tenggat;
    }
}

class PaketService
{
    public function getPaketList()
    {
        // Simulasi Database Fetch
        return [
            new Paket(1, "12345", "Intan Nur Isnaini", "Bantul, Yogyakarta", "27 Des 2025, 12.30"),
            new Paket(2, "67890", "Eva Dewi Agustin", "Pajangan, Bantul", "28 Des 2025, 10.30"),
            new Paket(3, "11121", "Sevilia Juandita", "Pajangan, Bantul", "28 Des 2025, 13.30"),
            new Paket(4, "31415", "Muhammad Andy", "Banguntapan, Bantul", "29 Des 2025, 10.00"),
        ];
    }
}

$paketService = new PaketService();
$daftarPaket = $paketService->getPaketList();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Paket - Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
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
            border-radius: 25px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
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

<body>

    <div class="app-container">
        <!-- STATUS BAR -->
        <div class="flex justify-between items-center px-8 pt-6 pb-2 bg-white sticky top-0 z-50">
            <span class="text-xs font-semibold"><?php echo date('H:i'); ?></span>
            <div class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                </svg>
                <div class="w-5 h-2.5 border border-black rounded-[2px] p-[1px] flex justify-start items-center">
                    <div class="bg-black h-full w-[70%] rounded-[1px]"></div>
                </div>
            </div>
        </div>

        <!-- HEADER -->
        <div class="px-6 py-4 flex justify-between items-center bg-white border-b border-gray-50">
            <h1 class="text-2xl font-bold font-montserrat text-gray-900">Paket</h1>
            <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
                <img src="assets/profil.png" alt="Profile">
            </div>
        </div>

        <!-- MAIN CONTENT (SCROLLABLE) -->
        <div class="flex-1 overflow-y-auto px-6 py-4 space-y-4 no-scrollbar pb-24">
            <?php foreach ($daftarPaket as $paket): ?>
                <div class="p-4 bg-white rounded-[20px] border border-zinc-200 hover:border-brand transition-colors group relative overflow-hidden">
                    <!-- Accent Line -->
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-brand opacity-0 group-hover:opacity-100 transition-opacity"></div>

                    <h3 class="text-lg font-bold font-poppins text-gray-800">Nomor Paket : <?php echo $paket->nomorPaket; ?></h3>
                    <div class="mt-2 space-y-0.5">
                        <p class="text-sm font-normal font-poppins text-gray-600">
                            <span class="text-gray-400">Penerima :</span> <?php echo $paket->penerima; ?>
                        </p>
                        <p class="text-sm font-normal font-poppins text-gray-600">
                            <span class="text-gray-400">Alamat :</span> <?php echo $paket->alamat; ?>
                        </p>
                        <p class="text-sm font-medium font-poppins text-red-500 mt-2 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Tenggat : <?php echo $paket->tenggat; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- BOTTOM NAVIGATION (MENEMPEL DENGAN LENGKUNGAN ATAS) -->
        <div class="absolute bottom-0 left-0 w-full z-50">
            <div class="h-20 bg-white border-t border-gray-100 shadow-[0_-8px_25px_rgba(0,0,0,0.06)] flex items-center justify-around px-2 rounded-t-[30px]">
                <!-- Beranda (Active) -->
                <a href="panduan_paket.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-brand">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold font-montserrat text-brand transition-colors">Beranda</span>
                </a>

                <!-- Paket -->
                <a href="panduan_scan.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-zinc-400 group-hover:text-brand transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18 18.247 17.523 16.5 17.523c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-medium font-montserrat text-zinc-400 group-hover:text-brand transition-colors">Paket</span>
                </a>

                <!-- Scan -->
                <a href="scan.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-zinc-400 group-hover:text-brand transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-medium font-montserrat text-zinc-400 group-hover:text-brand transition-colors">Scan</span>
                </a>

                <!-- Operator -->
                <a href="operator.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-zinc-400 group-hover:text-brand transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-medium font-montserrat text-zinc-400 group-hover:text-brand transition-colors">Operator</span>
                </a>
            </div>
        </div>
    </div>

</body>

</html>