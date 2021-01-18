<?php
include 'database_connect.php';

$sql = "select name from images";
$result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_array($result);

// $image = $row['name'];
// $image_src = "upload/".$image;


echo '<table>';
while($row = $result->fetch_assoc()){  
    $image = $row['name'];
    $image_src = "upload/".$image;

     echo '<tr>
     <td><img src = "'.$image_src.'"></td>
     </tr>';
     echo'<script>console.log('.$result->num_rows.');</script>';
}
echo '</table>';

?>
<!-- <img src='<?php //echo $image_src;  ?>' > -->