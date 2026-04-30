<?php

$host = "sql203.infinityfree.com";
$user = "if0_41736846";
$password = "tugasRBPL2026";
$database = "if0_41736846_db_rbpl";
$charset = 'utf8mb4';

$conn = new mysqli($host, $user, $password, $database);
$conn->set_charset($charset);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$filter = $_GET['filter'] ?? 'semua';
$search = $_GET['search'] ?? '';

$where = [];
$params = [];
$types  = '';

if ($search !== '') {
    $where[] = "(nama_penerima LIKE ? OR kurir_id LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $types .= 'ss';
}

if ($filter === 'ditinjau') {
    $where[] = "status = 'DITINJAU'";
} elseif ($filter === 'diproses') {
    $where[] = "status = 'DIPROSES'";
} elseif ($filter === 'selesai') {
    $where[] = "status = 'SELESAI'";
}

$sql = "SELECT * FROM manager_kurir_lastmile";
if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}
$sql .= " ORDER BY created_at DESC";

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

function renderStars(int $rating): string
{
    $html = '';
    for ($i = 1; $i <= 5; $i++) {
        $color = $i <= $rating ? 'text-yellow-400' : 'text-gray-200';
        $html .= "<i class=\"fas fa-star text-[11px] $color\"></i>";
    }
    return $html;
}

function timeAgo(string $datetime): string
{
    $now  = new DateTime();
    $past = new DateTime($datetime);
    $diff = $now->diff($past);

    if ($diff->i < 1 && $diff->h == 0 && $diff->d == 0)  return "Baru saja";
    if ($diff->h == 0 && $diff->d == 0) return $diff->i . " Menit yang lalu";
    if ($diff->d == 0) return $diff->h . " Jam yang lalu";
    if ($diff->d == 1) return "Kemarin";
    return $diff->d . " Hari yang lalu";
}

function statusBadge(string $status): string
{
    return match ($status) {
        'DITINJAU' => '<span class="status-badge status-review">DITINJAU</span>',
        'DIPROSES' => '<span class="status-badge status-diproses">DIPROSES</span>',
        'SELESAI'  => '<span class="status-badge status-selesai">SELESAI</span>',
        default    => '<span class="status-badge status-review">DITINJAU</span>',
    };
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager - Kurir Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --brand: #FF5C35;
            --brand-light: #FFF4F1;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .mobile-container {
            width: 100%;
            max-width: 390px;
            min-height: 100vh;
            background: #F9FAFB;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
            position: relative;
            padding-bottom: 90px;
            border-radius: 25px;
            overflow: hidden;
        }

        .page-header {
            padding: 28px 24px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-bottom: 1px solid #F3F4F6;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            height: 75px;
            background: #fff;
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-top: 1px solid #F3F4F6;
            box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.04);
            border-radius: 0 0 25px 25px;
            z-index: 100;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            color: #9CA3AF;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px 0;
        }

        .nav-item:hover {
            color: var(--brand);
        }

        .nav-item.active {
            color: var(--brand);
        }

        .nav-text {
            font-size: 10px;
            font-weight: 600;
            margin-top: 4px;
        }

        .status-badge {
            font-size: 10px;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 700;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .status-review {
            background: #FFFBEB;
            color: #B45309;
            border: 1px solid #FEF3C7;
        }

        .status-selesai {
            background: #ECFDF5;
            color: #065F46;
            border: 1px solid #D1FAE5;
        }

        .status-pending {
            background: #EFF6FF;
            color: #1E40AF;
            border: 1px solid #DBEAFE;
        }

        .status-diproses {
            background: #EFF6FF;
            color: #1D4ED8;
            border: 1px solid #BFDBFE;
        }

        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.02), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .chip-active {
            background: #FF5C35;
            color: white;
        }

        .chip-inactive {
            background: white;
            color: #9CA3AF;
            border: 1px solid #F3F4F6;
        }

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 24px;
            text-align: center;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            background: #FFF4F1;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
    </style>
</head>

