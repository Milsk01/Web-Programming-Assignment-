
    <?php 
        include_once "../db_connection.php"; 
        session_start(); 
        $username = $_SESSION["username"]; 
        $role = $_SESSION["role"]; 
        if(isset($username) and $role == "admin"){
            $keyword = $_POST["username"];
        
            $sql = "SELECT * FROM registration_detail where username like CONCAT( '%',?,'%')";
            $statement = mysqli_stmt_init($conn); 
            
            if(!mysqli_stmt_prepare($statement, $sql)){
                echo "Failed Statement"; 
            } else {  
                mysqli_stmt_bind_param($statement, "s", $keyword ); 
                mysqli_stmt_execute($statement);
                $result =  mysqli_stmt_get_result($statement); 
    
                $output = mysqli_fetch_all($result, MYSQLI_ASSOC); 
                
                $encoded = json_encode($output); 
                
                echo $encoded; 
            }
        }else{
                echo "No session exist. Please login. "; 
    
        }
       

