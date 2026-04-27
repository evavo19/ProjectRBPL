<?php

$host    = 'localhost';
$db      = 'rbpl';
$user    = 'root';
$pass    = '';
$charset = 'utf8mb4';

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset($charset);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: manager_kurirLM.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM manager_kurir_lastmile WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
    header("Location: manager_kurirLM.php");
    exit();
}

function renderStars(int $rating): string
{
    $html = '';
    for ($i = 1; $i <= 5; $i++) {
        $color = $i <= $rating ? 'text-yellow-400' : 'text-gray-200';
        $html .= "<i class=\"fas fa-star text-sm $color\"></i>";
    }
    return $html;
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

$status = $row['status'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan Manager - Kurir Last Mile<?= $row['id'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
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
            padding-bottom: 110px;
            border-radius: 25px;
            overflow: hidden;
        }

        .page-header {
            padding: 24px 20px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-bottom: 1px solid #F3F4F6;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .status-badge {
            font-size: 11px;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .status-review  { background: #FFFBEB; color: #B45309; border: 1px solid #FEF3C7; }
        .status-diproses { background: #EFF6FF; color: #1D4ED8; border: 1px solid #BFDBFE; }
        .status-selesai { background: #ECFDF5; color: #065F46; border: 1px solid #D1FAE5; }

        .info-card {
            background: #fff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            border: 1px solid #F3F4F6;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #F9FAFB;
        }

        .info-row:last-child { border-bottom: none; }

        .info-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: #FFF4F1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .btn-action {
            flex: 1;
            padding: 13px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-action:active { transform: scale(0.97); }

        .btn-proses {
            background: #EFF6FF;
            color: #1D4ED8;
        }

        .btn-selesai {
            background: #FF5C35;
            color: white;
            box-shadow: 0 4px 15px rgba(255, 92, 53, 0.3);
        }

        .btn-disabled {
            background: #F3F4F6;
            color: #9CA3AF;
            cursor: not-allowed;
        }

        .img-preview {
            width: 100%;
            border-radius: 14px;
            object-fit: cover;
            max-height: 200px;
            border: 1px solid #F3F4F6;
        }

        .timeline-item {
            display: flex;
            gap: 12px;
            position: relative;
        }

        .timeline-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 4px;
        }

        .timeline-line {
            position: absolute;
            left: 5px;
            top: 16px;
            bottom: -16px;
            width: 2px;
            background: #F3F4F6;
        }

        .bottom-actions {
            position: fixed;
            bottom: 0;
            background: #fff;
            padding: 16px 20px;
            border-top: 1px solid #F3F4F6;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.06);
            border-radius: 0 0 25px 25px;
            z-index: 100;
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
<div class="mobile-container">

    <header class="page-header">
        <div class="flex items-center gap-3">
            <a href="manager_kurirLM.php" class="w-9 h-9 bg-gray-50 rounded-xl flex items-center justify-center text-gray-500 hover:bg-gray-100 transition-colors">
                <i class="fas fa-arrow-left text-sm"></i>
            </a>
            <div>
                <h1 class="text-base font-bold text-gray-900 leading-tight">Detail Laporan</h1>
                <p class="text-[10px] text-gray-400">#<?= str_pad($row['id'], 4, '0', STR_PAD_LEFT) ?> · <?= htmlspecialchars($row['kurir_id']) ?></p>
            </div>
        </div>
        <?= statusBadge($status) ?>
    </header>

    <div class="px-5 mt-5 space-y-4">

        <div class="info-card">
            <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Informasi Penerima</h2>

            <div class="info-row">
                <div class="info-icon"><i class="fas fa-user text-[#FF5C35] text-xs"></i></div>
                <div>
                    <p class="text-[10px] text-gray-400">Nama Penerima</p>
                    <p class="text-sm font-semibold text-gray-800"><?= htmlspecialchars($row['nama_penerima']) ?></p>
                </div>
            </div>

            <div class="info-row">
                <div class="info-icon"><i class="fas fa-map-marker-alt text-[#FF5C35] text-xs"></i></div>
                <div>
                    <p class="text-[10px] text-gray-400">Alamat</p>
                    <p class="text-sm font-semibold text-gray-800"><?= htmlspecialchars($row['alamat']) ?></p>
                </div>
            </div>

            <div class="info-row">
                <div class="info-icon"><i class="fas fa-phone text-[#FF5C35] text-xs"></i></div>
                <div>
                    <p class="text-[10px] text-gray-400">No. Telepon</p>
                    <p class="text-sm font-semibold text-gray-800"><?= htmlspecialchars($row['no_telephone']) ?></p>
                </div>
            </div>

            <div class="info-row">
                <div class="info-icon"><i class="fas fa-clock text-[#FF5C35] text-xs"></i></div>
                <div>
                    <p class="text-[10px] text-gray-400">Waktu Laporan</p>
                    <p class="text-sm font-semibold text-gray-800">
                        <?= date('d M Y, H:i', strtotime($row['created_at'])) ?> WIB
                    </p>
                </div>
            </div>
        </div>

        <div class="info-card">
            <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Feedback Kurir</h2>
            <div class="flex items-center gap-2 mb-3">
                <div class="flex gap-0.5"><?= renderStars((int)$row['rating']) ?></div>
                <span class="text-sm font-bold text-gray-700"><?= $row['rating'] ?>/5</span>
            </div>
            <?php if (!empty($row['catatan'])): ?>
            <div class="bg-gray-50 rounded-xl p-3">
                <p class="text-[11px] text-gray-500 italic leading-relaxed">
                    <i class="fas fa-quote-left text-gray-300 mr-1"></i>
                    <?= htmlspecialchars($row['catatan']) ?>
                </p>
            </div>
            <?php else: ?>
            <p class="text-[11px] text-gray-400 italic">Tidak ada catatan.</p>
            <?php endif; ?>
        </div>

        <div class="info-card">
            <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Bukti Pengiriman</h2>

            <?php if (!empty($row['bukti'])): ?>
            <div class="mb-3">
                <p class="text-[10px] text-gray-400 mb-2 font-medium">Foto Bukti</p>
                <img src="uploads/bukti/<?= htmlspecialchars($row['bukti']) ?>" alt="Bukti Pengiriman" class="img-preview">
            </div>
            <?php else: ?>
            <p class="text-[11px] text-gray-400 italic mb-3">Tidak ada foto bukti.</p>
            <?php endif; ?>

            <?php if (!empty($row['tanda_tangan'])): ?>
            <div>
                <p class="text-[10px] text-gray-400 mb-2 font-medium">Tanda Tangan</p>
                <img src="uploads/tanda_tangan/<?= htmlspecialchars($row['tanda_tangan']) ?>" alt="Tanda Tangan" class="img-preview" style="max-height:120px; background:#fff;">
            </div>
            <?php else: ?>
            <p class="text-[11px] text-gray-400 italic">Tidak ada tanda tangan.</p>
            <?php endif; ?>
        </div>

        <div class="info-card">
            <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Riwayat Status</h2>
            <div class="space-y-4">

                <div class="timeline-item">
                    <?php if (in_array($status, ['DITINJAU', 'DIPROSES', 'SELESAI'])): ?>
                        <div class="timeline-dot bg-yellow-400 mt-1"></div>
                    <?php else: ?>
                        <div class="timeline-dot bg-gray-200 mt-1"></div>
                    <?php endif; ?>
                    <div class="relative <?= in_array($status, ['DIPROSES', 'SELESAI']) ? '' : '' ?>">
                        <p class="text-xs font-bold <?= in_array($status, ['DITINJAU','DIPROSES','SELESAI']) ? 'text-yellow-600' : 'text-gray-300' ?>">DITINJAU</p>
                        <p class="text-[10px] text-gray-400">Laporan masuk dan menunggu tindakan</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <?php if (in_array($status, ['DIPROSES', 'SELESAI'])): ?>
                        <div class="timeline-dot bg-blue-500 mt-1"></div>
                    <?php else: ?>
                        <div class="timeline-dot bg-gray-200 mt-1"></div>
                    <?php endif; ?>
                    <div>
                        <p class="text-xs font-bold <?= in_array($status, ['DIPROSES','SELESAI']) ? 'text-blue-600' : 'text-gray-300' ?>">DIPROSES</p>
                        <p class="text-[10px] text-gray-400">Manajer sedang menangani laporan</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <?php if ($status === 'SELESAI'): ?>
                        <div class="timeline-dot bg-green-500 mt-1"></div>
                    <?php else: ?>
                        <div class="timeline-dot bg-gray-200 mt-1"></div>
                    <?php endif; ?>
                    <div>
                        <p class="text-xs font-bold <?= $status === 'SELESAI' ? 'text-green-600' : 'text-gray-300' ?>">SELESAI</p>
                        <p class="text-[10px] text-gray-400">Masalah telah berhasil ditangani</p>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="bottom-actions" id="bottomActions" style="width:390px;">

        <?php if ($status === 'DITINJAU'): ?>
            <form method="POST" action="update_manager_kurirLM.php" style="flex:1">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="status" value="DIPROSES">
                <button type="submit" class="btn-action btn-proses w-full">
                    <i class="fas fa-spinner"></i> Proses Laporan
                </button>
            </form>

        <?php elseif ($status === 'DIPROSES'): ?>
            <form method="POST" action="update_manager_kurirLM.php" style="flex:1">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="status" value="SELESAI">
                <button type="submit" class="btn-action btn-selesai w-full">
                    <i class="fas fa-check-circle"></i> Tandai Selesai
                </button>
            </form>

        <?php else: ?>
            <button class="btn-action btn-disabled w-full" disabled>
                <i class="fas fa-check-double"></i> Laporan Selesai Ditangani
            </button>

        <?php endif; ?>

    </div>

</div>

<script>
    function fixActions() {
        const container = document.querySelector('.mobile-container');
        const actions   = document.getElementById('bottomActions');
        if (!container || !actions) return;
        const rect = container.getBoundingClientRect();
        actions.style.left  = rect.left + 'px';
        actions.style.width = rect.width + 'px';
    }
    window.addEventListener('resize', fixActions);
    document.addEventListener('DOMContentLoaded', fixActions);
    fixActions();
</script>
</body>
</html>
<?php $conn->close(); ?>