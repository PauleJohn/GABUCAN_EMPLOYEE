create database aicsdb;

use aicsdb;

CREATE TABLE `tbl_employees` (
  `id` int(11) NOT NULL auto_increment,
  `FirstName` varchar(100) NOT NULL,
  `LastName` int(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `DateEmployed` int(4) NOT NULL,
  `Salary` float,
  PRIMARY KEY  (`id`)
);