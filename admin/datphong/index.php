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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.10/sweetalert2.all.js" integrity="sha512-39ZBE3xNYd9rnIrwuskSg4G8uP83q9BSM/G0xtHbNb3AXQx+MkiHH+e8bj5+WxB+jtixKID7NQS9zPJlVoLL/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        th,td {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include_once __DIR__ . "/../../connect/connect.php";

    $sql = "SELECT  dp.*, kh.*, lp.lp_ten
    FROM datphong AS dp 
        JOIN khachhang AS kh ON dp.kh_id = kh.kh_id
        JOIN loaiphong AS lp ON dp.lp_id = lp.lp_id 
        WHERE dp.status = 'Y';";

    $result = mysqli_query($conn, $sql);

    $arrDP = [];

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $arrDP[] = array(
            'datphong_id' => $row['datphong_id'],
            'kh_hoten' => $row['kh_hoten'],
            'kh_sdt' => $row['kh_sdt'],
            'kh_email' => $row['kh_email'],
            'lp_ten' => $row['lp_ten'],
            'dp_ngayden' => $row['dp_ngayden'],
            'dp_ngaydi' => $row['dp_ngaydi'],
            'dp_soluong_khach' => $row['dp_soluong_khach'],
            'dp_soluong_phong' => $row['dp_soluong_phong'],
            'datphong_yc' => $row['datphong_yc'],
            'status' => $row['status']
        );
    }

    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";
        include_once __DIR__ . "/../css/styles.php";

        ?>
        <div class="container">
            <h1>Danh sách phòng đã xác nhận từ khách hàng</h1>
            <div class="content">
                <div class="card">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên KH</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Tên phòng</th>
                            <th>Ngày đến</th>
                            <th>Ngày đi</th>
                            <th>Số người</th>
                            <th>Số lượng phòng</th>
                            <th>Yêu cầu</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($arrDP as $row) {
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['kh_hoten']; ?></td>
                                <td><?= $row['kh_sdt']; ?></td>
                                <td><?= $row['kh_email']; ?></td>
                                <td><?= $row['lp_ten']; ?></td>
                                <td><?= date('d/m/Y', strtotime($row['dp_ngayden'])) ?></td>
                                <td><?= date('d/m/Y', strtotime($row['dp_ngaydi'])) ?></td>
                                <td><?= $row['dp_soluong_khach']; ?></td>
                                <td><?= $row['dp_soluong_phong']; ?></td>
                                <td><?= $row['datphong_yc']; ?></td>
                                <td>
                                    <?php if ($row['status'] == 'N') {
                                        echo "Chưa xác nhận";
                                    }; ?>
                                    <div>
                                        <a href="./edit.php?dp_id=<?= $row['datphong_id'] ?>">Sửa</a>
                                        <a href="#" class="btn-delete" data-id="<?= $row['datphong_id'] ?>">Xoá</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php 
    include_once __DIR__ . "/../js/js.php";    
    ?>
</body>

</html>