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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.10/sweetalert2.all.js" integrity="sha512-39ZBE3xNYd9rnIrwuskSg4G8uP83q9BSM/G0xtHbNb3AXQx+MkiHH+e8bj5+WxB+jtixKID7NQS9zPJlVoLL/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h2 {
            margin-bottom: 30px;
            color: #007bff;
        }

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            margin-top: 10px;
            width: 90%;
            padding: 10px;
            font-size: large;
            /* border-radius: 5px; */
        }

        .form-group select {
            /* border-radius: 5px; */
            margin-top: 10px;
            width: 96%;
            padding: 10px;
            font-size: large;
        }
    </style>

</head>

<body>
    <?php
    include_once __DIR__ . "/../bocuc/head.php";
    include_once __DIR__ . "/../css/styles.php";

    include_once __DIR__ . "/../../connect/connect.php";

    $dp_id = $_GET['dp_id'];

    $sql = "SELECT dp.*, kh.*, lp.lp_ten
            FROM datphong AS dp 
            JOIN khachhang AS kh ON dp.kh_id = kh.kh_id
            JOIN loaiphong AS lp ON dp.lp_id = lp.lp_id 
            WHERE dp.datphong_id = $dp_id;";

    $result = mysqli_query($conn, $sql);

    $arrDP = [];

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $arrDP[] = array(
            'lp_id' => $row['lp_id'],
            'datphong_id' => $row['datphong_id'],
            'kh_id' => $row['kh_id'],
            'kh_hoten' => $row['kh_hoten'],
            'kh_sdt' => $row['kh_sdt'],
            'kh_email' => $row['kh_email'],
            'lp_ten' => $row['lp_ten'],
            'dp_ngayden' => $row['dp_ngayden'],
            'dp_ngaydi' => $row['dp_ngaydi'],
            'dp_soluong_khach' => $row['dp_soluong_khach'],
            'dp_soluong_phong' => $row['dp_soluong_phong'],
            'datphong_yc' => $row['datphong_yc'],
        );
    }

    $sql_lp = "SELECT * FROM loaiphong";
    $result_lp = mysqli_query($conn, $sql_lp);
    $arrLP = [];
    while ($row = mysqli_fetch_array($result_lp, MYSQLI_ASSOC)) {
        $arrLP[] = array(
            'lp_id' => $row['lp_id'],
            'lp_ten' => $row['lp_ten'],
        );
    }

    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";
        ?>
        <div class="container">
            <h1>Sửa thông tin yêu cầu đặt phòng</h1>
            <div class="content">
                <form action="edit.php?dp_id=<?= $dp_id ?>" method="POST">
                    <?php foreach ($arrDP as $dp): ?>
                        <div class="form-group">
                            <label for="kh_hoten">Họ tên khách hàng</label>
                            <input type="text" name="kh_hoten" id="kh_hoten" value="<?= $dp['kh_hoten'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="kh_sdt">Số điện thoại</label>
                            <input type="text" name="kh_sdt" id="kh_sdt" value="<?= $dp['kh_sdt'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="kh_email">Email</label>
                            <input type="text" name="kh_email" id="kh_email" value="<?= $dp['kh_email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="lp_ten">Tên loại phòng</label>
                            <select name="lp_id" id="lp_id">
                                <?php foreach ($arrLP as $lp): ?>
                                    <option value="<?= $lp['lp_id'] ?>" <?php if ($lp['lp_id'] == $dp['lp_id']) echo "selected"; ?>><?= $lp['lp_ten'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dp_ngayden">Ngày đến</label>
                            <input type="text" name="dp_ngayden" id="dp_ngayden" value="<?= date('d/m/Y', strtotime($dp['dp_ngayden'])) ?>">
                        </div>
                        <div class="form-group">
                            <label for="dp_ngaydi">Ngày đi</label>
                            <input type="text" name="dp_ngaydi" id="dp_ngaydi" value="<?= date('d/m/Y', strtotime($dp['dp_ngaydi'])) ?>">
                        </div>
                        <div class="form-group">
                            <label for="dp_soluong_khach">Số lượng khách</label>
                            <input type="text" name="dp_soluong_khach" id="dp_soluong_khach" value="<?= $dp['dp_soluong_khach'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="dp_soluong_phong">Số lượng phòng</label>
                            <input type="text" name="dp_soluong_phong" id="dp_soluong_phong" value="<?= $dp['dp_soluong_phong'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="datphong_yc">Yêu cầu</label>
                            <input type="text" name="datphong_yc" id="datphong_yc" value="<?= $dp['datphong_yc'] ?>">
                        </div>
                    <?php endforeach; ?>
                    <button class="btn-save" name="save" id="save" type="submit">Lưu lại</button>
                    <a class="btn-back" href="./index.php">Quay lại</a>
                </form>
            </div>
        </div>
    </main>
</body>
<?php
if (isset($_POST['save'])) {
    $kh_hoten = $_POST['kh_hoten'];
    $kh_sdt = $_POST['kh_sdt'];
    $kh_email = $_POST['kh_email'];
    $lp_id = $_POST['lp_id'];
    $dp_ngayden = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['dp_ngayden'])));
    $dp_ngaydi = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['dp_ngaydi'])));
    $dp_soluong_khach = $_POST['dp_soluong_khach'];
    $dp_soluong_phong = $_POST['dp_soluong_phong'];
    $datphong_yc = $_POST['datphong_yc'];
    
    $sql = "UPDATE datphong SET lp_id = '$lp_id', dp_ngayden = '$dp_ngayden', dp_ngaydi = '$dp_ngaydi', dp_soluong_khach = '$dp_soluong_khach', dp_soluong_phong = '$dp_soluong_phong', datphong_yc = '$datphong_yc' WHERE datphong_id = $dp_id";
    mysqli_query($conn, $sql);
    $sql_kh = "UPDATE khachhang SET kh_hoten = '$kh_hoten', kh_sdt = '$kh_sdt', kh_email = '$kh_email' WHERE kh_id = " . $dp['kh_id'];
    mysqli_query($conn, $sql_kh);

    echo '<script>location.href = "index.php";</script>';
}
?>
<?php
include_once __DIR__ . "/../js/js.php";
?>
</body>

</html>