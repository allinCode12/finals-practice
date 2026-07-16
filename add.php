<?php

include_once("config.php");

if(isset($_POST['Submit']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    if(empty($name) || empty($age) || empty($email))
    {
        if(empty($name))
            echo "<font color='red'>Name field is empty.</font><br>";

        if(empty($age))
            echo "<font color='red'>Age field is empty.</font><br>";

        if(empty($email))
            echo "<font color='red'>Email field is empty.</font><br>";

        echo "<br><a href='add.html'>Go Back</a>";
    }
    else
    {
        $result = mysqli_query(
            $conn,
            "INSERT INTO users(name, age, email)
             VALUES('$name','$age','$email')"
        );

        if($result)
        {
            echo "<h2 style='color:green;'>Data added successfully!</h2>";
            echo "<a href='index.php'>View Records</a>";
        }
        else
        {
            echo "<h2 style='color:red;'>Error: ".mysqli_error($conn)."</h2>";
        }
    }
}

?>