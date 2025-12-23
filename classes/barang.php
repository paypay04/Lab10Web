<?php
include_once(__DIR__ . "/database.php");

class Barang {
    public $id_barang;
    public $nama;
    public $kategori;
    public $harga_beli;
    public $harga_jual;
    public $stok;
    public $gambar;

    private $db;

    public function __construct(
        $id_barang = null,
        $nama = null,
        $kategori = null,
        $harga_beli = null,
        $harga_jual = null,
        $stok = null,
        $gambar = null
    ) {
        $this->db = new Database();
        $this->id_barang = $id_barang;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->harga_beli = $harga_beli;
        $this->harga_jual = $harga_jual;
        $this->stok = $stok;
        $this->gambar = $gambar;
    }

    // 🔥 INI YANG PENTING
    public function getBarang() {
        $result = $this->db->get("data_barang");
        $barangList = [];

        while ($row = $result->fetch_assoc()) {
            $barangList[] = new Barang(
                $row['id_barang'],
                $row['nama'],
                $row['kategori'],
                $row['harga_beli'],
                $row['harga_jual'],
                $row['stok'],
                $row['gambar']
            );
        }
        return $barangList; // ARRAY OF OBJECT
    }
}
