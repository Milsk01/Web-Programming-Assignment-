<?php

include_once '../db_connection.php'; 
session_start(); 
$username = $_SESSION["username"]; 
$role = $_SESSION["role"]; 
if(isset($username) and $role == "admin"){
    $category_id = $_POST["category_id"];
    delete_category($conn,$category_id);

} else {
          echo "No session exist. Please login. ";
}
function delete_category($conn,$category_id){
    $insert_sql = "DELETE FROM event_category where category_id = ? ";
    $statement = mysqli_stmt_init($conn) or die ("failed");

        
    if(!mysqli_stmt_prepare($statement, $insert_sql)){
        echo "failed1";
    }else{
        mysqli_stmt_bind_param($statement, "s",$category_id );

        if(mysqli_stmt_execute($statement)){
            echo "Deleted";
        }else{
            echo "failed";

        }
        
    }
    

}
?>
