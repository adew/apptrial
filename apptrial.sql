-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 01:21 AM
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
-- Database: `apptrial`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(10) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal_masuk` varchar(20) NOT NULL,
  `tanggal_keluar` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id`, `id_transaksi`, `tanggal_masuk`, `tanggal_keluar`, `lokasi`, `kode_barang`, `nama_barang`, `satuan`, `jumlah`) VALUES
(1, 'WG-201713067948', '8/11/2017', '11/11/2017', 'NTB', '8888166995215', 'Ciki Walens', 'Dus', '50'),
(2, 'WG-201713067948', '8/11/2017', '11/12/2017', 'NTB', '8888166995215', 'Ciki Walens', 'Dus', '6'),
(3, 'WG-201713549728', '4/11/2017', '11/11/2017', 'Banten', '1923081008002', 'Buku Hiragana', 'Pack', '3'),
(4, 'WG-201774896520', '9/11/2017', '12/11/2017', 'Yogyakarta', '60201311121008264', 'Battery ZTE', 'Dus', '3'),
(5, 'WG-201727134650', '05/12/2017', '20/12/2017', 'Jakarta', '29312390203', 'Susu', 'Dus', '17'),
(6, 'WG-201810974628', '15/01/2018', '16/01/2018', 'Lampung', '1923081008002', 'Buku Nihongo', 'Dus', '50'),
(7, 'WG-201781267543', '7/11/2017', '17/01/2018', 'Yogyakarta', '97897952889', 'Buku Framework Codeigniter', 'Dus', '1'),
(8, 'WG-201832570869', '15/01/2018', '17/01/2018', 'Bali', '1923081008002', 'test', 'Dus', '10'),
(9, 'WG-201893850472', '15/01/2018', '18/01/2018', 'Bali', '1923081008002', 'lumpur nartugo', 'Pcs', '11'),
(10, 'WG-201781267543', '7/11/2017', '15/01/2018', 'Yogyakarta', '97897952889', 'Buku Framework Codeigniter', 'Dus', '1'),
(11, 'WG-201727134650', '05/12/2017', '15/01/2018', 'Jakarta', '29312390203', 'Susu', 'Dus', '3'),
(12, 'WG-201774896520', '9/11/2017', '15/01/2018', 'Yogyakarta', '60201311121008264', 'Battery ZTE', 'Dus', '3'),
(13, 'WG-201727134650', '05/12/2017', '16/01/2018', 'Jakarta', '29312390203', 'Susu', 'Dus', '1'),
(14, 'WG-201727134650', '05/12/2017', '17/01/2018', 'Jakarta', '29312390203', 'Susu', 'Dus', '1'),
(15, 'WG-201885472106', '18/01/2018', '19/01/2018', 'Riau', '8996001600146', 'Teh Pucuk', 'Dus', '50'),
(16, 'WG-201871602934', '18/01/2018', '16/03/2018', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '10');

--
-- Triggers `tb_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `TG_BARANG_KELUAR` AFTER INSERT ON `tb_barang_keluar` FOR EACH ROW BEGIN
 UPDATE tb_barang_masuk SET jumlah=jumlah-NEW.jumlah
 WHERE kode_barang=NEW.kode_barang;
 DELETE FROM tb_barang_masuk WHERE jumlah = 0;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_transaksi`, `tanggal`, `lokasi`, `kode_barang`, `nama_barang`, `satuan`, `jumlah`) VALUES
('WG-201871602934', '18/01/2018', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '90');

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
(2, 'Bulanan', 'Bulan depan');

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
(1, '123', '02', 'ADE_WID02-05-2021_092036.docx', 21, '0000-00-00'),
(2, '123', '02', 'ADE_WID02-05-2021_092115.docx', 12, '0000-00-00'),
(3, '123', '02', 'ADE_WID02-05-2021_092255.docx', 54, '02-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `kode_satuan` varchar(100) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `kode_satuan`, `nama_satuan`) VALUES
(1, 'Dus', 'Dus'),
(2, 'Pcs', 'Pcs'),
(5, 'Pack', 'Pack');

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
(28, '', 'ADE WIDIANTO, A.Md. ', '123', 'Pengadministrasi Registrasi Perkara ', 'Panitera Muda Pidana Pengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$FPI7dkS9F3MtlOfW1v9D1.hA2zXLdJnFO245tTbSYFf.sbZTdd7QC', 1, '02-05-2021 3:22'),
(38, '', 'Kol. SULTAN, S.H.', '11980017760771', 'Kepala Pengadilan Tingkat Pertama Klas A', 'Pengadilan Militer III - 18 Ambon', 'nopic.png', '', '$2y$10$ecJs1E8TEds8fmhVx2MnweKq5PTloMkI8YxdbI7nPQEefhOfKHFm6', 0, ''),
(39, '', 'Letkol MUH ARIF ZAKI IBRAHIM, S.H. ', '524420', 'Wakil Kepala Pengadilan Militer ', 'Pengadilan Militer III - 18 Ambon ', 'nopic.png', '', '$2y$10$nu/FKQJY4O.l8Ez4e6sbnegt.Ffn1IzVqAnUcR64GD0TdTwjrv2da', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

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
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

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
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pkp`
--
ALTER TABLE `tb_pkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_upload_gambar_user`
--
ALTER TABLE `tb_upload_gambar_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
