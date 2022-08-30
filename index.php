<!-- Bootstrap template: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_marketing&stacked=h -->

<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage</title>
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="product_page.php">All Products</a></li>
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

<div class="container text-center">    
  <h3>Bestsellers</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="1.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Notebook - Moon</p>
    </div>
    <div class="col-sm-4">
      <img src="6.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Weekly Planner - Leaves</p>
    </div>
    <div class="col-sm-4">
      <img src="7.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Weekly Planner - Vertical</p>
    </div>
  </div>
</div><br>

<br>
<div class="container text-center">    
  <button type="button" class="btn btn3" onclick="location.href = 'product_page.php';">Shop All Products</button>
</div>
<br>
<br>

<div class="container text-center">    
  <h3>New Products</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="4.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Notebook - Heart</p>
    </div>
    <div class="col-sm-4">
      <img src="5.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Weekly Planner - Oranges</p>
    </div>
    <div class="col-sm-4">
      <img src="8.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Weekly Planner - Vertical Grey</p>
    </div>
  </div>
</div><br>
</div>

<!-- Footer -->
<footer class="container-fluid text-center">
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com">www.w3schools.com</a></p>
  <p>Created By Saffa Alvi</p>  
</footer>

</body>
</html>
