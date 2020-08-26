-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 05:35 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ok_rab`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_satuan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_satuan`) VALUES
(1, 'PC', 439975),
(2, 'Printer', 467957);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(50) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `pc` int(20) NOT NULL,
  `printer` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`, `alamat`, `no_telepon`, `pc`, `printer`) VALUES
(1, 'Area/Prima Priangan', 'Jl. Soekarno Hatta no. 436', '022-5225570', 0, 0),
(2, 'Rayon Bandung Selatan', 'Jl. Soekarno Hatta No. 436', '022-5220447', 0, 0),
(3, 'Rayon Bandung Barat', 'Jl. LMU Nurtanio No. 117', '022-6011255', 0, 0),
(4, 'Rayon Bandung Timur', 'Jl. PHH Mustafa No. 45', '022-7203992', 0, 0),
(5, 'Rayon Cijawura', 'Jl. Ciwastra No. 57', '022-750367', 0, 0),
(6, 'Rayon Kopo', 'Jl. Holis No. 15', '022-6003902', 0, 0),
(7, 'Rayon Bandung Utara', 'Jl. Ir. H. Juanda No. 183', '022-2510907', 0, 0),
(8, 'Rayon Ujung Berung', 'Jl Raya Ujung Berung No. 65', '022-7806653', 0, 0),
(9, 'Area Bandung', 'Jl. Soekarno Hatta no.436', '022-5222043', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(20) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `nama_user`, `password`, `email`, `alamat`, `no_telepon`, `role_id`) VALUES
('1234567890', 'admin', '$2y$10$/T4vF6hLzcMBLJymgW7.AuTQxImf9l3sUUMuPl6Unx/tJYRM1fV/K', '-', '-', '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
