<?php

     $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $email = $_GET['email'];
    $address = $_GET['address'];
    $city = $_GET['city'];
    $street = $_GET['street'];
    $zip = $_GET['zip'];
    $phone = $_GET['phone'];
    $group = $_GET['group'];
    $rh = $_GET['rh'];
    $bcn = $_GET['bcn'];
    $nid = $_GET['nid'];
    $gender = $_GET['gender'];
    $date = DateTime::createFromFormat('Y-m-d', $_GET['date']);
    $nat = $_GET['nat'];
    

    $date = $date->format('Y-m-d');
    echo $fname." " .$lname. " ".$date;

    // echo "<script>
    //      console.log($fname);
    //     </script>";


?>