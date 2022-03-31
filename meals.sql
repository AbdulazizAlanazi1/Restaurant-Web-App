-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 09:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meals`
--

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` decimal(10,4) UNSIGNED NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `title`, `price`, `image`, `description`) VALUES
(1, 'Best Sandwich', '23.9000', 'meal1.png', 'Some description'),
(2, 'Burger', '25.9000', 'meal2.png', 'Some description'),
(3, 'Burger Meal', '27.5000', 'meal3.png', 'Some description'),
(4, 'Best Deal Meal', '32.9000', 'meal4.png', 'Some description'),
(5, 'Chicken Burger', '19.4000', 'meal5.png', 'Some description'),
(6, 'Pizza', '28.5000', 'meal6.png', 'a 12 slices pizza with different options and flavors');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `reviewer_name` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `date` datetime NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(500) NOT NULL,
  `review` varchar(500) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reviewer_name`, `city`, `date`, `rating`, `image`, `review`, `meal_id`) VALUES
(1, 'Mohammed', 'Jeddah', '2021-12-13 21:17:13', 1, '', 'Test Review', 1),
(2, 'Khalid', 'Dammam', '2021-12-13 21:18:45', 5, '', 'Test Review', 6),
(3, 'Khalid', 'Dammam', '2021-12-13 21:18:45', 5, '', 'Test Review', 6),
(4, 'Ahmed', 'Riyadh', '2021-12-13 21:17:13', 4, '', 'Test Review', 1),
(7, 'Ali', 'Tabuk', '2021-12-13 21:20:37', 2, '', 'Test Review', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
