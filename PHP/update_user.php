<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php   include_once "include.php"; 
        $username = $_POST["username"];
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "UPDATE user SET full_name = ?, email = ?, password = ? WHERE username = ?";
        $statement = mysqli_stmt_init($conn); 
        
        if(!mysqli_stmt_prepare($statement, $sql)){
            echo "Failed Statement"; 
        } else { 
            mysqli_stmt_bind_param($statement, "ssss", $full_name, $email, $password, $username); 
            $result = mysqli_stmt_execute($statement); 

            if($result){
                echo "Changed"; 
            } else {
                echo "Err"; 
            }
        }

    ?> 
</body>
</html>