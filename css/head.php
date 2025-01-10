<style>
    header {
        background-color: #f8f9fa;
        /* Màu nền nhẹ nhàng */
        padding: 10px 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Thêm bóng đổ nhẹ */
        position: fixed;
        top: 0;
        z-index: 1000;
        width: 100%;
        height: 60px;
        opacity: 0.9;
    }

    .logo {
        display: flex;
        align-items: center;
    }

    .logo img {
        float: left;
        margin-left: 20px;
        width: 60px;
    }

    .logo p {
        float: left;
        margin-top: 20px;
        margin-left: 10px;
        font-size: 24px;
        font-weight: bold;
        color: #343a40;
        /* Màu chữ đậm */
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }

    .menu {
        display: flex;
        gap: 20px;
    }

    .menu a {
        text-decoration: none;
        color: #343a40;
        /* Màu chữ đậm */
        font-weight: 600;
        height: 10px;
        padding: 10px 15px;
        transition: background-color 0.3s, color 0.3s;
        /* align-items: center; */
    }

    .menu a:hover {
        background-color: #343a40;
        /* Màu nền khi hover */
        color: #ffffff;
        /* Màu chữ khi hover */
    }

    /* .search {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .search input {
        width: 300px;
        height: 35px;
        border-radius: 5px;
        border: 1px solid rgb(62, 67, 72);
        padding: 0 10px;
    }

    .search button {
        height: 35px;
        border-radius: 5px;
        border: 1px solid #343a40;
        background-color: #343a40;
        color: white;
        padding: 0 15px;
        transition: background-color 0.3s, color 0.3s;
    }

    .search button:hover {
        background-color: #495057;
        color: #ffffff;
    } */

    .auth {
       display: flex;
       gap: 20px;
    }

    .auth a:hover {
        font-size: 20px;
    }

    .auth a {
        color: #343a40;
        /* Màu chữ đậm */
        font-size: 18px;
        transition: color 0.3s;
    }

    /* .cart a:hover, */
    .user a:hover,
    .auth a:hover {
        color: #495057;
        /* Màu chữ khi hover */
    }
</style>