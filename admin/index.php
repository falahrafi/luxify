<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Admin - Kopeey</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../styles/main.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/data-tables-custom.css" rel="stylesheet">
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-black sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon">
                    <img src="../assets/images/kopeey-logo.png" alt="" height="36">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <img src="../assets/images/kopeey-text-light.png" alt="" height="30">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="menuProduk">
                <a class="nav-link collapsed" href="index.php" data-toggle="collapse" data-target="#collapseProduk"
                    aria-expanded="true" aria-controls="collapseProduk">
                    <i class="fas fa-fw fa-mug-hot"></i>
                    <span>Produk</span>
                </a>
                <div id="collapseProduk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sidebarDataProduk" role="button">
                            <i class="fas fa-table"></i>&ensp;Data Produk
                        </a>
                        <a class="collapse-item" id="sidebarTambahProduk" role="button">
                            <i class="fas fa-plus-circle"></i>&ensp;Tambah Produk
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="menuGambar">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGambar"
                    aria-expanded="true" aria-controls="collapseGambar">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Gambar Produk</span>
                </a>
                <div id="collapseGambar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sidebarDataGambar" role="button">
                            <i class="fas fa-table"></i>&ensp;Data Gambar
                        </a>
                        <a class="collapse-item" id="sidebarTambahGambar" role="button">
                            <i class="fas fa-plus-circle"></i>&ensp;Tambah Gambar
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="menuPesan">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesan"
                    aria-expanded="true" aria-controls="collapsePesan">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Pesan Pengguna</span>
                </a>
                <div id="collapsePesan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sidebarDataPesan" role="button">
                            <i class="fas fa-table"></i>&ensp;Data Pesan Pengguna
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-white-orange">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-orange topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav mx-sm-auto">
                        <li class="nav-item">
                            <h2>
                                <i class="fas fa-user-cog mr-1"></i>
                                Halaman Admin
                            </h2>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid isi-konten-admin">

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-light">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2021 Muhammad Falah Abdurrafi</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Javascript untuk mengubah isi konten -->
    <script src="js/ajax-admin-content.js"></script>

</body>

</html>