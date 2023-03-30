<!DOCTYPE html>
<html>

    <head>
        <?php include_once("header.php") ?>
    </head>

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