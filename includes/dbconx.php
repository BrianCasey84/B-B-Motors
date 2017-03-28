<?php

$db="cars";
$host="localhost";
$password = "";
$user = "root";

$link = mysqli_connect($host, $user, $password, $db);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
