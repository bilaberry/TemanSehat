<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teman Sehat</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('session_check.php') ?>
        <!-- Sidebar -->
        <?php include('sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <?php include('profile.php') ?>
                    <!-- End of Topbar Navbar -->

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Penjualan</h1>
</div>

<!-- Row for Laporan Penjualan & Products -->
<div class="row">

    <!-- Card Laporan Penjualan -->
    <div class="col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Penjualan</div>
                            <?php
                        require_once("../includes/koneksi.php"); // Pastikan path koneksi sesuai

                        // Query untuk menjumlahkan kolom total pada tabel nota
                        $sql = "SELECT SUM(total) AS total_pemasukan FROM nota";
                        $result = $koneksi->query($sql);

                        $total_pemasukan = 0;

                        // Periksa hasil query
                        if ($result && $row = $result->fetch_assoc()) {
                            $total_pemasukan = $row['total_pemasukan'];
                        }

                        // Format total pemasukan ke dalam format rupiah
                        function formatRupiahPemasukan($angka) {
                            return "Rp." . number_format($angka, 2, ',', '.');
                        }
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo formatRupiahPemasukan($total_pemasukan); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Produk Terjual -->
    <div class="col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Produk Terjual
                        </div>
                        <?php
                        require_once("../includes/koneksi.php"); // Pastikan path koneksi sesuai

                        // Query untuk menghitung total barang terjual
                        $sql = "SELECT SUM(jumlah) AS total_terjual FROM nota";
                        $result = $koneksi->query($sql);

                        $total_terjual = 0;

                        // Periksa hasil query
                        if ($result && $row = $result->fetch_assoc()) {
                            $total_terjual = $row['total_terjual'];
                        }
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo number_format($total_terjual, 0, ',', '.'); ?> Barang
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tanggal Laporan -->
    <div class="col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Tanggal Laporan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo date('d F Y') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Row for New Cards (Products) -->
<div class="row">

    <!-- Produk Paling Laku -->
    <div class="col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Produk Paling Laku
                        </div>
                        <?php
                        require_once("../includes/koneksi.php"); // Pastikan path koneksi sesuai

                        // Query untuk mendapatkan produk dengan jumlah terbanyak
                        $sql = "
                            SELECT barang.nama_barang, SUM(nota.jumlah) AS total_terjual 
                            FROM nota 
                            INNER JOIN barang ON nota.id_barang = barang.id 
                            GROUP BY nota.id_barang 
                            ORDER BY total_terjual DESC 
                            LIMIT 1
                        ";
                        $result = $koneksi->query($sql);

                        $produk_terlaris = "Tidak Ada Data";
                        $total_terjual = 0;

                        // Periksa hasil query
                        if ($result && $row = $result->fetch_assoc()) {
                            $produk_terlaris = $row['nama_barang'];
                            $total_terjual = $row['total_terjual'];
                        }
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $produk_terlaris; ?>
                        </div>
                        <div class="text-xs text-gray-600">
                            Terjual <?php echo number_format($total_terjual, 0, ',', '.'); ?> unit bulan ini
                        </div>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Yang Habis -->
    <div class="col-md-4 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Produk Habis
                        </div>
                        <?php
                        require_once("../includes/koneksi.php"); // Pastikan path koneksi sesuai

                        // Query untuk mendapatkan produk dengan stok = 0
                        $sql = "SELECT nama_barang FROM barang WHERE stok = 0 LIMIT 1";
                        $result = $koneksi->query($sql);

                        $produk_habis = "Semua produk tersedia";

                        // Periksa hasil query
                        if ($result && $row = $result->fetch_assoc()) {
                            $produk_habis = $row['nama_barang'];
                        }
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $produk_habis; ?>
                        </div>
                        <div class="text-xs text-gray-600">
                            <?php echo ($produk_habis === "Semua produk tersedia") ? "" : "Stok habis, segera restock"; ?>
                        </div>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Yang Harus Di Restock -->
    <div class="col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Produk Perlu Restock
                        </div>
                        <?php
                        require_once("../includes/koneksi.php"); // Pastikan path koneksi sesuai

                        // Query untuk mendapatkan produk dengan stok < 10
                        $sql = "SELECT nama_barang, stok FROM barang WHERE stok < 10 ORDER BY stok ASC LIMIT 1";
                        $result = $koneksi->query($sql);

                        $produk_restock = "Semua stok aman";
                        $sisa_stok = 0;

                        // Periksa hasil query
                        if ($result && $row = $result->fetch_assoc()) {
                            $produk_restock = $row['nama_barang'];
                            $sisa_stok = $row['stok'];
                        }
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $produk_restock; ?>
                        </div>
                        <div class="text-xs text-gray-600">
                            <?php echo ($produk_restock === "Semua stok aman") ? "" : "Stok tersisa " . $sisa_stok . " unit"; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-undo fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>