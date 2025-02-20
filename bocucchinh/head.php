<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/head.css"> -->
    <?php
    include_once __DIR__ . "/../css/head.php";
    ?>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php"><img src="images/logo.jpg" alt="Lỗi"></a>
                <p>HT Hotel</p>
            </div>
            <div class="menu">
                <a href="index.php">Trang chủ</a>
                <a href=".#card_room">Đặt phòng</a>
                <a href="about.php">Giới thiệu</a>
                <a href=".#footer">Liên hệ</a>
            </div>
            <!-- <div class="search">
                <form action="/search.php" method="get">
                    <input type="text" name="search" id="search"
                        placeholder="Tìm kiếm...">
                    <button type="submit">Tìm kiếm</button>
                </form>
            </div> -->
            <!-- <div class="cart">
                <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            </div> -->

            <!-- <div class="auth">
                <?php 
                    // if (isset($_POST["username"]) && isset($_POST["username"])) {
                    //     echo "<a href='logout.php'>Đăng xuất</a>";
                    // } else {
                    //     echo "<a href='login.php'>Đăng nhập</a>";
                    // }
                ?>
            </div> -->
        </nav>

    </header>
</body>

</html>