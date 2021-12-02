-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 09:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(1, 'Diego', 'Perdomo', 'diego@123.com', 'dp-12345', '$2y$10$g9PbhxaDTHiJfBEZCj64i.MQG2L0pR3Ki.zdQF6L5x0j5M3IUFKaW');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `content`) VALUES
(2, 1, 'Empanadas', 2, 1, 'Lorem ipsum dolor sit amet.\r\n<br>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et aliquam lectus, sed fermentum ligula. Fusce efficitur ultrices leo vitae interdum. Proin elementum ex odio. Cras malesuada, odio et efficitur luctus, augue ante posuere tellus, vitae suscipit ipsum eros id nisl. Donec et sodales elit, sed finibus dolor.\r\n<br>\r\nPrice: $50.00'),
(3, 1, 'Paella', 3, 1, 'Lorem ipsum dolor sit amet. \r\n<br> \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et aliquam lectus, sed fermentum ligula. Fusce efficitur ultrices leo vitae interdum. Proin elementum ex odio. Cras malesuada, odio et efficitur luctus, augue ante posuere tellus, vitae suscipit ipsum eros id nisl. Donec et sodales elit, sed finibus dolor. \r\n<br> \r\nPrice: $50.00 '),
(4, 1, 'Bacon & Egg Rolls', 4, 1, 'Lorem ipsum dolor sit amet. \r\n<br> \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et aliquam lectus, sed fermentum ligula. Fusce efficitur ultrices leo vitae interdum. Proin elementum ex odio. Cras malesuada, odio et efficitur luctus, augue ante posuere tellus, vitae suscipit ipsum eros id nisl. Donec et sodales elit, sed finibus dolor.\r\n<br>\r\n Price: $50.00 '),
(5, 2, 'Small Tables', 1, 1, 'Lorem ipsum dolor sit amet. \r\n<br> \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et aliquam lectus, sed fermentum ligula. Fusce efficitur ultrices leo vitae interdum. Proin elementum ex odio. Cras malesuada, odio et efficitur luctus, augue ante posuere tellus, vitae suscipit ipsum eros id nisl. Donec et sodales elit, sed finibus dolor. \r\n<br> \r\nPrice: $50.00 '),
(6, 2, 'Tents', 2, 1, NULL),
(7, 2, 'Decorations', 3, 1, '123456789'),
(8, 3, 'Custom', 2, 1, 'Lorem ipsum dolor sit amet. \r\n<br> \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et aliquam lectus, sed fermentum ligula. Fusce efficitur ultrices leo vitae interdum. Proin elementum ex odio. Cras malesuada, odio et efficitur luctus, augue ante posuere tellus, vitae suscipit ipsum eros id nisl. Donec et sodales elit, sed finibus dolor. \r\n<br> \r\nPrice: $50.00 '),
(9, 3, 'Vanilla', 3, 1, 'Lorem ipsum dolor sit amet. \r\n<br> \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et aliquam lectus, sed fermentum ligula. Fusce efficitur ultrices leo vitae interdum. Proin elementum ex odio. Cras malesuada, odio et efficitur luctus, augue ante posuere tellus, vitae suscipit ipsum eros id nisl. Donec et sodales elit, sed finibus dolor. \r\n<br> \r\nPrice: $50.00 '),
(10, 3, 'Chocolate', 4, 1, 'Lorem ipsum dolor sit amet. \r\n<br> \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et aliquam lectus, sed fermentum ligula. Fusce efficitur ultrices leo vitae interdum. Proin elementum ex odio. Cras malesuada, odio et efficitur luctus, augue ante posuere tellus, vitae suscipit ipsum eros id nisl. Donec et sodales elit, sed finibus dolor. \r\n<br> \r\nPrice: $50.00 '),
(20, 1, 'Chiken Butter', 10, 1, 'Lorem ipsum dolor sit amet. \r\n<br> \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et aliquam lectus, sed fermentum ligula. Fusce efficitur ultrices leo vitae interdum. Proin elementum ex odio. Cras malesuada, odio et efficitur luctus, augue ante posuere tellus, vitae suscipit ipsum eros id nisl. Donec et sodales elit, sed finibus dolor. \r\n<br> \r\nPrice: $50.00 '),
(21, 3, 'Testing', 1, 1, '<h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h5>\r\nUt et aliquam lectus, sed fermentum ligula. Fusce efficitur ultrices leo vitae interdum. Proin elementum ex odio. Cras malesuada, odio et efficitur luctus, augue ante posuere tellus, vitae suscipit ipsum eros id nisl. Donec et sodales elit, sed finibus dolor.\r\n<br>\r\n<strong>Price: 50.00</strong>');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'Catering', 4, 0),
(2, 'Glamping', 2, 1),
(3, 'Cakes', 1, 0),
(4, 'Events', 5, 1),
(6, 'Gift Boxes', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subject_id` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
