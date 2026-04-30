<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "rbpl";

$conn = mysqli_connect($host, $user, $password, $database);

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataPaket = $_POST['data_paket'] ?? '';
    $resi      = $_POST['resi'] ?? '';
    $tujuan    = $_POST['tujuan'] ?? '';

    if (!empty($dataPaket) && !empty($resi) && !empty($tujuan)) {
        $stmt = $conn->prepare("INSERT INTO input_admin_mm (data_paket, driver, tujuan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $dataPaket, $resi, $tujuan);

        if ($stmt->execute()) {
            $success = true;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data - Admin Middle Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        input[type="date"] {
            min-height: 2.75rem;
        }
    </style>
</head>

<body class="bg-gray-200 flex justify-center">

    <div class="w-full max-w-[384px] h-screen bg-white shadow-2xl relative flex flex-col md:rounded-[25px] overflow-hidden">

        <div class="flex-none bg-orange-600 z-50">
            <div class="px-6 py-4 flex items-center gap-4">
                <a href="catat_admin.php" class="p-2 -ml-2 hover:bg-orange-700 rounded-full transition-colors">
                    <i class="fas fa-arrow-left text-lg text-white"></i>
                </a>
                <h1 class="text-xl font-semibold text-white">Catat Data</h1>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto hide-scrollbar bg-gray-50">
            <form id="inputForm" method="POST" action="input_admin.php" class="px-6 py-8 space-y-6">

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <label class="text-slate-800 text-lg font-medium font-poppins">Data Tanggal Paket</label>
                    <div class="relative">
                        <input type="date" id="data_paket" name="data_paket" required
                            class="w-full h-11 px-4 bg-white border border-gray-200 shadow-sm rounded-lg text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none transition-all cursor-pointer">
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <label class="text-slate-800 text-lg font-medium font-poppins">Driver</label>
                    <div class="relative">
                        <input type="text" name="resi" placeholder="Masukkan Nama Driver ..." required
                            class="w-full h-11 px-4 bg-white border border-gray-200 shadow-sm rounded-lg text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <label class="text-slate-800 text-lg font-medium font-poppins">Tujuan Rute Pengiriman</label>
                    <div class="relative">
                        <input type="text" name="tujuan" placeholder="Masukkan Rute (ex : Jakarta - Bandung)" required
                            class="w-full h-11 px-4 bg-white border border-gray-200 shadow-sm rounded-lg text-sm font-montserrat focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                    </div>
                </div>

            </form>
        </div>

        <div class="flex-none p-6 bg-white border-t border-gray-100 shadow-[0px_-4px_10px_rgba(0,0,0,0.05)]">
            <button type="button" id="btnSimpan" onclick="handleSave()" class="w-full h-12 bg-orange-600 hover:bg-orange-700 active:scale-95 text-white font-semibold font-montserrat rounded-lg shadow-lg flex items-center justify-center transition-all">
                Simpan
            </button>
        </div>

    </div>

    <div id="successModal" class="fixed inset-0 bg-black/60 z-[100] <?php echo $success ? 'flex' : 'hidden'; ?> items-center justify-center p-6 backdrop-blur-sm">
        <div class="bg-white rounded-[30px] p-8 w-full max-w-[320px] text-center shadow-2xl">
            <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-2">Tersimpan!</h3>
            <p class="text-gray-500 text-sm mb-8 font-montserrat">Data telah berhasil dicatat ke sistem.</p>
            <button type="button" onclick="closeModalAndRedirect()" class="w-full py-4 bg-slate-900 text-white rounded-xl font-bold hover:bg-black transition-colors">Oke</button>
        </div>
    </div>

    <script>
        function handleSave() {
            const form = document.getElementById('inputForm');

            if (!form.data_paket.value.trim() || !form.resi.value.trim() || !form.tujuan.value.trim()) {
                alert("Harap lengkapi semua data!");
                return;
            }

            const btn = document.getElementById('btnSimpan');
            const originalText = btn.innerHTML;

            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-circle-notch animate-spin mr-2"></i> Memproses...';

            setTimeout(() => {
                form.submit();
            }, 800);
        }

        function closeModalAndRedirect() {
            window.location.href = window.location.pathname;
        }
    </script>
</body>

</html>