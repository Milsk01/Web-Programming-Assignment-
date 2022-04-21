<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include_once "include.php"; 

        $sql = "SELECT * FROM registration_detail";
        $statement = mysqli_stmt_init($conn); 
        
        if(!mysqli_stmt_prepare($statement, $sql)){
            echo "Failed Statement"; 
        } else {  
            mysqli_stmt_execute($statement);
            $result =  mysqli_stmt_get_result($statement); 

            $output = mysqli_fetch_all($result, MYSQLI_ASSOC); 
            
            $encoded = json_encode($output); 
            
            echo $encoded; 
            return $encoded; 
        }
    ?> 
</body>
</html>