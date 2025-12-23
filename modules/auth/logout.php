<?php
session_start(); // Mulai session

// Hapus semua session
session_unset();
session_destroy();

// Redirect to login page
header("Location: index.php?page=auth/login");
exit();
?>