<?php include("../header.php") ?>
<?php include('../connection.php') ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Registration system PHP and MySQL</title>
    </head>

    <body>
        <div class="header">
            <h2>Login</h2>
        </div>

        <form method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <i class="fluent-icons-filled-20">number_symbol</i>
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <i class="fluent-icons-filled-20">lock</i>
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_user">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php">
                    <i class="fluent-icons-filled-20">person_add</i>
                    Sign up
                </a>
            </p>
        </form>
    </body>

</html>