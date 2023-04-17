<?php include("../header.php") ?>
<?php include('../connection.php') ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Registration system PHP and MySQL</title>
    </head>

    <body>
        <div class="header">
            <h2>Register</h2>
        </div>

        <form method="post" action="register.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <i class="fluent-icons-filled-20">number_symbol</i>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <i class="fluent-icons-filled-20">mention</i>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <i class="fluent-icons-filled-20">lock</i>
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <i class="fluent-icons-filled-20">lock_shield</i>
                <label>Confirm password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <p>
                Already have an account? <a href="login.php">Sign in</a> here
            </p>
        </form>
    </body>

</html>