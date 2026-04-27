<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Lokasi (Cari) - Kurir Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
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
            background: #FFFFFF;
            position: relative;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            border-radius: 25px;
            overflow: hidden;
        }

        .map-container {
            background-color: #f3f4f6;
            background-image:
                linear-gradient(90deg, #ffffff 2px, transparent 2px),
                linear-gradient(#ffffff 2px, transparent 2px);
            background-size: 40px 40px;
            position: relative;
            flex: 1;
            margin-top: 10px;
            border-radius: 30px 30px 0 0;
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .bottom-nav {
            position: sticky;
            bottom: 0;
            left: 0;
            right: 0;
            height: 65px;
            background: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-top: 1px solid #F3F4F6;
            box-shadow: 0px -4px 15px rgba(0, 0, 0, 0.03);
            z-index: 100;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex: 1;
            color: #9CA3AF;
            text-decoration: none;
            transition: all 0.2s;
        }

        .nav-item.active {
            color: #FF5C35;
        }

        .nav-text {
            font-size: 10px;
            font-weight: 600;
            margin-top: 4px;
        }

        .bg-brand {
            background-color: #FF5C35;
        }

        .text-brand {
            color: #FF5C35;
        }
    </style>
</head>

<body>

    <div class="mobile-container">


        <div class="bg-white px-6 pt-8 pb-4 flex items-center justify-between z-40">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 flex items-center justify-center text-black text-2xl font-bold">
                    <i class="fas fa-search"></i>
                </div>
                <div>
                    <h1 class="text-sm font-bold leading-tight">Jalan Pengiriman</h1>
                    <p class="text-[12px] text-gray-500 font-semibold">Update Lokasi</p>
                </div>
            </div>
            <div class="w-10 h-10 bg-brand rounded-full shadow-lg flex items-center justify-center text-white">
                <i class="fas fa-cog text-sm"></i>
            </div>
        </div>

        <div class="map-container overflow-hidden">
            <div class="absolute top-20 left-[-50px] w-[500px] h-10 bg-white/60 rotate-[35deg]"></div>
            <div class="absolute top-60 left-[-50px] w-[500px] h-10 bg-white/60 rotate-[-15deg]"></div>
            <div class="absolute top-0 left-32 w-4 h-[600px] bg-white/60"></div>

            <div class="w-12 h-1.5 bg-gray-300 rounded-full mx-auto mt-4 relative z-10 opacity-50"></div>

            <div class="absolute top-[25%] right-[15%] z-20">
                <div class="bg-brand text-white px-4 py-2 rounded-2xl shadow-xl flex flex-col items-center">
                    <i class="fas fa-truck text-[10px] mb-0.5"></i>
                    <span class="text-[9px] font-bold">10 min walk</span>
                    <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-brand rotate-45"></div>
                </div>
            </div>

            <div class="absolute top-[30%] left-[20%] flex flex-col items-center">
                <div class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center mb-1">
                    <i class="fas fa-walking text-gray-400 text-[10px]"></i>
                </div>
                <div class="w-5 h-5 bg-pink-500/20 rounded-full flex items-center justify-center">
                    <div class="w-1.5 h-1.5 bg-pink-400 rounded-full"></div>
                </div>
            </div>

            <div class="absolute top-[50%] left-[50%]">
                <div class="w-10 h-10 bg-white rounded-full shadow-md flex items-center justify-center">
                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                </div>
            </div>

            <div class="absolute bottom-[30%] left-[25%] flex flex-col items-center">
                <div class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center mb-1">
                    <i class="fas fa-box text-gray-400 text-[10px]"></i>
                </div>
                <div class="w-5 h-5 bg-pink-500/20 rounded-full flex items-center justify-center">
                    <div class="w-1.5 h-1.5 bg-pink-400 rounded-full"></div>
                </div>
            </div>

            <div class="absolute bottom-[40%] right-[20%] flex flex-col items-center">
                <div class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center mb-1">
                    <i class="fas fa-clipboard-check text-gray-400 text-[10px]"></i>
                </div>
                <div class="w-5 h-5 bg-pink-500/20 rounded-full flex items-center justify-center">
                    <div class="w-1.5 h-1.5 bg-pink-400 rounded-full"></div>
                </div>
            </div>
        </div>

        <nav class="bottom-nav">
            <div class="absolute bottom-0 left-0 right-0 bg-white h-20 flex justify-around items-center px-2 rounded-t-3xl overflow-hidden shadow-[0_-15px_50px_rgba(0,0,0,0.2)] border-t border-gray-100">
                <a href="pelacakan_kirim_kurirLM.php" class="nav-item hover:text-[#FF5C35] transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="nav-text">Beranda</span>
                </a>
                <a href="cari_kurirLM.php" class="nav-item active">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="nav-text">Cari</span>
                </a>
                <a href="tambah_kurirLM.php" class="nav-item hover:text-[#FF5C35] transition-all duration-200">
                    <div class="bg-gray-100 p-1.5 rounded-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <span class="nav-text">Tambah</span>
                </a>
                <a href="manager_kurirLM.php" class="nav-item hover:text-[#FF5C35] transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="nav-text">Pesan</span>
                </a>
                <a href="profil_kurirLM.php" class="nav-item hover:text-[#FF5C35] transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="nav-text">Profil</span>
                </a>
        </nav>
    </div>

</body>

</html>