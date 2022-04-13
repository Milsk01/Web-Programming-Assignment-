<?php include 'include.php';?>

<?php	
	$username=$_POST['username'];
	$password=$_POST['password'];
    $fullName=$_POST['fname'];
    $studID=$_POST['id'];
    $ic=$_POST['ic'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
	
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	
	//check if username has been taken
	$sql="SELECT * FROM participants WHERE username=?;";

	//create prepare stmt
	$statement = mysqli_stmt_init($con);
	mysqli_stmt_prepare($statement,$sql);
	mysqli_stmt_bind_param($statement,"s",$username);
	mysqli_stmt_execute($statement);
	$result=mysqli_stmt_get_result($statement);
	//$result=mysqli_query($con,$sql)or die("Error due to ".mysqli_error($con));
	
	//if no other user with the same username
	if(mysqli_num_rows($result)==0){
		//check if email is registered
		$sql2="SELECT * FROM participants WHERE email='$email'";
		$result2=mysqli_query($con,$sql2)or die("Error due to ".mysqli_error($con));
		
		if(mysqli_num_rows($result2)==0){
			//Insert user details into database
			$sql3="INSERT INTO participants VALUES('$username','$password','$fullName','$studID', '$ic','$gender','$email','$phone','$address', 'NULL', 'NULL')";
	
			$status=mysqli_query($con,$sql3)or die("Error due to".mysqli_error($con));
	
			if($status){
				echo "Successfully Registered. Please log in to view your profile.";
			}
		}
		else{
			echo "The email has been registered. Please enter other email.";
		}
	}
	else{
		echo "The username has been taken. Please enter other username.";
	}

?>