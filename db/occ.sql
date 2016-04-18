-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2013 at 05:55 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `occ`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `customerName` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerName`, `description`) VALUES
(1, 'Dự Án CT68 Của Chính Phủ', 'Dự Án CT68 Của Chính Phủ'),
(2, 'Tổng Công Ty Và Doanh Nghiệp', 'Tổng Công Ty Và Doanh Nghiệp'),
(3, 'Khách Sạn, Nhà Hàng ', 'Khách Sạn, Nhà Hàng '),
(4, 'Tổ Chức Phi Chính Phủ', 'Tổ Chức Phi Chính Phủ');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `imageId` int(11) NOT NULL AUTO_INCREMENT,
  `imageName` varchar(200) NOT NULL,
  `imageUrl` varchar(200) DEFAULT NULL,
  `createDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`imageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`imageId`, `imageName`, `imageUrl`, `createDate`) VALUES
(1, 'Chrysanthemum.jpg', 'anhUpload/Chrysanthemum.jpg', '2013-10-22 03:07:33'),
(2, 'Desert.jpg', 'anhUpload/Desert.jpg', '2013-10-22 03:07:33'),
(3, 'Koala.jpg', 'anhUpload/Koala.jpg', '2013-10-22 03:07:33'),
(4, 'Jellyfish.jpg', 'anhUpload/Jellyfish.jpg', '2013-10-22 03:07:33'),
(5, 'Penguins.jpg', 'anhUpload/Penguins.jpg', '2013-10-22 03:16:44'),
(6, 'Tulips.jpg', 'anhUpload/Tulips.jpg', '2013-10-22 05:38:59'),
(7, 'Lighthouse.jpg', 'anhUpload/Lighthouse.jpg', '2013-10-22 05:43:13'),
(8, 'Lighthouse.jpg', 'anhUpload/Lighthouse.jpg', '2013-10-22 05:47:24'),
(9, 'Lighthouse.jpg', 'anhUpload/Lighthouse.jpg', '2013-10-22 05:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  PRIMARY KEY (`productId`),
  KEY `serviceId` (`serviceId`),
  KEY `customerId` (`customerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `description`, `image`, `serviceId`, `customerId`) VALUES
(1, 'HuynDai Thanh Cong', 'HuynDai Thanh Cong', 'anhUpload/Penguins.jpg', 1, 1),
(2, 'Khách sạn La Belle Vie', 'Khách sạn La Belle Vie', 'anhUpload/Desert.jpg', 3, 3),
(3, 'Công ty TNHH Âu Lạc', 'Công ty TNHH Âu Lạc', 'anhUpload/Tulips.jpg', 3, 1),
(6, 'Tổng công ty Thủy tinh và gốm xây dựng', 'Tổng công ty Thủy tinh và gốm xây dựng', 'anhUpload/Lighthouse.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `imageId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_imageId_idx` (`imageId`),
  KEY `pk_productId_idx` (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `productId`, `imageId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5),
(6, 3, 6),
(7, 4, 7),
(8, 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceId`, `serviceName`, `description`) VALUES
(1, 'Thiết kế đồ họa', 'Thiết kế đồ họa'),
(2, 'Thiết kế thương hiệu', 'Xây dựng hệ thống nhận diện thương hiệu'),
(3, 'Dịch vụ ảnh', 'Dịch vụ ảnh'),
(4, 'In ấn và xuất bản', 'In ấn và xuất bản'),
(5, 'Thiết kế và thi công triển lãm , nội ngoại thất,…', 'Thiết kế và thi công triển lãm , nội ngoại thất,…'),
(6, 'Xây dựng và thiết kế web', 'Xây dựng và thiết kế web'),
(7, 'Media : Quảng cáo truyền hình , DVD , Ecard , Hình hiệu …', 'Media : Quảng cáo truyền hình , DVD , Ecard , Hình hiệu …');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`serviceId`) REFERENCES `service` (`serviceId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`);
