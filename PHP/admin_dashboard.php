<!DOCTYPE html>

<html>
    <body>
        <?php 
            session_start(); 
            $username = $_SESSION["username"]; 
            $role = $_SESSION["role"]; 

            if(isset($username) and $role == "admin"){

        ?>
        <h1>Admin Dashboard</h1>

        <h2>View List of Participants</h2>
        <a href="participant_list.php"> <button> View Table </button> </a>

        <h2>Find Participants</h2>
        
        <form method="POST" action="">
            <input type="text" name="id" placeholder="Username or Category">
            <input type="submit" value="Find Participant">
        </form>

        <h2>Add Category</h2>
        <form method="POST" action="addCategory.php"> 
            <input type="text" name="category_name" placeholder="E.g.: 2km, 4km, 10km">
            <input type="submit" value="Add New Category">
        </form>

        <?php
            } else if ($role == "user"){
                echo "Not authorized"; 
            } else {
                echo "No session exist. Please login. "; 
            } 
        ?>
    </body>
</html>