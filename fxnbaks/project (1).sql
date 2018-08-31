-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 03:23 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_prod`
--

CREATE TABLE `category_prod` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `status` smallint(1) NOT NULL DEFAULT '1',
  `product_type` int(2) DEFAULT NULL,
  `dels` smallint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_prod`
--

INSERT INTO `category_prod` (`id`, `cat_name`, `img`, `sort`, `status`, `product_type`, `dels`, `created_on`, `updated_on`) VALUES
(1, 'Mobile', '14752_filenamemissing.png', 2, 0, 1, 0, '2018-06-22 10:50:59', '2018-06-29 06:28:07'),
(3, 'Mob''s', '19073_DQC_Report.png', 1, 0, 2, 0, '2018-06-22 10:54:12', '2018-06-22 14:31:19'),
(4, 'Fridge', '19184_pt.png', 1, 1, 3, 0, '2018-06-22 10:54:22', NULL),
(5, 'TV', '1373_TinyMCE___Full_Featured_Example.png', 1, 1, 1, 0, '2018-06-22 10:54:35', NULL),
(7, 'Testing', 'img', 1, 1, NULL, 0, '2018-06-22 13:35:14', NULL),
(9, 'Mobiles', 'test.jpg', 1, 1, NULL, 0, '2018-06-22 19:09:12', NULL),
(10, 'Test', 'test', 1, 1, NULL, 0, '2018-07-03 12:24:41', NULL),
(11, 'Ssss', 'D:\\xampp\\tmp\\phpA834.tmp', 1, 1, NULL, 0, '2018-07-04 21:20:58', NULL),
(12, 'PhonePe', 'MOJO 2 0  GetJobCore.png', 3, 1, NULL, 1, '2018-08-27 15:34:23', NULL),
(17, 'PhonePetest', '', 1, 1, NULL, 1, '2018-08-27 15:41:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_prod_config`
--

CREATE TABLE `category_prod_config` (
  `id` int(11) NOT NULL,
  `fk_category_prod_id` int(11) NOT NULL,
  `label_name` varchar(25) NOT NULL,
  `input_type` smallint(1) DEFAULT NULL,
  `status` smallint(1) NOT NULL,
  `dels` smallint(6) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_prod_values`
--

CREATE TABLE `category_prod_values` (
  `id` int(11) NOT NULL,
  `fk_category_prod_id` int(11) NOT NULL,
  `fk_category_prod_config_id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `label_values` varchar(25) DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `model` varchar(20) DEFAULT NULL,
  `price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `mrp_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `Offer` varchar(20) DEFAULT NULL,
  `ratings` varchar(5) DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `jsondata` text,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_prod`
--
ALTER TABLE `category_prod`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `category_prod_config`
--
ALTER TABLE `category_prod_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_prod_values`
--
ALTER TABLE `category_prod_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_prod`
--
ALTER TABLE `category_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `category_prod_config`
--
ALTER TABLE `category_prod_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_prod_values`
--
ALTER TABLE `category_prod_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
