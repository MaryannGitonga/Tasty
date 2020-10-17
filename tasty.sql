-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 01:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasty`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `food_id` int(20) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_price` int(100) NOT NULL,
  `food_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`food_id`, `food_name`, `food_price`, `food_image`) VALUES
(4, 'Thai Noodles', 1000, 'meal.jpg'),
(5, 'Kiwi Smoothie', 450, 'drinks.jpg'),
(6, 'French Fries', 200, 'magnus-jonasson-z5WeWhU6Aqc-unsplash.jpg'),
(10, 'Food1', 800, 'atharva-tulsi-Yh9Ut4d3K0A-unsplash.jpg'),
(11, 'Food2', 400, 'claudia-crespo-ewOrvEa87j4-unsplash.jpg'),
(12, 'Food3', 500, 'brett-jordan-Awjg51s6t-A-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `date_placed` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `customer_id`, `date_placed`, `total_amount`) VALUES
(15, 50, '2020-07-29 16:56:01', 2900),
(17, 51, '2020-07-29 16:59:30', 1300),
(23, 56, '2020-07-31 07:56:13', 2400),
(25, 57, '2020-07-31 07:56:58', 1800);

-- --------------------------------------------------------

--
-- Table structure for table `order_foods`
--

CREATE TABLE `order_foods` (
  `order_foodID` int(100) NOT NULL,
  `foodID` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `order_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_foods`
--

INSERT INTO `order_foods` (`order_foodID`, `foodID`, `quantity`, `sub_total`, `order_id`) VALUES
(68, 4, 2, 2000, 15),
(69, 5, 2, 900, 15),
(70, 5, 2, 900, 17),
(71, 6, 2, 400, 17),
(76, 10, 2, 1600, 23),
(77, 11, 2, 800, 23),
(78, 11, 2, 800, 25),
(79, 12, 2, 1000, 25);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `user_password`, `user_email`, `user_type`) VALUES
(44, 'Jane', 'Doe', 'jane_doe', '123456', 'jane.doe@gmail.com', 1),
(50, 'John', 'Leo', 'john_leo', 'john_leo', 'leo.john@gmail.com', 2),
(51, 'Mary', 'Lee', 'mary_lee', 'mary_lee', 'mary_lee@gmail.com', 2),
(56, 'Client', 'One', 'client1', '12345', 'clien1@gmail.com', 2),
(57, 'Client', 'Two', 'client2', '12345', 'client2@gmail.com', 2),
(58, 'Admin', 'One', 'admin1', '12345', 'admin1@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `ID` int(10) NOT NULL,
  `user-type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`ID`, `user-type`) VALUES
(1, 'admin'),
(2, 'normal-user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_foods`
--
ALTER TABLE `order_foods`
  ADD PRIMARY KEY (`order_foodID`),
  ADD KEY `foodID` (`foodID`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `food_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_foods`
--
ALTER TABLE `order_foods`
  MODIFY `order_foodID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_foods`
--
ALTER TABLE `order_foods`
  ADD CONSTRAINT `order_foods_ibfk_1` FOREIGN KEY (`foodID`) REFERENCES `foods` (`food_id`),
  ADD CONSTRAINT `order_foods_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_no`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
