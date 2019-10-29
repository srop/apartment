-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 08:21 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iamsropc_devap_install`
--

-- --------------------------------------------------------

--
-- Table structure for table `aprilmeter`
--

CREATE TABLE `aprilmeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `augustmeter`
--

CREATE TABLE `augustmeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `costtransaction`
--

CREATE TABLE `costtransaction` (
  `ID` int(11) NOT NULL,
  `Room` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Detail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DateBill` date NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `decembermeter`
--

CREATE TABLE `decembermeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `februarymeter`
--

CREATE TABLE `februarymeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `ID` int(10) NOT NULL,
  `InvoiceID` int(10) NOT NULL,
  `RoomNO` int(10) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `StartElectric` int(10) NOT NULL,
  `EndElectric` int(10) NOT NULL,
  `UnitElectric` int(10) NOT NULL,
  `StartWater` int(10) NOT NULL,
  `EndWater` int(10) NOT NULL,
  `UnitWater` int(10) NOT NULL,
  `RoomPrice` int(10) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `januarymeter`
--

CREATE TABLE `januarymeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `julymeter`
--

CREATE TABLE `julymeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `junemeter`
--

CREATE TABLE `junemeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marchmeter`
--

CREATE TABLE `marchmeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masterbill`
--

CREATE TABLE `masterbill` (
  `ID` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `Type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masterinvoice`
--

CREATE TABLE `masterinvoice` (
  `ID` int(11) NOT NULL,
  `Year` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Month` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Floor` int(11) NOT NULL,
  `Room` int(11) NOT NULL,
  `PriceRoom` int(11) NOT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `PricePerUnitEL` int(11) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `PricePerUnitW` int(11) NOT NULL,
  `InvoiceNumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` datetime NOT NULL,
  `BillNumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BillDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masterrental`
--

CREATE TABLE `masterrental` (
  `ID` int(10) NOT NULL,
  `Title` varchar(6) DEFAULT NULL,
  `FName` varchar(24) DEFAULT NULL,
  `LName` varchar(14) DEFAULT NULL,
  `Address` varchar(40) DEFAULT NULL,
  `City` varchar(27) DEFAULT NULL,
  `IDCard` varchar(13) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `DateCreated` datetime NOT NULL,
  `DateModified` datetime NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `masterroom`
--

CREATE TABLE `masterroom` (
  `ID` int(11) NOT NULL,
  `Room` int(4) DEFAULT NULL,
  `Floor` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(4) DEFAULT NULL,
  `Detail` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `DateModified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mastersetting`
--

CREATE TABLE `mastersetting` (
  `ID` int(11) NOT NULL,
  `Detail` varchar(30) DEFAULT NULL,
  `Price` int(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `DateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `maymeter`
--

CREATE TABLE `maymeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `novembermeter`
--

CREATE TABLE `novembermeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `octobermeter`
--

CREATE TABLE `octobermeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `septembermeter`
--

CREATE TABLE `septembermeter` (
  `ID` int(11) NOT NULL,
  `FromTranID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Room` int(20) NOT NULL,
  `Rental` int(20) NOT NULL,
  `StartWater` int(11) NOT NULL,
  `EndWater` int(11) NOT NULL,
  `UnitWater` int(11) NOT NULL,
  `StartElectric` int(11) NOT NULL,
  `EndElectric` int(11) NOT NULL,
  `UnitElectric` int(11) NOT NULL,
  `Etc` int(11) NOT NULL,
  `EtcDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `DateRecord` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `ID` int(11) NOT NULL,
  `BillUpdate` int(11) NOT NULL,
  `DateModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactionuser`
--

CREATE TABLE `transactionuser` (
  `ID` int(11) NOT NULL,
  `Floor` int(11) NOT NULL,
  `Room` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreate` date NOT NULL,
  `DateModified` datetime NOT NULL,
  `Flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aprilmeter`
--
ALTER TABLE `aprilmeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `augustmeter`
--
ALTER TABLE `augustmeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `costtransaction`
--
ALTER TABLE `costtransaction`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `decembermeter`
--
ALTER TABLE `decembermeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `februarymeter`
--
ALTER TABLE `februarymeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `januarymeter`
--
ALTER TABLE `januarymeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `julymeter`
--
ALTER TABLE `julymeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `junemeter`
--
ALTER TABLE `junemeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `marchmeter`
--
ALTER TABLE `marchmeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `masterbill`
--
ALTER TABLE `masterbill`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `masterinvoice`
--
ALTER TABLE `masterinvoice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `masterrental`
--
ALTER TABLE `masterrental`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `masterroom`
--
ALTER TABLE `masterroom`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mastersetting`
--
ALTER TABLE `mastersetting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `maymeter`
--
ALTER TABLE `maymeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `novembermeter`
--
ALTER TABLE `novembermeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `octobermeter`
--
ALTER TABLE `octobermeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `septembermeter`
--
ALTER TABLE `septembermeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transactionuser`
--
ALTER TABLE `transactionuser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aprilmeter`
--
ALTER TABLE `aprilmeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `augustmeter`
--
ALTER TABLE `augustmeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `costtransaction`
--
ALTER TABLE `costtransaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `decembermeter`
--
ALTER TABLE `decembermeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `februarymeter`
--
ALTER TABLE `februarymeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `januarymeter`
--
ALTER TABLE `januarymeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `julymeter`
--
ALTER TABLE `julymeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `junemeter`
--
ALTER TABLE `junemeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marchmeter`
--
ALTER TABLE `marchmeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `masterbill`
--
ALTER TABLE `masterbill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `masterinvoice`
--
ALTER TABLE `masterinvoice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `masterrental`
--
ALTER TABLE `masterrental`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `masterroom`
--
ALTER TABLE `masterroom`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mastersetting`
--
ALTER TABLE `mastersetting`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maymeter`
--
ALTER TABLE `maymeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `novembermeter`
--
ALTER TABLE `novembermeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `octobermeter`
--
ALTER TABLE `octobermeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `septembermeter`
--
ALTER TABLE `septembermeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp`
--
ALTER TABLE `tmp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactionuser`
--
ALTER TABLE `transactionuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
