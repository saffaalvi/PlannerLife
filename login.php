<!-- Bootstrap template: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_marketing&stacked=h -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="loginstyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
  session_start();
  // if logged in, they can't access the login page
  if (isset($_SESSION['id'])) {
    header("Location: index.php");
    die();
  }
?>

<?php
    // login error - alert user
    if (isset($_SESSION['error'])) {
        alert($_SESSION['error']);
        unset($_SESSION['error']); 
    }
    function alert($err) {
      echo "<script type='text/javascript'>alert('$err');</script>";
    }
?>

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
        <li><a href="product_page.php">All Products</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
            // login button if they are not logged in
            if (!isset($_SESSION['id'])) {
                echo '<li><a href="sign_up.php"><span class="glyphicon glyphicon-check"></span> Sign Up</a></li>'; 
                echo '<li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
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

<form action="check_user.php" method="POST">

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="password" name="password" required>

    <button type="submit">Login</button>
    
  </div>

  <div class="container">
    <button type="button" class="cancelbtn" onclick="location.href = 'index.php';">Cancel</button>
    <span class="password">Don't have an account? <a href="sign_up.php">Sign up now!</a></span>
  </div><br>
</form>
</div>

<!-- Footer -->
<footer class="container-fluid text-center">
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com">www.w3schools.com</a></p>
  <p>Created By Saffa Alvi</p>  
</footer>

</body>
</html>
