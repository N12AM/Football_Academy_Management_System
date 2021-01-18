<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: http://localhost/webpage/login.php");
    exit;
}
?>
<?php
    include '..\database_connect.php';


    $fname = $lname = $email = $address = $city= $street = $phone = $group = $rh = $bcn = $nid = $gender = $date= $nat = "";
    $zip = 0;
    $uploadStatus = 0; $total_count = 0;
    $imageERR = "";
    $coach = 0;
    $position = "Not set";
    $pid = 0;

    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        echo '
        <script>console.log('.$pid.')</script>';
        $total_count++;
    }
    
    if(isset($_GET['fname'])){
        $fname = $_GET['fname'];
        echo '
        <script>console.log("'.$fname.'")</script>';
                $total_count++;
    }
    if(isset($_GET['lname'])){
        $lname = $_GET['lname'];
        echo '
        <script>console.log("'.$lname.'")</script>';
                $total_count++;
    }
    if(isset($_GET['email'])){
        $email = $_GET['email'];
        echo '
        <script>console.log("'.$email.'")</script>';
                $total_count++;
    }
    if(isset($_GET['address'])){
        $address = $_GET['address'];
        echo '
        <script>console.log("'.$address.'")</script>';
                $total_count++;
    }
    if(isset($_GET['city'])){
        $city = $_GET['city'];
        echo '
        <script>console.log("'.$city.'")</script>';
                $total_count++;
    }  
    if(isset($_GET['street'])){
        $street = $_GET['street'];
        echo '
        <script>console.log("'.$street.'")</script>';
                $total_count++;
    }
    if(isset($_GET['zip'])){
        $zip = $_GET['zip'];
        echo '
        <script>console.log("'.$zip.'")</script>';
                $total_count++;
    }
    if(isset($_GET['phone'])){
        $phone = $_GET['phone'];
        echo '
        <script>console.log("'.$phone.'")</script>';
                $total_count++;
    }
    if(isset($_GET['group'])){
        $group = $_GET['group'];
        echo '
        <script>console.log("'.$group.'")</script>';
                $total_count++;
    }
    if(isset($_GET['rh'])){
        $rh = $_GET['rh'];
        echo '
        <script>console.log("'.$rh.'")</script>';
                $total_count++;
    }
    if(isset($_GET['bcn'])){
        $bcn = $_GET['bcn'];
        echo '
        <script>console.log("'.$bcn.'")</script>';
                $total_count++;
    }
    if(isset($_GET['nid'])){
        $nid = $_GET['nid'];
        echo '
        <script>console.log("'.$nid.'")</script>';
                $total_count++;
    }
    if(isset($_GET['gender'])){
        $gender = $_GET['gender'];
        echo '
        <script>console.log("'.$gender.'")</script>';
                $total_count++;
    }
    if(isset($_GET['date'])){
        $date = DateTime::createFromFormat('Y-m-d', $_GET['date']);
        $date = $date->format('Y-m-d');
        echo '
        <script>console.log("'.$date.'")</script>';
                $total_count++;
    }
    if(isset($_GET['nat'])){
        $nat = $_GET['nat'];
        echo '
        <script>console.log("'.$nat.'")</script>';
                $total_count++;
    }
    if(isset($_GET['coach_id'])){
        $coach = $_GET['coach_id'];
        echo '
        <script>console.log('.$coach.')</script>';
                $total_count++;
    }
    if(isset($_GET['position'])){
        $position = $_GET['position'];
        echo '
        <script>console.log("'.$position.'")</script>';
                $total_count++;
    }

    
    if(isset($_POST['upload'])){

        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png");

        
        $changeImage = 0;

        if($name == ""){
            $changeImage = 0;
        }
        else{
            $check = getimagesize($_FILES['file']['tmp_name']);
            if ($check !== false) {
                $uploadStatus = 1;
                $changeImage = 1;
            } else {
                $uploadStatus = 0;
                $imageERR = '* invalid image';
            }
            if (file_exists($target_file)) {
                $uploadStatus = 0;
                $imageERR = '* file already exists';
            }
            if ($_FILES['file']['size'] > 500000) {
                $uploadStatus = 0;
                $imageERR = '* file too large should be less than 500KB';
            }
            if (!in_array($imageFileType, $extensions_arr)) {
                $uploadStatus = 0;
                $imageERR = '* Invalid image';
            }

        }

        



        if(! $conn->connect_error){


            if($total_count == 18 ){

                if($uploadStatus ==1 && $changeImage == 1){
                    echo '
                    <script>console.log("changeImage")</script>';

                    $sqle =     "UPDATE player
                                SET fname = '$fname',
                                lname = '$lname',
                                email = '$email',
                                `address` = '$address',
                                city = '$city',
                                street = '$street',
                                zip = $zip,
                                phone = '$phone',
                                blood_group = '$group',
                                rh = '$rh',
                                birth_certificate = '$bcn',
                                nid = '$nid',
                                gender = '$gender',
                                birthDate = '$date',
                                coach_id = '$coach',
                                position = '$position',
                                nationality = '$nat',
                                `image` = '$name' 
                                WHERE id = $pid;";
                                                    
                    $sqle .="INSERT INTO recent_events(ename)
                            VALUES('Player Information Updated');";


                    try {
                        if ($conn->multi_query($sqle)) {
                            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
                                echo '<script>window.alert("Information Updated");</script>';
                                header('location:http://localhost/webpage/player_profile.php?searchID='.$pid.'');
                            } 
                            else {
                                echo '<script>window.alert("Something went wrong :(");</script>';
                            }
                        }
                    } catch (Exception $e) {
                        //ignores
                        echo $e;
                    }
                }

                else if($uploadStatus == 0 && $changeImage == 0){
                    echo '
                    <script>console.log("Do not changeImage")</script>';
                    echo '
                    <script>console.log('.$pid.')</script>';
                            
                            $sqle =     "UPDATE player
                                            SET
                                            fname = '$fname',
                                            lname = '$lname',
                                            email = '$email',
                                            `address` = '$address',
                                            city = '$city',
                                            street = '$street',
                                            zip = $zip,
                                            phone = '$phone',
                                            blood_group = '$group',
                                            rh = '$rh',
                                            birth_certificate = '$bcn',
                                            nid = '$nid',
                                            gender = '$gender',
                                            birthDate = '$date',
                                            coach_id = $coach,
                                            position = '$position',
                                            nationality = '$nat'

                                            WHERE id = $pid;";
               
                    $sqle .= "INSERT INTO recent_events(ename)
                    VALUES('Player Information Updated');";

                        try {
                            if ($conn->multi_query($sqle)) {
                                    echo '<script>window.alert("Information Updated");</script>';
                                    header('location:http://localhost/webpage/player_profile.php?searchID='.$pid.'');
                            }
                            else {
                                echo '<script>window.alert("Something went wrong :(");</script>';
                                }
                            
                        }
                        catch (Exception $e) {
                            //ignores
                            echo $e;
}
                }


            }


            
            
                // if($total_count == 17 && $uploadStatus == 1){
                //     $sqle =     "CREATE TABLE IF NOT EXISTS applicant(
                //                 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                //                 fname VARCHAR(30) NOT NULL,
                //                 lname VARCHAR(30) NOT NULL,
                //                 email VARCHAR(100) NOT NULL UNIQUE,
                //                 `address` VARCHAR(100) ,
                //                 city VARCHAR(20) NOT NULL,
                //                 street VARCHAR(100) NOT NULL,	
                //                 zip INT(5) NOT NULL,
                //                 phone VARCHAR(11) NOT NULL,
                //                 blood_group CHAR(2) NOT NULL,
                //                 rh CHAR(1) NOT NULL,
                //                 birth_certificate VARCHAR(17) UNIQUE NOT NULL,
                //                 nid VARCHAR(10) UNIQUE NOT NULL,
                //                 gender CHAR(6) NOT NULL, 
                //                 birth_date DATE NOT NULL,
                //                 nationality VARCHAR(12) NOT NULL,
                //                 `applied_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                //                 `image` VARCHAR(200) NOT NULL);";

                //     $sqle .=    "CREATE TABLE IF NOT EXISTS recent_events(
                //                 `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                //                 `ename` VARCHAR(40) NOT NULL,
                //                 `etime` TIMESTAMP  NOT NULL DEFAULT CURRENT_TIMESTAMP);";

                //     $sqle .= "INSERT INTO applicant(fname, lname, email, `address`, city, street, zip, phone,
                //                                 blood_group, rh, birth_certificate, nid, gender,birth_date, nationality, `image`)
                //     VALUES('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $address . "','" . $city . "', '" . $street . "', $zip, '" . $phone . "', '" . $group . "', '" . $rh . "', '" . $bcn . "',
                //                     '" . $nid . "', '" . $gender . "', '" . $date . "','" . $nat . "','" . $name . "');";
                    
                //     $sqle .="INSERT INTO recent_events(ename)
                //             VALUES('New player applied');";

                //     try{
                //         if ($conn->multi_query($sqle)) {
                //                 // $sql = "INSERT INTO recent_events(ename)
                //                 //         VALUES('New player applied');";
                //                 // $conn->query($sql);

                //             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
                //                 echo'<script>window.alert("Added to applicants");</script>';
                //                 header('location:http://localhost/webpage/players_pending.php?applicant=yes&page=0');
                //             }
                //             else{
                //                 echo'<script>window.alert("Something went wrong :(");</script>';
                //             }

                            
                //         }
                //     }
                //     catch(Exception $e){
                //         //ignores
                //         echo $e;
                //     }
                    
                // }


            
        }
    }

    // $date = $date->format('Y-m-d');
    // echo $fname." " .$lname. " ".$date;

    // echo "<script>
    //      console.log($fname);
    //     </script>";


