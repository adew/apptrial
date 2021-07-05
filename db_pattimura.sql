-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 02:28 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apptrial1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id` int(11) NOT NULL,
  `jenis_cuti` varchar(150) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`id`, `jenis_cuti`, `deskripsi`) VALUES
(4, 'Cuti Tahunan', 'Cuti Tahunan'),
(5, 'Cuti Sakit', 'Cuti Sakit'),
(6, 'Cuti Karena Alasan Penting', 'Cuti Karena Alasan Penting'),
(7, 'Cuti Besar', 'Cuti Besar'),
(8, 'Cuti Melahirkan', 'Cuti Melahirkan'),
(9, 'Cuti Di Luar Tanggungan Negara', 'Cuti Di Luar Tanggungan Negara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `jabatan`, `deskripsi`) VALUES
(4, 'Kepala Pengadilan Tingkat Pertama Klas A ', 'Kepala Pengadilan Tingkat Pertama Klas A '),
(5, 'Wakil Kepala Pengadilan Militer ', 'Wakil Kepala Pengadilan Militer '),
(6, 'Panitera Tingkat Pertama Klas A ', 'Panitera Tingkat Pertama Klas A '),
(7, 'Sekretaris Tingkat Pertama Tipe A ', 'Sekretaris Tingkat Pertama Tipe A '),
(8, 'Hakim Militer ', 'Hakim Militer '),
(9, 'Panitera Muda Tingkat Pertama Klas A ', 'Panitera Muda Tingkat Pertama Klas A '),
(10, 'Kepala Sub Bagian ', 'Kepala Sub Bagian '),
(11, 'Panitera Pengganti Tingkat Pertama ', 'Panitera Pengganti Tingkat Pertama '),
(12, 'Analis Perencanaan, Evaluasi dan Pelaporan', 'Analis Perencanaan, Evaluasi dan Pelaporan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jatah_cuti`
--

