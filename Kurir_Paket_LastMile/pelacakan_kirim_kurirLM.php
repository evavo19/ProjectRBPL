<?php
date_default_timezone_set('Asia/Jakarta');

$currentTime = date('H:i');
$currentDate = date('d.m.Y');

$stats = [
    'total_paket' => 24,
    'terkirim' => 18,
    'bukti_kirim' => 18,
    'tertunda' => 6
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelacakan Pengiriman - Kurir Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
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
            background: white;
            padding: 40px 24px 16px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .scroll-area {
            flex: 1 1 0;
            min-height: 0;
            overflow-y: auto;
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
            border-top: 1px solid #f3f4f6;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.06);
            border-radius: 30px 30px 0 0;
        }

        .grid-card {
            border: 1px solid #F1F5F9;
            background-color: #FFFFFF;
            transition: all 0.2s;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
        }

        .grid-card:active {
            scale: 0.95;
            background-color: #FFF7F5;
        }
    </style>
</head>

<body>

    <div class="app-shell">
        <div class="app-inner">

            <div class="app-header">
                <a href="index_kurirLM.php"
                   style="width:32px;height:32px;flex-shrink:0;display:flex;align-items:center;justify-content:center;border-radius:8px;background:#f3f4f6;text-decoration:none;">
                    <svg width="20" height="20" fill="none" stroke="#374151" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h2 style="font-family:'Montserrat',sans-serif;font-weight:700;font-size:18px;color:#1f2937;margin:0;">
                    Pelacakan Pengiriman
                </h2>
            </div>

            <div class="scroll-area">

                <div style="display:flex;flex-direction:column;align-items:center;margin-top:32px;">
                    <h1 id="live-clock"
                        style="font-family:'Montserrat',sans-serif;font-size:60px;font-weight:400;color:#000;letter-spacing:-2px;margin:0;">
                        <?php echo $currentTime; ?>
                    </h1>
                    <p id="live-date"
                       style="font-family:'Montserrat',sans-serif;font-size:20px;color:#9ca3af;margin-top:8px;">
                        <?php echo $currentDate; ?>
                    </p>
                </div>

                <div style="display:flex;justify-content:center;margin-top:32px;padding:0 24px;">
                    <img style="max-width:212px;height:80px;object-fit:contain;" src="assets/logo.png" alt="Logo"/>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;padding:40px 32px 24px 32px;">

                    <a href="pengiriman_paket_kurirLM.php" class="grid-card"
                       style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:24px;border-radius:16px;text-decoration:none;">
                        <div style="width:48px;height:48px;background:#EF4C29;border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;box-shadow:0 8px 16px rgba(239,76,41,0.2);">
                            <svg width="28" height="28" fill="none" stroke="white" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <span style="font-weight:700;color:#374151;">Paket</span>
                        <span style="color:#EF4C29;font-weight:700;font-size:20px;"><?php echo $stats['total_paket']; ?></span>
                    </a>

                    <div class="grid-card"
                         style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:24px;border-radius:16px;">
                        <div style="width:48px;height:48px;background:#EF4C29;border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;box-shadow:0 8px 16px rgba(239,76,41,0.2);">
                            <svg width="28" height="28" fill="none" stroke="white" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span style="font-weight:700;color:#374151;">Terkirim</span>
                        <span style="color:#EF4C29;font-weight:700;font-size:20px;"><?php echo $stats['terkirim']; ?></span>
                    </div>

                    <div class="grid-card"
                         style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:24px;border-radius:16px;">
                        <div style="width:48px;height:48px;background:#EF4C29;border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;box-shadow:0 8px 16px rgba(239,76,41,0.2);">
                            <svg width="28" height="28" fill="none" stroke="white" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <span style="font-weight:700;color:#374151;font-size:14px;">Bukti Kirim</span>
                        <span style="color:#EF4C29;font-weight:700;font-size:20px;"><?php echo $stats['bukti_kirim']; ?></span>
                    </div>

                    <div class="grid-card"
                         style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:24px;border-radius:16px;">
                        <div style="width:48px;height:48px;background:#EF4C29;border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;box-shadow:0 8px 16px rgba(239,76,41,0.2);">
                            <svg width="28" height="28" fill="none" stroke="white" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span style="font-weight:700;color:#374151;">Tertunda</span>
                        <span style="color:#EF4C29;font-weight:700;font-size:20px;"><?php echo $stats['tertunda']; ?></span>
                    </div>

                </div>

            </div>

            <div class="bottom-nav">

                <a href="#" style="display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;text-decoration:none;">
                    <svg width="20" height="20" fill="none" stroke="#EF4C29" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span style="font-size:10px;font-weight:700;color:#EF4C29;margin-top:2px;">Beranda</span>
                </a>

                <a href="cari_kurirLM.php" style="display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;text-decoration:none;">
                    <svg width="24" height="24" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span style="font-size:10px;font-weight:700;color:#9ca3af;margin-top:2px;">Cari</span>
                </a>

                <a href="tambah_kurirLM.php" style="display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;text-decoration:none;">
                    <div style="width:40px;height:40px;background:#f3f4f6;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                        <svg width="24" height="24" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <span style="font-size:10px;font-weight:700;color:#9ca3af;margin-top:2px;">Tambah</span>
                </a>

                <a href="manager_kurirLM.php" style="display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;text-decoration:none;">
                    <svg width="24" height="24" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span style="font-size:10px;font-weight:700;color:#9ca3af;margin-top:2px;">Pesan</span>
                </a>

                <a href="profil_kurirLM.php" style="display:flex;flex-direction:column;align-items:center;justify-content:center;width:64px;text-decoration:none;">
                    <svg width="24" height="24" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span style="font-size:10px;font-weight:700;color:#9ca3af;margin-top:2px;">Profil</span>
                </a>

            </div>

        </div>
    </div>

    <script>
        function pad(n) { return String(n).padStart(2, '0'); }

        function updateClock() {
            const now = new Date();

            const wib = new Date(now.toLocaleString('en-US', { timeZone: 'Asia/Jakarta' }));

            const hh = pad(wib.getHours());
            const mm = pad(wib.getMinutes());
            document.getElementById('live-clock').textContent = hh + ':' + mm;

            const dd  = pad(wib.getDate());
            const mo  = pad(wib.getMonth() + 1);
            const yyyy = wib.getFullYear();
            document.getElementById('live-date').textContent = dd + '.' + mo + '.' + yyyy;
        }

        updateClock();                    
        setInterval(updateClock, 1000);    
    </script>

</body>
</html>