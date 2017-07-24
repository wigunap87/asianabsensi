-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jul 2017 pada 08.59
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asianabsensi_01`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_record`
--

CREATE TABLE `absensi_record` (
  `id_absensi_record` int(111) UNSIGNED NOT NULL,
  `worker_id` int(11) UNSIGNED NOT NULL,
  `absensi_date` date NOT NULL,
  `absensi_morningtime` time NOT NULL,
  `absensi_restout` time NOT NULL,
  `absensi_restin` time NOT NULL,
  `absensi_gohome` time NOT NULL,
  `absensi_notes` text NOT NULL,
  `absensi_createdate` datetime NOT NULL,
  `absensi_status` enum('Masuk','Sakit','Alpha','Izin','Telat') NOT NULL DEFAULT 'Alpha'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_record`
--

INSERT INTO `absensi_record` (`id_absensi_record`, `worker_id`, `absensi_date`, `absensi_morningtime`, `absensi_restout`, `absensi_restin`, `absensi_gohome`, `absensi_notes`, `absensi_createdate`, `absensi_status`) VALUES
(3, 1, '2017-07-15', '08:00:00', '12:00:00', '13:00:00', '17:00:00', 'Tidak telat', '2017-07-15 08:50:27', 'Masuk'),
(4, 2, '2017-07-15', '08:05:00', '12:00:00', '13:00:00', '17:00:00', 'Telat 5 Menit', '2017-07-15 08:53:04', 'Telat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usertable`
--

CREATE TABLE `usertable` (
  `userid` char(8) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `lastlogin` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `usertable`
--

INSERT INTO `usertable` (`userid`, `userpass`, `lastlogin`) VALUES
('admasian', 'b37fdcbdc8ed55153c9dd1eb52f5a8ce', 1500093545),
('michs88', '52b4bc65d8a4eac1b977305205e9330e', 1468216935);

-- --------------------------------------------------------

--
-- Struktur dari tabel `worker_record`
--

CREATE TABLE `worker_record` (
  `id_worker_record` int(11) UNSIGNED NOT NULL,
  `worker_barcodeid` varchar(150) NOT NULL,
  `worker_fullname` varchar(150) NOT NULL,
  `worker_address` text NOT NULL,
  `worker_phone` varchar(30) NOT NULL,
  `worker_email` varchar(150) NOT NULL,
  `worker_startdate` varchar(150) NOT NULL,
  `worker_enddate` varchar(150) NOT NULL,
  `worker_position` varchar(150) NOT NULL,
  `worker_salary` decimal(20,0) NOT NULL,
  `worker_createdate` datetime NOT NULL,
  `worker_status` enum('Publish','Unpublish') NOT NULL DEFAULT 'Unpublish'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `worker_record`
--

INSERT INTO `worker_record` (`id_worker_record`, `worker_barcodeid`, `worker_fullname`, `worker_address`, `worker_phone`, `worker_email`, `worker_startdate`, `worker_enddate`, `worker_position`, `worker_salary`, `worker_createdate`, `worker_status`) VALUES
(1, '12345678910', 'Wiguna Pratama', 'Graha Arradea Blok C5 No 16 Jl. Setu Kaum Desa Ciherang Kecamatan Dramaga Bogor 16680', '082297872220', 'wigunapratama87@gmail.com', '01 Januari 2017', 'Now', 'Web Developer', '10000000', '2017-07-15 07:04:17', 'Publish'),
(2, '12345678', 'Dieta Roesniasih', 'Ciherang Gede Gg. Mekar IV No. 26 RT. 03/02 Desa Ciherang Kec. Dramaga', '081218908901', 'dietaroesniasih@gmail.com', '22 February 2017', 'now', 'Staff', '5250000', '2017-07-15 08:51:55', 'Publish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_record`
--
ALTER TABLE `absensi_record`
  ADD PRIMARY KEY (`id_absensi_record`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `worker_record`
--
ALTER TABLE `worker_record`
  ADD PRIMARY KEY (`id_worker_record`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_record`
--
ALTER TABLE `absensi_record`
  MODIFY `id_absensi_record` int(111) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `worker_record`
--
ALTER TABLE `worker_record`
  MODIFY `id_worker_record` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