CREATE TABLE `tb_jatah_cuti` (
  `id` int(11) NOT NULL,
  `c_nip` varchar(25) NOT NULL,
  `c_tahun` int(5) NOT NULL,
  `c_tahunan_pakai` int(5) NOT NULL,
  `c_tahunan_kuota` int(5) NOT NULL,
  `c_besar_pakai` int(5) NOT NULL,
  `c_besar_kuota` int(5) NOT NULL,
  `c_sakit_pakai` int(5) NOT NULL,
  `c_sakit_kuota` int(5) NOT NULL,
  `c_lahir_pakai` int(5) NOT NULL,
  `c_lahir_kuota` int(5) NOT NULL,
  `c_alpen_pakai` int(5) NOT NULL,
  `c_alpen_kuota` int(5) NOT NULL,
  `c_dtn_pakai` int(5) NOT NULL,
  `c_dtn_kuota` int(5) NOT NULL,
  `creat_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_cuti`
--

CREATE TABLE `tb_pengajuan_cuti` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `masa_kerja` varchar(25) NOT NULL,
  `nomor_hp` varchar(25) NOT NULL,
  `tgl_awal` varchar(25) NOT NULL,
  `tgl_akhir` varchar(25) NOT NULL,
  `lama_cuti` int(25) NOT NULL,
  `saldo_cuti` int(25) NOT NULL,
  `jenis_cuti` varchar(150) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `alamat_cuti` varchar(150) NOT NULL,
  `atasan_langsung` varchar(50) NOT NULL,
  `status_al` smallint(5) NOT NULL,
  `pejabat_berwenang` varchar(50) NOT NULL,
  `status_pb` smallint(5) NOT NULL,
  `status_cuti` smallint(5) NOT NULL,
  `creat_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkp`
--

CREATE TABLE `tb_pkp` (
  `id` int(11) NOT NULL,
  `nip` varchar(150) NOT NULL,
  `bulan` varchar(150) NOT NULL,
  `file_pkp` varchar(150) NOT NULL,
  `skor` smallint(3) NOT NULL,
  `creat_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `unit_kerja` text NOT NULL,
  `foto_profil` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `last_login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `nip`, `jabatan`, `unit_kerja`, `foto_profil`, `email`, `password`, `role`, `last_login`) VALUES
(28, '', 'Kolonel SULTAN, S.H. ', '11980017760771', 'Kepala Pengadilan Militer ', 'Pengadilan Militer III - 18 Ambon  5', 'nopic.png', '', '$2y$10$zajJoURjdz5H/tu0LD1LkuNu6FdaTGU/Ei2ngcOrCZX6Ld6eAX/DC', 0, '22-06-2021 14:35'),
(39, '', 'Letkol MUH ARIF ZAKI IBRAHIM, S.H.', '524420', 'Wakil Kepala Pengadilan Militer ', 'Pengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$nu/FKQJY4O.l8Ez4e6sbnegt.Ffn1IzVqAnUcR64GD0TdTwjrv2da', 0, '07-06-2021 13:46'),
(40, '', 'ASIS, S.Kom, S.H. ', '198309252006041003', 'Kepala Sub Bagian mm', 'Sub Bagian Kepegawaian, Organisasi, Dan Tata Laksana\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$zajJoURjdz5H/tu0LD1LkuNu6FdaTGU/Ei2ngcOrCZX6Ld6eAX/DC', 1, '22-06-2021 14:36'),
(41, '', 'HENDRI DUNAN MUSKITTA, S.H. ', '197602231998031001', 'Kepala Sub Bagian ', 'Sub Bagian Umum Dan Keuangan\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$zjkJ4uFHkPw.RXoLXn84TOC.u2Jq6aVk7Ql4sk7Qt5pRaL3Ds/PXC', 0, '26-05-2021 21:10'),
(42, '', 'RACHEL AGUSTINA PATTY, S.H. ', '197001251990032001', 'Kepala Sub Bagian ', 'Sub Bagian Perencanaan Teknologi Informasi, Dan Pelaporan\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$QNAvvmz1aJpp/J1usf5Mi.7Li0syRkf/yQhwgAuHG0KUZ5UadHoym', 0, ''),
(43, '', 'May. FARID ISKANDAR, S.H., M.H.', '11060001420579', 'Sekretaris Tingkat Pertama Tipe A', 'Sekretaris\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$FAYt97XvqCMuNs5g8F4Y..4zL2gQSOKoTVovIQFdW4k6qXYf/PXrS', 0, ''),
(45, '', 'MUHAMMAD IMAM S, S.H. ', '199205302019031006', 'Analis Perkara Peradilan ', 'Panitera Muda Pidana\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$P2549UgfjcQ3fC./qtY2N.Jz9oUKGQMG.gMpG1457eOeFHDFuCHFu', 1, '07-06-2021 15:01'),
(46, '', 'ARFYAN WIGGA JULADHA, S.H. ', '198807242019031005', 'Analis Sumber Daya Manusia Aparatur ', 'Sub Bagian Kepegawaian, Organisasi, Dan Tata Laksana\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$UGPsTSB2gTWu2VwTw2b6eeJDfxQRgoi49cvnZVXMskeAsAlzV3Kuu', 1, '08-06-2021 14:23'),
(47, '', 'May. DEDI WIGANDI, S.Sos, S.H. ', '21940135750972', 'Panitera Tingkat Pertama Klas A ', 'Panitera\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$Ve5khKEKLmuTJxsQyf8/IeeLd./w/PTmbJ8s9JIOO2mY8gLx3FN1K', 0, '22-06-2021 14:57'),
(49, '', 'May. JASDAR, S.H., M.H.', '11030004260776', 'Hakim Militer', 'Pengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$Gphg6BuZNZ7ls45EAcE/teav0l.TVM7YZkeNyKw.lnSaqITPEF3MO', 0, ''),
(50, '', 'May. ARIF KUSNANDAR, S.H. ', '11030028510981', 'Hakim Militer ', 'Pengadilan Militer III - 18 Ambon\r\n', 'nopic.png', '', '$2y$10$w2sFvI83.m55jn2eFLs/K.BO.m6w/2opIbEcu9cbCHuu5bBdFPCnq', 0, ''),
(51, '', 'Lettu ADRIANUS, S.H.', '21960347511275', 'Panitera Muda Tingkat Pertama Klas A', 'Panitera Muda Pidana\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$sE2Twxkd9z.QEcYNviCQoOZvWnULQc5HrmWO6oFUxIiQiS5cNitLO', 0, '23-06-2021 13:16'),
(52, '', 'Kapt. AYIK TRIANDI ASMARA, S.H. ', '21990110790279', 'Panitera Muda Tingkat Pertama Klas A ', 'Panitera Muda Hukum\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$sjXdKdgYbpnzMCSoFwqelOcsXlosfsAkh00HcTC5XUsP6t4gOq3kW', 0, ''),
(53, '', 'Letda RISKA DORI, S.H. ', '21010058540582', 'Panitera Pengganti Tingkat Pertama', 'Panitera\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$sE2Twxkd9z.QEcYNviCQoOZvWnULQc5HrmWO6oFUxIiQiS5cNitLO', 0, ''),
(54, '', 'NOVA KARTIKA SARI, S.Pd., S.H. ', '198111012005022002', 'Analis Perencanaan, Evaluasi dan Pelaporan ', 'Sub Bagian Perencanaan Teknologi Informasi, Dan Pelaporan\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$abYbhnf2vDKO8o4GrVIu0Of6Hv9ByN0m8FxuAZPsOL571vONfcRiK', 0, ''),
(55, '', 'RINA DEBY JEAN WATTIMURY, S.H., M.H. ', '197304012006042001', 'Analis Akuntabilitas Kinerja Aparatur ', 'Sub Bagian Perencanaan Teknologi Informasi, Dan Pelaporan\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$Aa07LCDscTT7ypL.6naPueveeyf29wV/KrGdlYdfCEqEnHNDFSbRK', 0, ''),
(56, '', 'RIO MATAUSEJA, S.H. ', '199005182009041001', 'Analis Perkara Peradilan ', 'Panitera Muda Pidana\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$qZWXyyz.tbD.W/uVbgzi6e.sBTLykXQAjfap6Gz1d5ikQla6jBdWW', 0, ''),
(57, '', 'MUSA JOHN MAATURWEY, S.H. ', '196706061998031004', 'Analis Perkara Peradilan ', 'Panitera Muda Hukum\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$bWp1.9cYhrtTMd3uPahw3u9lKC5tjxzmYieKKilfKGIgSM1l.R23W', 0, ''),
(58, '', 'RICHARDO THENU ', '197707241998031002', 'Pengadministrasi Registrasi Perkara ', 'Panitera Muda Hukum\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$i70NxieSvvQey8NDd22ItunAv0jbYFneQH.hs7R1ZNQAmCT29W2Y6', 0, ''),
(59, '', 'NOVA PRIHASTUTI, S.H. ', '198411272011012015', 'Bendahara Tingkat Pertama ', 'Sub Bagian Umum Dan Keuangan\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$LG.XaqKBEsUUAiP273XLs./VTaQg.kty4pOOD9Jkg64bxALEWy7hW', 0, ''),
(60, '', 'STANY RAPRAP, S.H. ', '198712022006042001', 'Penyusun laporan Keuangan ', 'Sub Bagian Umum Dan Keuangan\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$xcBQiLkh4FHN/hzAqoo69.LQqP.nZovDA9wk4WDlEgEGcfpyNbMt.', 0, ''),
(61, '', 'AVIAN SEPTIANDHANU, S.IAN. ', '199509232019031009', 'Analis Kepegawaian Pertama ', 'Sub Bagian Kepegawaian, Organisasi, Dan Tata Laksana\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$E5IkMa96dnqOY.VNAR2R6.FmD36q8.pha16VoMoErR4l8ZsuqiIGC', 0, ''),
(62, '', 'MUHAMMAD ADIB HADRIANSYAH, S.E. ', '199207192020121006', 'Verifikator Keuangan ', 'Sub Bagian Umum Dan Keuangan\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$CQxR3GNh0f1/wJE.crQSb.cQL9JGLcd554OgWHgs8TgFrtDEgvZWG', 0, ''),
(63, '', 'FIERE GOUBERVEN HARINDAH ', '197804042006041003', 'Pengadministrasi Kepegawaian ', 'Sub Bagian Kepegawaian, Organisasi, Dan Tata Laksana\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$1WaAH18J4cFZH434FTRJQ.xjKmhGxX.ihXKgctn38Jp4FA3h5qJJe', 0, ''),
(64, '', 'ADE WIDIANTO, A.Md. ', '199009182020121002', 'Pengadministrasi Registrasi Perkara', 'Panitera Muda Pidana\r\nPengadilan Militer III - 18 Ambon ', 'user1-128x128.jpg', '', '$2y$10$IbWFgUbZlexqFPyzxB6qT.dKQbuRIiv4XwgfeFE5WopeFVSKzQOhS', 1, '24-06-2021 9:15'),
(65, '', 'Serka HENDRA YANTO, S.H. ', '21080776901187', 'Pengelola Perkara ', 'Panitera Muda Pidana\r\nPengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$IJeHzPDNPrBN1i3JCmAHz.83KfHz2OOmLBErRTwgxckyr5rcDQbdq', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jatah_cuti`
--
ALTER TABLE `tb_jatah_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan_cuti`
--
ALTER TABLE `tb_pengajuan_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pkp`
--
ALTER TABLE `tb_pkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_jatah_cuti`
--
ALTER TABLE `tb_jatah_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pengajuan_cuti`
--
ALTER TABLE `tb_pengajuan_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_pkp`
--
ALTER TABLE `tb_pkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
