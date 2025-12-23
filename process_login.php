<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db   = "latihan1";

// Cek jika form login disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Include file untuk class User dan Database
    include_once("classes/user.php");

    // Membuat objek User dan memanggil fungsi login
    $user = new User($username, $password);

    // Cek apakah login berhasil
    if ($user->login()) {
        // Jika login berhasil, set session dan redirect ke dashboard
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user->getUserId(); // Dapatkan user_id dari objek User
        header("Location: index.php?page=dashboard"); // Redirect ke dashboard
        exit;
    } else {
        // Jika login gagal, set pesan error di session dan redirect kembali ke login
        $_SESSION['error_message'] = "Username atau password salah.";
        header("Location: index.php?page=login"); // Kembali ke halaman login jika gagal
        exit;
    }
}
?>
