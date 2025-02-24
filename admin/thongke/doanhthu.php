<!DOCTYPE html>
<html lang="en">
<?php
include_once __DIR__ . "/../../connect/connect.php";
session_start();
if (!isset($_SESSION['user'])) {
     header("Location: /admin/login.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê doanh thu</title>

    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.10/sweetalert2.all.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        h1 {
            margin-top: 60px;
            text-align: center;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        .stat-box1 {
            padding: 20px;
            background:rgb(93, 26, 217);
            color: #fff;
            text-align: center;
            border-radius: 8px;
            width: 45%;
            font-size: 18px;
        }

        .stat-box2 {
            padding: 20px;
            background:rgb(216, 13, 43);
            color: #fff;
            text-align: center;
            border-radius: 8px;
            width: 45%;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background: #4CAF50;
            color: #fff;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>THỐNG KÊ DOANH THU</h1>
        
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";

        $sql = "SELECT COUNT(*) AS SL_Hoadon FROM hoadon;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $SL_tong = $row['SL_Hoadon'];
        
        $sql = "SELECT SUM(hd_tong) AS TongTien FROM hoadon;";
        $result_sum = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result_sum);
        $TongTien = $row['TongTien'];

        $sql ="SELECT hd_id, hd_ma, hd_hotenkh, hd_sdtkh, hd_sdtkh, hd_ngayin, hd_tong  FROM hoadon;";
        $result = mysqli_query($conn, $sql);
        $arrHD = [];
         
        while ($row = mysqli_fetch_assoc($result)) {
            $arrHD[] = array (
                'hd_id' => $row['hd_id'],
                'hd_ma' => $row['hd_ma'],
                'hd_hotenkh' => $row['hd_hotenkh'],
                'hd_sdtkh' => $row['hd_sdtkh'],
                'hd_ngayin' => $row['hd_ngayin'],
                'hd_tong' => $row['hd_tong']
            );
        }
        ?>

        <div class="stats">
            <div class="stat-box1">Tổng số hóa đơn: <strong><?= $SL_tong; ?></strong></div>
            <div class="stat-box2">Tổng doanh thu: <strong><?= number_format($TongTien, 0, ',', '.'); ?> VND</strong></div>
        </div>

        <table>
                <tr>
                    <th>STT</th>
                    <th>Mã hoá đơn</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Ngày xuất hoá đơn</th>
                    <th>Tổng hoá đơn</th>
                    <th style="display: flex; justify-content: center;">Thao tác</th>
                </tr>
                <?php 
                    $stt = 1;
                    foreach ($arrHD as $hd) {
                ?>
                    <tr>
                        <td><?= $stt++ ?></td>
                        <td><?= $hd['hd_ma'] ?></td>
                        <td><?= $hd['hd_hotenkh'] ?></td>
                        <td><?= $hd['hd_sdtkh'] ?></td>
                        <td><?= date('d/m/Y', strtotime($hd['hd_ngayin'])) ?></td>
                        <td><?= number_format($hd['hd_tong'], '0', ',','.') ?>vnd</td>
                        <td style="display: flex; justify-content: center;" >
                            <a href="./../hoadon/hoadon.php?hd_id=<?= $hd['hd_id'] ?>">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
    </div>
</body>
</html>
