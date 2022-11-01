-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 07:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driverless`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PhoneNumber` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`, `AdminName`, `Email`, `Password`, `PhoneNumber`) VALUES
(2, 'Admin', 'admin@gmail.com', '$2y$10$8IB3vANxfW3PW8rh6Q.HRe7GNsMt3P5wuhYBO2BCnTENjr.STMYRS', '0979624431'),
(3, 'Jonny King', 'jonnyking@gmail.com', '$2y$10$I9ARtxL6cSXjjeWXySDsROLgvqNg7SKu1AcgbLGghwUbE53q7.MyW', '0925045651');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `AnswerID` int(11) NOT NULL,
  `Answer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `ContactID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`AnswerID`, `Answer`, `AdminID`, `ContactID`) VALUES
(3, 'It normally arrives within 3-7 months.', 3, 3),
(4, 'You can purchase by either method: Cash, Credit Card, Debit Card, Paypal.', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `UserID`, `Email`, `Subject`, `Message`) VALUES
(1, 2, 'marysmith@gmail.com', 'Purchase', 'How can I purchase the products?'),
(2, 1, 'tonystark@gmail.com', 'Company Operations', 'Where does Driverless operate?'),
(3, 1, 'tonystark@gmail.com', 'Order', 'How long does it take to arrive the ordered products?'),
(4, 3, 'emilia@gmail.com', 'Purchase', 'How can I purchase?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PostCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Email`, `Password`, `DateOfBirth`, `Address`, `PostCode`) VALUES
(1, 'Tony Stark', 'tonystark@gmail.com', '$2y$10$KSmgj4CI7QnJn06Lubt9HuJvJDQ8mLJTsuBjo/OmIO74H1sAvvzha', '1995-06-06', 'California, USA', '90002'),
(2, 'Mary Smith', 'marysmith@gmail.com', '$2y$10$7PnRkzEh/qTIqMj/C675Ge774TdZRwWgJJzLh.UhFXlp6pZIS.MyG', '2002-01-31', '10, West Green Street, New York, United States', '10001'),
(3, 'Emilia', 'emilia@gmail.com', '$2y$10$8XWwVGlba.i1p8yssIaN4e1xfzHpMmSyYF3y1JRRgJmdA0cSVTzym', '1998-02-05', 'Tokyo, Japan', '100-0000');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `VehicleID` int(11) NOT NULL,
  `VehicleName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VehicleModel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VehicleType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UnitPrice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PromotionPrice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VehicleImage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`VehicleID`, `VehicleName`, `VehicleModel`, `VehicleType`, `Year`, `Description`, `UnitPrice`, `PromotionPrice`, `VehicleImage`) VALUES
(1, 'BMW i Next', 'i Next', 'Luxury Car', '2020', 'No steering wheel or pedals. Instead it’s been fitted with two seats and dashboard with a single screen that displays the planned route. ', '$135,000', '$114,750', 'VehicleImages/product-1.jpg'),
(2, 'Tesla Model S', 'Model S', 'Luxury Car', '2021', 'The Model S is most popular vehicle, known for singlehandedly shifting public opinion of EVs from dowdy, boring people-movers, to high-tech performance machines.', '$80,000', '$68,000', 'VehicleImages/product-2.jpg'),
(3, 'Nio Eve', 'Eve', 'Luxury Car', '2017', 'Eve has an attractive silhouette and a roomy interior and you’ll find that the interior is void of the usual necessities like a steering wheel or pedals and buttons.', '$95,000', '$80,750', 'VehicleImages/product-3.jpg'),
(4, 'Jaguar I-PACE', 'Jaguar', 'Minivan', '2019', 'Jaguar model get a new style with polarizing styling, limited cargo space, no available third-row seat, cumbersome controls, and missing infotainment features.', '$75,000', '$63,750', 'VehicleImages/product-4.jpg'),
(5, 'Tesla Model X', 'Model X', 'Luxury Car', '2016', 'The Model X is framed as an uber-safe, uber-clean, autonomous, highly practical, all-electric long-range SUV capable of hardcore sports cars in a speed contest. ', '$80,000', '$68,000', 'VehicleImages/product-5.jpg'),
(6, 'Ford Fusion Hybrid', 'Fusion ', 'Family Car', '2019', 'Hybrid models get a new, larger battery with improved all-electric range, well comfortable and high-tech performance machines are equipped.', '$70,000', '$59,500', 'VehicleImages/product-6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`AnswerID`),
  ADD KEY `AdminID` (`AdminID`),
  ADD KEY `ContactID` (`ContactID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`VehicleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `AnswerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `VehicleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admins` (`AdminID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`ContactID`) REFERENCES `contact` (`ContactID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
