<?php

$host = 'localhost';
$db   = 'rbpl';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id     = isset($_POST['id'])     ? (int)$_POST['id']          : 0;
$status = isset($_POST['status']) ? trim($_POST['status'])      : '';

$allowed = ['DITINJAU', 'DIPROSES', 'SELESAI'];

if ($id > 0 && in_array($status, $allowed)) {
    $stmt = $conn->prepare("UPDATE manager_kurir_lastmile SET status = ? WHERE id = ?");
    $stmt->bind_param('si', $status, $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: detail_manager.php?id=$id");
exit();
?>