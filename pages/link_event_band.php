<!DOCTYPE html>
<html>

    <head>
        <?php include_once("../header.php") ?>
        <h1>Create Event</h1>
    </head>

    <body>
        <form action="" method="post">
            <select name="Band" id="band">
                <option value="Default" disabled selected>Select a band</option>
                <option value="1">band 1</option>
                <option value="2">band 2</option>
            </select><br>
            <select name="Event" id="event">
                <option value="Default" disabled selected>Select a event</option>
                <option value="1">event 1</option>
                <option value="2">event 2</option>
            </select><br>
            <input type="submit">
        </form>
    </body>

</html>