<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Konfirmasi Verifikasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="index.php?page=verifikasi">Verifikasi Data</a></li>
                    <li class="breadcrumb-item active">Konfirmasi Verifikasi</li>
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
                    <div class="card-body">
                        <?php if($_GET['Tipe'] == "Orang Tua"){
                            $query = mysqli_query($koneksi, "SELECT *
                                FROM `orang_tua`
                                INNER JOIN status_verifikasi
                                ON status_verifikasi.Id_Status_Verifikasi = orang_tua.Id_Status_Verifikasi
                                WHERE No_KK = '$_GET[Idd]'");
                            } else if($_GET['Tipe'] == "Anak"){
                                $query = mysqli_query($koneksi, "SELECT *
                                    FROM `anak`
                                    INNER JOIN jenis_kelamin
                                    ON jenis_kelamin.Id_Jenis_Kelamin = anak.Id_Jenis_Kelamin
                                    INNER JOIN golongan_darah
                                    ON golongan_darah.Id_Golongan_Darah = anak.Id_Golongan_Darah
                                    INNER JOIN status_verifikasi
                                    ON status_verifikasi.Id_Status_Verifikasi = anak.Id_Status_Verifikasi
                                    WHERE NIK_Anak = '$_GET[Idd]'");
                            }
                            $nom = mysqli_fetch_array($query);
                        ?>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td align=center colspan=2><b><?php echo $nom['Status_Verifikasi'] ?></b></td>
                            </tr>
                            <tr>
                                <td style="width: 30%">Keterangan Perbaruan Data</td>
                                <td style="width: 70%"><?php echo $nom['Keterangan_Verifikasi'] ?></td>
                            </tr>
                            <tr>
                                <td>Bukti Dokumen</td>
                                <td><?php echo "<img src='../bukti/".$nom['Lampiran']."' style='width: 50%'>" ?></td>
                            </tr>
                            <?php if($nom['Id_Status_Verifikasi'] == "SV001"){ ?>
                                <tr>
                                    <td align=center colspan=2>
                                        <form method="post" enctype="multipart/form-data">
                                            <button type="submit" style="width:45%" name="tolak" class="btn btn-del">Tolak Perubahan Data</button>
                                            <button type="button" style="width:45%" name="insert" class="btn btn-sa" onclick="add(1)">Setujui Perubahan Data</button>
                                        </form>
                                        <?php
                                            if(isset($_POST['tolak'])){
                                                if($_GET['Tipe'] == "Anak"){
                                                    $sql=$koneksi->query("UPDATE `anak`
                                                    SET `Id_Status_Verifikasi` = 'SV003'
                                                    WHERE `NIK_Anak` = '$_GET[Idd]'");
                                                } else{
                                                    $sql=$koneksi->query("UPDATE `orang_tua`
                                                    SET `Id_Status_Verifikasi` = 'SV003'
                                                    WHERE `No_KK` = '$_GET[Idd]'");
                                                }
                                                if($sql){
                                                    echo "<script>window.location = 'index.php?page=konfirmasi_verifikasi&Tipe=".$_GET['Tipe']."&Idd=".$_GET['Idd']."'</script>";
                                                }else{
                                                    echo "<script>alert('Proses gagal'); window.location = 'index.php?page=konfirmasi_verifikasi&Tipe=".$_GET['Tipe']."&Idd=".$_GET['Idd']."'</script>";
                                                }
                                            }
                                        ?>
                                    </td>
                                <tr>
                            <?php } ?>
                        </table>
                        <br>
                        <?php if($_GET['Tipe'] == "Anak"){ ?>
                            <form method="post" enctype="multipart/form-data">
                                <table id="ubah_data" class="table table-bordered table-striped" style="display: none">
                                    <tr>
                                        <td style="width: 15%">NIK Anak</td>
                                        <td style="width: 35%"><input type="text" class='form-control' name="nik" value='<?php echo $nom['NIK_Anak'] ?>'></input></td>
                                        <td style="width: 15%">Nama Anak</td>
                                        <td style="width: 35%"><input type="text" class='form-control' name="nam" value='<?php echo $nom['Nama_Anak'] ?>'></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <select class='form-control' name='kel'>
                                                <?php
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM `jenis_kelamin`");
                                                    while ($nos = mysqli_fetch_array($query2)){
                                                ?>
                                                        <?php if($nom['Id_Jenis_Kelamin'] == $nos['Id_Jenis_Kelamin']){
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Jenis_Kelamin'] ?> selected><?php echo $nos['Jenis_Kelamin'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Jenis_Kelamin'] ?>><?php echo $nos['Jenis_Kelamin'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                        <td>Golongan Darah</td>
                                        <td>
                                            <select class='form-control' name='dar'>
                                                <?php
                                                    $query3 = mysqli_query($koneksi, "SELECT * FROM `golongan_darah`");
                                                    while ($noa = mysqli_fetch_array($query3)){
                                                ?>
                                                        <?php if($nom['Id_Golongan_Darah'] == $noa['Id_Golongan_Darah']){
                                                        ?>
                                                            <option value=<?php echo $noa['Id_Golongan_Darah'] ?> selected><?php echo $noa['Golongan_Darah'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $noa['Id_Golongan_Darah'] ?>><?php echo $noa['Golongan_Darah'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>
                                            <select class='form-control' name='tem'>
                                                <?php
                                                    $query10 = mysqli_query($koneksi, "SELECT * FROM `kabupaten`");
                                                    while ($nof = mysqli_fetch_array($query10)){
                                                ?>
                                                        <?php if($nom['Tempat_Lahir'] == $nof['Id_Kabupaten']){
                                                        ?>
                                                            <option value=<?php echo $nof['Id_Kabupaten'] ?> selected><?php echo $nof['Kabupaten'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $nof['Id_Kabupaten'] ?>><?php echo $nof['Kabupaten'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                        <td>Tanggal Lahir</td>
                                        <td><?php echo "<input type='date' class='form-control' placeholder='Tanggal Lahir' name='tgl' value='".$nom['Tanggal_Lahir']."'>"; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. KK</td>
                                        <td><input type="text" class='form-control' name="kk" value='<?php echo $nom['No_KK'] ?>'></td>
                                        <td align=center colspan=2>
                                            <button type="button" style="width:45%" name="batal" class="btn btn-del" onclick="add(0)">Batalkan</button>
                                            <button type="submit" style="width:45%" name="upd" class="btn btn-sa">Perbarui Data</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                                if (isset($_POST['upd'])){
                                    $sql=$koneksi->query("UPDATE `anak`
                                        SET `NIK_Anak` = '$_POST[nik]', `Nama_Anak` = '$_POST[nam]', `Tempat_Lahir` = '$_POST[tem]', `Tanggal_Lahir` = '$_POST[tgl]', `Id_Jenis_Kelamin` = '$_POST[kel]', `Id_Golongan_Darah` = '$_POST[dar]', `No_KK` = '$_POST[kk]', `Id_Status_Verifikasi` = 'SV002'
                                        WHERE `NIK_Anak` = '$_GET[Idd]'
                                    ");
                                    if($sql){
                                        echo "<script>window.location = 'index.php?page=konfirmasi_verifikasi&Tipe=".$_GET['Tipe']."&Idd=".$_POST['nik']."'</script>";
                                    } else{
                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=konfirmasi_verifikasi&Tipe=".$_GET['Tipe']."&Idd=".$_POST['nik']."'</script>";
                                    }
                                }
                            ?>
                        <?php } else if($_GET['Tipe'] == "Orang Tua"){ ?>
                            <form method="post" enctype="multipart/form-data">
                                <table id="ubah_data" class="table table-bordered table-striped" style="display: none">
                                    <tr>
                                        <td style="width: 15%">No_KK</td>
                                        <td style="width: 35%"><input type="text" class='form-control' name="kk" value='<?php echo $nom['No_KK'] ?>'></input></td>
                                        <td style="width: 15%">Alamat</td>
                                        <td style="width: 35%"><input type="text" class='form-control' name="alm" value='<?php echo $nom['Alamat'] ?>'></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ayah</td>
                                        <td><input type="text" class='form-control' name="ay" value='<?php echo $nom['Nama_Ayah'] ?>'></input></td>
                                        <td>Nama Ibu</td>
                                        <td><input type="text" class='form-control' name="ib" value='<?php echo $nom['Nama_Ibu'] ?>'></td>
                                    </tr>
                                    <tr>
                                        <td>Status Kesejahteraan</td>
                                        <td>
                                            <select class='form-control' name='sej'>
                                                <?php
                                                    $query3 = mysqli_query($koneksi, "SELECT * FROM `status_kesejahteraan`");
                                                    while ($noq = mysqli_fetch_array($query3)){
                                                ?>
                                                        <?php if($nom['Id_Status_Kesejahteraan'] == $noq['Id_Status_Kesejahteraan']){
                                                        ?>
                                                            <option value=<?php echo $noq['Id_Status_Kesejahteraan'] ?> selected><?php echo $noq['Status_Kesejahteraan'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $noq['Id_Status_Kesejahteraan'] ?>><?php echo $noq['Status_Kesejahteraan'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                        <td>Status Pernikahan</td>
                                        <td>
                                            <select class='form-control' name='nkh'>
                                                <?php
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM `status_pernikahan`");
                                                    while ($nos = mysqli_fetch_array($query2)){
                                                ?>
                                                        <?php if($nom['Id_Status_Pernikahan'] == $nos['Id_Status_Pernikahan']){
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Status_Pernikahan'] ?> selected><?php echo $nos['Status_Pernikahan'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Status_Pernikahan'] ?>><?php echo $nos['Status_Pernikahan'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>
                                            <?php echo "<select class='form-control' name='prv' id='aprv' onchange='FunProv()' style='display: '>" ?>
                                                <?php
                                                    $query4 = mysqli_query($koneksi, "SELECT * FROM `provinsi`");
                                                    while ($noa = mysqli_fetch_array($query4)){
                                                ?>
                                                    <?php if($nom['Id_Provinsi'] == $noa['Id_Provinsi']){ ?>
                                                        <option value=<?php echo $noa['Id_Provinsi']?> selected> <?php echo $noa['Provinsi'];?> </option>
                                                    <?php } else{ ?>
                                                        <option value=<?php echo $noa['Id_Provinsi']?>> <?php echo $noa['Provinsi'];?> </option>
                                                    <?php }?>
                                                <?php }?>
                                            </select>
                                        </td>
                                        <td>Kabupaten/Kota</td>
                                        <td>
                                            <?php echo "<select class='form-control' name='kab' id='akab' onchange='FunKab()' style='display: '>" ?>
                                            <option style="display: none" value="0" disabled>Kabupaten/Kota</option>
                                                <?php
                                                    $query4 = mysqli_query($koneksi, "SELECT * FROM `kabupaten`");
                                                    while ($noa = mysqli_fetch_array($query4)){
                                                ?>
                                                    <?php if($nom['Id_Kabupaten'] == $noa['Id_Kabupaten']){ ?>
                                                        <option class=<?php echo $noa['Id_Provinsi'] ?> value=<?php echo $noa['Id_Kabupaten']?> selected> <?php echo $noa['Kabupaten'];?> </option>
                                                    <?php } else{ ?>
                                                        <option class=<?php echo $noa['Id_Provinsi'] ?> value=<?php echo $noa['Id_Kabupaten']?>> <?php echo $noa['Kabupaten'];?> </option>
                                                    <?php }?>
                                                <?php }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>
                                            <?php echo "<select class='form-control' name='kec' id='akec' onchange='FunKec()' style='display: '>" ?>
                                            <option style="display: none" value="0" disabled>Kecamatan</option>
                                                <?php
                                                    $query4 = mysqli_query($koneksi, "SELECT * FROM `kecamatan`");
                                                    while ($noa = mysqli_fetch_array($query4)){
                                                ?>
                                                    <?php if($nom['Id_Kecamatan'] == $noa['Id_Kecamatan']){ ?>
                                                        <option class=<?php echo $noa['Id_Kabupaten'] ?> value=<?php echo $noa['Id_Kecamatan']?> selected> <?php echo $noa['Kecamatan'];?> </option>
                                                    <?php } else{ ?>
                                                        <option class=<?php echo $noa['Id_Kabupaten'] ?> value=<?php echo $noa['Id_Kecamatan']?>> <?php echo $noa['Kecamatan'];?> </option>
                                                    <?php }?>
                                                <?php }?>
                                            </select>
                                        </td>
                                        <td>Kelurahan</td>
                                        <td>
                                            <?php echo "<select class='form-control' name='kel' id='akel' style='display: '>" ?>
                                            <option style="display: none" value="0" disabled>Kelurahan</option>
                                                <?php
                                                    $query4 = mysqli_query($koneksi, "SELECT * FROM `kelurahan`");
                                                    while ($noa = mysqli_fetch_array($query4)){
                                                ?>
                                                    <?php if($nom['Id_Kelurahan'] == $noa['Id_Kelurahan']){ ?>
                                                        <option class=<?php echo $noa['Id_Kecamatan'] ?> value=<?php echo $noa['Id_Kelurahan']?> selected> <?php echo $noa['Kelurahan'];?> </option>
                                                    <?php } else{ ?>
                                                        <option class=<?php echo $noa['Id_Kecamatan'] ?> value=<?php echo $noa['Id_Kelurahan']?>> <?php echo $noa['Kelurahan'];?> </option>
                                                    <?php }?>
                                                <?php }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No. Tlp</td>
                                        <td><input type="text" class='form-control' name="tlp" value='<?php echo $nom['No_Tlp'] ?>'></td>
                                        <td align=center colspan=2>
                                            <button type="button" style="width:45%" name="batal" class="btn btn-del" onclick="add(0)">Batalkan</button>
                                            <button type="submit" style="width:45%" name="upd" class="btn btn-sa">Perbarui Data</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                                if (isset($_POST['upd'])){
                                    $sql1 = $koneksi->query("UPDATE `orang_tua`
                                        SET `No_KK` = '$_POST[kk]', `Alamat` = '$_POST[alm]', `Nama_Ayah` = '$_POST[ay]', `Nama_Ibu` = '$_POST[ib]', `Id_Status_Kesejahteraan` = '$_POST[sej]', `Id_Status_Pernikahan` = '$_POST[nkh]', `Id_Provinsi` = '$_POST[prv]', `Id_Kabupaten` = '$_POST[kab]', `Id_Kecamatan` = '$_POST[kec]', `Id_Kelurahan` = '$_POST[kel]', `No_Tlp` = '$_POST[tlp]', `Id_Status_Verifikasi` = 'SV002'
                                        WHERE `No_KK` = '$_GET[Idd]'
                                    ");
                                    $sql2 = $koneksi->query("UPDATE `user`
                                        SET `No_KK` = '$_POST[kk]'
                                        WHERE `No_KK` = '$_GET[Idd]'
                                    ");
                                    if($sql1 AND $sql2){
                                        echo "<script>window.location = 'index.php?page=konfirmasi_verifikasi&Tipe=".$_GET['Tipe']."&Idd=".$_POST['kk']."'</script>";
                                    } else{
                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=konfirmasi_verifikasi&Tipe=".$_GET['Tipe']."&Idd=".$_POST['kk']."'</script>";
                                    }
                                }
                            ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function add(sta){
		if(sta == 1){
			document.getElementById("ubah_data").style.display = "";
		} else if(sta == 0){
			document.getElementById("ubah_data").style.display = "none";
		}
	}

    function FunProv(){
        var x = document.getElementById("aprv").value;
        kabn = document.getElementById("akab");
        $("#akab").show();
        $("#akec").hide();
        $("#akel").hide();
        $("#akab option").hide();
        $("#akab option." + x).show();
        kabn.selectedIndex = 0;
    }

    function FunKab(){
        var x = document.getElementById("akab").value;
        kecn = document.getElementById("akec");
        $("#akec").show();
        $("#akel").hide();
        $("#akec option").hide();
        $("#akec option." + x).show();
        kecn.selectedIndex = 0;
    }

    function FunKec(){
        var x = document.getElementById("akec").value;
        keln = document.getElementById("akel");
        $("#akel").show();
        $("#akel option").hide();
        $("#akel option." + x).show();
        keln.selectedIndex = 0;
    }
</script>