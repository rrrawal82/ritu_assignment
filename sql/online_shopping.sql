-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 17, 2021 at 07:06 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `Name`, `description`, `image`, `quantity`, `brand`, `price`, `created_at`) VALUES
(1, 'Rice', 'Basmati Rice', 'images/product1.jpg', '100', 'adani', '200', '2021-08-15 00:00:00'),
(2, 'Juice', 'Real Juice ', 'images/product2.jpg', '20', 'Real', '20', '2021-08-15 00:00:00'),
(3, 'Pen', 'Pen', 'images/product3.jpg', '100', 'camlin', '30', '2021-08-15 00:00:00'),
(7, ' forever Arctic Sea', 'Forever Living Products ', 'images/71OoS0jx3mL._SL1500_.jpg', '10', 'forever', '1189', '2021-08-15 22:48:31'),
(6, 'aloe juice', 'aloe juice', 'images/aloe_juice.jpg', '5', 'patanjali', '900', '2021-08-15 22:31:33'),
(8, 'boAt Airdopes 121v2 TWS Earbuds', 'boAt Airdopes 121v2 TWS Earbuds with Bluetooth V5.0, Immersive Audio, Up to 14H Total Playback, Instant Voice Assistant, Easy Access Controls with Mic and Dual Tone', 'images/71ByNT34bfL._SL1500_.jpg', '100', 'boat', '200', '2021-08-17 11:34:22'),
(10, 'Fire-Boltt Blast 1400 Over ', 'Ear Bluetooth Wireless Headphones with 25H Playtime, Thumping Bass, Lightweight Foldable Compact Design with Google/Siri', 'images/710lk+uaW0L._SL1500_.jpg', '10', ' Fire-Boltt', '3000', '2021-08-17 11:36:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
