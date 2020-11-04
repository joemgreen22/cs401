<?php
session_start();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');


require_once 'Dao.php';
$_SESSION['notGood'] = array();

$dao = new Dao();
$results = $dao->userExists($_POST['email'], $_POST['password']);


if (count($results) > 0){
    $_SESSION['authenticated'] = true;
    echo "true  ";

    $extra = 'home.php';
    header("Location: http://$host$uri/$extra");
    exit();
}
else {
    $_SESSION['authenticated'] = false;
    echo "false    ";
    $_SESSION['notGood'][] = "This is not a valid email";
    $_SESSION['formLogin'] = $_POST;

    $extra = 'login.php';
    header("Location: http://$host$uri/$extra");
    exit();
}
