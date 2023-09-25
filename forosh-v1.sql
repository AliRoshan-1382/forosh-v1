-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 05:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `admin-name` varchar(150) COLLATE utf8mb4_persian_ci NOT NULL,
  `admin-username` varchar(150) COLLATE utf8mb4_persian_ci NOT NULL,
  `admin-password` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL
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
  `category_name` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(2, 'kjhgk'),
(1, 'll');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `customer_username` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `customer_password` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `access_login` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_username`, `customer_password`, `access_login`) VALUES
(1, 'hdtgh', 'hdghdgh', '$2y$10$WVSSA8JL6CpasMtb3sLzS.R8LWyIJZVBqEu2ICgb7Yt5HAOgYQKzi', 'ok'),
(2, 'fdfvd', 'hdtgh', '$2y$10$cRCjI7K9MjBoZuK9XO2yc.TxwTgkm4PKXxwtV7TcVQKwbdEo.s40K', 'ok'),
(3, 'hfjfj', 'hjhfjf', '$2y$10$Wmrl7Je5IY9u9.jC2JlI0eNTZb1153usimwEfKVmdAOxH/huX4Tqm', 'ok'),
(4, 'jhjhj', 'jhjhjh', '$2y$10$zneVjFom8i0aITJ0Sy2yZufw2b2dTOS4vFXhEINL7SwHE7SA4LN4a', 'ok'),
(5, 'ali', 'ali', '$2y$10$Ul6b76PAmADPwQ00tFwCPuz3./D5JuDBVt6QwCvWLRhDUSzWnYupq', 'ok'),
(6, 'hthhtht', 'hthth', '$2y$10$sSVKU9XDGC6.S8xoX4Dtx.hMjj0skaymPaBpNvmuqLvotDamffM8O', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `product_inventory` int(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_category` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `sales` int(255) NOT NULL,
  `remaining` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `customer_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `date` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `time` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `status` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL DEFAULT 'pending',
  `price` int(255) NOT NULL,
  `num_product` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category` FOREIGN KEY (`product_category`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `cid` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cname` FOREIGN KEY (`customer_name`) REFERENCES `customer` (`customer_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pid` FOREIGN KEY (`customer_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pname` FOREIGN KEY (`product_name`) REFERENCES `product` (`product_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
