<?php
session_start();
$_SESSION['badUser'] = array();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
require_once 'Dao.php';

echo 'create handler' . '\n';
//valid email
$pattern = '^[a-z|A-Z|0-9]+@[a-z|A-Z|0-9|.]+\.[com|org|net|edu]{3}^';
preg_match($pattern, $_POST['email'], $matches) ;
if($matches==null){
    echo 'invalid email' . '\n';
    $_SESSION['badUser'][] = "This is not a valid email";
    $_SESSION['authenticated'] = false;

    $extra = 'login.php';
    header("Location: http://$host$uri/$extra");
    // header("Location: http://localhost/cs401/login.php");
    exit();
}

//valid name
if(strlen($_POST['nameFirst']) <=0 || strlen($_POST['nameLast']) <=0){
    echo 'invalid name' . '\n';
    $_SESSION['badUser'][] = "This is not a valid name";
    $_SESSION['authenticated'] = false;
    $extra = 'login.php';
    header("Location: http://$host$uri/$extra");
    // header("Location: http://localhost/cs401/login.php");
    exit();
}

// email not in use
$dao = new Dao();
$results = $dao->userExists($_POST['email'], $_POST['password']);
if(count($results)> 0){
    echo 'invalid emial2' . '\n';
    $_SESSION['badUser'][] = "This email is already in use";
    $_SESSION['authenticated'] = false;
    $extra = 'login.php';
    header("Location: http://$host$uri/$extra");
    // header("Location: http://localhost/cs401/login.php");
    exit();
}
// if(count($results)<= 0){
    echo 'valid create' . '\n';
    $dao->createUser($_POST['nameFirst'], $_POST['nameLast'], $_POST['email'], $_POST['password']);
    $_SESSION['authenticated'] = true;
    $extra = 'home.php';
    header("Location: http://$host$uri/$extra");
    // header("Location: http://localhost/cs401/home.php");
    exit();
// }
