<?php 
    session_start(); 
    session_unset(); 
    session_destroy(); 
    header('Location: /Hotel_Project/admin/login.php');
    exit();
?>