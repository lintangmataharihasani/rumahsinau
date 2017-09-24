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

INSERT INTO `kursus` (`id`, `nama`, `jenis`, `deskripsi`, `jadwal`, `fasilitas`, `harga`, `img`, `id_penyelenggara`, `tgl_daftar`, `kota`, `provinsi`, `premium`, `lembaga`, `verified`, `batas_daftar`, `kuota`, `persyaratan`) VALUES
(2, 'Kursus Membuat Kerajinan Decoupage', 'Decoupage', 'We\'ve entered the Alderaan system. Governor Tarkin, I should have expected to find you holding Vader\'s leash. I recognized your foul stench when I was brought on board. Charming to the last. You don\'t know how hard I found it signing the order to terminate your life! I surprised you had the courage to take the responsibility yourself! Princess Leia, before your execution I would like you to be my guest at a ceremony that will make this battle station operational. No star system will dare oppose the Emperor now. The more you tighten your grip, Tarkin, the more star systems will slip through your fingers.', 'VI ', '4 ', 100000, '', 1, '2017-07-31', 'Jakarta Selatan', 'DKI Jakarta', 1, 1, 1, '2017-08-12', 5, 'We\'ve entered the Alderaan system. Governor Tarkin, I should have expected to find you holding Vader\'s leash. I recognized your foul stench when I was brought on board. Charming to the last. You don\'t know how hard I found it signing the order to terminate your life! I surprised you had the courage to take the responsibility yourself! Princess Leia, before your execution I would like you to be my guest at a ceremony that will make this battle station operational. No star system will dare oppose the Emperor now. The more you tighten your grip, Tarkin, the more star systems will slip through your fingers.'),
(5, 'Kursus Melukis Endang Raharja', 'Melukis', 'We\'ve entered the Alderaan system. Governor Tarkin, I should have expected to find you holding Vader\'s leash. I recognized your foul stench when I was brought on board. Charming to the last. You don\'t know how hard I found it signing the order to terminate your life! I surprised you had the courage to take the responsibility yourself! Princess Leia, before your execution I would like you to be my guest at a ceremony that will make this battle station operational. No star system will dare oppose the Emperor now. The more you tighten your grip, Tarkin, the more star systems will slip through your fingers.', 'IV ', '3 ', 80000, '', 3, '2017-07-31', 'Depok', 'Jawa Barat', 0, 0, 1, '2017-08-23', 9, 'We\'ve entered the Alderaan system. Governor Tarkin, I should have expected to find you holding Vader\'s leash. I recognized your foul stench when I was brought on board. Charming to the last. You don\'t know how hard I found it signing the order to terminate your life! I surprised you had the courage to take the responsibility yourself! Princess Leia, before your execution I would like you to be my guest at a ceremony that will make this battle station operational. No star system will dare oppose the Emperor now. The more you tighten your grip, Tarkin, the more star systems will slip through your fingers.Lorem ipsum disebut uga greeking amarga ukara iki asal saka basa Latin.'),
(6, 'Kursus Membuat Kerajinan Perca', 'Kerajinan', 'We\'ve entered the Alderaan system. Governor Tarkin, I should have expected to find you holding Vader\'s leash. I recognized your foul stench when I was brought on board. Charming to the last. You don\'t know how hard I found it signing the order to terminate your life! I surprised you had the courage to take the responsibility yourself! Princess Leia, before your execution I would like you to be my guest at a ceremony that will make this battle station operational. No star system will dare oppose the Emperor now. The more you tighten your grip, Tarkin, the more star systems will slip through your fingers.Lorem ipsum disebut uga greeking amarga ukara iki asal saka basa Latin.', 'VI ', '4 ', 100000, '', 4, '2017-08-01', 'Tangerang Selatan', 'Banten', 0, 1, NULL, '2017-08-24', 7, ''),
(7, 'English As Second Language For IGCSE Course', 'Bhs. Inggris', 'We\'ve entered the Alderaan system. Governor Tarkin, I should have expected to find you holding Vader\'s leash. I recognized your foul stench when I was brought on board. Charming to the last. You don\'t know how hard I found it signing the order to terminate your life! I surprised you had the courage to take the responsibility yourself! Princess Leia, before your execution I would like you to be my guest at a ceremony that will make this battle station operational. No star system will dare oppose the Emperor now. The more you tighten your grip, Tarkin, the more star systems will slip through your fingers.', 'VI ', '6 ', 1500000, '', 5, '2017-08-01', 'Tangerang', 'Banten', 1, 1, 1, '2017-08-18', 20, 'The applicants must have basic English understandings'),
(8, 'Kursus Perhotelan Profesional Gandaria', 'Perhotelan', 'We\'ve entered the Alderaan system. Governor Tarkin, I should have expected to find you holding Vader\'s leash. I recognized your foul stench when I was brought on board. Charming to the last. You don\'t know how hard I found it signing the order to terminate your life! I surprised you had the courage to take the responsibility yourself! Princess Leia, before your execution I would like you to be my guest at a ceremony that will make this battle station operational. No star system will dare oppose the Emperor now. The more you tighten your grip, Tarkin, the more star systems will slip through your n.', 'VII ', '3 ', 1200000, '', 6, '2017-08-01', 'Jakarta Selatan', 'DKI Jakarta', 1, 1, 1, '2017-08-12', 0, ''),
(9, 'Kursus Mengemudi Mobil Mitra Kendara ', 'Mengemudi', 'We\'ve entered the Alderaan system. Governor Tarkin, I should have expected to find you holding Vader\'s leash. I recognized your foul stench when I was brought on board. Charming to the last. You don\'t know how hard I found it signing the order to terminate your life! I surprised you had the courage to take the responsibility yourself! Princess Leia, before your execution I would like you to be my guest at a ceremony that will make this battle station operational. No star system will dare oppose the Emperor now. The more you tighten your grip, Tarkin, the more star systems will slip through your fingers.', 'VI ', '4 ', 1250000, '', 7, '2017-08-01', 'Bekasi', 'Jawa Barat', 1, 0, 1, '2017-08-12', 0, ''),
(10, 'Kursus Privat Bahasa Jerman A1, A2, B1 Jakarta Pusat', 'Bhs. Jerman', 'Privat persiapan Start Deutsch Goethe Pruefung A1, A2, dan B1', 'V ', '2 ', 500000, '', 8, '2017-08-01', 'Jakarta Selatan', 'DKI Jakarta', 1, 0, 1, '2017-08-12', 0, ''),
(11, 'Kursus Bahasa Mandarin Untuk Pemula', 'Bhs. Mandarin', 'We\'ve entered the Alderaan system. Governor Tarkin, I should have expected to find you holding Vader\'s leash. I recognized your foul stench when I was brought on board. Charming to the last. You don\'t know how hard I found it signing the order to terminate your life! I surprised you had the courage to take the responsibility yourself! Princess Leia, before your execution I would like you to be my guest at a ceremony that will make this battle station operational. No star system will dare oppose the Emperor now. The more you tighten your grip, Tarkin, the more star systems will slip through your fingers.', 'IV ', '3 ', 750000, '', 9, '2017-08-01', 'Jakarta Timur', 'DKI Jakarta', 1, 0, 1, '2017-08-12', 0, ''),
(12, 'Kursus Komputer Untuk Administrasi Kantor (Ms. Office)', 'Office', 'Belajar Ms Office untuk administrasi kantor', 'VI ', '3 ', 800000, '', 10, '2017-08-01', 'Jakarta Utara', 'DKI Jakarta', 1, 0, 1, '2017-08-12', 0, ''),
(13, 'Achtung General Deutsch', 'Bhs. Jerman', ' Achtung adalah sebuah lembaga kursus bahasa Jerman untuk pemula', 'II ', '2 ', 250000, '', 11, '2017-08-02', 'Jakarta Selatan', 'DKI Jakarta', 0, 1, 0, '2017-08-12', 0, ''),
(14, 'Kursus Membuat Kerajinan Ukiran Kayu', 'Kerajinan', 'Mengukir prestasi', '-', '-', 200000, '', 12, '2017-08-11', 'Jakarta Barat', 'DKI Jakarta', 1, 0, 0, '0000-00-00', 5, 'semua umur'),
(15, 'Kursus Tata Boga Ibu Rose', 'Tata Boga', 'Kursus tata boga : memasak, tata meja bonus resep nusantara', '-', '-', 150000, '', 13, '0000-00-00', 'Jakarta Utara', 'DKI Jakarta', 1, 0, 0, '2017-08-17', 10, 'semua kalangan');

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

