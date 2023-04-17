<?php
include_once('header.php');

// initializing variables
$username = "";
$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'EasyTiger-Patio');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM admin WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO admin (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: login.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: account.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

// Create Band
if (isset($_POST['create_band'])) {
    // receive all input values from the form
    $bandname = mysqli_real_escape_string($db, $_POST['bandname']);
    $genre = mysqli_real_escape_string($db, $_POST['genre']);
    $herkomst = mysqli_real_escape_string($db, $_POST['herkomst']);
    $omschrijving = mysqli_real_escape_string($db, $_POST['omschrijving']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($bandname)) {
        array_push($errors, "bandname is required");
    }
    if (empty($genre)) {
        array_push($errors, "genre is required");
    }
    if (empty($herkomst)) {
        array_push($errors, "herkomst is required");
    }
    if (empty($omschrijving)) {
        array_push($errors, "omschrijving is required");
    }

    // first check the database to make sure 
    // a band does not already exist with the same bandname 
    $band_check_query = "SELECT * FROM band WHERE bandname='$bandname' OR herkomst='$herkomst' LIMIT 1";
    $result = mysqli_query($db, $band_check_query);
    $band = mysqli_fetch_assoc($result);

    if ($band) { // if bandname exists
        if ($band['bandname'] === $bandname) {
            array_push($errors, "bandname already exists");
        }

        if ($band['herkomst'] === $herkomst) {
            array_push($errors, "herkomst already exists");
        }
    }

    // Finally, register band if there are no errors in the form
    if (count($errors) == 0) {

        $query = "INSERT INTO band (bandname, genre, herkomst, omschrijving) 
  			  VALUES('$bandname', '$genre', '$herkomst', '$omschrijving')";
        mysqli_query($db, $query);
        header('location: link_event_band.php');
    }
}

// Create Event
if (isset($_POST['create_event'])) {
    // receive all input values from the form
    $eventname = mysqli_real_escape_string($db, $_POST['eventname']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $price = mysqli_real_escape_string($db, $_POST['price']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($eventname)) {
        array_push($errors, "eventname is required");
    }
    if (empty($date)) {
        array_push($errors, "date is required");
    }
    if (empty($time)) {
        array_push($errors, "time is required");
    }
    if (empty($price)) {
        array_push($errors, "price is required");
    }

    // first check the database to make sure 
    // a band does not already exist with the same bandname 
    $event_check_query = "SELECT * FROM event WHERE eventname='$eventname' LIMIT 1";
    $result = mysqli_query($db, $event_check_query);
    $event = mysqli_fetch_assoc($result);

    if ($event) { // if bandname exists
        if ($event['eventname'] === $eventname) {
            array_push($errors, "eventname already exists");
        }
    }

    // Finally, register band if there are no errors in the form
    if (count($errors) == 0) {

        $query = "INSERT INTO event (eventname, date, time, price) 
  			  VALUES('$eventname', '$date', '$time', '$price')";
        mysqli_query($db, $query);
        header('location: link_event_band.php');
    }
}

// Link event & band
if (isset($_POST['link_event_band_off'])) { //TURNED OFF
    // receive all input values from the form
    $bandname = mysqli_real_escape_string($db, $_POST['bandname']);
    $genre = mysqli_real_escape_string($db, $_POST['genre']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($bandname)) {
        array_push($errors, "bandname is required");
    }
    if (empty($genre)) {
        array_push($errors, "genre is required");
    }

    // first check the database to make sure 
    // a band does not already exist with the same bandname 
    $band_check_query = "SELECT * FROM band WHERE bandname='$bandname' OR herkomst='$herkomst' LIMIT 1";
    $result = mysqli_query($db, $band_check_query);
    $band = mysqli_fetch_assoc($result);

    if ($band) { // if bandname exists
        if ($band['bandname'] === $bandname) {
            array_push($errors, "bandname already exists");
        }

        if ($band['herkomst'] === $herkomst) {
            array_push($errors, "herkomst already exists");
        }
    }

    // Finally, register band if there are no errors in the form
    if (count($errors) == 0) {

        $query = "INSERT INTO band (bandname, genre, herkomst, omschrijving) 
  			  VALUES('$bandname', '$genre', '$herkomst', '$omschrijving')";
        mysqli_query($db, $query);
        header('location: link_event_band.php');
    }
}