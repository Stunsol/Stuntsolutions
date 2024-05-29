
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Stunting</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
        </ul>
      </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index.php" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">E-Stunting</span>
        </a>
        <div class="brand-link">
          <?php echo $_SESSION['Type'] ?> : <?php echo $_SESSION['Name'] ?>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">

          <!-- SidebarSearch Form -->
          <br>
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item menu-open">
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php" class="nav-link">
                      <p>Dashboard</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Pelayanan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=daftar_layanan" class="nav-link">
                      <p>Daftar Layanan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=jenis_pemeriksaan" class="nav-link">
                      <p>Jenis Pemeriksaan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=catatan_pemeriksaan" class="nav-link">
                      <p>Catatan Pemeriksaan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=posyandu" class="nav-link">
                      <p>Posyandu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=hasil_pemeriksaan" class="nav-link">
                      <p>Hasil Pemeriksaan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Data Informasi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=status_gizi" class="nav-link">
                      <p>Status Gizi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=jenis_kelamin" class="nav-link">
                      <p>Jenis Kelamin</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=status_kesejahteraan" class="nav-link">
                      <p>Status Kesejahteraan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=status_pernikahan" class="nav-link">
                      <p>Status Pernikahan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Data Pelanggan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=anak" class="nav-link">
                      <p>Anak</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=orang_tua" class="nav-link">
                      <p>Orang Tua</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Wilayah
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=provinsi" class="nav-link">
                      <p>Provinsi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=kabupaten" class="nav-link">
                      <p>Kabupaten</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=kecamatan" class="nav-link">
                      <p>Kecamatan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=kelurahan" class="nav-link">
                      <p>Kelurahan</p>
                    </a>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>
      </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <section class="content">
          <div class="container-fluid">
            <?php
              if(isset($_GET['page'])){
                if($_GET['page']=="daftar_layanan"){
                  include 'daftar_layanan.php';
                } else if($_GET['page']=="jenis_pemeriksaan"){
                  include 'jenis_pemeriksaan.php';
                } else if($_GET['page']=="catatan_pemeriksaan"){
                  include 'catatan_pemeriksaan.php';
                } else if($_GET['page']=="posyandu"){
                  include 'posyandu.php';
                } else if($_GET['page']=="hasil_pemeriksaan"){
                  include 'hasil_pemeriksaan.php';
                } else if($_GET['page']=="status_gizi"){
                  include 'status_gizi.php';
                } else if($_GET['page']=="jenis_kelamin"){
                  include 'jenis_kelamin.php';
                } else if($_GET['page']=="status_kesejahteraan"){
                  include 'status_kesejahteraan.php';
                } else if($_GET['page']=="status_pernikahan"){
                  include 'status_pernikahan.php';
                } else if($_GET['page']=="anak"){
                  include 'anak.php';
                } else if($_GET['page']=="orang_tua"){
                  include 'orang_tua.php';
                } else if($_GET['page']=="provinsi"){
                  include 'provinsi.php';
                } else if($_GET['page']=="kabupaten"){
                  include 'kabupaten.php';
                } else if($_GET['page']=="kecamatan"){
                  include 'kecamatan.php';
                } else if($_GET['page']=="kelurahan"){
                  include 'kelurahan.php';
                } else{
                  include 'dashboard.php';
                }
              } else{
                include 'dashboard.php';
              }
            ?>
          </div>
        </section>
      </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>