<?php

 include 'database_connect.php';
//  $sql = "select image from images";
//  $result = mysqli_query($conn,$sql);
 
//  echo '<table>';
//  while($row = $result->fetch_assoc()){  
//       echo '<tr>
//       <td><img src = '.$row['image'].'></td>
//       </tr>';
//       echo'<script>console.log('.$result->num_rows.');</script>';
//  }

//  echo '</table>';
 


    $sql = "SELECT COUNT(*) AS `total` from player;";

    if($result =  $conn->query($sql)){
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            echo $row['total'];
        }
    }



    $sql = "SELECT COUNT(*) `total` from coach;";

    $conn->query($sql);
    
    if($result =  $conn->query($sql)){
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            echo $row['total'];
        }
    }

?>
