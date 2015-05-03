<?php
/*
 *  SCHEMA 
 * 
 * 
 * @@@@@@@ TABLE USERS @@@@@@@@@@
 
CREATE TABLE IF NOT EXISTS `tblUsers` ( 
`pmkUserId` int(11) NOT NULL AUTO_INCREMENT, 
`fldEmail` varchar(65) DEFAULT NULL, 
`fldUsername` varchar(15) DEFAULT NULL, 
`fldPassword` varchar(15) DEFAULT NULL, 
`fldDateJoined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
`fldPermissionLevel` tinyint(5) NOT NULL DEFAULT '0', 
PRIMARY KEY (`pmkUserId`) 
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1
 
 
@@@@@@@@@@@  TABLE PROFILE @@@@@@@@@@
 
  CREATE TABLE IF NOT EXISTS `tblProfile` (
  `fnkUserId` int(11) NOT NULL AUTO_INCREMENT,
  `fldFirstName` varchar(65) DEFAULT NULL,
  `fldLastName` varchar(15) DEFAULT NULL,
  `fldAboutMe` varchar(200) DEFAULT NULL,
 `fldAge` varchar(200) DEFAULT NULL,
 `fldGender` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`fnkUserId`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
 
 
@@@@@@@@@  TABLE Pets @@@@@@@@@@
 
  CREATE TABLE IF NOT EXISTS `tblPets` (
  `pmkProductID` int(11) NOT NULL AUTO_INCREMENT,
  `fldPetName` varchar(65) DEFAULT NULL,
  `fldDescription` varchar(500) DEFAULT NULL,
  `fldDateSubmitted` varchar(15) DEFAULT NULL,
  `fldBreed` varchar(65) DEFAULT NULL,
 `fldSize` int(65) DEFAULT NULL,
   `fldImages` varchar(65) DEFAULT NULL,
   `fldDob` date DEFAULT NULL, 
   `fldGender` tinyint(1) DEFAULT NULL,
  `fnkCategoryID` int(11) NOT NULL,
  PRIMARY KEY (`pmkPetID`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  
  
  
 
@@@@@@@@@  TABLE CATEGORIES @@@@@
  
  CREATE TABLE IF NOT EXISTS `tblCategories` (
  `pmkCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `fldCategoryName` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`pmkCategoryID`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  
  
  
  
  
@@@@@@@@@  TABLE COMMENTS @@@@@@@@@@@
   
    CREATE TABLE IF NOT EXISTS `tblComments` (
  `fnkUserID` int(11) NOT NULL,
  `fnkPetID` int(11) NOT NULL,
  `fldText` varchar(250) DEFAULT NULL,
  `fldDateSubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`fnkProductID` , `fnkUserID`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;



@@@@@@@@@  TABLE SHELTER INFO @@@@@@@@@@@
   
    CREATE TABLE IF NOT EXISTS `tblShelterInfo` (
`pmkShelterID` int(11) NOT NULL AUTO_INCREMENT, 
  `fldShelterName` varchar(65) DEFAULT NULL,
   `fldPhoneNumber` varchar(65) DEFAULT NULL,
  `fldStreetAdress` varchar(65) DEFAULT NULL,
   `fldCity` varchar(65) DEFAULT NULL,
  `fldState` varchar(65) DEFAULT NULL,
  `fldCountry` varchar(65) DEFAULT NULL,
  `fldZipCode` varchar(65) DEFAULT NULL,
     PRIMARY KEY (`pmkShelterID`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
*/

?>