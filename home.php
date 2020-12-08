<?php $pageName = "home"; ?>
<?php require_once "header.php"; ?>

<html>
    <head>
		<title>Leeper's shooting Emporium </title>
		<link rel="stylesheet" type="text/css" href="styleHome.css">
		<link href="images/logo.png" type="image/gif" rel="shortcut icon" />

    </head>
    <body> 
        <div class = "about">
            <img class ="aboutImg" src = "images/codyFromFacebook.jpg"/>

            <div class ="aboutContent"> 
                <a <?php if($pageName == "about"){echo "class='active';";}?> href="about.php">About Us:</a> 
                <div id="aboutInfo"> We are a world class shooting instructional emporium.   
                    There probably are a lot of things you need to know about my company. 
                    However, it’s currently ninety five percent fictitious. So there 
                    simply isn’t a lot to talk about. Hopefully I will think of more 
                    things to say before I get to the ‘about’ tab.   
                </div>
                <div> You can find out more about our organization 
                <a id="aboutHereLink"<?php if($pageName == "about"){echo "class='active';";}?> href="about.php">here.</a>

                </div>

            </div>
        </div>

        <hr/>

        <div class = "programs">
            <img class ="programImg" src = "images/programs.jpg"/>

            <div class ="programContent"> 
                <a <?php if($pageName == "about"){echo "class='active';";}?> href="about.php">Our Programs:</a> 
                <ul class= "programsInfo">
       		        <li> Firearms Safty</li>
			        <li> Hunter Safty</li>
			        <li> Competitive Shooting Coaching</li>
			        <li> Local Competitive Shooting Competitions </li>
                </ul>
                <div> You can find out more about our programs 
                <a id="programHereLink"<?php if($pageName == "programs"){echo "class='active';";}?> href="programs.php">here.</a>
                </div>
            </div>
        </div>
        <hr/>

        <div class = "schedule">
            <img class ="scheduleImg" src = "images/schedule.jpg"/>

            <div class ="scheduleContent"> 
                <a <?php if($pageName == "schedule"){echo "class='active';";}?> href="schedule.php">Schedule a Class Today:</a> 
                <div> We have a wide variety of classes at times that will fit your schedule. To check out our schedule 
  
                <a id="scheduleHereLink"<?php if($pageName == "schedule"){echo "class='active';";}?> href="schedule.php">here.</a>

                </div>

            </div>
        </div>

        <hr/>


        <div class = "contact">
            <img class ="contactImg" src = "https://www.nicepng.com/png/full/125-1255384_banner-image-contact-us-graphic-design.png"/>

            <div class ="contactContent"> 
                <a <?php if($pageName == "contact"){echo "class='active';";}?> href="contact.php">Reviews:</a> 
                <div> Take a look to see what our past clients thought about us and leave us a review   
                <a id="contactHereLink"<?php if($pageName == "contact"){echo "class='active';";}?> href="contact.php">here.</a>

                </div>

            </div>
        </div>
       
    <!-- 
		<span id = "store">
			<h1> Store:</h1>
			<img src= "images/guns.gif"/>
			<p> 
				<div> Really cool Merch.</div> 
			</p>
		</span>
		<hr/>
 -->
    </body>
</html>
<?php require_once "footer.php"; ?>