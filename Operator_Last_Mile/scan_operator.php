<?php
class ScannerDevice
{
    private $batteryLevel;
    private $isOnline;
    private $isLaserActive;

    public function __construct($battery, $online)
    {
        $this->batteryLevel = $battery;
        $this->isOnline = $online;
        $this->isLaserActive = false;
    }

    public function getBatteryStatus()
    {
        return $this->batteryLevel . "%";
    }

    public function getBatteryPercent()
    {
        return $this->batteryLevel;
    }

    public function getConnectionStatus()
    {
        return $this->isOnline ? "Online" : "Offline";
    }
}

class ScanSession
{
    private $operatorId;
    private $totalScannedToday;

    public function __construct($id)
    {
        $this->operatorId = $id;
        $this->totalScannedToday = 145; 
    }

    public function getTotalScanned()
    {
        return $this->totalScannedToday;
    }
}

$device = new ScannerDevice(85, true);
$session = new ScanSession("OP-9921");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner - Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
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

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .app-container {
            width: 390px;
            height: 725px;
            background-color: #000;
            border-radius: 25px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .camera-view {
            position: absolute;
            inset: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=400');
            background-size: cover;
            background-position: center;
        }

        .viewfinder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 260px;
            height: 260px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
        }

        .laser-line {
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #EF4C29;
            box-shadow: 0 0 15px #EF4C29;
            top: 0;
            animation: scanMove 3s infinite ease-in-out;
        }

        @keyframes scanMove {
            0% {
                top: 10%;
                opacity: 0;
            }

            50% {
                top: 50%;
                opacity: 1;
            }

            100% {
                top: 90%;
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <div class="app-container">
        <div class="camera-view"></div>


        <div class="absolute top-16 left-0 w-full px-6 z-40">
            <div class="bg-black/40 backdrop-blur-md p-4 rounded-2xl border border-white/20 flex justify-between items-center">
                <div>
                    <p class="text-[10px] text-gray-300 font-montserrat uppercase tracking-wider">Operator ID</p>
                    <p class="text-white font-bold text-sm"><?php echo $session->getTotalScanned(); ?> Paket Terproses</p>
                </div>
                <div class="bg-green-500 w-3 h-3 rounded-full animate-pulse shadow-[0_0_10px_rgba(34,197,94,0.8)]"></div>
            </div>
        </div>

        <div class="viewfinder z-30">
            <div class="laser-line"></div>
            <div class="absolute -top-1 -left-1 w-6 h-6 border-t-4 border-l-4 border-brand rounded-tl-lg"></div>
            <div class="absolute -top-1 -right-1 w-6 h-6 border-t-4 border-r-4 border-brand rounded-tr-lg"></div>
            <div class="absolute -bottom-1 -left-1 w-6 h-6 border-b-4 border-l-4 border-brand rounded-bl-lg"></div>
            <div class="absolute -bottom-1 -right-1 w-6 h-6 border-b-4 border-r-4 border-brand rounded-br-lg"></div>
        </div>

        <div class="absolute bottom-28 w-full text-center z-40 px-10">
            <p class="text-white text-sm font-medium font-montserrat bg-black/60 py-2.5 px-6 rounded-full inline-block backdrop-blur-sm border border-white/10">
                Arahkan barcode ke dalam kotak
            </p>
        </div>

        <div class="absolute bottom-0 left-0 w-full z-50">
            <div class="h-20 bg-white border-t border-gray-100 shadow-[0_-8px_25px_rgba(0,0,0,0.15)] flex items-center justify-around px-2 rounded-t-[30px]">
                <a href="panduan_paket_operator.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-zinc-400 group-hover:text-brand transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-medium font-montserrat text-zinc-400 group-hover:text-brand transition-colors">Beranda</span>
                </a>

                <a href="panduan_scan_operator.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-zinc-400 group-hover:text-brand transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18 18.247 17.523 16.5 17.523c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-medium font-montserrat text-zinc-400 group-hover:text-brand transition-colors">Paket</span>
                </a>

                <a href="scan_operator.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-brand">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold font-montserrat text-brand">Scan</span>
                </a>

                <a href="profil_operator.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
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