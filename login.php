
<?php

$pageName = "login";
session_start();
?>
<html>
  <head>
    <title>Leeper's shooting Emporium </title>
    <link href="images/logo.png" type="image/gif" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="styleLogon.css">
  </head>
  <body>
  <div class ="logHead"> Please either Login or creare an account to have full access to our website. 
    Or you may return home <a id="aboutHereLink"<?php if($pageName == "home"){echo "class='active';";}?> href="home.php">here.</a></div>
    <div class ="loginClass">
    <h1>Login</h1>
    <form method="POST" action="login_handler.php">
      <div>Email: <input type="text" name="email"/></div>
      <div>Password: <input type="password" name="password"/></div>
      <div><input type="submit" value="Login"></div>
    </form>
    <?php
    if (isset($_SESSION['notGood'])) {
            foreach ($_SESSION['notGood'] as $message) {
              echo "<span class='notgood'>{$message}</div>";
            }
          } ?>
    </div>

    <div class ="create">
    <h1>Create Account</h1>
    <form method="POST" action="createUser_handler.php">
      <div>First Name: <input type="text" name="nameFirst"/></div>
      <div>Last Name: <input type="text" name="nameLast"/></div>
      <div>Email: <input type="text" name="email"/></div>
      <div>Password: <input type="password" name="password"/></div>
      <div><input type="submit" value="Create Account"></div>
    </form>

    <?php
    if (isset($_SESSION['badUser'])) {
            foreach ($_SESSION['badUser'] as $message) {
              echo "<span class='badUser'>{$message}</div>";
            }
          } ?>
    </div>

  </body>
</html>