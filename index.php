<!DOCTYPE html>
<html>

    <body>

        <h1>Agenda
            <?php echo date("F", strtotime('m'));
            echo date(" Y", strtotime('m')); ?>
        </h1>
        <p>Aantal Events: 0</p>
        <form action="" method="post">
            <select name="Maand" id="month">
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
        $inputMonth = $_POST["Maand"];
        if ($_POST["Maand"] === $RTMONTH) {
            echo "current month " . $RTMONTH . " is the same as the input month " . $inputMonth;
        } else {
            echo "current month " . $RTMONTH . " is not the same as the input month " . $inputMonth;
            var_dump($_POST["Maand"]);
            var_dump($RTMONTH);
        }
        ?>

        <table>

        </table>

    </body>

</html>