<?php


$coach_id = 20003;
$position = "Not set";
$prestatus = 'y';

$count= 0;
$aid = 0;
$fname = "";
$lname = "";
$email = "";
$address = "";
$city = "";
$street = "";
$phone = "";
$blood_group = "";
$rh = "";
$birth_certificate = "";
$nid = "";
$gender = "";
$birthDate = "";
$nationality = "";
$zip = 0;
$applied_date = "";
$image = "";
if(isset($_POST['aid'])){
    $aid = $_POST['aid'];
    $count++;
}
if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
    $count++;
}

if(isset($_POST['lname'])){
    $lname = $_POST['lname'];
    $count++;
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $count++;
}
if(isset($_POST['address'])){
    $address = $_POST['address'];
    $count++;
}
if(isset($_POST['city'])){
    $city = $_POST['city'];
    $count++;
}
if(isset($_POST['street'])){
    $street = $_POST['street'];
    $count++;
}
if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
    $count++;
}
if(isset($_POST['blood_group'])){
    $blood_group = $_POST['blood_group'];
    $count++;
}
if(isset($_POST['rh'])){
    $rh = $_POST['rh'];
    $count++;
}
if(isset($_POST['birth_certificate'])){
    $birth_certificate = $_POST['birth_certificate'];
    $count++;
}
if(isset($_POST['nid'])){
    $nid = $_POST['nid'];
    $count++;
}
if(isset($_POST['gender'])){
    $gender = $_POST['gender'];
    $count++;
}
if(isset($_POST['birthDate'])){
    $birthDate = $_POST['birthDate'];
    $count++;
}
if(isset($_POST['nationality'])){
    $nationality = $_POST['nationality'];
    $count++;
}
if(isset($_POST['zip'])){
    $zip = $_POST['zip'];
    $count++;
}
if(isset($_POST['applied_date'])){
    $applied_date = $_POST['applied_date'];
    $count++;
}
if(isset($_POST['image'])){
    $image = $_POST['image'];
    $count++;
}


include '..\database_connect.php';

if(!$conn->connect_error && $count == 18){
    $sql = "INSERT INTO player(fname, lname, email, `address`, city, street, zip, phone, blood_group, rh,
                                birth_certificate, nid, gender, birthDate, coach_id, position, prestatus, nationality, applied_date, `image`)
    
            VALUE('$fname', '$lname', '$email', '$address', '$city', '$street', $zip, '$phone', '$blood_group', '$rh',
                '$birth_certificate', '$nid', '$gender', '$birthDate', $coach_id, '$position', '$prestatus', '$nationality', '$applied_date', '$image');";

    if($conn->query($sql)){
        $last_id = $conn->insert_id;

        $sqle ="INSERT INTO recent_events(ename)
        VALUES('New Member Joined As Player');";

        if($conn->query($sqle)){
            $sqld = "DELETE FROM applicant WHERE id = $aid;";

            if($conn->query($sqld)){
                $sql_extra =    "UPDATE player
                                SET id = id+30000
                                WHERE id < 30000;";
                if($conn->query($sql_extra)){
                    echo '<script>alert("player ID synchronised") </script>';
                }

                $sqlo = "INSERT INTO scorecard_practise(id, pgoals, passist, pfoul, pdefence, pscore)
                            VALUES($last_id, 0, 0, 0, 0, 0);";
                if($conn->query($sqlo)){
                    $sqlo = "INSERT INTO scorecard_tournament(id, tgoals, tassist, tfoul, tdefence, tscore)
                                VALUES($last_id, 0, 0, 0, 0, 0);";
                    if($conn->query($sqlo)){
                        $sqlo = "INSERT INTO player_time(id, training, idle, game_time)
                                VALUES($last_id, 0, 0, 0);";
                        if($conn->query($sqlo)){
                            echo '<script>alert("player added") </script>';
                        header('location:http://localhost/webpage/players_pending.php?applicant=yes');
                        }    
                    }
                }                
            }
            else{
                echo '<script>alert("error applicant delete") </script>';
            }
        }
        echo '<script>alert("error event update") </script>';
    }
    echo '<script>alert("error adding player") </script>';

}

?>