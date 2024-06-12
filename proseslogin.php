<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$name = "baturaden";

$conn = mysqli_connect('localhost','root','','baturaden') or die("Koneksi ke database gagal!");
mysqli_select_db($conn, $name) or die("Tidak ada database yang dipilih!");

$username = stripslashes($_POST['username']);
$password = md5($_POST['password']);

// Check "admin" table
$admin_query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
$admin_result = mysqli_query($conn, $admin_query);
$admin_data = mysqli_fetch_assoc($admin_result);
$admin_count = mysqli_num_rows($admin_result);

if ($admin_count > 0) {
    $_SESSION['role'] = 'admin';
    $_SESSION['username'] = $admin_data['username'];
    $_SESSION['id'] = $admin_data['id'];
    header('location:admin/pengguna.php');
} else {
    $msg = 'Username atau Password Salah';
    header('location:index.php?msg=' . $msg);
}
