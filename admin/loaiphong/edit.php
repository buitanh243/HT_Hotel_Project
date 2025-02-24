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
        main {
            display: flex;
            align-items: center;
        }

        .container-phong {
            margin-top: 100px;
            width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
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
    include_once __DIR__ . "/../css/styles.php";
    include_once __DIR__ . "/../../connect/connect.php";

    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";

        $_GET['lp_id'];
        $sql = "SELECT * FROM loaiphong WHERE lp_id = " . $_GET['lp_id'];
        $result = mysqli_query($conn, $sql);

        $arrLP = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $arrLP[] = array(
                'lp_id' => $row['lp_id'],
                'lp_ten' => $row['lp_ten'],
                'lp_gia' => $row['lp_gia'],
                'lp_mota' => $row['lp_mota'],
                'lp_dientich' => $row['lp_dientich'],
            );
        }
        ?>

        <div class="container-phong">
            <h2>Sửa loại phòng</h2>
            <form action="" method="post">
                <?php foreach ($arrLP as $lp): ?>
                    <div class="form-group">
                        <label for="tenloaiphong">Tên loại phòng</label>
                        <input type="text" class="form-control" id="lp_ten" name="lp_ten" value="<?= $lp['lp_ten'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="giaphong">Giá phòng</label>
                        <input type="text" class="form-control" id="lp_gia" name="lp_gia" value="<?= number_format($lp['lp_gia'], '0', ',', '.') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="songuoitoida">Mô tả</label>
                        <input type="text" class="form-control" id="lp_mota" name="lp_mota" value="<?= $lp['lp_mota'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dientich">Diện tích</label>
                        <input type="text" class="form-control" id="lp_dientich" name="lp_dientich" value="<?= $lp['lp_dientich'] ?>" required>
                    </div>
                    <button type="submit" class="btn-save" name="save" class="">Lưu</button>
                    <a class="btn-back" href="index.php">Quay lại</a>
                <?php endforeach; ?>
            </form>
        </div>
    </main>
    <?php
    if (isset($_POST['save'])) {

        include_once __DIR__ . "/../../connect/connect.php";

        $lp_ten = $_POST['lp_ten'];
        $lp_gia = str_replace('.', '', $_POST['lp_gia']);
        $lp_mota = $_POST['lp_mota'];
        $lp_dientich = $_POST['lp_dientich'];

        $sql_update = "UPDATE loaiphong SET lp_ten = '$lp_ten', lp_gia = '$lp_gia', lp_mota = '$lp_mota', lp_dientich = '$lp_dientich' WHERE lp_id = " . $_GET['lp_id'];
        mysqli_query($conn, $sql_update);
        echo '<script>location.href = "index.php";</script>';
    }
    ?>
    <script src="/js/app.js"></script>
</body>

</html>