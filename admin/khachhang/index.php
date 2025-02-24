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
        ?>
        <div class="container">
            <h1>Danh sách khách hàng</h1>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th style="display: flex; justify-content: center;">Thao tác</th>
                </tr>
                <?php
                $sql = "SELECT kh.* FROM datphong AS dp 
                        JOIN khachhang AS  kh ON dp.kh_id = kh.kh_id
                        WHERE dp.`status` = 'Y' ";
                $result = mysqli_query($conn, $sql);
                $stt = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $stt++ ?></td>
                        <td><?php echo $row['kh_hoten'] ?></td>
                        <td><?php echo $row['kh_sdt'] ?></td>
                        <td><?php echo $row['kh_email'] ?></td>
                        <td style="display: flex; justify-content: center;" >
                            <a href="./edit.php?id=<?php echo $row['kh_id'] ?>">Sửa</a>
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