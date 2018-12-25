-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 12:24 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `18php06`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_product` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price_product` float NOT NULL,
  `img_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_product` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_product`, `description_product`, `price_product`, `img_product`, `status`, `created_product`) VALUES
(111, 'vvv', 'img', 55555, '5c21ed76eb4b7_3.png', 2, '2018-12-25 15:42:30'),
(113, 'xxx_edit', 'img1_edit', 11111100000000, '5c21fa1cd13d5_i4.png', 1, '2018-12-25 16:10:36'),
(114, 'lll_edit2', 'yyyyy_edit2', 88888, '5c21fa260b993_i7.png', 1, '2018-12-25 16:35:14'),
(115, 'xxx', 'img7777', 55555, '', 2, '2018-12-25 18:11:15'),
(116, 'Ä‘áº¥', 'sÄ‘', 55555, '5c2211593f930_', 1, '2018-12-25 18:15:37'),
(117, 'vvv', 'sÄ‘', 11111100000000, '5c2211678280a_', 1, '2018-12-25 18:15:51'),
(118, 'vvv', 'sÄ‘', 11111100000000, '5c221176acb8d_', 1, '2018-12-25 18:16:06'),
(119, 'vvv', 'sÄ‘', 11111100000000, '5c22119cebb75_', 1, '2018-12-25 18:16:44'),
(120, 'fix lai', 'img7777', 22, '5c2211bccf3fb_12.png', 1, '2018-12-25 18:17:16'),
(121, 'test', 'Ä‘Ã¢sd', 0, '5c2211e923991_i3.png', 1, '2018-12-25 18:18:01'),
(122, 'vvv', 'fff', 66666, '5c221200df15d_i4.png', 1, '2018-12-25 18:18:24'),
(123, 'vvv', 'fff', 66666, '5c221247a587c_i4.png', 1, '2018-12-25 18:19:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
