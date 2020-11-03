<?php
require_once 'Dao.php';


$dao = new Dao();
$dao->deleteComment($_GET['id']);
// $_SESSION['good'][] = "Thank you for posting";

echo "here 2";

// redirect back 
header("Location: http://localhost/cs401/contact.php");
exit();