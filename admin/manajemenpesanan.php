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
    <h1 class="h3 mb-0 text-gray-800">Manajemen Pesanan</h1>
</div>

<!-- Content Row -->
<div class="row">

<!-- Manajemen Pesanan Page -->
<div class="container-fluid">

    <!-- Tabel Daftar Pesanan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Produk</th>
                            <th>Status Pesanan</th>
                            <th>Tanggal Pesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                        require_once("../includes/koneksi.php");
                        $sql = "SELECT 
                                    nota.id_nota, 
                                    barang.nama_barang, 
                                    member.nama_member, 
                                    member.alamat, 
                                    nota.jumlah, 
                                    nota.total, 
                                    nota.tanggal_input, 
                                    nota.periode, 
                                    nota.status
                                FROM 
                                    nota
                                INNER JOIN barang ON barang.id = nota.id_barang
                                INNER JOIN member ON member.id = nota.id_member;
                                ";
                        $result = $koneksi->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["id_nota"] . "</td>
                                        <td>" . $row["nama_member"] . "</td>
                                        <td>" . $row["nama_barang"] . "</td>
                                        <td>" . $row["status"] . "</td>
                                        <td>" .  date('d F Y', strtotime($row['tanggal_input'])) . "</td>";
                                        if($_SESSION['role'] === 'admin') {
                                            echo "
                                            <td>
                                                <button class='btn btn-info btn-sm' data-toggle='modal' data-target='#viewOrderModal-". $row['id_nota'] ."'><i class='fas fa-eye'></i> Detail</button>
                                                <button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#changeStatusModal-". $row['id_nota'] ."'><i class='fas fa-edit'></i> Ubah Status</button>
                                            </td>";
                                    }
                                echo "</tr>";

                                echo "

                                <!-- Modal Detail Pesanan -->
                                <div class='modal fade' id='viewOrderModal-{$row['id_nota']}' tabindex='-1' role='dialog' aria-labelledby='viewOrderModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='viewOrderModalLabel'>Detail Pesanan</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                <p><strong>ID Pesanan:</strong> {$row["id_nota"]}</p>
                                                <p><strong>Nama Pelanggan:</strong> {$row["nama_member"]}</p>
                                                <p><strong>Produk:</strong> {$row["nama_barang"]}</p>
                                                <p><strong>Status:</strong> {$row["status"]}</p>
                                                <p><strong>Tanggal Pesanan:</strong> " . date('d F Y', strtotime($row['tanggal_input'])). "</p>
                                                <p><strong>Alamat Pengiriman:</strong> {$row["alamat"]}</p>
                                                <p><strong>Total Pembayaran:</strong> Rp. {$row["total"]}</p>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Modal Ubah Status Pesanan -->
                                <div class='modal fade' id='changeStatusModal-{$row['id_nota']}' tabindex='-1' role='dialog' aria-labelledby='changeStatusModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='changeStatusModalLabel'>Ubah Status Pesanan</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <form action='fungsi/pesanan/update_status.php' method='POST'>
                                                <div class='modal-body'>
                                                    <input type='hidden' name='id' value='{$row['id_nota']}'>
                                                    <div class='form-group'>
                                                        <label for='orderStatus'>Pilih Status</label>
                                                        <select class='form-control' name='status' id='orderStatus'>
                                                            <option value='Pending'>Pending</option>
                                                            <option value='Dikirim'>Dikirim</option>
                                                            <option value='Selesai'>Selesai</option>
                                                            <option value='Dibatalkan'>Dibatalkan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                                                    <button type='submit' class='btn btn-primary'>Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>";
                            }
                        } else {
                            echo "
                                <tr>
                                    <td colspan='6'><center>No data available in table</center></td>
                                </tr>";
                        }
                        echo "
                        <!-- Modal Tambah Produk -->
                        <div class='modal fade' id='addProductModal' tabindex='-1' role='dialog' aria-labelledby='addProductModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='addProductModalLabel'>Tambah Produk Baru</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <form action='fungsi/barang/store_barang.php' method='POST'>
                                        <div class='modal-body'>
                                            <div class='form-group'>
                                                <label for='productName'>Nama Produk</label>
                                                <input type='text' class='form-control' name='nama_barang' id='productName' placeholder='Masukkan Nama Produk'>
                                            </div>";
                                                $kategori_result = $koneksi->query("SELECT id_kategori, nama_kategori FROM kategori");
                                            echo "
                                            <div class='form-group'>
                                                <label for='productKategori'>Kategori</label>
                                                <select class='form-control' name='id_kategori' id='productKategori' required>";
                                                    
                                                    while ($kategori = $kategori_result->fetch_assoc()) {
                                                        echo "<option value='{$kategori['id_kategori']}'>{$kategori['nama_kategori']}</option>";
                                                    }
                                            echo "
                                                </select>
                                            </div>
                                            <div class='form-group'>
                                                <label for='productBuyPrice'>Harga Beli</label>
                                                <input type='number' class='form-control' name='harga_beli' id='productBuyPrice' placeholder='Masukkan Harga Beli Produk'>
                                            </div>
                                            <div class='form-group'>
                                                <label for='productSellPrice'>Harga</label>
                                                <input type='number' class='form-control' name='harga_jual' id='productSellPrice' placeholder='Masukkan Harga Jual Produk'>
                                            </div>
                                            <div class='form-group'>
                                                <label for='productStock'>Stok</label>
                                                <input type='number' class='form-control' name='stok' id='productStock' placeholder='Masukkan Jumlah Stok'>
                                            </div>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>
                                            <button type='submit' class='btn btn-primary'>Simpan Produk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ";
                        $koneksi->close();
                    ?>
                    </tbody>
                </table>
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