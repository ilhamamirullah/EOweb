-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2018 at 09:12 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `debindo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`) VALUES
(1, 'technology', 'technology'),
(2, 'fashion', 'fashion'),
(3, 'food', 'food'),
(4, 'other', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_name` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `website` varchar(225) DEFAULT NULL,
  `pic` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `pic_contact` varchar(225) NOT NULL,
  `created_by` varchar(225) DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `category_id`, `company_name`, `address`, `website`, `pic`, `email`, `pic_contact`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'asus', 'jakarta', 'asus.com', 'digi adeyana', 'digi@asus.com', '083333', '', 'ilham', '2018-02-18 07:33:33', '2018-02-18 07:57:33'),
(12, 1, 'aaaa', 'saaa', 'aaa', 'aaa', 'aa@aad.ccc', 'aaa', '', NULL, '2018-02-18 07:33:33', '0000-00-00 00:00:00'),
(15, 3, 'sorin maharasa', 'bogor', 'qqq', 'haha', 'aa@aad.ccc', '08883', '', NULL, '2018-02-18 07:33:33', '2018-02-18 07:54:00'),
(16, 1, 'apple', 'jakarta', 'apple.com', 'jajas', 'jaja@apple', '089999', 'ilham', NULL, '2018-02-18 07:39:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','sales','director','') NOT NULL,
  `active` enum('0','1') NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `active`, `name`, `address`, `email`, `contact`, `nip`, `jabatan`, `photo`, `created_at`, `updated_at`) VALUES
(3, 'ilham', '202cb962ac59075b964b07152d234b70', 'sales', '1', 'Ilham Amirullah', 'Jasinga', 'ilham.aespi@gmail.com', '085716887907', '777', 'sales', 'tes', '2018-02-18 07:02:09', '0000-00-00 00:00:00'),
(4, 'yandra', '202cb962ac59075b964b07152d234b70', 'director', '1', 'yandra', 'jak', NULL, NULL, NULL, NULL, NULL, '2018-02-18 07:02:09', '0000-00-00 00:00:00'),
(5, 'digi', '123', 'sales', '0', 'digs', NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-18 07:02:09', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
