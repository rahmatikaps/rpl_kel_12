-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2014 at 11:52 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eletter`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE IF NOT EXISTS `jenis_surat` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_jenissurat` varchar(255) NOT NULL,
  `jenis_surat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id`, `id_jenissurat`, `jenis_surat`) VALUES
(3, '01', 'Surat Pemberitahuan'),
(4, '02', 'Surat Keputusan'),
(5, '03', 'Surat Perintah'),
(6, '04', 'Surat Permintaan'),
(7, '05', 'Surat Panggilan'),
(8, '06', 'Surat Peringatan'),
(9, '07', 'Surat Perjanjian'),
(10, '08', 'Surat Laporan'),
(11, '09', 'Surat Pengantar'),
(12, '10', 'Surat Penawaran'),
(13, '11', 'Surat Pemesanan'),
(14, '12', 'Surat Undangan'),
(15, '13', 'Surat Lamaran Pekerjaan');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan_sm`
--

CREATE TABLE IF NOT EXISTS `pemberitahuan_sm` (
  `id_pemberitahuan` int(3) NOT NULL AUTO_INCREMENT,
  `id_suratmasuk` int(3) NOT NULL,
  `id_user_penerima` int(3) NOT NULL,
  `id_user_pengirim` int(3) NOT NULL,
  `catatan` text NOT NULL,
  `status_baca` int(3) NOT NULL,
  PRIMARY KEY (`id_pemberitahuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `pemberitahuan_sm`
--

INSERT INTO `pemberitahuan_sm` (`id_pemberitahuan`, `id_suratmasuk`, `id_user_penerima`, `id_user_pengirim`, `catatan`, `status_baca`) VALUES
(32, 1, 16, 16, '', 1),
(33, 2, 16, 16, '', 0),
(34, 20, 16, 16, '', 1),
(35, 20, 18, 16, 'Fandi', 1),
(36, 20, 19, 18, 'tiwi', 1),
(37, 20, 16, 19, '', 0),
(38, 1, 19, 16, 'lanjutkna', 0),
(39, 21, 16, 16, '', 1),
(40, 21, 18, 16, '-', 0),
(41, 21, 19, 16, '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE IF NOT EXISTS `surat_keluar` (
  `id_suratkeluar` int(4) NOT NULL AUTO_INCREMENT,
  `id_jenissurat` int(4) NOT NULL,
  `no_register` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` text NOT NULL,
  `ttd_oleh` varchar(255) NOT NULL,
  `tembusan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_input` date NOT NULL,
  `id_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id_suratkeluar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratkeluar`, `id_jenissurat`, `no_register`, `asal`, `perihal`, `keterangan`, `ttd_oleh`, `tembusan`, `file`, `tgl_input`, `id_user`) VALUES
(4, 4, '123hbj', 'kug', 'kjbmjhb', 'mnbmj', 'rudy', 'Rektor', 'surat_keluar/20140613123hbj.jpg', '2014-06-13', '16');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `id_suratmasuk` int(4) NOT NULL AUTO_INCREMENT,
  `id_jenissurat` int(4) NOT NULL,
  `no_register` varchar(255) NOT NULL,
  `no_suratpengirim` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` text NOT NULL,
  `ttd_oleh` varchar(255) NOT NULL,
  `tembusan` varchar(255) NOT NULL,
  `disposisi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_input` date NOT NULL,
  `id_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id_suratmasuk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratmasuk`, `id_jenissurat`, `no_register`, `no_suratpengirim`, `asal`, `tgl_surat`, `perihal`, `keterangan`, `ttd_oleh`, `tembusan`, `disposisi`, `file`, `tgl_input`, `id_user`) VALUES
(1, 4, 'SM/06/13/1', '1/N-TEL/III/001 ', 'Neo Telemetri ', '2014-06-12', 'Undangan Acara ', '- ', 'Rudy Hidayat ', 'Rektor ', '16', 'surat_masuk/20140613SM06131.jpg ', '2014-06-13', '16'),
(19, 3, 'SM/06/13/2', '1/N-TEL/III/002 ', 'Neo Telemetri ', '2014-06-12', 'Surat Permohonan Maaf ', '- ', 'Rudy Hidayat ', 'Rektor ', '16', 'surat_masuk/20140613SM06132.jpg ', '2014-06-13', '16'),
(20, 3, 'SM/06/13/20', 'qq ', 'aaaa ', '2014-06-13', 'asd ', 'jhbk ', 'tt ', 'jkjb ', '16', 'surat_masuk/20140613SM061320.jpg ', '2014-06-13', '16'),
(21, 3, 'SM/06/13/21', '1/SI/III/001 ', 'Testing ', '2014-06-13', 'Undangan ', '- ', 'Rudy Hidayat ', 'Rektor ', '16', 'surat_masuk/20140613SM061321.jpg ', '2014-06-13', '16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `nip` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipe_user` int(2) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_tengah` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_telp` int(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `username`, `password`, `tipe_user`, `nama_depan`, `nama_tengah`, `nama_belakang`, `jabatan`, `no_telp`, `email`) VALUES
(16, 123, 'rudy', '123', 1, 'rudy', '', 'hidayat', 'Sekretaris', 8890, 'r@r.r'),
(18, 123, 'tiwi', '123', 3, 'tiwi', '', 'tiwi', 'Dekan', 123123, 'rahmatikaps@gmail.com'),
(19, 444, 'erik', '123', 2, 'erik', '', 'erik', 'Wakil Dekan 1', 998, 'rahmatikaps@gmail.com'),
(20, 222, 'tika', '123', 2, 'tika', '', 'kjhk', 'Kabag', 888, 'reksa@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
