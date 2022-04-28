<?php 
    include_once "../../PHP/db_connection.php";

    $sql = "SELECT* FROM event_category;";
    $statement = mysqli_stmt_init($conn); 
    $output;

    if(!mysqli_stmt_prepare($statement, $sql)){
        echo "Statement Failed"; 
    } else {
        
 
    // execute statement 
        mysqli_stmt_execute($statement);

    // get data
        $result = mysqli_stmt_get_result($statement); 
        $output = mysqli_fetch_all($result,MYSQLI_NUM); 

    }

?>