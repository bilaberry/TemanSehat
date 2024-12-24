<?php
require_once("../../../includes/koneksi.php");

// Ambil data POST
$nama_barang = $_POST['nama_barang'];
$id_kategori = $_POST['id_kategori'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

$sql = "INSERT INTO barang ( nama_barang, id_kategori, harga_beli, harga_jual, stok ) values ( '$nama_barang', '$id_kategori', '$harga_beli', '$harga_jual', '$stok' )";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan!";
    header("Location: ../../manajemenproduk.php?pesan_store=success");
} else {
    echo "Error: " . $koneksi->error;
    header("Location: ../../manajemenproduk.php?pesan_store=error");
}

$koneksi->close();
?>
