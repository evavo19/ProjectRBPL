<?php

/**
 * BACKEND LOGIC (JAVA STYLE)
 */

class Hub
{
    public $nama;
    public $jumlah;

    public function __construct($nama, $jumlah)
    {
        $this->nama = $nama;
        $this->jumlah = $jumlah;
    }
}

class PerencanaanService
{
    public function getDataHub()
    {
        return [
            new Hub("Hub A", 15),
            new Hub("Hub B", 19),
            new Hub("Hub C", 20),
            new Hub("Hub D", 63),
            new Hub("Hub E", 26),
            new Hub("Hub F", 42),
            new Hub("Hub G", 15),
            new Hub("Hub H", 19),
            new Hub("Hub I", 20),
        ];
    }
}

$service = new PerencanaanService();
$dataHub = $service->getDataHub();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perencanaan Armada</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

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
            height: 100vh;
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
            background: white;
            border-radius: 25px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Menghilangkan scrollbar di semua browser */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
</head>

<body>

    <div class="app-container no-scrollbar ">

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
        <div class="flex justify-between items-center px-5 mt-2">
            <img src="assets/ceklis.png" class="w-9 h-9">

            <h1 class="text-lg font-bold font-montserrat">
                Perencana Armada
            </h1>

            <a href="profil.php">
                <img src="assets/profil.png"
                    class="w-8 h-8 rounded-full object-cover cursor-pointer 
                transition-all hover:scale-105 active:scale-95">
            </a>
        </div>

        <!-- CONTENT -->
        <div class="no-scrollbar px-5 mt-4 space-y-5 overflow-y-auto">

            <!-- IMAGE -->
            <div class="rounded-xl overflow-hidden">
                <img src="assets/peta.png" class="w-full h-40 object-cover">
            </div>

            <!-- SLIDER INDICATOR -->
            <div class="flex items-center gap-2">
                <div class="w-20 h-1 bg-brand"></div>
                <div class="w-20 h-1 bg-gray-300"></div>
                <div class="w-3 h-3 bg-brand rounded-full"></div>
            </div>

            <!-- PARAMETER -->
            <div>
                <h2 class="text-xs font-bold font-poppins mb-2">
                    Parameter yang Dapat Disesuaikan
                </h2>

                <p class="text-xs text-gray-500 mb-2 font-poppins">
                    Prioritas Rute
                </p>

                <div class="flex items-center gap-2">
                    <div class="w-20 h-1 bg-brand"></div>
                    <div class="w-20 h-1 bg-gray-300"></div>
                    <div class="w-3 h-3 bg-brand rounded-full"></div>
                </div>
            </div>

            <!-- LIST HUB -->
            <div>
                <h2 class="text-xs font-bold font-poppins mb-3">
                    Ringkasan Penugasan Armada
                </h2>

                <div class="space-y-3">
                    <?php foreach ($dataHub as $hub): ?>
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 bg-black rounded-sm"></div>
                            <span class="text-xs font-poppins">
                                <span class="font-medium text-gray-800">
                                    <?php echo $hub->nama; ?>
                                </span>:
                                <span class="text-gray-500">
                                    <?php echo $hub->jumlah; ?> Paket
                                </span>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

    </div>

</body>

</html>