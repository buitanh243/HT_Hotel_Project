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


        .form-control {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .group-btn {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>
</head>

<body>
    <?php
    include_once __DIR__ . "/../bocuc/head.php";
    include_once __DIR__ . "/../css/styles.php";

    include_once __DIR__ . "/../../connect/connect.php";

    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";
        ?>

        <div class="container">
            <h2>Thêm phòng mới</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="phong_ten">Tên phòng</label>
                    <input type="text" class="form-control" id="phong_ten" name="phong_ten" required>
                </div>
                <div class="form-group">
                    <label for="lp_id">Loại phòng</label>
                    <select name="lp_id" id="lp_id" class="form-control" required>
                        <option value="">Chọn loại phòng</option>
                        <?php
                        $sql = "SELECT * FROM loaiphong";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            echo '<option value="' . $row['lp_id'] . '">' . $row['lp_ten'] . '</option>';
                        }
                        ?>
                    </select>
                    <input type="hidden" class="" id="status" name="status" value="N">
                </div>
                <div class="group-btn">
                    <button type="submit" id="add" name="add" class="btn-save">Thêm phòng mới</button>
                    <a class="btn-back" href="index.php">Quay lại</a>
                </div>
            </form>
        </div>
    </main>
    <?php
    if (isset($_POST['add'])) {
        include_once __DIR__ . "/../../connect/connect.php";
        $phong_ten = $_POST['phong_ten'];

        $sql = "SELECT phong_ten FROM phong WHERE phong_ten = '$phong_ten'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Tên phòng đã tồn tại!'
            });
            </script>";
        } else {
            $lp_id = $_POST['lp_id'];
            $status = $_POST['status'];
            $sql = "INSERT INTO phong (phong_ten, lp_id, status) VALUES ('$phong_ten', '$lp_id', '$status')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: 'Đã thêm phòng thành công!'
                });
                </script>";
            } else {
                echo "Thêm phòng mới thất bại: " . mysqli_error($conn);
            }
        }
    }
    ?>
    <script src="/js/app.js"></script>
</body>

</html>