<?php
include '..\database_connect.php';

$pgoals = $passist = $pfoul = $pdefence = 0;
$pscore = 0.0;
$tgoals = $tassist = $tfoul = $tdefence = 0;
$tscore = 0.0;

$training_time = 0;
$idle_time = 0;
$game_time = 0;

$searchOK = 0;
$searchID = 0;
if (isset($_GET['searchID'])) {
    $searchID = $_GET['searchID'];
    $searchOK = 1;
    echo '<script>console.log("ID OK"); </script>';

}
if (!$conn->connect_error && $searchOK == 1) {

    echo '<script>console.log("searching"); </script>';

    $sqle = "SELECT *, sp.id AS player_id
            FROM scorecard_practise sp JOIN scorecard_tournament st
            ON st.id = sp.id JOIN player_time pt
            ON pt.id = st.id
            WHERE pt.id = $searchID;";

try{
    if($result = $conn->query($sqle)){

        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){
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

                $training_time = $row['training'];
                $idle_time = $row['idle'];
                $game_time = $row['game_time'];
                
            }
            
        }
    }
}
catch(Exception $e){
    echo '<script>console.log('.$e.');</script>';
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
        <div class="side" style="background-color: white!important;">

            <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
                <span class="material-icons" style="font-size: 24px;">dashboard</span>
                <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Edit ScoreCard for ID-<?php echo $searchID ?></span>
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
                    <div>
                        <form method="post" action="http://localhost/webpage/update_scorecard.php">
                        <table class=scorecard-table>
                            <tr>
                                <th>training time</th>
                                <td><?php echo $training_time ?> hours</td>
                                <td class="time-update">
                                    <input type="number" name="training_time" value ="0" placeholder="add more time"> hours
                                </td>
                            </tr>
                            <tr>
                                <th>Idle time</th>
                                <td><?php echo $idle_time ?> hours</td>
                                <td class="time-update">
                                    <input type="number" name="idle_time" value ="0" placeholder="add more time"> hours
                                </td>
                            </tr>
                            <tr>
                                <th>Game time</th>
                                <td><?php echo $game_time ?> hours</td>
                                <td class="time-update">
                                    <input type="number" name="game_time" value ="0" placeholder="add more time"> hours
                                </td>
                            </tr>
                        </table>
                        <div style="text-align:left; font-size:30px;margin-top:10%;">
                            <h3>For Practise match</h3>
                        </div>
                        <table class=scorecard-table>
                            <tr>
                                <th>total goals</th>
                                <td><?php echo $pgoals ?></td>
                                <td class="time-update">
                                    <input type="number" name="pgoals" value ="0" placeholder="add more time">
                                </td>
                            </tr>
                            <tr>
                                <th>total assist</th>
                                <td><?php echo $passist ?></td>
                                <td class="time-update">
                                    <input type="number" name="passist" value ="0" placeholder="add more time">
                                </td>
                            </tr>
                            <tr>
                                <th>total foul</th>
                                <td><?php echo $pfoul ?></td>
                                <td class="time-update">
                                    <input type="number" name="pfoul" value ="0" placeholder="add more time">
                                </td>
                            </tr>
                            <tr>
                                <th>total defence</th>
                                <td><?php echo $pdefence ?></td>
                                <td class="time-update">
                                    <input type="number" name="pdefence" value ="0" placeholder="add more time">
                                </td>
                            </tr>
                            <tr style="background-color: #ff00005e">
                                <th>Score</th>
                                <td><?php echo $pscore ?></td>
                                <td class="time-update">
                                    <input type="number" name="pscore" value ="<?php echo $pscore?>" placeholder="Update score">
                                </td>
                            </tr>
                        </table>
                        <?php  
                            if(isset($_GET['score'])){
                                if($_GET['score'] == 'incorrect'){
                                    echo '
                                    <div style="color:red">
                                        <h2>* Player score is out of 10. Score must be within [0-10] </h2>
                                    </div>';

                                }
                            }

                        ?>
                        <div style="text-align:left; font-size:30px;margin-top:10%;">
                            <h3>For Tournament</h3>
                        </div>
                        <table class=scorecard-table>
                        <tr>
                                <th>total goals</th>
                                <td><?php echo $tgoals ?></td>
                                <td class="time-update">
                                    <input type="number" name="tgoals" value ="0" placeholder="add more time">
                                </td>
                            </tr>
                            <tr>
                                <th>total assist</th>
                                <td><?php echo $tassist ?></td>
                                <td class="time-update">
                                    <input type="number" name="tassist" value ="0" placeholder="add more time">
                                </td>
                            </tr>
                            <tr>
                                <th>total foul</th>
                                <td><?php echo $tfoul ?></td>
                                <td class="time-update">
                                    <input type="number" name="tfoul" value ="0" placeholder="add more time">
                                </td>
                            </tr>
                            <tr>
                                <th>total defence</th>
                                <td><?php echo $tdefence ?></td>
                                <td class="time-update">
                                    <input type="number" name="tdefence" value ="0" placeholder="add more time">
                                </td>
                            </tr>
                            <tr style="background-color: #ff00005e">
                                <th>Score</th>
                                <td><?php echo $tscore ?></td>
                                <td class="time-update">
                                    <input type="number" name="tscore" value ="<?php echo $tscore?>" placeholder="update score">
                                </td>
                            </tr>
                        </table>
                        <?php  
                            if(isset($_GET['score'])){
                                if($_GET['score'] == 'incorrect'){
                                    echo '
                                    <div style="color:red">
                                        <h2>* Player score is out of 10. Score must be within [0-10] </h2>
                                    </div>';

                                }
                            }

                        ?>
                            <div class="score-update">
                                <input type="hidden" name="id" value=<?php echo $searchID ?>>
                                <input type="submit" value="Update">
                            </div>

                        </form>
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