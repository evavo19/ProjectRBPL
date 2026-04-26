<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start'])) {
    header("Location: status_pengiriman.php");
    exit();
}

$driverData = [
    'nama' => 'Malikha Aprilia',
    'peran' => 'DRIVER MIDDLE MILE',
    'id_driver' => 'DMM-10293',
    'tugas_aktif' => [
        'judul' => 'Transportasi Antar-Hub',
        'deskripsi' => 'Cek rute, manifest muatan, dan jadwal keberangkatan.',
        'banner_1' => 'https://img.freepik.com/free-photo/delivery-man-checking-inventory-warehouse_23-2148923054.jpg?t=st=1712852000~exp=1712855600~hmac=a1b2c3d4',
        'banner_2' => 'https://img.freepik.com/free-photo/warehouse-interior-with-shelves-rack_23-2148923061.jpg?t=st=1712852100~exp=1712855700~hmac=e5f6g7h8'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Driver - Middle Mile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
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
            background-color: #f3f4f6;
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

        .font-roboto {
            font-family: 'Roboto', sans-serif;
        }

        .app-container {
            width: 390px;
            height: 844px;
            max-height: 100vh;
            background-color: #FFFFFF;
            border-radius: 25px;
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
    </style>
</head>

<body>

    <div class="app-container">

        <div class="sticky-header-content pt-0 px-0">
            <div class="px-6 py-4 flex items-center gap-4 border-b border-gray-50 mt-8">
                <div class="w-12 h-12 bg-brand rounded-full flex items-center justify-center text-white shadow-md">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm12 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zM18 9l2.5 3H17V9h1z" />
                    </svg>
                </div>
                <h1 class="text-xl font-bold font-montserrat tracking-tight text-gray-900"><?php echo $driverData['peran']; ?></h1>
            </div>
        </div>

        <div class="sticky-header-content pt-0 px-0 px-4 pt-4 pb-32">

            <div class="space-y-3 mb-6">
                <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <img src="assets/driverindex.png" class="w-full h-40 object-cover" alt="Driver">
                </div>
                <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <img src="assets/driverindex2.png" class="w-full h-40 object-cover" alt="Warehouse">
                </div>
            </div>

            <div class="text-center px-4 mb-8">
                <h2 class="text-2xl font-bold font-poppins text-gray-900 mb-4">
                    <?php echo $driverData['tugas_aktif']['judul']; ?>
                </h2>
                <p class="text-gray-500 font-roboto leading-relaxed text-sm max-w-[280px] mx-auto">
                    <?php echo $driverData['tugas_aktif']['deskripsi']; ?>
                </p>
            </div>

            <form method="POST">
                <button name="start" type="submit" class="w-full py-4 bg-brand text-white rounded-full font-bold font-montserrat shadow-lg shadow-orange-200 hover:bg-orange-600 active:scale-95 transition-transform">
                    Mulai
                </button>
            </form>
        </div>
    </div>

    </div>

</body>

</html>