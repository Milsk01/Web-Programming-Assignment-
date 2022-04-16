<?php include_once 'include.php';?>
<?php include 'checkUserExists.php';?>

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
	$result = getUser($conn,$username);

	if(mysqli_num_rows($result)==0){
		//check if email is registered
		$sql2="SELECT * FROM participants WHERE email='$email'";
		$result2=mysqli_query($conn,$sql2)or die("Error due to ".mysqli_error($con));
		
		if(mysqli_num_rows($result2)==0){
			//Insert user details into database
			$sql3="INSERT INTO participants VALUES('$username','$password','$fullName','$studID', '$ic','$gender','$email','$phone','$address', 'NULL', 'NULL')";
	
			$status=mysqli_query($conn,$sql3)or die("Error due to".mysqli_error($conn));
	
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