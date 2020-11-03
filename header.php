<?php session_start(); ?>
<?php require("path/to/sendgrid-php/sendgrid-php.php"); ?>
<html>
	<head>
		<title>Leeper's shooting Emporium </title>
		<link rel="stylesheet" type="text/css" href="styleHeadFoot.css">
		<link href="images/logo.png" type="image/gif" rel="shortcut icon" />

	</head>

	<body>
        <div class ="header">
            <div class ="infoRight">
                
                <p> 
                    
                <!-- <div id = "login"> <a href="login.php">Login</a> </div> -->
                    <a href="https://www.instagram.com/3gunleepa/">
                    <img class="instaImg" src="images/insta2.png" />
                </a>
                <a href="https://www.facebook.com/cody.leeper.7">
                    <img class="faceImg" src="images/facebook.png" />
                </a></p>
            </div>

            <div class= "infoleft">
                <p> 208.123.6789</p>
                <p>theEmporium@gmail.com</p>	
            </div>
            
             <img class = "logo" src="images/logo.png" /> 
         
            
            <div class = "name"> 
                <p>Leeper's Shooting</p>
                <p>Emporium</p>
            </div>
            
            <div class= "navDiv">
            <div id = "login"> 
                <?php
                    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true ) {    
                        ?> <a href="logout.php"> Log-Out </a> <?php
                    }
                    else{
                        ?> <a href="login.php"> Log-In </a> <?php
                    }
                ?>
        
            </a> </div>
            <ul class= "nav">
                <li> <a <?php if($pageName == "home"){echo "class='active';";}?> href="home.php">Home</a></li>
                <li> <a <?php if($pageName == "programs"){echo "class='active';";}?> href="programs.php">Programs</a></li>
                <li> <a <?php if($pageName == "schedule"){echo "class='active';";}?> href="schedule.php">Schedule</a></li>
                <li> <a <?php if($pageName == "store"){echo "class='active';";}?> href="store.php">Store</a></li>
                <li> <a <?php if($pageName == "about"){echo "class='active';";}?> href="about.php">About</a></li>
                <li> <a <?php if($pageName == "contact"){echo "class='active';";}?> href="contact.php">Reviews</a></li>
            </div>   
            </ul>
        </div>
        <div class ="emptyDiv"> </div>
    <div id= "content">

    