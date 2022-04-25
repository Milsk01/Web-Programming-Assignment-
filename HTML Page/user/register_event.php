<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--bootsrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/6481f70daf.js" crossorigin="anonymous"></script>
    <script src="../js/form.js"></script>

    <?php
    //session_start();
    include_once "../../PHP/include.php";
    //$username = $_SESSION['username'];
    $username = "LA";
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $sql) or die("Error due to " . mysqli_error($conn));
    $data = mysqli_fetch_array($result, MYSQLI_BOTH);
    ?>
</head>


<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-xl-2 d-flex flex-column flex-shrink-0 p-3 bg-light" style="height:100vh">
                <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">Runner's World</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link link-dark" aria-current="page">
                            <i class="fa-solid fa-user"></i>
                            Account
                        </a>
                    </li>
                    <li>
                        <a href="register_event.php" class="nav-link active">
                            <i class="fa-solid fa-table-columns"></i>
                            Event
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" class="nav-link link-dark">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container col-xl-6 ">
                <div class="container col-xl-auto">
                    <div class="pt-5 pb-3 jumbotron">
                        <h1>Event</h1>
                        <hr>
                    </div>
                    <form method="post" action="../../PHP/register_event_process.php" onsubmit="return register_event()">
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="username" value="<?php echo "$username"; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="student_id" class="col-sm-2 col-form-label">Student ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="student_id" class="form-control" id="student_id">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Category</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category_id" id="5km" value="1" checked>
                                    <label class="form-check-label" for="5km">
                                        5km
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category_id" id="10km" value="2">
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
                                    <input class="form-check-input" type="radio" name="gender" id="Female" value="Female" checked>
                                    <label class="form-check-label" for="Female">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="Male" value="Male">
                                    <label class="form-check-label" for="Male">
                                        Male
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="phone_no" class="col-sm-2 col-form-label">Phone no</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_no" class="form-control" id="phone_no">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea name="address" class="form-control" id="address" rows="5"></textarea><br>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>


</body>



</html>