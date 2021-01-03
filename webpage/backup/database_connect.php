<?php

$host = "127.0.0.1";
$username = "root";
$pass = "";
$con = mysqli_connect($host, $username, $pass, "db_test");
if(! $con){
    die("Could not connect to database " .mysqli_connect_error());
}
if( $con){
  echo "connected";
}
if(! $con){
    die("Could not connect to database " .mysqli_connect_error());
}
else if($con)
{
    echo "hello"  ;
}

// phpinfo();
?>