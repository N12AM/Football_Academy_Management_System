<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: http://localhost/webpage/login/login.php");
    exit;
}
?>
<?php
include '..\database_connect.php';
$fname = $lname = $email = $gender = $date = "";
$position = 0;
$uploadStatus = 0;
$total_count = 0;
$imageERR = "";

if (isset($_GET['fname'])) {
    $fname = $_GET['fname'];
    $total_count++;
}
if (isset($_GET['lname'])) {
    $lname = $_GET['lname'];
    $total_count++;
}
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $total_count++;
}
if (isset($_GET['group'])) {
    $position = (int)($_GET['group']);
    $total_count++;
}
if (isset($_GET['gender'])) {
    $gender = $_GET['gender'];
    $total_count++;
}
if (isset($_GET['date'])) {
    $date = DateTime::createFromFormat('Y-m-d', $_GET['date']);
    $date = $date->format('Y-m-d');
    $total_count++;
}
if (isset($_POST['upload'])) {
    $name = $_FILES['file']['name'];
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png");
    $check = getimagesize($_FILES['file']['tmp_name']);
    if ($check !== false) {
        $uploadStatus = 1;
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
    if (!$conn->connect_error) {

        if ($total_count == 6 && $uploadStatus == 1) {

            try {
                $sqle = "INSERT INTO `coach`(fname, lname, email, gender, birthDate, position, photo)
                        VALUES	('$fname', '$lname', '$email' , '$gender', '$date', $position, '$name');";

                if ($conn->query($sqle) === true) {
                    $last_id = $conn->insert_id;

                    $sqle = "INSERT INTO `coach_commision`(id)
                                    VALUES($last_id);";

                    if ($conn->query($sqle) === true) {
                        $sqle = "INSERT INTO recent_events(ename)
                                VALUES('New Coach Joined');";

                        if ($conn->query($sqle) === true) {
                            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
                                echo '<script>window.alert("Added to applicants");</script>';
                                header('location:http://localhost/webpage/coach/coach_mainpage.php?applicant=yes&page=0');
                            } else {
                                echo '<script>window.alert("Something went wrong 1 :(");</script>';
                            }
                        }
                    } else {
                        echo '<script>window.alert("Something went wrong 2 :(");</script>';
                    }
                }
            } catch (Exception $e) {
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="pageStyle.css" > -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="../mainStyle.css">
    <link rel="stylesheet" type="text/css" href="../formStyle.css">
    <link rel="stylesheet" type="text/css" href="coachPageStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <!-- <script src="https://kit.fontawesome.com/9de1d8df31.js" crossorigin="anonymous"></script> -->
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
                <img src="../res/user3.png" style="width:106px">
                <span>Welcome, <strong> <?php echo htmlspecialchars($_SESSION["username"]); ?>
                    </strong></span><br>

                <div class="userIcon">
                    <a href="http://localhost/webpage/user/profile.php" class="icon"><i class="material-icons">person</i></a>
                    <a href="http://localhost/webpage/mail/mail_main.php" class="icon"><i class="material-icons">email</i></a>
                    <a href="http://localhost/webpage/login/logout.php" class="icon"><i class="material-icons">login</i></a>
                </div>
            </div>
            <div class="menuBar">
                <div class="menu">
                    <a href="http://localhost/webpage/admin_dashboard.php"><span>Dashboard</span></a>
                    <a href="http://localhost/webpage/admin_side_player_page.php"><span>Players</span></a>
                    <a href="http://localhost/webpage/coach/coach_mainpage.php" style="color:#000;background-color:#999;"><span>Coaches</span></a>
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
        <div class="side">
            <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
                <span class="material-icons" style="font-size: 24px;">dashboard</span>
                <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Confirm Registration</span>
            </div>
            <!-- this is the quick look up panel -->
            <div class="quickLookup">
            </div>
            <div>
                <div style="padding-right:20px;">
                    <form method="post" action="" enctype='multipart/form-data'>
                        <div style="height:300px; width:300px;background-color: #ccc;">
                            <span style="font-size:50px">Photo</span>
                            <div style="padding-top:25%">
                                <input type='file' name='file' style="padding:8px;" required>
                            </div>
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
                                        <th class="user-attribute">Position</th>
                                        <td class="user-info-column"><?php echo $position ?></td>
                                    </tr>
                                    <tr class="user-info-row">
                                        <th class="user-attribute">Gender</th>
                                        <td class="user-info-column"><?php echo $gender ?></td>
                                    </tr>
                                    <tr class="user-info-row">
                                        <th class="user-attribute">Date of birth</th>
                                        <td class="user-info-column"><?php echo $date ?></td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                        <input type="submit" value="Upload" name="upload" id="UploadImage" class="rwbtn">
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