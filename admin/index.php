<!DOCTYPE html>
<html lang="en">
<?php 
    include_once __DIR__ . "/../connect/connect.php";
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: ./login.php");
    }
?>
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


</head>

<body>
    <?php
    include_once __DIR__ . "/bocuc/head.php";

    include_once __DIR__ . "/../connect/connect.php";
    ?>
    <main>
        <?php
            include_once __DIR__ . "/bocuc/head.php";
            include_once __DIR__ . "/bocuc/sidebar.php";
        ?>
        <div class="container">
            <h1>Yêu cầu từ khách hàng</h1>
            
        </div>
    </main>

    <script src="/js/app.js"></script>
</body>

</html>