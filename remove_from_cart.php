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

    // get the product id and quantity to remove
    $pid = $_POST['product_id'];
    $num = $_POST['num'];

    // get product
    $sql = "SELECT * FROM Cart WHERE uid=$uid AND pid=$pid";
    $result = $connection->query($sql);

    // update product quantity
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $sum = $row["quantity"] - $num;
        $connection->query("UPDATE Cart SET quantity=$sum WHERE uid=$uid AND pid=$pid");
    }

    // delete products that have a quantity of 0
    $sql = "DELETE FROM Cart WHERE quantity=0";
    if ($connection -> query($sql)) {
        echo "Product deleted successfully";
    } else {
        echo "Error: ". $sql ."". $connection->error;
        header("Location: cart.php");
        die();
    }

    // go back to cart page
    header("Location: cart.php");
    die();

?>
