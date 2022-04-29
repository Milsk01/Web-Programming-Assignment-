
<?php   
    include_once "../db_connection.php"; 


    session_start(); 
    $username = $_SESSION["username"]; 
    $role = $_SESSION["role"]; 

    if(isset($username) and $role == "user"){
        $student_id = $_POST["student_id"]; 
        $category_id = $_POST["newval"]; 
        $gender = $_POST["gender"];  
        $phone_no = $_POST["phone_no"];  
        $address = $_POST["address"];  
        $username = $_POST["username"];
        $old_category_id = $_POST["oldval"]; 




        $exceed = quota($conn, $category_id); 
        if($exceed && ((int)$category_id != (int)$old_category_id)){
            echo "Full Quota"; 
        } else {
            $sql = "UPDATE registration_detail SET student_id = ?, category_id = ?, gender = ?, phone_no = ?, address = ? WHERE username = ?";
            $statement = mysqli_stmt_init($conn); 
            
            if(!mysqli_stmt_prepare($statement, $sql)){
            } else { 
                mysqli_stmt_bind_param($statement, "ssssss", $student_id, $category_id, $gender, $phone_no, $address, $username); 
                $result = mysqli_stmt_execute($statement); 

                if($result){
                    $sql = 'SELECT no_registered_user FROM event_category where category_id = ?'; 
                    $statement = mysqli_stmt_init($conn); 

                    $increased;
                    $decreased;

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
                                $increased = true;
                                
                            } else {
                                $increased = false; 
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
                                $decreased = true;
                            }
                            else{
                                $decreased = false;

                            }
                        }
                    if($increased && $decreased){
                        echo "Update Success";
                    }
                }
            }else{
                    echo "Err"; 
                }
            }
        }
    } else {
          echo "No session exist. Please login. ";
    }

?> 