<?php 

    function getUser($conn,$username){
        
    $sql="SELECT * FROM participants WHERE username=?;";
	//create prepare stmt
	$statement = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($statement, $sql)){
        echo "Statement Failed"; 
        return false;
    } 
    else {
        mysqli_stmt_prepare($statement,$sql);
	    mysqli_stmt_bind_param($statement,"s",$username);
	    mysqli_stmt_execute($statement);
	    $result=mysqli_stmt_get_result($statement);
        return $result;
    }
	
    }
?>

