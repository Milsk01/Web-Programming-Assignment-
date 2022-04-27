<html>

<body>
    <?php
    //session_start();
    include_once "../../PHP/include.php";
    //$username = $_SESSION['username'];
    $username = "Admin1";
    $sql = "SELECT * FROM registration_detail WHERE username='$username'";
    $result = mysqli_query($conn, $sql) or die("Error due to " . mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result, MYSQLI_BOTH);
        header('Location: update_event.php');
    } else {
        header('Location: register_event.php');
    }
    ?>
</body>

</html>