?>








<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="pageStyle.css" > -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="mainStyle.css">
        <link rel="stylesheet" type="text/css" href="formStyle.css">
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
        
        <!-- <script src="https://kit.fontawesome.com/9de1d8df31.js" crossorigin="anonymous"></script> -->
<style>
    *{
    box-sizing: border-box;
}
body{
    margin:0;
    padding:0;
    background-color: #f1f1f1!important;
}

header{

    font-family:'Aclonica',Arial, Helvetica, sans-serif;
    color:white;
    background-color:red;
    font-size:30px;
    text-align:left;
    padding:20px;
    top:0;
    position:sticky;
    z-index: 9999;

}
.AddPlayerPending{
    background-color:antwhiteiquewhite;
    padding:0px 8px;
    display: flex;
    margin-bottom: 16px!important;
}
.AddPlayer{
    font-size: 20px;
    color:#000;
    margin-left:10px;
    width:50%;
    float:left;
    display:block;
    box-sizing: inherit;
    content:"";
    height:150px;
    bottom: 10;;
}


.addPlayerLink{
    text-decoration: none;
    color:black !important;
}


/* ---------------------------------------below style for reviewing information of players */





@media (max-width:400px){
    body{
        overflow-x: auto;
        max-width: fit-content;
    }
    header{
        font-size: 45px;
        padding-left: 0;
        padding-right: 0;
    }
}

