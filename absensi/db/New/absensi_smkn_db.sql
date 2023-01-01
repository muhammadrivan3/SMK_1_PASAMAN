-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Jan 01, 2023 at 02:19 AM
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
-- Table structure for table `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_wali_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `tgl_absensi` date NOT NULL,
  `jam_absensi` int(11) NOT NULL,
  `absensi` varchar(120) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`id_absensi`, `id_siswa`, `id_wali_kelas`, `id_guru`, `id_jurusan`, `tgl_absensi`, `jam_absensi`, `absensi`, `keterangan`) VALUES
(9, 4, 1, 12, 1, '2022-12-26', 1, 'S', ' oke'),
(10, 5, 1, 12, 1, '2022-12-26', 1, 'S', ' lumayan'),
(11, 6, 1, 12, 1, '2022-12-26', 1, 'S', ' '),
(12, 7, 1, 12, 1, '2022-12-26', 1, 'S', ' '),
(13, 4, 1, 12, 1, '2022-12-26', 2, 'H', ' '),
(14, 5, 1, 12, 1, '2022-12-26', 2, 'A', ' '),
(15, 6, 1, 12, 1, '2022-12-26', 2, 'PILIH ABSEN', ' '),
(16, 7, 1, 12, 1, '2022-12-26', 2, 'PILIH ABSEN', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_guru`
--

