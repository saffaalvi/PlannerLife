<!-- Bootstrap template: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_marketing&stacked=h -->

<?php
    require_once 'connect.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Products</title>
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
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="product_page.php">All Products</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
            // login button if they are not logged in
            if (!isset($_SESSION['id'])) {
                echo '<li><a href="sign_up.php"><span class="glyphicon glyphicon-check"></span> Sign Up</a></li>'; 
                echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
            }
            // logout and cart button if they are logged in
            else
            {
                echo '<li><a class="nav-link" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>';
                echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
            }
        ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
    <img src="plannerlife.png" alt="Image">
</div>
<br>
<br>

<div class="row">
    <?php
        $result = $connection->query("SELECT * FROM Product WHERE 1");
        while($row = $result->fetch_assoc()) {
          // if not logged in, they can't add to cart
          if (!isset($_SESSION['id'])) {
            echo '<div class="col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading" style="color: black; text-align: center;">'.$row["name"].'</div>
                <div class="panel-body"><img src="'.$row["path"].'" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Price: $'.$row["price"].'<br><br>
                <p> Please <a href="sign_up.php">sign up</a> or <a href="login.php">login</a> to add items to your cart </p> 
                </div>            
            </div>
            </div>';
          } else {
            echo '<div class="col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading" style="color:black; text-align: center;">'.$row["name"].'</div>
                <div class="panel-body"><img src="'.$row["path"].'" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Price: $'.$row["price"].'<br><br>
                <form class="form-row align-items-center" method="POST" action="add_to_cart.php">
                <input type="number" min="1" value="1" name="quantity">
                <input type="hidden" name="product_id" value="'.$row["id"].'"><br><br>
                <button type="submit" class="btn btn2">Add to cart</button>
                </form> 
                </div>            
            </div>
            </div>';
          }
            
        }
    ?>
</div>
</div>

<!-- Footer -->
<footer class="container-fluid text-center">
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com">www.w3schools.com</a></p>
  <p>Created By Saffa Alvi</p>  
</footer>

</body>
</html>

