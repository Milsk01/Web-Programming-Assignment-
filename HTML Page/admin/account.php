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


</head>


<body>
<?php 
            session_start(); 
            $username = $_SESSION["username"]; 
            $role = $_SESSION["role"]; 

            if(isset($username) and $role == "admin"){

        ?>
  <div class="container-fluid p-0">
    <div class="row">
     <div class="col-xl-2 d-flex flex-column flex-shrink-0 p-3 bg-light" style="height:100vh">
      <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Runner's World</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link active" aria-current="page">
           <i class="fa-solid fa-user"></i>
            Account
          </a>
        </li>
        <li>
          <a href="participants.php" class="nav-link link-dark">
            <i class="fa-solid fa-table-columns"></i>
             Participants List
          </a>
        </li>
        <li>
          <a href="Category" class="nav-link link-dark">
            <i class="fa-solid fa-plus"></i>Category 
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
    <div  class="pt-5 pb-3 jumbotron">
      <h1>Account</h1>
      <hr>

      <form action="../PHP/register_user.php" method="POST" >
        <div class="form-label mb-3">
          <label for="username">Username</label>
              <input type="text" name="username" class="form-control mt-1 " disabled readonly value=>
        </div>
        <div class="form-label mb-2">
          <label for="username">Full Name:</label>
            <input type="text" name="full_name" id="full_name" class="form-control mt-1">
        </div>
        <div class="form-label mb-2">
          <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control mt-1 " >
        </div>
        <div class="form-label mb-2">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control mt-1">
        </div>
        <div class="form-label mb-2">
          <label for="password">New Password</label>
          <input type="password" name="password2" id="password2" class="form-control mt-1" readonly>
        </div>
          <div class="text-end">
            <button type="submit" class="mt-3 btn btn-primary btn-block">Update</button>
          </div>
      </form>

    </div>
  </div>
    </div>
   
    </div>
    </div>
  
  </div>
  <?php
      } else {
                echo "No session exist. Please login. "; 
      } 
    ?>
</body>
</html>

<script>

window.onload = getUserData();
function getUserData(){
  // var xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //     console.log(this.responseText);

  //     var decoded = JSON.parse(this.responseText);
  //     displayData(decoded);
      
      
  //     }
  // };
  // xhttp.open("GET", "../../PHP/adminDashboard/get_participant.php", true);
  // xhttp.send();

  $.ajax({
    type: "POST",
    url: "../../PHP/adminDashboard/get_participant.php",

    success: function(response){
      var decoded = JSON.parse(response);

      displayData(decoded);
    },

    error: function(){
        alert("error");
    }
}); 
  
}

function displayData(decoded){
  const inputs = document.getElementsByTagName("input");
  console.log(decoded);

  for(let i = 0;i<3;i++){
    inputs[i].value = decoded[i];
  }
}
</script>