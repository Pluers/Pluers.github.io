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
        <h1>Create Band</h1>
    </head>

    <body>
        <form action="" method="post">
            <label for="bandname">BandName</label>
            <input id="bandname" type="text" name="bandname"></input><br>
            <label for="genre">Genre</label>
            <input id="genre" type="text" name="genre"></input><br>
            <label for="herkomst">herkomst</label>
            <input id="herkomst" type="text" name="herkomst"></input><br>
            <label for="omschrijving">omschrijving</label>
            <input id="omschrijving" type="text" name="omschrijving"></input><br>
            <button type="submit" name="create_band">Create Band</button>
        </form>
    </body>

</html>