
<?php   
    include_once "include.php"; 

    $student_id = $_POST["student_id"]; 
    $category_id = $_POST["newval"]; 
    $gender = $_POST["gender"];  
    $phone_no = $_POST["phone_no"];  
    $address = $_POST["address"];  
    $username = $_POST["username"];
    $old_category_id = $_POST["oldval"]; 

    echo $category_id; 
    echo $old_category_id; 

    $exceed = quota($conn, $category_id); 
    if($exceed){
        echo "Full Quota"; 
    } else {
        $sql = "UPDATE registration_detail SET student_id = ?, category_id = ?, gender = ?, phone_no = ?, address = ? WHERE username = ?";
        $statement = mysqli_stmt_init($conn); 
        
        if(!mysqli_stmt_prepare($statement, $sql)){
            echo "Failed Statement"; 
        } else { 
            mysqli_stmt_bind_param($statement, "ssssss", $student_id, $category_id, $gender, $phone_no, $address, $username); 
            $result = mysqli_stmt_execute($statement); 

            if($result){
                echo "Changed"; 

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
                            echo "Increased Number"; 
                        } else {
                            echo "Error"; 
                        }
                    }
                }

                $sql = 'SELECT no_registered_user FROM event_category where category_id = ?'; 
                $statement = mysqli_stmt_init($conn); 

                if(!mysqli_stmt_prepare($statement, $sql)){
                    echo "Statement Failed while getting number"; 
                } else {
                    mysqli_stmt_bind_param($statement, "s", $old_category_id); 
                    mysqli_stmt_execute($statement); 
                    $result = mysqli_stmt_get_result($statement); 
                    $output = mysqli_fetch_array($result, MYSQLI_BOTH); 

                    $num = $output[0]; 
                    $int = (int)$num; 
                    $newNum = $int-1; 
                    $updated_num = (string)$newNum; 
                    $update_query = 'UPDATE event_category SET no_registered_user = ? where category_id = ?'; 
                    $statement = mysqli_stmt_init($conn); 

                    if(!mysqli_stmt_prepare($statement, $update_query)){
                        echo "Failed Statement while updating no registered user"; 
                    } else {
                        mysqli_stmt_bind_param($statement, "ss", $updated_num, $old_category_id); 
                        $result = mysqli_stmt_execute($statement);
                        
                        if($result){
                            echo "Decreased Number"; 
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
    

?> 