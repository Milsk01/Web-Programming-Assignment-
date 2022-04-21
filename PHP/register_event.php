<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include_once 'include.php'; 

$student_id = $_POST["student_id"]; 
$category_id = $_POST["category_id"]; 
$gender = $_POST["gender"];  
$phone_no = $_POST["phone_no"];  
$address = $_POST["address"];  
$username = $_POST["username"]; 

$sql = "SELECT * FROM registration_detail where username = ?"; 

$statement = mysqli_stmt_init($conn); 

if(!mysqli_stmt_prepare($statement, $sql)){
    echo "Statement Failed while retrieving data"; 
} else {
    mysqli_stmt_bind_param($statement, "s", $username); 
    mysqli_stmt_execute($statement);
    
    $result = mysqli_stmt_get_result($statement); 

    if(mysqli_num_rows($result) > 0){
        echo "Existing data. Please update."; 
    } else {
        $insert_sql = "INSERT INTO registration_detail VALUES ( NULL, ?, ?, ?, ?, ?, ?)"; 

        $statement = mysqli_stmt_init($conn); 

        if(!mysqli_stmt_prepare($statement, $insert_sql)){
            echo "Statement Failed"; 
        } else {

            // bind parameters to placeholder 
            mysqli_stmt_bind_param($statement, "ssssss", $username, $student_id, $category_id, $gender, $phone_no, $address); 

            // execute statement 
            $result = mysqli_stmt_execute($statement);

            // get data
            mysqli_stmt_get_result($statement); 

            if($result){
                echo "Added"; 
            } else {
                echo "Err"; 
            }
        } 
    }
}

?>
</body>
</html>