-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 09:35 PM
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
-- Database: `crudapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(250) NOT NULL,
  `Gname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `Gname`) VALUES
(20, 'برنامه نویس'),
(23, 'پرسپولیس'),
(24, 'پرستار'),
(16, 'پزشک'),
(18, 'دانش آموز'),
(17, 'دانشجو'),
(21, 'کارفرما'),
(15, 'کارگر'),
(25, 'مدرس'),
(22, 'مدیر'),
(19, 'معلم');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `Fname` varchar(250) NOT NULL,
  `Lname` varchar(250) NOT NULL,
  `MeliCode` varchar(11) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `PostalCode` varchar(11) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `Created_At` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Lname`, `MeliCode`, `Address`, `PostalCode`, `Gender`, `group_name`, `Created_At`) VALUES
(133, 'علی', 'روشن', '2111030651', 'گرگان - عدالت 81 - کوی دادگستری', '1236541236', 'مرد', 'مدیر', '12:15:18'),
(134, 'زهرا', 'جباری', '5255232652', 'گرگان-کوی تختی', '2147483647', 'مرد', 'پزشک', '12:16:01'),
(135, 'علی', 'عبدی', '2111030653', 'گرگان', '2147483647', 'مرد', 'پزشک', '12:17:55'),
(136, 'رضا', 'اسدبیگی', '2111030654', 'گرگان - عدالت 81 - کوی دادگستری', '1239874563', 'زن', 'دانشجو', '12:15:45'),
(137, 'فاطمه', 'حسینی', '5255232655', 'گرگان-کوی تختی', '2147483647', 'مرد', 'کارگر', '12:16:01'),
(138, 'علی', 'خادم', '2111030656', 'گرگان', '2147483647', 'مرد', 'مدرس', '12:17:55'),
(139, 'رضا', 'محرمی', '2111030657', 'گرگان - عدالت 81 - کوی دادگستری', '1239874563', 'زن', 'برنامه نویس', '12:15:45'),
(140, 'امیر', 'محرمی', '2111030658', 'گرگان - عدالت 81 - کوی دادگستری', '1239874563', 'زن', 'دانشجو', '12:15:45'),
(141, 'زهرا', 'خادم', '5255232659', 'گرگان-کوی تختی', '2147483647', 'مرد', 'پزشک', '12:16:01'),
(142, 'علی', 'گلمحمدی', '2111030612', 'گرگان', '2147483647', 'مرد', 'پرستار', '12:17:55'),
(143, 'آرش', 'پیروانی', '2111030665', 'گرگان - عدالت 81 - کوی دادگستری', '1239874563', 'زن', 'معلم', '12:15:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Gname` (`Gname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_name` (`group_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `groupName` FOREIGN KEY (`group_name`) REFERENCES `groups` (`Gname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
