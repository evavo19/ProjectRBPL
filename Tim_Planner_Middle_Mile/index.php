<?php

/**
 * BACKEND LOGIC (JAVA-STYLE PHP IMPLEMENTATION)
 * Merepresentasikan struktur Service dan Model jika menggunakan Java Spring Boot.
 */

class Armada
{
  public $id;
  public $plat;
  public $driver;
  public $status;
  public $tujuan;
  public $lastUpdate;

  public function __construct($id, $plat, $driver, $status, $tujuan, $lastUpdate)
  {
    $this->id = $id;
    $this->plat = $plat;
    $this->driver = $driver;
    $this->status = $status;
    $this->tujuan = $tujuan;
    $this->lastUpdate = $lastUpdate;
  }
}

class ArmadaService
{
  public function findAll()
  {
    // Simulasi Database Fetch
    return [
      new Armada(1, "B 1234 GHO", "Ahmad Subarjo", "Tersedia", "Gudang A", "2m ago"),
      new Armada(2, "D 9982 ZZA", "Budi Cahyono", "Perjalanan", "Gudang C", "15m ago"),
      new Armada(3, "L 4412 KL", "Siti Aminah", "Validasi", "Gudang B", "Now"),
      new Armada(4, "B 5521 PQA", "Rahmat Hidayat", "Tersedia", "Gudang A", "1h ago")
    ];
  }
}

// Controller Logic
$armadaService = new ArmadaService();
$view = $_GET['view'] ?? 'onboarding';

/**
 * Logika Perpindahan Halaman
 * Di lingkungan nyata, header Location akan diarahkan ke 'dashboard.php'
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start'])) {
  // Pada implementasi asli Anda gunakan: header("Location: dashboard.php");
  header("Location: dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Planner Middle Mile</title>
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

    .font-poppins {
      font-family: 'Poppins', sans-serif;
    }

    .font-montserrat {
      font-family: 'Montserrat', sans-serif;
    }

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
  </style>
</head>

<body>

  <div class="app-container">

    <!-- STATUS BAR -->
    <div class="flex justify-between items-center px-8 pt-6 pb-2 bg-white sticky top-0 z-50">
      <span class="text-xs font-semibold"><?php echo date('H:i'); ?></span>
      <div class="flex items-center gap-1.5">
        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
        </svg>
        <div class="w-5 h-2.5 border border-black rounded-[2px] p-[1px] flex justify-start items-center">
          <div class="bg-black h-full w-[70%] rounded-[1px]"></div>
        </div>
      </div>
    </div>

    <?php if ($view === 'onboarding'): ?>
      <!-- HALAMAN: ONBOARDING (Bisa dipindah ke index.php Anda) -->
      <div class="flex-1 flex flex-col px-6 pb-10 animate-fadeIn">
        <div class="flex items-center gap-3 mt-4">
          <div class="w-10 h-8 bg-brand rounded flex items-center justify-center text-white shadow-md">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1m-4 0h1m-5-1v2m14-2v2"></path>
            </svg>
          </div>
          <h1 class="text-sm font-bold font-montserrat tracking-tight leading-none text-gray-800 uppercase">
            Tim Planner Middle Mile<br>
          </h1>
        </div>

        <!-- Gambar Ilustrasi Fleet Management -->
        <div class="flex-1 flex items-center justify-center px-4">
          <div class="relative w-full aspect-square">
            <div class="absolute inset-0 bg-orange-100 rounded-full blur-3xl opacity-30"></div>
            <img
              src="assets/timplanner-index.png"
              alt="Manajemen Logistik"
              class="relative z-10 w-full h-full object-cover rounded-3xl shadow-xl shadow-orange-100/50 border-4 border-white"
              onerror="this.src='https://placehold.co/400x400/EF4C29/white?text=Fleet+Management'">
          </div>
        </div>

        <div class="text-center space-y-3">
          <h2 class="text-2xl font-bold font-poppins text-gray-900 leading-tight">Kelola Jadwal & Armada</h2>
          <p class="text-gray-500 text-sm leading-relaxed px-2">
            Atur penugasan driver serta validasi perpindahan barang antar gudang secara real-time.
          </p>
          <form method="POST">
            <button name="start" type="submit" class="w-full mt-4 py-4 bg-brand text-white font-bold font-montserrat rounded-2xl shadow-lg shadow-orange-200 hover:opacity-90 active:scale-[0.98] transition-all tracking-wide uppercase">
              Mulai Sekarang
            </button>
          </form>

        </div>
      </div>

    <?php elseif ($view === 'dashboard'): ?>
    <?php endif; ?>

  </div>

</body>

</html>