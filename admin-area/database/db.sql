



CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `KindUser` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user',
  `RegStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'Identify User Group',
  `GroupID` INT(11) NOT NULL DEFAULT '0',
  `avatar` VARCHAR(255) NOT NULL COMMENT 'image member',
  `date_register` datetime NOT NULL,
  PRIMARY KEY (`UserID`),
  INDEX (`username`),
  UNIQUE (`username`)
) ENGINE=InnoDB CHARSET=utf8 COLLATE utf8_general_ci;



CREATE TABLE `products` (
  `product_ID` int(11) AUTO_INCREMENT,
  `Name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Description` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Price` int(20) NOT NULL,
  `Add_Date` date NOT NULL,
  `Country_Made` VARCHAR(255) NOT NULL,
  `Image` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Status` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Approve` tinyint(4) NOT NULL DEFAULT '0',
  `hiring` INT(11) NOT NULL DEFAULT '0',
  `Cat_Name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Member_Name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`product_ID`),
  INDEX (`Cat_Name`),
  INDEX (`Member_Name`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

CREATE TABLE `doctors_and_experts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
  `Image` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
  `date` DATE NOT NULL ,
  `Kind-User` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'doctor',
   PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

CREATE TABLE `categories` (
  `Cat_ID` int(11) AUTO_INCREMENT,
  `Cat_Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL INDEX,
  `Cat_Description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Ordering` int(11) NULL,
  `visibilty` tinyint(4) NOT NULL DEFAULT '0',
  `sub_category_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'no_sub_category',
  `cate_img_brand` VARCHAR(255) NOT NULL COMMENT 'image brand categories ',
  `Allow_Comment` tinyint(4) NOT NULL DEFAULT '0',
  `Allow_Advertise` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Cat_ID`),
  INDEX (`Cat_Name`),
  INDEX (`sub_category_name`),
  UNIQUE (`Cat_Name`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

ALTER TABLE `products` ADD CONSTRAINT `member_name` FOREIGN KEY (`Member_Name`) REFERENCES `users`(`username`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `products` ADD CONSTRAINT `cat_name` FOREIGN KEY (`Cat_Name`) REFERENCES `categories`(`Cat_Name`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `sub_categories` ADD CONSTRAINT `cat_parent` FOREIGN KEY (`cat_name_parent`) REFERENCES `categories`(`Cat_Name`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `pharmacy` ADD CONSTRAINT `name_cat` FOREIGN KEY (`Cat_name`) REFERENCES `categories`(`Cat_Name`) ON DELETE CASCADE ON UPDATE CASCADE;
