-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 02, 2020 at 04:24 PM
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
-- Database: `nse_e_com`
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

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_Email` varchar(100) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `No_Of_Products` int(11) NOT NULL,
  `Loyalty_Point_Discount` double NOT NULL,
  `SubTotal` double NOT NULL,
  PRIMARY KEY (`Cart_ID`,`C_Email`,`P_ID`),
  KEY `Cart_ID` (`Cart_ID`,`C_Email`,`P_ID`),
  KEY `C_Email` (`C_Email`),
  KEY `P_ID` (`P_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `C_Email`, `P_ID`, `No_Of_Products`, `Loyalty_Point_Discount`, `SubTotal`) VALUES
(1, 'ravindu@gmail.com', 1, 10, 20, 400),
(2, 'ravindu@gmail.com', 1, 10, 20, 350),
(3, 'Tharindu@gamil.com', 2, 20, 50, 400),
(4, 'Tharindu@gamil.com', 2, 20, 50, 350),
(5, 'Tharindu@gamil.com', 2, 10, 50, 350),
(6, 'ravindu@gmail.com', 3, 20, 20, 350);

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
  PRIMARY KEY (`CC_Number`,`C_Email`),
  UNIQUE KEY `C_Email` (`C_Email`),
  UNIQUE KEY `CC_Number` (`CC_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`CC_Number`, `C_Email`, `CardHolder_Name`, `CC_Type`, `CCV_Number`, `CC_ExpDate`) VALUES
('1234567890', 'ravindu@gmail.com', 'Ravindu', 'Debit', 657, '2020-11-07'),
('8765432123', 'Tharindu@gamil.com', 'Tharindu', 'Credit', 565, '2020-12-10');

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
  UNIQUE KEY `C_Email` (`C_Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_Email`, `C_password`, `C_fname`, `C_lname`, `C_Address`, `C_Country`, `C_ZipCode`, `C_Phone`, `C_LoyaltyPoints`) VALUES
('ravindu@gmail.com', 'ravindu123', 'Ravindu', 'Sathsara', 'Wales,UK', 'UK', '200-4', '+56075345622', 1),
('Tharindu@gamil.com', 'tharindu123', 'Tharindu', 'Dananjaya', 'USA , Califonia', 'USA', '600-4', '+15753675221', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

DROP TABLE IF EXISTS `cus_order`;
CREATE TABLE IF NOT EXISTS `cus_order` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_Email` varchar(100) NOT NULL,
  `Cart_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `C_Name` varchar(200) NOT NULL,
  `To_Address` varchar(500) NOT NULL,
  `To_Country` varchar(100) NOT NULL,
  `To_State` varchar(100) NOT NULL,
  `To_ZipCode` varchar(20) NOT NULL,
  `Order_Date` datetime NOT NULL,
  PRIMARY KEY (`Order_ID`,`C_Email`,`Cart_ID`,`P_ID`),
  UNIQUE KEY `Order_ID` (`Order_ID`),
  UNIQUE KEY `Cart_ID` (`Cart_ID`),
  KEY `C_Email` (`C_Email`),
  KEY `P_ID` (`P_ID`),
  KEY `To_Country` (`To_Country`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`Order_ID`, `C_Email`, `Cart_ID`, `P_ID`, `C_Name`, `To_Address`, `To_Country`, `To_State`, `To_ZipCode`, `Order_Date`) VALUES
(1, 'ravindu@gmail.com', 1, 1, '', '', 'UK', 'Wales', '', '0000-00-00 00:00:00'),
(2, 'ravindu@gmail.com', 2, 1, '', '', 'UK', 'Wales', '', '0000-00-00 00:00:00'),
(3, 'Tharindu@gamil.com', 3, 2, '', '', 'USA', 'Califonia', '', '0000-00-00 00:00:00'),
(4, 'Tharindu@gamil.com', 4, 2, '', '', 'USA', 'Califonia', '', '0000-00-00 00:00:00'),
(5, 'ravindu@gmail.com', 6, 3, '', '', 'UK', 'Wales', '', '0000-00-00 00:00:00');

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
  PRIMARY KEY (`Invoice_No`,`Order_ID`,`Ship_ID`,`C_Email`),
  UNIQUE KEY `Invoice_No` (`Invoice_No`),
  UNIQUE KEY `Order_ID` (`Order_ID`,`Ship_ID`,`C_Email`),
  KEY `CC_Number` (`CC_Number`),
  KEY `Ship_ID` (`Ship_ID`,`Order_ID`),
  KEY `C_Email` (`C_Email`,`CC_Number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Invoice_No`, `Order_ID`, `Ship_ID`, `C_Email`, `CC_Number`, `TimeStamp`, `TotalAmount`) VALUES
(1, 1, 1, 'ravindu@gmail.com', '1234567890', '2020-10-06 22:40:00', 5520),
(2, 2, 2, 'ravindu@gmail.com', '1234567890', '2020-10-06 22:40:00', 5520),
(3, 4, 4, 'Tharindu@gamil.com', '8765432123', '2020-10-06 22:40:00', 5520),
(4, 5, 3, 'ravindu@gmail.com', '1234567890', '2020-10-06 22:40:00', 5520);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_ID`, `C_Email`, `Post_Type`, `Post_Date`, `Message`, `FilePath`) VALUES
(1, 'ravindu@gmail.com', 'Complain', '2020-10-07', 'abcdefg', ''),
(2, 'Tharindu@gamil.com', 'Help', '2020-10-16', 'efghijk', '');

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
  `P_Description` varchar(500) NOT NULL,
  `P_Price` double NOT NULL,
  `P_ManDate` date NOT NULL,
  `P_ExpDate` date NOT NULL,
  `Stock_ID` int(11) NOT NULL,
  `P_filepath` varchar(500) NOT NULL,
  `P_Offers` int(11) NOT NULL,
  `P_OfferPrice` double NOT NULL,
  `P_OfferStatus` int(11) NOT NULL,
  `P_Status` int(11) NOT NULL,
  PRIMARY KEY (`P_ID`,`P_Qty`,`P_Type`,`Stock_ID`,`P_Status`),
  KEY `P_Qty` (`P_Qty`),
  KEY `P_Type` (`P_Type`),
  KEY `Stock_ID` (`Stock_ID`),
  KEY `P_Status` (`P_Status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_ID`, `P_Qty`, `P_Name`, `P_Type`, `P_Description`, `P_Price`, `P_ManDate`, `P_ExpDate`, `Stock_ID`, `P_filepath`, `P_Offers`, `P_OfferPrice`, `P_OfferStatus`, `P_Status`) VALUES
