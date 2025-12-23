<?php
// list.php

// include class Barang
include_once __DIR__ . "/../../classes/barang.php";

// ambil data barang (ARRAY of OBJECT Barang)
$barangObj  = new Barang();
$barangList = $barangObj->getBarang();

// base url
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/lab10_php_oop/';

// fungsi badge stok
function getStockBadge($stok) {
    if ($stok >= 10) {
        return 'stock-high';
    } elseif ($stok >= 5) {
        return 'stock-medium';
    } else {
        return 'stock-low';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="main-container">
    <div class="card">

        <div class="card-header">
            <h1><i class="fas fa-boxes"></i> Data Barang</h1>
            <a href="../lab10_php_oop/index.php?page=user/add" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Barang Baru
            </a>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php if (!empty($barangList)) : ?>
                    <?php foreach ($barangList as $row) : ?>

                        <?php
                        $gambar = $row->gambar;
                        $path_gambar = $_SERVER['DOCUMENT_ROOT'] . '/lab10_php_oop/assets/gambar/' . $gambar;
                        $gambar_ada = ($gambar && file_exists($path_gambar));
                        ?>

                        <tr>
                            <td>
                                <?php if ($gambar_ada) : ?>
                                    <img src="<?= $base_url . 'assets/gambar/' . $row->gambar ?>"
                                         width="60" height="60">
                                <?php else : ?>
                                    <i class="fas fa-image"></i>
                                <?php endif; ?>
                            </td>

                            <td><?= htmlspecialchars($row->nama); ?></td>
                            <td><?= $row->kategori; ?></td>
                            <td><?= number_format($row->harga_beli, 0, ',', '.'); ?></td>
                            <td><?= number_format($row->harga_jual, 0, ',', '.'); ?></td>

                            <td>
                                <span class="stock-badge <?= getStockBadge($row->stok); ?>">
                                    <?= $row->stok; ?>
                                </span>
                            </td>

                            <td>
                                <a href="../lab10_php_oop/index.php?page=user/edit&id=<?= $row->id_barang; ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="../lab10_php_oop/index.php?page=user/delete&id=<?= $row->id_barang; ?>"
                                   onclick="return confirm('Yakin hapus?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" style="text-align:center;">
                            Belum ada data barang
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>
    <script>
        // Function untuk handle error gambar
        function handleImageError(img) {
            console.log('Gambar gagal dimuat:', img.src);
            const container = img.parentElement;
            container.innerHTML = '<div class="image-placeholder"><i class="fas fa-image"></i></div>';
        }
        
        // Script untuk debugging gambar
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.table-product-img');
            
            // Debug: Tampilkan info gambar di console
            console.log('Total gambar:', images.length);
            images.forEach((img, index) => {
                console.log(`Gambar ${index + 1}:`, img.src);
                
                // Tambahkan event listener untuk error
                img.addEventListener('error', function() {
                    handleImageError(this);
                });
            });
            
            // Tambahkan juga untuk gambar yang sudah ada
            const allImages = document.querySelectorAll('img');
            allImages.forEach(img => {
                if (!img.onerror) {
                    img.addEventListener('error', function() {
                        if (this.classList.contains('table-product-img')) {
                            handleImageError(this);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
