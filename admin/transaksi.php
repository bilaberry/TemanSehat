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
                <main class="col-md-9 col-lg-12 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h3">Transaksi</h1>
                </div>

                <div class="row">
                    <!-- Search Product -->
                    <div class="col-md-4">
                        <div class="card card-primary mb-3">
                            <div class="card-header">
                                <h5><i class="fa fa-search"></i> Cari Barang</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" id="cari" class="form-control" placeholder="Masukan: Nama Barang">
                            </div>
                        </div>
                    </div>

                    <!-- Search Result -->
                    <div class="col-md-8">
                        <div class="card card-primary mb-3">
                            <div class="card-header">
                                <h5><i class="fa fa-list"></i> Hasil Pencarian</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="hasil_cari"><p>Hasil pencarian akan muncul di sini...</p></div>
                                    <div id="tunggu"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5><i class="fa fa-shopping-cart"></i> Keranjang Belanja
                                <a class="btn btn-danger float-right" 
                                    onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');" href="fungsi/keranjang/delete_keranjang.php?reset=true">
                                    <b>RESET KERANJANG</b></a>
                            </h5>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered">
							<tr>
								<td><b>Tanggal</b></td>
								<td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
							</tr>
						</table>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require_once("../includes/koneksi.php");
                                        $sql = "SELECT keranjang.id, barang.nama_barang, keranjang.id_barang, keranjang.id_member, keranjang.total, keranjang.jumlah FROM keranjang
                                                INNER JOIN barang ON keranjang.id_barang = barang.id
                                                WHERE id_member = " . $_SESSION['admin']['id_member'];

                                        $results = $koneksi->query($sql);
                                        $total_bayar=0;
                                        $bayar = '';
                                        $hitung = '';
                                        $no = 1;
                                        $no=1;
                                        if ($results->num_rows > 0) {
                                            foreach($results as $row) {?>
                                                <tr>
                                                    <form method="POST" action="fungsi/keranjang/update_keranjang.php">
                                                        <td><?php echo $no ?></td>
                                                        <td><?php echo $row["nama_barang"] ?></td>
                                                        <td>
                                                            <input type="number" name="jumlah" value="<?php echo $row['jumlah'];?>" class="form-control">
                                                            <input type="hidden" name="id" value="<?php echo $row['id'];?>" class="form-control">
                                                            <input type="hidden" name="id_barang" value="<?php echo $row['id_barang'];?>" class="form-control">
                                                        </td>
                                                        <td>Rp. <?php echo number_format($row["total"]) ?></td>
                                                        <td>
                                                            <button type="submit" class="btn btn-warning">Update</button>
                                                    </form>
                                                        <button class='btn btn-danger' data-toggle='modal' data-target='#deleteCartModal-<?php echo $row['id'] ?>'><i class='fa fa-times'></i></button>
                                                    </td>
                                                </tr>
                                        <?php 
                                        echo "
                                
                                        <!-- Modal Hapus Produk -->
                                        <div class='modal fade' id='deleteCartModal-{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='deleteCartModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='deleteCartModalLabel'>Hapus Produk dari Keranjang</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action='fungsi/keranjang/delete_keranjang.php' method='POST'>
                                                        <div class='modal-body'>
                                                            <input type='hidden' name='id' value='{$row['id']}'>
                                                        <p>Apakah Anda yakin ingin menghapus {$row['nama_barang']} dari keranjang?</p>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tidak</button>
                                                            <button type='submit' class='btn btn-danger'>Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>";
                                        $no++; $total_bayar += $row['total']; }
                                            
                                        } else {
                                            echo "
                                                <tr>
                                                    <td colspan='5'><center>No data available in table</center></td>
                                                </tr>";
                                        }
                                        ?>
                                        </tbody>
                                    </table>

                                    <br/>
                                    <div id="kasirnya">
                                        <table class="table table-stripped">
                                            <?php
                                            if (isset($_GET['nota']) && !empty($_GET['nota'] == 'yes')) {
                                                $total = isset($_POST['total']) ? $_POST['total'] : 0;
                                                $bayar = isset($_POST['bayar']) ? $_POST['bayar'] : 0;

                                                if(!empty($bayar))
                                                {
                                                    $hitung = $bayar - $total;
                                                    if($bayar >= $total)
                                                    {
                                                        $id_barang = $_POST['id_barang'];
                                                        $id_member = $_POST['id_member'];
                                                        $jumlah = $_POST['jumlah'];
                                                        $total = $_POST['total1'];
                                                        $periode = $_POST['periode'];
                                                        $jumlah_dipilih = count($id_barang);
                                                        
                                                        for($x=0;$x<$jumlah_dipilih;$x++){

                                                            $d = array($id_barang[$x],$id_member[$x],$jumlah[$x],$total[$x],date('Y-m-d H:i:s'),$periode[$x]);
                                                            $sql = "INSERT INTO nota (id_barang,id_member,jumlah,total,tanggal_input,periode) VALUES(?,?,?,?,?,?)";
                                                            $row = $koneksi->prepare($sql);
                                                            $row->execute($d);

                                                            // ubah stok barang
                                                            $sql_barang = "SELECT * FROM barang WHERE id = ?";
                                                            $row_barang = $koneksi->prepare($sql_barang);
                                                            $row_barang->bind_param("i", $id_barang[$x]);
                                                            $row_barang->execute();
                                                            $hsl = $row_barang->get_result();
                                                            

                                                            if ($hsl->num_rows > 0) { // Periksa apakah fetch() berhasil
                                                                $barang = $hsl->fetch_assoc();
                                                                $stok = $barang['stok'];
                                                                $idb  = $barang['id'];
                                                            } else {
                                                                $stok = 0; // Atau nilai default lainnya
                                                                // Optional: Tampilkan pesan atau log bahwa data tidak ditemukan
                                                                echo "Data barang tidak ditemukan.";
                                                            }
                                                            

                                                            $total_stok = $stok - $jumlah[$x];
                                                            // echo $total_stok;
                                                            $sql_stok = "UPDATE barang SET stok = ? WHERE id = ?";
                                                            $row_stok = $koneksi->prepare($sql_stok);
                                                            $row_stok->execute(array($total_stok, $idb));
                                                        }
                                                        echo '<script>
                                                            alert("Belanjaan Berhasil Di Bayar!");
                                                            window.location.href = "fungsi/keranjang/delete_keranjang.php?reset=true";
                                                        </script>';
                                                    }else{
                                                        echo '<script>alert("Uang Kurang ! Rp.'.$hitung.'");</script>';
                                                    }
                                                }
                                            }
                                            ?>
                                            <!-- aksi ke table nota -->
                                            <form method="POST" action="transaksi.php?page=jual&nota=yes#kasirnya">
                                                <?php foreach($results as $result){;?>
                                                    <input type="hidden" name="id_barang[]" value="<?php echo $result['id_barang'];?>">
                                                    <input type="hidden" name="id_member[]" value="<?php echo $result['id_member'];?>">
                                                    <input type="hidden" name="jumlah[]" value="<?php echo $result['jumlah'];?>">
                                                    <input type="hidden" name="total1[]" value="<?php echo $result['total'];?>">
                                                    <input type="hidden" name="periode[]" value="<?php echo date('m-Y');?>">
                                                <?php $no++; }?>
                                                <tr>
                                                    <td>Total Semua  </td>
                                                    <td><input type="text" class="form-control" name="total" value="<?php echo $total_bayar;?>"></td>
                                                
                                                    <td>Bayar  </td>
                                                    <td><input type="text" class="form-control" name="bayar" value="<?php echo $bayar;?>"></td>
                                                    <td><button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
                                                    <?php  if(isset($_GET['nota'])) {?>
                                                        <a class="btn btn-danger" href="fungsi/hapus/hapus.php?penjualan=jual">
                                                        <b>RESET</b></a></td><?php }?></td>
                                                </tr>
                                            </form>
                                            <!-- aksi ke table nota -->
                                            <tr>
                                                <td>Kembali</td>
                                                <td><input type="text" class="form-control" value="<?php echo $hitung;?>"></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        <br/>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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

    <script>
    // AJAX call for autocomplete 
    $(document).ready(function(){
        $("#cari").change(function(){
            $.ajax({
                type: "POST",
                url: "fungsi/barang/get_keranjang_barang.php",
                data:'keyword='+$(this).val(),
                beforeSend: function(){
                    $("#hasil_cari").hide();
                    $("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                },
                success: function(html){
                    $("#tunggu").html('');
                    $("#hasil_cari").show();
                    $("#hasil_cari").html(html);
                }
            });
        });
    });
    //To select country name
    </script>
</body>

</html>