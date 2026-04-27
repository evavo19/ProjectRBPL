<?php
$userData = [
    'nama' => 'Muhammad Baguss',
    'email' => 'mbagus19@gmail.com',
    'jabatan' => 'Kurir Last Mile',
    'mulai_kerja' => '2024',
    'foto' => 'https://placehold.co/130x130/EF4C29/white?text=MBG'
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Kurir Last Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
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
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .app-container {
            width: 390px;
            height: 100vh;
            background-color: white;
            border-radius: 30px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .header-section {
            background: linear-gradient(180deg, #EF4C29 0%, #f87171 100%);
            border-radius: 0 0 40px 40px;
            flex-shrink: 0;
            padding: 32px 24px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .scroll-section {
            flex: 1;
            overflow-y: auto;
            padding: 20px 24px 24px;
            background-color: white;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scroll-section::-webkit-scrollbar {
            display: none;
        }

        .nav-section {
            flex-shrink: 0;
            height: 80px;
            background: white;
            border-top: 1px solid #f3f4f6;
            box-shadow: 0 -8px 25px rgba(0, 0, 0, 0.08);
            border-radius: 30px 30px 0 0;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 0 8px;
        }
    </style>
</head>

<body>

    <div class="app-container">

        <div class="header-section">
            <div class="relative">
                <div class="w-32 h-32 rounded-full border-4 border-white shadow-xl overflow-hidden bg-gray-100">
                    <img src="<?php echo $userData['foto']; ?>" alt="Profile Photo" class="w-full h-full object-cover">
                </div>
                <div class="absolute bottom-1 right-1 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md text-brand border border-gray-100">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                </div>
            </div>
            <h2 class="mt-4 text-xl font-bold font-montserrat text-white"><?php echo $userData['nama']; ?></h2>
            <p class="text-orange-50 text-xs font-medium opacity-90 tracking-widest uppercase mt-1">ID: Kurir-202419</p>
        </div>

        <div class="scroll-section">
            <div class="space-y-4">

                <div class="space-y-1.5">
                    <label class="text-[10px] font-bold font-poppins text-gray-400 ml-1 uppercase tracking-wider">Email Address</label>
                    <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-[0_4px_15px_rgba(0,0,0,0.08)] flex items-center gap-3">
                        <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium text-sm"><?php echo $userData['email']; ?></span>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-[10px] font-bold font-poppins text-gray-400 ml-1 uppercase tracking-wider">Position</label>
                    <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-[0_4px_15px_rgba(0,0,0,0.08)] flex items-center gap-3">
                        <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium text-sm"><?php echo $userData['jabatan']; ?></span>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-[10px] font-bold font-poppins text-gray-400 ml-1 uppercase tracking-wider">Mulai Kerja</label>
                    <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-[0_4px_15px_rgba(0,0,0,0.08)] flex items-center gap-3">
                        <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium text-sm"><?php echo $userData['mulai_kerja']; ?></span>
                    </div>
                </div>

            </div>
        </div>

        <div class="nav-section">
            <a href="pelacakan_kirim_kurirLM.php" class="flex flex-col items-center justify-center w-16 group">
                <svg class="w-6 h-6 text-gray-400 group-hover:text-brand transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-[10px] font-bold font-montserrat text-gray-400 mt-1 group-hover:text-brand transition-colors">Beranda</span>
            </a>

            <a href="cari_kurirLM.php" class="flex flex-col items-center justify-center w-16 group">
                <svg class="w-6 h-6 text-gray-400 group-hover:text-brand transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span class="text-[10px] font-bold font-montserrat text-gray-400 mt-1 group-hover:text-brand transition-colors">Cari</span>
            </a>

            <a href="tambah_kurirLM.php" class="flex flex-col items-center justify-center w-16 group">
                <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-400 group-hover:text-brand transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="text-[10px] font-bold font-montserrat text-gray-400 mt-1 group-hover:text-brand transition-colors">Tambah</span>
            </a>

            <a href="manager_kurirLM.php" class="flex flex-col items-center justify-center w-16 group">
                <svg class="w-6 h-6 text-gray-400 group-hover:text-brand transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span class="text-[10px] font-bold font-montserrat text-gray-400 mt-1 group-hover:text-brand transition-colors">Pesan</span>
            </a>

            <a href="profil_kurirLM.php" class="flex flex-col items-center justify-center w-16 group">
                <svg class="w-6 h-6 text-brand" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-[10px] font-bold font-montserrat text-brand mt-1">Profil</span>
            </a>
        </div>

    </div>

</body>

</html>