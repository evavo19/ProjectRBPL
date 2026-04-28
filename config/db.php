<?php
$host = "sql203.infinityfree.com";
$user = "if0_41736846";
$password = "tugasRBPL2026";
$database = "if0_41736846_db_rbpl";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
