<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Akun</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen Akun</li>
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
                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM `$Type` WHERE `$Type`.Id = '$Id'");
                            $nom = mysqli_fetch_array($query);
                        ?>
                        <form method="post" enctype="multipart/form-data">
                            <table id="example1" class="table table-bordered table-striped">
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" class="form-control" placeholder="Username" name="un" value=<?php echo $nom['Username'] ?>></input></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" class="form-control" placeholder="Nama" name="na" value=<?php echo $nom['Nama'] ?>></input></td>
                                </tr>
                                <tr>
                                    <td>Jenis Akun</td>
                                    <td><?php echo $Type ?></td>
                                </tr>
                                <?php if($Type == 'User'){ 
                                    $query2 = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Id = '$Id'");
                                    $idu = mysqli_fetch_array($query2);
                                ?>
                                    <tr>
                                        <td>No. KK</td>
                                        <td><?php echo $idu['No_KK'] ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                            <button type="submit" name="chp" class="btn btn-primary">Change Password</button>
                        </form>
                        <?php 
                            if (isset($_POST['save'])){
                                $sql=$koneksi->query("UPDATE `$Type`
                                    SET `Username` = '$_POST[un]', `Nama` = '$_POST[na]'
                                    WHERE Id = '$Id'
                                ");
                                if($sql){
                                    echo "<script>window.location = 'index.php?page=akun'</script>";
                                }else{
                                    echo "<script>alert('Proses gagal'); window.location = 'index.php?page=akun'</script>";
                                }
                            } else if(isset($_POST['chp'])){
                                echo "<script>window.location = 'index.php?page=pass'</script>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>