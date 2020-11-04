<?php
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
session_start();
session_destroy();
$extra = 'home.php';
header("Location: http://$host$uri/$extra");
// header("Location: http://localhost/cs401/home.php");
exit();