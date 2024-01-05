-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 07:04 AM
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
-- Database: `orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `sno` int(11) NOT NULL,
  `agent` varchar(30) NOT NULL,
  `CNIC` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `assign_area` varchar(30) NOT NULL,
  `salary` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`sno`, `agent`, `CNIC`, `address`, `assign_area`, `salary`) VALUES
(1, 'Mazher Khan', '42101-127362-76', 'Sadar, sarak pr, block falana, house 64, karachi.', 'Gulshan', '5,00,00 PKR'),
(2, 'Yahya Junaid', '42181-227764-12', '456 Oak Avenue, karimabaad.', 'Sadar', '50,000 PKR'),
(3, 'Wakeel Ahmed', '42101-217964-56', '303 Birch Street, aptech', 'Ayehsa Manzil', '45,000 PKR'),
(4, 'Shayan Qazi', '42181-229564-44', '123 road karachi', 'North Nazimabaad', '45,000 PKR'),
(5, 'Hamza Khan', '42181-2239564-11', 'Gulshan Falana House falana block falana floor', 'Nipa', '45,000 PKR'),
(6, 'Raees Sultan', '42181-2239123-11', '123 Street karachi', 'gulberg', '45,000 PKR'),
(7, 'Aliyan', '42201-2257564-11', '4353 Street house no 2 karachi', 'Highway', '45,000 PKR'),
(8, 'RazaElvis', '42181-2239564-11', 'Gulshan Block don\'t know 2', 'Mars', '99,000 PKR'),
(9, 'Shahbaz Arian', '42181-2876564-11', 'north karachi Falana House falana block', 'North Karachi', '45,000 PKR'),
(10, 'Nawaz Sharif', '42101-2739395-22', 'fake London Begger Street ', 'Kala Pull', '45,000 PKR'),
(11, 'Attizaz ', '412181-209064-01', 'Nipa House number 24 floor 1 karachi ', '5 Star', '50,000 PKR'),
(12, 'Saad Khan', '42181-8090241-78', 'Jail Road House number 24 floor 1 karachi ', 'Korangi', '50,000 PKR');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `so` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Tracking` varchar(30) NOT NULL,
  `Concern` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`so`, `Email`, `Tracking`, `Concern`, `date`) VALUES
(1, 'kashif@gmail.com', 'PK123456789112', 'I received the wrong parcel. Please sort this whole issue ASAP.', '2023-10-27 22:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sno` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `orderno` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sno`, `sender`, `orderno`, `address`, `receiver`, `price`, `weight`, `status`, `date`) VALUES
(1, 'Hamza ', 'PK123456789123', 'gulshan block falana house number 64 ', 'Ali Khan', '1100', '0.5kg', 'delivered', '2023-10-25 07:41:17'),
(2, 'Syed Kamran', 'PK293746892374', '789 Pine Lane, Dhramsala', 'Attizaz Chokla', '1999', '0.4kg', 'delivered', '2023-10-25 07:41:17'),
(3, 'Omer ', 'PK238656789123', 'Address: 303 Willow Drive, haji hotel', 'Aslam', '1500', '0.6kg', 'delivered', '2023-10-25 07:58:34'),
(4, 'Syed Usman', 'PK293746894174', '456 Oak Avenue, karimabaad', 'Saad Sahab', '3000', '0.9kg', 'delivery failed', '2023-10-25 07:58:34'),
(5, 'Javaid', 'PK523456789167', '123 Main Street, City1', 'Asim', '999', '0.77kg', 'shipped', '2023-10-25 08:00:18'),
(6, 'Asad', 'PK773746892374', '1010 Oak Street, City', 'Wijdaan', '3400', '1kg', 'delivery failed', '2023-10-25 08:00:18'),
(7, 'asad', 'PK169821241156', '123 road karachi', 'hamza', '4234', '1kg', 'shipped', '2023-10-25 10:19:16'),
(8, 'asad', 'PK001698211237', '123 road karachi', 'hamza', '4234', '2.6kg', 'shipped', '2023-10-25 10:20:37'),
(9, 'maaz', 'PK001698211293', 'alam road house 124 karachi', 'ali bhai', '999', '0.99kg', 'shipped', '2023-10-25 10:21:33'),
(10, 'shah jee', 'PK001698211390', 'alam road house 300 karachi karachi', 'ali bhai', '999', '1.4kg', 'shipped', '2023-10-25 10:23:10'),
(11, 'aliyan', 'PK001698211436', 'gulshan 123 road karachi', 'hamza', '990', '0.9kg', 'pending', '2023-10-25 10:23:56'),
(12, 'ali baba', 'PK001698211508', 'gulshan 123 road karachi', 'sinbaad', '1345', '0.6kg', 'delivered', '2023-10-25 10:25:08'),
(13, 'Jhanzaib khan', 'PK001698212101', 'highway house 101 ', 'Anas Kahn', '800', '1.5kg', 'pending', '2023-10-25 10:35:01'),
(14, 'Qmar Javed', 'PK123456789235', 'gulshan block falana house number 113', 'Nawaz', '1999', '1kg', 'pending', '2023-10-31 10:59:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`so`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `orderno` (`orderno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `so` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
