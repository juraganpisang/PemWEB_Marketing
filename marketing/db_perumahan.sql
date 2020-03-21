-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 04:21 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perumahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_harga`
--

CREATE TABLE `tbl_harga` (
  `id_harga` int(3) NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_harga`
--

INSERT INTO `tbl_harga` (`id_harga`, `harga`) VALUES
(1, 150000000),
(2, 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembeli`
--

CREATE TABLE `tbl_pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `kode_booking` varchar(7) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar(40) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `kode_rumah` varchar(5) NOT NULL,
  `harga_rumah` int(11) NOT NULL,
  `metode_bayar` int(1) NOT NULL,
  `cicilan` int(3) NOT NULL,
  `nominal_cicilan` double(12,2) NOT NULL,
  `kontan` double(12,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembeli`
--

INSERT INTO `tbl_pembeli` (`id_pembeli`, `kode_booking`, `date`, `nama`, `no_ktp`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `kode_rumah`, `harga_rumah`, `metode_bayar`, `cicilan`, `nominal_cicilan`, `kontan`, `status`) VALUES
(1, 'mayXGBE', '2019-06-17 21:07:42', 'Ayah', '187256178325', 'Laki - Laki', 'Jalan Gunung Jati', 'Jalan Gunung Ja', 'ronald@gmail.com', 'A01', 150000000, 1, 0, 0.00, 120000.00, 1),
(2, 'VYjnEBm', '2019-06-19 13:02:58', 'Ronald', '123123123', 'Laki - Laki', 'd', 'd', 'd', 'B02', 100000000, 2, 12, 8633333.33, 0.00, 0),
(3, 'nzbsPy3', '2019-06-19 13:13:43', 'Rena', '9816237', 'Laki - Laki', 'd', 'd', 'd', 'B06', 100000000, 1, 0, 0.00, 100000000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rumah`
--

CREATE TABLE `tbl_rumah` (
  `kode_rumah` varchar(5) NOT NULL,
  `id_harga` int(3) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `terjual` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rumah`
--

INSERT INTO `tbl_rumah` (`kode_rumah`, `id_harga`, `foto`, `terjual`) VALUES
('A01', 1, 'soldA.jpg', 1),
('A02', 1, 'a02.jpg', 0),
('A03', 1, 'a03.jpg', 0),
('A04', 1, 'a04.jpg', 0),
('A05', 1, 'a05.jpg', 0),
('A06', 1, 'a06.jpg', 0),
('A07', 1, 'a07.jpg', 0),
('A08', 1, 'a08.jpg', 0),
('B01', 2, 'b01.jpg', 0),
('B02', 2, 'soldB.jpg', 1),
('B03', 2, 'b03.jpg', 0),
('B04', 2, 'b04.jpg', 0),
('B05', 2, 'b05.jpg', 0),
('B06', 2, 'soldB.jpg', 1),
('B07', 2, 'b07.jpg', 0),
('B08', 2, 'b08.jpg', 0),
('C01', 2, 'c01.jpg', 0),
('C02', 2, 'c02.jpg', 0),
('C03', 2, 'c03.jpg', 0),
('C04', 2, 'c04.jpg', 0),
('C05', 2, 'c05.jpg', 0),
('C06', 2, 'c06.jpg', 0),
('C07', 2, 'c07.jpg', 0),
('C08', 2, 'c08.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'aku', 'aku');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `tbl_rumah`
--
ALTER TABLE `tbl_rumah`
  ADD PRIMARY KEY (`kode_rumah`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
