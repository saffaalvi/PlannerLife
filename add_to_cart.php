<?php

    require_once 'connect.php';
    session_start();

    // user can't access this page, it should only be a POST request
    // take back to product page 
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: product_page.php");
        die();
    }

    // get the user id of the logged in user
    $uid = $_SESSION['id'];

    // get the product id and quantity
    $pid = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $sql = "SELECT * FROM Cart WHERE uid=$uid AND pid=$pid";
    $result = $connection->query($sql);

    // product isn't in the user's cart, add it in
    if (mysqli_num_rows($result) <= 0) {
        $connection->query("INSERT INTO Cart VALUES ($uid, $pid, $quantity)");
    }
    // product is in user's cart, update the quantity
    else {
        $row = $result -> fetch_assoc();
        $newtotal = $row["quantity"] + $quantity;
        $connection->query("UPDATE Cart SET quantity=$newtotal WHERE uid=$uid AND pid=$pid");
    }

    // take back to product page
    header("Location: product_page.php");
    die();

?>
