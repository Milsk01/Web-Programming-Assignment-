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
        session_start(); 
        $username = $_SESSION["username"]; 
        echo "Hello $username";
    ?> 

    <form action="register_user.php" method="post">
        Username <input type="text" name="username" ><br>
        Full Name <input type="text" name="full_name" ><br>
        Email <input type="text" name="email"><br>
        Password <input type="text" name="password"><br>
        <input type="submit" value="Submit">
    </form>
        <br>
        <br> 

    <form action="register_event.php" method="post">
        Username: <input type="text" name="username" value="<?php echo $username; ?>" readonly> <br>
        Student ID <input type="text" name="student_id" >
        <br> 
        Category: 
        <input type="radio" name="category_id" value="1"> 5km 
        <input type="radio" name="category_id" value="2"> 10km <br> 

        Gender: 
        <input type="radio" name="gender" value="Male"> Male 
        <input type="radio" name="gender" value="Female"> Female <br>


        Phone No: <input type="text" name="phone_no"><br>
        Address <input type="text" name="address"><br>
        <input type="submit" value="Submit">
    </form>
    <br>

    <form action="login_process.php" method="post">
        <input type="text" name="username">
        <input type="text" name="password"> 
        <input type="submit" value="login">
    </form>
</body>
</html>