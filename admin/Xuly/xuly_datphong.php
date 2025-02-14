<?php
include_once __DIR__ . "/../../connect/connect.php";
$dp_id = $_GET['dp_id'];
$sql = "UPDATE datphong 
SET status = 'Y' 
WHERE datphong_id = $dp_id;
";
mysqli_query($conn, $sql);
header("Location: ./../index.php");
