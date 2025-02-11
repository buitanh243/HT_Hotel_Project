<!DOCTYPE html>
<html lang="vi">

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/l10n/vi.js"></script>


  <?php
  include_once __DIR__ . "/css/head.php";
  include_once __DIR__ . "/css/chitiet_phong.php";
  include_once __DIR__ . "/css/styles.php";
  ?>

</head>

<body>
  <?php
  include_once __DIR__ . "/bocucchinh/head.php";

  include_once __DIR__ . "/connect/connect.php";

  if (isset($_GET["phong_id"])) {
    $phong_id = $_GET["phong_id"];

    $sql = "SELECT * 
      FROM img_room AS i 
      JOIN phong AS p ON i.phong_id = p.phong_id 
      WHERE i.phong_id = $phong_id;";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql_url = "SELECT url 
      FROM img_room AS i 
       WHERE i.phong_id = $phong_id;";

    $resul_url = mysqli_query($conn, $sql);
    $row_url = mysqli_fetch_assoc($result);
  } else {
    header("Location: index.php");
  }
  ?>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-6 img-content">
                  <?php foreach ($resul_url as $row_url): ?>
                    <div class="img-1"><img  src="<?= $row_url['url'] ?>" alt=""></div>
                    <div class="img-2"><img  src="<?= $row_url['url'] ?>" alt=""></div>
                    <div class="img-3"><img  src="<?= $row_url['url'] ?>" alt=""></div>
                  <?php endforeach; ?>
                </div>
                <div class="col-6 chitiet">
                  <div class="thongtin">
                    <h3><?php echo $row['phong_ten'] ?></h3>
                    <p id="mota">Mô tả: <?php echo $row['phong_mota'] ?></p>
                    <p id="gia">Giá: <?= number_format($row['phong_gia'], 0, ',', '.') ?>&#8363</p>
                    <p id="soluong">Số lượng: <?php echo $row['phong_soluong'] ?></p>
                    <a href="index.php" class="btn-back">Quay lại</a>
                    <a href="#thongtin_datphong" class="btn">Đặt phòng</a>
                  </div>
                  <div class="datphong">
                    <h2>TIỆN NGHI</h2>
                    <div>
                      <i class="fa-solid fa-utensils"></i>
                      <i class="fa-solid fa-wifi"></i>
                      <i class="fa-solid fa-tv"></i>
                      <i class="fa-solid fa-car"></i>
                    </div>
                  </div>
                  <div class="tongquan">
                    <h2>TỔNG QUAN</h2>
                    <table class="table">
                      <tr>
                        <td>Diện tích</td>
                        <td><?= $row['phong_dientich'] ?></td>
                      </tr>
                      <tr>
                        <td>Loại giường</td>
                        <td>Giường đôi</td>
                      </tr>
                      <tr>
                        <td>Phòng tắm</td>
                        <td>1 phòng </td>
                      </tr>
                      <tr>
                        <td>Phòng ngủ</td>
                        <td>1 phòng </td>
                      </tr>
                      <tr>
                        <td>Phòng khách</td>
                        <td>0 phòng </td>
                      </tr>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="thongtin_datphong" class="thongtin_datphong">
        <h2>THÔNG TIN ĐẶT PHÒNG</h2>
        <form action="" method="POST">
          <div class="form-group">
            <div>
              <label for="name">Họ và tên(*):</label>
              <input type="text" class="form-control" id="hoten" name="hoten" required>
              <label for="">Số điện thoại(*):</label>
              <input type="text" class="form-control" id="sdt" name="sdt" required>
            </div>
            <div>
              <label for="">Email:</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div>
              <label for="">Ngày nhận phòng(*):</label>
              <input type="date" class="form-control" id="ngaynhan" name="ngaynhan" required> <br>
              <label for="">Ngày trả phòng(*):</label>
              <input type="date" class="form-control" id="ngaytra" name="ngaytra" required>
            </div>
            <div>
              <label for="">Số lượng người(*):</label>
              <input type="number" class="form-control" id="songuoi" name="songuoi" required>
              <label for="">Số lượng phòng(*):</label>
              <input type="number" class="form-control" id="soluongphong" name="soluongphong" required>
            </div>
            <div>
              <label for="">Yêu cầu khác:</label><br>
              <textarea name="yeucau" id="yeucau" cols="100" rows="10"></textarea>
            </div>
            <div class="">
              <input type="checkbox" name="agree" id="agree" required>
              <label for="agree">Đồng ý với điều khoản đặt phòng</label>
            </div>
            <div>
              <form action="">
                <button class="btn">Xác nhận đặt phòng</button>
              </form>
            </div>

          </div>
      </div>
  </main>
  <?php
  include_once __DIR__ . "/bocucchinh/footer.php";
  ?>

  <script src="/js/app.js"></script>
  <script>
    flatpickr("#ngaynhan", {
      dateFormat: "d-m-Y",
      locale: "vi"
    });

    flatpickr("#ngaytra", {
      dateFormat: "d-m-Y",
      locale: "vi"
    });
  </script>

</body>

</html>