<?php $pageName = "about"; ?>

<?php require_once "header.php"; ?>

<html>
    <head>
		<title>Leeper's shooting Emporium </title>
		<link rel="stylesheet" type="text/css" href="styleAbout.css">
		<link href="images/logo.png" type="image/gif" rel="shortcut icon" />

    </head>
    <body> 
    <div id ="aboutDiv">    
        <div class = "aboutInfo">
            <h2> About Leepers shooting Emporium: </h1>
            <p> We were founded, at a future date yet to be determined, to serve 
                one extremely broad purpose… guns. Our owner and founder is a world 
                class competitive shooter with a passion to teach others how to safely 
                operate a firearm. Whether this be for recreational shooting, 
                self-defense, hunting, or competitive shooting. </p>
        </div>
        <div id = "instructorsDiv">
        <h2> Our Dedicated Instructors: </h1>
            <ul class ="instructors"> 
                <li class= "instructors1">
                    <h3>Cody Leeper </h3>
                    <img id = "cody" src = "images/cody2.png"/>  
                    <p> Owner & Founder </p>
                </li>
                <li class= "instructors1">
                    <h3>Han Solo</h3>
                    <img id = "solo" src = "https://www.syfy.com/sites/syfy/files/styles/1200x680/public/wire/legacy/1_han_solo.jpg"/>                    
                    <p> Space Weapons Expert </p>
                </li>

                <li class= "instructors1">
                    <h3> Jon Wick</h3>
                    <img id = "wick" src = "https://www.indiewire.com/wp-content/uploads/2019/05/07956f40-77c4-11e9-9073-657a85982e73.jpg"/>
                    <p> Loving Dog Owner </p>
                </li>
                <li class= "instructors1">
                    <h3> Jason Bourne</h3>
                    <img id = "bourne" src = "https://api.time.com/wp-content/uploads/2016/07/jason-bourne.jpg"/>
                    <p> Does not remember his background. But seems to be good at shooting</p>
                </li>
            </ul>


        </div>
    </div>
    </body>
</html>


<?php require_once "footer.php"; ?>