<!DOCTYPE html>
<head>

<body>
<?php
//  $string = "2010-11-24";
//  $date = DateTime::createFromFormat("Y-m-d", $string);
//  echo $date->format("Y-m-d");
                include 'database_connect.php';


                $bdate = $_POST['date'];

                echo $bdate;
                $date = DateTime::createFromFormat("Y-m-d", $bdate);
                echo $date->format("m-Y-d");


                // if(! $conn->connect_error){
                    
                    


                //     // }
                // }
            ?>

            <!-- <?php
                $conn->close()
            ?> -->
</body>

</head>

</html>