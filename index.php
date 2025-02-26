<!DOCTYPE html>
<html lang="en">
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
  <?php
  include_once __DIR__ . '/loader.php';
  include_once __DIR__ . "/css/head.php";
  include_once __DIR__ . "/css/trangchu.php";
  include_once __DIR__ . "/css/styles.php";
  ?>

</head>

<body>
  <?php
  include_once __DIR__ . "/bocucchinh/head.php";

  include_once __DIR__ . "/connect/connect.php";

  $sql = "SELECT p.*, i.*
          FROM loaiphong AS p
          JOIN img_room AS i ON p.lp_id = i.lp_id
          WHERE i.img_id = (
              SELECT MIN(img_id)
              FROM img_room
              WHERE lp_id = p.lp_id
          );
          ";

  $result = mysqli_query($conn, $sql);
  $arrRoom = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $arrRoom[] = array(
      "lp_id" => $row["lp_id"],
      'lp_ten' => $row['lp_ten'],
      'lp_mota' => $row['lp_mota'],
      'lp_gia' => $row['lp_gia'],
      'url' => $row['url'],
    );
  }
  ?>
  <main>
    <div class="content">
      <div class="img-1">
        <img src="images/slider_3.webp" alt="">
      </div>
      <!-- <h1>Chào mừng đến với HT Hotel</h1> -->
      <h1 data-text="Awesome">
        <span class="actual-text">&nbsp;Chào mừng đến với HT Hotel&nbsp;</span>
        <span aria-hidden="true" class="hover-text">&nbsp;Chào mừng đến với HT Hotel&nbsp;</span>
      </h1>
      <div class="content-1">
        <p>HT Hotel là một trong những khách sạn hàng đầu tại Việt Nam. Với hệ thống phòng đa dạng, chúng tôi tự hào
          mang đến cho khách hàng những trải nghiệm tuyệt vời nhất.</p>
      </div>

      <div class="img-2">
        <img src="images/feature_menu_2.webp" alt="">
      </div>

      <div class="row">
        <div class="col">
          <i class="fa-solid fa-envelope"></i>
          <p>Hỗ trợ khách hàng</p>
        </div>
        <div class="col">
          <i class="fas fa-bed"></i>
          <p>Phòng nghỉ tiện nghi</p>
        </div>
        <div class="col">
          <i class="fas fa-utensils"></i>
          <p>Nhà hàng cao cấp</p>
        </div>
        <div class="col">
          <i class="fas fa-swimming-pool"></i>
          <p>Hồ bơi sang trọng</p>
        </div>
      </div>

      <div class="room-product" id="card_room">
        <?php
        $count = 0;
        foreach ($arrRoom as $row) {
          if ($count == 2) {
            echo '</div><div class="room-product">';
            $count = 0;
          }
        ?>
          <div class="card_room" >
            <div class="card_form">
              <img src="<?= $row['url'] ?>" alt="Lỗi">
              <span><?php 
                $sql_st = "SELECT * FROM phong WHERE status = 'N' AND lp_id = " . $row['lp_id'];
                $result_st = mysqli_query($conn, $sql_st);
                $row_st = mysqli_fetch_assoc($result_st);
                if ($row_st !== null && $row_st['status'] == 'N') {
                  echo 'Còn phòng';
                } else {
                  echo 'Tạm hết phòng';
                } ?> </span>
            </div>
            <div class="card_data">
              <div style="display: flex" class="data">
                <div class="text">
                  <label class="text_m"><?= $row['lp_ten'] ?></label>
                  <div class="cube text_s">
                    <label class="side front">Mô tả: <?= $row['lp_mota'] ?> </label>
                    <label class="side top">Giá: <?= number_format($row['lp_gia'], 0, ',', '.') ?>&#8363</label>
                  </div>
                </div>
              </div>
              <span>Đặt ngay kẻo lỡ</span>
            </div>
            <a href="chitiet_phong.php?lp_id=<?= $row['lp_id']; ?>">Xem chi tiết</a>
          </div>
        <?php
          $count++;
        } ?>
      </div>

      <div class="sologan">
        <h1>SỰ HÀI LÒNG CỦA QUÝ KHÁCH LÀ NIỀM TỰ HÀO CỦA CHÚNG TÔI !</h1>
        <p>Nhiều khách hàng của HT Hotel sau khi sử dụng dịch vụ của công ty cũng đã phản hồi và đánh giá rất tốt, từ đội ngũ nhân sự chuyên nghiệp đến những ý tưởng sáng tạo khi triển khai dịch vụ, không dừng ở đó chung tôi sẽ không ngừng đổi mới và phát triển thêm nữa đẻ luôn là sự lựa chọn hoàn hảo của bạn.</p>
      </div>
    </div>
  </main>

  <div id="footer">
    <?php
    include_once __DIR__ . "/bocucchinh/footer.php";
    ?>
  </div>

  <script src="js/app.js"></script>
</body>

</html>