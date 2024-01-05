<?php
session_start();
session_unset();
session_destroy(); 
header("location:/courier/agent/login.php")
?>
