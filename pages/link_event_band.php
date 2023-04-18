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
        <form action="" method="post" onsubmit='return false'>
            <?php include('../admin/errors.php'); ?>
            <select name="Band" id="band" class="selection">
                <option value="Default" disabled selected>Select a band</option>
                <?php

                $sql = "SELECT bandname, idband FROM band";
                $sqlresult = mysqli_query($db, $sql);

                $rows = mysqli_fetch_all($sqlresult, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                    echo ("<option name='bandname' value='" . $row["idband"] . "'>" . $row["bandname"] . "</option>" . "\n");
                    echo $row;
                }
                ?>
            </select><br>
            <select name="Event" id="event" class="selection">
                <option value="Default" disabled selected>Select an event</option>
                <?php

                $sql = "SELECT eventname, idevent FROM event";
                $sqlresult = mysqli_query($db, $sql);

                $rows = mysqli_fetch_all($sqlresult, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                    echo ("<option name='eventname' value='" . $row["idevent"] . "'>" . $row["eventname"] . "</option>" . "\n");
                    echo $row;
                }
                ?>
            </select><br>
            <button name="link_event_band" type="submit">Link</button>
        </form>
    </body>

</html>