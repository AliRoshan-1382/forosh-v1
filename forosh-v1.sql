-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 09:45 AM
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
-- Database: `forosh-v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin-name` varchar(150) NOT NULL,
  `admin-username` varchar(150) NOT NULL,
  `admin-password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin-name`, `admin-username`, `admin-password`) VALUES
(1, 'Ali Dragon', 'admin', '$2y$10$z4XpTqAFKvekCcSzFZrRXeR.FzO5emrzuOb8M89nKOTc3Slgg4ImC');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(9, 'Chair'),
(8, 'Desk');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_username` varchar(100) NOT NULL,
  `customer_password` varchar(250) NOT NULL,
  `access_login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_username`, `customer_password`, `access_login`) VALUES
(16, 'ali', 'ali', '$2y$10$V7El5bzHPgNWUBRz1P.MVek4Sxs5JJoOTBJZnIEy8KIGMgZLT0uZ6', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_inventory` int(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `sales` int(255) NOT NULL,
  `remaining` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_inventory`, `product_price`, `product_category`, `sales`, `remaining`) VALUES
(24, 'desk-1', 385, 600, 'Desk', 385, 0),
(25, 'chair', 160, 700, 'Chair', 160, 0),
(26, 'black chair', 800, 500, 'Desk', 800, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(250) NOT NULL DEFAULT 'pending',
  `price` int(255) NOT NULL,
  `num_product` int(100) NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `customer_name`, `customer_id`, `product_id`, `product_name`, `time`, `status`, `price`, `num_product`, `total_price`) VALUES
(29, 'ahmad', 9, 19, 'black chair', '2023-09-27 14:08:56', 'failed', 1000, 50, 50000),
(30, 'ahmad', 9, 20, 'black chair', '2023-09-27 14:21:58', 'failed', 600, 50, 30000),
(31, 'ahmad', 9, 22, 'desk-1', '2023-09-27 14:27:56', 'accept', 900, 10, 9000),
(32, 'ahmad', 9, 22, 'desk-1', '2023-09-27 16:25:20', 'accept', 900, 10, 9000),
(33, 'ahmad', 9, 24, 'desk-1', '2023-09-27 16:58:13', 'accept', 600, 30, 18000),
(34, 'ahmad', 9, 24, 'desk-1', '2023-09-27 18:01:19', 'accept', 600, 60, 36000),
(35, 'ahmad', 9, 24, 'desk-1', '2023-09-27 18:01:48', 'accept', 600, 40, 24000),
(36, 'ahmad', 9, 24, 'desk-1', '2023-09-27 18:03:28', 'accept', 600, 80, 48000),
(37, 'ahmad', 9, 24, 'desk-1', '2023-09-27 18:03:40', 'accept', 600, 10, 6000),
(38, 'ahmad', 9, 24, 'desk-1', '2023-09-27 18:45:32', 'accept', 600, 50, 30000),
(39, 'ali', 14, 24, 'desk-1', '2023-09-28 06:47:23', 'accept', 600, 50, 30000),
(41, 'ali', 14, 24, 'desk-1', '2023-09-28 07:11:15', 'accept', 600, 5, 3000),
(42, 'ali', 13, 24, 'desk-1', '2023-09-28 07:10:53', 'accept', 600, 10, 6000),
(43, 'ali', 14, 24, 'desk-1', '2023-09-28 07:21:14', 'accept', 600, 46, 27600),
(44, 'ali', 14, 25, 'chair', '2023-09-28 07:21:18', 'accept', 700, 150, 105000),
(51, 'ali', 14, 24, 'desk-1', '2023-09-28 07:23:34', 'accept', 600, 4, 2400),
(52, 'ali', 14, 25, 'chair', '2023-09-28 07:23:37', 'accept', 700, 10, 7000),
(53, 'ali', 16, 26, 'black chair', '2023-11-07 08:45:06', 'accept', 500, 800, 400000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_name` (`category_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`product_category`),
  ADD KEY `product_name` (`product_name`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_name` (`product_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category` FOREIGN KEY (`product_category`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
