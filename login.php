
<?php

$pageName = "login";
require_once "header.php";
// session_start();
if (isset($_SESSION['formLogin'])){
  $emailTmp = $_SESSION['formLogin']['email'];
  $passTmp = $_SESSION['formLogin']['password'];
}else{
  $emailTmp = "";
  $passTmp ="";
}
if (isset($_SESSION['formCreate'])){
  $tmpFirst = $_SESSION['formCreate']['nameFirst'];
  $tmpLast = $_SESSION['formCreate']['nameLast'];
  $tmpEmail = $_SESSION['formCreate']['email'];
  $tmpPass = $_SESSION['formCreate']['password'];
} else {
  $tmpFirst = "";
  $tmpLast = "";
  $tmpEmail = "";
  $tmpPass = "";
}

?>
<html>
  <head>
    <title>Leeper's shooting Emporium </title>
    <link href="images/logo.png" type="image/gif" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="styleLogIn.css">
  </head>
  <body>
  
  <div class ="logHead"> Please either Login or creare an account to have full access to our website. 
    Or you may return home <a id="aboutHereLink"<?php if($pageName == "home"){echo "class='active';";}?> href="home.php">here.</a>
  </div>
  <div id= "logthings">
    <div class ="loginClass">
    <h1>Login</h1>
    <form method="POST" action="login_handler.php">
      <!-- <div>Email: <input value="<?php echo $emailTmp;?>" type="text" name="email"/></div> -->
      <div> <label for="logEmail"> Email: </label> <input id= "logEmail" value="<?php echo $emailTmp;?>" type="text" name="email"/></div>
      <div><label for ="logpassword"> Password:</label> <input id= "logpassword" value="<?php echo $passTmp;?>" emailTmptype="password" name="password"/></div>
      <div><input type="submit" value="Login"></div>
    </form>
    <?php
    if (isset($_SESSION['notGood'])) {
            foreach ($_SESSION['notGood'] as $message) {
              echo "<span class='notgood'>{$message} </span>";
            }
          } ?>
    </div> <!-- loginClass -->

    <div class ="create">
    <h1>Create Account</h1>
    <form method="POST" action="createUser_handler.php">
      <div> <label for="first"> First Name: </label>  <input id= "first" value="<?php echo $tmpFirst;?>" type="text" name="nameFirst"/></div>
      <div><label for="last"> Last Name: </label> <input id= "last" value="<?php echo $tmpLast;?>" type="text" name="nameLast"/></div>
      <div> <label for="createEmail"> Email: </label> <input id= "createEmail" value="<?php echo $tmpEmail;?>" type="text" name="email"/></div>
      <div> <label for="createPass"> Password: </label> <input id= "createPass" value="<?php echo $tmpPass;?>" type="password" name="password"/></div>
      <div><input type="submit" value="Create Account"></div>
    </form>

    <?php
    if (isset($_SESSION['badUser'])) {
            foreach ($_SESSION['badUser'] as $message) {
              echo "<span class='badUser'>{$message}  </span>";
            }
          } ?>
    </div> <!-- create -->
    </div> <!-- logthings -->
  </body>
</html>
<?php require_once "footer.php"; ?>