-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 04:33 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_193040176`
--

-- --------------------------------------------------------

--
-- Table structure for table `elektronik`
--

CREATE TABLE `elektronik` (
  `no` int(11) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elektronik`
--

INSERT INTO `elektronik` (`no`, `produk`, `kategori`, `merk`, `tipe`, `harga`) VALUES
(1, 'ps4.jpg', 'Konsol Game', 'SONY', 'Playstation 4', 4599000),
(2, 'ps3_fat.jfif', 'Konsol Game', 'SONY', 'Playstation 3', 950000),
(3, 'ps2_fat.png', 'Konsol Game', 'SONY', 'Playstation 2', 650000),
(4, 'ps1_.jpg', 'Konsol Game', 'SONY', 'Playstation ', 400000),
(5, 'aqua_tv.png', 'Televisi', 'AQUA', 'LED TV 32Inch', 1550000),
(6, 'samsul_tv.png', 'Televisi', 'Samsung', 'LED TV 32Inch', 2000000),
(7, 'vakum_philip.jfif', 'Penyedot Debu', 'Philips', 'PowerPro Aqua 3in1', 3299000),
(8, 'nikon_p1k.jpg', 'Kamera', 'Nikon', 'Coolpix P1000', 15250000),
(9, 'speakermahal_harmankardun.jpg', 'Pengeras Suara', 'Harman Kardon', 'Onyx 3', 1680000),
(10, 'samsul_soundbar.jfif', 'Pengeras Suara', 'Samsung', 'Soundbar Speaker HWN300', 645000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$/Do6p0e/iE7mKNsZlo2QTuiFnI5R1ZMAybdYivONLTPNLeyVjudtm'),
(4, 'muhamadf', '$2y$10$d8Frf874X.XbIVt5YkU7E.y0N6vQcuBlTEszHkAzGZ8jAHtRrIVjm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elektronik`
--
ALTER TABLE `elektronik`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elektronik`
--
ALTER TABLE `elektronik`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
