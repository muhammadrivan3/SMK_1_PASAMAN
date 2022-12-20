-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Dec 20, 2022 at 01:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_smkn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata_guru`
--

CREATE TABLE `biodata_guru` (
  `id_guru` int(11) NOT NULL,
  `nip_guru` int(11) NOT NULL,
  `nama_guru` varchar(120) NOT NULL,
  `jenis_Kelamin_guru` varchar(120) NOT NULL,
  `tgl_lahir_guru` date NOT NULL,
  `alamat_guru` varchar(120) NOT NULL,
  `pendidikan_guru` varchar(120) NOT NULL,
  `status_guru` varchar(120) NOT NULL,
  `jabatan_guru` varchar(120) NOT NULL,
  `telepon_guru` int(11) NOT NULL,
  `foto_guru` varchar(300) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata_guru`
--

INSERT INTO `biodata_guru` (`id_guru`, `nip_guru`, `nama_guru`, `jenis_Kelamin_guru`, `tgl_lahir_guru`, `alamat_guru`, `pendidikan_guru`, `status_guru`, `jabatan_guru`, `telepon_guru`, `foto_guru`, `username`, `password`) VALUES
(1, 12345678, 'Azmi Kurniawan', 'L', '0000-00-00', 'Labuah Luruih', 'Sistem Informasi', 'admin', 'admin', 0, '', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_sekolah`
--

CREATE TABLE `biodata_sekolah` (
  `id_biodata_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(120) NOT NULL,
  `alamat_sekolah` varchar(120) NOT NULL,
  `photo_sekolah` varchar(120) NOT NULL,
  `email_sekolah` varchar(120) NOT NULL,
  `telepon_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata_sekolah`
--

INSERT INTO `biodata_sekolah` (`id_biodata_sekolah`, `nama_sekolah`, `alamat_sekolah`, `photo_sekolah`, `email_sekolah`, `telepon_sekolah`) VALUES
(1, 'smk n 1 pasaman', 'jalur baru', 'logosmk.png', 'smkn1pasaman@gmail.com', 812433355);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata_guru`
--
ALTER TABLE `biodata_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `biodata_sekolah`
--
ALTER TABLE `biodata_sekolah`
  ADD PRIMARY KEY (`id_biodata_sekolah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata_guru`
--
ALTER TABLE `biodata_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biodata_sekolah`
--
ALTER TABLE `biodata_sekolah`
  MODIFY `id_biodata_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
