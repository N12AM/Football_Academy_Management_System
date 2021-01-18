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


$fname = $lname = $email = $address = $city = $street = $phone = $blood_group = $rh = $birth_certificate = $nid =
    $gender = $birthDate = $regDate  = $nationality = $applied_date = $image = "";
$blood_type = "";
$zip = 0;

$searchOK = 0;
$searchID = 0;
if (isset($_GET['searchID'])) {
    $searchID = $_GET['searchID'];
    $searchOK = 1;
    echo '<script>console.log("ID OK"); </script>';

}
if (!$conn->connect_error && $searchOK == 1) {

    echo '<script>console.log("searching"); </script>';

    $sqle = "SELECT * 
                                FROM applicant ap JOIN blood_factor br
                                ON ap.rh = br.id
                                WHERE ap.id = $searchID;";


    try {
        if ($result =  $conn->query($sqle)) {
            echo '<script>console.log("complete"); </script>';

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // $aid = $row['id'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $city = $row['city'];
                    $street = $row['street'];
                    $phone = $row['phone'];
                    $blood_group = $row['blood_group'];
                    $rh = $row['rh'];
                    $birth_certificate = $row['birth_certificate'];
                    $nid = $row['nid'];
                    $gender = $row['gender'];
                    $birthDate = $row['birth_date'];
                    $nationality = $row['nationality'];
                    $applied_date = $row['applied_date'];
                    $image = $row['image'];

                    $blood_type = $row['type'];
                    $zip = $row['zip'];
                }
            }
        }
    } catch (Exception $e) {
        //ignores
        echo $e;
    }

    echo '<script>console.log("'.$fname.'"); </script>';
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
    <link rel="stylesheet" type="text/css" href="profileStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

    <!-- <script src="https://kit.fontawesome.com/9de1d8df31.js" crossorigin="anonymous"></script> -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        header {
            font-family: 'Aclonica', Arial, Helvetica, sans-serif;
            color: white;
            background-color: red;
            font-size: 30px;
            text-align: left;
            padding: 20px;
            top: 0;
            position: sticky;
            z-index: 9999;
        }

        .AddPlayerPending {
            background-color: antwhiteiquewhite;
            padding: 0px 8px;
            display: flex;
            margin-bottom: 16px !important;
        }

        .AddPlayer {
            font-size: 20px;
            color: #000;
            margin-left: 10px;
            width: 50%;
            float: left;
            display: block;
            box-sizing: inherit;
            content: "";
            height: 150px;
            bottom: 10;
            ;
        }

        .addPlayerLink {
            text-decoration: none;
            color: black !important;
        }

        .accept-applicant {
            text-align: right;
            margin: 50px 5% 0 0;
        }

        /* ---------------------------------------below style for reviewing information of players */
        @media (max-width:400px) {
            body {
                overflow-x: auto;
                max-width: fit-content;
            }

            header {
                font-size: 45px;
                padding-left: 0;
                padding-right: 0;
            }
        }

        @media screen and (max-width: 750px) and (min-width: 400px) {
            body {
                overflow-x: hidden;
            }
        }

        @media(min-width: 700px) {
            .container {
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
        <div class="main" style="padding-top:40px;background-color: white!important;">

            <div class="user" style="height:250px;font-family:'Aclonica',Arial, Helvetica, sans-serif;">
                <img src="res/user3.png" style="width:106px">
                <span>Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></span><br>

                <div class="userIcon">
                    <a href="http://localhost/webpage/user/profile.php" class="icon"><i class="material-icons">person</i></a>
                    <a href="http://localhost/webpage/mail/mail_main.php" class="icon"><i class="material-icons">email</i></a>
                    <a href="http://localhost/webpage/login/logout.php" class="icon"><i class="material-icons">login</i></a>
                </div>
            </div>
            <div class="menuBar">
                <div class="menu">
                    <a href="http://localhost/webpage/admin_dashboard.php"><span>Dashboard</span></a>
                    <a href="http://localhost/webpage/admin_side_player_page.php" style="color:#000;background-color:#999;"><span>Players</span></a>
                    <a href="http://localhost/webpage/coach/coach_mainpage.php"><span>Coaches</span></a>
                    <a href="http://localhost/webpage/employee/employee_main.php"><span>Employees</span></a>
                    <a href="http://localhost/webpage/user/user_main.php"><span>User</span></a>
                    <a href="http://localhost/webpage/academic/academic_main.php"><span>Academic</span></a>
                    <a href="http://localhost/webpage/tournament/tournament_main.php"><span>Tournament</span></a>
                    <a href="http://localhost/webpage/finance/finance_main.php"><span>Finance</span></a>
                    <a href="http://localhost/webpage/mail/mail_main.php"><span>Mail</span></a>
                    <a href="http://localhost/webpage/inventory/inventory_main.php"><span>Inventory</span></a>
                    <a href="http://localhost/webpage/media/media_main.php"><span>Media</span></a>
                    <a href="http://localhost/webpage/logout.php"><span>Logout</span></a>
                 </div>
            </div>
        </div>
        <div class="side" style="background-color: white!important;">

            <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
                <span class="material-icons" style="font-size: 24px;">dashboard</span>
                <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Applicant Description</span>
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
            <div>
                <div style="padding-right:20px;">
                    <div class="player-peek">
                        <div class="photo-controls" style="background-color: rgba(255, 103, 103, 0);">
                            <div class="photo">
                                <img src="res/user6.png" style="width:105%">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="player_details">
                        <div class="user-info">
                            <table class="user-info-table">
                                <tr class="user-info-row">
                                    <th class="user-attribute">Applicant ID</th>
                                    <td class="user-info-column"><?php echo $searchID ?></td>
                                </tr>
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

                                <tr class="user-info-row">
                                    <th class="user-attribute">Blood Group</th>
                                    <td class="user-info-column"><?php echo $blood_group ?></td>
                                </tr>
                                <tr class="user-info-row">
                                    <th class="user-attribute">Blood Type</th>
                                    <td class="user-info-column"><?php echo $blood_type ?></td>
                                </tr>
                                <tr class="user-info-row">
                                    <th class="user-attribute">Birth Certificate number</th>
                                    <td class="user-info-column"><?php echo $birth_certificate ?></td>
                                </tr>
                                <tr class="user-info-row">
                                    <th class="user-attribute">National ID number</th>
                                    <td class="user-info-column"><?php echo $nid ?></td>
                                </tr>
                                <tr class="user-info-row">
                                    <th class="user-attribute">Gender</th>
                                    <td class="user-info-column"><?php echo  $gender ?></td>
                                </tr>
                                <tr class="user-info-row">
                                    <th class="user-attribute">Date of birth</th>
                                    <td class="user-info-column"><?php echo $birthDate ?></td>
                                </tr>
                                <tr class="user-info-row">
                                    <th class="user-attribute">Nationality</th>
                                    <td class="user-info-column"><?php echo $nationality ?></td>
                                </tr>
                                <tr class="user-info-row">
                                    <th class="user-attribute">Applied Date</th>
                                    <td class="user-info-column"><?php echo $applied_date ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="update-player-info">
                        <form method="post" action="http://localhost/webpage/accept_applicant.php">
                            <input type="hidden" name="aid" value="<?php echo $searchID ?>">
                            <input type="hidden" name="fname" value="<?php echo $fname ?>">
                            <input type="hidden" name="lname" value="<?php echo $lname ?>">
                            <input type="hidden" name="email" value="<?php echo $email ?>">
                            <input type="hidden" name="address" value="<?php echo $address ?>">
                            <input type="hidden" name="city" value="<?php echo $city ?>">
                            <input type="hidden" name="street" value="<?php echo $street ?>">
                            <input type="hidden" name="phone" value="<?php echo $phone ?>">
                            <input type="hidden" name="blood_group" value="<?php echo $blood_group ?>">
                            <input type="hidden" name="rh" value="<?php echo $rh ?>">
                            <input type="hidden" name="birth_certificate" value="<?php echo $birth_certificate ?>">
                            <input type="hidden" name="nid" value="<?php echo $nid ?>">
                            <input type="hidden" name="gender" value="<?php echo $gender ?>">
                            <input type="hidden" name="birthDate" value="<?php echo $birthDate ?>">
                            <input type="hidden" name="nationality" value="<?php echo $nationality ?>">
                            <input type="hidden" name="zip" value="<?php echo $zip ?>">
                            <input type="hidden" name="applied_date" value="<?php echo $applied_date ?>">
                            <input type="hidden" name="image" value="<?php echo $image ?>">
                            <input type="submit" name="save" value="Accept applicant as player" class="update-submit-btn">
                        </form>
                    </div>

                    <div class="update-description" style="text-align:center">
                    </div>
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