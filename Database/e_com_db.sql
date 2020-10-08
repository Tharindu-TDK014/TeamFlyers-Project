-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 08, 2020 at 09:36 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_com_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `A_Email` varchar(100) NOT NULL,
  `A_password` varchar(20) NOT NULL,
  `A_fname` varchar(50) NOT NULL,
  `A_lname` varchar(50) NOT NULL,
  `A_Phone` varchar(10) NOT NULL,
  PRIMARY KEY (`A_Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_Email`, `A_password`, `A_fname`, `A_lname`, `A_Phone`) VALUES
('admin1@gmail.com', 'admin12345', 'Admin', '1', '0775677884');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_Email` varchar(100) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `Stock_ID` int(11) NOT NULL,
  `No_Of_Products` int(11) NOT NULL,
  `Loyalty_Point_Discount` double NOT NULL,
  `Sub_Total` double NOT NULL,
  PRIMARY KEY (`Cart_ID`),
  KEY `C_Email` (`C_Email`),
  KEY `P_ID` (`P_ID`),
  KEY `Sub_Total` (`Sub_Total`),
  KEY `Stock_ID` (`Stock_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `C_Email`, `P_ID`, `Stock_ID`, `No_Of_Products`, `Loyalty_Point_Discount`, `Sub_Total`) VALUES
(1, 'idnipunmadhushan@gmail.com ', 1, 1, 10, 50, 4950),
(2, 'nileshshermal007@gmail.com ', 1, 2, 20, 50, 5950),
(3, 'ravindursm1@gmail.com', 1, 1, 30, 50, 6950),
(4, 'sanojan11@gmail.com', 2, 3, 40, 50, 7950),
(5, 'tharindudk7714@gmail.com', 2, 4, 50, 50, 8950);

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

