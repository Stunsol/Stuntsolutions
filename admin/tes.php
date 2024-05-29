<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Tes</li>
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
						<input class="form-control" type="search" id="se" onkeyup="search()" placeholder="Search for names..">
					</div>
					
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width='3%'>No.</th>
									<th width="35%">Name</th>
									<th width="35%">Item</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no = 0;
									$query = mysqli_query($koneksi, "SELECT * FROM `tes` ORDER BY Name ASC");
									while ($nom = mysqli_fetch_array($query)){
										$no++
								?>
								<?php echo "<tr id='change_form".$no."' style='display:none'>"; ?>
									<form method="post" enctype="multipart/form-data">
										<td width='3%'> <?php echo $no;?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='New Name' name='na' value='".$nom['Name']."'>"; ?></td>
										<td> <?php echo "<input type='text' class='form-control' placeholder='New Item' name='it' value='".$nom['Item']."'>"; ?></td>
										<td align=center>
											<?php echo "<button type='button' style='width:45%' class='btn btn-secondary' onclick='change(0, ".$no.")'>Close</button>" ?>
											<?php echo "<button type='submit' style='width:45%' name='update".$nom['ID']."' class='btn btn-sa'>Save changes</button>"; ?>
										</td>
									</form>
									<?php
										$ch = "update".$nom['ID'];
										if (isset($_POST[$ch])){
											$sql=$koneksi->query("UPDATE `tes`
												SET `Name` = '$_POST[na]', `Item` = '$_POST[it]'
												WHERE `ID` = '$nom[ID]'
											");
											if($sql){
												echo "<script>window.location = 'index.php?page=tes'</script>";
											}else{
												echo "<script>alert('Proses gagal'); window.location = 'index.php?page=tes'</script>";
											}
										}
									?>
								</tr>
								<tr></tr>
								<?php echo "<tr id='normal".$no."'>"; ?>
									<td> <?php echo $no;?></td>
									<td> <?php echo $nom['Name'];?></td>
									<td> <?php echo $nom['Item'];?></td>
									<td align=center>
										<?php echo "<button type='button' style='width:45%' class='btn btn-del' onclick='del(1, ".$no.")'>Hapus Data</button>"; ?>
										<?php echo "<button type='button' style='width:45%' class='btn btn-cha' onclick='change(1, ".$no.")'>Ubah Data</button>"; ?>
									</td>
								</tr>
								<tr></tr>
								<?php echo "<tr id='delete".$no."' style='display: none;'>"; ?>
									<td colspan=4 align=center>
										<p style="color:red"><b>Anda yakin ingin menghapus data tersebut?</b></p>
										<?php echo "<button type='button' style='width:40%' class='btn btn-secondary' onclick='del(0, ".$no.")'>Close</button>" ?>
										<?php echo "<a class='btn btn-del' style='width:40%' href='hapus.php?id=".$nom['ID']."&type=tes'>Hapus</a>"; ?>
									</td>
								</tr>



								<?php }?>
								<tr id="add_button">
									<td colspan=4 align=center><button type="button" class="btn btn-info" onclick="add(1)">Tambah Data</button></td>
								</tr>
								<tr></tr>
								<tr id="add_form" style="display: none">
									<form method="post" enctype="multipart/form-data">
										<td> <?php echo $no+1 ?></td>
										<td><input type="text" class="form-control" placeholder="Name" name="na"></td>
										<td><input type="text" class="form-control" placeholder="Item" name="it"></td>
										<td align=center>
											<button type="button" style='width:45%' class="btn btn-secondary" onclick="add(0)">Close</button>
											<button type="submit" style='width:45%' name="insert" class="btn btn-sa">Save changes</button>
										</td>
									</form>
									<?php 
										if (isset($_POST['insert'])){
											$sql=$koneksi->query("INSERT INTO `tes`(Name, Item) 
												VALUES('$_POST[na]', '$_POST[it]')
											");
											if($sql){
												echo "<script>window.location = 'index.php?page=tes'</script>";
											}else{
												echo "<script>alert('Proses gagal'); window.location = 'index.php?page=tes'</script>";
											}
										}
									?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>

<script>
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
			if(i%5 != 3 && i != tr.length-3 && i != 0){
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