CREATE TABLE `biodata_guru` (
  `id_guru` int(11) NOT NULL,
  `nip_guru` varchar(120) NOT NULL,
  `nama_guru` varchar(120) NOT NULL,
  `jenis_kelamin_guru` varchar(120) NOT NULL,
  `tgl_lahir_guru` date NOT NULL,
  `alamat_guru` varchar(120) NOT NULL,
  `pendidikan_guru` varchar(120) NOT NULL,
  `status_guru` varchar(120) NOT NULL,
  `jabatan_guru` varchar(120) NOT NULL,
  `telepon_guru` varchar(120) NOT NULL,
  `foto_guru` varchar(300) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata_guru`
--

INSERT INTO `biodata_guru` (`id_guru`, `nip_guru`, `nama_guru`, `jenis_kelamin_guru`, `tgl_lahir_guru`, `alamat_guru`, `pendidikan_guru`, `status_guru`, `jabatan_guru`, `telepon_guru`, `foto_guru`, `username`, `password`) VALUES
(1, '12345678', 'Azmi Kurniawan', 'L', '0000-00-00', 'Labuah Luruih', 'Sistem Informasi', 'admin', 'admin', '0', 'azmiGonzalo.PNG', 'admin', 'admin'),
(8, '2147483647', 'edi supanri, s.pd', 'L', '1977-07-05', 'Pasaman Baru', 'Teknik Informatika', 'PNS', 'kepala sekolah', '2147483647', '', 'edi supanri, s.pd', 'edisu13149'),
(11, '2147483647', 'trieana dewi, s.pd, mm', 'P', '1985-11-13', 'Simpang Empat', 'Administrasi Perkantoran', 'PNS', 'kaproka', '2147483647', '', 'trieana dewi, s.pd, mm', 'trieanade17566'),
(12, '2147483647', 'rika pertiwi, s.pd', 'P', '1993-06-28', 'Padang Tujuh', 'Administrasi Perkantoran', 'PNS', 'wali kelas', '2147483647', '', 'rika pertiwi, s.pd', 'rika20862'),
(13, '2147483647', 'ezi purnama, s.pd', 'P', '1990-05-21', 'Pasaman Baru', 'Pendidikan Pancasila', 'PNS', 'guru', '2147483647', '', 'ezi purnama, s.pd', 'ezi67470'),
(14, '2147483647', 'melia,s.pd', 'L', '1998-05-19', 'Simpang Empat', 'Bahasa Inggris', 'Honorer', 'guru', '2147483647', '', 'melia,s.pd', 'me663659'),
(15, '2147483647', 'ezi purnama, s.pd', 'P', '1995-01-18', 'Katimaha', 'Pendidikan Kewarganegaraan', 'PNS', 'guru', '2147483647', '', 'ezi purnama, s.pd', 'ezip62976'),
(16, '2147483647', 'yusriza,s.pd', 'P', '1994-12-13', 'Batang Lingkin', 'Pendidikan Jasmani Olahraga dan Kesehatan', 'Honorer', 'guru', '2147483647', '', 'yusriza,s.pd', 'yu810957'),
(17, '2147483647', 'ririn trisnaneti,s.pd', 'P', '1998-08-18', 'Padang Tujuh', 'Matematika', 'Honorer', 'guru', '2147483647', '', 'ririn trisnaneti,s.pd', 'rirint40792'),
(18, '2147483647', 'yusi hartati, s.pd', 'P', '1993-01-27', 'Simpang Empat', 'Bahasa Indonesia', 'PNS', 'guru', '2147483647', '', 'yusi hartati, s.pd', 'yusihar50263'),
(19, '2147483647', 'rika pertiwi, s.pd', 'P', '1997-10-21', 'Simpang Empat', 'Sejarah Indonesia', 'Honorer', 'guru', '2147483647', '', 'rika pertiwi, s.pd', 'rikap15593');

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

-- --------------------------------------------------------

--
-- Table structure for table `biodata_siswa`
--

CREATE TABLE `biodata_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis_siswa` varchar(120) NOT NULL,
  `nama_siswa` varchar(120) NOT NULL,
  `jenis_kelamin_siswa` varchar(120) NOT NULL,
  `tgl_lahir_siswa` date NOT NULL,
  `alamat_siswa` varchar(120) NOT NULL,
  `kelas_siswa` varchar(120) NOT NULL,
  `lokal_siswa` int(11) NOT NULL,
  `jurusan_siswa` int(11) NOT NULL,
  `telepon_siswa` varchar(120) NOT NULL,
  `foto_siswa` varchar(300) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata_siswa`
--

INSERT INTO `biodata_siswa` (`id_siswa`, `nis_siswa`, `nama_siswa`, `jenis_kelamin_siswa`, `tgl_lahir_siswa`, `alamat_siswa`, `kelas_siswa`, `lokal_siswa`, `jurusan_siswa`, `telepon_siswa`, `foto_siswa`, `username`, `password`) VALUES
(4, '3444', 'syakura', 'P', '2022-12-25', 'Simpang Empat', 'X', 1, 1, '324565768790', '', 'syakura', 'syaku665776'),
(5, '654656', 'hinata', 'P', '2022-12-25', 'Simpang Empat', 'X', 1, 1, '32465', '1042061.jpg', 'hinata', 'hina672590'),
(6, '3456', 'laura', 'P', '2022-12-25', 'Simpang Empat', 'X', 1, 1, '4356', '744926.jpg', 'laura', 'la355508'),
(7, '345678', 'yinyu', 'P', '2022-12-25', 'Simpang Empat', 'X', 1, 1, '4356', '744926.jpg', 'yinyu', 'yiny376761');

-- --------------------------------------------------------

--
-- Table structure for table `jam_mengajar`
--

CREATE TABLE `jam_mengajar` (
  `id_jam_mengajar` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `kelas` varchar(120) NOT NULL,
  `ruangan` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `hari` varchar(120) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam_mengajar`
--

INSERT INTO `jam_mengajar` (`id_jam_mengajar`, `id_guru`, `id_mapel`, `kelas`, `ruangan`, `id_jurusan`, `hari`, `jam_mulai`, `jam_berakhir`) VALUES
(3, 12, 1, 'X', 1, 1, 'SENIN', '07:30:00', '09:30:00'),
(4, 12, 1, 'X', 1, 1, 'SENIN', '09:30:00', '10:15:00'),
(5, 12, 1, 'X', 1, 1, 'SENIN', '11:00:00', '00:30:00'),
(6, 12, 1, 'XI', 1, 2, 'SENIN', '22:30:00', '23:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(120) NOT NULL,
  `kosentrasi_jurusan` varchar(120) NOT NULL,
  `kaproka_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `kosentrasi_jurusan`, `kaproka_jurusan`) VALUES
(1, 'MPLB', 'Manajemen Perkantoran', 11),
(2, 'MPLB', 'Manajemen Logistik', 11),
(3, 'MPLB', '', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(120) NOT NULL,
  `kosentrasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `kosentrasi`) VALUES
(1, 'Manajement', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_tambahan`
--

CREATE TABLE `tugas_tambahan` (
  `id_tugas_tambahan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_tugas_tambahan` varchar(120) NOT NULL,
  `kelas_tugas_tambahan` varchar(3) NOT NULL,
  `jam_tugas_tambahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_tambahan`
--

INSERT INTO `tugas_tambahan` (`id_tugas_tambahan`, `id_guru`, `nama_tugas_tambahan`, `kelas_tugas_tambahan`, `jam_tugas_tambahan`) VALUES
(2, 8, 'kepala sekolah', '', 24),
(3, 14, 'wakil mutu', 'XII', 12);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali_kelas` int(11) NOT NULL,
  `guru` int(11) NOT NULL,
  `kelas` varchar(120) NOT NULL,
  `nama_lokal` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_wali_kelas`, `guru`, `kelas`, `nama_lokal`) VALUES
(1, 12, 'X', 'MPLB 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`id_absensi`);

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
-- Indexes for table `biodata_siswa`
--
ALTER TABLE `biodata_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `jam_mengajar`
--
ALTER TABLE `jam_mengajar`
  ADD PRIMARY KEY (`id_jam_mengajar`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tugas_tambahan`
--
ALTER TABLE `tugas_tambahan`
  ADD PRIMARY KEY (`id_tugas_tambahan`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `biodata_guru`
--
ALTER TABLE `biodata_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `biodata_sekolah`
--
ALTER TABLE `biodata_sekolah`
  MODIFY `id_biodata_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biodata_siswa`
--
ALTER TABLE `biodata_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jam_mengajar`
--
ALTER TABLE `jam_mengajar`
  MODIFY `id_jam_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tugas_tambahan`
--
ALTER TABLE `tugas_tambahan`
  MODIFY `id_tugas_tambahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
