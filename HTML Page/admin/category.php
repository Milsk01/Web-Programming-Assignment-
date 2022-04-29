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
  <script src="https://kit.fontawesome.com/6481f70daf.js" crossorigin="anonymous"></script>

  <style>
    body{
      overflow-x:hidden ;
    }
  </style>
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
    <div class="d-none  d-xl-block col-2 col-md-3 col-xl-2 d-md-blockcol-xl-2 d-flex flex-column flex-shrink-0 p-3 bg-light" style="height:100vh">
      <a href="#" class="d-flex align-items-center mb-3 mb-md-0 ms-4 me-md-auto link-dark text-decoration-none">  
        <span class="fs-4">Runner's World</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="account.php" class="nav-link link-dark" aria-current="page">
           <i class="fa-solid fa-user me-2"></i>
            Account
          </a>
        </li>
        <li>
          <a href="participants.php" class="nav-link link-dark">
            <i class="fa-solid fa-table-columns me-2"></i>
             Participants List
        </a>
      </li>
      <li>
        <a href="#" class="nav-link active">
          <i class="fa-solid fa-plus me-2"></i>Category 
        </a>
      </li>
      <li>
        <a href="../../PHP/logout.php" class="nav-link link-dark">
          <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
          Logout 
        </a>
      </li>
      
      </ul>
    </div>
  </nav>
  <div class="container col-8 col-xl-6">
    <div class="pt-5 pb-3 jumbotron">
      <h1>Category</h1>
      <hr>

    </div>
			<table class="table table-responsive" id="tab_logic">
				<thead>
					<tr>
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Category Name 
						</th>
						<th class="text-center">
							# Participants
						</th>
						<th class="text-center">
							Quota
						</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
	    <button id="add_row" onClick = "addRow()" class="mt-3 me-3 btn btn-primary btn-block">Add Row</button>
      <button id='delete_row' onClick="deleteRow()" class="mt-3 me-3  btn btn-primary btn-block">Delete Row</button>
      <button id='update' onClick = "update()" class="mt-3  btn btn-primary btn-block">Update</button>
</div>
<?php
      } else {
                echo "No session exist. Please login. "; 
      } 
    ?>
</body>

</html>

<script>

window.onload= function() {
  init();
}

function init(){
   
  $.ajax({
    type: "POST",
    url: "../../PHP/adminDashboard/get_category.php",

    
    success: function(response){
      var categories = JSON.parse(response);
      
      var table_body = document.getElementsByTagName("tbody")[0];
      for(let i = 0;i<categories.length;i++){
        console.log(categories[i].quota);
        var r = createRow(categories[i].category_id,categories[i].category_name,categories[i].no_registered_user,categories[i].category_quota);

        table_body.appendChild(r);

        window.rowVal = i+1; 
      }
    },

    error: function(){
        alert("error");
    }
  }); 

}

function createRow(id,name,no_user = 0,quota=10){
  var tr = document.createElement("tr");
        var cat_id = document.createElement("td");
        var cat_name = document.createElement("td");
        var no_registered_user = document.createElement("td");
        var cat_quota = document.createElement("td");

        cat_id.innerText = id;
        
        var input_name = document.createElement("input");
        input_name.setAttribute("type","text");
        input_name.className += "form-control";
        input_name.setAttribute("value",  name);
        input_name.setAttribute("placeholder", "Category Name");

        cat_name.appendChild(input_name);
        
        var input_no = document.createElement("input");
        input_no.setAttribute("type","number");
        input_no.className += "form-control";
        input_no.setAttribute("value",  quota);
        input_no.addEventListener("change",function(old_val,new_val){
          var registered_user = this.parentNode.previousElementSibling.innerText;
        


          if(registered_user > this.value){
             alert("Invalid");
             this.value = this.defaultValue;

          }else{

            this.defaultValue = this.value;
          }
        
        })
        cat_quota.appendChild(input_no);
        
        no_registered_user.innerText= no_user;

        tr.appendChild(cat_id);
        tr.appendChild(cat_name);
        tr.appendChild(no_registered_user);
        tr.appendChild(cat_quota);

        return tr;

}

 function addRow(){
  var table_body = document.getElementsByTagName("tbody")[0];
  var r = createRow('',"");

  table_body.appendChild(r);

}

function deleteRow(){
  
  var table_body = document.getElementsByTagName("tbody")[0];
  var last_row = table_body.lastChild;
 
  registered_user = last_row.getElementsByTagName("td")[2];
  if(registered_user.innerText > 0){
    alert("Invalid Action"); 
  }else{
    var result = confirm("Do you want to delete the row");
    if(result){
      window.rowVal --; 
      table_body.removeChild(last_row);

      if(last_row.firstChild.innerText != ""){

        var category_id = last_row.firstChild.innerText;
        

        
        $.ajax({
        type: "POST",
        url: "../../PHP/adminDashboard/delete_category.php",
        data:{
          "category_id" :category_id,
        },
        success: function(response){
          alert(response);
    
        },

        error: function(){
        alert("error");
     }
      }); 
      }
    }
  }

}

function update(){
  var inputs = document.getElementsByTagName("input"); 
  for(let i = 0;i<inputs.length;i++){
    if(inputs[i].value == ""){
      
      alert("Fill in all the fields in the table before update");
      return; 
    }
  }
  var categories_data = get_values(); 
  $.ajax({
      type: "POST",
      url: "../../PHP/adminDashboard/add_category.php",
      data:{
        categories_data
      },
      success: function(response){
        alert(response);
        location.reload();
    
      },

    error: function(){
        alert("error");
    }
  }); 
}


function get_values(){
  var table = document.getElementsByTagName("tbody")[0];
  var rows = table.getElementsByTagName("tr");
  var categories = new Array(); 

  

  for(let i = 0; i<rows.length;i++){
    var data_columns = rows[i].getElementsByTagName("td");

    var category = new Object();

    category.id = data_columns[0].innerText; 
    category.name = data_columns[1].firstChild.value; 
    category.registered_no = data_columns[2].innerText;
    category.quota = data_columns[3].firstChild.value; 
    categories.push(category);
    
  }
  return categories;
}
</script>

