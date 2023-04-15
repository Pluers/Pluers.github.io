<?php
include_once("../header.php");
include('../connection.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in to access this page";
    header('location: /Pluers.github.io/admin/login.php');
}
?>
<!DOCTYPE html>
<html>

    <head>
        <?php include_once("../header.php") ?>
        <h1>Create Event</h1>
    </head>

    <body>
        <form action="" method="post">
            <label for="date">Datum</label>
            <input id="date" type="date" value=""></input><br>
            <label for="time">Aanvangstijd</label>
            <input id="time" type="time" value=""></input><br>
            <label for="eventname">Eventname</label>
            <input id="eventname" type="text"></input><br>
            <label for="price">Price</label>
            <input id="price" type="number"></input><br>
            <input type="submit">
        </form>
    </body>

</html>