(1, 100, 'Cinnamon-OIL NSE ', 'Cinnamon-oil', 'Cinnamon-OIL NSE Best Quality', 5000, '2020-10-01', '2020-10-31', 1, '', 1, 50, 1, 1),
(2, 200, 'Cinnamon-Bark NSE Best Quality', 'Cinnamon-Bark', 'Cinnamon-Bark NSE Best Quality', 5000, '2020-10-01', '2020-10-31', 3, '', 1, 50, 1, 1),
(2, 200, 'Cinnamon-Bark NSE ', 'Cinnamon-Bark', 'Cinnamon-Bark NSE Best Quality', 4000, '2020-10-01', '2020-10-31', 4, '', 1, 40, 1, 1),
(3, 300, 'Cardomon NSE \r\n', 'Cardomon', 'Cardomin NSE Best Quality', 4000, '2020-10-01', '2020-10-31', 5, '', 2, 40, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productreview`
--

DROP TABLE IF EXISTS `productreview`;
CREATE TABLE IF NOT EXISTS `productreview` (
  `Review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_ID` int(11) NOT NULL,
  `C_Email` varchar(100) NOT NULL,
  `P_Review` varchar(200) NOT NULL,
  `P_Rating` int(11) NOT NULL,
  PRIMARY KEY (`Review_ID`),
  KEY `P_ID` (`P_ID`),
  KEY `P_Review` (`P_Review`),
  KEY `productreview_ibfk_3` (`P_Rating`),
  KEY `C_Email` (`C_Email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productreview`
--

INSERT INTO `productreview` (`Review_ID`, `P_ID`, `C_Email`, `P_Review`, `P_Rating`) VALUES
(2, 1, 'ravindu@gmail.com', 'Good', 10),
(3, 2, 'ravindu@gmail.com', 'Good ', 5),
(4, 3, 'ravindu@gmail.com', 'Excellent', 10),
(5, 1, 'Tharindu@gamil.com', 'Good', 8);

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
  PRIMARY KEY (`Ship_ID`,`Order_ID`,`Ship_Country`),
  UNIQUE KEY `Ship_ID` (`Ship_ID`),
  UNIQUE KEY `Order_ID` (`Order_ID`),
  KEY `Ship_Country` (`Ship_Country`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`Ship_ID`, `Order_ID`, `Ship_Country`, `Packed_Date`, `Approx_Delivery`, `Ship_Charge`) VALUES
(1, 1, 'UK', '2020-10-06', 3, 56),
(2, 2, 'UK', '2020-10-15', 7, 23),
(3, 5, 'UK', '2020-10-06', 3, 56),
(4, 4, 'USA', '2020-10-06', 7, 56);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `Stock_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_ID` int(11) NOT NULL,
  `P_Type` varchar(100) NOT NULL,
  `Stock_Arrive_Date` date NOT NULL,
  `Stock_Exp_Date` date NOT NULL,
  `Stock_Qty` int(11) NOT NULL,
  `P_Status` int(11) NOT NULL,
  PRIMARY KEY (`Stock_ID`,`P_ID`,`P_Type`,`Stock_Qty`,`P_Status`),
  KEY `Stock_ID` (`Stock_ID`),
  KEY `P_ID` (`P_ID`),
  KEY `P_Type` (`P_Type`),
  KEY `Stock_Qty` (`Stock_Qty`),
  KEY `P_Status` (`P_Status`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Stock_ID`, `P_ID`, `P_Type`, `Stock_Arrive_Date`, `Stock_Exp_Date`, `Stock_Qty`, `P_Status`) VALUES
