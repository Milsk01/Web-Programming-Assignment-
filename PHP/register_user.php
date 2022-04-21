<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "include.php"; 

        $username = $_POST["username"]; 
        $full_name = $_POST["full_name"]; 
        $email = $_POST["email"]; 
        $password = $_POST["password"]; 

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
    ?>
</body>
</html>