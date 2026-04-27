<?php
session_start();

$host = 'localhost';
$db   = 'rbpl';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$message = "";
$status_type = "";

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kurir_id      = 'K-8821';
    $nama_penerima = $_POST['nama_penerima'] ?? '';
    $alamat        = $_POST['alamat'] ?? '';
    $no_telephone  = $_POST['no_telephone'] ?? '';
    $rating        = $_POST['rating'] ?? 0;
    $catatan       = $_POST['catatan'] ?? '';
    $status        = 'DITINJAU';

    $uploadTTD = 'uploads/tanda_tangan/';
    $uploadBukti = 'uploads/bukti/';

    $uploadTTD = 'uploads/tanda_tangan/';
    $uploadBukti = 'uploads/bukti/';

    if (!is_dir($uploadTTD)) {
        mkdir($uploadTTD, 0777, true);
    }
    if (!is_dir($uploadBukti)) {
        mkdir($uploadBukti, 0777, true);
    }

    $tanda_tangan_name = "";
    $bukti_name = "";

    if (!empty($_FILES['tanda_tangan']['name'])) {
        $tanda_tangan_name = time() . '_' . $_FILES['tanda_tangan']['name'];
        move_uploaded_file($_FILES['tanda_tangan']['tmp_name'], $uploadTTD . $tanda_tangan_name);
    }

    if (!empty($_FILES['bukti']['name'])) {
        $bukti_name = time() . '_' . $_FILES['bukti']['name'];
        move_uploaded_file($_FILES['bukti']['tmp_name'], $uploadBukti . $bukti_name);
    }

    try {
        $sql = "INSERT INTO manager_kurir_lastmile 
                (kurir_id, nama_penerima, alamat, no_telephone, rating, catatan, status, tanda_tangan, bukti) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$kurir_id, $nama_penerima, $alamat, $no_telephone, $rating, $catatan, $status, $tanda_tangan_name, $bukti_name]);

        $_SESSION['message'] = "Laporan berhasil disimpan!";
        $_SESSION['status_type'] = "success";

        header("Location: tambah_kurirLM.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['message'] = "Gagal: " . $e->getMessage();
        $_SESSION['status_type'] = "error";

        header("Location: tambah_kurirLM.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajer Kurir (Tambah) - Kurir Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --brand: #FF5C35;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F3F4F6;
            margin: 0;
            padding: 0;
        }

        .mobile-container {
            max-width: 390px;
            margin: 0 auto;
            min-height: 100vh;
            background: #fff;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            border-radius: 25px;
            overflow-y: auto;
            padding-bottom: 100px;
        }

        .mobile-container::-webkit-scrollbar {
            width: 0;
        }

        .page-header {
            padding: 28px 24px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-bottom: 1px solid #F3F4F6;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 390px;
            height: 70px;
            background: #fff;
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-top: 1px solid #F3F4F6;
            box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.04);
            border-radius: 25px 25px 25px 25px;
            z-index: 100;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            color: #9CA3AF;
            text-decoration: none;
            transition: color .2s;
        }

        .nav-item:hover,
        .nav-item.active {
            color: var(--brand);
        }

        .nav-text {
            font-size: 10px;
            font-weight: 600;
            margin-top: 3px;
        }

        .bg-brand {
            background-color: var(--brand);
        }
    </style>
</head>

