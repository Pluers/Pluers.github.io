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
        <h1>Link event & band</h1>
    </head>


    <body>
        <form action="" method="post">
            <?php include('../admin/errors.php'); ?>
            <select name="Band" id="band">
                <option value="Default" disabled selected>Select a band</option>
                <?php

                $sql = "SELECT bandname FROM band";
                $sqlresult = mysqli_query($db, $sql);

                $rows = mysqli_fetch_all($sqlresult, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                    echo ("<option value='1'>" . $row["bandname"] . "</option>" . "\n");
                    echo $row;
                }
                ?>
            </select><br>
            <select name="Event" id="event">
                <option value="Default" disabled selected>Select a event</option>
                <?php

                $sql = "SELECT eventnaam FROM event";
                $sqlresult = mysqli_query($db, $sql);

                $rows = mysqli_fetch_all($sqlresult, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                    echo ("<option value='1'>" . $row["eventnaam"] . "</option>" . "\n");
                    echo $row;
                }
                ?>
            </select><br>
            <input name="link_event_band" type="submit">
        </form>


    </body>

</html>