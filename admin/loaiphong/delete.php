<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once __DIR__ . "/../../connect/connect.php";

if (isset($_GET['lp_id'])) {
    $lp_id = $_GET['lp_id'];

    $stmt = $conn->prepare("SELECT lp_id FROM phong WHERE lp_id = ?");
    $stmt->bind_param("i", $lp_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Không thể xoá loại phòng này',
                        text: 'Loại phòng này hiện đang được sử dụng'
                    }).then(() => {
                        window.location.href = './index.php';
                    });
                });
            </script>";
    } else {
        $stmt = $conn->prepare("DELETE FROM loaiphong WHERE lp_id = ?");
        $stmt->bind_param("i", $lp_id);
        $stmt->execute();
        header("Location: index.php");
    }
    $stmt->close();
}
?>