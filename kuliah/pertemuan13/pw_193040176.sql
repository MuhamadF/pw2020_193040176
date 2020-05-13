-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 02:11 PM
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
-- Database: `pw_193040176`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Sugih Mohammad Galih', '193040180', '193040180@unpas.ac.id', 'Teknik Informatika', 'sugih.png'),
(2, 'Jeremy Anandhika Elyas', '193040173', '193040173@mail.unpas.ac.id', 'Teknik Informatika', 'jeremy.png'),
(3, 'Kevin Fredrian Syach', '193040163', '193040173@mail.unpas.ac.id', 'Teknik Informatika', 'kevin.png'),
(4, 'Muhamad Fawwazt Sabilarrasyad', '193040176', '193040176@mail.unpas.ac.id', 'Teknik Informatika', 'fawwazt.png'),
(5, 'Mohammad Iqbal Ghiffari', '193040147', '193040147@mail.unpas.ac.id', 'Teknik Informatika', 'iqbal.png'),
(6, 'Rizky Angga Saputra', '193040160', '193040160@mail.unpas.ac.id', 'Teknik Informatika', 'angga.png'),
(7, 'Fajri Khoirunnisa', '193040159', '193040159@mail.unpas.ac.id', 'Teknik Informatika', 'fajri.png'),
(8, 'Vikry Syauqi', '193040156', '193040156@mail.unpas.ac.id', 'Teknik Informatika', 'syauqi.png'),
(9, 'Rifqi Mulyawan', '193040149', '193040149@mail.unpas.ac.id', 'Teknik Informatika', 'rifqi.png'),
(10, 'Cahyadi Ivansah', '193040155', '193040155@mail.unpas.ac.id', 'Teknik Informatika', 'ivan.png'),
(11, 'Rifqi Perdiansyah', '193040188', '193940188@mail.unpas.ac.id', 'Teknik Informatika', 'rifqi_p.png');

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
(1, 'admin', '$2y$10$Ke.Zbhn4Hrzg41Rj0mw1p.URYLBKtb0O1cICsMn.LfYL4bmDnLz.q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