(1, 1, 'Cinnamon-oil', '2020-10-01', '2020-10-31', 100, 1),
(2, 1, 'Cinnamon-oil', '2020-10-03', '2020-11-23', 100, 1),
(3, 2, 'Cinnamon-Bark', '2020-10-01', '2020-10-31', 200, 1),
(4, 2, 'Cinnamon-Bark', '2020-10-03', '2020-11-23', 100, 1),
(5, 3, 'Cardomon', '2020-10-02', '2020-11-23', 300, 1),
(6, 3, 'Cardomon', '2020-10-02', '2020-12-02', 200, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD CONSTRAINT `creditcard_ibfk_1` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD CONSTRAINT `cus_order_ibfk_1` FOREIGN KEY (`Cart_ID`) REFERENCES `cart` (`Cart_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cus_order_ibfk_2` FOREIGN KEY (`C_Email`) REFERENCES `cart` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cus_order_ibfk_3` FOREIGN KEY (`P_ID`) REFERENCES `cart` (`P_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Ship_ID`,`Order_ID`) REFERENCES `shipment` (`Ship_ID`, `Order_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`C_Email`,`CC_Number`) REFERENCES `creditcard` (`C_Email`, `CC_Number`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `stock` (`P_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`P_Qty`) REFERENCES `stock` (`Stock_Qty`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`P_Type`) REFERENCES `stock` (`P_Type`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`Stock_ID`) REFERENCES `stock` (`Stock_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`P_Status`) REFERENCES `stock` (`P_Status`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `productreview`
--
ALTER TABLE `productreview`
  ADD CONSTRAINT `productreview_ibfk_1` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `productreview_ibfk_2` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
