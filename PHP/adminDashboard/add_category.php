<?php include_once '../include.php'; 
    $categories = $_POST["categories_data"];
    
        $check_sql = "SELECT * FROM event_category where category_id = ?";
        $statement = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($statement, $check_sql)){
            echo "Statement Failed"; 
        }else{
            for($i = 0; $i< count($categories);$i++){

            mysqli_stmt_bind_param($statement, "s", $categories[$i]["id"]); 
            mysqli_stmt_execute($statement); 
            $result = mysqli_stmt_get_result($statement); 

                if(mysqli_num_rows($result) == 1){
                    update_category($conn,$categories[$i]["name"],$categories[$i]["quota"],$categories[$i]["id"]);
                }else{
                    insert_category($conn,$categories[$i]["name"],$categories[$i]["quota"]);
                }
            }

            echo "success";

        }
        

    
function update_category($conn,$name,$quota,$id){
    $update_sql = "UPDATE event_category SET category_name = ?, category_quota = ? WHERE category_id = ?";
    $statement = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($statement, $update_sql)){
        echo "Statement Failed"; 
    }else{
        mysqli_stmt_bind_param($statement, "sss", $name,$quota,$id);
        mysqli_stmt_execute($statement);     
        
    }
}


function insert_category($conn,$name,$quota){
    $insert_sql = "INSERT INTO event_category VALUES(NULL,?,?,?);";
    $statement = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($statement, $insert_sql)){
        echo "Statement Failed"; 
    }else{
        $no = '0';
        mysqli_stmt_bind_param($statement, "sss", $name,$quota,$no);

        if(mysqli_stmt_execute($statement)){
            
        }
        
    }
}


            
             
            
?>