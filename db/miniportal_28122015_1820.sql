-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2015 at 12:19 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akomodasi_tamu`
--

CREATE TABLE `tb_akomodasi_tamu` (
  `id_akomodasi` int(10) NOT NULL,
  `no_skpd` varchar(255) DEFAULT NULL,
  `tgl_skpd` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `gol` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `durasi` varchar(10) DEFAULT NULL,
  `hotel` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akomodasi_tamu`
--

INSERT INTO `tb_akomodasi_tamu` (`id_akomodasi`, `no_skpd`, `tgl_skpd`, `nama`, `gol`, `tujuan`, `durasi`, `hotel`) VALUES
(3, '0001/12/2015', '1-12-2015', 'Giri NS', 'VI', 'Semarang', '2', '840000.00'),
(5, '698/08/2015', '7-12-2015', 'Muji', 'XI', 'Semarang', '3', '560000.00'),
(6, '0004/12/2015', '22-12-2015', 'Nano', 'XIV', 'Semarang', '4', '900000.00');

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
(2, 'pertamax', '8750'),
(3, 'pertalite', '8400'),
(4, 'pertadex', '9950');

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
  `dalam_kota` int(12) DEFAULT NULL,
  `management_reg` int(12) DEFAULT NULL,
  `management_diklat` int(12) DEFAULT NULL,
  `spi` int(12) DEFAULT NULL,
  `u_hotel` int(12) DEFAULT NULL,
  `u_taxi` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_gol`, `gol`, `nama_gol`, `klasifikasi`, `raskin`, `dalam_kota`, `management_reg`, `management_diklat`, `spi`, `u_hotel`, `u_taxi`) VALUES
(1, '0', 'Pengemudi', '0', 225000, 60000, 225000, 225000, 225000, 250000, 200000),
(2, '1', 'Penata', 'I', 0, NULL, 0, 0, NULL, NULL, NULL),
(3, '2', 'Penata ', 'I', 0, NULL, 0, 0, NULL, NULL, NULL),
(4, '3', 'Penata', 'I', 0, NULL, 0, 0, NULL, NULL, NULL),
(5, '4', 'Penata', 'I', 0, NULL, 0, 0, NULL, NULL, NULL),
(6, '5', 'Penata', 'II', 350000, 100000, 315000, 350000, 315000, 350000, 200000),
(7, '6', 'Penata', 'II', 350000, 100000, 315000, 350000, 315000, 350000, 200000),
(8, '7', 'Penata', 'II', 350000, 100000, 315000, 350000, 315000, 350000, 200000),
(9, '8', 'Penata', 'II', 350000, 100000, 315000, 350000, 315000, 350000, 200000),
(10, '9', 'Penata', 'III', 400000, 125000, 360000, 400000, 360000, 450000, 200000),
(11, '10', 'Penata', 'III', 400000, 125000, 360000, 400000, 360000, 450000, 200000),
(12, '11', 'Penata', 'III', 400000, 125000, 360000, 400000, 360000, 450000, 200000),
(13, '12', 'Penata', 'III', 400000, 125000, 360000, 400000, 360000, 450000, 200000),
(14, '13', 'Penata', 'IV', 450000, 150000, 405000, 450000, 405000, 550000, 200000),
(15, '14', 'Penata', 'IV', 450000, 150000, 405000, 450000, 405000, 550000, 200000),
(16, '15', 'Penata', 'IV', 450000, 150000, 405000, 450000, 405000, 550000, 200000),
(17, '16', 'Penata', 'IV', 450000, 150000, 405000, 450000, 405000, 550000, 200000);

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(70) DEFAULT NULL,
  `noreg` varchar(20) DEFAULT NULL,
  `nama_asli` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(22) DEFAULT NULL,
  `golongan` varchar(20) DEFAULT NULL,
  `jabatan_asli` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `unitkerja` varchar(255) DEFAULT NULL,
  `tmt_pensiun` varchar(25) DEFAULT NULL,
  `tmt_jenjang` varchar(25) DEFAULT NULL,
  `tmt_jabatan` varchar(25) DEFAULT NULL,
  `pendidikan_formal` varchar(255) DEFAULT NULL,
  `sts` int(1) DEFAULT NULL COMMENT '1=pegawai, 2=pengemudi, 3=pengikut',
  `sts_pejabat` int(1) DEFAULT NULL,
  `pajak` int(10) DEFAULT NULL,
  `tgl_lahir` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `noreg`, `nama_asli`, `nama_pegawai`, `golongan`, `jabatan_asli`, `jabatan`, `unitkerja`, `tmt_pensiun`, `tmt_jenjang`, `tmt_jabatan`, `pendidikan_formal`, `sts`, `sts_pejabat`, `pajak`, `tgl_lahir`) VALUES
(1, '780000984', '6183595', 'USEP KARYANA DRS.', 'Usep Karyana', '16', 'KEPALA DIVISI REGIONAL JATENG PERUM BULOG', 'Kadivre Jateng', 'Divre Jateng', '5/1/2017', '1/2/2013', '7/8/2015', 'S1 - EKONOMI AKUNTANSI', 1, 1, 30, '5/14/1961'),
(2, '780007119', '7297194', 'SOPRAN KENEDI , SP , M.Sc', 'Sopran Kenedi', '13', 'WAKIL KEPALA DIVISI REGIONAL JATENG PERUM BULOG', 'Wakadivre Jateng', 'Divre Jateng', '6/30/2028', '12/1/2015', '12/1/2015', 'S2 - MANAJEMEN AGRIBISNIS', 1, 1, 25, '6/21/1972'),
(3, '780007094', '6797095', 'RUDI AMRAN , ST, MM', 'Rudi Amran', '14', 'KEPALA BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Kabid Minku', 'Divre Jateng', '9/7/2023', '10/1/2009', '5/6/2015', 'S2 - MANAJEMEN DAN BISNIS', 1, 1, 15, '9/7/1967'),
(4, '068106071', '8106071', 'JOKO PAMUNGKAS , S.Kom', 'Joko Pamungkas', '11', 'KEPALA SEKSI SDM DAN HUKUM DIVRE JATENG', 'Kasi SDM & Hukum', 'Divre Jateng', '6/16/2037', '4/1/2013', '5/4/2015', 'S1 - SISTEM INFORMASI', 1, 0, 15, '6/16/1981'),
(5, '780006617', '6195726', 'RUSMADI', 'Rusmadi', '10', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf  SDM & Hukum', 'Divre Jateng', '3/8/2017', '5/1/1998', '9/1/2003', 'STM -  MESIN', 1, 0, 15, '3/8/1961'),
(6, '118811082', '8811082', 'ANDHIKA SAPUTRA , SH', 'Andhika Saputra', '10', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf  SDM & Hukum', 'Divre Jateng', '9/9/2044', '10/1/2011', '3/18/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '9/9/1988'),
(7, '088108048', '8108048', 'RULLY RAHMINI DEWI , S.P', 'Rully Rahmini Dewi', '10', 'KEPALA SEKSI KEUANGAN DIVRE JATENG', 'Kasi Keuangan', 'Divre Jateng', '11/6/2037', '2/3/2014', '2/3/2014', 'S1 - SOSIAL EKONOMI PERTANIAN', 1, 0, 15, '11/6/1981'),
(8, '068206089', '8206089', 'ANASTASIA RATNA KHRISMASA , S.E', 'Anastasia Ratna K.', '11', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf Keuangan', 'Divre Jateng', '12/24/2038', '6/1/2006', '10/1/2015', 'S1 - MANAJEMEN PERUSAHAAN', 1, 0, 15, '12/24/1982'),
(9, '780002769', '6284187', 'ENDANG KUSRIYANTI', 'Endang Kusriyanti', '10', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf Keuangan', 'Divre Jateng', '5/8/2018', '9/1/1984', '9/1/2003', 'SMA - BAHASA', 1, 0, 15, '5/8/1962'),
(10, '068306115', '8306115', 'DIAN AGUS ISTIANI', 'Dian Agus Istiani', '8', 'KASIR DIVISI REGIONAL JATENG PERUM BULOG', 'Kasir Divre', 'Divre Jateng', '8/11/2039', '6/1/2006', '3/2/2009', 'D3 - INFORMATIKA', 1, 0, 15, '8/11/1983'),
(11, '067906033', '7906033', 'ANGGA CHANDRARESMI , S.E', 'Angga Chandraresmi', '11', 'KEPALA SEKSI AKUNTANSI DIVRE JATENG', 'Kasi Akuntansi', 'Divre Jateng', '9/28/2035', '5/12/2014', '5/12/2014', 'S1 - EKONOMI AKUNTANSI', 1, 0, 15, '9/28/1979'),
(12, '128912232', '8912232', 'WIDI RASPATI APRINIADI', 'Widi Raspati Apriniadi', '7', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf Akuntansi', 'Divre Jateng', '4/5/2045', '11/27/2012', '10/1/2015', 'D3 - PERPAJAKAN', 1, 0, 15, '4/5/1989'),
(13, '087408484', '7408484', 'KARTINI', 'Kartini', '6', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf Akuntansi', 'Divre Jateng', '9/3/2030', '11/1/2008', '3/18/2015', 'SMK - KEUANGAN', 1, 0, 15, '9/3/1974'),
(14, '780003266', '6383734', 'SITI RETNO FARIDA , SE, MM', 'Siti Retno Farida', '13', 'KEPALA SEKSI HUBUNGAN MASYARAKAT DIVRE JATENG', 'Kasi Humas', 'Divre Jateng', '7/27/2019', '1/2/2008', '1/2/2008', 'S2 - MAGISTER MANAJEMEN', 1, 0, 15, '7/27/1963'),
(15, '118611084', '8611084', 'KUKUH BUDI SATRIO , S.I.Kom', 'Kukuh Budi Satrio', '10', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf Humas', 'Divre Jateng', '10/12/2042', '10/1/2011', '10/1/2015', 'S1 - ILMU KOMUNIKASI', 1, 0, 15, '10/12/1986'),
(16, '780002794', '6284188', 'NURUDIN , SH', 'Nurudin', '12', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf Humas', 'Divre Jateng', '5/6/2018', '4/15/2009', '4/15/2009', 'S1 - HUKUM', 1, 0, 15, '5/6/1962'),
(17, '780003219', '6181165', 'I.M. HASTA ADJI BASUKI', 'I.M. Hasta Adji Basuki', '10', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf Humas', 'Divre Jateng', '4/13/2017', '7/1/2001', '9/3/2007', 'SMK - TATA BUKU', 1, 0, 15, '4/13/1961'),
(18, '780007030', '7397305', 'WIDOYO SENO', 'Widoyo Seno', '10', 'KEPALA SEKSI TATA USAHA DAN UMUM DIVRE JATENG', 'Kasi TU & Umum', 'Divre Jateng', '3/19/2029', '10/1/2011', '5/12/2014', 'D3 - AKUNTANSI', 1, 1, 15, '3/19/1973'),
(19, '780002777', '6184178', 'AYU RATNAWATI , BA', 'Ayu Ratnawati', '11', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf TU & Umum', 'Divre Jateng', '1/18/2017', '8/1/1995', '9/1/2003', 'D3 - ADMINISTRASI NEGARA', 1, 0, 15, '1/18/1961'),
(20, '780002788', '6384206', 'RAHAYU PANGESTUTI', 'Rahayu Pangestuti', '10', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf TU & Umum', 'Divre Jateng', '4/24/2019', '8/1/1997', '9/1/2003', 'SMK - TATA NIAGA', 1, 0, 15, '4/24/1963'),
(21, '780006396', '6095242', 'S U Y A N T O', 'S U Y A N T O', '10', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf TU & Umum', 'Divre Jateng', '3/1/2016', '8/1/1997', '1/15/2007', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '3/1/1960'),
(22, '780002900', '6085333', 'PRIYO SUGIARTO', 'Priyo Sugiarto', '8', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf TU & Umum', 'Divre Jateng', '1/16/2016', '7/1/1985', '9/1/2003', 'SMP - LISTRIK', 1, 0, 15, '1/16/1960'),
(23, '129112356', '9112356', 'MUHAMMAD MAULANA R', 'M. Maulana R', '7', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf TU & Umum', 'Divre Jateng', '5/17/2047', '12/7/2012', '10/1/2015', 'D3 - MANAJEMEN INFORMATIKA', 1, 0, 15, '5/17/1991'),
(24, '088108629', '8108629', 'INDARTO MUJI H', 'Indarto Muji H', '6', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf TU & Umum', 'Divre Jateng', '7/6/2037', '11/1/2008', '11/1/2008', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '7/6/1981'),
(25, '086908761', '6908761', 'GIRI NUGROHO SETIAWAN', 'Giri Nugroho S.', '6', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf TU & Umum', 'Divre Jateng', '3/7/2025', '11/1/2008', '7/1/2015', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '3/7/1969'),
(26, '780002688', '6485483', 'IWAN NURWANSYAH DRS.', 'Iwan Nurwansyah', '14', 'KEPALA BIDANG PELAYANAN PUBLIK DIVRE JATENG', 'Kabid PP', 'Divre Jateng', '2/27/2020', '2/1/2008', '5/6/2015', 'S1 - ADMINISTRASI NEGARA', 1, 1, 25, '2/27/1964'),
(27, '780002813', '6184176', 'SUMIYATUN DRA.', 'Sumiyatun', '12', 'KEPALA SEKSI PENGADAAN DIVRE JATENG', 'Kasi Pengadaan', 'Divre Jateng', '2/23/2017', '5/1/2009', '11/7/2011', 'S1 - PENDIDIKAN', 1, 0, 15, '2/23/1961'),
(28, '118711013', '8711013', 'RINA YOANITA RAHARTANTI , S.E', 'Rina Yoanita R.', '10', 'STAF BIDANG PELAYANAN PUBLIK DIVRE JATENG', 'Staf PP', 'Divre Jateng', '1/4/2043', '10/1/2011', '10/1/2015', 'S1 - AGRIBISNIS', 1, 0, 15, '1/4/1987'),
(29, '780003242', '6485336', 'SUTARNO , S.Kom', 'Sutarno', '11', 'STAF BIDANG PELAYANAN PUBLIK DIVRE JATENG', 'Staf PP', 'Divre Jateng', '8/17/2020', '7/1/2015', '7/1/2015', 'S1 - SISTEM INFORMASI', 1, 0, 15, '8/17/1964'),
(30, '088008582', '8008582', 'WAHYU HANDORO DASIH', 'Wahyu Handoro D.', '6', 'STAF BIDANG PELAYANAN PUBLIK DIVRE JATENG', 'Staf PP', 'Divre Jateng', '10/25/2036', '11/1/2008', '5/3/2010', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '10/25/1980'),
(31, '067806009', '7806009', 'ALIA BESTARI GIYANARIDA , S.E', 'Alia Bestari G.', '11', 'KEPALA SEKSI ANALISA HARGA DAN PASAR DIVRE JATENG', 'Kasi Analisa Gasar', 'Divre Jateng', '6/24/2034', '1/2/2015', '1/2/2015', 'S1 - EKONOMI MANAJEMEN', 1, 0, 15, '6/24/1978'),
(32, '128912207', '8912207', 'RANDY YUNIARDI  , S.Si', 'Randy Yuniardi', '9', 'STAF BIDANG PELAYANAN PUBLIK DIVRE JATENG', 'Staf PP', 'Divre Jateng', '6/5/2045', '11/27/2012', '9/1/2014', 'S1 - STATISTIK / STATISTIKA', 1, 0, 15, '6/5/1989'),
(33, '067906034', '7906034', 'ANNA MARIANOFA , S.E', 'Anna Marianofa', '11', 'KEPALA SEKSI PERSEDIAAN DAN ANGKUTAN DIVRE JATENG', 'Kasi Angdia', 'Divre Jateng', '11/12/2035', '4/18/2013', '4/20/2015', 'S1 - EKONOMI MANAJEMEN', 1, 0, 15, '11/12/1979'),
(34, '088208650', '8208650', 'DODIE NOVIANTO', 'Dodie Novianto', '6', 'STAF BIDANG ADMINISTRASI DAN KEUANGAN DIVRE JATENG', 'Staf Minku', 'Divre Jateng', '11/24/2038', '11/1/2008', '11/1/2008', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '11/24/1982'),
(35, 'NR7705005', '7705005', 'RINA EDIATI , S.P', 'Rina Ediati', '11', 'KEPALA SEKSI PERAWATAN KUALITAS DIVRE JATENG', 'Kasi Perawatan', 'Divre Jateng', '6/16/2033', '9/1/2014', '9/1/2014', 'S1 - HAMA DAN PENYAKIT TUMBUHAN', 1, 0, 15, '6/16/1977'),
(36, '128612142', '8612142', 'FEDRIAL FARHAN  , S.Si', 'Fedrial Farhan', '9', 'STAF BIDANG PELAYANAN PUBLIK DIVRE JATENG', 'Staf PP', 'Divre Jateng', '2/21/2042', '11/27/2012', '3/18/2015', 'S1 - BIOLOGI', 1, 0, 15, '2/21/1986'),
(37, '780002892', '6083717', 'VT. RAPI INDRIASTUTI , SH, M.HUM', 'Vt. Rapi Indriastuti', '13', 'KEPALA SEKSI PENYALURAN DIVRE JATENG', 'Kasi Penyaluran', 'Divre Jateng', '11/2/2016', '4/11/2011', '4/20/2015', 'S2 - BIDANG HUKUM', 1, 1, 15, '11/2/1960'),
(38, '780003135', '6383732', 'TIWIEK MULYANI DWI  W.', 'Tiwiek Mulyani D.W.', '10', 'STAF BIDANG PELAYANAN PUBLIK DIVRE JATENG', 'Staf PP', 'Divre Jateng', '2/7/2019', '11/1/1997', '9/1/2003', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '2/7/1963'),
(39, '087108114', '7108114', 'WIWIT PUJI SANTOSO', 'Wiwit Puji Santoso', '6', 'STAF BIDANG PELAYANAN PUBLIK DIVRE JATENG', 'Staf PP', 'Divre Jateng', '1/10/2027', '1/1/2008', '7/1/2015', 'SMA - BUDAYA', 1, 0, 15, '1/10/1971'),
(40, '780007167', '6997262', 'GUNAWAN WIBISONO , SE', 'Gunawan Wibisono', '13', 'KEPALA BIDANG PERENCANAAN DAN PENGEMBANGAN USAHA DIVRE JATENG', 'Kabid PPU', 'Divre Jateng', '4/7/2025', '9/12/2011', '5/20/2013', 'S1 - EKONOMI MANAJEMEN', 1, 1, 25, '4/7/1969'),
(41, '780003241', '6283108', 'ACHMAD SAMSUL BACHTIAR , S.IP', 'Achmad Samsul B.', '12', 'KEPALA SEKSI INDUSTRI DAN PERDAGANGAN DIVRE JATENG', 'Kasi Indag', 'Divre Jateng', '11/16/2018', '4/20/2015', '4/20/2015', 'S1 - ADMINISTRASI NEGARA', 1, 0, 15, '11/16/1962'),
(42, '128212307', '8212307', 'DONI KOES WARDONO  , S.E', 'Doni Koes Wardono', '9', 'STAF BIDANG PERENCANAAN DAN PENGEMBANGAN USAHA DIVRE JATENG', 'Staf PPU', 'Divre Jateng', '11/6/2038', '12/7/2012', '10/1/2015', 'S1 - ILMU EKONOMI DAN STUDI PEMBANGUNAN', 1, 0, 15, '11/6/1982'),
(43, '780003256', '6283731', 'SUHARWINDOYO , SH', 'Suharwindoyo', '12', 'KEPALA SEKSI JASA DIVRE JATENG', 'Kasi Jasa', 'Divre Jateng', '7/19/2018', '6/17/2013', '2/3/2014', 'S1 - ILMU HUKUM', 1, 0, 15, '7/19/1962'),
(44, '780002796', '6484213', 'JAROT MARDI SANTOSO , SH', 'Jarot Mardi S.', '12', 'KEPALA SEKSI TEKNOLOGI INFORMASI DIVRE JATENG', 'Kasi TI', 'Divre Jateng', '3/7/2020', '5/1/2009', '8/1/2011', 'S1 - HUKUM', 1, 0, 15, '3/7/1964'),
(45, '088408157', '8408157', 'ANDINI KUMALASARI , SE', 'Andini Kumalasari', '9', 'STAF BIDANG PERENCANAAN DAN PENGEMBANGAN USAHA DIVRE JATENG', 'Staf PPU', 'Divre Jateng', '4/16/2040', '2/1/2009', '10/1/2015', 'S1 - AKUNTANSI', 1, 0, 15, '4/16/1984'),
(46, '780003125', '6283274', 'TEGUH SUPRIYANTO , SH', 'Teguh Supriyanto', '13', 'REGIONAL MANAGER UB-PGB REGIONAL IV SEMARANG DIREKTORAT PPU', 'RM UB PGB', 'Divre Jateng', '9/27/2018', '4/1/2013', '4/1/2013', 'S1 - ILMU HUKUM', 1, 1, 15, '9/27/1962'),
(47, '128712198', '8712198', 'NOVIA PANGASTUTI', 'Novia Pangastuti', '7', 'STAF UB-PGB REGIONAL IV SEMARANG DIREKTORAT PPU', 'Staf UB PGB', 'Divre Jateng', '11/8/2043', '11/27/2012', '7/1/2015', 'D3 - AKUNTANSI', 1, 0, 15, '11/8/1987'),
(48, '780007261', '7197238', 'SRI MUNIATI , SE, MM', 'Sri Muniati', '13', 'REGIONAL MANAGER UB-BULOGMART REGIONAL IV SEMARANG DIREKTORAT PPU', 'RM UB Bulogmart', 'Divre Jateng', '2/28/2027', '9/9/2015', '9/9/2015', 'S2 - MAGISTER MANAJEMEN', 1, 1, 15, '2/28/1971'),
(49, '129012103', '9012103', 'ANUGRAH BINTAR  , S.ST', 'Anugrah Bintar', '9', 'STAF UB-BULOGMART REGIONAL IV SEMARANG DIREKTORAT PPU', 'Staf UB Bulogmart', 'Divre Jateng', '6/1/2046', '11/27/2012', '10/1/2015', 'D4 - AKUNTANSI MANAJEMEN PEMERINTAHAN', 1, 0, 15, '6/1/1990'),
(50, '780006894', '6797047', 'AGUS SUPRIYANTO , SE', 'Agus Supriyanto', '13', 'REGIONAL MANAGER UB-JASTASMA REGIONAL IV SEMARANG PERUM BULOG', 'RB UB Ujastasma', 'Divre Jateng', '8/17/2023', '2/3/2014', '2/3/2014', 'S1 - MANAJEMEN', 1, 0, 15, '8/17/1967'),
(51, '780005057', '6385361', 'NGATMAN , SE', 'Ngatman', '12', 'REGIONAL MANAGER UB-OPASET REGIONAL IV SEMARANG PERUM BULOG', 'RM UB Opaset', 'Divre Jateng', '1/10/2019', '3/21/2014', '4/1/2015', 'S1 - MANAJEMEN', 1, 1, 15, '1/10/1963'),
(52, '068106072', '8106072', 'ERNITA PERMATASARI , S.E', 'Ernita Permatasari', '11', 'KOORDINATOR LAPANGAN UB-OPASET REGIONAL IV SEMARANG PERUM BULOG', 'Korlap UB Opaset', 'Divre Jateng', '5/16/2037', '6/1/2006', '10/1/2015', 'S1 - EKONOMI MANAJEMEN', 1, 1, 15, '5/16/1981'),
(53, '780001884', '6083573', 'NUR BADIAH R , BC.HK', 'Nur Badiah R', '12', 'ASDIV PRATAMA I BID PERENC. DIVISI REGIONAL JATENG PERUM BULOG', 'Asdiv Perencanaan', 'Divre Jateng', '1/4/2016', '1/2/2015', '7/1/2015', 'D3 - SARJANA MUDA HUKUM', 1, 0, 15, '1/4/1960'),
(54, '780003179', '6086019', 'HADI SLAMETO', 'Hadi Slameto', '12', 'SETARA JENJANG III PT. JPLB JATENG', 'SJ. III PT. JPLB Jateng', 'Divre Jateng', '1/13/2016', '3/21/2014', '3/21/2014', 'S1 - ADMINISTRASI KEUANGAN', 1, 0, 15, '1/13/1960'),
(55, '780003124', '6083099', 'EUSTHACIUS R. BIROWO , SH', 'Eusthacius R. Birowo', '11', 'ASDIV PRATAMA I BID PEMASARAN DIVISI REGIONAL JATENG PERUM BULOG', 'Asdiv Pemasaran', 'Divre Jateng', '9/18/2016', '2/18/2013', '7/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '9/18/1960'),
(56, '780002909', '6084170', 'WIHARTONO , SH, MKn', 'Wihartono', '13', 'STAF DIVISI REGIONAL JATENG PERUM BULOG', 'Staf', 'Divre Jateng', '5/8/2016', '6/13/2011', '6/13/2011', 'S2 - BIDANG HUKUM', 1, 0, 15, '5/8/1960'),
(57, '780003030', '6285573', 'RAMELAN', 'Ramelan', '12', 'ASISTEN PENGAWAS DIVISI REGIONAL JATENG PERUM BULOG', 'Asswas', 'Divre Jateng', '9/5/2018', '1/20/2011', '1/20/2011', 'SMK - SIPIL', 1, 1, 15, '9/5/1962'),
(58, '780003385', '6484211', 'SRI ASIATI', 'Sri Asiati', '12', 'ASISTEN PENGAWAS DIVISI REGIONAL JATENG PERUM BULOG', 'Asswas', 'Divre Jateng', '6/19/2020', '3/7/2011', '3/7/2011', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '6/19/1964'),
(59, '780003264', '6084173', 'SUROSO', 'Suroso', '12', 'ASISTEN PENGAWAS DIVISI REGIONAL JATENG PERUM BULOG', 'Asswas', 'Divre Jateng', '5/8/2016', '4/1/2008', '3/7/2011', 'D3 - ADMINISTRASI KEUANGAN', 1, 0, 15, '5/8/1960'),
(60, '088508101', '8508101', 'M NURJULIANSYAH RACHMAN , S.E', 'M Nurjuliansyah R.', '10', 'ASISTEN PENGAWAS DIVISI REGIONAL JATENG PERUM BULOG', 'Asswas', 'Divre Jateng', '7/25/2041', '7/18/2014', '12/1/2014', 'S1 - EKONOMI AKUNTANSI', 1, 0, 15, '7/25/1985'),
(61, '780006405', '6295279', 'GAMPIL SRI REJEKI', 'Gampil Sri Rejeki', '10', 'ASISTEN PENGAWAS DIVISI REGIONAL JATENG PERUM BULOG', 'Asswas', 'Divre Jateng', '1/7/2018', '7/1/2001', '10/1/2015', 'SMK - TATA BUKU', 1, 0, 15, '1/7/1962'),
(62, '780003112', '6283728', 'SUGIARNI , SH', 'Sugiarni', '13', 'KEPALA SUB DIVRE SEMARANG DIVRE JATENG', 'Kasub Semarang', 'Subdivre Semarang', '5/5/2018', '4/1/2015', '4/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '5/5/1962'),
(63, '780007322', '7298013', 'MUSAZDIN SAID , S.KOMP, MM', 'Musazdin Said', '13', '  WAKA SUBDIVRE SEMARANG DIVRE JATENG', 'Wakasub Semarang', 'Subdivre Semarang', '4/10/2028', '4/1/2015', '4/1/2015', 'S2 - MANAJEMEN DAN BISNIS', 1, 0, 15, '4/10/1972'),
(64, '780003021', '5283106', 'SRI IRIANTINI', 'Sri Iriantini', '11', 'KEPALA SEKSI ADMINISTRASI DAN KEUANGAN SUBDIVRE SEMARANG DIVRE JATENG', 'Kasi Minku Semarang', 'Subdivre Semarang', '7/19/2018', '11/7/2011', '11/7/2011', 'SMK - TATA BUKU', 1, 0, 15, '7/19/1962'),
(65, '128912303', '8912303', 'YENI SULISTIOWATI  , S.Si', 'Yeni Sulistiowati', '9', 'STAF SUB DIVRE SEMARANG DIVRE JATENG', 'Staf Minku', 'Subdivre Semarang', '1/14/2045', '12/7/2012', '3/18/2015', 'S1 - STATISTIK / STATISTIKA', 1, 0, 15, '1/14/1989'),
(66, '128812369', '8812369', 'GILANG WIRYANU MURTI  , S.H', 'Gilang Wiryanu Murti', '9', 'STAF SUB DIVRE SEMARANG DIVRE JATENG', 'Staf Minku', 'Subdivre Semarang', '3/12/2044', '12/7/2012', '10/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '3/12/1988'),
(67, '087808763', '7808763', 'APRIANI PERWITA SARI', 'Apriani Perwita Sari', '6', 'KASIR SUB DIVRE SEMARANG DIVRE JATENG', 'Kasir Sub Semarang', 'Subdivre Semarang', '4/6/2034', '11/1/2008', '6/17/2013', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '4/6/1978'),
(68, '780002816', '6485580', 'NUR FUAD', 'Nur Fuad', '10', 'STAF SUB DIVRE SEMARANG DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Semarang', '12/18/2020', '12/1/1985', '3/18/2015', 'SMK - TATA BUKU', 1, 0, 15, '12/18/1964'),
(69, '067906099', '7906099', 'LILIS PURWANTI', 'Lilis Purwanti', '8', 'PJS TK I KEPALA SEKSI AKUNTANSI SUBDIVRE SEMARANG DIVRE JATENG', 'PJS Kasi Akuntansi Semarang', 'Subdivre Semarang', '3/21/2035', '1/2/2015', '1/2/2015', 'D3 - PERBANKAN', 1, 0, 15, '3/21/1979'),
(70, '780002819', '6586017', 'SUTINI', 'Sutini', '10', 'STAF SUB DIVRE SEMARANG DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Semarang', '9/13/2021', '12/1/1985', '10/1/2015', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '9/13/1965'),
(71, '067606156', '7606156', 'SUUDI MUT''IM , S.T', 'Suudi Mut''Im', '11', 'KEPALA SEKSI PELAYANAN PUBLIK SUBDIVRE SEMARANG DIVRE JATENG', 'Kasi PP Semarang', 'Subdivre Semarang', '4/27/2032', '8/1/2012', '4/20/2015', 'S1 - TEKNIK MESIN', 1, 0, 15, '4/27/1976'),
(72, '088408562', '8408562', 'DWI YULIANTO', 'Dwi Yulianto', '6', 'PETUGAS PERAWATAN KUALITAS SUB DIVRE SEMARANG DIVRE JATENG', 'Petugas Perawatan', 'Subdivre Semarang', '7/30/2040', '11/1/2008', '9/1/2014', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '7/30/1984'),
(73, '118811064', '8811064', 'NILA RULLY PRAVITASARI , S.P', 'Nila Rully Pravitasari', '10', 'STAF SUB DIVRE SEMARANG DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Semarang', '5/20/2044', '10/1/2011', '3/18/2015', 'S1 - HAMA DAN PENYAKIT TUMBUHAN', 1, 0, 15, '5/20/1988'),
(74, '780002805', '6085332', 'DJOKO DWI PRABOWO', 'Djoko Dwi Prabowo', '10', 'STAF SUB DIVRE SEMARANG DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Semarang', '6/21/2016', '2/1/1997', '11/1/2005', 'SMK - MESIN LISTRIK', 1, 0, 15, '6/21/1960'),
(75, 'NR7805016', '7805016', 'DYAH KUSUMANINGTYAS P. , S.Si', 'Dyah Kusumaningtyas P.', '11', 'KEPALA SEKSI ANALISA HARGA DAN PASAR SUBDIVRE SEMARANG DIVRE JATENG', 'Kasi Gasar Semarang', 'Subdivre Semarang', '9/8/2034', '4/18/2013', '4/20/2015', 'S1 - BIOLOGI', 1, 0, 15, '9/8/1978'),
(76, '088508049', '8508049', 'DELIMA FRISKA SITUMORANG , S.P', 'Delima Friska S.', '10', 'KEPALA SEKSI PERENCANAAN DAN PENGEMBANGAN USAHA SUBDIVRE SEMARANG DIVRE JATENG', 'Kasi PPU Semarang', 'Subdivre Semarang', '10/20/2041', '1/2/2015', '1/2/2015', 'S1 - SOSIAL EKONOMI PERTANIAN', 1, 0, 15, '10/20/1985'),
(77, '780003255', '6183757', 'HARSONO ADHI WIBOWO', 'Harsono Adhi W.', '10', 'KEPALA GBB PEDURUNGAN (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Kagud Palebon', 'Subdivre Semarang', '5/24/2017', '1/20/2011', '1/20/2011', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '5/24/1961'),
(78, '780002936', '6183268', 'AGUS SURATNO', 'Agus Suratno', '10', 'JURTIM GBB PALEBON (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Jurtim Palebon', 'Subdivre Semarang', '8/7/2017', '7/1/2001', '7/1/2015', 'SMK - TATA NIAGA', 1, 0, 15, '8/7/1961'),
(79, '128712028', '8712028', 'EKO WAHYUDIANTO  , S.TP', 'Eko Wahyudianto', '9', 'KERANI GBB PALEBON (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Kerani Palebon', 'Subdivre Semarang', '7/21/2043', '10/10/2012', '7/1/2015', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '7/21/1987'),
(80, '780006569', '6395730', 'AGUS PRIYANTO', 'Agus Priyanto', '10', 'STAF GBB PALEBON (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Semarang', '9/21/2019', '3/1/1995', '9/1/2015', 'STM -  MESIN', 1, 0, 15, '9/21/1963'),
(81, '780002823', '6284196', 'AGUS SUDARNO', 'Agus Sudarno', '12', 'KEPALA GBB MANGKANG KULON (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Kagud Mangkang Kulon', 'Subdivre Semarang', '10/25/2018', '4/20/2015', '4/20/2015', 'SMK - TATA BUKU', 1, 0, 15, '10/25/1962'),
(82, '097309202', '7309202', 'ERDIANTO', 'Erdianto', '6', 'PETUGAS TU GBB MANGKANG (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Gastu Mangkang Kulon', 'Subdivre Semarang', '8/12/2029', '8/1/2009', '9/1/2015', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '8/12/1973'),
(83, '087608776', '7608776', 'DUDIK WIBOWO', 'Dudik Wibowo', '6', 'JURTIM GBB MANGKANG (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Jurtim Mangkang Kulon', 'Subdivre Semarang', '11/26/2032', '11/1/2008', '3/15/2012', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '11/26/1976'),
(84, '780003031', '6383733', 'ZUFRON', 'Zufron', '12', 'KEPALA GBB DEPOK (A) SUBDIVRE SEMARANG DIVRE JATENG', 'Kagud Depok', 'Subdivre Semarang', '5/10/2019', '5/3/2010', '10/1/2015', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '5/10/1963'),
(85, '780003291', '6183269', 'SRIYANA', 'Sriyana', '10', 'KERANI GBB PURWODADI (A) SUBDIVRE SEMARANG DIVRE JATENG', 'Kerani Depok', 'Subdivre Semarang', '8/4/2017', '10/1/1983', '8/19/2008', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '8/4/1961'),
(86, '780003001', '6184183', 'CAHYO ISWIYANTO', 'Cahyo Iswiyanto', '10', 'JURTIM GBB PURWODADI (A) SUBDIVRE SEMARANG DIVRE JATENG', 'Jurtim Depok', 'Subdivre Semarang', '1/9/2017', '9/1/1984', '8/19/2008', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '1/9/1961'),
(87, '780003322', '6083261', 'SRI HARYANTO R.', 'Sri Haryanto R.', '10', 'PETUGAS TU GBB DEPOK (A) SUBDIVRE SEMARANG DIVRE JATENG', 'Gastu Depok', 'Subdivre Semarang', '5/1/2016', '10/1/1983', '3/18/2015', 'STM -  MESIN', 1, 0, 15, '5/1/1960'),
(88, '780002981', '6585590', 'SRI HARTATI', 'Sri Hartati', '11', 'KEPALA GBB KATONSARI (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Kagud Katonsari', 'Subdivre Semarang', '10/14/2021', '5/12/2014', '5/12/2014', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '10/14/1965'),
(89, '780006360', '6195246', 'M A R Y O M O', 'M A R Y O M O', '10', 'JURTIM GBB DEMAK (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Jurtim Demak', 'Subdivre Semarang', '6/22/2017', '3/1/1995', '3/15/2012', 'SMK - TATA BUKU', 1, 0, 15, '6/22/1961'),
(90, '780006385', '6095243', 'AGUS SUPRIYONO', 'Agus Supriyono', '10', 'PETUGAS TU GBB DEMAK (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Gastu Demak', 'Subdivre Semarang', '8/7/2016', '3/1/1995', '8/19/2008', 'STM - BANGUNAN GEDUNG', 1, 0, 15, '8/7/1960'),
(91, '780006381', '6095241', 'P R I Y O N O', 'P R I Y O N O', '10', 'JURTIM GBB DEMAK (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Jurtim Demak', 'Subdivre Semarang', '1/28/2016', '3/1/1995', '8/19/2008', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '1/28/1960'),
(92, '780003334', '6283730', 'DADANG IRIANTO , SH', 'Dadang Irianto', '12', 'KEPALA GBB BAWEN (C) SUBDIVRE SEMARANG DIVRE JATENG', 'Kagud Harjosari', 'Subdivre Semarang', '6/18/2018', '3/28/2012', '2/3/2014', 'S1 - ILMU HUKUM', 1, 0, 15, '6/18/1962'),
(93, '780002846', '6080487', 'YUMRONI', 'Yumroni', '5', 'JURTIM GBB BAWEN (C) SUBDIVRE SEMARANG DIVRE JATENG', 'Jurtim Harjosari', 'Subdivre Semarang', '1/2/2016', '6/1/1980', '3/15/2012', 'SEKOLAH DASAR', 1, 0, 15, '1/2/1960'),
(94, '088108636', '8108636', 'ARIA YOGAWARDHANA', 'Aria Yogawardhana', '6', 'KERANI GBB BAWEN (C) SUBDIVRE SEMARANG DIVRE JATENG', 'Kerani Harjosari', 'Subdivre Semarang', '2/13/2037', '11/1/2008', '10/1/2015', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '2/13/1981'),
(95, '087308191', '7308191', 'SAIFUL HIDAYAT', 'Saiful Hidayat', '6', 'PETUGAS TU GBB BAWEN (C) SUBDIVRE SEMARANG DIVRE JATENG', 'Gastu Harjosari', 'Subdivre Semarang', '1/12/2029', '1/1/2008', '6/17/2013', 'SMA - ILMU-ILMU BIOLOGI', 1, 0, 15, '1/12/1973'),
(96, '158315193', '8315193', 'NUR FITRI PELU', 'Nur Fitri Pelu', '5', 'STAF GBB HARJOSARI (C) SUBDIVRE SEMARANG DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Semarang', '', '11/1/2015', '11/1/2015', 'MAN', 1, 0, 15, '7/20/1983'),
(97, '780002879', '6384203', 'BUDIAWAN HENDRATNO', 'Budiawan Hendratno', '11', 'KEPALA GBB RANDUGARUT I (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Kagud Tambakaji', 'Subdivre Semarang', '11/23/2019', '5/7/2012', '10/1/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '11/23/1963'),
(98, '097309203', '7309203', 'NURUL HUDA', 'Nurul Huda', '6', 'JURTIM GBB RANDUGARUT I (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Jurtim Tambakaji', 'Subdivre Semarang', '9/6/2029', '8/1/2009', '3/15/2012', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '9/6/1973'),
(99, '780003054', '6084167', 'HENING SAPTIWI', 'Hening Saptiwi', '11', 'KERANI GBB RANDU GARUT (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Kerani Tambakaji', 'Subdivre Semarang', '9/18/2016', '4/1/1996', '7/1/2015', 'D3 - AKUNTANSI', 1, 0, 15, '9/18/1960'),
(100, '128712027', '8712027', 'DWI RIZKI SUKMA WIBAWA  , S.TP', 'Dwi Rizki Sukma W.', '9', 'PETUGAS TU GBB RANDU GARUT (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Gastu Tambakaji', 'Subdivre Semarang', '3/6/2043', '10/10/2012', '3/18/2015', 'S1 - TEKNOLOGI INDUSTRI PERTANIAN', 1, 0, 15, '3/6/1987'),
(101, '780003020', '6284061', 'HOSDIANTO', 'Hosdianto', '12', 'KEPALA GBB RANDUGARUT II (A) SUBDIVRE SEMARANG DIVRE JATENG', 'Kagud Randugarut', 'Subdivre Semarang', '10/10/2018', '2/18/2013', '10/1/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '10/10/1962'),
(102, '780002933', '6183103', 'T. EKY RETNO ANUGRAHENI', 'T. Eky Retno A.', '10', 'PETUGAS TU GBB TAMBAK AJI (A) SUBDIVRE SEMARANG DIVRE JATENG', 'Gastu Randugarut', 'Subdivre Semarang', '7/18/2017', '1/1/1983', '3/18/2015', 'SMK - TATA PERUSAHAAN', 1, 0, 15, '7/18/1961'),
(103, '068206109', '8206109', 'EKO FITRYANTO KURNIAWAN , SE', 'Eko Fitryanto K.', '9', 'JURTIM GBB TAMBAK AJI (A) SUBDIVRE SEMARANG DIVRE JATENG', 'Jurtim Randugarut', 'Subdivre Semarang', '7/21/2038', '6/1/2006', '9/1/2015', 'S1 - MANAJEMEN', 1, 0, 15, '7/21/1982'),
(104, '128712059', '8712059', 'MUHAMMAD IHSAN FAJAR  , S.TP', 'M. Ihsan Fajar', '9', 'KERANI GBB TAMBAK AJI (A) SUBDIVRE SEMARANG DIVRE JATENG', 'Kerani Randugarut', 'Subdivre Semarang', '10/3/2043', '10/10/2012', '3/18/2015', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '10/3/1987'),
(105, '159015209', '9015209', 'AMRUN NASRUDIN', 'Amrun Nasrudin', '5', 'STAF GBB TAMBAK AJI (A) SUBDIVRE SEMARANG DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Semarang', '', '11/1/2015', '11/1/2015', 'SMK - TEKNIK MESIN', 1, 0, 15, '8/1/1990'),
(106, '780003053', '6183267', 'A R U M A N , SH', 'A R U M A N', '12', 'KEPALA GBB KALIWUNGU (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Kagud Sumberejo', 'Subdivre Semarang', '7/26/2017', '2/1/2009', '8/2/2010', 'S1 - HUKUM KEPERDATAAN', 1, 0, 15, '7/26/1961'),
(107, '780006570', '6195729', 'JARWOTO', 'Jarwoto', '10', 'JURTIM GBB KALIWUNGU (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Jurtim Sumberejo', 'Subdivre Semarang', '4/29/2017', '3/1/1995', '7/1/2001', 'STM -  MESIN', 1, 0, 15, '4/29/1961'),
(108, '780006408', '6295281', 'TRIO WIHAKSO', 'Trio Wihakso', '10', 'KERANI GBB KALIWUNGU (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Kerani Sumberejo', 'Subdivre Semarang', '6/8/2018', '3/1/1995', '8/19/2008', 'SEKOLAH TEKNIK MENENGAH', 1, 0, 15, '6/8/1962'),
(109, '128712042', '8712042', 'IYAN SUMIRAT  , S.TP', 'Iyan Sumirat', '9', 'PETUGAS TU GBB SUMBEREJO (B) SUBDIVRE SEMARANG DIVRE JATENG', 'Gastu Sumberejo', 'Subdivre Semarang', '1/13/2043', '10/10/2012', '3/18/2015', 'S1 - TEKNOLOGI PANGAN', 1, 0, 15, '1/13/1987'),
(110, '098509069', '8509069', 'FERDIAN DARMA ATMAJA , S.TP', 'Ferdian Darma A.', '10', 'MANAGER UB-PGB DEMAK REGIONAL IV SEMARANG', 'Manager UPGB Demak', 'Subdivre Semarang', '9/24/2041', '3/28/2012', '3/28/2012', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '9/24/1985'),
(111, '128812015', '8812015', 'ARIF BUDIMAN  , S.P', 'Arif Budiman', '9', 'STAF UB-PGB DEMAK REGIONAL IV SEMARANG', 'Staf UPGB Demak', 'Subdivre Semarang', '11/14/2044', '10/10/2012', '10/10/2012', 'S1 - AGRONOMI', 1, 0, 15, '11/14/1988'),
(112, '118711078', '8711078', 'BAGUS SETIO WIBOWO , S.E', 'Bagus Setio Wibowo', '10', 'MANAGER UB-PGB PURWODADI REGIONAL IV SEMARANG', 'Manager UPGB Purwodadi', 'Subdivre Semarang', '9/10/2043', '7/1/2015', '7/1/2015', 'S1 - AKUNTANSI', 1, 0, 15, '9/10/1987'),
(113, '068006038', '8006038', 'M. IHSAN SURAADILAGA , S.E', 'M. Ihsan Suraadilaga', '11', 'MANAGER UB-PGB KALIWUNGU REGIONAL IV SEMARANG', 'Manager UPGB Kaliwungu', 'Subdivre Semarang', '2/18/2036', '4/18/2013', '4/18/2013', 'S1 - EKONOMI MANAJEMEN', 1, 0, 15, '2/18/1980'),
(114, '780007049', '6597318', 'K H O Z I N , SH', 'K H O Z I N', '13', 'KEPALA SUB DIVRE PATI DIVRE JATENG', 'Kasub Pati', 'Subdivre Pati', '10/5/2021', '2/7/2011', '11/1/2013', 'S1 - HUKUM PERDATA', 1, 0, 15, '10/5/1965'),
(115, '780000981', '6284013', 'GATOT ENDRO WALUYO , SH', 'Gatot Endro Waluyo', '13', '  WAKA SUBDIVRE PATI DIVRE JATENG', 'Wakasub Pati', 'Subdivre Pati', '6/11/2018', '3/16/2015', '3/16/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '6/11/1962'),
(116, '780007080', '7297019', 'MUHAMAD RAHDIAN ILHAM , SE', 'M. Rahdian Ilham', '10', 'KEPALA SEKSI ADMINISTRASI DAN KEUANGAN SUBDIVRE PATI DIVRE JATENG', 'Kasi Minku Pati', 'Subdivre Pati', '6/21/2028', '9/15/2008', '8/2/2010', 'S1 - MANAJEMEN', 1, 0, 15, '6/21/1972'),
(117, '097609205', '7609205', 'R. LUQMAN HAKIM', 'R. Luqman Hakim', '6', 'KASIR SUB DIVRE PATI DIVRE JATENG', 'Kasir Sub Pati', 'Subdivre Pati', '2/5/2032', '8/1/2009', '3/18/2015', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '2/5/1976'),
(118, '097709325', '7709325', 'YORDANSYAH MUSA MARBUN', 'Yordansyah Musa M.', '6', 'STAF SUB DIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '3/13/2033', '8/5/2009', '12/1/2010', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '3/13/1977'),
(119, '780003092', '6183104', 'AGUS RIYANTI', 'Agus Riyanti', '11', 'KEPALA SEKSI AKUNTANSI SUBDIVRE PATI DIVRE JATENG', 'Kasi Akuntansi Pati', 'Subdivre Pati', '8/12/2017', '4/11/2011', '4/11/2011', 'SMK - TATA BUKU', 1, 0, 15, '8/12/1961'),
(120, '780006622', '6195633', 'R. MOHAMMAD ISWARNO', 'R. Mohammad Iswarno', '9', 'STAF SUB DIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '10/22/2017', '3/1/1994', '9/1/2003', 'SMA - A2/BIOLOGI', 1, 0, 15, '10/22/1961'),
(121, '780003362', '6585584', 'SUYOKO', 'Suyoko', '11', 'KEPALA SEKSI PELAYANAN PUBLIK SUBDIVRE PATI DIVRE JATENG', 'Kasi PP Pati', 'Subdivre Pati', '10/11/2021', '4/11/2011', '7/23/2012', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '10/11/1965'),
(122, '780006579', '6095718', 'SUWANTO', 'Suwanto', '10', 'PETUGAS PERAWATAN KUALITAS SUB DIVRE PATI DIVRE JATENG', 'Petugas Perawatan', 'Subdivre Pati', '2/19/2016', '3/1/1995', '4/1/2015', 'SMK - TATA BUKU', 1, 0, 15, '2/19/1960'),
(123, '088208557', '8208557', 'NIKEN DYAH UNTARI', 'Niken Dyah Untari', '6', 'STAF SUB DIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '12/26/2038', '11/1/2008', '12/1/2009', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '12/26/1982'),
(124, '780002906', '6185567', 'WULANDARTO EKO CAHYO , SH', 'Wulandarto Eko Cahyo', '12', 'KEPALA SEKSI ANALISA HARGA DAN PASAR SUBDIVRE PATI DIVRE JATENG', 'Kasi Gasar Pati', 'Subdivre Pati', '10/26/2017', '4/1/2005', '7/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '10/26/1961'),
(125, '780003097', '6286022', 'S U R O S O , SH', 'S U R O S O', '12', 'KEPALA SEKSI PERENCANAAN DAN PENGEMBANGAN USAHA SUBDIVRE PATI DIVRE JATENG', 'Kasi PPU Pati', 'Subdivre Pati', '5/10/2018', '1/1/2005', '11/1/2012', 'S1 - HUKUM KEPERDATAAN', 1, 0, 15, '5/10/1962'),
(126, '780002835', '6184181', 'SUYUDI , S.SOS', 'Suyudi', '12', 'STAF SUB DIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '10/1/2017', '6/16/2014', '6/16/2014', 'S1 - ADMINISTRASI NEGARA', 1, 0, 15, '10/1/1961'),
(127, '088508143', '8508143', 'F SITORESMI PURBOSARI , S.Kom', 'F Sitoresmi Purbosari', '9', 'STAF SUB DIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '4/10/2041', '2/1/2009', '8/1/2012', 'S1 - ILMU KOMPUTER', 1, 0, 15, '4/10/1985'),
(128, '780002962', '6281166', 'ANTON YURIAN RUSIYANTO', 'Anton Yurian Rusiyanto', '12', 'ASISTEN PENGAWAS SUB DIVRE PATI DIVRE JATENG', 'Asswas Sub Pati', 'Subdivre Pati', '3/31/2018', '3/1/2004', '1/20/2011', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '3/31/1962'),
(129, '780002910', '6085558', 'EDI WURYANTO , BA', 'Edi Wuryanto', '12', 'ASDIV PRATAMA I BID PEMASARAN DIVISI REGIONAL JATENG PERUM BULOG', 'Asdiv', 'Subdivre Pati', '8/27/2016', '8/10/2007', '10/1/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '8/27/1960'),
(130, '780006411', '6495280', 'SUNARTO', 'Sunarto', '9', 'KEPALA GBB MARGOREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Kagud Margorejo', 'Subdivre Pati', '11/6/2020', '5/12/2014', '5/12/2014', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '11/6/1964'),
(131, '780002964', '6085334', 'KARSONO', 'Karsono', '7', 'KERANI GBB MARGOREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Kerani Margorejo', 'Subdivre Pati', '6/24/2016', '7/1/1985', '1/15/2007', 'SEKOLAH DASAR', 1, 0, 15, '6/24/1960'),
(132, '128712298', '8712298', 'FARUQ  , S.IA', 'Faruq', '9', 'PETUGAS TU GBB MARGOREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Gastu Margorejo', 'Subdivre Pati', '12/28/2043', '12/7/2012', '3/18/2015', 'S1 - ILMU ADMINISTRASI FISKAL', 1, 0, 15, '12/28/1987'),
(133, '157715170', '7715170', 'JAENAL JAHIDIN', 'Jaenal Jahidin', '5', 'STAF GBB MARGOREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '2/18/1977'),
(134, '780006377', '6595260', 'SUISMUTOYO , S.SOS', 'Suismutoyo', '11', 'KEPALA GBB TEMPEL LEMAHABANG (B) SUBDIVRE PATI DIVRE JATENG', 'Kagud Tempel Lemahabang', 'Subdivre Pati', '8/8/2021', '9/1/2015', '9/1/2015', 'S1 - ADMINISTRASI NEGARA', 1, 0, 15, '8/8/1965'),
(135, '780006583', '6495725', 'SUTRISNO. B', 'Sutrisno. B', '10', 'KERANI GBB BLORA (B) SUBDIVRE PATI DIVRE JATENG', 'Kerani Tempel Lemahabang', 'Subdivre Pati', '3/18/2020', '3/1/1995', '3/15/2012', 'SMK - TATA BUKU', 1, 0, 15, '3/18/1964'),
(136, '780002772', '6185562', 'PUJI PRIYONO', 'Puji Priyono', '10', 'KERANI GBB BLORA (B) SUBDIVRE PATI DIVRE JATENG', 'Kerani Tempel Lemahabang', 'Subdivre Pati', '11/15/2017', '12/1/1985', '3/15/2012', 'SMK - TATA NIAGA', 1, 0, 15, '11/15/1961'),
(137, '088108524', '8108524', 'AGUNG WAHYU DWIYONO', 'Agung Wahyu Dwiyono', '6', 'JURTIM GBB BLORA (B) SUBDIVRE PATI DIVRE JATENG', 'Jurtim Tempel Lemahabang', 'Subdivre Pati', '12/27/2037', '11/1/2008', '11/1/2008', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '12/27/1981'),
(138, '118511080', '8511080', 'NOVIANTO HERY KURNIAWAN , S.Si', 'Novianto Hery K.', '10', 'JURTIM GBB TEMPEL LEMAHABANG (B) SUBDIVRE PATI DIVRE JATENG', 'Jurtim Tempel Lemahabang', 'Subdivre Pati', '11/9/2041', '10/1/2011', '3/18/2015', 'S1 - BIOLOGI', 1, 0, 15, '11/9/1985'),
(139, '780003028', '6483735', 'MOH. JAUHARI', 'Moh. Jauhari', '10', 'KEPALA GBB, GSP KALIWUNGU (C) SUBDIVRE PATI DIVRE JATENG', 'Kagud Kaliwungu', 'Subdivre Pati', '1/3/2020', '4/1/2015', '4/1/2015', 'SMK - TATA NIAGA', 1, 0, 15, '1/3/1964'),
(140, '780003096', '6383759', 'SUKIRNA', 'Sukirna', '7', 'JURTIM GBB, GSP KALIWUNGU (C) SUBDIVRE PATI DIVRE JATENG', 'Jurtim Kaliwungu', 'Subdivre Pati', '6/29/2019', '5/1/1983', '4/20/2015', 'SEKOLAH MENENGAH PERTAMA', 1, 0, 15, '6/29/1963'),
(141, '097409204', '7409204', 'MULYANTONI', 'Mulyantoni', '6', 'KERANI GBB, GSP KALIWUNGU (C) SUBDIVRE PATI DIVRE JATENG', 'Kerani Kaliwungu', 'Subdivre Pati', '8/3/2030', '8/1/2009', '4/20/2015', 'SMA - ILMU-ILMU BIOLOGI', 1, 0, 15, '8/3/1974'),
(142, '780006402', '6595262', 'SARTONO HADI SAPUTRO , SH', 'Sartono Hadi Saputro', '11', 'KEPALA GSP RENGGING (C) SUBDIVRE PATI DIVRE JATENG', 'Kagud Rengging', 'Subdivre Pati', '7/13/2021', '4/1/2015', '4/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '7/13/1965'),
(143, '097509324', '7509324', 'HARTONO', 'Hartono', '6', 'JURTIM GSP RENGGING (C) SUBDIVRE PATI DIVRE JATENG', 'Jurtim Rengging', 'Subdivre Pati', '7/6/2031', '8/5/2009', '4/20/2015', 'SMK - SMK - MESIN TENAGA', 1, 0, 15, '7/6/1975'),
(144, '097209201', '7209201', 'SUGINO', 'Sugino', '6', 'KERANI GSP RENGGING (C) SUBDIVRE PATI DIVRE JATENG', 'Kerani Rengging', 'Subdivre Pati', '3/13/2028', '8/1/2009', '4/20/2015', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '3/13/1972'),
(145, '157715174', '7715174', 'MURAJI', 'Muraji', '5', 'STAF GSP RENGGING (C) SUBDIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '', '11/1/2015', '11/1/2015', 'MAN - IPS', 1, 0, 15, '10/15/1977'),
(146, '158515197', '8515197', 'WAHYUDI', 'Wahyudi', '5', 'STAF GSP RENGGING (C) SUBDIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '', '11/1/2015', '11/1/2015', 'SMK - TEKNIK MESIN', 1, 0, 15, '3/7/1985'),
(147, '780002867', '6485583', 'HANDOKO , SH', 'Handoko', '12', 'KEPALA GBB SOKOKULON (B) SUBDIVRE PATI DIVRE JATENG', 'Kagud Sukokulon', 'Subdivre Pati', '8/3/2020', '11/10/2008', '3/7/2011', 'S1 - ILMU HUKUM', 1, 0, 15, '8/3/1964'),
(148, '780006400', '6395259', 'DJOKO SANTOSO', 'Djoko Santoso', '10', 'JURTIM GBB SOKOKULON (B) SUBDIVRE PATI DIVRE JATENG', 'Jurtim Sukokulon', 'Subdivre Pati', '3/24/2019', '3/1/1995', '3/15/2012', 'SMK - TATA USAHA', 1, 0, 15, '3/24/1963'),
(149, '780006383', '6395255', 'S U P R I Y O , SH', 'S U P R I Y O', '9', 'PETUGAS TU GBB SOKOKULON (B) SUBDIVRE PATI DIVRE JATENG', 'Gastu Sukokulon', 'Subdivre Pati', '3/3/2019', '3/1/1995', '3/18/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '3/3/1963'),
(150, '158015179', '8015179', 'ADI IRMAWAN', 'Adi Irmawan', '5', 'STAF GBB SOKOKULON (B) SUBDIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '', '11/1/2015', '11/1/2015', 'SMK - MEKANIK UMUM', 1, 0, 15, '7/9/1980'),
(151, '158315192', '8315192', 'HENDRYANA RAHMAN AHMAD', 'Hendryana Rahman A.', '5', 'STAF GBB SOKOKULON (B) SUBDIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '', '11/1/2015', '11/1/2015', 'SMU - IPA', 1, 0, 15, '7/19/1983'),
(152, '780006403', '6495254', 'SUAMAL , SH', 'Suamal', '9', 'KEPALA GBB BUMIREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Kagud Bumirejo', 'Subdivre Pati', '7/13/2020', '1/2/2015', '10/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '7/13/1964'),
(153, '780006374', '6895261', 'PURWANTO', 'Purwanto', '9', 'JURTIM GBB BUMIREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Jurtim Bumirejo', 'Subdivre Pati', '9/15/2024', '3/1/1995', '3/18/2015', 'SMA - A1/FISIKA', 1, 0, 15, '9/15/1968'),
(154, '780006399', '7195250', 'MUHADI', 'Muhadi', '9', 'KERANI GBB BUMIREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Kerani Bumirejo', 'Subdivre Pati', '4/14/2027', '3/1/1995', '3/18/2015', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '4/14/1971'),
(155, '157515167', '7515167', 'HIDAYAT PURWOKO', 'Hidayat Purwoko', '5', 'STAF GBB BUMIREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '', '11/1/2015', '11/1/2015', 'SMA', 1, 0, 15, '5/25/1975'),
(156, '780006372', '6895253', 'MADIYONO , SH', 'Madiyono', '10', 'KEPALA GSP KEDUNGREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Kagud Kedungrejo', 'Subdivre Pati', '5/5/2024', '9/1/2015', '9/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '5/5/1968'),
(157, '086808753', '6808753', 'MARNO', 'Marno', '6', 'PETUGAS TU GSP KEDUNGREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Gastu Kedungrejo', 'Subdivre Pati', '12/13/2024', '11/1/2008', '3/15/2012', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '12/13/1968'),
(158, '088008567', '8008567', 'AGUS SUKOWIHONO', 'Agus Sukowihono', '6', 'KERANI GSP KEDUNGREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Kerani Kedungrejo', 'Subdivre Pati', '8/18/2036', '11/1/2008', '3/18/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '8/18/1980'),
(159, '158015181', '8015181', 'LILIEK OKI GUNARSO', 'Liliek Oki Gunarso', '5', 'STAF GSP KEDUNGREJO (C) SUBDIVRE PATI DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pati', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '10/2/1980'),
(160, '780003356', '6184177', 'N O D O , SH', 'N O D O', '11', 'MANAGER UB-PGB MARGOREJO REGIONAL IV SEMARANG', 'Manager UPGB Margorejo', 'Subdivre Pati', '4/13/2017', '11/1/2012', '7/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '4/13/1961'),
(161, '118711088', '8711088', 'RICKY BAGUS PRATAMA , S.I.Kom', 'Ricky Bagus P.', '10', 'MANAGER UB-PGB BLORA REGIONAL IV SEMARANG', 'Manager UPGB Blora', 'Subdivre Pati', '12/7/2043', '7/1/2015', '7/1/2015', 'S1 - ILMU KOMUNIKASI', 1, 0, 15, '12/7/1987'),
(162, '128712037', '8712037', 'GALIH RAFIDIANTO PUTRO  , S.TP', 'Galih Rafidianto P.', '9', 'STAF UB-PGB BLORA REGIONAL IV SEMARANG', 'Staf UPGB Blora', 'Subdivre Pati', '5/31/2043', '10/10/2012', '10/10/2012', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '5/31/1987'),
(163, '098509065', '8509065', 'ANGGA SENOAJI HERMANTO , S.TP', 'Angga Senoaji H.', '10', 'PETUGAS PRODUKSI UB-PGB BLORA REGIONAL IV SEMARANG', 'Staf UB-PGB', 'Subdivre Pati', '1/8/2041', '8/1/2009', '11/1/2012', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '1/8/1985'),
(164, '118811081', '8811081', 'NUR HARDIANSYAH , S.T', 'Nur Hardiansyah', '10', 'MANAGER UB-PGB BUMIREJO REGIONAL IV SEMARANG', 'Manager UPGB Bumirejo', 'Subdivre Pati', '5/29/2044', '7/1/2015', '7/1/2015', 'S1 - TEKNIK INDUSTRI', 1, 0, 15, '5/29/1988'),
(165, '780002789', '6283910', 'HERI SIS HARYANTO', 'Heri Sis Haryanto', '12', 'MANAGER UB-PGB KEDUNGREJO REGIONAL IV SEMARANG', 'Manager UPGB Kedungrejo', 'Subdivre Pati', '12/8/2018', '5/3/2010', '7/1/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '12/8/1962'),
(166, '128412338', '8412338', 'JOKO PURWANTO  , S.E  *) APS', 'Joko Purwanto', '9', 'STAF UB-PGB KEDUNGREJO REGIONAL IV SEMARANG', 'Staf UPGB Kedungrejo', 'Subdivre Pati', '3/23/2040', '12/7/2012', '12/7/2012', 'S1 - MANAJEMEN', 1, 0, 15, '3/23/1984'),
(167, '118411085', '8411085', 'AHMAD MUZAJJAD FAQIHUDDIN , S.TP', 'Ahmad Muzajjad F.', '10', 'STAF UB-PGB KEDUNGREJO REGIONAL IV SEMARANG', 'Staf UPGB Kedungrejo', 'Subdivre Pati', '12/31/2040', '10/1/2011', '3/18/2015', 'S1 - TEKNOLOGI HASIL PERTANIAN', 1, 0, 15, '12/31/1984'),
(168, '780006888', '6897042', 'YUDY PRAKASA YUDHA , SE, MM', 'Yudy Prakasa Yudha', '13', 'KEPALA SUB DIVRE SURAKARTA DIVRE JATENG', 'Kasub Surakarta', 'Subdivre Surakarta', '6/9/2024', '1/3/2013', '10/1/2013', 'S2 - MANAJEMEN DAN BISNIS', 1, 0, 15, '6/9/1968'),
(169, '780007103', '6997017', 'M O E H A R I , SE', 'M O E H A R I', '13', '  WAKA SUBDIVRE SURAKARTA DIVRE JATENG', 'Wakasub Surakarta', 'Subdivre Surakarta', '12/28/2025', '11/20/2014', '11/20/2014', 'S1 - EKONOMI AKUNTANSI', 1, 0, 15, '12/28/1969'),
(170, '780006945', '6897069', 'NANIEK KURNIASIH , S.KOM', 'Naniek Kurniasih', '12', 'KEPALA SEKSI ADMINISTRASI DAN KEUANGAN SUBDIVRE SURAKARTA DIVRE JATENG', 'Kasi Minku Surakarta', 'Subdivre Surakarta', '8/28/2024', '5/12/2014', '5/12/2014', 'S1 - MANAJEMEN INFORMATIKA', 1, 0, 15, '8/28/1968'),
(171, '129012155', '9012155', 'IING NOVIANTI', 'Iing Novianti', '7', 'STAF SUB DIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '5/18/2046', '11/27/2012', '11/27/2012', 'D3 - PERPAJAKAN', 1, 0, 15, '5/18/1990'),
(172, '088108585', '8108585', 'MOHAMAD SOFIAN NUGROHO', 'M. Sofian Nugroho', '6', 'KASIR SUB DIVRE SURAKARTA DIVRE JATENG', 'Kasir Sub Surakarta', 'Subdivre Surakarta', '12/14/2037', '11/1/2008', '11/1/2012', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '12/14/1981'),
(173, '780003045', '6485581', 'MOKHAMAD SOLEH , SE', 'Mokhamad Soleh', '12', 'KEPALA SEKSI AKUNTANSI SUBDIVRE SURAKARTA DIVRE JATENG', 'Kasi Akuntansi Surakarta', 'Subdivre Surakarta', '10/5/2020', '2/3/2014', '1/2/2015', 'S1 - MANAJEMEN', 1, 0, 15, '10/5/1964'),
(174, '128712299', '8712299', 'SITI NURHALIMAH  , S.Sos', 'Siti Nurhalimah', '9', 'STAF GBB MASARAN (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '3/17/2043', '12/7/2012', '12/7/2012', 'S1 - ILMU ADMINISTRASI NIAGA', 1, 0, 15, '3/17/1987'),
(175, '088308031', '8308031', 'ADHY NURUL JANARKO , S.TP', 'Adhy Nurul Janarko', '10', 'STAF SUB DIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '10/30/2039', '11/1/2008', '11/1/2015', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '10/19/1983'),
(176, '780002948', '6585586', 'YOYO , S.SOS', 'Yoyo', '12', 'KEPALA SEKSI PELAYANAN PUBLIK SUBDIVRE SURAKARTA DIVRE JATENG', 'Kasi PP Surakarta', 'Subdivre Surakarta', '10/3/2021', '9/1/2014', '9/1/2014', 'S1 - ADMINSTRASI NIAGA', 1, 0, 15, '10/3/1965'),
(177, '128512061', '8512061', 'NANANG HARIANTO  , S.P', 'Nanang Harianto', '9', 'PETUGAS PERAWATAN KUALITAS SUB DIVRE SURAKARTA DIVRE JATENG', 'Petugas Perawatan', 'Subdivre Surakarta', '12/6/2041', '10/10/2012', '3/18/2015', 'S1 - PENYULUHAN & KOMUNIKASI PERTANIAN', 1, 0, 15, '12/6/1985'),
(178, '780006392', '6595251', 'SUPARNA', 'Suparna', '10', 'STAF SUB DIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '8/17/2021', '3/1/1995', '11/1/2005', 'SMK - PERTANIAN', 1, 0, 15, '8/17/1965'),
(179, '780004911', '6080289', 'MUNGIN', 'Mungin', '10', 'STAF SUB DIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '6/7/2016', '6/1/1992', '12/1/2003', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '6/7/1960'),
(180, '780003042', '6585588', 'SRI LESTARI', 'Sri Lestari', '10', 'STAF SUB DIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '5/18/2021', '12/1/1985', '12/1/1985', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '5/18/1965'),
(181, '118611067', '8611067', 'GUSTAMI RIZQIADI Y. , S.P', 'Gustami Rizqiadi Y.', '10', 'STAF SUB DIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '5/3/2042', '10/1/2011', '10/1/2015', 'S1 - BUDIDAYA PERTANIAN', 1, 0, 15, '5/3/1986'),
(182, '780003146', '6184180', 'AS''ADI , S.SOS', 'As''Adi', '12', 'KEPALA SEKSI ANALISA HARGA DAN PASAR SUBDIVRE SURAKARTA DIVRE JATENG', 'Kasi Gasar Surakarta', 'Subdivre Surakarta', '5/21/2017', '2/1/2008', '9/1/2014', 'S1 - ADMINISTRASI NEGARA', 1, 0, 15, '5/21/1961'),
(183, '780002971', '6285569', 'AGUS PURWANTORO', 'Agus Purwantoro', '10', 'STAF SUB DIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '11/21/2018', '12/1/1985', '12/1/1985', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '11/21/1962'),
(184, '780003351', '6085560', 'BAMBANG SUHARTOYO', 'Bambang Suhartoyo', '11', 'KEPALA SEKSI PERENCANAAN DAN PENGEMBANGAN USAHA SUBDIVRE SURAKARTA DIVRE JATENG', 'Kasi PPU Surakarta', 'Subdivre Surakarta', '7/27/2016', '7/1/2015', '7/1/2015', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '7/27/1960'),
(185, '088108003', '8108003', 'MIFTAH RAHMAWATI', 'Miftah Rahmawati', '11', 'STAF SUB DIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '10/25/2037', '2/1/2009', '7/1/2011', 'S2 - BIDANG PERTANIAN', 1, 0, 15, '10/25/1981'),
(186, '780003202', '6082286', 'SRIYONO', 'Sriyono', '12', 'ASDIV PRATAMA I BID PEMASARAN DIVISI REGIONAL JATENG PERUM BULOG', 'Asdiv', 'Subdivre Surakarta', '2/25/2016', '9/1/2009', '7/1/2015', 'SEKOLAH TEKNIK MENENGAH', 1, 0, 15, '2/25/1960'),
(187, '780002774', '6284191', 'TOTOK PRAPTOMO , SE', 'Totok Praptomo', '12', 'KEPALA GBB KARANGANOM (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kagud Karanganom', 'Subdivre Surakarta', '2/10/2019', '4/20/2015', '4/20/2015', 'S1 - MANAJEMEN', 1, 0, 15, '2/10/1963'),
(188, '067806014', '7806014', 'WAHYU WIDIARTONO , S.H', 'Wahyu Widiartono', '11', 'PETUGAS TU GBB KARANGANOM (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Gastu Karanganom', 'Subdivre Surakarta', '11/6/2034', '6/1/2006', '3/18/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '11/6/1978'),
(189, '780002897', '6585587', 'SUHARDI', 'Suhardi', '12', 'KEPALA GBB KRIKILAN (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kagud Krikilan', 'Subdivre Surakarta', '4/17/2021', '3/7/2011', '5/4/2015', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '4/17/1965'),
(190, '780006578', '6495732', 'SARMAN', 'Sarman', '10', 'JURTIM GBB MASARAN (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Krikilan', 'Subdivre Surakarta', '5/3/2020', '3/1/1995', '7/1/2001', 'SMK - TATA BUKU', 1, 0, 15, '5/3/1964'),
(191, '096909198', '6909198', 'AGUS SUPRIYANTO', 'Agus Supriyanto', '6', 'JURTIM GBB KRIKILAN (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Krikilan', 'Subdivre Surakarta', '9/3/2025', '8/1/2009', '8/1/2009', 'SMA - ILMU-ILMU BIOLOGI', 1, 0, 15, '9/3/1969'),
(192, '158715203', '8715203', 'AKHMAD SUTRISNO', 'Akhmad Sutrisno', '5', 'STAF GBB KRIKILAN (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMK - TEKNIK MESIN', 1, 0, 15, '1/24/1987'),
(193, '780006629', '6995720', 'EDI HARYANA', 'Edi Haryana', '9', 'KEPALA GBB NGABEYAN (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kagud Ngabeyan', 'Subdivre Surakarta', '1/28/2025', '2/18/2013', '4/20/2015', 'SMA - A3/SOSIAL', 1, 0, 15, '1/28/1969'),
(194, '780006568', '6695735', 'MASRATNO', 'Masratno', '10', 'JURTIM GBB NGABEYAN (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Ngabeyan', 'Subdivre Surakarta', '3/2/2022', '3/1/1995', '8/19/2008', 'STM -  MESIN', 1, 0, 15, '3/2/1966'),
(195, '780006419', '5995644', 'HERRY HANDRITO', 'Herry Handrito', '10', 'JURTIM GBB KARTOSURO (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Ngabeyan', 'Subdivre Surakarta', '12/3/2015', '3/1/1995', '3/15/2012', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '12/3/1959'),
(196, '087808727', '7808727', 'BOGGIE OKTAVIANUS', 'Boggie Oktavianus', '6', 'KERANI GBB NGABEYAN (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kerani Ngabeyan', 'Subdivre Surakarta', '10/10/2034', '11/1/2008', '10/1/2015', 'SMA - ILMU-ILMU BIOLOGI', 1, 0, 15, '10/10/1978'),
(197, '780006572', '6295721', 'LILIEK W. IRWANTO', 'Liliek W. Irwanto', '9', 'PETUGAS TU GBB KARTOSURO (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Gastu Ngabeyan', 'Subdivre Surakarta', '2/22/2018', '3/1/1995', '3/15/2012', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '2/22/1962'),
(198, '780002799', '6285572', 'NUGROHO SETYA ADI , SH', 'Nugroho Setya Adi', '12', 'KEPALA GBB BANARAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kagud Banaran', 'Subdivre Surakarta', '3/30/2018', '5/12/2014', '7/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '3/30/1962'),
(199, '097909208', '7909208', 'SUTOPO', 'Sutopo', '6', 'JURTIM GBB BANARAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Banaran', 'Subdivre Surakarta', '8/10/2035', '8/1/2009', '3/15/2012', 'SMK - TEKNOLOGI DAN INDUSTRI', 1, 0, 15, '8/10/1979');
INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `noreg`, `nama_asli`, `nama_pegawai`, `golongan`, `jabatan_asli`, `jabatan`, `unitkerja`, `tmt_pensiun`, `tmt_jenjang`, `tmt_jabatan`, `pendidikan_formal`, `sts`, `sts_pejabat`, `pajak`, `tgl_lahir`) VALUES
(200, '097709206', '7709206', 'ARY SAPUTRA', 'Ary Saputra', '6', 'PETUGAS TU GBB KLATEN (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Gastu Banaran', 'Subdivre Surakarta', '11/20/2033', '8/1/2009', '3/15/2012', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '11/20/1977'),
(201, '157615169', '7615169', 'AHMAD SOLIKIN', 'Ahmad Solikin', '5', 'STAF GBB BANARAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '9/1/1976'),
(202, '158115189', '8115189', 'CANDRA PRAPTO NUGROHO', 'Candra Prapto N.', '5', 'STAF GBB BANARAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '10/29/1981'),
(203, '780006398', '6895245', 'DJOKO SUSILO , SH', 'Djoko Susilo , Sh', '10', 'KEPALA GBB TELUKAN (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kagud Telukan', 'Subdivre Surakarta', '10/24/2024', '2/18/2013', '4/20/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '10/24/1968'),
(204, '780002891', '6285576', 'SURIP', 'Surip', '10', 'KERANI GBB TELUKAN (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kerani Telukan', 'Subdivre Surakarta', '10/27/2018', '12/1/1985', '7/1/2001', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '10/27/1962'),
(205, '088208655', '8208655', 'WISNU SANCOYO SUKASWO', 'Wisnu Sancoyo S.', '6', 'JURTIM GBB TELUKAN (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Telukan', 'Subdivre Surakarta', '8/29/2038', '11/1/2008', '3/15/2012', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '8/29/1982'),
(206, '157615168', '7615168', 'FEBRU JATMIKO', 'Febru Jatmiko', '5', 'STAF GBB TELUKAN (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMA', 1, 0, 15, '5/11/1976'),
(207, '158615201', '8615201', 'GINANJAR YOGA PRATAMA', 'Ginanjar Yoga P.', '5', 'STAF GBB TELUKAN (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '1/20/1986'),
(208, '780003113', '6185564', 'JOKO SUWONDO , SE', 'Joko Suwondo', '12', 'KEPALA GBB MOJOLABAN  (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kagud Mojolaban', 'Subdivre Surakarta', '10/11/2017', '10/1/2013', '10/1/2013', 'S1 - MANAJEMEN', 1, 0, 15, '10/11/1961'),
(209, '780002852', '6083096', 'SURYO EDI PRABOWO', 'Suryo Edi Prabowo', '10', 'JURTIM GBB MOJOLABAN  (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Mojolaban', 'Subdivre Surakarta', '1/10/2016', '1/1/1983', '3/15/2012', 'SMK - TATA NIAGA', 1, 0, 15, '1/10/1960'),
(210, '087808649', '7808649', 'KAMIJO', 'Kamijo', '6', 'PETUGAS TU GBB MOJOLABAN  (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Gastu Mojolaban', 'Subdivre Surakarta', '9/14/2034', '11/1/2008', '3/15/2012', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '9/14/1978'),
(211, '158915208', '8915208', 'DWI TOMI WIJATMOKO', 'Dwi Tomi Wijatmoko', '5', 'STAF GBB TRIYAGAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMA - IPS', 1, 0, 15, '7/26/1989'),
(212, '087008094', '7008094', 'NUR IHSAN', 'Nur Ihsan', '6', 'PJS TK I KEPALA GSP GEDONG (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'PJS Kagud Gedong', 'Subdivre Surakarta', '7/2/2026', '1/1/2008', '7/1/2015', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '7/2/1970'),
(213, '780006393', '6295273', 'M A H F U D Z', 'M A H F U D Z', '10', 'PETUGAS TU GSP WONOGIRI (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Gastu Gedong', 'Subdivre Surakarta', '3/13/2018', '3/1/1995', '3/15/2012', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '3/13/1962'),
(214, '157815176', '7815176', 'HERMAWAN ADIPUTRANTO', 'Hermawan Adiputranto', '5', 'STAF GSP GEDONG (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMA', 1, 0, 15, '5/29/1978'),
(215, '157915178', '157915178', 'AJI WIBOWO', 'Aji Wibowo', '5', 'STAF GSP GEDONG (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMA', 1, 0, 15, '4/4/1979'),
(216, '158715204', '8715204', 'FANDY ERFANSYAH', 'Fandy Erfansyah', '5', 'STAF GSP GEDONG (C) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMA', 1, 0, 15, '7/23/1987'),
(217, '780002870', '6384199', 'SANTOSO', 'Santoso', '12', 'KEPALA GBB KARANGWUNI (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kagud Meger', 'Subdivre Surakarta', '11/6/2019', '3/10/2008', '10/1/2013', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '11/6/1963'),
(218, '780003088', '6285570', 'IRAWAN', 'Irawan', '10', 'KERANI GBB KARANGWUNI (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kerani Meger', 'Subdivre Surakarta', '1/22/2018', '12/1/1985', '3/15/2012', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '1/22/1962'),
(219, '087408719', '7408719', 'SAMSOEL BAHRY', 'Samsoel Bahry', '6', 'PETUGAS TU GBB KARANGWUNI (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Gastu Meger', 'Subdivre Surakarta', '5/20/2030', '11/1/2008', '3/15/2012', 'SMA - ILMU-ILMU BIOLOGI', 1, 0, 15, '5/20/1974'),
(220, '780006387', '6395277', 'M U L Y O K O', 'M U L Y O K O', '10', 'JURTIM GBB MEGER (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Meger', 'Subdivre Surakarta', '12/16/2019', '3/1/1995', '3/18/2015', 'SMK - TATA BUKU', 1, 0, 15, '12/16/1963'),
(221, '158515196', '8515196', 'MUHAMAD NUR AZIS', 'Muhamad Nur Azis', '5', 'STAF GBB MEGER (A) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMA - IPS', 1, 0, 15, '1/27/1985'),
(222, '098609043', '8609043', 'NUR FUAD INDRA MITRA , S.TP', 'Nur Fuad Indra M.', '10', 'KEPALA GBB DUYUNGAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Kagud Duyungan', 'Subdivre Surakarta', '8/7/2042', '2/1/2011', '12/1/2015', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '8/7/1986'),
(223, '780003114', '6284195', 'PURNOMO', 'Purnomo', '10', 'JURTIM GBB DUYUNGAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Duyungan', 'Subdivre Surakarta', '6/10/2018', '9/1/1984', '8/19/2008', 'SMK - MESIN LISTRIK', 1, 0, 15, '6/10/1962'),
(224, '780006573', '6395734', 'JUMBADI', 'Jumbadi', '10', 'JURTIM GBB DUYUNGAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Jurtim Duyungan', 'Subdivre Surakarta', '8/17/2019', '3/1/1995', '9/1/2003', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '8/17/1963'),
(225, '128912301', '8912301', 'RAHADIAN ANDHIKA P  , S.T', 'Rahadian Andhika P', '9', 'PETUGAS TU GBB DUYUNGAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Gastu Duyungan', 'Subdivre Surakarta', '11/7/2045', '12/7/2012', '3/18/2015', 'S1 - TEKNIK INFORMATIKA', 1, 0, 15, '11/7/1989'),
(226, '158115186', '8115186', 'ARDHI TIRTOPAMBUDI', 'Ardhi Tirtopambudi', '5', 'STAF GBB DUYUNGAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMU - IPA', 1, 0, 15, '6/10/1981'),
(227, '158515200', '8515200', 'RULLY INDRA LAKSONO', 'Rully Indra Laksono', '5', 'STAF GBB DUYUNGAN (B) SUBDIVRE SURAKARTA DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Surakarta', '', '11/1/2015', '11/1/2015', 'SMA - IPA', 1, 0, 15, '12/27/1985'),
(228, '067706004', '7706004', 'SUGENG HARDONO , S.T', 'Sugeng Hardono', '11', 'MANAGER UB-PGB MASARAN REGIONAL IV SEMARANG', 'Manager UPGB Masaran', 'Subdivre Surakarta', '9/15/2033', '1/3/2011', '4/18/2013', 'S1 - TEKNIK MESIN', 1, 0, 15, '9/15/1977'),
(229, '128812306', '8812306', 'DICKI YUSFARINO  , S.T', 'Dicki Yusfarino', '9', 'STAF UB-PGB MASARAN REGIONAL IV SEMARANG', 'Staf UPGB Masaran', 'Subdivre Surakarta', '5/10/2044', '12/7/2012', '12/7/2012', 'S1 - TEKNIK INDUSTRI', 1, 0, 15, '5/10/1988'),
(230, '118611083', '8611083', 'KURNIA PRADIPTA , S.T', 'Kurnia Pradipta', '10', 'MANAGER UB-PGB GROGOL REGIONAL IV SEMARANG', 'Manager UPGB Grogol', 'Subdivre Surakarta', '3/9/2042', '7/1/2015', '7/1/2015', 'S1 - TEKNIK MESIN', 1, 0, 15, '3/9/1986'),
(231, '098609083', '8609083', 'ANDY NUGROHO , S.TP', 'Andy Nugroho', '10', 'MANAGER UB-PGB MOJOLABAN I,II REGIONAL IV SEMARANG', 'Manager UPGB Mojolaban', 'Subdivre Surakarta', '7/2/2042', '6/16/2014', '12/1/2015', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '7/2/1986'),
(232, '118611073', '8611073', 'BAYU GINANJAR MUKTI , S.TP', 'Bayu Ginanjar Mukti', '9', 'PETUGAS PRODUKSI UB-PGB GROGOL REGIONAL IV SEMARANG', 'Staf UPGB Grogol', 'Subdivre Surakarta', '8/6/2042', '10/1/2011', '3/15/2012', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '8/6/1986'),
(233, '780003152', '6285575', 'SETIO WASTONO , SH', 'Setio Wastono', '13', 'KEPALA SUB DIVRE BANYUMAS DIVRE JATENG', 'Kasub Banyumas', 'Subdivre Banyumas', '1/5/2018', '1/1/2011', '5/6/2015', 'S1 - HUKUM', 1, 0, 15, '1/5/1962'),
(234, '780002991', '6284189', 'PRAMONO , SH', 'Pramono', '13', '  WAKA SUBDIVRE BANYUMAS DIVRE JATENG', 'Wakasub Banyumas', 'Subdivre Banyumas', '5/25/2018', '4/1/2015', '4/1/2015', 'S1 - HUKUM PERDATA', 1, 0, 15, '5/25/1962'),
(235, '780003349', '6184174', 'MUHAMMAD AFANDI', 'Muhammad Afandi', '11', 'KEPALA SEKSI ADMINISTRASI DAN KEUANGAN SUBDIVRE BANYUMAS DIVRE JATENG', 'Kasi Minku Banyumas', 'Subdivre Banyumas', '12/11/2017', '1/2/2015', '1/2/2015', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '12/11/1961'),
(236, '098609084', '8609084', 'DEWI RAKHMAWATI , S.P', 'Dewi Rakhmawati', '10', 'KASIR SUB DIVRE BANYUMAS DIVRE JATENG', 'Kasir Sub Banyumas', 'Subdivre Banyumas', '9/7/2042', '8/1/2009', '7/23/2012', 'S1 - SOSIAL EKONOMI PERTANIAN', 1, 0, 15, '9/7/1986'),
(237, '780003014', '6186020', 'SUSI SUNARISASI', 'Susi Sunarisasi', '10', 'STAF SUB DIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '11/30/2017', '8/1/1995', '8/1/1995', 'SMK - TATA BUKU', 1, 0, 15, '11/30/1961'),
(238, '128612129', '8612129', 'EDY WIBOWO  , S.Sos', 'Edy Wibowo', '9', 'STAF SUB DIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '6/10/2042', '11/27/2012', '3/1/2014', 'S1 - ILMU ADMINISTRASI NIAGA', 1, 0, 15, '6/10/1986'),
(239, '128612305', '8612305', 'YANI KUSTRIYANTO  , S.T', 'Yani Kustriyanto', '9', 'STAF GBB, GSP PURBALINGGA, GSP KALIBALONG (A) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '1/10/2042', '12/7/2012', '12/7/2012', 'S1 - TEKNIK INDUSTRI', 1, 0, 15, '1/10/1986'),
(240, '088108565', '8108565', 'YUDHY SETYO HARYONO', 'Yudhy Setyo Haryono', '6', 'STAF SUB DIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '9/2/2037', '11/1/2008', '12/1/2009', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '9/2/1981'),
(241, '780007264', '7097242', 'NANI YULIANTI , S.SOS', 'Nani Yulianti', '12', 'KEPALA SEKSI AKUNTANSI SUBDIVRE BANYUMAS DIVRE JATENG', 'Kasi Akuntansi Banyumas', 'Subdivre Banyumas', '7/21/2026', '8/2/2010', '8/2/2010', 'S1 - ADMINISTRASI NEGARA', 1, 0, 15, '7/21/1970'),
(242, '088108637', '8108637', 'ANDINI AYU PUSPITASARI', 'Andini Ayu Puspitasari', '6', 'STAF SUB DIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '4/6/2037', '11/1/2008', '12/1/2009', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '4/6/1981'),
(243, '780006986', '6697183', 'ABDULLAH , SE', 'Abdullah', '12', 'KEPALA SEKSI PELAYANAN PUBLIK SUBDIVRE BANYUMAS DIVRE JATENG', 'Kasi PP Banyumas', 'Subdivre Banyumas', '5/15/2022', '10/17/2011', '9/1/2014', 'S1 - EKONOMI AKUNTANSI', 1, 0, 15, '5/15/1966'),
(244, '780003375', '6385578', 'WISNU PRIBADI', 'Wisnu Pribadi', '10', 'PETUGAS PERAWATAN KUALITAS SUB DIVRE BANYUMAS DIVRE JATENG', 'Petugas Perawatan', 'Subdivre Banyumas', '2/14/2019', '8/19/2008', '10/1/2009', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '2/14/1963'),
(245, '780007358', '7198017', 'R A S I W A N , SH', 'R A S I W A N', '10', 'STAF SUB DIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '1/27/2027', '3/1/1998', '3/1/1998', 'S1 - ILMU HUKUM', 1, 0, 15, '1/27/1971'),
(246, '128512234', '8512234', 'WIWIT KURNIAWAN', 'Wiwit Kurniawan', '9', 'STAF SUB DIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '11/30/2041', '12/7/2012', '11/1/2015', '', 1, 0, 15, '11/26/1985'),
(247, '780003340', '6084169', 'PUJI SULARSO , SE', 'Puji Sularso', '12', 'KEPALA SEKSI ANALISA HARGA DAN PASAR SUBDIVRE BANYUMAS DIVRE JATENG', 'Kasi Gasar Banyumas', 'Subdivre Banyumas', '11/9/2016', '3/28/2012', '3/28/2012', 'S1 - MANAJEMEN', 1, 0, 15, '11/9/1960'),
(248, '780003153', '6185566', 'M. PRIYONO , SE', 'M. Priyono', '12', 'KEPALA SEKSI PERENCANAAN DAN PENGEMBANGAN USAHA SUBDIVRE BANYUMAS DIVRE JATENG', 'Kasi PPU Banyumas', 'Subdivre Banyumas', '11/30/2017', '6/1/2009', '1/20/2011', 'S1 - MANAJEMEN', 1, 0, 15, '11/30/1961'),
(249, '087508661', '7508661', 'YANU KURNIAWAN', 'Yanu Kurniawan', '6', 'STAF SUB DIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '1/28/2031', '11/1/2008', '12/1/2009', 'SMA - A3/SOSIAL', 1, 0, 15, '1/28/1975'),
(250, '780003376', '6585589', 'HERIYANTO , SH', 'Heriyanto', '11', 'ASDIV PRATAMA II BID PERENC. DIVISI REGIONAL JATENG PERUM BULOG', 'Asdiv', 'Subdivre Banyumas', '5/25/2021', '1/20/2011', '1/2/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '5/25/1965'),
(251, '780003049', '6186002', 'MOHAMMAD USMAN', 'Mohammad Usman', '12', 'ASDIV PRATAMA I BID PEMASARAN DIVISI REGIONAL JATENG PERUM BULOG', 'Asdiv', 'Subdivre Banyumas', '11/22/2017', '1/20/2011', '1/2/2012', 'STM -  MESIN', 1, 0, 15, '11/22/1961'),
(252, '780006574', '6295717', 'TARSO , SH', 'Tarso', '11', 'KEPALA GBB GUMILIR (B) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kagud Gumilir', 'Subdivre Banyumas', '1/10/2018', '4/20/2015', '4/20/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '1/10/1962'),
(253, '128512080', '8512080', 'THEODORUS SUSILO  , S.P', 'Theodorus Susilo', '9', 'JURTIM GBB GUMILIR (B) SUBDIVRE BANYUMAS DIVRE JATENG', 'Jurtim Gumilir', 'Subdivre Banyumas', '12/27/2041', '10/10/2012', '3/18/2015', 'S1 - AGRIBISNIS', 1, 0, 15, '12/27/1985'),
(254, '158315194', '8315194', 'AGUNG BASUKI', 'Agung Basuki', '5', 'STAF GBB GUMILIR (B) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '', '11/1/2015', '11/1/2015', 'SMU - IPA', 1, 0, 15, '11/3/1983'),
(255, '118711068', '8711068', 'IKSAN KHARISMA PERMANA , S.E', 'Iksan Kharisma Permana', '10', 'KEPALA GBB SOKARAJA KULON (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kagud Sokaraja Kulon', 'Subdivre Banyumas', '7/10/2043', '4/20/2015', '4/20/2015', 'S1 - MANAJEMEN', 1, 0, 15, '7/10/1987'),
(256, '780003063', '6085561', 'EDY PURWANTO', 'Edy Purwanto', '10', 'JURTIM GBB SOKARAJA (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Jurtim Sokaraja Kulon', 'Subdivre Banyumas', '4/3/2016', '12/1/1985', '9/1/2003', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '4/3/1960'),
(257, '097209322', '7209322', 'GHOFFI  ANDYAN', 'Ghoffi  Andyan', '6', 'KERANI GBB SOKARAJA KULON (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kerani Sokaraja Kulon', 'Subdivre Banyumas', '12/16/2028', '8/5/2009', '3/18/2015', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '12/16/1972'),
(258, '097809207', '7809207', 'MAULANA SYAFIUDDIN AKBAR', 'Maulana Syafiuddin A.', '6', 'PETUGAS TU GBB SOKARAJA KULON (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Gastu Sokaraja Kulon', 'Subdivre Banyumas', '5/6/2034', '8/1/2009', '5/12/2014', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '5/6/1978'),
(259, '780003048', '6083262', 'EDI BUDIJATNO , ST', 'Edi Budijatno', '11', 'KEPALA GBB KALPAGADA (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kagud Klapagada', 'Subdivre Banyumas', '10/30/2016', '8/2/2010', '5/12/2014', 'S1 - TEKNIK MESIN', 1, 0, 15, '10/30/1960'),
(260, '780006391', '6095230', 'S U K I R N O', 'S U K I R N O', '10', 'JURTIM GBB MAOS (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Jurtim Klapagada', 'Subdivre Banyumas', '12/14/2016', '3/1/1995', '8/19/2008', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '12/14/1960'),
(261, '128912297', '8912297', 'BRAMANTIYO  , S.Si', 'Bramantiyo', '9', 'KERANI GBB KALPAGADA (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kerani Klapagada', 'Subdivre Banyumas', '9/23/2045', '12/7/2012', '5/12/2014', 'S1 - BIOLOGI', 1, 0, 15, '9/23/1989'),
(262, '158015182', '8015182', 'IMAM WAHYU HIDAYAT', 'Imam Wahyu Hidayat', '5', 'STAF GBB KALPAGADA (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '', '11/1/2015', '11/1/2015', 'SMU - IPS', 1, 0, 15, '10/6/1980'),
(263, '780007357', '7297417', 'SURYANTO', 'Suryanto', '9', 'KEPALA GBB KLAHANG (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kagud Klahang', 'Subdivre Banyumas', '10/10/2028', '4/20/2015', '4/20/2015', 'SMA - A3/SOSIAL', 1, 0, 15, '10/10/1972'),
(264, '098709210', '8709210', 'MOHAMAD ARYA YUDISTIRA', 'M. Arya Yudistira', '6', 'PETUGAS GBB KLAHANG (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '2/6/2043', '8/1/2009', '5/12/2014', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '2/6/1987'),
(265, '780003148', '6384198', 'ROHADI', 'Rohadi', '10', 'KERANI GBB KLAHANG (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kerani Klahang', 'Subdivre Banyumas', '3/10/2019', '9/1/1984', '5/12/2014', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '3/10/1963'),
(266, '158015180', '8015180', 'DEDY SURYA PRAJA', 'Dedy Surya Praja', '5', 'STAF GBB KLAHANG (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '8/17/1980'),
(267, '158215191', '8215191', 'DWI WIJI LAKSONO', 'Dwi Wiji Laksono', '5', 'STAF GBB KLAHANG (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '3/29/1982'),
(268, '780006368', '6195248', 'K A R T O N O', 'K A R T O N O', '10', 'KEPALA GBB LOMANIS (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kagud Lomanis', 'Subdivre Banyumas', '4/24/2017', '10/1/2013', '4/20/2015', 'SMK - PERTANIAN', 1, 0, 15, '4/24/1961'),
(269, '088108449', '8108449', 'THOMAS WALUYO MONTO', 'Thomas Waluyo Monto', '6', 'KERANI GBB LOMANIS (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kerani Lomanis', 'Subdivre Banyumas', '10/17/2037', '11/1/2008', '5/12/2014', 'SMA/SMK - LAIN-LAIN', 1, 0, 15, '10/17/1981'),
(270, '096909200', '6909200', 'NURDIYANTO BARKAH P.', 'Nurdiyanto Barkah P.', '6', 'JURTIM GBB LOMANIS (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Jurtim Lomanis', 'Subdivre Banyumas', '9/9/2025', '8/1/2009', '5/12/2014', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '9/9/1969'),
(271, '157815177', '7815177', 'DENY HERMAWAN', 'Deny Hermawan', '5', 'STAF GBB LOMANIS (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '9/13/1978'),
(272, '780006575', '6795723', 'WARSIADI', 'Warsiadi', '10', 'KEPALA GBB MULYADADI (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kagud Mulyadadi', 'Subdivre Banyumas', '1/7/2023', '9/1/2015', '9/1/2015', 'SMA - A3/SOSIAL', 1, 0, 15, '1/7/1967'),
(273, '088108708', '8108708', 'ACHMAD ISMAIL', 'Achmad Ismail', '6', 'JURTIM GBB MAJENANG (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Jurtim Mulyadadi', 'Subdivre Banyumas', '6/22/2037', '11/1/2008', '11/1/2008', 'SMK - ELEKTRO', 1, 0, 15, '6/22/1981'),
(274, '088008586', '8008586', 'ANGGUN HENDRO JATMIKO', 'Anggun Hendro J.', '6', 'PETUGAS TU GBB GUMILIR (B) SUBDIVRE BANYUMAS DIVRE JATENG', 'Gastu Mulyadadi', 'Subdivre Banyumas', '3/25/2036', '11/1/2008', '3/15/2012', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '3/25/1980'),
(275, '158515198', '8515198', 'ISWORO GONDO KUSUMO', 'Isworo Gondo K.', '5', 'STAF GBB MULYADADI (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '9/29/1985'),
(276, '780006369', '6695265', 'SETIA BUDI , SE', 'Setia Budi', '10', 'KEPALA GBB PURWONEGORO (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kagud Purwonegoro', 'Subdivre Banyumas', '3/23/2022', '1/2/2015', '1/2/2015', 'S1 - MANAJEMEN PERUSAHAAN', 1, 0, 15, '3/23/1966'),
(277, '087608681', '7608681', 'SOFYAN AFANDI', 'Sofyan Afandi', '6', 'KERANI GBB PURWONEGORO (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kerani Purwonegoro', 'Subdivre Banyumas', '1/26/2032', '11/1/2008', '5/12/2014', 'SMA - A2/BIOLOGI', 1, 0, 15, '1/26/1976'),
(278, '097909326', '7909326', 'SIGIT HARTONO', 'Sigit Hartono', '6', 'JURTIM GBB PURWONEGORO (C) SUBDIVRE BANYUMAS DIVRE JATENG', 'Jurtim Purwonegoro', 'Subdivre Banyumas', '10/14/2035', '8/5/2009', '5/12/2014', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '10/14/1979'),
(279, '780003006', '6285574', 'PUJO PRIYONO', 'Pujo Priyono', '12', 'KEPALA GBB, GSP KARANGSENTUL, GSP KALIBALONG (A) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kagud Karangsentul', 'Subdivre Banyumas', '12/17/2018', '5/7/2012', '10/1/2015', 'SMK - PERTANIAN', 1, 0, 15, '12/17/1962'),
(280, '780003299', '6083266', 'BAMBANG PRIYADI R.', 'Bambang Priyadi R.', '11', 'JURTIM GBB, GSP PURBALINGGA, GSP KALIBALONG (A) SUBDIVRE BANYUMAS DIVRE JATENG', 'Jurtim Karangsentul', 'Subdivre Banyumas', '2/12/2016', '8/1/1988', '3/15/2012', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '2/12/1960'),
(281, '780007325', '7298030', 'R U B I Y A H', 'R U B I Y A H', '10', 'KERANI GBB, GSP KARANGSENTUL, GSP KALIBALONG (A) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kerani Karangsentul', 'Subdivre Banyumas', '12/7/2028', '3/1/1998', '5/12/2014', 'D3 - KEOLAHRAGAAN', 1, 0, 15, '12/7/1972'),
(282, '780006571', '6095722', 'SUKEDI', 'Sukedi', '10', 'STAF SUB DIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '5/29/2016', '3/1/1995', '9/30/2011', 'SMK - MESIN LISTRIK', 1, 0, 15, '5/29/1960'),
(283, '780003208', '6384202', 'SLAMET WIDODO', 'Slamet Widodo', '12', 'KEPALA GBB CINDAGA (B) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kagud Cindaga', 'Subdivre Banyumas', '1/1/2019', '5/3/2010', '6/18/2014', 'STM -  MESIN', 1, 0, 15, '1/1/1963'),
(284, '780003086', '6183272', 'IMAM PRAMONO , SE', 'Imam Pramono', '12', 'JURTIM GBB CINDAGA (B) SUBDIVRE BANYUMAS DIVRE JATENG', 'Jurtim Cindaga', 'Subdivre Banyumas', '2/6/2017', '1/7/2004', '1/4/2008', 'S1 - MANAJEMEN', 1, 0, 15, '2/6/1961'),
(285, '128512054', '8512054', 'MASY ''ARILHARAM  , S.TP', 'Masy ''Arilharam', '9', 'KERANI GBB CINDAGA (B) SUBDIVRE BANYUMAS DIVRE JATENG', 'Kerani Cindaga', 'Subdivre Banyumas', '10/12/2041', '10/10/2012', '3/18/2015', 'S1 - TEKNOLOGI PANGAN & HASIL PERTANIAN', 1, 0, 15, '10/12/1985'),
(286, '157715172', '1577151', 'ADI HADYANTO', 'Adi Hadyanto', '5', 'STAF GBB CINDAGA (B) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '', '11/1/2015', '11/1/2015', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '7/3/1977'),
(287, '158515195', '8515195', 'JUMANI', 'Jumani', '5', 'STAF GBB CINDAGA (B) SUBDIVRE BANYUMAS DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Banyumas', '', '11/1/2015', '11/1/2015', 'SMK - TEKNIK ELEKTRO', 1, 0, 15, '1/18/1985'),
(288, '780003181', '6085559', 'DIDIK JUNAEDI , SH', 'Didik Junaedi', '12', 'MANAGER UB-PGB GUMILIR REGIONAL IV SEMARANG', 'Manager UPGB Gumilir', 'Subdivre Banyumas', '9/4/2016', '7/5/2007', '7/5/2007', 'S1 - ILMU HUKUM', 1, 0, 15, '9/4/1960'),
(289, '128812035', '8812035', 'FERDY BUDHI WINATA  , S.P', 'Ferdy Budhi Winata', '9', 'STAF UB-PGB GUMILIR REGIONAL IV SEMARANG', 'Staf UPGB Gumilir', 'Subdivre Banyumas', '9/2/2044', '10/10/2012', '10/10/2012', 'S1 - BUDIDAYA PERTANIAN', 1, 0, 15, '9/2/1988'),
(290, '088308032', '8308032', 'YOGI PRASETYA , S.TP', 'Yogi Prasetya', '10', 'MANAGER UB-PGB KLAHANG REGIONAL IV SEMARANG', 'Manager UPGB Klahang', 'Subdivre Banyumas', '7/31/2039', '11/1/2012', '11/1/2012', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '7/31/1983'),
(291, '128812292', '8812292', 'WINDU PISAH GUNTARA', 'Windu Pisah Guntara', '7', 'STAF UB-PGB KLAHANG REGIONAL IV SEMARANG', 'Staf UPGB Klahang', 'Subdivre Banyumas', '4/15/2044', '12/7/2012', '3/1/2014', 'D3 - AKUNTANSI', 1, 0, 15, '4/15/1988'),
(292, '098509082', '8509082', 'PRAWOKO SETYO AJI , S.TP', 'Prawoko Setyo Aji', '10', 'MANAGER UB-PGB LOMANIS REGIONAL IV SEMARANG', 'Manager UPGB Lomanis', 'Subdivre Banyumas', '4/26/2041', '12/2/2013', '12/2/2013', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '4/26/1985'),
(293, '118911069', '8911069', 'SUTRISNO , S.E', 'Sutrisno', '10', 'PETUGAS MINKU UB-PGB LOMANIS REGIONAL IV SEMARANG', 'Staf Minku UPGB Lomanis', 'Subdivre Banyumas', '9/28/2045', '10/1/2011', '3/15/2012', 'S1 - AKUNTANSI', 1, 0, 15, '9/28/1989'),
(294, '780005066', '6085346', 'SAEDI', 'Saedi', '11', 'MANAGER UB-PGB PURBALINGGA REGIONAL IV SEMARANG', 'Manager UPGB Purbalingga', 'Subdivre Banyumas', '2/1/2016', '1/20/2011', '1/20/2011', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '2/1/1960'),
(295, '128912067', '8912067', 'PRADISYA KRISYANDO  , S.P', 'Pradisya Krisyando', '9', 'STAF UB-PGB PURBALINGGA REGIONAL IV SEMARANG', 'Staf UPGB Purbalingga', 'Subdivre Banyumas', '7/28/2045', '10/10/2012', '3/1/2014', 'S1 - AGRONOMI', 1, 0, 15, '7/28/1989'),
(296, '780007028', '6897266', 'MUHAMMAD IMRON ROSIDI , SE', 'M. Imron Rosidi', '13', 'KEPALA SUB DIVRE KEDU DIVRE JATENG', 'Kasub Kedu', 'Subdivre Kedu', '2/18/2024', '9/1/2012', '5/6/2015', 'S1 - EKONOMI AKUNTANSI', 1, 0, 15, '2/18/1968'),
(297, '780007260', '7097235', 'R U W A J I , SP', 'R U W A J I', '13', '  WAKA SUBDIVRE KEDU DIVRE JATENG', 'Wakasub Kedu', 'Subdivre Kedu', '10/3/2026', '4/1/2013', '7/1/2014', 'S1 - EKONOMI PERTANIAN', 1, 0, 15, '10/3/1970'),
(298, '780006818', '7395861', 'SRI REJEKI LESTARI Y , SE, AKT', 'Sri Rejeki Lestari Y', '12', 'KEPALA SEKSI ADMINISTRASI DAN KEUANGAN SUBDIVRE KEDU DIVRE JATENG', 'Kasi Minku Kedu', 'Subdivre Kedu', '7/4/2029', '9/1/2004', '11/7/2011', 'S1 - AKUNTANSI', 1, 0, 15, '7/4/1973'),
(299, '780006576', '6495719', 'SUMARDI', 'Sumardi', '10', 'STAF SUB DIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '7/4/2020', '11/1/1997', '11/1/1997', 'STM -  MESIN', 1, 0, 15, '7/4/1964'),
(300, '087808747', '7808747', 'RIDWAN DWIYOTO', 'Ridwan Dwiyoto', '6', 'KASIR SUB DIVRE KEDU DIVRE JATENG', 'Kasir Sub Kedu', 'Subdivre Kedu', '1/23/2034', '11/1/2008', '11/7/2011', 'SMA - ILMU-ILMU FISIK', 1, 0, 15, '1/23/1978'),
(301, '088308469', '8308469', 'BAMBANG KASIADI', 'Bambang Kasiadi', '6', 'STAF SUB DIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '4/9/2039', '11/1/2008', '12/1/2009', 'SMK - AKUNTANSI', 1, 0, 15, '4/9/1983'),
(302, '780003258', '6685591', 'YANUARINI , BA', 'Yanuarini', '12', 'KEPALA SEKSI AKUNTANSI SUBDIVRE KEDU DIVRE JATENG', 'Kasi Akuntansi Kedu', 'Subdivre Kedu', '1/24/2022', '11/7/2011', '11/7/2011', 'S1 - KEUANGAN DAN PERBANKAN', 1, 0, 15, '1/24/1966'),
(303, '780003303', '6083719', 'Y. AGUS HARYONO', 'Y. Agus Haryono', '12', 'KEPALA SEKSI PELAYANAN PUBLIK SUBDIVRE KEDU DIVRE JATENG', 'Kasi PP Kedu', 'Subdivre Kedu', '11/10/2016', '6/21/2004', '4/18/2013', 'STM -  MESIN', 1, 0, 15, '11/10/1960'),
(304, '780003074', '6284185', 'SULASIH', 'Sulasih', '10', 'STAF SUB DIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '2/5/2018', '9/1/1984', '9/1/1984', 'SMK - TATA PERUSAHAAN', 1, 0, 15, '2/5/1962'),
(305, '780001396', '6080072', 'MULYANTO', 'Mulyanto', '10', 'PETUGAS PERAWATAN KUALITAS SUB DIVRE KEDU DIVRE JATENG', 'Petugas Perawatan', 'Subdivre Kedu', '1/3/2016', '10/1/2001', '8/1/2011', 'SMK - TATA USAHA', 1, 0, 15, '1/3/1960'),
(306, '087208453', '7208453', 'AYIK TRI HATMOKO', 'Ayik Tri Hatmoko', '6', 'STAF SUB DIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '11/18/2028', '11/1/2008', '9/1/2014', 'SMA/SMK - LAIN-LAIN', 1, 0, 15, '11/18/1972'),
(307, '780006363', '6595239', 'RIF''AN', 'Rif''An', '10', 'STAF SUB DIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '8/8/2021', '3/1/1995', '3/18/2015', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '8/8/1965'),
(308, '780002925', '6284194', 'BOGI WAHYOKO', 'Bogi Wahyoko', '12', 'KEPALA SEKSI ANALISA HARGA DAN PASAR SUBDIVRE KEDU DIVRE JATENG', 'Kasi Gasar Kedu', 'Subdivre Kedu', '4/25/2018', '2/1/2011', '4/20/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '4/25/1962'),
(309, '780006388', '6495257', 'A R M O N O', 'A R M O N O', '10', 'STAF SUB DIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '10/20/2020', '3/1/1995', '3/18/2015', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '10/20/1964'),
(310, '780003095', '6285571', 'ELANG TJAHJO SUMPENO', 'Elang Tjahjo Sumpeno', '11', 'KEPALA SEKSI PERENCANAAN DAN PENGEMBANGAN USAHA SUBDIVRE KEDU DIVRE JATENG', 'Kasi PPU Kedu', 'Subdivre Kedu', '2/7/2018', '3/7/2011', '4/18/2013', 'SMA - BAHASA', 1, 0, 15, '2/7/1962'),
(311, '098609337', '8609337', 'SUSKERTA WIJAYA', 'Suskerta Wijaya', '6', 'STAF SUB DIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '6/10/2042', '8/5/2009', '12/1/2010', 'SMA', 1, 0, 15, '6/10/1986'),
(312, '087208778', '7208778', 'TRI GUNANTO', 'Tri Gunanto', '6', 'STAF SUB DIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '1/17/2028', '11/1/2008', '12/1/2009', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '1/17/1972'),
(313, '097909209', '7909209', 'ARIE RIDHAWATI', 'Arie Ridhawati', '6', 'STAF SUB DIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '10/9/2035', '8/1/2009', '3/18/2015', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '10/9/1979'),
(314, '780003209', '6084171', 'S U P R A P T O', 'S U P R A P T O', '12', 'ASDIV PRATAMA I BID PEMASARAN. DIVISI REGIONAL JATENG PERUM BULOG', 'Asdiv', 'Subdivre Kedu', '1/6/2016', '10/9/2008', '10/1/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '1/6/1960'),
(315, '780003231', '6083715', 'S U R I P', 'S U R I P', '12', 'KEPALA GBB DANUREJO, GBL/GSP SECANG (B) SUBDIVRE KEDU DIVRE JATENG', 'Kagud Danurejo', 'Subdivre Kedu', '7/24/2016', '1/2/2015', '1/2/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '7/24/1960'),
(316, '087008772', '7008772', 'BAMBANG MARGONO', 'Bambang Margono', '6', 'JURTIM GBB DANUREJO, GBL/GSP SECANG (B) SUBDIVRE KEDU DIVRE JATENG', 'Jurtim Danurejo', 'Subdivre Kedu', '2/3/2026', '11/1/2008', '3/18/2015', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '2/3/1970'),
(317, '780006397', '6395236', 'Y U L I A N T O , SE', 'Y U L I A N T O', '10', 'KERANI GBB DANUREJO, GBL/GSP SECANG (B) SUBDIVRE KEDU DIVRE JATENG', 'Kerani Danurejo', 'Subdivre Kedu', '2/12/2019', '8/19/2008', '3/18/2015', 'S1 - MANAJEMEN PERUSAHAAN', 1, 0, 15, '2/12/1963'),
(318, '158715205', '8715205', 'WAHYU PINANDITO', 'Wahyu Pinandito', '5', 'STAF GBB DANUREJO, GBL/GSP SECANG (B) SUBDIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '', '11/1/2015', '11/1/2015', 'SMA - IPS', 1, 0, 15, '11/9/1987'),
(319, '780003155', '6485582', 'SIS EDY SANTOSO', 'Sis Edy Santoso', '10', 'KEPALA GBB SELANG (C) SUBDIVRE KEDU DIVRE JATENG', 'Kagud Selang', 'Subdivre Kedu', '1/26/2020', '12/1/1985', '10/1/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '1/26/1964'),
(320, '128912300', '8912300', 'TITAN PRISTIANTO  , S.E', 'Titan Pristianto', '9', 'PETUGAS TU GBB SELANG (C) SUBDIVRE KEDU DIVRE JATENG', 'Gastu Selang', 'Subdivre Kedu', '2/19/2045', '12/7/2012', '3/18/2015', 'S1 - ILMU EKONOMI DAN STUDI PEMBANGUNAN', 1, 0, 15, '2/19/1989'),
(321, '097409323', '7409323', 'SIDIK SUGIHARTO', 'Sidik Sugiharto', '6', 'JURTIM GBB KEBUMEN (C) SUBDIVRE KEDU DIVRE JATENG', 'Jurtim Selang', 'Subdivre Kedu', '7/15/2030', '8/5/2009', '6/17/2013', 'SMA - ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '7/15/1974'),
(322, '158115187', '8115187', 'EDI SANTOSO', 'Edi Santoso', '5', 'STAF GBB SELANG (C) SUBDIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '', '11/1/2015', '11/1/2015', '', 1, 0, 15, '7/27/2015'),
(323, '780002898', '6284193', 'SUGENG RIYANTO DRS.', 'Sugeng Riyanto', '12', 'KEPALA GBB BENGKAL (B) SUBDIVRE KEDU DIVRE JATENG', 'Kagud Bengkal', 'Subdivre Kedu', '3/22/2018', '1/6/2006', '10/1/2015', 'S1 - ILMU ADMINISTRASI', 1, 0, 15, '3/22/1962'),
(324, '780003382', '6084172', 'WICAKSONO B', 'Wicaksono B', '10', 'PETUGAS TU GBB TEMANGGUNG (B) SUBDIVRE KEDU DIVRE JATENG', 'Gastu Bengkal', 'Subdivre Kedu', '12/22/2016', '9/1/1984', '3/15/2012', 'SMK - TATA NIAGA', 1, 0, 15, '12/22/1960'),
(325, '088008577', '8008577', 'INDRA BAYU PUTRA', 'Indra Bayu Putra', '6', 'JURTIM GBB TEMANGGUNG (B) SUBDIVRE KEDU DIVRE JATENG', 'Jurtim Bengkal', 'Subdivre Kedu', '10/29/2036', '11/1/2008', '3/15/2012', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '10/29/1980'),
(326, '158115183', '8115183', 'EKO SETIAWAN', 'Eko Setiawan', '5', 'STAF GBB BENGKAL (B) SUBDIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '', '11/1/2015', '11/1/2015', 'SMK - BISNIS DAN MANAJEMEN', 1, 0, 15, '1/9/1981'),
(327, '158115184', '8115184', 'RAGIL SUDARMONO', 'Ragil Sudarmono', '5', 'STAF GBB BENGKAL (B) SUBDIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '', '11/1/2015', '11/1/2015', 'SMK - TEKNOLOGI DAN INDUSTRI', 1, 0, 15, '2/6/1981'),
(328, '158915207', '8915207', 'PURNOMO', 'Purnomo', '5', 'STAF GBB BENGKAL (B) SUBDIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '', '11/1/2015', '11/1/2015', 'SMA', 1, 0, 15, '2/6/1989'),
(329, '118711087', '8711087', 'MUHAMMAD ZAENAL MUTTAQIN , S.H', 'M. Zaenal Muttaqin', '10', 'KEPALA GBB SAWANGAN (C) SUBDIVRE KEDU DIVRE JATENG', 'Kagud Sawangan', 'Subdivre Kedu', '1/21/2043', '10/1/2011', '10/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '1/21/1987'),
(330, '780006581', '6095724', 'SOHIRIN', 'Sohirin', '10', 'JURTIM GBB SAWANGAN (C) SUBDIVRE KEDU DIVRE JATENG', 'Jurtim Sawangan', 'Subdivre Kedu', '3/7/2016', '3/1/1995', '3/18/2015', 'STM -  MESIN', 1, 0, 15, '3/7/1960'),
(331, '780006577', '6895731', 'WASIS SRI HANDOYO', 'Wasis Sri Handoyo', '10', 'KERANI GBB WONOSOBO (C) SUBDIVRE KEDU DIVRE JATENG', 'Kerani Sawangan', 'Subdivre Kedu', '2/24/2024', '3/1/1995', '9/1/2003', 'SMK - PERTANIAN', 1, 0, 15, '2/24/1968'),
(332, '158115185', '8115185', 'JAMAL WAHYUDI', 'Jamal Wahyudi', '5', 'STAF GBB SAWANGAN (C) SUBDIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '', '11/1/2015', '11/1/2015', 'SMK - OTOMOTIF', 1, 0, 15, '4/18/1981'),
(333, '067806006', '7806006', 'MOH.WIDASA WISNU WARDHONO , S.E', 'M.Widasa Wisnu W.', '11', 'KEPALA GBB BUTUH (A) SUBDIVRE KEDU DIVRE JATENG', 'Kagud Butuh', 'Subdivre Kedu', '2/22/2034', '5/12/2014', '10/1/2015', 'S1 - EKONOMI MANAJEMEN', 1, 0, 15, '2/22/1978'),
(334, '780006362', '6295238', 'EDY KUNCORO', 'Edy Kuncoro', '10', 'JURTIM GBB BUTUH (A) SUBDIVRE KEDU DIVRE JATENG', 'Jurtim Butuh', 'Subdivre Kedu', '8/6/2018', '3/1/1995', '3/15/2012', 'SMK - PERBENDAHARAAN DAN KAS', 1, 0, 15, '8/6/1962'),
(335, '087808746', '7808746', 'ANAS HERY KURNIAWAN', 'Anas Hery Kurniawan', '6', 'KERANI GBB BUTUH (A) SUBDIVRE KEDU DIVRE JATENG', 'Kerani Butuh', 'Subdivre Kedu', '7/3/2034', '11/1/2008', '3/15/2012', 'SMA - ILMU-ILMU FISIK', 1, 0, 15, '7/3/1978'),
(336, '158615202', '8615202', 'HERU PURWANTO', 'Heru Purwanto', '5', 'STAF GBB BUTUH (A) SUBDIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '', '11/1/2015', '11/1/2015', 'SMK - PERTANIAN', 1, 0, 15, '12/16/1986'),
(337, '158815206', '8815206', 'FENDRAYANA RACHMA', 'Fendrayana Rachma', '5', 'STAF GBB BUTUH (A) SUBDIVRE KEDU DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Kedu', '', '11/1/2015', '11/1/2015', 'SMA - IPA', 1, 0, 15, '2/25/1988'),
(338, '098609070', '8609070', 'ANDRIKA FITRI YUNIANTO , S.TP', 'Andrika Fitri Yunianto', '10', 'MANAGER UB-PGB KEBUMEN REGIONAL IV SEMARANG', 'Manager UPGB Kebumen', 'Subdivre Kedu', '6/5/2042', '4/18/2013', '4/18/2013', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '6/5/1986'),
(339, '780003067', '6183271', 'SUDIRMAN', 'Sudirman', '12', 'MANAGER UB-PGB PURWOREJO REGIONAL IV SEMARANG', 'Manager UPGB Purworejo', 'Subdivre Kedu', '6/5/2017', '3/9/2007', '3/9/2007', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '6/5/1961'),
(340, '128712012', '8712012', 'ARDI PRIAMBODO  , S.P', 'Ardi Priambodo', '9', 'STAF UB-PGB PURWOREJO REGIONAL IV SEMARANG', 'Staf UPGB Kebumen', 'Subdivre Kedu', '4/6/2043', '10/10/2012', '10/10/2012', 'S1 - BUDIDAYA PERTANIAN', 1, 0, 15, '4/6/1987'),
(341, '780002890', '6385577', 'ISMOYO DWI DJANTORO , SH', 'Ismoyo Dwi Djantoro', '13', 'KEPALA SUB DIVRE PEKALONGAN DIVRE JATENG', 'Kasub Pekalongan', 'Subdivre Pekalongan', '4/17/2019', '7/8/2013', '5/6/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '4/17/1963'),
(342, '780001842', '6485484', 'SULAIS , SE', 'Sulais', '12', '  WAKA SUBDIVRE PEKALONGAN DIVRE JATENG', 'Wakasub Pekalongan', 'Subdivre Pekalongan', '5/3/2020', '9/9/2015', '9/9/2015', 'S1 - MANAJEMEN', 1, 0, 15, '5/3/1964'),
(343, '780006953', '6797061', 'SITI KOTIJAH , SP', 'Siti Kotijah', '12', 'KEPALA SEKSI ADMINISTRASI DAN KEUANGAN SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kasi Minku Pekalongan', 'Subdivre Pekalongan', '7/26/2023', '8/6/2008', '11/7/2011', 'S1 - HAMA DAN PENYAKIT TANAMAN', 1, 0, 15, '7/26/1967'),
(344, '129012199', '9012199', 'OLIVIA RIZKA AMALIA  , S.AB', 'Olivia Rizka Amalia', '9', 'KASIR SUB DIVRE PEKALONGAN DIVRE JATENG', 'Kasir Sub Pekalongan', 'Subdivre Pekalongan', '6/3/2046', '11/27/2012', '3/18/2015', 'S1 - ILMU ADMINISTRASI BISNIS', 1, 0, 15, '6/3/1990'),
(345, '780003104', '6284184', 'FARCHANAH ZAINI', 'Farchanah Zaini', '10', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '2/13/2018', '4/1/1996', '4/1/1996', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '2/13/1962'),
(346, '780003293', '6083101', 'ROCHMADJI. JA', 'Rochmadji. Ja', '10', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '12/10/2016', '1/1/1983', '1/1/1983', 'SMK - MESIN LISTRIK', 1, 0, 15, '12/10/1960'),
(347, '780003378', '6283727', 'ALI MUBAROK', 'Ali Mubarok', '10', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '2/1/2018', '8/1/1997', '8/19/2008', 'STM - BANGUNAN GEDUNG', 1, 0, 15, '2/1/1962'),
(348, '780007020', '6997246', 'SRI HANDAYANI', 'Sri Handayani', '10', 'KEPALA SEKSI AKUNTANSI SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kasi Akuntansi Pekalongan', 'Subdivre Pekalongan', '8/3/2025', '11/7/2011', '11/7/2011', 'D3 - AKUNTANSI', 1, 0, 15, '8/3/1969'),
(349, '087608735', '7608735', 'TRISTIANA', 'Tristiana', '6', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '7/20/2032', '11/1/2008', '3/18/2015', 'SMA - ILMU-ILMU BIOLOGI', 1, 0, 15, '7/20/1976'),
(350, '780003287', '6384204', 'SLAMET', 'Slamet', '12', 'KEPALA SEKSI PELAYANAN PUBLIK SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kasi PP Pekalongan', 'Subdivre Pekalongan', '9/11/2019', '9/1/2004', '11/7/2011', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '9/11/1963'),
(351, '780003123', '6183721', 'TRISNO SISWOYO', 'Trisno Siswoyo', '10', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '7/12/2017', '8/1/1997', '3/15/2012', 'STM -  MESIN', 1, 0, 15, '7/12/1961'),
(352, '780003234', '6384200', 'PAULUS EKO RAHARDJO', 'Paulus Eko R.', '10', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '7/4/2019', '5/1/1990', '10/1/2011', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '7/4/1963'),
(353, '780006406', '6695274', 'RAHMAT SETIADI', 'Rahmat Setiadi', '10', 'KERANI GBB MUNJUNG AGUNG (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kerani Munjung Agung', 'Subdivre Pekalongan', '9/2/2022', '3/1/1995', '3/18/2015', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '9/2/1966'),
(354, '087408774', '7408774', 'SAMSU RIZAL', 'Samsu Rizal', '6', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '7/13/2030', '11/1/2008', '12/1/2009', 'SMA - ILMU-ILMU SOSIAL', 1, 0, 15, '7/13/1974'),
(355, '087708733', '7708733', 'SUSMIAR BETTA MARDANI', 'Susmiar Betta M.', '6', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '3/5/2033', '11/1/2008', '3/18/2015', 'SMA - ILMU-ILMU BIOLOGI', 1, 0, 15, '3/5/1977'),
(356, '088308635', '8308635', 'DONNY AJI SETIAWAN', 'Donny Aji Setiawan', '6', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '1/1/2039', '11/1/2008', '12/1/2009', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '1/1/1983'),
(357, '087808742', '7808742', 'IMAM  SENOAJI', 'Imam  Senoaji', '6', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '3/30/2034', '11/1/2008', '12/1/2009', 'SMA - ILMU-ILMU FISIK', 1, 0, 15, '3/30/1978'),
(358, '088208556', '8208556', 'YUDHA OKTORI SETYADI', 'Yudha Oktori Setyadi', '6', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '10/31/2038', '11/1/2008', '10/1/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '10/31/1982'),
(359, '780003103', '6284192', 'AGUS SYAHYUTI', 'Agus Syahyuti', '12', 'KEPALA SEKSI ANALISA HARGA DAN PASAR SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kasi Gasar Pekalongan', 'Subdivre Pekalongan', '5/19/2018', '7/1/2015', '7/1/2015', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '5/19/1962'),
(360, '780006416', '6395641', 'S U G I Y O N O', 'S U G I Y O N O', '10', 'STAF UB-PGB CIMOHONG REGIONAL IV SEMARANG', 'Staf UPGB Cimohong', 'Subdivre Pekalongan', '8/18/2019', '3/1/1994', '8/19/2008', 'SEKOLAH MENENGAH EKONOMI ATAS', 1, 0, 15, '8/18/1963'),
(361, '780003170', '6184182', 'MARWOKO', 'Marwoko', '11', 'KEPALA SEKSI PERENCANAAN DAN PENGEMBANGAN USAHA SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kasi PPU Pekalongan', 'Subdivre Pekalongan', '4/15/2017', '1/2/2015', '1/2/2015', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '4/15/1961'),
(362, '780003229', '6484210', 'TONI EKARIANTO', 'Toni Ekarianto', '12', 'KEPALA GBB MUNJUNG AGUNG (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kagud Munjung Agung', 'Subdivre Pekalongan', '11/9/2020', '1/12/2009', '10/1/2015', 'SEKOLAH MENENGAH ATAS', 1, 0, 15, '11/9/1964'),
(363, '780003205', '6084260', 'HERDI MARYONO', 'Herdi Maryono', '10', 'JURTIM GBB LARANGAN (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Jurtim Munjung Agung', 'Subdivre Pekalongan', '5/18/2016', '10/1/1984', '8/1/2011', 'STM -  MESIN', 1, 0, 15, '5/18/1960'),
(364, '780006367', '6595263', 'YOYO MURDIOKO', 'Yoyo Murdioko', '10', 'KERANI GBB LARANGAN (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kerani Munjung Agung', 'Subdivre Pekalongan', '5/27/2021', '3/1/1995', '3/16/2009', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '5/27/1965'),
(365, '780003201', '6083263', 'AGUS NUGROHO', 'Agus Nugroho', '7', 'STAF SUB DIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '8/24/2016', '8/1/1995', '4/1/2003', 'SEKOLAH MENENGAH PERTAMA', 1, 0, 15, '8/24/1960'),
(366, '780006404', '6395267', 'SUDARSONO , SE', 'Sudarsono', '10', 'KEPALA GBB PROCOT (C) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kagud Procot', 'Subdivre Pekalongan', '3/21/2019', '4/20/2015', '4/20/2015', 'S1 - MANAJEMEN', 1, 0, 15, '3/21/1963'),
(367, '780003079', '6183722', 'C H A F I F I', 'C H A F I F I', '10', 'PETUGAS TU GBB PROCOT (C) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Gastu Procot', 'Subdivre Pekalongan', '7/12/2017', '5/1/1983', '3/15/2012', 'STM -  MESIN', 1, 0, 15, '7/12/1961'),
(368, '780003269', '6183725', 'TOTO MUHARTO', 'Toto Muharto', '10', 'PETUGAS TU GBB CIMOHONG (B) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Gastu Procot', 'Subdivre Pekalongan', '10/21/2017', '5/1/1983', '5/18/2009', 'SEKOLAH TEKNIK MENENGAH', 1, 0, 15, '10/21/1961'),
(369, '158115190', '8115190', 'BURHANI RIDLWAN', 'Burhani Ridlwan', '5', 'STAF GBB PROCOT (C) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '', '11/1/2015', '11/1/2015', 'SMA', 1, 0, 15, '1/5/1982'),
(370, '780003206', '6484208', 'SUYOTO , SH', 'Suyoto', '12', 'KEPALA GBB WIRADESA (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kagud Wiradesa', 'Subdivre Pekalongan', '4/26/2020', '1/2/2009', '10/1/2015', 'S1 - ILMU HUKUM', 1, 0, 15, '4/26/1964'),
(371, '780007170', '7197251', 'MUHAMMAD ARIEF BUDIMAN L.', 'M. Arief Budiman L.', '9', 'PETUGAS TU GBB WIRADESA (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Gastu Wiradesa', 'Subdivre Pekalongan', '12/13/2027', '3/1/1997', '9/1/2003', 'SMA - A3/SOSIAL', 1, 0, 15, '12/13/1971'),
(372, '780006389', '6295264', 'ADANG SUGANDA', 'Adang Suganda', '10', 'JURTIM GBB WIRADESA (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Jurtim Wiradesa', 'Subdivre Pekalongan', '8/16/2018', '8/1/1997', '8/1/1997', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '8/16/1962'),
(373, '157715173', '7715173', 'M. JAMAL ABIDIN', 'M. Jamal Abidin', '5', 'STAF GBB SILO BODAN SARI (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '', '11/1/2015', '11/1/2015', 'SMK - TEKNOLOGI DAN INDUSTRI', 1, 0, 15, '10/6/1977'),
(374, '157715175', '7715175', 'NURHESTIN', 'Nurhestin', '5', 'STAF GBB SILO BODAN SARI (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '', '11/1/2015', '11/1/2015', 'SMU', 1, 0, 15, '10/15/1977'),
(375, '780003110', '6384205', 'SOLIKIN , SH', 'Solikin', '12', 'KEPALA GBB KEDUNGKELOR (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kagud Kedungkelor', 'Subdivre Pekalongan', '2/2/2019', '7/21/2003', '5/4/2015', 'S1 - HUKUM KEPERDATAAN', 1, 0, 15, '2/2/1963'),
(376, '780002458', '6183021', 'SUGIARTO', 'Sugiarto', '10', 'KERANI GBB BABADAN (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kerani Babadan', 'Subdivre Pekalongan', '6/25/2017', '8/1/1983', '9/1/2003', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '6/25/1961'),
(377, '780006361', '6395269', 'BAMBANG SURYANTO', 'Bambang Suryanto', '10', 'KERANI GBB BABADAN (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kerani Babadan', 'Subdivre Pekalongan', '3/14/2019', '3/1/1995', '4/9/2007', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '3/14/1963'),
(378, '780006614', '6495737', 'TARNO', 'Tarno', '10', 'KERANI GBB KEDUNGKELOR (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kerani Kedungkelor', 'Subdivre Pekalongan', '4/26/2020', '3/1/1995', '3/18/2015', 'SMK - TATA NIAGA', 1, 0, 15, '4/26/1964'),
(379, '088308542', '8308542', 'SISWOKO', 'Siswoko', '6', 'JURTIM GBB BABADAN (A) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Jurtim Babadan', 'Subdivre Pekalongan', '10/30/2039', '11/1/2008', '3/15/2012', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '10/30/1983'),
(380, '780003226', '6184179', 'NGATIMIN', 'Ngatimin', '12', 'KEPALA GBB CIMOHONG (B) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kagud Cimohong', 'Subdivre Pekalongan', '8/6/2017', '4/20/2015', '4/20/2015', 'SEKOLAH TEKNIK MENENGAH', 1, 0, 15, '8/6/1961'),
(381, '780006364', '6695268', 'SUGENG RIYADI', 'Sugeng Riyadi', '10', 'KERANI GBB CIMOHONG (B) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kerani Cimohong', 'Subdivre Pekalongan', '1/24/2022', '3/1/1995', '11/1/2005', 'SMK - TATA BUKU', 1, 0, 15, '1/24/1966'),
(382, '158515199', '8515199', 'SINGGIH PRASETYO', 'Singgih Prasetyo', '5', 'STAF GBB CIMOHONG (B) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '', '11/1/2015', '11/1/2015', 'SMA - IPS', 1, 0, 15, '10/23/1985'),
(383, '780003084', '6384261', 'MUHYONO', 'Muhyono', '10', 'KEPALA GBB KANDEMAN (C) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Kagud Kandeman', 'Subdivre Pekalongan', '8/12/2019', '10/1/2013', '4/20/2015', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '8/12/1963'),
(384, '780003341', '6283729', 'TRI PURWANTO', 'Tri Purwanto', '10', 'PETUGAS TU GBB BATANG (C) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Gastu Kandeman', 'Subdivre Pekalongan', '6/6/2018', '5/1/1983', '8/19/2008', 'SMK - TATA NIAGA', 1, 0, 15, '6/6/1962'),
(385, '780006630', '6495736', 'BAMBANG SUGENG', 'Bambang Sugeng', '10', 'JURTIM GBB BATANG (C) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Jurtim Kandeman', 'Subdivre Pekalongan', '11/20/2020', '3/1/1995', '6/17/2013', 'SMA - IPA/ILMU PENGETAHUAN ALAM', 1, 0, 15, '11/20/1964'),
(386, '780003100', '6183726', 'KRISTIONO , SE', 'Kristiono', '11', 'STAF GBB KANDEMAN (C) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '10/25/2017', '8/1/1997', '9/1/2014', 'S1 - MANAJEMEN', 1, 0, 15, '10/25/1961'),
(387, '157715172', '7715172', 'ADI NUGRAHANTO', 'Adi Nugrahanto', '5', 'STAF GBB KANDEMAN (C) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '', '11/1/2015', '11/1/2015', 'SMA', 1, 0, 15, '6/19/1977'),
(388, '158115188', '8115188', 'RACHMALIA AGUSTINA S.', 'Rachmalia Agustina S.', '5', 'STAF GBB KANDEMAN (C) SUBDIVRE PEKALONGAN DIVRE JATENG', 'Staf Pelaksana', 'Subdivre Pekalongan', '', '11/1/2015', '11/1/2015', 'SMU - IPA', 1, 0, 15, '8/11/1981'),
(389, '098209014', '8209014', 'BURHANI COKRO AMINOTO , S.TP', 'Burhani Cokro Aminoto', '10', 'MANAGER UB-PGB LARANGAN I,II REGIONAL IV SEMARANG', 'Manager UPGB Larangan', 'Subdivre Pekalongan', '11/29/2038', '5/7/2012', '2/20/2014', 'S1 - TEKNIK PERTANIAN', 1, 0, 15, '11/29/1982'),
(390, '128712073', '8712073', 'RITWAN WIJAYA  , S.P', 'Ritwan Wijaya', '9', 'STAF UB-PGB LARANGAN I,II REGIONAL IV SEMARANG', 'Staf UPGB Larangan', 'Subdivre Pekalongan', '5/28/2043', '10/10/2012', '10/10/2012', 'S1 - BUDIDAYA PERTANIAN', 1, 0, 15, '5/28/1987'),
(391, '118311086', '8311086', 'SUSARTO , S.E', 'Susarto', '10', 'MANAGER UB-PGB WIRODESA I,II REGIONAL IV SEMARANG', 'Manager UPGB Wiradesa', 'Subdivre Pekalongan', '10/1/2039', '1/2/2015', '1/2/2015', 'S1 - MANAJEMEN', 1, 0, 15, '10/1/1983'),
(392, '118511079', '8511079', 'MUZAKKI MAKMUN , S.P', 'Muzakki Makmun', '10', 'STAF UB-PGB WIRODESA I,II REGIONAL IV SEMARANG', 'Staf UPGB Wiradesa', 'Subdivre Pekalongan', '10/7/2041', '10/1/2011', '3/18/2015', 'S1 - SOSIAL EKONOMI PERTANIAN', 1, 0, 15, '10/7/1985'),
(393, '780003059', '6283720', 'SUPARYONO', 'Suparyono', '10', 'PETUGAS MINKU UB-PGB WIRODESA I,II REGIONAL IV SEMARANG', 'Staf Minku UPGB Wiradesa', 'Subdivre Pekalongan', '4/15/2017', '5/1/1983', '3/15/2012', 'SMA - IPS/ILMU PENGETAHUAN SOSIAL', 1, 0, 15, '4/15/1961'),
(394, '098509025', '8509025', 'ANTO PURWANTO , S.TP', 'Anto Purwanto', '10', 'MANAGER UB-PGB CIMOHONG REGIONAL IV SEMARANG', 'Manager UPGB Cimohong', 'Subdivre Pekalongan', '2/5/2041', '4/18/2013', '4/18/2013', 'S1 - TEKNOLOGI PANGAN', 1, 0, 15, '2/5/1985'),
(395, '118711089', '8711089', 'FANNY FARORY , S.E', 'Fanny Farory', '10', 'STAF UB-PGB CIMOHONG REGIONAL IV SEMARANG', 'Staf UPGB Cimohong', 'Subdivre Pekalongan', '1/17/2043', '10/1/2011', '12/2/2013', 'S1 - MANAJEMEN', 1, 0, 15, '1/17/1987'),
(396, '111111111', '1111111', 'Topo Santoso', 'Topo Santoso', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 5, ''),
(397, '111111112', '1111112', 'Teguh', 'Teguh Bintoro', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 6, ''),
(398, '111111113', '1111113', 'Sarmijan', 'Sarmijan', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 5, ''),
(399, '111111114', '1111114', 'Jumain', 'Jumain', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 6, ''),
(400, '111111115', '1111115', 'Jayadi', 'Jayadi', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 6, '');
INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `noreg`, `nama_asli`, `nama_pegawai`, `golongan`, `jabatan_asli`, `jabatan`, `unitkerja`, `tmt_pensiun`, `tmt_jenjang`, `tmt_jabatan`, `pendidikan_formal`, `sts`, `sts_pejabat`, `pajak`, `tgl_lahir`) VALUES
(401, '111111116', '1111116', 'Andhita Satrianto', 'Andhita Satrianto', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 6, ''),
(402, '111111117', '1111117', 'Yudhi Satya', 'Yudhi Satya C', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 6, ''),
(403, '111111118', '1111118', 'Aji Gunawan', 'Aji Gunawan', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 6, ''),
(404, '111111119', '1111119', 'Rindho Suhartoyo', 'Rindho Suhartoyo', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 6, ''),
(405, '111111120', '1111120', 'Rangga', 'Rangga Satya C', '0', 'PENGEMUDI', 'Pengemudi', 'Divre Jateng', '', '', '', '', 2, 0, 6, ''),
(406, '222222222', '2222222', 'Wahyu Jaya S', 'Wahyu Jaya S', '12', 'PEMDA', 'Pemda', 'Prov. Jateng', '', '', '', '', 3, 0, 6, ''),
(407, '222222223', '2222223', 'Wisnu Priyo K', 'Wisnu Priyo K', '12', 'POLDA', 'Polda', 'Prov. Jateng', '', '', '', '', 3, 0, 6, ''),
(408, '222222224', '2222224', 'Minatur Saniyal', 'Minatur Saniyal', '12', 'BPS', 'BPS', 'Prov. Jateng', '', '', '', '', 3, 0, 6, ''),
(409, '222222225', '2222225', 'Ismono', 'Ismono', '12', 'LP2K', 'LP2K', 'Prov. Jateng', '', '', '', '', 3, 0, 6, ''),
(410, '222222226', '2222226', 'Ngargono', 'Ngargono', '12', 'LP2K', 'LP2K', 'Prov. Jateng', '', '', '', '', 3, 0, 5, ''),
(411, '111111121', '1111121', NULL, 'Anton', '0', NULL, 'Pengemudi', 'Divre Jateng', NULL, NULL, NULL, NULL, 2, NULL, 6, NULL),
(412, '222222227', '2222227', NULL, 'Budiharjo M. Wibowo', '16', NULL, 'Pemda', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(413, '222222228', '2222228', NULL, 'Kuswara', '12', NULL, 'Pemda', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(414, '222222229', '2222229', NULL, 'Purwo Santoso', '12', NULL, 'BPS', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(415, '222222230', '2222230', NULL, 'Mohamad Rafi', '12', NULL, 'Lekstra', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(416, '222222231', '2222231', NULL, 'Efie Eka Wanty', '12', NULL, 'Pemda', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(417, '222222232', '2222232', NULL, 'Istamadi Sjamsul M', '12', NULL, 'Pemda', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(418, '222222233', '2222233', NULL, 'Muhyidin', '12', NULL, 'Lekstra', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(419, '222222234', '2222234', NULL, 'Sumardjo', '16', NULL, 'Dinsos', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(420, '222222235', '2222235', NULL, 'Azmi Muttaqin', '12', NULL, 'Lekstra', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(421, '222222236', '2222236', NULL, 'Untung Rahardjo', '12', NULL, 'BPS', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(422, '222222237', '2222237', NULL, 'Wardjono', '12', NULL, 'Bina Produksi', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(423, '222222238', '2222238', NULL, 'Abdun Mufid', '12', NULL, 'LP2K', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(424, '222222239', '2222239', NULL, 'Mujiyatna', '12', NULL, 'BKP', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(425, '222222240', '2222240', NULL, 'Nyoman Garjita', '12', NULL, 'Polda', 'Jawa Tengah', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL),
(426, '222222241', '2222241', NULL, 'Totok', '12', NULL, 'Bina Sosial', 'Prov. Jateng', NULL, NULL, NULL, NULL, 3, NULL, 6, NULL);

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
(1, 'Rudi Amran', 'Kabid Minku', 'Rully Rahmini Dewi', 'Kasi Keuangan', 'Widoyo Seno', 'Kasi TU & Umum');

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
  `total` decimal(20,2) DEFAULT NULL,
  `jumlah_diterima` decimal(20,2) DEFAULT NULL,
  `penanda` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelaksana`
