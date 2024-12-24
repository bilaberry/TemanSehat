<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang &mdash; TemanSehat </title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Spicy+Rice&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- CSS Bootstap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- CSS DataTables -->
    <link href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <style>
        .swal2-actions button {
            margin: 0 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm " style="position: fixed; z-index: 10; width: 100%;">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: #0B8FAC"><i
                    class="fa-solid fa-stethoscope mr-3"></i>TemanSehat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-4">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kategori_obat.php">Kategori Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">About Us</a>
                    </li>
                </ul>
                <form class="d-none d-sm-inline-block form-inline ms-auto ">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2"></i>
                        <div class="input-group-append">
                            <button class="btn" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="navbar-nav d-flex align-items-center ms-auto">
                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-2">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="messagesDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <!-- Counter - Messages -->
                        <span class="badge badge-danger badge-counter">2</span>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! Do you need any help in finding drugs?
                                </div>
                                <div class="small text-gray-500">TemanSehat · Just Now</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate">I have the medicine that you ordered 15 minutes
                                    ago, how
                                    would you like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 15 minutes ago</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                            Messages</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg" width="30px">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
        </div>

    </nav>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!--Sidebar-->
        <ul class="navbar-nav sidebar" style="background-color:#7EC4CF; position:fixed;" id="accordionSidebar">
            <br>
            <p></p>
            <p></p>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: #434343;">
                    <i class="fa-solid fa-house"></i>
                    Home</a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="font-size:medium;">
                Kategori Obat
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="kategori_obat.php">
                    <i class="fa-solid fa-capsules"></i>
                    <span>Obat Batuk</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-tablets"></i>
                    <span>Obat Pilek</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-pills"></i>
                    <span>Obat Demam</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-tablets"></i>
                    <span>Obat Sakit Kepala</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-capsules"></i>
                    <span>Obat Nyeri Sendi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Keranjang -->
            <li class="nav-item">
                <a class="nav-link" href="keranjang.php" style="color: #434343;">
                    <i class="fa-duotone fa-solid fa-cart-shopping"></i>
                    Keranjang
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->
    </div>

    <!-- Main Content -->
    <div>

        <h1 class="h3 mb-0 text-gray-800" style="margin-top: 80px;margin-left: 260px;">Keranjang Belanja</h1>
        <table class="table table-striped columns" style="margin-top: 15px; margin-left: 250px; width: 82%;">
            <thead>
                <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Total</th>
                    <!-- Ini cuman bisa edit jumlah -->
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form method='POST' action='#'>
                            <input hidden type='text' name='id' value=".$data['id'].">
                            <button type='submit' name='btnUpdate' class='btn btn-info'><i
                                    class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form>
                            <input hidden name='id' type='text' value=".$data['id'].">
                            <button type='submit' name='btnHapus' class='btn btn-danger'><i
                                    class='fas fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" style="margin-top: 20px; margin-left: 1340px;" class="btn btn-success"
            onclick="Bayar()">Bayar</button>
        <button type="button" style="margin-top: 20px;" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
    </div>
    <!-- Tombol Page -->

    <!-- Footer -->
    <div class="container mt-4" style="background-color: #46aab9; margin-left: 193px;">
        <div class="container" style="justify-content: center space-around;">
            <div class="row" style="justify-content: center;">
                <div class="col-3 mt-5 ml-5">
                    <h5 style="color: #ffffff;">ALAMAT</h5><br>
                    <p style="color: #eeeeee;">Jalan Dr. T. Mansur No.9, Padang Bulan, Kec. Medan Baru, Kota
                        Medan,
                        Sumatera Utara 20222</p>
                </div>
                <div class="col-3 mt-5 ml-5">
                    <h5 style="color: #ffffff;">PRODUK</h5><br>
                    <div style="color: #eeeeee;">
                        <p>Obat Batuk</p>
                        <p>Obat Pilek</p>
                        <p>Obat Demam</p>
                        <p>Obat Sakit Kepala</p>
                        <p>Obat Nyeri Sendi</p>
                        <p>Obat Diare</p>
                    </div>

                </div>
                <div class="col-3 mt-5 mr-5" style="color: #ffffff;">
                    <h5>CONTACT US</h5><br>
                    <p>0813 6301 2212</p>
                    <p>Senin-Minggu (termasuk hari libur), Layanan tersedia 24 jam</p>
                    <textarea class="form-control bg-light" name="kritik" id="kritik"
                        placeholder="Masukkan Kritik dan Saran Anda untuk Peningkatan Layanan Kami"
                        style="width: 430px; height: 100px;"></textarea>
                    <p></p>
                    <button style="border-radius: 10px; border:#6e6e6e;">Submit</button>
                </div>
            </div>
            <div>

            </div>
        </div>
    </div>

    </div>
    <!-- Footer -->
    <footer class="sticky-footer" style="margin-left: 193px; background-color: #46aab9; margin-top: -30px; padding-top: 2rem;">
    <hr class="line" style="width: 90%; margin-left: 80px;">
    <div class="container my-auto">
        <div class="copyright text-center my-auto" style="color: #eeeeee; margin-left: 30px;">
            <span>Copyright &copy; TemanSehat 2024</span>
        </div>
    </div>
</footer>
    <!-- End of Footer -->

    <script>
        function Bayar() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Apakah Kamu Yakin?",
                text:"Setelah membuat keputusan ini, Anda tidak bisa membatalkannya lagi. Silahkan cek kembali data barang!",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya!",
                cancelButtonText: "Batal!",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Transaksi Berhasil!",
                        text: "Terimakasih telah berbelanja di TemanSehat",
                        icon: "success"
                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Transaksi Gagal",
                        text: "Transaksi pembayaran telah gagal, Silahkan Coba Lagi",
                        icon: "error"
                    });
                }
            });
        
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JS SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>