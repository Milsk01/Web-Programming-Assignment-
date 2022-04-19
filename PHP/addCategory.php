<!DOCTYPE html>
<html>
    <body>
        <?php include_once 'include.php'; 

            $distance = $_POST['cat']; 

            $sql = 'SHOW COLUMNS FROM participants;'; 
            $statement = mysqli_stmt_init($conn); 

            if(!mysqli_stmt_prepare($statement, $sql)){
                echo "Statement Failed"; 
            } else {
                mysqli_stmt_execute($statement); 

                $result = mysqli_stmt_get_result($statement); 
                
                if(mysqli_num_rows($result) == 0) {
                    echo "Table does not exist";
                } else { 
                    $flag = false; 
                    
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['Field'] == $distance){
                            echo "Category Exist <br>";
                            $flag = true; 
                            break; 
                        } 
                    } 

                    if(!$flag){
                        $sql = "ALTER TABLE participants ADD $distance VARCHAR(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL AFTER 21km;"; 
                        $statement = mysqli_stmt_init($conn); 

                        if(!mysqli_stmt_prepare($statement, $sql)){
                            echo "Statement Failed while altering table"; 
                        } else {
                            mysqli_stmt_execute($statement); 
                            echo "Added New Category: $distance";
                        }
                    }
                }
            }
        ?>
    </body>
</html>