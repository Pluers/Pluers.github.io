<?php
include_once("../header.php");
include('../connection.php');
if ($_SESSION['username'] == 'Admin' || $_SESSION['username'] == 'admin') {
} else {
    $_SESSION['msg'] = "You must log in to access this page";
    header('location: /Pluers.github.io/admin/login.php');
}
?>
<!DOCTYPE html>
<html>

    <head>
        <h1>Create Event</h1>
    </head>

    <body>
        <form action="" method="post">
            <?php include('../admin/errors.php'); ?>
            <i class="fluent-icons-filled-20">text_field</i>
            <label for="eventname">Eventname</label>
            <input id="eventname" type="text" name="eventname"></input><br>
            <i class="fluent-icons-filled-20">calendar</i>
            <label for="date">Datum</label>
            <input id="date" type="date" value="" name="date"></input><br>
            <i class="fluent-icons-filled-20">shifts_activity</i>
            <label for="time">Aanvangstijd</label>
            <input id="time" type="time" value="" name="time"></input><br>
            <i class="fluent-icons-filled-20">money</i>
            <label for="price">Price</label>
            <input id="price" type="text" name="price"></input><br>
            <button type="submit" name="create_event">Create Event</button>
        </form>
    </body>

</html>