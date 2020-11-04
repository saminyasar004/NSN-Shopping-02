-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 09:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `product` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `product`) VALUES
(30, 'Men', 0),
(31, 'Women', 0),
(32, 'Kids', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `name`, `price`, `description`, `category`, `date`, `author`, `img`) VALUES
(5, 'Red printed t-shirt', 50, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. ', '30', '2020-11-03 03:31:20', '1', '5fa0cf089b4d1.jpg'),
(6, 'Blue sneakers', 80, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. ', '30', '2020-11-03 03:32:17', '1', '5fa0cf410f527.jpg'),
(7, 'Grey jogger', 120, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. ', '30', '2020-11-03 03:33:16', '1', '5fa0cf7c2bb49.jpg'),
(8, 'Blue t-shirt', 50, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. ', '30', '2020-11-03 03:33:58', '1', '5fa0cfa64981f.jpg'),
(9, 'White sneaker', 70, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. ', '30', '2020-11-03 03:34:23', '1', '5fa0cfbfe0102.jpg'),
(10, 'black t-shirt', 50, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. ', '30', '2020-11-03 04:52:25', '1', '5fa0e209dbf1b.jpg'),
(12, '3 color  socks', 200, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis ipsam autem, harum tempore neque dignissimos dolor illum nobis aliquid omnis optio voluptates id qui eaque! Suscipit numquam placeat in cum. ', '30', '2020-11-03 05:08:04', '0', '5fa0e5b4d913f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'Samin', 'Yasar', 'samin', 'samin', 1),
(25, 'Nabil', 'Mahmud', 'nabil', 'nabil', 0),
(26, 'Ayesha', 'Akter', 'ayesha', 'ayesha', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
