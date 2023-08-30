CREATE DATABASE IF NOT EXISTS `mydb` ;

USE `mydb`;
-- --------- create news table--------
CREATE TABLE IF NOT EXISTS `articles`
(
`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`title` VARCHAR(255),
`description` text NOT NULL

)DEFAULT CHARSET=utf8;

