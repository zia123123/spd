-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2015 at 12:52 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spd_jateng`
--

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE `mainmenu` (
  `id_mainmenu` int(11) NOT NULL,
  `nama_mainmenu` varchar(100) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `link` varchar(50) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1= admin,2=jurusan,3 dosen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_mainmenu`, `nama_mainmenu`, `icon`, `aktif`, `link`, `level`) VALUES
(26, 'master data', 'fa fa-plus', 'y', '#', 1),
(27, 'SPPD', 'fa fa-folder-o', 'y', 'sppd', 1),
(28, 'SKPD', 'fa fa-file-text-o', 'y', '#', 1),
(29, 'Laporan', 'gi gi-money', 'y', '#', 1),
(41, 'SPPD', 'fa fa-sticky-note-o', 'y', 'sppd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_mainmenu` int(11) NOT NULL,
  `nama_submenu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `icon` varchar(30) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_mainmenu`, `nama_submenu`, `link`, `aktif`, `icon`, `level`) VALUES
(70, 28, 'tahun akademik', 'tahunakademik', 't', 'gi gi-request', 1),
(71, 26, 'pe', 'gedung', 't', 'gi gi-cargo', 1),
(72, 26, 'ruangan', 'ruangan', 't', 'gi gi-bank', 1),
(73, 28, 'permintaan SKPD', 'request_skpd', 't', 'gi gi-request', 1),
(74, 26, 'prodi', 'prodi', 't', 'gi gi-table', 1),
(75, 26, 'pajak', 'pajak', 't', 'fa fa-credit-card', 1),
(76, 26, 'pegawai', 'pegawai', 'y', 'gi gi-parents', 1),
(77, 28, 'permintaan SKPD', 'request_skpd', 'y', 'fa fa-calendar', 1),
(78, 26, 'User Aplikasi', 'users', 'y', 'gi gi-address_book', 1),
(79, 29, 'form pembayaran', 'keuangan/pembayaran', 't', 'gi gi-coins', 1),
(80, 29, 'jenis pembayaran', 'jenisbayar', 't', 'fa fa-puzzle-piece', 1),
(81, 29, 'rekap skpd', 'rekap_skpd', 'y', 'fa fa-money', 1),
(82, 29, 'laporan keuangan', 'keuangan/laporan', 't', 'gi gi-notes_2', 1),
(83, 28, 'SKPD', 'skpd', 'y', 'fa fa-keyboard-o', 1),
(84, 28, 'kartu rencana studi', 'krs/lihat', 't', 'gi gi-cart_in', 1),
(85, 35, 'kartu rencana studi', 'krs/lihat', 't', 'gi gi-notes_2', 0),
(86, 35, 'kartu rencana studi', 'khs', 't', 'hi hi-list-alt', 0),
(87, 26, 'grade nilai', 'grade', 't', 'gi gi-credit_card', 0),
(88, 28, 'kartu hasil studi', 'khs', 't', 'gi gi-notes', 0),
(89, 26, 'golongan', 'golongan', 'y', 'fa fa-credit-card', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahanbakar`
--

CREATE TABLE `tb_bahanbakar` (
  `id_bbm` int(255) NOT NULL,
  `jenis_bbm` varchar(255) DEFAULT NULL,
  `perliter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bahanbakar`
--

INSERT INTO `tb_bahanbakar` (`id_bbm`, `jenis_bbm`, `perliter`) VALUES
(1, 'premium', '7400'),
(2, 'pertamax', '8850'),
(3, 'pertalite', '8400');

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_gol` int(10) NOT NULL,
  `gol` varchar(255) NOT NULL,
  `nama_gol` varchar(255) NOT NULL,
  `klasifikasi` varchar(10) NOT NULL,
  `raskin` int(12) DEFAULT NULL,
  `management_reg` int(12) DEFAULT NULL,
  `management_diklat` int(12) DEFAULT NULL,
  `u_repres` int(12) DEFAULT NULL,
  `u_hotel` int(12) DEFAULT NULL,
  `u_taxi` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_gol`, `gol`, `nama_gol`, `klasifikasi`, `raskin`, `management_reg`, `management_diklat`, `u_repres`, `u_hotel`, `u_taxi`) VALUES
(1, '0', 'Pengemudi', '0', 225000, 225000, 225000, NULL, NULL, NULL),
(2, 'I', 'Penata', 'I', 0, 0, 0, NULL, NULL, NULL),
(3, 'II', 'Penata ', 'I', 0, 0, 0, NULL, NULL, NULL),
(4, 'III', 'Penata', 'I', 0, 0, 0, NULL, NULL, NULL),
(5, 'IV', 'Penata', 'I', 0, 0, 0, NULL, NULL, NULL),
(6, 'V', 'Penata', 'II', 350000, 315000, 350000, 200000, 350000, 200000),
(7, 'VI', 'Penata', 'II', 350000, 315000, 350000, 200000, 350000, 200000),
(8, 'VII', 'Penata', 'II', 350000, 315000, 350000, 200000, 350000, 200000),
(9, 'VIII', 'Penata', 'II', 350000, 315000, 350000, 200000, 350000, 200000),
(10, 'IX', 'Penata', 'III', 400000, 360000, 400000, 200000, 450000, 200000),
(11, 'X', 'Penata', 'III', 400000, 360000, 400000, 200000, 450000, 200000),
(12, 'XI', 'Penata', 'III', 400000, 360000, 400000, 200000, 450000, 200000),
(13, 'XII', 'Penata', 'III', 400000, 360000, 400000, 200000, 450000, 200000),
(14, 'XIII', 'Penata', 'IV', 450000, 405000, 450000, 200000, 550000, 200000),
(15, 'XIV', 'Penata', 'IV', 450000, 405000, 450000, 200000, 550000, 200000),
(16, 'XV', 'Penata', 'IV', 450000, 405000, 450000, 200000, 550000, 200000),
(17, 'XVI', 'Penata', 'IV', 450000, 405000, 450000, 200000, 550000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(255) NOT NULL,
  `tempat_awal` varchar(255) DEFAULT NULL,
  `tempat_tujuan` varchar(255) DEFAULT NULL,
  `id_sppd` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `tempat_awal`, `tempat_tujuan`, `id_sppd`) VALUES
(65, 'semarang', 'Perum Bulog Kantor Pusat', 123),
(66, 'semarang', 'GBB KEDUNGREJO', 124),
(67, 'semarang', 'GBB KALIWUNGU', 124),
(68, 'semarang', 'GBB SOKOKULON', 125),
(69, 'semarang', 'GBB KALIWUNGU', 125),
(70, 'semarang', 'Subdivre Banyumas', 126),
(71, 'semarang', 'Subdivre Surakarta', 127),
(72, 'semarang', 'Perum Bulog Kantor Pusat', 128),
(73, 'semarang', 'Subdivre Surakarta', 129),
(75, 'semarang', 'Perum Bulog Kantor Pusat', 131),
(76, 'semarang', 'Jakarta', 132),
(77, 'semarang', 'Bandung', 132),
(78, 'semarang', 'Semarang', 132),
(79, 'semarang', 'Perum Bulog Kantor Pusat', 133),
(80, 'semarang', 'Perum Bulog Kantor Pusat', 134),
(81, 'semarang', 'Perum Bulog Kantor Pusat', 135),
(113, 'semarang', 'SUBDIVRE PATI', 141),
(114, 'semarang', 'Subdivre Surakarta', 141),
(115, 'semarang', 'Subdivre Pekalongan', 141),
(118, 'semarang', 'GBB BUMIREJO', 143),
(128, 'semarang', 'GBB KALIWUNGU', 149),
(129, 'semarang', 'GBB KEDUNGREJO', 150),
(130, 'semarang', 'GBB MARGOREJO', 151),
(131, 'semarang', 'GBB SOKOKULON', 152),
(133, 'semarang', 'SUBDIVRE BANYUMAS', 154),
(134, 'semarang', 'GBB KALIWUNGU', 155),
(135, 'semarang', 'GBB KEDUNGREJO', 156),
(136, 'semarang', 'GBB SOKOKULON', 157),
(137, 'semarang', 'GBB JEPON', 158);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(70) NOT NULL,
  `noreg` varchar(20) NOT NULL,
  `nama_pegawai` varchar(22) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `unitkerja` varchar(255) NOT NULL,
  `sts` int(1) NOT NULL COMMENT '1=pegawai, 2=pengemudi',
  `sts_pejabat` int(1) NOT NULL,
  `pajak` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `noreg`, `nama_pegawai`, `golongan`, `jabatan`, `unitkerja`, `sts`, `sts_pejabat`, `pajak`) VALUES
(1, '780000984', '6183595', 'Usep Karyana', 'XVI', 'Kepala', 'Divre Jateng', 1, 1, 30),
(2, '780007119', '7297194', 'Sopran Kenedi', 'XIII', 'Wakil Kepala', 'Divre Jateng', 1, 1, 15),
(3, '780007094', '6797095', 'Rudi Amran', 'XIV', 'Kabid Minku', 'Divre Jateng', 1, 1, 15),
(4, '068106071', '8106071', 'Joko Pamungkas', 'XI', 'Kasi SDM dan Hukum', 'Divre Jateng', 1, 0, 15),
(5, '780006617', '6195726', 'Rusmadi', 'X', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(6, '118811082', '8811082', 'Andhika Saputra', 'X', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(7, '088108048', '8108048', 'Rully Rahmini Dewi', 'X', 'Kasi Keuangan', 'Divre Jateng', 1, 0, 15),
(8, '068206089', '8206089', 'Anastasia Ratna K.', 'XI', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(9, '780002769', '6284187', 'Endang Kusriyanti', 'X', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(10, '068306115', '8306115', 'Dian Agus Istiani', 'VIII', 'Kasir', 'Divre Jateng', 1, 0, 15),
(11, '067906033', '7906033', 'Angga Chandraresmi', 'XI', 'Kasi Akuntansi', 'Divre Jateng', 1, 0, 15),
(12, '128912232', '8912232', 'Widi Raspati A.', 'VII', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(13, '087408484', '7408484', 'Kartini', 'VI', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(14, '780003266', '6383734', 'Siti Retno Farida', 'XIII', 'Kasi Humas', 'Divre Jateng', 1, 0, 15),
(15, '118611084', '8611084', 'Kukuh Budi Satrio', 'X', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(16, '780002794', '6284188', 'Nurudin', 'XII', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(17, '780003219', '6181165', 'I.M. Hasta Adji B.', 'X', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(18, '780007030', '7397305', 'Widoyo Seno', 'X', 'Kasi TU dan Umum', 'Divre Jateng', 1, 0, 15),
(19, '780002777', '6184178', 'Ayu Ratnawati', 'XI', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(20, '780002788', '6384206', 'Rahayu Pangestuti', 'X', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(21, '780006396', '6095242', 'Suyanto', 'X', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(22, '780002900', '6085333', 'Priyo Sugiarto', 'VIII', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(23, '129112356', '9112356', 'M. Maulana R', 'VII', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(24, '088108629', '8108629', 'Indarto Muji H', 'VI', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(25, '086908761', '6908761', 'Giri Nugroho S.', 'VI', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(26, '780002688', '6485483', 'Iwan Nurwansyah', 'XIV', 'Kabid PP', 'Divre Jateng', 1, 1, 15),
(27, '780002813', '6184176', 'Sumiyatun', 'XII', 'Kasi Pengadaan', 'Divre Jateng', 1, 0, 15),
(28, '118711013', '8711013', 'Rina Yoanita R.', 'X', 'Staf PP', 'Divre Jateng', 1, 0, 15),
(29, '780003242', '6485336', 'Sutarno', 'XI', 'Staf PP', 'Divre Jateng', 1, 0, 15),
(30, '088008582', '8008582', 'Wahyu Handoro D.', 'VI', 'Staf PP', 'Divre Jateng', 1, 0, 15),
(31, '067806009', '7806009', 'Alia Bestari G.', 'XI', 'Kasi Analisa Gasar', 'Divre Jateng', 1, 0, 15),
(32, '128912207', '8912207', 'Randy Yuniardi', 'IX', 'Staf PP', 'Divre Jateng', 1, 0, 15),
(33, '067906034', '7906034', 'Anna Marianofa', 'XI', 'Kasi Diang', 'Divre Jateng', 1, 0, 15),
(34, '088208650', '8208650', 'Dodie Novianto', 'VI', 'Staf Minku', 'Divre Jateng', 1, 0, 15),
(35, 'NR7705005', '7705005', 'Rina Ediati', 'XI', 'Kasi Perawatan Kualitas', 'Divre Jateng', 1, 0, 15),
(36, '128612142', '8612142', 'Fedrial Farhan', 'IX', 'Staf PP', 'Divre Jateng', 1, 0, 15),
(37, '780002892', '6083717', 'Vt. Rapi Indriastuti', 'XIII', 'Kasi Penyaluran', 'Divre Jateng', 1, 0, 15),
(38, '780003135', '6383732', 'Tiwiek Mulyani Dwi  W.', 'X', 'Staf PP', 'Divre Jateng', 1, 0, 15),
(39, '087108114', '7108114', 'Wiwit Puji Santoso', 'VI', 'Staf PP', 'Divre Jateng', 1, 0, 15),
(40, '780007167', '6997262', 'Gunawan Wibisono', 'XIII', 'Kabid PPU', 'Divre Jateng', 1, 1, 15),
(41, '780003241', '6283108', 'Achmad Samsul B.', 'XII', 'Kasi Indag', 'Divre Jateng', 1, 0, 15),
(42, '128212307', '8212307', 'Doni Koes Wardono', 'IX', 'Staf PPU', 'Divre Jateng', 1, 0, 15),
(43, '780003256', '6283731', 'Suharwindoyo', 'XII', 'Kasi Jasa', 'Divre Jateng', 1, 0, 15),
(44, '780002796', '6484213', 'Jarot Mardi Santoso', 'XII', 'Kasi TI', 'Divre Jateng', 1, 0, 15),
(45, '088408157', '8408157', 'Andini Kumalasari', 'IX', 'Staf PPU', 'Divre Jateng', 1, 0, 15),
(46, '780003125', '6283274', 'Teguh Supriyanto', 'XIII', 'RM UB PGB', 'Divre Jateng', 1, 1, 15),
(47, '128712198', '8712198', 'Novia Pangastuti', 'VII', 'Staf UB PGB', 'Divre Jateng', 1, 0, 15),
(48, '780007261', '7197238', 'Sri Muniati', 'XIII', 'RM UB Bulogmart', 'Divre Jateng', 1, 1, 15),
(49, '129012103', '9012103', 'Anugrah Bintar', 'IX', 'Staf UB Bulogmart', 'Divre Jateng', 1, 0, 15),
(50, '780006894', '6797047', 'Agus Supriyanto', 'XIII', 'RB UB Ujastasma', 'Divre Jateng', 1, 0, 15),
(51, '780005057', '6385361', 'Ngatman', 'XII', 'RM UB Opaset', 'Divre Jateng', 1, 1, 15),
(52, '068106072', '8106072', 'Ernita Permatasari', 'XI', 'Korlap UB Opaset', 'Divre Jateng', 1, 1, 15),
(53, '780001884', '6083573', 'Nur Badiah R', 'XII', 'Asdiv Perencenaan', 'Divre Jateng', 1, 0, 15),
(54, '780003179', '6086019', 'Hadi Slameto', 'XII', 'Setara Jenjang III PT. JPLB Jateng', 'Divre Jateng', 1, 0, 15),
(55, '780003124', '6083099', 'Eusthacius R. Birowo', 'XI', 'Asdiv Pemasaran', 'Divre Jateng', 1, 0, 15),
(56, '780002909', '6084170', 'Wihartono', 'XIII', 'Staf', 'Divre Jateng', 1, 0, 15),
(57, '780003030', '6285573', 'Ramelan', 'XII', 'Asisten Pengawas', 'Divre Jateng', 1, 0, 15),
(58, '780003385', '6484211', 'Sri Asiati', 'XII', 'Asisten Pengawas', 'Divre Jateng', 1, 0, 15),
(59, '780003264', '6084173', 'Suroso', 'XII', 'Asisten Pengawas', 'Divre Jateng', 1, 0, 15),
(60, '088508101', '8508101', 'M Nurjuliansyah R.', 'X', 'Asisten Pengawas', 'Divre Jateng', 1, 0, 15),
(61, '780006405', '6295279', 'Gampil Sri Rejeki', 'X', 'Asisten Pengawas', 'Divre Jateng', 1, 0, 15),
(62, '780003112', '6283728', 'Sugiarni', 'XIII', 'Kepala Subdivre Semarang', 'Subdivre Semarang', 1, 0, 15),
(63, '780007322', '7298013', 'Musazdin Said', 'XIII', 'Waka Subdivre Semarang', 'Subdivre Semarang', 1, 0, 15),
(64, '780007049', '6597318', 'Khozin', 'XIII', 'Kepala Subdivre Pati', 'Subdivre Pati', 1, 0, 15),
(65, '780000981', '6284013', 'Gatot Endro Waluyo', 'XIII', 'Waka Subdivre Pati', 'Subdivre Pati', 1, 0, 15),
(66, '780006888', '6897042', 'Yudy Prakasa Yudha', 'XIII', 'Kepala Subdivre Surakarta', 'Subdivre Surakarta', 1, 0, 15),
(67, '780007103', '6997017', 'Moehari', 'XIII', 'Waka Subdivre Surakarta', 'Subdivre Surakarta', 1, 0, 15),
(68, '780003152', '6285575', 'Setio Wastono', 'XIII', 'Kepala Subdivre Banyumas', 'Subdivre Banyumas', 1, 0, 15),
(69, '780002991', '6284189', 'Pramono', 'XIII', 'Waka Subdivre Banyumas', 'Subdivre Banyumas', 1, 0, 15),
(70, '780007028', '6897266', 'M. Imron Rosidi', 'XIII', 'Kepala Subdivre Kedu', 'Subdivre Kedu', 1, 0, 15),
(71, '780007260', '7097235', 'Ruwaji', 'XIII', 'Waka Subdivre Kedu', 'Subdivre Kedu', 1, 0, 15),
(72, '780002890', '6385577', 'Ismoyo Dwi Djantoro', 'XIII', 'Kepala Subdivre Pekalongan', 'Subdivre Pekalongan', 1, 0, 15),
(73, '780001842', '6485484', 'Sulais', 'XII', 'Waka Subdivre Pekalongan', 'Subdivre Pekalongan', 1, 0, 15),
(74, '111111111', '1111111', 'Topo Santoso', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 6),
(75, '111111112', '1111112', 'Teguh', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 6),
(76, '111111113', '1111113', 'Sarmijan', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 5),
(77, '111111114', '1111114', 'Jumain', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 6),
(78, '111111115', '1111115', 'Jayadi', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 6),
(79, '111111116', '1111116', 'Andhita Satrianto', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 6),
(80, '111111117', '1111117', 'Yudhi Satya', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 6),
(81, '111111118', '1111118', 'Aji Gunawan', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 6),
(82, '111111119', '1111119', 'Rindho Suhartoyo', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 6),
(83, '111111120', '1111120', 'Rangga', '0', 'Pengemudi', 'Divre Jateng', 2, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pejabat_ttd`
--

CREATE TABLE `tb_pejabat_ttd` (
  `id_pejabat_ttd` int(10) NOT NULL,
  `pemeriksa_1` varchar(255) DEFAULT NULL,
  `jabatan_1` varchar(255) DEFAULT NULL,
  `pemeriksa_2` varchar(255) DEFAULT NULL,
  `jabatan_2` varchar(255) DEFAULT NULL,
  `pemeriksa_3` varchar(255) DEFAULT NULL,
  `jabatan_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pejabat_ttd`
--

INSERT INTO `tb_pejabat_ttd` (`id_pejabat_ttd`, `pemeriksa_1`, `jabatan_1`, `pemeriksa_2`, `jabatan_2`, `pemeriksa_3`, `jabatan_3`) VALUES
(1, 'RUDI AMRAN', 'KABID MINKU', 'RULLY RAHMINI DEWI', 'KASI KEUANGAN', 'WIDOYO SENO', 'KASI TU & UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelaksana`
--

CREATE TABLE `tb_pelaksana` (
  `id_pelaksana` int(25) NOT NULL,
  `noreg` varchar(255) DEFAULT NULL,
  `nama_pelaksana` varchar(255) DEFAULT NULL,
  `gol` varchar(10) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `status_pelaksana` int(25) DEFAULT NULL,
  `id_sppd` int(25) DEFAULT NULL,
  `uang_harian` decimal(20,2) DEFAULT NULL,
  `uang_bbm` decimal(20,2) DEFAULT NULL,
  `uang_repres` decimal(20,2) DEFAULT NULL,
  `uang_hotel` decimal(20,2) DEFAULT NULL,
  `uang_taxi` decimal(20,2) DEFAULT NULL,
  `uang_pesawat_b` decimal(20,2) DEFAULT NULL,
  `uang_pesawat_p` decimal(20,2) DEFAULT NULL,
  `uang_kereta_b` decimal(20,2) DEFAULT NULL,
  `uang_kereta_p` decimal(20,2) DEFAULT NULL,
  `uang_travel_b` decimal(20,2) DEFAULT NULL,
  `uang_travel_p` decimal(20,2) DEFAULT NULL,
  `jumlah` decimal(20,2) DEFAULT NULL,
  `pph` int(10) DEFAULT NULL,
  `potongan` decimal(20,2) DEFAULT NULL,
  `jumlah_diterima` decimal(20,2) DEFAULT NULL,
  `jumlah_diterima_pswt` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelaksana`
--

INSERT INTO `tb_pelaksana` (`id_pelaksana`, `noreg`, `nama_pelaksana`, `gol`, `jabatan`, `unit_kerja`, `status_pelaksana`, `id_sppd`, `uang_harian`, `uang_bbm`, `uang_repres`, `uang_hotel`, `uang_taxi`, `uang_pesawat_b`, `uang_pesawat_p`, `uang_kereta_b`, `uang_kereta_p`, `uang_travel_b`, `uang_travel_p`, `jumlah`, `pph`, `potongan`, `jumlah_diterima`, `jumlah_diterima_pswt`) VALUES
(176, '6183595', 'Usep Karyana', 'XVI', 'Kepala', 'Divre Jateng', 1, 123, '900000.00', NULL, '200000.00', '900000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000000.00', 15, '300000.00', '1700000.00', NULL),
(177, '7197261', 'Arwakhudin Widiarso', 'XIII', 'Wakil Kepala', 'Divre Jateng', 0, 123, '900000.00', '0.00', '200000.00', '900000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000000.00', 15, '300000.00', '1700000.00', NULL),
(178, '8108629', 'Indarto Muji', 'VI', 'Staf TU & Umum', 'Divre Jateng', 1, 124, '630000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '630000.00', 15, '94500.00', '535500.00', NULL),
(179, '9112356', 'M. Maulana. R', 'VII', 'Staf TU & Umum', 'Divre Jateng', 0, 124, '630000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '630000.00', 15, '94500.00', '535500.00', NULL),
(180, '6908761', 'Giri Nugroho', 'VI', 'Staf TU & Umum', 'Divre Jateng', 0, 124, '630000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '630000.00', 15, '94500.00', '535500.00', NULL),
(181, '4445551', 'Mahendrawati', 'XIII', 'Staf', 'Divre Jateng', 0, 124, '810000.00', '445480.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1255480.00', 15, '188322.00', '1067158.00', NULL),
(182, '8108629', 'Indarto Muji', 'VI', 'Staf TU & Umum', 'Divre Jateng', 1, 125, '630000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '630000.00', 15, '94500.00', '535500.00', NULL),
(183, '7453621', 'Ari Isnaeni', 'XII', 'Kasi Aswas', 'Divre Jateng', 0, 125, '720000.00', '445480.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1165480.00', 15, '174822.00', '990658.00', NULL),
(184, '9112356', 'M. Maulana. R', 'VII', 'Staf TU & Umum', 'Divre Jateng', 1, 126, '1400000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1400000.00', 15, '210000.00', '1190000.00', NULL),
(185, '6908761', 'Giri Nugroho', 'VI', 'Staf TU & Umum', 'Divre Jateng', 0, 126, '1400000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1400000.00', 15, '210000.00', '1190000.00', NULL),
(186, '7453621', 'Ari Isnaeni', 'XII', 'Kasi Aswas', 'Divre Jateng', 0, 126, '1600000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1600000.00', 15, '240000.00', '1360000.00', NULL),
(187, '8881235', 'Yulistyawan Prasetyo', 'VII', 'Staf', 'Divre Jateng', 0, 126, '1400000.00', '658600.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2058600.00', 15, '308790.00', '1749810.00', NULL),
(188, '7397305', 'Widoyo Seno', 'X', 'Kasi TU & Umum', 'Divre Jateng', 1, 127, '800000.00', NULL, '0.00', '450000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1250000.00', 15, '187500.00', '1062500.00', NULL),
(189, '9112356', 'M. Maulana. R', 'VII', 'Staf TU & Umum', 'Divre Jateng', 0, 127, '700000.00', NULL, '0.00', '350000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1050000.00', 15, '157500.00', '892500.00', NULL),
(190, '8108629', 'Indarto Muji', 'VI', 'Staf TU & Umum', 'Divre Jateng', 0, 127, '700000.00', '350760.00', '0.00', '350000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1400760.00', 15, '210114.00', '1190646.00', NULL),
(191, '1122334', 'VT. Rapi Indirastuti', 'XII', 'Kasi Penyaluran', 'Divre Jateng', 1, 128, '800000.00', NULL, '0.00', '450000.00', '200000.00', '840000.00', '540000.00', NULL, NULL, NULL, NULL, '2290000.00', 15, '343500.00', '1946500.00', '2486500.00'),
(192, '1144774', 'Joko Pamungkas', 'XII', 'Kasi SDM & Hukum', 'Divre Jateng', 0, 128, '800000.00', '0.00', '0.00', '450000.00', '200000.00', '840000.00', '540000.00', NULL, NULL, NULL, NULL, '1250000.00', 15, '187500.00', '1062500.00', '2486500.00'),
(193, '7397305', 'Widoyo Seno', 'X', 'Kasi TU & Umum', 'Divre Jateng', 1, 129, '1200000.00', NULL, '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, '1200000.00', 15, '180000.00', '1020000.00', NULL),
(194, '9112356', 'M. Maulana. R', 'VII', 'Staf TU & Umum', 'Divre Jateng', 0, 129, '1050000.00', NULL, '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, '1050000.00', 15, '157500.00', '892500.00', NULL),
(195, '8108629', 'Indarto Muji', 'VI', 'Staf TU & Umum', 'Divre Jateng', 0, 129, '1050000.00', NULL, '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, '1050000.00', 15, '157500.00', '892500.00', NULL),
(196, '1122334', 'VT. Rapi Indirastuti', 'XII', 'Kasi Penyaluran', 'Divre Jateng', 0, 129, '1200000.00', '509120.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, '1709120.00', 15, '256368.00', '1452752.00', NULL),
(199, '8108629', 'Indarto Muji', 'VI', 'Staf TU & Umum', 'Divre Jateng', 1, 131, '945000.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '945000.00', 15, '141750.00', '803250.00', '803250.00'),
(200, '9112356', 'M. Maulana. R', 'VII', 'Staf TU & Umum', 'Divre Jateng', 0, 131, '945000.00', '1724200.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '2669200.00', 15, '400380.00', '2268820.00', '803250.00'),
(201, '8108629', 'Indarto Muji', 'VI', 'Staf TU & Umum', 'Divre Jateng', 1, 132, '945000.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '945000.00', 15, '141750.00', '803250.00', '803250.00'),
(202, '9112356', 'M. Maulana. R', 'VII', 'Staf TU & Umum', 'Divre Jateng', 0, 132, '945000.00', '1724200.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '2669200.00', 15, '400380.00', '2268820.00', '803250.00'),
(203, '6908761', 'Giri Nugroho', 'VI', 'Staf TU & Umum', 'Divre Jateng', 1, 133, '700000.00', NULL, '0.00', '350000.00', '200000.00', '840000.00', '525000.00', NULL, NULL, NULL, NULL, '2090000.00', 15, '313500.00', '2301500.00', '2615000.00'),
(204, '8108629', 'Indarto Muji', 'VI', 'Staf TU & Umum', 'Divre Jateng', 0, 133, '700000.00', NULL, '0.00', '350000.00', '200000.00', '840000.00', '525000.00', NULL, NULL, NULL, NULL, '2090000.00', 15, '313500.00', '2301500.00', '2615000.00'),
(205, '4445551', 'Mahendrawati', 'XIII', 'Staf', 'Divre Jateng', 0, 133, '900000.00', '0.00', '0.00', '550000.00', '200000.00', '840000.00', '525000.00', NULL, NULL, NULL, NULL, '2490000.00', 15, '373500.00', '2641500.00', '3015000.00'),
(206, '6183595', 'Usep Karyana', 'XVI', 'Kepala', 'Divre Jateng', 1, 134, '1350000.00', NULL, '200000.00', '1100000.00', '200000.00', '840000.00', '625000.00', NULL, NULL, NULL, NULL, '3690000.00', 15, '553500.00', '3761500.00', '4315000.00'),
(207, '6797095', 'Rudi Amran', 'XIV', 'Kabid Minku', 'Divre Jateng', 0, 134, '1350000.00', '0.00', '0.00', '1100000.00', '200000.00', '840000.00', '625000.00', NULL, NULL, NULL, NULL, '3490000.00', 15, '523500.00', '3591500.00', '4115000.00'),
(208, '7197261', 'Arwakhudin Widiarso', 'XIII', 'Wakil Kepala', 'Divre Jateng', 1, 135, '900000.00', '0.00', '0.00', '550000.00', '0.00', '840000.00', '525000.00', NULL, NULL, NULL, NULL, '2490000.00', 15, '373500.00', '2116500.00', '0.00'),
(253, '8106071', 'Joko Pamungkas', 'XI', 'Kasi SDM dan Hukum', 'Divre Jateng', 1, 141, '1080000.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '1080000.00', 15, '162000.00', '918000.00', '0.00'),
(254, '7408484', 'Kartini', 'VI', 'Staf Minku', 'Divre Jateng', 0, 141, '945000.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '945000.00', 15, '141750.00', '803250.00', '0.00'),
(255, '6383732', 'Tiwiek Mulyani Dwi  W.', 'X', 'Staf PP', 'Divre Jateng', 0, 141, '1080000.00', '1163280.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '2243280.00', 15, '336492.00', '1906788.00', '0.00'),
(258, '6183595', 'Usep Karyana', 'XVI', 'Kepala', 'Divre Jateng', 1, 143, '810000.00', NULL, '200000.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '1010000.00', 30, '303000.00', '707000.00', '0.00'),
(259, '6184178', 'Ayu Ratnawati', 'XI', 'Staf Minku', 'Divre Jateng', 0, 143, '720000.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '720000.00', 15, '108000.00', '612000.00', '0.00'),
(260, '8108629', 'Indarto Muji H', 'VI', 'Staf Minku', 'Divre Jateng', 0, 143, '630000.00', '367040.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '997040.00', 15, '149556.00', '847484.00', '0.00'),
(274, '8108048', 'Rully Rahmini Dewi', 'X', 'Kasi Keuangan', 'Divre Jateng', 1, 149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, '6183595', 'Usep Karyana', 'XVI', 'Kepala', 'Divre Jateng', 0, 149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, '8106071', 'Joko Pamungkas', 'XI', 'Kasi SDM dan Hukum', 'Divre Jateng', 0, 149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, '8811082', 'Andhika Saputra', 'X', 'Staf Minku', 'Divre Jateng', 0, 149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, '6797095', 'Rudi Amran', 'XIV', 'Kabid Minku', 'Divre Jateng', 1, 150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, '7297194', 'Sopran Kenedi', 'XIII', 'Wakil Kepala', 'Divre Jateng', 0, 150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, '8611084', 'Kukuh Budi Satrio', 'X', 'Staf Minku', 'Divre Jateng', 0, 150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, '7297194', 'Sopran Kenedi', 'XIII', 'Wakil Kepala', 'Divre Jateng', 1, 151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(282, '6195726', 'Rusmadi', 'X', 'Staf Minku', 'Divre Jateng', 0, 151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, '6284187', 'Endang Kusriyanti', 'X', 'Staf Minku', 'Divre Jateng', 0, 151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, '7408484', 'Kartini', 'VI', 'Staf Minku', 'Divre Jateng', 0, 151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, '8108048', 'Rully Rahmini Dewi', 'X', 'Kasi Keuangan', 'Divre Jateng', 1, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, '6997017', 'Moehari', 'XIII', 'Waka Subdivre Surakarta', 'Subdivre Surakarta', 0, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(287, '6285573', 'Ramelan', 'XII', 'Asisten Pengawas', 'Divre Jateng', 0, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, '9012103', 'Anugrah Bintar', 'IX', 'Staf UB Bulogmart', 'Divre Jateng', 0, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(293, '1111117', 'Yudhi Satya', '0', 'Pengemudi', 'Divre Jateng', 1, 154, '675000.00', '222000.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '897000.00', 6, '53820.00', '843180.00', '0.00'),
(294, '6797095', 'Rudi Amran', 'XIV', 'Kabid Minku', 'Divre Jateng', 1, 155, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(295, '7297194', 'Sopran Kenedi', 'XIII', 'Wakil Kepala', 'Divre Jateng', 1, 156, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, '7297194', 'Sopran Kenedi', 'XIII', 'Wakil Kepala', 'Divre Jateng', 1, 157, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, '6195726', 'Rusmadi', 'X', 'Staf Minku', 'Divre Jateng', 1, 158, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengemudi`
--

CREATE TABLE `tb_pengemudi` (
  `id_pengemudi` int(255) NOT NULL,
  `nama_pengemudi` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `unitkerja` varchar(255) DEFAULT NULL,
  `sts` varchar(10) DEFAULT NULL,
  `pajak` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengemudi`
--

INSERT INTO `tb_pengemudi` (`id_pengemudi`, `nama_pengemudi`, `jabatan`, `unitkerja`, `sts`, `pajak`) VALUES
(1, 'Aji Gunawan', 'Pengemudi', 'Divre Jateng', '1', 6),
(2, 'Rindho Suhartoyo', 'Pengemudi', 'Divre Jateng', '1', 6),
(3, 'Jayadi', 'Pengemudi', 'Divre Jateng', '1', 6),
(4, 'Topo Santoso', 'Pengemudi', 'Divre Jateng', '1', 6),
(5, 'Andhita Satrianto', 'Pengemudi', 'Divre Jateng', '1', 6),
(6, 'Sarmijan', 'Pengemudi', 'Divre Jateng', '1', 5),
(7, 'Jumain', 'Pengemudi', 'Divre Jateng', '1', 6),
(8, 'Yudhi Satya C', 'Pengemudi', 'Divre Jateng', '1', 6),
(9, 'Rangga', 'Pengemudi', 'Divre Jateng', '1', 6),
(10, 'Teguh', 'Pengemudi', 'Divre Jateng', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengikut`
--

CREATE TABLE `tb_pengikut` (
  `id_pengikut` int(255) NOT NULL,
  `nama_pengikut` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `unitkerja` varchar(255) DEFAULT NULL,
  `sts` varchar(10) DEFAULT NULL,
  `pajak` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengikut`
--

INSERT INTO `tb_pengikut` (`id_pengikut`, `nama_pengikut`, `instansi`, `unitkerja`, `sts`, `pajak`) VALUES
(1, 'Budi', 'Pemkab Semarang', 'Prov. Jateng', '1', 6),
(2, 'Andi', 'BKPD', 'Prov. Jateng', '1', 6),
(3, 'Dedy', 'BPS', 'Prov. Jateng', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_setting` int(10) NOT NULL,
  `set_no_urut` int(20) DEFAULT NULL,
  `harian_bbm` int(255) DEFAULT NULL,
  `perkalian_bbm` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id_setting`, `set_no_urut`, `harian_bbm`, `perkalian_bbm`) VALUES
(1, NULL, 10, '0.20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skpd`
--

CREATE TABLE `tb_skpd` (
  `id_skpd` int(255) NOT NULL,
  `no_skpd` float(255,0) DEFAULT NULL,
  `tgl_skpd` varchar(255) DEFAULT NULL,
  `attr_skpd` varchar(255) DEFAULT NULL,
  `jenis_biaya` varchar(255) DEFAULT NULL,
  `angkutan` varchar(255) DEFAULT NULL,
  `dasar` text,
  `perlengkapan` varchar(255) DEFAULT NULL,
  `ket_lain` text,
  `jarak` int(255) DEFAULT NULL,
  `hasil_km` decimal(10,2) DEFAULT NULL,
  `jenis_bbm` varchar(255) DEFAULT NULL,
  `harga_bbm` int(255) DEFAULT NULL,
  `harian_bbm` decimal(10,2) DEFAULT NULL,
  `jml_bbm` decimal(10,2) DEFAULT NULL,
  `id_sppd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_skpd`
--

INSERT INTO `tb_skpd` (`id_skpd`, `no_skpd`, `tgl_skpd`, `attr_skpd`, `jenis_biaya`, `angkutan`, `dasar`, `perlengkapan`, `ket_lain`, `jarak`, `hasil_km`, `jenis_bbm`, `harga_bbm`, `harian_bbm`, `jml_bbm`, `id_sppd`) VALUES
(33, 1, '03-12-2015', ' / 11030 / 12 / 2015', 'pswt_ka_waka_hotel', 'pesawat terbang', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '               ', 0, '0.00', '', 0, '20.00', '0.00', '123'),
(34, 2, '03-12-2015', ' / 11030 / 12 / 2015', 'monev_ada', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '               ', 201, '40.20', 'premium', 7400, '20.00', '445480.00', '124'),
(35, 3, '03-12-2015', ' / 11030 / 12 / 2015', 'monev_kualitas', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '               ', 201, '40.20', 'premium', 7400, '20.00', '445480.00', '125'),
(36, 4, '03-12-2015', ' / 11030 / 12 / 2015', 'verik_raskin', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '               ', 245, '49.00', 'premium', 7400, '40.00', '658600.00', '126'),
(37, 5, '03-12-2015', ' / 11030 / 12 / 2015', 'darat_hotel', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '               ', 137, '27.40', 'premium', 7400, '20.00', '350760.00', '127'),
(40, 6, '03-12-2015', ' / 11030 / 12 / 2015', 'monev_raskin', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '               ', 194, '38.80', 'premium', 7400, '30.00', '509120.00', '129'),
(41, 7, '03-12-2015', ' / 11030 / 12 / 2015', 'pswt_krywn_hotel', 'pesawat terbang', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', '', 0, '20.00', '0.00', '128'),
(42, 8, '04-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '', 1015, '203.00', 'premium', 7400, '30.00', '1724200.00', '131'),
(43, 9, '04-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '', 1015, '203.00', 'premium', 7400, '30.00', '1724200.00', '132'),
(47, 10, '04-12-2015', ' / 11030 / 12 / 2015', 'pswt_krywn_hotel', 'pesawat terbang', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', '', 0, '20.00', '0.00', '133'),
(48, 11, '04-12-2015', ' / 11030 / 12 / 2015', 'pswt_krywn_hotel', 'pesawat terbang', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', '', 0, '30.00', '0.00', '134'),
(51, 12, '04-12-2015', ' / 11030 / 12 / 2015', 'pswt_ka_waka_hotel', '', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', '', 0, '20.00', '0.00', '135'),
(52, 13, '06-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '', 636, '127.20', 'premium', 7400, '30.00', '1163280.00', '141'),
(53, 14, '07-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', 'opopopopopopo', 148, '29.60', 'premium', 7400, '20.00', '367040.00', '143'),
(54, 15, '09-12-2015', ' / 11030 / 12 / 2015', 'monev_raskin', 'kendaraan dinas', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', 'premium', 7400, '30.00', '222000.00', '154');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sppd`
--

CREATE TABLE `tb_sppd` (
  `id_sppd` int(255) NOT NULL,
  `pemberi_tgs` varchar(255) DEFAULT NULL,
  `jab_pemberi_tgs` varchar(255) DEFAULT NULL,
  `pemohon_tgs` varchar(255) DEFAULT NULL,
  `jab_pemohon_tgs` varchar(255) DEFAULT NULL,
  `durasi_tgs` varchar(255) DEFAULT NULL,
  `tmpt_keberangkatan` varchar(255) DEFAULT NULL,
  `tgl_keberangkatan` varchar(255) DEFAULT NULL,
  `tmpt_tujuan` varchar(255) DEFAULT NULL,
  `tgl_kepulangan` varchar(255) DEFAULT NULL,
  `tugas` varchar(255) DEFAULT NULL,
  `ket` text,
  `sts` int(10) DEFAULT NULL,
  `tgl_sppd` varchar(255) DEFAULT NULL,
  `dasar_sppd` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sppd`
--

INSERT INTO `tb_sppd` (`id_sppd`, `pemberi_tgs`, `jab_pemberi_tgs`, `pemohon_tgs`, `jab_pemohon_tgs`, `durasi_tgs`, `tmpt_keberangkatan`, `tgl_keberangkatan`, `tmpt_tujuan`, `tgl_kepulangan`, `tugas`, `ket`, `sts`, `tgl_sppd`, `dasar_sppd`) VALUES
(123, 'Usep Karyana', 'Kepala', 'Arwakhudin Widiarso', 'Wakil Kepala', '2', 'semarang', '10-12-2015', 'Perum Bulog Kantor Pusat', '11-12-2015', 'Workshop', '', 1, '03-12-2015 09:29:33am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(124, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '2', 'semarang', '03-12-2015', 'GBB KEDUNGREJO,GBB KALIWUNGU', '04-12-2015', 'MONEV ADA', '', 1, '03-12-2015 10:11:41am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(125, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '2', 'semarang', '03-12-2015', 'GBB SOKOKULON,GBB KALIWUNGU', '04-12-2015', 'MONEV KUALITAS', '', 1, '03-12-2015 10:21:30am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(126, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '4', 'semarang', '14-12-2015', 'SUBDIVRE BANYUMAS', '17-12-2015', 'VERIK RASKIN', '', 1, '03-12-2015 10:59:28am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(127, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '2', 'semarang', '08-12-2015', 'Subdivre Surakarta', '09-12-2015', 'DARAT HOTEL', '', 1, '03-12-2015 11:13:22am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(128, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '2', 'semarang', '07-12-2015', 'Perum Bulog Kantor Pusat', '08-12-2015', 'Mengantar Dokumen', '', 1, '03-12-2015 11:28:46am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(129, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '3', 'semarang', '09-12-2015', 'Subdivre Surakarta', '11-12-2015', 'Melayani Tamu', '', 1, '03-12-2015 04:49:07pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(131, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '3', 'semarang', '08-12-2015', 'Perum Bulog Kantor Pusat', '10-12-2015', 'Jalan jalan', '', 1, '04-12-2015 08:21:26am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(132, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '3', 'semarang', '14-12-2015', 'Jakarta,Bandung,Semarang', '16-12-2015', 'Melayani Darma Wanita', '', 1, '04-12-2015 08:25:06am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(133, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '2', 'semarang', '08-12-2015', 'Perum Bulog Kantor Pusat', '09-12-2015', 'Workshop', '', 1, '04-12-2015 09:44:55am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(134, 'Arwakhudin Widiarso', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '3', 'semarang', '09-12-2015', 'Perum Bulog Kantor Pusat', '11-12-2015', 'Pelantikan', '', 1, '04-12-2015 10:58:25am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(135, 'Usep Karyana', 'Kepala', 'Arwakhudin Widiarso', 'Wakil Kepala', '2', 'semarang', '08-12-2015', 'Perum Bulog Kantor Pusat', '09-12-2015', 'DIKLAT', '', 1, '04-12-2015 11:05:24am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(141, 'Iwan Nurwansyah', 'Kabid PP', 'Teguh Supriyanto', 'RM UB PGB', '3', 'semarang', '09-12-2015', 'SUBDIVRE PATI,Subdivre Surakarta,Subdivre Pekalongan', '11-12-2015', 'Test Darat+Hotel', '', 1, '06-12-2015 12:25:20am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(143, 'Sopran Kenedi', 'Wakil Kepala', 'Iwan Nurwansyah', 'Kabid PP', '2', 'semarang', '08-12-2015', 'GBB BUMIREJO', '09-12-2015', 'Melayani Tamu', '', 1, '07-12-2015 06:44:49pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(149, 'Usep Karyana', 'Kepala', 'Usep Karyana', 'Kepala', '2', 'semarang', '16-12-2015', 'GBB KALIWUNGU', '17-12-2015', 'Melayani Tamu', '', 0, '08-12-2015 06:04:50pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(150, 'Usep Karyana', 'Kepala', 'Usep Karyana', 'Kepala', '2', 'semarang', '09-12-2015', 'GBB KEDUNGREJO', '10-12-2015', 'Melayani Tamu', '', 0, '08-12-2015 06:26:24pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(151, 'Usep Karyana', 'Kepala', 'Usep Karyana', 'Kepala', '2', 'semarang', '07-12-2015', 'GBB MARGOREJO', '08-12-2015', 'Workshop', '', 0, '08-12-2015 07:02:53pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(152, 'Sopran Kenedi', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '2', 'semarang', '09-12-2015', 'GBB SOKOKULON', '10-12-2015', 'Jalan jalan', '', 0, '08-12-2015 07:45:02pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(154, 'Usep Karyana', 'Kepala', 'Usep Karyana', 'Kepala', '3', 'semarang', '13-12-2015', 'SUBDIVRE BANYUMAS', '15-12-2015', 'Melayani Tamu', '', 1, '09-12-2015 10:17:58am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(155, 'Usep Karyana', 'Kepala', 'Usep Karyana', 'Kepala', '3', 'semarang', '09-12-2015', 'GBB KALIWUNGU', '11-12-2015', 'Monitoring RR', '', 0, '09-12-2015 07:43:24pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(156, 'Usep Karyana', 'Kepala', 'Usep Karyana', 'Kepala', '3', 'semarang', '09-12-2015', 'GBB KEDUNGREJO', '11-12-2015', 'asdsad', '', 0, '09-12-2015 07:43:51pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(157, 'Usep Karyana', 'Kepala', 'Usep Karyana', 'Kepala', '3', 'semarang', '07-12-2015', 'GBB SOKOKULON', '09-12-2015', '121', '', 0, '09-12-2015 09:32:20pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),
(158, 'Usep Karyana', 'Kepala', 'Usep Karyana', 'Kepala', '3', 'semarang', '09-12-2015', 'GBB JEPON', '11-12-2015', '121', '', 0, '09-12-2015 09:34:54pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat`
--

CREATE TABLE `tb_tempat` (
  `id_tempat` int(10) NOT NULL,
  `nama_tempat` varchar(255) DEFAULT NULL,
  `wilayah` varchar(255) DEFAULT NULL,
  `latlng` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tempat`
--

INSERT INTO `tb_tempat` (`id_tempat`, `nama_tempat`, `wilayah`, `latlng`, `alamat`) VALUES
(1, 'SUBDIVRE PATI', 'Subdivre Pati', '-6.759203, 111.0175', '(JL.) PANGLIMA SUDIRMAN NO.144'),
(2, 'GBB MARGOREJO', 'Subdivre Pati', '-6.764, 111.012', '(JL.) MARGOREJO'),
(3, 'GBB SOKOKULON', 'Subdivre Pati', '-6.779, 110.992', '(JL.) JALAN RAYA PATI KUDUS'),
(4, 'GBB BUMIREJO', 'Subdivre Pati', '-6.784, 110.985', '(JL.) JALAN RAYA PATI KUDUS'),
(5, 'GBB JEPON', 'Subdivre Pati', '-6.983, 111.498', '(JL.) JL LEMAHBANG JEPON'),
(6, 'GBB KEDUNGREJO', 'Subdivre Pati', '-6.740, 111.358', '(JL.) DESA KEDUNGREJO'),
(7, 'GBB KALIWUNGU', 'Subdivre Pati', '-6.783, 110.792', '(JL.) DESA KALIWUNGU'),
(8, 'GBB RENGGING', 'Subdivre Pati', '-6.6727, 110.7113', '(JL.) DESA RENGGING'),
(9, 'SUBDIVRE BANYUMAS', 'Subdivre Banyumas', '-7.435663, 109.261336', 'JL. JEND. SUDIRMAN TIMUR NO. 829'),
(10, 'GBB KLAHANG', 'Subdivre Banyumas', '-7.446919, 109.313468', 'JL. RAYA KLAHANG'),
(11, 'GBB SOKARAJA KULON', 'Subdivre Banyumas', '-7.454059, 109.313468', 'JL. SUPARDJO RUSTAM'),
(12, 'GBB KALIKABONG', 'Subdivre Banyumas', '-7.400937, 109.351408', 'JL. RAYA KALIKABONG'),
(13, 'GBB KARANGSENTUL', 'Subdivre Banyumas', '-7.386020, 109.346958', 'JL. KARANGSENTUL'),
(14, 'GBB PURWONEGORO', 'Subdivre Banyumas', '-7.439484, 109.552407', 'JL. RAYA PURWONEGORO'),
(15, 'GBB CINDAGA', 'Subdivre Banyumas', '-7.555286, 109.195882', 'JL. CINDAGA'),
(16, 'GBB KLAPAGADA', 'Subdivre Banyumas', '-7.616342, 109.147109', 'JL. RAYA MAOS'),
(17, 'GBB GUMILIR', 'Subdivre Banyumas', '-7.684885, 109.041235', 'JL. TENTARA PELAJAR'),
(18, 'GBB LOMANIS', 'Subdivre Banyumas', '-7.689625, 109.018572', 'JL. IR JUANDA'),
(19, 'GBB MULYADADI', 'Subdivre Banyumas', '-7.300896, 108.747397', 'JL. RAYA MAJENANG'),
(20, 'SUBDIVRE KEDU', 'Subdivre Kedu', '-7.507554568855106,110.2045233699755', ''),
(21, 'GBB DANUREJO', 'Subdivre Kedu', '-7.534444, 110.231944', '(JL.) RAYA MERTOYUDAN'),
(22, 'GBB SECANG', 'Subdivre Kedu', '-7.400278, 110.236944', '(JL.) RAYA SECANG'),
(23, 'GBB BENGKAL II', 'Subdivre Kedu', '-7.372778, 110.219722', '(JL.) RAYA BENGKAL'),
(24, 'GBB SAWANGAN', 'Subdivre Kedu', '-7.423889, 109.840278', '(JL.) RAYA BANYUMAS'),
(25, 'GBB SELANG', 'Subdivre Kedu', '-7.690833, 109.684167', '(JL.) KUTOARJO NO.79'),
(26, 'GBB BUTUH', 'Subdivre Kedu', '-7.722222, 109.851944', '(JL.) RAYA BUTUH KUTOARJO'),
(27, 'Subdivre Semarang', 'Subdivre Semarang', '-6.984468, 110.381947', NULL),
(28, 'GBB HARJOSARI', 'Subdivre Semarang', '-7.232537636350103,110.42973236770194', NULL),
(29, 'GBB SUMBEREJO', 'Subdivre Semarang', '-6.966312166056425,110.2752371277893', NULL),
(30, 'GBB MANGKANG KULON', 'Subdivre Semarang', '-6.966312166056425,110.2752371277893', NULL),
(31, 'GBB PALEBON', 'Subdivre Semarang', '-7.009513065259313,110.46819256211165', NULL),
(32, 'GBB DEPOK', 'Subdivre Semarang', '-7.133508711632704,110.90733799333975', NULL),
(33, 'GBB KATONSARI', 'Subdivre Semarang', '-6.906846186216438,110.62163101134502', NULL),
(34, 'GBB TAMBAKAJI', 'Subdivre Semarang', '-6.985163896533246,110.33834642163129', NULL),
(35, 'GBB RANDUGARUT', 'Subdivre Semarang', '-6.981642813693889,110.33548566694662', NULL),
(36, 'Subdivre Surakarta', 'Subdivre Surakarta', '-7.542859545381654,110.76906399430754', NULL),
(37, 'GBB NGABEAN', 'Subdivre Surakarta', '-7.546818777837854,110.74366079235915', NULL),
(38, 'GBB BANARAN', 'Subdivre Surakarta', '-7.641774367041277,110.68967673178122', NULL),
(39, 'GBB MEGER', 'Subdivre Surakarta', '-7.673291049446612,110.65422329236753', NULL),
(40, 'GBB KETANDAN', 'Subdivre Surakarta', '-7.702545342668322,110.61488257313613', NULL),
(41, 'GBB TELUKAN', 'Subdivre Surakarta', '-7.632742974981442,110.82670198411506', NULL),
(42, 'GBB GEDONG', 'Subdivre Surakarta', '-7.855416829880657,110.98571138114494', NULL),
(43, 'GBB TRIYAGAN', 'Subdivre Surakarta', '-7.579643334353483,110.899999469475', NULL),
(44, 'GBB KRIKILAN', 'Subdivre Surakarta', '-7.4613770,110.9490350', NULL),
(45, 'GBB DUYUNGAN', 'Subdivre Surakarta', '-7.445130, 110.976362', NULL),
(46, 'Subdivre Pekalongan', 'Subdivre Pekalongan', '-6.8691135990918335,109.12054078246001', NULL),
(47, 'GBB PROCOT', 'Subdivre Pekalongan', '-6.968947942211382,109.13908021149837', NULL),
(48, 'GBB CIMOHONG', 'Subdivre Pekalongan', '-6.8719583817598275,108.90406581689604', NULL),
(49, 'GBB LARANGAN', 'Subdivre Pekalongan', '-6.865912715197781,109.19058935309295', NULL),
(50, 'GBB KEDUNGKELOR', 'Subdivre Pekalongan', '-6.8704564811827735,109.33146509589278', NULL),
(51, 'GBB WIRADESA', 'Subdivre Pekalongan', '-6.893415868174125,109.60313531752035', NULL),
(52, 'GBB KANDEMAN', 'Subdivre Pekalongan', '-6.932845258924699,109.76854714755063', NULL),
(53, 'Perum Bulog Kantor Pusat', 'Jakarta', NULL, NULL),
(54, 'Yogyakarta', 'Kota Yogyakarta', NULL, NULL),
(55, 'Jakarta', 'Kota Jakarta', NULL, NULL),
(56, 'Bandung', 'Kota Bandung', NULL, NULL),
(57, 'Semarang', 'Kota Semarang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_unitkerja`
--

CREATE TABLE `tb_unitkerja` (
  `id_unitkerja` int(10) NOT NULL,
  `unitkerja` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `sts` int(10) DEFAULT NULL COMMENT '1=bulog, 2=instansi lain'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unitkerja`
--

INSERT INTO `tb_unitkerja` (`id_unitkerja`, `unitkerja`, `alamat`, `sts`) VALUES
(1, 'Divre Jateng', 'Jl. Menteri Supeno I/1 A, Semarang', 1),
(2, 'Subdivre Semarang', 'Semarang', 1),
(3, 'Subdivre Pati', 'Pati', 1),
(4, 'Subdivre Surakarta', 'Surakarta', 1),
(5, 'Subdivre Banyumas', 'Banyumas', 1),
(6, 'Subdivre Kedu', 'Kedu', 1),
(7, 'Subdivre Pekalongan', 'Pekalongan', 1),
(8, 'Prov. Jateng', 'Semarang', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(10) NOT NULL COMMENT '1=admin ,2=users',
  `keterangan` varchar(5) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `nama`, `password`, `level`, `keterangan`, `last_login`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '2015-12-09 21:31:53'),
(14, 'keuangan', '', 'a4151d4b2856ec63368a7c784b1f0a6e', 2, '', '2015-12-07 19:08:27'),
(15, 'akuntansi', '', '1139f90d50ba3bb7ff4b2602ad03aa26', 2, '', '0000-00-00 00:00:00'),
(16, 'sdm', '', '6d662f965d1e85bb367efaa03594c5a1', 2, '', '0000-00-00 00:00:00'),
(17, 'humas', '', '94da7343e47802652a24444298012b8c', 2, '', '0000-00-00 00:00:00'),
(18, 'pengadaan', '', '847f55e913a1327b5519168555e22595', 2, '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`id_mainmenu`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `tb_bahanbakar`
--
ALTER TABLE `tb_bahanbakar`
  ADD PRIMARY KEY (`id_bbm`);

--
-- Indexes for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pejabat_ttd`
--
ALTER TABLE `tb_pejabat_ttd`
  ADD PRIMARY KEY (`id_pejabat_ttd`);

--
-- Indexes for table `tb_pelaksana`
--
ALTER TABLE `tb_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana`);

--
-- Indexes for table `tb_pengemudi`
--
ALTER TABLE `tb_pengemudi`
  ADD PRIMARY KEY (`id_pengemudi`);

--
-- Indexes for table `tb_pengikut`
--
ALTER TABLE `tb_pengikut`
  ADD PRIMARY KEY (`id_pengikut`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tb_skpd`
--
ALTER TABLE `tb_skpd`
  ADD PRIMARY KEY (`id_skpd`);

--
-- Indexes for table `tb_sppd`
--
ALTER TABLE `tb_sppd`
  ADD PRIMARY KEY (`id_sppd`);

--
-- Indexes for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `tb_unitkerja`
--
ALTER TABLE `tb_unitkerja`
  ADD PRIMARY KEY (`id_unitkerja`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `id_mainmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_gol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `tb_pejabat_ttd`
--
ALTER TABLE `tb_pejabat_ttd`
  MODIFY `id_pejabat_ttd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pelaksana`
--
ALTER TABLE `tb_pelaksana`
  MODIFY `id_pelaksana` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;
--
-- AUTO_INCREMENT for table `tb_pengemudi`
--
ALTER TABLE `tb_pengemudi`
  MODIFY `id_pengemudi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_pengikut`
--
ALTER TABLE `tb_pengikut`
  MODIFY `id_pengikut` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_skpd`
--
ALTER TABLE `tb_skpd`
  MODIFY `id_skpd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tb_sppd`
--
ALTER TABLE `tb_sppd`
  MODIFY `id_sppd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id_tempat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tb_unitkerja`
--
ALTER TABLE `tb_unitkerja`
  MODIFY `id_unitkerja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
