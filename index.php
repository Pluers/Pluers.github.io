<!DOCTYPE html>
<html>

    <head>
        <?php include_once("header.php") ?>
        <link rel="stylesheet" href="/Pluers.github.io/style/index.css">
    </head>


    <!-- connection test -->
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "EasyTiger-Patio";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO band (idband, naam, genre)
VALUES ('2', 'Band name 2', 'Pop')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>

    <body>

        <h1>Agenda
            <?php echo date("F", strtotime('m'));
            echo date(" Y", strtotime('m')); ?>
        </h1>
        <p>Aantal Events: 0</p>
        <form action="" method="post">
            <select name="Maand" id="month">
                <option value="Default" disabled selected>Select a month</option>
                <option value="January">Januari</option>
                <option value="February">Februari</option>
                <option value="March">Maart</option>
                <option value="April">April</option>
                <option value="May">Mei</option>
                <option value="June">Juni</option>
                <option value="July">Juli</option>
                <option value="August">Augustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
        $RTMONTH = date("F", strtotime('m'));
        if (!empty($_POST["Maand"])) {
            $inputMonth = $_POST["Maand"];
            if ($inputMonth == !null) {
                if ($_POST["Maand"] === $RTMONTH) {
                    echo "current month " . $RTMONTH . " is the same as the input month " . $inputMonth;
                } else {
                    echo "current month " . $RTMONTH . " is not the same as the input month " . $inputMonth;
                    var_dump("Input month: " . $_POST["Maand"]);
                    var_dump("Real time month: " . $RTMONTH);
                }
            } else {
                var_dump($inputMonth);
            }
        }


        ?>
        <?php
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Id</th><th>BandName</th><th></th><th>Genre</th></tr>";

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
                echo "<tr>";
            }

            function endChildren()
            {
                echo "</tr>" . "\n";
            }
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "EasyTiger-Patio";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM band");
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
        echo "</table>";
        ?>
        <br>
        <br>
        <br>
        <table>
            <tr>
                <th>Band name</th>
                <th>Date</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>the band</td>
                <td>time</td>
                <td>money</td>
            </tr>
        </table>
        <a href="./pages/create_event.php">create event</a>
        <a href="./pages/create_band.php">add a band</a>
    </body>

</html>