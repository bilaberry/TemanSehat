<?php
require_once("../../../includes/koneksi.php");

// Ambil data POST
$id = $_POST['id'];
$nama_kategori = $_POST['nama_kategori'];
$deskripsi = $_POST['deskripsi'];
$tgl_input = $_POST['tgl_input'];

$sql = "UPDATE kategori
 SET 
            nama_kategori = '$nama_kategori', 
            deskripsi = '$deskripsi', 
            tgl_input = '$tgl_input'
        WHERE id_kategori = '$id'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil diperbarui!";
    header("Location: ../../kategori.php?pesan_update=success");
} else {
    echo "Error: " . $koneksi->error;
    header("Location: ../../kategori.php?pesan_update=error");
}

$koneksi->close();
?>
