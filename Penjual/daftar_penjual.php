<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjual - Penjual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .app-container {
            width: 100%;
            max-width: 390px;
            height: 760px;
            background-color: #FFFFFF;
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border-radius: 25px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        .scrollable-content {
            flex: 1;
            overflow-y: auto;
            padding: 0 30px;
        }

        .scrollable-content::-webkit-scrollbar {
            display: none;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            height: 56px;
            padding: 0 16px 0 48px;
            border: 2px solid #18191f;
            border-radius: 16px;
            outline: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .input-field:focus {
            border-color: #ee4d2d;
            box-shadow: 0 4px 0px 0px #18191f;
        }

        .btn-primary {
            background-color: #ee4d2d;
            color: #ffffff;
            font-weight: 800;
            font-size: 18px;
            height: 56px;
            width: 100%;
            border-radius: 16px;
            border: 2px solid #18191f;
            box-shadow: 0 4px 0px 0px #18191f;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.1s;
        }

        .btn-primary:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0px 0px #18191f;
        }
    </style>
</head>

<body>
    <div class="app-container">

        <div class="scrollable-content">
            <div class="flex flex-col items-center mt-5 mb-8">
                <div class="flex items-center justify-center mb-4">
                    <img src="shopee-logo.png"
                        alt="Logo Shopee"
                        class="w-20 h-auto object-contain">
                </div>
                <h2 class="text-2xl font-black text-[#18191f] tracking-tight uppercase">Daftar Penjual</h2>
                <p class="text-[11px] text-zinc-400 font-medium">Lengkapi data untuk mulai berjualan</p>
            </div>

            <form action="proses_daftar.php" method="POST" class="mt-4">
                <div class="input-group">
                    <i data-lucide="user" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-500"></i>
                    <input type="text" name="nama" class="input-field" placeholder="Nama Lengkap" required>
                </div>

                <div class="input-group">
                    <i data-lucide="mail" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-500"></i>
                    <input type="email" name="email" class="input-field" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i data-lucide="lock" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-500"></i>
                    <input type="password" name="password" class="input-field" placeholder="Password" required>
                </div>

                <div class="input-group">
                    <i data-lucide="calendar" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-500"></i>
                    <input type="number" name="tahun" class="input-field" placeholder="Tahun Mulai Jual" required>
                </div>

                <div class="input-group">
                    <i data-lucide="map-pin" class="absolute left-4 top-4 w-5 h-5 text-zinc-500"></i>
                    <textarea name="alamat" class="input-field !h-28 pt-4" placeholder="Alamat Lengkap Toko" required></textarea>
                </div>

                <button type="submit" class="btn-primary mb-6 uppercase tracking-wider">
                    Daftar Sekarang
                </button>
            </form>

            <div class="text-center mt-6 mb-10">
                <p class="text-xs font-medium text-zinc-500">
                    Sudah punya akun?
                    <a href="login_penjual.php" class="text-orange-600 font-black cursor-pointer ml-1 uppercase">Login</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function initLucide() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            } else {
                setTimeout(initLucide, 100);
            }
        }
        window.onload = initLucide;
    </script>
</body>

</html>