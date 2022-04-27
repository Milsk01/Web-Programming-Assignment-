<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <?php
    //session_start();
    include_once "../../PHP/include.php";
    //$username = $_SESSION['username'];
    $username = "Admin";
    $sql = "SELECT * FROM registration_detail WHERE username='$username'";
    $result = mysqli_query($conn, $sql) or die("Error due to " . mysqli_error($conn));
    $data = mysqli_fetch_array($result, MYSQLI_BOTH);
    ?>
</head>


<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">RUNNER'S WORLD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link me-2" href="account.php"><i class="bi bi-person-fill me-1"></i>Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 active" href="update_event.php"><i class="bi-card-list me-1"></i>Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="logout.php"><i class="bi-lock-fill"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container col-xl-6 ">

        <div class="container col-xl-auto">
            <div class="pt-5 pb-3 jumbotron">
                <h1>Event</h1>
                <hr>
            </div>
            <form method="post" action="../../PHP/update_event_process.php" onsubmit="return register_event()">
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username" value="<?php echo "$data[1]"; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="student_id" class="col-sm-2 col-form-label">Student ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="student_id" class="form-control" id="student_id" value="<?php echo "$data[2]"; ?>">
                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Category</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category_id" id="5km" value="1" <?php if ($data[3] == "1") echo "checked" ?>>
                            <label class="form-check-label" for="5km">
                                5km
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category_id" id="10km" value="2" <?php if ($data[3] == "2") echo "checked" ?>>
                            <label class="form-check-label" for="10km">
                                10km
                            </label>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="Female" value="Female" <?php if ($data[4] == "Female") echo "checked" ?>>
                            <label class="form-check-label" for="Female">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" <?php if ($data[4] == "Male") echo "checked" ?>>
                            <label class="form-check-label" for="Male">
                                Male
                            </label>
                        </div>
                    </div>
                </fieldset>
                <div class="row mb-3">
                    <label for="phone_no" class="col-sm-2 col-form-label">Phone no</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone_no" class="form-control" id="phone_no" value="<?php echo "$data[5]"; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea name="address" class="form-control" id="address" rows="5"><?php echo "$data[6]"; ?></textarea><br>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>


</body>



</html>