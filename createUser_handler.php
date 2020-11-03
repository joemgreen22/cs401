<?php
session_start();


require_once 'Dao.php';
$dao = new Dao();
$results = $dao->userExists($_POST['email'], $_POST['password']);

if(count($results)<= 0){
    $dao->createUser($_POST['nameFirst'], $_POST['nameLast'], $_POST['email'], $_POST['password']);
    header("Location: http://localhost/cs401/home.php");
}
else{
    
}
