<?php
$no = 0;
$query1 = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Id = '$Id'");
$noo = mysqli_fetch_array($query1);
$query = mysqli_query($koneksi, "SELECT *
    FROM catatan_pemeriksaan
    INNER JOIN anak
    ON catatan_pemeriksaan.NIK_Anak = anak.NIK_Anak
    INNER JOIN jadwal
    on catatan_pemeriksaan.Id_Jadwal = jadwal.Id_Jadwal
    INNER JOIN posyandu
    ON jadwal.Id_Posyandu = posyandu.Id_Posyandu
    WHERE anak.No_KK = '$noo[No_KK]'
    ORDER BY Tanggal");
?>
<section class="slider_section long_section">
    <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div style="width: 100%">
            <ol style="background: none" class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Pencatatan</li>
            </ol>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container " style="padding-top: 0px;">
            <div class="row">
                <div style="width: 60%">
                    <div class="detail-box">
                        <h1>
                        Catatan Pemeriksaan Anak dengan No. KK
                        <br>
                        <?php echo $noo['No_KK'] ?>
                        </h1>
                    </div>
                </div>
                <div  style="width: 40%">
                <div class="img-box">
                    <img src="images/catatan.gif" style="width: 35%; float: right" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div style="overflow: auto; margin-top: 25px; margin-bottom: 25px">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="min-width: 50px; vertical-align: middle">No.</th>
                    <th style="min-width: 200px;">
                        Nama Anak
                        <input class="form-control" type="search" id="co0" onkeyup="search(0)" list="op_nam" placeholder="Cari Nama Anak...">
                        <datalist id="op_nam">
                            <?php
                                $q1 = mysqli_query($koneksi, "SELECT Nama_Anak FROM anak WHERE No_KK = $noo[No_KK]");
                                while($op1 = mysqli_fetch_array($q1)){
                            ?>
                                <option><?php echo $op1['Nama_Anak'] ?></option>
                            <?php }?>
                        </datalist>
                    </th>
                    <th style="min-width: 175px;">
                        NIK Anak
                        <input class="form-control" type="search" id="co1" onkeyup="search(1)" list="op_nik" placeholder="Cari NIK Anak...">
                        <datalist id="op_nik">
                            <?php
                                $q1 = mysqli_query($koneksi, "SELECT NIK_Anak FROM anak WHERE No_KK = $noo[No_KK]");
                                while($op1 = mysqli_fetch_array($q1)){
                            ?>
                                <option><?php echo $op1['NIK_Anak'] ?></option>
                            <?php }?>
                        </datalist>
                    </th>
                    <th style="min-width: 300px;">
                        Tanggal Pemeriksaan
                        <input class="form-control" type="search" id="co2" onkeyup="search(2)" placeholder="Cari Tanggal...">
                    </th>
                    <th style="min-width: 200px; vertical-align: middle">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    while ($nom = mysqli_fetch_array($query)){
                        $no++
                ?>
                <!--Tabel normal-->
                <?php echo "<tr id='normal".$no."'>"; ?>
                    <td style="vertical-align: middle;" align=center> <?php echo $no;?></td>
                    <td style="vertical-align: middle;"> <?php echo $nom['Nama_Anak'];?></td>
                    <td style="vertical-align: middle;"> <?php echo $nom['NIK_Anak'];?></td>
                    <td style="vertical-align: middle;">
                        <?php
                            $tg = $nom['Tanggal'];
                            $sts = 1;
                            include('../date_conv.php');
                            echo $tanggal;
                        ?>
                    </td>
                    <td style="vertical-align: middle;" align=center>
                        <?php echo "<a style='width:90%' href='index.php?page=detail_catatan&Catatan=".$nom['Id_Catatan_Pemeriksaan']."' class='btn btn-add'>Lihat Selengkapnya</a>"; ?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</section>

<script>
    function search(idx){
        nrow = 3;
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