<!DOCTYPE html>
<html lang="en">
<?php
include_once __DIR__ . "/../../connect/connect.php";
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
    include_once __DIR__ . "/../bocuc/head.php";

    include_once __DIR__ . "/../../connect/connect.php";

    $sql = "SELECT phong_id,phong_ten,status FROM phong;";

    $result = mysqli_query($conn, $sql);

    $arrP = [];

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $arrP[] = array(
            'phong_id' => $row['phong_id'],
            'phong_ten' => $row['phong_ten'],
            'status' => $row['status']
        );
    }
    ?>

    <main>
        <?php
        include_once __DIR__ . "/../bocuc/head.php";
        include_once __DIR__ . "/../bocuc/sidebar.php";
        include_once __DIR__ . "/../css/phong/phong.php";

        ?>
        <div class="container">
            <h1>Danh sách phòng</h1>
            <div class="content">
                <?php
                $count = 0;
                foreach ($arrP as $p):
                    if ($count % 5 == 0): // Mở hàng mới sau mỗi 4 card
                        if ($count > 0) echo '</div>'; // Đóng hàng trước đó
                        echo '<div class="row">';
                    endif;
                    $cardClass = ($p['status'] == 'N') ? 'card' : 'card booked';
                ?>
                    <div class="<?= $cardClass ?>">
                        <div class="card-details">
                            <p class="text-title"><?= htmlspecialchars($p['phong_ten']) ?></p>
                            <p class="text-body">
                                <?= ($p['status'] == 'N') ? "Trống" : "Đã đặt" ?>
                            </p>
                            <a class="btn-delete" href="delete.php"><i class="fa-solid fa-trash"></i></a>
                        </div>
                        <a class="card-button" href="info_phong.php?phong_id=<?= $p['phong_id'] ?>">Xem chi tiết</a>
                    </div>
                <?php
                    $count++;
                endforeach;
                if ($count > 0) echo '</div>'; 
                ?>
                <button>
                    <a href="./add.php">Thêm phòng</a>
                </button>
            </div>
        </div>

    </main>

    <script src="/js/app.js"></script>
</body>

</html>