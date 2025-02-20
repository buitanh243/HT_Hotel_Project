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
  include_once __DIR__ . "/css/styles.php";
  ?>
  <style>
    .container {
        margin-top: 200px;
        width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }

    .card-body p {
        font-size: large;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        margin-top: 20px;
    }
  </style>
</head>

<body>
  <?php
  include_once __DIR__ . "/bocucchinh/head.php";
  include_once __DIR__ . '/loader.php';
  ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>YÊU CẦU ĐẶT PHÒNG CỦA QUÝ KHÁCH ĐÃ ĐƯỢC GỬI ĐI</h1>
                            <p>HT Hotel sẽ liên hệ với quý khách trong thời gian gần nhất</p>
                            <p>Xin chân thành cảm ơn quý khách đã ủng hộ chúng tôi!</p>
                        </div>
                    </div>
                </div>
                <a class="btn" href="./index.php">Tiếp tục đặt phòng</a>
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