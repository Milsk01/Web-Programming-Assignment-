<?php   
    session_start(); 
    $username = $_SESSION["username"]; 
    $role = $_SESSION["role"]; 

    if(isset($username) and $role == "admin"){
        include_once "../db_connection.php"; 
        $ID = $_POST["ID"]; 

        $sql = "DELETE FROM registration_detail where participant_id = ? ";
        $statement = mysqli_stmt_init($conn); 
        
        if(!mysqli_stmt_prepare($statement, $sql)){
            echo "Failed Statement"; 
        } else { 
            mysqli_stmt_bind_param($statement, "s", $ID); 
            $result = mysqli_stmt_execute($statement); 

            if($result){
                echo "Deleted"; 
            } else {
                echo "Error"; 
            }
        }
    } else {
          echo "No session exist. Please login. ";
    }
?> 