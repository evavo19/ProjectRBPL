<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengiriman - Kurir Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F3F4F6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .app-shell {
            width: 390px;
            height: 100vh;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .app-inner {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            background: #fff;
        }

        .app-header {
            flex-shrink: 0;
            background: #fff;
            border-bottom: 1px solid #F3F4F6;
            padding: 40px 24px 16px 24px; 
        }

        .scroll-area {
            flex: 1 1 0;
            min-height: 0;
            overflow-y: auto;
            background: white;
        }

        .scroll-area::-webkit-scrollbar { display: none; }
        .scroll-area { -ms-overflow-style: none; scrollbar-width: none; }

        .bottom-nav {
            flex-shrink: 0;
            height: 80px;
            background: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 8px;
            border-top: 1px solid #F3F4F6;
            box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.04);
            border-radius: 30px 30px 0 0;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex: 1;
            color: #9CA3AF;
            text-decoration: none;
            transition: color 0.2s;
        }

        .nav-item.active { color: #FF5C35; }
        .nav-item:hover  { color: #FF5C35; }

        .nav-text {
            font-size: 10px;
            font-weight: 600;
            margin-top: 2px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border: 1px solid #E5E7EB;
            border-radius: 20px;
            overflow: hidden;
            background: white;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
        }

        .stats-item {
            border: 0.5px solid #F3F4F6;
            padding: 12px 10px;
            text-align: center;
        }

        .text-brand { color: #FF5C35; }

        .package-card {
            background: white;
            padding: 16px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #F3F4F6;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="app-shell">
        <div class="app-inner">

            <div class="app-header">
                <div class="flex items-center justify-between mb-4">
                    <a href="pelacakan_kirim_kurirLM.php"
                       style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;background:#f3f4f6;border-radius:50%;text-decoration:none;">
                        <svg width="20" height="20" fill="none" stroke="#374151" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                    <h1 style="font-size:18px;font-weight:700;color:#1f2937;margin:0;">Status Pengiriman</h1>
                    <div style="width:36px;"></div>
                </div>

                <div class="stats-grid mb-2">
                    <div class="stats-item">
                        <p class="text-[9px] font-bold text-brand uppercase mb-1">Penjemputan Berikutnya</p>
                        <p class="text-sm font-bold text-gray-900">14:00</p>
                    </div>
                    <div class="stats-item">
                        <p class="text-[9px] font-bold text-brand uppercase mb-1">Pengantaran Terakhir</p>
                        <p class="text-sm font-bold text-gray-900">Selesai</p>
                    </div>
                    <div class="stats-item">
                        <p class="text-[9px] font-bold text-brand uppercase mb-1">Total Paket</p>
                        <p class="text-sm font-bold text-gray-900">17 Paket</p>
                    </div>
                    <div class="stats-item">
                        <p class="text-[9px] font-bold text-brand uppercase mb-1">Paket Terkirim</p>
                        <p class="text-sm font-bold text-gray-900">12 Paket</p>
                    </div>
                </div>
            </div>

            <div class="scroll-area">
                <div style="padding: 16px 24px; display:flex; flex-direction:column; gap:12px;">

                    <div class="package-card">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:6px;height:24px;background:#FF5C35;border-radius:999px;"></div>
                            <span style="font-weight:700;color:#1f2937;">Package A</span>
                        </div>
                        <span style="font-size:12px;color:#6b7280;font-weight:500;">Bantul</span>
                    </div>

                    <div class="package-card">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:6px;height:24px;background:#FF5C35;border-radius:999px;"></div>
                            <span style="font-weight:700;color:#1f2937;">Package E</span>
                        </div>
                        <span style="font-size:12px;color:#6b7280;font-weight:500;">Bantul</span>
                    </div>

                    <div class="package-card">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:6px;height:24px;background:#FF5C35;border-radius:999px;"></div>
                            <span style="font-weight:700;color:#1f2937;">Package F</span>
                        </div>
                        <span style="font-size:12px;color:#6b7280;font-weight:500;">Bantul</span>
                    </div>

                    <div class="package-card">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:6px;height:24px;background:#FF5C35;border-radius:999px;"></div>
                            <span style="font-weight:700;color:#1f2937;">Package B</span>
                        </div>
                        <span style="font-size:12px;color:#6b7280;font-weight:500;">Sleman</span>
                    </div>

                </div>
            </div>

            <nav class="bottom-nav">

                <a href="pelacakan_kirim_kurirLM.php" class="nav-item active">
                    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="nav-text">Beranda</span>
                </a>

                <a href="cari_kurirLM.php" class="nav-item">
                    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span class="nav-text">Cari</span>
                </a>

                <a href="tambah_kurirLM.php" class="nav-item">
                    <div style="background:#f3f4f6;padding:6px;border-radius:50%;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <span class="nav-text">Tambah</span>
                </a>

                <a href="manager_kurirLM.php" class="nav-item">
                    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span class="nav-text">Pesan</span>
                </a>

                <a href="profil_kurirLM.php" class="nav-item">
                    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span class="nav-text">Profil</span>
                </a>

            </nav>

        </div>
    </div>

</body>
</html>