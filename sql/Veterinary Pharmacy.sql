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
  `Size`  char(20) NOT NULL,
  `Flavor` char(30),
  `Quantity` integer NOT NULL,
  `SumPrice` float(6,2),
  PRIMARY KEY (`Order_Id`, `Medicine_Id`),

  FOREIGN KEY (`Order_Id`) REFERENCES `Order` (`OrderId`),
  FOREIGN KEY (`Medicine_Id`) REFERENCES `Medicine` (`MedicineID`) 
)ENGINE=InnoDB;

ALTER TABLE `Order`AUTO_INCREMENT=10001;

INSERT INTO `User` VALUES
  (1, 'admin', '$2y$10$IaiaFeb9HqSaormm/2VPPuudp6cL0csmmjQrzTgYtMJbHehsLxex.'),
  (2, 'test1', '$2y$10$Ooq.IeCY0.di76ncG5I8i.JjgJXoW1Wwq15TZ81UEcO1dCjpZfOpKm'),
  (3, 'username', '$2y$10$2sxKf0Pl/oZNPDZgBQofVOHdMD3BCfhUxAJZAGglkpQf2Ghrf.Xwu');

  INSERT INTO `Clients` VALUES
  (1, 'Admin', 'One', '700 Royal Ave', 'New Westminster', 'BC', 'V3M 5Z5', 'admin@douglascollege.ca', '2368335240', 1);

  INSERT INTO `Pet` VALUES
  (1, 'Roku', 'Dog', null, 1);

