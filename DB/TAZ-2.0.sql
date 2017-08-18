CREATE TABLE IF NOT EXISTS taz_administrator ( 
	id TINYINT(2) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	username CHAR(50) NOT NULL, 
	password VARCHAR(32) NOT NULL, 
	status ENUM('Active','Suspended') NOT NULL DEFAULT 'Active', 
	created_on DATETIME NOT NULL, 
	modified_on DATETIME NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;
	
CREATE TABLE IF NOT EXISTS taz_user(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	firstname VARCHAR(50) NOT NULL,
	lastname VARCHAR(50) NOT NULL,
	email VARCHAR(500) NOT NULL,
	mobile VARCHAR(15) NULL,
	password VARCHAR(32) NOT NULL,
	auth_key VARCHAR(32) NULL DEFAULT NULL,
	registered_mode ENUM('Web','FB','Google') NOT NULL DEFAULT 'Web',
	profile_image TINYTEXT NULL DEFAULT NULL,
	profile_status ENUM('Completed', 'Not-Completed') NOT NULL DEFAULT 'Not-Completed',
	product_count TINYINT(4) NOT NULL DEFAULT 0,
	user_loyalty ENUM('Platinum', 'Gold', 'Silver') NULL DEFAULT NULL,
	user_type ENUM('Buyer','Seller') NOT NULL DEFAULT 'Buyer',
	status ENUM('Active', 'Suspended', 'Deleted', 'Awaiting to Activate') NOT NULL DEFAULT 'Active',
	registration_ip VARCHAR(15) NOT NULL DEFAULT '0.0.0.0',
	created_at DATETIME NOT NULL,
  	updated_at DATETIME DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_user_detail(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT(12) NOT NULL,
	short_about_me MEDIUMTEXT NOT NULL,
	long_about_me TEXT NULL DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_user_card_detail(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT(12) NOT NULL,
	card_type ENUM('Credit/Debit Card', 'Paypal', 'Paytm') NULL DEFAULT NULL,
	card_number VARCHAR(30) NULL DEFAULT NULL COMMENT 'Card Number / Account Number',
	cvv_number CHAR(6) NULL DEFAULT NULL COMMENT 'Credit/Debit Card CVV number',
	expiry_date VARCHAR(10) NULL DEFAULT NULL COMMENT 'Credit/Debit Card expiry date'
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_user_contact_detail(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT(12) NOT NULL,
	mobile VARCHAR(15) NULL DEFAULT NULL,
	land_line_number VARCHAR(25) NULL DEFAULT NULL,
	street VARCHAR(500) NULL DEFAULT NULL,
	city VARCHAR(150) NULL DEFAULT NULL,
	state VARCHAR(200) NULL DEFAULT NULL,
	country VARCHAR(200) NULL DEFAULT NULL,
	pin_code VARCHAR(10) NULL DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_user_bank_account_detail(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT(12) NOT NULL,
	account_number VARCHAR(20) NOT NULL,
	ifsc VARCHAR(20) NOT NULL,
	pan VARCHAR(25) NULL DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_slideshow(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title TINYTEXT NOT NULL,
	description MEDIUMTEXT NULL DEFAULT NULL,
	image_name VARCHAR(350) NOT NULL,
	status ENUM('Active', 'Suspended') NOT NULL DEFAULT 'Active',
	order_by TINYINT(2) NULL DEFAULT NULL,
	created_on DATETIME NOT NULL,
  	modified_on DATETIME DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_cms(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title TINYTEXT NOT NULL,
	seo TINYTEXT NOT NULL,
	description MEDIUMTEXT NULL DEFAULT NULL,
	status ENUM('Active', 'Suspended') NOT NULL DEFAULT 'Active',
	created_on DATETIME NOT NULL,
  	modified_on DATETIME DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS taz_category(
	id TINYINT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	category_name VARCHAR(150) NOT NULL UNIQUE,
	category_seo VARCHAR(300) NOT NULL,
	category_description MEDIUMTEXT NULL DEFAULT NULL,
	category_image VARCHAR(500) NULL DEFAULT NULL,
	category_status ENUM('Active','Suspended') NOT NULL DEFAULT 'Active',
	created_on DATETIME NOT NULL,
  	updated_on DATETIME DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_product(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	product_category_id TINYINT(4) NOT NULL,
	product_subcategory_id TINYINT(4) NOT NULL DEFAULT 0 COMMENT 'Subcategory is not required now. It is future enhancement',
	product_code TINYTEXT NOT NULL,
	product_name MEDIUMTEXT NOT NULL,
	product_seo MEDIUMTEXT NOT NULL,
	product_owner_id INT(12) NOT NULL,
	product_price Decimal(7,2) NOT NULL DEFAULT 0.00,
	product_sale_price Decimal(7,2) NOT NULL DEFAULT 0.00 COMMENT 'Caluclated automatically with the percentage of company selling percentage',
	product_retail_price Decimal(7,2) NOT NULL DEFAULT 0.00,
	product_material VARCHAR(600) NOT NULL,
	product_color varchar(30) NOT NULL,	
	product_dimension_type ENUM('cm', 'mm', 'm') NOT NULL DEFAULT 'cm',
	product_height Decimal(2,2) NOT NULL DEFAULT 00.00, 
	product_length Decimal(2,2) NOT NULL DEFAULT 00.00, 
	product_breadth Decimal(2,2) NOT NULL DEFAULT 00.00, 
	product_weight Decimal(2,2) NOT NULL DEFAULT 00.00 COMMENT 'Weight is in KG',
	product_short_description MEDIUMTEXT NULL DEFAULT NULL,
	product_long_description TEXT NULL DEFAULT NULL,
	admin_note MEDIUMTEXT NULL DEFAULT NULL COMMENT 'Admin Note',
	product_discount_status ENUM('Yes', 'No') NOT NULL DEFAULT 'No' COMMENT 'Refers to discount table. If product dicount status is Yes',
	product_guarantee_status ENUM('Yes', 'No') NOT NULL DEFAULT 'No' COMMENT 'Refers to guarantee table. If product guarantee status is Yes',
	product_status ENUM('AFA', 'Active', 'Suspended', 'Deleted', 'Needs Improvement', 'Denied') NOT NULL DEFAULT 'AFA' COMMENT 'AFA = Awaiting for approval',
	created_on DATETIME NOT NULL,
  	updated_on DATETIME DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_product_image(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	product_id INT(12) NOT NULL COMMENT 'Refers to Product table id',
	type CHAR(6) NULL DEFAULT NULL,
	file_name VARCHAR(500) NULL DEFAULT NULL,
	cover_photo VARCHAR(500) NULL DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_product_address(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	product_id INT(12) NOT NULL COMMENT 'Refers to Product table id',
	street VARCHAR(500) NULL DEFAULT NULL,
	city VARCHAR(150) NULL DEFAULT NULL,
	state VARCHAR(200) NULL DEFAULT NULL,
	country VARCHAR(200) NULL DEFAULT NULL,
	pin_code VARCHAR(10) NULL DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_tag(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	tag_name VARCHAR(400) NOT NULL,
	created_on DATETIME NOT NULL,
  	updated_on DATETIME DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_product_tag(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	product_id INT(12) NOT NULL COMMENT 'Refers to Product table id'
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

ALTER TABLE taz_product
  ADD CONSTRAINT fk_taz_product_product_owner_id FOREIGN KEY (product_owner_id) REFERENCES taz_user (id) ON DELETE CASCADE;
ALTER TABLE taz_product
  ADD CONSTRAINT fk_taz_product_product_category_id FOREIGN KEY (product_category_id) REFERENCES taz_category (id) ON DELETE CASCADE;
ALTER TABLE taz_product_image
  ADD CONSTRAINT fk_taz_product_image_product_id FOREIGN KEY (product_id) REFERENCES taz_product (id) ON DELETE CASCADE;
ALTER TABLE taz_product_address
  ADD CONSTRAINT fk_taz_product_address_product_id FOREIGN KEY (product_id) REFERENCES taz_product (id) ON DELETE CASCADE;
ALTER TABLE taz_product_tag
  ADD CONSTRAINT fk_taz_product_tag_product_id FOREIGN KEY (product_id) REFERENCES taz_product (id) ON DELETE CASCADE;

CREATE TABLE IF NOT EXISTS taz_user_favorite(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	product_id INT(12) NOT NULL COMMENT 'Refers to Product table id',
	user_id INT(12) NOT NULL COMMENT 'Refers to user table id',
	favorited_on DATETIME NOT NULL 
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_log(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ip_address VARCHAR(16) NOT NULL,
	log_time DATETIME NOT NULL,
	detail MEDIUMTEXT NULL DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;


ALTER TABLE taz_user_detail
  ADD CONSTRAINT fk_taz_user_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;
  
ALTER TABLE taz_user_card_detail
  ADD CONSTRAINT fk_taz_user_card_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;

ALTER TABLE taz_user_contact_detail
  ADD CONSTRAINT fk_taz_user_contact_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;

ALTER TABLE taz_user_bank_account_detail
  ADD CONSTRAINT fk_taz_user_bank_account_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;
  
CREATE TABLE `taz_country` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1-Active , 2-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
