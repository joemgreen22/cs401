<?php $pageName = "contact"; ?>
<?php require_once "header.php"; ?>
<?php
if (isset($_SESSION['authenticated']) && !$_SESSION['authenticated'] || !isset($_SESSION['authenticated'])) {

  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'login.php';
  header("Location: http://$host$uri/$extra");
  // header("Location: http://login.php");
  exit();
}

require_once 'table.php';
if (isset($_SESSION['form'])){
  $nameTmp = $_SESSION['form']['name'];
  $commentTmp = $_SESSION['form']['comment'];
} else{
  $nameTmp = "";
  $commentTmp = "";
}

?>

<html>
    <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="jsComment.js"></script>
		  <title>Leeper's shooting Emporium </title>
		  <link rel="stylesheet" type="text/css" href="styleReview.css">
		  <link href="images/logo.png" type="image/gif" rel="shortcut icon" />
    </head>

    <body> 
      <div id ="contactDiv">
        <h1>Leave us a review!</h1>

        <form method="POST" action="comment_handler.php">
          <div><label for="name"> Name: </label> <input id ="name" value="<?php echo $nameTmp;?>" type="text" name="name" id="name"/></div>
          <div><label for="review"> Review: </label> <input id = "review" value="<?php echo $commentTmp;?>" type="text" name="comment" id="comment"/></div>
          <input type="submit" value="Submit">
        </form>
        <?php 
          if (isset($_SESSION['good']) || isset($_SESSION['bad'])) {
            foreach ($_SESSION['good'] as $message) {
              echo "<span class='good'>{$message} <span class ='close'> X </span> </span>";
            }
            foreach ($_SESSION['bad'] as $message) {
              echo "<span class='bad'>{$message} <span class ='close'> X </span> </span>";
            }
          }

          renderTable();
        ?>
      </div>



    </body>
</html>
<?php require_once "footer.php"; ?>