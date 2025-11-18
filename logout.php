<?php
require 'config.php';
$_SESSION = [];
session_unset();
session_destroy();

$message = "你已登出";
echo "<script>alert('$message'); window.location.href='login.php';</script>";
?>