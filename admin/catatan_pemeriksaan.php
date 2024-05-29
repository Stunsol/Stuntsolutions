<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Catatan Pemeriksaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Catatan Pemeriksaan</li>
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
                                    <th style="min-width: 200px;">
                                        Nama Anak
                                        <input class="form-control" type="search" id="co0" onkeyup="search(0)" placeholder="Cari Nama Anak...">
                                    </th>
                                    <th style="min-width: 250px;">
                                        Jadwal
                                        <input list="op_jd" class="form-control" type="search" id="co1" onkeyup="search(1)" placeholder="Cari Jadwal...">
                                        <datalist id="op_jd">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT *
                                                    FROM `jadwal`
                                                    INNER JOIN posyandu
                                                    ON jadwal.Id_Posyandu = posyandu.Id_Posyandu");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <?php
                                                    $tg = $op1['Tanggal'];
                                                    $sts = 1;
                                                    include('../date_conv.php');
                                                ?>
                                                <option><?php echo $op1['Nama_Posyandu'];?> - <?php echo $tanggal?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 175px;">
                                        Total Pencatatan
                                        <input class="form-control" type="search" id="co2" onkeyup="search(2)" placeholder="Cari Total Pencatatan...">
                                    </th>
                                    <th style="min-width: 175px;">
                                        Total Layanan
                                        <input class="form-control" type="search" id="co3" onkeyup="search(3)" placeholder="Cari Total Layanan...">
                                    </th>
                                    <th style="min-width: 200px;">
                                        Status Gizi
                                        <input list="op_sg" class="form-control" type="search" id="co4" onkeyup="search(4)" placeholder="Cari Status Gizi...">
                                        <datalist id="op_sg">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Status_Gizi FROM status_gizi");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Status_Gizi'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 300px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT *
                                        FROM `catatan_pemeriksaan`
                                        INNER JOIN `anak`
                                        ON catatan_pemeriksaan.NIK_Anak = anak.NIK_Anak
                                        INNER JOIN `jadwal`
                                        ON catatan_pemeriksaan.Id_Jadwal = jadwal.Id_Jadwal
                                        INNER JOIN `posyandu`
                                        ON jadwal.Id_Posyandu = posyandu.Id_Posyandu
                                        INNER JOIN `status_gizi`
                                        ON catatan_pemeriksaan.Id_Status_Gizi = status_gizi.Id_Status_Gizi
                                        ORDER BY Nama_Anak ASC");
                                    while ($nom = mysqli_fetch_array($query)){
                                        $no++
                                ?>
                                <!--Tabel form ubah-->
                                <?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
                                    <form method="post" enctype="multipart/form-data">
                                        <td align=center> <?php echo $no;?></td>
                                        <td>
                                            <select class='form-control' name='nik'>
                                                <?php
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM `anak`");
                                                    while ($nos = mysqli_fetch_array($query2)){
                                                ?>
                                                        <?php if($nom['NIK_Anak'] == $nos['NIK_Anak']){
                                                        ?>
                                                            <option value=<?php echo $nos['NIK_Anak'] ?> selected><?php echo $nos['Nama_Anak'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $nos['NIK_Anak'] ?>><?php echo $nos['Nama_Anak'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class='form-control' name='jdw'>
                                                <?php
                                                    $query2 = mysqli_query($koneksi, "SELECT *
                                                        FROM `jadwal`
                                                        INNER JOIN posyandu
                                                        ON jadwal.Id_Posyandu = posyandu.Id_Posyandu");
                                                    while ($nos = mysqli_fetch_array($query2)){
                                                ?>
                                                        <?php if($nom['Id_Jadwal'] == $nos['Id_Jadwal']){
                                                        ?>
                                                            <option selected value=<?php echo $nos['Id_Jadwal']?>> <?php echo $nos['Nama_Posyandu'];?> - <?php echo $nos['Tanggal'];?>  </option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Jadwal']?>> <?php echo $nos['Nama_Posyandu'];?> - <?php echo $nos['Tanggal'];?>  </option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Total Pencatatan' name='pen' value='".$nom['Total_Pencatatan']."'>"; ?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Total Layanan' name='lay' value='".$nom['Total_Layanan']."'>"; ?></td>
                                        <td>
                                            <select class='form-control' name='gz'>
                                                <?php
                                                    $query3 = mysqli_query($koneksi, "SELECT * FROM `status_gizi`");
                                                    while ($noa = mysqli_fetch_array($query3)){
                                                ?>
                                                        <?php if($nom['Id_Status_Gizi'] == $noa['Id_Status_Gizi']){
                                                        ?>
                                                            <option value=<?php echo $noa['Id_Status_Gizi'] ?> selected><?php echo $noa['Status_Gizi'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $noa['Id_Status_Gizi'] ?>><?php echo $noa['Status_Gizi'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                        <td align=center>
                                            <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
                                            <?php echo "<button type='submit' style='width:45%' name='update".$nom['Id_Catatan_Pemeriksaan']."' class='btn btn-sa'>Simpan</button>"; ?>
                                        </td>
                                    </form>
                                    <?php
                                        $ch = "update".$nom['Id_Catatan_Pemeriksaan'];
                                        if (isset($_POST[$ch])){
                                            $sql=$koneksi->query("UPDATE `catatan_pemeriksaan`
                                                SET `NIK_Anak` = '$_POST[nik]', `Id_Jadwal` = '$_POST[jdw]', `Total_Pencatatan` = '$_POST[pen]', `Total_Layanan` = '$_POST[lay]', `Id_Status_Gizi` = '$_POST[gz]'
                                                WHERE `Id_Catatan_Pemeriksaan` = '$nom[Id_Catatan_Pemeriksaan]'
                                            ");
                                            if($sql){
                                                echo "<script>window.location = 'index.php?page=catatan_pemeriksaan'</script>";
                                            }else{
                                                echo "<script>alert('Proses gagal'); window.location = 'index.php?page=catatan_pemeriksaaan'</script>";
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr></tr>
                                <!--Tabel normal-->
                                <?php echo "<tr id='normal".$no."'>"; ?>
                                    <td align=center> <?php echo $no;?>.</td>
                                    <td> <?php echo $nom['Nama_Anak'];?></td>
                                    <td>
                                        <?php
                                            $tg = $nom['Tanggal'];
                                            $sts = 1;
                                            include('../date_conv.php');
                                        ?>
                                        <?php echo $nom['Nama_Posyandu'];?> - <?php echo $tanggal ?>
                                    </td>
                                    <td> <?php echo $nom['Total_Pencatatan'];?></td>
                                    <td> <?php echo $nom['Total_Layanan'];?></td>
                                    <td> <?php echo $nom['Status_Gizi'];?></td>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                            <td align=center>
                                                <?php echo "<button type='button' style='width:30%' class='btn btn-del' onclick='del(1, ".$no.")'>Hapus</button>"; ?>
                                                <?php echo "<button type='button' style='width:30%' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah</button>"; ?>
                                                <?php echo "<a href='index.php?page=hasil&idd=".$nom['Id_Catatan_Pemeriksaan']."' style='width:30%' class='btn btn-primary'>Lihat</a>"; ?>
                                            </td>
                                        <tr></tr>
                                        <?php echo "<tr id='delete".$no."' style='display: none;'>"; ?>
                                            <td colspan=8 align=center>
                                                <p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Batal</button>" ?>
                                                <?php echo "<a class='btn btn-del' style='width: 45%' href='hapus.php?id=".$nom['Id_Catatan_Pemeriksaan']."&type=catatan_pemeriksaan'>Ya</a>"; ?>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tr>
                                <?php }?>
                                <!--Form Tambah Data-->
                                <?php
                                    if($Type == 'Admin' or $Type == 'Superadmin'){
                                ?>    
                                        <?php
                                            $cmax = mysqli_query($koneksi, "SELECT max(Id_Catatan_Pemeriksaan) as bat FROM `catatan_pemeriksaan`");
                                            $nox = mysqli_fetch_array($cmax);
                                            $IDD = $nox['bat'];
                                            $ord = (int) substr($IDD, 2, 3);
                                            $ord++;
                                            $IDD = "CP".sprintf("%03s", $ord);
                                        ?>
                                        <tr id="add_button">
                                            <td colspan=8 align=center><button type="button" class="btn btn-add" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no+1 ?></td>
                                                <td>
                                                    <select class="form-control" name="nik">
                                                        <?php
                                                        $no = 0;
                                                        $query4 = mysqli_query($koneksi, "SELECT * FROM `anak`");
                                                        while ($noe = mysqli_fetch_array($query4)){
                                                        ?>
                                                        <option value=<?php echo $noe['NIK_Anak']?>> <?php echo $noe['Nama_Anak'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="jdw">
                                                        <?php
                                                        $no = 0;
                                                        $query5 = mysqli_query($koneksi, "SELECT *
                                                            FROM `jadwal`
                                                            INNER JOIN posyandu
                                                            ON jadwal.Id_Posyandu = posyandu.Id_Posyandu");
                                                        while ($noy = mysqli_fetch_array($query5)){
                                                        ?>
                                                        <?php
                                                            $tg = $noy['Tanggal'];
                                                            $sts = 1;
                                                            include('../date_conv.php');
                                                        ?>
                                                        <option value=<?php echo $noy['Id_Jadwal']?>><?php echo $noy['Nama_Posyandu'];?> - <?php echo $tanggal?>  </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" placeholder="Total Pencatatan" name="pen"></td>
                                                <td><input type="text" class="form-control" placeholder="Total Layanan" name="lay"></td>
                                                <td>
                                                    <select class="form-control" name="gz">
                                                        <?php
                                                        $no = 0;
                                                        $query5 = mysqli_query($koneksi, "SELECT * FROM `status_gizi`");
                                                        while ($noy = mysqli_fetch_array($query5)){
                                                        ?>
                                                        <option value=<?php echo $noy['Id_Status_Gizi']?>> <?php echo $noy['Status_Gizi'];?> </option>
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
                                                    $sql=$koneksi->query("INSERT INTO `catatan_pemeriksaan`(Id_Catatan_Pemeriksaan, NIK_Anak, Id_Jadwal, Total_Pencatatan, Total_Layanan, Id_Status_Gizi) 
                                                        VALUES('$IDD', '$_POST[nik]', '$_POST[jdw]', '$_POST[pen]', '$_POST[lay]', '$_POST[gz]')
                                                    ");
                                                    if($sql){
                                                        echo "<script>window.location = 'index.php?page=catatan_pemeriksaan'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=catatan_pemeriksaan'</script>";
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
        nrow = 5;
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