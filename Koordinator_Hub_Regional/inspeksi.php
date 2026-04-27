<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "rbpl";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$show_modal = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ban = isset($_POST['ban']) ? 1 : 0;
    $rem = isset($_POST['rem']) ? 1 : 0;
    $lampu = isset($_POST['lampu']) ? 1 : 0;
    $hasil = $conn->real_escape_string($_POST['hasil']);
    
    $catatan = $conn->real_escape_string($_POST['catatan']);

    $sql = "INSERT INTO inspeksi_kendaraan_koordinator (kondisi_ban, fungsi_rem, lampu_sinyal, hasil_inspeksi, catatan) 
            VALUES ('$ban', '$rem', '$lampu', '$hasil', '$catatan')";

    if ($conn->query($sql) === TRUE) {
        $show_modal = true;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspeksi Kendaraan - Koordinator Hub Regional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        input[type="checkbox"]:checked+label { color: #ea580c; font-weight: 600; }
        
        .modal-animate { animation: modalIn 0.3s ease-out forwards; }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body class="bg-gray-200 flex justify-center">

    <div class="w-full max-w-[384px] h-screen bg-white shadow-2xl relative flex flex-col md:rounded-[25px] overflow-hidden">

        <div class="flex-none bg-orange-600 z-50">
            <div class="px-6 py-4 flex items-center gap-4 border-b border-orange-500/30">
                <a href="halaman_utama.php" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white font-montserrat tracking-tight">Inspeksi</h1>
            </div>
        </div>

        <form id="inspectionForm" method="POST" action="" class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50 pb-32">
            <div class="p-6 space-y-6">
                <h2 class="text-slate-800 text-lg font-bold font-montserrat mb-2">Inspeksi Kendaraan</h2>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 outline outline-1 outline-black/5">
                    <h3 class="text-black text-lg font-semibold font-poppins mb-4 border-b border-gray-50 pb-2">Checklist Inspeksi</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="ban" id="ban" class="w-5 h-5 accent-orange-600 rounded">
                            <label for="ban" class="text-sm font-montserrat text-gray-700">Kondisi Ban</label>
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="rem" id="rem" class="w-5 h-5 accent-orange-600 rounded">
                            <label for="rem" class="text-sm font-montserrat text-gray-700">Fungsi Rem</label>
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="lampu" id="lampu" class="w-5 h-5 accent-orange-600 rounded">
                            <label for="lampu" class="text-sm font-montserrat text-gray-700">Lampu dan Sinyal</label>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 outline outline-1 outline-black/5">
                    <h3 class="text-black text-lg font-semibold font-poppins mb-3">Hasil Inspeksi</h3>
                    <input type="text" name="hasil" required placeholder="Masukkan hasil..." class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none shadow-sm">
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 outline outline-1 outline-black/5">
                    <h3 class="text-black text-lg font-semibold font-montserrat mb-3">Catatan</h3>
                    <textarea name="catatan" rows="4" placeholder="Tambahkan catatan..." class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none shadow-sm"></textarea>
                </div>
            </div>
            
            <div class="absolute bottom-0 left-0 right-0 bg-white p-6 shadow-[2px_-2px_10px_0px_rgba(3,3,3,0.10)] border-t border-gray-100">
                <button type="submit" id="btnKirim" class="w-full py-4 bg-orange-600 text-white rounded-2xl font-bold font-montserrat shadow-lg shadow-orange-100 active:scale-95 transition-all flex justify-center items-center gap-2">
                    <span>Kirim Hasil</span>
                </button>
            </div>
        </form>

    </div>

    <div id="successModal" class="fixed inset-0 bg-black/60 z-[100] <?php echo $show_modal ? 'flex' : 'hidden'; ?> items-center justify-center p-6 backdrop-blur-sm">
        <div class="bg-white rounded-[30px] p-8 w-full max-w-[320px] text-center shadow-2xl modal-animate">
            <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                <i class="fas fa-check-double"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-2 font-montserrat">Data Terkirim</h3>
            <p class="text-gray-500 text-sm mb-8 font-poppins">Laporan inspeksi kendaraan telah berhasil disimpan ke sistem.</p>
            <button onclick="window.location.href='rekapan_inspeksi.php'" class="w-full py-4 bg-slate-900 text-white rounded-xl font-bold hover:bg-black transition-colors">Lihat Rekap</button>
        </div>
    </div>

</body>
</html>
<?php $conn->close(); ?>