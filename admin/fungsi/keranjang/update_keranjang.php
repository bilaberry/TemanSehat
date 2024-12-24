<?php
require_once("../../../includes/koneksi.php");

// Ambil data POST
$id = $_POST['id'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];

// Validasi input
if (empty($id) || empty($id_barang) || empty($jumlah)) {
    header("Location: ../../transaksi.php?pesan_update=error");
    exit;
}

// Ambil data barang berdasarkan ID
$barang_sql = "SELECT harga_jual FROM barang WHERE id = ?";
$stmt = $koneksi->prepare($barang_sql);
$stmt->bind_param("i", $id_barang);
$stmt->execute();
$result = $stmt->get_result();

// Periksa apakah barang ditemukan
if ($result->num_rows > 0) {
    $barang = $result->fetch_assoc();
    $total = $jumlah * $barang['harga_jual'];

    // Update data keranjang
    $update_sql = "UPDATE keranjang SET jumlah = ?, total = ? WHERE id = ?";
    $update_stmt = $koneksi->prepare($update_sql);
    $update_stmt->bind_param("iii", $jumlah, $total, $id);

    if ($update_stmt->execute()) {
        header("Location: ../../transaksi.php?pesan_update=success");
        exit;
    } else {
        header("Location: ../../transaksi.php?pesan_update=error");
        exit;
    }
} else {
    // Barang tidak ditemukan
    header("Location: ../../transaksi.php?pesan_update=not_found");
    exit;
}

// Tutup koneksi
$koneksi->close();
?>
