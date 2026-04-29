<?php
$host = "sql203.infinityfree.com";
$user = "if0_41736846";
$password = "tugasRBPL2026";
$database = "if0_41736846_db_rbpl";

$conn = mysqli_connect($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM inspeksi_kendaraan_koordinator ORDER BY tanggal_inspeksi DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Inspeksi - Koordinator Hub Regional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="bg-gray-200 flex justify-center">

    <div class="w-full max-w-[384px] h-screen bg-white shadow-2xl relative flex flex-col md:rounded-[25px] overflow-hidden">

        <div class="flex-none bg-orange-600 z-50">
            <div class="px-6 py-4 flex items-center gap-4 border-b border-orange-500/30">
                <a href="halaman_utama.php" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white font-montserrat tracking-tight">Rekap Data</h1>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pb-10">
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-slate-800 text-lg font-bold font-montserrat">Riwayat Inspeksi</h2>
                    <span class="bg-orange-100 text-orange-600 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                        <?php echo $result->num_rows; ?> Total
                    </span>
                </div>

                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 outline outline-1 outline-black/5">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">Waktu Inspeksi</p>
                                    <p class="text-sm font-semibold text-slate-700">
                                        <?php echo date('d M Y, H:i', strtotime($row['tanggal_inspeksi'])); ?>
                                    </p>
                                </div>
                                <div class="bg-green-50 text-green-600 p-2 rounded-lg text-xs">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-2 mb-4">
                                <div class="text-center p-2 rounded-xl border <?php echo $row['kondisi_ban'] ? 'bg-orange-50 border-orange-100 text-orange-600' : 'bg-gray-50 border-gray-100 text-gray-300'; ?>">
                                    <i class="fas fa-circle-dot text-[10px] block mb-1"></i>
                                    <span class="text-[9px] font-bold uppercase">Ban</span>
                                </div>
                                <div class="text-center p-2 rounded-xl border <?php echo $row['fungsi_rem'] ? 'bg-orange-50 border-orange-100 text-orange-600' : 'bg-gray-50 border-gray-100 text-gray-300'; ?>">
                                    <i class="fas fa-circle-dot text-[10px] block mb-1"></i>
                                    <span class="text-[9px] font-bold uppercase">Rem</span>
                                </div>
                                <div class="text-center p-2 rounded-xl border <?php echo $row['lampu_sinyal'] ? 'bg-orange-50 border-orange-100 text-orange-600' : 'bg-gray-50 border-gray-100 text-gray-300'; ?>">
                                    <i class="fas fa-circle-dot text-[10px] block mb-1"></i>
                                    <span class="text-[9px] font-bold uppercase">Lampu</span>
                                </div>
                            </div>

                            <div class="space-y-2 border-t border-gray-50 pt-3">
                                <div>
                                    <span class="text-[10px] text-gray-400 font-bold uppercase block">Hasil:</span>
                                    <p class="text-sm text-slate-800 font-medium"><?php echo htmlspecialchars($row['hasil_inspeksi']); ?></p>
                                </div>
                                <?php if(!empty($row['komentar'])): ?>
                                <div>
                                    <span class="text-[10px] text-gray-400 font-bold uppercase block">Komentar:</span>
                                    <p class="text-xs text-gray-500 italic">"<?php echo htmlspecialchars($row['komentar']); ?>"</p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="text-center py-20">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300 text-2xl">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <p class="text-gray-400 text-sm">Belum ada data inspeksi.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="absolute bottom-6 right-6">
            <a href="inspeksi.php" class="w-14 h-14 bg-orange-600 text-white rounded-full shadow-xl shadow-orange-200 flex items-center justify-center text-xl active:scale-95 transition-transform">
                <i class="fas fa-plus"></i>
            </a>
        </div>

    </div>

</body>
</html>
<?php $conn->close(); ?>