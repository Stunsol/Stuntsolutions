<?php
$no = 0;
$query1 = mysqli_query($koneksi, "SELECT * FROM `user` INNER JOIN `orang_tua` ON user.No_KK = orang_tua.No_KK WHERE Id = '$Id'");
$nom = mysqli_fetch_array($query1);
?>
<section class="slider_section long_section">
    <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div style="width: 100%">
            <ol style="background: none" class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=akun">Akun</a></li>
                <li class="breadcrumb-item active">Ubah Password</li>
            </ol>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container " style="padding-top: 25px;">
            <div class="row">
                <div style="width: 60%">
                    <div class="detail-box">
                        <h1>
                        Ubah Password
                        <br>
                        </h1>
                    </div>
                </div>
                <div  style="width: 40%">
                <div class="img-box">
                    <img src="images/pass.gif" style="width: 35%; float: right" alt="">
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
                    <td style="width: 25%; vertical-align: middle">Old Password</td>
                    <td><input type="password" class="form-control" placeholder="Enter your old password" name="oldpass"></input></td>
                </tr>
                <tr>
                    <td style="width: 25%; vertical-align: middle">New Password</td>
                    <td><input type="password" class="form-control" placeholder="Your new password" name="newpass"></input></td>
                </tr>
                <tr>
                    <td style="width: 25%; vertical-align: middle">Confirm New Password</td>
                    <td><input type="password" class="form-control" placeholder="Confirm your new password" name="conpass"></input></td>
                </tr>
            </table>
            <button type="submit" name="chp" class="btn btn-primary">Change Password</button>
        </form>
        <?php 
            $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Id = '$Id'");
            $nom = mysqli_fetch_array($query);
            $Id = $nom['Id'];
            if(isset($_POST['chp'])){
                if($nom['Password'] == $_POST['oldpass']){
                    if($_POST['newpass'] == $_POST['conpass']){
                        $sql=$koneksi->query("UPDATE `user`
                            SET `Password` = '$_POST[conpass]'
                            WHERE `Id` = '$Id'
                        ");
                        if($sql){ ?>
                            <h3 class="card-title" style="color:green">Password anda berhasil diubah</h3>
                        <?php }else{
                            echo "<script>alert('Ganti Password gagal'); window.location = 'index.php?page=akun'</script>";
                        }
                    } else{
                    ?>
                        <h3 class="card-title" style="color:red">Password yang anda masukkan tidak sama!</h3>
                    <?php }
                } else{
                ?>
                    <h3 class="card-title" style="color:red">Password yang anda masukkan salah!</h3>
                <?php }
            }
        ?>
    </div>
</section>