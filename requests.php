<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  session_start();

  require('includes/checkLogin.php');
  require('includes/db.php');
  $sql = "SELECT form_status FROM form";
  $result = mysqli_query($cnxn, $sql);
  foreach($result as $col){
    //var_dump($row);
    $status = $col['form_status'];
  }
  include('includes/table.html');
?>

<body class="bg-light">
<div class="container-fluid bg-light" id="main">
<nav class="navbar navbar-dark bg-dark navbar-expand-sm shadow-sm">
  <button class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#myTogglerNav"
          aria-controls="myTogglerNav"
          aria-expanded="false"
          aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a href="index.php" class="navbar-brand">Applicants Table</a>

  <div class="collapse navbar-collapse" id="myTogglerNav">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Home</a>
    </div><!-- navbar -->
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="logout.php">
        Logout <img id="logout-icon" alt="logout icon" src="images/sign-out.svg">
      </a>
    </div>
  </div><!-- collapse -->
</nav><!-- nav -->
  <section>
    <div class="row justify-content-center">
      <div class="col">
        <h3>
          Applicants
        </h3>
        <table id="outReachTable" class="display">
          <thead>
          <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>zipcode</td>
            <td>Services</td>
            <td data-sort="MMDDYYYY">Application Date</td>
          </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT * FROM requests";
            $result = mysqli_query($cnxn, $sql);
            date_default_timezone_set('America/Los_Angeles');

            foreach ($result as $row) {
              $name = $row['fname'] . " " . $row['lname'];
              $email = $row['email'];
              $phone = $row['phone'];
              $zipcode = $row['zipcode'];
              $needs =  $row['needs'] .": ". $row['otherNeeds'];
              $date = $row['date'];
              //$date = date("F j, Y, g:i a",strtotime($row['date']));

              echo '<tr>';
              echo "<td>$name</td>";
              echo "<td>$email</td>";
              echo "<td>$phone</td>";
              echo "<td>$zipcode</td>";
              echo "<td>$needs</td>";
              echo "<td>$date</td>";
              echo '</tr>';
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <section class="pt-5">
    <div class="row justify-content-center">
      <div class="col-12 text-center">
        <h2>Contact Form Control</h2>
        <?php
          if($status == 0){
            echo "<button class='btn btn-lg btn-success' id='form-switch'>Enable Form</button>";
          } else{
            echo "<button class='btn btn-lg btn-danger' id='form-switch'>Disable Form</button>";
          }
        ?>
      </div>
    </div>
  </section>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<script src="js/table-script.js"></script>
<script src="js/form-switch.js"></script>
</body>
</html>