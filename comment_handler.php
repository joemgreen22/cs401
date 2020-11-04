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
    $logger->LogInfo("User input too long [{$_POST['comment']}]");
    $_SESSION['bad'][] = "Your review can only be 256 Characters.";
  }

  if (strlen($_POST['comment']) == 0) {
    $_SESSION['bad'][] = "Please enter a Review";
  }

  if (count($_SESSION['bad']) > 0) {
    $extra = 'contact.php';
    header("Location: http://$host$uri/$extra");
    // header("Location: http://cs401/contact.php");
    exit();
  }



$dao = new Dao();
$dao->addComment($_POST['comment']);
$_SESSION['good'][] = "Your review has sucessfully been posted";



// redirect back 
$extra = 'contact.php';
header("Location: http://$host$uri/$extra");
// header("Location: http://cs401/contact.php");

exit();

