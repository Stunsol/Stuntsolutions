<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Selamat Datang di Dashboard E-Stunting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
                        <h3 class="card-title">Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <th>Jumlah Anak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT jenis_kelamin.Jenis_Kelamin,
                                        (SELECT COUNT(Id_Jenis_Kelamin)
                                        FROM anak
                                        WHERE anak.Id_Jenis_Kelamin = jenis_kelamin.Id_Jenis_Kelamin) as jumlah_gender
                                        FROM jenis_kelamin");
                                    while ($nom = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td> <?php echo $nom['Jenis_Kelamin'];?></td>
                                    <td> <?php echo $nom['jumlah_gender'];?></td>
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