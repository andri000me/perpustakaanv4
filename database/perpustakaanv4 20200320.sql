-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 02:33 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaanv4`
--
CREATE DATABASE IF NOT EXISTS `perpustakaanv4` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `perpustakaanv4`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
`id` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `purchase` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `year`, `purchase`, `sale`, `profit`) VALUES
(1, 2013, 2000, 3000, 1000),
(2, 2014, 4500, 5000, 500),
(3, 2015, 3000, 4500, 1500),
(4, 2016, 2000, 3000, 1000),
(5, 2017, 2000, 4000, 2000),
(6, 2018, 2200, 3000, 800),
(7, 2019, 5000, 7000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

DROP TABLE IF EXISTS `icon`;
CREATE TABLE IF NOT EXISTS `icon` (
`id` int(10) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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
(26, 'fa fa-fw fa-graduation-cap'),
(27, 'fa fa-fw fa-angle-down'),
(28, 'ion ion-ios-cart-outline'),
(29, 'fa fa-fw fa-barcode'),
(30, 'fa fa-fw fa-check'),
(31, 'fa fa-fw fa-edit'),
(32, 'fa fa-fw fa-print');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
`id` int(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `member_type_id` varchar(100) NOT NULL,
  `member_address` varchar(500) NOT NULL,
  `member_hp` varchar(100) NOT NULL,
  `inst_name` varchar(100) NOT NULL,
  `mpassword` varchar(100) NOT NULL,
  `member_image` varchar(100) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `kode`, `nama`, `gender`, `member_type_id`, `member_address`, `member_hp`, `inst_name`, `mpassword`, `member_image`, `last_update`) VALUES
(1, '001', '001', '1', '1', '001', '001', '001', 'dc5c7986daef50c1e02ab09b442ee34f', '', '2019-11-26 10:52:16'),
(2, '003', '003', '1', '1', '003', '003', '003', '93dd4de5cddba2c733c65f233097f05a', '', '2019-11-26 11:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'site_title', 'TCPerpustakaan'),
(2, 'site_description', 'TCPerpustakaan'),
(3, 'site_keyword', 'perpustakaan, indonesia, surabaya'),
(6, 'protocol', 'smtp'),
(7, 'smtp_host', 'ssl://smtp.googlemail.com'),
(8, 'smtp_user', 'rekysmtp@gmail.com'),
(9, 'smtp_pass', 'reky2019'),
(10, 'smtp_port', '465'),
(11, 'mailtype', 'html'),
(12, 'charset', 'utf-8'),
(13, 'newline', '\\r\\n'),
(14, 'width_label', '9'),
(15, 'height_label', '3.3'),
(16, 'item_margin', '0.05'),
(17, 'tanggal_awal', '2019-07-01'),
(18, 'limit_search_item', '15');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'halaman 12', '<p>hal 12</p>\r\n', 'halaman-12', '0000-00-00 00:00:00', '2019-05-07 07:32:49'),
(7, 'iii', '<p><strong>Lorem Ipsum</strong>&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n', 'iii', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'asd', '<p>asd dsa asdadads</p>\r\n', 'asd', '2019-05-04 03:03:06', '2019-05-04 03:04:42');

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
  `bahasa_id` varchar(50) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pp_buku`
--

