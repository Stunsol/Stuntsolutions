-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 03:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stunting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` varchar(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Id_Posyandu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`, `Nama`, `Id_Posyandu`) VALUES
('Adm001', 'iqbal', '1', 'Iqbal', 'Pos003'),
('Adm002', 'trifbriani', 'putri2802', 'TRI FEBRIANI PUTRI', 'POS002');

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `NIK_Anak` varchar(16) NOT NULL,
  `Nama_Anak` varchar(50) NOT NULL,
  `Umur_Anak` varchar(10) NOT NULL,
  `No_KK` varchar(16) NOT NULL,
  `Id_Jenis_Kelamin` varchar(10) NOT NULL,
  `Id_Golongan_Darah` varchar(10) DEFAULT NULL,
  `Tanggal_Lahir` date DEFAULT NULL,
  `Tempat_Lahir` varchar(20) NOT NULL,
  `Lampiran` varchar(30) DEFAULT NULL,
  `Keterangan_Verifikasi` varchar(300) NOT NULL,
  `Id_Status_Verifikasi` varchar(10) DEFAULT NULL,
  `Tanggal_Pengajuan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`NIK_Anak`, `Nama_Anak`, `Umur_Anak`, `No_KK`, `Id_Jenis_Kelamin`, `Id_Golongan_Darah`, `Tanggal_Lahir`, `Tempat_Lahir`, `Lampiran`, `Keterangan_Verifikasi`, `Id_Status_Verifikasi`, `Tanggal_Pengajuan`) VALUES
('111', 'Anak ke-3', '', '1606022603220109', 'JK001', 'GD001', '2023-12-08', 'Kab001', NULL, '', 'SV004', NULL),
('1606026903050102', 'Anak ke-2', '3', '1606022603220109', 'JK002', 'GD002', '2023-11-02', 'Kab001', NULL, '', 'SV004', NULL),
('1606037004060203', 'Anak', '3', '0801128222270299', 'JK001', 'GD008', '2021-08-19', 'Kab002', 'KdMK.png', 'Feshjfvsdfbshdj', 'SV001', '2023-11-23'),
('TESSSS', 'Iqbal', '', '0801128222270299', 'JK001', 'GD001', '2023-12-12', 'Kab001', 'TTD.png', 'sssssss', 'SV003', '2022-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_pemeriksaan`
--

