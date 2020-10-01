<?php $pageName = "contact"; ?>

<?php require_once "header.php"; ?>

<html>
    <head>
		<title>Leeper's shooting Emporium </title>
		<link rel="stylesheet" type="text/css" href="styleContact.css">
		<link href="images/logo.png" type="image/gif" rel="shortcut icon" />

    </head>
    <body> 
    <div id ="contactDiv">
        <h1>We have a program for you!</h1>
        <h1>Send us a message and we'll help you find one.</h1>
        <form method="POST" action="comment_handler.php">
        <div>Name: <input type="text" name="name" id="name"/></div>
        <div>Comment: <input type="text" name="message" id="message"/></div>
        <input type="submit" value="Send us a Message">
        </form>
    </div>

    </body>
</html>
<?php require_once "footer.php"; ?>