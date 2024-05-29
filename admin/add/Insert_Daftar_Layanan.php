<?php
include('../../conf/config.php');
$Id = $_GET['Id_Daftar_Layanan'];
$Daftar = $_GET['Daftar_Layanan'];
$Keterangan = $_GET['Keterangan_Layanan'];
$query = mysqli_query($koneksi, "INSERT INTO daftar layanan (Id_Daftar_Layanan, Daftar_Layanan, Keterangan_Layanan) VALUES ($Id, $Daftar, $Keterangan)");
header('Location:../index.php?page=daftar-layanan');
?>