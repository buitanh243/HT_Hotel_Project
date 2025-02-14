<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sidebar {
            height: 100%;
            width: 300px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #343a40;
            overflow-x: hidden;
            padding-top: 60px;
            margin: 100px 0 0 9px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 20px;
            color: #fff;
            display: block;
        }

        .sidebar a:hover {
            color: rgb(126, 137, 148);
            border: rgb(126, 137, 148) 1px solid;
        }

        .container {
            margin-left: 300px;
            padding: 16px;
            color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <a href="/Hotel_Project/admin/">Yêu cầu đặt phòng</a>
            <a href="/Hotel_Project/admin/datphong/">Danh sách đặt phòng</a>
            <a href="/Hotel_Project/admin/khachhang/">Danh sách khách hàng</a>
            <a href="/Hotel_Project/admin/phong/">Danh sách phòng</a>
            <a href="/Hotel_Project/admin/loaiphong./">Danh sách loại phòng</a>
            <a href="/Hotel_Project/admin/nhanvien/">Danh sách nhân viên</a>
            <a href="/Hotel_Project/admin/hoadon/">Danh sách hóa đơn</a>
        </div>
    </div>
</body>

</html>