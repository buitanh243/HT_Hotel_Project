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
  include_once __DIR__ . "/css/head.php";
  include_once __DIR__ . "/css/about.php";
  include_once __DIR__ . "/css/styles.php";
  include_once __DIR__ . '/loader.php';
  ?>
</head>

<body>
  <?php
  include_once __DIR__ . "/bocucchinh/head.php";
  ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>GIỚI THIỆU</h1>
                            <p>HT Hotel là một khách sạn 5 sao tọa lạc tại trung tâm thành phố Cần Thơ. Với hệ thống phòng nghỉ sang trọng, tiện nghi, đội ngũ nhân viên chuyên nghiệp, HT Hotel sẽ mang đến cho quý khách những trải nghiệm tuyệt vời nhất.</p>
                            <p>HT Hotel cung cấp các dịch vụ như: nhà hàng, quầy bar, bể bơi, phòng tập gym, spa, phòng họp, phòng tiệc,...
                              Đây sẽ là điểm dừng chân lý tưởng cho quý khách trong những chuyến công tác, du lịch, hay những buổi tiệc tùng, hội nghị.</p>
                              <p>Đội ngũ nhân viên chuyên nghiệp, nhiệt tình cùng với những dịch vụ cao cấp và đặc sắc, Trường Giang Boutique Hotel sẽ mang đến cho Quý khách những ngày nghỉ tuyệt vời với nhiều cung bậc cảm xúc, hòa mình vào thiên nhiên...</p>
                        </div>
                        <div class="content">
                          <img src="images/197007884.jpg" alt="">
                          <img src="images/nghe-dich-vu-nha-hang-khach-san.jpg" alt="">
                          <img src="images/dich-vu-giat-ui-trong-khach-san-8_1024x1024.jpg" alt="">
                          <img src="images/hypat-1659069584-1659081355.jpg" alt="">
                        </div>
                    </div>
                </div>
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