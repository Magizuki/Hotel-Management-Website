-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 06:24 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

create database `hotelmanagement`;
use `hotelmanagement`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` varchar(5) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `CustomerAddress` varchar(150) NOT NULL,
  `CustomerPhone` varchar(15) NOT NULL,
  `CustomerEmail` varchar(100) DEFAULT NULL,
  `RoomTypeID` varchar(5) NOT NULL,
  `RoomNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerAddress`, `CustomerPhone`, `CustomerEmail`, `RoomTypeID`, `RoomNumber`) VALUES
('CU001', 'John Allen', 'Jalan Pondok Kelapa No 15', '075008034077', 'johnlen@gmail.com', 'RT005', '502'),
('CU002', 'Irvine Sendjaya', 'Jalan Duren Sawit', '081508073055', 'irvinesens@gmail.com', 'RT002', '404');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaction`
--

CREATE TABLE `detailtransaction` (
  `CustomerID` varchar(5) NOT NULL,
  `HeaderTransactionID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailtransaction`
--

INSERT INTO `detailtransaction` (`CustomerID`, `HeaderTransactionID`) VALUES
('CU001', 'TR001'),
('CU002', 'TR002');

-- --------------------------------------------------------

--
-- Table structure for table `headertransaction`
--

CREATE TABLE `headertransaction` (
  `HeaderTransactionID` varchar(5) NOT NULL,
  `CheckInDate` date NOT NULL,
  `CheckOutDate` date NOT NULL,
  `StayPeriod` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `StaffID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headertransaction`
--

INSERT INTO `headertransaction` (`HeaderTransactionID`, `CheckInDate`, `CheckOutDate`, `StayPeriod`, `TotalPrice`, `StaffID`) VALUES
('TR001', '2020-02-23', '2020-02-26', 3, 1540000, 'ST004'),
('TR002', '2020-02-23', '2020-02-27', 4, 2800000, 'ST004'),
('TR004', '0000-00-00', '0000-00-00', 4, 2800000, 'ST004');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JobID` varchar(5) NOT NULL,
  `JobName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JobID`, `JobName`) VALUES
('JB001', 'Porter'),
('JB002', 'HouseKeeping'),
('JB003', 'RoomService'),
('JB004', 'FrontDeskClerk'),
('JB005', 'HotelManager');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `RoomTypeID` varchar(5) NOT NULL,
  `RoomType` varchar(100) NOT NULL,
  `RoomPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`RoomTypeID`, `RoomType`, `RoomPrice`) VALUES
('RT001', 'Standard', 550000),
('RT002', 'Deluxe', 700000),
('RT003', 'Twin', 770000),
('RT004', 'Queen', 900000),
('RT005', 'King', 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(5) NOT NULL,
  `StaffName` varchar(255) NOT NULL,
  `StaffSalary` int(11) NOT NULL,
  `StaffAddress` varchar(255) NOT NULL,
  `StaffPhone` varchar(15) NOT NULL,
  `StaffEmail` varchar(100) DEFAULT NULL,
  `StaffGender` varchar(7) DEFAULT NULL,
  `StaffAge` int(11) NOT NULL,
  `JobID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `StaffSalary`, `StaffAddress`, `StaffPhone`, `StaffEmail`, `StaffGender`, `StaffAge`, `JobID`) VALUES
('ST001', 'Budi Hartono', 10000000, 'Jalan Kebon Jeruk no 10', '081908024077', 'budihtono@yahoo.com', 'Male', 30, 'JB001'),
('ST002', 'Susi Sentosa', 12000000, 'Jalan Kebon pala no 5', '071908354077', 'susisentosa@yahoo.co.id', 'Female', 33, 'JB002'),
('ST003', 'James Hermawan', 9500000, 'Jalan gatot subroto no 7', '031908124177', 'jamesher@gmail.com', 'Male', 27, 'JB003'),
('ST004', 'Ivan Gunawan', 12500000, 'Jalan otista no 17', '041908024377', 'Ivans2019@gmail.com', 'Male', 30, 'JB001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `RoomNumber` (`RoomNumber`),
  ADD KEY `FK_RoomType` (`RoomTypeID`);

--
-- Indexes for table `detailtransaction`
--
ALTER TABLE `detailtransaction`
  ADD PRIMARY KEY (`CustomerID`,`HeaderTransactionID`),
  ADD KEY `FK_Headertransaction` (`HeaderTransactionID`);

--
-- Indexes for table `headertransaction`
--
ALTER TABLE `headertransaction`
  ADD PRIMARY KEY (`HeaderTransactionID`),
  ADD KEY `FK_Staff` (`StaffID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`RoomTypeID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD UNIQUE KEY `StaffID` (`StaffID`),
  ADD KEY `FK_Job` (`JobID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_RoomType` FOREIGN KEY (`RoomTypeID`) REFERENCES `roomtype` (`RoomTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailtransaction`
--
ALTER TABLE `detailtransaction`
  ADD CONSTRAINT `FK_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Headertransaction` FOREIGN KEY (`HeaderTransactionID`) REFERENCES `headertransaction` (`HeaderTransactionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `headertransaction`
--
ALTER TABLE `headertransaction`
  ADD CONSTRAINT `FK_Staff` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_Job` FOREIGN KEY (`JobID`) REFERENCES `job` (`JobID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
