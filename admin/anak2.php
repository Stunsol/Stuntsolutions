<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Anak</h3>
                    </div>
                <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK Anak</th>
                            <th>Nama Anak</th>
                            <th>Umur Anak</th>
                            <th>ID Status Gizi</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Id Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query(
                            $koneksi, 
                            "SELECT *
                            FROM `anak`, `status gizi`, `jenis kelamin`
                            WHERE `anak`.`Id_Status_Gizi` = `status gizi`.`Id_Status_Gizi` AND `anak`.`Id_Jenis_Kelamin` = `jenis kelamin`.`Id_Jenis_Kelamin`
                            INTERSECT
                            SELECT *
                            FROM `anak`, `orang tua`
                            WHERE `anak`.`No_KK` = `orang tua`.`No_KK`"
                        );
                        while ($nom = mysqli_fetch_array($query)){
                            $no++
                        ?>
                        <tr>
                            <td width='3%'> <?php echo $no;?></td>
                            <td> <?php echo $nom['No_NIK_Anak'];?></td>
                            <td> <?php echo $nom['Nama_Anak'];?></td>
                            <td> <?php echo $nom['Umur_Anak'];?></td>
                            <td> <?php echo $nom['Status_Gizi'];?></td>
                            <td> <?php echo $nom['Nama_Ayah'];?></td>
                            <td> <?php echo $nom['Nama_Ibu'];?></td>
                            <td> <?php echo $nom['Jenis_Kelamin'];?></td>
                        </tr>  
                        <?php }?>
                    </tbody>
                    
                </table>
                
                </div>
            </div>
        </div>
    </div>
</section>