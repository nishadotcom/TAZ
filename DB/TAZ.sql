-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2017 at 10:19 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TAZALO`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(500) NOT NULL,
  `auth_key` varchar(32) DEFAULT '',
  `registered_mode` enum('Web','FB','Google') NOT NULL DEFAULT 'Web',
  `profile_image` tinytext,
  `profile_status` enum('OK','KO') DEFAULT 'KO',
  `product_count` tinyint(4) NOT NULL DEFAULT '0',
  `user_type` enum('Buyer','Seller') NOT NULL DEFAULT 'Buyer',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1=Active, 2=Suspended, 3=Deleted',
  `registration_ip` varchar(15) NOT NULL DEFAULT '0.0.0.0',
  `created_on` datetime NOT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(12) NOT NULL,
  `userid` int(12) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (userid) REFERENCES user(id)',
  `about_me` mediumtext NOT NULL,
  `address1` mediumtext NOT NULL,
  `address2` mediumtext,
  `city` varchar(400) NOT NULL,
  `state` varchar(400) NOT NULL,
  `country` varchar(250) NOT NULL,
  `pin_code` varchar(12) NOT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD KEY `fk_user_detail_userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `fk_user_detail_userid` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
