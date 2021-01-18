
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

include '../database_connect.php';
            $nerror =$lnerror=$emerror = $bgerror =
                 $genderError = $dateError = "";    
            
            $fname = $lname = $email = $gender =$bdate= $leaveDate= "";
            $position = null;
            $commision = null;
            $input = 0;

            $cid = 0;
            if($_GET['id']){
                $cid = $_GET['id'];
                echo'<script>console.log('.$cid.');</script>';

            }


            $sql = "SELECT fname, lname, email,gender,birthDate, leaveDate, ch.position AS pos, cc.commision AS com
                    FROM coach ch JOIN coach_position chp ON chp.id = ch.position
                    JOIN coach_commision cc ON cc.id = ch.id
                    WHERE ch.id = $cid;";

            try{
                if($result = $conn->query($sql)){
                    echo'<script>console.log("done1");</script>';
                    if($result->num_rows > 0){
                        echo'<script>console.log("done2");</script>';
                        if($row = $result->fetch_assoc()){
                            echo'<script>console.log("done3");</script>';
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            $email = $row['email'];
                            $gender = $row['gender'];
                            $bdate = $row['birthDate'];
                            $leaveDate = $row['leaveDate'];
                            $position = $row['pos'];
                            $commision = $row['com'];
                        }
                    }
                }
            }
            catch(Exception $e){

            }


            if($_SERVER["REQUEST_METHOD"] == "POST"){
               if(!empty($_POST['fname'])){
                   $fname = test_values($_POST['fname']);
                   
                   if(!preg_match("/^[a-zA-Z-' ]*$/", $fname)){
                       $nerror = "*Invalid name";
                   }
                   else{
                       $fname = strtolower($fname);
                       $fname = ucfirst($fname);
                       $input++;
                   }
                   }
               else{
                    $nerror = "*name cannot be empty";
               } 
            
               //--------------------------------------------------varify last name    ----------------------
               if(!empty($_POST['lname'])){
                   $lname = test_values($_POST['lname']);
                   
                   if(!preg_match("/^[a-zA-Z-' ]*$/", $lname)){
                       $lnerror = "*Invalid name";
                   }
                   else{
                    $lname = strtolower($lname);
                    $lname = ucfirst($lname);
                    $input++;
                }
               }
               else{
                    $lnerror = "*name cannot be empty";
               } 
               
               // ---------------------------------------------------varify email ---------------------------
               if(!empty($_POST['email'])){
                   $email = test_values($_POST['email']);
                   
                   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                       $emerror = "*Invalid email format, example: john@example.com";
                   }
                   else
                        $input++;
               }
               else{
                    $emerror = "*email cannot be empty";
               }
                //---------------------------------------------------------------------- blood group check
                if(empty($_POST['group'])){
                        $bgerror = "* Position must be selected";
                }
                else{
                    $position = $_POST['group'];
                    $input++;
                }
                                //----------------------------------------------------------------------varify gender
                if(empty($_POST['gender'])){
                    $genderError = "* gender must be selected";
                }
                else{
                    $gender = $_POST['gender'];
                    $input++;
                }
                                //----------------------------------------------------------------------varify date
                if(empty($_POST['date'])){
                    $dateError = "* birth date must be specified";
                }
                else{
                    $bdate = $_POST['date'];
                    $input++;
                }
                                //----------------------------------------------------------------------varify nationality            
            }
            function test_values($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            if($input == 6 ){
                // echo"<script>
                //     console.log($input);
                // </script>";
                    echo"<script>                      
                       alert('Redirecting to a different page to Upload an Image');
                        window.location.href='http://localhost/webpage/coach/confirm_registration.php?fname=$fname&lname=$lname&email=$email&group=$position&gender=$gender&date=$bdate';
                    // myFunction();
                    </script>";
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
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
        
        <!-- <script src="https://kit.fontawesome.com/9de1d8df31.js" crossorigin="anonymous"></script> -->
<style>
*{box-sizing: border-box;}
body{margin:0;padding:0;background-color: #f1f1f1!important;}
header{font-family:'Aclonica',Arial, Helvetica, sans-serif;color:white;background-color:red;font-size:30px;text-align:left;padding:20px;top:0;position:sticky;z-index:9999;}
.registration_center{font-family: Arial;font-size: 22px;padding: 8px;box-sizing: border-box;padding-right:50px;}
.row {display: -ms-flexbox; /* IE10 */display: flex;-ms-flex-wrap: wrap; /* IE10 */flex-wrap: wrap;margin: 0 -16px 0px 10px;;text-align: left;}
.col-25 {-ms-flex: 25%; /* IE10 */flex: 25%;}
.col-50 {-ms-flex: 50%; /* IE10 */flex: 20%;text-align: left;}
.col-75 {-ms-flex: 75%; /* IE10 */flex: 75%;}
.col-25, .col-50, .col-75 {padding: 0 16px;}
.xcontainer {background-color: #f2f2f2;padding: 5px 20px 15px 20px;border: 1px solid lightgrey;border-radius: 3px;}
.col-50 input {width: 50%;margin-bottom: 20px;padding: 12px;border: 1px solid #ccc;border-radius: 3px;}
#rh, #gender, #group {width: 10%;margin-bottom: 20px;padding: 12px;border: 1px solid #ccc;border-radius: 3px;transform: scale(1.3);}
.col-50 label {margin-bottom: 10px;display: block;}
.icon-container {margin-bottom: 20px;padding: 7px 0;font-size: 24px;}
.btn {background-color: #4CAF50;color: white;padding: 12px;margin: 10px 0;border: none;width: 100%;border-radius: 3px;cursor: pointer;font-size: 17px;}
.btn:hover {background-color: #45a049;}


@media (max-width: 800px) {.row {flex-direction: column-reverse;}.col-25 {margin-bottom: 20px;}}
@media (max-width:400px){body{overflow-x: auto;max-width: fit-content;}header{font-size: 45px;padding-left: 0;padding-right: 0;}}
@media screen and (max-width: 750px) and (min-width: 400px){body{overflow-x: hidden;}}
</style>
<!-- <script>
function myFunction() {
  location.replace("http://localhost/webpage/register_player.php?fname=<?php echo $fname?>&lname=$lname&email=$email&address=$address&city=$city&street=$street&group=$bgroup&rh=$rh&gender=$gender&date=$bdate&nat=$nationality&phone=$phone&bcn=$bcn&nid=$nid&zip=$zip")
}
</script>
     -->
<script>
    function updateTextInput(val) {
          document.getElementById('commision_value').value=val; 
        }
</script>
    </head>
    <body>
        <header class="intro">
            <span>
                Football Academy ManageMent System <span><i class="fas fa-futbol"></i></span>
            </span> 
        </header>
<div class="page">
    <div class="main" style="padding-top:40px;  ">

        <div class="user" style="height:250px; font-family:'Aclonica',Arial, Helvetica, sans-serif;">
            <img src="../res/user3.png" style="width:106px">
            <span >Welcome, <strong>    <?php echo htmlspecialchars($_SESSION["username"]); ?>
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
                <a href="http://localhost/webpage/admin_side_player_page.php" ><span>Players</span></a>
                <a href="http://localhost/webpage/coach/coach_mainpage.php"style="color:#000;background-color:#999;"><span>Coaches</span></a>
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
    <div class="side" style="text-align:justify;">
        <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
            <span class="material-icons" style="font-size: 24px;">dashboard</span>
            <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Coach Registration Form</span>
        </div>
        <!-- this is the quick look up panel -->
        <div class="registration_center">
            <div class="col-75">
                <div class="xcontainer">
                    <h4>* required</h4>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                    <!-- <form method="post" action="http://localhost/webpage/test.php"> -->
            
                        <div class="row">
                            <div class="col-50">
                                <label for="fname"><i class="material-icons">person</i> First Name *</label>
                                <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname?>" required>
                                <br><span style="font-size:17px; color:red"><?php echo $nerror?> </span>

                                <br><br>

                                <label for="lname"><i class="material-icons">person</i> Last Name *</label>
                                <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lname?>" required>
                                <br><span style="font-size:17px; color:red"><?php echo $lnerror?> </span>
                                
                                <br><br>
                                <label for="email"><i class="material-icons">email</i> Email *</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com" value="<?php echo $email?>" required>
                                <br><span style="font-size:17px; color:red"><?php echo $emerror?> </span>
                                <br><br>
                                <label for="bday"><span class="material-icons">today</span>Birth Date *</label>
                                <input type="date" id="date" name="date" placeholder="8" value="<?php echo $bdate?>" required>
                                <br><span style="font-size:17px; color:red"><?php echo $dateError?> </span>
                                <br><br>
                                <div class="col-500">
                                    <label for="Bgroup"><span class="material-icons">invert_colors</span> Coach Position *</label>
                                    <input type="radio" value="1" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =='1') echo "checked"; else if($position == 1) echo "checked"?> >Defensive line Coach  <br>
                                    <input type="radio" value="2" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="2") echo "checked"; else if($position == 2) echo "checked"?>>Linebacker Coach <br>
                                    <input type="radio" value="3" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="3") echo "checked"; else if($position == 3) echo "checked"?>>Offensive line Coach <br>
                                    <input type="radio" value="4" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="4") echo "checked"; else if($position == 4) echo "checked"?>>Quarterback Coach <br>
                                    <input type="radio" value="5" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="5") echo "checked"; else if($position == 5) echo "checked"?>>Running backs Coach <br>
                                    <input type="radio" value="6" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="6") echo "checked"; else if($position == 6) echo "checked"?>>Secondary Coach <br>
                                    <input type="radio" value="7" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="7") echo "checked"; else if($position == 7) echo "checked"?>>Special Coach <br>
                                    <input type="radio" value="8" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="8") echo "checked"; else if($position == 8) echo "checked"?>>Tight ends Coach <br>
                                    <input type="radio" value="9" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="9") echo "checked"; else if($position == 9) echo "checked"?>>Wide receivers Coach <br>
                                    <br><span style="font-size:17px; color:red"><?php echo $bgerror?> </span>
                                </div>
                                    <br>
                                <div class="col-50">
                                    <label for="bmonth"><span class="material-icons">account_tree</span> Gender *</label>
                                     <input type="radio" value="male" id="gender" name="gender" <?php if(isset($_POST['gender']) && $_POST['gender'] =="male")echo "checked"; else if($gender == "male") echo "checked"?>>male <br>
                                    <input type="radio" value="female" id="gender" name="gender"<?php if(isset($_POST['gender']) && $_POST['gender'] =="female")echo "checked"; else if($gender == "female") echo "checked"?> >female <br>
                                     <input type="radio" value="other" id="gender" name="gender"<?php if(isset($_POST['gender']) && $_POST['gender'] =="other")echo "checked"; else if($gender == "other") echo "checked"?> >other <br>
                                    <br><span style="font-size:17px; color:red"><?php echo $genderError?> </span>
                                    <br>
                                </div>
                                <div class="col-500">
                                    <label for="commision"><span class="material-icons">straighten</span> Set commision</label>
                                    <input type="range" name="rangeInput" min="1" max="10" step="0.10" value="<?php echo $commision?>" onchange="updateTextInput(this.value);">
                                    <input type="text" id="commision_value" value="<?php echo $commision?>" readonly style="width:10%;margin-left:50px;">
                                </div>
                                <br><br>
                                <div class="col-500">
                                    <label for="leaveDate"><span class="material-icons">today</span>Leave Date (leave empty if Coach is still employeed</label>
                                    <input type="date" id="leaveDate" name="leaveDate" value="<?php echo $leaveDate; ?>" >
                                </div>
                            </div>
                        </div>
                    <div class="sub-res">
                        <div class="sub">
                            <input type="submit" value="submit" class="btn">
                        </div>
                        <div class="res">
                            <!-- <input type="reset" value="reset" class="reset-btn"> -->
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
</div>
    <footer style="background-color: #f44336!important; color:#fff;z-index: 1000; position:static; margin-top: 13.1%; text-align: center;padding:20px;width:100%">
        <span>&copy Copyright 2020-2021 </span>
    </footer>
    </body>
</html>