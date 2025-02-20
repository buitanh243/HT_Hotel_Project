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
    <?php include_once __DIR__ . "/../css/styles.php"; ?>
    <style>
        th {
            color: black;
            background-color: cadetblue;
        }

        .btn-invoice {
            background-color: goldenrod;
            color: white;
            padding: 10px;
            margin: 20px;
            border-radius: 5px;
        }

        .btn-invoice:hover {
            background-color: chocolate;
        }

        .stop-btn {
            background-color: thistle;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .stop-btn:hover {
            background-color: teal;
        }
    </style>
</head>

<body>

    <?php
    include_once __DIR__ . "/../bocuc/head.php";

    include_once __DIR__ . "/../../connect/connect.php";

    $sql = "SELECT phong_ten,status FROM phong;";

    $result = mysqli_query($conn, $sql);

    $arrP = [];

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $arrP[] = array(
            'phong_ten' => $row['phong_ten'],
            'status' => $row['status']
        );
    }
    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";
        include_once __DIR__ . "/../css/phong/info.php";

        $phong_id = $_GET['phong_id'];
        $sql = "SELECT
            p.phong_ten,
            dp.dp_ngayden,
            dp.dp_ngaydi,
            kh.kh_hoten,
            kh.kh_sdt,
            kh.kh_email,
            tt.stt_status,
            tt.ngay_thanhtoan,
            httt.httt_ten
        FROM
            phong AS p
            JOIN datphong AS dp ON p.datphong_id = dp.datphong_id
            JOIN khachhang AS kh ON dp.kh_id = kh.kh_id
            JOIN thanhtoan AS tt ON p.thanhtoan_id = tt.thanhtoan_id
            JOIN hinhthuc_thanhtoan AS httt ON tt.httt_id = httt.httt_id
        WHERE
            phong_id = $phong_id;";

        $result = mysqli_query($conn, $sql);

        $arrTTP = [];

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arrTTP[] = array(
                'phong_ten' => $row['phong_ten'],
                'dp_ngayden' => $row['dp_ngayden'],
                'dp_ngaydi' => $row['dp_ngaydi'],
                'kh_hoten' => $row['kh_hoten'],
                'kh_sdt' => $row['kh_sdt'],
                'kh_email' => $row['kh_email'],
                'stt_status' => $row['stt_status'],
                'ngay_thanhtoan' => $row['ngay_thanhtoan'],
                'httt_ten' => $row['httt_ten']
            );
        }
        ?>
        <div class="container">
            <?php
            if (count($arrTTP) == 0) { ?>
                <h2>Phòng này chưa có thông tin đặt phòng</h2>
                <a class="btn-save" href="./datphong.php?phong_id=<?= $phong_id ?>">Thêm thông tin đặt phòng</a>

                <?php } else {
                foreach ($arrTTP as $ttp): ?>
                    <h2>Thông tin phòng <?= htmlspecialchars($ttp['phong_ten']) ?></h2>
                    <table class="table-info">
                        <tr>
                            <th>Khách hàng</th>
                            <td><?= $ttp['kh_hoten'] ?></td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td><?= $ttp['kh_sdt'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $ttp['kh_email'] ?></td>
                        </tr>
                        <tr>
                            <th>Ngày đến</th>
                            <td><?= date('d/m/Y', strtotime($ttp['dp_ngayden'])) ?></td>
                        </tr>
                        <tr>
                            <th>Ngày đi</th>
                            <td><?= date('d/m/Y', strtotime($ttp['dp_ngaydi'])) ?></td>
                        </tr>

                        <tr>
                            <th>Trạng thái thanh toán</th>
                            <td><?= ($ttp['stt_status'] == 'Y') ? 'Đã thanh toán' : 'Chưa thanh toán' ?></td>
                        </tr>
                        <tr>
                            <th>Ngày thanh toán</th>
                            <td><?= ($ttp['stt_status'] == 'N') ? 'Rỗng' : date('d/m/Y', strtotime($ttp['ngay_thanhtoan'])); ?></td>
                        </tr>
                        <tr>
                            <th>Hình thức thanh toán</th>
                            <td><?= $ttp['httt_ten'] ?></td>
                        </tr>
                    </table>
                    <a href="#" data-phong_id="<?= $phong_id ?>" class="stop-btn">Đóng phòng</a>
                <?php endforeach; ?>
                <a class="btn-save" href="./edit.php?phong_id=<?= $phong_id ?>">Sửa thông tin đặt phòng</a>
                <a class="btn-invoice" href="./../hoadon/xuathoadon.php?phong_id=<?= $phong_id ?>">Xuất hoá đơn</a>
            <?php } ?>
            <a class="btn-back" href="index.php">Quay lại</a>
        </div>

    </main>

    <?php
    include_once __DIR__ . "/../js/js.php";
    ?>
</body>

</html>