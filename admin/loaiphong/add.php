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
    
</head>
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
    include_once __DIR__ . "/../../connect/connect.php";
    include_once __DIR__ . "/../css/styles.php";
    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";
        ?>

        <div class="container-phong">
            <h2>Thêm loại phòng</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="tenloaiphong">Tên loại phòng</label>
                    <input type="text" class="form-control" id="lp_ten" name="lp_ten" required>
                </div>
                <div class="form-group">
                    <label for="giaphong">Giá phòng</label>
                    <input type="number" class="form-control" id="lp_gia" name="lp_gia" required>
                </div>
                <div class="form-group">
                    <label for="songuoitoida">Mô tả</label>
                    <input type="text" class="form-control" id="lp_mota" name="lp_mota" required>
                </div>
                <div class="form-group">
                    <label for="dientich">Diện tích</label>
                    <input type="text" class="form-control" id="lp_dientich" name="lp_dientich" required>
                </div>
                <button class="btn-save" type="submit" id="add" name="add" class="">Thêm loại phòng</button>
                <a class="btn-back" href="index.php">Quay lại</a>
            </form>
        </div>
    </main>
    <?php
    if (isset($_POST['add'])) {

        include_once __DIR__ . "/../../connect/connect.php";

        $lp_ten = $_POST['lp_ten'];
        $lp_gia = $_POST['lp_gia'];
        $lp_mota = $_POST['lp_mota'];
        $lp_dientich = $_POST['lp_dientich'].' m²';
        

        $sql = "INSERT INTO loaiphong (lp_ten, lp_gia, lp_mota, lp_dientich) VALUES ('$lp_ten', '$lp_gia', '$lp_mota', '$lp_dientich')";
        mysqli_query($conn, $sql);
        echo '<script>location.href = "index.php";</script>';
    }
    ?>
    <script src="/js/app.js"></script>
</body>

</html>