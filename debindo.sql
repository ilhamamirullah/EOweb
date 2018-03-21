-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 10:27 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stand` varchar(225) DEFAULT NULL,
  `sqm` varchar(225) DEFAULT NULL,
  `notes` varchar(225) DEFAULT NULL,
  `booking_created_by` varchar(225) DEFAULT NULL,
  `booking_updated_by` varchar(255) DEFAULT NULL,
  `booking_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `event_id`, `company_id`, `status_id`, `user_id`, `stand`, `sqm`, `notes`, `booking_created_by`, `booking_updated_by`, `booking_created_at`, `booking_updated_at`) VALUES
(12, 1, 25, 4, 3, 'special', '12', 'tes', 'ilham', NULL, '2018-03-14 04:53:11', '2018-03-20 09:14:58'),
(13, 2, 27, 3, 3, 'spesial', '23', 'ss', 'ilham', NULL, '2018-03-14 04:53:41', '2018-03-14 04:53:41'),
(14, 3, 26, 2, 3, '', '23', '', 'ilham', NULL, '2018-03-14 04:59:09', '2018-03-14 04:59:09'),
(15, 1, 28, 3, 3, '', '44', '', 'ilham', NULL, '2018-03-14 05:01:27', '2018-03-14 05:01:27');

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
(1, 'Property Developer', 'Property Developer, Real Estate'),
(2, 'Craft', 'Barang-barang craft atau pernak pernik'),
(3, 'Fashion', 'Fashion'),
(4, 'Food and Beverage', 'Segala jenis makananan minuman'),
(5, 'Furniture', 'Segala jenis furniture'),
(6, 'Manufacture', 'Segala jenis manufacture'),
(7, 'Agro', 'segala jenis agro'),
(8, 'Logistics', 'Segala jenis logistik'),
(9, 'Automotive', 'Segala jenis automotive'),
(10, 'Other', 'dan yang lain-lain');

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
  `company_created_by` varchar(225) DEFAULT NULL,
  `company_updated_by` varchar(225) DEFAULT NULL,
  `company_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `category_id`, `company_name`, `address`, `website`, `pic`, `email`, `pic_contact`, `company_created_by`, `company_updated_by`, `company_created_at`, `company_updated_at`) VALUES
(25, 1, 'Asus', 'Jakarta', 'asus.com', 'Digi', 'digi@asus.com', '123', 'ilham', NULL, '2018-03-14 04:46:58', '2018-03-14 04:46:58'),
(26, 1, 'Lenovo', 'Bogor', 'lenovo.com', 'yasien', 'yasien@lenovo.com', '321', 'ilham', NULL, '2018-03-14 04:51:31', '2018-03-14 04:51:31'),
(27, 2, '420 Society', 'Bandung', '420official.com', 'randi', 'randi@420official.com', '567', 'ilham', 'ilham', '2018-03-14 04:52:27', '2018-03-14 04:52:46'),
(28, 3, 'sosis', 'bogor', 'sosis.com', 'irene', 'irene@sosis.com', '569', 'ilham', NULL, '2018-03-14 05:01:10', '2018-03-14 05:01:10'),
(29, 2, 'joger', 'bali', 'jogerjelek.com', 'nyoman', 'nyoman@jogerjelek.com', '789', 'ilham', NULL, '2018-03-15 01:59:13', '2018-03-15 01:59:13'),
(30, 2, 'levis', 'jakarta', 'levis.com', 'kevin', 'kevin@levis.com', '999', 'ilham', NULL, '2018-03-15 02:04:17', '2018-03-15 02:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(225) NOT NULL,
  `event_desc` varchar(225) NOT NULL,
  `event_created_by` varchar(225) DEFAULT NULL,
  `event_updated_by` varchar(225) DEFAULT NULL,
  `event_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_desc`, `event_created_by`, `event_updated_by`, `event_created_at`, `event_updated_at`) VALUES
(1, 'Trade Expo Indonesia', 'pameran ekspor Kementrian Perdagangan', NULL, NULL, '2018-03-11 07:35:44', '2018-03-11 07:35:44'),
(2, 'Indonesia Fashion & Craft', 'pameran batik setelah lebaran', NULL, NULL, '2018-03-11 07:35:44', '2018-03-11 07:35:44'),
(3, 'CTCT', 'pameran logistik', NULL, NULL, '2018-03-11 07:35:44', '2018-03-11 07:35:44'),
(4, 'REI EXPO', 'pameran properti', NULL, NULL, '2018-03-11 07:35:44', '2018-03-11 07:35:44'),
(5, 'INDOCRAFT', 'pamaeran batik', NULL, NULL, '2018-03-20 09:19:37', '2018-03-20 09:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(225) NOT NULL,
  `status_description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `status_description`) VALUES
(1, 'Normal', 'Merupakan state dasar'),
(2, 'Approach', 'Merupakan state dimana sales mendekati suatu perusahaan'),
(3, 'Booking', 'Merupakan state dimana company sudah booking'),
(4, 'Form', 'Merupakan state dimana company sudah dipastikan ikut'),
(5, 'Cancel', 'Merupakan state dimana perusahaan menyatakan tidak ikut setelah di approach');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
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
  `user_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama_lengkap`, `password`, `level`, `active`, `name`, `address`, `email`, `contact`, `nip`, `jabatan`, `photo`, `user_created_at`, `user_updated_at`) VALUES
(3, 'ilham', 'Ilham Amirullah', '81dc9bdb52d04dc20036dbd8313ed055', 'sales', '1', 'Ilham Amirullah', 'Jasinga', 'ilham.aespi@gmail.com', '085716887907', '777', 'Sales', 'tes', '2018-02-18 07:02:09', '2018-03-20 09:12:53'),
(4, 'yandra', '', '202cb962ac59075b964b07152d234b70', 'director', '1', 'yandra', 'jak', NULL, NULL, NULL, NULL, NULL, '2018-02-18 07:02:09', '0000-00-00 00:00:00'),
(5, 'digi', '', '123', 'sales', '0', 'digs', NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-18 07:02:09', '0000-00-00 00:00:00'),
(6, 'rizki', '', '202cb962ac59075b964b07152d234b70', 'sales', '1', 'rizki', 'aaa', 'aa@wwd.d', '08833', '3333', 'ff', NULL, '2018-03-11 08:04:17', '2018-03-11 08:04:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `event_id` (`event_id`) USING BTREE,
  ADD KEY `id` (`user_id`) USING BTREE,
  ADD KEY `status_id` (`status_id`) USING BTREE,
  ADD KEY `company_id` (`company_id`) USING BTREE;

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
  ADD UNIQUE KEY `company_name` (`company_name`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
