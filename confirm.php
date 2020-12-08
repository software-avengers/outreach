<?php

  // Turn on error reporting
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  //redirect if form has not been submitted
  if(empty($_POST)) {
    header("location: index.php");
  }
  //include file
  require ("includes/db.php");
  require ("includes/formFunctions.php");
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Reset CSS -->
  <link rel="stylesheet" type="text/css" href="css/reset.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <!-- Custom Styles -->
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

  <!-- Title -->
  <title>Outreach | Confirmation</title>
  <!--favicon-->
  <link rel="icon" type="image/jpg" href="images/awareness-4264012_1280.jpg">
</head>
<body>
<div class="container-fluid" id="main">
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <a class="navbar-brand" href="index.php">Outreach</a>
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
        <a class="nav-item nav-link" href="index.php">Home</a>
        <a class="nav-item nav-link" href="getinvolved.html">Get Involved</a>
      </div>
    </div>
  </nav>
  <section id="confirm">
    <div class="row justify-content-center">
      <div class="col-6 p-5 bg-dark">
        <h3>Your application has been received!</h3>
        <h4 class="pt-3">Application summary</h4>
        <?php
          $isValid = true;
          //check residency
          $residence = "";
          if(isset($_POST['residence']) AND validResidence($_POST['residence'])) {
            //echo "<p>Fill out what below</p>";
            $residence = $_POST['residence'];
          }elseif (isset($_POST['residence']) AND !validResidence($_POST['residence'])) {
            echo "<p>Invalid residence type</p>";
          }
          else {
            echo "<p>Please select your residency status</p>";
            $isValid = false;
          }

          //check input zipcode
          $zipcode = $_POST['inputZip'];
          $address = $_POST['address'];
          $address2 = $_POST['address2'];
          //$city = strtolower($_POST['city']);
          $city = ($_POST['city']); //need check
          //$state = strtolower($_POST['state']);
          $state = ($_POST['state']);//need check


          if ($residence == "yes"){
            if(empty($zipcode)){
              echo "<p>Zip code is required</p>";
            }else {
              if(!preg_match("/^\d{5}$/",$zipcode)) {
                echo "<p>Please enter a valid zip code</p>";
                $isValid = false;
              } else {
                if($zipcode == "98030" || $zipcode == "98031" || $zipcode == "98032" || $zipcode == "98042" || $zipcode == "98058") {
                  //validate address
                  $address = $_POST['address'];
                  if(empty($address)){
                    echo "<p>An address is required</p>";

                  } else {
                    if(!preg_match("/.{2,60}$/",$address)) {
                      echo "<p>Please enter a valid address</p>";
                      $isValid = false;
                    }

                  }
                  $address2 = $_POST['address2'];
                  if(!empty($address2)) {
                    if(!preg_match("/.{2,60}$/",$address2)) {
                      echo "<p>Please enter a valid address</p>";
                      $isValid = false;
                    }
                  }

                  //validating city
                  $city = strtolower($_POST['city']);
                  if(empty($city)){
                    echo "<p>A City is required</p>";

                  }

                  //validating state
                  $state = strtolower($_POST['state']);
                  if(empty($state)){
                    echo "<p>State is required</p>";

                  } else {
                    if($state != strtolower("WA") && $state != strtolower("WASHINGTON") ) {
                      echo "<p>You are outside of our service area</p>";
                      $isValid = false;
                    }
                  }
                }else {
                  echo "<p>You are outside of our service area</p>";
                }
              }
            }
          }
          //validate first name
          $fname = $_POST['fname'];
          if (empty($fname)) {
            echo "<p>First name is required</p>";
            $isValid = false;
          } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
              echo "<p>Invalid first name input</p>";
              $isValid = false;

            }
          }
          //validate last name
          $lname = $_POST['lname'];

          if (empty($lname)) {
            echo "<p>Last name is required</p>";
            $isValid = false;
          } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
              echo "<p>Invalid last name input</p>";
              $isValid = false;
            }
          }

          //validate email
          $email = $_POST['email'];
          if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Invalid email</p>";
            $isValid = false;
          }

          //validate phone
          $phone = $_POST['phone'];
          if(!empty($phone)) {
            if(!preg_match("/^\d{10}$/",$phone)) {
              echo "<p>Please enter a valid phone</p>";
              $isValid = false;
            }
          }
          if(empty($email) && empty($phone)) {
            echo "<p>Please enter email or phone. Email is prefer</p>";
          }

          $needs = "";
          if (isset($_POST['needs'])) {
            $needs = $_POST['needs'];
            if(!validServices($needs)) {
              echo "<p>Invalid input for service!</p>";
              return; //we been spoofed; stop processing
              //$isValid = false;
            }
            $needs = implode(", ", $_POST['needs']);
          } else {
            echo "<p>A service is required</p>";
          }

          $otherNeeds = $_POST['other'];

          //prevent sql injection
           $fname = mysqli_real_escape_string($cnxn, $fname);
           $lname = mysqli_real_escape_string($cnxn, $lname);
           $email = mysqli_real_escape_string($cnxn, $email);
           $phone = mysqli_real_escape_string($cnxn, $phone);
           $address = mysqli_real_escape_string($cnxn, $address);
           $address2 = mysqli_real_escape_string($cnxn, $address2);
           $city = mysqli_real_escape_string($cnxn, $city);
           $state = mysqli_real_escape_string($cnxn, $state);
           $zipcode = mysqli_real_escape_string($cnxn, $zipcode);
           $needs = mysqli_real_escape_string($cnxn, $needs);
           $otherNeeds = mysqli_real_escape_string($cnxn, $otherNeeds);



          $fullName = $fname ." ". $lname;
          $fullAddress = $address ." ". $address2 . $city .", ". strtoupper($state) ." ".$zipcode;
          if(isset($otherNeeds))
            $services = $needs .": ". $otherNeeds;
          else{
            $services = $needs;
          }
          //$date = date("F j, Y, g:i a");
          $fromEmail = "admin@software-avengers.greenriverdev.com";

          //save to database
          $sql = "INSERT INTO `requests`(`fname`, `lname`, `email`, `phone`, `address`, `city`, `state`, `zipcode`, `needs`,`otherNeeds`) VALUES 
                                        ('$fname' ,'$lname', '$email','$phone','$address $address2','$city','$state','$zipcode','$needs',' $otherNeeds')";

          $to = "spotter@mail.greenriver.edu";
          $subject = "New Applicant";
          $message = "Name: $fullName \r\n";
          $message .= "Phone: $phone \r\n";
          $message .= "Email: $email \r\n";
          $message .= "Address: $address $address2 $city , $state $zipcode \r\n";
          $message .= "Needs: $needs \r\n";
          $message.= "Other Needs (if applicable): $otherNeeds";
          $header = "Name: $fullName";


          //Print applicant summary
          echo "<p>Name: $fname $lname</p>";
          echo "<p>Phone: $phone</p>";
          echo "<p>Email: $email</p>";
          echo "<p>Address: $fullAddress</p>";
          echo "<p>Services requested: $services</p>";
          $success = mysqli_query($cnxn, $sql);
          if(!$success){
            echo "<p>Sorry...double check your information</p>";
            return;
          }
          $successMail = mail($to, $subject, $message, $header);
        ?>
<!--        <div class="row justify-content-center pt-3">-->
<!--          <div class="col-3"><button class="btn btn-primary" onclick="finalSubmit">Confirm</button></div>-->
<!--          <div class="col-3"><button class="btn btn-primary">Go Back</button></div>-->
<!--        </div>-->
      </div>
    </div>
  </section>
</div>
</body>
</html>