--

INSERT INTO `tb_pelaksana` (`id_pelaksana`, `noreg`, `nama_pelaksana`, `gol`, `jabatan`, `unit_kerja`, `status_pelaksana`, `id_sppd`, `uang_harian`, `uang_bbm`, `uang_repres`, `uang_hotel`, `uang_taxi`, `uang_pesawat_b`, `uang_pesawat_p`, `uang_kereta_b`, `uang_kereta_p`, `uang_travel_b`, `uang_travel_p`, `jumlah`, `pph`, `potongan`, `total`, `jumlah_diterima`, `penanda`) VALUES
(450, '1111112', 'Teguh Bintoro', '0', 'Pengemudi', 'Divre Jateng', 1, 210, '900000.00', '769600.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1669600.00', 6, '100176.00', '1669600.00', '1569424.00', ''),
(460, '8108629', 'Indarto Muji H', '6', 'Staf TU & Umum', 'Divre Jateng', 1, 214, '315000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '315000.00', 15, '47250.00', '315000.00', '267750.00', ''),
(461, '9112356', 'M. Maulana R', '7', 'Staf TU & Umum', 'Divre Jateng', 0, 214, '315000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '315000.00', 15, '47250.00', '315000.00', '267750.00', ''),
(462, '1111113', 'Sarmijan', '0', 'Pengemudi', 'Divre Jateng', 0, 214, '225000.00', '270840.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '495840.00', 5, '24792.00', '495840.00', '471048.00', ''),
(463, '6095242', 'S U Y A N T O', '10', 'Staf TU & Umum', 'Divre Jateng', 1, 215, '720000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '720000.00', 15, '108000.00', '720000.00', '612000.00', ''),
(464, '9112356', 'M. Maulana R', '7', 'Staf TU & Umum', 'Divre Jateng', 0, 215, '630000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '630000.00', 15, '94500.00', '630000.00', '535500.00', ''),
(465, '1111112', 'Teguh Bintoro', '0', 'Pengemudi', 'Divre Jateng', 0, 215, '450000.00', '793280.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1243280.00', 6, '74596.80', '1243280.00', '1168683.20', ''),
(466, '6095242', 'S U Y A N T O', '10', 'Staf TU & Umum', 'Divre Jateng', 1, 216, '720000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '720000.00', 15, '108000.00', '720000.00', '612000.00', ''),
(467, '8108629', 'Indarto Muji H', '6', 'Staf TU & Umum', 'Divre Jateng', 0, 216, '630000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '630000.00', 15, '94500.00', '630000.00', '535500.00', ''),
(468, '1111112', 'Teguh Bintoro', '0', 'Pengemudi', 'Divre Jateng', 0, 216, '450000.00', '740000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1190000.00', 6, '71400.00', '1190000.00', '1118600.00', ''),
(473, '7408484', 'Kartini', '6', 'Staf Akuntansi', 'Divre Jateng', 1, 220, '700000.00', NULL, '0.00', '350000.00', '0.00', NULL, NULL, NULL, NULL, '200000.00', '150000.00', '1250000.00', 15, '187500.00', '1400000.00', '1212500.00', ''),
(474, '8912232', 'Widi Raspati Apriniadi', '7', 'Staf Akuntansi', 'Divre Jateng', 0, 220, '700000.00', '0.00', '0.00', '350000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '200000.00', '150000.00', '1250000.00', 15, '187500.00', '1400000.00', '1212500.00', ''),
(480, '8811082', 'Andhika Saputra', '10', 'Staf  SDM & Hukum', 'Divre Jateng', 1, 221, '1440000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1440000.00', 15, '216000.00', '1440000.00', '1224000.00', ''),
(481, '8108585', 'M. Sofian Nugroho', '6', 'Kasir Sub Surakarta', 'Subdivre Surakarta', 0, 221, '1260000.00', '384800.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1644800.00', 15, '246720.00', '1644800.00', '1398080.00', ''),
(485, '6195726', 'Rusmadi', '10', 'Staf  SDM & Hukum', 'Divre Jateng', 1, 219, '800000.00', '0.00', '0.00', '0.00', '200000.00', '840000.00', '1250000.00', '0.00', '0.00', '0.00', '0.00', '1840000.00', 15, '276000.00', '3090000.00', '2814000.00', ''),
(492, '8206089', 'Anastasia Ratna K.', '11', 'Staf Keuangan', 'Divre Jateng', 1, 222, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(493, '8108708', 'Achmad Ismail', '6', 'Jurtim Mulyadadi', 'Subdivre Banyumas', 0, 222, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(494, '6797095', 'Rudi Amran', '14', 'Kabid Minku', 'Divre Jateng', 1, 223, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(495, '6183595', 'Usep Karyana', '16', 'Kepala', 'Divre Jateng', 1, 218, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(496, '8106071', 'Joko Pamungkas', '11', 'Kasi SDM & Hukum', 'Divre Jateng', 1, 217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(497, '8115185', 'Jamal Wahyudi', '5', 'Staf Pelaksana', 'Subdivre Kedu', 0, 217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(519, '6083717', 'Vt. Rapi Indriastuti', '13', 'Kasi Penyaluran', 'Divre Jateng', 1, 224, '900000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '900000.00', 15, '135000.00', '900000.00', '765000.00', ''),
(520, '7705005', 'Rina Ediati', '11', 'Kasi Perawatan', 'Divre Jateng', 0, 224, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 15, '120000.00', '800000.00', '680000.00', ''),
(521, '2222227', 'Budiharjo M. Wibowo', '16', 'Pemda', 'Prov. Jateng', 0, 224, '900000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '900000.00', 6, '54000.00', '900000.00', '846000.00', ''),
(522, '2222240', 'Nyoman Garjita', '12', 'Polda', 'Jawa Tengah', 0, 224, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(523, '2222225', 'Ismono', '12', 'LP2K', 'Prov. Jateng', 0, 224, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(524, '2222222', 'Wahyu Jaya S', '12', 'Pemda', 'Prov. Jateng', 0, 224, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(525, '1111113', 'Sarmijan', '0', 'Pengemudi', 'Divre Jateng', 0, 224, '450000.00', '148000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '598000.00', 5, '29900.00', '598000.00', '568100.00', ''),
(526, '6184176', 'Sumiyatun', '12', 'Kasi Pengadaan', 'Divre Jateng', 1, 225, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 15, '120000.00', '800000.00', '680000.00', ''),
(527, '7906034', 'Anna Marianofa', '11', 'Kasi Angdia', 'Divre Jateng', 0, 225, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 15, '120000.00', '800000.00', '680000.00', ''),
(528, '2222229', 'Purwo Santoso', '12', 'BPS', 'Prov. Jateng', 0, 225, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(529, '2222230', 'Mohamad Rafi', '12', 'Lekstra', 'Prov. Jateng', 0, 225, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(530, '2222231', 'Efie Eka Wanty', '12', 'Pemda', 'Prov. Jateng', 0, 225, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(531, '2222223', 'Wisnu Priyo K', '12', 'Polda', 'Prov. Jateng', 0, 225, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(532, '1111112', 'Teguh Bintoro', '0', 'Pengemudi', 'Divre Jateng', 0, 225, '450000.00', '148000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '598000.00', 6, '35880.00', '598000.00', '562120.00', ''),
(533, '6383734', 'Siti Retno Farida', '13', 'Kasi Humas', 'Divre Jateng', 1, 226, '900000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '900000.00', 15, '135000.00', '900000.00', '765000.00', ''),
(534, '8108048', 'Rully Rahmini Dewi', '10', 'Kasi Keuangan', 'Divre Jateng', 0, 226, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 15, '120000.00', '800000.00', '680000.00', ''),
(535, '2222228', 'Kuswara', '12', 'Pemda', 'Prov. Jateng', 0, 226, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(536, '2222236', 'Untung Rahardjo', '12', 'BPS', 'Prov. Jateng', 0, 226, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(537, '2222235', 'Azmi Muttaqin', '12', 'Lekstra', 'Prov. Jateng', 0, 226, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(538, '2222226', 'Ngargono', '12', 'LP2K', 'Prov. Jateng', 0, 226, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 5, '40000.00', '800000.00', '760000.00', ''),
(539, '1111115', 'Jayadi', '0', 'Pengemudi', 'Divre Jateng', 0, 226, '450000.00', '148000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '598000.00', 6, '35880.00', '598000.00', '562120.00', ''),
(540, '8106071', 'Joko Pamungkas', '11', 'Kasi SDM & Hukum', 'Divre Jateng', 1, 227, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 15, '120000.00', '800000.00', '680000.00', ''),
(541, '8008582', 'Wahyu Handoro D.', '6', 'Staf PP', 'Divre Jateng', 0, 227, '700000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '700000.00', 15, '105000.00', '700000.00', '595000.00', ''),
(542, '2222232', 'Istamadi Sjamsul M', '12', 'Pemda', 'Prov. Jateng', 0, 227, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(543, '2222233', 'Muhyidin', '12', 'Lekstra', 'Prov. Jateng', 0, 227, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(544, '2222234', 'Sumardjo', '16', 'Dinsos', 'Prov. Jateng', 0, 227, '900000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '900000.00', 6, '54000.00', '900000.00', '846000.00', ''),
(545, '2222241', 'Totok', '12', 'Bina Sosial', 'Prov. Jateng', 0, 227, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(546, '1111120', 'Rangga Satya C', '0', 'Pengemudi', 'Divre Jateng', 0, 227, '450000.00', '148000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '598000.00', 6, '35880.00', '598000.00', '562120.00', ''),
(547, '7397305', 'Widoyo Seno', '10', 'Kasi TU & Umum', 'Divre Jateng', 1, 228, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 15, '120000.00', '800000.00', '680000.00', ''),
(548, '7906033', 'Angga Chandraresmi', '11', 'Kasi Akuntansi', 'Divre Jateng', 0, 228, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 15, '120000.00', '800000.00', '680000.00', ''),
(549, '8306115', 'Dian Agus Istiani', '8', 'Kasir Divre', 'Divre Jateng', 0, 228, '700000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '700000.00', 15, '105000.00', '700000.00', '595000.00', ''),
(550, '2222237', 'Wardjono', '12', 'Bina Produksi', 'Prov. Jateng', 0, 228, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(551, '2222238', 'Abdun Mufid', '12', 'LP2K', 'Prov. Jateng', 0, 228, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(552, '2222239', 'Mujiyatna', '12', 'BKP', 'Prov. Jateng', 0, 228, '800000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000.00', 6, '48000.00', '800000.00', '752000.00', ''),
(553, '1111117', 'Yudhi Satya C', '0', 'Pengemudi', 'Divre Jateng', 0, 228, '450000.00', '148000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '598000.00', 6, '35880.00', '598000.00', '562120.00', ''),
(554, '7297194', 'Sopran Kenedi', '13', 'Wakil Kepala', 'Divre Jateng', 1, 229, '900000.00', NULL, '400000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1300000.00', 25, '325000.00', '1300000.00', '975000.00', ''),
(555, '1111111', 'Topo Santoso', '0', 'Pengemudi', 'Divre Jateng', 0, 229, '450000.00', '148000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '598000.00', 5, '29900.00', '598000.00', '568100.00', ''),
(557, '6797095', 'Rudi Amran', '14', 'Kabid Minku', 'Divre Jateng', 1, 230, '405000.00', '162800.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '567800.00', 15, '85170.00', '567800.00', '482630.00', ''),
(559, '8108048', 'Rully Rahmini Dewi', '10', 'Kasi Keuangan', 'Divre Jateng', 1, 231, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(577, '8212307', 'Doni Koes Wardono', '9', 'Staf PPU', 'Divre Jateng', 1, 232, '1200000.00', '310800.00', '0.00', '900000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2410800.00', 15, '361620.00', '2410800.00', '2049180.00', ''),
(580, '6183595', 'Usep Karyana', '16', 'Kepala Divre Jateng', 'Divre Jateng', 1, 233, '900000.00', '0.00', '400000.00', '550000.00', '200000.00', '840000.00', '0.00', '0.00', '12500000.00', '0.00', '0.00', '2890000.00', 30, '867000.00', '15390000.00', '14523000.00', ''),
(582, '6183595', 'Usep Karyana', '16', 'Kepala Divre Jateng', 'Divre Jateng', 1, 234, '900000.00', '0.00', '400000.00', '550000.00', '200000.00', '840000.00', '939000.00', '0.00', '0.00', '0.00', '0.00', '2890000.00', 30, '867000.00', '3829000.00', '2962000.00', ''),
(590, '6383734', 'Siti Retno Farida', '13', 'Kasi Humas', 'Divre Jateng', 1, 236, '1215000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1215000.00', 15, '182250.00', '1215000.00', '1032750.00', ''),
(591, '8212307', 'Doni Koes Wardono', '9', 'Staf PPU', 'Divre Jateng', 0, 236, '1080000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1080000.00', 15, '162000.00', '1080000.00', '918000.00', ''),
(592, '1111115', 'Jayadi', '0', 'Pengemudi', 'Divre Jateng', 0, 236, '675000.00', '703000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1378000.00', 6, '82680.00', '1378000.00', '1295320.00', ''),
(593, '8106071', 'Joko Pamungkas', '11', 'Kasi SDM & Hukum', 'Divre Jateng', 1, 237, '1080000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1080000.00', 15, '162000.00', '1080000.00', '918000.00', ''),
(594, '6908761', 'Giri Nugroho S.', '6', 'Staf TU & Umum', 'Divre Jateng', 0, 237, '945000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '945000.00', 15, '141750.00', '945000.00', '803250.00', ''),
(595, '1111117', 'Yudhi Satya C', '0', 'Pengemudi', 'Divre Jateng', 0, 237, '675000.00', '821400.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1496400.00', 6, '89784.00', '1496400.00', '1406616.00', ''),
(596, '7397305', 'Widoyo Seno', '10', 'Kasi TU & Umum', 'Divre Jateng', 1, 238, '1080000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1080000.00', 15, '162000.00', '1080000.00', '918000.00', ''),
(597, '8612142', 'Fedrial Farhan', '9', 'Staf PP', 'Divre Jateng', 0, 238, '1080000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1080000.00', 15, '162000.00', '1080000.00', '918000.00', ''),
(598, '7705005', 'Rina Ediati', '11', 'Kasi Perawatan', 'Divre Jateng', 0, 238, '1080000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1080000.00', 15, '162000.00', '1080000.00', '918000.00', ''),
(599, '1111112', 'Teguh Bintoro', '0', 'Pengemudi', 'Divre Jateng', 0, 238, '675000.00', '962000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1637000.00', 6, '98220.00', '1637000.00', '1538780.00', ''),
(600, '6083717', 'Vt. Rapi Indriastuti', '13', 'Kasi Penyaluran', 'Divre Jateng', 1, 239, '1215000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1215000.00', 15, '182250.00', '1215000.00', '1032750.00', ''),
(601, '8008582', 'Wahyu Handoro D.', '6', 'Staf PP', 'Divre Jateng', 0, 239, '945000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '945000.00', 15, '141750.00', '945000.00', '803250.00', ''),
(602, '9112356', 'M. Maulana R', '7', 'Staf TU & Umum', 'Divre Jateng', 0, 239, '945000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '945000.00', 15, '141750.00', '945000.00', '803250.00', ''),
(603, '1111113', 'Sarmijan', '0', 'Pengemudi', 'Divre Jateng', 0, 239, '675000.00', '828800.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1503800.00', 5, '75190.00', '1503800.00', '1428610.00', ''),
(604, '7906034', 'Anna Marianofa', '11', 'Kasi Angdia', 'Divre Jateng', 1, 240, '1080000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1080000.00', 15, '162000.00', '1080000.00', '918000.00', ''),
(605, '7408484', 'Kartini', '6', 'Staf Akuntansi', 'Divre Jateng', 0, 240, '945000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '945000.00', 15, '141750.00', '945000.00', '803250.00', ''),
(606, '1111120', 'Rangga Satya C', '0', 'Pengemudi', 'Divre Jateng', 0, 240, '675000.00', '814000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1489000.00', 6, '89340.00', '1489000.00', '1399660.00', ''),
(607, '8108048', 'Rully Rahmini Dewi', '10', 'Kasi Keuangan', 'Divre Jateng', 1, 235, '610000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '610000.00', 15, '91500.00', '610000.00', '518500.00', ''),
(608, '8508101', 'M Nurjuliansyah R.', '10', 'Asswas', 'Divre Jateng', 0, 235, '610000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '610000.00', 15, '91500.00', '610000.00', '518500.00', ''),
(609, '9012103', 'Anugrah Bintar', '9', 'Staf UB Bulogmart', 'Divre Jateng', 0, 235, '610000.00', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '610000.00', 15, '91500.00', '610000.00', '518500.00', ''),
(610, '1111111', 'Topo Santoso', '0', 'Pengemudi', 'Divre Jateng', 0, 235, '510000.00', '417360.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '927360.00', 5, '46368.00', '927360.00', '880992.00', ''),
(616, '6084173', 'Suroso', '12', 'Asswas', 'Divre Jateng', 1, 243, '1800000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1800000.00', 15, '270000.00', '1800000.00', '1530000.00', ''),
(617, '6484211', 'Sri Asiati', '12', 'Asswas', 'Divre Jateng', 0, 243, '1800000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1800000.00', 15, '270000.00', '1800000.00', '1530000.00', ''),
(618, '8508101', 'M Nurjuliansyah R.', '10', 'Asswas', 'Divre Jateng', 0, 243, '1800000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1800000.00', 15, '270000.00', '1800000.00', '1530000.00', ''),
(619, '1111114', 'Jumain', '0', 'Pengemudi', 'Divre Jateng', 0, 243, '1125000.00', '969400.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2094400.00', 6, '125664.00', '2094400.00', '1968736.00', ''),
(629, '6285573', 'Ramelan', '12', 'Asswas', 'Divre Jateng', 1, 242, '1800000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1800000.00', 15, '270000.00', '1800000.00', '1530000.00', ''),
(630, '6295279', 'Gampil Sri Rejeki', '10', 'Asswas', 'Divre Jateng', 0, 242, '1800000.00', NULL, '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1800000.00', 15, '270000.00', '1800000.00', '1530000.00', ''),
(631, '1111117', 'Yudhi Satya C', '0', 'Pengemudi', 'Divre Jateng', 0, 242, '1125000.00', '851000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1976000.00', 6, '118560.00', '1976000.00', '1857440.00', ''),
(634, '8108629', 'Indarto Muji H', '6', 'Staf TU & Umum', 'Divre Jateng', 1, 245, '700000.00', NULL, '0.00', '350000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1050000.00', 15, '157500.00', '1050000.00', '892500.00', ''),
(635, '1111119', 'Rindho Suhartoyo', '0', 'Pengemudi', 'Divre Jateng', 0, 245, '450000.00', '629000.00', '0.00', '250000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1329000.00', 6, '79740.00', '1329000.00', '1249260.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelaksana_temp`
--

CREATE TABLE `tb_pelaksana_temp` (
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
  `jumlah_diterima_pswt` decimal(20,2) DEFAULT NULL,
  `jenis_biaya` varchar(255) DEFAULT NULL,
  `moda_angkutan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_repres`
--

CREATE TABLE `tb_repres` (
  `id_repres` int(10) NOT NULL,
  `u_repres` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_repres`
--

INSERT INTO `tb_repres` (`id_repres`, `u_repres`) VALUES
(1, 200000);

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
  `id_sppd` varchar(255) DEFAULT NULL,
  `sts_skpd` int(10) DEFAULT NULL COMMENT '1=sdh dibuat, 9=batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_skpd`
--

INSERT INTO `tb_skpd` (`id_skpd`, `no_skpd`, `tgl_skpd`, `attr_skpd`, `jenis_biaya`, `angkutan`, `dasar`, `perlengkapan`, `ket_lain`, `jarak`, `hasil_km`, `jenis_bbm`, `harga_bbm`, `harian_bbm`, `jml_bbm`, `id_sppd`, `sts_skpd`) VALUES
(104, 607, '21-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakil Kepala Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 21 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 320, '64.00', 'premium', 7400, '40.00', '769600.00', '210', 1),
(108, 595, '08-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakil Kepala Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 21 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 133, '26.60', 'premium', 7400, '10.00', '270840.00', '214', 1),
(109, 596, '08-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakil Kepala Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 21 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 436, '87.20', 'premium', 7400, '20.00', '793280.00', '215', 1),
(110, 611, '08-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakil Kepala Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 21 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 400, '80.00', 'premium', 7400, '20.00', '740000.00', '216', 1),
(111, 612, '22-12-2015', ' / 11030 / 12 / 2015', 'monev_raskin', 'kendaraan dinas', 'Berdasarkan persetujuan Kepala Divre Jateng Divre Jateng pada SPPD An. Kabid PP Divre Jateng tanggal 22 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', 'premium', 7400, '20.00', '148000.00', '224', 1),
(112, 613, '22-12-2015', ' / 11030 / 12 / 2015', 'monev_raskin', 'kendaraan dinas', 'Berdasarkan persetujuan Kepala Divre Jateng Divre Jateng pada SPPD An. Kabid PP Divre Jateng tanggal 22 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', 'premium', 7400, '20.00', '148000.00', '225', 1),
(113, 614, '22-12-2015', ' / 11030 / 12 / 2015', 'monev_raskin', 'kendaraan dinas', 'Berdasarkan persetujuan Kepala Divre Jateng Divre Jateng pada SPPD An. Kabid PP Divre Jateng tanggal 22 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', 'premium', 7400, '20.00', '148000.00', '226', 1),
(114, 615, '22-12-2015', ' / 11030 / 12 / 2015', 'monev_raskin', 'kendaraan dinas', 'Berdasarkan persetujuan Kepala Divre Jateng Divre Jateng pada SPPD An. Kabid PP Divre Jateng tanggal 22 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', 'premium', 7400, '20.00', '148000.00', '227', 1),
(115, 616, '22-12-2015', ' / 11030 / 12 / 2015', 'monev_raskin', 'kendaraan dinas', 'Berdasarkan persetujuan Kepala Divre Jateng Divre Jateng pada SPPD An. Kabid PP Divre Jateng tanggal 22 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', 'premium', 7400, '20.00', '148000.00', '228', 1),
(116, 617, '22-12-2015', ' / 11030 / 12 / 2015', 'monev_raskin', 'kendaraan dinas', 'Berdasarkan persetujuan Kepala Divre Jateng Divre Jateng pada SPPD An. Kabid PP Divre Jateng tanggal 22 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', 'premium', 7400, '20.00', '148000.00', '229', 1),
(117, 618, '23-12-2015', ' / 11030 / 12 / 2015', 'pswt_krywn_non_hotel', 'pesawat terbang', 'Berdasarkan persetujuan Kepala Divre Jateng pada SPPD A.n Kabid PP Divre Jateng tanggal 23 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', '', 0, '0.00', '0.00', '231', 1),
(121, 619, '23-12-2015', ' / 11030 / 12 / 2015', 'pswt_ka_waka_hotel', 'pesawat terbang', 'Berdasarkan persetujuan Wakil Kepala Divre Jateng Divre Jateng pada SPPD Kasi TU & Umum Divre Jateng tanggal 23 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 0, '0.00', '', 0, '0.00', '0.00', '234', 1),
(122, 621, '28-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakadivre Jateng Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 28 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 132, '26.40', 'premium', 7400, '30.00', '417360.00', '235', 1),
(123, 622, '28-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakadivre Jateng Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 28 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 325, '65.00', 'premium', 7400, '30.00', '703000.00', '236', 1),
(124, 623, '28-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakadivre Jateng Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 28 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 405, '81.00', 'premium', 7400, '30.00', '821400.00', '237', 1),
(125, 624, '28-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakadivre Jateng Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 28 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 500, '100.00', 'premium', 7400, '30.00', '962000.00', '238', 1),
(126, 625, '28-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakadivre Jateng Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 28 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 410, '82.00', 'premium', 7400, '30.00', '828800.00', '239', 1),
(127, 626, '28-12-2015', ' / 11030 / 12 / 2015', 'darat_non_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakadivre Jateng Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 28 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 400, '80.00', 'premium', 7400, '30.00', '814000.00', '240', 1),
(128, 1, '28-12-2015', ' / 11030 / 01 / 2016', 'spi', 'kendaraan dinas', 'Berdasarkan persetujuan Wakil Kepala Divre Jateng Divre Jateng pada SPPD Asswas Divre Jateng tanggal 28 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 325, '65.00', 'premium', 7400, '50.00', '851000.00', '242', 1),
(129, 2, '28-12-2015', ' / 11030 / 01 / 2016', 'spi', 'kendaraan dinas', 'Berdasarkan persetujuan Wakil Kepala Divre Jateng pada SPPD PLT Kabid Pengawasan tanggal 28 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 405, '81.00', 'premium', 7400, '50.00', '969400.00', '243', 1),
(130, 627, '28-12-2015', ' / 11030 / 12 / 2015', 'darat_hotel', 'kendaraan dinas', 'Berdasarkan persetujuan Wakadivre Jateng Divre Jateng pada SPPD Kabid Minku Divre Jateng tanggal 28 Desember 2015 dengan ini diterbitkan SKPD atas nama :', 'Membawa Perlengkapan Seperlunya', '', 325, '65.00', 'premium', 7400, '20.00', '629000.00', '245', 1);

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
  `durasi_tgs_pusat` varchar(255) DEFAULT NULL,
  `tmpt_keberangkatan` varchar(255) DEFAULT NULL,
  `tgl_keberangkatan` varchar(255) DEFAULT NULL,
  `tmpt_tujuan` varchar(255) DEFAULT NULL,
  `tgl_kepulangan` varchar(255) DEFAULT NULL,
  `tugas` varchar(255) DEFAULT NULL,
  `ket` text,
  `sts` int(10) DEFAULT NULL COMMENT '0=blm dibuat,1=sudah dibuat,9=dibatalkan',
  `tgl_sppd` varchar(255) DEFAULT NULL,
  `dasar_sppd` text,
  `no_fax` varchar(255) DEFAULT NULL,
  `tgl_fax` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sppd`
--

INSERT INTO `tb_sppd` (`id_sppd`, `pemberi_tgs`, `jab_pemberi_tgs`, `pemohon_tgs`, `jab_pemohon_tgs`, `durasi_tgs`, `durasi_tgs_pusat`, `tmpt_keberangkatan`, `tgl_keberangkatan`, `tmpt_tujuan`, `tgl_kepulangan`, `tugas`, `ket`, `sts`, `tgl_sppd`, `dasar_sppd`, `no_fax`, `tgl_fax`) VALUES
(210, 'Sopran Kenedi', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '4', NULL, 'semarang', '17-12-2015', 'Subdivre Pati,Gudang wilayah Subdivre Surakarta', '20-12-2015', 'Melayani Tamu', '', 1, '21-12-2015 08:29:23am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(214, 'Sopran Kenedi', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '1', NULL, 'semarang', '10-12-2015', 'Gudang wilayah Subdivre Semarang', '10-12-2015', 'Pendistribusian Kartu Stapel, No Tumpukan dan X-Banner', '', 1, '08-12-2015 11:34:49am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(215, 'Sopran Kenedi', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '2', NULL, 'semarang', '11-12-2015', 'Gudang wilayah Subdivre Pati', '12-12-2015', 'Pendistribusian Kartu Stapel, No Tumpukan dan X-Banner', '', 1, '08-12-2015 11:35:29am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(216, 'Sopran Kenedi', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '2', NULL, 'semarang', '13-12-2015', 'Gudang wilayah Subdivre Surakarta', '14-12-2015', 'Pendistribusian Kartu Stapel, No Tumpukan dan X-Banner', '', 1, '08-12-2015 11:36:49am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(224, 'Usep Karyana', 'Kepala Divre Jateng', 'VT. Rapi Indriastuti', 'An. Kabid PP', '2', NULL, 'semarang', '22-12-2015', 'Kec. Mijen dan Kec. Ngaliyan Kota Semarang', '23-12-2015', 'Monitoring dan Evaluasi Raskin Bulan Desember 2015', '', 1, '22-12-2015 05:24:52pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(225, 'Usep Karyana', 'Kepala Divre Jateng', 'VT. Rapi Indriastuti', 'An. Kabid PP', '2', NULL, 'semarang', '22-12-2015', 'Kec. Banyumanik dan Kec. Tembalang, Kota Semarang', '23-12-2015', 'Monitoring dan Evaluasi Raskin Bulan Desember 2015', '', 1, '22-12-2015 05:58:56pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(226, 'Usep Karyana', 'Kepala Divre Jateng', 'VT. Rapi Indriastuti', 'An. Kabid PP', '2', NULL, 'semarang', '22-12-2015', 'Kec. Semarang Utara dan Kec. Genuk, Kota Semarang', '23-12-2015', 'Monitoring dan Evaluasi Raskin Bulan Desember 2015', '', 1, '22-12-2015 06:06:08pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(227, 'Usep Karyana', 'Kepala Divre Jateng', 'VT. Rapi Indriastuti', 'An. Kabid PP', '2', NULL, 'semarang', '22-12-2015', 'Kec. Tugu dan Kec. Semarang Barat, Kota Semarang', '23-12-2015', 'Monitoring dan Evaluasi Raskin Bulan Desember 2015', '', 1, '22-12-2015 06:12:27pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(228, 'Usep Karyana', 'Kepala Divre Jateng', 'VT. Rapi Indriastuti', 'An. Kabid PP', '2', NULL, 'semarang', '22-12-2015', 'Kec. Semarang Selatan dan Kec. Candisari, Kota Semarang', '23-12-2015', 'Monitoring dan Evaluasi Raskin Bulan Desember 2015', '', 1, '22-12-2015 06:17:08pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(229, 'Usep Karyana', 'Kepala Divre Jateng', 'VT. Rapi Indriastuti', 'An. Kabid PP', '2', NULL, 'semarang', '22-12-2015', 'Kec. Mijen dan Kec. Ngaliyan Kota Semarang', '23-12-2015', 'Monitoring dan Evaluasi Raskin Bulan Desember 2015', '', 1, '22-12-2015 06:28:58pm', 'Berdasarkan faksimili dari Sekda Provinsi Jawa Tengah nomor 500/020092 tanggal 22 Desember 2015 perihal Pemberitahuan Pemantauan Daerah oleh Tim Monev Raskin Provinsi, bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(230, 'Sopran Kenedi', 'Wakil Kepala', 'Rudi Amran', 'Kabid Minku', '1', NULL, 'semarang', '16-12-2015', 'GBB Margorejo dan GBB Rengging', '16-12-2015', 'TEST DARAT NON HOTEL (MOBIL)', '', 1, '23-12-2015 07:34:03am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(231, 'Usep Karyana', 'Kepala', 'Vt. Rapi Indriastuti', 'Kasi Penyaluran', '2', NULL, 'semarang', '03-12-2015', 'Subdivre Surakarta', '04-12-2015', 'DIKLAT', '', 1, '23-12-2015 07:56:11am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(234, 'Sopran Kenedi', 'Wakadivre Jateng', 'Widoyo Seno', 'Kasi TU & Umum', '2', NULL, 'semarang', '27-12-2015', 'Perum Bulog Kantor Pusat Jakarta', '31-12-2015', 'Pelaksanaan Supervisi Pemuatan Beras Impor Luar Negeri', '', 1, '23-12-2015 02:21:03pm', 'Berdasarkan Faksimili Kantor Pusat Perum BULOG Nomor : F-2878/DO200/23122015 Tanggal 23 Desember 2015. Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', 'F-2878/DO200/23122015', '23-12-2015'),
(235, 'Sopran Kenedi', 'Wakadivre Jateng', 'Rudi Amran', 'Kabid Minku', '3', NULL, 'semarang', '29-12-2015', 'Gudang-gudang wilayah subdivre Semarang', '31-12-2015', 'Monitoring dan Evaluasi Implementasi ISO 9001:2008', '', 1, '28-12-2015 11:32:36am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(236, 'Sopran Kenedi', 'Wakadivre Jateng', 'Rudi Amran', 'Kabid Minku', '3', NULL, 'semarang', '29-12-2015', 'Gudang-gudang wilayah subdivre Pati', '31-12-2015', 'Monitoring dan Evaluasi Implementasi ISO 9001:2008', '', 1, '28-12-2015 11:39:05am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(237, 'Sopran Kenedi', 'Wakadivre Jateng', 'Rudi Amran', 'Kabid Minku', '3', NULL, 'semarang', '29-12-2015', 'Gudang-gudang wilayah subdivre Surakarta', '31-12-2015', 'Monitoring dan Evaluasi Implementasi ISO 9001:2008', '', 1, '28-12-2015 11:40:07am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(238, 'Sopran Kenedi', 'Wakadivre Jateng', 'Rudi Amran', 'Kabid Minku', '3', NULL, 'semarang', '29-12-2015', 'Gudang-gudang wilayah subdivre Banyumas', '31-12-2015', 'Monitoring dan Evaluasi Implementasi ISO 9001:2008', '', 1, '28-12-2015 11:41:14am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(239, 'Sopran Kenedi', 'Wakadivre Jateng', 'Rudi Amran', 'Kabid Minku', '3', NULL, 'semarang', '29-12-2015', 'Gudang-gudang wilayah subdivre Kedu', '31-12-2015', 'Monitoring dan Evaluasi Implementasi ISO 9001:2008', '', 1, '28-12-2015 11:42:07am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(240, 'Sopran Kenedi', 'Wakadivre Jateng', 'Rudi Amran', 'Kabid Minku', '3', NULL, 'semarang', '29-12-2015', 'Gudang-gudang wilayah subdivre Pekalongan', '31-12-2015', 'Monitoring dan Evaluasi Implementasi ISO 9001:2008', '', 1, '28-12-2015 11:43:12am', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(242, 'Sopran Kenedi', 'Wakil Kepala Divre Jateng', 'Ramelan', 'Asswas', '5', NULL, 'semarang', '04-01-2016', 'Gudang-gudang wilayah subdivre Pati', '08-01-2016', 'Stock Opname Inventarisasi Alih Tugas Kasubdivre', '', 1, '28-12-2015 04:24:37pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(243, 'Sopran Kenedi', 'Wakil Kepala Divre Jateng', 'Ramelan', 'PLT Kabid Pengawasan', '5', NULL, 'semarang', '04-01-2016', 'Gudang-gudang wilayah subdivre Surakarta', '08-01-2016', 'Stock Opname Inventarisasi Alih Tugas Kasubdivre', '', 1, '28-12-2015 04:25:59pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', ''),
(245, 'Sopran Kenedi', 'Wakadivre Jateng', 'Rudi Amran', 'Kabid Minku', '2', NULL, 'semarang', '30-12-2015', 'Gudang Kebumen', '31-12-2015', 'Monitoring RR', '', 1, '28-12-2015 05:06:06pm', 'Bersama ini mohon agar kepada nama/nama-nama berikut ini diterbitkan SKPD untuk melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :', '', '');

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
(1, 'Subdivre Semarang', 'Subdivre Semarang', '-6.984918, 110.381982', NULL),
(2, 'Gudang wilayah Subdivre Semarang', 'Subdivre Semarang', '', ''),
(3, 'GBB Palebon', 'Subdivre Semarang', '-7.009686, 110.468056', NULL),
(4, 'GBB Mangkang Kulon', 'Subdivre Semarang', '-6.965988, 110.275412', NULL),
(5, 'GBB Katonsari', 'Subdivre Semarang', '-6.907479, 110.621345', NULL),
(6, 'GBB Depok', 'Subdivre Semarang', '-7.133321, 110.907480', NULL),
(7, 'GBB Harjosari', 'Subdivre Semarang', '-7.232521, 110.429872', NULL),
(8, 'GBB Randugarut', 'Subdivre Semarang', '-6.981649, 110.335430', NULL),
(9, 'GBB Tambakaji', 'Subdivre Semarang', '-6.984984, 110.338652', NULL),
(10, 'GBB Sumber Rejo', 'Subdivre Semarang', '-6.965985, 110.275397', NULL),
(11, 'UPGB Demak', 'Subdivre Semarang', '-6.907142, 110.621839', NULL),
(12, 'UPGB Purwodadi', 'Subdivre Semarang', '-7.132726, 110.905844', NULL),
(13, 'UPGB Kaliwungu', 'Subdivre Semarang', '-6.966773, 110.275376', NULL),
(14, 'Subdivre Pati', 'Subdivre Pati', '-6.758974, 111.017274', NULL),
(15, 'Gudang wilayah Subdivre Pati', 'Subdivre Pati', '', ''),
(16, 'GBB Margorejo', 'Subdivre Pati', '-6.763452, 111.011805', NULL),
(17, 'GBB Tempel Lemahabang', 'Subdivre Pati', '-6.982977, 111.497931', NULL),
(18, 'GBB Kaliwungu', 'Subdivre Pati', '-6.783566, 110.791379', NULL),
(19, 'GBB Rengging', 'Subdivre Pati', '-6.672621, 110.711089', NULL),
(20, 'GBB Sukokulon', 'Subdivre Pati', '-6.778992, 110.992153', NULL),
(21, 'GBB Bumirejo', 'Subdivre Pati', '-6.783817, 110.985288', NULL),
(22, 'GBB Kedungrejo', 'Subdivre Pati', '-6.739911, 111.357903', NULL),
(23, 'UPGB Margorejo', 'Subdivre Pati', '-6.763642, 111.011552', NULL),
(24, 'UPGB Blora', 'Subdivre Pati', '-6.983634, 111.497552', NULL),
(25, 'UPGB Bumirejo', 'Subdivre Pati', '-6.782766, 110.985314', NULL),
(26, 'UPGB Kedungrejo', 'Subdivre Pati', '-6.739735, 111.358393', NULL),
(27, 'Subdivre Surakarta', 'Subdivre Surakarta', '-7.542846, 110.768941', NULL),
(28, 'Gudang wilayah Subdivre Surakarta', 'Subdivre Surakarta', '', ''),
(29, 'GBB Karanganom', 'Subdivre Surakarta', '-7.702513, 110.614825', NULL),
(30, 'GBB Krikilan', 'Subdivre Surakarta', '-7.462025, 110.949146', NULL),
(31, 'GBB Ngabean', 'Subdivre Surakarta', '-7.546965, 110.743785', NULL),
(32, 'GBB Banaran', 'Subdivre Surakarta', '-7.642037, 110.689501', NULL),
(33, 'GBB Telukan', 'Subdivre Surakarta', '-7.632862, 110.826648', NULL),
(34, 'GBB Triyagan', 'Subdivre Surakarta', '-7.579393, 110.899657', NULL),
(35, 'GBB Meger', 'Subdivre Surakarta', '-7.673075, 110.654644', NULL),
(36, 'GBB Gedong', 'Subdivre Surakarta', '-7.855443, 110.985719', NULL),
(37, 'GBB Duyungan', 'Subdivre Surakarta', '-7.444976, 110.976312', NULL),
(38, 'UPGB Masaran', 'Subdivre Surakarta', '-7.460901, 110.948518', NULL),
(39, 'UPGB Grogol', 'Subdivre Surakarta', '-7.633065, 110.827321', NULL),
(40, 'UPGB Mojolaban', 'Subdivre Surakarta', '-7.580342, 110.899937', NULL),
(41, 'Subdivre Banyumas', 'Subdivre Banyumas', '-7.435812, 109.261194', NULL),
(42, 'Gudang wilayah Subdivre Banyumas', 'Subdivre Banyumas', '', NULL),
(43, 'GBB Gumilir', 'Subdivre Banyumas', '-7.685278, 109.040936', NULL),
(44, 'GBB Sokaraja Kulon', 'Subdivre Banyumas', '-7.454214, 109.283846', NULL),
(45, 'GBB Klapagada', 'Subdivre Banyumas', '-7.616343, 109.146690', NULL),
(46, 'GBB Klahang', 'Subdivre Banyumas', '-7.447495, 109.313720', NULL),
(47, 'GBB Lomanis', 'Subdivre Banyumas', '-7.689049, 109.018607', NULL),
(48, 'GBB Mulyadadi', 'Subdivre Banyumas', '-7.300611, 108.746986', NULL),
(49, 'GBB Purwonegoro', 'Subdivre Banyumas', '-7.438948, 109.552429', NULL),
(50, 'GBB Cindaga', 'Subdivre Banyumas', '-7.555518, 109.195322', NULL),
(51, 'GBB Karangsentul', 'Subdivre Banyumas', '-7.386978, 109.347528', NULL),
(52, 'GBB Kalikabong', 'Subdivre Banyumas', '-7.401005, 109.351010', NULL),
(53, 'UPGB Gumilir', 'Subdivre Banyumas', '-7.684627, 109.041925', NULL),
(54, 'UPGB Klahang', 'Subdivre Banyumas', '-7.447063, 109.313054', NULL),
(55, 'UPGB Lomanis', 'Subdivre Banyumas', '-7.689413, 109.019218', NULL),
(56, 'UPGB Purbalingga', 'Subdivre Banyumas', '-7.386907, 109.346990', NULL),
(57, 'Subdivre Kedu', 'Subdivre Kedu', '-7.507388, 110.204659', NULL),
(58, 'Gudang wilayah Subdivre Kedu', 'Subdivre Kedu', '', NULL),
(59, 'GBB Danurejo', 'Subdivre Kedu', '-7.534230, 110.232815', NULL),
(60, 'GSP/GBL Secang', 'Subdivre Kedu', '-7.400607, 110.241993', NULL),
(61, 'GBB Selang', 'Subdivre Kedu', '-7.691150, 109.684187', NULL),
(62, 'GBB Bengkal', 'Subdivre Kedu', '-7.372754, 110.219284', NULL),
(63, 'GBB Sawangan', 'Subdivre Kedu', '-7.423639, 109.842105', NULL),
(64, 'GBB Butuh', 'Subdivre Kedu', '-7.721458, 109.851833', NULL),
(65, 'UPGB Kebumen', '', '-7.690318, 109.683733', NULL),
(66, 'UPGB Purworejo', '', '-7.721551, 109.852840', NULL),
(67, 'Subdivre Pekalongan', 'Subdivre Pekalongan', '-6.868861, 109.120430', NULL),
(68, 'Gudang wilayah Subdivre Pekalongan', 'Subdivre Pekalongan', '', NULL),
(69, 'GBB Munjung Agung', 'Subdivre Pekalongan', '-6.865865, 109.190522', NULL),
(70, 'GBB Procot', 'Subdivre Pekalongan', '-6.969259, 109.139189', NULL),
(71, 'GBB Bondansari', 'Subdivre Pekalongan', '-6.893459, 109.602995', NULL),
(72, 'GBB Kedungkelor', 'Subdivre Pekalongan', '-6.870761, 109.331081', NULL),
(73, 'GBB Cimohong', 'Subdivre Pekalongan', '-6.871982, 108.903839', NULL),
(74, 'GBB Kandeman', 'Subdivre Pekalongan', '-6.932761, 109.768281', NULL),
(75, 'UPGB Larangan', 'Subdivre Pekalongan', '-6.867004, 109.190422', NULL),
(76, 'UPGB Wiradesa', 'Subdivre Pekalongan', '-6.892730, 109.603133', NULL),
(77, 'UPGB Cimohong', 'Subdivre Pekalongan', '-6.870472, 108.904055', NULL),
(78, 'Perum Bulog Kantor Pusat Jakarta', 'Jakarta', '-6.237467, 106.828917', NULL),
(79, 'Divre DKI Jakarta', 'Jakarta', '-6.170902, 106.895728', NULL),
(80, 'Divre Jawa Barat', 'Jawa Barat', '-6.939117, 107.662660', NULL),
(81, 'Divre Jawa Tengah', 'Jawa Tengah', '-6.993487, 110.418138', NULL),
(82, 'Divre Jawa Timur', 'Jawa Timur', '-7.327946, 112.731460', NULL),
(83, 'Divre Yogyakarta', 'Yogyakarta', '-7.786803, 110.374189', NULL),
(84, 'Prov. D.K.I. Jakarta', 'Prov. D.K.I. Jakarta', '', NULL),
(85, 'Kab. Kepulauan Seribu', 'Prov. D.K.I. Jakarta', '', NULL),
(86, 'Kota Jakarta Pusat', 'Prov. D.K.I. Jakarta', '', NULL),
(87, 'Kota Jakarta Utara', 'Prov. D.K.I. Jakarta', '', NULL),
(88, 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '', NULL),
(89, 'Kota Jakarta Selatan', 'Prov. D.K.I. Jakarta', '', NULL),
(90, 'Kota Jakarta Timur', 'Prov. D.K.I. Jakarta', '', NULL),
(91, 'Prov. Jawa Barat', 'Prov. Jawa Barat', '', NULL),
(92, 'Kab. Bogor', 'Prov. Jawa Barat', '', NULL),
(93, 'Kab. Sukabumi', 'Prov. Jawa Barat', '', NULL),
(94, 'Kab. Cianjur', 'Prov. Jawa Barat', '', NULL),
(95, 'Kab. Bandung', 'Prov. Jawa Barat', '', NULL),
(96, 'Kab. Sumedang', 'Prov. Jawa Barat', '', NULL),
(97, 'Kab. Garut', 'Prov. Jawa Barat', '', NULL),
(98, 'Kab. Tasikmalaya', 'Prov. Jawa Barat', '', NULL),
(99, 'Kab. Ciamis', 'Prov. Jawa Barat', '', NULL),
(100, 'Kab. Kuningan', 'Prov. Jawa Barat', '', NULL),
(101, 'Kab. Majalengka', 'Prov. Jawa Barat', '', NULL),
(102, 'Kab. Cirebon', 'Prov. Jawa Barat', '', NULL),
(103, 'Kab. Indramayu', 'Prov. Jawa Barat', '', NULL),
(104, 'Kab. Subang', 'Prov. Jawa Barat', '', NULL),
(105, 'Kab. Purwakarta', 'Prov. Jawa Barat', '', NULL),
(106, 'Kab. Karawang', 'Prov. Jawa Barat', '', NULL),
(107, 'Kab. Bekasi', 'Prov. Jawa Barat', '', NULL),
(108, 'Kab. Bandung Barat', 'Prov. Jawa Barat', '', NULL),
(109, 'Kota Bandung', 'Prov. Jawa Barat', '', NULL),
(110, 'Kota Bogor', 'Prov. Jawa Barat', '', NULL),
(111, 'Kota Sukabumi', 'Prov. Jawa Barat', '', NULL),
(112, 'Kota Cirebon', 'Prov. Jawa Barat', '', NULL),
(113, 'Kota Bekasi', 'Prov. Jawa Barat', '', NULL),
(114, 'Kota Depok', 'Prov. Jawa Barat', '', NULL),
(115, 'Kota Cimahi', 'Prov. Jawa Barat', '', NULL),
(116, 'Kota Tasikmalaya', 'Prov. Jawa Barat', '', NULL),
(117, 'Kota Banjar', 'Prov. Jawa Barat', '', NULL),
(118, 'Prov. Banten', 'Prov. Banten', '', NULL),
(119, 'Kab. Pandeglang', 'Prov. Banten', '', NULL),
(120, 'Kab. Lebak', 'Prov. Banten', '', NULL),
(121, 'Kab. Tangerang', 'Prov. Banten', '', NULL),
(122, 'Kab. Serang', 'Prov. Banten', '', NULL),
(123, 'Kota Cilegon', 'Prov. Banten', '', NULL),
(124, 'Kota Tangerang', 'Prov. Banten', '', NULL),
(125, 'Kota Serang', 'Prov. Banten', '', NULL),
(126, 'Kota Tangerang Selatan', 'Prov. Banten', '', NULL),
(127, 'Prov. Jawa Tengah', 'Prov. Jawa Tengah', '', NULL),
(128, 'Kab. Cilacap', 'Prov. Jawa Tengah', '', NULL),
(129, 'Kab. Banyumas', 'Prov. Jawa Tengah', '', NULL),
(130, 'Kab. Purbalingga', 'Prov. Jawa Tengah', '', NULL),
(131, 'Kab. Banjarnegara', 'Prov. Jawa Tengah', '', NULL),
(132, 'Kab. Kebumen', 'Prov. Jawa Tengah', '', NULL),
(133, 'Kab. Purworejo', 'Prov. Jawa Tengah', '', NULL),
(134, 'Kab. Wonosobo', 'Prov. Jawa Tengah', '', NULL),
(135, 'Kab. Magelang', 'Prov. Jawa Tengah', '', NULL),
(136, 'Kab. Boyolali', 'Prov. Jawa Tengah', '', NULL),
(137, 'Kab. Klaten', 'Prov. Jawa Tengah', '', NULL),
(138, 'Kab. Sukoharjo', 'Prov. Jawa Tengah', '', NULL),
(139, 'Kab. Wonogiri', 'Prov. Jawa Tengah', '', NULL),
(140, 'Kab. Karanganyar', 'Prov. Jawa Tengah', '', NULL),
(141, 'Kab. Sragen', 'Prov. Jawa Tengah', '', NULL),
(142, 'Kab. Grobogan', 'Prov. Jawa Tengah', '', NULL),
(143, 'Kab. Blora', 'Prov. Jawa Tengah', '', NULL),
(144, 'Kab. Rembang', 'Prov. Jawa Tengah', '', NULL),
(145, 'Kab. Pati', 'Prov. Jawa Tengah', '', NULL),
(146, 'Kab. Kudus', 'Prov. Jawa Tengah', '', NULL),
(147, 'Kab. Jepara', 'Prov. Jawa Tengah', '', NULL),
(148, 'Kab. Demak', 'Prov. Jawa Tengah', '', NULL),
(149, 'Kab. Semarang', 'Prov. Jawa Tengah', '', NULL),
(150, 'Kab. Temanggung', 'Prov. Jawa Tengah', '', NULL),
(151, 'Kab. Kendal', 'Prov. Jawa Tengah', '', NULL),
(152, 'Kab. Batang', 'Prov. Jawa Tengah', '', NULL),
(153, 'Kab. Pekalongan', 'Prov. Jawa Tengah', '', NULL),
(154, 'Kab. Pemalang', 'Prov. Jawa Tengah', '', NULL),
(155, 'Kab. Tegal', 'Prov. Jawa Tengah', '', NULL),
(156, 'Kab. Brebes', 'Prov. Jawa Tengah', '', NULL),
(157, 'Kota Magelang', 'Prov. Jawa Tengah', '', NULL),
(158, 'Kota Surakarta', 'Prov. Jawa Tengah', '', NULL),
(159, 'Kota Salatiga', 'Prov. Jawa Tengah', '', NULL),
(160, 'Kota Semarang', 'Prov. Jawa Tengah', '', NULL),
(161, 'Kota Pekalongan', 'Prov. Jawa Tengah', '', NULL),
(162, 'Kota Tegal', 'Prov. Jawa Tengah', '', NULL),
(163, 'Prov. D.I. Yogyakarta', 'Prov. D.I. Yogyakarta', '', NULL),
(164, 'Kab. Bantul', 'Prov. D.I. Yogyakarta', '', NULL),
(165, 'Kab. Sleman', 'Prov. D.I. Yogyakarta', '', NULL),
(166, 'Kab. Gunung Kidul', 'Prov. D.I. Yogyakarta', '', NULL),
(167, 'Kab. Kulon Progo', 'Prov. D.I. Yogyakarta', '', NULL),
(168, 'Kota Yogyakarta', 'Prov. D.I. Yogyakarta', '', NULL),
(169, 'Prov. Jawa Timur', 'Prov. Jawa Timur', '', NULL),
(170, 'Kab. Gresik', 'Prov. Jawa Timur', '', NULL),
(171, 'Kab. Sidoarjo', 'Prov. Jawa Timur', '', NULL),
(172, 'Kab. Mojokerto', 'Prov. Jawa Timur', '', NULL),
(173, 'Kab. Jombang', 'Prov. Jawa Timur', '', NULL),
(174, 'Kab. Bojonegoro', 'Prov. Jawa Timur', '', NULL),
(175, 'Kab. Tuban', 'Prov. Jawa Timur', '', NULL),
(176, 'Kab. Lamongan', 'Prov. Jawa Timur', '', NULL),
(177, 'Kab. Madiun', 'Prov. Jawa Timur', '', NULL),
(178, 'Kab. Ngawi', 'Prov. Jawa Timur', '', NULL),
(179, 'Kab. Magetan', 'Prov. Jawa Timur', '', NULL),
(180, 'Kab. Ponorogo', 'Prov. Jawa Timur', '', NULL),
(181, 'Kab. Pacitan', 'Prov. Jawa Timur', '', NULL),
(182, 'Kab. Kediri', 'Prov. Jawa Timur', '', NULL),
(183, 'Kab. Nganjuk', 'Prov. Jawa Timur', '', NULL),
(184, 'Kab. Blitar', 'Prov. Jawa Timur', '', NULL),
(185, 'Kab. Tulungagung', 'Prov. Jawa Timur', '', NULL),
(186, 'Kab. Trenggalek', 'Prov. Jawa Timur', '', NULL),
(187, 'Kab. Malang', 'Prov. Jawa Timur', '', NULL),
(188, 'Kab. Pasuruan', 'Prov. Jawa Timur', '', NULL),
(189, 'Kab. Probolinggo', 'Prov. Jawa Timur', '', NULL),
(190, 'Kab. Lumajang', 'Prov. Jawa Timur', '', NULL),
(191, 'Kab. Bondowoso', 'Prov. Jawa Timur', '', NULL),
(192, 'Kab. Situbondo', 'Prov. Jawa Timur', '', NULL),
(193, 'Kab. Jember', 'Prov. Jawa Timur', '', NULL),
(194, 'Kab. Banyuwangi', 'Prov. Jawa Timur', '', NULL),
(195, 'Kab. Pamekasan', 'Prov. Jawa Timur', '', NULL),
(196, 'Kab. Sampang', 'Prov. Jawa Timur', '', NULL),
(197, 'Kab. Sumenep', 'Prov. Jawa Timur', '', NULL),
(198, 'Kab. Bangkalan', 'Prov. Jawa Timur', '', NULL),
(199, 'Kota Surabaya', 'Prov. Jawa Timur', '', NULL),
(200, 'Kota Malang', 'Prov. Jawa Timur', '', NULL),
(201, 'Kota Madiun', 'Prov. Jawa Timur', '', NULL),
(202, 'Kota Kediri', 'Prov. Jawa Timur', '', NULL),
(203, 'Kota Mojokerto', 'Prov. Jawa Timur', '', NULL),
(204, 'Kota Blitar', 'Prov. Jawa Timur', '', NULL),
(205, 'Kota Pasuruan', 'Prov. Jawa Timur', '', NULL),
(206, 'Kota Probolinggo', 'Prov. Jawa Timur', '', NULL),
(207, 'Kota Batu', 'Prov. Jawa Timur', '', NULL),
(208, 'Aceh', 'Aceh', '', NULL),
(209, 'Sumatera Utara', 'Sumatera Utara', '', NULL),
(210, 'Sumatera Barat', 'Sumatera Barat', '', NULL),
(211, 'Riau', 'Riau', '', NULL),
(212, 'Jambi', 'Jambi', '', NULL),
(213, 'Sumatera Selatan', 'Sumatera Selatan', '', NULL),
(214, 'Lampung', 'Lampung', '', NULL),
(215, 'Kalimantan Barat', 'Kalimantan Barat', '', NULL),
(216, 'Kalimanatan Tengah', 'Kalimanatan Tengah', '', NULL),
(217, 'Kalimantan Selatan', 'Kalimantan Selatan', '', NULL),
(218, 'Kalimantan Timur', 'Kalimantan Timur', '', NULL),
(219, 'Sulawesi Utara', 'Sulawesi Utara', '', NULL),
(220, 'Sulawesi Tengah', 'Sulawesi Tengah', '', NULL),
(221, 'Sulawesi Selatan', 'Sulawesi Selatan', '', NULL),
(222, 'Sulawesi Tenggara', 'Sulawesi Tenggara', '', NULL),
(223, 'Maluku', 'Maluku', '', NULL),
(224, 'Bali', 'Bali', '', NULL),
(225, 'Nusa Tenggara Barat', 'Nusa Tenggara Barat', '', NULL),
(226, 'Nusa Tenggara Timur', 'Nusa Tenggara Timur', '', NULL),
(227, 'Papua', 'Papua', '', NULL),
(228, 'Bengkulu', 'Bengkulu', '', NULL),
(229, 'Maluku Utara', 'Maluku Utara', '', NULL),
(230, 'Banten', 'Banten', '', NULL),
(231, 'Kep. Bangka Belitung', 'Kep. Bangka Belitung', '', NULL),
(232, 'Gorontalo', 'Gorontalo', '', NULL),
(233, 'Kep. Riau', 'Kep. Riau', '', NULL),
(234, 'Papua Barat ', 'Papua Barat ', '', NULL),
(235, 'Sulawesi Barat', 'Sulawesi Barat', '', NULL),
(236, 'Kec. Mijen', 'Kab. Semarang', '', ''),
(237, 'Kec. Ngaliyan', 'Kab. Semarang', '', ''),
(238, 'Kec. Banyumanik', 'Kab. Semarang', '', ''),
(239, 'Kec. Tembalang', 'Kab. Semarang', '', ''),
(240, 'Kec. Semarang Utara', 'Kota Semarang', '', ''),
(241, 'Kec. Genuk', 'Kota Semarang', '', ''),
(242, 'Kec. Tugu', 'Kota Semarang', '', ''),
(243, 'Kec. Semarang Barat', 'Kota Semarang', '', ''),
(244, 'Kec. Semarang Selatan', 'Kota Semarang', '', ''),
(245, 'Kec. Candisari', 'Kota Semarang', '', '');

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
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '2015-12-28 18:08:27'),
(14, 'keuangan', '', 'a4151d4b2856ec63368a7c784b1f0a6e', 2, '', '2015-12-07 19:08:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akomodasi_tamu`
--
ALTER TABLE `tb_akomodasi_tamu`
  ADD PRIMARY KEY (`id_akomodasi`);

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
-- Indexes for table `tb_pelaksana_temp`
--
ALTER TABLE `tb_pelaksana_temp`
  ADD PRIMARY KEY (`id_pelaksana`);

--
-- Indexes for table `tb_repres`
--
ALTER TABLE `tb_repres`
  ADD PRIMARY KEY (`id_repres`);

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
-- AUTO_INCREMENT for table `tb_akomodasi_tamu`
--
ALTER TABLE `tb_akomodasi_tamu`
  MODIFY `id_akomodasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_bahanbakar`
--
ALTER TABLE `tb_bahanbakar`
  MODIFY `id_bbm` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_gol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=427;
--
-- AUTO_INCREMENT for table `tb_pejabat_ttd`
--
ALTER TABLE `tb_pejabat_ttd`
  MODIFY `id_pejabat_ttd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pelaksana`
--
ALTER TABLE `tb_pelaksana`
  MODIFY `id_pelaksana` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=636;
--
-- AUTO_INCREMENT for table `tb_repres`
--
ALTER TABLE `tb_repres`
  MODIFY `id_repres` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_skpd`
--
ALTER TABLE `tb_skpd`
  MODIFY `id_skpd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `tb_sppd`
--
ALTER TABLE `tb_sppd`
  MODIFY `id_sppd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id_tempat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `tb_unitkerja`
--
ALTER TABLE `tb_unitkerja`
  MODIFY `id_unitkerja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
