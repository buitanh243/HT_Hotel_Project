<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: relative;
            top: 0;
            z-index: 1000;
            font-size: larger;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        nav ul {
            display: flex;
            flex-direction: row;
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            padding: 5px 10px;
            color: #fff;
            text-decoration: none;
        }

        nav ul li a:hover {
            color: rgb(126, 137, 148);
            border: rgb(126, 137, 148) 1px solid;
        }

        .logout {
            background-color: red;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            color: #fff;
        }

        .logout:hover {
            background-color: rgb(126, 137, 148);
            color: #fff;
            border: none;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div>
                <p style="color: red; font-size: larger; font-weight: 900;  " >HT Hotel Manager</p>
            </div>
            <ul>
                <li>
                    <a href="">Thống kê doanh thu</a>
                    <a href="">Thống kê danh sách phòng đã đặt</a>
                    <a href="">Thống kê danh sách phòng trống</a>
                </li>
                <li>
                   <form class="form-lg"  action="./Xuly/logout.php" method="POST">
                        <button class="logout" href="">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
</body>
</html> 
