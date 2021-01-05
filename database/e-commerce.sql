-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 04:08 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(35, 'Kids', 1),
(34, 'Women', 3),
(33, 'Men', 4),
(36, 'COVID-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(1, 'Samin', 'Yasar', 'saminyasar', 'yasarsamin57@gmail.com', 'c2FtaW55YXNhcg=='),
(2, 'Nabil', 'Mahmud', 'nabilmahmud', 'mahmudnabil710@gmail.com', 'bmFiaWxtYWhtdWQ=');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `id` int(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `subtotal` int(255) NOT NULL,
  `vat` int(255) NOT NULL,
  `grand_total` int(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`id`, `product_id`, `name`, `price`, `quantity`, `author`, `firstname`, `lastname`, `country`, `street_address`, `city`, `postcode`, `phone`, `email`, `payment_method`, `subtotal`, `vat`, `grand_total`, `date`) VALUES
(19, '28', 'smart watch', '45', '1', 'nabilmahmud', 'Samin', 'Yasar', 'Bangladesh', 'Demra,Dhaka', 'Dhaka', '1362', '01818082605', 'mahmudnabil710@gmail.com', 'cash', 45, 10, 55, '05 Jan 2021');

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
  `date` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `name`, `price`, `description`, `category`, `date`, `author`, `img`) VALUES
(17, 'red printed t-shirt', 20, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet, eius. Ab blanditiis maxime incidunt commodi. Magni praesentium, autem in blanditiis, a maiores omnis delectus, est libero expedita rem nam. Nulla.', '33', '02 Jan 2021', 'Admin', 'red printed t-shirt.jpg'),
(21, 'grey jogger', 35, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet, eius. Ab blanditiis maxime incidunt commodi. Magni praesentium, autem in blanditiis, a maiores omnis delectus, est libero expedita rem nam. Nulla.', '33', '02 Jan 2021', 'Admin', 'grey jogger.jpg'),
(22, 'black sneaker', 45, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet, eius. Ab blanditiis maxime incidunt commodi. Magni praesentium, autem in blanditiis, a maiores omnis delectus, est libero expedita rem nam. Nulla.', '33', '02 Jan 2021', 'Moderator', 'black sneaker.jpg'),
(25, 'adidas white sneaker', 50, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet, eius. Ab blanditiis maxime incidunt commodi. Magni praesentium, autem in blanditiis, a maiores omnis delectus, est libero expedita rem nam. Nulla.', '33', '02 Jan 2021', 'Admin', 'adidas white sneaker.jpg'),
(26, 'ladies white hoody', 25, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet, eius. Ab blanditiis maxime incidunt commodi. Magni praesentium, autem in blanditiis, a maiores omnis delectus, est libero expedita rem nam. Nulla.', '34', '02 Jan 2021', 'Admin', 'ladies white hoody.jpg'),
(27, 'ladies bag', 30, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet, eius. Ab blanditiis maxime incidunt commodi. Magni praesentium, autem in blanditiis, a maiores omnis delectus, est libero expedita rem nam. Nulla.', '34', '02 Jan 2021', 'Admin', 'ladies bag.jpg'),
(28, 'smart watch', 45, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet, eius. Ab blanditiis maxime incidunt commodi. Magni praesentium, autem in blanditiis, a maiores omnis delectus, est libero expedita rem nam. Nulla.', '35', '02 Jan 2021', 'Admin', 'smart watch.png'),
(29, 'ladies black t-shirt', 45, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet, eius. Ab blanditiis maxime incidunt commodi. Magni praesentium, autem in blanditiis, a maiores omnis delectus, est libero expedita rem nam. Nulla.', '34', '02 Jan 2021', 'Admin', 'ladies black t-shirt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `role`) VALUES
(40, 'Nabil', 'Mahmud', 'nabilmahmud', 'mahmudnabil710@gmail.com', 'MTIzNDU=', 0),
(32, 'Samin', 'Yasar', 'saminyasar', 'yasarsamin57@gmail.com', 'MTIzNDU=', 1),
(42, 'Nizam', 'Uddin', 'nizamuddin', 'uddin_nizam71@gmail.com', 'MTIzNDU=', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
