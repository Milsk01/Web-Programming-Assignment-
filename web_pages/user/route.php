<?php
  
    session_start(); 
    $username = $_SESSION["username"]; 
    $role = $_SESSION["role"]; 

    if(isset($username) and $role == "user"){
        include_once "../../PHP/db_connection.php";
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM registration_detail WHERE username='$username'";
        $result = mysqli_query($conn, $sql) or die("Error due to " . mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_array($result, MYSQLI_BOTH);
            header('Location: update.php');
        } else {
            header('Location: registration.php');
        }
    } else {
        echo "No session exist. Please login. ";
    }
?>
