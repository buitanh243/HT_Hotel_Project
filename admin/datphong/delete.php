<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once __DIR__ . "/../../connect/connect.php";

$_GET['id'];

$sql = "SELECT datphong_id FROM phong WHERE datphong_id =" . $_GET['id'] .";";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo "<script>
    $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Không thể xoá lúc này',
                    text: 'Thông tin này hiện đang được sử dụng'
                }).then(() => {
                    window.location.href = './index.php';
                });
            });
        </script>";
} else {
    $sql = "SELECT kh_id FROM datphong WHERE datphong_id = " . $_GET['id'];
    mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $kh_id = $row['kh_id'];

    $sql = "DELETE FROM datphong WHERE datphong_id = " . $_GET['id'];
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM khachhang WHERE kh_id = $kh_id; ";
    mysqli_query($conn, $sql);

    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            icon: 'success',
            title: 'Đã xoá thành công',
        }).then(() => {
            window.location.href = './index.php';
        });
    });
</script>";
}

?>