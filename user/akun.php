<?php
$no = 0;
$query1 = mysqli_query($koneksi, "SELECT * FROM `user`
    INNER JOIN `orang_tua`
    ON user.No_KK = orang_tua.No_KK
    WHERE Id = '$Id'");
$nom = mysqli_fetch_array($query1);
$query2 = mysqli_query($koneksi, "SELECT * FROM `orang_tua`
    INNER JOIN `status_pernikahan`
    ON status_pernikahan.Id_Status_Pernikahan = orang_tua.Id_Status_Pernikahan
    INNER JOIN `provinsi`
    ON provinsi.Id_Provinsi = orang_tua.Id_Provinsi
    INNER JOIN `kabupaten`
    ON kabupaten.Id_Kabupaten = orang_tua.Id_Kabupaten
    INNER JOIN `kecamatan`
    ON kecamatan.Id_Kecamatan = orang_tua.Id_Kecamatan
    INNER JOIN `kelurahan`
    ON kelurahan.Id_Kelurahan = orang_tua.Id_Kelurahan
    INNER JOIN `status_kesejahteraan`
    ON status_kesejahteraan.Id_Status_Kesejahteraan = orang_tua.Id_Status_Kesejahteraan
    WHERE No_KK = '$nom[No_KK]'");
$noa = mysqli_fetch_array($query2);
?>
<section class="slider_section long_section">
    <div id="customCarousel" class="carousel slide" data-ride="carousel">
    <div style="width: 100%">
        <ol style="background: none" class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Akun</li>
        </ol>
    </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <!--<div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Layanan</li>
                </ol>
            </div>-->
            <div class="container " style="padding-top: 0px;">
            <div class="row">
                <div style="width: 60%">
                    <div class="detail-box">
                        <h1>
                        INFORMASI AKUN
                        <br>
                        </h1>
                    </div>
                </div>
                <div  style="width: 40%">
                <div class="img-box">
                    <img src="images/profile.gif" style="width: 35%; float: right" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div style="overflow: auto; margin-top: 25px; margin-bottom: 25px;">
        <form method="post" enctype="multipart/form-data">
            <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <td style="vertical-align: middle; width: 30%">Username</td>
                    <td style="vertical-align: middle; width: 70%"><input type="text" class="form-control" placeholder="Username" name="un" value=<?php echo $nom['Username'] ?>></input></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Nama</td>
                    <td style="vertical-align: middle"><input type="text" class="form-control" placeholder="Nama" name="na" value=<?php echo $nom['Nama'] ?>></input></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">No. KK</td>
                    <td style="vertical-align: middle"><?php echo $nom['No_KK'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Nama Ayah</td>
                    <td style="vertical-align: middle"><?php echo $noa['Nama_Ayah'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Nama Ibu</td>
                    <td style="vertical-align: middle"><?php echo $noa['Nama_Ibu'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Alamat</td>
                    <td style="vertical-align: middle"><?php echo $noa['Alamat'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Provinsi</td>
                    <td style="vertical-align: middle"><?php echo $noa['Provinsi'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Kabupaten/Kota</td>
                    <td style="vertical-align: middle"><?php echo $noa['Kabupaten'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Kecamatan</td>
                    <td style="vertical-align: middle"><?php echo $noa['Kecamatan'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Kelurahan</td>
                    <td style="vertical-align: middle"><?php echo $noa['Kelurahan'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">No. Tlp</td>
                    <td style="vertical-align: middle"><?php echo $noa['No_Tlp'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Status Kesejahteraan</td>
                    <td style="vertical-align: middle"><?php echo $noa['Status_Kesejahteraan'] ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">Status Pernikahan</td>
                    <td style="vertical-align: middle"><?php echo $noa['Status_Pernikahan'] ?></td>
                </tr>
            </table>
            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
            <button type="submit" name="chp" class="btn btn-add">Change Password</button>
            <button type="submit" name="cdt" class="btn btn-cha">Ajukan Perubahan Data</button>
        </form>
        <?php 
            if (isset($_POST['save'])){
                $sql=$koneksi->query("UPDATE `user`
                    SET `Username` = '$_POST[un]', `Nama` = '$_POST[na]'
                    WHERE Id = '$nom[Id]'
                ");
                if($sql){
                    echo "<script>window.location = 'index.php?page=akun'</script>";
                }else{
                    echo "<script>alert('Proses gagal'); window.location = 'index.php?page=akun'</script>";
                }
            } else if(isset($_POST['chp'])){
                echo "<script>window.location = 'index.php?page=pass'</script>";
            } else if(isset($_POST['cdt'])){
                echo "<script>window.location = 'index.php?page=ubah_data&st=0'</script>";
            }
        ?>
    </div>
</section>