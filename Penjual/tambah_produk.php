<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Toko Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e5e7eb;
            display: flex;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .app-container {
            width: 100%;
            max-width: 390px;
            height: 844px;
            background-color: #F8F8F8;
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border-radius: 25px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .scrollable-content {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 100px;
        }

        .scrollable-content::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>

    <div class="app-container">

        <!-- HEADER / STATUS BAR (Diselaraskan dengan Dashboard) -->
        <div class="bg-orange-600 text-white px-6 pt-4 pb-2">
            <div class="flex justify-between items-center px-0 pt-1 text-white">
                <!-- JAM -->
                <span class="text-xs font-semibold font-poppins" id="current-time">00:00</span>
                <!-- ICON STATUS -->
                <div class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                    </svg>
                    <div class="flex items-center">
                        <div class="w-5 h-2.5 border border-white rounded-[2px] p-[1px] flex items-center">
                            <div class="bg-white h-full w-[70%] rounded-[1px]"></div>
                        </div>
                        <div class="w-[2px] h-1 bg-white ml-[1px] rounded-sm"></div>
                    </div>
                </div>
            </div>

            <!-- Title Header -->
            <div class="flex items-center py-4 gap-3">
                <button onclick="window.history.back()" class="active:opacity-70 transition">
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                </button>
                <h1 class="text-lg font-semibold">Tambah Produk</h1>
            </div>
        </div>

        <!-- FORM CONTENT -->
        <div class="scrollable-content">
            <form action="#" method="POST" enctype="multipart/form-data" class="p-4 space-y-4">

                <!-- Upload Gambar -->
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <label class="text-xs font-bold text-gray-800 uppercase block mb-3">Foto Produk</label>
                    <div onclick="document.getElementById('fileInput').click()" class="border-2 border-dashed border-gray-200 rounded-xl p-6 flex flex-col items-center justify-center bg-gray-50 active:bg-gray-100 cursor-pointer transition">
                        <i data-lucide="camera" class="w-8 h-8 text-orange-500 mb-2"></i>
                        <span class="text-[10px] text-gray-500">Tambah Foto/Video</span>
                        <input type="file" name="product_image" class="hidden" id="fileInput">
                    </div>
                </div>

                <!-- Detail Produk -->
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 space-y-4">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-400 uppercase">Nama Produk</label>
                        <input type="text" name="name" placeholder="Masukkan nama produk..."
                            class="w-full text-sm border-b border-gray-100 py-2 outline-none focus:border-orange-500 transition">
                    </div>

                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-400 uppercase">Deskripsi Produk</label>
                        <textarea name="description" rows="3" placeholder="Masukkan deskripsi lengkap..."
                            class="w-full text-sm border-b border-gray-100 py-2 outline-none focus:border-orange-500 resize-none"></textarea>
                    </div>
                </div>

                <!-- Info Penjualan -->
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 space-y-4">
                    <div class="flex justify-between items-center border-b border-gray-50 pb-3">
                        <div class="flex items-center gap-2">
                            <i data-lucide="list" class="w-4 h-4 text-gray-400"></i>
                            <span class="text-sm text-gray-700">Kategori</span>
                        </div>
                        <select name="category" class="text-sm text-orange-600 font-medium bg-transparent outline-none">
                            <option>Pilih Kategori</option>
                            <option>Elektronik</option>
                            <option>Fashion</option>
                            <option>Medis</option>
                            <option>Rumah Tangga</option>
                            <option>Otomotif</option>
                        </select>
                    </div>

                    <div class="flex justify-between items-center border-b border-gray-50 pb-3">
                        <div class="flex items-center gap-2">
                            <i data-lucide="tag" class="w-4 h-4 text-gray-400"></i>
                            <span class="text-sm text-gray-700">Harga</span>
                        </div>
                        <input type="number" name="price" placeholder="Atur Harga" class="text-right text-sm outline-none w-1/2">
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <i data-lucide="box" class="w-4 h-4 text-gray-400"></i>
                            <span class="text-sm text-gray-700">Stok</span>
                        </div>
                        <input type="number" name="quantity" placeholder="Jumlah Produk" class="text-right text-sm outline-none w-1/2">
                    </div>
                </div>

                <!-- Ongkos Kirim -->
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <i data-lucide="truck" class="w-4 h-4 text-gray-400"></i>
                        <span class="text-sm text-gray-700">Ongkos Kirim</span>
                    </div>
                    <span class="text-xs text-gray-400 italic">Atur Berat & Dimensi ></span>
                </div>

                <!-- Button Submit -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-orange-600 text-white font-bold py-3 rounded-full shadow-lg active:scale-95 transition-all">
                        Tampilkan Produk
                    </button>
                </div>
            </form>
        </div>

        <!-- NAVIGASI BAWAH (Diselaraskan dengan Dashboard) -->
        <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[389px] h-20 bg-white border-t rounded-t-[25px] rounded-b-[25px] shadow-[0px_-2px_10px_rgba(0,0,0,0.05)] flex justify-around items-center px-5 pb-4 z-50">
            <a href="index.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="layout-grid" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Dashboard</span>
            </a>

            <a href="pesanan.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="shopping-bag" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Produk</span>
            </a>

            <!-- Center Tab (Active for this page) -->
            <a href="tambah_produk.php" class="relative -top-4 bg-white p-3 rounded-full shadow-lg cursor-pointer scale-110 transition">
                <div class="bg-orange-600 w-12 h-12 rounded-full flex items-center justify-center text-white">
                    <i data-lucide="plus" class="w-6 h-6"></i>
                </div>
            </a>

            <a href="notifikasi.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="bell" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Notifikasi</span>
            </a>

            <a href="penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="user" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Saya</span>
            </a>
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

        window.onload = function() {
            initLucide();

            // Jam Real-time
            function updateClock() {
                const now = new Date();
                const timeStr = String(now.getHours()).padStart(2, '0') + ':' +
                    String(now.getMinutes()).padStart(2, '0');
                const timeEl = document.getElementById('current-time');
                if (timeEl) timeEl.innerText = timeStr;
            }
            setInterval(updateClock, 1000);
            updateClock();
        };
    </script>
</body>

</html>