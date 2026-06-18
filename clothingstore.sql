-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2026 at 03:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ItemID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `SenderID` int(11) DEFAULT NULL,
  `ReceiverID` int(11) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `DateSent` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbiclothes`
--

CREATE TABLE `tbiclothes` (
  `ClothesID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Brand` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `SellerID` int(11) DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbiclothes`
--

INSERT INTO `tbiclothes` (`ClothesID`, `Name`, `Category`, `Price`, `Stock`, `Image`, `Brand`, `Description`, `SellerID`, `Status`) VALUES
(1, 'Jeans', 'Pants', 100.00, 1, 'images/1777825674_jeans1.jpg', NULL, NULL, NULL, 'Pending'),
(2, 'T-shirt white', 'T_shirt', 249.00, 1, 'images/1777825701_tshirt1.jpg', NULL, NULL, NULL, 'Pending'),
(3, 'Bucket Hat', 'Hats', 100.00, 1, 'images/1777825723_hat1.jpg', NULL, NULL, NULL, 'Pending'),
(4, 'Belt', 'Accessories', 50.00, 1, 'images/1777825786_belt1.jpg', NULL, NULL, NULL, 'Pending'),
(5, 'Sunglasses', 'Accessories', 50.00, 1, 'images/1777825809_sunglasses1.jpg', NULL, NULL, NULL, 'Pending'),
(6, 'Hangers', 'Accessories', 20.00, 30, 'images/1777835968_default.jpg', NULL, NULL, NULL, 'Pending'),
(7, 'T-shirt', 'T_shirt', 75.00, 2, 'images/1781786490_black t shirt.jpg', NULL, NULL, NULL, 'Approved'),
(8, 'T-shirt', NULL, 56.00, NULL, 'images/1781786587_black t shirt.jpg', 'no-name', 'good quality item', NULL, 'Pending'),
(9, 'T-shirt', NULL, 67.00, NULL, 'images/1781786636_black t shirt.jpg', 'no-name', 'good quality', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `AdminID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`AdminID`, `Name`, `Email`, `Password`) VALUES
(1, 'Marvin Theys', 'm.theys@abc.co.za', '29ef52e7563626a96cea7f4b4085c124');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserID`, `Name`, `Email`, `Password`, `Status`) VALUES
(1, 'Yusuf Alex', 'y.alex@abc.co.za', '57f231b1ec41dc6641270cb09a56f897', 'approved'),
(2, 'Cole Simons', 'c.simons@abc.co.za', '827ccb0eea8a706c4c34a16891f84e7b', 'approved'),
(4, 'TaYu', 'alex@abc.co.za', '42f749ade7f9e195bf475f37a44cafcb', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `thlaorder`
--

CREATE TABLE `thlaorder` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ClothesID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `OrderDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thlaorder`
--

INSERT INTO `thlaorder` (`OrderID`, `UserID`, `ClothesID`, `Quantity`, `OrderDate`) VALUES
(3, 4, NULL, NULL, '2026-06-18 14:34:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `tbiclothes`
--
ALTER TABLE `tbiclothes`
  ADD PRIMARY KEY (`ClothesID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `thlaorder`
--
ALTER TABLE `thlaorder`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ClothesID` (`ClothesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbiclothes`
--
ALTER TABLE `tbiclothes`
  MODIFY `ClothesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thlaorder`
--
ALTER TABLE `thlaorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thlaorder`
--
ALTER TABLE `thlaorder`
  ADD CONSTRAINT `thlaorder_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `tbluser` (`UserID`),
  ADD CONSTRAINT `thlaorder_ibfk_2` FOREIGN KEY (`ClothesID`) REFERENCES `tbiclothes` (`ClothesID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
