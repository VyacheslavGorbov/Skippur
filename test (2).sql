-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 11:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(15) CHARACTER SET utf8 NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bookings`:
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `customer_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `customers`:
--   `user_id`
--       `user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employee_last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `site_id` int(11) NOT NULL,
  `employee_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `employee_username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employee_password` varchar(300) CHARACTER SET utf8 NOT NULL,
  `status` varchar(8) CHARACTER SET utf8 NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `employees`:
--   `picture_id`
--       `pictures` -> `picture_id`
--   `site_id`
--       `sites` -> `site_id`
--

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_first_name`, `employee_last_name`, `site_id`, `employee_email`, `employee_username`, `employee_password`, `status`, `picture_id`) VALUES
(36, 'Raheem', 'Sterling', 99, 'r.sterling@yahoo.com', 'r.sterling', '$2y$10$Lq1FcEsanIDVWEUxVpzHFuaGsygOVh3bCt3OeHI9f8tl.nNg9.Rci', 'active', 21),
(37, 'Erica', 'Arnold', 99, 'e.arnold@yahoo.com', 'e.ernold', '$2y$10$1g4/UdsrODzCaJz4SZYJxe2EUB6yKhdbMrTtsw49EzfjXtxXvC1hG', 'inactive', 22),
(38, 'Alexander', 'Lacazette', 99, 'a.laca@yahoo.com', 'a.laca', '$2y$10$nlCINnqyQb7z1vD1vK.Wdu4Ef/oAtMLGrfLNA.W6ZwWZil7SCXKIu', 'active', 23),
(39, 'shaks', 'weazle', 99, 'shaks.weazle@yahoo.com', 'shaks.weazle', '$2y$10$CpI/ljeaLfEYjhNyOZDaEucpFGxIJxk3CN7Ttis6grYkjCyoNE/gi', 'active', 24),
(40, 'Mariam', 'Smith', 99, 'm.smith@yahoo.com', 'm.smith', '$2y$10$dflyOFjJxPps/ACPSRYdNu5d3gOCO09ZQaBblcsjeC1gssvCmOn8.', 'active', 25),
(41, 'sean', 'white', 101, 'sean@yahoo.com', 'sean.white', '$2y$10$ccodoHv8beehZPy0f7WhK.mc6wGFg9scPVHYGQ0z8rLBEU6R40QbK', 'active', 26);

-- --------------------------------------------------------

--
-- Table structure for table `employee_availabilities`
--

DROP TABLE IF EXISTS `employee_availabilities`;
CREATE TABLE `employee_availabilities` (
  `e_availability_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `e_availability_start_time` time NOT NULL,
  `e_availability_end_time` time NOT NULL,
  `e_availability_break_start` time NOT NULL,
  `e_availability_break_end` time NOT NULL,
  `e_availability_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `employee_availabilities`:
--

--
-- Dumping data for table `employee_availabilities`
--

INSERT INTO `employee_availabilities` (`e_availability_id`, `employee_id`, `site_id`, `e_availability_start_time`, `e_availability_end_time`, `e_availability_break_start`, `e_availability_break_end`, `e_availability_date`) VALUES
(11, 36, 99, '06:00:00', '12:00:00', '07:00:00', '08:00:00', '2020-05-07'),
(15, 36, 99, '06:00:00', '15:00:00', '07:00:00', '08:00:00', '2020-05-08'),
(16, 36, 99, '08:00:00', '12:00:00', '09:00:00', '10:00:00', '2020-06-03'),
(17, 36, 99, '07:00:00', '10:00:00', '08:00:00', '09:00:00', '2020-12-31'),
(18, 36, 99, '07:00:00', '11:00:00', '08:00:00', '10:00:00', '2020-12-01'),
(19, 36, 99, '06:00:00', '17:00:00', '10:00:00', '11:00:00', '2020-05-20'),
(20, 38, 99, '06:00:00', '17:00:00', '10:00:00', '11:00:00', '2020-05-20'),
(21, 40, 99, '09:00:00', '17:00:00', '13:00:00', '14:00:00', '1970-01-01'),
(22, 40, 99, '09:00:00', '17:00:00', '13:00:00', '14:00:00', '2020-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `pictures`:
--

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `image`) VALUES
(1, 'images.jpg'),
(2, 'images.jpg'),
(3, 'images.jpg'),
(4, 'john.jpg'),
(5, 'john.jpg'),
(6, 'john.jpg'),
(7, 'john.jpg'),
(8, 'john.jpg'),
(9, 'john.jpg'),
(10, 'john.jpg'),
(11, 'john.jpg'),
(12, 'images1.jpg'),
(13, ''),
(14, 'john.jpg'),
(15, 'images.jpg'),
(16, 'images2.jpg'),
(17, 'images2.jpg'),
(18, 'images2.jpg'),
(19, 'images1.jpg'),
(20, 'images1.jpg'),
(21, 'john.jpg'),
(22, 'images.jpg'),
(23, 'images2.jpg'),
(24, 'images1.jpg'),
(25, 'unnamed.jpg'),
(26, 'images2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `services`:
--

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
  `site_id` int(11) NOT NULL,
  `business_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `site_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `site_address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `site_postal_code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `site_phone_number` varchar(15) CHARACTER SET utf8 NOT NULL,
  `site_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `business_domain` varchar(50) CHARACTER SET utf8 NOT NULL,
  `manager_id` int(11) NOT NULL,
  `site_latitude` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `site_longitude` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `sites`:
