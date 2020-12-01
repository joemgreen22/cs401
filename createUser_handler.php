<?php
session_start();
$_SESSION['badUser'] = array();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
require_once 'Dao.php';

echo 'create handler';
//valid email
$pattern = '^[a-z|A-Z|0-9]+@[a-z|A-Z|0-9|.]+\.[com|org|net|edu]{3}^';
preg_match($pattern, $_POST['email'], $matches) ;
if($matches==null){
    echo 'invalid email' . '\n';
    $_SESSION['badUser'][] = "This is not a valid email";
    $_SESSION['authenticated'] = false;

    // $extra = 'login.php';
    // header("Location: http://$host$uri/$extra");
    // // header("Location: http://localhost/cs401/login.php");
    // exit();
}

//valid name
echo 'invalid name1';
if(strlen($_POST['nameFirst']) <=0 || strlen($_POST['nameLast']) <=0){
    echo 'invalid name' . '\n';
    $_SESSION['badUser'][] = "This is not a valid name";
    $_SESSION['authenticated'] = false;
    // $extra = 'login.php';
    // header("Location: http://$host$uri/$extra");
    // // header("Location: http://localhost/cs401/login.php");
    // exit();
}

// email not in use



$dao = new Dao();
$results = $dao->userExists($_POST['email']);


if(count($results) > 0){
    echo 'invalid emial2' . '\n';
    $_SESSION['badUser'][] = "This email is already in use";
    $_SESSION['authenticated'] = false;
    // $extra = 'login.php';
    // header("Location: http://$host$uri/$extra");
    // // header("Location: http://localhost/cs401/login.php");
    // exit();
}

if(count($_SESSION['badUser']) > 0){
    $_SESSION['formCreate'] = $_POST;
    $extra = 'login.php';
    echo "--done";
    header("Location: http://$host$uri/$extra");
    // header("Location: http://localhost/cs401/login.php");
    exit();
}


// procedes if no bad falgs
// salt and hash password
function createSalt() {
    $text = md5(uniqid(rand(), TRUE));
    return substr($text, 0, 3);
}

$salt = createSalt();
$password = $_POST['password'];
$saltyhash = hash('sha256', $salt . $password);
echo $salt . "--" . "\n";
echo $password . "--" ."\n";
echo $saltyhash . "--" ."\n";

// if(count($results)<= 0){
    echo 'valid create' . '\n';
     $dao->createUser($_POST['nameFirst'], $_POST['nameLast'], $_POST['email'], $saltyhash, $salt);
    $_SESSION['authenticated'] = true;
    $extra = 'home.php';
    header("Location: http://$host$uri/$extra");
    // header("Location: http://localhost/cs401/home.php");
    exit();
// }
