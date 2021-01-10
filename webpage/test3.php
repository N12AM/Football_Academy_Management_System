<?php
include 'database_connect.php';

if(isset($_POST['upload_image'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png");

  $uploadStatus = 0;

  $check = getimagesize($_FILES['file']['tmp_name']);
  if($check !== false){
    $uploadStatus = 1;
  }
  else{
      $uploadStatus = 0;
      echo'invalid image';
  }
  if(file_exists($target_file)){
      $uploadStatus = 0;
      echo'file already exists';
  }
  if($_FILES['file']['size'] > 500000){
      $uploadStatus = 0;
      echo'file too large should be less than 500KB';
  }
  if( !in_array($imageFileType,$extensions_arr) ){
        $uploadStatus = 0;
        echo'not an image';
  }

  // Select file type
  

  // Valid file extensions

  // Check extension
  if( $uploadStatus == 1 ){
 
     // Insert record
     $query = "insert into images(name) values('".$name."')";
     mysqli_query($conn,$query);
  
     // Upload file
     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
        echo'uploaded! saved to upload/'.$target_dir.'';
     }
     else{
         echo'sorry something went wrong';
     }


  }
 
}
?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file'>
  <input type='submit' value='Save name' name='upload_image'>
</form>