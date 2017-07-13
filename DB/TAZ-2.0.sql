CREATE TABLE IF NOT EXISTS taz_user(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(500) NOT NULL,
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

CREATE TABLE IF NOT EXISTS taz_user_payment_detail(
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
	product_owner_id INT(12) NOT NULL,
	product_price Decimal(7,2) NOT NULL DEFAULT 0.00,
	product_sale_price Decimal(7,2) NOT NULL DEFAULT 0.00,
	product_retail_price Decimal(7,2) NOT NULL DEFAULT 0.00 COMMENT 'Caluclated automatically with the percentage of company selling percentage',
	product_material VARCHAR(600) NOT NULL,
	product_color varchar(30) NOT NULL,	
	product_dimension_type ENUM('Centimeter', 'Millimeter', 'Meter') NOT NULL DEFAULT 'Centimeter',
	product_height Decimal(2,2) NOT NULL DEFAULT 00.00, 
	product_length Decimal(2,2) NOT NULL DEFAULT 00.00, 
	product_breadth Decimal(2,2) NOT NULL DEFAULT 00.00, 
	product_weight Decimal(2,2) NOT NULL DEFAULT 00.00 COMMENT 'Weight is in KG',
	product_short_description MEDIUMTEXT NULL DEFAULT NULL,
	product_long_description TEXT NULL DEFAULT NULL,
	product_discount_status ENUM('Yes', 'No') NOT NULL DEFAULT 'No' COMMENT 'Refers to discount table. If product dicount status is Yes',
	product_guarantee_status ENUM('Yes', 'No') NOT NULL DEFAULT 'No' COMMENT 'Refers to guarantee table. If product guarantee status is Yes',
	product_status ENUM('AFA', 'Active', 'Suspended', 'Deleted') NOT NULL DEFAULT 'AFA' COMMENT 'AFA = Awaiting for approval',
	created_on DATETIME NOT NULL,
  	updated_on DATETIME DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS taz_product_image(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	product_id INT(12) NOT NULL COMMENT 'Refers to Product table id',
	type CHAR(6) NULL DEFAULT NULL,
	file_name VARCHAR(500) NOT NULL,
	order_by TINYINT(2) NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS taz_user_favorite(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	product_id INT(12) NOT NULL COMMENT 'Refers to Product table id',
	user_id INT(12) NOT NULL COMMENT 'Refers to user table id',
	favorited_on DATETIME NOT NULL 
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

CREATE TABLE IF NOT EXISTS taz_log(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ip_address VARCHAR(16) NOT NULL,
	log_time DATETIME NOT NULL,
	detail MEDIUMTEXT NULL DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;


ALTER TABLE taz_user_detail
  ADD CONSTRAINT fk_taz_user_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;
  
ALTER TABLE taz_user_payment_detail
  ADD CONSTRAINT fk_taz_user_payment_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;

ALTER TABLE taz_user_contact_detail
  ADD CONSTRAINT fk_taz_user_contact_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;

ALTER TABLE taz_user_bank_account_detail
  ADD CONSTRAINT fk_taz_user_bank_account_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;
