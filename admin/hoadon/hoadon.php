<?php
include_once __DIR__ . "/../../connect/connect.php";

if (!isset($_GET['hd_id']) || empty($_GET['hd_id'])) {
    die("Thiếu thông tin hóa đơn.");
}

$hd_id = intval($_GET['hd_id']);
$sql = "SELECT * FROM hoadon WHERE hd_id = $hd_id;";
$result = mysqli_query($conn, $sql);

$arrHD = [];
while ($row = mysqli_fetch_assoc($result)) {
    $arrHD[] = array(
        'hd_ma' => $row['hd_ma'],
        'hd_ngayden' => $row['hd_ngayden'],
        'hd_ngaydi' => $row['hd_ngaydi'],
        'hd_hotenkh' => $row['hd_hotenkh'],
        'hd_sdtkh' => $row['hd_sdtkh'],
        'hd_ngayin' => $row['hd_ngayin'],
        'hd_ngaythanhtoan' => $row['hd_ngaythanhtoan'],
        'hd_tong' => $row['hd_tong'],
        'hd_httt' => $row['hd_httt'],
        'hd_loaiphong' => $row['hd_loaiphong'],
        'hd_tenphong' => $row['hd_tenphong'],
    );
}

ob_start();
require_once('TCPDF/tcpdf.php');

$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('HT Hotel');
$pdf->SetTitle('Hóa Đơn Khách Sạn');
$pdf->AddPage('P', 'A5');

// Tiêu đề khách sạn
$pdf->SetFont('dejavusans', 'B', 14);
$pdf->Cell(0, 20, 'HT Hotel', 0, 1, 'C');
$pdf->SetFont('dejavusans', '', 10);
$pdf->Cell(0, 5, 'Địa chỉ: Số 123, Đường ABC, Thành phố Cần Thơ', 0, 1, 'C');
$pdf->Cell(0, 5, 'Hotline: 0123456789', 0, 1, 'C');
$pdf->Ln(8); // Khoảng cách

// Tiêu đề chính của hóa đơn
$pdf->SetFont('dejavusans', 'B', 16);
$pdf->Cell(0, 10, 'HÓA ĐƠN KHÁCH SẠN', 0, 1, 'C');
$pdf->Ln(8);

foreach ($arrHD as $hd) {
    // Thông tin hóa đơn
    $pdf->SetFont('dejavusans', '', 10);
    $pdf->Cell(100, 8, 'Mã hóa đơn: ' . $hd['hd_ma'], 0, 1);
    $pdf->Cell(100, 8, 'Ngày xuất: ' . date('d/m/Y', strtotime($hd['hd_ngayin'])), 0, 1);
    $pdf->Ln(5);

    // Thông tin khách hàng
    $pdf->Cell(70, 8, 'Khách hàng: ' . $hd['hd_hotenkh'], 0, 0);
    $pdf->Cell(70, 8, 'Số điện thoại: ' . $hd['hd_sdtkh'], 0, 1);
    $pdf->Cell(70, 8, 'Loại phòng: ' . $hd['hd_loaiphong'], 0, 0);
    $pdf->Cell(70, 8, 'Tên phòng: ' . $hd['hd_tenphong'], 0, 1);
    $pdf->Cell(70, 8, 'Ngày đến: ' . date('d/m/Y', strtotime($hd['hd_ngayden'])), 0, 0);
    $pdf->Cell(70, 8, 'Ngày đi: ' . date('d/m/Y', strtotime($hd['hd_ngaydi'])), 0, 1);
    $pdf->Cell(100, 8, 'Hình thức thanh toán: ' . $hd['hd_httt'], 0, 1);
    $pdf->Cell(100, 8, 'Ngày thanh toán: ' . ($hd['hd_ngaythanhtoan'] == null ? 'Trống' : date('d/m/Y', strtotime($hd['hd_ngaythanhtoan']))), 0, 1);
    $pdf->Ln(5);

    // Dòng phân cách
    $pdf->SetFont('dejavusans', 'B', 10);
    $pdf->Cell(0, 8, '--------------------------------------', 0, 1, 'C');

    // Tổng hóa đơn
    $pdf->SetFont('dejavusans', 'B', 12);
    $pdf->Cell(0, 10, 'Tổng hóa đơn: ' . number_format($hd['hd_tong'], 0, '.', '.') . ' VND', 0, 1, 'C');
    $pdf->Ln(8);
}

// Cảm ơn khách hàng
$pdf->SetFont('dejavusans', '', 10);
$pdf->Cell(0, 8, 'HT HOTEL XIN CHÂN THÀNH CẢM ƠN QUÝ KHÁCH', 0, 1, 'C');

// Xuất PDF
ob_end_clean();
$pdf->Output('hoadon.pdf', 'I');

exit;
