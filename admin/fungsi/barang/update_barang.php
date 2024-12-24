<?php
require_once("../../../includes/koneksi.php");

// Ambil data POST
$id = $_POST['id'];
$nama_barang = $_POST['nama_barang'];
$id_kategori = $_POST['id_kategori'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

$sql = "UPDATE barang
 SET 
            nama_barang = '$nama_barang', 
            id_kategori = '$id_kategori', 
            harga_beli = '$harga_beli', 
            harga_jual = '$harga_jual', 
            stok = '$stok' 
        WHERE id = '$id'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil diperbarui!";
    header("Location: ../../manajemenproduk.php?pesan_update=success");
} else {
    echo "Error: " . $koneksi->error;
    header("Location: ../../manajemenproduk.php?pesan_update=error");
}

$koneksi->close();
?>
