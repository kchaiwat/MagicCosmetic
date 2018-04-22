-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 02:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(2, 1, '2018-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `d_id` int(10) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_qty` int(11) NOT NULL,
  `d_subtotal` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`d_id`, `o_id`, `p_id`, `d_qty`, `d_subtotal`) VALUES
(10, 4, 5, 1, 33),
(9, 4, 2, 1, 99),
(8, 4, 1, 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `order_head`
--

CREATE TABLE `order_head` (
  `o_id` int(10) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `o_dttm` datetime NOT NULL,
  `o_fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `o_lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `o_addr` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `o_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `o_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `o_qty` int(11) NOT NULL,
  `o_total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_head`
--

INSERT INTO `order_head` (`o_id`, `User_ID`, `o_dttm`, `o_fname`, `o_lname`, `o_addr`, `o_email`, `o_phone`, `o_qty`, `o_total`) VALUES
(4, 2, '2018-04-22 09:28:05', '12345', '12345', '12345', '12345@gmail.com', '12345', 4, 150);

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
  `p_pic` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_name`, `ProType_ID`, `Product_detail`, `Product_price`, `Product_stock`, `p_pic`) VALUES
(1, 'test1', 3, 'test1', 9, 0, 'pvr_5adc79a10ee5d.jpg'),
(2, 'test2', 2, 'test2', 99, 0, 'pvr_5adc760a2daf5.jpg');

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
(1, 'หนึ่ง'),
(2, 'สอง'),
(3, 'สาม');

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
(2, 'admin', '$2y$10$2LmQvXFNoMcEItmlSrTjE.UZpfbGkXfLGQiKSHEKr1SqLu2prNI5W', '12345', '12345', '12345', '12345@gmail.com', '12345'),
(3, 'user1', '$2y$10$sFdl3TtqtWjTxJgzzU4tWO8aR7HlDZd8nXEJH6qEiivZdJY2R328q', 'user', 'user', '12345', '12345@gmail.com', '12345');

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
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `order_head`
--
ALTER TABLE `order_head`
  ADD PRIMARY KEY (`o_id`);

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
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_head`
--
ALTER TABLE `order_head`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
