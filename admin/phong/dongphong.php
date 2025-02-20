<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once __DIR__ . "/../../connect/connect.php";

if (isset($_GET['phong_id'])) {
    $phong_id = $_GET['phong_id'];

    // Kiểm tra ID có hợp lệ không
    if (!is_numeric($phong_id)) {
        die("ID phòng không hợp lệ.");
    }

    // Sử dụng Prepared Statements để tránh SQL Injection
    $sql = "SELECT lp.lp_ten, lp.lp_gia,
                   p.phong_ten, dp.dp_ngayden, dp.dp_ngaydi, 
                   kh.kh_hoten, kh.kh_sdt, kh.kh_id,
                   tt.stt_status, tt.ngay_thanhtoan, httt.httt_ten,
                   DATEDIFF(dp.dp_ngaydi, dp.dp_ngayden) * lp.lp_gia AS tonghoadon
            FROM phong AS p 
            JOIN loaiphong AS lp ON p.lp_id = lp.lp_id
            JOIN datphong AS dp ON dp.datphong_id = p.datphong_id
            JOIN khachhang AS kh ON dp.kh_id = kh.kh_id
            JOIN thanhtoan AS tt ON tt.thanhtoan_id = p.thanhtoan_id
            JOIN hinhthuc_thanhtoan AS httt ON httt.httt_id = tt.httt_id
            WHERE p.phong_id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $phong_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        die("Không tìm thấy dữ liệu phù hợp!");
    }

    $kh_id = $data['kh_id'];
    $phong_ten = $data['phong_ten'];
    $hd_ma = "HD" . date("Y") . $phong_ten . $kh_id;

    // Kiểm tra xem hóa đơn đã tồn tại chưa
    $sql_check = "SELECT hd_id FROM hoadon WHERE hd_ma = ?";
    $stmt_check = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "s", $hd_ma);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);
    $row_check = mysqli_fetch_assoc($result_check);
    $hd_id = $row_check ? $row_check['hd_id'] : null;

    if ($hd_id) {
        // Cập nhật hóa đơn nếu có thay đổi
        $sql_update = "UPDATE hoadon 
                       SET hd_hotenkh = ?, hd_sdtkh = ?, hd_ngayden = ?, 
                           hd_ngaydi = ?, hd_tong = ?, hd_httt = ?,
                           hd_loaiphong = ?, hd_tenphong = ?, hd_ngaythanhtoan = ?
                       WHERE hd_id = ?";

        $ngay_thanhtoan = ($data['stt_status'] == 'N') ? NULL : date('Y-m-d', strtotime($data['ngay_thanhtoan']));
        $stmt_update = mysqli_prepare($conn, $sql_update);
        mysqli_stmt_bind_param(
            $stmt_update,
            "sssssssssi",
            $data['kh_hoten'],
            $data['kh_sdt'],
            $data['dp_ngayden'],
            $data['dp_ngaydi'],
            $data['tonghoadon'],
            $data['httt_ten'],
            $data['lp_ten'],
            $data['phong_ten'],
            $ngay_thanhtoan,
            $hd_id
        );
        mysqli_stmt_execute($stmt_update);
    } else {
        // Thêm hóa đơn mới
        $sql_insert = "INSERT INTO hoadon (hd_ma, hd_ngayin, hd_loaiphong, hd_tenphong, hd_ngayden, hd_ngaydi, 
                                           hd_hotenkh, hd_sdtkh, hd_ngaythanhtoan, hd_httt, hd_tong) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $hd_ngayin = date('Y-m-d');
        $ngay_thanhtoan = ($data['stt_status'] == 'N') ? NULL : date('Y-m-d', strtotime($data['ngay_thanhtoan']));
        $stmt_insert = mysqli_prepare($conn, $sql_insert);
        mysqli_stmt_bind_param(
            $stmt_insert,
            "ssssssssssi",
            $hd_ma,
            $hd_ngayin,
            $data['lp_ten'],
            $data['phong_ten'],
            $data['dp_ngayden'],
            $data['dp_ngaydi'],
            $data['kh_hoten'],
            $data['kh_sdt'],
            $ngay_thanhtoan,
            $data['httt_ten'],
            $data['tonghoadon']
        );
        mysqli_stmt_execute($stmt_insert);
    }

    // Cập nhật trạng thái phòng và xóa thanh toán
    $sql = "SELECT thanhtoan_id FROM phong WHERE phong_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $phong_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $thanhtoan_id = $row['thanhtoan_id'];

    $sql_update_phong = "UPDATE phong SET status = 'N', datphong_id = NULL, thanhtoan_id = NULL WHERE phong_id = ?";
    $stmt_update_phong = mysqli_prepare($conn, $sql_update_phong);
    mysqli_stmt_bind_param($stmt_update_phong, "i", $phong_id);
    mysqli_stmt_execute($stmt_update_phong);

    $sql_delete_thanhtoan = "DELETE FROM thanhtoan WHERE thanhtoan_id = ?";
    $stmt_delete_thanhtoan = mysqli_prepare($conn, $sql_delete_thanhtoan);
    mysqli_stmt_bind_param($stmt_delete_thanhtoan, "i", $thanhtoan_id);
    mysqli_stmt_execute($stmt_delete_thanhtoan);

    echo
    "<script>
    $(document).ready(function() {
        Swal.fire({
            icon: 'success',
            title: 'Thành công',
            text: 'Đóng phòng thành công!'
        }).then(() => {
            window.location.href = 'index.php';
        });
    });
    </script>";
}
?>