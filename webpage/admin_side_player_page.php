<?php
            include '..\database_connect.php';

            $pCount = array(0, 0, 0, 0);
            $i = 0;

            $top_players_result = array();
            $top = false;
            if (!$conn->connect_error) {


                $sqle =     "SELECT COUNT(*) AS `total`
                                FROM `player`;";

                $sqle .=    "SELECT COUNT(*) AS `total`
                                FROM `player`
                                WHERE prestatus = 'y';";

                $sqle .=     "SELECT COUNT(*) AS `total`
                                FROM `applicant`;";

                $sqle .=    "SELECT COUNT(*) AS `total`
                                FROM player
                                WHERE DATE(regDate) = curdate();";

                $top_players = "SELECT sp.id, CONCAT(fname, ' ', lname) AS full_name, p.position,
                                        timestampdiff(YEAR, DATE(birthDate), CURDATE()) AS age,
                                        ((sp.pscore + st.tscore)/2) AS base_score
                                FROM scorecard_practise sp JOIN scorecard_tournament st
                                ON sp.id = st.id JOIN player p 
                                ON p.id = sp.id
                                WHERE p.prestatus = 'y'
                                ORDER BY base_score DESC
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
                
                    if($top_players_result = $conn->query($top_players)) {
                       $top = true;
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
    <!-- <meta http-equiv="refresh" content="30"> -->
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

        .AddPlayerPending {
            background-color: antwhiteiquewhite;
            padding: 0px 8px;
            display: flex;
            margin-bottom: 16px !important;
        }

        .AddPlayer {
            font-size: 20px;
            color: white;
            margin-left: 10px;
            width: 24%;
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
                    <a href="#blog" target="_blank"><span>Coaches</span></a>
                    <a href="#videos" target="_blank"><span>Employees</span></a>
                    <a href="#More" target="_blank"><span>User</span></a>
                    <a href="#More" target="_blank"><span>Academic</span></a>
                    <a href="#More" target="_blank"><span>Performance</span></a>
                    <a href="#More" target="_blank"><span>Tournament</span></a>
                    <a href="#More" target="_blank"><span>Finance</span></a>
                    <a href="#More" target="_blank"><span>Message</span></a>
                    <a href="#More" target="_blank"><span>Mail</span></a>
                    <a href="#More" target="_blank"><span>Inventory</span></a>
                    <a href="#More" target="_blank"><span>Media</span></a>
                    <a href="http://localhost/webpage/logout.php" target="_blank"><span>Logout</span></a> 
                </div>
            </div>
        </div>

        <div class="side">

            <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
                <span class="material-icons" style="font-size: 24px;">dashboard</span>
                <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Players</span>
            </div>     


            <!-- this is the quick look up panel -->
            <div class="quickLookup">

                <div class="quickView" style="background-color:#f44336!important;">
                    <div class="viewIcons"><span class="material-icons" style="font-size:50px;padding-top: 10px;">layers</span></div>
                    <div class="viewPorts"><a href="/webpage/players_total.php?page=0"><span class="emp_text"">Total</strong></span> </a></div>
                    <div class=" viewPortValue"> <span> <?php echo $pCount[0];?> </span></div>
                </div>

                <div class="quickView" style="background-color:#ff9800!important;">
                    <div class="viewIcons"><span class="material-icons" style="font-size:50px;padding-top: 10px;">reduce_capacity</span></div>
                    <div class="viewPorts"><a href="http://localhost/webpage/players_active.php?page=0"><span class="emp_text">Active</strong></span></a></div>
                    <div class="viewPortValue"> <span> <?php echo $pCount[1]; ?></span></div>
                </div>

                <div class="quickView" style="background-color:#2196f3!important;">
                    <div class="viewIcons"><span class="material-icons" style="font-size:50px;padding-top: 10px;">assignment_late</span></div>
                    <div class="viewPorts"><a href="http://localhost/webpage/players_pending.php?page=0"><span class="emp_text">Pending</span></a></div>
                    <div class="viewPortValue"> <span><?php echo $pCount[2];?></span></div>

                </div>

                <div class="quickView" style="background-color:#009680!important;">
                    <div class="viewIcons"><span class="material-icons" style="font-size:50px;padding-top: 10px;">new_releases</span></div>
                    <div class="viewPorts"><a href="http://localhost/webpage/players_new.php?page=0"><span class="emp_text">New Admitted</span></a></div>
                    <div class="viewPortValue"> <span><?php echo $pCount[3];?></span></div>
                </div>

            </div>

            <div class="AddPlayerPending">
                <div class="AddPlayer">
                    <a href="http://localhost/webpage/player_registration.php" class="addPlayerLink">
                        <span class="material-icons" style="font-size:60px;">person_add</span>
                        <br>
                        <span>Add&nbsp;Player</span>
                    </a>
                </div>
                <div class="AddPlayer">
                    <a href="http://localhost/webpage/player_analysis.php" class="addPlayerLink">
                        <span class="material-icons" style="font-size:60px;">leaderboard</span>
                        <br>
                        <span>Player Analytics</span>
                    </a>
                </div>


            </div>


            <div class="feeds">
                <div style="text-align: left; font-size: 20px; padding-bottom:10px;">
                    <span>Top Players</span>
                </div>
                <table class="feedTable">
                    <tr class="feedTableRow">
                        <th>picture</th>
                        <th>Player Name</th>
                        <th>age</th>
                        <th>position</th>
                    </tr>
                    <?php
                        if($top_players_result->num_rows > 0){
                            while($row = $top_players_result->fetch_assoc()){
                                echo'<tr class="feedTableRow">
                                <td><img src="res/user4.png" style="width:100px;"></td>
                                <td>'.$row['full_name'].'</td>
                                <td>'.$row['age'].'</td>
                                <td>'.$row['position'].'</td>
                                </tr>';
                            }
                        }
                        
                    ?>


                </table>
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