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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-group label {
            width: 45%;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group select {
            width: 65%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group select {
            width: 69%;
        }

        .refresh {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .refresh:hover {
            text-decoration: underline;
        }

        .btn-save,
        .btn-back {
            width: 100%;
            margin-top: 10px;
        }

        .btn-back a {
            color: #fff;
            font-weight: 600;
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

        $phong_id = $_GET['phong_id'];

        $sql = "SELECT
            p.status,
            p.phong_ten,
            dp.dp_ngayden,
            dp.dp_ngaydi,
            kh.kh_hoten,
            kh.kh_sdt,
            kh.kh_email,
            tt.stt_status,
            tt.thanhtoan_id,
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
                'thanhtoan_id' => $row['thanhtoan_id'],
                'ngay_thanhtoan' => $row['ngay_thanhtoan'],
                'httt_ten' => $row['httt_ten'],
                'status' => $row['status']
            );
        }
        ?>

        <div class="container">
            <h2>Sửa thông tin phòng</h2>
            <form class="form" action="" method="post">
                <?php foreach ($arrTTP as $p): ?>
                    <div class="form-group">
                        <label for="phong_ten">Tên phòng</label>
                        <input type="text" name="phong_ten" id="phong_ten" value="<?= $p['phong_ten'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kh_hoten">Họ tên khách hàng</label>
                        <input type="text" name="kh_hoten" id="kh_hoten" value="<?= $p['kh_hoten'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kh_sdt">Số điện thoại</label>
                        <input type="text" name="kh_sdt" id="kh_sdt" value="<?= $p['kh_sdt'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kh_email">Email</label>
                        <input type="text" name="kh_email" id="kh_email" value="<?= $p['kh_email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="dp_ngayden">Ngày đến</label>
                        <input type="text" name="dp_ngayden" id="dp_ngayden" value="<?= date('d/m/Y', strtotime($p['dp_ngayden'])) ?>">
                    </div>
                    <div class="form-group">
                        <label for="dp_ngaydi">Ngày đi</label>
                        <input type="text" name="dp_ngaydi" id="dp_ngaydi" value="<?= date('d/m/Y', strtotime($p['dp_ngaydi'])) ?>">
                    </div>
                    <div class="form-group">
                        <label for="stt_status">Trạng thái</label>
                        <select name="status" id="status">
                            <option value="Y" <?php if ($p['status'] == 'Y') echo "selected"; ?>>Đã đặt</option>
                            <option value="N" <?php if ($p['status'] == 'N') echo "selected"; ?>>Trống</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="httt_ten">Hình thức thanh toán</label>
                        <?php
                        $sql_httt = "SELECT * FROM hinhthuc_thanhtoan;";
                        $result_httt = mysqli_query($conn, $sql_httt);

                        $arrHTTT = [];
                        while ($row = mysqli_fetch_array($result_httt, MYSQLI_ASSOC)) {
                            $arrHTTT[] = array(
                                'httt_id' => $row['httt_id'],
                                'httt_ten' => $row['httt_ten']
                            );
                        }
                        ?>
                        <select name="httt_id" id="httt_id">
                            <?php foreach ($arrHTTT as $tt): ?>
                                <option value="<?= $tt['httt_id'] ?>" <?php if ($tt['httt_ten'] == $p['httt_ten']) echo "selected" ?>> <?= $tt['httt_ten'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stt_status">Trạng thái</label>
                        <select name="stt_status" id="stt_status">
                            <option value="Y" <?php if ($p['stt_status'] == 'Y') echo "selected" ?>>Đã thanh toán</option>
                            <option value="N" <?php if ($p['stt_status'] == 'N') echo "selected" ?>>Chưa thanh toán</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ngay_thanhtoan">Ngày thanh toán</label>
                        <input type="text" name="ngay_thanhtoan" id="ngay_thanhtoan" value="<?= ($p['stt_status'] == 'Y') ? date('d/m/Y', strtotime($p['ngay_thanhtoan'])) : 'Trống' ?>" >
                    </div>
                    <input type="hidden" name="thanhtoan_id" value="<?= $p['thanhtoan_id'] ?>">
                    <button class="btn-save" type="submit" name="save">Lưu</button>
                    <button class="btn-back"><a href="index.php">Quay lại</a></button>
                <?php endforeach; ?>
                <a href="" class="refresh" data-id="<?= $phong_id ?>">Làm mới</a>
            </form>
        </div>
    </main>
    <?php
    if (isset($_POST['save'])) {
        $phong_ten = $_POST['phong_ten'];
        $kh_hoten = $_POST['kh_hoten'];
        $kh_sdt = $_POST['kh_sdt'];
        $kh_email = $_POST['kh_email'];
        $dp_ngayden = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['dp_ngayden'])));
        $dp_ngaydi = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['dp_ngaydi'])));
        $status = $_POST['status'];
        $httt_id = $_POST['httt_id'];
        $stt_status = $_POST['stt_status'];

        $sql_update = "UPDATE phong SET phong_ten = '$phong_ten', status = '$status' WHERE phong_id = $phong_id";
        mysqli_query($conn, $sql_update);

        $sql_update_dp = "UPDATE datphong SET dp_ngayden = '$dp_ngayden', dp_ngaydi = '$dp_ngaydi' WHERE datphong_id = (SELECT datphong_id FROM phong WHERE phong_id = $phong_id)";
        mysqli_query($conn, $sql_update_dp);

        $sql_update_kh = "UPDATE khachhang SET kh_hoten = '$kh_hoten', kh_sdt = '$kh_sdt', kh_email = '$kh_email' WHERE kh_id = (SELECT kh_id FROM datphong WHERE datphong_id = (SELECT datphong_id FROM phong WHERE phong_id = $phong_id))";
        mysqli_query($conn, $sql_update_kh);

        if ($stt_status == 'N') {
            $ngay_thanhtoan = "NULL";
        } else {
            $ngay_thanhtoan = "'" . date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngay_thanhtoan']))) . "'";
        }

        $sql_update_tt = "UPDATE thanhtoan SET stt_status = '$stt_status', ngay_thanhtoan = $ngay_thanhtoan, httt_id = '$httt_id' WHERE thanhtoan_id = (SELECT thanhtoan_id FROM phong WHERE phong_id = $phong_id)";
        mysqli_query($conn, $sql_update_tt);

        echo '<script>location.href = "index.php";</script>';
    }

    ?>

    <?php
    include_once __DIR__ . "/../js/js.php";
    ?>
</body>

</html>