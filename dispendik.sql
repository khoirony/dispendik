-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 04:15 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dispendik`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_keluar`
--

CREATE TABLE `arsip_keluar` (
  `id_arkel` int(4) NOT NULL,
  `nmr_surat` varchar(50) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_masuk`
--

CREATE TABLE `arsip_masuk` (
  `id_armas` int(4) NOT NULL,
  `nmr_surat` varchar(50) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(4) NOT NULL,
  `username` char(15) NOT NULL,
  `password` char(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `foto`) VALUES
(1001, 'admin', 'admin', 'admin1.jpg'),
(1002, 'aku', 'abc', ''),
(1008, 'rony', 'ABC123', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_suratkeluar` int(4) NOT NULL,
  `nmr_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `surat_ke` varchar(500) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `id_pengguna` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratkeluar`, `nmr_surat`, `tgl_surat`, `surat_ke`, `isi`, `id_pengguna`) VALUES
(3001, '420/2072/414.101/2021', '2021-02-23', 'Kepala SD dan SMP Negeri/Swasta Sekabupaten Tuban', 'Permintaan Laporan daftar penyedia SIPLAH sebagai dasar belanja melalui dana BOS', 1001),
(3002, '420/734/414.', '2021-02-03', 'Kepala Badan Pusat Statistik Kabupaten Tuban', 'Data permintaan BPS Kabupaten Tuban Sesuai Surat Nomor : B-35236.006/PBS/9280/01/2021', 1001),
(3003, '420/7384/414.101/2020', '2020-11-11', 'Kepala BPPKAD Kabupaten Tuban', 'Usulan Bendahara Dana Bantuan Operasional Sekolah Pada Satuan Pendidikan Negeri Di Kabupaten Tuban', 1001),
(3004, '420/8076/414.101/2020', '2020-12-04', 'Kepala BAPPEDA Kabupaten Tuban', 'Perubahan Rencana Kerja Dinas Pendidikan Kabupaten Tuban Tahun 2020', 1001),
(3005, '420/0171/414.101/2021', '2021-01-06', 'Kordik Kecamatan Se-Kabupaten Tuban', 'Informasi Pengajuan NPSN', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_suratmasuk` int(4) NOT NULL,
  `nmr_surat` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `surat_dari` varchar(500) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `id_pengguna` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratmasuk`, `nmr_surat`, `tgl_surat`, `tgl_masuk`, `surat_dari`, `isi`, `id_pengguna`) VALUES
(2001, '03/TKwidyatbn/1/2021', '2021-02-08', '2021-02-09', 'TK Widya Kusuma', 'Pengajuan Sertif NPSN', 1001),
(2002, '700/538/414.060/2021', '2021-02-10', '2021-02-10', 'SEKDA TUBAN', 'Pemberitahuan dan jadwal review LK-SKPD Tahun Anggaran 2020', 1001),
(2003, '710/502/414.060/2021', '2021-02-10', '2021-02-10', 'SEKDA TUBAN', 'Pengisian instrumen LKE Zona Integritas Tahun 2021', 1001),
(2004, '800/589/414.202/2021', '2021-02-10', '2021-02-10', 'SEKDA TUBAN', 'Larangan bagi asn untuk berafilisai dengan dan/atau mendukung organisasi terlarang dan/atau organisasi kemasyarakatan yang dicabut status hukumnya', 1001),
(2005, '800/561/414.202/2021', '2021-02-05', '2021-02-10', 'SEKDA TUBAN', 'Permintaan data pelaporan penilaian prestasi kerja PNS Th 2020', 1001),
(2006, '005/653/414.203/2021', '2021-02-11', '2021-02-11', 'SEKDA TUBAN', 'Undangan rapat koordinasi penyesuaian dana alokasi khusus', 1001),
(2007, '080/TU/SMPICT/11/2021', '2021-02-11', '2021-02-11', 'Yayasan Darul Quran SMP Insan Tuban Cendekia', 'Pengajuan NPSN baru', 1001),
(2008, '005/647/414.201/2021', '2021-02-10', '2021-02-11', 'SEKDA TUBAN', 'Undangan Musrenbang', 1001),
(2009, '367/600/414.012/2021', '2021-02-08', '2021-02-11', 'BUPATI TUBAN', 'Pemberlakuan pembatasan kegiatan masyarakat berbasis mikro dan pembentukan posko penanganan covid di tingkat desa dan kelurahan untuk pengendalian covid', 1001),
(2010, '005/698/414.011/2021', '2021-02-15', '2021-02-16', 'SEKDA TUBAN', 'Harap menghadirkan pajabat/staf yang menangani serta membawa hardcopy rangkap dua', 1001),
(2011, '35236.009/BPS/9280/02/2021', '2021-02-16', '2021-02-18', 'Badan Pusat Statistik Kabupaten Tuban', 'Undangan FGD data publikasi kabupaten tuban dalam angka 2021 via zoom', 1001),
(2012, '120.04/697/414.011/2021', '2021-02-17', '2021-02-18', 'SEKDA TUBAN', 'Penyusunan LPPD TA 2020', 1001),
(2013, '420/092/SMP_TQ/11/2021', '2021-02-15', '2021-02-18', 'Yayasan Darus Sholeh', 'Pengajuan Sertifikat NPSN SMP Tahfidz Quran Darussholeh Rengel Tuban', 1001),
(2014, '050/894/414.203/2021', '2021-02-19', '2021-02-22', 'SEKDA TUBAN', 'Refocussing Anggaran Tahun 2021', 1001),
(2015, '420/282/101.6.22/2021', '2021-02-22', '2021-02-23', 'CABDIN WIL Bojonegoro', 'Pengantar permohonan verval NPYP', 1001),
(2017, '03/TKwidyatbn/1/2021', '2021-02-08', '2021-02-09', 'TK Widya Kusuma', 'Pengajuan Sertif NPSN', 0),
(2018, '03/TKwidyatbn/1/2021', '2021-02-08', '2021-02-09', 'TK Widya Kusuma', 'Pengajuan Sertif NPSN', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_keluar`
--
ALTER TABLE `arsip_keluar`
  ADD PRIMARY KEY (`id_arkel`);

--
-- Indexes for table `arsip_masuk`
--
ALTER TABLE `arsip_masuk`
  ADD PRIMARY KEY (`id_armas`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_keluar`
--
ALTER TABLE `arsip_keluar`
  MODIFY `id_arkel` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arsip_masuk`
--
ALTER TABLE `arsip_masuk`
  MODIFY `id_armas` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_suratkeluar` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3006;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_suratmasuk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
