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
    <!-- <link rel="stylesheet" href="css/head.css"> -->

</head>

<body>
    <?php
    include_once __DIR__ . "/../../connect/connect.php";

    $sql = "SELECT * FROM loaiphong";

    $result = mysqli_query($conn, $sql);

    $arrLP = [];

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $arrLP[] = array(
            'lp_id' => $row['lp_id'],
            'lp_ten' => $row['lp_ten'],
            'lp_gia' => $row['lp_gia'],
            'lp_mota' => $row['lp_mota'],
            'lp_dientich' => $row['lp_dientich'],
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
            <h1>Danh sách loại phòng</h1>
            <div class="content">
                <div class="card">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên loại phòng</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Diện tích</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($arrLP as $row) {
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['lp_ten'] ?></td>
                                <td><?= number_format($row['lp_gia'], '0', ',', '.') ?>&#8363</td>
                                <td><?= $row['lp_mota'] ?></td>
                                <td><?= $row['lp_dientich'] ?></td>
                                <td>
                                    <a href="./edit.php?lp_id=<?= $row['lp_id'] ?>">Sửa</a>
                                    <a href="./delete.php?lp_id=<?= $row['lp_id'] ?>">Xóa</a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </table>
                </div>
                <a class="btn-save" href="./add.php">Thêm loại phòng</a>
            </div>
        </div>
    </main>

    <script src="/js/app.js"></script>
</body>

</html>