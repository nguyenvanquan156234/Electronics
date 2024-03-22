<?php
$mysqli = new mysqli("localhost","root","","dienmay");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


// Change character set to utf8
mysqli_set_charset($mysqli, 'utf8');




?>