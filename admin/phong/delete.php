<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once __DIR__ . "/../../connect/connect.php";

if (isset($_GET['id'])) {
    $phong_id = $_GET['id'];

    $sql = "SELECT status FROM phong WHERE phong_id = $phong_id;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row['status'] == 'Y') {
        echo
        "<script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Phòng đã được đặt không thể xóa!'
            }).then(() => {
                window.location.href = 'index.php';
            });
        });
        </script>";
    } else {
        $sql = "DELETE FROM phong WHERE phong_id = $phong_id";
        mysqli_query($conn, $sql);
        echo
        "<script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: 'Phòng đã được xóa thành công!'
            }).then(() => {
                window.location.href = 'index.php';
            });
        });
        </script>";
    }
}

if (isset($_GET['p_id'])) {
    $_GET['p_id'];

    $sql = "SELECT thanhtoan_id FROM phong WHERE phong_id = " . $_GET['p_id'] . ";";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $thanhtoan_id = $row['thanhtoan_id'];

    $sql = "UPDATE phong SET status = 'N', datphong_id = NULL, thanhtoan_id = NULL WHERE phong_id =  " . $_GET['p_id'] . ";";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM thanhtoan WHERE thanhtoan_id = $thanhtoan_id;";
    mysqli_query($conn, $sql);

    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            icon: 'success',
            title: 'Làm mới thành công',
        }).then(() => {
            window.location.href = 'info_phong.php?phong_id=" . $_GET['p_id'] . "';
        });
    });
    </script>";
}

?>