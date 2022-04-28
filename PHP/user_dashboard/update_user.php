<?php   include_once "../include.php"; 
        include_once "../utility_functions/password.php";
        $username = $_POST["username"];
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];

        if(isset($_POST["password"])){
            $old_pwd = $_POST["password"];

        }
        echo "gt value";

        if(isset($_POST["password2"])){
            $new_pwd = $_POST["password2"];

        }

        $sql = "UPDATE user SET full_name = ?,email = ? WHERE username = ?";
        $statement = mysqli_stmt_init($conn); 
        
        $hashed_pwd = getPassword($conn,$username);

        if(isset($old_pwd) && comparePassword($old_pwd,$hashed_pwd)){
            echo "execute";
            updatePassword($conn,$username,$new_pwd);


        }else{

        }
        
        if(!mysqli_stmt_prepare($statement, $sql)){
            echo "Failed Statement"; 
        } else { 
            
            mysqli_stmt_bind_param($statement, "sss", $full_name, $email, $username); 
            $result = mysqli_stmt_execute($statement); 

            if($result){
                echo "success";
            } else {
                echo "failure";
            }
        }
    
?> 
