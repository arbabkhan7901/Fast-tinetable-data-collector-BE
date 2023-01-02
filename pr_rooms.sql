-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2022 at 06:53 PM
-- Server version: 10.1.48-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neotericschools_spmm`
--

-- --------------------------------------------------------

--
-- Table structure for table `pr_rooms`
--

CREATE TABLE `pr_rooms` (
  `room_id` int(5) NOT NULL,
  `room_status` int(1) NOT NULL,
  `room_code` varchar(5) NOT NULL,
  `room_capacity` varchar(10) NOT NULL,
  `department_name` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pr_rooms`
--

INSERT INTO `pr_rooms` (`room_id`, `room_status`, `room_code`, `room_capacity`, `department_name`, `created_at`, `modified_at`) VALUES
(3, 1, 'CS-3', '70', 'CS', '2022-12-27 15:54:03', '0000-00-00 00:00:00'),
(4, 1, 'CS-1', '', '', '2022-12-27 16:39:33', '0000-00-00 00:00:00'),
(5, 1, 'CS-2', '432', 'CS', '2022-12-27 16:44:29', '0000-00-00 00:00:00'),
(6, 1, 'CS-4', '432', 'CS', '2022-12-27 16:44:42', '0000-00-00 00:00:00'),
(7, 1, 'CS-5', '432', 'CS', '2022-12-27 16:44:50', '0000-00-00 00:00:00'),
(8, 1, '', '', '', '2022-12-27 19:27:14', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pr_rooms`
--
ALTER TABLE `pr_rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pr_rooms`
--
ALTER TABLE `pr_rooms`
  MODIFY `room_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
