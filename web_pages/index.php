<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Jom Sihat</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />

        <link rel="stylesheet" href="../css/countdown.css">
        <script type="text/javascript" src="../JS/countdown/countdown.js"></script>
        <script type="text/javascript" src="../JS/countdown/jquery.countdown.js"></script><link rel="stylesheet" href="../css/countdown.css">
        <script type="text/javascript" src="../JS/countdown/countdown.js"></script>
        <script type="text/javascript" src="../JS/countdown/jquery.countdown.js"></script>
        <script type="text/javascript" src="../JS/form.js"></script>

    </head>
    <body>
        
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">RUNNER'S WORLD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Login</button>
                            <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal"
                                data-bs-target="#registerModal">Register</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <div class="modal fade" id="registerModal">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../PHP/user_dashboard/register_user.php" method="POST" onsubmit="return register_user()">
                            <div class="form-label mb-3">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="John Smith">
                            </div>
                            <div class="form-label mb-3">
                                <label for="username">Full Name:</label>
                                <input type="text" name="full_name" id="full_name" class="form-control"
                                    placeholder="John Smith">
                            </div>
                            <div class="form-label mb-3">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="johnsmith@gmail.com">
                            </div>
                            <div class="form-label mb-3">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="abc123456">
                            </div>
                            <div class="form-label mb-3">
                                <label for="password">Confirm Password:</label>
                                <input type="password" name="password2" id="password2" class="form-control"
                                    placeholder="abc123456">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="modal fade" id="loginModal">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../PHP/login_process.php" method="POST" onsubmit="return login()">
                            <div class="form-label mb-3">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username_login" class="form-control"
                                    placeholder="John Smith">
                            </div>
                            <div class="form-label mb-3">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password_login" class="form-control"
                                    placeholder="abc123456">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-left">
                    <div class="col-xl-6">
                        <div class="text-white">
                            <!-- Page heading-->
                            <h5 class="mb-3">Join us for the</h5>
                            <h1 class="mb-3">JOM SIHAT RUN</h1>
                            <h4>Date: 14th May 2022</h4>
                            <h4>Flag Off Time: 7.00 AM</h4>
                            <h4>Location: Universiti Tenaga Nasional</h4>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container pt-5">
            <div class=" rounded bg-gradient-4 text-white shadow p-5 text-center mb-5">
                <p class="mb-0 font-weight-bold text-uppercase">Countdown To Flagoff</p>
                <div id="clock-c" class="countdown py-4"></div>
            </div>        
        </div>

        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div>
                        <h2 class="mb-4">Why should you join the event?</h2>
                    </div>
                    <div class="col-lg-6">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-heart m-auto text-primary"></i></div>
                            <h3>Improves your health</h3>
                            <p class="lead mb-0">Running boost your immune system and lower the risk of developing blood clots</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-trophy m-auto text-primary"></i></div>
                            <h3>Prizes to be won</h3>
                            <p class="lead mb-0">Top 5 finishers in each category will be awarded with medals and prize money</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image Showcases-->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('../img/bg-showcase-1.jpg')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Multiple Category Available</h2>
                        <p class="lead mb-0">Just started running? Fret not. We have multiple categories to be selected from which includes <b>5km, 10km and 21km</b></p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('../img/bg-showcase-2.jpg')"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Total Prize Pool of RM5,850</h2>
                        <p class="lead mb-0">Prize money will awarded as shown:</p>
                        <p class="lead mb-0">1st Place: RM800</p>
                        <p class="lead mb-0">2nd Place: RM500</p>
                        <p class="lead mb-0">3rd Place: RM350</p>
                        <p class="lead mb-0">4th Place: RM200</p>
                        <p class="lead mb-0">5th Place: RM100</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('../img/bg-showcase-3.jpg')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Lucky Draw to be Won</h2>
                        <p class="lead mb-0">A lucky draw contest will take place after the prize giving ceremony where all finishers will stand a chance of winning 1 of 5 pairs of new running shoes</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials-->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Reviews for previous running events...</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="../img/testimonials-1.jpg" alt="..." />
                            <h5>Margaret E.</h5>
                            <p class="font-weight-light mb-0">"The view for the whole of run is awesome! Definitely will join this run again next time around!"</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="../img/testimonials-2.jpg" alt="..." />
                            <h5>Fred S.</h5>
                            <p class="font-weight-light mb-0">"A wholesome experience that's for sure! Bring your friends along if you're joining the event"</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../JS/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>


<?php 
        if(isset($_GET["success"])){
            $login =$_GET["success"];
        
            if(!strcmp($login,"fail")){
                echo "<script>alert('Wrong Password') </script>";
            }
        }

        
?>
