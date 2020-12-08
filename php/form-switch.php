<?php
  //turn on error reporting
  ini_set('displayerrors', 1);
  error_reporting(E_ALL);
  require("../includes/db.php");

  $sql = "SELECT form_status FROM form";
  $result = mysqli_query($cnxn, $sql);
  foreach($result as $col){
    //var_dump($row);
    $status = $col['form_status'];
  }
  //echo $status; //debug

  if($status == 1){
    $update = "UPDATE form SET form_status = 0";
  } else{
    $update = "UPDATE form SET form_status = 1";
  }
  mysqli_query($cnxn, $update);
