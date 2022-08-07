-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2022 pada 17.21
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venika2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `jenis_layanan` varchar(25) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `id_vendor`, `id_user`, `nama`, `no_hp`, `tanggal`, `jenis_layanan`, `paket`, `status`) VALUES
(10, 1, 1, 'Muhammad', '085952835509', '2022-08-06', 'Foto', 'foto', 3),
(11, 1, 1, 'Muhammad', '085952835509', '2022-08-02', 'MC', 'MC', 1),
(12, 1, 1, 'Muhammad', '085952835509', '2022-08-02', 'MC', 'MC keren', 3),
(13, 1, 1, 'Muhammad', '085952835509', '2022-08-29', 'Dekorasi', 'a', 1),
(14, 1, 2, 'Asiyya', '01231284123', '2022-09-09', 'Band', 'penyanyi hebat', 2),
(15, 1, 1, 'Muhammad Sultan Rafi', '085952835509', '2022-08-29', 'Sewa Mobil', 'mobil ngebut', 2),
(16, 1, 2, 'Asiyya', '085952835509', '2022-08-22', 'Sewa Mobil', 'mobil terbang', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `favorit`
--

INSERT INTO `favorit` (`id`, `id_vendor`, `id_jenis`, `id_user`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_jenis_layanan`
--

CREATE TABLE `galeri_jenis_layanan` (
  `id` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `galeri` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri_jenis_layanan`
--

INSERT INTO `galeri_jenis_layanan` (`id`, `id_vendor`, `id_jenis`, `galeri`) VALUES
(2, 1, 2, ''),
(3, 1, 5, ''),
(5, 1, 5, ''),
(8, 1, 10, ''),
(27, 2, 2, 'hill.jpg'),
(28, 2, 2, 'kampus.jpg'),
(29, 2, 2, 'kantor.jpg'),
(30, 1, 16, 'japanese_katering.jpg'),
(31, 1, 16, 'mawar_katering.png'),
(32, 1, 16, 'Agnez_katering.jpg'),
(33, 1, 1, 'japanese_katering.jpg'),
(34, 1, 1, 'mawar_katering.png'),
(35, 1, 1, 'Agnez_katering.jpg'),
(36, 1, 14, 'japanese_katering.jpg'),
(37, 1, 14, 'Agnez_katering.jpg'),
(38, 1, 14, 'mawar_katering.png'),
(39, 1, 15, 'japanese_katering.jpg'),
(40, 1, 15, 'mawar_katering.png'),
(41, 1, 15, 'Agnez_katering.jpg'),
(42, 1, 17, 'Agnez_katering.jpg'),
(43, 1, 17, 'japanese_katering.jpg'),
(44, 1, 17, 'mawar_katering.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_layanan`
--

CREATE TABLE `jenis_layanan` (
  `id` int(11) NOT NULL,
  `id_vendor` int(10) NOT NULL,
  `nama_layanan` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `fasilitas` text NOT NULL,
  `variasi` text NOT NULL,
  `galeri` varchar(30) NOT NULL,
  `adat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_layanan`
--

INSERT INTO `jenis_layanan` (`id`, `id_vendor`, `nama_layanan`, `deskripsi`, `fasilitas`, `variasi`, `galeri`, `adat`) VALUES
(1, 1, 'katering', '', '', '', 'prewed.jpg', 'Melayu'),
(2, 2, 'Dekorasi', '', '', '', 'prewed.jpg', 'Melayu'),
(3, 3, 'katering', '', '', '', '', 'Sunda'),
(4, 4, 'makeup', '', '', '', '', 'betawi'),
(14, 1, 'GaunPengantin', '<p>Gaun Keren</p>', '<p>Gaun berbagai daerah</p>', '<p>Gaun A 10rb</p>', 'prewed.jpg', 'Batak'),
(15, 1, 'FotoVideo', '<p>asd</p>', '<p>asd</p>', '<p>dsa</p>', 'Macrunchy.jpg', 'Eropa'),
(16, 1, 'FotoVideo', '<p>asd</p>', '<p>asd</p>', '<p>dsa</p>', 'Bukti Instalasi AdventureWorks', 'Eropa'),
(17, 1, 'Katering', '<p>Katering enak</p>', '<p>Mendapatkan makanan yang lezat dan bergizi</p>', '<p>Paket A : 10 Makanan</p>', 'Agnez_katering.jpg', 'Batak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `note`
--

INSERT INTO `note` (`id`, `id_booking`, `note`) VALUES
(1, 13, 'Jadwal penuh'),
(2, 12, 'Maaf sudah penuh'),
(3, 11, 'siappp'),
(4, 14, 'laksanakan'),
(5, 15, 'oke siap'),
(6, 16, 'yang benar saja'),
(7, 10, 'Maaf sudah penuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `no_hp`, `username`, `password`, `photo`) VALUES
(1, 'Muhammad Sultan Rafi', 'msultanrafi@gmail.com', '085952835509', 'msultanrafi', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL),
(2, 'asiyya', 'asiyya@email.com', '08123123123', 'asiyya', 'd8578edf8458ce06fbc5bb76a58c5ca4', ''),
(3, 'sultan', 'sultan@email.com', '', 'sultan', 'd8578edf8458ce06fbc5bb76a58c5ca4', ''),
(4, 'asraf aprianto', 'asraf@email.com', '', 'asraf', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `photo` blob NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `instagram` varchar(25) DEFAULT NULL,
  `facebook` varchar(25) DEFAULT NULL,
  `twitter` varchar(25) DEFAULT NULL,
  `website` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id`, `nama`, `email`, `deskripsi`, `alamat`, `kecamatan`, `photo`, `no_hp`, `instagram`, `facebook`, `twitter`, `website`, `username`, `password`) VALUES
(1, 'vendora', 'vendora@emaill.com', NULL, 'Jl. Sabang No.85, Bandung Wetan, Cihapit, Kota Ban', 'Tembalang', 0x707265776564322e6a7067, '085952835509', NULL, NULL, NULL, '', 'vendora', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(2, 'vendorb', 'vendorb@email.com', NULL, '', 'Banyumanik', '', '', NULL, NULL, NULL, '', 'vendorb', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(3, 'vendorc', 'vendorc@email.com', NULL, '', 'Tembalang', '', '', NULL, NULL, NULL, '', 'vendorc', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(4, 'vendord', 'vendord@email.com', NULL, '', 'Banyumanik', '', '', NULL, NULL, NULL, '', 'vendord', 'd8578edf8458ce06fbc5bb76a58c5ca4');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_jenis_layanan`
--
ALTER TABLE `galeri_jenis_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `galeri_jenis_layanan`
--
ALTER TABLE `galeri_jenis_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
