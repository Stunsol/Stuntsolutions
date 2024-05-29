<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Posyandu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Posyandu</li>
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
                            <input class="form-control" type="search" id="se" onkeyup="search()" placeholder="Cari Kabupaten..">
                        <?php } else{?>
                            <input class="form-control" type="search" id="se" onkeyup="searchu()" placeholder="Cari Kabupaten..">
                        <?php }?>
                    </div>

                    <div class="card-body" style="overflow: auto;">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No.</th>
                                    <th width="50px">Nama Posyandu</th>
                                    <th width="">Nama Pemimpin</th>
                                    <th>Alamat Posyandu</th>
                                    <th>No. Tlp Posyandu</th>
                                    <th>Kelurahan</th>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                        <th width="250px">Aksi</th>
                                    <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT *
                                        FROM `posyandu`
                                        INNER JOIN `kelurahan`
                                        ON posyandu.Id_Kelurahan = kelurahan.Id_Kelurahan
                                        ORDER BY Nama_Posyandu ASC");
                                    while ($nom = mysqli_fetch_array($query)){
                                        $no++
                                ?>
                                <!--Tabel form ubah-->
								<?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
									<form method="post" enctype="multipart/form-data">
										<td> <?php echo $no;?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='Nama Posyandu' name='na' value='".$nom['Nama_Posyandu']."'>"; ?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='Nama Pemimpin' name='pim' value='".$nom['Nama_Pemimpin']."'>"; ?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='Alamat Posyandu' name='al' value='".$nom['Alamat_Posyandu']."'>"; ?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='No. Tlp Posyandu' name='tlp' value='".$nom['No_Tlp_Posyandu']."'>"; ?></td>
										<td>
                                            <select class='form-control' name='kel'>
                                                <?php
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM `kelurahan`");
                                                    while ($nos = mysqli_fetch_array($query2)){
                                                ?>
                                                        <?php if($nom['Id_Kelurahan'] == $nos['Id_Kelurahan']){
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Kelurahan'] ?> selected><?php echo $nos['Kelurahan'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Kelurahan'] ?>><?php echo $nos['Kelurahan'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
										<td width=250px align=center>
											<?php echo "<button type='button' class='btn btn-secondary' onclick='change(0, ".$no.")'>Close</button>" ?>
											<?php echo "<button type='submit' name='update".$nom['Id_Posyandu']."' class='btn btn-primary'>Save changes</button>"; ?>
										</td>
									</form>
									<?php
										$ch = "update".$nom['Id_Posyandu'];
										if (isset($_POST[$ch])){
											$sql=$koneksi->query("UPDATE `posyandu`
												SET `Id_Posyandu` = '$_POST[kode]', `Nama_Posyandu` = '$_POST[na]', `Nama_Pemimpin` = '$_POST[pim]', `Alamat_Posyandu` = '$_POST[al]', `No_Tlp_Posyandu` = '$_POST[tlp]', `Id_Kelurahan` = '$_POST[kel]'
												WHERE `Id_Posyandu` = '$nom[Id_Posyandu]'
											");
											if($sql){
												echo "<script>window.location = 'index.php?page=posyandu'</script>";
											}else{
												echo "<script>alert('Proses gagal'); window.location = 'index.php?page=posyandu'</script>";
											}
										}
									?>
								</tr>
								<tr></tr>
                                <!--Tabel normal-->
								<?php echo "<tr id='normal".$no."'>"; ?>
									<td> <?php echo $no;?></td>
									<td> <?php echo $nom['Nama_Posyandu'];?></td>
									<td> <?php echo $nom['Nama_Pemimpin'];?></td>
									<td> <?php echo $nom['Alamat_Posyandu'];?></td>
									<td> <?php echo $nom['No_Tlp_Posyandu'];?></td>
									<td> <?php echo $nom['Kelurahan'];?></td>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                            <td width=250px align=center>
                                                <?php echo "<a class='btn btn-del' href='hapus.php?id=".$nom['Id_Posyandu']."&type=posyandu'>Hapus</a>"; ?>
                                                <?php echo "<button type='button' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah Data</button>"; ?>
                                            </td>
                                    <?php }?>
								</tr>
								<?php }?>
                                <!--Form Tambah Data-->
                                <?php
                                    if($Type == 'Admin' or $Type == 'Superadmin'){
                                ?>    
                                        <tr id="add_button">
                                            <td colspan=8 align=center><button type="button" class="btn btn-info" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td> <?php echo $no+1 ?></td>
                                                <td><input type="text" class="form-control" placeholder="Nama Posyandu" name="na"></td>
                                                <td><input type="text" class="form-control" placeholder="Nama Pemimpin" name="pim"></td>
                                                <td><input type="text" class="form-control" placeholder="Alamat Posyandu" name="al"></td>
                                                <td><input type="text" class="form-control" placeholder="No. Tlp Posyandu" name="tlp"></td>
                                                <td>
                                                    <select class='form-control' name='kel'>
                                                        <?php
                                                            $query2 = mysqli_query($koneksi, "SELECT * FROM `kelurahan`");
                                                            while ($nos = mysqli_fetch_array($query2)){
                                                        ?>
                                                                <?php if($nom['Id_Kelurahan'] == $nos['Id_Kelurahan']){
                                                                ?>
                                                                    <option value=<?php echo $nos['Id_Kelurahan'] ?> selected><?php echo $nos['Kelurahan'] ?></option>
                                                                <?php } else{
                                                                ?>
                                                                    <option value=<?php echo $nos['Id_Kelurahan'] ?>><?php echo $nos['Kelurahan'] ?></option>
                                                                <?php }?>
                                                            <?php }?>
                                                    </select>
                                                </td>
                                                <td align=center>
                                                    <button type="button" class="btn btn-secondary" onclick="add(0)">Close</button>
                                                    <button type="submit" name="insert" class="btn btn-primary">Save changes</button>
                                                </td>
                                            </form>
                                            <?php 
                                                if (isset($_POST['insert'])){
                                                    $sql=$koneksi->query("INSERT INTO `posyandu`(Id_Posyandu, Nama_Posyandu, Nama_Pemimpin, Alamat_Posyandu, No_Tlp_Posyandu, Id_Kelurahan) 
                                                        VALUES('$_POST[kode]', '$_POST[na]', '$_POST[pim]', '$_POST[al]', '$_POST[tlp]', '$_POST[kel]')
                                                    ");
                                                    if($sql){
                                                        echo "<script>window.location = 'index.php?page=posyandu'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=posyandu'</script>";
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
    function searchu(){
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("se");
        filter = input.value.toUpperCase();
        table = document.getElementById("example1");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++){
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                } else{
                    tr[i].style.display = "none";
                }
            }
            if(i%3 != 0){
                tr[i].style.display = "none";
            }
        }
    }

    function search(){
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("se");
        filter = input.value.toUpperCase();
        table = document.getElementById("example1");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++){
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                } else{
                    tr[i].style.display = "none";
                }
            }
			if(i%3 != 0 && i != tr.length-3){
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
</script>

<!--Tabel form ubah-->
<?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
									<form method="post" enctype="multipart/form-data">
										<td align=center> <?php echo $no;?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='Kelurahan' name='je' value='".$nom['Kelurahan']."'>"; ?></td>
										<td>
                                            <select class='form-control' name='lay'>
                                                <?php
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM `kecamatan`");
                                                    while ($nos = mysqli_fetch_array($query2)){
                                                ?>
                                                        <?php if($nom['Id_Kecamatan'] == $nos['Id_Kecamatan']){
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Kecamatan'] ?> selected><?php echo $nos['Kecamatan'] ?></option>
                                                        <?php } else{
                                                        ?>
                                                            <option value=<?php echo $nos['Id_Kecamatan'] ?>><?php echo $nos['Kecamatan'] ?></option>
                                                        <?php }?>
                                                    <?php }?>
                                            </select>
                                        </td>
										<td align=center>
											<?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
											<?php echo "<button type='submit' style='width:45%' name='update".$nom['Id_Kelurahan']."' class='btn btn-sa'>Simpan</button>"; ?>
										</td>
									</form>
									<?php
										$ch = "update".$nom['Id_Kelurahan'];
										if (isset($_POST[$ch])){
											$sql=$koneksi->query("UPDATE `kelurahan`
												SET `Kelurahan` = '$_POST[je]', `Id_Kecamatan` = '$_POST[lay]'
												WHERE `Id_Kelurahan` = '$nom[Id_Kelurahan]'
											");
											if($sql){
												echo "<script>window.location = 'index.php?page=kelurahan'</script>";
											}else{
												echo "<script>alert('Proses gagal'); window.location = 'index.php?page=kelurahan'</script>";
											}
										}
									?>
								</tr>
								<tr></tr>