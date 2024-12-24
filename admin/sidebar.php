
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar ">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-plus-circle"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Teman Sehat </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <span>Beranda</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading - Kategori -->
    <div class='sidebar-heading' style='margin-top: 10px; padding-bottom: 10px; border-bottom: 2px;'>
        <!-- Menambahkan jarak antara heading -->
        <a href='manajemenproduk.php' style='color: white;'>
            <!-- Menambahkan link yang menuju ke halaman kategori -->
            Manajemen Produk
        </a>
    </div>

    <!-- Heading - Kategori -->
    <div class='sidebar-heading' style='margin-top: 20px; padding-bottom: 20px; border-bottom: 2px;'>
        <!-- Menambahkan jarak antara heading -->
        <a href='kategori.php' style='color: white;'> <!-- Menambahkan link yang menuju ke halaman kategori -->
            Kategori
        </a>
    </div>


    <!-- Divider -->
    <hr class='sidebar-divider'>
    
    
    <?php 
    if($_SESSION['role'] === 'user') {
    echo "
    <!-- Heading - Kategori -->
    <div class='sidebar-heading' style='margin-top: 10px; padding-bottom: 10px; border-bottom: 2px;'>
        <!-- Menambahkan jarak antara heading -->
        <a href='transaksi.php' style='color: white;'> <!-- Menambahkan link yang menuju ke halaman kategori -->
            Transaksi
        </a>
    </div>";
    } 
  ?>

    <!-- Heading - Laporan Penjualan -->
    <div class='sidebar-heading' style='margin-top: 20px; padding-bottom: 10px; border-bottom: 2px;'>
        <a href='manajemenpesanan.php' style='color: white;'>
            Manajemen Pesanan
        </a>
    </div>

    <div class='sidebar-heading' style='margin-top: 20px; padding-bottom: 10px; border-bottom: 2px;'>
        <a href='laporanpenjualan.php' style='color: white;'>
            Laporan Penjualan
        </a>
    </div>

    <?php 
    if($_SESSION['role'] === 'admin') {
    echo "
    <!-- Heading - Pengelolaan Pengguna -->
    <div class='sidebar-heading' style='margin-top: 20px; padding-bottom: 10px; border-bottom: 2px;'>
        <a href='pengelolaanpengguna.php' style='color: white;'>
            Pengelolaan Pengguna
        </a>
    </div>";
    } 
  ?>

</ul>