--   `manager_id`
--       `user` -> `user_id`
--

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `business_name`, `site_name`, `site_address`, `site_postal_code`, `site_phone_number`, `site_email`, `business_domain`, `manager_id`, `site_latitude`, `site_longitude`) VALUES
(99, 'Stiger', 'Stiger Salon', '1023 Andrew Street', 'H4L 3N1', '3246534251', 'hgdgfhsdj@yahoo.com', 'spa', 47, '', ''),
(101, 'DEMO', 'DEMO', 'demo street', 'demo', '1234567', 'demo@yahoo.com', 'auto_mechanic', 49, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sites_services`
--

DROP TABLE IF EXISTS `sites_services`;
CREATE TABLE `sites_services` (
  `site_service_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `service_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `sites_services`:
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(280) NOT NULL,
  `user_type` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `user_type`) VALUES
(47, 'stiger', '$2y$10$/72NINVI1AT2bYOwzPReA.49J52MqYPtKqWDo4xInxKP3CujebnDq', 'Site'),
(48, 'mm', '$2y$10$9Wa5UW.z8O3DGOhE9UVd4.ex1ks.a4sRSGrDraNxA.PPqbS5Wkpeq', 'Site'),
(49, 'demo', '$2y$10$x4fDU17o/Hrqlf2st1ks0uBSKvkApNX/ri7IDdN/QSE.3Tm0.9EAC', 'Site');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_username` (`employee_username`),
  ADD KEY `Employees_site_id_FK` (`site_id`),
  ADD KEY `Employee_picture_id_FK` (`picture_id`);

--
-- Indexes for table `employee_availabilities`
--
ALTER TABLE `employee_availabilities`
  ADD PRIMARY KEY (`e_availability_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`,`e_availability_date`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`site_id`),
  ADD UNIQUE KEY `business_name` (`business_name`),
  ADD UNIQUE KEY `site_phone_number` (`site_phone_number`),
  ADD UNIQUE KEY `business_name_2` (`business_name`,`manager_id`),
  ADD KEY `Sites_manager_id_FK` (`manager_id`);

--
-- Indexes for table `sites_services`
--
ALTER TABLE `sites_services`
  ADD PRIMARY KEY (`site_service_id`),
  ADD UNIQUE KEY `service_id` (`service_id`,`site_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `employee_availabilities`
--
ALTER TABLE `employee_availabilities`
  MODIFY `e_availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `sites_services`
--
ALTER TABLE `sites_services`
  MODIFY `site_service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `Customers_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `Employee_picture_id_FK` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`picture_id`),
  ADD CONSTRAINT `Employees_site_id_FK` FOREIGN KEY (`site_id`) REFERENCES `sites` (`site_id`);

--
-- Constraints for table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `Sites_manager_id_FK` FOREIGN KEY (`manager_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
