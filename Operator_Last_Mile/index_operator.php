<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start'])) {
    header("Location: panduan_paket_operator.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Last Mile</title>
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
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .font-poppins { font-family: 'Poppins', sans-serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }

        .app-container {
            width: 390px;
            height: 725px;
            background-color: white;
            border-radius: 25px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeIn {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
</head>

<body>
    <div class="app-container">
        <div class="flex-1 flex flex-col px-6 pb-10 animate-fadeIn">

            <div class="flex items-center gap-3 mt-10">
                <div class="w-10 h-8 bg-brand rounded flex items-center justify-center text-white shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1m-4 0h1m-5-1v2m14-2v2"></path>
                    </svg>
                </div>
                <h1 class="text-sm font-bold font-montserrat tracking-tight leading-none text-gray-800 uppercase">
                    Operator Last Mile
                </h1>
            </div>

            <div class="flex-1 flex items-center justify-center px-4">
                <div class="relative w-full aspect-square">
                    <div class="absolute inset-0 bg-orange-100 rounded-full blur-3xl opacity-30"></div>
                    <img
                        src="assets/welcome.png"
                        alt="Logistik Last Mile"
                        class="relative z-10 w-full h-full object-cover rounded-3xl border-4 border-white"
                        onerror="this.src='https://placehold.co/400x400/EF4C29/white?text=Last+Mile'">
                </div>
            </div>

            <div class="text-center space-y-3">
                <h2 class="text-2xl font-bold font-poppins text-gray-900 leading-tight">Kelola Pengiriman Akhir</h2>
                <p class="text-gray-500 text-sm leading-relaxed px-2">
                    Pantau kurir, paket, dan status pengiriman hingga ke tangan penerima secara real-time.
                </p>
                <a href="panduan_paket_operator.php"
                    class="block w-full mt-4 py-4 text-center bg-brand text-white font-bold font-montserrat rounded-full hover:opacity-90 active:scale-[0.98] transition-all tracking-wide uppercase">
                    Mulai
                </a>
            </div>

        </div>
    </div>
</body>

</html>