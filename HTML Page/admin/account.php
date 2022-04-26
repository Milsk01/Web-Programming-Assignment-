<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</head>


<body>
  <!-- <?php
        // session_start();
        // $username = $_SESSION["username"];
        // $role = $_SESSION["role"];

        // if (isset($username) and $role == "admin") {

        ?> -->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">RUNNER'S WORLD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link me-2 active" href="account.php"><i class="bi bi-person-fill me-1"></i>Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="participants.php"><i class="bi-card-list me-1"></i>Participants List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="category.php"><i class="bi-plus me-1"></i>Add Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="logout.php"><i class="bi-lock-fill me-1"></i>Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- <?php
        // } else {
        //   echo "No session exist. Please login. ";
        // }
        ?> -->
</body>

</html>

<script>
  window.onload = getUserData();

  function getUserData() {
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

      success: function(response) {
        var decoded = JSON.parse(response);

        displayData(decoded);
      },

      error: function() {
        alert("error");
      }
    });

  }

  function displayData(decoded) {
    const inputs = document.getElementsByTagName("input");
    console.log(decoded);

    for (let i = 0; i < 3; i++) {
      inputs[i].value = decoded[i];
    }
  }
</script>