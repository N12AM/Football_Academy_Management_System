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
    if(isset($_GET["applicant"])){
        if($_GET["applicant"] == 'yes'){
            echo'<script>window.alert("New Coach Added");</script>';
        }
    }
    if(isset($_GET["changed"])){
        if($_GET["changed"] == 'yes'){
            echo'<script>window.alert("Coach Information Updated");</script>';
        }
    }
    if(isset($_GET["changed"])){
        if($_GET["changed"] == 'no'){
            echo'<script>window.alert("Coach Information Unchanged");</script>';
        }
    }
?>
<?php
                include '..\database_connect.php';
                $pCount = array(0,0,0,0);
                $i = 0;
                if(! $conn->connect_error){
                    $order_by = "id";
                    $order_type = "asc";

                    if(isset($_POST['sort'])){
                        $order_by = $_POST['sort'];
                    }
                    if(isset($_POST['ascDesc'])){
                        $order_type = $_POST['ascDesc'];
                    }
                    if(isset($_GET['sort'])){
                        $order_by = $_GET['sort'];
                    }
                    if(isset($_GET['ascDesc'])){
                        $order_type = $_GET['ascDesc'];
                    }
                    $offset_value = 0;
                    $page = 0;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                        $offset_value = ($page * 10);
                    }
                    $sqle =     "SELECT COUNT(*) AS `total`
                                FROM `coach`;";
                    $sqle .=    "SELECT COUNT(*) AS `total`
                                FROM `coach`
                                WHERE leaveDate IS NULL;";
                    $sqle .=    "SELECT COUNT(*) AS `total`
                                FROM coach
                                WHERE DATE(regDate) = curdate();";
                    if($order_type == 'asc'){
                        $sqle .=   "SELECT ch.*, CONCAT(fname,' ',lname) AS full_name, TIMESTAMPDIFF(YEAR, birthDate, CURDATE()) AS age , chp.position AS pos,
                                                        (chp.base_salary * cc.commision) AS salary
                                    FROM coach ch JOIN coach_position chp ON chp.id = ch.position
                                    JOIN coach_commision cc ON cc.id = ch.id
                                    WHERE leaveDate IS NULL
                                    ORDER BY $order_by ASC
                                    LIMIT 10 OFFSET $offset_value;";
                    }        
                    else if($order_type == 'desc'){
                        $sqle .=   "SELECT ch.*, CONCAT(fname,' ',lname) AS full_name, TIMESTAMPDIFF(YEAR, birthDate, CURDATE()) AS age , chp.position AS pos,
                                                        (chp.base_salary * cc.commision) AS salary
                                    FROM coach ch JOIN coach_position chp ON chp.id = ch.position
                                    JOIN coach_commision cc ON cc.id = ch.id
                                    WHERE leaveDate IS NULL
                                    ORDER BY $order_by DESC
                                    LIMIT 10 OFFSET $offset_value;";
                    }        
                    if($conn->multi_query($sqle)){
                        do{
                                if($result = $conn->store_result()){
                                    if($result->num_rows > 0){
                                        // $pCount[$i] = $result->num_rows;
                                        if($i < 3){
                                            $res = $result->fetch_assoc();
                                            $pCount[$i] = $res['total'];
                                        }
                                    }
                                    $i++;
                                }    
                        }while($conn->next_result());
                    }
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
        <link rel="stylesheet" type="text/css" href="..\mainStyle.css">
        <link rel="stylesheet" type="text/css" href="coachPageStyle.css">
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'> 
        <!-- <script src="https://kit.fontawesome.com/9de1d8df31.js" crossorigin="anonymous"></script> -->
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
            <img src="..\res/user3.png" style="width:106px">
            <span>Welcome, <strong>    <?php echo htmlspecialchars($_SESSION["username"]); ?>
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
                <a href="http://localhost/webpage/admin_side_player_page.php" ><span>Players</span></a>
                <a href="http://localhost/webpage/coach/coach_mainpage.php"style="color:#000;background-color:#999;"><span>Coaches</span></a>
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
            <span style="font-family:'Aclonica',Arial, Helvetica, sans-serif;">Coach</span>
        </div>
        <!-- this is the quick look up panel -->
        <div class="quickLookup">
            <div class="quickView qv1">
                <div class="viewIcons"><span class="material-icons" style="font-size:50px;padding-top: 10px;">layers</span></div>
                <div class="viewPorts"><a href="http://localhost/webpage/coach/coach_total.php?page=0" class="viewPortLink"><span class="emp_text">Total Coach</strong></span></a></div>
                <div class="viewPortValue"> <span><?php echo $pCount[0]; ?></span></div>
            </div>
            <div class="quickView qv2">
                <div class="viewIcons"><span class="material-icons" style="font-size:50px;padding-top: 10px;">reduce_capacity</span></div>
                <div class="viewPorts"><a href="http://localhost/webpage/coach/coach_mainpage.php?page=0" class="viewPortLink"><span class="emp_text">Now</strong></span></a></div> 
                <div class="viewPortValue"> <span><?php echo $pCount[1];  ?></span></div>
            </div>
            <div class="quickView qv3">
                <div class="viewIcons"><span class="material-icons" style="font-size:50px;padding-top: 10px;">assignment_late</span></div>
                <div class="viewPorts"><a href="http://localhost/webpage/coach/coach_new.php?page=0"class="viewPortLink"><span class="emp_text">New Joined</span></a></div>
                <div class="viewPortValue"><span><?php echo $pCount[2]; ?></span></div>
            </div>
            <div class="quickView qv4 hex">
                    <a href="http://localhost/webpage/coach/register_coach.php" class="viewPortLink">
                    <span class="material-icons" style="font-size:60px;">person_add</span>
                    <span class="add-coach"></span>
                    <span class="emp_text">Add&nbsp;New&nbsp;Coach</span></a>
            </div>
        </div>

        <div class="AddPlayerPending">
            <div class="AddPlayer" >
                <form action="http://localhost/webpage/coach/coach_mainpage.php" method="POST" class="sortForm">
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
                <form action="http://localhost/webpage/players_search.php?where=coach_view" method="post" class="searchForm">
                    <input type="text" placeholder="search coach here" name="search" style="width:40%; padding:8px; margin-right:6%; " required>
                    <input type="submit" value="Search"  id="search" style="width:10%; padding:8px;">
                </form>    
            </div>
        </div>
        <div class="feeds">
            <div style="text-align: center; font-size: 20px; padding-bottom:10px; padding-right:0px; ">
                <span>Results found: </span>
                <span><?php echo $pCount[1]?></span>
            </div>
            <table class="feedTable">
                <tr class="feedTableRow">
                   <th>picture</th>
                   <th>ID</th>
                   <th>Name</th>
                   <th>email</th>
                   <th>Age</th>
                    <th>Birth date</th>
                    <th>Reg date</th>
                    <th>position</th>
                    <th>Salary</th>
                    <th>Edit</th>
                </tr>
                <?php
                $preText = ""; $p = 0;
                    //    if($result = $conn->store_result())
                        while($row = $result->fetch_assoc()){
                            echo '<tr class="feedTableRow">
                                    <td><img src="..\res/user5.png" style="width:100px;"></td>
                                    <td>' .$row['id']. '</td>
                                    <td>'.$row['full_name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['age'].'</td>
                                    <td>'.$row['birthDate'].'</td>
                                    <td>'.$row['regDate'].'</td>
                                    <td>'.$row['pos'].'</td>
                                    <td>'.$row['salary'].'</td>
                                    <td><a href="http://localhost/webpage/coach/coach_info_update.php?id='.$row['id'].'">edit</a></td>
                                 </tr>';
                            $p++;
                        }
                ?>
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
                if($pCount[1] > $total_printed){
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
                    <a href="http://localhost/webpage/coach/coach_mainpage.php?sort='.$order_by.'&ascDesc='.$order_type.'&page='.$prev_page.'">Previous Page</a>';
                ?>
                </div>
            </div>
            <div class="nextprevChild">
                <div class="nextButton">
                <?php
                
                if($go_to_next_page)
                 echo '
                    <a href="http://localhost/webpage/coach/coach_mainpage.php?sort='.$order_by.'&ascDesc='.$order_type.'&page='.$next_page.'">Next Page</a>';
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