<?php
require_once("../../../includes/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM akun WHERE id = ?";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../../pengelolaanpengguna.php?pesan_delete=success");
    } else {
        header("Location: ../../pengelolaanpengguna.php?pesan_delete=error");
    }

    $stmt->close();
    $koneksi->close();
} else {
    header("Location: ../../pengelolaanpengguna.php");
}

?>
