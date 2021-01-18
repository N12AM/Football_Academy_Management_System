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


    $values= [0,0,0,0,0];
    $positions= ["","","","",""];
    $city_values;
    $cities;
    $nat_values;
    $nationality;
    $i = 0;
    $j = 0;
    $k = 0;
    $s = 0;
    if(! $conn->connect_error){

                    $sqle = "SELECT position, COUNT(position) AS `total`
                            FROM player
                            GROUP BY position
                            ORDER BY position ASC;";

                    //value[0] defender
                    //value[1]goal keeper
                    //value[2]mid fielder
                    //value[3]not set 
                    //value[4]striker
                    
                    

                    try{
                        if ($result =  $conn->query($sqle)) {
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $values[$i] = $row['total'];
                                    $positions[$i] = $row['position'];
                                    $i++;
                                }
                            }
                            
                        }
                    }
                    catch(Exception $e){
                        //ignores
                        echo $e;
                    }
                    
                    $sqlp =     "SELECT city, COUNT(city) AS `total`
                                FROM player
                                GROUP BY city;";

                     try{
                        if ($result =  $conn->query($sqlp)) {
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $city_values[$j] = $row['total'];
                                    $cities[$j] = $row['city'];
                                    $j++;
                                }
                            }
                            
                        }
                    }
                    catch(Exception $e){
                        //ignores
                        echo $e;
                    }


                    $sqld = "SELECT nationality, COUNT(nationality) AS 'nat'
                            FROM player
                            GROUP BY nationality;";
                    try{
                        if ($result =  $conn->query($sqld)) {
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $nat_values[$k] = $row['nat'];
                                    $nationality[$k] = $row['nationality'];
                                    $k++;
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
    background-color: #fff!important;
}

.page {
    display: flex;
    flex-wrap: wrap;
    background-color: #fff !important;
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


    


    
    <div class="side" style="background-color: white!important;">
        
        <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
            <span class="material-icons" style="font-size: 24px;">dashboard</span>
            <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Player Analistics</span>
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
                
                <div class="players-analysis">

                    <div class="position-based">
                        

                        <div class="position-total">
                            <div id="dual_x_div" style="width: 800px; height: 544px;"></div>

                            
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawStuff);

                            function drawStuff() {
                                var data = new google.visualization.arrayToDataTable([
                                ['', '<?php echo $positions[4]?>', '<?php echo $positions[0]?>', '<?php echo $positions[2]?>', '<?php echo $positions[1]?>', '<?php echo $positions[3]?>'],
                                ['Types', <?php echo $values[4]?>, <?php echo $values[0]?>, <?php echo $values[2]?>, <?php echo $values[1]?>, <?php echo $values[3]?>],
                                ]);

                                //positions[4] value[0]     defender 
                                //positions[4] value[1]     goal keeper
                                //positions[4] value[2]     mid fielder
                                //positions[4] value[3]     not set 
                                //positions[4] value[4]     striker
                                var options = {
                                width: 1000,
                                chart: {
                                    title: 'Player Position Analysis',
                                    subtitle: 'total count based on each type'
                                },
                                bars: 'horizontal', // Required for Material Bar Charts.
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
                        
                        

                    </div>


                    <div class="position">
                    <div class="position-pie">      
                            <div id="piechart1"></div>
                                <script>
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                 ['Cities', 'Number of players'],
                                // ['Training', <?php// echo $values[4]?>],
                                // ['idle', <?php// echo $values[0]?>],
                                // ['Games', <?php// echo $values[3]?>]
                                <?php
                                    while($s < $j-1){
                                        echo'[\''.$cities[$s].'\', '.$city_values[$s].'],';
                                        $s++;
                                    }
                                    if($s == $j-1)
                                    echo'[\''.$cities[$s].'\', '.$city_values[$s].']';

                                    $s =0;
                                ?>
                                ]);

                                // Optional; add a title and set the width and height of the chart
                                var options = {'title':'Players City Chart', 'width':750, 'height':640};

                                // Display the chart inside the <div> element with id="piechart"
                                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                                chart.draw(data, options);
                                }
                                </script>
                        </div>

                        <div class="second-chart-container">
                        <div class="position-pie2">      
                            <div id="piechart2"></div>
                                <script>
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                 ['Nationality', 'Players count'],
                                // ['Training', <?php// echo $values[4]?>],
                                // ['idle', <?php// echo $values[0]?>],
                                // ['Games', <?php// echo $values[3]?>]
                                <?php
                                    while($s < $k-1){
                                        echo'[\''.$nationality[$s].'\', '.$nat_values[$s].'],';
                                        $s++;
                                    }
                                    if($s == $k-1)
                                    echo'[\''.$nationality[$s].'\', '.$nat_values[$s].']';
                                ?>
                                ]);

                                // Optional; add a title and set the width and height of the chart
                                var options = {'title':'Players Nationality Chart', 'width':750, 'height':640};

                                // Display the chart inside the <div> element with id="piechart"
                                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                                chart.draw(data, options);
                                }
                                </script>
                        </div>
                        </div>
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