<?php
    include_once "../include.php"; 
             session_start(); 
             $role = $_SESSION["role"]; 
             $username = $_SESSION["username"]; 

             if(isset($username) and $role == "admin"){
                $sql = "SELECT username, full_name, email FROM user where username = ?"; 
                $statement = mysqli_stmt_init($conn); 

                if(!mysqli_stmt_prepare($statement, $sql)){
                    echo "Failed Statement"; 
                } else {
                    mysqli_stmt_bind_param($statement, "s", $username); 
                    mysqli_stmt_execute($statement); 
                    $result = mysqli_stmt_get_result($statement); 
                    $output = mysqli_fetch_array($result,MYSQLI_NUM); 

                    echo json_encode($output);
                }
   

    
             } else {
                 echo "No session exist. Please login. "; 
             } 
        ?>
