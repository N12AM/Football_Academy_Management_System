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
                Football Academy ManageMent System <span><i class="fas fa-futbol"></i></span>
            </span> 
        </header>









<div class="page">
    <div class="main" style="padding-top:40px;  ">

        <div class="user" style="height:250px;font-family:'Aclonica',Arial, Helvetica, sans-serif;">
            <img src="res/user3.png" style="width:106px">
            <span>Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></span><br>

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
            <a href="http://localhost/webpage/logout.php"target="_blank"><span><i class="far fa-plus-square"></i></span>Logout</a>

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
            
            <!-- <table class="quickLookupTable">
                <tr >
                    <td class="quickLookupRows">Employees</td>
                    <td class="quickLookupRows">Coachs</td>
                    <td class="quickLookupRows">Players</td>
                    <td class="quickLookupRows">Updates</td>
                </tr>   
            </table> -->
            
            <div class="quickView qv1" style="background-color:#f44336!important;">
                
                
                <div class="viewIcons">
                    <span class="material-icons" style="font-size:50px;padding-top: 10px;">layers</span>
                </div>
                
                <div class="viewPorts">
                    <a href="#" class="viewPortLink">
                        <span class="emp_text">Total</strong></span>
                    </a>
                </div>
                <div class="viewPortValue"> <span>0</span></div>
            </div>
            <div class="quickView qv2" style="background-color:#ff9800!important;">
                <div class="viewIcons">
                    <span class="material-icons" style="font-size:50px;padding-top: 10px;">reduce_capacity</span>

                </div>
                
                <div class="viewPorts">
                    <a href="#" class="viewPortLink">
                        <span class="emp_text">Active</strong></span></div>
                    </a>
                    
                <div class="viewPortValue"> <span>0</span></div>

            </div>
            <div class="quickView qv3" style="background-color:#2196f3!important;">
                <div class="viewIcons">
                    <span class="material-icons" style="font-size:50px;padding-top: 10px;">assignment_late</span>
                </div>
                
                <div class="viewPorts">
                    <a href="#"class="viewPortLink">
                        <span class="emp_text">Pending</span></div>
                    </a>
                <div class="viewPortValue"> <span>0</span></div>

            </div>
            <div class="quickView qv4" style="background-color:#009680!important;">
                <div class="viewIcons">
                    <span class="material-icons" style="font-size:50px;padding-top: 10px;">new_releases</span>
                </div>
                
                <div class="viewPorts">
                    <a href="#" class="viewPortLink">
                        <span class="emp_text">New Admitted</span></div>
                    </a>
                <div class="viewPortValue"> <span>0</span></div>

            </div>
         
            










        </div>

            <!-- + REMEMBER THE FEEDS WILL UPDATE 
                 + WE WILL BE NEEDING ANOTHER database TABLE TO HOLD RECENT EVENTS
                 + THAT WAY WHEN EVER WE VISIT THIS PAGE WE CAN KEEP THE EVENTS
                 + the table will hold event name and time when it happend
                 + we can substract that time from current time to find time diff
            -->



        <div class="AddPlayerPending">
            <div class="AddPlayer" >
  
                <form action="#" method="post" class="sortForm">
                    <input type="radio" value="id" name="sort" id="sort" checked="checked">ID
                    <input type="radio" value="fname" name="sort" id="sort">fname
                    <input type="radio" value="lname" name="sort" id="sort">lname
                    <input type="radio" value="bgrh" name="sort" id="sort">blood&nbsp;group<br><br>
                    <input type="submit" value="Sort" name="sort" id="sort">
                </form>
                    
                    
             
            </div>
            <div class="AddPlayer searchPlayer" >
     
                <form action="#" method="post" class="searchForm">
                    <input type="text" placeholder="search player here" name="sort" id="sort">
                    <input type="submit" value="Sort" name="sort" id="sort">
                </form>
                    

            </div>
 

        </div>


        <div class="feeds">
            <div style="text-align: center; font-size: 20px; padding-bottom:10px; padding-right:0px;">
                <span>Results found: </span>
                <span>10</span>
            </div>
            <table class="feedTable">
                <tr class="feedTableRow">
                   <th>picture</th>
                   <th>Player ID</th>
                   <th>Player Name</th>
                    <th>Player age</th>
                    <th>Field position</th>
                    <th>Recent Tournament</th>
                    <th>More</th>

                </tr>
                <tr class="feedTableRow">
                    
                    <td><img src="res/user4.png" style="width:100px;"></td>
                    <td>35</td>
                    <td>pName</td>
                    <td>35</td>
                    <td>striker</td>
                    <td>BT league</td>
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>
                <tr class="feedTableRow">
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
                    <td><a href="#"><span>View Profile</span></a></td>
                </tr>

                </tr>
            </table>
        </div>
        
        <div class="nextprevParent">
            <div class="nextprevChild">
                <div class="prevButton">
                    <a href="#">previous</a>
                </div>
            </div>
            <div class="nextprevChild">
                <div class="nextButton">
                    <a href="next">next</a>
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