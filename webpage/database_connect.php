<?php



$host = "127.0.0.1";
$username = "root";
$pass = "";
$conn = new mysqli($host, $username, $pass, "db_test");

if($conn->connect_error){
    die("Could not connect to database " . $conn->connect_error);
}
if(! $conn->connect_error){
  
}

// phpinfo();
?>