CREATE TABLE `catatan_pemeriksaan` (
  `Id_Catatan_Pemeriksaan` varchar(10) NOT NULL,
  `Total_Pencatatan` int(10) NOT NULL,
  `Total_Layanan` int(10) NOT NULL,
  `NIK_Anak` varchar(16) NOT NULL,
  `Id_Status_Gizi` varchar(10) DEFAULT NULL,
  `Id_Jadwal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catatan_pemeriksaan`
--

INSERT INTO `catatan_pemeriksaan` (`Id_Catatan_Pemeriksaan`, `Total_Pencatatan`, `Total_Layanan`, `NIK_Anak`, `Id_Status_Gizi`, `Id_Jadwal`) VALUES
('CP001', 4, 1, '1606037004060203', 'SG001', 'JD001'),
('CP002', 2, 2, 'TESSSS', 'SG004', 'JD002'),
('CP003', 1, 1, '1606037004060203', 'SG002', 'JD002'),
('CP004', 3, 1, '111', 'SG001', 'JD001'),
('CP005', 3, 0, 'TESSSS', 'SG006', 'JD001');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_layanan`
--

CREATE TABLE `daftar_layanan` (
  `Id_Daftar_Layanan` varchar(10) NOT NULL,
  `Daftar_Layanan` varchar(50) NOT NULL,
  `Keterangan_Layanan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_layanan`
--

INSERT INTO `daftar_layanan` (`Id_Daftar_Layanan`, `Daftar_Layanan`, `Keterangan_Layanan`) VALUES
('DL001', 'Imunisasi', 'Imunisasi'),
('DL002', 'Pemeriksaan Fisik', 'Pemeriksaan fisik'),
('DL003', 'Pemeriksaan Gizi', 'Pemeriksaan Gizi');

-- --------------------------------------------------------

--
-- Table structure for table `golongan_darah`
--

CREATE TABLE `golongan_darah` (
  `Id_Golongan_Darah` varchar(10) NOT NULL,
  `Golongan_Darah` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `golongan_darah`
--

INSERT INTO `golongan_darah` (`Id_Golongan_Darah`, `Golongan_Darah`) VALUES
('GD001', 'A+'),
('GD002', 'A-'),
('GD003', 'B+'),
('GD004', 'B-'),
('GD005', 'AB+'),
('GD006', 'AB-'),
('GD007', 'O+'),
('GD008', 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pemeriksaan`
--

CREATE TABLE `hasil_pemeriksaan` (
  `Id_Jenis_Pemeriksaan` varchar(10) NOT NULL,
  `Id_Catatan_Pemeriksaan` varchar(10) NOT NULL,
  `Hasil_Pemeriksaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_pemeriksaan`
--

INSERT INTO `hasil_pemeriksaan` (`Id_Jenis_Pemeriksaan`, `Id_Catatan_Pemeriksaan`, `Hasil_Pemeriksaan`) VALUES
('JP007', 'CP001', '172'),
('JP006', 'CP001', '60'),
('JP007', 'CP002', '20'),
('JP013', 'CP002', 'Ompong'),
('JP012', 'CP004', 'Korengan'),
('JP008', 'CP001', '25'),
('JP012', 'CP001', 'Bagus'),
('JP007', 'CP004', '46'),
('JP006', 'CP004', '3'),
('JP001', 'CP003', 'g'),
('JP006', 'CP005', '50'),
('JP007', 'CP005', '170'),
('JP002', 'CP005', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `Id_Jadwal` varchar(10) NOT NULL,
  `Id_Posyandu` varchar(10) DEFAULT NULL,
  `Hari` varchar(10) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Jam` time DEFAULT NULL,
  `Tempat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`Id_Jadwal`, `Id_Posyandu`, `Hari`, `Tanggal`, `Jam`, `Tempat`) VALUES
('JD001', 'Pos001', 'Minggu', '2023-12-08', '12:30:00', 'Pos'),
('JD002', 'Pos003', 'Senin', '2023-12-09', '14:00:00', 'Rumah'),
('JD003', 'Pos002', 'Minggu', '2023-12-08', '12:30:00', 'Pos'),
('JD004', 'Pos003', '', '2023-12-19', '14:00:00', 'Lapangan'),
('JD005', 'Pos004', '', '2023-11-24', '16:05:00', 'Posko'),
('JD006', 'Pos004', '', '2023-12-14', '20:05:00', 'Kantor');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pemeriksaan`
--

CREATE TABLE `jadwal_pemeriksaan` (
  `Id_Jenis_Pemeriksaan` varchar(10) DEFAULT NULL,
  `Id_Jadwal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_pemeriksaan`
--

INSERT INTO `jadwal_pemeriksaan` (`Id_Jenis_Pemeriksaan`, `Id_Jadwal`) VALUES
('JP007', 'JD001'),
('JP006', 'JD001'),
('JP009', 'JD001'),
('JP013', 'JD001'),
('JP006', 'JD002'),
('JP007', 'JD002'),
('JP009', 'JD002'),
('JP002', 'JD002'),
('JP004', 'JD002'),
('JP006', 'JD003'),
('JP007', 'JD003'),
('JP011', 'JD003'),
('JP006', 'JD004'),
('JP007', 'JD004'),
('JP003', 'JD004'),
('JP001', 'JD004'),
('JP001', 'JD003'),
('JP011', 'JD001'),
('JP004', 'JD001'),
('JP006', 'JD005'),
('JP013', 'JD005'),
('JP004', 'JD005'),
('JP001', 'JD005'),
('JP002', 'JD006'),
('JP007', 'JD006'),
('JP011', 'JD006');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `Id_Jenis_Kelamin` varchar(10) NOT NULL,
  `Jenis_Kelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`Id_Jenis_Kelamin`, `Jenis_Kelamin`) VALUES
('JK001', 'Laki-Laki'),
('JK002', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pemeriksaan`
--

CREATE TABLE `jenis_pemeriksaan` (
  `Id_Jenis_Pemeriksaan` varchar(10) NOT NULL,
  `Jenis_Pemeriksaan` varchar(50) NOT NULL,
  `Id_Daftar_Layanan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_pemeriksaan`
--

INSERT INTO `jenis_pemeriksaan` (`Id_Jenis_Pemeriksaan`, `Jenis_Pemeriksaan`, `Id_Daftar_Layanan`) VALUES
('JP001', 'BCG', 'DL001'),
('JP002', 'Hepatitis B', 'DL001'),
('JP003', 'Polio', 'DL001'),
('JP004', 'DTP-HB-Hib', 'DL001'),
('JP005', 'Rotavirus', 'DL001'),
('JP006', 'Pengukuran Berat Badan (kg)', 'DL002'),
('JP007', 'Pengukuran Tinggi Badan (cm)', 'DL002'),
('JP008', 'Pengukuran Lingkar Kepala (cm)', 'DL002'),
('JP009', 'Pemeriksaan Mata', 'DL002'),
('JP010', 'Pemeriksaan Telinga', 'DL002'),
('JP011', 'Pemeriksaan Darah', 'DL003'),
('JP012', 'Kesehatan Kulit', 'DL003'),
('JP013', 'Kesehatan Gigi', 'DL003');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `Id_Kabupaten` varchar(10) NOT NULL,
  `Kabupaten` varchar(50) NOT NULL,
  `Id_Provinsi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`Id_Kabupaten`, `Kabupaten`, `Id_Provinsi`) VALUES
('Kab001', 'Palembang', 'Prov003'),
('Kab002', 'Padang', 'Prov004'),
('Kab003', 'Medan', 'Prov002'),
('Kab004', 'Aceh', 'Prov001'),
('Kab005', 'Riau', 'Prov006'),
('Kab006', 'Jambi', 'Prov008'),
('Kab008', 'Ogan Ilir', 'Prov003'),
('Kab009', 'Prabumulih', 'Prov003'),
('Kab010', 'Yogyakarta', 'Prov020');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `Id_Kecamatan` varchar(10) NOT NULL,
  `Kecamatan` varchar(50) NOT NULL,
  `Id_Kabupaten` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`Id_Kecamatan`, `Kecamatan`, `Id_Kabupaten`) VALUES
