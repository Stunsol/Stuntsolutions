<?php
$query1 = mysqli_query($koneksi, "SELECT * 
    FROM anak
    INNER JOIN jenis_kelamin
    ON anak.Id_Jenis_Kelamin = jenis_kelamin.Id_Jenis_Kelamin
    INNER JOIN golongan_darah
    ON anak.Id_Golongan_Darah = golongan_darah.Id_Golongan_Darah
    INNER JOIN kabupaten
    ON anak.Tempat_Lahir = kabupaten.Id_Kabupaten
    WHERE anak.NIK_Anak = '$_GET[NIK]'
    ORDER BY NIK_Anak");
$nom = mysqli_fetch_array($query1);
?>

<style>
    th{
        text-align: left;
    }
</style>

<section class="slider_section long_section">
    <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div style="width: 100%">
            <ol style="background: none" class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=anak">Anak</a></li>
                <li class="breadcrumb-item active">Detail Anak - <?php echo $_GET['NIK'] ?></li>
            </ol>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container " style="padding-top: 25px;">
            <div class="row">
                <div style="width: 60%">
                    <div class="detail-box">
                        <h1>
                        Detail Anak dengan NIK
                        <br>
                        <?php echo $_GET['NIK'] ?>
                        </h1>
                    </div>
                </div>
                <div  style="width: 40%">
                <div class="img-box">
                    <img src="images/baby-boy.gif" style="width: 35%; float: right" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div style="overflow: auto; margin-top: 25px; margin-bottom: 25px">
        <table id="example2" class="table table-bordered table-striped">
            <tr>
                <th style="width: 25%">Nama Anak</th>
                <td style="width: 25%"> <?php echo $nom['Nama_Anak'];?></td>
                <th style="width: 25%">NIK Anak</th>
                <td style="width: 25%"> <?php echo $nom['NIK_Anak'];?></td>
            </tr>
            <tr>
                <th style="min-width: 200px;">Tempat, Tanggal Lahir</th>
                <td style="vertical-align: middle;">
                    <?php
                        $tg = $nom['Tanggal_Lahir'];
                        $sts = 0;
                        include('../date_conv.php');
                    ?>
                    <?php echo $nom['Kabupaten'];?>, <?php echo $tanggal ?>
                </td>
                <th style="min-width: 175px;">Jenis Kelamin</th>
                <td style="vertical-align: middle;"> <?php echo $nom['Jenis_Kelamin'];?></td>
            </tr>
            <tr>
                <th style="min-width: 200px; vertical-align: middle;">Golongan Darah</th>
                <td style="vertical-align: middle;"> <?php echo $nom['Golongan_Darah'];?></td>
                <td colspan=2 align=center>
                    <?php echo "<a style='width: 90%' href='index.php?page=ubah_data&st=1&idd=".$nom['NIK_Anak']."' class='btn btn-cha'>Ajukan Perubahan Data</a>" ?>
                </td>
            </tr>
        </table>
    </div>
    

    <?php
        $query2 = mysqli_query($koneksi, "SELECT * 
            FROM catatan_pemeriksaan
            INNER JOIN status_gizi
            ON catatan_pemeriksaan.Id_Status_Gizi = status_gizi.Id_Status_Gizi
            INNER JOIN jadwal
            on catatan_pemeriksaan.Id_Jadwal = jadwal.Id_Jadwal
            INNER JOIN posyandu
            ON jadwal.Id_Posyandu = posyandu.Id_Posyandu
            WHERE catatan_pemeriksaan.NIK_Anak = '$_GET[NIK]'
            ORDER BY NIK_Anak");
    ?>
    <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container " style="padding-top: 25px;">
            <div class="row">
                <div style="width: 60%">
                    <div class="detail-box">
                        <h1>
                        Catatan Pemeriksaan Anak
                        <br>
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
                    <th style="min-width: 5%; text-align: center; vertical-align: middle">No.</th>
                    <th style="min-width: 30%; text-align: center">
                        Tanggal Pemeriksaan
                        <input class="form-control" type="date" id="co0" onchange="search(0)" placeholder="Cari Tanggal Pemeriksaan...">
                    </th>
                    <th style="min-width: 35%; text-align: center">
                        Nama Posyandu
                        <input class="form-control" type="search" id="co1" onkeyup="search(1)" placeholder="Cari Nama Posyandu...">
                    </th>
                    <th style="min-width: 30%; text-align: center">
                        Status Gizi
                        <input class="form-control" type="search" id="co2" onkeyup="search(2)" placeholder="Cari Status Gizi...">
                    </th>
                    <th style="min-width: 200px; text-align: center; vertical-align: middle">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    while ($nom = mysqli_fetch_array($query2)){
                        $no++
                ?>
                <!--Tabel normal-->
                <?php echo "<tr id='normal".$no."'>"; ?>
                    <td style="vertical-align: middle;" align=center> <?php echo $no;?></td>
                    <td style="vertical-align: middle;">
                        <?php
                            $tg = $nom['Tanggal'];
                            $sts = 1;
                            include('../date_conv.php');
                            echo $tanggal;
                        ?>
                    </td>
                    <td style="vertical-align: middle;"> <?php echo $nom['Nama_Posyandu'];?></td>
                    <td style="vertical-align: middle;"> <?php echo $nom['Status_Gizi'];?></td>
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
        var filter = [];
        for(i = 0; i <= 2; i++){
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
            for(j = 0; j <= 2; j++){
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