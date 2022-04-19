CREATE DATABASE wpproject; 

CREATE TABLE `wpproject`.`user` ( 
       `username` VARCHAR(30) NOT NULL , 
       `full_name` VARCHAR(30) NOT NULL , 
       `email` VARCHAR(30) NOT NULL , 
       `password` VARCHAR(30) NOT NULL , 
       `role` VARCHAR(10) NOT NULL DEFAULT 
       'user' , 
       PRIMARY KEY (`username`)
       ) 
ENGINE = InnoDB
CHARSET=latin1 COLLATE latin1_swedish_ci;

CREATE TABLE `wpproject`.`event_category` ( 
       `category_id` INT(5) NOT NULL AUTO_INCREMENT , 
       `category_name` VARCHAR(30) NOT NULL , 
       `category_quota` INT(2) NOT NULL , 
       PRIMARY KEY (`category_id`)
       ) 
ENGINE = InnoDB 
CHARSET=latin1 COLLATE latin1_swedish_ci;

CREATE TABLE `wpproject`.`registration_detail` ( 
       `participant_id` INT(2) NOT NULL AUTO_INCREMENT , 
       `username` VARCHAR(30) NOT NULL , 
       `student_id` VARCHAR(10) NULL , 
       `category_id` INT(5) NOT NULL , 
       `gender` VARCHAR(10) NOT NULL , 
       `phone_no` VARCHAR(11) NOT NULL , 
       `address` VARCHAR(255) NOT NULL , 
       PRIMARY KEY (`participant_id`), 
       INDEX `category_id` (`category_id`), 
       INDEX `username` (`username`(30)
       )) 
ENGINE = InnoDB 
CHARSET=latin1 COLLATE latin1_swedish_ci;

ALTER TABLE `registration_detail` ADD FOREIGN KEY (`category_id`) REFERENCES `event_category`(`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `registration_detail` ADD FOREIGN KEY (`username`) REFERENCES `user`(`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO `event_category` (`category_id`, `category_name`, `category_quota`) VALUES (NULL, '5km', '10'), (NULL, '10km', '10')