-- numero, droga, clasificacion, precio 
    INSERT INTO `Medicine`  VALUES
  (1, 'Xylazine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (2, 'Medetomidine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (3, 'Dexmedetomidine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (4, 'Yohimbine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (5, 'Tolazoline', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (6, 'Atipamezole', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (7, 'Atropine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (8, 'Glycopyrrolate', 'Anaesthetic, analgesic, and sedative drugs', 27.50), 
  (9, 'Lidocaine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (10, 'Epinephrine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (11, 'Ketamine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (12, 'Tiletamine-zolazepam', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (13, 'Midazolam', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (14, 'Diazepam', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (15, 'Ibuprofen.', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (16, 'Naproxen', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (17, 'Diclofenac', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (18, 'Aspirin', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (19, 'Buprenorphine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (20, 'Calcium gluconate', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (21, 'Mannitol', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (22, 'Dextrose', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (23, 'Diphenhydramine', 'Anaesthetic, analgesic, and sedative drugs', 27.50),
  (24, 'Amoxicillin', 'Antimicrobial drugs', 16.50),
  (25, 'Clindamycin', 'Antimicrobial drugs', 16.50),
  (26, 'Ampicillin', 'Antimicrobial drugs', 16.50),
  (27, 'Benzylpenicillin', 'Antimicrobial drugs', 16.50),
  (28, 'Cefazolin', 'Antimicrobial drugs', 16.50),
  (29, 'Sulfadiazinen', 'Antimicrobial drugs', 16.50),
  (30, 'Doxycycline', 'Antimicrobial drugs', 16.50),
  (31, 'Erythromycin', 'Antimicrobial drugs', 16.50),
  (32, 'Tylosin', 'Antimicrobial drugs', 16.50),
  (33, 'Metronidazole', 'Antimicrobial drugs', 16.50),
  (34, 'Enrofloxacin', 'Antimicrobial drugs', 16.50),
  (35, 'Gentamicin', 'Antimicrobial drugs', 16.50),
  (36, 'Chlorhexidine gluconate', 'Antimicrobial drugs', 16.50),
  (37, 'Miconazole', 'Antifungal drugs', 18.50),
  (38, 'Econazole', 'Antifungal drugs', 18.50),
  (39, 'Clotrimazole', 'Antifungal drugs', 18.50),
  (40, 'Enilconazole', 'Antifungal drugs', 18.50),
  (41, 'Terbinafine', 'Antifungal drugs', 18.50),
  (42, 'Famciclovir', 'Antiviral drugs', 12.50),
  (43, 'Zidovudine', 'Antiviral drugs', 12.50),
  (44, 'Imidacloprid', 'Antiparasitic drugs', 15.50),
  (45, 'Fipronil', 'Antiparasitic drugs', 15.50),
  (46, 'Flumethrin', 'Antiparasitic drugs', 15.50),
  (47, 'Milbemycins', 'Antiparasitic drugs', 15.50),
  (48, 'Praziquantel,', 'Antiparasitic drugs', 15.50),
  (49, 'Pyrantel', 'Antiparasitic drugs', 15.50),
  (50, 'Pyriproxyfen', 'Antiparasitic drugs', 15.50),
  (51, 'Febantel', 'Antiparasitic drugs', 15.50),
  (52, 'Fenbendazole', 'Antiparasitic drugs', 15.50),
  (53, 'Mebendazole', 'Antiparasitic drugs', 15.50),
  (54, 'Melarsomine', 'Antiparasitic drugs', 15.50),
  (55, 'Furosemide', 'Cardiorespiratory and renal systems', 13.50),
  (56, 'Pimobendan', 'Cardiorespiratory and renal systems', 13.50),
  (57, 'Amlodipine', 'Cardiorespiratory and renal systems', 13.50),
  (58, 'Benazepril', 'Cardiorespiratory and renal systems', 13.50),
  (59, 'Spironolactone', 'Cardiorespiratory and renal systems', 13.50),
  (60, 'Atenolol', 'Cardiorespiratory and renal systems', 13.50),
  (61, 'Ranitidine', 'Gastrointestinal system', 17.50),
  (62, 'Famotidine', 'Gastrointestinal system', 17.50),
  (63, 'Omeprazole', 'Gastrointestinal system', 17.50),
  (64, 'Apomorphine', 'Gastrointestinal system', 17.50),
  (65, 'Metoclopramide', 'Gastrointestinal system', 17.50),
  (66, 'Prednisolone', 'Gastrointestinal system', 17.50),
  (67, 'Lactulose', 'Gastrointestinal system', 17.50),
  (68, 'Cyclosporine', 'Immunomodulatory drugs', 12.50),
  (69, 'Tacrolimus', 'Immunomodulatory drugs', 12.50),
  (70, 'Dexamethasone', 'Neurology', 18.50),
  (71, 'Thiamine', 'Neurology', 18.50),
  (72, 'Phenobarbital', 'Neurology', 18.50),
  (73, 'Potassium bromide', 'Neurology', 18.50),
  (74, 'Levetiracetam', 'Neurology', 18.50),
  (75, 'Gabapentin', 'Neurology', 18.50),
  (76, 'Cyclophosphamide', 'Oncology', 32.50),
  (77, 'Chlorambucil,', 'Oncology', 32.50),
  (78, 'Carboplatin', 'Oncology', 32.50),
  (79, 'Lomustine', 'Oncology', 32.50),
  (80, 'Dexamethasone phosphate', 'Ophthalmology', 11.50),
  (81, 'Pilocarpine', 'Ophthalmology', 11.50),
  (82, 'Deslorelin', 'Reproduction', 12.50),
  (83, 'Aglepristone', 'Reproduction', 12.50),
  (84, 'Oxytocin', 'Reproduction', 12.50),
  (85, 'Calcium gluconate', 'Reproduction', 12.50),
  (86, 'Finasteride', 'Reproduction', 12.50);
 
    INSERT INTO `Order` VALUES 
(10001, CURRENT_TIMESTAMP(), null, null, null, 1);

    INSERT INTO `Ordered_Meds` VALUES
(10001, 1, '15mg/ml', 'oil suspension','100ml', 'chicken', 1, 50.50),
(10001, 5, '25mg/ml', 'ointment','30ml', 'no flavor', 3, 27.85);

