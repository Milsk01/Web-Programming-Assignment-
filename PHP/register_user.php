
<?php include "include.php"; 

    $username = $_POST["username"]; 
    $full_name = $_POST["full_name"]; 
    $email = $_POST["email"]; 
    $password = $_POST["password"]; 

    $check_sql = "SELECT * FROM user WHERE username = ?"; 
    $statement = mysqli_stmt_init($conn); 

    if(!mysqli_stmt_prepare($statement, $check_sql)){
        echo "Failed Statement"; 
    } else {
        mysqli_stmt_bind_param($statement, "s", $username); 

        mysqli_stmt_execute($statement); 

        $result = mysqli_stmt_get_result($statement); 

        if(mysqli_num_rows($result) > 0){
            echo "Username taken. Please change username"; 
        } else {
            $sql = "INSERT INTO user VALUES (?, ? , ? ,?, 'user')"; 

            $statement = mysqli_stmt_init($conn); 

            if(!mysqli_stmt_prepare($statement, $sql)){
                echo "Statement Failed"; 
            } else {

                // bind parameters to placeholder 
                mysqli_stmt_bind_param($statement, "ssss", $username, $full_name, $email, $password); 

                // execute statement 
                $result =mysqli_stmt_execute($statement);

                // get data
                mysqli_stmt_get_result($statement); 

                if($result){
                    echo "Added"; 
                } else {
                    echo "Err"; 
                }
            }
        }
    }
?>
