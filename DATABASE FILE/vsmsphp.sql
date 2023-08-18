-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 09:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsmsphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `cf_name` varchar(100) NOT NULL,
  `cl_name` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `w_start` date NOT NULL,
  `w_end` date NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `invoice_id` varchar(100) DEFAULT NULL,
  `c_address` varchar(400) DEFAULT NULL,
  `c_pass` varchar(30) NOT NULL,
  `extra` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `v_id`, `cf_name`, `cl_name`, `c_email`, `c_mobile`, `nid`, `w_start`, `w_end`, `payment_type`, `invoice_id`, `c_address`, `c_pass`, `extra`) VALUES
(3, 115, 'Liam', 'Johnson', 'liamjh@gmail.com', '7526666660', '125896547854123658', '2021-04-20', '2023-04-01', 'Cash', '#IE9S115S', '1487  Frosty Lane', 'password', 'This is a demo text for testing'),
(4, 118, 'Linda', 'Reeves', 'reeveslinda@gmail.com', '7532220002', '333896549873216660', '2021-04-18', '2022-04-01', 'Cash', '#IE9S118S', '2231 Fairview Street', 'password', 'This is a demo text');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(100) NOT NULL,
  `manufacturer_logo` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_logo`) VALUES
(30, 'BMW', NULL),
(32, 'LambourGini', NULL),
(36, 'Audi', NULL),
(37, 'Hyundai', NULL),
(38, 'Mercedes-Benz', NULL),
(39, 'Nissan', NULL),
(40, 'Toyota', NULL),
(41, 'MG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `manufacturer_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`, `manufacturer_name`) VALUES
(27, 'GSXR1000', 'BMW'),
(28, 'Urus', 'LambourGini'),
(29, 'Z4 Roadster', 'BMW'),
(30, 'A3', 'Audi'),
(31, 'Creta', 'Hyundai'),
(32, 'X1', 'BMW'),
(33, 'A4', 'Audi'),
(34, 'E-Class', 'Mercedes-Benz'),
(35, 'Rogue', 'Nissan'),
(36, 'Sienna', 'Toyota'),
(37, 'Hector', 'MG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `su` int(11) DEFAULT '0',
  `u_email` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `u_bday` date NOT NULL,
  `u_position` varchar(100) NOT NULL,
  `u_type` varchar(100) NOT NULL,
  `u_pass` varchar(100) NOT NULL,
  `u_mobile` varchar(100) NOT NULL,
  `u_gender` varchar(30) NOT NULL,
  `u_address` varchar(100) NOT NULL,
  `s_question` varchar(100) DEFAULT NULL,
  `s_ans` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `su`, `u_email`, `f_name`, `l_name`, `u_bday`, `u_position`, `u_type`, `u_pass`, `u_mobile`, `u_gender`, `u_address`, `s_question`, `s_ans`) VALUES
(1, 1, 'johnwalker@gmail.com', 'John', 'Walker', '2016-04-14', 'Super Admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', '3133388055', 'Male', '129,North Road, BD', 'What is your name???', 'sssjjjj'),
(9, 1, 'employee@employee.com', 'Mr', 'Employee', '2015-11-30', 'General Employee', 'Employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c', '00202', 'Male', 'kkasd', NULL, NULL),
(10, 1, 'admin@admin.com', 'Admin', 'Liam', '2015-11-30', 'Demo Admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', '3785554520', 'Male', '421 Ralph Street', 'Who do you love the most?', 'none'),
(11, 0, 'stephen@gmail.com', 'Stephen', 'Moore', '1990-02-02', 'Employee', 'Employee', '5f4dcc3b5aa765d61d8327deb882cf99', '7531258960', 'Male', '1212 Ralph Street', 'Who do you prise?', 'Myself'),
(12, 0, 'kevinrogers@gmail.com', 'Kevin', 'Rogers', '1989-04-01', 'Finance', 'Employee', '5f4dcc3b5aa765d61d8327deb882cf99', '2585214560', 'Male', '3891 Linda Street', 'What is your 1st Phone No?', '7536969696');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(11) NOT NULL,
  `manufacturer_name` varchar(100) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `b_price` double NOT NULL,
  `s_price` double DEFAULT NULL,
  `mileage` double NOT NULL,
  `add_date` date NOT NULL,
  `sold_date` date DEFAULT NULL,
  `status` varchar(40) NOT NULL,
  `registration_year` int(11) NOT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `gear` varchar(100) NOT NULL,
  `doors` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `tank` float NOT NULL,
  `image` varchar(400) DEFAULT NULL,
  `e_no` varchar(40) NOT NULL,
  `c_no` varchar(40) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `v_color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `manufacturer_name`, `model_name`, `category`, `b_price`, `s_price`, `mileage`, `add_date`, `sold_date`, `status`, `registration_year`, `insurance_id`, `gear`, `doors`, `seats`, `tank`, `image`, `e_no`, `c_no`, `u_id`, `v_color`) VALUES
(112, 'Audi', 'A3', 'Subcompact', 29800000, NULL, 20, '2021-04-18', NULL, 'Available', 2020, 1567854540, 'Manual', 4, 4, 50, 'A205468_blog.jpg', '31200000000045682', '', NULL, 'Silver'),
(113, 'Hyundai', 'Creta', 'Subcompact', 6500000, NULL, 17, '2021-04-19', NULL, 'Available', 2021, 1235879650, 'Auto', 4, 5, 60, '', '17854565555555550', '', NULL, 'Black'),
(115, 'Nissan', 'Rogue', 'Compact', 18600000, 19950000, 26, '2021-04-19', '2021-04-20', 'Sold', 2021, 1763333330, 'Auto', 4, 4, 56, '', '24000066668450120', '', 10, 'Maroon'),
(116, 'Audi', 'A4', 'Compact', 39900000, NULL, 16, '2021-04-20', NULL, 'Available', 2019, 2147483647, 'Auto', 4, 4, 70, '', '75395178965412585', '', NULL, 'Black'),
(117, 'LambourGini', 'Urus', 'Luxury SUV', 61000000, NULL, 8, '2021-04-19', NULL, 'Available', 2021, 2147483647, 'Manual', 4, 4, 75, '', '85200000001124596', '', NULL, 'Pearl Black'),
(118, 'MG', 'Hector', 'SUV', 4315000, 5950000, 14, '2021-04-13', '2021-04-18', 'Sold', 2020, 2147483647, 'Auto', 4, 4, 60, '', '32145222222145210', '', 1, 'Navy Blue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `v_id_2` (`v_id`),
  ADD UNIQUE KEY `c_id` (`c_id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `c_id_2` (`c_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`),
  ADD UNIQUE KEY `manufacturer_name` (`manufacturer_name`),
  ADD KEY `manufacturer_name_2` (`manufacturer_name`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`),
  ADD UNIQUE KEY `model_name` (`model_name`),
  ADD KEY `manufacturer_name` (`manufacturer_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`u_email`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `manufacturer_name` (`manufacturer_name`),
  ADD KEY `model_name` (`model_name`),
  ADD KEY `c_no` (`c_no`),
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vehicle` (`v_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`manufacturer_name`) REFERENCES `manufacturer` (`manufacturer_name`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`manufacturer_name`) REFERENCES `model` (`manufacturer_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`model_name`) REFERENCES `model` (`model_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicle_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
