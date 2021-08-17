<?php

error_reporting(0);


date_default_timezone_set('Asia/Kolkata');


$host	= "127.0.0.1";
$database	= "online_shopping";
$username 	= "root";
$password 	= "";
$conn = new mysqli($servername, $username, $password,$database,3307);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
