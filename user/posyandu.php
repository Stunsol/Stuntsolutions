<?php
$no = 0;
if($Type == "User"){
    $query1 = mysqli_query($koneksi, "SELECT * FROM `user` WHERE Id = '$Id'");
    $noo = mysqli_fetch_array($query1);
    $query2 = mysqli_query($koneksi, "SELECT *
        FROM orang_tua
        WHERE orang_tua.No_KK = '$noo[No_KK]'");
    $noa = mysqli_fetch_array($query2);
}
?>
<section class="slider_section long_section">
    <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div style="width: 100%">
            <ol style="background: none" class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Posyandu</li>
            </ol>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container " style="padding-top: 0px;">
            <div class="row">
                <div style="width: 60%">
                    <div class="detail-box">
                        <h1>
                        Daftar Posyandu
                        <br>
                        </h1>
                    </div>
                </div>
                <div  style="width: 40%">
                <div class="img-box">
                    <img src="images/posyandu.gif" style="width: 35%; float: right" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div style="overflow: auto; margin-top: 25px; margin-bottom: 25px">
        <?php if($_GET['sse'] == 0){ ?>
            <div><h3>Cari Posyandu Terdekat</h3></div>
            <table id="example1" class="table table-bordered table-striped">
            <form method="post" enctype="multipart/form-data">
                <tr>
                    <th width=18%>Provinsi</th>
                    <th width=18%>Kabupaten/Kota</th>
                    <th width=18%>Kecamatan</th>
                    <th width=18%>Kelurahan</th>
                    <th width=18%>Pemeriksaan</th>
                    <th width=10% rowspan=2 style="vertical-align:middle">
                        <button type='submit' name="cari" style='width:90%' class='btn btn-cha'>Cari</button>
                    </th>
                </tr>
                <tr>
                    <td>
                        <select class="form-control" name="prv" id="aprv0" onchange="FunProv(0)">
                            <option style="display: none" value="0" disabled selected>Provinsi</option>
                            <?php
                            $query4 = mysqli_query($koneksi, "SELECT * FROM `provinsi`");
                            while ($noa = mysqli_fetch_array($query4)){
                            ?>
                                <option value=<?php echo $noa['Id_Provinsi']?>> <?php echo $noa['Provinsi'];?> </option>
                            <?php }?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="kab" id="akab0" onchange="FunKab(0)">
                            <option style="display: none" value="0" disabled selected>Kabupaten/Kota</option>
                            <?php
                            $query4 = mysqli_query($koneksi, "SELECT * FROM `kabupaten`");
                            while ($noa = mysqli_fetch_array($query4)){
                            ?>
                                <option class=<?php echo $noa['Id_Provinsi'] ?> style="display:" value=<?php echo $noa['Id_Kabupaten']?>> <?php echo $noa['Kabupaten'];?> </option>
                            <?php }?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="kec" id="akec0" onchange="FunKec(0)">
                            <option style="display: none" value="0" disabled selected>Kecamatan</option>
                            <?php
                            $query4 = mysqli_query($koneksi, "SELECT * FROM `kecamatan`");
                            while ($noa = mysqli_fetch_array($query4)){
                            ?>
                                <option class=<?php echo $noa['Id_Kabupaten'] ?> style="display:" value=<?php echo $noa['Id_Kecamatan']?>> <?php echo $noa['Kecamatan'];?> </option>
                            <?php }?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="kel" id="akel0" onchange="FunKel(0)">
                            <option style="display: none" value="0" disabled selected>Kelurahan</option>
                            <?php
                            $query4 = mysqli_query($koneksi, "SELECT * FROM `kelurahan`");
                            while ($noa = mysqli_fetch_array($query4)){
                            ?>
                                <option class=<?php echo $noa['Id_Kecamatan'] ?> style="display:" value=<?php echo $noa['Id_Kelurahan']?>> <?php echo $noa['Kelurahan'];?> </option>
                            <?php }?>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="per" id="akel0" list="periksa">
                        <datalist id="periksa">
                            <option style="display: none" value="0" disabled selected>Pemeriksaan</option>
                            <?php
                            $query4 = mysqli_query($koneksi, "SELECT * FROM `jenis_pemeriksaan`");
                            while ($noa = mysqli_fetch_array($query4)){
                            ?>
                                <?php if($noa['Id_Jenis_Pemeriksaan'] == $_GET['idper']) { ?>
                                    <option selected value="<?php echo $noa['Jenis_Pemeriksaan']?>"> <?php echo $noa['Jenis_Pemeriksaan'];?> </option>
                                <?php } else{ ?>
                                    <option value="<?php echo $noa['Jenis_Pemeriksaan']?>"> <?php echo $noa['Jenis_Pemeriksaan'];?> </option>
                                <?php } ?>
                            <?php }?>
                        </datalist>
                    </td>
                </tr>
            </form>
            <?php
                if(isset($_POST["cari"])){
                    echo "<script>window.location = 'index.php?page=posyandu&sse=1&idprov=".$_POST['prv']."&idkab=".$_POST['kab']."&idkec=".$_POST['kec']."&idkel=".$_POST['kel']."&idper=".$_POST['per']."'</script>";
                }
            ?>
            </table>
        <?php } else if($_GET['sse'] == 1){ ?>
            <div><h3>Cari Posyandu Terdekat</h3></div>
            <table id="example1" class="table table-bordered table-striped">
            <form method="post" enctype="multipart/form-data">
                <tr>
                    <th width=18%>Provinsi</th>
                    <th width=18%>Kabupaten/Kota</th>
                    <th width=18%>Kecamatan</th>
                    <th width=18%>Kelurahan</th>
                    <th width=18%>Pemeriksaan</th>
                    <th width=10% rowspan=2 style="vertical-align:middle">
                        <button type='submit' name="cari" style='width:90%' class='btn btn-cha'>Cari</button>
                    </th>
                </tr>
                <tr>
                <td>
                    <select class="form-control" name="prv" id="aprv0" onchange="FunProv(0)">
                        <option style="display: none" value="0" disabled selected>Provinsi</option>
                        <?php
                        $query4 = mysqli_query($koneksi, "SELECT * FROM `provinsi`");
                        while ($noa = mysqli_fetch_array($query4)){
                        ?>
                            <?php if($noa['Id_Provinsi'] == $_GET['idprov']) { ?>
                                <option selected value=<?php echo $noa['Id_Provinsi']?>> <?php echo $noa['Provinsi'];?> </option>
                            <?php } else{ ?>
                                <option value=<?php echo $noa['Id_Provinsi']?>> <?php echo $noa['Provinsi'];?> </option>
                            <?php } ?>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="kab" id="akab0" onchange="FunKab(0)">
                        <option style="display: none" value="0" disabled selected>Kabupaten/Kota</option>
                        <?php
                        $query4 = mysqli_query($koneksi, "SELECT * FROM `kabupaten`");
                        while ($noa = mysqli_fetch_array($query4)){
                        ?>
                            <?php if($noa['Id_Kabupaten'] == $_GET['idkab']) { ?>
                                <option selected class=<?php echo $noa['Id_Provinsi'] ?> style="display:" value=<?php echo $noa['Id_Kabupaten']?>> <?php echo $noa['Kabupaten'];?> </option>
                            <?php } else{ ?>
                                <option class=<?php echo $noa['Id_Provinsi'] ?> style="display:" value=<?php echo $noa['Id_Kabupaten']?>> <?php echo $noa['Kabupaten'];?> </option>
                            <?php } ?>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="kec" id="akec0" onchange="FunKec(0)">
                        <option style="display: none" value="0" disabled selected>Kecamatan</option>
                        <?php
                        $query4 = mysqli_query($koneksi, "SELECT * FROM `kecamatan`");
                        while ($noa = mysqli_fetch_array($query4)){
                        ?>
                            <?php if($noa['Id_Kecamatan'] == $_GET['idkec']) { ?>
                                <option selected class=<?php echo $noa['Id_Kabupaten'] ?> style="display:" value=<?php echo $noa['Id_Kecamatan']?>> <?php echo $noa['Kecamatan'];?> </option>
                            <?php } else{ ?>
                                <option class=<?php echo $noa['Id_Kabupaten'] ?> style="display:" value=<?php echo $noa['Id_Kecamatan']?>> <?php echo $noa['Kecamatan'];?> </option>
                            <?php } ?>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="kel" id="akel0" onchange="FunKel(0)">
                        <option style="display: none" value="0" disabled selected>Kelurahan</option>
                        <?php
                        $query4 = mysqli_query($koneksi, "SELECT * FROM `kelurahan`");
                        while ($noa = mysqli_fetch_array($query4)){
                        ?>
                            <?php if($noa['Id_Kelurahan'] == $_GET['idkel']) { ?>
                                <option selected class=<?php echo $noa['Id_Kecamatan'] ?> style="display:" value=<?php echo $noa['Id_Kelurahan']?>> <?php echo $noa['Kelurahan'];?> </option>
                            <?php } else{ ?>
                                <option class=<?php echo $noa['Id_Kecamatan'] ?> style="display:" value=<?php echo $noa['Id_Kelurahan']?>> <?php echo $noa['Kelurahan'];?> </option>
                            <?php } ?>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" name="per" id="akel0" list="periksa">
                    <datalist id="periksa">
                        <option style="display: none" value="0" disabled selected>Pemeriksaan</option>
                        <?php
                        $query4 = mysqli_query($koneksi, "SELECT * FROM `jenis_pemeriksaan`");
                        while ($noa = mysqli_fetch_array($query4)){
                        ?>
                            <?php if($noa['Id_Jenis_Pemeriksaan'] == $_GET['idper']) { ?>
                                <option selected value="<?php echo $noa['Jenis_Pemeriksaan']?>"> <?php echo $noa['Jenis_Pemeriksaan'];?> </option>
                            <?php } else{ ?>
                                <option value="<?php echo $noa['Jenis_Pemeriksaan']?>"> <?php echo $noa['Jenis_Pemeriksaan'];?> </option>
                            <?php } ?>
                        <?php }?>
                    </datalist>
                </td>
                </tr>
            </form>
            <?php
                if(isset($_POST["cari"])){
                    echo "<script>window.location = 'index.php?page=posyandu&sse=1&idprov=".$_POST['prv']."&idkab=".$_POST['kab']."&idkec=".$_POST['kec']."&idkel=".$_POST['kel']."&idper=".$_POST['per']."'</script>";
                }
            ?>
            </table>

        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="vertical-align: middle" width=50px;>No.</th>
                    <th style="vertical-align:middle" width=200px>Nama Posyandu</th>
                    <th style="vertical-align:middle" width=200px>Alamat</th>
                    <th style="vertical-align:middle" width=150px>Provinsi</th>
                    <th style="vertical-align:middle" width=150px>Kabupaten/Kota</th>
                    <th style="vertical-align:middle" width=150px>Kecamatan</th>
                    <th style="vertical-align:middle" width=150px>Kelurahan</th>
                    <th style="vertical-align:middle" width=250px>Tanggal Pelayanan</th>
                    <th style="vertical-align:middle" width=300px>Jenis Pemeriksaan</th>
                    <th style="vertical-align:middle" width=200px>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($koneksi, "SELECT *
                        FROM `jadwal_pemeriksaan`
                        INNER JOIN jadwal
                        ON jadwal_pemeriksaan.Id_Jadwal = jadwal.Id_Jadwal
                        INNER JOIN jenis_pemeriksaan
                        ON jenis_pemeriksaan.Id_Jenis_Pemeriksaan = jadwal_pemeriksaan.Id_Jenis_Pemeriksaan
                        INNER JOIN posyandu
                        ON jadwal.Id_Posyandu = posyandu.Id_Posyandu
                        INNER JOIN kelurahan
                        ON posyandu.Id_Kelurahan = kelurahan.Id_Kelurahan
                        INNER JOIN kecamatan
                        ON kelurahan.Id_Kecamatan = kecamatan.Id_Kecamatan
                        INNER JOIN kabupaten
                        ON kecamatan.Id_Kabupaten = kabupaten.Id_Kabupaten
                        INNER JOIN provinsi
                        ON kabupaten.Id_Provinsi = provinsi.Id_Provinsi
                        ");
                    $no = 0;
                    while ($nom = mysqli_fetch_array($query)){
                ?>
                <!--Tabel normal-->
                <?php if((($nom['Id_Provinsi'] == $_GET['idprov']) OR ($_GET['idprov'] == "")) AND (($nom['Id_Kabupaten'] == $_GET['idkab']) OR ($_GET['idkab'] == "")) AND (($nom['Id_Kecamatan'] == $_GET['idkec']) OR ($_GET['idkec'] == "")) AND (($nom['Id_Kelurahan'] == $_GET['idkel']) OR ($_GET['idkel'] == "")) AND (($nom['Jenis_Pemeriksaan'] == $_GET['idper']) OR ($_GET['idper'] == ""))) { ?>
                    <?php $no++ ?>
                    <?php echo "<tr style='display:' id='normal".$no."'>"; ?>
                        <td style="vertical-align: middle;" align=center> <?php echo $no;?></td>
                        <td style="vertical-align: middle;"><?php echo $nom['Nama_Posyandu'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $nom['Alamat_Posyandu'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $nom['Provinsi'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $nom['Kabupaten'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $nom['Kecamatan'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $nom['Kelurahan'] ?></td>
                        <td style="vertical-align: middle;">
                            <?php
                                $tg = $nom['Tanggal'];
                                $sts = 1;
                                include('../date_conv.php');
                                echo $tanggal." - ".$nom['Jam'];
                            ?>
                        </td>
                        <td style="vertical-align: middle;"><?php echo $nom['Jenis_Pemeriksaan'] ?></td>
                        <td style="vertical-align: middle;" align=center>
                            <form method="post" enctype="multipart/form-data">
                                <?php echo "<button name='daf".$no."' width='90%' class='btn btn-cha'>Daftar</button>" ?>
                                <select>
                                    <?php $qnik = mysqli_query($koneksi, "SELECT * FROM anak WHERE No_KK ") ?>
                                </select>
                            </form>
                            <?php
                                $df = "daf".$no;
                                if(isset($_POST[$df])){
                                }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php }?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</section>

<script>

    function search(){
        nrow = 8;

        for(idx = 0; idx < nrow; idx++){
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
        
    }

    function FunProv(idx){
        var x = document.getElementById("aprv".concat(idx)).value;
        kabn = document.getElementById("akab".concat(idx));
        kecn = document.getElementById("akec".concat(idx));
        keln = document.getElementById("akel".concat(idx));
        $("#akab".concat(idx)).show();
        $("#akab".concat(idx).concat(" option")).hide();
        $("#akab".concat(idx).concat(" option.") + x).show();
        kabn.selectedIndex = 0;
        kecn.selectedIndex = 0;
        keln.selectedIndex = 0;
    }

    function FunKab(idx){
        var x = document.getElementById("akab".concat(idx)).value;
        kecn = document.getElementById("akec".concat(idx));
        keln = document.getElementById("akel".concat(idx));
        $("#akec".concat(idx)).show();
        $("#akec".concat(idx).concat(" option")).hide();
        $("#akec".concat(idx).concat(" option.") + x).show();
        kecn.selectedIndex = 0;
        keln.selectedIndex = 0;
    }

    function FunKec(idx){
        var x = document.getElementById("akec".concat(idx)).value;
        keln = document.getElementById("akel".concat(idx));
        $("#akel".concat(idx)).show();
        $("#akel".concat(idx).concat(" option")).hide();
        $("#akel".concat(idx).concat(" option.") + x).show();
        keln.selectedIndex = 0;
    }
</script>