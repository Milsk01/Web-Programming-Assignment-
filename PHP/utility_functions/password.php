<?php 

function getPassword($conn,$username){
    $sql = "SELECT password FROM user where username = ? ";
    $statement = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($statement, $sql)){

        return false;
    } else { 
        mysqli_stmt_bind_param($statement, "s", $username); 
        $result = mysqli_stmt_execute($statement); 

        if($result){
            $pwd =  mysqli_stmt_get_result($statement);
            return mysqli_fetch_array($pwd)[0];
            

        } else {
            
            return false;
        }
    }

        
}

function comparePassword($pwd,$pwd_hashed){

    if (password_verify($pwd, $pwd_hashed)) {
        return true;
    }
    else {
        return false;
    }
}

function updatePassword($conn,$username,$new_pwd){

    $pwd_hashed = password_hash($new_pwd, PASSWORD_DEFAULT);

    
    $sql = "UPDATE user set password =?  where username = ? ";
    $statement = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($statement, $sql)){
        // prepare stm failed 

        return false;
    } else { 

        mysqli_stmt_bind_param($statement, "ss",$pwd_hashed, $username); 
        $result = mysqli_stmt_execute($statement); 

        if($result){
            return true;

        } else {  

            return false;

        }
    }
}



