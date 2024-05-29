<?php
    session_start ();
    $db_host="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="stunting";
    $koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $type = $_GET['type'];
    if($type == 'hasil_pemeriksaan' OR $type == 'hasil'){
        $idc = $_GET['idc'];
        $idj = $_GET['idj'];
    } else if($type == 'jadwal_pemeriksaan'){
        $idc = $_GET['idc'];
        $idj = $_GET['idj'];
    } else if($type == 'tes'){
        $id = $_GET['id'];
    } else{
        $id = $_GET['id'];
    }

    if($type == 'orang_tua'){
        $co = "No_KK";
    } else if($type == 'anak'){
        $co = "NIK_Anak";
    } else if($type == 'hasil_pemeriksaan' OR $type == 'hasil'){
        $coc = "Id_Catatan_Pemeriksaan";
        $coj = "Id_Jenis_Pemeriksaan";
    } else if($type == 'jadwal_pemeriksaan'){
        $coc = "Id_Jadwal";
        $coj = "Id_Jenis_Pemeriksaan";
    } else if($type == 'admin'){
        $co = "Id";
    } else if($type == 'tes'){
        $co = "ID";
    } else if($type == 'detail_anak'){
        $co = "Id_Catatan_Pemeriksaan";
    } else{
        $co = "Id_".$type;
    }

    if($type == 'hasil_pemeriksaan'){
        $query = mysqli_query($koneksi, "DELETE FROM `$type` WHERE $coc = '$idc' AND $coj = '$idj'");
    } else if($type == 'jadwal_pemeriksaan'){
        $query = mysqli_query($koneksi, "DELETE FROM `$type` WHERE $coc = '$idc' AND $coj = '$idj'");
    } else if($type == 'detail_anak'){
        $query = mysqli_query($koneksi, "DELETE FROM `catatan_pemeriksaan` WHERE $co = '$id'");
    } else if($type == 'hasil'){
        $query = mysqli_query($koneksi, "DELETE FROM `hasil_pemeriksaan` WHERE $coc = '$idc' AND $coj = '$idj'");
    } else{
        $query = mysqli_query($koneksi, "DELETE FROM `$type` WHERE $co = '$id'");
    }

    if($type == 'hasil_pemeriksaan' OR $type == 'hasil'){
        $ttl = mysqli_query($koneksi, "SELECT COUNT(Id_Jenis_Pemeriksaan) AS t
            FROM hasil_pemeriksaan
            WHERE Id_Catatan_Pemeriksaan = '$idc'");
        $sss = mysqli_fetch_array($ttl)['t']--;
        $sql2=$koneksi->query("UPDATE `catatan_pemeriksaan`
            SET `Total_Pencatatan` = $sss
            WHERE `Id_Catatan_Pemeriksaan` = '$idc'
        ");
    }

    if($type == 'hasil'){
        header('Location: index.php?page=hasil&idd='.$idc.'');
    } else if($type == 'jadwal_pemeriksaan'){
        header('Location: index.php?page=jadwal_pemeriksaan&idd='.$idc.'');
    } else if($type == 'detail_anak'){
        header('Location: index.php?page=detail_anak&idd='.$_GET['idd'].'');
    } else{
        header('Location: index.php?page='.$type.'');
    }
?>