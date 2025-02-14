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
    include_once __DIR__ . "/../bocuc/head.php";

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
                </div>
                <input type="hidden" class="form-control" id="status" name="status" value="N">
                <button type="submit" id="add" name="add" class="">Thêm</button>
                <a href="index.php">Quay lại</a>
            </form>
        </div>
    </main>
    <?php
    if (isset($_POST['add'])) {
        include_once __DIR__ . "/../../connect/connect.php";
        $phong_ten = $_POST['phong_ten'];
        $lp_id = $_POST['lp_id'];
        $status = $_POST['status'];
        $sql = "INSERT INTO phong (phong_ten, lp_id, status) VALUES ('$phong_ten', '$lp_id', '$status')";
        if (mysqli_query($conn, $sql)) {
            echo "Thêm phòng mới thành công";
        } else {
            echo "Thêm phòng mới thất bại: " . mysqli_error($conn);
        }
    }
    ?>
    <script src="/js/app.js"></script>
</body>

</html>