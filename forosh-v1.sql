-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 08:47 PM
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
(1, 'علی ابراهیم نیا روشن', 'admin', '$2y$10$z4XpTqAFKvekCcSzFZrRXeR.FzO5emrzuOb8M89nKOTc3Slgg4ImC');

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
  `customer_password` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_username`, `customer_password`) VALUES
(1, 'hdtgh', 'hdghdgh', '$2y$10$WVSSA8JL6CpasMtb3sLzS.R8LWyIJZVBqEu2ICgb7Yt5HAOgYQKzi'),
(2, 'fdfvd', 'hdtgh', '$2y$10$cRCjI7K9MjBoZuK9XO2yc.TxwTgkm4PKXxwtV7TcVQKwbdEo.s40K'),
(3, 'hfjfj', 'hjhfjf', '$2y$10$Wmrl7Je5IY9u9.jC2JlI0eNTZb1153usimwEfKVmdAOxH/huX4Tqm'),
(4, 'jhjhj', 'jhjhjh', '$2y$10$zneVjFom8i0aITJ0Sy2yZufw2b2dTOS4vFXhEINL7SwHE7SA4LN4a');

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `customer_id` int(250) NOT NULL,
  `report_id` int(250) NOT NULL,
  `NumPurchases` int(255) NOT NULL,
  `Total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

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

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_inventory`, `product_price`, `product_category`, `sales`, `remaining`) VALUES
(3, 'hghgdhdgh', 5, 5, 'kjhgk', 0, 0);

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
  `price` int(255) NOT NULL
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factor`
--
ALTER TABLE `factor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`product_category`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