<body>
    <div class="mobile-container">

        <header class="page-header">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-[#FF5C35] rounded-xl flex items-center justify-center text-white shadow-lg shadow-orange-200">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-gray-900 leading-tight">Daftar Laporan</h1>
                    <p class="text-[10px] text-gray-400 font-medium uppercase tracking-wider">Kurir Last Mile</p>
                </div>
            </div>
            <div class="relative w-10 h-10 flex items-center justify-center bg-gray-50 rounded-full">
                <i class="fas fa-bell text-gray-400"></i>
                <?php if (count($rows) > 0): ?>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                <?php endif; ?>
            </div>
        </header>

        <form method="GET" action="" class="px-6 mt-6">
            <div class="relative group">
                <input
                    type="text"
                    name="search"
                    value="<?= htmlspecialchars($search) ?>"
                    placeholder="Cari nama penerima atau ID kurir..."
                    class="w-full bg-white border border-gray-100 rounded-2xl py-3.5 pl-12 pr-4 text-sm outline-none focus:border-[#FF5C35] focus:ring-4 focus:ring-orange-50 transition-all card-shadow"
                    oninput="this.form.submit()">
                <i class="fas fa-search absolute left-5 top-4 text-gray-300 group-focus-within:text-[#FF5C35] transition-colors"></i>
            </div>
            <input type="hidden" name="filter" value="<?= htmlspecialchars($filter) ?>">
        </form>

        <div class="px-6 mt-4 flex gap-2 overflow-x-auto pb-2 no-scrollbar">
            <?php
            $filters = ['semua' => 'Semua', 'ditinjau' => 'Ditinjau', 'diproses' => 'Diproses', 'selesai' => 'Selesai'];
            foreach ($filters as $key => $label):
                $active = $filter === $key;
                $cls = $active ? 'chip-active' : 'chip-inactive';
            ?>
                <a href="?filter=<?= $key ?>&search=<?= urlencode($search) ?>"
                    class="px-4 py-1.5 text-[11px] font-semibold rounded-full shrink-0 <?= $cls ?> transition-colors">
                    <?= $label ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="px-6 mt-2">
            <p class="text-[10px] text-gray-400 font-medium">
                <?= count($rows) ?> laporan ditemukan
            </p>
        </div>

        <div class="px-6 mt-2 space-y-4">

            <?php if (empty($rows)): ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-inbox text-[#FF5C35] text-2xl"></i>
                    </div>
                    <p class="text-sm font-semibold text-gray-700">Tidak ada laporan</p>
                    <p class="text-[11px] text-gray-400 mt-1">Coba ubah filter atau kata kunci pencarian</p>
                </div>
            <?php endif; ?>

            <?php foreach ($rows as $row): ?>
                <div class="bg-white p-5 rounded-[24px] border border-gray-50 card-shadow relative group active:scale-[0.98] transition-transform cursor-pointer"
                    onclick="window.location='detail_manager_kurirLM.php?id=<?= $row['id'] ?>'">

                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-[9px] font-bold text-[#FF5C35] bg-orange-50 px-2 py-0.5 rounded-md tracking-wider">
                                    <?= htmlspecialchars($row['kurir_id']) ?>
                                </span>
                                <span class="text-[9px] text-gray-300">•</span>
                                <span class="text-[9px] text-gray-400 font-medium">
                                    <?= timeAgo($row['created_at']) ?>
                                </span>
                            </div>
                            <h3 class="text-[15px] font-bold text-gray-800">
                                <?= htmlspecialchars($row['nama_penerima']) ?>
                            </h3>
                        </div>
                        <?= statusBadge($row['status']) ?>
                    </div>

                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center shrink-0">
                            <i class="fas fa-map-marker-alt text-[#FF5C35] text-xs"></i>
                        </div>
                        <p class="text-[11px] text-gray-500 leading-relaxed font-medium">
                            <?= htmlspecialchars($row['alamat']) ?>
                        </p>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-50">

                        <div class="flex items-center gap-0.5">
                            <?= renderStars((int)$row['rating']) ?>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="flex -space-x-2">
                                <?php if (!empty($row['bukti'])): ?>
                                    <div class="w-6 h-6 rounded-full bg-blue-50 border-2 border-white flex items-center justify-center" title="Ada Foto">
                                        <i class="fas fa-camera text-[10px] text-blue-400"></i>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($row['tanda_tangan'])): ?>
                                    <div class="w-6 h-6 rounded-full bg-purple-50 border-2 border-white flex items-center justify-center" title="Ada TTD">
                                        <i class="fas fa-signature text-[10px] text-purple-400"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <span class="text-[11px] font-bold text-gray-800 tracking-tight">
                                <?= htmlspecialchars($row['no_telephone']) ?>
                            </span>
                        </div>
                    </div>

                    <?php if (!empty($row['catatan'])): ?>
                        <div class="mt-3 pt-3 border-t border-gray-50">
                            <p class="text-[10px] text-gray-400 italic">
                                <i class="fas fa-comment-alt mr-1"></i>
                                <?= htmlspecialchars($row['catatan']) ?>
                            </p>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>

        </div>

        <nav class="bottom-nav">
            <a href="pelacakan_kirim_kurirLM.php" class="nav-item">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="nav-text">Beranda</span>
            </a>
            <a href="cari_kurirLM.php" class="nav-item">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span class="nav-text">Cari</span>
            </a>
            <a href="tambah_kurirLM.php" class="nav-item">
                <div class="bg-gray-100 p-1.5 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="nav-text">Tambah</span>
            </a>
            <a href="manager_kurirLM.php" class="nav-item active">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span class="nav-text">Pesan</span>
            </a>
            <a href="profil_kurirLM.php" class="nav-item">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="nav-text">Profil</span>
            </a>
        </nav>

    </div>
    <script>
        function fixNav() {
            const container = document.querySelector('.mobile-container');
            const nav = document.querySelector('.bottom-nav');
            if (!container || !nav) return;
            const rect = container.getBoundingClientRect();
            const containerBottom = rect.bottom;
            const viewportBottom = window.innerHeight;
            if (containerBottom < viewportBottom) {
                nav.style.position = 'absolute';
                nav.style.left = '0';
                nav.style.width = '100%';
                nav.style.bottom = '0';
            } else {
                nav.style.position = 'fixed';
                nav.style.left = rect.left + 'px';
                nav.style.width = rect.width + 'px';
                nav.style.bottom = '0';
            }
        }
        window.addEventListener('resize', fixNav);
        window.addEventListener('scroll', fixNav);
        document.addEventListener('DOMContentLoaded', fixNav);
        fixNav();
    </script>
</body>

</html>
<?php $conn->close(); ?>