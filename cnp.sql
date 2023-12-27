-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 01:33 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnp`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `nim` varchar(20) NOT NULL,
  `KTP` varchar(200) NOT NULL,
  `KK` varchar(200) NOT NULL,
  `Transkrip_nilai` varchar(200) NOT NULL,
  `Ijazah` varchar(200) NOT NULL,
  `pas_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`nim`, `KTP`, `KK`, `Transkrip_nilai`, `Ijazah`, `pas_foto`) VALUES
('202222012', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `broadcast`
--

CREATE TABLE `broadcast` (
  `id_broadcast` int(11) NOT NULL,
  `id_perusahaan` varchar(20) NOT NULL,
  `judul_broadcast` varchar(200) NOT NULL,
  `tgl_broadcast` date NOT NULL,
  `dateline_broadcast` date NOT NULL,
  `isi_broadcast` text NOT NULL,
  `contact_broadcast` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broadcast`
--

INSERT INTO `broadcast` (`id_broadcast`, `id_perusahaan`, `judul_broadcast`, `tgl_broadcast`, `dateline_broadcast`, `isi_broadcast`, `contact_broadcast`) VALUES
(1, 'Meta', '-2 PROGRAMMER JAVA', '2023-12-26', '2023-12-27', '<div>dibutuhkan 2 orang programmer yang menguasai bahasa pemograman java</div>', '085374355822');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_bekerja` varchar(25) NOT NULL DEFAULT 'Belum Ditempatkan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `prodi`, `alamat`, `nomor_hp`, `email`, `tempat_lahir`, `agama`, `tanggal_lahir`, `status_bekerja`) VALUES
('202222012', 'Administrasi Bisnis', '1q3121221', '121212', '121212@12.12', '1212', 'Kristen', '0121-02-12', 'Belum Bekerja'),
('202222013', 'Administrasi Bisnis', '1q3121221', '121212', '121212@12.12', '1212', 'Kristen', '0121-02-12', 'Belum Bekerja'),
('202222015', 'Komputerisasi Akuntansi', 'jl riyau', '09712', 'raihan@s.c', 'colombus', 'Kristen', '1332-12-12', 'Belum Bekerja');

-- --------------------------------------------------------

--
-- Table structure for table `penempatan`
--

CREATE TABLE `penempatan` (
  `id_penempatan` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_perusahaan` varchar(20) NOT NULL,
  `posisi` varchar(25) NOT NULL,
  `tanggal_penempatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penempatan`
--

INSERT INTO `penempatan` (`id_penempatan`, `nim`, `id_perusahaan`, `posisi`, `tanggal_penempatan`) VALUES
(2, '202222012', 'Meta', 'Software Development', '2023-12-27'),
(3, '202222013', 'Meta', 'CEO', '2023-12-26'),
(4, '202222012', 'Meta', 'TES', '2023-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` varchar(30) NOT NULL,
  `nama_perusahaan` varchar(35) NOT NULL,
  `alamat_perusahaan` varchar(30) NOT NULL,
  `bidang_perusahaan` varchar(50) NOT NULL,
  `nomor_perusahaan` varchar(25) NOT NULL,
  `nama_PIC` varchar(50) NOT NULL,
  `nomor_PIC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`, `bidang_perusahaan`, `nomor_perusahaan`, `nama_PIC`, `nomor_PIC`) VALUES
('12', '12', '12', '12', '12', '12', '21'),
('Meta', 'Meta Platforms, Inc.', '', 'Software Development', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `password`, `status`) VALUES
('12', '12', 'c20ad4d76fe97759aa27a0c99bff6710', 'Perusahaan'),
('202222012', 'Raihan Rivana Putra', 'daa6b8d04ce72d953d5501adc53ddd82', 'Mahasiswa'),
('202222013', 'Grace', 'd2f141f3759cb310f915786eabe0cb69', 'Mahasiswa'),
('admin', 'Raihan Rivana Putra', 'daa6b8d04ce72d953d5501adc53ddd82', 'Admin'),
('meta', 'Mark Elliot Zuckerberg ', 'e9a23cbc455158951716b440c3d165e0', 'Perusahaan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD PRIMARY KEY (`id_broadcast`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id_penempatan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD UNIQUE KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
  MODIFY `id_broadcast` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id_penempatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
