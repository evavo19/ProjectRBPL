<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopee Logo - Mobile View</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        shopee: '#EE4D2D',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .app-container {
            width: 390px;
            height: 100vh;
            background-color: #FFFFFF;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
            max-width: 100vw;
        }

        .home-indicator {
            width: 134px;
            height: 5px;
            background-color: #000000;
            border-radius: 100px;
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0.1;
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.85); }
            to { opacity: 1; transform: scale(1); }
        }

        .logo-animate {
            animation: fadeInScale 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.1) forwards;
        }

        @keyframes loading-slide {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(250%); }
        }

        .loading-line {
            animation: loading-slide 1.5s ease-in-out infinite;
        }

        /* Cursor pointer untuk logo interaktif */
        .clickable-logo {
            cursor: pointer;
            transition: transform 0.2s active;
        }
        .clickable-logo:active {
            transform: scale(0.95);
        }
    </style>
</head>

<body>

    <div class="app-container">
    

        <!-- AREA LOGO TENGAH -->
        <div class="flex-1 flex flex-col justify-center items-center">
            <a href="daftar_akun_pembeli.php" class="logo-animate flex flex-col items-center clickable-logo decoration-none">
                <!-- LOGO GAMBAR (Menggantikan SVG) -->
                <div class="w-30 h-30 mb-2 drop-shadow-sm flex items-center justify-center">
                    <img 
                        src="assets/shopee-logo.png" 
                        alt="Shopee Logo" 
                        class="w-full h-full object-contain"
                        onerror="this.src='https://placehold.co/100x100?text=LogoShopee'"
                    />
                </div>
            </a>
        </div>

        <!-- BAGIAN LOADING -->
        <div class="pb-28 flex flex-col items-center">
            <div class="w-40 h-1 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-shopee w-1/3 loading-line"></div>
            </div>
            <p class="mt-4 text-gray-400 text-[10px] font-bold tracking-[0.2em] uppercase">Memuat...</p>
        </div>

        <!-- FOOTER BRANDING -->
        <div class="absolute bottom-12 w-full text-center">
            <span class="text-gray-300 text-[8px] font-bold tracking-[0.5em] uppercase">Eva Dewi Agustin Group</span>
        </div>
    </div>

    <script>
        // Update jam secara real-time
        function updateClock() {
            const now = new Date();
            const timeStr = String(now.getHours()).padStart(2, '0') + ':' + 
                          String(now.getMinutes()).padStart(2, '0');
            const clockElement = document.getElementById('clock');
            if (clockElement) clockElement.innerText = timeStr;
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Simulasi perpindahan halaman otomatis (tetap aktif jika user tidak klik)
        setTimeout(() => {
            console.log("Mengarahkan ke dashboard utama pembeli...");
            // window.location.href = "home_buyer.php";
        }, 5000);
    </script>
</body>

</html>