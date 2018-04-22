-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Feb 2017 pada 07.22
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sapras`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabor`
--

CREATE TABLE `cabor` (
  `cabor_id` int(11) NOT NULL,
  `cabor` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cabor`
--

INSERT INTO `cabor` (`cabor_id`, `cabor`) VALUES
(1, 'Sepak Bola'),
(2, 'Basket'),
(3, 'Atletik'),
(4, 'Bulu Tangkis'),
(5, 'Renang'),
(6, 'Tenis Meja'),
(7, 'Golf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL,
  `jenis` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `jenis`) VALUES
(1, 'Tidak Melekat'),
(4, 'Melekat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kota_id` smallint(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kota_id`, `kota`, `provinsi`) VALUES
(13, 'Jakarta Pusat', 'DKI Jakarta'),
(6, 'Aceh Utara', 'Aceh'),
(9, 'Jakarta Utara', 'DKI Jakarta'),
(10, 'Aceh Barat', 'Aceh'),
(14, 'Surabaya', 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('ari', 'cb39135c4144204352220c2d9480354b', 1),
('Baru', '22af645d1859cb5ca6da0c484f1f37ea', 0),
('operator', '4b583376b2767b923c3e1da60d10de59', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsi_id` tinyint(4) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`provinsi_id`, `provinsi`, `lat`, `lng`) VALUES
(28, 'Surabaya', -7.275621, 112.751495),
(4, 'Aceh', 4.662186, 106.832390),
(23, 'DKI Jakarta', 54.000000, 3.000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sapras`
--

CREATE TABLE `sapras` (
  `sapras_id` int(11) NOT NULL,
  `sapras` varchar(50) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `kota` varchar(35) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `cabor` varchar(35) NOT NULL,
  `foto` varchar(35) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sapras`
--

INSERT INTO `sapras` (`sapras_id`, `sapras`, `jenis`, `provinsi`, `kota`, `lat`, `lng`, `cabor`, `foto`, `konten`) VALUES
(2, 'Istora Gelora Bung Karno', 'Melekat', 'DKI Jakarta', 'Jakarta Pusat', -6.220369, 106.806313, 'Bulu Tangkis', '1485929253535.jpg', '<b>Istora Gelora Bung Karno</b> (dulunya bernama Istora Senayan), adalah stadion tertutup untuk berbagai even olahraga dan kegiatan kemasyarakatan lainnya. Istora yang merupakan kependekan dari Istana Olahraga, adalah salah satu bangunan di dalam lingkungan Gelanggang Olahraga Bung Karno di daerah Senayan, Jakarta.\r\n<br>\r\nGedung olahraga ini dibangun mulai sejak pada tanggal 24 Agustus 1962 sebagai kelengkapan sarana dan prasarana dalam rangka Asian Games 1962 mulai buka diresmikan sejak pada tanggal 24 Agustus 1962 yang diadakan di Jakarta.'),
(3, 'Gelora BungKarno', 'Tanam', 'DKI Jakarta', 'Jakarta Utara', -6.218597, 106.799576, 'Sepak Bola', '1485849595277.jpg', '<b>Stadion Utama Gelora Bung Karno</b> adalah sebuah stadion serbaguna di Jakarta, Indonesia yang merupakan bagian dari kompleks olahraga Gelanggang Olahraga Bung Karno. Stadion ini umumnya digunakan sebagai arena pertandingan sepak bola tingkat internasional. Stadion ini dinamai untuk menghormati Soekarno, Presiden pertama Indonesia, yang juga merupakan tokoh yang mencetuskan gagasan pembangunan kompleks olahraga ini. Dalam rangka de-Soekarnoisasi, pada masa Orde Baru, nama stadion ini diubah menjadi Stadion Utama Senayan melalui Keppres No. 4/1984. Setelah bergulirnya gelombang reformasi pada 1998, nama Stadion ini dikembalikan kepada namanya semula melalui Surat Keputusan Presiden No.'),
(4, 'Gelora 10 November', 'Melekat', 'Surabaya', 'Surabaya', -7.251037, 112.754982, 'Sepak Bola', '1485928839567.jpg', '<b>Stadion Gelora 10 November (G10N)</b> atau Stadion Tambaksari adalah sebuah stadion multi-use yang berlokasi di Kecamatan Tambaksari, Surabaya, Indonesia. Stadion kebanggaan arek - arek Suroboyo yang di sebut bonek mania ini lebih sering dipergunakan untuk menggelar latihan sepak bola. Stadion berkapasitas untuk 35.000 orang ini, dulu merupakan markas dari tim besar Surabaya, Persebaya Surabaya.nya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabor`
--
ALTER TABLE `cabor`
  ADD PRIMARY KEY (`cabor_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indexes for table `sapras`
--
ALTER TABLE `sapras`
  ADD PRIMARY KEY (`sapras_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabor`
--
ALTER TABLE `cabor`
  MODIFY `cabor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `provinsi_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sapras`
--
ALTER TABLE `sapras`
  MODIFY `sapras_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
