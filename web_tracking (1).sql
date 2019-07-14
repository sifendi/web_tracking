-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 01:40 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `delete_is` int(11) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `delete_is`, `id_level`) VALUES
(2, 'afendi', '76cf4079ac1b10a3f8c77ca4bd161b29', 'Satreskrim Polres Situbondo', 0, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `id_history` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `id_order`, `id_status`, `tgl_update`) VALUES
(3, 5, 3, '2019-07-13 19:00:00'),
(4, 5, 1, '2019-07-13 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_kapal`
--

CREATE TABLE `tb_jadwal_kapal` (
  `id_jadwal_kapal` int(11) NOT NULL,
  `jenis_kapal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal_kapal`
--

INSERT INTO `tb_jadwal_kapal` (`id_jadwal_kapal`, `jenis_kapal`) VALUES
(1, 'Meratus Manado'),
(2, 'SPIL Hasya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_container`
--

CREATE TABLE `tb_jenis_container` (
  `id_jenis_container` int(11) NOT NULL,
  `jenis_container` text NOT NULL,
  `status` int(11) NOT NULL,
  `no_kendaraan` varchar(200) NOT NULL,
  `nama_pemilik` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_container`
--

INSERT INTO `tb_jenis_container` (`id_jenis_container`, `jenis_container`, `status`, `no_kendaraan`, `nama_pemilik`) VALUES
(1, 'Container 20 Feet', 1, 'L 6666 UI', 'PT. Samsuri Group'),
(2, 'Container 40 Feet', 1, 'L 5555 UI', 'PT. Samsuri Group'),
(3, 'Container 40 Feet', 1, 'B 1111 UG', 'PT. Jalan jalan'),
(4, 'Container 20 Feet', 1, 'B 2222 UG', 'PT. Jalan jalan'),
(5, 'Flat Rack', 1, 'W 1204 SK', 'PT. Gresik Indah'),
(6, 'Flat Rack', 1, 'W 1994 SK', 'PT. Gresik Indah'),
(7, 'Flat Rack', 1, 'W 1993 SK', 'PT. Sumber Sari');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_pengiriman`
--

CREATE TABLE `tb_jenis_pengiriman` (
  `id_jenis_pengiriman` int(11) NOT NULL,
  `jenis_pengiriman` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_pengiriman`
--

INSERT INTO `tb_jenis_pengiriman` (`id_jenis_pengiriman`, `jenis_pengiriman`) VALUES
(1, 'DOOR TO DOOR'),
(2, 'DOOR TO PORT'),
(3, 'PORT TO PORT'),
(4, 'PORT TO DOOR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `nama_pengirim` varchar(200) NOT NULL,
  `no_tlp_pengirim` varchar(200) NOT NULL,
  `kota_muat` varchar(200) NOT NULL,
  `kota_tujuan` varchar(200) NOT NULL,
  `no_do` varchar(200) NOT NULL,
  `tanggal_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_selesai_order` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ukuran` varchar(200) NOT NULL,
  `berat` varchar(200) NOT NULL,
  `id_jenis_pengiriman` int(11) NOT NULL,
  `id_jenis_container` int(11) NOT NULL,
  `id_jadwal_kapal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `nama_pengirim`, `no_tlp_pengirim`, `kota_muat`, `kota_tujuan`, `no_do`, `tanggal_order`, `tanggal_selesai_order`, `ukuran`, `berat`, `id_jenis_pengiriman`, `id_jenis_container`, `id_jadwal_kapal`) VALUES
(5, 'Afendi', '855512', 'Gresik', 'Manado', 'DO/07/2019-11234', '2019-07-13 17:00:00', '2019-07-13 22:00:00', '200 m', '2 ton', 1, 2, 1),
(12, 'Tri Yoko', '12345678', 'Benowo', 'Magetan', 'DO-2019-11-7', '2019-07-10 17:00:00', '2019-07-13 17:00:00', '120 m', '5 ton', 2, 3, 2),
(13, 'Tri Yoko', '12345678', 'Benowo', 'Magetan', 'DO-2019-11-7', '2019-07-10 17:00:00', '2019-07-13 17:00:00', '120 m', '5 ton', 2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Packing'),
(2, 'Delivered'),
(3, 'On Progress');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_status_pengiriman` (`id_order`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `tb_jadwal_kapal`
--
ALTER TABLE `tb_jadwal_kapal`
  ADD PRIMARY KEY (`id_jadwal_kapal`);

--
-- Indexes for table `tb_jenis_container`
--
ALTER TABLE `tb_jenis_container`
  ADD PRIMARY KEY (`id_jenis_container`);

--
-- Indexes for table `tb_jenis_pengiriman`
--
ALTER TABLE `tb_jenis_pengiriman`
  ADD PRIMARY KEY (`id_jenis_pengiriman`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_jenis_pengiriman` (`id_jenis_pengiriman`),
  ADD KEY `id_jadwal_kapal` (`id_jadwal_kapal`),
  ADD KEY `id_jenis_container` (`id_jenis_container`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jadwal_kapal`
--
ALTER TABLE `tb_jadwal_kapal`
  MODIFY `id_jadwal_kapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jenis_container`
--
ALTER TABLE `tb_jenis_container`
  MODIFY `id_jenis_container` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_jenis_pengiriman`
--
ALTER TABLE `tb_jenis_pengiriman`
  MODIFY `id_jenis_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD CONSTRAINT `tb_history_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`),
  ADD CONSTRAINT `tb_history_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_3` FOREIGN KEY (`id_jadwal_kapal`) REFERENCES `tb_jadwal_kapal` (`id_jadwal_kapal`),
  ADD CONSTRAINT `tb_order_ibfk_4` FOREIGN KEY (`id_jenis_pengiriman`) REFERENCES `tb_jenis_pengiriman` (`id_jenis_pengiriman`),
  ADD CONSTRAINT `tb_order_ibfk_5` FOREIGN KEY (`id_jenis_container`) REFERENCES `tb_jenis_container` (`id_jenis_container`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
