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
          <a href="account.php" class="nav-link link-dark" aria-current="page">
           <i class="fa-solid fa-user"></i>
            Account
          </a>
        </li>
        <li>
          <a href="participants.php" class="nav-link active">
            <i class="fa-solid fa-table-columns"></i>
             Participants List
        </a>
      </li>
      <li>
        <a href="category.php" class="nav-link link-dark">
          <i class="fa-solid fa-plus"></i>Category 
        </a>
      </li>
      <li>
        <a href="../../PHP/logout.php" class="nav-link link-dark">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Logout 
        </a>
      </li>
      
      </ul>
    </div>
  </nav>
  <div class="container col-xl-auto">
    <div class="pt-5 pb-3 jumbotron">
      <h1>Participant List</h1>
      <hr>
      <div class="input-group mt-4">
        <input type="text" class="form-control" placeholder="Enter username" aria-label="Recipient's username" aria-describedby="basic-addon2" onkeydown= "searchByUsername()">
        <div class="input-group-append">

        <button class="btn btn-outline-secondary" type="button" >Search</button>
\
        </div>
      </div>
    </div>
    <table class="table table-responsive" id="registrationDetails">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Student ID</th>
          <th scope="col">Category ID</th>
          <th scope="col">Gender</th>
          <th scope="col">Contact No</th>
          <th scope="col">Address</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>


      </tbody>
    </table>
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
  window.onload = getParticipantList();

  function getParticipantList() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var decoded = JSON.parse(this.responseText);
        showAll(decoded);

  }


  function showAll(data) {
    // get table body element
    var tbody = document.getElementsByTagName("tbody")[0];

    // for each participant
    for (let i = 0; i < data.length; i++) {

      // create a row element 
      const row = document.createElement("tr");

      // for each attribute of the particpant
      for (const item in data[i]) {

        // if the attribute is participant_id 
        if (item == "participant_id") {
          //cretae th
          const index = document.createElement("th");

          // set attribute
          index.setAttribute("scope", "row");

          //set value 
          index.innerText = data[i][item];

          //add the th element into row 
          row.appendChild(index);

        } else {

          // create normal td element 
          const attribute = document.createElement("td");

          //set innerText
          attribute.innerText = data[i][item];


          // add the td element into row 
          row.appendChild(attribute);
        }

      }




      // add a new row 
      tbody.appendChild(row);

    }

    const rows = document.getElementsByTagName("tr");
    console.log(rows);

    for (let i = 1; i < rows.length; i++) {
      const deleteFunc = document.createElement("td");
      const link = document.createElement("a");
      const delete_icon = document.createElement("i");
      delete_icon.className += "fa-solid fa-circle-minus";
      link.appendChild(delete_icon);
      link.onclick = function() {
        var result = confirm("Are you sure you want to delete this data");

        if (result) {

          const td = link.parentNode;
          const tr = td.parentNode;
          deleteRow(tr.firstChild.innerText);
          tr.parentNode.removeChild(tr);


}
function deleteRow(ID){
  
$.ajax({
 type: "POST",
 url: "../../PHP/delete_registered_user.php",
 data: {
    "ID" : ID,
 },
 success: function(data) {
 alert(data + "has been deleted");
 },
 error: function(xhr, status, error) {
 console.error(xhr);
 }
 });
}

function searchByUsername(){
  $.ajax({
    type: "POST",
    url: "../../PHP/adminDashboard/get_participant_list.php",
    data:{
      "username" : event.srcElement.value,
    },
    
    success: function(response){
      console.log(response);
      var decoded = JSON.parse(response);

      showAll(decoded);
    },

    error: function(){
        alert("error");
    }
  }); 
}
</script>
