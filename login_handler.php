<?php
session_start();


require_once 'Dao.php';
$_SESSION['notGood'] = array();

$dao = new Dao();
$results = $dao->userExists($_POST['email'], $_POST['password']);


if (count($results) > 0){
    $_SESSION['authenticated'] = true;
    echo "true  ";
    header("Location: http://localhost/cs401/home.php");
    exit();
}
else {
    $_SESSION['authenticated'] = false;
    echo "false    ";
    $_SESSION['notGood'][] = "This is not a valid email";
    header("Location: http://localhost/cs401/login.php");
    exit();
}