('Kec001', 'Bukit Kecil', 'Kab001'),
('Kec002', 'Bukit Besar', 'Kab001'),
('Kec003', 'Ilir Barat 1', 'Kab001'),
('Kec004', 'Kraton', 'Kab010');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `Id_Kelurahan` varchar(10) NOT NULL,
  `Kelurahan` varchar(50) NOT NULL,
  `Id_Kecamatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`Id_Kelurahan`, `Kelurahan`, `Id_Kecamatan`) VALUES
('Kel001', '16 Ilir', 'Kec003'),
('Kel002', '24 Ilir', 'Kec001'),
('Kel003', '26 Ilir', 'Kec001'),
('Kel004', '1', 'Kec001'),
('Kel005', '1', 'Kec001'),
('Kel006', 'Patehan', 'Kec004'),
('Kel007', 'Kadipaten', 'Kec004');

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `No_KK` varchar(16) NOT NULL,
  `Nama_Ayah` varchar(50) NOT NULL,
  `Nama_Ibu` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Id_Provinsi` varchar(10) NOT NULL,
  `Id_Kabupaten` varchar(10) NOT NULL,
  `Id_Kecamatan` varchar(10) NOT NULL,
  `Id_Kelurahan` varchar(10) NOT NULL,
  `No_Tlp` varchar(12) NOT NULL,
  `Id_Status_Kesejahteraan` varchar(10) NOT NULL,
  `Id_Status_Pernikahan` varchar(10) NOT NULL,
  `Lampiran` varchar(30) DEFAULT NULL,
  `Keterangan_Verifikasi` varchar(300) NOT NULL,
  `Id_Status_Verifikasi` varchar(10) NOT NULL,
  `Tanggal_Pengajuan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`No_KK`, `Nama_Ayah`, `Nama_Ibu`, `Alamat`, `Id_Provinsi`, `Id_Kabupaten`, `Id_Kecamatan`, `Id_Kelurahan`, `No_Tlp`, `Id_Status_Kesejahteraan`, `Id_Status_Pernikahan`, `Lampiran`, `Keterangan_Verifikasi`, `Id_Status_Verifikasi`, `Tanggal_Pengajuan`) VALUES
('0801128222270299', 'Ayah ke-2', 'Ibu ke-2', 'Jalan 2', 'Prov003', 'Kab001', 'Kec001', 'Kel002', '002', 'SK004', 'SP002', 'WP.png', 'asdagfds', 'SV002', '2023-11-23'),
('11', '1', '1', '1', 'Prov004', 'Kab001', 'Kec001', 'Kel002', '', 'SK001', 'SP001', NULL, '', 'SV004', NULL),
('1606022603220109', 'Ayah ke-1', 'Ibu ke-1', 'Jalan 1', 'Prov004', 'Kab001', 'Kec001', 'Kel001', '001', 'SK005', 'SP002', NULL, '', 'SV004', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posyandu`
--

