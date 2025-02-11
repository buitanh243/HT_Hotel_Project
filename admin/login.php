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
  include_once __DIR__ . "/css/login.php";
  ?>

</head>

<body>
<main>
    <div class="container">
      <h1>Trang quản lý HT Hotel</h1>
        <form class="login-form" action="./Xuly/login.php" method="POST">
            <h1>Đăng nhập</h1>
            <div class="form-group">
                <label for="username">Tên đăng nhập</label><br>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label><br>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
            </div>
            <button type="submit">Đăng nhập</button>

        </form>
    </div>
</main>
  <script src="/js/app.js"></script>
</body>

</html>