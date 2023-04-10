<!DOCTYPE html>
<?php include_once("../header.php"); ?>
<html>

    <body>
        <form action="" method="post">
            <input type="text">email</input>
            <input type="text">password</input>
            <input type="submit">
        </form>
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "EasyTiger-Patio";
        $sql = "SELECT email FROM admin";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //This is now an array, have to convert it or have it search through database table to search if correct email has been entered
        if ($conn->query($sql) === $_POST["email"]) {
            echo "email correct";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
    </body>

</html>