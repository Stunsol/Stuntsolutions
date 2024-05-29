<?php
$no = 0;
$query = mysqli_query($koneksi, "SELECT *
    FROM catatan_pemeriksaan
    INNER JOIN anak
    ON catatan_pemeriksaan.NIK_Anak = anak.NIK_Anak
    INNER JOIN jadwal
    on catatan_pemeriksaan.Id_Jadwal = jadwal.Id_Jadwal
    WHERE catatan_pemeriksaan.Id_Catatan_Pemeriksaan = '$_GET[Catatan]'");
$noo = mysqli_fetch_array($query);

?>
<section class="slider_section long_section">
    <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div style="width: 100%">
            <ol style="background: none" class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=anak">Anak</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=detail_anak&NIK=<?php echo $noo['NIK_Anak'] ?>">Detail Anak - <?php echo $noo['NIK_Anak'] ?></a></li>
                <li class="breadcrumb-item active">Hasil Pemeriksaan - <?php echo $noo['Tanggal'] ?></li>
            </ol>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container " style="padding-top: 25px;">
            <div class="row">
                <div style="width: 60%">
                    <div class="detail-box">
                        <h1>
                        <?php
                            $tg = $noo['Tanggal'];
                            $sts = 1;
                            include('../date_conv.php');
                        ?>
                        Hasil Pemeriksaan Pada
                        <br>
                        <?php echo $tanggal ?>
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
        <?php
            $query2 = mysqli_query($koneksi, "SELECT *
                FROM hasil_pemeriksaan
                INNER JOIN jenis_pemeriksaan
                ON hasil_pemeriksaan.Id_Jenis_Pemeriksaan = jenis_pemeriksaan.Id_Jenis_Pemeriksaan
                WHERE hasil_pemeriksaan.Id_Catatan_Pemeriksaan = '$_GET[Catatan]'");
        ?>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="min-width: 50px; text-align: center">No.</th>
                    <th style="min-width: 200px; text-align: center">Jenis Pemeriksaan</th>
                    <th style="min-width: 300px; text-align: center">Hasil Pemeriksaan</th>
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
                    <td style="vertical-align: middle;"> <?php echo $nom['Jenis_Pemeriksaan'];?></td>
                    <td style="vertical-align: middle;"> <?php echo $nom['Hasil_Pemeriksaan'];?>
                        <?php
                            if($nom['Id_Jenis_Pemeriksaan'] == 'JP006'){ ?>
                                 kg
                            <?php } else if($nom['Id_Jenis_Pemeriksaan'] == 'JP007' || $nom['Id_Jenis_Pemeriksaan'] == 'JP008'){ ?>
                                 cm
                            <?php }
                        ?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <?php
            $query3 = mysqli_query($koneksi, "SELECT hasil_pemeriksaan
                FROM hasil_pemeriksaan
                INNER JOIN jenis_pemeriksaan
                ON hasil_pemeriksaan.Id_Jenis_Pemeriksaan = jenis_pemeriksaan.Id_Jenis_Pemeriksaan
                WHERE hasil_pemeriksaan.Id_Catatan_Pemeriksaan = '$_GET[Catatan]' AND hasil_pemeriksaan.Id_Jenis_Pemeriksaan = 'JP006'");
            $berat = (int) mysqli_fetch_array($query3)['hasil_pemeriksaan'];
            $query4 = mysqli_query($koneksi, "SELECT hasil_pemeriksaan
                FROM hasil_pemeriksaan
                INNER JOIN jenis_pemeriksaan
                ON hasil_pemeriksaan.Id_Jenis_Pemeriksaan = jenis_pemeriksaan.Id_Jenis_Pemeriksaan
                WHERE hasil_pemeriksaan.Id_Catatan_Pemeriksaan = '$_GET[Catatan]' AND hasil_pemeriksaan.Id_Jenis_Pemeriksaan = 'JP007'");
            $tinggi = (int) mysqli_fetch_array($query4)['hasil_pemeriksaan'];
            $tinggi /= 100;
            ?>
            Berat = <?php echo $berat; ?>
            <br>
            Tinggi = <?php echo $tinggi; ?>
            <br>
            BMI = <?php echo $berat / ($tinggi * $tinggi);
        ?>
    </div>
</section>