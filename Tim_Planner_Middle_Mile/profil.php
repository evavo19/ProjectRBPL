<?php

$userData = [
    'nama' => 'Malikha Aprilia',
    'email' => 'apriliamalik@gmail.com',
    'jabatan' => 'Tim Planner',
    'mulai_kerja' => '2020',
    'alamat' => 'Bantul, DIY',
    'foto' => 'https://placehold.co/130x130/EF4C29/white?text=MA'
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
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
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
            height: 250px;
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
        <div class="profile-header-bg"></div>

        <div class="sticky-header-content pt-0 px-0">

            <div class="flex-1 overflow-y-auto no-scrollbar relative z-10 px-6 mt-6 animate-fadeIn">

                <div class="flex items-center mb-4">
                    <a href="dashboard.php" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center text-white">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                </div>

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
                    <p class="text-orange-50 text-xs font-medium opacity-90 tracking-widest uppercase">ID: MM-202409</p>
                </div>

                <div class="mt-16 space-y-4 pb-10">
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

                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold font-poppins text-gray-400 ml-1 uppercase tracking-wider">Mulai Kerja</label>
                        <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-sm flex items-center gap-3">
                            <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium text-sm"><?php echo $userData['mulai_kerja']; ?></span>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold font-poppins text-gray-400 ml-1 uppercase tracking-wider">Alamat</label>
                        <div class="w-full bg-white border border-gray-100 p-4 rounded-2xl shadow-sm flex items-center gap-3">
                            <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center text-brand">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium text-sm"><?php echo $userData['alamat']; ?></span>
                        </div>
                    </div>


                </div>
            </div>

        </div>

</body>

</html>