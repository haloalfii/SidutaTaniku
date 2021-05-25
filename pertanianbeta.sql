-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 11:50 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertanianbeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(10) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
('010', 'Temon'),
('020', 'Wates');

-- --------------------------------------------------------

--
-- Table structure for table `komoditi`
--

CREATE TABLE `komoditi` (
  `id_komoditi` varchar(10) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komoditi`
--

INSERT INTO `komoditi` (`id_komoditi`, `jenis`) VALUES
('001', 'Jagung'),
('002', 'Padi');

-- --------------------------------------------------------

--
-- Table structure for table `luas_panen`
--

CREATE TABLE `luas_panen` (
  `id_panen` int(10) NOT NULL,
  `jan` float DEFAULT NULL,
  `feb` float DEFAULT NULL,
  `mar` float DEFAULT NULL,
  `apr` float DEFAULT NULL,
  `mei` float DEFAULT NULL,
  `jun` float DEFAULT NULL,
  `jul` float DEFAULT NULL,
  `agu` float DEFAULT NULL,
  `sep` float DEFAULT NULL,
  `okt` float DEFAULT NULL,
  `nov` float DEFAULT NULL,
  `des` float DEFAULT NULL,
  `jumlah` float DEFAULT NULL,
  `rata` float DEFAULT NULL,
  `id_kecamatan` varchar(10) NOT NULL,
  `id_komoditi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `luas_panen`
--

INSERT INTO `luas_panen` (`id_panen`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `jumlah`, `rata`, `id_kecamatan`, `id_komoditi`) VALUES
(1, 0, 7, 4.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '010', '001'),
(2, 1.9, 5, 7.5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '020', '001');

-- --------------------------------------------------------

--
-- Table structure for table `luas_tanam`
--

CREATE TABLE `luas_tanam` (
  `id_tanam` int(10) NOT NULL,
  `jan` float DEFAULT NULL,
  `feb` float DEFAULT NULL,
  `mar` float DEFAULT NULL,
  `apr` float DEFAULT NULL,
  `mei` float DEFAULT NULL,
  `jun` float DEFAULT NULL,
  `jul` float DEFAULT NULL,
  `agu` float DEFAULT NULL,
  `sep` float DEFAULT NULL,
  `okt` float DEFAULT NULL,
  `nov` float DEFAULT NULL,
  `des` float DEFAULT NULL,
  `jumlah` float DEFAULT NULL,
  `rata` float DEFAULT NULL,
  `id_kecamatan` varchar(10) NOT NULL,
  `id_komoditi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `luas_tanam`
--

INSERT INTO `luas_tanam` (`id_tanam`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `jumlah`, `rata`, `id_kecamatan`, `id_komoditi`) VALUES
(1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '010', '001'),
(2, 0, 0, 3.9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '020', '001');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(10) NOT NULL,
  `jan` float DEFAULT NULL,
  `feb` float DEFAULT NULL,
  `mar` float DEFAULT NULL,
  `apr` float DEFAULT NULL,
  `mei` float DEFAULT NULL,
  `jun` float DEFAULT NULL,
  `jul` float DEFAULT NULL,
  `agu` float DEFAULT NULL,
  `sep` float DEFAULT NULL,
  `okt` float DEFAULT NULL,
  `nov` float DEFAULT NULL,
  `des` float DEFAULT NULL,
  `jumlah` float DEFAULT NULL,
  `rata` float DEFAULT NULL,
  `id_kecamatan` varchar(10) NOT NULL,
  `id_komoditi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `jumlah`, `rata`, `id_kecamatan`, `id_komoditi`) VALUES
(1, 0, 44, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '010', '001'),
(2, 12, 32, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '020', '001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `komoditi`
--
ALTER TABLE `komoditi`
  ADD PRIMARY KEY (`id_komoditi`);

--
-- Indexes for table `luas_panen`
--
ALTER TABLE `luas_panen`
  ADD PRIMARY KEY (`id_panen`),
  ADD KEY `fk_id_komoditi` (`id_komoditi`),
  ADD KEY `fk_id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `luas_tanam`
--
ALTER TABLE `luas_tanam`
  ADD PRIMARY KEY (`id_tanam`),
  ADD KEY `fk_id_komoditi` (`id_komoditi`),
  ADD KEY `fk_id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `fk_id_komoditi` (`id_komoditi`),
  ADD KEY `fk_id_kecamatan` (`id_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `luas_panen`
--
ALTER TABLE `luas_panen`
  MODIFY `id_panen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `luas_tanam`
--
ALTER TABLE `luas_tanam`
  MODIFY `id_tanam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `luas_panen`
--
ALTER TABLE `luas_panen`
  ADD CONSTRAINT `fk_id_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `fk_id_komoditi` FOREIGN KEY (`id_komoditi`) REFERENCES `komoditi` (`id_komoditi`);

--
-- Constraints for table `luas_tanam`
--
ALTER TABLE `luas_tanam`
  ADD CONSTRAINT `fk_kecamatan_tanam` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `fk_komoditi_tanam` FOREIGN KEY (`id_komoditi`) REFERENCES `komoditi` (`id_komoditi`);

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `fk_komoditi_produksi` FOREIGN KEY (`id_komoditi`) REFERENCES `komoditi` (`id_komoditi`),
  ADD CONSTRAINT `fk_krcamatan_produksi` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
