-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Okt 2019 pada 04.25
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisterv2fratz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `addon_pemesanan_kendaraan`
--

DROP TABLE IF EXISTS `addon_pemesanan_kendaraan`;
CREATE TABLE IF NOT EXISTS `addon_pemesanan_kendaraan` (
`id` int(10) NOT NULL,
  `tglmulai` varchar(100) NOT NULL,
  `tglselesai` varchar(100) NOT NULL,
  `pemesan` varchar(100) NOT NULL,
  `kendaraan` varchar(100) NOT NULL,
  `asalsekolah` varchar(100) NOT NULL,
  `keperluan` varchar(512) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `addon_pemesanan_kendaraan`
--

INSERT INTO `addon_pemesanan_kendaraan` (`id`, `tglmulai`, `tglselesai`, `pemesan`, `kendaraan`, `asalsekolah`, `keperluan`) VALUES
(4, '2019-10-28 13:49:53', '2019-10-29 13:49:56', 'User', 'ELF', 'SMA', 'Lomba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `addon_pemesanan_lapangan`
--

DROP TABLE IF EXISTS `addon_pemesanan_lapangan`;
CREATE TABLE IF NOT EXISTS `addon_pemesanan_lapangan` (
`id` int(10) NOT NULL,
  `tglmulai` varchar(100) NOT NULL,
  `tglselesai` varchar(100) NOT NULL,
  `pemesan` varchar(100) NOT NULL,
  `asalsekolah` varchar(100) NOT NULL,
  `keperluan` varchar(512) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `addon_pemesanan_lapangan`
--

INSERT INTO `addon_pemesanan_lapangan` (`id`, `tglmulai`, `tglselesai`, `pemesan`, `asalsekolah`, `keperluan`) VALUES
(6, '2019-10-29 10:00:18', '2019-10-30 18:00:21', 'Alex', 'SMP', 'Kantin EXPO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon_pemesanan_kendaraan`
--
ALTER TABLE `addon_pemesanan_kendaraan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addon_pemesanan_lapangan`
--
ALTER TABLE `addon_pemesanan_lapangan`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addon_pemesanan_kendaraan`
--
ALTER TABLE `addon_pemesanan_kendaraan`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `addon_pemesanan_lapangan`
--
ALTER TABLE `addon_pemesanan_lapangan`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
