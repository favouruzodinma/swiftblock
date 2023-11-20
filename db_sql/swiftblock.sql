-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 05:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiftblock`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `flname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `userid`, `flname`, `email`, `password`, `status`) VALUES
(1, 'SWB637283', 'Swiftblock Admin', 'admin@swiftblock.com', '$2y$10$t/PRw1VyMbcyhpbuwMpiW.mOfF/9f7EivSCHJTYnZ.3NLrVhJ4qMW', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `coin`
--

CREATE TABLE `coin` (
  `id` int(11) NOT NULL,
  `coin_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coin`
--

INSERT INTO `coin` (`id`, `coin_name`) VALUES
(1, 'bitcoin'),
(2, 'ethereum'),
(3, 'tron'),
(4, 'usdt(trc20)'),
(5, 'usdt(erc20)');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `userid` varchar(40) NOT NULL,
  `flname` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `btc_wallet` varchar(100) NOT NULL DEFAULT 'bc1q7wha4p6ew6yn5z3e0gtcnh79eafxj5vtpmvgwc',
  `btc_balance` int(12) NOT NULL DEFAULT 0,
  `eth_wallet` varchar(100) NOT NULL DEFAULT '0x37A66c6A5c0d6594C77bDC06f60705d802f1bFd4',
  `eth_balance` int(12) NOT NULL DEFAULT 0,
  `tron_wallet` varchar(100) NOT NULL DEFAULT 'TVg5g8d1ih1nm5gjCohBwc9qWtgNTDSw3V',
  `tron_balance` int(12) NOT NULL DEFAULT 0,
  `usdt_trc_wallet` varchar(100) NOT NULL DEFAULT 'TVg5g8d1ih1nm5gjCohBwc9qWtgNTDSw3V',
  `usdt_trc_balance` int(12) NOT NULL DEFAULT 0,
  `usdt_erc_wallet` varchar(100) NOT NULL DEFAULT '0x37A66c6A5c0d6594C77bDC06f60705d802f1bFd4',
  `usdt_erc_balance` int(12) NOT NULL DEFAULT 0,
  `total_balance` int(12) NOT NULL DEFAULT 0,
  `phrase` varchar(250) NOT NULL DEFAULT 'apple water corn phone white people drag pull pill hack star crew ',
  `kyc` varchar(500) DEFAULT NULL,
  `ip_address` varchar(200) NOT NULL,
  `status` varchar(9) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `userid`, `flname`, `email`, `password`, `btc_wallet`, `btc_balance`, `eth_wallet`, `eth_balance`, `tron_wallet`, `tron_balance`, `usdt_trc_wallet`, `usdt_trc_balance`, `usdt_erc_wallet`, `usdt_erc_balance`, `total_balance`, `phrase`, `kyc`, `ip_address`, `status`) VALUES
(9, 'SWB307245', 'Testing', 'testing@gmail.com', '$2y$10$pl/P3vt/XA9imsDZXuspbeapACD6m9lOtPTXOJU31OMFJR9ZWcv5y', 'bc1q7wha4p6ew6yn5z3e0gtcnh79eafxj5vtpmvgwc', 0, '0x37A66c6A5c0d6594C77bDC06f60705d802f1bFd4', 0, 'TVg5g8d1ih1nm5gjCohBwc9qWtgNTDSw3V', 0, 'TVg5g8d1ih1nm5gjCohBwc9qWtgNTDSw3V', 0, '0x37A66c6A5c0d6594C77bDC06f60705d802f1bFd4', 0, 0, 'apple water corn phone white people drag pull pill hack star crew ', NULL, '::1', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coin`
--
ALTER TABLE `coin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coin`
--
ALTER TABLE `coin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
