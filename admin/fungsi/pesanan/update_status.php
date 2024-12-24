<?php
require_once("../../../includes/koneksi.php");

// Ambil data POST
$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE nota
 SET 
            status = '$status' 
        WHERE id_nota = '$id'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil diperbarui!";
    header("Location: ../../manajemenpesanan.php?pesan_update=success");
} else {
    echo "Error: " . $koneksi->error;
    header("Location: ../../manajemenpesanan.php?pesan_update=error");
}

$koneksi->close();
?>
