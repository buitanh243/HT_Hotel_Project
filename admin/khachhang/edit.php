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
    <style>
        .content {
            margin-top: 100px;
            width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>

</head>

<body>
    <?php
    include_once __DIR__ . "/../../connect/connect.php";
    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";
        include_once __DIR__ . "/../css/styles.php";

        $_GET['id'];
        $sql = "SELECT * FROM khachhang WHERE kh_id = " . $_GET['id'];
        $result = mysqli_query($conn, $sql);

        $arrKH = [];

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arrKH[] = array(
                'kh_id' => $row['kh_id'],
                'kh_hoten' => $row['kh_hoten'],
                'kh_sdt' => $row['kh_sdt'],
                'kh_email' => $row['kh_email']
            );
        }

        ?>
        <div class="container">
            <div class="content">
                <h1>Thông tin khách hàng</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kh_hoten">Họ tên</label>
                        <input type="text" name="kh_hoten" id="kh_hoten" value="<?php echo $arrKH[0]['kh_hoten'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kh_sdt">Số điện thoại</label>
                        <input type="text" name="kh_sdt" id="kh_sdt" value="<?php echo $arrKH[0]['kh_sdt'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kh_email">Email</label>
                        <input type="text" name="kh_email" id="kh_email" value="<?php echo $arrKH[0]['kh_email'] ?>">
                    </div>
                    <button class="btn-save" name="save" id="save" type="submit">Lưu lại</button>
                    <a class="btn-back" href="index.php">Quay lại</a>
                </form>
            </div>
        </div>
    </main>
    <?php 
    if (isset($_POST['save'])) {
        $kh_hoten = $_POST['kh_hoten'];
        $kh_sdt = $_POST['kh_sdt'];
        $kh_email = $_POST['kh_email'];

        $sql = "UPDATE khachhang SET kh_hoten = '$kh_hoten', kh_sdt = '$kh_sdt', kh_email = '$kh_email' WHERE kh_id = " . $_GET['id'];
        mysqli_query($conn, $sql);
        echo '<script>location.href = "index.php";</script>';
    }
    ?>
    <script src="/js/app.js"></script>
</body>

</html>