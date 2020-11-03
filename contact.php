<?php $pageName = "contact"; ?>
<?php require_once "header.php"; ?>
<?php
session_start();
if (isset($_SESSION['authenticated']) && !$_SESSION['authenticated'] || !isset($_SESSION['authenticated'])) {
  header("Location: http://cs401/login.php");
}

require_once 'table.php';

?>

<html>
    <head>
		  <title>Leeper's shooting Emporium </title>
		  <link rel="stylesheet" type="text/css" href="styleContact.css">
		  <link href="images/logo.png" type="image/gif" rel="shortcut icon" />
    </head>

    <body> 
      <div id ="contactDiv">
        <h1>Leave us a review!</h1>

        <form method="POST" action="comment_handler.php">
          <div>Name: <input type="text" name="name" id="name"/></div>
          <div>Review: <input type="text" name="comment" id="comment"/></div>
          <input type="submit" value="Submit">
        </form>
        <?php 
          if (isset($_SESSION['good'])) {
            foreach ($_SESSION['good'] as $message) {
              echo "<span class='good'>{$message}</div>";
            }
            foreach ($_SESSION['bad'] as $message) {
              echo "<span class='bad'>{$message}</div>";
            }
          }

          renderTable("comments.txt");
        ?>
      </div>



    </body>
</html>
<?php require_once "footer.php"; ?>