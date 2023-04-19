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
            <?php
            if (isset($selectedmonth)) {
                // MONTH
                echo $selectedMonthName;
                // YEAR
                if ($_POST['select_month_list'] >= date('n')) {
                    $year = date('Y');
                    echo " " . $year;
                } else {
                    $year = date('Y', strtotime('+1 years'));
                    echo " " . $year;
                }
            }
            ?>
        </h1>
        <!-- Search for event count -->
        <?php
        if (isset($selectedmonth)) {
            echo "Aantal Events: ";
        }
        if (isset($selectedmonth)) {
            $sql = "SELECT * FROM event WHERE MONTH(date) = " . $_POST['select_month_list'];
            if ($result = mysqli_query($db, $sql)) {
                // Return the number of rows in result set
                $rowcount = mysqli_num_rows($result);
                printf("%d ", $rowcount);
                // Free result set
                mysqli_free_result($result);
            }
        }
        ?>
        <form action="" method="post">
            <select name="select_month_list" id="month">
                <option value="Default" disabled selected>Select a month</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maart</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Augustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <button type="submit" name="select_month" value="Submit">Select</button>
        </form>
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