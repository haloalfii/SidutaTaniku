-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2021 pada 05.56
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

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
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(10) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
('010', 'Temon'),
('020', 'Wates');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditi`
--

CREATE TABLE `komoditi` (
  `id_komoditi` varchar(10) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komoditi`
--

INSERT INTO `komoditi` (`id_komoditi`, `jenis`) VALUES
('001', 'Jagung'),
('002', 'Padi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `luas_panen`
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
  `id_kecamatan` varchar(10) NOT NULL,
  `id_komoditi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `luas_panen`
--

INSERT INTO `luas_panen` (`id_panen`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `id_kecamatan`, `id_komoditi`) VALUES
(1, 1, 7, 4.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(2, 1.9, 5, 7.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(3, 3, 4, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(4, 4, 5, 7, 2, 8, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(5, 2, 3, 10, 2, 3, 10, 2, 3, 4, 1, 1, 1, '010', '001'),
(6, 2, 10, 2, 10, 11, 12, 10, 5, 4, 2, 1, 1, '020', '001'),
(7, 2, 3, 4, 5, 5, 1, 2, 10, 0, 0, 0, 0, '010', '001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `luas_tanam`
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
  `id_kecamatan` varchar(10) NOT NULL,
  `id_komoditi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `luas_tanam`
--

INSERT INTO `luas_tanam` (`id_tanam`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `id_kecamatan`, `id_komoditi`) VALUES
(1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(2, 0, 0, 3.9, 0, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(3, 4, 4, 6, 8, 8, 0, 0, 0, 0, 0, 0, 0, '010', '002'),
(4, 4, 4, 6, 8, 8, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(5, 2, 4, 6, 10, 11, 12, 3, 4, 3, 3, 1, 10, '020', '001'),
(6, 20, 11, 12, 11, 10, 5, 6, 7, 8, 4, 2, 2, '010', '001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
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
  `id_kecamatan` varchar(10) NOT NULL,
  `id_komoditi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `id_kecamatan`, `id_komoditi`) VALUES
(1, 0, 44, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(2, 12, 32, 48, 0, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(4, 4, 4, 6, 8, 8, 0, 0, 0, 0, 0, 0, 0, '010', '002'),
(5, 3, 3, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0, '020', '002'),
(6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '010', '001'),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(9, 12, 12, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, '010', '001'),
(10, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '020', '001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'fery', 'fery@gmail.com', '$2y$10$i94mHlKU1YoPRjjP6eqLf.fW4ixABiYufSk44aTXHWrm9nGQ7Cz7C');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `komoditi`
--
ALTER TABLE `komoditi`
  ADD PRIMARY KEY (`id_komoditi`);

--
-- Indeks untuk tabel `luas_panen`
--
ALTER TABLE `luas_panen`
  ADD PRIMARY KEY (`id_panen`),
  ADD KEY `fk_id_komoditi` (`id_komoditi`),
  ADD KEY `fk_id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `luas_tanam`
--
ALTER TABLE `luas_tanam`
  ADD PRIMARY KEY (`id_tanam`),
  ADD KEY `fk_id_komoditi` (`id_komoditi`),
  ADD KEY `fk_id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `fk_id_komoditi` (`id_komoditi`),
  ADD KEY `fk_id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_name` (`user_name`) USING HASH;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `luas_panen`
--
ALTER TABLE `luas_panen`
  MODIFY `id_panen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `luas_tanam`
--
ALTER TABLE `luas_tanam`
  MODIFY `id_tanam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `luas_panen`
--
ALTER TABLE `luas_panen`
  ADD CONSTRAINT `fk_id_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `fk_id_komoditi` FOREIGN KEY (`id_komoditi`) REFERENCES `komoditi` (`id_komoditi`);

--
-- Ketidakleluasaan untuk tabel `luas_tanam`
--
ALTER TABLE `luas_tanam`
  ADD CONSTRAINT `fk_kecamatan_tanam` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `fk_komoditi_tanam` FOREIGN KEY (`id_komoditi`) REFERENCES `komoditi` (`id_komoditi`);

--
-- Ketidakleluasaan untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `fk_komoditi_produksi` FOREIGN KEY (`id_komoditi`) REFERENCES `komoditi` (`id_komoditi`),
  ADD CONSTRAINT `fk_krcamatan_produksi` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
