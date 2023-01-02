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
-- Table structure for table `pr_rooms_allocation`
--

CREATE TABLE `pr_rooms_allocation` (
  `id` int(12) NOT NULL,
  `status` int(1) NOT NULL,
  `id_room` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` varchar(15) NOT NULL,
  `end_time` varchar(15) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pr_rooms_allocation`
--

INSERT INTO `pr_rooms_allocation` (`id`, `status`, `id_room`, `start_date`, `end_date`, `start_time`, `end_time`, `semester`, `created_at`, `modified_at`) VALUES
(2, 1, 2, '2022-12-27', '2022-03-12', '10:00', '13:00', 'Fall 2022', '2022-12-27 16:47:00', '0000-00-00 00:00:00'),
(3, 1, 3, '0000-00-00', '0000-00-00', '3:00', '4:00', 'Fall 2022', '2022-12-27 16:59:22', '0000-00-00 00:00:00'),
(4, 1, 3, '2022-12-27', '2022-01-27', '3:00', '4:00', 'Fall 2022', '2022-12-27 17:00:39', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pr_rooms_allocation`
--
ALTER TABLE `pr_rooms_allocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_room` (`id_room`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pr_rooms_allocation`
--
ALTER TABLE `pr_rooms_allocation`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
