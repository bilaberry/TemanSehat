<?php
require_once("../../../includes/koneksi.php");

// Ambil data POST
$id = $_POST['id'];
$username = $_POST['editUserName'];
$email = $_POST['editUserEmail'];
$status = $_POST['editUserStatus'];

$sql = "UPDATE akun
 SET 
            username = '$username', 
            email = '$email', 
            status = '$status' 
        WHERE id = '$id'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil diperbarui!";
    header("Location: ../../pengelolaanpengguna.php?pesan_update=success");
} else {
    echo "Error: " . $koneksi->error;
    header("Location: ../../pengelolaanpengguna.php?pesan_update=error");
}

$koneksi->close();
?>
