-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 01:50 AM
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
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `username`, `password`, `name`) VALUES
(1, 'admin1', 'admin', '123', 'mathew dalisay');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `appointment_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appointment_status` int(50) NOT NULL,
  `admin_or_user_id` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointment_id`, `name`, `email`, `date`, `time`, `appointment_status`, `admin_or_user_id`, `date_time_created`, `date_time_updated`) VALUES
(13, '202212bvo0', 'Catuzipe@mailinator.com', 'mathewdalisay@gmail.com', '1971-10-11', '20:49:00', 1, 'admin1', '2022-10-30 01:49:30', '2022-10-30 01:49:30'),
(18, '202216ng2v', 'Hamikivi@mailinator.com', 'mathewdalisay@gmail.com', '1972-01-10', '04:07:00', 1, 'admin1', '2022-10-30 02:08:26', '2022-10-30 02:08:26'),
(19, '202212u1fl', 'Xitenalad@mailinator.com', 'mathewdalisay@gmail.com', '1998-03-13', '23:43:00', 0, 'admin1', '2022-10-30 02:08:56', '2022-10-30 02:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `home_owners`
--

CREATE TABLE `home_owners` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `unit_id` varchar(50) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `payment_receive` varchar(50) NOT NULL,
  `payment_equity` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_owners`
--

INSERT INTO `home_owners` (`id`, `user_id`, `unit_id`, `room_id`, `payment_receive`, `payment_equity`, `payment_method`, `payment_status`, `date_time_created`, `date_time_updated`) VALUES
(31, '2022953074', '202268sw', 'C316nhz', '6610', 'Reservation Fee', 'Online Deposit', 0, '2022-11-02 05:39:29', '2022-11-02 05:39:29'),
(32, '2022953074', '202268sw', 'C316nhz', '7040', 'Option Equity', 'Paypal', 1, '2022-11-02 05:55:31', '2022-11-02 05:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_id` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `floor_area` double NOT NULL,
  `available` int(50) NOT NULL,
  `total_price_contract` varchar(50) NOT NULL,
  `reservation_fee` varchar(50) NOT NULL,
  `net_equity` varchar(50) NOT NULL,
  `option_equity` varchar(50) NOT NULL,
  `bank_financing` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_id`, `model`, `type`, `floor_area`, `available`, `total_price_contract`, `reservation_fee`, `net_equity`, `option_equity`, `bank_financing`, `image`, `date_time_created`, `date_time_updated`) VALUES
(14, '202268sw', 'model ka', '123123123', 36.63, 8, '54600', '6610', '2550', '7040', '4810', 'mirana.jpg', '2022-10-17 02:12:41', '2022-10-30 01:43:48'),
(19, '2022467o', '930', '74', 623, 735, '872', '840', '410', '951', '111', 'mirana.jpg', '2022-10-30 01:45:53', '2022-10-30 01:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `residence_address` varchar(250) NOT NULL,
  `permanent_address` varchar(250) NOT NULL,
  `provincial_address` varchar(250) NOT NULL,
  `birthdate` date NOT NULL,
  `age` varchar(50) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `name_of_spouse` varchar(50) NOT NULL,
  `name_of_father` varchar(50) NOT NULL,
  `name_of_mother` varchar(50) NOT NULL,
  `number_of_dependents` varchar(50) NOT NULL,
  `owned` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `nature_of_work` varchar(50) NOT NULL,
  `name_of_employer_business` varchar(50) NOT NULL,
  `work_address` varchar(250) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `position_in_company` varchar(50) NOT NULL,
  `salary_per_month` varchar(50) NOT NULL,
  `other_regular_allowance` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `v_token` varchar(255) NOT NULL,
  `email_status` int(11) NOT NULL,
  `date_time_created` varchar(50) NOT NULL,
  `date_time_updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `residence_address`, `permanent_address`, `provincial_address`, `birthdate`, `age`, `civil_status`, `citizenship`, `name_of_spouse`, `name_of_father`, `name_of_mother`, `number_of_dependents`, `owned`, `contact_number`, `gender`, `nature_of_work`, `name_of_employer_business`, `work_address`, `telephone`, `position_in_company`, `salary_per_month`, `other_regular_allowance`, `email`, `password`, `v_token`, `email_status`, `date_time_created`, `date_time_updated`) VALUES
(11, '2022953074', 'Paki', 'Raphael', 'Lacota', 'Halla', 'Drake', 'Vance', '1973-03-31', '182', 'Married', 'Stuart', 'Neville', 'Kenneth', 'Basil', '839', 'Rented', '248', 'Female', 'Employed Individual', 'Rosalyn', 'Timon', 'April', 'Clementine', 'Medge', 'Holmes', 'mathewdalisay@gmail.com', '123', 'e6641cb1a66353c1c98dca81fcdfec0c', 1, '22-10-17 01:07:26', '22-10-17 01:07:26'),
(12, '2022714814', 'Logan', 'Carla', 'Damon', 'Mara', 'Ina', 'Jared', '1990-03-22', '534', 'Civil Partnership', 'Craig', 'Skyler', 'Ezra', 'Aretha', '135', 'Rented', '290', 'Female', 'Self-Employed', 'Barry', 'Matthew', 'Karyn', 'Olympia', 'Brenden', 'Barclay', 'leonidafrancisco12@gmail.com', '123', '2a6cdb41c850dafb5732ce2f143b7483', 1, '22-10-31 05:12:29', '22-10-31 05:12:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `home_owners`
--
ALTER TABLE `home_owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`unit_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `home_owners`
--
ALTER TABLE `home_owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `home_owners`
--
ALTER TABLE `home_owners`
  ADD CONSTRAINT `home_owners_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `home_owners_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
