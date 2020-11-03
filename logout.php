<?php
session_start();
session_destroy();
header("Location: http://localhost/cs401/home.php");
exit();