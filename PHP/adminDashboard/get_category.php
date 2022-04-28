<?php 
    session_start(); 
    $username = $_SESSION["username"]; 
    $role = $_SESSION["role"]; 

    if(isset($username) and $role == "admin"){
        include_once "../db_connection.php"; 
        $sql = "SELECT * FROM event_category"; 
        $statement = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($statement, $sql)){
            echo "Statement Failed"; 
        } else {
        

                mysqli_stmt_execute($statement); 
                $result = mysqli_stmt_get_result($statement); 
                $output = mysqli_fetch_all($result,MYSQLI_ASSOC); 

        
                echo json_encode($output);
            }
    }else{
            echo "No session exist. Please login. "; 

    }
?>