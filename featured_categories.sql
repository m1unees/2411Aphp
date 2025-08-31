-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 31, 2025 at 03:32 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnitureshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `featured_categories`
--

DROP TABLE IF EXISTS `featured_categories`;
CREATE TABLE IF NOT EXISTS `featured_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `featured_categories`
--

INSERT INTO `featured_categories` (`id`, `title`, `subtitle`, `image`, `link`) VALUES
(1, 'Latest foam Sofa', 'Premium Quality', 'img/feature/feature_1.png', '#'),
(2, 'Latest foam Sofa', 'Premium Quality', 'img/feature/feature_2.png', '#'),
(3, 'Latest foam Sofa', 'Premium Quality', 'img/feature/feature_3.png', '#'),
(4, 'Latest foam Sofa', 'Premium Quality', 'img/feature/feature_4.png', '#');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
