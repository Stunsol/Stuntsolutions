<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Ubah Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?page=akun">Manajemen Akun</a></li>
                    <li class="breadcrumb-item active">Ubah Password</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form method="post" enctype="multipart/form-data">
                            <table id="example1" class="table table-bordered table-striped">
                                <tr>
                                    <td>Old Password</td>
                                    <td><input type="password" class="form-control" placeholder="Enter your old password" name="olp"></input></td>
                                </tr>
                                <tr>
                                    <td>New Password</td>
                                    <td><input type="password" class="form-control" placeholder="Your new password" name="nep"></input></td>
                                </tr>
                                <tr>
                                    <td>Confirm New Password</td>
                                    <td><input type="password" class="form-control" placeholder="Confrm your new password" name="cnp"></input></td>
                                </tr>
                            </table>
                            <button type="submit" name="chp" class="btn btn-primary">Change Password</button>
                        </form>
                        <?php 
                            $query = mysqli_query($koneksi, "SELECT * FROM `$Type` WHERE `$Type`.Id = '$Id'");
                            $nom = mysqli_fetch_array($query);
                            $Id = $nom['Id'];
                            if(isset($_POST['chp'])){
                                if($nom['Password'] == $_POST['olp']){
                                    if($_POST['nep'] == $_POST['cnp']){
                                        $sql=$koneksi->query("UPDATE `$Type`
                                            SET `Password` = '$_POST[cnp]'
                                            WHERE `Id` = '$Id'
                                        ");
                                        if($sql){
                                            echo "<script>window.location = 'index.php?page=pass'</script>";
                                        }else{
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
                </div>
            </div>
        </div>
    </div>
</section>
