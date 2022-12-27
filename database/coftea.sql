-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 03:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coftea`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `username`, `password`, `role`) VALUES
(3, 'davidhartono04@gmail.com', 'david', 'david', 2),
(6, 'admin@gmail.com', 'admin', 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `harga` double NOT NULL,
  `kategori` enum('Cold Coffee','Hot Coffee','Cold Tea','Hot Tea') DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `kategori`, `foto`, `detail`) VALUES
(6, 'dfsdfsdf', 34234, 'Cold Coffee', 'Pjuq61E4VH7XoMWK1iIv22b68_My project (72).png', '&lt;p&gt;rewer&lt;/p&gt;\r\n'),
(7, 'dsfdsf', 432432, 'Hot Coffee', 'qG0eYDsDHDniwxMaHwLK92653_caffe americano.png', '&lt;p&gt;fsdfsdfs&lt;/p&gt;\r\n'),
(8, 'dfsdfsd', 352432, 'Cold Tea', '80FQb2JXjyxJ3AjHhI9A3bee7_iced black tea.png', '&lt;p&gt;dsfsdfsdfs&lt;/p&gt;\r\n'),
(9, 'dsfsdf', 34234, 'Hot Tea', '3XVASg8QLmp9zTpaHY8z7f433_chamomile tea.jpg', '&lt;p&gt;fdsfsdf&lt;/p&gt;\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