CREATE TABLE `posyandu` (
  `Id_Posyandu` varchar(10) NOT NULL,
  `Nama_Posyandu` varchar(50) NOT NULL,
  `Nama_Pemimpin` varchar(50) NOT NULL,
  `Alamat_Posyandu` varchar(50) NOT NULL,
  `No_Tlp_Posyandu` varchar(12) NOT NULL,
  `Id_Kelurahan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posyandu`
--

INSERT INTO `posyandu` (`Id_Posyandu`, `Nama_Posyandu`, `Nama_Pemimpin`, `Alamat_Posyandu`, `No_Tlp_Posyandu`, `Id_Kelurahan`) VALUES
('Pos001', 'Posyandu 1', 'Pemimpin 1', 'Jalan ke-1', '0888888888', 'Kel003'),
('Pos002', 'Posyandu 2', '', 'Jalan ke-2', '', 'Kel001'),
('Pos003', 'Posyandu 3', '', 'Jalan ke-3', '', 'Kel002'),
('Pos004', 'Posyandu J', 'O', 'A', '4', 'Kel007');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `Id_Provinsi` varchar(10) NOT NULL,
  `Provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`Id_Provinsi`, `Provinsi`) VALUES
('Prov001', 'Nanggroe Aceh Darussalam'),
('Prov002', 'Sumatera Utara'),
('Prov003', 'Sumatera Selatan'),
('Prov004', 'Sumatera Barat'),
('Prov005', 'Bengkulu'),
('Prov006', 'Riau'),
('Prov007', 'Kepulauan Riau'),
('Prov008', 'Jambi'),
('Prov009', 'Lampung'),
('Prov010', 'Bangka Belitung'),
('Prov011', 'Kalimantan Barat'),
('Prov012', 'Kalimantan Timur'),
('Prov013', 'Kalimantan Selatan'),
('Prov014', 'Kalimantan Tengah'),
('Prov015', 'Kalimantan Utara'),
('Prov016', 'Banten'),
('Prov017', 'DKI Jakarta'),
('Prov018', 'Jawa Barat'),
('Prov019', 'Jawa Tengah'),
('Prov020', 'Daerah Istimewa Yogyakarta'),
('Prov021', 'Jawa Timur'),
('Prov022', 'Bali'),
('Prov023', 'Nusa Tenggara Timur'),
('Prov024', 'Nusa Tenggara Barat'),
('Prov025', 'Gorontalo'),
('Prov026', 'Sulawesi Barat'),
('Prov027', 'Sulawesi Tengah'),
('Prov028', 'Sulawesi Utara'),
('Prov029', 'Sulawesi Tenggara'),
('Prov030', 'Sulawesi Selatan'),
('Prov031', 'Maluku Utara'),
('Prov032', 'Maluku'),
('Prov033', 'Papua Barat'),
('Prov034', 'Papua'),
('Prov035', 'Papua Tengah'),
('Prov036', 'Papua Pegunungan'),
('Prov037', 'Papua Selatan'),
('Prov038', 'Papua Barat Daya');

-- --------------------------------------------------------

--
-- Table structure for table `status_gizi`
--

CREATE TABLE `status_gizi` (
  `Id_Status_Gizi` varchar(10) NOT NULL,
  `Status_Gizi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_gizi`
--

INSERT INTO `status_gizi` (`Id_Status_Gizi`, `Status_Gizi`) VALUES
('SG001', 'Gizi Kurang'),
('SG002', 'Gizi  Normal'),
('SG003', 'Overweight'),
('SG004', 'Obesitas'),
('SG005', 'Normal'),
('SG006', 'Belum Diperiksa');

-- --------------------------------------------------------

--
-- Table structure for table `status_kesejahteraan`
--

CREATE TABLE `status_kesejahteraan` (
  `Id_Status_Kesejahteraan` varchar(10) NOT NULL,
  `Status_Kesejahteraan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_kesejahteraan`
--

INSERT INTO `status_kesejahteraan` (`Id_Status_Kesejahteraan`, `Status_Kesejahteraan`) VALUES
('SK001', 'Keluarga Pra Sejahtera'),
('SK002', 'Keluarga Sejahtera I'),
('SK003', 'Keluarga Sejahtera II'),
('SK004', 'Keluarga Sejahtera III'),
('SK005', 'Keluarga Sejahtera III Plus');

-- --------------------------------------------------------

--
-- Table structure for table `status_pernikahan`
--

CREATE TABLE `status_pernikahan` (
  `Id_Status_Pernikahan` varchar(10) NOT NULL,
  `Status_Pernikahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_pernikahan`
--

INSERT INTO `status_pernikahan` (`Id_Status_Pernikahan`, `Status_Pernikahan`) VALUES
('SP001', 'Belum Kawin'),
('SP002', 'Kawin'),
('SP003', 'Cerai Hidup'),
('SP004', 'Cerai Mati');

-- --------------------------------------------------------

--
-- Table structure for table `status_verifikasi`
--

CREATE TABLE `status_verifikasi` (
  `Id_Status_Verifikasi` varchar(10) NOT NULL,
  `Status_Verifikasi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_verifikasi`
--

INSERT INTO `status_verifikasi` (`Id_Status_Verifikasi`, `Status_Verifikasi`) VALUES
('SV001', 'Menunggu Verifikasi'),
('SV002', 'Verifikasi Diterima'),
('SV003', 'Verifikasi Ditolak'),
('SV004', 'Belum Diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `Id` varchar(10) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`Id`, `Username`, `Password`, `Nama`) VALUES
('', NULL, NULL, NULL),
('s0001', 'tes', 's 1', 'ssss'),
('s002', 'iqbal', '1', 'Iqbal');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(10) DEFAULT NULL,
  `Item` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`ID`, `Name`, `Item`) VALUES
(29, 'T3', '26'),
(33, 'C5', '64'),
(39, '1', '1'),
(40, 'D', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` varchar(10) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `No_KK` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`, `Nama`, `No_KK`) VALUES
('U001', 'iqbal', '1', 'Iqbal', '0801128222270299'),
('U002', 'putripra', '1', 'putri pratiwi', '1606022603220109');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`NIK_Anak`),
  ADD KEY `No_KK` (`No_KK`),
  ADD KEY `Id_Jenis_Kelamin` (`Id_Jenis_Kelamin`),
  ADD KEY `anak_ibfk_4` (`Id_Golongan_Darah`),
  ADD KEY `Id_Status_Verifikasi` (`Id_Status_Verifikasi`);

--
-- Indexes for table `catatan_pemeriksaan`
--
ALTER TABLE `catatan_pemeriksaan`
  ADD PRIMARY KEY (`Id_Catatan_Pemeriksaan`),
  ADD KEY `No_NIK_Anak` (`NIK_Anak`),
  ADD KEY `Id_Status_Gizi` (`Id_Status_Gizi`),
  ADD KEY `Id_Jadwal` (`Id_Jadwal`);

--
-- Indexes for table `daftar_layanan`
--
ALTER TABLE `daftar_layanan`
  ADD PRIMARY KEY (`Id_Daftar_Layanan`);

--
-- Indexes for table `golongan_darah`
--
ALTER TABLE `golongan_darah`
  ADD PRIMARY KEY (`Id_Golongan_Darah`);

--
-- Indexes for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  ADD KEY `Id_Daftar_Layanan` (`Id_Jenis_Pemeriksaan`),
  ADD KEY `Id_Catatan_Pemeriksaan` (`Id_Catatan_Pemeriksaan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`Id_Jadwal`),
  ADD KEY `Id_Posyandu` (`Id_Posyandu`);

