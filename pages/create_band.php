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
        <h1>Create Band</h1>
    </head>

    <body>
        <form action="" method="post">
            <?php include('../admin/errors.php'); ?>
            <i class="fluent-icons-filled-20">rename</i>
            <label for="bandname">BandName</label>
            <input id="bandname" type="text" name="bandname"></input><br>
            <i class="fluent-icons-filled-20">music_note</i>
            <label for="genre">Genre</label>
            <input id="genre" type="text" name="genre"></input><br>
            <i class="fluent-icons-filled-20">earth</i>
            <label for="herkomst">Origin</label>
            <input id="herkomst" type="text" name="herkomst"></input><br>
            <i class="fluent-icons-filled-20">text_field</i>
            <label for="omschrijving">Description</label>
            <input id="omschrijving" type="text" name="omschrijving"></input><br>
            <button type="submit" name="create_band">Create Band</button>
        </form>
    </body>

</html>