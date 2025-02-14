<?php
include_once __DIR__ . "/../../connect/connect.php";

$dp_id = $_GET['dp_id'];

// Truy vấn để lấy kh_id từ bảng datphong
$sql_select = "SELECT kh_id FROM datphong WHERE datphong_id = $dp_id";
$result = mysqli_query($conn, $sql_select);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $kh_id = $row['kh_id'];

    // Thực hiện truy vấn DELETE để xóa dữ liệu từ bảng datphong và khachhang
    $sql_delete_datphong = "DELETE FROM datphong WHERE datphong_id = $dp_id";
    mysqli_query($conn, $sql_delete_datphong);

    $sql_delete_khachhang = "DELETE FROM khachhang WHERE kh_id = $kh_id";
    mysqli_query($conn, $sql_delete_khachhang);
}

header("Location: ./../index.php");
?>