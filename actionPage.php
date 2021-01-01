a<!Doctype html>
<html>
<head>
  <title>Display all records from Database</title>
  <script type ="text/javascript">
  function Redirect(){
    window.location("D:\HTML\test\template_test.html");

  }
  </script>
</head>
<body>

<?php

  
function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
//include 'database_connect.php'; // Using database connection file here
//$database = mysqli_connect('127.0.0.1', 'root','', 'db_test', '3306');

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

$uname = $_POST['uname'];
$pwd = $_POST['pwd'];

$sql = "SELECT paswd
        FROM pwd
        WHERE `user` = '$uname' AND `paswd` = '$pwd'";





$records = mysqli_query($con, $sql  ); // fetch data from database
$row = $records->fetch_assoc();

//printf( $row['paswd']);

    if( $row['paswd'] === $pwd && $uname === "usr1"){
  
  //  header('Location: template_test.html');
    header('Location: webpage/html/redirect_1.php');
    echo"fuck you";
    //include "http://localhost/redirect_1.php";
    }
    else if( $row['paswd'] === $pwd && $uname === "usr2"){
  
  //  header('Location: template_test.html');
    header('Location: redirect_user2.php');
    echo"fuck you";
    //include "http://localhost/redirect_1.php";
    }

    else{
  echo "WHO THE FUCK ARE YOU, MF?!";
}


//$row = mysqli_fetch_assoc($records);

//printf("%s  \n", $row["paswd"]);


//printf("%s \n", $row["paswd"]);

// if( $row["paswd"] == $pwd){
//   printf("wrong");
//   printf("%s  \n", $row["paswd"]);
// }


// if( $row["paswd"] != $pwd){
//   printf($pwd);
//   printf("wrong");
//   printf("%s  \n", $row["paswd"]);
  
// }
// else{
//   printf("%s \n", $row["paswd"]);
// }
//mysqli_free_result($records);


//$row = mysqli_fetch_array($records);
//

// while($row = mysqli_fetch_array($records)){
//   echo "my pass : ". $row['paswd']; 
// }

// while ($row = $records->fetch_assoc()) {
//   echo $row['paswd']."<br>";
// }


// if($row['paswd'] === $pwd){
//     echo "my pass : ". $row['user']; 
//     debug_to_console("Test");
// }
// else{
//     echo $rows['paswd']; 
// }
?>

<?php mysqli_close($con); // Close connection 
    
    ?>

</body>
</html>