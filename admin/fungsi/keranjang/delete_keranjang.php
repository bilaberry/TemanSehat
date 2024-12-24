<?php
require_once("../../../includes/koneksi.php");

if(isset($_GET['reset'])) {
    session_start();
    $id_user = $_SESSION['admin']['id_member'];
    
    $query = "DELETE FROM keranjang WHERE id_member = ?";
    $stmt = $koneksi->prepare($query);
    
    $stmt->bind_param("i", $id_user);
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
    
        $query = "DELETE FROM keranjang WHERE id = ?";
        $stmt = $koneksi->prepare($query);
    
        $stmt->bind_param("i", $id);
    } else {
        header("Location: ../../transaksi.php");
    }
}
if ($stmt->execute()) {
    header("Location: ../../transaksi.php?pesan_delete=success");
} else {
    header("Location: ../../transaksi.php?pesan_delete=error");
}
$stmt->close();
$koneksi->close();

?>
