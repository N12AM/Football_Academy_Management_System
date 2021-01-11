<?php
    include '..\database_connect.php';


    $pid = 0;
    $fname = $lname =$email = $address = $city= $street = $phone = $blood_group = $rh = $birth_certificate = $nid =
    $gender = $birthDate=$regDate =$position =$prestatus =$nationality =$applied_date =$image = "";

    $coach_id = $zip = 0;
    $pgoals = $passist = $pfoul = $pdefence = 0;
    $pscore = 0.0;
    $tgoals = $tassist = $tfoul = $tdefence = 0;
    $tscore = 0.0;

    $training_time = 0;
    $idle_time = 0;
    $game_time = 0;

    $searchOK = 0;
    $searchID = 0;
    if(isset($_GET['searchID'])){
        $searchID = $_GET['searchID'];
        $searchOK = 1;
    }


    if(! $conn->connect_error && $searchOK == 1){

                    $sqle = "SELECT * 
                            FROM player pl JOIN scorecard_practise sp
                            ON pl.id = sp.id 
                            JOIN scorecard_tournament st
                            ON pl.id = st.id
                            JOIN player_time ptm
                            ON pl.id = ptm.id
                            WHERE pl.id = $searchID;";


                    try{
                        if ($result =  $conn->query($sqle)) {
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $pid = $row['id'];
                                    $fname = $row['fname']; 
                                    $lname = $row['lname'];
                                    $email = $row['email'];
                                    $address = $row['address'];
                                    $city= $row['city'];
                                    $street = $row['street'];
                                    $phone = $row['phone'];
                                    $blood_group = $row['blood_group'];
                                    $rh = $row['rh'];
                                    $birth_certificate = $row['birth_certificate']; 
                                    $nid = $row['nid'];
                                    $gender = $row['gender'];
                                    $birthDate= $row['birthDate'];
                                    $regDate = $row['regDate'];
                                    $position = $row['position'];
                                    $prestatus = $row['prestatus'];
                                    $nationality = $row['nationality'];
                                    $applied_date = $row['applied_date'];
                                    $image = $row['image'];
                                
                                    $coach_id = $row['coach_id'];
                                    $zip = $row['zip'];
                                
                                    $pgoals = $row['pgoals']; 
                                    $passist = $row['passist'];
                                    $pfoul = $row['pfoul'];
                                    $pdefence = $row['pdefence'];
                                    $pscore = $row['pscore'];
                                    
                                    $tgoals = $row['tgoals'];
                                    $tassist = $row['tassist'];
                                    $tfoul = $row['tfoul'];
                                    $tdefence = $row['tdefence'];
                                    $tscore = $row['tscore'];
                                    
                                    $game_time = $row['game_time'];
                                    $training_time = $row['training'];
                                    $idle_time = $row['idle'];

                                }
                            }
                            
                        }
                    }
                    catch(Exception $e){
                        //ignores
                        echo $e;
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
        <link rel="stylesheet" type="text/css" href="profileStyle.css">
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
    <div class="main" style="padding-top:40px;background-color: white!important;"  >

        <div class="user" style="height:250px;font-family:'Aclonica',Arial, Helvetica, sans-serif;">
            <img src="res/user3.png" style="width:106px">
            <span>Welcome, <strong>Admin</strong></span><br>

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
            <a href="#More"target="_blank"><span>Logout</span></a>

        </div>

        </div>
        

                
    </div>


    


    
    <div class="side" style="background-color: white!important;">
        
        <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
            <span class="material-icons" style="font-size: 24px;">dashboard</span>
            <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Player Profile</span>
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
                
                <div class="player-peek">
                    <div class="photo-controls" style="background-color: rgba(255, 103, 103, 0);">
                        <div class="photo">
                            <img src="res/user6.png" style="width:105%">
                            <span></span>
                        </div>
                        
                    </div>
                    
                    <div class="scores">
                        

                        <div class="score-tour">
                            <div id="dual_x_div" style="width: 600px; height: 444px;"></div>

                            
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawStuff);

                            function drawStuff() {
                                var data = new google.visualization.arrayToDataTable([
                                ['', 'score', 'goals', 'assist', 'foul', 'defence'],
                                ['Practise', <?php echo $pscore?>, <?php echo $pgoals?>, <?php echo $passist?>, <?php echo $pfoul?>, <?php echo $pdefence?>],
                                ['Tournament', <?php echo $tscore?>, <?php echo $tgoals?>, <?php echo $tassist?>, <?php echo $tfoul?>, <?php echo $tdefence?>],
                                ]);

                                var options = {
                                width: 600,
                                chart: {
                                    title: 'Player Performance',
                                    subtitle: 'Score out of 10, others total count'
                                },
                                bars: 'Vertical', // Required for Material Bar Charts.
                                series: {
                                    0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
                                    1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
                                },
                                // axes: {
                                //     x: {
                                //     // distance: {label: 'parsecs'}, // Bottom x-axis.
                                //     // brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
                                //     }
                                // }
                                };

                            var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
                            chart.draw(data, options);
                            };
                            </script>
                            
                        </div>
                        <div class="score-prac">
                            <div id="piechart1"></div>

                            

                                <script>
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Task', 'minues'],
                                ['Training', <?php echo $training_time?>],
                                ['idle', <?php echo $idle_time?>],
                                ['Games', <?php echo $game_time?>]
                                ]);

                                // Optional; add a title and set the width and height of the chart
                                var options = {'title':'Time spent (Hours)', 'width':550, 'height':440};

                                // Display the chart inside the <div> element with id="piechart"
                                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                                chart.draw(data, options);
                                }
                                </script>
                        </div>
                        

                    </div>

                </div>
                <div class="edit-score">
                    <a href="#"><span>Edit Scorecard</span></a> 
                </div>
                


                <div class="player_details">
                    <div class="user-info">
                        <table class="user-info-table">
                            <tr class="user-info-row">
                                <th class="user-attribute">Player ID</th>
                                <td class="user-info-column"><?php echo $pid ?></td>
                            </tr>

                            <tr class="user-info-row">
                                <th class="user-attribute">First Name</th>
                                <td class="user-info-column"><?php echo $fname?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Last Name</th>
                                <td class="user-info-column"><?php echo $lname?></td>
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
                                <td class="user-info-column"><?php echo $coach_id?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Position</th>
                                <td class="user-info-column"><?php echo $position ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Member</th>
                                <td class="user-info-column"><?php if($prestatus == 'y') echo 'yes'; else echo 'no' ?></td>
                            </tr>

                            <tr class="user-info-row">
                                <th class="user-attribute">Blood Group</th>
                                <td class="user-info-column"><?php echo $blood_group ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Blood RH factor</th>
                                <td class="user-info-column"><?php echo $rh ?></td>
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
                                <th class="user-attribute">Registration Date</th>
                                <td class="user-info-column"><?php echo $regDate ?></td>
                            </tr>
                            <tr class="user-info-row">
                                <th class="user-attribute">Applied Date</th>
                                <td class="user-info-column"><?php echo $applied_date ?></td>
                            </tr>


                            
                        </table>
                    </div>
                </div>
                

                <div>
                    <form method="post" action="http://localhost/webpage/player_update_information.php">
                        <input type="hidden" name="pid" value="<?php echo $pid?>">
                        <input type="hidden" name="fname" value="<?php echo $fname?>">
                        <input type="hidden" name="lname" value="<?php echo $lname?>">
                        <input type="hidden" name="email" value="<?php echo $email?>">
                        <input type="hidden" name="address" value="<?php echo $address?>">
                        <input type="hidden" name="city" value="<?php echo $city?>">
                        <input type="hidden" name="street" value="<?php echo $street?>">
                        <input type="hidden" name="phone" value="<?php echo $phone?>">
                        <input type="hidden" name="blood_group" value="<?php echo $blood_group?>">
                        <input type="hidden" name="rh" value="<?php echo $rh?>">
                        <input type="hidden" name="birth_certificate" value="<?php echo $birth_certificate?>">
                        <input type="hidden" name="nid" value="<?php echo $nid?>">
                        <input type="hidden" name="gender" value="<?php echo $gender?>">
                        <input type="hidden" name="birthDate" value="<?php echo $birthDate?>">
                        <input type="hidden" name="position" value="<?php echo $position?>">
                        <input type="hidden" name="nationality" value="<?php echo $nationality?>">
                        <input type="hidden" name="zip" value="<?php echo $zip?>">
                        <input type="hidden" name="coach_id" value="<?php echo $coach_id?>">
                        <input type="submit" name="save" value="submit">
                    </form>
                </div>

                <div class="update-description" style="text-align:center">
                    <div class="update-info">
                        <a href="#"><span>Update Information</span></a> </a>
                    </div>

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