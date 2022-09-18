-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2022 at 05:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diet-planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `plan_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `plan_id` varchar(100) NOT NULL,
  `plan_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`plan_name`, `username`, `plan_id`, `plan_description`) VALUES
('new plan', 'newuser', 'BQoLwzyLxm', 'new desc'),
('Keto Plan', 'adarsh', 'plan1', 'A ketogenic diet should consist of about 60–80% fat, 10–30% protein, and no more than 5–10% — or 20–50 grams — of carbs per day. Focus on high fat, low carb ...'),
('Plant based diet', 'ambika', 'plan2', 'Vegetarianism and veganism are the most popular versions of plan4'),
('Plant based diet 2', 'ambika', 'xzwOQGICJy', 'jhnjkn');

-- --------------------------------------------------------

--
-- Table structure for table `diet-item`
--

CREATE TABLE `diet-item` (
  `item_id` int(20) NOT NULL,
  `plan_id` varchar(10) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `item_quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diet-item`
--

INSERT INTO `diet-item` (`item_id`, `plan_id`, `item_name`, `item_image`, `item_quantity`) VALUES
(1, 'plan1', 'Red Meat', 'red-meat.jpg', '800gm'),
(69, 'plan2', 'Veggies', 'veggies.jpg', '500g'),
(7666000, 'BQoLwzyLxm', 'item 1', '7666000.jpg', '69'),
(7718730, 'plan2', 'item something', '7718730.jpg', '69');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `plan_id` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `rating` int(5) NOT NULL,
  `feedback` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `plan_id`, `username`, `rating`, `feedback`) VALUES
(1, 'plan1', 'ambika', 3, 'Very nice diet!'),
(2, 'plan2', 'adarsh', 3, 'ok ok diet'),
(3, 'plan2', 'newuser', 5, 'git gud m8');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `fullname`, `email`, `password`) VALUES
('adarsh', 'Adarsh Hegde', 'adarsh@gmail.com', '97d9de758e20f8e5a74c21ba389fb562'),
('ambika', 'ambika', 'ambika@gmail.com', '8b75b9bcacb8c318be58b24092ef50a5'),
('newuser', 'new user', 'newuser@gmail.com', '0354d89c28ec399c00d3cb2d094cf093'),
('ok', 'ok', 'ok@ok.com', '444bcb3a3fcf8389296c49467f27e1d6'),
('test', 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `diet-item`
--
ALTER TABLE `diet-item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diet-item`
--
ALTER TABLE `diet-item`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8259297;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diet-item`
--
ALTER TABLE `diet-item`
  ADD CONSTRAINT `diet-item_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `diet` (`plan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
