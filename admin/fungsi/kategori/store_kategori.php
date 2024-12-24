<?php
require_once("../../../includes/koneksi.php");

// Ambil data POST
$nama_kategori = $_POST['nama_kategori'];
$deskripsi = $_POST['deskripsi'];
$tgl_input = $_POST['tgl_input'];

$sql = "INSERT INTO kategori ( nama_kategori, deskripsi, tgl_input ) values ( '$nama_kategori', '$deskripsi', '$tgl_input' )";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan!";
    header("Location: ../../kategori.php?pesan_store=success");
} else {
    echo "Error: " . $koneksi->error;
    header("Location: ../../kategori.php?pesan_store=error");
}

$koneksi->close();
?>
