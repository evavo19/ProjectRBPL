<?php

/**
 * BACKEND LOGIC (PHP)
 * Simulasi data user yang diambil dari database.
 */
$userData = [
    'nama' => 'Fadhil Ramadhan',
    'email' => 'fadhilrama@gmail.com',
    'jabatan' => 'Driver',
    'alamat' => 'Bantul, DIY',
    'foto' => 'https://placehold.co/130x130/EF4C29/white?text=FR'
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Planner Middle Mile</title>
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
            /* biar ga scroll body */
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            /* ⬅️ ini penting biar center vertical */
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
            position: relative;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.4s ease-out forwards;
        }

        .profile-header-bg {
            background: linear-gradient(180deg, #EF4C29 0%, #f87171 100%);
            height: 280px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 0 0 40px 40px;
            z-index: 10;
        }
    </style>
</head>

<body>

    <div class="app-container">

        <!-- HEADER BACKGROUND -->
        <div class="profile-header-bg"></div>

        <div class="sticky-header-content pt-0 px-0">


            <!-- STATUS BAR -->
            <div class="flex justify-between items-center px-8 pt-6 pb-2 relative z-50 text-white">
                <span class="text-xs font-semibold"><?php echo date('H:i'); ?></span>
                <div class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                    </svg>
                    <div class="w-5 h-2.5 border border-white rounded-[2px] p-[1px] flex justify-start items-center">
                        <div class="bg-white h-full w-[70%] rounded-[1px]"></div>
                    </div>
                </div>
            </div>

            <!-- MAIN SCROLLABLE CONTENT -->
            <div class="flex-1 overflow-y-auto no-scrollbar relative z-10 px-6 mt-6 animate-fadeIn pb-28"> <!-- PROFILE INFO -->
                <div class="flex flex-col items-center">
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
                    <p class="text-orange-50 text-xs font-medium opacity-90 tracking-widest uppercase">ID: Driver-202011</p>
                </div>

                <!-- INFORMATION LIST -->
                <div class="mt-8 space-y-4 pb-10">

                    <!-- EMAIL -->
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold font-poppins text-gray-400 ml-1 uppercase tracking-wider">Email Address</label>
                        <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-sm flex items-center gap-3">
                            <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium text-sm"><?php echo $userData['email']; ?></span>
                        </div>
                    </div>

                    <!-- JABATAN -->
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold font-poppins text-gray-400 ml-1 uppercase tracking-wider">Position</label>
                        <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-sm flex items-center gap-3">
                            <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium text-sm"><?php echo $userData['jabatan']; ?></span>
                        </div>
                    </div>

                    <!-- ALAMAT -->
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold font-poppins text-gray-400 ml-1 uppercase tracking-wider">Alamat</label>
                        <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-sm flex items-center gap-3">
                            <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium text-sm"><?php echo $userData['alamat']; ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- BOTTOM TAB NAVIGATION -->
        <div class="absolute bottom-0 left-0 right-0 bg-white h-20 shadow-[0_-10px_30px_rgba(0,0,0,0.03)] flex justify-around items-center px-10 rounded-t-[35px] border-t border-gray-50 z-50">
            <!-- Tombol Home (Abu-abu) -->
            <a href="status_pengiriman.php" class="text-gray-400 hover:text-brand transition-colors p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>
            <!-- Tombol List AKTIF (Warna Oranye) -->
            <a href="pengiriman.php" class="text-gray-400 hover:text-brand transition-colors p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </a>
            <!-- Tombol Profile (Abu-abu) -->
            <button class="text-brand transition-all scale-110 p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </button>
        </div>
    </div>

</body>

</html>