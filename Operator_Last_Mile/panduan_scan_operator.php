<?php
class PanduanItem
{
    public $judul;
    public $poin;

    public function __construct($judul, $poin)
    {
        $this->judul = $judul;
        $this->poin = $poin;
    }
}

class PanduanService
{
    public function getPanduanTeknis()
    {
        return [
            new PanduanItem("A. Persiapan Alat", [
                "Pastikan baterai handheld scanner (PDA) atau HP terisi minimal 20%.",
                "Pastikan koneksi internet/Wi-Fi stabil.",
                "Buka aplikasi operasional dan pilih menu 'Inbound / Penerimaan'."
            ]),
            new PanduanItem("B. Langkah-Langkah Scanning", [
                "Cari Label Resi: Ambil paket dan temukan lokasi label pengiriman/barcode. Pastikan label tidak terlipat atau tertutup selotip.",
                "Arahkan Scanner: Jarak ideal 10 - 15 cm dari label. Arahkan sinar laser/kamera tegak lurus menutupi seluruh garis barcode.",
                "Tunggu Konfirmasi: Berhasil ditandai bunyi 'BEEP' atau layar HIJAU. Gagal ditandai bunyi 'Buzz' atau layar MERAH.",
                "Baca Informasi: Lihat kode wilayah di layar (Contoh: KEC-01 atau Rute A).",
                "Letakkan Paket: Segera taruh paket di keranjang sesuai kode yang muncul."
            ])
        ];
    }
}

$service = new PanduanService();
$daftarPanduan = $service->getPanduanTeknis();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Scan - Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
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

        .font-montserrat { font-family: 'Montserrat', sans-serif; }

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

        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body>

    <div class="app-container">

        <div class="px-6 py-4 flex justify-between items-center bg-white border-b border-gray-50 mt-8">
            <h1 class="text-2xl font-bold font-montserrat text-gray-900">Panduan Scan</h1>
            <a href="profil_operator.php" class="w-10 h-10 rounded-full overflow-hidden block">
                <img src="assets/profil.png" alt="Profile" class="w-full h-full object-cover">
            </a>
        </div>

        <div class="flex-1 overflow-y-auto px-6 py-6 no-scrollbar pb-32">
            <div class="text-center mb-8">
                <h2 class="text-xl font-bold font-montserrat text-gray-900 leading-snug">
                    Panduan Teknis:<br />Proses Scanning Paket
                </h2>
                <div class="w-16 h-1 bg-brand mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="space-y-8">
                <?php foreach ($daftarPanduan as $item): ?>
                    <div class="space-y-3">
                        <h3 class="text-lg font-bold font-montserrat text-brand border-l-4 border-brand pl-3">
                            <?php echo $item->judul; ?>
                        </h3>
                        <ul class="space-y-3">
                            <?php foreach ($item->poin as $poin): ?>
                                <li class="flex gap-3 text-justify">
                                    <span class="text-brand font-bold">•</span>
                                    <span class="text-gray-700 text-[15px] leading-relaxed font-montserrat">
                                        <?php echo $poin; ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full z-50">
            <div class="h-20 bg-white border-t border-gray-100 shadow-[0_-8px_25px_rgba(0,0,0,0.06)] flex items-center justify-around px-2 rounded-t-[30px]">
                <a href="panduan_paket_operator.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-zinc-400 group-hover:text-brand transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-medium font-montserrat text-zinc-400 group-hover:text-brand transition-colors">Beranda</span>
                </a>

                <a href="panduan_scan_operator.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-brand">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18 18.247 17.523 16.5 17.523c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold font-montserrat text-brand">Paket</span>
                </a>

                <a href="scan_operator.php" class="flex flex-col items-center gap-1 group transition-all duration-200">
                    <div class="w-6 h-6 flex items-center justify-center text-zinc-400 group-hover:text-brand transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                    <span class="text-[10px] font-medium font-montserrat text-zinc-400 group-hover:text-brand transition-colors">Scan</span>
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