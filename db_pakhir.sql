-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 01:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(255) NOT NULL,
  `fk_id_mnj` int(255) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `fk_id_mnj`, `nama_kriteria`, `bobot`) VALUES
(1, 0, 'sikap', 7),
(2, 0, 'tanggung_jawab', 4),
(3, 0, 'kompetensi', 5),
(4, 0, 'perencanaan', 1),
(5, 0, 'pengarahan', 1),
(6, 0, 'pemecahan_masalah', 1),
(7, 0, 'kemampuan_interpersonal', 2),
(8, 0, 'komunikasi', 2),
(9, 0, 'Pengorganisasian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(255) NOT NULL,
  `fk_id_manajer` int(255) NOT NULL,
  `n_sikap` float NOT NULL,
  `n_tjawab` float NOT NULL,
  `n_kompetensi` float NOT NULL,
  `n_rencana` float NOT NULL,
  `n_arah` float NOT NULL,
  `n_organisasi` float NOT NULL,
  `n_masalah` float NOT NULL,
  `n_interpersonal` float NOT NULL,
  `n_komunikasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `fk_id_manajer`, `n_sikap`, `n_tjawab`, `n_kompetensi`, `n_rencana`, `n_arah`, `n_organisasi`, `n_masalah`, `n_interpersonal`, `n_komunikasi`) VALUES
(7, 888, 100, 100, 100, 80, 97, 81, 75, 98, 100),
(8, 123, 14, 70, 70, 70, 70, 51, 51, 55, 55),
(9, 1003, 55, 65, 14, 88, 89, 77, 50, 51, 41);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', '1234', 'admin'),
(2, 'master', '1234', 'gm'),
(3, 'manajer', '1234', 'manajer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gm`
--

CREATE TABLE `tb_gm` (
  `id_gm` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gm`
--

INSERT INTO `tb_gm` (`id_gm`, `nama`, `jeniskelamin`, `alamat`, `agama`) VALUES
(0, 'Akmal Ma', 'Pria', 'Shibuya', 'Islam'),
(123, 'akmal', 'Pria', 'asd', 'asd'),
(1004, 'Rosya', 'Wanita', 'Russia', 'Islam'),
(10001, 'Fery Purnama', 'Pria', 'Mayang, Kota Jambi', 'Tidak Meminjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_manajer`
--

CREATE TABLE `tb_manajer` (
  `id_mnj` int(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_manajer`
--

INSERT INTO `tb_manajer` (`id_mnj`, `nama`, `divisi`, `jeniskelamin`, `alamat`, `agama`) VALUES
(123, 'Ash', 'HR', 'Wanita', 'Terra', 'Islam'),
(213, 'Ash', 'Negara', 'Pria', 'Gajah', 'Hindu'),
(888, 'Bonds', 'Agent', 'Pria', 'Shibuya', 'Islam'),
(1002, 'Gnosis', 'Militer', 'Pria', 'Kjreag', 'Islam'),
(1003, 'Mock', 'Militer', 'Wanita', 'Terra', 'Hindu'),
(1212, 'asd', 'Keuangan', 'Pria', 'asd', 'Islam'),
(1512, 'aa', 'asd', 'Pria', 'asddd', 'asd'),
(10001, 'Fery Purnama', 'Keuangan', 'Pria', 'Mayang, Kota Jambi', 'Menikah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `penilaian_ibfk_1` (`fk_id_manajer`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_gm`
--
ALTER TABLE `tb_gm`
  ADD PRIMARY KEY (`id_gm`);

--
-- Indexes for table `tb_manajer`
--
ALTER TABLE `tb_manajer`
  ADD PRIMARY KEY (`id_mnj`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`fk_id_manajer`) REFERENCES `tb_manajer` (`id_mnj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
