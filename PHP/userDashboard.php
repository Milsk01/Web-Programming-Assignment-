<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php

use LDAP\Result;

 include_once "include.php"; 
            session_start(); 
            
            $username = $_SESSION["username"]; 
            echo "Hello $username";
            $sql = "SELECT * FROM user where username = ?"; 
            $statement = mysqli_stmt_init($conn); 

            if(!mysqli_stmt_prepare($statement, $sql)){
                echo "Failed Statement"; 
            } else {
                mysqli_stmt_bind_param($statement, "s", $username); 
                mysqli_stmt_execute($statement); 

                $result = mysqli_stmt_get_result($statement); 

                $output = mysqli_fetch_array($result, MYSQLI_BOTH); 
            }

            $sql = "SELECT * FROM registration_detail where username = ?"; 
            $statement = mysqli_stmt_init($conn); 

            if(!mysqli_stmt_prepare($statement, $sql)){
                echo "Failed Statement"; 
            } else {
                mysqli_stmt_bind_param($statement, "s", $username); 
                mysqli_stmt_execute($statement); 

                $result = mysqli_stmt_get_result($statement); 
                if($result){
                    $output1 = mysqli_fetch_array($result, MYSQLI_BOTH); 
                } else {
                    $ouput1; 
                }

                
            }

        ?>

        <form action="update_user.php" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo $output[0]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" value="<?php echo $output[1]; ?>"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?php echo $output[2]; ?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password" value="<?php echo $output[3]; ?>"></td>
            </tr>
        </table>
        <input type="submit" value="Update">
        </form>

        <form action="update_event.php" method="post">
        <table>
            <tr>
                <td>Participant ID: </td>
                <td><input type="text" name="participant_id" value="<?php echo $output1[0]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo $output1[1]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Student ID:</td>
                <td><input type="text" name="student_id" value="<?php echo $output1[2]; ?>"></td>
            </tr>
            <tr>
                <td>Category ID</td>
                <td><input type="text" name="category_id" value="<?php echo $output1[3]; ?>"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><input type="text" name="gender" value="<?php echo $output1[4]; ?>"></td>
            </tr>
            <tr>
                <td>Phone No:</td>
                <td><input type="text" name="phone_no" value="<?php echo $output1[5]; ?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" value="<?php echo $output1[6]; ?>"></td>
            </tr>
        </table>
        <input type="submit" value="Update">
        </form>
</body>
</html>