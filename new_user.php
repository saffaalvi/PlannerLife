<?php

    require_once 'connect.php';
    session_start();

    // user can't access this page, it should only be a POST request
    // take back to sign up page 
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: sign_up.php");
        die();
    }

    // get username, password, and confirmed password from input on sign up page
    $username = filter_input(INPUT_POST, 'username'); 
    $password = filter_input(INPUT_POST, 'password');
    $confirm_password = filter_input(INPUT_POST, 'confirm-password');

    // check if user exists in the database - User table
    $sql = "SELECT * FROM User WHERE username='$username'";
    $result = $connection->query($sql);

    // the user already exists
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = 'This username is already taken. Please login to the existing account or register with another username.';
        // back to sign up page
        header("Location: sign_up.php");
        die();
    }

    // entered passwords don't match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match! Please try again';
        // back to sign up page
        header("Location: sign_up.php");
        die();
    }

    // password validation - Must be at least 8 characters in length and have at least one upper and one lowercase character, one digit, and one special character
    $valid = preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password);

    if(!$valid) {
        $_SESSION['error'] = 'Password does not match specified format! Must be at least 8 characters in length and have at least one upper and one lowercase character, one digit, and one special character';
        // back to sign up page
        header("Location: sign_up.php");
        die();
    }

    // if it passes all checks, then add the new user
    $sql = "INSERT INTO User VALUES (NULL, '$username', '$password')";
    if ($connection -> query($sql)) {
        echo "New record is inserted successfully";
    } 
    else {
        echo "Error: ". $sql ."". $connection->error;
        header("Location: sign_up.php");
        die();
    }

    // take new user back to login
    header("Location: login.php");
    die();

?>
