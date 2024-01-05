<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "orders";

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
      die("Your database is not connected: " . mysqli_connect_error());
  }
?>