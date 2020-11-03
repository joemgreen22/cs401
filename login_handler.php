<?php
session_start();


require_once 'Dao.php';
$dao = new Dao();
if ($dao->userExists($_POST['email'], $_POST['password'])) {
    // authenticated!
} else {
//  redirect back to login form with an error
}

if (($_POST['email'] == 'joe@gmail.com') && ($_POST['password'] == 'abc123')) {
  $_SESSION['authenticated'] = true;
  header("Location: http://localhost/cs401/home.php");
} else {
  $_SESSION['authenticated'] = false;
  header("Location: http://localhost/cs401/home.php");
  exit();
}