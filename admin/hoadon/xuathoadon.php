<?php
include_once __DIR__ . "/../../connect/connect.php";

if (isset($_GET['phong_id'])) {
    $phong_id = $_GET['phong_id'];

    // Truy vấn thông tin phòng và khách hàng
    $sql = "SELECT lp.lp_ten, lp.lp_gia,
                    p.phong_ten, dp.dp_ngayden, dp.dp_ngaydi, 
                    kh.kh_hoten, kh.kh_sdt, kh.kh_id,
                    tt.stt_status, tt.ngay_thanhtoan, httt.httt_ten,
                    DATEDIFF(dp.dp_ngaydi, dp.dp_ngayden) * lp.lp_gia  AS tonghoadon
            FROM phong AS p 
            JOIN loaiphong AS lp ON p.lp_id = lp.lp_id
            JOIN datphong AS dp ON dp.datphong_id = p.datphong_id
            JOIN khachhang AS kh ON dp.kh_id = kh.kh_id
            JOIN thanhtoan AS tt ON tt.thanhtoan_id = p.thanhtoan_id
            JOIN hinhthuc_thanhtoan AS httt ON httt.httt_id = tt.httt_id
            WHERE p.phong_id = $phong_id;";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }

    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }

    if (count($arr) > 0) {
        // Lấy dữ liệu đầu tiên trong mảng
        $data = $arr[0];

        $kh_id = $data['kh_id'];
        $phong_ten = $data['phong_ten'];
        $hd_ma = "HD" . date("Y") . $phong_ten . $kh_id;

        // Kiểm tra xem hóa đơn đã tồn tại chưa
        $sql_check = "SELECT hd_id FROM hoadon WHERE hd_ma = '$hd_ma'";
        $result_check = mysqli_query($conn, $sql_check);

        $row_check = mysqli_fetch_assoc($result_check);
        $hd_id = $row_check ? $row_check['hd_id'] : null;

        if ($hd_id) {

            $sql = "SELECT * FROM hoadon WHERE hd_id = $hd_id; ";
            $result = mysqli_query($conn, $sql);

            $arrHD = []; 
            while ($row = mysqli_fetch_assoc($result)) {
                $arrHD[] = array (
                    'hd_id' => $row['hd_id'],
                    'hd_ma' => $row['hd_ma'],
                    'hd_ngayin' => $row['hd_ngayin'],
                    'hd_loaiphong' => $row['hd_loaiphong'],
                    'hd_tenphong' => $row['hd_tenphong'],
                    'hd_ngayden' => $row['hd_ngayden'],
                    'hd_ngaydi' => $row['hd_ngaydi'],
                    'hd_hotenkh' => $row['hd_hotenkh'],
                    'hd_sdtkh' => $row['hd_sdtkh'],
                    'hd_ngaythanhtoan' => $row['hd_ngaythanhtoan'],
                    'hd_httt' => $row['hd_httt'],
                    'hd_tong' => $row['hd_tong']
                );
            }
            
            foreach ($arrHD as $key => $value) {
                $$key = $value;
            }

            $phong_ten = $data['phong_ten'];
            $lp_ten = $data['lp_ten'];
            $dp_ngayden = $data['dp_ngayden'];
            $dp_ngaydi = $data['dp_ngaydi'];
            $kh_hoten = $data['kh_hoten'];
            $kh_sdt = $data['kh_sdt'];
            $stt_status = $data['stt_status'];
            $ngay_thanhtoan = $data['ngay_thanhtoan'];
            $httt_ten = $data['httt_ten'];
            $tonghoadon = $data['tonghoadon'];

            if ($value['hd_hotenkh'] != $kh_hoten || 
                $value['hd_sdtkh'] != $kh_sdt || 
                $value['hd_ngayden'] != $dp_ngayden ||
                $value['hd_ngaydi'] != $dp_ngaydi || 
                $value['hd_loaiphong'] != $lp_ten ||
                $value['hd_tenphong'] != $phong_ten ||
                $value['hd_httt'] != $httt_ten ||
                $value['hd_ngaythanhtoan'] != $ngay_thanhtoan ||
                $value['hd_tong'] != $tonghoadon) {
                // Cập nhật lại hóa đơn nếu có sự thay đổi
                $sql_update = "UPDATE hoadon 
                               SET hd_hotenkh = '$kh_hoten', 
                                   hd_sdtkh = '$kh_sdt', 
                                   hd_ngayden = '$dp_ngayden', 
                                   hd_ngaydi = '$dp_ngaydi', 
                                   hd_tong = '$tonghoadon',
                                   hd_httt = '$httt_ten',
                                   hd_loaiphong = '$lp_ten',
                                   hd_tenphong = '$phong_ten',
                                   hd_ngaythanhtoan = '$ngay_thanhtoan'
                               WHERE hd_id = $hd_id";

                if (!mysqli_query($conn, $sql_update)) {
                    die("Lỗi cập nhật hóa đơn: " . mysqli_error($conn));
                }
            }   
            // Chuyển hướng đến trang hiển thị hóa đơn
            header("Location: ./hoadon.php?hd_id=$hd_id");
            exit();
        } else {
            // Nếu hóa đơn chưa tồn tại, tiến hành chèn mới
            $lp_ten = $data['lp_ten'];
            $lp_gia = $data['lp_gia'];
            $dp_ngayden = $data['dp_ngayden'];
            $dp_ngaydi = $data['dp_ngaydi'];
            $kh_hoten = $data['kh_hoten'];
            $kh_sdt = $data['kh_sdt'];
            $stt_status = $data['stt_status'];

            if ($data['stt_status'] == 'N') {
                $ngay_thanhtoan = "NULL";
            } else {
                $ngay_thanhtoan = "'" . date('Y-m-d', strtotime($data['ngay_thanhtoan'])) . "'";
            }

            $httt_ten = $data['httt_ten'];
            $tonghoadon = $data['tonghoadon'];
            $hd_ngayin = date('Y-m-d');

            // Chèn hóa đơn mới
            $sql_insert = "INSERT INTO hoadon (hd_ma, hd_ngayin, hd_loaiphong, hd_tenphong, hd_ngayden, hd_ngaydi, hd_hotenkh, hd_sdtkh, hd_ngaythanhtoan, hd_httt, hd_tong) 
                           VALUES ('$hd_ma', '$hd_ngayin', '$lp_ten', '$phong_ten', '$dp_ngayden', '$dp_ngaydi', '$kh_hoten', '$kh_sdt', $ngay_thanhtoan, '$httt_ten', '$tonghoadon')";

            if (mysqli_query($conn, $sql_insert)) {
                $hd_id = mysqli_insert_id($conn);
                header("Location: ./hoadon.php?hd_id=$hd_id");
                exit();
            } else {
                die("Lỗi chèn hóa đơn: " . mysqli_error($conn));
            }
        }
    } else {
        die("Không tìm thấy dữ liệu phù hợp!");
    }
}
?>