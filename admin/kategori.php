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

                <div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Manajemen Kategori Page -->
    <div class="container-fluid">

    <?php
    if (isset($_GET['pesan_update'])) {
        $pesan_update = $_GET['pesan_update'];

        if ($pesan_update == 'success') {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Berhasil!</strong> Data kategori berhasil diperbarui.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        } elseif ($pesan_update == 'error') {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal!</strong> Terjadi kesalahan saat memperbarui data kategori.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }
    }
    ?>

    <?php
    if (isset($_GET['pesan_delete'])) {
        $pesan_delete = $_GET['pesan_delete'];

        if ($pesan_delete == 'success') {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Berhasil!</strong> Data kategori berhasil dihapus.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        } elseif ($pesan_delete == 'error') {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal!</strong> Terjadi kesalahan saat menghapus data kategori.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }
    }
    ?>

    <?php
    if (isset($_GET['pesan_store'])) {
        $pesan_store = $_GET['pesan_store'];

        if ($pesan_store == 'success') {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Berhasil!</strong> Data kategori berhasil disimpan.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        } elseif ($pesan_store == 'error') {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal!</strong> Terjadi kesalahan saat menambahkan data kategori.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }
    }
    ?>
      <!-- Tabel Daftar Kategori -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Kategori</th>
                  <th>Deskripsi</th>
                  <th>Tanggal dibuat</th>
                  <?php if($_SESSION['role'] === 'admin') {
                    echo "<th>Aksi</th>";
                  }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                    require_once("../includes/koneksi.php");
                    $sql = "SELECT * FROM kategori";
                    $result = $koneksi->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id_kategori"] . "</td>
                                    <td>" . $row["nama_kategori"] . "</td>
                                    <td>" . $row["deskripsi"] . "</td>
                                    <td>" . (isset($row['tgl_input']) ? date('Y-m-d', strtotime($row['tgl_input'])) : '') . "</td>";
                                    if($_SESSION['role'] === 'admin') {
                                        echo "
                                        <td>
                                            <button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editCategoryModal-". $row['id_kategori'] ."'><i class='fas fa-edit'></i> Edit</button>
                                            <button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteCategoryModal-". $row['id_kategori'] ."'><i class='fas fa-trash-alt'></i> Hapus</button>
                                        </td>";
                                    }
                                echo "</tr>";

                            echo "

                            <!-- Modal Edit Kategori -->
                            <div class='modal fade' id='editCategoryModal-{$row['id_kategori']}' tabindex='-1' role='dialog' aria-labelledby='editCategoryModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='editCategoryModalLabel'>Edit Kategori</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <form action='fungsi/kategori/update_kategori.php' method='POST'>
                                            <div class='modal-body'>
                                                <input type='hidden' name='id' value='{$row['id_kategori']}'>
                                                <div class='form-group'>
                                                    <label for='editCategoryName'>Nama Kategori</label>
                                                    <input type='text' class='form-control' name='nama_kategori' id='editCategoryName' value='{$row['nama_kategori']}'>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='editCategoryPrice'>Deskripsi</label>
                                                    <input type='text' class='form-control' name='deskripsi' id='editCategoryPrice' value='{$row['deskripsi']}'>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='editCategoryCreatedAt'>Tanggal dibuat</label>
                                                    <input type='date' class='form-control' name='tgl_input' id='editCategoryCreatedAt' value='" . (isset($row['tgl_input']) ? date('Y-m-d', strtotime($row['tgl_input'])) : '') . "'>
                                                </div>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>
                                                <button type='submit' class='btn btn-primary'>Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            ";

                            echo "
                            
                            <!-- Modal Hapus Kategori -->
                            <div class='modal fade' id='deleteCategoryModal-{$row['id_kategori']}' tabindex='-1' role='dialog' aria-labelledby='deleteCategoryModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='deleteCategoryModalLabel'>Hapus Kategori</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <form action='fungsi/kategori/delete_kategori.php' method='POST'>
                                            <div class='modal-body'>
                                                <input type='hidden' name='id' value='{$row['id_kategori']}'>
                                            <p>Apakah Anda yakin ingin menghapus {$row['nama_kategori']}?</p>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tidak</button>
                                                <button type='submit' class='btn btn-danger'>Hapus</button>
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
                    <!-- Modal Tambah Kategori -->
                    <div class='modal fade' id='addCategoryModal' tabindex='-1' role='dialog' aria-labelledby='addCategoryModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='addCategoryModalLabel'>Tambah Kategori Baru</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <form action='fungsi/kategori/store_kategori.php' method='POST'>
                                    <div class='modal-body'>
                                        <div class='form-group'>
                                            <label for='CategoryName'>Nama Kategori</label>
                                            <input type='text' class='form-control' name='nama_kategori' id='CategoryName' placeholder='Masukkan Nama Kategori'>
                                        </div>
                                        <div class='form-group'>
                                            <label for='CategoryPrice'>Deskripsi</label>
                                            <input type='text' class='form-control' name='deskripsi' id='CategoryPrice' placeholder='Masukkan Deskripsi Kategori'>
                                        </div>
                                        <div class='form-group'>
                                            <label for='CategoryCreatedAt'>Tanggal Dibuat</label>
                                            <input type='date' class='form-control' name='tgl_input' id='CategoryCreatedAt' placeholder=''>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>
                                        <button type='submit' class='btn btn-primary'>Simpan Kategori</button>
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
      <!-- Tombol Tambah Kategori -->
      <?php if($_SESSION['role'] === 'admin') {
      echo "<div class='text-right mb-3'>
        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#addCategoryModal'><i
            class='fas fa-plus-circle'></i> Tambah Kategori</button>
      </div>";
      }
      ?>

    </div>
                <!-- Begin Page Content -->
                <?php 
                   // if($_SESSION['role'] === 'admin') { -->
                        // include('kategori_view_admin.php');
                //     } else {
                //         include('kategori_view_member.php');
                //     }
                ?>
    
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