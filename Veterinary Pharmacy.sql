-- DROP the database if it exists
-- CREATE THE DATABASE
DROP DATABASE IF EXISTS vetPharmacy;
CREATE DATABASE IF NOT EXISTS vetPharmacy;

-- Use the database
USE vetPharmacy;

CREATE TABLE `User` (
  `UserId` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) UNIQUE NOT NULL,
  `Password` varchar(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE `Clients` (
  `ClientsId` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `FirstName` char(50),
  `LastName` char(50),
  `Address` char(100),
  `City` char(30),
  `Province` char(3),
  `PostalCode` char(7),
  `Email` varchar(100),
  `Phone` char(15),
  `user_id` integer NOT NULL,

  FOREIGN KEY (`user_id`) REFERENCES `User` (`UserId`)
)ENGINE=InnoDB;

CREATE TABLE `Pet` (
  `PetId` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Name` char(50),
  `Type` char(30) COMMENT 'Dog, cat or other',
  `PetPicture` mediumblob,
  `Clients_Id` integer NOT NULL,

  FOREIGN KEY (`Clients_Id`) REFERENCES `Clients` (`ClientsId`)
)ENGINE=InnoDB;

CREATE TABLE `Medicine` (
  `MedicineID` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `ActiveDrug` char(50) NOT NULL,
  `Category` char(30),
  `UnitPrice` float(6,2) 
)ENGINE=InnoDB;

CREATE TABLE `Order` (
  `OrderId` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `OrderDate` timestamp NOT NULL,
  `PST` float(6,2),
  `GST` float(6,2),
  `TotalPrice` float(6,2) COMMENT 'Price per 100ml or 100g',
  `Clients_Id` integer NOT NULL,

  FOREIGN KEY (`Clients_Id`) REFERENCES `Clients` (`ClientsId`)
)ENGINE=InnoDB;

CREATE TABLE `Ordered_Meds` (
  `Order_Id` integer NOT NULL,
  `Medicine_Id` integer NOT NULL,
  `Concentration` char(20) NOT NULL,
  `Presentation` char(50) NOT NULL,
  `Flavor` char(30),
  `Quantity` integer NOT NULL,
  `SumPrice` float(6,2),
  PRIMARY KEY (`Order_Id`, `Medicine_Id`),

  FOREIGN KEY (`Order_Id`) REFERENCES `Order` (`OrderId`),
  FOREIGN KEY (`Medicine_Id`) REFERENCES `Medicine` (`MedicineID`) 
)ENGINE=InnoDB;

INSERT INTO `User` VALUES
  (1, 'admin', ''),
  (2, 'test1', ''),
  (3, 'username', '');

  INSERT INTO `Clients` VALUES
  (1, 'Admin', 'One', '700 Royal Ave', 'New Westminster', 'BC', 'V3M 5Z5', 'admin@douglascollege.ca', '2368335240', 1);

  INSERT INTO `Pet` VALUES
  (1, 'Roku', 'Dog', null, 1);

    INSERT INTO `Medicine`  VALUES
  (1, 'Amoxicyllin', 'Antidepresive', 10.50);

    INSERT INTO `Order` VALUES
(1, CURRENT_TIMESTAMP(), null, null, null, 1);

    INSERT INTO `Ordered_Meds` VALUES
(1, 1, '0.5mg/ml', 'oil suspension', 'chicken', 1, 50.50);


