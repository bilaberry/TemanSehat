<?php 
include_once("../../../includes/koneksi.php");
session_start();
$cari = trim(strip_tags($_POST['keyword']));
if ($cari == '') {
} else {
$sql = "SELECT barang.id, barang.nama_barang, barang.id_kategori, kategori.nama_kategori, barang.harga_beli, barang.harga_jual, barang.stok
        FROM barang
        INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori
        WHERE barang.nama_barang LIKE '%$cari%'";
        $results = $koneksi->query($sql);
        ?>
  <table class="table table-stripped" width="100%" id="example2">
    <tr>
      <th>ID Barang</th>
      <th>Nama Barang</th>
      <th>Kategori</th>
      <th>Harga Jual</th>
      <th>Aksi</th>
    </tr>
    
    <?php   
    if ($results->num_rows > 0) {
    foreach ($results as $result) {?>
    <tr>
      <td><?php echo $result['id'];?></td>
      <td><?php echo $result['nama_barang'];?></td>
      <td><?php echo $result['nama_kategori'];?></td>
      <td><?php echo $result['harga_jual'];?></td>
      <td>
      <a href="fungsi/keranjang/store_keranjang.php?barang_id=<?php echo $result['id'];?>&id_kasir=<?php echo $_SESSION['admin']['id_member'];?>" 
        class="btn btn-success">
        <i class="fa fa-shopping-cart"></i></a></td>
    </tr>
  <?php }?>
  <?php } else{?>
    <tr>
      <td colspan='5'><center>Tidak ada barang yang bernama <?php echo $cari ?></center></td>
    </tr>
  <?php }?>
  </table>
<?php }?>