<?php
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start session
session_start();

//Initialize variables
$err = false;
$username = "";

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require('includes/admincreds.php');
    if ($username == $adminUser && $password == $adminPassword) {
      $_SESSION['loggedin'] = true;
      //Redirect to page the user was on, or index page
      if (!isset($_SESSION['page'])) {
        $_SESSION['page'] = 'requests.php';
      }
      header("location: " . $_SESSION['page']);
    }
    $err = true;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/login_styles.css">
    <style>
        .err {
            color: darkred;
        }
    </style>
</head>
<body class="bg-secondary">
<div class="container form">
  <!--Navbar-->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <a class="navbar-brand" href="#">Outreach</a>
    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="index.php">Home</a>
        <a class="nav-item nav-link" href="getinvolved.html">Get Involved</a>
      </div>
    </div>
  </nav>
  <div class="row">
    <div class="col">
      <h1 class="main">Login</h1>

      <form class="frm" action="#" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username"
            <?php echo "value='$username' " ?>
          >
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" >
        </div>

        <?php if ($err) : ?>
          <span class="err">Incorrect login</span><br>
        <?php endif;?>

        <button type="submit" class="btn btn-primary button">Login</button>
      </form>
    </div>
  </div>
</div>

<script src="js/jquery.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>