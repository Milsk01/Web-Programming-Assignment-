<!DOCTYPE html>

<html>
    <body>
        <?php 
            session_start(); 
            $user = $_SESSION["username"]; 
            echo "<h2>Hello $user</h2>"
        ?>
        <h1>Admin Dashboard</h1>

        <h2>View List of Participants</h2>
        <button> View Table </button>

        <h2>Find Participants</h2>
        <!-- This one up to SK how to implement 
         just in case needed the form below 
        --> 
        <form method="POST" action="">
            <input type="text" name="id" placeholder="ID">
            <input type="submit" value="Find Participant">
        </form>

        <h2>Add Category</h2>
        <form method="POST" action="addCategory.php"> 
            <input type="text" name="category_name" placeholder="E.g.: 2km, 4km, 10km">
            <input type="submit" value="Add New Category">
        </form>
    </body>
</html>