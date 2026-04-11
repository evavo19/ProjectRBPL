<?php

/**
 * BACKEND LOGIC (JAVA-STYLE PHP IMPLEMENTATION)
 * Merepresentasikan struktur Service dan Model jika menggunakan Java Spring Boot.
 */

class Delivery
{
    public $id;
    public $resi;
    public $kurir;
    public $status;
    public $penerima;
    public $lastUpdate;

    public function __construct($id, $resi, $kurir, $status, $penerima, $lastUpdate)
    {
        $this->id = $id;
        $this->resi = $resi;
        $this->kurir = $kurir;
        $this->status = $status;
        $this->penerima = $penerima;
        $this->lastUpdate = $lastUpdate;
    }
}

class DeliveryService
{
    public function findAll()
    {
        // Simulasi Database Fetch untuk Last Mile
        return [
            new Delivery(1, "LM-001-XYZ", "Budi Santoso", "Dalam Perjalanan", "Siti Aminah", "5m ago"),
            new Delivery(2, "LM-002-ABC", "Andi Wijaya", "Menuju Lokasi", "Bambang Perkasa", "12m ago"),
            new Delivery(3, "LM-003-DEF", "Rina Maryana", "Selesai", "Dewi Sartika", "Now"),
        ];
    }
}

// Controller Logic
$deliveryService = new DeliveryService();
$view = $_GET['view'] ?? 'onboarding';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start'])) {
    header("Location: panduan_paket.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#EF4C29', // Warna oranye disesuaikan dengan Tim Planner
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

        /* Ukuran kontainer disamakan dengan Tim Planner */
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

    <div class="app-container">

        <!-- STATUS BAR (Identik dengan Tim Planner) -->
        <div class="flex justify-between items-center px-8 pt-6 pb-2 bg-white sticky top-0 z-50">
            <span class="text-xs font-semibold font-poppins"><?php echo date('H:i'); ?></span>
            <div class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                </svg>
                <div class="w-5 h-2.5 border border-black rounded-[2px] p-[1px] flex justify-start items-center">
                    <div class="bg-black h-full w-[70%] rounded-[1px]"></div>
                </div>
            </div>
        </div>

        <?php if ($view === 'onboarding'): ?>
            <!-- HALAMAN: ONBOARDING -->
            <div class="flex-1 flex flex-col px-6 pb-10 animate-fadeIn">

                <!-- Logo & Title Section -->
                <div class="flex items-center gap-3 mt-4">
                    <div class="w-10 h-8 bg-brand rounded flex items-center justify-center text-white shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h1 class="text-sm font-bold font-montserrat tracking-tight leading-none text-gray-800 uppercase">
                        Operator Last Mile<br>
                    </h1>
                </div>

                <!-- Gambar Ilustrasi (Mengikuti style shadow & rounded Middle Mile) -->
                <div class="flex-1 flex items-center justify-center px-4">
                    <div class="relative w-full aspect-square">
                        <div class="absolute inset-0 bg-orange-100 rounded-full blur-3xl opacity-30"></div>
                        <img
                            src="assets/welcome.png"
                            alt="Logistik Last Mile"
                            class="relative z-10 w-full h-full object-cover rounded-3xl border-4 border-white"
                            onerror="this.src='https://placehold.co/400x400/EF4C29/white?text=Last+Mile'">
                    </div>
                </div>

                <!-- Text Content & Action -->
                <div class="text-center space-y-3">
                    <h2 class="text-2xl font-bold font-poppins text-gray-900 leading-tight">Kelola Pengiriman Akhir</h2>
                    <p class="text-gray-500 text-sm leading-relaxed px-2">
                        Pantau kurir, paket, dan status pengiriman hingga ke tangan penerima secara real-time.
                    </p>

                    <a href="panduan_paket.php"
                        class="block w-full mt-4 py-4 text-center bg-brand text-white font-bold font-montserrat rounded-full">
                        Mulai
                    </a>
                </div>
            </div>

        <?php elseif ($view === 'dashboard'): ?>
            <!-- Placeholder untuk Dashboard -->
            <div class="p-6">
                <h1 class="text-xl font-bold font-poppins">Dashboard Last Mile</h1>
                <p class="text-sm text-gray-500">Selamat datang, Operator.</p>
                <a href="?view=onboarding" class="text-brand text-sm font-bold mt-4 block">Kembali</a>
            </div>
        <?php endif; ?>

    </div>

</body>

</html>