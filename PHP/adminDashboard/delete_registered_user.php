<?php   
    include_once "../include.php"; 
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
?> 