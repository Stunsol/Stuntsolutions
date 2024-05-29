<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Status Kesejahteraan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Status Kesejahteraan</li>
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
                                    <th width="70%">
                                        Status Kesejahteraan
                                        <input list="op_sjh" class="form-control" type="search" id="co0" onkeyup="search(0)" placeholder="Cari Status Kesejahteraan...">
                                        <datalist id="op_sjh">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Status_Kesejahteraan FROM status_kesejahteraan");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Status_Kesejahteraan'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT * FROM `status_kesejahteraan` ORDER BY Status_Kesejahteraan ASC");
                                    while ($nom = mysqli_fetch_array($query)){
                                        $no++
								?>
                                <!--Tabel form ubah-->
								<?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
									<form method="post" enctype="multipart/form-data">
										<td align=center> <?php echo $no;?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='Status Kesejahteraan' name='na' value='".$nom['Status_Kesejahteraan']."'>"; ?></td>
										<td align=center>
											<?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Batal</button>" ?>
											<?php echo "<button type='submit' style='width:45%' name='update".$nom['Id_Status_Kesejahteraan']."' class='btn btn-sa'>Simpan</button>"; ?>
										</td>
									</form>
									<?php
										$ch = "update".$nom['Id_Status_Kesejahteraan'];
										if (isset($_POST[$ch])){
											$sql=$koneksi->query("UPDATE `status_kesejahteraan`
												SET `Status_Kesejahteraan` = '$_POST[na]'
												WHERE `Id_Status_Kesejahteraan` = '$nom[Id_Status_Kesejahteraan]'
											");
											if($sql){
												echo "<script>window.location = 'index.php?page=status_kesejahteraan'</script>";
											}else{
												echo "<script>alert('Proses gagal'); window.location = 'index.php?page=status_kesejahteraan'</script>";
											}
										}
									?>
								</tr>
								<tr></tr>
                                <!--Tabel normal-->
								<?php echo "<tr id='normal".$no."'>"; ?>
									<td align=center> <?php echo $no;?></td>
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
                                            <td colspan=3 align=center>
                                                <p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
                                                <?php echo "<button type='button' style='width:40%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Batal</button>" ?>
                                                <?php echo "<a class='btn btn-del' style='width:40%' href='hapus.php?id=".$nom['Id_Status_Kesejahteraan']."&type=status_kesejahteraan'>Ya</a>"; ?>
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
                                            $cmax = mysqli_query($koneksi, "SELECT max(Id_status_kesejahteraan) as bat FROM `status_kesejahteraan`");
                                            $nox = mysqli_fetch_array($cmax);
                                            $IDD = $nox['bat'];
                                            $ord = (int) substr($IDD, 2, 3);
                                            $ord++;
                                            $IDD = "SK".sprintf("%03s", $ord);
                                        ?>
                                        <tr id="add_button">
                                            <td colspan=3 align=center><button type="button" class="btn btn-add" onclick="add(1)">Tambah Data</button></td>
                                        </tr>
                                        <tr></tr>
                                        <tr id="add_form" style="display: none">
                                            <form method="post" enctype="multipart/form-data">
                                                <td align=center> <?php echo $no+1 ?></td>
                                                <td><input type="text" class="form-control" placeholder="Status Kesejahteraan" name="na"></td>
                                                <td align=center>
                                                    <button type="button" style="width:45%" class="btn btn-secondary" onclick="add(0)">Batal</button>
                                                    <button type="submit" style="width:45%" name="insert" class="btn btn-sa">Tambahkan</button>
                                                </td>
                                            </form>
                                            <?php 
                                                if (isset($_POST['insert'])){
                                                    $sql=$koneksi->query("INSERT INTO `status_kesejahteraan`(Id_Status_Kesejahteraan, Status_Kesejahteraan) 
                                                        VALUES('$IDD', '$_POST[na]')
                                                    ");
                                                    if($sql){
                                                        echo "<script>window.location = 'index.php?page=status_kesejahteraan'</script>";
                                                    }else{
                                                        echo "<script>alert('Proses gagal'); window.location = 'index.php?page=status_kesejahteraan'</script>";
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
        nrow = 1;
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