DROP TABLE IF EXISTS `creditcard`;
CREATE TABLE IF NOT EXISTS `creditcard` (
  `CC_Number` varchar(50) NOT NULL,
  `C_Email` varchar(100) NOT NULL,
  `CardHolder_Name` varchar(200) NOT NULL,
  `CC_Type` varchar(20) NOT NULL,
  `CCV_Number` int(11) NOT NULL,
  `CC_ExpDate` date NOT NULL,
  PRIMARY KEY (`CC_Number`),
  KEY `C_Email` (`C_Email`),
  KEY `CC_Number` (`CC_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`CC_Number`, `C_Email`, `CardHolder_Name`, `CC_Type`, `CCV_Number`, `CC_ExpDate`) VALUES
('101020203030', 'idnipunmadhushan@gmail.com ', 'Nipun Madushan', 'Credit', 123, '2021-01-01'),
('202030304040', 'nileshshermal007@gmail.com ', 'Nilesh Shermal', 'Credit', 266, '2021-01-01'),
('303040405050', 'ravindursm1@gmail.com', 'Ravindu Sathsara', 'Debit', 231, '2021-01-01'),
('404050506060', 'sanojan11@gmail.com', 'Anojan Sivaranjan', 'Credit', 432, '2020-12-02'),
('505060605050', 'tharindudk7714@gmail.com', 'Tharindu Dananjaya', 'Debit', 552, '2021-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `C_Email` varchar(100) NOT NULL,
  `C_password` varchar(20) NOT NULL,
  `C_fname` varchar(50) NOT NULL,
  `C_lname` varchar(50) NOT NULL,
  `C_Address` varchar(500) NOT NULL,
  `C_Country` varchar(100) NOT NULL,
  `C_ZipCode` varchar(20) NOT NULL,
  `C_Phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `C_LoyaltyPoints` int(11) NOT NULL,
  PRIMARY KEY (`C_Email`),
  KEY `C_LoyaltyPoints` (`C_LoyaltyPoints`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_Email`, `C_password`, `C_fname`, `C_lname`, `C_Address`, `C_Country`, `C_ZipCode`, `C_Phone`, `C_LoyaltyPoints`) VALUES
('idnipunmadhushan@gmail.com ', 'nipun123', 'Nipun', 'Madushan', 'Russia,Moscow', 'Russia', '400-2', '0751234567', 1),
('nileshshermal007@gmail.com ', 'shermal123', 'Shermal', 'Nilesh', 'Canada,Toronto', 'Canada', '300-4', '0745566784', 1),
('ravindursm1@gmail.com', 'ravindu123', 'Ravindu', 'Sathsara', 'UK,Edinburgh', 'UK', '500-1', '0719089744', 1),
('sanojan11@gmail.com', 'anojan123', 'Anojan', 'Sivaranjan', 'Switzerland,Geneva', 'Switzerland', '800-2', '0765588776', 1),
('tharindudk7714@gmail.com', 'tharindu12', 'Tharindu', 'Dananjaya', 'USA,Kansas', 'USA', '202-3', '0764477441', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

DROP TABLE IF EXISTS `cus_order`;
CREATE TABLE IF NOT EXISTS `cus_order` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cart_ID` int(11) NOT NULL,
  `C_Email` varchar(100) NOT NULL,
  `C_Name` varchar(200) NOT NULL,
  `To_Address` varchar(500) NOT NULL,
  `To_Country` varchar(100) NOT NULL,
  `To_State` varchar(100) NOT NULL,
  `To_ZipCode` varchar(20) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Cart_Total_Amt` double NOT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `Cart_ID` (`Cart_ID`),
  KEY `C_Email` (`C_Email`),
  KEY `Cart_Total_Amt` (`Cart_Total_Amt`),
  KEY `To_Country` (`To_Country`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`Order_ID`, `Cart_ID`, `C_Email`, `C_Name`, `To_Address`, `To_Country`, `To_State`, `To_ZipCode`, `Order_Date`, `Cart_Total_Amt`) VALUES
(1, 1, 'idnipunmadhushan@gmail.com ', 'Nipun Madushan', 'Russia Moscow', 'Russia', 'Moscow', '', '2020-10-07 11:25:00', 4950),
(2, 2, 'nileshshermal007@gmail.com ', 'Nilesh Shermal', 'Canada Toronto', 'Canada', 'Toronto', '', '2020-10-08 09:00:00', 5950),
(3, 3, 'ravindursm1@gmail.com', 'Ravindu Sathsara', 'UK Edinburgh', 'UK', 'Edinburgh', '', '2020-10-10 11:17:00', 6950),
(4, 4, 'sanojan11@gmail.com', 'Anojan Sivaranjan', 'Switzerland Geneva', 'Switzerland', 'Geneva', '', '2020-10-11 12:16:00', 7950),
(5, 5, 'tharindudk7714@gmail.com', 'Tharindu Dananjaya', 'USA Kansas', 'USA', 'Kansas', '', '2020-10-14 14:20:00', 8950);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `Invoice_No` int(11) NOT NULL AUTO_INCREMENT,
  `Order_ID` int(11) NOT NULL,
  `Ship_ID` int(11) NOT NULL,
  `C_Email` varchar(100) NOT NULL,
  `CC_Number` varchar(50) NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  `TotalAmount` double NOT NULL,
  PRIMARY KEY (`Invoice_No`),
  KEY `Order_ID` (`Order_ID`),
  KEY `Ship_ID` (`Ship_ID`),
  KEY `CC_Number` (`CC_Number`),
  KEY `payment_ibfk_5` (`C_Email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Invoice_No`, `Order_ID`, `Ship_ID`, `C_Email`, `CC_Number`, `TimeStamp`, `TotalAmount`) VALUES
(1, 1, 1, 'idnipunmadhushan@gmail.com ', '101020203030', '2020-10-08 01:30:00', 6000),
(2, 2, 2, 'nileshshermal007@gmail.com ', '202030304040', '2020-10-09 03:30:00', 7000),
(3, 3, 3, 'ravindursm1@gmail.com', '303040405050', '2020-10-10 04:30:00', 8000),
(4, 4, 4, 'sanojan11@gmail.com', '404050506060', '2020-10-11 07:04:00', 9000),
(5, 5, 5, 'tharindudk7714@gmail.com', '505060605050', '2020-10-13 18:30:00', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `Post_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_Email` varchar(100) NOT NULL,
  `Post_Type` varchar(50) NOT NULL,
  `Post_Date` date NOT NULL,
  `Message` varchar(500) NOT NULL,
  `FilePath` varchar(500) NOT NULL,
  PRIMARY KEY (`Post_ID`),
  KEY `C_Email` (`C_Email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_ID`, `C_Email`, `Post_Type`, `Post_Date`, `Message`, `FilePath`) VALUES
(1, 'idnipunmadhushan@gmail.com ', 'Help', '2020-10-01', 'Cannot proceed transactions', ''),
(2, 'nileshshermal007@gmail.com ', 'Complain', '2020-10-02', 'Login issues to my profile', ''),
(3, 'ravindursm1@gmail.com', 'Help', '2020-10-03', 'Cannot proceed my ordered items', ''),
(4, 'sanojan11@gmail.com', 'Complain', '2020-10-04', 'Your 2nd order is not in finest quality', ''),
(5, 'tharindudk7714@gmail.com', 'Help', '2020-10-05', 'Transactions Problems', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `P_ID` int(11) NOT NULL,
  `P_Qty` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `P_Type` varchar(100) NOT NULL,
  `Stock_ID` int(11) NOT NULL,
  `P_Description` varchar(500) NOT NULL,
  `P_Price` double NOT NULL,
  `P_ManDate` date NOT NULL,
  `P_ExpDate` date NOT NULL,
  `P_Offers` int(11) NOT NULL,
  `P_OfferPrice` double NOT NULL,
  `P_OfferStatus` int(11) NOT NULL,
  `P_filepath` varchar(500) NOT NULL,
  UNIQUE KEY `Stock_ID` (`Stock_ID`) USING BTREE,
  KEY `P_Type` (`P_Type`),
  KEY `P_Qty` (`P_Qty`),
  KEY `product_ibfk_8` (`P_Qty`,`Stock_ID`),
  KEY `P_ID` (`P_ID`) USING BTREE,
  KEY `P_Name` (`P_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_ID`, `P_Qty`, `P_Name`, `P_Type`, `Stock_ID`, `P_Description`, `P_Price`, `P_ManDate`, `P_ExpDate`, `P_Offers`, `P_OfferPrice`, `P_OfferStatus`, `P_filepath`) VALUES
(1, 100, 'NSE Cinnamon oil', 'Cinnamon-oil', 1, 'Good Quality', 5000, '2020-10-07', '2020-10-15', 500, 400, 1, ''),
(1, 100, 'NSE Cinnamon Oil', 'Cinnamon-oil', 2, 'Good Quality', 6000, '2020-10-07', '2020-10-31', 500, 7000, 1, ''),
(2, 250, 'NSE Cinnamon Bark', 'Cinnamon-Bark', 3, 'Best Quality', 4000, '2020-10-02', '2020-10-31', 1, 500, 1, ''),
(2, 300, 'NSE Cinnamon Bark', 'Cinnamon-Bark', 4, 'Export Quality', 8000, '2020-10-02', '2020-10-31', 1, 8000, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `productreview`
--

DROP TABLE IF EXISTS `productreview`;
CREATE TABLE IF NOT EXISTS `productreview` (
  `Review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_ID` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `C_Email` varchar(100) NOT NULL,
  `P_Review` varchar(200) NOT NULL,
  `P_Rating` int(11) NOT NULL,
  PRIMARY KEY (`Review_ID`),
  KEY `P_ID` (`P_ID`),
  KEY `C_Email` (`C_Email`),
  KEY `P_Name` (`P_Name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productreview`
--

INSERT INTO `productreview` (`Review_ID`, `P_ID`, `P_Name`, `C_Email`, `P_Review`, `P_Rating`) VALUES
(1, 1, 'NSE Cinnamon oil', 'idnipunmadhushan@gmail.com ', 'Good Quality best Product from Ceylon', 10),
(2, 1, 'NSE Cinnamon Oil', 'nileshshermal007@gmail.com ', 'Good', 6),
(3, 1, 'NSE Cinnamon oil', 'ravindursm1@gmail.com', 'Excellent products', 10),
(4, 2, 'NSE Cinnamon Bark', 'sanojan11@gmail.com', 'Seems good to me', 7),
(5, 2, 'NSE Cinnamon Bark', 'tharindudk7714@gmail.com', 'Quality is good', 8);

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

DROP TABLE IF EXISTS `shipment`;
CREATE TABLE IF NOT EXISTS `shipment` (
  `Ship_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Order_ID` int(11) NOT NULL,
  `Ship_Country` varchar(100) NOT NULL,
  `Packed_Date` date NOT NULL,
  `Approx_Delivery` int(11) NOT NULL,
  `Ship_Charge` double NOT NULL,
  PRIMARY KEY (`Ship_ID`),
  UNIQUE KEY `Order_ID` (`Order_ID`),
  KEY `Ship_Country` (`Ship_Country`),
  KEY `Ship_Charge` (`Ship_Charge`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`Ship_ID`, `Order_ID`, `Ship_Country`, `Packed_Date`, `Approx_Delivery`, `Ship_Charge`) VALUES
(1, 1, 'Russia', '2020-10-08', 1, 1000),
(2, 2, 'Canada', '2020-10-10', 2, 2000),
(3, 3, 'UK', '2020-10-11', 3, 3000),
(4, 4, 'Switzerland', '2020-10-14', 4, 4000),
(5, 5, 'USA', '2020-10-17', 5, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `Stock_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_ID` int(11) NOT NULL,
  `P_Type` varchar(100) NOT NULL,
  `P_Status` int(11) NOT NULL,
  `Stock_Qty` int(11) NOT NULL,
  `Stock_Arrive_Date` date NOT NULL,
  `Stock_Exp_Date` date NOT NULL,
  PRIMARY KEY (`Stock_ID`),
  KEY `P_ID` (`P_ID`),
  KEY `P_Type` (`P_Type`),
  KEY `P_Status` (`P_Status`),
  KEY `Stock_Qty` (`Stock_Qty`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Stock_ID`, `P_ID`, `P_Type`, `P_Status`, `Stock_Qty`, `Stock_Arrive_Date`, `Stock_Exp_Date`) VALUES
(1, 1, 'Cinnamon-oil', 1, 100, '2020-10-02', '2020-10-30'),
(2, 1, 'Cinnamon-oil', 1, 200, '2020-10-05', '2020-10-28'),
(3, 2, 'Cinnamon-Bark', 1, 250, '2020-10-06', '2020-10-29'),
(4, 2, 'Cinnamon-Bark', 1, 300, '2020-10-03', '2020-10-31');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`Stock_ID`) REFERENCES `product` (`Stock_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD CONSTRAINT `creditcard_ibfk_1` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD CONSTRAINT `cus_order_ibfk_1` FOREIGN KEY (`Cart_ID`) REFERENCES `cart` (`Cart_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cus_order_ibfk_2` FOREIGN KEY (`Cart_Total_Amt`) REFERENCES `cart` (`Sub_Total`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cus_order_ibfk_3` FOREIGN KEY (`C_Email`) REFERENCES `cart` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `cus_order` (`Order_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`Ship_ID`) REFERENCES `shipment` (`Ship_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `payment_ibfk_4` FOREIGN KEY (`C_Email`) REFERENCES `creditcard` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `payment_ibfk_5` FOREIGN KEY (`C_Email`) REFERENCES `creditcard` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `payment_ibfk_6` FOREIGN KEY (`CC_Number`) REFERENCES `creditcard` (`CC_Number`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `stock` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`Stock_ID`) REFERENCES `stock` (`Stock_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_7` FOREIGN KEY (`P_Type`) REFERENCES `stock` (`P_Type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_8` FOREIGN KEY (`P_Qty`) REFERENCES `stock` (`Stock_Qty`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productreview`
--
ALTER TABLE `productreview`
  ADD CONSTRAINT `productreview_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `productreview_ibfk_2` FOREIGN KEY (`P_Name`) REFERENCES `product` (`P_Name`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `productreview_ibfk_3` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `cus_order` (`Order_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`Ship_Country`) REFERENCES `cus_order` (`To_Country`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
