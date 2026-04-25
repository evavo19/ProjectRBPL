<?php

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
    <title>Perencanaan - Tim Planner Middle Mile</title>

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

        <div class="px-5 flex justify-between items-center mt-8">
            <div class="flex items-center gap-3">
                <a href="dashboard.php" class="w-9 h-9 bg-gray-100 rounded-full flex items-center justify-center text-gray-700 hover:bg-gray-200 active:scale-95 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-lg font-bold font-montserrat uppercase text-gray-800">Perencana Armada</h1>
            </div>
            <a href="profil.php">
                <img src="assets/profil.png"
                    class="w-8 h-8 rounded-full object-cover cursor-pointer transition-all hover:scale-105 active:scale-95">
            </a>
        </div>

        <div class="no-scrollbar px-5 mt-4 space-y-5 overflow-y-auto">

            <div class="rounded-xl overflow-hidden">
                <img src="assets/peta.png" class="w-full h-40 object-cover">
            </div>

            <div>
                <h2 class="text-xs font-bold font-poppins mb-3">Parameter yang Dapat Disesuaikan</h2>

                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between">
                            <p class="text-xs text-gray-500 font-poppins">Prioritas Rute</p>
                            <span class="text-xs text-brand font-bold" id="nilai-rute">50</span>
                        </div>
                        <input type="range" min="0" max="100" value="50" class="w-full accent-brand cursor-pointer"
                            oninput="document.getElementById('nilai-rute').textContent = this.value">
                    </div>

                    <div>
                        <div class="flex justify-between">
                            <p class="text-xs text-gray-500 font-poppins">Prioritas Waktu</p>
                            <span class="text-xs text-brand font-bold" id="nilai-waktu">50</span>
                        </div>
                        <input type="range" min="0" max="100" value="50" class="w-full accent-brand cursor-pointer"
                            oninput="document.getElementById('nilai-waktu').textContent = this.value">
                    </div>

                    <div>
                        <div class="flex justify-between">
                            <p class="text-xs text-gray-500 font-poppins">Kapasitas Muatan</p>
                            <span class="text-xs text-brand font-bold" id="nilai-kapasitas">50</span>
                        </div>
                        <input type="range" min="0" max="100" value="50" class="w-full accent-brand cursor-pointer"
                            oninput="document.getElementById('nilai-kapasitas').textContent = this.value">
                    </div>

                    <div>
                        <div class="flex justify-between">
                            <p class="text-xs text-gray-500 font-poppins">Jarak Tempuh</p>
                            <span class="text-xs text-brand font-bold" id="nilai-jarak">50</span>
                        </div>
                        <input type="range" min="0" max="100" value="50" class="w-full accent-brand cursor-pointer"
                            oninput="document.getElementById('nilai-jarak').textContent = this.value">
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-xs font-bold font-poppins mb-3">Ringkasan Penugasan Armada</h2>

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