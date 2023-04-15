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
        <title>Create Event</title>
    </head>

    <body>
        <form action="" method="post">
            <select name="Band" id="band">
                <option value="Default" disabled selected>Select a band</option>
                <?php


                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "EasyTiger-Patio";

                class bandRows extends RecursiveIteratorIterator
                {
                    function __construct($it)
                    {
                        parent::__construct($it, self::LEAVES_ONLY);
                    }

                    function current()
                    {
                        return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
                    }

                    function beginChildren()
                    {
                        echo "<option value='1'>";
                    }

                    function endChildren()
                    {
                        echo "</option>" . "\n";
                    }
                }

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT bandname FROM band");
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach (new bandRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                        echo $v;
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                ?>
            </select><br>
            <select name="Event" id="event">
                <option value="Default" disabled selected>Select a event</option>
                <?php


                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "EasyTiger-Patio";

                class eventRows extends RecursiveIteratorIterator
                {
                    function __construct($it)
                    {
                        parent::__construct($it, self::LEAVES_ONLY);
                    }

                    function current()
                    {
                        return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
                    }

                    function beginChildren()
                    {
                        echo "<option value='1'>";
                    }

                    function endChildren()
                    {
                        echo "</option>" . "\n";
                    }
                }

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT eventnaam FROM event");
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach (new eventRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                        echo $v;
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                ?>
            </select><br>
            <input type="submit">
        </form>
    </body>

</html>