<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="pageStyle.css" > -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
 div.error{
    margin:0;
    padding:0;
    padding-top:10px;
    top:0px;
    height:fit-content;
    width:100%;
    text-align:center;
    background-color:bisque;
    color:black;

}
.error p{
    padding:0;
    margin:0;
}
header{

    font-family:'Aclonica';
    color:white;
    background-color:red;
    font-size:30px;
    text-align:left;
    padding:20px;
    top:0;
    position:sticky;

}
.descrip >img{
    margin:auto;
     width:400px;
         height:auto;
}
.menu{
    display:flex;
    background-color:#333;
    width:100%;
    text-align:center;
    flex-direction: column;
}
.menu a{
    color:white;
    text-decoration:none;
    text-align:center;
    padding:20px;  
    padding-right:40px;
    font-size:20px;
}
.menu a:hover{
    background-color:#bbb;
    color:black;
}
#ingd{
    border: 5px double;
    border-radius: 5px;
    background-color: antiquewhite;
    width:60%;
    font-size:20px;
}

.page{
    display:flex;
    flex-wrap:wrap;
    background-color: #f1f1f1!important;
}

.main{
    flex:20%;
    padding-right:20px;
    background-color: #f1f1f1!important;

}
.container{
    padding-left:100px;

 }
.side{
    flex:80%;
    text-align: center;
    padding-top:30px;
    background-color: #f1f1f1!important;
    height:100%;
}

.failed{
    display:none;
}

.page .main .descrip{
    text-align:center;
}
.descrip p{
    font-size: 25px;
}
.img1, .img2, .img3, .img4{
    width:200px;
    height:auto;
}

.procontainer{
    padding-left: 100px;
}

.procedure{
    margin-top:100px;
    width:60%;
    border:5px double;
    border-radius: 5px;
    background-color: antiquewhite;
    font-size: 20px;

}

.procedure #proceed .ordered{
    list-style: upper-roman inside;
}

#references a{
    text-decoration: none;
}

.leave li a{
    padding:15px;
}
.leave li a:link , .leave li a:visited{
    color:black;
}
.leave li a:hover, .leave li a:active{
    color:white;
    background-color:#999;
}

#author{
    text-align:center;
}




/* ------------------------------------------------this part below for user icons */

.icon{
    padding-left:15px;
    padding-right:15px;
    color:black;
}

.userIcon{
        padding-left:105px;
        padding-top:30px;
        font-size:20px;
}

.menuBar{
    background-color:rgb(94, 92, 92);
    height:100%;
    
}

.user{
    background-color:white;
}


/*------------------------------------------------ this part below styles the quick view 4 panels */

.quickLookupTable, .quickLookupRows{
    color:black;
    background-color: bisque;
    
}

.quickView{
    font-size: 25px;
    color:white;

}
.quickLookup{
    
    background-color:antwhiteiquewhite;
    padding:0px 8px;
    display: flex;
    margin-bottom: 16px!important;

}
.quickLookup::before,.quickLookup::after{
    box-sizing:content-box;

}
.quickView{
    margin-left:10px;
    width:24%;
    float:left;
    display:block;
    box-sizing: inherit;
    content:"";
    height:150px;
    bottom: 10;;
}

/* .emp_text{
    width:80px;
    padding-right:80px;
} */

.viewPorts{
    text-align:left;
    padding-left:25px;
}

.viewIcons{
    text-align:left;
    padding-left:10px;
}
.viewPortValue{
    text-align: right;
    padding-right:20px;
    font-size: 30px;
 
}
/*------------------------------------------------ above controls quick view 4 panel */


/* this is for the recent feed. this has 2 divs => [.extra] and [.feeds]  */
.dashboard_center{
    left:0;
    display:flex;
    text-align:right;
    width:100%;
    padding-top: 50px;
}
.extra{
    width:400px;
    flex:30%;
}

.feeds{
    flex:70%;
    padding-left: 50px;
    padding-right:50px;
}


/*-------------------------------------------------------- this part controls the feedTable parts */
.feedTable{
    
    padding-left:150px;;
    padding-right:50px;
    text-align:left;
    margin:auto ;
    font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.feedTable th, .feedTable td{
    border:0px solid #ddd;
    padding:8px;
}

.feedTableRow{
    width:200px;
}

.feedTableRow:nth-child(odd){
    background-color:white
}
.feedTableRow:hover {
    background-color: rgba(255, 0, 0, 0.247);
    
}


.feedTable th{
    padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #f44336!important;;
  color: white;
}
/*---------------------------------------------------------- above controls feed table */




@media (max-width:400px){
    body{
        overflow-x: auto;
        max-width: fit-content;
    }
    .main{
        flex:100%;
        padding-left: 0;
        padding-right: 0;
    }

    .menu, .page{
        flex-direction:column;
    }
    .descrip > img{
        width:200px;
    }
    header{
        font-size: 45px;
        padding-left: 0;
        padding-right: 0;
    }
    .error{
        overflow: hidden;
    }

    .container{
        padding-left: 15%;

    }
    .procontainer{
        padding-left: 15%;
    }
    .procedure{
        width: 80%;
        background-color: rgb(240, 248, 247);

    }
    
    .side p{
        max-width: 200px;
    }
    #finalImage{
        max-height: fit-content;
        display: block;
    }
    .side{
        display: none;
    }
    .failed{
        display:block;
        color:red;
        background-color: #333;
    }
    #ingd{
        width:80%;
        padding-left:10px;
        background-color: rgb(240, 248, 247);

        
    }
   .descrip>img{
       width:50%;
   }
}

@media screen and (max-width: 750px) and (min-width: 400px){
    .menu{
        overflow:hidden;
    }
    body{
        overflow-x: hidden;
    }
    .menu{
        flex-direction: column;
    }
    .container{
        padding-left: 10%;
    }
    #ingd{
        width:90%;
        background-color: rgb(247, 248, 231);
    }
    .procontainer{
        padding-left: 10%;
    }
    .procedure{
        width:90%;
        background-color: rgb(247, 248, 231);
    }

}

@media(min-width: 700px){
    .container{
        padding-left: 10%;
    }
    #ingd{
        width:90%;
        background-color: rgb(238, 248, 238);
    }
    .procontainer{
        padding-left: 10%;
    }
    .procedure{
        width:90%;
        background-color: rgb(238, 248, 238);
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
            <a href="#categories"target="_blank"><span><i class="fab fa-wpforms"></i></span>Dashboard</a>
            <a href="#news"target="_blank"><span><i class="fas fa-newspaper"></i></span>Players</a>
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
            <span >Admin's Dashboard</span>
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