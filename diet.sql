-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2022 at 03:50 PM
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
  `plan_id` varchar(10) NOT NULL,
  `plan_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`plan_name`, `username`, `plan_id`, `plan_description`) VALUES
('Keto Plan', 'adarsh', 'plan1', 'A ketogenic diet should consist of about 60–80% fat, 10–30% protein, and no more than 5–10% — or 20–50 grams — of carbs per day. Focus on high fat, low carb ...'),
('Plant based diet', 'adarsh', 'plan2', 'Vegetarianism and veganism are the most popular versions of plant-based diets, which restrict animal products for health, ');

-- --------------------------------------------------------

--
-- Table structure for table `diet-item`
--

CREATE TABLE `diet-item` (
  `plan_id` varchar(10) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `item_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `plan_id` varchar(10) NOT NULL,
  `rating` int(5) NOT NULL,
  `feedback` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`plan_id`, `rating`, `feedback`) VALUES
('plan1', 5, 'Very nice diet!'),
('plan2', 3, 'ok ok diet');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`) VALUES
('adarsh', 'adarsh@gmail.com', '97d9de758e20f8e5a74c21ba389fb562');

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
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

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
