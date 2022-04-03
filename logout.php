<?php
session_start();
session_destroy();
//setcookie("UID",$uaccount,time()-1);
header('Location: login.php');
?>