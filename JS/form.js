function register_event() {
    var username = document.getElementById("username");
    var student_id = document.getElementById("student_id");
    var category_id = document.getElementById("category_id");
    var gender = document.getElementById("gender");
    var phone_no = document.getElementById("phone_no");
    var address = document.getElementById("address");

    //to check if all fields are filled
    if (username.value == "" || student_id.value == "" || category_id.value == "" || gender.value == "" || phone_no.value == "" || address.value == "") {
        alert('Please enter all fields');
        return false;
    }
}

function register_user() {
    var username = document.getElementById("username");
    var full_name = document.getElementById("full_name");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var password2 = document.getElementById("password2");

    if (username.value == "" || full_name.value == "" ||email.value == "" || password.value == "" || password2.value == "") {
        alert('Please enter all fields');
        return false;
    }

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!email.value.match(validRegex)) {
        alert("Invalid email address");      
        return false;
    }

    //to check if both passwords are the same
    if (password.value != password2.value) {
        alert('The passwords must be the same');
        return false;
    }
    return true;
}

function login() {
    var username = document.getElementById("username_login");
    var password = document.getElementById("password_login");
    console.log('@'+username.value);
    if (username.value == "" || password.value == "") {
        alert('Please enter all fields');
        return false;
    }
    else
        return true;
}