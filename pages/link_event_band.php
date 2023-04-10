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
                <?php


                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "EasyTiger-Patio";

                class TableRows extends RecursiveIteratorIterator
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
                    $stmt = $conn->prepare("SELECT naam FROM band");
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
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
                <option value="1">event 1</option>
                <option value="2">event 2</option>
            </select><br>
            <input type="submit">
        </form>
    </body>

</html>