--
-- Indexes for table `jadwal_pemeriksaan`
--
ALTER TABLE `jadwal_pemeriksaan`
  ADD KEY `Id_Jenis_Pemeriksaan` (`Id_Jenis_Pemeriksaan`),
  ADD KEY `Id_Jadwal` (`Id_Jadwal`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`Id_Jenis_Kelamin`);

--
-- Indexes for table `jenis_pemeriksaan`
--
ALTER TABLE `jenis_pemeriksaan`
  ADD PRIMARY KEY (`Id_Jenis_Pemeriksaan`),
  ADD KEY `Id_Daftar_Layanan` (`Id_Daftar_Layanan`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`Id_Kabupaten`),
  ADD KEY `Id_Provinsi` (`Id_Provinsi`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`Id_Kecamatan`),
  ADD KEY `Id_Kabupaten` (`Id_Kabupaten`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`Id_Kelurahan`),
  ADD KEY `Id_Kecamatan` (`Id_Kecamatan`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`No_KK`),
  ADD KEY `Id_Status_Sejahtera` (`Id_Status_Kesejahteraan`),
  ADD KEY `Id_Status_Pernikahan` (`Id_Status_Pernikahan`);

--
-- Indexes for table `posyandu`
--
ALTER TABLE `posyandu`
  ADD PRIMARY KEY (`Id_Posyandu`),
  ADD KEY `Id_Kelurahan` (`Id_Kelurahan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`Id_Provinsi`);

--
-- Indexes for table `status_gizi`
--
ALTER TABLE `status_gizi`
  ADD PRIMARY KEY (`Id_Status_Gizi`);

--
-- Indexes for table `status_kesejahteraan`
--
ALTER TABLE `status_kesejahteraan`
  ADD PRIMARY KEY (`Id_Status_Kesejahteraan`);

--
-- Indexes for table `status_pernikahan`
--
ALTER TABLE `status_pernikahan`
  ADD PRIMARY KEY (`Id_Status_Pernikahan`);

--
-- Indexes for table `status_verifikasi`
--
ALTER TABLE `status_verifikasi`
  ADD PRIMARY KEY (`Id_Status_Verifikasi`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anak`
--
ALTER TABLE `anak`
  ADD CONSTRAINT `anak_ibfk_1` FOREIGN KEY (`Id_Jenis_Kelamin`) REFERENCES `jenis_kelamin` (`Id_Jenis_Kelamin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anak_ibfk_2` FOREIGN KEY (`No_KK`) REFERENCES `orang_tua` (`No_KK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anak_ibfk_4` FOREIGN KEY (`Id_Golongan_Darah`) REFERENCES `golongan_darah` (`Id_Golongan_Darah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anak_ibfk_5` FOREIGN KEY (`Id_Status_Verifikasi`) REFERENCES `status_verifikasi` (`Id_Status_Verifikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catatan_pemeriksaan`
--
ALTER TABLE `catatan_pemeriksaan`
  ADD CONSTRAINT `catatan_pemeriksaan_ibfk_1` FOREIGN KEY (`NIK_Anak`) REFERENCES `anak` (`NIK_Anak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catatan_pemeriksaan_ibfk_3` FOREIGN KEY (`Id_Status_Gizi`) REFERENCES `status_gizi` (`Id_Status_Gizi`),
  ADD CONSTRAINT `catatan_pemeriksaan_ibfk_4` FOREIGN KEY (`Id_Jadwal`) REFERENCES `jadwal` (`Id_Jadwal`);

--
-- Constraints for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  ADD CONSTRAINT `hasil_pemeriksaan_ibfk_1` FOREIGN KEY (`Id_Jenis_Pemeriksaan`) REFERENCES `jenis_pemeriksaan` (`Id_Jenis_Pemeriksaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_pemeriksaan_ibfk_2` FOREIGN KEY (`Id_Catatan_Pemeriksaan`) REFERENCES `catatan_pemeriksaan` (`Id_Catatan_Pemeriksaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`Id_Posyandu`) REFERENCES `posyandu` (`Id_Posyandu`);

--
-- Constraints for table `jadwal_pemeriksaan`
--
ALTER TABLE `jadwal_pemeriksaan`
  ADD CONSTRAINT `jadwal_pemeriksaan_ibfk_1` FOREIGN KEY (`Id_Jenis_Pemeriksaan`) REFERENCES `jenis_pemeriksaan` (`Id_Jenis_Pemeriksaan`),
  ADD CONSTRAINT `jadwal_pemeriksaan_ibfk_2` FOREIGN KEY (`Id_Jadwal`) REFERENCES `jadwal` (`Id_Jadwal`);

--
-- Constraints for table `jenis_pemeriksaan`
--
ALTER TABLE `jenis_pemeriksaan`
  ADD CONSTRAINT `jenis_pemeriksaan_ibfk_1` FOREIGN KEY (`Id_Daftar_Layanan`) REFERENCES `daftar_layanan` (`Id_Daftar_Layanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`Id_Provinsi`) REFERENCES `provinsi` (`Id_Provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`Id_Kabupaten`) REFERENCES `kabupaten` (`Id_Kabupaten`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`Id_Kecamatan`) REFERENCES `kecamatan` (`Id_Kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD CONSTRAINT `orang_tua_ibfk_1` FOREIGN KEY (`Id_Status_Kesejahteraan`) REFERENCES `status_kesejahteraan` (`Id_Status_Kesejahteraan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orang_tua_ibfk_2` FOREIGN KEY (`Id_Status_Pernikahan`) REFERENCES `status_pernikahan` (`Id_Status_Pernikahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posyandu`
--
ALTER TABLE `posyandu`
  ADD CONSTRAINT `posyandu_ibfk_1` FOREIGN KEY (`Id_Kelurahan`) REFERENCES `kelurahan` (`Id_Kelurahan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
