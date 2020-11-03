<?php
session_start();


require_once 'Dao.php';
$dao = new Dao();
// echo $_POST['email'], $_POST['password'];
$results = $dao->userExists($_POST['email'], $_POST['password']);
$_SESSION['bad'] = array();

if (count($results) > 0){
    $_SESSION['authenticated'] = true;
    echo "true  ";
    header("Location: http://localhost/cs401/home.php");
}
else {
    $_SESSION['authenticated'] = false;
    echo "false    ";
    header("Location: http://localhost/cs401/login.php");
    exit();
}

// echo $results;
// foreach($results as $result){
//     echo $result['email'];
// }


// echo "\n yeet \n";
// echo $_POST['email'], $_POST['password'];


// if ($dao->userExists($_POST['email'], $_POST['password']) == true) {
//     echo "flase  ";
    
// } else {
//     echo "true";
// }

// if (($_POST['email'] == 'joe@gmail.com') && ($_POST['password'] == 'abc123')) {
//   $_SESSION['authenticated'] = true;
//   header("Location: http://localhost/cs401/programs.php");
// } else {
//   $_SESSION['authenticated'] = false;
//   header("Location: http://localhost/cs401/home.php");
//   exit();
// }