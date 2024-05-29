<?php
session_start();

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="stunting";
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  $Type = $_SESSION['Type'];
  $Id = $_SESSION['Id'];
  $Name = $_SESSION['Name'];
  $query = mysqli_query($koneksi, "SELECT * FROM $Type WHERE $Type.Id = '$Id'");
  $nom = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Sunting</title>

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
    <link rel="stylesheet" href="dist/css/style.css">
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
      <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="top: 0; position: sticky">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
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

        <!-- Sidebar -->
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <?php
              if($Type == 'User'){
              ?> <img src="images/user.png">
              <?php } else if($Type == 'Admin'){
              ?> <img src="images/admin.png">
              <?php } else if($Type == 'Superadmin'){
              ?> <img src="images/superadmin.png">
              <?php } else if($Type == 'Guest'){
              ?> <img src="images/guest.png">
              <?php }?>
            </div>
            <div class="info">
              <?php if($Type != "Guest"){
              ?>
                <a href="index.php?page=akun" class="d-block"><?php echo $nom['Nama'] ?></a>
              <?php } else{
              ?>
                <a href="index.php" class="d-block">Guest</a>
              <?php }?>
            </div>
          </div>
          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Cari">
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
                    <a href="index.php?page=dashboard" class="nav-link">
                      <img src="images/dashboard.png" height="30" width="30">
                      <p>Dashboard</p>
                    </a>
                  </li>
                </ul>
                <!--<ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=tes" class="nav-link">
                      <img src="images/dashboard.png" height="30" width="30">
                      <p>Tes</p>
                    </a>
                  </li>
                </ul>-->
                <?php
                  if($_SESSION['Type']=='Superadmin'){
                ?>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="index.php?page=admin" class="nav-link">
                        <img src="images/admin2.png" height="30" width="30">
                        <p>Admin</p>
                      </a>
                    </li>
                  </ul>
                <?php }?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=verifikasi" class="nav-link">
                      <img src="images/verif.png" height="30" width="30">
                      <p>Verifikasi Data</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=laporan&type1=awal" class="nav-link">
                      <img src="images/verif.png" height="30" width="30">
                      <p>Laporan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <img src="images/pelayanan.png" height="30" width="30">
                  <p>
                    Pelayanan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=daftar_layanan" class="nav-link">
                      <img style="margin-left: 15px" src="images/layanan.png" height="30" width="30">
                      <p>Daftar Layanan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=jenis_pemeriksaan" class="nav-link">
                      <img style="margin-left: 15px" src="images/periksa.png" height="30" width="30">
                      <p>Jenis Pemeriksaan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=catatan_pemeriksaan" class="nav-link">
                      <img style="margin-left: 15px" src="images/note.png" height="30" width="30">
                      <p>Catatan Pemeriksaan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=posyandu" class="nav-link">
                      <img style="margin-left: 15px" src="images/posyandu.png" height="30" width="30">
                      <p>Posyandu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=jadwal" class="nav-link">
                      <img style="margin-left: 15px" src="images/jadwal.png" height="30" width="30">
                      <p>Jadwal</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=hasil_pemeriksaan" class="nav-link">
                      <img style="margin-left: 15px" src="images/hasil.png" height="30" width="30">
                      <p>Hasil Pemeriksaan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <img src="images/informasi.png" height="30" width="30">
                  <p>
                    Data Informasi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=status_gizi" class="nav-link">
                      <img style="margin-left: 15px" src="images/gizi.png" height="30" width="30">
                      <p>Status Gizi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=jenis_kelamin" class="nav-link">
                      <img style="margin-left: 15px" src="images/gender.png" height="30" width="30">
                      <p>Jenis Kelamin</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=golongan_darah" class="nav-link">
                      <img style="margin-left: 15px" src="images/darah.png" height="30" width="30">
                      <p>Golongan Darah</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=status_kesejahteraan" class="nav-link">
                      <img style="margin-left: 15px" src="images/sejahtera.png" height="30" width="30">
                      <p>Status Kesejahteraan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=status_pernikahan" class="nav-link">
                      <img style="margin-left: 15px" src="images/s_nikah.png" height="30" width="30">
                      <p>Status Pernikahan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <img src="images/pengguna.png" height="30" width="30">
                  <p>
                    Data Pasien
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=anak" class="nav-link">
                      <img style="margin-left: 15px" src="images/anak.png" height="30" width="30">
                      <p>Anak</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=orang_tua" class="nav-link">
                      <img style="margin-left: 15px" src="images/ortu.png" height="30" width="30">
                      <p>Orang Tua</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <img src="images/wilayah.png" height="30" width="30">
                  <p>
                    Wilayah
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=provinsi" class="nav-link">
                      <img style="margin-left: 15px" src="images/wilayah.png" height="30" width="30">
                      <p>Provinsi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=kabupaten" class="nav-link">
                      <img style="margin-left: 15px" src="images/wilayah.png" height="30" width="30">
                      <p>Kabupaten/Kota</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=kecamatan" class="nav-link">
                      <img style="margin-left: 15px" src="images/wilayah.png" height="30" width="30">
                      <p>Kecamatan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?page=kelurahan" class="nav-link">
                      <img style="margin-left: 15px" src="images/wilayah.png" height="30" width="30">
                      <p>Kelurahan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu-open" type="none">
                <?php if($Type != 'Guest'){
                ?>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="index.php?page=akun" class="nav-link">
                        <img src="images/m_akun.png" height="30" width="30">
                        <p>Manajemen Akun</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link">
                          <img src="images/logout.png" height="30" width="30">
                          <p>Log Out</p>
                        </a>
                    </li>
                  </ul>
                <?php } else{
                ?>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../Login/index.php" class="nav-link">
                        <img src="images/login.png" height="30" width="30">
                        <p>Login</p>
                      </a>
                    </li>
                  </ul>
                <?php }?>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      
      
      <div class="content-wrapper">
        <!---->
        <section class="content">
          <div class="container-fluid">
            <?php
              if(isset($_GET['page'])){
                if($_GET['page']=="daftar_layanan"){
                  include 'daftar_layanan.php';
                } else if($_GET['page']=="tes"){
                  include 'tes.php';
                } else if($_GET['page']=="laporan"){
                  include 'laporan.php';
                } else if($_GET['page']=="admin"){
                  include 'admin.php';
                } else if($_GET['page']=="jenis_pemeriksaan"){
                  include 'jenis_pemeriksaan.php';
                } else if($_GET['page']=="catatan_pemeriksaan"){
                  include 'catatan_pemeriksaan.php';
                } else if($_GET['page']=="posyandu"){
                  include 'posyandu.php';
                } else if($_GET['page']=="jadwal"){
                  include 'jadwal.php';
                } else if($_GET['page']=="jadwal_pemeriksaan"){
                  include 'jadwal_pemeriksaan.php';
                } else if($_GET['page']=="hasil_pemeriksaan"){
                  include 'hasil_pemeriksaan.php';
                } else if($_GET['page']=="status_gizi"){
                  include 'status_gizi.php';
                } else if($_GET['page']=="jenis_kelamin"){
                  include 'jenis_kelamin.php';
                } else if($_GET['page']=="golongan_darah"){
                  include 'golongan_darah.php';
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
                } else if($_GET['page']=="akun"){
                  include 'akun.php';
                } else if($_GET['page']=="pass"){
                  include 'pass.php';
                } else if($_GET['page']=="verifikasi"){
                  include 'verifikasi.php';
                } else if($_GET['page']=="konfirmasi_verifikasi"){
                  include 'konfirmasi_verifikasi.php';
                } else if($_GET['page']=="hasil"){
                  include 'hasil.php';
                } else if($_GET['page']=="detail_anak"){
                  include 'detail_anak.php';
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

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
    </div>

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
    <script src="dist/js/demo2.js"></script>
  </body>
</html>