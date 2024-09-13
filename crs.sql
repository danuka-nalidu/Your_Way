-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 12:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(4) NOT NULL,
  `First_name` varchar(20) DEFAULT NULL,
  `Last_name` varchar(20) DEFAULT NULL,
  `Task` varchar(50) DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `Car_ID` int(4) NOT NULL,
  `License_Plate_No` varchar(9) NOT NULL,
  `Brand` varchar(15) NOT NULL,
  `Gas` varchar(10) DEFAULT NULL,
  `Gear` varchar(10) DEFAULT NULL,
  `Model` varchar(15) NOT NULL,
  `CRMV` varchar(50) NOT NULL,
  `VRL` varchar(50) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Supplier_ID` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Car_ID`, `License_Plate_No`, `Brand`, `Gas`, `Gear`, `Model`, `CRMV`, `VRL`, `Description`, `Supplier_ID`) VALUES
(1, 'BM 5233', 'Toyota', 'petrol', 'auto', 'CHR', 'https://www.google.com/url?sa=i&url=https%3A%2F%2F', 'https://www.google.com/url?sa=i&url=https%3A%2F%2F', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(4) NOT NULL,
  `NIC` int(12) NOT NULL,
  `First_Name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(20) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

CREATE TABLE `customer_contact` (
  `Customer_ID` int(4) NOT NULL,
  `Contact_No` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_email`
--

CREATE TABLE `customer_email` (
  `Customer_ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `Driver_ID` int(4) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `First_Name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(20) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Address` int(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Driving_license` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_contact`
--

CREATE TABLE `driver_contact` (
  `Driver_ID` int(4) DEFAULT NULL,
  `Contact_No` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_email`
--

CREATE TABLE `driver_email` (
  `Driver_ID` int(4) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_salary`
--

CREATE TABLE `driver_salary` (
  `Driver_ID` int(4) NOT NULL,
  `Admin_ID` int(4) NOT NULL,
  `Amount` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Payment_ID` int(4) NOT NULL,
  `Amount` float NOT NULL,
  `Payment_method` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `Customer_ID` int(4) NOT NULL,
  `Admin_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placed_requisition`
--

CREATE TABLE `placed_requisition` (
  `Customer_ID` int(4) NOT NULL,
  `Rental_ID` int(4) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE `requisition` (
  `Rental_ID` int(5) NOT NULL,
  `Rental_Type` varchar(10) NOT NULL,
  `Supplier_ID` int(4) NOT NULL,
  `Rental_Status` varchar(50) NOT NULL,
  `Customer_ID` int(4) NOT NULL,
  `Car_ID` int(4) NOT NULL,
  `Admin_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `Customer_ID` int(11) NOT NULL,
  `Car_ID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_ID` int(4) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `First_Name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(20) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_ID`, `NIC`, `First_Name`, `Last_Name`, `Gender`, `Address`, `Username`, `Password`) VALUES
(1, '200261100926', 'Thimesha', 'Ansar', 'f', '256/f  malabe', 'Thimesha', 'thime123');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_contact`
--

CREATE TABLE `supplier_contact` (
  `Supplier_ID` int(4) DEFAULT NULL,
  `Contact_No` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `Supplier_ID` int(11) NOT NULL,
  `Car_ID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_email`
--

CREATE TABLE `supplier_email` (
  `Supplier_ID` int(4) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_profit`
--

CREATE TABLE `supplier_profit` (
  `Supplier_ID` int(4) NOT NULL,
  `Admin_ID` int(4) NOT NULL,
  `Amount` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Car_ID`),
  ADD KEY `Car_fk` (`Supplier_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD PRIMARY KEY (`Customer_ID`,`Contact_No`);

--
-- Indexes for table `customer_email`
--
ALTER TABLE `customer_email`
  ADD PRIMARY KEY (`Customer_ID`,`Email`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Driver_ID`);

--
-- Indexes for table `driver_contact`
--
ALTER TABLE `driver_contact`
  ADD KEY `dContact_fk` (`Driver_ID`);

--
-- Indexes for table `driver_email`
--
ALTER TABLE `driver_email`
  ADD KEY `dEmail_fk` (`Driver_ID`);

--
-- Indexes for table `driver_salary`
--
ALTER TABLE `driver_salary`
  ADD PRIMARY KEY (`Driver_ID`,`Admin_ID`),
  ADD KEY `DSAdmin_fk` (`Admin_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `payCustomer_fk` (`Customer_ID`),
  ADD KEY `ApprovedAdmin_fk` (`Admin_ID`);

--
-- Indexes for table `placed_requisition`
--
ALTER TABLE `placed_requisition`
  ADD PRIMARY KEY (`Customer_ID`,`Rental_ID`),
  ADD KEY `PRental_fk` (`Rental_ID`);

--
-- Indexes for table `requisition`
--
ALTER TABLE `requisition`
  ADD PRIMARY KEY (`Rental_ID`),
  ADD KEY `rSupplier_fk` (`Supplier_ID`),
  ADD KEY `rCustomer_fk` (`Customer_ID`),
  ADD KEY `rCar_fk` (`Car_ID`),
  ADD KEY `rAdmin_fk` (`Admin_ID`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`Customer_ID`,`Car_ID`),
  ADD KEY `ReturnedCar_fk` (`Car_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_ID`),
  ADD UNIQUE KEY `Supplier_ID` (`NIC`);

--
-- Indexes for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
  ADD UNIQUE KEY `Supplier_ID` (`Contact_No`),
  ADD KEY `sContact_fk` (`Supplier_ID`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`Supplier_ID`,`Car_ID`),
  ADD KEY `SuppliedCar_fk` (`Car_ID`);

--
-- Indexes for table `supplier_email`
--
ALTER TABLE `supplier_email`
  ADD KEY `sEmail_fk` (`Supplier_ID`);

--
-- Indexes for table `supplier_profit`
--
ALTER TABLE `supplier_profit`
  ADD PRIMARY KEY (`Supplier_ID`,`Admin_ID`),
  ADD KEY `SPAdmin_fk` (`Admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `Car_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `Driver_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Payment_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requisition`
--
ALTER TABLE `requisition`
  MODIFY `Rental_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `Car_fk` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`);

--
-- Constraints for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD CONSTRAINT `cContact_fk` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `customer_email`
--
ALTER TABLE `customer_email`
  ADD CONSTRAINT `cEmail_fk` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `driver_contact`
--
ALTER TABLE `driver_contact`
  ADD CONSTRAINT `dContact_fk` FOREIGN KEY (`Driver_ID`) REFERENCES `driver` (`Driver_ID`);

--
-- Constraints for table `driver_email`
--
ALTER TABLE `driver_email`
  ADD CONSTRAINT `dEmail_fk` FOREIGN KEY (`Driver_ID`) REFERENCES `driver` (`Driver_ID`);

--
-- Constraints for table `driver_salary`
--
ALTER TABLE `driver_salary`
  ADD CONSTRAINT `DSAdmin_fk` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `DS_fk` FOREIGN KEY (`Driver_ID`) REFERENCES `driver` (`Driver_ID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `ApprovedAdmin_fk` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `payCustomer_fk` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `placed_requisition`
--
ALTER TABLE `placed_requisition`
  ADD CONSTRAINT `PCustomer_fk` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `PRental_fk` FOREIGN KEY (`Rental_ID`) REFERENCES `requisition` (`Rental_ID`);

--
-- Constraints for table `requisition`
--
ALTER TABLE `requisition`
  ADD CONSTRAINT `rAdmin_fk` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `rCar_fk` FOREIGN KEY (`Car_ID`) REFERENCES `car` (`Car_ID`),
  ADD CONSTRAINT `rCustomer_fk` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `rSupplier_fk` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`);

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `ReturnedCar_fk` FOREIGN KEY (`Car_ID`) REFERENCES `car` (`Car_ID`),
  ADD CONSTRAINT `ReturnedCustomer_fk` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
  ADD CONSTRAINT `sContact_fk` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`);

--
-- Constraints for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD CONSTRAINT `CarSupplier_fk` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`),
  ADD CONSTRAINT `SuppliedCar_fk` FOREIGN KEY (`Car_ID`) REFERENCES `car` (`Car_ID`);

--
-- Constraints for table `supplier_email`
--
ALTER TABLE `supplier_email`
  ADD CONSTRAINT `sEmail_fk` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`);

--
-- Constraints for table `supplier_profit`
--
ALTER TABLE `supplier_profit`
  ADD CONSTRAINT `SPAdmin_fk` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `SP_fk` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
