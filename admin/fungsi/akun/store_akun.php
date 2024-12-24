<?php
require_once("../../../includes/koneksi.php");

// Ambil data POST
$username = $_POST['userName'];
$email = $_POST['userEmail'];
$status = $_POST['userStatus'];

$sql = "INSERT INTO akun ( username, email, status ) values ( '$username', '$email', '$status' )";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan!";
    header("Location: ../../pengelolaanpengguna.php?pesan_store=success");
} else {
    echo "Error: " . $koneksi->error;
    header("Location: ../../pengelolaanpengguna.php?pesan_store=error");
}

$koneksi->close();
?>
