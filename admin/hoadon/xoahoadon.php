<?php
include_once __DIR__ . "/../../connect/connect.php";

$sql = "DELETE FROM hoadon WHERE hd_ngaythanhtoan < NOW() - INTERVAL 30 DAY"; 
if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Dữ liệu đã được xóa"]);
} else {
    echo json_encode(["message" => "Lỗi khi xóa"]);
}
?>
