<?php 
    include_once __DIR__ . "/../../connect/connect.php";
    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM taikhoan WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row;
        header('Location: ./../index.php');
        }else{
            header('Location: popup.php');
        }
    }
?>