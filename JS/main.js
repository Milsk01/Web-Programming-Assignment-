function getUserData(){
 
    $.ajax({
      type: "POST",
      url: "../../PHP/adminDashboard/get_participant.php",
      
      success: function(response){
        console.log(response);
        var decoded = JSON.parse(response);
  
        displayData(decoded);
      },
  
      error: function(){
          alert("error");
      }
    }); 
    
}