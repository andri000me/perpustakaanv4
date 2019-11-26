-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 03:55 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tcperpustakaan`
--
CREATE DATABASE IF NOT EXISTS `tcperpustakaan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tcperpustakaan`;

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

DROP TABLE IF EXISTS `icon`;
CREATE TABLE IF NOT EXISTS `icon` (
`id` int(10) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`id`, `icon`) VALUES
(1, 'fa fa-fw fa-wrench'),
(2, 'fa fa-fw fa-users'),
(3, 'fa fa-fw fa-navicon'),
(4, 'fa fa-fw fa-folder'),
(6, 'fa fa-fw fa-dollar'),
(7, 'fa fa-fw fa-gift'),
(10, 'fa fa-fw fa-book'),
(11, 'fa fa-fw fa-user'),
(12, 'fa fa-fw fa-tag'),
(13, 'fa fa-fw fa-instagram'),
(14, 'fa fa-fw fa-cube'),
(15, 'fa fa-fw fa-copy'),
(16, 'fa fa-fw fa-cut'),
(17, 'fa fa-fw fa-plus'),
(18, 'fa fa-fw fa-user-plus'),
(19, 'fa fa-fw fa-leaf'),
(20, 'fa fa-fw fa-cart-plus'),
(21, 'fa fa-fw fa-address-book'),
(22, 'fa fa-fw fa-exclamation-circle'),
(23, 'fa fa-fw fa-envelope'),
(24, 'fa fa-fw fa-building'),
(25, 'fa fa-fw fa-money'),
(26, 'fa fa-fw fa-graduation-cap');

-- --------------------------------------------------------

--
-- Table structure for table `pp_bahasa`
--

DROP TABLE IF EXISTS `pp_bahasa`;
CREATE TABLE IF NOT EXISTS `pp_bahasa` (
`id` int(10) NOT NULL,
  `kode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pp_bahasa`
--

INSERT INTO `pp_bahasa` (`id`, `kode`, `nama`, `last_update`) VALUES
(1, 'id', 'Indonesia', '2019-11-04'),
(2, 'en', 'English', '2019-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `pp_buku`
--

DROP TABLE IF EXISTS `pp_buku`;
CREATE TABLE IF NOT EXISTS `pp_buku` (
`id` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang_id` varchar(100) NOT NULL,
  `penanggungjawab` varchar(100) NOT NULL,
  `edisi` varchar(100) NOT NULL,
  `gmd_id` varchar(100) NOT NULL,
  `tipeisi_id` varchar(100) NOT NULL,
  `tipemedia_id` varchar(100) NOT NULL,
  `kalaterbit_id` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `penerbit_id` varchar(100) NOT NULL,
  `tahunterbit` varchar(100) NOT NULL,
  `tempatterbit_id` varchar(100) NOT NULL,
  `deskripsifisik` varchar(100) NOT NULL,
  `judulseri` varchar(100) NOT NULL,
  `klasifikasi` varchar(100) NOT NULL,
  `nopanggil` varchar(100) NOT NULL,
  `topik_id` varchar(100) NOT NULL,
  `abstrak` varchar(1024) NOT NULL,
  `gambarsampul` varchar(100) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `disableopac` varchar(100) DEFAULT NULL,
  `promoberanda` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `urlmultimedia` varchar(100) DEFAULT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pp_buku`
--

INSERT INTO `pp_buku` (`id`, `judul`, `pengarang_id`, `penanggungjawab`, `edisi`, `gmd_id`, `tipeisi_id`, `tipemedia_id`, `kalaterbit_id`, `isbn`, `penerbit_id`, `tahunterbit`, `tempatterbit_id`, `deskripsifisik`, `judulseri`, `klasifikasi`, `nopanggil`, `topik_id`, `abstrak`, `gambarsampul`, `lampiran`, `disableopac`, `promoberanda`, `url`, `urlmultimedia`, `last_update`) VALUES
(10, 'Ajax', '11', 'asd', 'asd', '33', '2', '1', '1', '111', '3', '55', '6', '55', '88', '66', '77', '10', '99', '1574325417931.jpg', NULL, '1', '1', 'perpustakaan/buku', '55', '2019-11-25 09:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `pp_codepattern`
--

DROP TABLE IF EXISTS `pp_codepattern`;
CREATE TABLE IF NOT EXISTS `pp_codepattern` (
`id` int(5) NOT NULL,
  `prefix` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `itemcodepattern` varchar(100) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pp_codepattern`
