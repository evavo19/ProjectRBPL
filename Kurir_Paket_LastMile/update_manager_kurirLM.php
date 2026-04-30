<?php

$host = "sql203.infinityfree.com";
$user = "if0_41736846";
$password = "tugasRBPL2026";
$database = "if0_41736846_db_rbpl";


$conn = new mysqli($host, $user, $password, $database);
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

header("Location: detail_manager_kurirLM.php?id=$id");
exit();
?>