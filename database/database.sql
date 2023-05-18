Create database Alb_Juris;

CREATE TABLE
  `Users` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `uname` varchar(255) NOT NULL,
    `uemail` varchar(255) NOT NULL,
    `upassword` varchar(255) NOT NULL,
    `uphone` varchar(12) NOT NULL,
    PRIMARY KEY (`id`)
  );
  create table
  `Admin_Users` (
    `admin_name` varchar(10) not null primary key,
    `user` VARCHAR(255) not null,
    `password` VARCHAR(255) not null
  );
  
  create table
  `Contact`(
    `id` int unsigned not null auto_increment primary key,
    `Name` varchar(255) not null,
    `Email` varchar(255) not null,
    `Message` varchar(255) not null
  );