<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Admin</li>
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
                    <?php
                        if($Type == 'Superadmin'){
                    ?>
                            <div class="card-header">
                                <?php if($Type == 'Superadmin' or $Type == 'Admin'){ ?>
                                    <input class="form-control" type="search" id="se" onkeyup="search()" placeholder="Cari Admin...">
                                <?php } else{?>
                                    <input class="form-control" type="search" id="se" onkeyup="searchu()" placeholder="Cari Admin...">
                                <?php }?>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead> <!--Judul Tabel-->
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="15%">Username</th>
                                            <th width="15%">Password</th>
                                            <th width="20%">Nama</th>
                                            <th width="20%">Posyandu</th>
                                            <th width="25%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi, "SELECT *
                                            FROM `admin`
                                            INNER JOIN `posyandu`
                                            ON admin.Id_Posyandu = posyandu.Id_Posyandu
                                            ORDER BY Username ASC");
                                            while ($nom = mysqli_fetch_array($query)){
                                                $no++
                                        ?>
                                        <!--Tabel form ubah-->
                                        <?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no;?></td>
                                                <td> <?php echo "<input type='text' class='form-control' placeholder='Username' name='un' value='".$nom['Username']."'>"; ?></td>
                                                <td> <?php echo "<input type='text' class='form-control' placeholder='Password' name='pa' value='".$nom['Password']."'>"; ?></td>
                                                <td> <?php echo "<input type='text' class='form-control' placeholder='Nama' name='na' value='".$nom['Nama']."'>"; ?></td>
                                                <td>
                                                    <select class='form-control' name='lay'>
                                                        <?php
                                                            $queryp = mysqli_query($koneksi, "SELECT * FROM `posyandu`");
                                                            while ($nopp = mysqli_fetch_array($queryp)){
                                                        ?>
                                                            <?php if($nom['Id_Posyandu'] == $nopp['Id_Posyandu']){?>
                                                                <option value=<?php echo $nopp['Id_Posyandu'] ?> selected><?php echo $nopp['Nama_Posyandu'] ?></option>
                                                                
                                                            <?php } else {?>
                                                                <option value=<?php echo $nopp['Id_Posyandu'] ?>><?php echo $nopp['Nama_Posyandu'] ?></option>
                                                            <?php }?>
                                                            
                                                            <?php }?>
                                                    </select>
                                                </td>
                                                <td align=center>
                                                    <?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
                                                    <?php echo "<button type='submit' style='width:45%' name='update".$nom['Id']."' class='btn btn-sa'>Simpan</button>"; ?>
                                                </td>
                                            </form>
                                            <?php
                                                $ch = "update".$nom['Id'];
                                                if (isset($_POST[$ch])){
                                                    $sql=$koneksi->query("UPDATE `admin`
                                                        SET `Username` = '$_POST[un]', `Password` = '$_POST[pa]', `Nama` = '$_POST[na]', `Id_Posyandu` = '$_POST[lay]'
                                                        WHERE `Id` = '$nom[Id]'
                                                    ");
                                                    if($sql){
                                                        echo "<script>window.location = 'index.php?page=admin'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=admin'</script>";
                                                    }
                                                }
                                            ?>
                                        </tr>
                                        <tr></tr>
                                        <!--Tabel normal-->
                                        <?php echo "<tr id='normal".$no."'>"; ?>
                                            <td align=center> <?php echo $no;?></td>
                                            <td> <?php echo $nom['Username'];?></td>
                                            <td> <?php echo $nom['Password'];?></td>
                                            <td> <?php echo $nom['Nama'];?></td>
                                            <td> <?php echo $nom['Nama_Posyandu'];?></td>
                                            <td align=center>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-del' onclick='del(1, ".$no.")'>Hapus</button>"; ?>
                                                <?php echo "<button type='button' style='width:45%' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah</button>"; ?>
                                            </td>

                                        <tr></tr>
                                        <?php echo "<tr id='delete".$no."' style='display: none;'>"; ?>
                                            <td colspan=6 align=center>
                                                <p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
                                                <?php echo "<button type='button' style='width:40%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Batal</button>" ?>
                                                <?php echo "<a class='btn btn-del' style='width:40%' href='hapus.php?id=".$nom['Id']."&type=admin'>Ya</a>"; ?>
                                            </td>
                                        </tr>
                                        </tr>
                                        <?php }?>
                                        <!--Form Tambah Data-->
                                        <?php
                                            $cmax = mysqli_query($koneksi, "SELECT max(Id) as bat FROM `admin`");
                                            $nox = mysqli_fetch_array($cmax);
                                            $IDD = $nox['bat'];
                                            $ord = (int) substr($IDD, 3, 3);
                                            $ord++;
                                            $IDD = "Adm".sprintf("%03s", $ord);
                                        ?>
                                        <tr id="add_button">
                                            <td colspan=6 align=center><button type="button" class="btn btn-add" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no+1 ?></td>
                                                <td><input type="text" class="form-control" placeholder="Username" name="un"></td>
                                                <td><input type="text" class="form-control" placeholder="Password" name="pa"></td>
                                                <td><input type="text" class="form-control" placeholder="Nama" name="na"></td>
                                                <td>
                                                    <select class='form-control' name='pos'>
                                                        <?php
                                                            $querypp = mysqli_query($koneksi, "SELECT * FROM `posyandu`");
                                                            while ($noppp = mysqli_fetch_array($querypp)){
                                                        ?>
                                                            <option value=<?php echo $noppp['Id_Posyandu'] ?> selected><?php echo $noppp['Nama_Posyandu'] ?></option>
                                                            
                                                            <?php }?>
                                                    </select>
                                                </td>
                                                <td align=center>
                                                    <button type="button" style="width:45%" class="btn btn-secondary" onclick="add(0)">Batal</button>
                                                    <button type="submit" style="width:45%" name="insert" class="btn btn-sa">Tambahkan</button>
                                                </td>
                                            </form>
                                            <?php 
                                                if (isset($_POST['insert'])){
                                                    $sql=$koneksi->query("INSERT INTO `admin`(Id, Username, Password, Nama, Id_Posyandu) 
                                                        VALUES('$IDD', '$_POST[un]', '$_POST[pa]', '$_POST[na]', '$_POST[pos]')
                                                    ");
                                                    if($sql){
                                                        echo "<script>window.location = 'index.php?page=admin'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=admin'</script>";
                                                    }
                                                }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    <?php } else{?>
                            <div class="card-header">
                                <h3 style="color:red">Anda tidak memiliki otoritas untuk ini!</h3>
                            </div>
                    <?php }?>
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
            td = tr[i].getElementsByTagName("td")[1];
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
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                } else{
                    tr[i].style.display = "none";
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