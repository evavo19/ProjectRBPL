<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Penjual</title>
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

        #image-preview-container {
            display: none;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 12px;
            overflow: hidden;
        }
        
        #image-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="app-container">

        <div class="bg-orange-600 text-white px-6 pt-4 pb-2">

            <div class="flex items-center py-4 gap-3">
                <button onclick="window.history.back()" class="active:opacity-70 transition">
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                </button>
                <h1 class="text-lg font-semibold">Tambah Produk</h1>
            </div>
        </div>

        <div class="scrollable-content">
            <form action="simpan_data_penjualan.php" method="POST" enctype="multipart/form-data" class="p-4 space-y-4">

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <label class="text-xs font-bold text-gray-800 uppercase block mb-3">Foto Produk</label>
                    <div onclick="document.getElementById('fileInput').click()" 
                         class="relative border-2 border-dashed border-gray-200 rounded-xl h-40 flex flex-col items-center justify-center bg-gray-50 active:bg-gray-100 cursor-pointer transition overflow-hidden">
                        
                        <div id="placeholder-content" class="flex flex-col items-center">
                            <i data-lucide="camera" class="w-8 h-8 text-orange-500 mb-2"></i>
                            <span class="text-[10px] text-gray-500">Tambah Foto/Video</span>
                        </div>

                        <div id="image-preview-container">
                            <img id="image-preview" src="" alt="Preview">
                            <div class="absolute bottom-2 right-2 bg-black/50 text-white p-1 rounded-full">
                                <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                            </div>
                        </div>

                        <input type="file" name="product_image" class="hidden" id="fileInput" accept="image/*" onchange="previewImage(event)">
                    </div>
                </div>

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

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <i data-lucide="truck" class="w-4 h-4 text-gray-400"></i>
                        <span class="text-sm text-gray-700">Ongkos Kirim</span>
                    </div>
                    <span class="text-xs text-gray-400 italic">Atur Berat & Dimensi ></span>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-orange-600 text-white font-bold py-3 rounded-full shadow-lg active:scale-95 transition-all">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>

        <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[389px] h-20 bg-white border-t rounded-t-[25px] rounded-b-[25px] shadow-[0px_-2px_10px_rgba(0,0,0,0.05)] flex justify-around items-center px-5 pb-4 z-50">
            <a href="index_penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="layout-grid" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Dashboard</span>
            </a>
            <a href="pesanan.php" class="flex flex-col items-center gap-1 cursor-pointer group">
                <i data-lucide="shopping-bag" class="w-6 h-6 text-gray-400 group-hover:text-orange-600 transition"></i>
                <span class="text-[9px] text-gray-400 group-hover:text-orange-600 transition">Produk</span>
            </a>
            <a href="tambah_produk.php" class="relative -top-4 bg-white p-3 rounded-full shadow-lg cursor-pointer scale-110 transition">
                <div class="bg-orange-600 w-12 h-12 rounded-full flex items-center justify-center text-white">
                    <i data-lucide="plus" class="w-6 h-6"></i>
                </div>
            </a>
            <a href="notifikasi_penjual.php" class="flex flex-col items-center gap-1 cursor-pointer group">
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

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');
            const placeholder = document.getElementById('placeholder-content');

            reader.onload = function() {
                if (reader.readyState === 2) {
                    previewImage.src = reader.result;
                    previewContainer.style.display = 'block';
                    placeholder.style.display = 'none';
                }
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        window.onload = function() {
            initLucide();

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