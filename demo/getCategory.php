<?php
    include_once "../PHP/include.php";

    $sql = "SELECT* FROM event_category;";
    $result = mysqli_query($conn,$sql);
    $array= array();

    while($category = mysqli_fetch_assoc($result)){
        $array[]= $category; 
     
        
    }


     // u will get the data from database 
     // for loop to put them into an array 
     // each of the elemnt of this array is an associative array;
    echo json_encode($array);