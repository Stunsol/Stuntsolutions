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
                    <div class="card-body" style="overflow:auto">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="min-width: 50px;">No.</th>
                                    <th style="min-width: 200px;">
                                        Nama Posyandu
                                        <input list="op_nam" class="form-control" type="search" id="co0" onkeyup="search(0)" placeholder="Cari Nama Posyandu...">
                                        <datalist id="op_nam">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Nama_Posyandu FROM posyandu");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Nama_Posyandu'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 200px;">
                                        Nama Pemimpin
                                        <input class="form-control" type="search" id="co1" onkeyup="search(1)" placeholder="Cari Nama Pemimpin...">
                                    </th>
                                    <th style="min-width: 350px;">
                                        Alamat Posyandu
                                        <input class="form-control" type="search" id="co2" onkeyup="search(2)" placeholder="Cari Alamat...">
                                    </th>
                                    <th style="min-width: 175px;">
                                        No. Tlp Posyandu
                                        <input class="form-control" type="search" id="co3" onkeyup="search(3)" placeholder="Cari No. Tlp...">
                                    </th>
                                    <th style="min-width: 175px;">
                                        Kelurahan
                                        <input list="op_kel" class="form-control" type="search" id="co4" onkeyup="search(4)" placeholder="Cari Kelurahan...">
                                        <datalist id="op_kel">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Kelurahan FROM kelurahan");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Kelurahan'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th style="min-width: 300px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($Type != 'Admin'){
                                        $no = 0;
                                        $query = mysqli_query($koneksi, "SELECT *
                                            FROM `posyandu`
                                            INNER JOIN `kelurahan`
                                            ON posyandu.Id_Kelurahan = kelurahan.Id_Kelurahan
                                            ORDER BY Nama_Posyandu ASC");
                                    } else{
                                        $no = 0;
                                        $query2 = mysqli_query($koneksi, "SELECT * FROM `admin` WHERE Id = '$Id'");
                                        $ida = mysqli_fetch_array($query2);
                                        $query = mysqli_query($koneksi, "SELECT *
                                            FROM `posyandu`
                                            INNER JOIN `kelurahan`
                                            ON posyandu.Id_Kelurahan = kelurahan.Id_Kelurahan
                                            WHERE posyandu.Id_Posyandu = '$ida[Id_Posyandu]'
                                            ORDER BY Nama_Posyandu ASC");
                                    }
                                    while ($nom = mysqli_fetch_array($query)){
                                        $no++
                                ?>
                                <!--Tabel form ubah-->
                                <?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
                                    <form method="post" enctype="multipart/form-data">
                                        <td align=center> <?php echo $no;?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Nama Posyandu' name='na' value='".$nom['Nama_Posyandu']."'>"; ?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Nama Pemimpin' name='pim' value='".$nom['Nama_Pemimpin']."'>"; ?></td>
                                        <td> <?php echo "<input type='text' class='form-control' placeholder='Alamat Posyandu' name='alm' value='".$nom['Alamat_Posyandu']."'>"; ?></td>
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
                                        <td align=center>
                                            <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
                                            <?php echo "<button type='submit' style='width:45%' name='update".$nom['Id_Posyandu']."' class='btn btn-sa'>Simpan</button>"; ?>
                                        </td>
                                    </form>
                                    <?php
                                        $ch = "update".$nom['Id_Posyandu'];
                                        if (isset($_POST[$ch])){
                                            $sql=$koneksi->query("UPDATE `posyandu`
                                                SET `Nama_Posyandu` = '$_POST[na]',`Nama_Pemimpin` = '$_POST[pim]', `Alamat_Posyandu` = '$_POST[alm]', `No_Tlp_Posyandu` = '$_POST[tlp]', `Id_Kelurahan` = '$_POST[kel]'
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
                                    <td align=center> <?php echo $no;?></td>
                                    <td> <?php echo $nom['Nama_Posyandu'];?></td>
                                    <td> <?php echo $nom['Nama_Pemimpin'];?></td>
                                    <td> <?php echo $nom['Alamat_Posyandu'];?></td>
                                    <td> <?php echo $nom['No_Tlp_Posyandu'];?></td>
                                    <td> <?php echo $nom['Kelurahan'];?></td>
                                    <?php
                                        if($Type == 'Admin' or $Type == 'Superadmin'){
                                    ?>
                                            <td align=center>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-del' onclick='del(1, ".$no.")'>Hapus</button>"; ?>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah</button>"; ?>
                                            </td>

                                        <tr></tr>
                                        <?php echo "<tr id='delete".$no."' style='display: none;'>"; ?>
                                            <td colspan=7 align=center>
                                                <p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Batal</button>" ?>
                                                <?php echo "<a class='btn btn-del' style='width: 45%' href='hapus.php?id=".$nom['Id_Posyandu']."&type=posyandu'>Ya</a>"; ?>
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
                                            $cmax = mysqli_query($koneksi, "SELECT max(Id_Posyandu) as bat FROM `posyandu`");
                                            $nox = mysqli_fetch_array($cmax);
                                            $IDD = $nox['bat'];
                                            $ord = (int) substr($IDD, 3, 3);
                                            $ord++;
                                            $IDD = "Pos".sprintf("%03s", $ord);
                                        ?>
                                        <tr id="add_button">
                                            <td colspan=7 align=center><button type="button" class="btn btn-add" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no+1 ?></td>
                                                <td><input type="text" class="form-control" placeholder="Nama Posyandu" name="na"></td>
                                                <td><input type="text" class="form-control" placeholder="Nama Pemimpin" name="pim"></td>
                                                <td><input type="text" class="form-control" placeholder="Alamat Posyandu" name="alm"></td>
                                                <td><input type="text" class="form-control" placeholder="No. Tlp Posyandu" name="tlp"></td>
                                                <td>
                                                    <select class="form-control" name="kel">
                                                        <?php
                                                        $no = 0;
                                                        $query3 = mysqli_query($koneksi, "SELECT * FROM `kelurahan`");
                                                        while ($noa = mysqli_fetch_array($query3)){
                                                        ?>
                                                        <option value=<?php echo $noa['Id_Kelurahan']?>> <?php echo $noa['Kelurahan'];?> </option>
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
                                                    $sql=$koneksi->query("INSERT INTO `posyandu`(Id_Posyandu, Nama_Posyandu, Nama_Pemimpin, Alamat_Posyandu, No_Tlp_Posyandu, Id_Kelurahan) 
                                                        VALUES('$IDD', '$_POST[na]', '$_POST[pim]', '$_POST[alm]', '$_POST[tlp]', '$_POST[kel]')
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