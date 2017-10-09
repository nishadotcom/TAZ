-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2017 at 11:06 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

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
-- Table structure for table `taz_administrator`
--

CREATE TABLE `taz_administrator` (
  `id` tinyint(2) NOT NULL,
  `username` char(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('Active','Suspended') NOT NULL DEFAULT 'Active',
  `created_on` datetime NOT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taz_administrator`
--

INSERT INTO `taz_administrator` (`id`, `username`, `password`, `status`, `created_on`, `modified_on`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Active', '2017-08-19 17:21:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taz_cart`
--

CREATE TABLE `taz_cart` (
  `id` int(12) NOT NULL,
  `cart_user_id` int(12) NOT NULL,
  `cart_product_category_name` varchar(100) NOT NULL,
  `cart_product_subcategory_NAME` varchar(100) DEFAULT NULL COMMENT 'Subcategory is not required now. It is future enhancement',
  `cart_product_id` int(12) NOT NULL COMMENT 'Refers to Product table id',
  `cart_product_code` tinytext NOT NULL,
  `cart_product_name` mediumtext NOT NULL,
  `cart_product_seo` mediumtext NOT NULL,
  `cart_product_owner_id` int(12) NOT NULL,
  `cart_product_price` decimal(7,2) NOT NULL DEFAULT '0.00',
  `cart_product_material` varchar(600) NOT NULL,
  `cart_product_color` varchar(30) NOT NULL,
  `cart_product_dimension_type` enum('cm','mm','m') NOT NULL DEFAULT 'cm',
  `cart_product_height` decimal(7,2) NOT NULL DEFAULT '0.00',
  `cart_product_length` decimal(7,2) NOT NULL DEFAULT '0.00',
  `cart_product_breadth` decimal(7,2) NOT NULL DEFAULT '0.00',
  `cart_product_weight` decimal(7,2) NOT NULL DEFAULT '0.00' COMMENT 'Weight is in KG',
  `cart_product_short_description` mediumtext,
  `cart_product_long_description` text,
  `cart_product_discount` varchar(6) DEFAULT NULL,
  `cart_product_quantity` tinyint(3) DEFAULT NULL,
  `product_available_status` enum('In-Stock','Out of Stock') NOT NULL DEFAULT 'In-Stock' COMMENT 'product is In-Stock or out of stock',
  `cart_added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taz_cart`
--

INSERT INTO `taz_cart` (`id`, `cart_user_id`, `cart_product_category_name`, `cart_product_subcategory_NAME`, `cart_product_id`, `cart_product_code`, `cart_product_name`, `cart_product_seo`, `cart_product_owner_id`, `cart_product_price`, `cart_product_material`, `cart_product_color`, `cart_product_dimension_type`, `cart_product_height`, `cart_product_length`, `cart_product_breadth`, `cart_product_weight`, `cart_product_short_description`, `cart_product_long_description`, `cart_product_discount`, `cart_product_quantity`, `product_available_status`, `cart_added_on`) VALUES
(1, 1, 'TCATE', NULL, 1, 'TPCODE', 'TPNAME', 'TPSEO', 1, '123.00', 'TPMET', 'TPC', 'cm', '23.12', '45.34', '54.32', '12.45', NULL, NULL, NULL, NULL, 'In-Stock', '2017-09-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `taz_category`
--

CREATE TABLE `taz_category` (
  `id` tinyint(4) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `category_seo` varchar(300) NOT NULL,
  `category_description` mediumtext,
  `category_image` varchar(500) DEFAULT NULL,
  `category_status` enum('Active','Suspended') NOT NULL DEFAULT 'Active',
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taz_category`
--

INSERT INTO `taz_category` (`id`, `category_name`, `category_seo`, `category_description`, `category_image`, `category_status`, `created_on`, `updated_on`) VALUES
(1, 'PSA', 'psa', NULL, NULL, 'Active', '2017-08-18 19:24:20', NULL),
(2, 'SLA', 'sla', 'Category SLA', '', 'Active', '2017-08-19 14:50:37', '2017-08-19 14:53:07'),
(3, 'OTL', 'otl', 'OTL', '', 'Active', '2017-08-28 06:30:43', NULL),
(4, 'FRC', 'frc', 'FRC', '', 'Active', '2017-08-28 06:31:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taz_cms`
--

CREATE TABLE `taz_cms` (
  `id` int(12) NOT NULL,
  `title` tinytext NOT NULL,
  `seo` tinytext NOT NULL,
  `description` mediumtext,
  `status` enum('Active','Suspended') NOT NULL DEFAULT 'Active',
  `created_on` datetime NOT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taz_country`
--

CREATE TABLE `taz_country` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1-Active , 2-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taz_country`
--

INSERT INTO `taz_country` (`id`, `name`, `status`) VALUES
(1, 'Afghanistan', 1),
(2, 'Albania', 1),
(3, 'Algeria', 1),
(4, 'American Samoa', 1),
(5, 'Andorra', 1),
(6, 'Angola', 1),
(7, 'Anguilla', 1),
(8, 'Antarctica', 1),
(9, 'Antigua And Barbuda', 1),
(10, 'Argentina', 1),
(11, 'Armenia', 1),
(12, 'Aruba', 1),
(13, 'Australia', 1),
(14, 'Austria', 1),
(15, 'Azerbaijan', 1),
(16, 'Bahamas The', 1),
(17, 'Bahrain', 1),
(18, 'Bangladesh', 1),
(19, 'Barbados', 1),
(20, 'Belarus', 1),
(21, 'Belgium', 1),
(22, 'Belize', 1),
(23, 'Benin', 1),
(24, 'Bermuda', 1),
(25, 'Bhutan', 1),
(26, 'Bolivia', 1),
(27, 'Bosnia and Herzegovina', 1),
(28, 'Botswana', 1),
(29, 'Bouvet Island', 1),
(30, 'Brazil', 1),
(31, 'British Indian Ocean Territory', 1),
(32, 'Brunei', 1),
(33, 'Bulgaria', 1),
(34, 'Burkina Faso', 1),
(35, 'Burundi', 1),
(36, 'Cambodia', 1),
(37, 'Cameroon', 1),
(38, 'Canada', 1),
(39, 'Cape Verde', 1),
(40, 'Cayman Islands', 1),
(41, 'Central African Republic', 1),
(42, 'Chad', 1),
(43, 'Chile', 1),
(44, 'China', 1),
(45, 'Christmas Island', 1),
(46, 'Cocos (Keeling) Islands', 1),
(47, 'Colombia', 1),
(48, 'Comoros', 1),
(49, 'Congo', 1),
(50, 'Congo The Democratic Republic Of The', 1),
(51, 'Cook Islands', 1),
(52, 'Costa Rica', 1),
(53, 'Cote D\'Ivoire (Ivory Coast)', 1),
(54, 'Croatia (Hrvatska)', 1),
(55, 'Cuba', 1),
(56, 'Cyprus', 1),
(57, 'Czech Republic', 1),
(58, 'Denmark', 1),
(59, 'Djibouti', 1),
(60, 'Dominica', 1),
(61, 'Dominican Republic', 1),
(62, 'East Timor', 1),
(63, 'Ecuador', 1),
(64, 'Egypt', 1),
(65, 'El Salvador', 1),
(66, 'Equatorial Guinea', 1),
(67, 'Eritrea', 1),
(68, 'Estonia', 1),
(69, 'Ethiopia', 1),
(70, 'External Territories of Australia', 1),
(71, 'Falkland Islands', 1),
(72, 'Faroe Islands', 1),
(73, 'Fiji Islands', 1),
(74, 'Finland', 1),
(75, 'France', 1),
(76, 'French Guiana', 1),
(77, 'French Polynesia', 1),
(78, 'French Southern Territories', 1),
(79, 'Gabon', 1),
(80, 'Gambia The', 1),
(81, 'Georgia', 1),
(82, 'Germany', 1),
(83, 'Ghana', 1),
(84, 'Gibraltar', 1),
(85, 'Greece', 1),
(86, 'Greenland', 1),
(87, 'Grenada', 1),
(88, 'Guadeloupe', 1),
(89, 'Guam', 1),
(90, 'Guatemala', 1),
(91, 'Guernsey and Alderney', 1),
(92, 'Guinea', 1),
(93, 'Guinea-Bissau', 1),
(94, 'Guyana', 1),
(95, 'Haiti', 1),
(96, 'Heard and McDonald Islands', 1),
(97, 'Honduras', 1),
(98, 'Hong Kong S.A.R.', 1),
(99, 'Hungary', 1),
(100, 'Iceland', 1),
(101, 'India', 1),
(102, 'Indonesia', 1),
(103, 'Iran', 1),
(104, 'Iraq', 1),
(105, 'Ireland', 1),
(106, 'Israel', 1),
(107, 'Italy', 1),
(108, 'Jamaica', 1),
(109, 'Japan', 1),
(110, 'Jersey', 1),
(111, 'Jordan', 1),
(112, 'Kazakhstan', 1),
(113, 'Kenya', 1),
(114, 'Kiribati', 1),
(115, 'Korea North', 1),
(116, 'Korea South', 1),
(117, 'Kuwait', 1),
(118, 'Kyrgyzstan', 1),
(119, 'Laos', 1),
(120, 'Latvia', 1),
(121, 'Lebanon', 1),
(122, 'Lesotho', 1),
(123, 'Liberia', 1),
(124, 'Libya', 1),
(125, 'Liechtenstein', 1),
(126, 'Lithuania', 1),
(127, 'Luxembourg', 1),
(128, 'Macau S.A.R.', 1),
(129, 'Macedonia', 1),
(130, 'Madagascar', 1),
(131, 'Malawi', 1),
(132, 'Malaysia', 1),
(133, 'Maldives', 1),
(134, 'Mali', 1),
(135, 'Malta', 1),
(136, 'Man (Isle of)', 1),
(137, 'Marshall Islands', 1),
(138, 'Martinique', 1),
(139, 'Mauritania', 1),
(140, 'Mauritius', 1),
(141, 'Mayotte', 1),
(142, 'Mexico', 1),
(143, 'Micronesia', 1),
(144, 'Moldova', 1),
(145, 'Monaco', 1),
(146, 'Mongolia', 1),
(147, 'Montserrat', 1),
(148, 'Morocco', 1),
(149, 'Mozambique', 1),
(150, 'Myanmar', 1),
(151, 'Namibia', 1),
(152, 'Nauru', 1),
(153, 'Nepal', 1),
(154, 'Netherlands Antilles', 1),
(155, 'Netherlands The', 1),
(156, 'New Caledonia', 1),
(157, 'New Zealand', 1),
(158, 'Nicaragua', 1),
(159, 'Niger', 1),
(160, 'Nigeria', 1),
(161, 'Niue', 1),
(162, 'Norfolk Island', 1),
(163, 'Northern Mariana Islands', 1),
(164, 'Norway', 1),
(165, 'Oman', 1),
(166, 'Pakistan', 1),
(167, 'Palau', 1),
(168, 'Palestinian Territory Occupied', 1),
(169, 'Panama', 1),
(170, 'Papua new Guinea', 1),
(171, 'Paraguay', 1),
(172, 'Peru', 1),
(173, 'Philippines', 1),
(174, 'Pitcairn Island', 1),
(175, 'Poland', 1),
(176, 'Portugal', 1),
(177, 'Puerto Rico', 1),
(178, 'Qatar', 1),
(179, 'Reunion', 1),
(180, 'Romania', 1),
(181, 'Russia', 1),
(182, 'Rwanda', 1),
(183, 'Saint Helena', 1),
(184, 'Saint Kitts And Nevis', 1),
(185, 'Saint Lucia', 1),
(186, 'Saint Pierre and Miquelon', 1),
(187, 'Saint Vincent And The Grenadines', 1),
(188, 'Samoa', 1),
(189, 'San Marino', 1),
(190, 'Sao Tome and Principe', 1),
(191, 'Saudi Arabia', 1),
(192, 'Senegal', 1),
(193, 'Serbia', 1),
(194, 'Seychelles', 1),
(195, 'Sierra Leone', 1),
(196, 'Singapore', 1),
(197, 'Slovakia', 1),
(198, 'Slovenia', 1),
(199, 'Smaller Territories of the UK', 1),
(200, 'Solomon Islands', 1),
(201, 'Somalia', 1),
(202, 'South Africa', 1),
(203, 'South Georgia', 1),
(204, 'South Sudan', 1),
(205, 'Spain', 1),
(206, 'Sri Lanka', 1),
(207, 'Sudan', 1),
(208, 'Suriname', 1),
(209, 'Svalbard And Jan Mayen Islands', 1),
(210, 'Swaziland', 1),
(211, 'Sweden', 1),
(212, 'Switzerland', 1),
(213, 'Syria', 1),
(214, 'Taiwan', 1),
(215, 'Tajikistan', 1),
(216, 'Tanzania', 1),
(217, 'Thailand', 1),
(218, 'Togo', 1),
(219, 'Tokelau', 1),
(220, 'Tonga', 1),
(221, 'Trinidad And Tobago', 1),
(222, 'Tunisia', 1),
(223, 'Turkey', 1),
(224, 'Turkmenistan', 1),
(225, 'Turks And Caicos Islands', 1),
(226, 'Tuvalu', 1),
(227, 'Uganda', 1),
(228, 'Ukraine', 1),
(229, 'United Arab Emirates', 1),
(230, 'United Kingdom', 1),
(231, 'United States', 1),
(232, 'United States Minor Outlying Islands', 1),
(233, 'Uruguay', 1),
(234, 'Uzbekistan', 1),
(235, 'Vanuatu', 1),
(236, 'Vatican City State (Holy See)', 1),
(237, 'Venezuela', 1),
(238, 'Vietnam', 1),
(239, 'Virgin Islands (British)', 1),
(240, 'Virgin Islands (US)', 1),
(241, 'Wallis And Futuna Islands', 1),
(242, 'Western Sahara', 1),
(243, 'Yemen', 1),
(244, 'Yugoslavia', 1),
(245, 'Zambia', 1),
(246, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taz_feature_seller`
--

CREATE TABLE `taz_feature_seller` (
  `id` int(12) NOT NULL,
  `seller_id` int(12) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `status` enum('Active','Suspended') NOT NULL DEFAULT 'Active',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taz_feature_seller`
--

INSERT INTO `taz_feature_seller` (`id`, `seller_id`, `date_from`, `date_to`, `status`, `created_on`) VALUES
(1, 1, '2017-10-01', '2017-10-02', 'Active', '2017-10-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `taz_log`
--

CREATE TABLE `taz_log` (
  `id` int(12) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `log_time` datetime NOT NULL,
  `detail` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taz_product`
--

CREATE TABLE `taz_product` (
  `id` int(12) NOT NULL,
  `product_category_id` tinyint(4) NOT NULL,
  `product_subcategory_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Subcategory is not required now. It is future enhancement',
  `product_code` tinytext NOT NULL,
  `product_name` mediumtext NOT NULL,
  `product_seo` mediumtext NOT NULL,
  `product_owner_id` int(12) NOT NULL,
  `product_price` decimal(7,2) NOT NULL DEFAULT '0.00',
  `product_sale_price` decimal(7,2) NOT NULL DEFAULT '0.00' COMMENT 'Caluclated automatically with the percentage of company selling percentage',
  `product_retail_price` decimal(7,2) NOT NULL DEFAULT '0.00',
  `product_material` varchar(600) NOT NULL,
  `product_color` varchar(30) NOT NULL,
  `product_dimension_type` enum('cm','mm','m') NOT NULL DEFAULT 'cm',
  `product_height` decimal(7,2) NOT NULL DEFAULT '0.00',
  `product_length` decimal(7,2) NOT NULL DEFAULT '0.00',
  `product_breadth` decimal(7,2) NOT NULL DEFAULT '0.00',
  `product_weight` decimal(7,2) NOT NULL DEFAULT '0.00' COMMENT 'Weight is in KG',
  `product_short_description` mediumtext,
  `product_long_description` text,
  `product_discount_status` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'Refers to discount table. If product dicount status is Yes',
  `product_guarantee_status` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'Refers to guarantee table. If product guarantee status is Yes',
  `admin_note` mediumtext,
  `product_status` enum('AFA','Active','Suspended','Deleted','Needs Improvement','Denied') NOT NULL DEFAULT 'AFA' COMMENT 'AFA = Awaiting for approval',
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taz_product`
--

INSERT INTO `taz_product` (`id`, `product_category_id`, `product_subcategory_id`, `product_code`, `product_name`, `product_seo`, `product_owner_id`, `product_price`, `product_sale_price`, `product_retail_price`, `product_material`, `product_color`, `product_dimension_type`, `product_height`, `product_length`, `product_breadth`, `product_weight`, `product_short_description`, `product_long_description`, `product_discount_status`, `product_guarantee_status`, `admin_note`, `product_status`, `created_on`, `updated_on`) VALUES
(1, 1, 0, 'PRD240817070956ANQ8', 'PRODUCT TEST NAME', 'test-seo', 1, '450.00', '540.00', '0.00', 'WOOD', 'GREEN', 'cm', '45.00', '56.00', '45.00', '76.00', 'SHORT DESCRIPTION', 'LONG DESCRIPTION ADMIN', 'No', 'No', '', 'Active', '2017-08-24 07:09:56', NULL),
(2, 2, 0, 'PRD280817052859MrLu', 'PRD SLA SKIP', 'test-seo', 1, '567.00', '680.40', '0.00', 'WOOD', 'DEMO', 'cm', '23.00', '23.00', '45.00', '67.00', 'EXT Dummy TEXT for Short Description ', 'Dummy Text for ong deescription', 'No', 'No', NULL, 'Active', '2017-08-28 05:28:59', NULL),
(3, 3, 0, 'PRD280817052859LSA', 'OTL PRD SKIP', 'test-seo', 1, '567.00', '680.40', '0.00', 'WOOD', 'DEMO', 'cm', '23.00', '23.00', '45.00', '67.00', 'EXT Dummy TEXT for Short Description ', 'Dummy Text for ong deescription', 'No', 'No', NULL, 'Active', '2017-08-28 05:28:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taz_product_address`
--

CREATE TABLE `taz_product_address` (
  `id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL COMMENT 'Refers to Product table id',
  `street` varchar(500) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `pin_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taz_product_address`
--

INSERT INTO `taz_product_address` (`id`, `product_id`, `street`, `city`, `state`, `country`, `pin_code`) VALUES
(1, 1, 'STREET', 'CITY', 'STATE', 'Aruba', '456789'),
(2, 2, 'RR Street', 'Vellore', 'Kerala', 'Iceland', '678987');

-- --------------------------------------------------------

--
-- Table structure for table `taz_product_image`
--

CREATE TABLE `taz_product_image` (
  `id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL COMMENT 'Refers to Product table id',
  `type` char(6) DEFAULT NULL,
  `file_name` varchar(500) DEFAULT NULL,
  `cover_photo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taz_product_image`
--

INSERT INTO `taz_product_image` (`id`, `product_id`, `type`, `file_name`, `cover_photo`) VALUES
(1, 1, '', '', '20170824070958.jpg'),
(2, 2, '', '', '20170828052900.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `taz_product_tag`
--

CREATE TABLE `taz_product_tag` (
  `id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL COMMENT 'Refers to Product table id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taz_slideshow`
--

CREATE TABLE `taz_slideshow` (
  `id` int(12) NOT NULL,
  `title` tinytext NOT NULL,
  `description` mediumtext,
  `image_name` varchar(350) NOT NULL,
  `status` enum('Active','Suspended') NOT NULL DEFAULT 'Active',
  `order_by` tinyint(2) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taz_tag`
--

CREATE TABLE `taz_tag` (
  `id` int(12) NOT NULL,
  `tag_name` varchar(400) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taz_user`
--

CREATE TABLE `taz_user` (
  `id` int(12) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `registered_mode` enum('Web','FB','Google') NOT NULL DEFAULT 'Web',
  `profile_image` tinytext,
  `profile_status` enum('Completed','Not-Completed') NOT NULL DEFAULT 'Not-Completed',
  `product_count` tinyint(4) NOT NULL DEFAULT '0',
  `user_loyalty` enum('Platinum','Gold','Silver') DEFAULT NULL,
  `user_type` enum('Buyer','Seller') NOT NULL DEFAULT 'Buyer',
  `status` enum('Active','Suspended','Deleted','Awaiting to Activate') NOT NULL DEFAULT 'Active',
  `registration_ip` varchar(15) NOT NULL DEFAULT '0.0.0.0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taz_user`
--

INSERT INTO `taz_user` (`id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `auth_key`, `registered_mode`, `profile_image`, `profile_status`, `product_count`, `user_loyalty`, `user_type`, `status`, `registration_ip`, `created_at`, `updated_at`) VALUES
(1, 'Nisha', 'a', 'nisha.com126@gmail.com', '9655196928', '0cc175b9c0f1b6a831c399e269772661', NULL, 'Web', NULL, 'Not-Completed', 0, NULL, 'Buyer', 'Active', '0.0.0.0', '2017-08-09 19:31:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taz_user_bank_account_detail`
--

CREATE TABLE `taz_user_bank_account_detail` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `pan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taz_user_card_detail`
--

CREATE TABLE `taz_user_card_detail` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `card_type` enum('Credit/Debit Card','Paypal','Paytm') DEFAULT NULL,
  `card_number` varchar(30) DEFAULT NULL COMMENT 'Card Number / Account Number',
  `cvv_number` char(6) DEFAULT NULL COMMENT 'Credit/Debit Card CVV number',
  `expiry_date` varchar(10) DEFAULT NULL COMMENT 'Credit/Debit Card expiry date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taz_user_contact_detail`
--

CREATE TABLE `taz_user_contact_detail` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `land_line_number` varchar(25) DEFAULT NULL,
  `street` varchar(500) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `pin_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taz_user_detail`
--

CREATE TABLE `taz_user_detail` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `short_about_me` mediumtext NOT NULL,
  `long_about_me` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taz_user_favorite`
--

CREATE TABLE `taz_user_favorite` (
  `id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL COMMENT 'Refers to Product table id',
  `user_id` int(12) NOT NULL COMMENT 'Refers to user table id',
  `favorited_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taz_administrator`
--
ALTER TABLE `taz_administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taz_cart`
--
ALTER TABLE `taz_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taz_category`
--
ALTER TABLE `taz_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `taz_cms`
--
ALTER TABLE `taz_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taz_feature_seller`
--
ALTER TABLE `taz_feature_seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taz_log`
--
ALTER TABLE `taz_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taz_product`
--
ALTER TABLE `taz_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taz_product_product_owner_id` (`product_owner_id`),
  ADD KEY `fk_taz_product_product_category_id` (`product_category_id`);

--
-- Indexes for table `taz_product_address`
--
ALTER TABLE `taz_product_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taz_product_address_product_id` (`product_id`);

--
-- Indexes for table `taz_product_image`
--
ALTER TABLE `taz_product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taz_product_image_product_id` (`product_id`);

--
-- Indexes for table `taz_product_tag`
--
ALTER TABLE `taz_product_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taz_product_tag_product_id` (`product_id`);

--
-- Indexes for table `taz_slideshow`
--
ALTER TABLE `taz_slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taz_tag`
--
ALTER TABLE `taz_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taz_user`
--
ALTER TABLE `taz_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taz_user_bank_account_detail`
--
ALTER TABLE `taz_user_bank_account_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taz_user_bank_account_detail_user_id` (`user_id`);

--
-- Indexes for table `taz_user_card_detail`
--
ALTER TABLE `taz_user_card_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taz_user_card_detail_user_id` (`user_id`);

--
-- Indexes for table `taz_user_contact_detail`
--
ALTER TABLE `taz_user_contact_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taz_user_contact_detail_user_id` (`user_id`);

--
-- Indexes for table `taz_user_detail`
--
ALTER TABLE `taz_user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taz_user_detail_user_id` (`user_id`);

--
-- Indexes for table `taz_user_favorite`
--
ALTER TABLE `taz_user_favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taz_user_favorite_user_id` (`user_id`),
  ADD KEY `fk_taz_user_favorite_product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taz_administrator`
--
ALTER TABLE `taz_administrator`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taz_cart`
--
ALTER TABLE `taz_cart`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taz_category`
--
ALTER TABLE `taz_category`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `taz_cms`
--
ALTER TABLE `taz_cms`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taz_feature_seller`
--
ALTER TABLE `taz_feature_seller`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taz_log`
--
ALTER TABLE `taz_log`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taz_product`
--
ALTER TABLE `taz_product`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `taz_product_address`
--
ALTER TABLE `taz_product_address`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `taz_product_image`
--
ALTER TABLE `taz_product_image`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `taz_product_tag`
--
ALTER TABLE `taz_product_tag`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taz_slideshow`
--
ALTER TABLE `taz_slideshow`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taz_tag`
--
ALTER TABLE `taz_tag`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taz_user`
--
ALTER TABLE `taz_user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taz_user_bank_account_detail`
--
ALTER TABLE `taz_user_bank_account_detail`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taz_user_card_detail`
--
ALTER TABLE `taz_user_card_detail`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taz_user_contact_detail`
--
ALTER TABLE `taz_user_contact_detail`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taz_user_detail`
--
ALTER TABLE `taz_user_detail`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taz_user_favorite`
--
ALTER TABLE `taz_user_favorite`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `taz_product`
--
ALTER TABLE `taz_product`
  ADD CONSTRAINT `fk_taz_product_product_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `taz_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_taz_product_product_owner_id` FOREIGN KEY (`product_owner_id`) REFERENCES `taz_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taz_product_address`
--
ALTER TABLE `taz_product_address`
  ADD CONSTRAINT `fk_taz_product_address_product_id` FOREIGN KEY (`product_id`) REFERENCES `taz_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taz_product_image`
--
ALTER TABLE `taz_product_image`
  ADD CONSTRAINT `fk_taz_product_image_product_id` FOREIGN KEY (`product_id`) REFERENCES `taz_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taz_product_tag`
--
ALTER TABLE `taz_product_tag`
  ADD CONSTRAINT `fk_taz_product_tag_product_id` FOREIGN KEY (`product_id`) REFERENCES `taz_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taz_user_bank_account_detail`
--
ALTER TABLE `taz_user_bank_account_detail`
  ADD CONSTRAINT `fk_taz_user_bank_account_detail_user_id` FOREIGN KEY (`user_id`) REFERENCES `taz_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taz_user_card_detail`
--
ALTER TABLE `taz_user_card_detail`
  ADD CONSTRAINT `fk_taz_user_card_detail_user_id` FOREIGN KEY (`user_id`) REFERENCES `taz_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taz_user_contact_detail`
--
ALTER TABLE `taz_user_contact_detail`
  ADD CONSTRAINT `fk_taz_user_contact_detail_user_id` FOREIGN KEY (`user_id`) REFERENCES `taz_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taz_user_detail`
--
ALTER TABLE `taz_user_detail`
  ADD CONSTRAINT `fk_taz_user_detail_user_id` FOREIGN KEY (`user_id`) REFERENCES `taz_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taz_user_favorite`
--
ALTER TABLE `taz_user_favorite`
  ADD CONSTRAINT `fk_taz_user_favorite_product_id` FOREIGN KEY (`product_id`) REFERENCES `taz_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_taz_user_favorite_user_id` FOREIGN KEY (`user_id`) REFERENCES `taz_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
