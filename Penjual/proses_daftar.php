<?php
include '../config/db.php';

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$password = $_POST['password']; // TANPA HASH
$tahun    = $_POST['tahun'];
$alamat   = $_POST['alamat'];

// cek email sudah ada atau belum
$cek = mysqli_query($conn, "SELECT * FROM profil_penjual WHERE email='$email'");

if(mysqli_num_rows($cek) > 0){
    echo "Email sudah terdaftar!";
} else {

    $query = "INSERT INTO profil_penjual (nama, email, password, mulai_jual, alamat)
              VALUES ('$nama','$email','$password','$tahun','$alamat')";

    if(mysqli_query($conn, $query)){
        header("Location: login_penjual.php");
        exit();
    } else {
        echo "Gagal daftar! " . mysqli_error($conn);
    }
}
?>