@media screen and (max-width: 750px) and (min-width: 400px){
    body{
        overflow-x: hidden;
    }
}

@media(min-width: 700px){
    .container{
        padding-left: 10%;
    }
}
</style>
    
    </head>

    <body>

        <header class="intro">
            <span>
                Football Academy ManageMent System
                 <!-- <span><i class="fas fa-futbol"></i></span> -->
            </span> 
        </header>









<div class="page">
    <div class="main" style="padding-top:40px;  ">

        <div class="user" style="height:250px;font-family:'Aclonica',Arial, Helvetica, sans-serif;">
            <img src="res/user3.png" style="width:106px">
            <span>Welcome, <strong>    <?php echo htmlspecialchars($_SESSION["username"]); ?>
</strong></span><br>

            <div class="userIcon">
                <a href="#" class="icon"><i class="material-icons">person</i></a>
                <a href="#" class="icon"><i class="material-icons">email</i></a>
                <a href="#" class="icon"><i class="material-icons">login</i></a>
            </div>    
        </div>
        <div class="menuBar">
            <div class="menu">
            <a href="http://localhost/webpage/admin_dashboard.php"><span>Dashboard</span></a>
            <a href="http://localhost/webpage/admin_side_player_page.php" style="color:#000;background-color:#999;"><span><i class="fas fa-newspaper"></i></span>Players</a>
            <a href="#blog"target="_blank"><span>Coaches</span></a>
            <a href="#videos"target="_blank"><span>Employees</span></a>
            <a href="#More"target="_blank"><span>User</span></a>
            <a href="#More"target="_blank"><span>Academic</span></a>
            <a href="#More"target="_blank"><span>Performance</span></a>
            <a href="#More"target="_blank"><span>Tournament</span></a>
            <a href="#More"target="_blank"><span>Finance</span></a>
            <a href="#More"target="_blank"><span>Message</span></a>
            <a href="#More"target="_blank"><span>Mail</span></a>
            <a href="#More"target="_blank"><span>Inventory</span></a>
            <a href="#More"target="_blank"><span>Media</span></a>
            <a href="http://localhost/webpage/logout.php"target="_blank"><span>Logout</span></a>

        </div>

        </div>
        

                
    </div>


    


    
    <div class="side">
        
        <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
            <span class="material-icons" style="font-size: 24px;">dashboard</span>
            <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Confirm Registration</span>
        </div>




        <!-- this is the quick look up panel -->
        <div class="quickLookup">
            
            <!-- <table class="quickLookupTable">
                <tr >
                    <td class="quickLookupRows">Employees</td>
                    <td class="quickLookupRows">Coachs</td>
                    <td class="quickLookupRows">Players</td>
                    <td class="quickLookupRows">Updates</td>
                </tr>   
            </table> -->
            

        </div>

            <!-- + REMEMBER THE FEEDS WILL UPDATE 
                 + WE WILL BE NEEDING ANOTHER database TABLE TO HOLD RECENT EVENTS
                 + THAT WAY WHEN EVER WE VISIT THIS PAGE WE CAN KEEP THE EVENTS
                 + the table will hold event name and time when it happend
                 + we can substract that time from current time to find time diff
            -->



        <div >
            <div  style="padding-right:20px;">
            <form method="post" action="" enctype='multipart/form-data'>
                


                <div style="height:300px; width:300px;background-color: #ccc;">
                    <span style="font-size:50px">Photo</span>
                    <div style="padding-top:25%">
                        <input type='file' name='file' style="padding:8px;">
                    </div>
                    <span>*leave this field empty if you don't want to change photo</span>
                    <span style="font-size:30px; color:red;"><?php echo $imageERR ?></span>
                </div>

                <div>
                    <div class="user-info">
                        <table class="user-info-table">
                            <tr class="user-info-row">
                                <th class="user-attribute">First Name</th>
                                <td class="user-info-column"><?php echo $fname ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Last Name</th>
                                <td class="user-info-column"><?php echo $lname ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Email</th>
                                <td class="user-info-column"><?php echo $email ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Address</th>
                                <td class="user-info-column"><?php echo $address ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">City</th>
                                <td class="user-info-column"><?php echo $city ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Street</th>
                                <td class="user-info-column"><?php echo $street ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Postal Code</th>
                                <td class="user-info-column"><?php echo $zip ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Phone Number</th>
                                <td class="user-info-column"><?php echo $phone ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Coach</th>
                                <td class="user-info-column"><?php echo $coach?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Position</th>
                                <td class="user-info-column"><?php echo $position ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Blood Group</th>
                                <td class="user-info-column"><?php echo $group ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Blood RH factor</th>
                                <td class="user-info-column"><?php echo $rh ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Birth Certificate number</th>
                                <td class="user-info-column"><?php echo $bcn ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">National ID number</th>
                                <td class="user-info-column"><?php echo $nid ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Gender</th>
                                <td class="user-info-column"><?php echo $gender ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Date of birth</th>
                                <td class="user-info-column"><?php echo $date ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Nationality</th>
                                <td class="user-info-column"><?php echo $nat ?></td>
                            </tr>
                            
                        </table>
                    </div>
                </div>

                <input type="submit" value="Update Information" name="upload"  id="UploadImage" class="rwbtn">
                </form>
                

            </div>
            <div>
     

            </div>
 

        </div>


    </div>

    
</div>
        


  







<footer style="background-color: #f44336!important; color:#fff;z-index: 1000; position:static; margin-top: 13.1%;; text-align: center;padding:10px;">
    <span>&copy Copyright 2020-2021 </span>
</footer>  
    <?php
        $conn->close();    
    ?>
       
</body>
    
</html>