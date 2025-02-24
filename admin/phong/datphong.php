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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/l10n/vi.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include_once __DIR__ . "/../css/styles.php"; ?>

    <style>
        /* Style chung */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .content2,
        .content {
            width: 500px;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 25px;
        }

        /* Style cho nhóm form */
        .form-group {
            width: 100%;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            font-size: 16px;
            color: #444;
        }

        select,
        input[type="date"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
            background-color: #fff;
        }

        input:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        /* Style bảng thông tin */
        .table-info {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table-info th,
        .table-info td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        .table-info th {
            background-color: #007bff;
            color: white;
        }

        /* Style cho phần content2 */
        .content2 {
            width: 100%;
            max-width: 500px;
            margin: 30px auto;
            padding: 25px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style tiêu đề form */
        .content2 label:first-child {
            display: block;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: start;
            color: #333;
        }

        /* Cải thiện hiển thị form */
        .form-group input:hover,
        .form-group select:hover {
            border-color: #0056b3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .form-group {
                width: 100%;
            }

            .table-info th,
            .table-info td {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <?php
    include_once __DIR__ . "/../bocuc/head.php";
    include_once __DIR__ . "/../../connect/connect.php";
    $phong_id = $_GET['phong_id'];

    $sql = "SELECT phong_ten FROM phong WHERE phong_id = $phong_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $phong_ten = $row['phong_ten'];

    $sql = "SELECT kh.kh_id, kh.kh_hoten FROM datphong AS dp 
        JOIN khachhang AS kh ON dp.kh_id = kh.kh_id WHERE dp.`status` = 'Y' ";
    $result = mysqli_query($conn, $sql);
    $arrKH = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $arrKH[] = array(
            'kh_id' => $row['kh_id'],
            'kh_hoten' => $row['kh_hoten']
        );
    }
    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";
        include_once __DIR__ . "/../css/styles.php";

        ?>
        <h1>Thêm thông tin đặt cho </h1>
        <label for="phong_id">Phòng <?= $phong_ten ?></label>

        <div class="content">
            <form action="" method="post">
                <div class="form-group">
                    <label for="kh_id">Khách hàng từ danh sách yêu cầu</label>
                    <select name="kh_id" id="kh_id">
                        <option value="">Chọn khách hàng đặt phòng</option>
                        <?php foreach ($arrKH as $kh): ?>
                            <option value="<?= $kh['kh_id'] ?>"><?= $kh['kh_hoten'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn-save" type="submit" name="save" id="save">Xác nhận</button>
                <a class="btn-back" href="./index.php">Huỷ bỏ</a>
            </form>
            <?php
            if (isset($_POST['save']) && $_POST['kh_id'] != '') {
                $kh_id = $_POST['kh_id'];
                $sql = "SELECT dp.dp_ngayden, dp.dp_ngaydi, dp.datphong_yc,
                        kh.kh_sdt, kh.kh_email, kh.kh_hoten
                        FROM datphong AS dp 
                        JOIN khachhang AS kh ON dp.kh_id = kh.kh_id
                        WHERE kh.kh_id = $kh_id;";
                $result = mysqli_query($conn, $sql);
                $arrKH = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $arrKH[] = array(
                        'dp_ngayden' => $row['dp_ngayden'],
                        'dp_ngaydi' => $row['dp_ngaydi'],
                        'kh_sdt' => $row['kh_sdt'],
                        'kh_email' => $row['kh_email'],
                        'kh_hoten' => $row['kh_hoten']
                    );
                }
            ?>
                <?php foreach ($arrKH as $kh): ?>
                    <p style="margin-top: 10px; color: red;">Nhấn xác nhận để thêm khách hàng mới</p>

                    <table class="table-info">
                        <tr>
                            <th>Tên khách hàng</th>
                            <td><?= $kh['kh_hoten'] ?></td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td><?= $kh['kh_sdt'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $kh['kh_email'] ?></td>
                        </tr>
                        <tr>
                            <th>Ngày đến</th>
                            <td><?= date('d/m/Y', strtotime($kh['dp_ngayden'])) ?></td>
                        </tr>
                        <tr>
                            <th>Ngày đi</th>
                            <td><?= date('d/m/Y', strtotime($kh['dp_ngaydi'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php
                    $sql = "SELECT * FROM hinhthuc_thanhtoan";
                    $result = mysqli_query($conn, $sql);
                    $arrHTTT = [];
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $arrHTTT[] = array(
                            'httt_id' => $row['httt_id'],
                            'httt_ten' => $row['httt_ten']
                        );
                    }

                    $sql = "SELECT * FROM thanhtoan";
                    $result = mysqli_query($conn, $sql);
                    $arrTT = [];
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $arrTT[] = array(
                            'thanhtoan_id' => $row['thanhtoan_id'],
                            'stt_status' => $row['stt_status'],
                            'ngay_thanhtoan' => $row['ngay_thanhtoan'],
                            'httt_id' => $row['httt_id']
                        );
                    }
                    ?>
                    <tr>
                        <th>Hình thức thanh toán</th>
                        <form action="" method="post">
                            <td>
                                <select name="httt_id" id="">
                                    <option value="">Chọn hình thức thanh toán</option>
                                    <?php foreach ($arrHTTT as $httt): ?>
                                        <option value="<?= $httt['httt_id'] ?>"><?= $httt['httt_ten'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                    </tr>
                    <tr>
                        <th>Trạng thái thanh toán</th>
                        <td>
                            <select name="stt_status" id="stt_status" onchange="toggleNgayThanhToan()">
                                <option value="">Chọn trạng thái thanh toán</option>
                                <option value="Y">Đã thanh toán</option>
                                t <option value="N">Chưa thanh toán</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="ngayThanhToanRow" style="display: none;">
                        <th>Ngày thanh toán</th>
                        <td>
                            <input type="date" name="ngay_thanhtoan" id="ngay_thanhtoan">
                        </td>
                    </tr>
                    </table>
                    <input type="hidden" name="kh_id" value="<?= $kh_id ?>">
                    <button class="btn-save" type="submit" id="submit" name="submit">Lưu lại</button>
                    </form>

                <?php
            }
                ?>

                <?php

                if (isset($_POST['submit']) && $_POST['kh_id'] != '') {

                    $kh_id = $_POST['kh_id'];
                    $httt_id = $_POST['httt_id'];
                    $stt_status = $_POST['stt_status'];
                    $ngay_thanhtoan = $_POST['ngay_thanhtoan'] ?? '';
                    // Kiểm tra và xử lý giá trị ngày thanh toán
                    if (!empty($ngay_thanhtoan)) {
                        $ngay_thanhtoan = date('Y-m-d', strtotime($ngay_thanhtoan));
                    } else {
                        $ngay_thanhtoan = null;
                    }

                    $ngay_thanhtoan = $ngay_thanhtoan ? "'$ngay_thanhtoan'" : "NULL";

                    if ($httt_id == '' || $stt_status == '') {
                        echo "<script>
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Vui lòng điền đầy đủ thông tin!',
                                });
                                </script>";
                    } else {
                        $sql = "INSERT INTO thanhtoan (httt_id, stt_status, ngay_thanhtoan) VALUES ('$httt_id', '$stt_status', $ngay_thanhtoan)";
                        $result = mysqli_query($conn, $sql);

                        $thanhtoan_id = mysqli_insert_id($conn);
                        $sql = "SELECT datphong_id FROM datphong WHERE kh_id = $kh_id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $datphong_id = $row['datphong_id'];

                        $sql = "UPDATE phong SET datphong_id = '$datphong_id', thanhtoan_id = '$thanhtoan_id', status = 'Y' WHERE phong_id = $phong_id;";
                        $result = mysqli_query($conn, $sql);
                        echo "<script>window.location.href='./info_phong.php?phong_id=" . $phong_id . "';</script>";
                    }
                }
                ?>
        </div>
        <div style="display: <?= (isset($_POST['save']) && $_POST['kh_id'] != '') ? 'none' : 'block'; ?>;" class="content2">
            <label style="color: #007bff;">Hoặc thêm khách hàng mới</label>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Tên khách hàng</label>
                    <input type="text" name="kh_ten">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="kh_sdt">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="kh_email">
                </div>
                <div class="form-group">
                    <label for="">Loại phòng</label>
                    <select name="lp_id" id="lp_id">
                        <option value="">Chọn loại phòng</option>
                        <?php
                        $sql = "SELECT lp_id, lp_ten FROM loaiphong;";
                        $result = mysqli_query($conn, $sql);

                        $arrDP = [];
                        while ($row = mysqli_fetch_array($result)) {
                            $arrDP[] = array(
                                'lp_id' => $row['lp_id'],
                                'lp_ten' => $row['lp_ten']
                            );
                        }

                        foreach ($arrDP as $dp) {
                        ?>
                            <option value="<?= $dp['lp_id'] ?>"><?= $dp['lp_ten'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Ngày đến</label>
                    <input type="date" name="dp_ngayden">
                </div>
                <div class="form-group">
                    <label for="">Ngày đi</label>
                    <input type="date" name="dp_ngaydi">
                </div>
                <div class="form-group">
                    <label for="">Hình thức thanh toán</label>
                    <select name="httt_id" id="httt_id">
                        <option value="">Chọn hình thức thanh toán</option>
                        <?php
                        $sql = "SELECT httt_id, httt_ten FROM hinhthuc_thanhtoan;";
                        $result = mysqli_query($conn, $sql);

                        $arrDP = [];
                        while ($row = mysqli_fetch_array($result)) {
                            $arrDP[] = array(
                                'httt_id' => $row['httt_id'],
                                'httt_ten' => $row['httt_ten']
                            );
                        }

                        foreach ($arrDP as $dp) {
                        ?>
                            <option value="<?= $dp['httt_id'] ?>"><?= $dp['httt_ten'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái thanh toán</label>
                    <select name="stt_status" id="stt_status" onchange="toggleNgayThanhToan()">
                        <option value="">Chọn trạng thái thanh toán</option>
                        <option value="Y">Đã thanh toán</option>
                        <option value="N">Chưa thanh toán</option>
                    </select>
                </div>
                <div class="form-group" id="ngayThanhToanRow" style="display: none;">
                    <label>Ngày thanh toán</label>
                    <input type="date" name="ngay_thanhtoan" id="ngay_thanhtoan">
                </div>
                <button type="submit" class="btn-save" name="save_insert">Lưu lại</button>
            </form>
            <?php
            if (isset($_POST['save_insert'])) {
                if (
                    $_POST['kh_ten'] == '' ||
                    $_POST['kh_sdt'] == '' ||
                    $_POST['kh_email'] == '' ||
                    $_POST['httt_id'] == '' ||
                    $_POST['lp_id'] == ''
                ) {
                    echo
                    "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                icon: 'info',
                                title: 'Thiếu thông tin!',
                                text: 'Vui lòng điền đầy đủ thông tin!'
                            })
                        });
                        </script>";
                } else {
                    $kh_hoten = $_POST['kh_ten'];
                    $kh_sdt = $_POST['kh_sdt'];
                    $kh_email = $_POST['kh_email'];
                    $lp_id = $_POST['lp_id'];
                    $dp_ngayden = date('Y-m-d', strtotime($_POST['dp_ngayden']));
                    $dp_ngaydi = date('Y-m-d', strtotime($_POST['dp_ngaydi']));
                    $httt_id = $_POST['httt_id'];

                    $sql = "INSERT INTO khachhang (kh_hoten,kh_sdt,kh_email) VALUE ('$kh_hoten', '$kh_sdt', '$kh_email')";
                    $result = mysqli_query($conn, $sql);
                    $kh_id = mysqli_insert_id($conn);

                    $sql = "INSERT INTO datphong (dp_ngayden,dp_ngaydi,status,lp_id, kh_id) VALUE ('$dp_ngayden', '$dp_ngaydi', 'Y', $lp_id, $kh_id)";
                    $result = mysqli_query($conn, $sql);
                    $datphong_id = mysqli_insert_id($conn);

                    if ($_POST['stt_status'] == 'Y') {

                        $ngay_thanhtoan = date('Y-m-d', strtotime($_POST['ngay_thanhtoan']));

                        $sql = "INSERT INTO thanhtoan (ngay_thanhtoan, httt_id, stt_status) VALUES ('$ngay_thanhtoan', $httt_id, 'Y')";
                        $result = mysqli_query($conn, $sql);
                        $thanhtoan_id = mysqli_insert_id($conn);
                    } else {
                        $sql = "INSERT INTO thanhtoan (httt_id, stt_status) VALUE ($httt_id, 'N')";
                        $result = mysqli_query($conn, $sql);
                        $thanhtoan_id = mysqli_insert_id($conn);
                    }

                    $sql = "UPDATE phong SET status = 'Y', lp_id = $lp_id, datphong_id = $datphong_id, thanhtoan_id = $thanhtoan_id WHERE phong_id = $phong_id";
                    $result = mysqli_query($conn, $sql);
                    echo
                    "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Thêm thông tin thành công!'
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                });
                </script>";
                }
            }
            ?>
        </div>
    </main>

    <script src="/js/app.js"></script>
    <script>
        function toggleNgayThanhToan() {
            var sttStatus = document.getElementById('stt_status').value;
            var ngayThanhToanRow = document.getElementById('ngayThanhToanRow');
            var ngayThanhToanInput = document.getElementById('ngay_thanhtoan');

            if (sttStatus === 'Y') {
                ngayThanhToanRow.style.display = '';
                ngayThanhToanInput.required = true;
            } else {
                ngayThanhToanRow.style.display = 'none';
                ngayThanhToanInput.required = false;
                ngayThanhToanInput.value = '';
            }
        }
    </script>
</body>

</html>