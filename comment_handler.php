<?php
session_start();
require_once 'Dao.php';
require_once 'KLogger.php';
$logger = new KLogger ("log.txt" , KLogger::DEBUG);
$_SESSION['bad'] = array();
$_SESSION['good'] = array();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');





//validation
if (strlen($_POST['comment']) > 256) {
    $logger->LogInfo("User review too long [{$_POST['comment']}]");
    $_SESSION['bad'][] = "Your review can only be 256 Characters.";
  }

  if (strlen($_POST['comment']) == 0) {
    $_SESSION['bad'][] = "Please enter a Review";
  }

  if (strlen($_POST['name']) > 32) {
    $logger->LogInfo("User name too long [{$_POST['name']}]");
    $_SESSION['bad'][] = "Your name can only be 32 Characters.";
  }
  if (strlen($_POST['name']) == 0) {
    $logger->LogInfo("no name [{$_POST['name']}]");
    $_SESSION['bad'][] = "Please enter a name.";
  }

  if (count($_SESSION['bad']) > 0) {
    $_SESSION['form'] = $_POST;
    $extra = 'contact.php';
    header("Location: http://$host$uri/$extra");
    // header("Location: http://cs401/contact.php");
    exit();
  }



$dao = new Dao();
$dao->addComment($_POST['comment'],$_POST['name'] );
$_SESSION['good'][] = "Your review has sucessfully been posted";


// redirect back 
$extra = 'contact.php';
header("Location: http://$host$uri/$extra");
// header("Location: http://cs401/contact.php");

exit();

