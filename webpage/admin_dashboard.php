<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="pageStyle.css" > -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="mainStyle.css">
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
</style>
    
    </head>

    <body>

        <header class="intro">
            <span>
                Football Academy ManageMent System <span><i class="fas fa-futbol"></i></span>
            </span> 
        </header>









<div class="page">
    <div class="main" style="padding-top:40px;  ">

        <div class="user" style="height:250px;">
            <img src="../webpage/res/user3.png" style="width:106px">
            <span style="margin:0px ; padding:0px; font-size: 20px;">Welcome, <strong>Admin</strong></span><br>

            <div class="userIcon">
                <a href="#" class="icon"><i class="material-icons">person</i></a>
                <a href="#" class="icon"><i class="material-icons">email</i></a>
                <a href="#" class="icon"><i class="material-icons">login</i></a>
            </div>    
        </div>
        <div class="menuBar">
            <div class="menu">
            <a href="http://localhost/webpage/admin_dashboard.php"><span><i class="fab fa-wpforms"></i></span>Dashboard</a>
            <a href="http://localhost/webpage/admin_side_player_page.php"><span><i class="fas fa-newspaper"></i></span>Players</a>
            <a href="#blog"target="_blank"><span></i></span><i class="fas fa-rss-square"></i>Coaches</a>
            <a href="#videos"target="_blank"><span><i class="fas fa-video"></i></span>Employees</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>User</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>Academic</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>Performance</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>Tournament</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>Finance</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>Message</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>Mail</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>Inventory</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>Media</a>
            <a href="#More"target="_blank"><span><i class="far fa-plus-square"></i></span>Logout</a>

        </div>

        </div>
        

                
    </div>


    


    
    <div class="side">
        
        <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
            <span class="material-icons" style="font-size: 24px;">dashboard</span>
            <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Admin's Dashboard</span>
        </div>




        <!-- this is the quick look up panel -->
        <div class="quickLookup">
            





            <!-- REMEMBER THE viewPortValue WILL BE A VARIABLE not 0
                 WE NEED TO ASSIGN A PHP VALIRABLE TO IT   -->


            <?php
                include '..\database_connect.php';

                $empCount = array(0,0,0,0);
                $i = 0;

                if(! $conn->connect_error){
                    
                    
                    $sqle = "SELECT id FROM `employee`;";
                    $sqle .= "SELECT id FROM `coach`;";
                    $sqle .= "SELECT id FROM `player`;";
                    $sqle .= "SELECT id FROM `tournament` WHERE wstat ='win'";

                    
                    
                    if($conn->multi_query($sqle)){
                        do{
                                if($result = $conn->store_result()){
                                    if($result->num_rows > 0){
                                        $empCount[$i] = $result->num_rows;
                                        $i++;
                                    }
                                }
                        }while($conn->next_result());
                    }

                    // $result = $conn->query($sqle);
                    // if($result->num_rows > 0){
                    //     $empCount = $result->num_rows;
                    // }


                    // $sqlc = "SELECT id FROM `coach`";
                    // $resultc = $conn->query($sqlc);
                    // if($resulc->num_rows > 0){
                    //     $empCountc = $resultc->num_rows;c
                    // }


                    // $sqlp = "SELECT id FROM `player`";
                    // $resultp = $conn->query($sqlp);
                    
                    // if($resulp->num_rows > 0){
                    //     $empCountp = $resultp->num_rows;
                    // }
                    
                    // $sqlt = "SELECT id FROM `tournament`";
                    // $resultt = $conn->query($sqlt);
                    
                    // if($resultt->num_rows > 0){
                    //     $empCountt = $resultt->num_rows;
                    // }
                }
            ?>













            <div class="quickView" style="background-color:#f44336!important;">
                
                
                <div class="viewIcons">
                    <span class="material-icons" style="font-size:50px;padding-top: 10px;">record_voice_over</span>
                </div>
                
                <div class="viewPorts"><span class="emp_text">Employees</strong></span></div>
                <div class="viewPortValue"> <span>
                    
                                                                    <?php
                                                                        echo $empCount[0]; 
                                                                    ?>
                
            </span></div>
            </div>


            <div class="quickView" style="background-color:#ff9800!important;">
                <div class="viewIcons">
                    <span class="material-icons" style="font-size:50px;padding-top: 10px;">sports_kabaddi</span>

                </div>
                
                <div class="viewPorts"><span class="emp_text">Coaches</strong></span></div>
                <div class="viewPortValue"> <span>
                                                                        <?php
                                                                            echo $empCount[1]; 
                                                                        ?>                                       
                </span></div>

            </div>
            <div class="quickView" style="background-color:#2196f3!important;">
                <div class="viewIcons">
                    <span class="material-icons" style="font-size:50px;padding-top: 10px;">directions_run</span>
                </div>
                
                <div class="viewPorts"><span class="emp_text">Players</span></div>
                <div class="viewPortValue"> <span>
                                                                        <?php
                                                                            echo $empCount[2]; 
                                                                        ?>
                </span></div>

            </div>
            <div class="quickView" style="background-color:#009680!important;">
                <div class="viewIcons">
                    <span class="material-icons" style="font-size:50px;padding-top: 10px;">emoji_events</span>
                </div>
                
                <div class="viewPorts"><span class="emp_text">Wins</span></div>
                <div class="viewPortValue"> <span>
                                                                        <?php
                                                                            echo $empCount[3]; 
                                                                        ?>
                </span></div>

            </div>
            
        </div>



        <div class="dashboard_center">
            <div class="extra" style="background-color:rgba(255, 0, 0, 0.185)">

            </div>
 
            <!-- + REMEMBER THE FEEDS WILL UPDATE 
                 + WE WILL BE NEEDING ANOTHER database TABLE TO HOLD RECENT EVENTS
                 + THAT WAY WHEN EVER WE VISIT THIS PAGE WE CAN KEEP THE EVENTS
                 + the table will hold event name and time when it happend
                 + we can substract that time from current time to find time diff
            -->
            <div class="feeds">
                <div style="text-align: left; font-size: 20px; padding-bottom:10px;">
                    <span>Recent Feeds</span>
                </div>
                <table class="feedTable">
                    <tr class="feedTableRow">
                       <th></th>
                       <th>what's new</th>
                        <th>when</th>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>
                    <tr class="feedTableRow">
                        <td><span class="material-icons">fiber_new</span></td>
                        <td>EventName</td>
                        <td>11 mins ago</td>
                    </tr>

                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>
        


  







    <footer style="background-color: #f44336!important; color:#fff;z-index: 1000; position:static; margin-top: 13.1%; text-align: center;padding:10px;">
        <span>&copy Copyright 2020-2021 </span>
    </footer>

    <?php
        $conn->close();    
    ?>
    


</body>
    
</html>