INSERT INTO `lembaga_kursus` (`id`, `nama`, `alamat`, `telepon`, `id_pemilik`, `email_lembaga`) VALUES
(2, 'LKP Karyatama Indah', 'Jl Jalan No 157', '0213456723', 1, 'noor.endah@gmail.com'),
(3, 'LKP Sahabat Mitra Karya', 'Jl Tikus No 157', '02134526342', 4, 'sitizub.sunandar@yahoo.com'),
(4, 'LKP Universal Language Center', 'Jl Adiluhung III No 167', '02156725342', 5, 'ros.permana@aelc.edu'),
(5, 'Institut Perhotelan Indonesia', 'Jl Sadar No 78, Gandaria', '0217894533', 6, 'edikur134@gmail.com'),
(6, 'Kursus Bahasa Jerman Achtung', 'Mampang Prapatan 5 RT 6 RW 6 ', '0812-8753-4419', 11, 'abas@rumahsinau.org');

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

INSERT INTO `penyelenggara_kursus` (`id`, `nama`, `email`, `telepon`, `propinsi`, `kota`, `alamat`) VALUES
(1, 'Haji Noor Endah', 'noor.endah@gmail.com', '02134526341', 'DKI Jakarta', 'Jakarta Selatan', 'Jl Saco No 12, Ragunan'),
(3, 'Endang Raharja', 'endangraharja123@gmail.com', '0215672352', 'Jawa Barat', 'Depok', 'Jl Pertiwi No 98'),
(4, 'Siti Zubaedah Sunandar', 'sitizub.sunandar@yahoo.com', '081436243622', 'Banten', 'Tangerang Selatan', 'Jl Puri Permai No 98'),
(5, 'Rosalia Permana', 'ros.permana@aelc.edu', '021786342532', 'Banten', 'Tangerang', 'Jl Bukit Indah VII No 35 Perumahan Green Hill Kav. 4'),
(6, 'Edi Kurniawan', 'edikur134@gmail.com', '08755624356', 'DKI Jakarta', 'Jakarta Selatan', 'Jl Saco No 12, Ragunan'),
(7, 'Ahmad Haryanto', 'aher123@gmail.com', '085672435243', 'Jawa Barat', 'Bekasi', 'Jl Timah No 17, Tambun'),
(8, 'Hilman Raharja', 'hilfuns.de@gmail.com', '02167824352', 'DKI Jakarta', 'Jakarta Selatan', 'Jl Saco No 12, Ragunan'),
(9, 'Ong Swei Liong', 'ongsweiliong7@gmail.com', '02156724351', 'DKI Jakarta', 'Jakarta Timur', 'Jl Kaca Piring No 179, Cijantung'),
(10, 'Alamanda Santiko', 'alamando@rocketmail.com', '085634253626', 'DKI Jakarta', 'Jakarta Utara', 'Jl Haji Agus Salim No 36, Koja'),
(11, 'Haji Abas', 'abas@rumahsinau.org', '432435', 'DKI Jakarta', 'Jakarta Selatan', 'di mana saja'),
(12, 'Sunandar', 'ukirankayujakarta@gmail.com', '0215673425', 'DKI Jakarta', 'Jakarta Barat', 'Jl Kayu No 78'),
(13, 'Rose Purnamasari', 'rose.p@gmail.com', '02167532575', 'DKI Jakarta', 'Jakarta Utara', 'Jl Waduk Pluit No 79');

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
  ADD CONSTRAINT `kursus_ibfk_1` FOREIGN KEY (`id_penyelenggara`) REFERENCES `penyelenggara_kursus` (`id`);

--
-- Constraints for table `lembaga_kursus`
--
ALTER TABLE `lembaga_kursus`
  ADD CONSTRAINT `lembaga_kursus_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `penyelenggara_kursus` (`id`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id`);

--
-- Constraints for table `pendaftaran_peserta`
--
ALTER TABLE `pendaftaran_peserta`
  ADD CONSTRAINT `pendaftaran_peserta_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id`),
  ADD CONSTRAINT `pendaftaran_peserta_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta_kursus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
