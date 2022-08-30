<?php

    require_once 'connect.php';
    session_start();

    // user can't access this page, it should only be a POST request
    // take back to login page 
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: login.php');
        die();
    }

    // get username and password from input on login page
    $username = filter_input(INPUT_POST, 'username'); 
    $password = filter_input(INPUT_POST, 'password');

    // check if user exists in the database - User table
    $sql = "SELECT * FROM User WHERE username='$username'";
    $result = $connection->query($sql);

    // user doesn't exist
    if (mysqli_num_rows($result) <= 0) {
        $_SESSION['error'] = 'User does not exist.';
        header("Location: login.php");
        die();
    }

    // user exists - get user data
    $row = $result -> fetch_assoc();

    // make sure password entered by user matches the one in the database
    // if it doesn't then set the error msg and redirect back to the login page
    if ($password !== $row['password']) 
    {
        $_SESSION['error'] = 'The password is incorrect. Please try again.';
        header("Location: login.php");
        die();
    }

    // set the session id and redirect to homepage
    // keeps track of user logged in 
    $_SESSION['id'] = $row['id'];
    header("Location: index.php");
    die();

?>
