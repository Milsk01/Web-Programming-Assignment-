
<?php 
    include "db_connection.php";
  

    $username = $_POST["username"]; 
    $full_name = $_POST["full_name"]; 
    $email = $_POST["email"]; 
    $password = $_POST["password"]; 

    $check_sql = "SELECT * FROM user WHERE username = ?"; 
    $statement = mysqli_stmt_init($conn); 

    if(!mysqli_stmt_prepare($statement, $check_sql)){
        
    } else {
        mysqli_stmt_bind_param($statement, "s", $username); 

        mysqli_stmt_execute($statement); 

        $result = mysqli_stmt_get_result($statement); 

        if(mysqli_num_rows($result) > 0){
            echo "<script>
            
            var click = alert('Username taken. Please change username');
           
            window.location.href ='../HTML Page/index.php';
            
            
        
            </script>";

            
            
        } else {
            $sql = "INSERT INTO user VALUES (?, ? , ? ,?, 'user')"; 

            $statement = mysqli_stmt_init($conn); 

            if(!mysqli_stmt_prepare($statement, $sql)){
                echo "Statement Failed"; 
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                // bind parameters to placeholder 
                mysqli_stmt_bind_param($statement, "ssss", $username, $full_name, $email, $password); 

                // execute statement 
                $result =mysqli_stmt_execute($statement);

                // get data
                mysqli_stmt_get_result($statement); 

                if($result){ 
                    
                    session_start();
                    $_SESSION["username"] = $username; 
                    $_SESSION["role"] = "user";
                    header("Location: ../HTML Page/user/account.php");
                } else {
                }
            }
        }
    }
?>
