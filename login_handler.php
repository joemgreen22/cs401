<?php
session_start();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');


require_once 'Dao.php';
$_SESSION['notGood'] = array();

$dao = new Dao();
$results = $dao->userExists($_POST['email']);

// foreach ($results as $val) {
//     // echo $val['email'] . "\n";
//     echo print_r($results,1);
// }

echo " made it ... ";

// if user email exists
if (count($results) > 0){
    echo " ... true";

    $PassSalt = $dao->getPassSalt($_POST['email']);
    $salt = $PassSalt[0]['salt'];
    $pass = $PassSalt[0]['password'];
    $saltyhash = hash('sha256', $salt . $_POST['password']);
    // $password1 = $_POST['password'];
    // $saltyhashtest = hash('sha256', $salt . " 1");
    // echo "--".$_POST['password']. "--";
    // echo "--".$saltyhashtest. "--";
    // echo $salt . "--" . "\n";
    // echo $pass . "--" ."\n";
    // echo $saltyhash . "--" ."\n";

    if($pass == $saltyhash){
        echo " **yay** ";
        $_SESSION['authenticated'] = true;
        $extra = 'home.php';
        header("Location: http://$host$uri/$extra");
        exit();
    }
    else{
        $_SESSION['notGood'][] = "Invalid email or password";
    }
}




else {
    $_SESSION['authenticated'] = false;
    echo "false    ";
    $_SESSION['notGood'][] = "Invalid email or password";
    $_SESSION['formLogin'] = $_POST;

    $extra = 'login.php';
    header("Location: http://$host$uri/$extra");
    exit();
}
