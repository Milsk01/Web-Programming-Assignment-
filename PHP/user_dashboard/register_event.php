<?php include_once '../db_connection.php'; 
session_start();
$username = $_SESSION["username"]; 
$role = $_SESSION["role"]; 
if(isset($username) and $role == "user"){
    $student_id = $_POST["student_id"]; 
    $category_id = $_POST["category_id"]; 
    $gender = $_POST["gender"];  
    $phone_no = $_POST["phone_no"];  
    $address = $_POST["address"];  
    $username = $_POST["username"]; 

    $sql = "SELECT * FROM registration_detail where username = ?"; 

    $statement = mysqli_stmt_init($conn); 

    if(!mysqli_stmt_prepare($statement, $sql)){
        echo "Statement Failed while retrieving data"; 
    } else {
        mysqli_stmt_bind_param($statement, "s", $username); 
        mysqli_stmt_execute($statement);
        
        $result = mysqli_stmt_get_result($statement); 

        if(mysqli_num_rows($result) > 0){
            echo "Existing data. Please update."; 
        } else {
            $exceed = quota($conn, $category_id); 
            if($exceed){
                echo "Quota reached. Please choose other category"; 
            } else {
                $insert_sql = "INSERT INTO registration_detail VALUES ( NULL, ?, ?, ?, ?, ?, ?)"; 

                $statement = mysqli_stmt_init($conn); 

                if(!mysqli_stmt_prepare($statement, $insert_sql)){
                    echo "Statement Failed"; 
                } else {

                    // bind parameters to placeholder 
                    mysqli_stmt_bind_param($statement, "ssssss", $username, $student_id, $category_id, $gender, $phone_no, $address); 

                    // execute statement 
                    $result = mysqli_stmt_execute($statement);

                    // get data
                    mysqli_stmt_get_result($statement); 

                    if($result){
                    

                        $sql = 'SELECT no_registered_user FROM event_category where category_id = ?'; 
                        $statement = mysqli_stmt_init($conn); 

                        if(!mysqli_stmt_prepare($statement, $sql)){
                            echo "Statement Failed while getting number"; 
                        } else {
                            mysqli_stmt_bind_param($statement, "s", $category_id); 
                            mysqli_stmt_execute($statement); 
                            $result = mysqli_stmt_get_result($statement); 
                            $output = mysqli_fetch_array($result, MYSQLI_BOTH); 

                            $num = $output[0]; 
                            $int = (int)$num; 
                            $newNum = $int+1; 
                            $updated_num = (string)$newNum; 
                            $update_query = 'UPDATE event_category SET no_registered_user = ? where category_id = ?'; 
                            $statement = mysqli_stmt_init($conn); 

                            if(!mysqli_stmt_prepare($statement, $update_query)){
                                echo "Failed Statement while updating no registered user"; 
                            } else {
                                mysqli_stmt_bind_param($statement, "ss", $updated_num, $category_id); 
                                $result = mysqli_stmt_execute($statement);
                                
                                if($result){
                                    echo "Success"; 
                                    
                                } else {
                                    echo "Error"; 
                                }
                            }
                        }
                    } else {
                        echo "Err"; 
                    }
                } 
            }
        }
    }
 } else {
          echo "No session exist. Please login. ";
    }
?>
