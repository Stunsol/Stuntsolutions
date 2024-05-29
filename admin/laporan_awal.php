<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
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
                            <div class="parent_l">
                                <button name="lpro" width="100px" height="50px" class='btn btn-cha'>
                                    Laporan per Provinsi
                                </button>
                                <button name="lkab" width="100px" height="50px" class='btn btn-cha'>
                                    Laporan per Kabupaten/Kota
                                </button>
                                <button name="lkec" width="100px" height="50px" class='btn btn-cha'>
                                    Laporan per Kecamatan
                                </button>
                                <button name="lkel" width="100px" height="50px" class='btn btn-cha'>
                                    Laporan per Kelurahan
                                </button>
                            </div>
                            <br><br>
                            <div class="parent_l">
                                <button name="lsta" width="100px" height="50px" class='btn btn-primary'>
                                    Laporan per Status Stunting
                                </button>
                                <button name="lper" width="100px" height="50px" class='btn btn-primary'>
                                    Laporan per Jenis Pemeriksaan
                                </button>
                                <button name="lgen" width="100px" height="50px" class='btn btn-primary'>
                                    Laporan per Gender
                                </button>
                            </div>
                        </form>
                        
                        <?php
                            if(isset($_POST["lpro"])){
                                echo "<script>window.location = 'index.php?page=laporan&type1=lpro&go1=0&go2=0'</script>";
                            } else if(isset($_POST["lkab"])){
                                echo "<script>window.location = 'index.php?page=laporan&type1=lkab'</script>";
                            } else if(isset($_POST["lkec"])){
                                echo "<script>window.location = 'index.php?page=laporan&type1=lkec'</script>";
                            } else if(isset($_POST["lkel"])){
                                echo "<script>window.location = 'index.php?page=laporan&type1=lkel'</script>";
                            } else if(isset($_POST["lsta"])){
                                echo "<script>window.location = 'index.php?page=laporan&type1=lsta'</script>";
                            } else if(isset($_POST["lper"])){
                                echo "<script>window.location = 'index.php?page=laporan&type1=lper'</script>";
                            } else if(isset($_POST["lgen"])){
                                echo "<script>window.location = 'index.php?page=laporan&type1=lgen'</script>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>