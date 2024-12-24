<?php
require_once("../../../includes/koneksi.php");

// Ambil data POST
$id_barang = $_GET['barang_id'];
$id_member = $_GET['id_kasir'];
$jumlah = 1;
$barang_sql = "SELECT harga_jual FROM barang WHERE id = ?";
$stmt = $koneksi->prepare($barang_sql);
$stmt->bind_param("i", $id_barang);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;

if ($result->num_rows > 0) {
    $barang = $result->fetch_assoc();
    $total = $jumlah * $barang['harga_jual'];
}

$sql = "INSERT INTO keranjang ( id_barang, id_member, jumlah, total ) values ( '$id_barang', '$id_member', '$jumlah', '$total' )";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan!";
    header("Location: ../../transaksi.php?pesan_store=success");
} else {
    echo "Error: " . $koneksi->error;
    header("Location: ../../transaksi.php?pesan_store=error");
}

$koneksi->close();
?>