--

INSERT INTO `pp_codepattern` (`id`, `prefix`, `length`, `itemcodepattern`, `last_update`) VALUES
(1, 'B', '5', 'B00000', '2019-11-25 08:05:15'),
(2, 'C', '5', 'C00000', '2019-11-25 15:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `pp_gmd`
--

DROP TABLE IF EXISTS `pp_gmd`;
CREATE TABLE IF NOT EXISTS `pp_gmd` (
`id` int(11) NOT NULL,
  `kode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `pp_gmd`
--

INSERT INTO `pp_gmd` (`id`, `kode`, `nama`, `last_update`) VALUES
(1, 'TE', 'Text', '2019-11-04 00:00:00'),
(2, 'AR', 'Art Original', '2019-11-04 00:00:00'),
(3, 'CH', 'Chart', '2019-11-04 00:00:00'),
(4, 'CO', 'Computer Software', '2019-11-04 00:00:00'),
(5, 'DI', 'Diorama', '2019-11-04 00:00:00'),
(6, 'FI', 'Filmstrip', '2019-11-04 00:00:00'),
(7, 'FL', 'Flash Card', '2019-11-04 00:00:00'),
(8, 'GA', 'Game', '2019-11-04 00:00:00'),
(9, 'GL', 'Globe', '2019-11-04 00:00:00'),
(10, 'KI', 'Kit', '2019-11-04 00:00:00'),
(11, 'MA', 'Map', '2019-11-04 00:00:00'),
(12, 'MI', 'Microform', '2019-11-04 00:00:00'),
(13, 'MN', 'Manuscript', '2019-11-04 00:00:00'),
(14, 'MO', 'Model', '2019-11-04 00:00:00'),
(15, 'MP', 'Motion Picture', '2019-11-04 00:00:00'),
(16, 'MS', 'Microscope Slide', '2019-11-04 00:00:00'),
(17, 'MU', 'Music', '2019-11-04 00:00:00'),
(18, 'PI', 'Picture', '2019-11-04 00:00:00'),
(19, 'RE', 'Realia', '2019-11-04 00:00:00'),
(20, 'SL', 'Slide', '2019-11-04 00:00:00'),
(21, 'SO', 'Sound Recording', '2019-11-04 00:00:00'),
(22, 'TD', 'Technical Drawing', '2019-11-04 00:00:00'),
(23, 'TR', 'Transparency', '2019-11-04 00:00:00'),
(24, 'VI', 'Video Recording', '2019-11-04 00:00:00'),
(25, 'EQ', 'Equipment', '2019-11-04 00:00:00'),
(26, 'CF', 'Computer File', '2019-11-04 00:00:00'),
(27, 'CA', 'Cartographic Material', '2019-11-04 00:00:00'),
(28, 'CD', 'CD-ROM', '2019-11-04 00:00:00'),
(29, 'MV', 'Multimedia', '2019-11-04 00:00:00'),
(30, 'ER', 'Electronic Resource', '2019-11-04 00:00:00'),
(31, 'DVD', 'Digital Versatile Disc', '2019-11-04 00:00:00'),
(33, 'asd', 'asdad', '2019-11-05 08:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `pp_item`
--

DROP TABLE IF EXISTS `pp_item`;
CREATE TABLE IF NOT EXISTS `pp_item` (
`id` int(10) NOT NULL,
  `buku_id` varchar(100) NOT NULL,
  `nopanggil` varchar(100) NOT NULL,
  `tipekoleksi_id` varchar(100) NOT NULL,
  `item_kode` varchar(100) NOT NULL,
  `lokasi_id` varchar(100) NOT NULL,
  `lokasi_rak` varchar(100) NOT NULL,
  `item_status_id` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `source_id` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `invoice_tanggal` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `pp_item`
--

INSERT INTO `pp_item` (`id`, `buku_id`, `nopanggil`, `tipekoleksi_id`, `item_kode`, `lokasi_id`, `lokasi_rak`, `item_status_id`, `supplier_id`, `source_id`, `invoice`, `invoice_tanggal`, `harga`, `last_update`, `user`) VALUES
(24, '10', '75', '3', 'B00001', '1', '', '0', '', '1', '', '', '0', '2019-11-25 16:00:24', 'admin@admin.com'),
(25, '10', '77', '3', 'B00002', '1', '', '0', '', '1', '', '', '0', '2019-11-25 16:00:39', 'admin@admin.com'),
(26, '10', '80', '3', 'B00003', '1', '', '0', '', '1', '', '', '0', '2019-11-25 16:00:17', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `pp_kalaterbit`
--

DROP TABLE IF EXISTS `pp_kalaterbit`;
CREATE TABLE IF NOT EXISTS `pp_kalaterbit` (
`id` int(11) NOT NULL,
  `nama` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `language_prefix` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_increment` smallint(6) DEFAULT NULL,
  `time_unit` enum('day','week','month','year') COLLATE utf8_unicode_ci DEFAULT 'day',
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pp_kalaterbit`
--

INSERT INTO `pp_kalaterbit` (`id`, `nama`, `language_prefix`, `time_increment`, `time_unit`, `input_date`, `last_update`) VALUES
(1, 'Weekly', 'en', 1, 'week', '2009-05-23', '2009-05-23'),
(2, 'Bi-weekly', 'en', 2, 'week', '2009-05-23', '2009-05-23'),
(3, 'Fourth-Nightly', 'en', 14, 'day', '2009-05-23', '2009-05-23'),
(4, 'Monthly', 'en', 1, 'month', '2009-05-23', '2009-05-23'),
(5, 'Bi-Monthly', 'en', 2, 'month', '2009-05-23', '2009-05-23'),
(6, 'Quarterly', 'en', 3, 'month', '2009-05-23', '2009-05-23'),
(7, '3 Times a Year', 'en', 4, 'month', '2009-05-23', '2009-05-23'),
(8, 'Annualy', 'en', 1, 'year', '2009-05-23', '2009-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `pp_lokasi`
--

DROP TABLE IF EXISTS `pp_lokasi`;
CREATE TABLE IF NOT EXISTS `pp_lokasi` (
`id` int(10) NOT NULL,
  `kode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pp_lokasi`
--

INSERT INTO `pp_lokasi` (`id`, `kode`, `nama`, `last_update`) VALUES
(1, 'SL', 'My Library', '2019-11-05 11:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `pp_member_type`
--

DROP TABLE IF EXISTS `pp_member_type`;
CREATE TABLE IF NOT EXISTS `pp_member_type` (
`id` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `loan_limit` int(11) NOT NULL,
  `loan_periode` int(11) NOT NULL,
  `reborrow_limit` int(11) NOT NULL,
  `fine_each_day` int(11) NOT NULL,
  `last_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pp_member_type`
--

INSERT INTO `pp_member_type` (`id`, `nama`, `loan_limit`, `loan_periode`, `reborrow_limit`, `fine_each_day`, `last_update`) VALUES
(1, 'Standard', 2, 7, 1, 1000, '2019-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pp_penerbit`
--

DROP TABLE IF EXISTS `pp_penerbit`;
CREATE TABLE IF NOT EXISTS `pp_penerbit` (
`id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pp_penerbit`
--

INSERT INTO `pp_penerbit` (`id`, `nama`, `last_update`) VALUES
(1, 'Wiley', '2007-11-29 00:00:00'),
(2, 'OReilly', '2007-11-29 00:00:00'),
(3, 'Apress', '2007-11-29 00:00:00'),
(4, 'Sams', '2007-11-29 00:00:00'),
(5, 'John Wiley', '2007-11-29 00:00:00'),
(6, 'Prentice Hall', '2007-11-29 00:00:00'),
(7, 'Libraries Unlimited', '2007-11-29 00:00:00'),
(8, 'Taylor & Francis Inc.', '2007-11-29 00:00:00'),
(9, 'Palgrave Macmillan', '2007-11-29 00:00:00'),
(10, 'Crown publishers', '2007-11-29 00:00:00'),
(11, 'Atlantic Monthly Press', '2007-11-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pp_pengarang`
--

DROP TABLE IF EXISTS `pp_pengarang`;
CREATE TABLE IF NOT EXISTS `pp_pengarang` (
`id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `pp_pengarang`
--

INSERT INTO `pp_pengarang` (`id`, `nama`, `last_update`) VALUES
(1, 'Valade, Janet', '2007-11-29'),
(2, 'Siever, Ellen', '2007-11-29'),
(3, 'Love, Robert', '2007-11-29'),
(4, 'Robbins, Arnold', '2007-11-29'),
(5, 'Figgins, Stephen', '2007-11-29'),
(6, 'Weber, Aaron', '2007-11-29'),
(7, 'Kofler, Michael', '2007-11-29'),
(8, 'Kramer, David', '2007-11-29'),
(9, 'Raymond, Eric', '2007-11-29'),
(10, 'Fogel, Karl', '2007-11-29'),
(11, 'Douglas, Korry', '2007-11-29'),
(12, 'Douglas, Susan', '2007-11-29'),
(13, 'Shklar, Leon', '2007-11-29'),
(14, 'Rosen, Richard', '2007-11-29'),
(15, 'Woychowsky, Edmond', '2007-11-29'),
(16, 'Taylor, Arlene G.', '2007-11-29'),
(17, 'Stueart, Robert D.', '2007-11-29'),
(18, 'Moran, Barbara B.', '2007-11-29'),
(19, 'Morville, Peter', '2007-11-29'),
(20, 'Rosenfeld, Louis', '2007-11-29'),
(21, 'Robinson, Mark', '2007-11-29'),
(22, 'Bracking, Sarah', '2007-11-29'),
(23, 'Huffington, Arianna Stassinopoulos', '2007-11-29'),
(24, 'Hancock, Graham', '2007-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `pp_statusitem`
--

DROP TABLE IF EXISTS `pp_statusitem`;
CREATE TABLE IF NOT EXISTS `pp_statusitem` (
`id` int(10) NOT NULL,
  `kode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pp_statusitem`
--

INSERT INTO `pp_statusitem` (`id`, `kode`, `nama`, `last_update`) VALUES
(1, 'R', 'Repair', '2019-11-04'),
(2, 'NL', 'No Loan', '2019-11-04'),
(3, 'MIS', 'Missing', '2019-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `pp_sumberperolehan`
--

DROP TABLE IF EXISTS `pp_sumberperolehan`;
CREATE TABLE IF NOT EXISTS `pp_sumberperolehan` (
`id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pp_sumberperolehan`
--

INSERT INTO `pp_sumberperolehan` (`id`, `nama`) VALUES
(1, 'Beli'),
(2, 'Hadiah/Hibah');

-- --------------------------------------------------------

--
-- Table structure for table `pp_supplier`
--

DROP TABLE IF EXISTS `pp_supplier`;
CREATE TABLE IF NOT EXISTS `pp_supplier` (
`id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `hp` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pp_supplier`
--

INSERT INTO `pp_supplier` (`id`, `nama`, `alamat`, `kontak`, `hp`) VALUES
(1, 'Erlangga', '', '', '0813334456');

-- --------------------------------------------------------

--
-- Table structure for table `pp_tempatterbit`
--

DROP TABLE IF EXISTS `pp_tempatterbit`;
CREATE TABLE IF NOT EXISTS `pp_tempatterbit` (
`id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pp_tempatterbit`
--

INSERT INTO `pp_tempatterbit` (`id`, `nama`, `last_update`) VALUES
(1, 'Hoboken, NJ', '2007-11-29'),
(2, 'Sebastopol, CA', '2007-11-29'),
(3, 'Indianapolis', '2007-11-29'),
(4, 'Upper Saddle River, NJ', '2007-11-29'),
(5, 'Westport, Conn.', '2007-11-29'),
(6, 'Cambridge, Mass', '2007-11-29'),
(7, 'London', '2007-11-29'),
(8, 'New York', '2007-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `pp_tipeisi`
--

DROP TABLE IF EXISTS `pp_tipeisi`;
CREATE TABLE IF NOT EXISTS `pp_tipeisi` (
`id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kode2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `pp_tipeisi`
--

INSERT INTO `pp_tipeisi` (`id`, `nama`, `kode`, `kode2`, `last_update`) VALUES
(1, 'cartographic dataset', 'crd', 'e', '0000-00-00 00:00:00'),
(2, 'cartographic image', 'cri', 'e', '0000-00-00 00:00:00'),
(3, 'cartographic moving image', 'crm', 'e', '0000-00-00 00:00:00'),
(4, 'cartographic tactile image', 'crt', 'e', '0000-00-00 00:00:00'),
(5, 'cartographic tactile three-dimensional form', 'crn', 'e', '0000-00-00 00:00:00'),
(6, 'cartographic three-dimensional form', 'crf', 'e', '0000-00-00 00:00:00'),
(7, 'computer dataset', 'cod', 'm', '0000-00-00 00:00:00'),
(8, 'computer program', 'cop', 'm', '0000-00-00 00:00:00'),
(9, 'notated movement', 'ntv', 'a', '0000-00-00 00:00:00'),
(10, 'notated music', 'ntm', 'c', '0000-00-00 00:00:00'),
(11, 'performed music', 'prm', 'j', '0000-00-00 00:00:00'),
(12, 'sounds', 'snd', 'i', '0000-00-00 00:00:00'),
(13, 'spoken word', 'spw', 'i', '0000-00-00 00:00:00'),
(14, 'still image', 'sti', 'k', '0000-00-00 00:00:00'),
(15, 'tactile image', 'tci', 'k', '0000-00-00 00:00:00'),
(16, 'tactile notated music', 'tcm', 'c', '0000-00-00 00:00:00'),
(17, 'tactile notated movement', 'tcn', 'a', '0000-00-00 00:00:00'),
(18, 'tactile text', 'tct', 'a', '0000-00-00 00:00:00'),
(19, 'tactile three-dimensional form', 'tcf', 'r', '0000-00-00 00:00:00'),
(20, 'text', 'txt', 'a', '0000-00-00 00:00:00'),
(21, 'three-dimensional form', 'tdf', 'r', '0000-00-00 00:00:00'),
(22, 'three-dimensional moving image', 'tdm', 'g', '0000-00-00 00:00:00'),
(23, 'two-dimensional moving image', 'tdi', 'g', '0000-00-00 00:00:00'),
(24, 'other', 'xxx', 'o', '0000-00-00 00:00:00'),
(25, 'unspecified', 'zzz', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pp_tipekoleksi`
--

DROP TABLE IF EXISTS `pp_tipekoleksi`;
CREATE TABLE IF NOT EXISTS `pp_tipekoleksi` (
`id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pp_tipekoleksi`
--

INSERT INTO `pp_tipekoleksi` (`id`, `nama`, `last_update`) VALUES
(1, 'Reference', '2019-11-25 08:17:14'),
(2, 'Textbox', '2019-11-25 08:17:19'),
(3, 'Fiction', '2019-11-25 08:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `pp_tipemedia`
--

DROP TABLE IF EXISTS `pp_tipemedia`;
CREATE TABLE IF NOT EXISTS `pp_tipemedia` (
`id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kode2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pp_tipemedia`
--

INSERT INTO `pp_tipemedia` (`id`, `nama`, `kode`, `kode2`, `last_update`) VALUES
(1, 'audio', 's', 's', '0000-00-00 00:00:00'),
(2, 'computer', 'c', 'c', '0000-00-00 00:00:00'),
(3, 'microform', 'h', 'h', '0000-00-00 00:00:00'),
(4, 'microscopic', 'p', '', '0000-00-00 00:00:00'),
(5, 'projected', 'g', 'g', '0000-00-00 00:00:00'),
(6, 'stereographic', 'e', '', '0000-00-00 00:00:00'),
(7, 'unmediated', 'n', 't', '0000-00-00 00:00:00'),
(8, 'video', 'v', 'v', '0000-00-00 00:00:00'),
(9, 'other', 'x', 'z', '0000-00-00 00:00:00'),
(10, 'unspecified', 'z', 'z', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pp_topik`
--

DROP TABLE IF EXISTS `pp_topik`;
CREATE TABLE IF NOT EXISTS `pp_topik` (
`id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `pp_topik`
--

INSERT INTO `pp_topik` (`id`, `nama`, `last_update`) VALUES
(1, 'Programming', '2007-11-29 00:00:00'),
(2, 'Website', '2007-11-29 00:00:00'),
(3, 'Operating System', '2007-11-29 00:00:00'),
(4, 'Linux', '2007-11-29 00:00:00'),
(5, 'Computer', '2007-11-29 00:00:00'),
(6, 'Database', '2007-11-29 00:00:00'),
(7, 'RDBMS', '2007-11-29 00:00:00'),
(8, 'Open Source', '2007-11-29 00:00:00'),
(9, 'Project', '2007-11-29 00:00:00'),
(10, 'Design', '2007-11-29 00:00:00'),
(11, 'Information', '2007-11-29 00:00:00'),
(12, 'Organization', '2007-11-29 00:00:00'),
(13, 'Metadata', '2007-11-29 00:00:00'),
(14, 'Library', '2007-11-29 00:00:00'),
(15, 'Corruption', '2007-11-29 00:00:00'),
(16, 'Development', '2007-11-29 00:00:00'),
(17, 'Poverty', '2007-11-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Super', 'superadmin', 'superadmin@admin.com', 'default.jpg', '$2y$10$fLnMbhwfjtzAs8uLA/Z.j.TH71uvtOOWBmn.kKJyS2eos11XO2Soq', 1, 1, 1555463755),
(4, 'Administrator', 'admin', 'admin@admin.com', '1574305400079.JPG', '$2y$10$HOXbJryUUAhaC3guNduXIOC7UlAOI8BF8Xg.UKMmD/wohI6gXoUd.', 1, 1, 1572585977),
(5, 'Anggota', 'anggota', 'anggota@anggota.com', 'default.jpg', '$2y$10$k/eGVwFKNRy4LGocNY0hfe4iigRP/.gDyZHpIi..Ed6IAXaveiCtS', 1, 1, 1572586003);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE IF NOT EXISTS `user_access_menu` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(5, 3, 2),
(6, 3, 3),
(7, 2, 14),
(8, 1, 15),
(9, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_submenu`
--

DROP TABLE IF EXISTS `user_access_submenu`;
CREATE TABLE IF NOT EXISTS `user_access_submenu` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `user_access_submenu`
--

INSERT INTO `user_access_submenu` (`id`, `role_id`, `submenu_id`) VALUES
(4, 1, 2),
(5, 1, 3),
(6, 1, 8),
(7, 1, 4),
(12, 1, 1),
(13, 1, 10),
(14, 1, 9),
(15, 1, 7),
(16, 1, 14),
(17, 1, 15),
(18, 1, 16),
(19, 1, 17),
(20, 1, 18),
(21, 1, 19),
(22, 1, 20),
(23, 1, 21),
(24, 1, 22),
(25, 1, 23),
(26, 1, 24),
(27, 1, 25),
(28, 1, 26),
(29, 1, 27),
(31, 1, 28),
(32, 1, 29),
(33, 1, 30),
(34, 1, 31),
(36, 3, 32),
(37, 3, 33),
(38, 4, 32),
(39, 4, 33),
(40, 1, 34),
(41, 1, 35),
(42, 1, 36),
(43, 1, 37),
(44, 1, 38),
(45, 1, 39),
(46, 1, 40),
(47, 1, 41),
(48, 1, 42),
(49, 1, 43),
(50, 1, 44),
(51, 1, 45),
(52, 1, 46),
(53, 1, 47),
(54, 1, 48),
(55, 1, 49),
(56, 1, 50),
(57, 1, 51),
(58, 1, 52),
(59, 1, 53),
(60, 1, 54),
(61, 1, 55),
(62, 1, 56),
(63, 1, 57),
(64, 1, 58),
(65, 1, 59),
(66, 1, 60),
(67, 1, 61),
(68, 5, 62),
(69, 5, 63),
(70, 5, 64),
(71, 5, 65),
(72, 5, 66),
(73, 5, 67),
(74, 5, 68),
(75, 5, 69),
(76, 1, 70),
(77, 1, 71),
(78, 1, 5),
(79, 2, 72),
(80, 1, 73);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
`id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `menu_id` varchar(50) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `icon`, `menu_id`, `menu`) VALUES
(1, 'fa fa-fw fa-wrench', 'admin', 'Admin'),
(2, 'fa fa-fw fa-users', 'user', 'User'),
(3, 'fa fa-fw fa-navicon', 'menu', 'Menu'),
(16, 'fa fa-fw fa-graduation-cap', 'testing-icon', 'Testing Icon'),
(17, 'fa fa-fw fa-book', 'perpustakaan', 'Perpustakaan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
`id` int(11) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
`id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `sort`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fa fa-fw fa-dashboard', 1, 0),
(2, 2, 'My Profile', 'user', 'fa fa-fw fa-user', 1, 1),
(3, 2, 'Edit Profile', 'user/edit', 'fa fa-fw fa-user', 1, 1),
(4, 3, 'Menu Management', 'menu', 'fa fa-fw fa-folder', 1, 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fa fa-fw fa-folder-open', 2, 1),
(7, 1, 'Role', 'admin/role', 'fa fa-fw fa-user-secret', 1, 1),
(8, 2, 'Change Password', 'user/changepassword', 'fa fa-fw fa-key', 1, 1),
(9, 1, 'Users', 'admin/userlogin', 'fa fa-fw fa-users', 1, 1),
(10, 1, 'Web Setting', 'admin/websetting', 'fa fa-fw fa-wrench', 1, 1),
(11, 4, 'All Pages', 'page', 'fa fa-fw fa-folder', 1, 1),
(12, 5, 'Categories', 'post/postcategories', 'fa fa-fw fa-folder', 2, 1),
(13, 5, 'All Posts', 'post', 'fa fa-fw fa-folder', 1, 1),
(14, 17, 'GMD', 'perpustakaan/gmd', '', 1, 1),
(15, 17, 'Tipe Isi', 'perpustakaan/tipeisi', '', 2, 1),
(16, 17, 'Tipe Media', 'perpustakaan/tipemedia', '', 3, 1),
(17, 17, 'Penerbit', 'perpustakaan/penerbit', '', 5, 1),
(18, 17, 'Topik', 'perpustakaan/topik', '', 6, 1),
(19, 17, 'Tempat Terbit', 'perpustakaan/tempatterbit', '', 7, 1),
(20, 17, 'Lokasi', 'perpustakaan/lokasi', '', 8, 1),
(21, 17, 'Bahasa', 'perpustakaan/bahasa', '', 9, 1),
(22, 17, 'Status Eksemplar', 'perpustakaan/statusitem', '', 10, 1),
(23, 17, 'Buku', 'perpustakaan/buku', '', 14, 1),
(24, 17, 'Pengarang', 'perpustakaan/pengarang', '', 11, 1),
(25, 17, 'CodePattern', 'perpustakaan/codepattern', '', 12, 1),
(26, 17, 'Tipe Koleksi', 'perpustakaan/tipekoleksi', '', 4, 1),
(27, 17, 'Supplier', 'perpustakaan/supplier', '', 13, 1),
(28, 17, 'Eksemplar', 'perpustakaan/eksemplar', '', 15, 1),
(29, 17, 'Tipe Anggota', 'perpustakaan/tipeanggota', '', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE IF NOT EXISTS `user_token` (
`id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

DROP TABLE IF EXISTS `web_setting`;
CREATE TABLE IF NOT EXISTS `web_setting` (
`id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`id`, `name`, `is_active`) VALUES
(1, 'signup_member', 1),
(2, 'forgot_password', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_bahasa`
--
ALTER TABLE `pp_bahasa`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `language_name` (`nama`);

--
-- Indexes for table `pp_buku`
--
ALTER TABLE `pp_buku`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_codepattern`
--
ALTER TABLE `pp_codepattern`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_gmd`
--
ALTER TABLE `pp_gmd`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `gmd_name` (`nama`), ADD UNIQUE KEY `gmd_code` (`kode`);

--
-- Indexes for table `pp_item`
--
ALTER TABLE `pp_item`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_kalaterbit`
--
ALTER TABLE `pp_kalaterbit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_lokasi`
--
ALTER TABLE `pp_lokasi`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `location_name` (`nama`);

--
-- Indexes for table `pp_member_type`
--
ALTER TABLE `pp_member_type`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `member_type_name` (`nama`);

--
-- Indexes for table `pp_penerbit`
--
ALTER TABLE `pp_penerbit`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `publisher_name` (`nama`);

--
-- Indexes for table `pp_pengarang`
--
ALTER TABLE `pp_pengarang`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `author_name` (`nama`);

--
-- Indexes for table `pp_statusitem`
--
ALTER TABLE `pp_statusitem`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `item_status_name` (`nama`);

--
-- Indexes for table `pp_sumberperolehan`
--
ALTER TABLE `pp_sumberperolehan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_supplier`
--
ALTER TABLE `pp_supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_tempatterbit`
--
ALTER TABLE `pp_tempatterbit`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `place_name` (`nama`);

--
-- Indexes for table `pp_tipeisi`
--
ALTER TABLE `pp_tipeisi`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `content_type` (`nama`), ADD KEY `code` (`kode`);

--
-- Indexes for table `pp_tipekoleksi`
--
ALTER TABLE `pp_tipekoleksi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_tipemedia`
--
ALTER TABLE `pp_tipemedia`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `media_type` (`nama`), ADD KEY `code` (`kode`);

--
-- Indexes for table `pp_topik`
--
ALTER TABLE `pp_topik`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `topic` (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pp_bahasa`
--
ALTER TABLE `pp_bahasa`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pp_buku`
--
ALTER TABLE `pp_buku`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pp_codepattern`
--
ALTER TABLE `pp_codepattern`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pp_gmd`
--
ALTER TABLE `pp_gmd`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `pp_item`
--
ALTER TABLE `pp_item`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pp_kalaterbit`
--
ALTER TABLE `pp_kalaterbit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pp_lokasi`
--
ALTER TABLE `pp_lokasi`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pp_member_type`
--
ALTER TABLE `pp_member_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pp_penerbit`
--
ALTER TABLE `pp_penerbit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pp_pengarang`
--
ALTER TABLE `pp_pengarang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pp_statusitem`
--
ALTER TABLE `pp_statusitem`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pp_sumberperolehan`
--
ALTER TABLE `pp_sumberperolehan`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pp_supplier`
--
ALTER TABLE `pp_supplier`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pp_tempatterbit`
--
ALTER TABLE `pp_tempatterbit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pp_tipeisi`
--
ALTER TABLE `pp_tipeisi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pp_tipekoleksi`
--
ALTER TABLE `pp_tipekoleksi`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pp_tipemedia`
--
ALTER TABLE `pp_tipemedia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pp_topik`
--
ALTER TABLE `pp_topik`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
