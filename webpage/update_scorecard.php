<?php

    include '..\database_connect.php';

    if(! $conn->connect_error){
        $pgoals = $passist = $pfoul = $pdefence = 0;
        $pscore =0;
        $tgoals = $tassist = $tfoul = $tdefence = 0;
        $tscore = 0;

        $training_time = 0;
        $idle_time = 0;
        $game_time = 0;
        $ok = 1;
        $id = 0;
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(isset($_POST['training_time'])){
            $training_time = $_POST['training_time'];
            echo '<script> console.log('.$training_time.')</script>';

        }
        if(isset($_POST['idle_time'])){
            $idle_time = $_POST['idle_time'];
                        echo '<script> console.log('.$idle_time.')</script>';

        }
        if(isset($_POST['game_time'])){
            $game_time = $_POST['game_time'];
                        echo '<script> console.log('.$game_time.')</script>';

        }
        if(isset($_POST['pgoals'])){
            $pgoals = $_POST['pgoals'];
                        echo '<script> console.log('.$pgoals.')</script>';

        }
        if(isset($_POST['passist'])){
            $passist = $_POST['passist'];
                        echo '<script> console.log('.$passist.')</script>';

        }
        if(isset($_POST['pfoul'])){
            $pfoul = $_POST['pfoul'];
                        echo '<script> console.log('.$pfoul.')</script>';

        }
        if(isset($_POST['pdefence'])){
            $pdefence = $_POST['pdefence'];
                        echo '<script> console.log('.$pdefence.')</script>';

        }
        if(isset($_POST['pscore'])){
            $pscore = $_POST['pscore'];
                        echo '<script> console.log('.$pscore.')</script>';

            if($pscore > 10 || $pscore < 0){
                $ok = 0;
                header('location:http://localhost/webpage/player_scorecard.php?score=incorrect&searchID='.$id.'');
            }
        }

        
        if(isset($_POST['tgoals'])){
            $tgoals = $_POST['tgoals'];
                        echo '<script> console.log('.$tgoals.')</script>';

        }
        if(isset($_POST['tassist'])){
            $tassist = $_POST['tassist'];
                        echo '<script> console.log('.$tassist.')</script>';

        }
        if(isset($_POST['tfoul'])){
            $tfoul = $_POST['tfoul'];
                        echo '<script> console.log('.$tfoul.')</script>';

        }
        if(isset($_POST['tdefence'])){
            $tdefence = $_POST['tdefence'];
                        echo '<script> console.log('.$tdefence.')</script>';

        }
        if(isset($_POST['tscore'])){
            $tscore = $_POST['tscore'];
                        echo '<script> console.log('.$tscore.')</script>';

            if($tscore > 10 || $tscore < 0){
                $ok = 0;
                header('location:http://localhost/webpage/player_scorecard.php?score=incorrect&searchID='.$id.'');
            }
        }

        

        if($ok == 1){
            echo '<script> console.log('.$id.')</script>';
            $sql = "UPDATE scorecard_practise
                    SET
                    pscore = $pscore,
                    pgoals = pgoals + $pgoals,
                    passist = passist + $passist,
                    pdefence= pdefence +$pdefence,
                    pfoul = pfoul + $pfoul
                    WHERE id = $id;";

            if($conn->query($sql)){
                echo '<script> console.log("okay1")</script>';

                $sql = "UPDATE scorecard_tournament
                    SET
                    tscore = $tscore,
                    tgoals = tgoals + $tgoals,
                    tassist = tassist + $tassist,
                    tdefence= tdefence +$tdefence,
                    tfoul = tfoul + $tfoul
                    WHERE id = $id;";

                if($conn->query($sql)){
                    echo '<script> console.log("okay2")</script>';

                    $sql = "INSERT INTO recent_events(ename)
                            VALUES('Player Scorecard Updated');";
                    if($conn->query($sql)){
                        echo '<script> console.log("okay3")</script>';

                        header('location:http://localhost/webpage/player_profile.php?searchID='.$id.'');
                    }
                }
            }
        }

    }


?>