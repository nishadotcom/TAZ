CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` Text DEFAULT NULL,
  `slider_image`  varchar(250) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('Active','Inactive') DEFAULT Active,
   primary key(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

