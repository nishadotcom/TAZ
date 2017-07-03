CREATE TABLE IF NOT EXISTS taz_user(
	id INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(500) NOT NULL,
	email VARCHAR(500) NOT NULL,
	mobile VARCHAR(15) NOT NULL,
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
	created_on datetime NOT NULL,
  	updated_on datetime DEFAULT NULL
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


CREATE TABLE IF NOT EXISTS taz_category(
	id TINYINT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	category_name VARCHAR(150) NOT NULL UNIQUE,
	category_description MEDIUMTEXT NULL DEFAULT NULL,
	category_image VARCHAR(500) NULL DEFAULT NULL,
	category_status ENUM('Active','Suspended') NOT NULL DEFAULT 'Active',
	created_on datetime NOT NULL,
  	updated_on datetime DEFAULT NULL
)ENGINE='InnoDB' DEFAULT CHARSET=utf8;

ALTER TABLE taz_user_detail
  ADD CONSTRAINT fk_taz_user_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;
  
ALTER TABLE taz_user_payment_detail
  ADD CONSTRAINT fk_taz_user_payment_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;

ALTER TABLE taz_user_contact_detail
  ADD CONSTRAINT fk_taz_user_contact_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;

ALTER TABLE taz_user_bank_account_detail
  ADD CONSTRAINT fk_taz_user_bank_account_detail_user_id FOREIGN KEY (user_id) REFERENCES taz_user (id) ON DELETE CASCADE;