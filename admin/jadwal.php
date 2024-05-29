<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Jadwal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Jadwal</li>
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
                        <?php if($Type == 'Superadmin' or $Type == 'Admin'){ ?>
                            <input class="form-control" type="search" id="se" onkeyup="search()" placeholder="Cari Jadwal...">
                        <?php } else{?>
                            <input class="form-control" type="search" id="se" onkeyup="searchu()" placeholder="Cari Jadwal...">
                        <?php }?>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead> <!--Judul Tabel-->
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="20%">
                                        Posyandu
                                        <input list="op_pos" class="form-control" type="search" id="co0" onkeyup="search(0)" placeholder="Cari Nama Posyandu...">
                                        <datalist id="op_pos">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Nama_Posyandu FROM posyandu");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Nama_Posyandu'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th width="20%">
                                        Tanggal
                                        <input class="form-control" type="search" id="co1" onkeyup="search(1)" placeholder="Cari Tanggal...">
                                    </th>
                                    <th width="15%">
                                        Jam
                                        <input class="form-control" type="search" id="co2" onkeyup="search(2)" placeholder="Cari Jam...">
                                    </th>
                                    <th width="15%">
                                        Tempat
                                        <input class="form-control" type="search" id="co3" onkeyup="search(3)" placeholder="Cari Tempat...">
                                    </th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT *
                                        FROM `jadwal`
                                        INNER JOIN posyandu
                                        ON posyandu.Id_Posyandu = jadwal.Id_Posyandu
                                        ORDER BY Tanggal ASC");
                                    while ($nom = mysqli_fetch_array($query)){
                                        $no++
								?>
                                <!--Tabel form ubah-->
								<?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
									<form method="post" enctype="multipart/form-data">
										<td align=center> <?php echo $no;?></td>
                                        <td>
                                            <select class='form-control' name='pos'>
                                                <?php
                                                    $query3 = mysqli_query($koneksi, "SELECT * FROM `posyandu`");
                                                    while ($noq = mysqli_fetch_array($query3)){
                                                ?>
                                                        <?php if($nom['Id_Posyandu'] == $noq['Id_Posyandu']){
                                                        ?>
                                                            <option value=<?php echo $noq['Id_Posyandu'] ?> selected><?php echo $noq['Nama_Posyandu'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $noq['Id_Posyandu'] ?>><?php echo $noq['Nama_Posyandu'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
										<td> <?php echo "<input type='date' class='form-control' placeholder='Tanggal' name='tg' value='".$nom['Tanggal']."'>"; ?></td>
										<td> <?php echo "<input type='time' class='form-control' placeholder='Jam' name='jm' value='".$nom['Jam']."'>"; ?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='Tempat' name='tp' value='".$nom['Tempat']."'>"; ?></td>
										<td align=center>
											<?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
											<?php echo "<button type='submit' style='width:45%' name='update".$nom['Id_Jadwal']."' class='btn btn-sa'>Simpan</button>"; ?>
										</td>
									</form>
									<?php
										$ch = "update".$nom['Id_Jadwal'];
										if (isset($_POST[$ch])){
											$sql=$koneksi->query("UPDATE `jadwal`
												SET `Id_Posyandu` = '$_POST[pos]', `Hari` = '$_POST[hr]', `Tanggal` = '$_POST[tg]', `Jam` = '$_POST[jm]', `Tempat` = '$_POST[tp]'
												WHERE `Id_Jadwal` = '$nom[Id_Jadwal]'
											");
											if($sql){
												echo "<script>window.location = 'index.php?page=jadwal'</script>";
											}else{
												echo "<script>alert('Proses gagal'); window.location = 'index.php?page=jadwal'</script>";
											}
										}
									?>
								</tr>
								<tr></tr>
                                <!--Tabel normal-->
								<?php echo "<tr id='normal".$no."'>"; ?>
									<td align=center> <?php echo $no;?></td>
									<td> <?php echo $nom['Nama_Posyandu'];?></td>
									<td>
                                        <?php
                                            $tg = $nom['Tanggal'];
                                            $sts = 1;
                                            include('../date_conv.php');
                                            echo $tanggal;
                                        ?>
                                    </td>
									<td> <?php echo $nom['Jam'];?></td>
									<td> <?php echo $nom['Tempat'];?></td>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                            <td align=center>
                                                <?php echo "<button type='button' style='width:30%' class='btn btn-del' onclick='del(1, ".$no.")'>Hapus</button>"; ?>
                                                <?php echo "<button type='button' style='width:30%' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah</button>"; ?>
                                                <?php echo "<a class='btn btn-primary' style='width: 30%' href='index.php?page=jadwal_pemeriksaan&idd=".$nom['Id_Jadwal']."'>Lihat</a>"; ?>
                                            </td>

                                        <tr></tr>
                                        <?php echo "<tr id='delete".$no."' style='display: none;'>"; ?>
                                            <td colspan=7 align=center>
                                                <p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
                                                <?php echo "<button type='button' style='width:40%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Batal</button>" ?>
                                                <?php echo "<a class='btn btn-del' style='width:40%' href='hapus.php?id=".$nom['Id_Jadwal']."&type=jadwal'>Ya</a>"; ?>
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
                                            $cmax = mysqli_query($koneksi, "SELECT max(Id_Jadwal) as bat FROM `jadwal`");
                                            $nox = mysqli_fetch_array($cmax);
                                            $IDD = $nox['bat'];
                                            $ord = (int) substr($IDD, 2, 3);
                                            $ord++;
                                            $IDD = "JD".sprintf("%03s", $ord);
                                        ?>
                                        <tr id="add_button">
                                            <td colspan=7 align=center><button type="button" class="btn btn-add" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no+1 ?></td>
                                                <td>
                                                    <select class="form-control" name="pos">
                                                        <?php
                                                        $query5 = mysqli_query($koneksi, "SELECT * FROM `posyandu`");
                                                        while ($nou = mysqli_fetch_array($query5)){
                                                        ?>
                                                        <option value=<?php echo $nou['Id_Posyandu']?>> <?php echo $nou['Nama_Posyandu'];?> </option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td><input type="date" class="form-control" placeholder="Tanggal" name="tg"></td>
                                                <td><input type="time" class="form-control" placeholder="Jam" name="jm"></td>
                                                <td><input type="text" class="form-control" placeholder="Tempat" name="tp"></td>
                                                <td align=center>
                                                    <button type="button" style="width:45%" class="btn btn-secondary" onclick="add(0)">Batal</button>
                                                    <button type="submit" style="width:45%" name="insert" class="btn btn-sa">Tambah</button>
                                                </td>
                                            </form>
                                            <?php 
                                                if (isset($_POST['insert'])){
                                                    $sql=$koneksi->query("INSERT INTO jadwal(Id_Jadwal, Id_Posyandu, Hari, Tanggal, Jam, Tempat) 
                                                        VALUES('$IDD', '$_POST[pos]', '$_POST[hr]', '$_POST[tg]', '$_POST[jm]', '$_POST[tp]')
                                                    ");
                                                    if($sql){
                                                        echo "<script>window.location = 'index.php?page=jadwal'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=jadwal'</script>";
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
        nrow = 4;
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