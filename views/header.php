<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventaris Barang</title>
    
    <!-- Include CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="header-wrapper">
        <div class="header-container">
            <!-- Top Bar -->
            <div class="header-top">
                <!-- Brand & Logo -->
                <div class="brand">
                    <div class="logo">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="brand-text">
                        <h1>Sistem Inventaris Barang</h1>
                        <p>Manajemen Stok & Inventaris Terintegrasi</p>
                    </div>
                </div>
                
                <!-- User Info -->
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="user-details">
                        <span class="user-name"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?></span>
                        <span class="user-role"><?php echo isset($_SESSION['role']) ? htmlspecialchars($_SESSION['role']) : 'Administrator'; ?></span>
                    </div>
                    <a href="index.php?page=auth/logout" class="logout-btn" onclick="return confirm('Yakin ingin logout?')">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
            
            <!-- Current Page Indicator -->
            <div class="current-page">
                <i class="fas fa-map-marker-alt"></i>
                <span>Anda berada di: 
                    <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
                    $page_names = [
                        'dashboard' => 'Dashboard',
                        'user/list' => 'Data Barang',
                        'user/add' => 'Tambah Barang',
                        'user/edit' => 'Edit Barang',
                        'auth/login' => 'Login',
                        'auth/logout' => 'Logout'
                    ];
                    echo isset($page_names[$page]) ? $page_names[$page] : 'Dashboard';
                    ?>
                </span>
            </div>
            
            <!-- Navigation -->
            <nav class="main-nav">
                <?php
                // Tentukan halaman aktif
                $current_page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
                ?>
                <a href="index.php?page=dashboard" class="nav-link <?php echo $current_page == 'dashboard' ? 'active' : ''; ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="index.php?page=user/list" class="nav-link <?php echo $current_page == 'user/list' ? 'active' : ''; ?>">
                    <i class="fas fa-list"></i>
                    <span>Data Barang</span>
                </a>
                <a href="index.php?page=user/add" class="nav-link <?php echo $current_page == 'user/add' ? 'active' : ''; ?>">
                    <i class="fas fa-plus-circle"></i>
                    <span>Tambah Barang</span>
                </a>
        </div>
    </div>