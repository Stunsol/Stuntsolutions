<?php
    session_start();
    $db_host="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="stunting";
    $koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    $Type = $_SESSION['Type'];    
    if($Type == "User"){
        $Id = $_SESSION['Id'];
        $Name = $_SESSION['Name'];
        $query = mysqli_query($koneksi, "SELECT * FROM $Type WHERE $Type.Id = '$Id'");
        $nom = mysqli_fetch_array($query);
    }
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/Logo.jpg" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>StuntSolutions</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<style>
  th{
    text-align: center;
  }

  td{
    vertical-align: middle;
  }
</style>

<body>

  <div class="hero_area" style="top: 0; z-index:100; position: sticky; background-color: white">
    <!-- header section strats -->
    <header class="header_section long_section px-0">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span><img width=150px src="images/Logo.jpg">
            StuntSolutions
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.php?page=dashboard">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=posyandu&sse=0">Posyandu</a>
              </li>
              <?php if($Type == "User"){ ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=anak">Anak</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=catatan_pemeriksaan">Pencatatan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=akun">Akun</a>
              </li>
              <?php } ?>
            </ul>
          </div>
          <div class="quote_btn-container">
            <div class="image">
            </div>
            <?php
                if($Type == "Guest"){
            ?>
                <a href="../Login">
                <span>
                    Login
                </span>
                <img width=30px src="../admin/images/login.png">
                </a>
            <?php } else if($Type == "User"){
            ?>
                <a href="../index.php">
                <span>
                    Log Out
                </span>
                <img width=30px src="../admin/images/logout.png">
                </a>
            <?php } ?>
            <!--<form class="form-inline">
              <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>-->
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
  </div>
  <br>

  <!-- furniture section -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <?php
          if(isset($_GET['page'])){
            if($_GET['page'] == "about"){
              include 'about.php';
            } else if($_GET['page'] == "posyandu"){
              include 'posyandu.php';
            } else if($_GET['page'] == "anak"){
              include 'anak.php';
            } else if($_GET['page'] == "akun"){
              include 'akun.php';
            } else if($_GET['page'] == "catatan_pemeriksaan"){
              include 'catatan_pemeriksaan.php';
            } else if($_GET['page'] == "detail_anak"){
              include 'detail_anak.php';
            } else if($_GET['page'] == "pass"){
              include 'pass.php';
            } else if($_GET['page'] == "detail_catatan"){
              include 'detail_catatan.php';
            } else if($_GET['page'] == "ubah_data"){
              include 'ubah_data.php';
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


  <!-- info section -->
  <section class="info_section long_section">
    <div class="container" >
       <footer class="footer row">
            <div class="col-md-6">
                <h5>Kontak</h5>
                <div class="contact-info">
                    <p> <i class="fa fa-envelope" aria-hidden="true"></i> StuntSolutions@gmail.com</p>
                    <p>StuntSolutions adalah salah satu program Project Plan Studi Independen Dicoding Indonesia Cycle 6 </p>
                </div>
            </div>
            <div class="col-md-6 supported-by">
                <h5>Didukung oleh</h5>
                <img src="https://dicoding-web-img.sgp1.cdn.digitaloceanspaces.com/original/academy/kampus-merdeka-x-dicoding.png" width="200" alt="Dicoding Indonesia x Kampus Merdeka">
            </div>
        </footer>
      </div>
  </section>


  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">StuntSolutions</a>
        <a href="https://themewagon.com">Dicoding Indonesia</a>
      </p>
    </div>
  </footer>


  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>