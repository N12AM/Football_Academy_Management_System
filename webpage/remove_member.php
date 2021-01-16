<?php

include '..\database_connect.php';

if(! $conn->connect_error){
    if(isset($_GET['id'])){

        $id = $_GET['id'];


        $sql ="UPDATE player
                SET prestatus = 'n'
                WHERE id = '$id'";

        if($conn->query($sql)){
            header('location:http://localhost/webpage/player_profile.php?searchID='.$id.'');
        }
        
    }

}

    

   



?>