<?php
session_start();
session_unset();
session_destroy(); 
header("location:/courier/admin/login.php")
?>
