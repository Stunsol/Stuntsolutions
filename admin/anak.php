<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Anak</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Anak</li>
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
                                        NIK Anak
                                        <input list="op_nik" class="form-control" type="search" id="co0" onkeyup="search(0)" placeholder="Cari NIK Anak...">
                                        <datalist id="op_nik">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT NIK_Anak FROM anak");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['NIK_Anak'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 200px;">
                                        Nama Anak
                                        <input list="op_nam" class="form-control" type="search" id="co1" onkeyup="search(1)" placeholder="Cari Nama Anak...">
                                        <datalist id="op_nam">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Nama_Anak FROM anak");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Nama_Anak'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 175px;">
                                        Tempat Lahir
                                        <input list="op_tem" class="form-control" type="search" id="co2" onkeyup="search(2)" placeholder="Cari Tempat Lahir...">
                                        <datalist id="op_tem">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Kabupaten FROM kabupaten");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Kabupaten'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 225px;">
                                        Tanggal Lahir
                                        <input class="form-control" type="search" id="co3" onkeyup="search(3)" placeholder="Cari Tanggal Lahir...">
                                    </th>
                                    <th style="min-width: 150px;">
                                        Umur Anak
                                        <input class="form-control" type="search" id="co4" onkeyup="search(4)" placeholder="Cari Umur...">
                                    </th>
                                    <th style="min-width: 175px;">
                                        Jenis Kelamin
                                        <input list="op_jk" class="form-control" type="search" id="co5" onkeyup="search(5)" placeholder="Cari Jenis Kelamin...">
                                        <datalist id="op_jk">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Jenis_Kelamin FROM jenis_kelamin");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Jenis_Kelamin'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 150px;">
                                        Golongan Darah
                                        <input list="op_gd" class="form-control" type="search" id="co6" onkeyup="search(6)" placeholder="Cari Golongan Darah...">
                                        <datalist id="op_gd">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Golongan_Darah FROM golongan_darah");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Golongan_Darah'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 175px;">
                                        No. KK
                                        <input list="op_kk" class="form-control" type="search" id="co7" onkeyup="search(7)" placeholder="Cari No. KK...">
                                        <datalist id="op_kk">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT No_KK FROM orang_tua");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['No_KK'] ?></option>
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
                                            FROM anak
                                            INNER JOIN jenis_kelamin
                                            ON anak.Id_Jenis_Kelamin = jenis_kelamin.Id_Jenis_Kelamin
                                            INNER JOIN golongan_darah
                                            ON anak.Id_Golongan_Darah = golongan_darah.Id_Golongan_Darah
                                            INNER JOIN kabupaten
                                            ON anak.Tempat_Lahir = kabupaten.Id_Kabupaten
                                            ORDER BY NIK_Anak");
                                    } else{
                                        $no = 0;
                                        $query2 = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Id = '$Id'");
                                        $idu = mysqli_fetch_array($query2);
                                        $query = mysqli_query($koneksi, "SELECT *
                                            FROM anak
                                            INNER JOIN jenis_kelamin
                                            ON anak.Id_Jenis_Kelamin = jenis_kelamin.Id_Jenis_Kelamin
                                            INNER JOIN golongan_darah
                                            ON anak.Id_Golongan_Darah = golongan_darah.Id_Golongan_Darah
                                            INNER JOIN kabupaten
                                            ON anak.Tempat_Lahir = kabupaten.Id_Kabupaten
                                            WHERE anak.No_KK = '$idu[No_KK]'
                                            ORDER BY NIK_Anak");
                                    }
                                    while ($nom = mysqli_fetch_array($query)){
                                        $no++
                                ?>
                                <!--Tabel form ubah-->
                                <?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
                                    <form method="post" enctype="multipart/form-data">
                                        <td align=center> <?php echo $no;?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='NIK Anak' name='nik' value='".$nom['NIK_Anak']."'>"; ?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Nama Anak' name='na' value='".$nom['Nama_Anak']."'>"; ?></td>
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
                                        <td> <?php echo "<input type='date' class='form-control' placeholder='Tanggal Lahir' name='tgl' value='".$nom['Tanggal_Lahir']."'>"; ?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Umur Anak' name='um' value='".$nom['Umur_Anak']."'>"; ?></td>
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
                                        <td>
                                            <select class='form-control' name='kk'>
                                                <?php
                                                    $query5 = mysqli_query($koneksi, "SELECT * FROM `orang_tua`");
                                                    while ($nov = mysqli_fetch_array($query5)){
                                                ?>
                                                        <?php if($nom['No_KK'] == $nov['No_KK']){
                                                        ?>
                                                            <option value=<?php echo $nov['No_KK'] ?> selected><?php echo $nov['No_KK'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $nov['No_KK'] ?>><?php echo $nov['No_KK'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                        <td align=center>
                                            <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
                                            <?php echo "<button type='submit' style='width:45%' name='update".$nom['NIK_Anak']."' class='btn btn-sa'>Simpan</button>"; ?>
                                        </td>
                                    </form>
                                    <?php
                                        $ch = "update".$nom['NIK_Anak'];
                                        if (isset($_POST[$ch])){
                                            $sql=$koneksi->query("UPDATE `anak`
                                                SET `NIK_Anak` = '$_POST[nik]', `Nama_Anak` = '$_POST[na]', `Tempat_Lahir` = '$_POST[tem]', `Tanggal_Lahir` = '$_POST[tgl]', `Umur_Anak` = '$_POST[um]', `Id_Jenis_Kelamin` = '$_POST[kel]', `Id_Golongan_Darah` = '$_POST[dar]', `No_KK` = '$_POST[kk]'
                                                WHERE `NIK_Anak` = '$nom[NIK_Anak]'
                                            ");
                                            if($sql){
                                                echo "<script>window.location = 'index.php?page=anak'</script>";
                                            }else{
                                                echo "<script>alert('Proses gagal'); window.location = 'index.php?page=anak'</script>";
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr></tr>
                                <!--Tabel normal-->
                                <?php echo "<tr id='normal".$no."'>"; ?>
                                    <td align=center> <?php echo $no;?></td>
                                    <td> <?php echo $nom['NIK_Anak'];?></td>
                                    <td> <?php echo $nom['Nama_Anak'];?></td>
                                    <td> <?php echo $nom['Kabupaten'];?></td>
                                    <td>
                                        <?php
                                            $tg = $nom['Tanggal_Lahir'];
                                            $sts = 0;
                                            include('../date_conv.php');
                                            echo $tanggal;
                                        ?>
                                    </td>
                                    <td> <?php echo $nom['Umur_Anak'];?></td>
                                    <td> <?php echo $nom['Jenis_Kelamin'];?></td>
                                    <td> <?php echo $nom['Golongan_Darah'];?></td>
                                    <td> <?php echo $nom['No_KK'];?></td>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                            <td align=center>
                                                <?php echo "<button type='button' style='width:30%' class='btn btn-del' onclick='del(1, ".$no.")'>Hapus</button>"; ?>
                                                <?php echo "<button type='button' style='width:30%' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah</button>"; ?>
                                                <?php echo "<a class='btn btn-primary' style='width: 30%' href='index.php?page=detail_anak&idd=".$nom['NIK_Anak']."'>Lihat</a>"; ?>
                                            </td>

                                        <tr></tr>
                                        <?php echo "<tr id='delete".$no."' style='display: none;'>"; ?>
                                            <td colspan=11 align=center>
                                                <p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
                                                <?php echo "<button type='button' style='width: 45%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Batal</button>" ?>
                                                <?php echo "<a class='btn btn-del' style='width: 45%' href='hapus.php?idd=".$nom['NIK_Anak']."&type=anak'>Ya</a>"; ?>
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
                                            <td colspan=11 align=center><button type="button" class="btn btn-add" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no+1 ?></td>
                                                <td><input type="text" class="form-control" placeholder="NIK Anak" name="nik"></td>
                                                <td><input type="text" class="form-control" placeholder="Nama Anak" name="na"></td>
                                                <td>
                                                    <select class="form-control" name="tem">
                                                        <?php
                                                        $query11 = mysqli_query($koneksi, "SELECT * FROM `kabupaten`");
                                                        while ($nog = mysqli_fetch_array($query11)){
                                                        ?>
                                                        <option value=<?php echo $nog['Id_Kabupaten']?>> <?php echo $nog['Kabupaten'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td><input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl"></td>
                                                <td><input type="text" class="form-control" placeholder="Umur Anak" name="um"></td>
                                                <td>
                                                    <select class="form-control" name="kel">
                                                        <?php
                                                        $query6 = mysqli_query($koneksi, "SELECT * FROM `jenis_kelamin`");
                                                        while ($noy = mysqli_fetch_array($query6)){
                                                        ?>
                                                        <option value=<?php echo $noy['Id_Jenis_Kelamin']?>> <?php echo $noy['Jenis_Kelamin'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="dar">
                                                        <?php
                                                        $query7 = mysqli_query($koneksi, "SELECT * FROM `golongan_darah`");
                                                        while ($noi= mysqli_fetch_array($query7)){
                                                        ?>
                                                        <option value=<?php echo $noi['Id_Golongan_Darah']?>> <?php echo $noi['Golongan_Darah'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="kk">
                                                        <?php
                                                        $query9 = mysqli_query($koneksi, "SELECT * FROM `orang_tua`");
                                                        while ($noj= mysqli_fetch_array($query9)){
                                                        ?>
                                                        <option value=<?php echo $noj['No_KK']?>> <?php echo $noj['No_KK'];?> </option>
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
                                                    $sql=$koneksi->query("INSERT INTO `anak`(NIK_Anak, Nama_Anak, Tempat_Lahir, Tanggal_Lahir, Umur_Anak, Id_Jenis_Kelamin, Id_Golongan_Darah, No_KK) 
                                                        VALUES('$_POST[nik]', '$_POST[na]', '$_POST[tem]', '$_POST[tgl]', '$_POST[um]', '$_POST[kel]', '$_POST[dar]', '$_POST[kk]')
                                                    ");
                                                    if($sql){
                                                        echo "<script>window.location = 'index.php?page=anak'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=anak'</script>";
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
    function search(idx){
        nrow = 8;
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