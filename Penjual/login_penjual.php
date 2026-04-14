<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Penjual - Shopee</title>
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
            height: 844px;
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
            font-size: 14px;
            font-weight: 500;
            outline: none;
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
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.1s;
        }

        .btn-primary:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0px 0px #18191f;
        }

        .btn-social {
            width: 100%;
            height: 56px;
            border: 2px solid #18191f;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-weight: 600;
            margin-bottom: 12px;
            background-color: white;
        }
    </style>
</head>

<body>

    <div class="app-container">
        <!-- BAR ATAS / STATUS BAR -->
        <div class="flex justify-between items-center px-8 pt-6 pb-2 text-black">
            <span class="text-xs font-semibold font-poppins" id="current-time">00:00</span>
            <div class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-black" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                </svg>
                <div class="flex items-center">
                    <div class="w-5 h-2.5 border border-black rounded-[2px] p-[1px] flex items-center">
                        <div class="bg-black h-full w-[70%] rounded-[1px]"></div>
                    </div>
                    <div class="w-[2px] h-1 bg-black ml-[1px] rounded-sm"></div>
                </div>
            </div>
        </div>

        <div class="scrollable-content">
            <!-- LOGO AREA (TANPA BORDER / KOTAK) -->
            <div class="flex flex-col items-center mt-5 mb-8">
                <div class="flex items-center justify-center mb-4">
                    <img src="shopee-logo.png" 
                         alt="Logo Toko" 
                         class="w-20 h-auto object-contain">
                </div>
                <h2 class="text-2xl font-black text-[#18191f] tracking-tight uppercase">Login Penjual</h2>
                <p class="text-[11px] text-zinc-400 font-medium">Masuk ke Shopee Seller Center</p>
            </div>

            <!-- FORM -->
            <form action="javascript:void(0)" id="loginForm" class="mt-4">
                <div class="input-group">
                    <i data-lucide="mail" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-500"></i>
                    <input type="email" class="input-field" placeholder="Email / Nama Pengguna" required>
                </div>

                <div class="input-group">
                    <i data-lucide="lock" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-500"></i>
                    <input type="password" class="input-field" placeholder="Password" required>
                </div>

                <div class="flex justify-end -mt-2 mb-8">
                    <a href="#" class="text-xs font-bold text-orange-600 hover:underline">Lupa password?</a>
                </div>

                <button type="submit" class="btn-primary mb-6 uppercase tracking-wider">
                    Masuk Sekarang
                </button>
            </form>

            <!-- DIVIDER -->
            <div class="flex items-center gap-4 mb-6">
                <div class="flex-1 h-[1.5px] bg-zinc-200"></div>
                <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest">atau</span>
                <div class="flex-1 h-[1.5px] bg-zinc-200"></div>
            </div>

            <!-- SOCIAL LOGIN -->
            <div class="space-y-3">
                <button class="btn-social">
                    <img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png" class="w-5 h-5" alt="Google">
                    <span class="text-sm font-bold text-zinc-800">Google</span>
                </button>

                <button class="btn-social !bg-[#1877F2] !border-[#1877F2] text-white !shadow-[0_4px_0_0_#0d47a1]">
                    <i data-lucide="facebook" class="w-5 h-5 fill-white"></i>
                    <span class="text-sm font-bold">Facebook</span>
                </button>
            </div>

            <!-- FOOTER -->
            <div class="text-center mt-12 mb-10">
                <p class="text-xs font-medium text-zinc-500">
                    Baru di Shopee? <span class="text-orange-600 font-black cursor-pointer ml-1 uppercase">Daftar</span>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = e.target.querySelector('button');
            btn.innerHTML = `<i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i> <span class="ml-2 uppercase">Memproses...</span>`;
            lucide.createIcons();
            btn.disabled = true;

            setTimeout(() => {
                window.location.href = "index.php"; 
            }, 1500);
        });

        function initLucide() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            } else {
                setTimeout(initLucide, 100);
            }
        }

        window.onload = function() {
            initLucide();
            function updateClock() {
                const now = new Date();
                const timeStr = String(now.getHours()).padStart(2, '0') + ':' +
                    String(now.getMinutes()).padStart(2, '0');
                const el = document.getElementById('current-time');
                if(el) el.innerText = timeStr;
            }
            setInterval(updateClock, 1000);
            updateClock();
        };
    </script>
</body>

</html>