<body>

    <div class="mobile-container">

        <header class="page-header">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-brand rounded-lg flex items-center justify-center text-white text-xs">
                    <i class="fas fa-truck-loading"></i>
                </div>
                <h1 class="text-xl font-bold text-black">Manajer Kurir</h1>
            </div>
            <button class="bg-brand text-white px-6 py-1.5 rounded-lg text-sm font-bold shadow-md">Help</button>
        </header>

        <?php if (!empty($_SESSION['message'])): ?>
            <div class="mx-5 mt-4 p-4 rounded-xl text-sm font-medium 
        <?php echo $_SESSION['status_type'] === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">

                <i class="fas <?php echo $_SESSION['status_type'] === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?> mr-2"></i>
                <?php echo $_SESSION['message']; ?>
            </div>

            <?php
            unset($_SESSION['message']);
            unset($_SESSION['status_type']);
            ?>
        <?php endif; ?>

        <form id="deliveryForm" method="POST" action="" enctype="multipart/form-data" class="px-5 mt-4 space-y-5">

            <div class="bg-white p-5 rounded-[20px] shadow-[4px_4px_10px_rgba(0,0,0,0.08)] border border-gray-50">
                <h2 class="text-lg font-bold mb-4 text-black" style="font-family:'Montserrat',sans-serif">Rincian Penerima</h2>
                <div class="space-y-3">
                    <input type="text" name="nama_penerima" placeholder="Nama Penerima" required
                        class="w-full border border-zinc-400 rounded-md px-3 py-2.5 text-sm text-gray-700 outline-none focus:border-[#FF5C35] transition-colors bg-transparent">
                    <input type="text" name="alamat" placeholder="Alamat" required
                        class="w-full border border-zinc-400 rounded-md px-3 py-2.5 text-sm text-gray-700 outline-none focus:border-[#FF5C35] transition-colors bg-transparent">
                    <input type="tel" name="no_telephone" placeholder="Nomor Telepon" required
                        class="w-full border border-zinc-400 rounded-md px-3 py-2.5 text-sm text-gray-700 outline-none focus:border-[#FF5C35] transition-colors bg-transparent">
                </div>
            </div>

            <div class="bg-white p-5 rounded-[20px] shadow-[4px_4px_10px_rgba(0,0,0,0.08)] border border-gray-50">
                <h2 class="text-lg font-bold mb-4 text-black" style="font-family:'Montserrat',sans-serif">Bukti Pengiriman</h2>
                <div class="space-y-3">
                    <input type="file" name="tanda_tangan" id="inputTandaTangan" class="hidden" accept="image/*">
                    <button type="button" onclick="document.getElementById('inputTandaTangan').click()"
                        class="w-full py-3.5 bg-brand text-white text-sm font-bold rounded-md hover:opacity-90 transition-opacity">
                        Ambil Tanda Tangan
                    </button>
                    <p id="labelTandaTangan" class="text-[10px] text-gray-500 mt-1 italic hidden text-center">File terpilih: <span class="font-semibold"></span></p>

                    <input type="file" name="bukti" id="inputBukti" class="hidden" accept="image/*" capture="environment">
                    <button type="button" onclick="document.getElementById('inputBukti').click()"
                        class="w-full py-3.5 bg-brand text-white text-sm font-bold rounded-md hover:opacity-90 transition-opacity">
                        Unggah Bukti Pengiriman
                    </button>
                    <p id="labelBukti" class="text-[10px] text-gray-500 mt-1 italic hidden text-center">File terpilih: <span class="font-semibold"></span></p>
                </div>
            </div>

            <div class="bg-white p-5 rounded-[20px] shadow-[4px_4px_10px_rgba(0,0,0,0.08)] border border-gray-50">
                <h2 class="text-lg font-bold mb-3 text-black" style="font-family:'Montserrat',sans-serif">Feedback</h2>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-[13px] text-gray-600">Nilai Pengalaman Anda</span>
                    <div id="ratingStars" class="flex gap-1 cursor-pointer">
                        <i class="fas fa-star text-gray-300 text-sm" data-value="1"></i>
                        <i class="fas fa-star text-gray-300 text-sm" data-value="2"></i>
                        <i class="fas fa-star text-gray-300 text-sm" data-value="3"></i>
                        <i class="fas fa-star text-gray-300 text-sm" data-value="4"></i>
                        <i class="fas fa-star text-gray-300 text-sm" data-value="5"></i>
                    </div>
                    <input type="hidden" name="rating" id="ratingValue" value="0">
                </div>
                <textarea name="catatan" placeholder="Tambahkan Komentar" rows="2"
                    class="w-full border border-zinc-400 rounded-md px-3 py-2.5 text-sm text-gray-700 outline-none focus:border-[#FF5C35] transition-colors bg-transparent resize-none"></textarea>
            </div>

            <div class="flex justify-center py-2">
                <button type="submit"
                    class="w-44 py-2.5 bg-brand text-white text-sm font-bold rounded-lg shadow-lg hover:brightness-110 active:scale-95 transition-all">
                    Laporkan Masalah
                </button>
            </div>

        </form>

        <nav class="bottom-nav">
            <a href="pelacakan_kirim_kurirLM.php" class="nav-item">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="nav-text">Beranda</span>
            </a>
            <a href="cari_kurirLM.php" class="nav-item">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span class="nav-text">Cari</span>
            </a>
            <a href="tambah_kurirLM.php" class="nav-item active">
                <div class="bg-gray-100 p-1.5 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="nav-text">Tambah</span>
            </a>
            <a href="manager_kurirLM.php" class="nav-item">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span class="nav-text">Pesan</span>
            </a>
            <a href="profil_kurirLM.php" class="nav-item">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="nav-text">Profil</span>
            </a>
        </nav>

    </div>

    <script>
        const stars = document.querySelectorAll('#ratingStars i');
        const ratingInput = document.getElementById('ratingValue');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const val = +this.dataset.value;
                ratingInput.value = val;
                stars.forEach(s => {
                    const active = +s.dataset.value <= val;
                    s.classList.toggle('text-yellow-400', active);
                    s.classList.toggle('text-gray-300', !active);
                });
            });
        });

        const setupFileInput = (inputId, labelId) => {
            const inputEl = document.getElementById(inputId);
            inputEl.addEventListener('change', function(e) {
                const label = document.getElementById(labelId);
                if (this.files && this.files.length > 0) {
                    label.querySelector('span').textContent = this.files[0].name;
                    label.classList.remove('hidden');
                } else {
                    label.classList.add('hidden');
                }
            });
        };

        setupFileInput('inputTandaTangan', 'labelTandaTangan');
        setupFileInput('inputBukti', 'labelBukti');
    </script>
</body>

</html>