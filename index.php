<!DOCTYPE html>
<html>

    <head>
        <?php include_once("header.php") ?>
        <?php include('connection.php') ?>
        <link rel="stylesheet" href="/Pluers.github.io/style/index.css">
    </head>

    <body>

        <h1>
            Agenda
            <?php echo date("F", strtotime('m'));
            echo date(" Y", strtotime('m')); ?>
        </h1>
        <p>Aantal Events:
            <!-- Search for event count -->
            <?php
            $sql = "SELECT * FROM event";
            if ($result = mysqli_query($db, $sql)) {
                // Return the number of rows in result set
                $rowcount = mysqli_num_rows($result);
                printf("%d ", $rowcount);
                // Free result set
                mysqli_free_result($result);
            }
            ?>
        </p>
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
            <button type="submit" name="select_month" value="Submit">Select</button>
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
        // echo "<table style='border: solid 1px black;'>";
        // echo "<tr><th>Id</th><th>BandName</th><th></th><th>Genre</th></tr>";
        
        // function show_records($mysql_link)
        // {
        //     date_default_timezone_set('Europe/London');
        //     $today = date('Y/m/d');
        //     $future = date('Y-m-d', strtotime("+10 months", strtotime($today)));
        

        //     $q = "SELECT number,startdate,traction,tourname,start,fares,tourcompany
        //             FROM specials
        //             WHERE startdate>='$today' AND startdate<='$future' AND steam='y'
        //             ORDER BY startdate";
        

        //     $r = mysqli_query($mysql_link, $q);
        //     $lastmonth = "";
        //     if ($r) {
        //         echo "<Table id='customers'>
        //         <tr>
        //         <th>Date</th>
        //         <th>Locomotive</th>
        //         <th>Organiser</th>
        //         <th>Name</th>
        //         <th>Pick Up Points</th>
        //         <th>Destination</th>
        //         <th>Fares</th>
        //         </tr>";
        
        //         while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        //             $parts = explode('-', $row['startdate']);
        //             $timestamp = strtotime($row['startdate']);
        //             $parts2 = date('YM', $timestamp);
        
        //             if (empty($lastmonth) || $lastmonth != $parts2) {
        
        //                 if (!empty($lastmonth)) {
        //                     echo '</table>';
        //                 }
        //                 echo "<h1>$parts2</h1>";
        //                 echo "<table id='customers'>";
        //                 $lastmonth = $parts2;
        

        //                 echo "<tr>";
        //                 echo "<td>" . $parts2 . "</td>";
        //                 echo "<td>" . $row['traction'] . "</td>";
        //                 echo "<td>" . $row['tourcompany'] . "</td>";
        //                 echo "<td>" . $row['tourname'] . "</td>";
        //                 echo "<td>" . $row['start'] . "</td>";
        //                 echo "<td>" . $row['end'] . "</td>";
        //                 echo "<td>" . $row['fares'] . "</td>";
        //                 echo "</tr>";
        
        //             }
        //             echo "</Table>";
        //         }
        
        //     } else {
        //         echo '<p>' . mysqli_error($mysql_link) . '</p>';
        //     }
        // }
        // show_records($mysql_link);
        
        // mysqli_close($mysql_link);
        
        // ?>
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