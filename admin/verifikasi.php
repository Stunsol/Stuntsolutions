<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Verifikasi Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Verifikasi Data</li>
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
                            <input class="form-control" type="search" id="se" onkeyup="search()" placeholder="Cari Daftar Layanan...">
                        <?php } else{?>
                            <input class="form-control" type="search" id="se" onkeyup="searchu()" placeholder="Cari Daftar Layanan...">
                        <?php }?>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead> <!--Judul Tabel-->
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="15%">
                                        Data
                                        <input class="form-control" type="search" id="co0" onkeyup="search(0)" list="op_data" placeholder="Cari Data...">
                                        <datalist id="op_data">
                                            <option>Anak</option>
                                            <option>Orang Tua</option>
                                        </datalist>
                                    </th>
                                    <th width="20%">
                                        NIK / NKK
                                        <input class="form-control" type="search" id="co1" onkeyup="search(1)" list="op_id" placeholder="Cari NIK/NKK...">
                                        <datalist id="op_id">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT NIK_Anak FROM anak");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['NIK_Anak'] ?></option>
                                            <?php }?>
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT No_KK FROM orang_tua");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['No_KK'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th width="15%">
                                        Status Verifikasi
                                        <input class="form-control" type="search" id="co2" onkeyup="search(2)" list="op_jp" placeholder="Cari Status Verifikasi...">
                                        <datalist id="op_jp">
                                            <?php
                                                $q1 = mysqli_query($koneksi, "SELECT Status_Verifikasi FROM status_verifikasi WHERE Id_Status_Verifikasi <> 'SV004'");
                                                while($op1 = mysqli_fetch_array($q1)){
                                            ?>
                                                <option><?php echo $op1['Status_Verifikasi'] ?></option>
                                            <?php }?>
                                        </datalist>
                                    </th>
                                    <th width="20%">
                                        Tanggal Pengajuan
                                        <input class="form-control" type="search" id="co3" onkeyup="search(3)" placeholder="Cari Tanggal Pengajuan...">
                                    </th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT *
                                    FROM(
                                        SELECT 'Orang Tua' AS Tipe, Id_Status_Verifikasi, No_KK AS Idd, Tanggal_Pengajuan
                                        FROM `orang_tua`
                                        UNION ALL
                                        SELECT 'Anak' AS Tipe, Id_Status_Verifikasi, NIK_Anak As Idd, Tanggal_Pengajuan
                                        FROM `anak`
                                    ) as table1
                                    INNER JOIN `status_verifikasi`
                                    ON status_verifikasi.Id_Status_Verifikasi = table1.Id_Status_Verifikasi AND table1.Id_Status_Verifikasi <> 'SV004'");
                                    while ($nom = mysqli_fetch_array($query)){
                                        $no++
								?>
                                <!--Tabel normal-->
								<?php echo "<tr id='normal".$no."'>"; ?>
									<td align=center> <?php echo $no;?></td>
									<td><?php echo $nom['Tipe'] ?></td>
									<td><?php echo $nom['Idd'] ?></td>
                                    <td><?php echo $nom['Status_Verifikasi'] ?></td>
                                    <td>
                                        <?php
                                            $tg = $nom['Tanggal_Pengajuan'];
                                            $sts = 1;
                                            include('../date_conv.php');
                                            echo $tanggal;
                                        ?>
                                    </td>
                                    <td align=center>
                                        <?php echo "<a style='width:90%' class='btn btn-add' href='index.php?page=konfirmasi_verifikasi&Tipe=".$nom['Tipe']."&Idd=".$nom['Idd']."'>Lihat Selengkapnya</button>"; ?>
                                    </td>
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
        }
    }
</script>