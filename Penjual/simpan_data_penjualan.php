<?php

$path_db = '';
if (file_exists('config/db.php')) {
    $path_db = 'config/db.php'; 
} elseif (file_exists('../config/db.php')) {
    $path_db = '../config/db.php'; 
} else {
    $dir = getcwd();
    die("Error: File 'db.php' tidak ditemukan. <br> Posisi file skrip ini: <b>$dir</b>");
}

include $path_db;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($conn)) {
        die("Error: Variabel koneksi database (\$conn) tidak ditemukan di dalam $path_db.");
    }

    $name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
    $desc = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
    $cat  = mysqli_real_escape_string($conn, $_POST['category'] ?? '');
    $prc  = $_POST['price'] ?? 0;
    $qty  = $_POST['quantity'] ?? 0;

    $image_name = "";
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $folder = "uploads/";
        
        if (!file_exists($folder)) { 
            mkdir($folder, 0777, true); 
        }
        
        $ext = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
        $image_name = time() . "_" . uniqid() . "." . $ext;
        
        if (!move_uploaded_file($_FILES['product_image']['tmp_name'], $folder . $image_name)) {
            die("Gagal mengunggah gambar ke folder uploads.");
        }
    }

    $query = "INSERT INTO tambah_produk_penjual (nama_produk, deskripsi, kategori, harga, stok, gambar) 
              VALUES ('$name', '$desc', '$cat', '$prc', '$qty', '$image_name')";

    try {
        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Produk berhasil ditambahkan ke tabel tambah_produk_penjual!'); 
                    window.location='index_penjual.php';
                  </script>";
        } else {
            echo "Gagal menyimpan: " . mysqli_error($conn);
        }
    } catch (mysqli_sql_exception $e) {
        echo "<div style='color:red; padding:20px; border:1px solid red;'>";
        echo "<h3>Kesalahan Database!</h3>";
        echo "Pesan Error: " . $e->getMessage() . "<br><br>";
        echo "<b>Saran:</b> Pastikan kolom-kolom di tabel <u>tambah_produk_penjual</u> sudah sesuai (nama_produk, deskripsi, kategori, harga, stok, gambar).";
        echo "</div>";
    }
}
?>