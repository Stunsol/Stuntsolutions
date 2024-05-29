<?php
$no = 0;
$query1 = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Id = '$Id'");
$noo = mysqli_fetch_array($query1);
?>
<section class="slider_section long_section">
    <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div style="width: 100%">
            <ol style="background: none" class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=akun">Akun</a></li>
                <li class="breadcrumb-item active">Ubah Data</li>
            </ol>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container " style="padding-top: 25px;">
            <div class="row">
                <div style="width: 60%">
                    <div class="detail-box">
                        <h1>
                        Ubah Data
                        <br>
                        </h1>
                    </div>
                </div>
                <div  style="width: 40%">
                <div class="img-box">
                    <img src="images/ubah.gif" style="width: 35%; float: right" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div style="overflow: auto; margin-top: 25px; margin-bottom: 25px;">
    <?php if($_GET['st'] == 0){ ?>
        <form method="post" enctype="multipart/form-data">
            <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <td style="vertical-align: middle; width: 30%">Data yang ingin diubah</td>
                    <td style="vertical-align: middle; width: 70%">
                        <select name="type" id="tipe" class="form-control" onchange="Data()">
                            <option value="" style="display: none" selected disabled>Ubah data:</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="anak">Anak</option>
                        </select>
                    </td>
                </tr>
                <tr id="ortu" style="display: none">
                    <td style="vertical-align: middle">No. KK</td>
                    <td style="vertical-align: middle">
                        <input style="display: none" name="kk" class="form-control" value='<?php echo $noo['No_KK'] ?>'></input>
                        <input class="form-control" disabled value='<?php echo $noo['No_KK'] ?>'></input>
                    </td>
                </tr>
                <tr></tr>
                <tr id="anak" style="display: none">
                    <td style="vertical-align: middle">NIK Anak</td>
                    <?php
                        $query2 = mysqli_query($koneksi, "SELECT * FROM `anak` WHERE No_KK = '$noo[No_KK]'");
                    ?>
                    <td style="vertical-align: middle">
                        <select class="form-control" name="nik">
                            <?php while ($nom = mysqli_fetch_array($query2)){ ?>
                                <option value='<?php echo $nom['NIK_Anak'] ?>'><?php echo $nom['NIK_Anak'] ?> - <?php echo $nom['Nama_Anak'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr id="isi" style="display: none">
                    <td style="vertical-align: middle">Keterangan yang ingin diubah</td>
                    <td style="vertical-align: middle"><textarea name="ket" class="form-control" cols=100% rows=5></textarea></td>
                </tr>
                <tr id="sisi" style="display: none">
                    <td style="vertical-align: middle">Bukti Dokumen</td>
                    <td style="vertical-align: middle">
                        <input name="dok" type="file"></input>
                    </td>
                </tr>
                <tr id="sisis" style="display: none">
                    <td style="vertical-align: middle">Tanggal Pengajuan</td>
                    <td style="vertical-align: middle">
                        <input type="date" name="tgl" class="form-control"></input>
                    </td>
                </tr>
            </table>
            <button type="submit" name="cancel" class="btn btn-del">Batalkan</button>
            <button type="submit" name="save" class="btn btn-cha">Ajukan Perubahan</button>
        </form>
    <?php } else if($_GET['st'] == 1){ ?>
        <form method="post" enctype="multipart/form-data">
            <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <td style="vertical-align: middle; width: 30%">Data yang ingin diubah</td>
                    <td style="vertical-align: middle; width: 70%">
                        <select name="type" id="tipe" class="form-control" onchange="Data()">
                            <option value="" style="display: none" disabled>Ubah data:</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="anak" selected>Anak</option>
                        </select>
                    </td>
                </tr>
                <tr id="ortu" style="display: none">
                    <td style="vertical-align: middle">No. KK</td>
                    <td style="vertical-align: middle">
                        <input style="display: none" name="kk" class="form-control" value='<?php echo $noo['No_KK'] ?>'></input>
                        <input class="form-control" disabled value='<?php echo $noo['No_KK'] ?>'></input>
                    </td>
                </tr>
                <tr></tr>
                <tr id="anak" style="display:">
                    <td style="vertical-align: middle">NIK Anak</td>
                    <?php
                        $query2 = mysqli_query($koneksi, "SELECT * FROM `anak` WHERE No_KK = '$noo[No_KK]'");
                    ?>
                    <td style="vertical-align: middle">
                        <select class="form-control" name="nik">
                            <?php while ($nom = mysqli_fetch_array($query2)){ ?>
                                <?php if($nom['NIK_Anak'] == $_GET['idd']){ ?>
                                    <option selected value='<?php echo $nom['NIK_Anak'] ?>'><?php echo $nom['NIK_Anak'] ?> - <?php echo $nom['Nama_Anak'] ?></option>
                                <?php } else{ ?>
                                    <option value='<?php echo $nom['NIK_Anak'] ?>'><?php echo $nom['NIK_Anak'] ?> - <?php echo $nom['Nama_Anak'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr id="isi" style="display:">
                    <td style="vertical-align: middle">Keterangan yang ingin diubah</td>
                    <td style="vertical-align: middle"><textarea name="ket" class="form-control" cols=100% rows=5></textarea></td>
                </tr>
                <tr id="sisi" style="display:">
                    <td style="vertical-align: middle">Bukti Dokumen</td>
                    <td style="vertical-align: middle">
                        <input name="dok" type="file"></input>
                    </td>
                </tr>
                <tr id="sisis" style="display:">
                    <td style="vertical-align: middle">Tanggal Pengajuan</td>
                    <td style="vertical-align: middle">
                        <input type="date" name="tgl" class="form-control"></input>
                    </td>
                </tr>
            </table>
            <button type="submit" name="cancel" class="btn btn-del">Batalkan</button>
            <button type="submit" name="save" class="btn btn-cha">Ajukan Perubahan</button>
        </form>
    <?php } ?>
        <?php 
            if (isset($_POST['save'])){
                $namaf = $_FILES["dok"]["name"];
                $locf = $_FILES["dok"]["tmp_name"];
                move_uploaded_file($locf, "../bukti/$namaf");
                if($_POST['type'] == "orang_tua"){
                    $sql=$koneksi->query("UPDATE `orang_tua`
                        SET `Keterangan_Verifikasi` = '$_POST[ket]', Id_Status_Verifikasi = 'SV001', Lampiran = '$namaf', Tanggal_Pengajuan = '$_POST[tgl]'
                        WHERE No_KK = '$_POST[kk]'
                    ");
                } else if($_POST['type'] == "anak"){
                    $sql=$koneksi->query("UPDATE `anak`
                        SET `Keterangan_Verifikasi` = '$_POST[ket]', Id_Status_Verifikasi = 'SV001', Lampiran = '$namaf', Tanggal_Pengajuan = '$_POST[tgl]'
                        WHERE NIK_Anak = '$_POST[nik]'
                    ");
                }
                if($sql){
                    echo "<script>window.location = 'index.php?page=ubah_data&st=".$_GET['st']."'</script>";
                }else{
                    echo "<script>alert('Proses gagal'); window.location = 'index.php?page=ubah_data&st=".$_GET['st']."'</script>";
                }
            } else if(isset($_POST['cancel'])){
                echo "<script>window.location = 'index.php?page=akun'</script>";
            }
        ?>
    </div>
</section>

<script>
    function Data(){
        document.getElementById("isi").style.display = "";
        document.getElementById("sisi").style.display = "";
        document.getElementById("sisis").style.display = "";
        var x = document.getElementById("tipe").value;
        if(x == "orang_tua"){
            document.getElementById("ortu").style.display = "";
            document.getElementById("anak").style.display = "none";
        } else if(x == "anak"){
            document.getElementById("ortu").style.display = "none";
            document.getElementById("anak").style.display = "";
        }
    }
</script>