<!-- Bootstrap template: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_marketing&stacked=h -->

<?php
    require_once 'connect.php';
    session_start();

    // if not logged in, they can't access the cart
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="main">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="product_page.php">All Products</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a class="nav-link" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
    <img src="plannerlife.png" alt="Image">
</div>
<br>
<br>

<div class="container">
  <h2>Your Cart</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Remove from cart</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT Cart.quantity, Product.id, Product.name, Product.price FROM Cart, Product WHERE Cart.uid = ".$_SESSION['id']." AND Cart.pid = Product.id;";
        $result = $connection->query($sql);
        global $total_price;
        global $total_quan;
        while($row = $result -> fetch_assoc()) {
            echo '<tr>
                <td>'.$row["name"].'</td>
                <td>'.$row["quantity"].'</td>
                <td>$'.$row["quantity"] * $row["price"].'</td>
                <td>
                  <form class="form-row align-items-center" method="POST" action="remove_from_cart.php">
                    <input type="number" min="1" value="1" max="'.$row["quantity"].'" name="num">
                    <input type="hidden" name="product_id" value="'.$row["id"].'">
                    <button type="submit" class="btn btn2" style="float:right";>Remove from cart</button>
                  </form> 
                </div>
                </td>
            </tr>';
            $total_price += ($row["price"] * $row["quantity"]);
            $total_quan += ($row["quantity"]);
        }
        echo '<td colspan="1"><strong>Subtotal:</td>
              <td><strong>'.$total_quan.'</td>
              <td colspan="1"><strong>$'.$total_price.'</strong></td>
              <td></td>';
    ?>
    </tbody>
  </table>
</div>	
      </div>

<!-- Footer -->
<footer class="container-fluid text-center">
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com">www.w3schools.com</a></p>
  <p>Created By Saffa Alvi</p>  
</footer>

</body>
</html>

