-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 03:09 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apptrial`
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
(2, 'Bulanan', 'Bulan depan'),
(3, 'Melahirkan', 'Melahirkan');

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
-- Table structure for table `tb_pkp`
--

CREATE TABLE `tb_pkp` (
  `id` int(11) NOT NULL,
  `nip` varchar(150) NOT NULL,
  `bulan` varchar(150) NOT NULL,
  `file_pkp` varchar(150) NOT NULL,
  `skor` smallint(3) NOT NULL,
  `creat_at` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pkp`
--

INSERT INTO `tb_pkp` (`id`, `nip`, `bulan`, `file_pkp`, `skor`, `creat_at`) VALUES
(1, '123', '01', 'ADE_WID02-05-2021_092036.docx', 21, '0000-00-00'),
(2, '123', '02', 'ADE_WID02-05-2021_092115.docx', 12, '0000-00-00'),
(3, '123', '03', 'ADE_WID02-05-2021_092255.docx', 54, '02-05-2021'),
(4, '123', '04', 'ADE_WID03-05-2021_072011.xlsx', 80, '03-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload_gambar_user`
--

CREATE TABLE `tb_upload_gambar_user` (
  `id` int(11) NOT NULL,
  `username_user` varchar(100) NOT NULL,
  `nama_file` varchar(220) NOT NULL,
  `ukuran_file` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_upload_gambar_user`
--

INSERT INTO `tb_upload_gambar_user` (`id`, `username_user`, `nama_file`, `ukuran_file`) VALUES
(1, 'zahidin', 'nopic5.png', '6.33'),
(2, 'test', 'nopic4.png', '6.33'),
(3, 'coba', 'logo_unsada1.jpg', '16.69'),
(4, 'admin', 'nopic2.png', '6.33');

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
(28, '', 'ADE WIDIANTO, A.Md. ', '123', 'Pengadministrasi Registrasi Perkara ', 'Panitera Muda Pidana Pengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$FPI7dkS9F3MtlOfW1v9D1.hA2zXLdJnFO245tTbSYFf.sbZTdd7QC', 1, '05-05-2021 3:04'),
(38, '', 'Kol. SULTAN, S.H.', '11980017760771', 'Kepala Pengadilan Tingkat Pertama Klas A', 'Pengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$ecJs1E8TEds8fmhVx2MnweKq5PTloMkI8YxdbI7nPQEefhOfKHFm6', 0, ''),
(39, '', 'Letkol MUH ARIF ZAKI IBRAHIM, S.H. ', '524420', 'Wakil Kepala Pengadilan Militer ', 'Pengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$nu/FKQJY4O.l8Ez4e6sbnegt.Ffn1IzVqAnUcR64GD0TdTwjrv2da', 0, ''),
(40, '', 'ASIS, S.Kom, S.H. ', '198309252006041003', 'Kepala Sub Bagian ', 'Sub Bagian Kepegawaian, Organisasi, Dan Tata Laksana\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$zajJoURjdz5H/tu0LD1LkuNu6FdaTGU/Ei2ngcOrCZX6Ld6eAX/DC', 0, ''),
(41, '', 'HENDRI DUNAN MUSKITTA, S.H. ', '197602231998031001', 'Kepala Sub Bagian ', 'Sub Bagian Umum Dan Keuangan\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$zjkJ4uFHkPw.RXoLXn84TOC.u2Jq6aVk7Ql4sk7Qt5pRaL3Ds/PXC', 0, ''),
(42, '', 'RACHEL AGUSTINA PATTY, S.H. ', '197001251990032001', 'Kepala Sub Bagian ', 'Sub Bagian Perencanaan Teknologi Informasi, Dan Pelaporan\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$QNAvvmz1aJpp/J1usf5Mi.7Li0syRkf/yQhwgAuHG0KUZ5UadHoym', 0, ''),
(43, '', 'May. FARID ISKANDAR, S.H., M.H.', '11060001420579', 'Sekretaris Tingkat Pertama Tipe A', 'Sekretaris\r\nPengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$FAYt97XvqCMuNs5g8F4Y..4zL2gQSOKoTVovIQFdW4k6qXYf/PXrS', 0, '');

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
-- Indexes for table `tb_pkp`
--
ALTER TABLE `tb_pkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_upload_gambar_user`
--
ALTER TABLE `tb_upload_gambar_user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pkp`
--
ALTER TABLE `tb_pkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_upload_gambar_user`
--
ALTER TABLE `tb_upload_gambar_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
