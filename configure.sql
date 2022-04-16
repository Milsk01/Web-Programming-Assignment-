CREATE DATABASE wpproject; 

CREATE TABLE wpproject.participants ( 
       username VARCHAR(30) NOT NULL , 
       password VARCHAR(30) NOT NULL , 
       fullName VARCHAR(50) NOT NULL , 
       icNo VARCHAR(12) NOT NULL , 
       studentId VARCHAR(9) NULL, 
       gender VARCHAR(6) NOT NULL , 
       email VARCHAR(255) NOT NULL , 
       phoneNo VARCHAR(11) NOT NULL , 
       address VARCHAR(255) NOT NULL, 
       cat1 VARCHAR(5) NULL DEFAULT NULL , 
       cat2 VARCHAR(5) NULL DEFAULT NULL , 
       PRIMARY KEY (username)
) 
ENGINE = InnoDB
CHARSET = latin1 COLLATE latin1_swedish_ci;

CREATE TABLE wpproject.admin ( 
       username VARCHAR(30) NOT NULL , 
       password VARCHAR(30) NOT NULL 
) 
ENGINE = InnoDB 
CHARSET = latin1 COLLATE latin1_swedish_ci;