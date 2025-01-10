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

    $sql = "SELECT * FROM phong AS p JOIN img_room AS i ON p.img_id = i.img_id WHERE phong_id = $phong_id;";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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
                <div class="col-6">
                  <img src="<?php echo $row['url'] ?>" alt="">
                </div>
                <div class="col-6 chitiet">
                  <div class="thongtin">
                    <h3><?php echo $row['phong_ten'] ?></h3>
                    <p id="mota"><?php echo $row['phong_mota'] ?></p>
                    <p id="gia"><?php echo $row['phong_gia'] ?></p>
                    <p id="loai"><?php echo $row['phong_loai'] ?></p>
                    <a href="index.php" class="btn-back">Quay lại</a>
                  </div>
                  <div class="datphong"> 
                      <P>TIỆN NGHI</P>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include_once __DIR__ . "/bocucchinh/footer.php";
  ?>

  <script src="/js/app.js"></script>
</body>

</html>