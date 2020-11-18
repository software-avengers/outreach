<?php

// Turn on error reporting
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//redirect if form has not been submitted
if(empty($_POST)) {
    header("location: index.php");
}
//Set the time zone
date_default_timezone_set('America/Los_Angeles');

//include file
    require ('includes/db.php');
?>
<!--
  Authors: Ruslan Bessarab, Patrick Dang, Shawn Potter, Thanh Tran
 -->

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Reset CSS -->
  <link rel="stylesheet" href="styles/reset.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="styles/bootstrap.min.css">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="styles/styles.css">

  <!-- Title -->
  <title>The Outreach</title>
  <link rel="icon" type="image/jpg" href="images/awareness-4264012_1280.jpg">
</head>
<body>
<!-- Container Start -->
<div class="container-fluid px-0" id="main">

  <!-- Navbar Container -->
  <div class="container-fluid m-0 p-0" id="nav-container">

    <!-- Navbar  -->
    <div class="container-fluid m-0 p-0">

      <!-- Nav -->
      <nav class="navbar fixed-top bg-dark navbar-dark navbar-expand-lg m-0" id="navbar">
        <a class="navbar-brand" href="#">The Outreach</a>

        <!-- Toggler Button for smaller screens -->
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Div to contain the navigation menu in the toggler -->
        <div class="collapse navbar-collapse pl-5" id="navbarSupportedContent">

          <!-- Nav Bar Links -->
          <ul class="navbar-nav">

            <!-- Home anchor -->
            <li class="nav-item">
              <a class="nav-link" href="../#main">
                <span data-toggle="collapse" data-target=".navbar-collapse.show">Home</span>
              </a>
            </li>

            <!-- About anchor -->
            <li class="nav-item">
              <a class="nav-link" href="../#about">
                <span data-toggle="collapse" data-target=".navbar-collapse.show">About Us</span>
              </a>
            </li>

            <!-- Services anchor -->
            <li class="Services">
              <a class="nav-link" href="../#services">
                <span data-toggle="collapse" data-target=".navbar-collapse.show">Services</span>
              </a>
            </li>

            <!-- Visit anchor -->
            <li class="nav-item">
              <a class="nav-link" href="../#visit">
                <span data-toggle="collapse" data-target=".navbar-collapse.show">Directions</span>
              </a>
            </li>

            <!-- Booking anchor -->
            <li class="nav-item">
              <a class="nav-link" href="../#booking">
                <span data-toggle="collapse" data-target=".navbar-collapse.show">Book Appointment</span>
              </a>
            </li>

            <!-- Qualify anchor -->
            <li class="nav-item">
              <a class="nav-link" href="../#qualify">
                <span data-toggle="collapse" data-target=".navbar-collapse.show">Do You Qualify?</span>
              </a>
            </li>

            <!-- Other resources anchor -->
            <li class="nav-item">
              <a class="nav-link" href="../#resources">
                <span data-toggle="collapse" data-target=".navbar-collapse.show">Other Resources</span>
              </a>
            </li>

            <!-- Get Involved anchor -->
            <li class="nav-item">
              <a class="nav-link" href="getinvolved.html">
                <span data-toggle="collapse" data-target=".navbar-collapse.show">Get Involved</span>
              </a>
            </li>

            <!-- Table -->
            <li class="nav-item pl-5">
              <a class="nav-link" href="requests.php">
                <span data-toggle="collapse" data-target=".navbar-collapse.show">Admin</span>
              </a>
            </li>

          </ul>

        </div>

      </nav>

    </div>

  </div>

  <!-- Header picture -->
    <!--<h3>Please check if the information below is correct!</h3>-->
    <div class="container">
      <h4>Application summary</h4>
      <?php
    //get post array
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['inputZip'];
    $needs = implode(", ", $_POST['needs']);
    $otherNeeds = $_POST['other'];
    $fullName = $fname ." ". $lname;
    $fullAddress = $address ." ". $address2 ."<br>". $city .", ". $state ." ".$zipcode;
    $assistance = $needs;
    //$date = date("F j, Y, g:i a");
    $fromEmail = "spotter@mail.greenriver.edu";

    //save to database
     /*$sql = "INSERT INTO `applicant`(`fname`, `lname`, `email`, `phone`, `address`, `city`, `state`, `zipcode`, `assistanceNeed`) VALUES
    ('$fname' ,'$lname', '$email','$phone','$address $address2','$city','$state','$zipcode','$needs ($otherNeeds)')";*/
    $sql = "INSERT INTO `requests`(`fname`, `lname`, `email`, `phone`, `address`, `city`, `state`, `zipcode`, `needs`,`otherNeeds`) VALUES 
    ('$fname' ,'$lname', '$email','$phone','$address $address2','$city','$state','$zipcode','$needs',' $otherNeeds')";

     $success = mysqli_query($cnxn, $sql);
     if(!$success){
         echo "<p>Sorry...there was a database error</p>";
         return;
     }
    //Print applicant summary
    echo "<p>Name: $fname $lname</p>";
    echo "<p>Phone: $phone</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Address: $fullAddress</p>";
    echo "<p>Needs: $needs</p>";
    echo "<p>Other Needs (if applicable): $otherNeeds</p>";


    //send email
    $to = "patrickdang@live.com";
    $subject = "New Applicant";
    $message = "Name: $fullName \r\n";
    $message .= "Phone: $phone \r\n";
    $message .= "Email: $email \r\n";
    $message .= "Address: $address $address2 \r\n";
    $message .= "$city , $state $zipcode \r\n";
    $message .= "Needs: $assistance \r\n";
    $message.= "Other Needs (if applicable): $otherNeeds";
    $header = "Name: $fullName";

    $successMail = mail($to, $subject, $message, $header);


    if($success)
        echo "<p>Your request has been received, we will be in touch soon.</p>";
    else
        echo "<p>Sorry there was an error. Please try again.</p>";
    ?>
    </div>
</div>
</body>