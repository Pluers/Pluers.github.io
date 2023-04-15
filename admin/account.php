<?php include("../header.php") ?>
<?php

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /Pluers.github.io/admin/login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: /Pluers.github.io/admin/login.php");
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Account</title>
    </head>

    <body>

        <div class="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="error success">
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <!-- logged in user information -->
            <?php if (isset($_SESSION['username'])): ?>
                <p>Welcome <strong>
                        <?php echo $_SESSION['username']; ?>
                    </strong></p>
                <p> <a href="account.php?logout='1'" style="color: red;">logout</a> </p>
            <?php endif ?>
        </div>

    </body>

</html>