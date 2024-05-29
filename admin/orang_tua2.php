<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Orang Tua</h3>
                    </div>
                <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. KK</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Status Kesejahteraan</th>
                            <th>Status Pernikahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query(
                            $koneksi, "SELECT *
                            FROM `orang tua`, `status sejahtera`, `status pernikahan`
                            WHERE `orang tua`.`Id_Status_Sejahtera` = `status sejahtera`.`Id_Status_Sejahtera` AND `orang tua`.`Id_Status_Pernikahan` = `status pernikahan`.`Id_Status_Pernikahan`"
                        );
                        while ($nom = mysqli_fetch_array($query)){
                            $no++
                        ?>
                        <tr>
                            <td width='3%'> <?php echo $no;?></td>
                            <td> <?php echo $nom['No_KK'];?></td>
                            <td> <?php echo $nom['Nama_Ayah'];?></td>
                            <td> <?php echo $nom['Nama_Ibu'];?></td>
                            <td> <?php echo $nom['Alamat'];?></td>
                            <td> <?php echo $nom['No_Telp'];?></td>
                            <td> <?php echo $nom['Status_Sejahtera'];?></td>
                            <td> <?php echo $nom['Status_Pernikahan'];?></td>
                        </tr>  
                        <?php }?>
                    </tbody>
                    
                </table>
                
                </div>
            </div>
        </div>
    </div>
</section>