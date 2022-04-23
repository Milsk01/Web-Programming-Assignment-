<?php include_once 'include.php'; 


            $category_name = $_POST['category_name']; 
            $sql = "SELECT * FROM event_category where category_name = ?"; 
            $statement = mysqli_stmt_init($conn); 
            if(!mysqli_stmt_prepare($statement, $sql)){
                echo "Statement Failed"; 
            } else {
                mysqli_stmt_bind_param($statement, "s", $category_name); 
                mysqli_stmt_execute($statement); 

                $result = mysqli_stmt_get_result($statement); 
                
                if(mysqli_num_rows($result) > 0){
                   echo "Category Exist";  
                }else {
                    $insert_sql = "INSERT INTO event_category VALUES (NULL, ?, 10)"; 
                    $statement2 = mysqli_stmt_init($conn); 

                    if(!mysqli_stmt_prepare($statement2, $insert_sql)){
                        echo "Statment Failed while adding"; 
                    } else {
                        mysqli_stmt_bind_param($statement2, "s", $category_name); 
                        $added = mysqli_stmt_execute($statement2); 

                        if($added){
                            echo "Added"; 
                        } else {
                            echo "Err"; 
                        }
                    }
                };
            }
?>