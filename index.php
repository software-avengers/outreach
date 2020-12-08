<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  require('includes/db.php');

  $sql = "SELECT form_status FROM form";
  $result = mysqli_query($cnxn, $sql);
  foreach($result as $col){
    //var_dump($row);
    $status = $col['form_status'];
  }
?>
<!DOCTYPE html>
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
  <title>Outreach</title>
  <!--favicon-->
  <link rel="icon" type="image/jpg" href="images/awareness-4264012_1280.jpg">
</head>
<body>
  <div class="container-fluid" id="main"> <!--Main Container-->
    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark shadow-sm">
      <a class="navbar-brand" href="#main">Outreach</a>
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
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#about">About Us</a>
          <a class="nav-item nav-link" href="#services">Services</a>
          <a class="nav-item nav-link" href="#booking">Book Appointment</a>
          <a class="nav-item nav-link" href="#qualify">Do You Qualify?</a>
          <a class="nav-item nav-link" href="#resources">Other Resources</a>
          <a class="nav-item nav-link" href="#directions">Directions</a>
          <a class="nav-item nav-link" href="getinvolved.html">Get Involved</a>
        </div>
      </div>
    </nav>

    <!--Header Image-->
    <header class="row justify-content-center">
      <div class="col">
        <img class="img-header rounded-lg" alt="hands reaching out to each other" src="images/awareness-4264012_1280.jpg">
      </div>
    </header>

    <!--About Section-->
    <section class="" id="about">
      <div class="row justify-content-center">
        <div class="col bg-dark py-3 textDiv">
          <h2>About Us!</h2>
          <hr>
          <p>The Outreach provides low-income Kent residents and the homeless
            with food, water, clothing, utility shut-off assistance, drivers
            licenses and IDs, and referral information. We also provide school
            supplies and household furnishings, when they are available. Those
            seeking help must live within the Kent school district, be disabled,
            have children living with them, or are senior citizens. We always
            help the homeless.</p>
        </div>
      </div>
    </section>

    <!--Services Section-->
    <section id="services">
      <div class="row justify-content-center">
        <div class="col bg-dark pt-3 textDiv">
          <h2>How We Can Help</h2>
          <hr>
          <div class="row">
            <div class="col-lg shadow-sm bg-dark">
              <div class="card bg-dark">
                <img src="images/home.svg" alt="house icon" class="card-img-top service-icon mt-3">
                <div class="card-body">
                  <p class="card-title"><strong>Utilities or Rent</strong></p>
                  <p class="card-text">One time per calender year. Person seeking help must be the name on the bill. Must have urgent or shut-off notice.</p>
                </div>
              </div>
            </div>

            <div class="col-lg shadow-sm bg-dark">
              <div class="card bg-dark">
                <img src="images/location-gas-station.svg" alt="gas" class="card-img-top service-icon mt-3">
                <div class="card-body">
                  <p class="card-title"><strong>Gas Voucher</strong></p>
                  <p class="card-text">Every six months. Must have a valid/current Driver's license (not ID card).</p>
                </div>
              </div>
            </div>

            <div class="col-lg shadow-sm bg-dark">
              <div class="card bg-dark">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="card-img-top service-icon mt-3 bi bi-cart4" fill="#ff0029" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>

                <div class="card-body">
                  <p class="card-title"><strong>Thrift Store Voucher</strong></p>
                  <p class="card-text">Every six months. Good for clothing items and small household items. Thrift store hours (TBA).</p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 shadow-sm bg-dark">
              <div class="card bg-dark">
                <img src="images/drivers-license.svg" alt="id" class="card-img-top service-icon mt-3">
                <div class="card-body">
                  <p class="card-title"><strong>Driver's License or ID Card</strong></p>
                  <p class="card-text">For ID card, check with DSHS to see if you qualify
                    for voucher, we'll cover the difference. <br>An appointment will be scheduled to meet with you
                    at the Dept of Licensing.<br><strong><a href="https://goo.gl/maps/DGQLLdt7KJu3Mucv9">Map to Kent DOL</a></strong></p>
                </div>
              </div>
            </div>

            <div class="col-lg shadow-sm bg-dark">
              <div class="card bg-dark">
                <img src="images/spoon-knife.svg" alt="food" class="pt-2 card-img-top service-icon mt-3">
                <div class="card-body">
                  <p class="card-title"><strong>Food & Toiletries</strong></p>
                  <p class="card-text">We help with food and emergency toiletries as well.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!--Booking Section-->
    <section id="booking">
      <div class="row justify-content-center">
        <div class="col bg-dark py-3 textDiv">
          <h2>Book An Appointment</h2>
          <hr>
          <p>
            Appointments are made first come first served. Online form is only accessible
            during business hours. If you cannot access form it is either outside of
            business hours or we have filled our appointments for the week. Please try
            again next Monday beginning at 1:00PM. <br>
            <strong><a href="tel:253-852-4100">(253) 852-4100</a></strong><br>
            <strong><em>OR</em></strong><br>
            You can fill out the form below...
          </p>
        </div>
      </div>
    </section>

    <!--Form Section-->
    <section id="qualify">
      <div class="row">
        <div class="col bg-dark py-3 textDiv">
          <!--Residence Question-->
          <?php
            if($status == 1){
              echo '<form name="contactForm" id="contactForm" method="post" action="confirm.php">';
            } else{
              echo '<form name="contactForm" id="contactForm" method="post" action="confirm.php" class="d-none">';
            }
          ?>
            <fieldset class="pb-5">
              <legend>Do you have a Place of Residence?</legend>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input residence" id="residence-yes" onclick="choose()" name="residence" value="yes">
                <label class="custom-control-label" for="residence-yes">Yes</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input residence" id="residence-no" onclick="choose()" name="residence" value="no">
                <label class="custom-control-label" for="residence-no">No</label>
              </div>
            </fieldset>

            <!--Zipcode check-->
            <fieldset class="pb-5 zip d-none" id="zipcode">
              <legend>Please Enter Your Zip Code:</legend>
              <!-- input for zipcode -->
              <div class="form-row">
                <div class="input-group col-md-3">
                  <label class="col-form-label sr-only" for="inputZip">Zip Code</label>
                  <input class="form-control" id="inputZip" name="inputZip" type="text" placeholder="Zipcode">
                  <div class="input-group-append">
                    <button class="btn btn-info" id="checkZip" type="button">Check</button>
                  </div>
                </div>
              </div>
              <span class="text-danger d-none" id="err-zip">Sorry, you are outside our service area</span>
            </fieldset>

            <fieldset class="d-none hidden" id="contact-info">
              <legend>Contact Information</legend>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label class="col-form-label" for="fname">First Name</label>
                  <input type="text" class="form-control" id="fname" name="fname">
                  <span class="text-danger d-none" id="err-fname">Please enter a first name</span>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label class="col-form-label" for="lname">Last Name</label>
                  <input type="text" class="form-control" id="lname" name="lname">
                  <span class="text-danger d-none" id="err-lname">Please enter a last name</span>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label class="col-form-label" for="email">Email Address</label>
                  <input type="text" class="form-control" id="email" name="email">
                  <span class="text-danger d-none" id="err-invalidemail">Please enter a valid email address</span>
                  <span class="text-danger d-none" id="err-email">Please enter an email or phone number</span>
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-4">
                  <label class="col-form-label" for="phone">Phone Number</label>
                  <input type="text" class="form-control" id="phone" name="phone" maxlength="10" placeholder="123-456-7890">
                  <span class="text-danger d-none" id="err-phone">Please enter an email or phone number</span>
                </div>
              </div>
            </fieldset>

            <fieldset class="address-info d-none">
              <legend>Address</legend>
              <div class="form-row addressField">
                <div class="form-group col-md-7">
                  <label class="col-form-label sr-only" for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                  <span class="text-danger d-none" id="err-address">Address is required</span>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-7">
                  <label class="col-form-label sr-only" for="address2">Address 2 (Optional)</label>
                  <input type="text" class="form-control" id="address2" name="address2" placeholder="Address 2 (optional)">
                </div>
              </div>
            </fieldset>

            <fieldset class="address-info d-none">
              <div class="form-row">
                <div class="addressField form-group col-md-4">
                  <label class="col-form-label sr-only" for="city">City</label>
                  <input type="text" class="form-control pr-0" id="city" name="city" placeholder="City">
                  <span class="d-none text-danger d-none" id="err-city">City is required</span>
                </div>

                <div class="addressField form-group col-md-3">
                  <label class="col-form-label sr-only" for="state">State</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="State">
                  <span class="d-none text-danger d-none" id="err-state">State is required</span>
                </div>
              </div>
            </fieldset>

            <fieldset class="d-none hidden">
              <legend>What services do you need?</legend>
              <div class="form-row">
                <div class="form-group col" id="needHelps" onclick="otherNeed()">

                  <!-- utilities checkbox -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="needs-utilities" name="needs[]" value="utilities">
                    <label class="custom-control-label" for="needs-utilities">Utilities</label>
                  </div>
                  <span class="upload-warning text-warning d-none" id="utilities-warning">Please be prepared to present a copy of your utilities bill(s)</span>

                  <!-- rent checkbox -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="needs-rent" name="needs[]" value="rent">
                    <label class="custom-control-label" for="needs-rent">Rent</label>
                  </div>
                  <span class="upload-warning text-warning d-none" id="rent-warning">Please be prepared to present a copy of your rent bill</span>

                  <!-- gas checkbox -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="needs-gas" name="needs[]" value="gas">
                    <label class="custom-control-label" for="needs-gas">Gas Voucher</label>
                  </div>
                  <span class="upload-warning text-warning d-none" id="gas-warning">Please be prepared to present a copy of your Driver's License</span>

                  <!-- thrift voucher checkbox -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="needs-thrift" name="needs[]" value="thrift">
                    <label class="custom-control-label" for="needs-thrift">Thrift Store Voucher</label>
                  </div>
                  <!-- food/toiletries checkbox -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="needs-food" name="needs[]" value="food">
                    <label class="custom-control-label" for="needs-food">Food or Toiletries</label>
                  </div>
                  <!-- others checkbox -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="others" name="needs[]" value="others">
                    <label class="custom-control-label" for="others">Other</label>
                  </div>
                  <div class="form-group d-none" id="otherNeeds">
                    <label for="other">Please specify:</label>
                    <input class="form-control" id="other" type="text" name="other" placeholder="Enter other assistance that you need help with">
                  </div>
                  <span class="text-danger d-none" id="err-needsHelp">Please choose your needs</span>
                </div>
              </div>
            </fieldset>
            <div class="form-group hidden form-row d-none">
              <!-- Form Submit Button -->
              <div class="formSubmit col-auto" id="submit">
                <input class="btn btn-primary" type="submit" id="submitButton" value="Submit">
              </div>
            </div>
          </form>

          <?php
            if($status == 1){
              echo '<div class="d-none" id="outsideHours">';
            } else{
              echo '<div id="outsideHours">';
            }
          ?>
            <h2>We are currently unavailable. Please check back later.</h2>
          </div>
        </div>
      </div>
    </section>

    <!--Other Resource Section-->
    <section id="resources">
      <div class="row justify-content-center">
        <div class="col bg-dark textDiv pt-3">
          <h2>Other Resources</h2>
          <hr>
          <div class="row justify-content-center">
            <div class="col bg-dark shadow-sm pt-3 mb-2">
              <div class="card bg-dark p-2 resource-cards">
                <img src="images/211-logo.svg" alt="logo for 211" class="card-img-top resource-logo rounded">
                <div class="card-body">
                  <p class="card-title"><strong>2 &centerdot; 1 &centerdot; 1</strong></p>
                  <a class="stretched-link" href="https://www.211.org/"></a>
                </div>
              </div>
            </div>

            <div class="col bg-dark shadow-sm pt-3 mb-2">
              <div class="card bg-dark p-2 resource-cards" >
                <img src="images/umc-logo.svg" alt="logo for the Methodist Church" class="card-img-top resource-logo rounded">
                <div class="card-body">
                  <p class="card-title "><strong>Kent United Methodist</strong></p>
                  <a class="stretched-link" href="http://Kentmethodist.com/assistance"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--Directions & Business Hours Section-->
    <section class="pb-5" id="directions">
      <div class="row">
        <div class="col bg-dark textDiv pt-3 pb-5">
          <h2>Directions</h2>
          <hr>
          <div class="row justify-content-center">
            <div class="col-4 ml-5 align-self-center">
              <h5>Hours of Operation:</h5>
              <ul>
                <li><strong>Monday:</strong><br> 1:00PM - 4:00PM</li>
                <li><strong>Tuesday:</strong><br> 9:00AM - 12:00PM Noon</li>
                <li><strong>Wednesday</strong><br> 1:00PM - 4:00PM</li>
              </ul><br>
              <h5>Address:</h5>
              <address>
                24447 94th Ave. S<br>
                Kent, WA 98030
              </address>
            </div>
            <div class="col-lg align-self-center align-content-end">
              <div class="row justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2701.539030528105!2d-122.21858188437729!3d47.38191477917043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54905eaea6606e61%3A0x206815f453c0e48b!2s24447%2094th%20Ave%20S%2C%20Kent%2C%20WA%2098030!5e0!3m2!1sen!2sus!4v1602534817453!5m2!1sen!2sus"
                        width="400"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0">
                </iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div> <!--/Main Container-->

<footer class="container-fluid bg-dark p-3">
  <div class="row justify-content-center">
    <div class="col ml-3">
      <div class="row">
        <a class="btn btn-sm btn-outline-primary" href="#main">
          Return to the top
        </a>
      </div>
      <div class="row pt-2">
        <a class="btn btn-sm btn-outline-success" href="https://stjameskent.org/">
          Return to St. James
        </a>
      </div>
    </div>
    <div class="col">

    </div>
    <div class="col mr-3 align-self-center">
      <div class="row justify-content-end">
         <a class="btn btn-sm btn-outline-secondary" href="requests.php">Admin Panel</a>
      </div>
    </div>
  </div>
</footer>

  <!--Scripts-->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/warnings.js"></script>
  <script src="js/collapse-menu.js"></script>
</body>
</html>