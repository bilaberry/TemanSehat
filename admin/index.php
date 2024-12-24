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
    <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Illustrations Card (Image on Left, Text on Right) -->
    <div class="col-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Teman Sehat</h6>
            </div>
            <div class="card-body d-flex">
                <!-- Gambar di sebelah kiri -->
                <div class="mr-4">
                    <img class="img-fluid" style="max-width: 200px;" src="../img/Temansehat.png" alt="Illustration">
                </div>
                
                <!-- Teks dan Link di sebelah kanan -->
                <div>
                    <p>Teman Sehat adalah platform e-commerce inovatif yang mengutamakan kesehatan Anda dengan menyediakan berbagai produk kesehatan berkualitas. Di sini, Anda dapat menemukan beragam obat-obatan, suplemen, alat kesehatan, dan produk-produk lainnya yang dirancang untuk mendukung gaya hidup sehat Anda. Dengan berbagai pilihan yang lengkap dan terkurasi secara cermat, Teman Sehat memastikan setiap produk yang kami tawarkan aman, efektif, dan terjamin kualitasnya. Kami bekerja sama dengan berbagai apotek dan produsen terkemuka untuk memberikan Anda produk yang dapat diandalkan, dengan harga yang bersaing, dan dikirimkan langsung ke pintu rumah Anda.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Content Row for Pemasukan and Pengeluaran (Side by Side) -->
<div class="row">

    <!-- Pemasukan Teman Sehat Card -->
    <div class="col-12 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pemasukan Teman Sehat
                        </div>
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

    <!-- Pengeluaran Teman Sehat Card -->
    <div class="col-12 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pengeluaran Teman Sehat
                        </div>
                        <?php
                        require_once("../includes/koneksi.php"); // Pastikan path koneksi sesuai

                        // Query untuk mengambil stok dan harga_beli
                        $sql = "SELECT stok, harga_beli FROM barang";
                        $result = $koneksi->query($sql);

                        $total_pengeluaran = 0;

                        // Hitung total pengeluaran
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $total_pengeluaran += $row['stok'] * $row['harga_beli'];
                            }
                        }

                        // Format total pengeluaran ke dalam format rupiah
                        function formatRupiah($angka) {
                            return "Rp." . number_format($angka, 2, ',', '.');
                        }
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo formatRupiah($total_pengeluaran); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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