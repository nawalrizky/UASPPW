-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2023 at 04:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `nama` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pesan` varchar(200) NOT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`nama`, `email`, `pesan`, `submission_date`) VALUES
('nwal', 'nawalrizkykautsar@mail.ugm.ac.id', 'cobaa', '2023-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `order_id` varchar(6) NOT NULL,
  `product_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `order_date` varchar(15) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`order_id`, `product_id`, `email`, `order_date`) VALUES
('5C951Q', 2, 'n.rizkykautsar@gmail.com', '2023-06-20'),
('6RNX2L', 2, 'nrizky.kautsar@gmail.com', '2023-06-19'),
('FZ90WT', 3, 'yodhim@gmail.com', '2023-06-19'),
('GC283E', 1, 'nawalrizkykautsar@mail.ugm.ac.id', '2023-06-19'),
('V7YVG4', 2, 'nrizky.kautsar@gmail.com', '2023-06-19'),
('VAIVET', 3, 'nrizky.kautsar@gmail.com', '2023-06-19'),
('XB1LBW', 1, 'n.rizkykautsar@gmail.com', '2023-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `old_price` int(10) NOT NULL,
  `current_price` int(10) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `fitur_product` varchar(50) NOT NULL,
  `total_buy` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `old_price`, `current_price`, `deskripsi`, `fitur_product`, `total_buy`) VALUES
(1, 'Standard Package', 495000, 495000, '4 Feature\r\n', 'paket standar', NULL),
(2, 'Premium Package', 1000000, 850000, '6 Feature + 1 Bonus\r\n', 'paket premium', NULL),
(3, 'VIP Package', 1450000, 1450000, '6 Feature + 1 Bonus', 'paket vip', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
