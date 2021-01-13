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


/* ---------------------------------------below style for SORT and SEARCH players */
.sortForm{
    padding:40px 0px;;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 25px;
    text-align: left;;
}
.sortForm > input{
    transform: scale(1.2);
    padding:5px 15px;
    background-color: #009680!important;
    color: white;
    font-weight: bold;
    font-size:16px;
    border-style: none;
}

.searchPlayer{
    text-align:right;
    padding-right: 40px;
}
.searchForm{
    padding-top:60px;
}
.searchForm > input{
    transform: scale(1.3);
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
    <div class="main" style="padding-top:40px;  ">

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
            <a href="http://localhost/webpage/admin_side_player_page.php" style="color:#000;background-color:#999;"><span>Players</span></a>
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


    


    
    <div class="side">
        
        <div class="dashboard" style="height:50px; text-align: left; font-size:23px; padding-left: 20px;;">
            <span class="material-icons" style="font-size: 24px;">dashboard</span>
            <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Search Players</span>
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
            

            <?php
                include '..\database_connect.php';

                $pCount = array(0,0,0,0);
                $i = 0;

                if(! $conn->connect_error){
                    $order_by = "id";
                    $order_type = "asc";


                    $search = "";
                    $search_type="";
                    $offset_value = 0;
                    $page = 0;
                    
                    echo '<script>console.log("1"); </script>';

                    if(isset($_POST['search']) || isset($_GET['search'])){
                        echo '<script>console.log("2"); </script>';

                        $search = "";
                        $search_type="all";

                        if(isset($_POST['search']))
                            $search = $_POST['search'];
                        else if(isset($_GET['search']))
                            $search = $_GET['search'];

                            $search = trim($search);
                            $search = htmlspecialchars($search);

                        if(isset($_POST['query']) || isset($_GET['query'])){

                            if(isset($_POST['query']))
                                $search_type = $_POST['query'];
                            
                            else if(isset($_GET['query']))
                                $search_type = $_GET['query'];
                            
                                echo '<script>console.log("'.$search_type.'"); </script>';
                                echo '<script>console.log("'.$search.'"); </script>';


                        }

    
                        if(isset($_POST['sort']) || isset($_GET['sort'])){
                            if(isset($_POST['sort']))
                                $order_by = $_POST['sort'];
                            
                            else if(isset($_GET['sort']))
                                $order_by = $_GET['sort'];

                        }
                        if(isset($_POST['ascDesc']) || isset($_GET['ascDesc'])){
                            
                            if(isset($_POST['ascDesc']))
                                $order_type = $_POST['ascDesc'];
                            
                            else if(isset($_GET['ascDesc']))
                                $order_type = $_GET['ascDesc'];
                        }

                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                            $offset_value = ($page * 10);
                        }
                        
                        $table_name = "playerbasicinfo";
                        if(isset($_GET['where'])){
                            $table_name = $_GET['where'];
                        }
                        // if (!$mysqli->query("DROP VIEW IF EXISTS player_name") ||
                        //      !$mysqli->query("CREATE VIEW player_name AS
                        //                         SELECT id, CONCAT(fname, ' ',lname) AS full_name, timestampdiff(YEAR, DATE(birthDate), CURDATE()) AS age, position, prestatus
                        //                         FROM player;")) {
                        //     echo "VIEW creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
                        // }

                        if($search_type == 'new'){
                            $sqle =    "SELECT COUNT(*) AS `total`
                                        FROM $table_name
                                        WHERE full_name like '%$search%' AND DATE(regDate) = curdate();";
                        }
                        else if($search_type =='y'){
                            $sqle =   "SELECT COUNT(*) AS `total`
                                        FROM $table_name
                                        WHERE full_name like '%$search%' AND prestatus = 'y';";
                        } 
                        else{
                            $sqle =    "SELECT COUNT(*) AS `total`
                            FROM $table_name
                            WHERE full_name like '%$search%';";
                        }
                        
    
                        // $sqle .=    "SELECT COUNT(*) AS `total`
                        //             FROM player
                        //             WHERE DATE(regDate) = curdate();";
                                
                        // $sqle .=    "SELECT id, CONCAT(fname, ' ',lname) AS `full_name`,
                        //                          timestampdiff(YEAR, DATE(birthDate), CURDATE()) AS age , position, prestatus
                        //             FROM player
                        //             LIMIT 10 OFFSET $offset_value;";
    
                        if($search_type =='y'){
                            if($order_type == 'asc'){
                            $sqle .=   "SELECT *
                                        FROM $table_name
                                        WHERE full_name like '%$search%' AND prestatus = 'y'
                                        ORDER BY $order_by ASC
                                        LIMIT 10 OFFSET $offset_value;";
                            }        
                            else if($search_type =='y' && $order_type == 'desc'){
                            $sqle .=   "SELECT *
                                        FROM $table_name
                                        WHERE full_name like '%$search%' AND prestatus = 'y'
                                        ORDER BY $order_by DESC
                                        LIMIT 10 OFFSET $offset_value;";
                            }
                        }
                        
                        else if($search_type =='new'){
                            if($order_type == 'asc'){
                                $sqle .=   "SELECT *
                                            FROM $table_name
                                            WHERE full_name like '%$search%' AND DATE(regDate) = curdate()
                                            ORDER BY $order_by ASC
                                            LIMIT 10 OFFSET $offset_value;";
                            }        
                            else if($search_type =='new' && $order_type == 'desc'){
                                $sqle .=   "SELECT *
                                            FROM $table_name
                                            WHERE full_name like '%$search%' AND DATE(regDate) = curdate()
                                            ORDER BY $order_by DESC
                                            LIMIT 10 OFFSET $offset_value;";
                            }
                        }
                        else {
                            if($order_type == 'asc'){
                                $sqle .=   "SELECT *
                                            FROM $table_name
                                            WHERE full_name like '%$search%'
                                            ORDER BY $order_by ASC
                                            LIMIT 10 OFFSET $offset_value;";
                            }        
                            else if($order_type == 'desc'){
                                $sqle .=   "SELECT *
                                            FROM $table_name
                                            WHERE full_name like '%$search%'
                                            ORDER BY $order_by DESC
                                            LIMIT 10 OFFSET $offset_value;";
                            }
                        }
                        
                        // if($order_by == 'id' && $order_type == 'asc'){
                        //     $sqle .=   "SELECT *
                        //                 FROM playerbasicinfo
                        //                 WHERE full_name like '%$search%'
                        //                 ORDER BY id ASC
                        //                 LIMIT 10 OFFSET $offset_value;";
                        // }        
                        // else if($order_by == 'id' && $order_type == 'desc'){
                        //     $sqle .=   "SELECT *
                        //                 FROM player_name
                        //                 WHERE full_name like '%$search%'
                        //                 ORDER BY id DESC
                        //                 LIMIT 10 OFFSET $offset_value;";
                        // }        
                        // else if($order_by == 'name' && $order_type == 'asc'){
                        //     $sqle .=   "SELECT *
                        //                 FROM player_name
                        //                 WHERE full_name like '%$search%'
                        //                 ORDER BY `full_name` ASC
                        //                 LIMIT 10 OFFSET $offset_value;";
                        // }        
                        // else if($order_by == 'name' && $order_type == 'desc'){
                        //     $sqle .=   "SELECT *
                        //                 FROM player_name
                        //                 WHERE full_name like '%$search%'
                        //                 ORDER BY `full_name` DESC
                        //                 LIMIT 10 OFFSET $offset_value;";
                        // }        
                        // else if($order_by == 'age' && $order_type == 'asc'){
                        //     $sqle .=   "SELECT *
                        //                 FROM player_name
                        //                 WHERE full_name like '%$search%'
                        //                 ORDER BY age ASC
                        //                 LIMIT 10 OFFSET $offset_value;";
                        // }        
                        // else if($order_by == 'age' && $order_type == 'desc'){
                        //     $sqle .=   "SELECT *
                        //                 FROM player_name
                        //                 WHERE full_name like '%$search%'
                        //                 ORDER BY age DESC
                        //                 LIMIT 10 OFFSET $offset_value;";
                        // }        
                        
                    
                        if($conn->multi_query($sqle)){
                            do{
                                    if($result = $conn->store_result()){
                                        
                                        echo '<script>console.log("'.$i.'"); </script>';

                                        if($result->num_rows > 0){
                                            // $pCount[$i] = $result->num_rows;
                                            if($i == 0){
                                                $res = $result->fetch_assoc();
                                                $pCount[$i] = $res['total'];
                                                echo '<script>console.log("'.$pCount[$i].'"); </script>';
                                            }
                                        }
                                        $i++;
                                    }
                                    
                            }while($conn->next_result());
                        }









    
                    }







                    
                   

                }
            ?>






        </div>

            <!-- + REMEMBER THE FEEDS WILL UPDATE 
                 + WE WILL BE NEEDING ANOTHER database TABLE TO HOLD RECENT EVENTS
                 + THAT WAY WHEN EVER WE VISIT THIS PAGE WE CAN KEEP THE EVENTS
                 + the table will hold event name and time when it happend
                 + we can substract that time from current time to find time diff
            -->



        <div class="AddPlayerPending">
            <div class="AddPlayer" >
  
            <?php echo '
                <form action="http://localhost/webpage/players_search.php?query='.$search_type.'&where='.$table_name.'&search='.$search.'" method="POST" class="sortForm">'; ?>
                    <input type="radio" value="id" name="sort" id="sort" <?php if($order_by=='id') echo 'checked'?>>ID
                    <input type="radio" value="full_name" name="sort" id="sort" <?php if($order_by=='full_name') echo 'checked'?>>Name
                    <input type="radio" value="age" name="sort" id="sort" <?php if($order_by=='age') echo 'checked'?>>Age

                    <br><br>
                    <input type="radio" value="asc" name="ascDesc" id="ascDesc" <?php if($order_type=='asc') echo 'checked'?>>ascending
                    <input type="radio" value="desc" name="ascDesc" id="ascDesc"<?php if($order_type=='desc') echo 'checked'?>>descending
                    <input type="submit" value="Sort" id="sort" style="margin-left:5%;">
                    
                </form>
            

            </div>
            <div class="AddPlayer searchPlayer" >
     
            <?php echo '
                <form action="http://localhost/webpage/players_search.php?query='.$search_type.'&where='.$table_name.'" method="post" class="searchForm">
                    <input type="text" placeholder="search player here" name="search" style="width:40%; padding:8px; margin-right:6%; ">
                    <input type="submit" value="Search"  id="search" style="width:10%; padding:8px;">
                </form> 
                ';
                ?>  
            </div>
 

        </div>


        <div class="feeds">
            <div style="text-align: center; font-size: 20px; padding-bottom:10px; padding-right:0px; ">
                <span>Results found: </span>
                <span><?php echo $pCount[0]?></span>
            </div>
            <table class="feedTable">
                <tr class="feedTableRow style="width:100%;">
                   <th>picture</th>
                   <th>ID</th>
                   <th>Name</th>
                    <th>Age</th>
                    <th>position</th>
                    <th>Member type</th>    
                    <th>More</th>
                    <th>int</th>

                </tr>

                <?php
                $preText = ""; $p = 0;
                    //    if($result = $conn->store_result())
                    if(isset($_POST['search']) || isset($_GET['search']))
                        while($row = $result->fetch_assoc()){

                            // if($p == 10)
                            //     break;
                            if ($table_name != 'applicants'){
                                if($row['prestatus'] == 'n')
                                $preText = "No";

                            else if($row['prestatus'] == 'y')
                                $preText = "Yes";
                            else 
                                $preText = 'No';
                            }
                            

                            if ($table_name == 'applicants')
                                echo '<tr class="feedTableRow">
                            
                                    <td><img src="res/user4.png" style="width:100px;"></td>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['full_name'] . '</td>
                                    <td>' . $row['age'] . '</td>
                                    <td>' . $row['phone'] . '</td>
                                    <td>' . $row['city'] . '</td>
                                    <td>' . $row['regDate'] . '</td>
                                    <td><a href="http://webpage/player_profile.php?id=' . $row['id'] . '"><span>View Profile</span></a></td>
                                    <td>' . $p . '</td>
                                </tr>';
                            else
                                echo '<tr class="feedTableRow">
                    
                                        <td><img src="res/user4.png" style="width:100px;"></td>
                                        <td>' .$row['id']. '</td>
                                        <td>'.$row['full_name'].'</td>
                                        <td>'.$row['age'].'</td>
                                        <td>'.$row['position'].'</td>
                                        <td>'.$preText.'</td>
                                        <td><a href="http://webpage/player_profile.php?id='.$row['id'].'"><span>View Profile</span></a></td>
                                        <td>'.$p.'</td>
                                     </tr>';
                            
                            $p++;
                        }

                ?>
                <!-- <tr class="feedTableRow">
                    
                    <td><img src="res/user4.png" style="width:100px;"></td>
                    <td>35</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr> -->
                <!-- <tr class="feedTableRow">
                    <td><img src="res/user5.png" style="width:100px;"></td>
                    <td>36</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>
                <tr class="feedTableRow">
                    <td><img src="res/user6.png" style="width:100px;"></td>
                    <td>37</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>
                <tr class="feedTableRow">
                    <td><img src="res/user7.png" style="width:100px;"></td>
                    <td>38</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>
                <tr class="feedTableRow">
                    <td><img src="res/user8.png" style="width:100px;"></td>
                    <td>39</td>
                    <td>pName</td>
                    <td>40</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>
                <tr class="feedTableRow">
                    <td><img src="res/user9.png" style="width:100px;"></td>
                    <td>41</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>
                <tr class="feedTableRow">
                    <td><img src="res/user4.png" style="width:100px;"></td>
                    <td>42</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>
                <tr class="feedTableRow">
                    <td><img src="res/user5.png" style="width:100px;"></td>
                    <td>43</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>
                <tr class="feedTableRow">
                    <td><img src="res/user6.png" style="width:100px;"></td>
                    <td>44</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>
                <tr class="feedTableRow">
                    <td><img src="res/user7.png" style="width:100px;"></td>
                    <td>45</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td> -->
                </tr>
            </table>
        </div>
        
        <div class="nextprevParent">


            <?php


                $total_printed = 0;
                $prev_page = 0;
                $next_page = 0;

                if($page >= 0){
                    $already_printed = $page * 10;
                    $total_printed = $already_printed + $p;
                }
                $go_to_next_page = false;
                if($pCount[0] > $total_printed){
                    $go_to_next_page = true;
                    $next_page = $page +1;
                }
                
                $go_to_previous_page = false;
                if($total_printed > 10){
                    $go_to_previous_page = true;
                    $prev_page = $page - 1;
                }
            ?>





            <div class="nextprevChild">
                <div class="prevButton">
                <?php
                
                if($go_to_previous_page)
                 echo '
                    <a href="http://localhost/webpage/players_search.php?query='.$search_type.'&search='.$search.'&sort='.$order_by.'&ascDesc='.$order_type.'&page='.$prev_page.'">Previous Page</a>';
                ?>
                </div>
            </div>
            <div class="nextprevChild">
                <div class="nextButton">
                <?php
                
                if($go_to_next_page)
                 echo '
                    <a href="http://localhost/webpage/players_search.php?query='.$search_type.'&search='.$search.'&sort='.$order_by.'&ascDesc='.$order_type.'&page='.$next_page.'">Next Page</a>';
                ?>
                </div>
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