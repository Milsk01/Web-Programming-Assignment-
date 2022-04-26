<?php 
    $conn = mysqli_connect("localhost", "root", "", "wpproject") or 
    die("Error connecting to database"); 
 
    function quota($conn, $category_id){
        $sql = 'SELECT no_registered_user, category_quota from event_category where category_id = ?';

        $statement = mysqli_stmt_init($conn); 

        if(!mysqli_stmt_prepare($statement, $sql)){
            echo "Statement Failed while checking quota"; 
            return 0; 
        } else {
            mysqli_stmt_bind_param($statement, "s", $category_id); 
            mysqli_stmt_execute($statement); 
            $result = mysqli_stmt_get_result($statement); 
            $output = mysqli_fetch_array($result, MYSQLI_BOTH); 
            $exceed = $output[0] > $output[1]; 

            return $exceed; 
        }
    }
?>