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
    <title>Trang chủ</title>

    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/head.css"> -->
</head>

<body>
    <?php
    include_once __DIR__ . "/../../connect/connect.php";
    include_once __DIR__ . "/../css/styles.php";
    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";

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
        <div class="container">
            <h1>Danh sách hoá đơn</h1>
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
                            <a href="./hoadon.php?hd_id=<?= $hd['hd_id'] ?>">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </main>

    <script src="/js/app.js"></script>
</body>

</html>