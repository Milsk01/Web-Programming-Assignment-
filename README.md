
# CSEB294 Web Programming Assignment 

## Group 8 

| No | Name | ID | Section | 
|---|---|---|---| 
| 1. | Lim Swee Keong | SW0107281 | 2A | 
| 2. | Saw Li Ann | SW0107498 | 2B | 
| 3. | Jarmin Anak Jack | SW0107517 | 2B | 

<br/>

## Description 

 This is a repository for our Web Programming Project which uses : 
- `HTML`
- `CSS`
- `Javascript`
- `PHP`
- `MySQL` 
  
<br/>

## Task List 
- [ ] Landing / Index Page 
- [ ] Form Page
- [ ] Admin Page
- [ ] Processing Page 
- [ ] Database Configuration 

## Database Configuration 

1. Create database <br/>
   ```sql
   CREATE DATABASE wpproject; 
   ```
2. Create table <br/>
   ```sql
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
       CHARSET = latin1 
       COLLATE latin1_swedish_ci;
    ```

