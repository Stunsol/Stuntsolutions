<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan per Provinsi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="index.php?page=laporan&type1=awal">Laporan</a></li>
                    <li class="breadcrumb-item active">Laporan per Provinsi</li>
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
                        <form method="post" enctype="multipart/form-data">
                            <input type="radio" id="op1" name="tipe2" value="gz">
                            <label for="op1">Berdasarkan Status Gizi</label><br>
                            <input type="radio" id="op2" name="tipe2" value="jp">
                            <label for="op2">Berdasarkan Jenis Pemeriksaan</label><br>
                            <input type="radio" id="op3" name="tipe2" value="ge">
                            <label for="op3">Berdasarkan Gender</label><br>
                            <button type='submit' name="cari" style='width:25%' class='btn btn-cha'>Proses</button>
                        </form>
                        <?php
                            if(isset($_POST['cari'])){
                                echo "<script>window.location = 'index.php?page=laporan&type1=lpro&go1=1&go2=0'</script>";
                            }
                        ?>
                    </div>
                </div>

                <div class="card">
                    <?php if($_GET['go1'] == 0){ ?>
                        <div class="card-body" style="display:" id="d1">
                    <?php } else{ ?>
                        <div class="card-body" style="display:" id="d1">
                    <?php } ?>

                        <table>
                        <form method="post" enctype="multipart/form-data">
                            <tr>
                                <td width="25%">
                                    <select name="bln" class="form-control" style="">
                                        <option selected style="dispal: none" disabled>Bulan</option>
                                        <option>Januari</option>
                                        <option>Februari</option>
                                        <option>Maret</option>
                                        <option>April</option>
                                        <option>Mei</option>
                                        <option>Juni</option>
                                        <option>Juli</option>
                                        <option>Agustus</option>
                                        <option>September</option>
                                        <option>Oktober</option>
                                        <option>November</option>
                                        <option>Desember</option>
                                    </select>
                                </td>
                                <td width="25%">
                                    <input type="number" class="form-control" placeholder="Tahun">
                                </td>
                                <td>
                                    <button type='submit' name="cari2" style='width:25%' class='btn btn-cha'>Proses</button>
                                </td>
                            </tr>
                        </form>
                        <?php
                            if(isset($_POST['cari2'])){
                                echo "<script>window.location = 'index.php?page=laporan&type1=lpro&go1=1&go2=1'</script>";
                            }
                        ?>
                        </table>
                    </div>

                    <?php if($_GET['go2'] == 0){ ?>
                        <div class="card-body" style="display:" id="d2">
                    <?php } else{ ?>
                        <div class="card-body" style="display:" id="d2">
                    <?php } ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan=3>Provinsi</th>
                                    <th colspan=6>Status Gizi</th>
                                    <th rowspan=3>Total</th>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <th>Belum Diperiksa</th>
                                    <th>Underweight</th>
                                    <th>Normal</th>
                                    <th>Overweight</th>
                                    <th>Obesitas I</th>
                                    <th>Obesitas II</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $q1 = mysqli_query($koneksi, "SELECT * FROM provinsi ORDER BY Provinsi ASC");
                                    while($qprov = mysqli_fetch_array($q1)){ ?>
                                    <tr>
                                        <td><b><?php echo $qprov['Provinsi'] ?></b></td>
                                        <?php
                                        ?>
                                    </tr>
                                <?php } ?>
                                <!--
                                <tr>
                                    <td><b>Sumsel</b></td>
                                    <td align=center>1</td>
                                    <td align=center>2</td>
                                    <td align=center>3</td>
                                    <td align=center>4</td>
                                    <td align=center>5</td>
                                    <td align=center>6</td>
                                    <td align=center>21</td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function tog(idx){
        if(idx == 1){
            document.getElementById("d1").style.display = "";
        } else if(idx == 2){
            document.getElementById("d2").style.display = "";
        }
    }
</script>