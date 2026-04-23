<?php
session_start();
include '../config/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM profil_penjual WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    if ($password == $data['password']) {

        $_SESSION['penjual_id'] = $data['id'];

        header("Location: index_penjual.php");
        exit();

    } else {
        echo "<script>alert('Password salah!'); window.history.back();</script>";
    }
} else {
    echo "<script>
        alert('Akun belum terdaftar, silakan daftar dulu!');
        window.location='daftar_penjual.php';
    </script>";
}
?>