
 <?php 
            
            include_once 'db_connection.php'; 
            include_once 'utility_functions/password.php';
            
        
    
            // get data from form 
            $username = $_POST["username"]; 
            $password = $_POST["password"];  


            // statement to be executed - find username :- got in db or not 
            $sql = "Select * from user where username = ?"; 
            $statement = mysqli_stmt_init($conn); 
            
      

    
            // create prepared statement
            if(!mysqli_stmt_prepare($statement, $sql)){
                echo "Statement Failed"; 
             } else {

            // bind parameters to placeholder 
            mysqli_stmt_bind_param($statement, "s", $username); 

            // execute statement 
            mysqli_stmt_execute($statement);

            // get data
            $result = mysqli_stmt_get_result($statement); 

            // check if any row match the username 
            if(mysqli_num_rows($result) == 0){
             echo "Username not available"; 
            } else {
            // convert raw data to array (if any)
            $data = mysqli_fetch_array($result, MYSQLI_BOTH); 

                

                    // check if password entered and in db is the same
                    if(comparePassword($password,  $data['password'])){
                        echo "Login Successful"; 
                        session_start(); 
                        $_SESSION["username"] = $username; 
                        $_SESSION["role"] = $data["role"]; 
                        if($data["role"] == "admin"){
                            header("Location: ../HTML Page/admin/account.php");

                        } else {
                            header("Location: ../HTML Page/user/account.php");
                        }
                        
                    } else {
                        header("Location: ../HTML Page?success=fail");
                        

                        
                    }
                }
                
           
        }
    
?>
