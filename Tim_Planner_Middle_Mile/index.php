<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tim Planner</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 flex justify-center items-center min-h-screen">

  <!-- MOBILE FRAME -->
  <div class="w-[390px] h-[725px] bg-white rounded-[25px] shadow-2xl 
              overflow-hidden flex flex-col px-6 py-10">

    <!-- HEADER -->
    <div class="flex items-center gap-3">

      <!-- Icon -->
      <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center">
        <span class="text-white text-2xl">📅</span>
      </div>

      <!-- Title -->
      <h1 class="font-bold text-lg text-gray-900 tracking-wide">
        TIM PLANNER MIDDLE MILE
      </h1>
    </div>


    <!-- IMAGE SECTION -->
    <div class="flex justify-center items-center flex-1">
      
      <!-- Nanti kamu ganti pakai gambar -->
      <p class="text-gray-400 italic"><img src="../assets/timplanner-index.png" class="w-full object-contain"></p>
    </div>


    <!-- TEXT dan BUTTON -->
    <div class="text-center">

      <h2 class="text-2xl font-bold text-gray-900 mb-4">
        Kelola Jadwal & Armada
      </h2>

      <p class="text-gray-600 text-sm leading-relaxed px-4 mb-8">
        Atur penugasan driver serta validasi perpindahan barang antar gudang
      </p>

      <!-- BUTTON -->
      <a href="dashboard.php"
         class="block w-full bg-orange-500 hover:bg-orange-600 
                text-white font-semibold py-4 rounded-full shadow-lg transition">
        Mulai
      </a>

    </div>

  </div>

</body>
</html>