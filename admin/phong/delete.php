<?php
include_once __DIR__ . "/../../connect/connect.php";

$lp_id = $_GET['lp_id'];
    
$sql = "DELETE FROM loaiphong WHERE lp_id = $lp_id";
mysqli_query($conn, $sql);

    
header("Location: index.php");
?>