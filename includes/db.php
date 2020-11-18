<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$database = "software_requests";
$username = "software_user";
$password = "a3hWYm9Bvhy8";
$hostname = "localhost";
$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die ("There is a problem");
//var_dump($cnxn);
