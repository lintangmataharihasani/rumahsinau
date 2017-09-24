-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 08:37 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsinau`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`) VALUES
('admin.rumahsinau', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `id_penyelenggara` int(6) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `lembaga` tinyint(1) NOT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `batas_daftar` date NOT NULL,
  `kuota` int(6) NOT NULL,
  `persyaratan` text NOT NULL,
  `tgl_mulai` date
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursus`
--
-- --------------------------------------------------------

--
-- Table structure for table `lembaga_kursus`
--

CREATE TABLE `lembaga_kursus` (
  `id` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `id_pemilik` int(6) NOT NULL,
  `email_lembaga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lembaga_kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(6) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `id_kursus` int(6) NOT NULL,
  `biaya` int(100) NOT NULL,
  `jumlah_peserta` int(100) NOT NULL,
  `email_konfirmasi` varchar(100) NOT NULL,
  `bayar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_peserta`
--

CREATE TABLE `pendaftaran_peserta` (
  `id_peserta` int(6) NOT NULL,
  `id_pendaftaran` int(6) NOT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran_peserta`
--

-- --------------------------------------------------------

--
-- Table structure for table `penyelenggara_kursus`
--

CREATE TABLE `penyelenggara_kursus` (
  `id` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyelenggara_kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `peserta_kursus`
--

CREATE TABLE `peserta_kursus` (
  `id` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta_kursus`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penyelenggara` (`id_penyelenggara`);

--
-- Indexes for table `lembaga_kursus`
--
ALTER TABLE `lembaga_kursus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kursus` (`id_kursus`);

--
-- Indexes for table `pendaftaran_peserta`
--
ALTER TABLE `pendaftaran_peserta`
  ADD KEY `id_pendaftaran` (`id_pendaftaran`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `penyelenggara_kursus`
--
ALTER TABLE `penyelenggara_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_kursus`
--
ALTER TABLE `peserta_kursus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `lembaga_kursus`
--
ALTER TABLE `lembaga_kursus`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `penyelenggara_kursus`
--
ALTER TABLE `penyelenggara_kursus`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `peserta_kursus`
--
ALTER TABLE `peserta_kursus`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `kursus_ibfk_1` FOREIGN KEY (`id_penyelenggara`) REFERENCES `penyelenggara_kursus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lembaga_kursus`
--
ALTER TABLE `lembaga_kursus`
  ADD CONSTRAINT `lembaga_kursus_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `penyelenggara_kursus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaran_peserta`
--
ALTER TABLE `pendaftaran_peserta`
  ADD CONSTRAINT `pendaftaran_peserta_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaran_peserta_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta_kursus` (`id`)  ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
