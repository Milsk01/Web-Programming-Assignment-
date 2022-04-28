<?php   include_once "include.php"; 
        include_once "./utility_functions/password.php";
        $username = $_POST["username"];
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        
        if(isset($_POST["password"])){

            $old_pwd = $_POST["password"];
            echo $old_pwd;

        }

        if(isset($_POST["password2"])){
            $new_pwd = $_POST["password2"];
            echo $new_pwd;

        }

        $sql = "UPDATE user SET full_name = ?,email = ? WHERE username = ?";
        $statement = mysqli_stmt_init($conn); 
        
       
               

        if(isset($old_pwd) && comparePassword($old_pwd,getPassword($conn,$username))){

            if(isset($new_pwd)){
                updatePassword($conn,$username,$new_pwd);
                echo "password changed";
            }
            
            
        }else{
            echo "password update failed";
        }
    

        if(!mysqli_stmt_prepare($statement, $sql)){
            echo "Failed Statement"; 
          
        } else { 
            
            mysqli_stmt_bind_param($statement, "sss", $full_name, $email, $username); 
            $result = mysqli_stmt_execute($statement); 
           

            if($result){
                echo "updated";
            } else {
                echo "failed";
            }
        }
    
?> 
