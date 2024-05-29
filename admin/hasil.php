<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Hasil Pemeriksaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="index.php?page=catatan_pemeriksaan">Catatan Pemeriksaan</a></li>
                    <li class="breadcrumb-item active">Hasil Pemeriksaan</li>
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
                        <?php
                            $q1 = mysqli_query($koneksi, "SELECT *
                                FROM catatan_pemeriksaan
                                INNER JOIN anak
                                ON catatan_pemeriksaan.NIK_Anak = anak.NIK_Anak
                                INNER JOIN jadwal
                                ON catatan_pemeriksaan.Id_Jadwal = jadwal.Id_Jadwal
                                INNER JOIN posyandu
                                ON jadwal.Id_Posyandu = posyandu.Id_Posyandu
                                WHERE Id_Catatan_Pemeriksaan = '$_GET[idd]'");
                            $qdata = mysqli_fetch_array($q1);
                        ?>
                        <table id="example2" class="table table-bordered table-striped">
                            <tr>
                                <td width=30%>Nama Anak</td>
                                <td width=70%><?php echo $qdata['Nama_Anak'] ?></td>
                            </tr>
                            <tr>
                                <td width=30%>NIK Anak</td>
                                <td width=70%><?php echo $qdata['NIK_Anak'] ?></td>
                            </tr>
                            <tr>
                                <td width=30%>Tanggal Pencatatan</td>
                                <td width=70%>
                                    <?php
                                        $tg = $qdata['Tanggal'];
                                        $sts = 1;
                                        include('../date_conv.php');
                                        echo $tanggal;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td width=30%>Posyandu Pemeriksa</td>
                                <td width=70%><?php echo $qdata['Nama_Posyandu'] ?></td>
                            </tr>
                            <tr>
                                <td width=30%>Total Pencatatan</td>
                                <td width=70%><?php echo $qdata['Total_Pencatatan'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body" style="overflow:auto">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="25%">
                                        Jenis Pemeriksaan
                                        <input class="form-control" type="search" id="co0" onkeyup="search(0)" list="op_jp" placeholder="Cari Jenis Pemeriksaan...">
                                        <datalist id="op_jp">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Jenis_Pemeriksaan FROM jenis_pemeriksaan");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Jenis_Pemeriksaan'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th width="20%">
                                        Hasil Pemeriksaan
                                        <input class="form-control" type="search" id="co1" onkeyup="search(1)" placeholder="Cari Hasil Pemeriksaan...">
                                    </th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    $q2 = mysqli_query($koneksi, "SELECT *
                                        FROM `hasil_pemeriksaan`
                                        INNER JOIN `jenis_pemeriksaan`
                                        ON hasil_pemeriksaan.Id_Jenis_Pemeriksaan = jenis_pemeriksaan.Id_Jenis_Pemeriksaan
                                        WHERE hasil_pemeriksaan.Id_Catatan_Pemeriksaan = '$_GET[idd]'");
                                    while ($nom = mysqli_fetch_array($q2)){
                                        $no++
                                ?>
                                <!--Tabel form ubah-->
                                <?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
                                    <form method="post" enctype="multipart/form-data">
                                        <td align=center> <?php echo $no;?></td>
                                        <td>
                                            <select class='form-control' name='jns'>
                                                <?php
                                                    $query3 = mysqli_query($koneksi, "SELECT * FROM `jenis_pemeriksaan`");
                                                    while ($noa = mysqli_fetch_array($query3)){
                                                ?>
                                                        <?php if($nom['Id_Jenis_Pemeriksaan'] == $noa['Id_Jenis_Pemeriksaan']){
                                                        ?>
                                                            <option value=<?php echo $noa['Id_Jenis_Pemeriksaan'] ?> selected><?php echo $noa['Jenis_Pemeriksaan'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $noa['Id_Jenis_Pemeriksaan'] ?>><?php echo $noa['Jenis_Pemeriksaan'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Hasil Pemeriksaan' name='hsl' value='".$nom['Hasil_Pemeriksaan']."'>"; ?></td>
                                        <td align=center>
                                            <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
                                            <?php echo "<button type='submit' style='width:45%' name='update".$nom['Id_Catatan_Pemeriksaan']."&".$nom['Id_Jenis_Pemeriksaan']."' class='btn btn-sa'>Simpan</button>"; ?>
                                        </td>
                                    </form>
                                    <?php
                                        $ch = "update".$nom['Id_Catatan_Pemeriksaan']."&".$nom['Id_Jenis_Pemeriksaan'];
                                        if (isset($_POST[$ch])){
                                            $sql=$koneksi->query("UPDATE `hasil_pemeriksaan`
                                                SET `Id_Jenis_Pemeriksaan` = '$_POST[jns]', `Hasil_Pemeriksaan` = '$_POST[hsl]'
                                                WHERE `Id_Catatan_Pemeriksaan` = '$_GET[idd]' AND `Id_Jenis_Pemeriksaan` = '$nom[Id_Jenis_Pemeriksaan]'
                                            ");
                                            if($sql){
                                                echo "<script>window.location = 'index.php?page=hasil&idd=".$_GET['idd']."'</script>";
                                            }else{
                                                echo "<script>alert('Proses gagal'); window.location = 'index.php?page=hasil_pemeriksaaan'</script>";
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr></tr>
                                <!--Tabel normal-->
                                <?php echo "<tr id='normal".$no."'>"; ?>
                                    <td align=center> <?php echo $no;?></td>
                                    <td> <?php echo $nom['Jenis_Pemeriksaan'];?></td>
                                    <td> <?php echo $nom['Hasil_Pemeriksaan'];?></td>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                            <td align=center>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-del' onclick='del(1, ".$no.")'>Hapus</button>"; ?>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah</button>"; ?>
                                            </td>

                                        <tr></tr>
                                        <?php echo "<tr id='delete".$no."' style='display: none;'>"; ?>
                                            <td colspan=5 align=center>
                                                <p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Batal</button>" ?>
                                                <?php echo "<a class='btn btn-del' style='width: 45%' href='hapus.php?idc=".$nom['Id_Catatan_Pemeriksaan']."&idj=".$nom['Id_Jenis_Pemeriksaan']."&type=hasil'>Ya</a>"; ?>
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
                                            <td colspan=5 align=center><button type="button" class="btn btn-add" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no+1 ?></td>
                                                <td>
                                                    <select class="form-control" name="jns">
                                                        <?php
                                                        $no = 0;
                                                        $query5 = mysqli_query($koneksi, "SELECT * FROM `jenis_pemeriksaan`");
                                                        while ($noy = mysqli_fetch_array($query5)){
                                                        ?>
                                                        <option value=<?php echo $noy['Id_Jenis_Pemeriksaan']?>> <?php echo $noy['Jenis_Pemeriksaan'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" placeholder="Hasil Pemeriksaan" name="hsl"></td>
                                                <td align=center>
                                                    <button type="button" style="width:45%" class="btn btn-secondary" onclick="add(0)">Batal</button>
                                                    <button type="submit" style="width:45%" name="insert" class="btn btn-sa">Simpan</button>
                                                </td>
                                            </form>
                                            <?php 
                                                if (isset($_POST['insert'])){
                                                    $sql=$koneksi->query("INSERT INTO `hasil_pemeriksaan`(Id_Catatan_Pemeriksaan, Id_Jenis_Pemeriksaan, Hasil_Pemeriksaan) 
                                                        VALUES('$_GET[idd]', '$_POST[jns]', '$_POST[hsl]')
                                                    ");
                                                    $ttl = mysqli_query($koneksi, "SELECT COUNT(Id_Jenis_Pemeriksaan) AS t
                                                        FROM hasil_pemeriksaan
                                                        WHERE Id_Catatan_Pemeriksaan = '$_GET[idd]'");
                                                    $sss = mysqli_fetch_array($ttl)['t']++;
                                                    $sql2=$koneksi->query("UPDATE `catatan_pemeriksaan`
                                                        SET `Total_Pencatatan` = $sss
                                                        WHERE `Id_Catatan_Pemeriksaan` = '$_GET[idd]'
                                                    ");
                                                    if($sql AND $sql2){
                                                        echo "<script>window.location = 'index.php?page=hasil&idd=".$_GET['idd']."'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=hasil_pemeriksaan'</script>";
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
        nrow = 2;
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
