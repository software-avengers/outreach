<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    //include('includes/head.html');
    include ('includes/table.html');
    require ('includes/db.php');
?>


 <body class="bg-light vw-100">
 <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
     <div class="container">

         <button class="navbar-toggler"
                 type="button"
                 data-toggle="collapse"
                 data-target="#myTogglerNav"
                 aria-controls="myTogglerNav"
                 aria-expanded="false"
                 aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <a href="#" class="navbar-brand">Applicants Table</a>

         <div class="collapse navbar-collapse" id="myTogglerNav">
             <div class="navbar-nav">
                 <a class="nav-item nav-link active" href="index.php">Home</a>
             </div><!-- navbar -->
         </div><!-- collapse -->

     </div><!-- container -->
 </nav><!-- nav -->

    <div class="container-fluid bg-light w-75" id="main">
        <h3>
            Applicants
        </h3>
        <table id="outReachTable" class="display" style="width: 100%">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>First</td>
                    <td>Last</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Zipcode</td>
                    <td>Needs</td>
                    <td>Other Needs</td>
                    <td>Application Date</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM requests";
            $result = mysqli_query($cnxn, $sql);
            date_default_timezone_set('America/Los_Angeles');

            foreach ($result as $row) {
                $id = $row['id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
                $phone = $row['phone'];
                $address = $row['address'];
                $city = $row['city'];
                $state = $row['state'];
                $zipcode = $row['zipcode'];
                $needs =  $row['needs'];
                $otherNeeds = $row['otherNeeds'];
                //$date = date("M d, Y g:i a", strtotime($row['date']));
                $date = date("F j, Y, g:i a",strtotime($row['date']));

                echo '<tr>';
                echo "<td>$id</td>";
                echo "<td>$fname</td>";
                echo "<td>$lname</td>";
                echo "<td>$email</td>";
                echo "<td>$phone</td>";
                echo "<td>$address</td>";
                echo "<td>$city</td>";
                echo "<td>$state</td>";
                echo "<td>$zipcode</td>";
                echo "<td>$needs</td>";
                echo "<td>$otherNeeds</td>";
                echo "<td>$date</td>";

                echo '</tr>';
            }
            ?>

            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


 <script>
     $('#outReachTable').DataTable();
 </script>

 </body>