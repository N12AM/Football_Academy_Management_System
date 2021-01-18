<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: http://localhost/webpage/login.php");
    exit;
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

.col-50 input {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
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


    


    
    <div class="side" style="text-align:justify;">
        
        <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
            <span class="material-icons" style="font-size: 24px;">dashboard</span>
            <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Player Registration Form</span>
        </div>




        <!-- this is the quick look up panel -->

        <?php
            $nerror =$lnerror=$emerror =$adderror = $cityerror= $streetError=$ziperror = $pherror = $bgerror =
                 $rherror=$bcnerror = $natError =$genderError = $dateError = $niderror = "";
            
            $fname = $lname = $email = $address = $city = $street = $bgroup = $rh= $gender =$bdate=  $nationality = $niderror= $phone = $bcn = $nid ="";
            $zip= 0;

            $input = 0;

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
               
               
               // ------------------------------------------------- varify address-------------------------------
               if(!empty($_POST['address'])){
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
                if(!empty($_POST['city'])){
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
                if(!empty($_POST['street'])){
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

                if(!empty($_POST['zip'])){
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

                if(!empty($_POST['phone'])){
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

                if(empty($_POST['group'])){
                        $bgerror = "* blood group must be selected";
                }
                else{
                    $bgroup = $_POST['group'];
                    $input++;
                }
                
                
                //---------------------------------------------------------------------- RH check

                if(empty($_POST['rh'])){
                        $rherror = "* RH must be selected";
                }
                else{
                    $rh = $_POST['rh'];
                    $input++;
                }

                //----------------------------------------------------------------------varify birth CN
                if(!empty($_POST['bcn'])){
                    $bcn = test_values($_POST['bcn']);
                                    
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

                if(!empty($_POST['nid'])){
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

                if(!empty($_POST['nat'])){
                    $nationality = test_values($_POST['nat']);
                    
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
            
            }

            function test_values($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            function already_exists($usr, $tmp){

                include 'database_connect.php';
                if($tmp == 'email'){
                    $sql ="SELECT email FROM applicant WHERE email = '$usr' ;";
                }

                if($conn->multi_query($sql)){
                    do{
                            if($result = $conn->store_result()){
                                if($result->num_rows > 0){                                  
                                    $conn->close();                                                                    
                                   return true;
                                }
                            }
                    }while($conn->next_result());
                }
                $conn->close();    
                return false;
            }

            if($input == 13 ){
                // echo"<script>
                //     console.log($input);
                // </script>";

                 if(!already_exists($email, 'email')){
                    echo"<script>console.log('.$email.');</script>";
                    echo"<script>
                                                
                       alert('Redirecting to a different page to Upload an Image');
                        window.location.href='http://localhost/webpage/register_player.php?fname=$fname&lname=$lname&email=$email&address=$address&city=$city&street=$street&group=$bgroup&rh=$rh&gender=$gender&date=$bdate&nat=$nationality&phone=$phone&bcn=$bcn&nid=$nid&zip=$zip';
                    // myFunction();
                    </script>";

                 }
                 else{
                    $emerror = "* email already exists";
                 }


            }
            
            
        ?>


        <div class="registration_center">
            

            <div class="col-75">
                <div class="xcontainer">
                    <h4>* required</h4>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                    <!-- <form method="post" action="http://localhost/webpage/test.php"> -->
            
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
                                    <div class="col-50">
                                        <label for="Bgroup"><span class="material-icons">invert_colors</span>Blood Group *</label>
                                        <input type="radio" value="A" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =='A') echo "checked"?> >A
                                        <input type="radio" value="B" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="B") echo "checked"?>>B
                                        <input type="radio" value="O" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="O") echo "checked"?>>O
                                        <input type="radio" value="AB" id="group" name="group" <?php if(isset($_POST['group']) && $_POST['group'] =="AB") echo "checked"?>>AB
                                        <br><span style="font-size:17px; color:red"><?php echo $bgerror?> </span>

                                    </div>
                                
                                    <div class="col-50">
                                    
                                        <label for="rh"><span class="material-icons">iso</span>RH*</label>
                                        <input type="radio" value="p" id="rh" name="rh" <?php if(isset($_POST['rh']) && $_POST['rh'] =="p") echo "checked"?>>positive
                                        <input type="radio" value="n" id="rh" name="rh" <?php if(isset($_POST['rh']) && $_POST['rh'] =="n") echo "checked"?>>negative
                                        <br><span style="font-size:17px; color:red"><?php echo $rherror?> </span>

                                    </div>
                                </div>
                                <br><br><br>
                                
                                <label for="bcnum"><span class="material-icons">contacts</span>Birth Certificate number *</label>
                                <input type="text" id="bcn" name="bcn" placeholder="1021332" value="<?php echo $bcn?>" >
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
                                        <input type="date" id="date" name="date" placeholder="8" value="<?php echo $bdate?>" >
                                        <br><span style="font-size:17px; color:red"><?php echo $dateError?> </span>

                                    </div>
                                </div>
                                    <br>
                                    <label for="wplace"><span class="material-icons">home_repair_service</span>Nationality *</label>
                                    <input type="text" id="nationality" name="nat" placeholder="Bangladeshi" value="<?php echo $nationality?>" >
                                    <br><span style="font-size:17px; color:red"><?php echo $natError?> </span>

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