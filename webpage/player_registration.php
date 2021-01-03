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
    z-index:9999;

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
    text-align:justify;
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


/* this is for the recent feed. this has 2 divs => [.extra] and [.feeds] 
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
} */


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



.registration_center{
    font-family: Arial;
  font-size: 22px;
  padding: 8px;
  box-sizing: border-box;
  padding-right:50px;
}



.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px 0px 10px;;
  text-align: left;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 20%;
  text-align: left;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.xcontainer {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

.col-50 input {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
#rh, #gender, #group {
  width: 10%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  transform: scale(1.3);
}

.col-50 label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}


@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}



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
            <img src="res/user3.png" style="width:106px">
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
            <span >Player Registration Form</span>
        </div>




        <!-- this is the quick look up panel -->

        <?php
            $nerror = "Letters only allowed";
            $emerror = "invalid email address";
            $adderror = "invalid address format";
            $ziperror = "only numbers allowed";
            $pherror = "should be 11 digits number";
            $bcnerror = "should be only numbers allowed";
            $naterror ="numbers or special characters are not allowed";
            $fname = $lname = $email = $address = $city = $street = $bgroup = $rh= $gender =$bdate=  $nationality = "";
            $phone = $bcn = $nid = $zip= 0;


            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST['fname']){}
            }
            
        ?>


        <div class="registration_center">
            

            <div class="col-75">
                <div class="xcontainer">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                    <!-- <form method="post" action="http://localhost/webpage/test.php"> -->
            
                        <div class="row">
                            <div class="col-50">
                            <label for="fname"><i class="material-icons">person</i> First Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="First Name" value="<?php echo $fname?>" required>

                            <br><br>

                            <label for="lname"><i class="material-icons">person</i> Last Name</label>
                            <input type="text" id="lname" name="Last Name" placeholder="Last Name" value="<?php echo $lname?>" required>
                            
                            <br><br>
                            <label for="email"><i class="material-icons">email</i> Email</label>
                            <input type="email" id="email" name="email" placeholder="john@example.com" value="<?php echo $email?>" require>
                
                            <br><br>
                            <label for="adr"><span class="material-icons">home</span> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" value="<?php echo $address?>" required>
                            
                            <br><br>
                            <label for="city"><span class="material-icons">location_city</span> City</label>
                            <input type="text" id="city" name="city" placeholder="New York" value="<?php echo $city?>" required>
                
                            <br><br>
                                

                                <div class="row">
                                    <div class="col-50">
                                        <label for="state"><span class="material-icons">edit_road</span>Street</label>
                                        <input type="text" id="state" name="state" placeholder="NY" value="<?php echo $street?>" required>
                                    </div>
                                    
                                    <div class="col-50">
                                        <label for="zip"><span class="material-icons">dialpad</span>Zip</label>
                                        <input type="number" id="zip" name="zip" placeholder="10001" value="<?php echo $zip?>" required>
                                    </div>
                                </div>


                            </div>
                

                            <div class="col-50">
                
                                <label for="phone"><i class="material-icons">call</i> Phone Number</label>
                                <input type="tel" id="phone" name="phone" placeholder="017XXXXXXXX" value="<?php echo $phone?>" required>
                            

                            
                                <br><br>    
                                <div class="row">
                                    <div class="col-50">
                                        <label for="Bgroup"><span class="material-icons">invert_colors</span>Blood Group</label>
                                        <input type="radio" value="A" id="group" name="group" <?php if(isset($group) && $group =="A") echo "checked"?> >A
                                        <input type="radio" value="B" id="group" name="group" <?php if(isset($group) && $group =="B") echo "checked"?>>B
                                        <input type="radio" value="O" id="group" name="group" <?php if(isset($group) && $group =="O") echo "checked"?>>O
                                        <input type="radio" value="AB" id="group" name="group" <?php if(isset($group) && $group =="AB") echo "checked"?>>AB
                                    </div>
                                
                                    <div class="col-50">
                                    
                                        <label for="rh"><span class="material-icons">iso</span>RH</label>
                                        <input type="radio" value="positive" id="rh" name="rh" <?php if(isset($rh) && $rh =="positive") echo "checked"?>>positive
                                        <input type="radio" value="negative" id="rh" name="rh" <?php if(isset($rh) && $rh =="negative") echo "checked"?>>negative
                                    </div>
                                </div>
                                <br>
                                
                                <label for="bcnum"><span class="material-icons">contacts</span>Birth Certificate number</label>
                                <input type="text" id="bcn" name="bcn" placeholder="1021332" value="<?php echo $bcn?>" required>
                
                                <br><br>
                                <label for="byear"><span class="material-icons">today</span>National ID Number</label > 
                                <input type="number" id="nid" name="nid" placeholder="11XXXXXXX99" value="<?php echo $nid?>" required>
                            
                                <br><br>
                                
                                
                                <div class="row"> 
                                    <div class="col-50">
                                        <label for="bmonth"><span class="material-icons">account_tree</span>Gender</label>
                                        <input type="radio" value="male" id="gender" name="gender" <?php if(isset($gender) && $gender =="male") echo "checked"?>>male
                                        <input type="radio" value="other" id="gender" name="gender"<?php if(isset($gender) && $gender =="other") echo "checked"?> >other
                                    </div>
                                    <div class="col-50">
                                        <label for="bday"><span class="material-icons">today</span>Birth Day</label>
                                        <input type="date" id="date" name="date" placeholder="8" value="<?php echo $bdate?>" required>
                                    </div>
                                </div>
                                    <br>
                                    <label for="wplace"><span class="material-icons">home_repair_service</span>Nationality </label>
                                    <input type="text" id="nationality" name="nationality" placeholder="Bangladeshi" value="<?php echo $nationality?>" required>
                            </div>
                
                        </div>
                    
                    
                    <input type="submit" value="submit" class="btn">
                    </form>
                </div>
            </div>




    </div>

</div>
        


  







    <footer style="background-color: #f44336!important; color:#fff;z-index: 1000; position:static; margin-top: 13.1%; text-align: center;padding:20px;width:100%">
        <span>&copy Copyright 2020-2021 </span>
    </footer>

    </body>
    
</html>