INSERT INTO `pp_buku` (`id`, `judul`, `pengarang_id`, `penanggungjawab`, `edisi`, `gmd_id`, `tipeisi_id`, `tipemedia_id`, `kalaterbit_id`, `bahasa_id`, `isbn`, `penerbit_id`, `tahunterbit`, `tempatterbit_id`, `deskripsifisik`, `judulseri`, `klasifikasi`, `nopanggil`, `topik_id`, `abstrak`, `gambarsampul`, `lampiran`, `disableopac`, `promoberanda`, `url`, `urlmultimedia`, `last_update`) VALUES
(10, 'The Definitive Guide to MySQL 5', '11', '', '1st ed.', '20', '2', '1', '1', '2', '101112', '3', '55', '6', '55', '88', '000', '005.75/85-22 Kof d', '10', '-Includes a thorough introduction to the VBA language and Excel object libraries - Addresses the problems and pitfalls of Excel VBA--especially those not covered in Microsoft''s online documentation--which ..', '161219114704.jpg', NULL, '1', '1', 'perpustakaan/buku', '55', '2019-12-17 11:40:26'),
(11, 'PHP 5 for dummies', '', '', '1st ed.', '1', '', '', '', '2', '111213', '', '', '', '', '', '000', '006.7/86-22 Woy a', '5', 'Covers the latest major release of PHP, the most popular open source Web scripting language, in the friendly, easy-to-understand For Dummies style PHP is installed on nearly nine million servers', '161219115253.jpg', NULL, NULL, NULL, '', '', '2019-12-17 11:40:31'),
(12, 'Unix In a Nutshell', '5', '', '1st ed.', '1', '', '', '3', '2', '121212', '', '', '', '', '', '010', '', '', 'As an open operating system, Unix can be improved on by anyone and everyone: individuals, companies, universities, and more. As a result, the very nature of Unix has been altered over the years by numerous extensions formulated in an assortment of versions. ...', '161219115130.jpg', NULL, NULL, NULL, '', '', '2019-12-17 11:40:33'),
(13, 'Ajax : Creating Web Pages With Asynchronous JavaScript And XML', '5', 'Pak Romly', '1st ed.', '1', '20', '', '1', '2', '', '11', '2019', '1', '', '', '0001/Amr/Sby', '', '5', 'Using Ajax, you can build Web applications with the sophistication and usability of traditional desktop applications and you can do it using standards and open source software. Now, for the first time, there''s an easy, example-driven guide to Ajax for every Web and open source developer, regardless of experience.', NULL, NULL, NULL, NULL, '', '', '2019-12-17 11:42:40'),
(14, 'Endy PHP', '', '', '1', '', '20', '', '', '2', '', '', '', '', '', '', '000', '', '', '', '080120130750.JPG', NULL, NULL, NULL, '', '', '2020-01-08 13:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `pp_bulan`
--

DROP TABLE IF EXISTS `pp_bulan`;
CREATE TABLE IF NOT EXISTS `pp_bulan` (
`id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `namashort` varchar(50) NOT NULL,
  `urut` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pp_bulan`
--

INSERT INTO `pp_bulan` (`id`, `nama`, `namashort`, `urut`) VALUES
(1, 'JANUARI', 'JAN', '01'),
(2, 'FEBRUARI', 'FEB', '02'),
(3, 'MARET', 'MAR', '03'),
(4, 'APRIL', 'APR', '04'),
(5, 'MEI', 'MEI', '05'),
(6, 'JUNI', 'JUN', '06'),
(7, 'JULI', 'JUL', '07'),
(8, 'AGUSTUS', 'AGU', '08'),
(9, 'SEPTEMBER', 'SEP', '09'),
(10, 'OKTOBER', 'OKT', '10'),
(11, 'NOPEMBER', 'NOP', '11'),
(12, 'DESEMBER', 'DES', '12');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pp_codepattern`
--

INSERT INTO `pp_codepattern` (`id`, `prefix`, `length`, `itemcodepattern`, `last_update`) VALUES
(1, 'B', '5', 'B00000', '2019-11-25 08:05:15'),
(2, 'C', '5', 'C00000', '2019-11-25 15:45:57'),
(3, '1', '5', '100000', '2020-01-07 12:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `pp_fines`
--

DROP TABLE IF EXISTS `pp_fines`;
CREATE TABLE IF NOT EXISTS `pp_fines` (
`id` int(11) NOT NULL,
  `fines_date` date NOT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `debet` int(11) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pp_fines`
--

INSERT INTO `pp_fines` (`id`, `fines_date`, `member_id`, `debet`, `credit`, `description`) VALUES
(4, '2019-12-03', '002', 2000, 0, 'Denda keterlambatan item  B00007'),
(9, '2019-12-04', '002', 50000, 50000, 'Menghilangkan Buku'),
(11, '2019-12-04', '003', 50000, 25000, 'HILANGKAN BUKU'),
(12, '2019-12-08', '003', 7000, 0, 'Denda keterlambatan item  B00003'),
(13, '2019-12-08', '003', 7000, 0, 'Denda keterlambatan item  B00005'),
(14, '2019-12-18', '005', 30000, 0, 'Denda keterlambatan item  B00003');

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
(31, 'DVD', 'Digital Versatile Disc', '2019-11-04 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `pp_item`
--

INSERT INTO `pp_item` (`id`, `buku_id`, `nopanggil`, `tipekoleksi_id`, `item_kode`, `lokasi_id`, `lokasi_rak`, `item_status_id`, `supplier_id`, `source_id`, `invoice`, `invoice_tanggal`, `harga`, `last_update`, `user`) VALUES
(24, '10', '005.75/85-22 Kof d', '3', 'B00001', '1', '', '0', '', '1', '', '', '0', '2019-12-04 12:57:03', 'admin@admin.com'),
(25, '10', '005.75/85-22 Kof d', '3', 'B00002', '1', '', '0', '', '1', '', '', '0', '2019-12-04 12:57:03', 'admin@admin.com'),
(26, '10', '005.75/85-22 Kof d', '3', 'B00003', '1', '', '0', '', '1', '', '', '0', '2019-12-04 12:57:03', 'admin@admin.com'),
(27, '11', '006.7/86-22 Woy a', '3', 'B00004', '1', '', '0', '', '1', '', '', '0', '2019-12-04 12:57:08', 'admin@admin.com'),
(28, '11', '006.7/86-22 Woy a', '3', 'B00005', '1', '', '0', '', '1', '', '', '0', '2019-12-04 12:57:08', 'admin@admin.com'),
(29, '11', '006.7/86-22 Woy a', '3', 'B00006', '1', '', '0', '', '1', '', '', '0', '2019-12-04 12:57:08', 'admin@admin.com'),
(30, '11', '006.7/86-22 Woy a', '3', 'B00007', '1', '', '0', '', '1', '', '', '0', '2019-12-04 12:57:08', 'admin@admin.com'),
(31, '11', '006.7/86-22 Woy a', '3', 'B00008', '1', '', '0', '', '1', '', '', '0', '2019-12-04 12:57:08', 'admin@admin.com'),
(32, '12', '', '3', 'B00009', '1', '', '0', '', '1', '', '', '0', '2019-12-06 13:49:13', 'admin@admin.com'),
(33, '12', '', '3', 'B00010', '1', '', '0', '', '1', '', '', '0', '2019-12-06 13:49:14', 'admin@admin.com'),
(34, '12', '', '3', 'B00011', '1', '', '0', '', '1', '', '', '0', '2019-12-06 13:49:14', 'admin@admin.com'),
(35, '13', '', '2', 'B00012', '1', '', '0', '1', '1', '', '', '0', '2019-12-17 09:18:53', 'admin@admin.com'),
(36, '13', '', '2', 'B00013', '1', '', '0', '1', '1', '', '', '0', '2019-12-17 09:18:53', 'admin@admin.com'),
(37, '13', '', '2', 'B00014', '1', '', '0', '1', '1', '', '', '0', '2019-12-17 09:18:53', 'admin@admin.com'),
(38, '13', '', '3', '100001', '1', '', '0', '', '1', '', '', '0', '2020-01-07 12:31:59', 'admin@admin.com'),
(39, '13', '', '3', '100002', '1', '', '0', '', '1', '', '', '0', '2020-01-07 12:31:59', 'admin@admin.com');

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
-- Table structure for table `pp_loan`
--

DROP TABLE IF EXISTS `pp_loan`;
CREATE TABLE IF NOT EXISTS `pp_loan` (
`id` int(11) NOT NULL,
  `item_kode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_date` date NOT NULL,
  `due_date` date NOT NULL,
  `renewed` int(11) NOT NULL DEFAULT '0',
  `is_lent` int(11) NOT NULL DEFAULT '1',
  `is_return` int(11) NOT NULL DEFAULT '0',
  `return_date` date DEFAULT NULL,
  `last_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pp_loan`
--

INSERT INTO `pp_loan` (`id`, `item_kode`, `member_id`, `loan_date`, `due_date`, `renewed`, `is_lent`, `is_return`, `return_date`, `last_update`, `user_id`) VALUES
(1, 'B00001', '001', '2019-11-29', '2019-12-06', 0, 1, 1, '2019-12-02', '2019-12-02 13:39:58', '4'),
(2, 'B00002', '001', '2019-11-29', '2019-12-06', 0, 1, 1, '2019-12-02', '2019-12-02 13:50:32', '4'),
(3, 'B00003', '003', '2019-11-30', '2019-12-01', 0, 1, 1, '2019-12-08', '2019-12-08 12:56:20', '4'),
(4, 'B00005', '003', '2019-11-30', '2019-12-01', 0, 1, 1, '2019-12-08', '2019-12-08 12:56:24', '4'),
(5, 'B00007', '002', '2019-11-21', '2019-11-30', 1, 1, 1, '2019-12-02', '2019-12-02 10:50:12', '4'),
(6, 'B00008', '002', '2019-11-28', '2019-11-29', 0, 1, 1, '2019-11-30', '2019-11-30 11:32:54', '4'),
(7, 'B00004', '002', '2019-12-02', '2019-11-29', 0, 1, 0, NULL, '2019-12-03 12:39:16', '3'),
(8, 'B00008', '002', '2019-12-02', '2019-11-29', 0, 1, 0, NULL, '2019-12-03 12:39:20', '3'),
(9, 'B00001', '004', '2019-12-08', '2019-12-15', 0, 1, 1, '2019-12-08', '2019-12-08 12:56:02', '4'),
(10, 'B00001', '003', '2019-12-08', '2019-12-15', 0, 1, 0, NULL, NULL, '4'),
(11, 'B00003', '005', '2019-12-09', '2019-12-12', 0, 1, 1, '2019-12-18', '2019-12-18 11:29:41', '3'),
(12, 'B00012', '006', '2019-12-18', '2019-12-25', 0, 1, 0, NULL, NULL, '4'),
(13, 'B00013', '005', '2019-12-18', '2019-12-21', 0, 1, 0, NULL, NULL, '4');

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
-- Table structure for table `pp_member`
--

DROP TABLE IF EXISTS `pp_member`;
CREATE TABLE IF NOT EXISTS `pp_member` (
`id` int(10) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `member_type_id` varchar(100) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_address` varchar(500) NOT NULL,
  `member_hp` varchar(100) NOT NULL,
  `inst_name` varchar(100) NOT NULL,
  `mpassword` varchar(100) NOT NULL,
  `member_image` varchar(100) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pp_member`
--

INSERT INTO `pp_member` (`id`, `member_id`, `nama`, `gender`, `member_type_id`, `member_email`, `member_address`, `member_hp`, `inst_name`, `mpassword`, `member_image`, `last_update`, `is_active`) VALUES
(1, '001', 'TONY STARK', '1', '1', '', '001', '001', '001', 'dc5c7986daef50c1e02ab09b442ee34f', '101219100159.jpg', '2019-12-10 10:01:59', 1),
(2, '003', 'CLARK', '1', '1', 'rekysda@gmail.com', '003', '003', '003', '93dd4de5cddba2c733c65f233097f05a', '061219064342.jpg', '2019-12-20 13:43:21', 1),
(4, '002', 'SCARLET', '1', '1', '', '002', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '061219064309.jpg', '2019-12-06 12:43:09', 1),
(5, '004', 'FLASH', '1', '1', '', '004', '', '', '', '101219100324.jpg', '2019-12-10 10:03:24', 1),
(6, '005', 'CAPTAIN', '2', '5', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '101219100442.jpg', '2019-12-10 10:04:42', 1),
(7, '006', 'SHARUK KHAN', '1', '1', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '151219144531.jpg', '2019-12-15 14:49:01', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pp_member_type`
--

INSERT INTO `pp_member_type` (`id`, `nama`, `loan_limit`, `loan_periode`, `reborrow_limit`, `fine_each_day`, `last_update`) VALUES
(1, 'Standard', 2, 7, 1, 1000, '2019-11-26 00:00:00'),
(5, 'Anggota Luar', 1, 3, 1, 5000, '2019-12-09 10:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `pp_pdf`
--

DROP TABLE IF EXISTS `pp_pdf`;
CREATE TABLE IF NOT EXISTS `pp_pdf` (
`id` int(10) NOT NULL,
  `buku_id` varchar(100) NOT NULL,
  `file_pdf` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pp_pdf`
--

INSERT INTO `pp_pdf` (`id`, `buku_id`, `file_pdf`) VALUES
(7, '14', '14.pdf');

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
(4, 'Administrator', 'admin', 'admin@admin.com', '1575942257346.jpg', '$2y$10$HOXbJryUUAhaC3guNduXIOC7UlAOI8BF8Xg.UKMmD/wohI6gXoUd.', 1, 1, 1572585977),
(5, 'Petugas', 'petugas', 'petugas@petugas.com', 'default.jpg', '$2y$10$aTnfvHPLJhYw2gvnn6mwuun116jBYynToZ5x6zkYLML9lgB7EfeV6', 2, 1, 1576647051);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE IF NOT EXISTS `user_access_menu` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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
(9, 1, 17),
(10, 1, 18),
(12, 1, 19),
(13, 1, 20),
(14, 1, 21),
(15, 1, 22),
(16, 2, 19),
(17, 2, 18),
(18, 2, 20),
(19, 2, 21),
(20, 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_submenu`
--

DROP TABLE IF EXISTS `user_access_submenu`;
CREATE TABLE IF NOT EXISTS `user_access_submenu` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

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
(80, 1, 73),
(81, 1, 32),
(82, 1, 33),
(83, 2, 30),
(84, 2, 23),
(85, 2, 28),
(86, 2, 31),
(87, 2, 32),
(88, 2, 33),
(89, 2, 34),
(90, 2, 37),
(91, 2, 39),
(92, 2, 40),
(93, 2, 41),
(94, 2, 42),
(95, 2, 43),
(96, 2, 44),
(97, 2, 35),
(98, 2, 36),
(99, 2, 38);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `icon`, `menu_id`, `menu`) VALUES
(1, 'fa fa-fw fa-wrench', 'admin', 'Admin'),
(2, 'fa fa-fw fa-users', 'user', 'User'),
(3, 'fa fa-fw fa-navicon', 'menu', 'Menu'),
(16, 'fa fa-fw fa-graduation-cap', 'testing-icon', 'Testing Icon'),
(17, 'fa fa-fw fa-edit', 'master', 'Master'),
(18, 'fa fa-fw fa-building', 'bibliography', 'Bibliography'),
(19, 'fa fa-fw fa-user', 'keanggotaan', 'Keanggotaan'),
(20, 'fa fa-fw fa-dollar', 'transaksi', 'Transaksi'),
(21, 'fa fa-fw fa-book', 'laporan', 'Laporan'),
(22, 'fa fa-fw fa-barcode', 'labeling', 'Labeling'),
(23, 'fa fa-fw fa-cube', 'page', 'Page');

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
(2, 'Petugas');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

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
(14, 17, 'GMD', 'master/gmd', '', 1, 1),
(15, 17, 'Tipe Isi', 'master/tipeisi', '', 2, 1),
(16, 17, 'Tipe Media', 'master/tipemedia', '', 3, 1),
(17, 17, 'Penerbit', 'master/penerbit', '', 5, 1),
(18, 17, 'Topik', 'master/topik', '', 6, 1),
(19, 17, 'Tempat Terbit', 'master/tempatterbit', '', 7, 1),
(20, 17, 'Lokasi', 'master/lokasi', '', 8, 1),
(21, 17, 'Bahasa', 'master/bahasa', '', 9, 1),
(22, 17, 'Status Eksemplar', 'master/statusitem', '', 10, 1),
(23, 18, 'Buku', 'bibliography/buku', '', 1, 1),
(24, 17, 'Pengarang', 'master/pengarang', '', 11, 1),
(25, 17, 'CodePattern', 'master/codepattern', '', 12, 1),
(26, 17, 'Tipe Koleksi', 'master/tipekoleksi', '', 4, 1),
(27, 17, 'Supplier', 'master/supplier', '', 13, 1),
(28, 18, 'Eksemplar', 'bibliography/eksemplar', '', 2, 1),
(29, 19, 'Tipe Anggota', 'keanggotaan/tipeanggota', '', 1, 1),
(30, 19, 'Anggota', 'keanggotaan/anggota', '', 2, 1),
(31, 20, 'Transaksi', 'transaksi/transaksi1', '', 1, 1),
(32, 20, 'Pengembalian', 'transaksi/pengembalian', '', 2, 1),
(33, 21, 'Sejarah Peminjaman', 'laporan/sejarahpeminjaman', '', 1, 1),
(34, 21, 'Daftar Keterlambatan', 'laporan/daftarketerlambatan', '', 2, 1),
(35, 22, 'Pencetakan Label', 'labeling/pencetakanlabel', '', 1, 1),
(36, 22, 'Pencetakan Barcode', 'labeling/pencetakanbarcode', '', 2, 1),
(37, 21, 'Daftar Denda', 'laporan/daftardenda', '', 3, 1),
(38, 22, 'Pencetakan Qrcode', 'labeling/pencetakanqrcode', '', 3, 1),
(39, 21, 'Rekapitulasi', 'laporan/rekapitulasi', '', 4, 1),
(40, 21, 'Daftar Judul', 'laporan/daftarjudul', '', 5, 1),
(41, 21, 'Penggunaan Koleksi', 'laporan/penggunaan_koleksi', '', 6, 1),
(42, 21, 'Peminjaman Anggota', 'laporan/peminjamananggota', '', 7, 1),
(43, 21, 'Statistik Pengunjung', 'laporan/statistikpengunjung', '', 8, 1),
(44, 21, 'Statistik Bulanan', 'laporan/statistikbulanan', '', 9, 1),
(45, 23, 'Page', 'page', '', 1, 1);

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
-- Table structure for table `visitor_count`
--

DROP TABLE IF EXISTS `visitor_count`;
CREATE TABLE IF NOT EXISTS `visitor_count` (
`id` int(11) NOT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `checkin_date` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `visitor_count`
--

INSERT INTO `visitor_count` (`id`, `member_id`, `member_name`, `institution`, `checkin_date`) VALUES
(8, '001', 'TONY STARK', NULL, '2019-12-06 10:39:02'),
(7, '002', 'SCARLET', NULL, '2019-12-02 10:38:00'),
(6, '001', 'TONY STARK', NULL, '2019-12-04 10:30:54'),
(9, '002', 'SCARLET', NULL, '2019-12-06 10:39:04'),
(10, '003', 'CLARK', NULL, '2019-12-08 10:39:07'),
(11, '001', 'TONY STARK', NULL, '2019-12-09 10:39:36'),
(12, '002', 'SCARLET', NULL, '2019-12-09 10:39:38'),
(13, '003', 'CLARK', NULL, '2019-12-09 10:39:40'),
(14, '004', 'FLASH', NULL, '2019-12-09 10:39:47'),
(15, '005', 'CAPTAIN', NULL, '2019-12-09 11:20:46'),
(16, '001', 'TONY STARK', NULL, '2019-12-10 09:45:18'),
(17, '002', 'SCARLET', NULL, '2019-12-10 09:53:17'),
(18, '003', 'CLARK', NULL, '2019-12-10 09:53:43'),
(19, '005', 'CAPTAIN', NULL, '2019-12-10 09:54:09'),
(20, '004', 'FLASH', NULL, '2019-12-10 09:56:07');

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
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `pp_bulan`
--
ALTER TABLE `pp_bulan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_codepattern`
--
ALTER TABLE `pp_codepattern`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_fines`
--
ALTER TABLE `pp_fines`
 ADD PRIMARY KEY (`id`), ADD KEY `member_id` (`member_id`);

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
-- Indexes for table `pp_loan`
--
ALTER TABLE `pp_loan`
 ADD PRIMARY KEY (`id`), ADD KEY `item_code` (`item_kode`), ADD KEY `member_id` (`member_id`), ADD KEY `input_date` (`last_update`,`user_id`);

--
-- Indexes for table `pp_lokasi`
--
ALTER TABLE `pp_lokasi`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `location_name` (`nama`);

--
-- Indexes for table `pp_member`
--
ALTER TABLE `pp_member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_member_type`
--
ALTER TABLE `pp_member_type`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `member_type_name` (`nama`);

--
-- Indexes for table `pp_pdf`
--
ALTER TABLE `pp_pdf`
 ADD PRIMARY KEY (`id`);

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
-- Indexes for table `visitor_count`
--
ALTER TABLE `visitor_count`
 ADD PRIMARY KEY (`id`), ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pp_bahasa`
--
ALTER TABLE `pp_bahasa`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pp_buku`
--
ALTER TABLE `pp_buku`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pp_bulan`
--
ALTER TABLE `pp_bulan`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pp_codepattern`
--
ALTER TABLE `pp_codepattern`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pp_fines`
--
ALTER TABLE `pp_fines`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pp_gmd`
--
ALTER TABLE `pp_gmd`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `pp_item`
--
ALTER TABLE `pp_item`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `pp_kalaterbit`
--
ALTER TABLE `pp_kalaterbit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pp_loan`
--
ALTER TABLE `pp_loan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pp_lokasi`
--
ALTER TABLE `pp_lokasi`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pp_member`
--
ALTER TABLE `pp_member`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pp_member_type`
--
ALTER TABLE `pp_member_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pp_pdf`
--
ALTER TABLE `pp_pdf`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visitor_count`
--
ALTER TABLE `visitor_count`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
