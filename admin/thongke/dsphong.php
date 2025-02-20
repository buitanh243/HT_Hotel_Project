<!DOCTYPE html>
<html lang="en">
<?php
include_once __DIR__ . "/../../connect/connect.php";
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.10/sweetalert2.all.js" integrity="sha512-39ZBE3xNYd9rnIrwuskSg4G8uP83q9BSM/G0xtHbNb3AXQx+MkiHH+e8bj5+WxB+jtixKID7NQS9zPJlVoLL/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .content {
            display: grid;
            grid-template-areas:
                "content-1 content-1"
                "content-2 content-3"
                "content-4 content-5";
            gap: 15px;
            padding: 20px;
        }

        .content div {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 15px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            color: white;
        }

        .content-1 {
            grid-area: content-1;
            background-color: slateblue;
        }

        .content-2 {
            grid-area: content-2;
            background-color: burlywood;
        }

        .content-3 {
            grid-area: content-3;
            background-color: brown;
        }

        .content-4 {
            grid-area: content-4;
            background-color: darkcyan;
        }

        .content-5 {
            grid-area: content-5;
        }

        .content-5 p {
            color: #333;
        }

        @media (max-width: 768px) {
            .content {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

    <?php
    include_once __DIR__ . "/../../connect/connect.php";


    ?>

    <main>
        <?php
        include_once __DIR__ . "/../css/phong/phong.php";
        include_once __DIR__ . "/../css/styles.php";

        ?>
        <div class="container">
            <?php
            include_once __DIR__ . "/../bocuc/head.php";
            include_once __DIR__ . "/../bocuc/sidebar.php";

            $sql = "select count(*) AS SL_tong from phong;";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result);
            $SL_tong = $row['SL_tong'];

            $sql = "select count(*) AS SL_tong from phong;";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result);
            $SL_tong = $row['SL_tong'];

            $sql = "select count(*) AS SL_trong from phong WHERE STATUS = 'N';";
            $result_trong = mysqli_query($conn, $sql);

            $row2 = mysqli_fetch_array($result_trong);
            $SL_trong = $row2['SL_trong'];

            $sql = "select count(*) AS SL_dadat from phong WHERE STATUS = 'Y';";
            $result_dadat = mysqli_query($conn, $sql);

            $row3 = mysqli_fetch_array($result_dadat);
            $SL_dadat = $row3['SL_dadat'];

            $sql = "WITH PhongDem AS (
                    SELECT hd_tenphong, COUNT(*) AS SL_nhieunhat
                    FROM hoadon
                    GROUP BY hd_tenphong
                )
                SELECT hd_tenphong, SL_nhieunhat
                FROM PhongDem
                WHERE SL_nhieunhat = (SELECT MAX(SL_nhieunhat) FROM PhongDem);
                ";

            $result_nhieunhat = mysqli_query($conn, $sql);

            $row4 = [];

            while ($row_nhieu = mysqli_fetch_array($result_nhieunhat)) {
                $row4[] = array(
                    'SL_nhieunhat' => $row_nhieu['SL_nhieunhat'],
                    'hd_tenphong' => $row_nhieu['hd_tenphong']
                );
            }

            $sql = "WITH PhongDem AS (
                SELECT hd_tenphong, COUNT(*) AS SL_it
                FROM hoadon
                GROUP BY hd_tenphong
            )
            SELECT hd_tenphong, SL_it
            FROM PhongDem
            WHERE SL_it = (SELECT MIN(SL_it) FROM PhongDem);
            ";

            $result_it = mysqli_query($conn, $sql);

            $row5 = [];

            while ($row_it = mysqli_fetch_array($result_it)) {
                $row5[] = array(
                    'SL_it' => $row_it['SL_it'],
                    'hd_tenphong' => $row_it['hd_tenphong']
                );
            }


            ?>
            <h1>THỐNG KÊ PHÒNG</h1>
            <div class="content">
                <div class="content-1">
                    <div class="content_body1">
                        Tổng số phòng hiện tại: <?= $row['SL_tong'] ?> Phòng
                    </div>
                </div>
                <div class="content-2">
                    <div class="content_body2">
                        Số phòng trống: <?= $row2['SL_trong'] ?> Phòng
                    </div>
                </div>
                <div class="content-3">
                    <div class="content_body3">
                        Số phòng đã đặt: <?= $row3['SL_dadat'] ?> Phòng
                    </div>
                </div>
                <div class="content-4">
                    <div class="content_body4">
                        <?php foreach ($row4 as $r) { ?>
                            + Phòng được đặt nhiều nhất: Phòng <?= $r['hd_tenphong'] ?>
                            <label for="">(<?= $r['SL_nhieunhat'] ?> Hoá đơn )</label>
                        <?php } ?>
                    </div>
                </div>
                <div class="content-5">
                <p>+ Phòng được đặt ít nhất:</p>
                    <div class="content_body5">
                        
                        <table  cellpadding="10" cellspacing="0" style="width: 100%; text-align: center; color: #333;">
                            <thead>
                                <tr>
                                    <th>Phòng</th>
                                    <th>Số lượng hóa đơn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row5 as $it) { ?>
                                    <tr>
                                        <td>Phòng <?= $it['hd_tenphong'] ?></td>
                                        <td><?= $it['SL_it'] ?> Hoá đơn</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php
    include_once __DIR__ . '/../js/js.php';
    ?>
</body>

</html>