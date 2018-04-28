-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 10:06 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magiccosmetic`
--

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `User_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Status_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`User_ID`, `Product_ID`, `Status_Date`) VALUES
(1, 9, '2018-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Detail_ID` int(10) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Detail_qty` int(11) NOT NULL,
  `Detail_subtotal` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_head`
--

CREATE TABLE `order_head` (
  `Order_ID` int(10) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Order_dttm` datetime NOT NULL,
  `Order_fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Order_lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Order_addr` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Order_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Order_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Order_qty` int(11) NOT NULL,
  `Order_total` float NOT NULL,
  `Order_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Product_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ProType_ID` int(11) NOT NULL,
  `Product_detail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Product_price` int(11) NOT NULL,
  `Product_stock` int(11) NOT NULL,
  `Product_pic` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_name`, `ProType_ID`, `Product_detail`, `Product_price`, `Product_stock`, `Product_pic`) VALUES
(1, 'ลิปสติก1', 1, 'ทดสอบ', 129, 445, 'pvr_5adc80c57afd7.jpg'),
(2, 'ลิปสติก2', 1, 'ทดสอบ', 249, 98, 'pvr_5adc80de971f0.jpg'),
(3, 'ลิปสติก3', 1, 'ทดสอบ', 159, 397, 'pvr_5adc80f62de70.jpg'),
(4, 'แป้ง1', 2, 'ทดสอบ', 259, 338, 'pvr_5adc81194b0c2.jpg'),
(5, 'แป้ง2', 2, 'ทดสอบ', 590, 34, 'pvr_5adc8132b62e7.jpg'),
(6, 'แป้ง3', 2, 'ทดสอบ', 199, 242, 'pvr_5adc815732adc.jpg'),
(7, 'แปรง1', 3, 'ทดสอบ', 590, 30, 'pvr_5adc817f94585.jpg'),
(8, 'แปรง2', 3, 'ทดสอบ', 950, 40, 'pvr_5adc819ba400c.jpg'),
(9, 'แปรง3', 3, 'ทดสอบ', 1200, 0, 'pvr_5adc81bf8313c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `ProType_ID` int(11) NOT NULL,
  `ProType_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`ProType_ID`, `ProType_name`) VALUES
(1, 'ลิปสติก'),
(2, 'แป้งสำหรับใบหน้า'),
(3, 'ชุดแปรงแต่งหน้า');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `User_fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `User_lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `User_add` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `User_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `User_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `Password`, `User_fname`, `User_lname`, `User_add`, `User_email`, `User_tel`) VALUES
(1, 'admin', '$2y$10$bxU.XXhddh6qLFH32v8KkOUcJ8f9UreoymsY1P24hihPU7yo7rgYa', 'FirstNameADMIN', 'LastNameADMIN', 'AddressADMIN', 'admin@admin.com', '0885724915'),
(2, 'user1', '$2y$10$EnIkoH6FXJFLCnOEUFCH0urFy5LjbYk7lDmReyYWYhLaT3s.n0NTO', 'ชัยวัฒน์', 'แก้วมุกดาสวรรค์', '230/1 หมู่ 14 ต.ศิลา ถ.มิตรภาพ อ.เมือง ขอนแก่น ', 'thaiishchaiwat@gmail.com', '0885724915'),
(3, 'primx', '$2y$10$p2hz2MgQ7S2xYGYCkyrPU.YSDzzPRkZQpg581PFQPNPQAiGo6KdSa', 'oekfo', 'aemfo', 'oef', 'aolafkolaekd', 'eafm'),
(4, 'rename', '$2y$10$b8vHVhfCBDtYGBc4YwQDNubUrizAWp1qDqtEZeieNJI3i9k.MkKqu', 'sskm', 'kjkl', 'nknk', 'knkn', '0957237199'),
(5, 'rename2', '$2y$10$0Lvv6AxAAeDrQZBGHBClMOPkQt5NoaHREThuAwTHz06MpsflYNMUq', 'jjkm;m', 'jkjmoju', 'ihhihoi', 'ihihiooi@hotmail.com', '0957237189'),
(6, 'rename3', '$2y$10$owOAkz8/k.zz1B4CRqDeFOebnq0cOfVbKqHlS0bllqVmf6CAQKv46', 'rename3', 'awd', 'afafawcwa aefa', 'awfa', '0957237199'),
(7, 'rename1', '$2y$10$MhllJV1fB4S958rIVLzD2exWicv06lcY/f8T6tOMjTbbBQ9F.xj7u', 'nkln', 'nlnln', 'klknn lknkn', 'knklnknkn@hotmakl.com', '0957237199');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`User_ID`,`Product_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Detail_ID`);

--
-- Indexes for table `order_head`
--
ALTER TABLE `order_head`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`,`ProType_ID`),
  ADD KEY `ProType_ID` (`ProType_ID`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`ProType_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Detail_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `order_head`
--
ALTER TABLE `order_head`
  MODIFY `Order_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `ProType_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ProType_ID`) REFERENCES `product_type` (`ProType_ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
