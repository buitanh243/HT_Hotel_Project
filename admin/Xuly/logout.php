<?php
session_start();
session_unset();
session_destroy();
unset($_COOKIE['logined']);
setcookie('logined', '', time() - 3600, '/');
header('Location: /Hotel_Project/admin/login.php');
exit();
