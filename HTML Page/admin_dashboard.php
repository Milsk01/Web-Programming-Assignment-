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
  <div class="container-fluid p-0">
    <div class="row">
    <div class="col-xl-2 d-flex flex-column flex-shrink-0 p-3 bg-light" style="height:100vh">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
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
          <a href="#" class="nav-link link-dark">
            <i class="fa-solid fa-table-columns"></i>
             Participants List
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <i class="fa-solid fa-plus"></i>         Add Category 
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Logout 
        </a>
      </li>
      
      </ul>
    </div>
    <div class="container col-xl-auto">
    <div  class="pt-5 pb-3 jumbotron">
      <h1>Registration Details</h1>
      <hr>
      <div class="input-group mt-4">
        <input type="text" class="form-control" placeholder="Enter username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button">Search</button>
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
      
        </tr>
      </thead>
      <tbody>
       

      </tbody>
    </table>
    </div>
    </div>
  
  </div>
  
</body>
</html>

<script>
  
var list =[{
        "username": "Aristotle Middleton",
        "student_id": "SY2467356",
        "category_id": 3,
        "gender": "Female ",
        "phone_no": "067-6426-2558",
        "address": "Ap #613-6605 Ornare St."
    },
    {
        "username": "Nehru Merrill",
        "student_id": "WO5696565",
        "category_id": 2,
        "gender": "Female ",
        "phone_no": "021-2903-1737",
        "address": "126-4086 Ut, Rd."

    },
    {
        "username": "Aristotle Wilkins",
        "student_id": "HL8976367",
        "category_id": 2,
        "gender": "Male ",
        "phone_no": "097-5246-3538",
        "address": "Ap #848-1107 Eu Rd."
    },

    {
        "username": "Timon Mccormick",
        "student_id": "UF5343434",
        "category_id": 2,
        "gender": "Male ",
        "phone_no": "071-0024-8437",
        "address": "P.O. Box 562, 8129 Elit, Ave"
    },
    {
        "username": "Gay Strickland",
        "student_id": "JF5546815",
        "category_id": 2,
        "gender": "Male ",
        "phone_no": "084-9945-4310",
        "address": "8157 Orci. Av."
    }
];

function showAll(data) {

 var tbody = document.getElementsByTagName("tbody")[0];
 console.log(tbody);
 for(let i = 0; i< data.length;i++){
  const row = document.createElement("tr");
  var index = document.createElement("th");
  index.setAttribute("scope","row");
  index.innerText =i+1;
  row.appendChild(index);
  
 
  
  for(const item in data[i]){
    var attribute = document.createElement("td");
    attribute.innerText = data[i][item];

    row.appendChild(attribute);
  }
  tbody.appendChild(row);
  
 }
 
 
}
showAll(list);
</script>
