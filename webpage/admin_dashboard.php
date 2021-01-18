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
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

    <!-- <script src="https://kit.fontawesome.com/9de1d8df31.js" crossorigin="anonymous"></script> -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1 !important;
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
                <span>Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></span><br>

                <div class="userIcon">
                    <a href="http://localhost/webpage/user/profile.php" class="icon"><i class="material-icons">person</i></a>
                    <a href="http://localhost/webpage/mail/mail_main.php" class="icon"><i class="material-icons">email</i></a>
                    <a href="http://localhost/webpage/login/logout.php" class="icon"><i class="material-icons">login</i></a>
                </div>
            </div>
            <div class="menuBar">
                <div class="menu">
                    <a href="http://localhost/webpage/admin_dashboard.php"style="color:#000;background-color:#999;"><span>Dashboard</span></a>
                    <a href="http://localhost/webpage/admin_side_player_page.php" ><span>Players</span></a>
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

                $empCount = array(0, 0, 0, 0);
                $i = 0;

                if (!$conn->connect_error) {
                    $sqle = "SELECT COUNT(*) AS `total` FROM `employee`;";
                    $sqle .= "SELECT COUNT(*) AS `total` FROM `coach`;";
                    $sqle .= "SELECT COUNT(*) AS `total` FROM `player`;";
                    $sqle .= "SELECT COUNT(*) AS `total` FROM `tournament` WHERE wstat ='win';";
                    $sqle .= "SELECT ename, timestampdiff(SECOND,etime,CURTIME()) AS `timed`
                            FROM recent_events
                                ORDER BY timed ASC
                                LIMIT 10;";

                    if ($conn->multi_query($sqle)) {
                        do {
                            if ($result = $conn->store_result()) {
                                if ($result->num_rows > 0) {
                                    // $pCount[$i] = $result->num_rows;
                                    if ($i < 4) {
                                        $res = $result->fetch_assoc();
                                        $pCount[$i] = $res['total'];
                                    }
                                }
                                $i++;
                            }
                        } while ($conn->next_result());
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
                            echo $pCount[0];
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
                            echo $pCount[1];
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
                            echo $pCount[2];
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
                            echo $pCount[3];
                            ?>
                        </span></div>

                </div>

            </div>



            <div class="dashboard_center">
                <div class="extra" > 
                <!-- style="background-color:rgba(255, 0, 0, 0.185) -->
                    <video width="100%" height="100%" controls  autoplay muted>
                <source src="http://localhost/webpage/res/intro.mp4" type="video/mp4">
                Your browser does not support the video tag.
                </video>
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


                        <?php
                        $p = 0;$time = 0; $postfix=" seconds ago";
                            while($row = $result->fetch_assoc()){
                                if($row['timed'] >60){
                                    $time = $row['timed'] / 60;
                                    $postfix = " minutes ago";
                                    
                                    if($time > 60){
                                        $time = $time / 60;
                                        $postfix = " hours ago";


                                        if($time > 24){
                                            $time = $time / 24;
                                            $postfix = " days ago";
                                        }
                                    }
                                }
                                else{
                                    $time = $row['timed'];
                                    $postfix=" seconds ago";
                                }
                                echo '<tr class="feedTableRow">
                                    <td><span class="material-icons">fiber_new</span></td>
                                    <td>'.$row['ename'].'</td>
                                    <td>'.(int)$time.' '.$postfix.'</td>
                                    </tr>';

                                    $p++;
                            }
                        ?>




                        <!-- <tr class="feedTableRow">
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
                        </tr> -->

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