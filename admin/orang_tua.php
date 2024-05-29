<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Orang Tua</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Orang Tua</li>
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
                    <div class="card-body" style="overflow:auto">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="min-width: 50px;">No.</th>
                                    <th style="min-width: 175px;">
                                        No. KK
                                        <input list="op_kk" class="form-control" type="search" id="co0" onkeyup="search(0)" placeholder="Cari No. KK...">
                                        <datalist id="op_kk">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT No_KK FROM orang_tua");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['No_KK'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 200px;">
                                        Nama Ayah
                                        <input class="form-control" type="search" id="co1" onkeyup="search(1)" placeholder="Cari Nama Ayah...">
                                    </th>
                                    <th style="min-width: 200px;">
                                        Nama Ibu
                                        <input class="form-control" type="search" id="co2" onkeyup="search(2)" placeholder="Cari Nama Ibu...">
                                    </th>
                                    <th style="min-width: 350px;">
                                        Alamat
                                        <input class="form-control" type="search" id="co3" onkeyup="search(3)" placeholder="Cari Alamat...">
                                    </th>
                                    <th style="min-width: 175px;">
                                        Provinsi
                                        <input list="op_pro" class="form-control" type="search" id="co4" onkeyup="search(4)" placeholder="Cari Provinsi...">
                                        <datalist id="op_pro">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Provinsi FROM provinsi");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Provinsi'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 175px;">
                                        Kabupaten/Kota
                                        <input list="op_kab" class="form-control" type="search" id="co5" onkeyup="search(5)" placeholder="Cari Kabupaten/Kota...">
                                        <datalist id="op_kab">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Kabupaten FROM kabupaten");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Kabupaten'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 175px;">
                                        Kecamatan
                                        <input list="op_kec" class="form-control" type="search" id="co6" onkeyup="search(6)" placeholder="Cari Kecamatan...">
                                        <datalist id="op_kec">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Kecamatan FROM kecamatan");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Kecamatan'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 175px;">
                                        Kelurahan
                                        <input list="op_kel" class="form-control" type="search" id="co7" onkeyup="search(7)" placeholder="Cari Kelurahan...">
                                        <datalist id="op_kel">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Kelurahan FROM kelurahan");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Kelurahan'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 175px;">
                                        No. Tlp
                                        <input class="form-control" type="search" id="co8" onkeyup="search(8)" placeholder="Cari No. Tlp...">
                                    </th>
                                    <th style="min-width: 200px;">
                                        Status Pernikahan
                                        <input list="op_nkh" class="form-control" type="search" id="co9" onkeyup="search(9)" placeholder="Cari Status Pernikahan...">
                                        <datalist id="op_nkh">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Status_Pernikahan FROM status_pernikahan");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Status_Pernikahan'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 200px;">
                                        Status Kesejahteraan
                                        <input list="op_sjh" class="form-control" type="search" id="co10" onkeyup="search(10)" placeholder="Cari Status Kesejahteraan...">
                                        <datalist id="op_sjh">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Status_Kesejahteraan FROM status_kesejahteraan");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Status_Kesejahteraan'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 300px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($Type != 'User'){
                                        $no = 0;
                                        $query = mysqli_query($koneksi, "SELECT *
                                            FROM orang_tua
                                            INNER JOIN status_pernikahan
                                            ON orang_tua.Id_Status_Pernikahan = status_pernikahan.Id_Status_Pernikahan
                                            INNER JOIN provinsi
                                            ON orang_tua.Id_Provinsi = provinsi.Id_Provinsi
                                            INNER JOIN kabupaten
                                            ON orang_tua.Id_Kabupaten = kabupaten.Id_Kabupaten
                                            INNER JOIN kecamatan
                                            ON orang_tua.Id_Kecamatan = kecamatan.Id_Kecamatan
                                            INNER JOIN kelurahan
                                            ON orang_tua.Id_Kelurahan = kelurahan.Id_Kelurahan
                                            INNER JOIN status_kesejahteraan
                                            ON orang_tua.Id_Status_Kesejahteraan = status_kesejahteraan.Id_Status_Kesejahteraan
                                            ORDER BY No_KK");
                                    } else{
                                        $no = 0;
                                        $query2 = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Id = '$Id'");
                                        $idu = mysqli_fetch_array($query2);
                                        $query = mysqli_query($koneksi, "SELECT *
                                            FROM orang_tua
                                            INNER JOIN status_pernikahan
                                            ON orang_tua.Id_Status_Pernikahan = status_pernikahan.Id_Status_Pernikahan
                                            INNER JOIN provinsi
                                            ON orang_tua.Id_Provinsi = provinsi.Id_Provinsi
                                            INNER JOIN kabupaten
                                            ON orang_tua.Id_Kabupaten = kabupaten.Id_Kabupaten
                                            INNER JOIN kecamatan
                                            ON orang_tua.Id_Kecamatan = kecamatan.Id_Kecamatan
                                            INNER JOIN kelurahan
                                            ON orang_tua.Id_Kelurahan = kelurahan.Id_Kelurahan
                                            INNER JOIN status_kesejahteraan
                                            ON orang_tua.Id_Status_Kesejahteraan = status_kesejahteraan.Id_Status_Kesejahteraan
                                            WHERE orang_tua.No_KK = '$idu[No_KK]'
                                            ORDER BY No_KK");
                                    }
                                    while ($nom = mysqli_fetch_array($query)){
                                        $no++
                                ?>
                                <!--Tabel form ubah-->
                                <?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
                                    <form method="post" enctype="multipart/form-data">
                                        <td align=center> <?php echo $no;?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='No. KK' name='kk' value='".$nom['No_KK']."'>"; ?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Nama Ayah' name='ay' value='".$nom['Nama_Ayah']."'>"; ?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Nama Ibu' name='ib' value='".$nom['Nama_Ibu']."'>"; ?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Alamat' name='alm' value='".$nom['Alamat']."'>"; ?></td>
                                        <td> <?php echo "<select class='form-control' name='prv' id='aprv".$no."' onchange='FunProv(".$no.")' style='display: '>" ?>
                                                <option style="display: none" value="0" disabled>Provinsi</option>
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
                                        <td> <?php echo "<select class='form-control' name='kab' id='akab".$no."' onchange='FunKab(".$no.")' style='display: '>" ?>
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
                                        <td> <?php echo "<select class='form-control' name='kec' id='akec".$no."' onchange='FunKec(".$no.")' style='display: '>" ?>
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
                                        <td> <?php echo "<select class='form-control' name='kel' id='akel".$no."' onchange='FunKel(".$no.")' style='display: '>" ?>
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
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='No. Tlp' name='tlp' value='".$nom['No_Tlp']."'>"; ?></td>
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
                                        <td align=center>
                                            <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
                                            <?php echo "<button type='submit' style='width:45%' name='update".$nom['No_KK']."' class='btn btn-sa'>Simpan</button>"; ?>
                                        </td>
                                    </form>
                                    <?php
                                        $ch = "update".$nom['No_KK'];
                                        if (isset($_POST[$ch])){
                                            $sql=$koneksi->query("UPDATE `orang_tua`
                                                SET `No_KK` = '$_POST[kk]', `Nama_Ayah` = '$_POST[ay]', `Nama_Ibu` = '$_POST[ib]', `Alamat` = '$_POST[alm]', `Id_Provinsi` = '$_POST[prv]', `Id_Kabupaten` = '$_POST[kab]', `Id_Kecamatan` = '$_POST[kec]', `Id_Kelurahan` = '$_POST[kel]', `No_Tlp` = '$_POST[tlp]', `Id_Status_Pernikahan` = '$_POST[nkh]', `Id_Status_Kesejahteraan` = '$_POST[sej]'
                                                WHERE `No_KK` = '$nom[No_KK]'
                                            ");
                                            if($sql){
                                                echo "<script>window.location = 'index.php?page=orang_tua'</script>";
                                            }else{
                                                echo "<script>alert('Proses gagal'); window.location = 'index.php?page=orang_tua'</script>";
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr></tr>
                                <!--Tabel normal-->
                                <?php echo "<tr id='normal".$no."'>"; ?>
                                    <td align=center> <?php echo $no;?></td>
                                    <td> <?php echo $nom['No_KK'];?></td>
                                    <td> <?php echo $nom['Nama_Ayah'];?></td>
                                    <td> <?php echo $nom['Nama_Ibu'];?></td>
                                    <td> <?php echo $nom['Alamat'];?></td>
                                    <td> <?php echo $nom['Provinsi'];?></td>
                                    <td> <?php echo $nom['Kabupaten'];?></td>
                                    <td> <?php echo $nom['Kecamatan'];?></td>
                                    <td> <?php echo $nom['Kelurahan'];?></td>
                                    <td> <?php echo $nom['No_Tlp'];?></td>
                                    <td> <?php echo $nom['Status_Pernikahan'];?></td>
                                    <td> <?php echo $nom['Status_Kesejahteraan'];?></td>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                            <td align=center>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-del' onclick='del(1, ".$no.")'>Hapus</button>"; ?>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah</button>"; ?>
                                            </td>

                                        <tr></tr>
                                        <?php echo "<tr id='delete".$no."' style='display: none;'>"; ?>
                                            <td colspan=13 align=center>
                                                <p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
                                                <?php echo "<button type='button' style='width: 45%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Batal</button>" ?>
                                                <?php echo "<a class='btn btn-del' style='width: 45%' href='hapus.php?id=".$nom['No_KK']."&type=orang_tua'>Ya</a>"; ?>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tr>
                                <?php }?>
                                <!--Form Tambah Data-->
                                <?php
                                    if($Type == 'Admin' or $Type == 'Superadmin'){
                                ?>
                                        <tr id="add_button">
                                            <td colspan=13 align=center><button type="button" class="btn btn-add" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no+1 ?></td>
                                                <td><input type="text" class="form-control" placeholder="No. KK" name="kk"></td>
                                                <td><input type="text" class="form-control" placeholder="Nama Ayah" name="ay"></td>
                                                <td><input type="text" class="form-control" placeholder="Nama Ibu" name="ib"></td>
                                                <td><input type="text" class="form-control" placeholder="Alamat" name="alm"></td>
                                                <td>
                                                    <select class="form-control" name="prv" id="aprv0" onchange="FunProv(0)">
                                                        <option style="display: none" value="0" disabled selected>Provinsi</option>
                                                        <?php
                                                        $query4 = mysqli_query($koneksi, "SELECT * FROM `provinsi`");
                                                        while ($noa = mysqli_fetch_array($query4)){
                                                        ?>
                                                            <option value=<?php echo $noa['Id_Provinsi']?>> <?php echo $noa['Provinsi'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="kab" id="akab0" onchange="FunKab(0)" style="display: none">
                                                        <option style="display: none" value="0" disabled selected>Kabupaten/Kota</option>
                                                        <?php
                                                        $query4 = mysqli_query($koneksi, "SELECT * FROM `kabupaten`");
                                                        while ($noa = mysqli_fetch_array($query4)){
                                                        ?>
                                                            <option class=<?php echo $noa['Id_Provinsi'] ?> style="display:" value=<?php echo $noa['Id_Kabupaten']?>> <?php echo $noa['Kabupaten'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="kec" id="akec0" onchange="FunKec(0)" style="display: none">
                                                        <option style="display: none" value="0" disabled selected>Kecamatan</option>
                                                        <?php
                                                        $query4 = mysqli_query($koneksi, "SELECT * FROM `kecamatan`");
                                                        while ($noa = mysqli_fetch_array($query4)){
                                                        ?>
                                                            <option class=<?php echo $noa['Id_Kabupaten'] ?> style="display:" value=<?php echo $noa['Id_Kecamatan']?>> <?php echo $noa['Kecamatan'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="kel" id="akel0" onchange="FunKel(0)" style="display: none">
                                                        <option style="display: none" value="0" disabled selected>Kelurahan</option>
                                                        <?php
                                                        $query4 = mysqli_query($koneksi, "SELECT * FROM `kelurahan`");
                                                        while ($noa = mysqli_fetch_array($query4)){
                                                        ?>
                                                            <option class=<?php echo $noa['Id_Kecamatan'] ?> style="display:" value=<?php echo $noa['Id_Kelurahan']?>> <?php echo $noa['Kelurahan'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" placeholder="No. Tlp" name="tlp"></td>
                                                <td>
                                                    <select class="form-control" name="nkh">
                                                        <?php
                                                        $query4 = mysqli_query($koneksi, "SELECT * FROM `status_pernikahan`");
                                                        while ($noa = mysqli_fetch_array($query4)){
                                                        ?>
                                                        <option value=<?php echo $noa['Id_Status_Pernikahan']?>> <?php echo $noa['Status_Pernikahan'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="sej">
                                                        <?php
                                                        $query5 = mysqli_query($koneksi, "SELECT * FROM `status_kesejahteraan`");
                                                        while ($nou = mysqli_fetch_array($query5)){
                                                        ?>
                                                        <option value=<?php echo $nou['Id_Status_Kesejahteraan']?>> <?php echo $nou['Status_Kesejahteraan'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td align=center>
                                                    <button type="button" style="width:45%" class="btn btn-secondary" onclick="add(0)">Batal</button>
                                                    <button type="submit" style="width:45%" name="insert" class="btn btn-sa">Simpan</button>
                                                </td>
                                            </form>
                                            <?php 
                                                if (isset($_POST['insert'])){
                                                    $sql=$koneksi->query("INSERT INTO `orang_tua`(No_KK, Nama_Ayah, Nama_Ibu, Alamat, Id_Provinsi, Id_Kabupaten, Id_Kecamatan, Id_Kelurahan, No_Tlp, Id_Status_Pernikahan, Id_Status_Kesejahteraan) 
                                                        VALUES('$_POST[kk]', '$_POST[ay]', '$_POST[ib]', '$_POST[alm]', '$_POST[prv]', '$_POST[kab]', '$_POST[kec]', '$_POST[kel]', '$_POST[tlp]', '$_POST[nkh]', '$_POST[sej]')
                                                    ");
                                                    if($sql){
                                                        echo "<script>window.location = 'index.php?page=orang_tua'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=orang_tua'</script>";
                                                    }
                                                }
                                            ?>
                                        </tr>
                                    <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function FunProv(idx){
        var x = document.getElementById("aprv".concat(idx)).value;
        kabn = document.getElementById("akab".concat(idx));
        $("#akab".concat(idx)).show();
        $("#akec".concat(idx)).hide();
        $("#akel".concat(idx)).hide();
        $("#akab".concat(idx).concat(" option")).hide();
        $("#akab".concat(idx).concat(" option.") + x).show();
        kabn.selectedIndex = 0;
    }

    function FunKab(idx){
        var x = document.getElementById("akab".concat(idx)).value;
        kecn = document.getElementById("akec".concat(idx));
        $("#akec".concat(idx)).show();
        $("#akel".concat(idx)).hide();
        $("#akec".concat(idx).concat(" option")).hide();
        $("#akec".concat(idx).concat(" option.") + x).show();
        kecn.selectedIndex = 0;
    }

    function FunKec(idx){
        var x = document.getElementById("akec".concat(idx)).value;
        keln = document.getElementById("akel".concat(idx));
        $("#akel".concat(idx)).show();
        $("#akel".concat(idx).concat(" option")).hide();
        $("#akel".concat(idx).concat(" option.") + x).show();
        keln.selectedIndex = 0;
    }

    function search(idx){
        nrow = 11;
        var filter = [];
        for(i = 0; i < nrow; i++){
            var x = "co".concat(i);
            input = document.getElementById(x);
            filter[i] = input.value.toUpperCase();
        }
        table = document.getElementById("example1");
        tr = table.getElementsByTagName("tr"); 

        for(i = 0; i < tr.length; i++){
            td = tr[i].getElementsByTagName("td")[idx+1];
            if (td){
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter[idx]) > -1){
                    tr[i].style.display = "";
                } else{
                    tr[i].style.display = "none";
                }
            }
            for(j = 0; j < nrow; j++){
                if(j != idx){
                    td = tr[i].getElementsByTagName("td")[j+1];
                    if(td){
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter[j]) > -1){
                            if(tr[i].style.display != "none"){
                                tr[i].style.display = "";
                            }
                        } else{
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
            if(i%5 != 3 && i != 0 && i != tr.length-3){
				tr[i].style.display = "none";
			}
			document.getElementById("add_form").style.display = "none";
        }
    }

	function add(sta){
		if(sta == 1){
			document.getElementById("add_button").style.display = "none";
			document.getElementById("add_form").style.display = "";
		} else if(sta == 0){
			document.getElementById("add_button").style.display = "";
			document.getElementById("add_form").style.display = "none";
		}
	}

	function change(stt, row){
		let norm = "normal".concat(row);
		let cfo = "change_form".concat(row);
		if(stt == 1){
			document.getElementById(norm).style.display = "none";
			document.getElementById(cfo).style.display = "";
		} else if(stt == 0){
			document.getElementById(norm).style.display = "";
			document.getElementById(cfo).style.display = "none";
		}
	}

    function del(sts, row){
		let dlt = "delete".concat(row);
		if(sts == 1){
			document.getElementById(dlt).style.display = "";
		} else if(sts == 0){
			document.getElementById(dlt).style.display = "none";
		}
	}
</script>