
<?php
session_start();
?>
<html>
  <head>
    <title>Leeper's shooting Emporium </title>
    <link href="images/logo.png" type="image/gif" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="styleLogin.css">
  </head>
  <body>
    <h1>Login</h1>
    <form method="post" action="login_handler.php">
      <div>Email: <input type="text" name="email"/></div>
      <div>Password: <input type="password" name="password"/></div>
      <div><input type="submit" value="Login"></div>
    </form>
  </body>
</html>