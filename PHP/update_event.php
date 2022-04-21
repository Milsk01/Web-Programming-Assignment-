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

        $student_id = $_POST["student_id"]; 
        $category_id = $_POST["category_id"]; 
        $gender = $_POST["gender"];  
        $phone_no = $_POST["phone_no"];  
        $address = $_POST["address"];  
        $username = $_POST["username"];

        $sql = "UPDATE registration_detail SET student_id = ?, category_id = ?, gender = ?, phone_no = ?, address = ? WHERE username = ?";
        $statement = mysqli_stmt_init($conn); 
        
        if(!mysqli_stmt_prepare($statement, $sql)){
            echo "Failed Statement"; 
        } else { 
            mysqli_stmt_bind_param($statement, "ssssss", $student_id, $category_id, $gender, $phone_no, $address, $username); 
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