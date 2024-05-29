<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kecamatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Kecamatan</li>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead> <!--Judul Tabel-->
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="35%">
                                        Kecamatan
                                        <input list="op_kec" class="form-control" type="search" id="co0" onkeyup="search(0)" placeholder="Cari Kecamatan...">
                                        <datalist id="op_kec">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Kecamatan FROM kecamatan");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Kecamatan'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th width="35%">
                                        Kabupaten/Kota
                                        <input list="op_kab" class="form-control" type="search" id="co1" onkeyup="search(1)" placeholder="Cari Kabupaten/Kota...">
                                        <datalist id="op_kab">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Kabupaten FROM kabupaten");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Kabupaten'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                        <th width="25%">Aksi</th>
                                    <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT *
                                        FROM `kecamatan`
                                        INNER JOIN `kabupaten`
                                        ON kecamatan.Id_Kabupaten = kabupaten.Id_Kabupaten
                                        ORDER BY Kecamatan ASC");
                                    while ($nom = mysqli_fetch_array($query)){
                                        $no++
                                ?>
                                <!--Tabel form ubah-->
								<?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
									<form method="post" enctype="multipart/form-data">
										<td align=center> <?php echo $no;?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='Kecamatan' name='je' value='".$nom['Kecamatan']."'>"; ?></td>
										<td>
                                            <select class='form-control' name='lay'>
                                                <?php
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM `kabupaten`");
                                                    while ($nos = mysqli_fetch_array($query2)){
                                                ?>
                                                        <?php if($nom['Id_Kabupaten'] == $nos['Id_Kabupaten']){
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Kabupaten'] ?> selected><?php echo $nos['Kabupaten'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Kabupaten'] ?>><?php echo $nos['Kabupaten'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
										<td align=center>
											<?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
											<?php echo "<button type='submit' style='width:45%' name='update".$nom['Id_Kecamatan']."' class='btn btn-sa'>Simpan</button>"; ?>
										</td>
									</form>
									<?php
										$ch = "update".$nom['Id_Kecamatan'];
										if (isset($_POST[$ch])){
											$sql=$koneksi->query("UPDATE `kecamatan`
												SET `Kecamatan` = '$_POST[je]', `Id_Kabupaten` = '$_POST[lay]'
												WHERE `Id_Kecamatan` = '$nom[Id_Kecamatan]'
											");
											if($sql){
												echo "<script>window.location = 'index.php?page=kecamatan'</script>";
											}else{
												echo "<script>alert('Proses gagal'); window.location = 'index.php?page=kecamatan'</script>";
											}
										}
									?>
								</tr>
								<tr></tr>
                                <!--Tabel normal-->
								<?php echo "<tr id='normal".$no."'>"; ?>
									<td align=center> <?php echo $no;?></td>
									<td> <?php echo $nom['Kecamatan'];?></td>
									<td> <?php echo $nom['Kabupaten'];?></td>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                            <td align=center>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-del' onclick='del(1, ".$no.")'>Hapus</button>"; ?>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah</button>"; ?>
                                            </td>

                                        <tr></tr>
                                        <?php echo "<tr id='delete".$no."' style='display: none;'>"; ?>
                                            <td colspan=4 align=center>
                                                <p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Batal</button>" ?>
                                                <?php echo "<a class='btn btn-del' style='width: 45%' href='hapus.php?id=".$nom['Id_Kecamatan']."&type=kecamatan'>Ya</a>"; ?>
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
                                            $cmax = mysqli_query($koneksi, "SELECT max(Id_Kecamatan) as bat FROM `kecamatan`");
                                            $nox = mysqli_fetch_array($cmax);
                                            $IDD = $nox['bat'];
                                            $ord = (int) substr($IDD, 3, 3);
                                            $ord++;
                                            $IDD = "Kec".sprintf("%03s", $ord);
                                        ?>
                                        <tr id="add_button">
                                            <td colspan=4 align=center><button type="button" class="btn btn-add" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no+1 ?></td>
                                                <td><input type="text" class="form-control" placeholder="Kecamatan" name="je"></td>
                                                <td>
                                                    <select class="form-control" name="lay">
                                                        <?php
                                                        $no = 0;
                                                        $query3 = mysqli_query($koneksi, "SELECT * FROM `kabupaten`");
                                                        while ($noa = mysqli_fetch_array($query3)){
                                                        ?>
                                                        <option value=<?php echo $noa['Id_Kabupaten']?>> <?php echo $noa['Kabupaten'];?> </option>
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
                                                    $sql=$koneksi->query("INSERT INTO `kecamatan`(Id_Kecamatan, Kecamatan, Id_Kabupaten) 
                                                        VALUES('$IDD', '$_POST[je]', '$_POST[lay]')
                                                    ");
                                                    if($sql){
                                                        echo "<script>window.location = 'index.php?page=kecamatan'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=kecamatan'</script>";
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