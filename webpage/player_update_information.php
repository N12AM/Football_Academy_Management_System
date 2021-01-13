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
    z-index:9999;

}
.registration_center{
    font-family: Arial;
  font-size: 22px;
  padding: 8px;
  box-sizing: border-box;
  padding-right:50px;
}



.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px 0px 10px;;
  text-align: left;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 20%;
  text-align: left;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.xcontainer {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

.col-1000 {
  -ms-flex: 50%; /* IE10 */
  flex: 20%;
  text-align: left;
}
.col-50 input {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.col-1000{
    padding:0 16px;
    margin-right: 20px;;
}
.col-1000 input {
    width:10%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
}
.col-1000 label {
  margin-bottom: 10px;
  display: block;
}



#rh, #gender, #group {
  width: 10%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  transform: scale(1.3);
}

.col-50 label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

/* .player-pos {
    padding-left:40px;  
    color:red;  
} */

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
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

</style>
<!-- <script>
function myFunction() {
  location.replace("http://localhost/webpage/register_player.php?fname=<?php echo $fname?>&lname=$lname&email=$email&address=$address&city=$city&street=$street&group=$bgroup&rh=$rh&gender=$gender&date=$bdate&nat=$nationality&phone=$phone&bcn=$bcn&nid=$nid&zip=$zip")
}
</script>
     -->
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
            <img src="res/user3.png" style="width:106px">
            <span >Welcome, <strong>Admin</strong></span><br>

            <div class="userIcon">
                <a href="#" class="icon"><i class="material-icons">person</i></a>
                <a href="#" class="icon"><i class="material-icons">email</i></a>
                <a href="#" class="icon"><i class="material-icons">login</i></a>
            </div>    
        </div>
        <div class="menuBar">
            <div class="menu">
            <a href="http://localhost/webpage/admin_dashboard.php"><span>Dashboard</span></a>
            <a href="http://localhost/webpage/admin_side_player_page.php" style="color:#000;background-color:#999;"><span>Players</span></a>
            <a href="#blog"target="_blank"><span>Coaches</span></a>
            <a href="#videos"target="_blank"><span>Employees</span></a>
            <a href="#More"target="_blank"><span>Academic</span></a>
            <a href="#More"target="_blank"><span>User</span></a>
            <a href="#More"target="_blank"><span>Performance</span></a>
            <a href="#More"target="_blank"><span>Tournament</span></a>
            <a href="#More"target="_blank"><span>Finance</span></a>
            <a href="#More"target="_blank"><span>Message</span></a>
            <a href="#More"target="_blank"><span>Mail</span></a>
            <a href="#More"target="_blank"><span>Inventory</span></a>
            <a href="#More"target="_blank"><span>Media</span></a>
            <a href="#More"target="_blank"><span>Logout</span></a>

        </div>

        </div>
        

                
    </div>

    <div class="side" style="text-align:justify;">
        
        <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
            <span class="material-icons" style="font-size: 24px;">dashboard</span>
            <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Update Player Information</span>
        </div>




        <!-- this is the quick look up panel -->

        <?php
            $nerror =$lnerror=$emerror =$adderror = $cityerror= $streetError=$ziperror = $pherror = $bgerror =
                 $rherror=$bcnerror = $natError =$genderError = $dateError = $niderror = $coachERR = $position = "";
            
            $fname = $lname = $email = $address = $city = $street = $bgroup = $rh= $gender =$bdate=  $nationality = $niderror= "";
            $phone = $bcn = $nid = $zip= $coach = 0;

            $input = 0;
            $pid = 0;
            $position = "Not set";

            // if($_SERVER["REQUEST_METHOD"] == "POST"){

                if(isset($_POST['pid'])){
                     $pid = $_POST['pid'];
                }
               if(isset($_POST['fname'])){
                   $fname = test_values($_POST['fname']);
                   
                   if(!preg_match("/^[a-zA-Z-' ]*$/", $fname)){
                       $nerror = "*Invalid name";
                   }
                   else{
                       $fname = strtolower($fname);
                       $fname = ucfirst($fname);
                       $input++;
                       echo'<script>
                    console.log('.$input.');
                </script>';
                   }
                   
               }
               else{
                    $nerror = "*name cannot be empty";
               } 
            
               //--------------------------------------------------varify last name    ----------------------
               if(isset($_POST['lname'])){
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
               if(isset($_POST['email'])){
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
               
               
               // ------------------------------------------------- varify address-------------------------------
               if(isset($_POST['address'])){
                $address = test_values($_POST['address']);
                $address = strtolower($address);
                if($address != ''){
                    if(!preg_match("/^[0-9a-zA-Z-' ]*$/", $address)){
                        $adderror = "*Invalid address, leave field empty if not present";
                        $address = '';
                        $input--;
                    }
                }
                else{
                    $address = "";
                }          
                }

                 // ------------------------------------------------- varify city-------------------------------
                if(isset($_POST['city'])){
                    $city = test_values($_POST['city']);
                    $city = strtolower($city);
                    if(!preg_match("/^[a-zA-Z-' ]*$/", $city)){
                        $cityerror = "*Invalid format";
                    }
                    else
                        $input++;
                }
                else{
                     $cityerror = "*City name cannot be empty";
                } 
                
                //--------------------------------------------------- varify street------------------------------
                if(isset($_POST['street'])){
                    $street = test_values($_POST['street']);
                    $street = strtolower($street);
                    if(!preg_match("/^[0-9a-zA-Z-' ]*$/", $street)){
                        $streetError = "*Invalid format";
                    }
                    else
                        $input++;
                }
                else{
                     $streetError = "*street name cannot be empty";
                } 

                                //--------------------------------------------------- varify zip------------------------------

                if(isset($_POST['zip'])){
                    $zip = test_values($_POST['zip']);
                    
                    if( !($_POST['zip'] > 0 && $_POST['zip'] < 10000) ){
                        $ziperror = "*wrong postal code";
                    }
                    else
                        $input++;
                }
                else{
                     $ziperror = "*cannot be left empty";
                } 
                
                                //--------------------------------------------------- varify phone------------------------------

                if(isset($_POST['phone'])){
                    $phone = test_values($_POST['phone']);
                                    
                    if(!preg_match("/^[0-9]*$/", $phone) ){
                        $pherror = "*Invalid format";
                    }
                    else if(strlen($phone) != 11){
                        $pherror = "phone number must be a 11 digits; do not use +88 or such code";
                    }
                    else
                        $input++;
                }
                else{
                    $pherror = "*phone cannot be empty";
                }
                
                
                //---------------------------------------------------------------------- blood group check

                if(!isset($_POST['blood_group'])){
                        $bgerror = "* blood group must be selected";
                }
                else{
                    $bgroup = $_POST['blood_group'];
                    $input++;
                }
                
                
                //---------------------------------------------------------------------- RH check

                if(!isset($_POST['rh'])){
                        $rherror = "* RH must be selected";
                }
                else{
                    $rh = $_POST['rh'];
                    $input++;
                }

                //----------------------------------------------------------------------varify birth CN
                if(isset($_POST['birth_certificate'])){
                    $bcn = test_values($_POST['birth_certificate']);
                                    
                    if(!preg_match("/^[0-9]*$/", $bcn) ){
                        $bcnerror = "*Invalid format";
                    }
                    else if(strlen($bcn) < 4){
                        $bcnerror = "too short";
                    }
                    else
                        $input++;
                }
                else{
                    $bcnerror = "*cannot be empty";
                }

                                //----------------------------------------------------------------------varify birth CN
                if(isset($_POST['nid'])){
                    $nid = test_values($_POST['nid']);
                                
                    if($nid != ""){
                        if(!preg_match("/^[0-9]*$/", $nid) ){
                            $niderror = "*Invalid format, leave field empty if not present";
                            $nid = "";
                            $input--;
                        }
                        else if(strlen($nid) < 7){
                            $niderror = "*too short leave field empty if not present";
                            $nid = "";
                            $input--;
                        }    
                    }
                    else
                        $nid = "";      
                }
                                //----------------------------------------------------------------------varify gender
                if(!isset($_POST['gender'])){
                    $genderError = "* gender must be selected";
                }
                else{
                    $gender = $_POST['gender'];
                    $input++;
                }

                                //----------------------------------------------------------------------varify date

                if(!isset($_POST['birthDate'])){
                    $dateError = "* birth date must be specified";
                }
                else{
                    $bdate = $_POST['birthDate'];
                    $input++;
                }

                                //----------------------------------------------------------------------varify nationality

                if(isset($_POST['nationality'])){
                    $nationality = test_values($_POST['nationality']);
                    
                    if(!preg_match("/^[a-zA-Z]*$/", $nationality)){
                        $natError = "*Invalid format, letter only";
                    }
                    else
                        $nationality = strtolower($nationality);
                        $input++;
                }
                else{
                     $natError = "*cannot be empty";
                } 

                if(isset($_POST['coach_id'])){
                    $coach = $_POST['coach_id'];
                    if($coach > 20000){
                        if(!already_exists($coach, 'coach')){

                            $input--;
                            $coachERR = "Coach ID not found, leave empty to keep default";
                        }
                    }
                    else{
                        $input--;
                        $coachERR = "* Keep the default ID";
                    }

                }
                if(isset($_POST['position'])){
                    $position = $_POST['position'];
                }
                if(isset($_POST['pid'])){
                    $pid = $_POST['pid'];
                    echo '
                    <script>console.log('.$pid.')</script>';
                }
            
            // }



            function test_values($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            function already_exists($usr, $tmp){

                include 'database_connect.php';
                // if($tmp == 'email'){
                //     $sql ="SELECT email FROM applicant WHERE email = '$usr' ;";
                // }
                if($tmp == 'coach'){
                    $sql ="SELECT id FROM coach WHERE id = $usr ;";
                }

                if($result =  $conn->query($sql)){

                    if($result->num_rows > 0){                        
                            $conn->close();                                                                    
                           return true;                                
                    }
                    $conn->close();    
                    return false;
                }
                $conn->close();    
                return false;
            }

            
            if($input == 13 ){
                // echo'<script>
                //     console.log('.$input.');
                // </script>';
                 if(isset($_GET['confirm'])){

                     if($_GET['confirm'] == 'yes'){
                        echo '
                        <script>console.log('.$pid.')</script>';
                         echo"<script>
                                              
                         
                       alert('Redirecting to a different page to Upload an Image');
                         window.location.href='http://localhost/webpage/update_player.php?pid=$pid&fname=$fname&lname=$lname&email=$email&address=$address&city=$city&street=$street&group=$bgroup&rh=$rh&gender=$gender&date=$bdate&nat=$nationality&phone=$phone&bcn=$bcn&nid=$nid&zip=$zip&coach_id=$coach&position=$position';
                        // myFunction();
                        </script>";
                     }
                    

                 }

            }


 
           
            
            
        ?>


        <div class="registration_center">
            

            <div class="col-75">
                <div class="xcontainer">
                    <h4>* required</h4>
                    <!-- <form method="post" action=" <?php // echo htmlspecialchars($_SERVER["PHP_SELF"])?>"> -->
                    <form method="post" action="http://localhost/webpage/player_update_information.php?confirm=yes">
            
                        <input type="hidden" name="pid" value="<?php echo $pid ?>">
                        <div class="row">
                            <div class="col-50">
                            <label for="fname"><i class="material-icons">person</i> First Name *</label>
                            <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname?>" >
                            <br><span style="font-size:17px; color:red"><?php echo $nerror?> </span>

                            <br><br>

                            <label for="lname"><i class="material-icons">person</i> Last Name *</label>
                            <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lname?>" >
                            <br><span style="font-size:17px; color:red"><?php echo $lnerror?> </span>
                            
                            <br><br>
                            <label for="email"><i class="material-icons">email</i> Email *</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com" value="<?php echo $email?>" >
                            <br><span style="font-size:17px; color:red"><?php echo $emerror?> </span>

                
                            <br><br>
                            <label for="adr"><span class="material-icons">home</span> Address (optional)</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" value="<?php echo $address?>" >
                            <br><span style="font-size:17px; color:red"><?php echo $adderror?> </span>


                            
                            <br><br>
                            <label for="city"><span class="material-icons">location_city</span> City *</label>
                            <input type="text" id="city" name="city" placeholder="New York" value="<?php echo $city?>" >
                            <br><span style="font-size:17px; color:red"><?php echo $cityerror?> </span>

                
                            <br><br>
                                

                                <div class="row">
                                    <div class="col-50">
                                        <label for="state"><span class="material-icons">edit_road</span>Street *</label>
                                        <input type="text" id="state" name="street" placeholder="NY" value="<?php echo $street?>" >
                                        <br><span style="font-size:17px; color:red"><?php echo $streetError?> </span>

                                    </div>
                                    
                                    <div class="col-50">
                                        <label for="zip"><span class="material-icons">dialpad</span>Postal code *</label>
                                        <input type="number" id="zip" name="zip" placeholder="10001" value="<?php echo $zip?>" >
                                        <br><span style="font-size:17px; color:red"><?php echo $ziperror?> </span>

                                    </div>
                                </div>


                            </div>
                

                            <div class="col-50">
                
                                <label for="phone"><i class="material-icons">call</i> Phone Number *</label>
                                <input type="tel" id="phone" name="phone" placeholder="017XXXXXXXX" value="<?php echo $phone?>" >
                                <br><span style="font-size:17px; color:red"><?php echo $pherror?> </span>

                            

                            
                                <br><br>    
                                <div class="row">
                                    <div class="col-1000">
                                        <label for="Bgroup"><span class="material-icons">invert_colors</span>Blood Group *</label>
                                        <input type="radio" value="A" id="blood_group" name="blood_group" <?php if(isset($_POST['blood_group']) && $_POST['blood_group'] =='A') echo "checked"?> >A
                                        <input type="radio" value="B" id="blood_group" name="blood_group" <?php if(isset($_POST['blood_group']) && $_POST['blood_group'] =="B") echo "checked"?>>B
                                        <input type="radio" value="O" id="blood_group" name="blood_group" <?php if(isset($_POST['blood_group']) && $_POST['blood_group'] =="O") echo "checked"?>>O
                                        <input type="radio" value="AB" id="blood_group" name="blood_group" <?php if(isset($_POST['blood_group']) && $_POST['blood_group'] =="AB") echo "checked"?>>AB
                                        <br><span style="font-size:17px; color:red"><?php echo $bgerror?> </span>

                                    </div>
                                
                                    <div class="col-1000">
                                    
                                        <label for="rh"><span class="material-icons">iso</span>RH*</label>
                                        <input type="radio" value="p" id="rh" name="rh" <?php if(isset($_POST['rh']) && $_POST['rh'] =="p") echo "checked"?> >positive
                                        <input type="radio" value="n" id="rh" name="rh" <?php if(isset($_POST['rh']) && $_POST['rh'] =="n") echo "checked"?>>negative
                                        <br><span style="font-size:17px; color:red"><?php echo $rherror?> </span>

                                    </div>
                                </div>
                                <br><br><br>
                                
                                <label for="bcnum"><span class="material-icons">contacts</span>Birth Certificate number *</label>
                                <input type="text" id="birth_certificate" name="birth_certificate" placeholder="1021332" value="<?php echo $bcn?>" >
                                <br><span style="font-size:17px; color:red"><?php echo $bcnerror?> </span>

                
                                <br><br>
                                <label for="byear"><span class="material-icons">today</span>National ID Number (optional)</label > 
                                <input type="text" id="nid" name="nid" placeholder="11XXXXXXX99" value="<?php echo $nid?>" >
                                <br><span style="font-size:17px; color:red"><?php echo $niderror?> </span>
                            
                            
                                <br><br>
                                
                                
                                <div class="row"> 
                                    <div class="col-50">
                                        <label for="bmonth"><span class="material-icons">account_tree</span>Gender *</label>
                                        <input type="radio" value="male" id="gender" name="gender" <?php if(isset($_POST['gender']) && $_POST['gender'] =="male") echo "checked"?>>male
                                        <input type="radio" value="female" id="gender" name="gender"<?php if(isset($_POST['gender']) && $_POST['gender'] =="female") echo "checked"?> >other
                                        <br><span style="font-size:17px; color:red"><?php echo $genderError?> </span>

                                    </div>
                                    <div class="col-50">
                                        <label for="bday"><span class="material-icons">today</span>Birth Day *</label>
                                        <input type="date" id="birthDate" name="birthDate" placeholder="8" value="<?php echo $bdate?>" >
                                        <br><span style="font-size:17px; color:red"><?php echo $dateError?> </span>

                                    </div>
                                </div>
                                    <br>
                                    <label for="wplace"><span class="material-icons">home_repair_service</span>Nationality *</label>
                                    <input type="text" id="nationality" name="nationality" placeholder="Bangladeshi" value="<?php echo $nationality?>" >
                                    <br><span style="font-size:17px; color:red"><?php echo $natError?> </span>

                            </div>

                            
                
                        </div>
                        <div class="player-pos">
                            <br><br>
                            <label for="Bgroup"><span class="material-icons">account_tree</span>Position</label><br>
                            <input type="radio" value="striker" id="position" name="position" <?php if(isset($_POST['position']) && $_POST['position'] =='striker') echo "checked"?> >Striker<br>
                            <input type="radio" value="midfielder" id="position" name="position" <?php if(isset($_POST['position']) && $_POST['position'] =="midfielder") echo "checked"?>>Mid Fielder<br>
                            <input type="radio" value="defender" id="position" name="position" <?php if(isset($_POST['position']) && $_POST['position'] =="defender") echo "checked"?>>Defender<br>
                            <input type="radio" value="goalkeeper" id="position" name="position" <?php if(isset($_POST['position']) && $_POST['position'] =="goalkeeper") echo "checked"?>>Goalkeeper<br>
                            <input type="radio" value="Not set" id="position" name="position" <?php if(isset($_POST['position']) && $_POST['position'] =="Not set") echo "checked"?>>Not set yet<br>
                            <br><span style="font-size:17px; color:red"><?php ?> </span>

                            </div>

                            <div class="player-coach">
                                <br>

                                <label for="wplace"><span class="material-icons">home_repair_service</span>Assign Coach ID</label>
                                <input type="number" id="coach_id" name="coach_id" placeholder="default coach ID 20003" value="<?php echo $coach ?>" >
                                <br><span style="font-size:17px; color:red"><?php echo $coachERR?> </span>
                            </div>
                    
                    <input type="submit" value="Review Change" class="btn">
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