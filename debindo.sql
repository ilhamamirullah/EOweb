-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 02:42 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `booking_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `booking_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `company_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `company_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(225) NOT NULL,
  `event_desc` text NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `event_status` enum('done','undone') NOT NULL,
  `event_created_by` varchar(225) DEFAULT NULL,
  `event_updated_by` varchar(225) DEFAULT NULL,
  `event_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_desc`, `event_start_date`, `event_end_date`, `event_status`, `event_created_by`, `event_updated_by`, `event_created_at`, `event_updated_at`) VALUES
(1, 'Trade Expo Indonesia 2018', 'pameran ekspor Kementrian Perdagangan', '2018-07-01', '2018-07-05', 'undone', NULL, 'admin', '2018-03-11 14:35:44', '2018-07-05 11:39:01'),
(2, 'Indonesia Fashion & Craft', 'pameran batik setelah lebaran', '2018-07-05', '2018-07-06', 'undone', NULL, NULL, '2018-03-11 14:35:44', '2018-07-05 10:18:05'),
(3, 'CTCT', 'pameran logistik', '2018-07-04', '2018-07-04', 'done', NULL, NULL, '2018-03-11 14:35:44', '2018-07-05 10:19:11'),
(4, 'REI EXPO', 'pameran properti', '2018-07-06', '2018-07-07', 'undone', NULL, NULL, '2018-03-11 14:35:44', '2018-07-05 09:56:10'),
(5, 'INDOCRAFT', 'pamaeran batik', '2018-07-02', '2018-07-03', 'done', NULL, NULL, '2018-03-20 16:19:37', '2018-07-05 10:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `floorplan`
--

CREATE TABLE `floorplan` (
  `floorplan_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `description` text,
  `floorplan_created_by` varchar(255) DEFAULT NULL,
  `floorplan_updated_by` varchar(255) DEFAULT NULL,
  `floorplan_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `floorplan_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_booking`
--

CREATE TABLE `history_booking` (
  `history_booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `record_booking`
--

CREATE TABLE `record_booking` (
  `record_booking_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `record_booking_audit` varchar(225) NOT NULL,
  `record_booking_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `todo_id` int(11) NOT NULL,
  `todo_name` varchar(225) NOT NULL,
  `todo_timer` time NOT NULL,
  `status` enum('done','undone','') NOT NULL,
  `todo_created_by` varchar(225) NOT NULL,
  `todo_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `todo_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `user_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `active`, `name`, `address`, `email`, `contact`, `nip`, `jabatan`, `photo`, `user_created_at`, `user_updated_at`) VALUES
(3, 'ilham', '202cb962ac59075b964b07152d234b70', 'sales', '1', 'Ilham Amirullah', 'Jasinga1', 'ilham.aespi@gmail.com', '085716887907', '777', 'Sales', 'tes', '2018-02-18 14:02:09', '2018-06-23 13:48:34'),
(4, 'yandra', '202cb962ac59075b964b07152d234b70', 'director', '1', 'yandra', 'jak', NULL, NULL, NULL, NULL, NULL, '2018-02-18 14:02:09', '0000-00-00 00:00:00'),
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-23 16:15:39', '2018-06-23 09:15:39');

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
-- Indexes for table `floorplan`
--
ALTER TABLE `floorplan`
  ADD PRIMARY KEY (`floorplan_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `history_booking`
--
ALTER TABLE `history_booking`
  ADD PRIMARY KEY (`history_booking_id`);

--
-- Indexes for table `record_booking`
--
ALTER TABLE `record_booking`
  ADD PRIMARY KEY (`record_booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `floorplan`
--
ALTER TABLE `floorplan`
  MODIFY `floorplan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_booking`
--
ALTER TABLE `history_booking`
  MODIFY `history_booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `record_booking`
--
ALTER TABLE `record_booking`
  MODIFY `record_booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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

--
-- Constraints for table `floorplan`
--
ALTER TABLE `floorplan`
  ADD CONSTRAINT `floorplan_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `record_booking`
--
ALTER TABLE `record_booking`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
