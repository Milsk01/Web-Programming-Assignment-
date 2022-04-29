function getUserData() {
  $.ajax({
    type: "POST",
    url: "../../PHP/admin_dashboard/get_participant.php",

    success: function (response) {
      console.log(response);
      var decoded = JSON.parse(response);

      displayData(decoded);
    },

    error: function () {
      alert("error");
    },
  });
}
