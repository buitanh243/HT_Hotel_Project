<style>
    .container {
        width: 80%;
        background-color: #ffffff; 
        margin: 100px auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
    }

    .card-body {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .row {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .col-6 {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }
    
    .img-content img {
        width: 100%;
        border-radius: 10px;
    }

    .img-content {
        display: grid;
        grid-template-areas: "img-1 img-2"
                             "img-3 img-3";
    }

    .img-1, .img-2, .img-3 {
        width: 300px;
        height: 1000px;
    }

    .img-1 {
        grid-area: img-1;
        height: 100%;
    }

    .img-2 {
        grid-area: img-2;
        height: 100%;
    }

    .img-3 {
        height: 100%;
        width: 100%;
        grid-area: img-3;
    }

   

    h3 {
        font-size: 40px;
        color: #333; /* Darker text color */
        margin-bottom: 20px;
    }

    p {
        font-size: 20px;
        color: #666; /* Medium text color */
        margin-bottom: 20px;
    }

    .chitiet {
        display: flex;
        flex-direction: column;
        padding: 20px;
    }

    .thongtin {
        display: grid;
        grid-template-areas: "h3 h3"
                             "mota mota"
                             "gia soluong"
                             "btn-back btn";
        gap: 20px;
    }

    #mota {
        grid-area: mota;
    }

    #gia {
        grid-area: gia;
    }

    #soluong {
        grid-area: soluong;
    }

    .btn {
        grid-area: btn;
        text-decoration: none;
        background-color: #87cefa; 
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    .btn:hover {
        background-color: #4682b4; 
    }

    .btn-back {
        grid-area: btn-back;
        text-decoration: none;
        background-color: #87cefa; /* LightSkyBlue */
        color: white;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
    }

    .btn-back:hover {
        background-color: #4682b4; /* SteelBlue */
    }

    /* @media screen and (max-width: 768px) {
        .container {
            width: 100%;
            margin: 0;
        }

        .card, .card-body, .col-6 {
            width: 100%;
        }

        img {
            width: 100%;
            height: auto;
        }

        h3 {
            font-size: 20px;
        }

        p {
            font-size: 15px;
        }

        .thongtin {
            grid-template-areas: "h3 h3"
                                 "mota mota"
                                 "gia soluong"
                                 "btn-back btn";
        }
    } */

    .datphong i {
        font-size: 30px;
        color: #333; 
        padding: 20px;
    }

    .tongquan, .datphong {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .tongquan table {
        width: 100%;
        font-size: 20px;
        border-collapse: collapse;
    }

    .tongquan td, .tongquan th {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .tongquan tr:nth-child(even) {
        background-color: #f2f2f2; 
    }

    .tongquan tr:hover {
        background-color: #f1f1f1; 
    }

    .tongquan th {
        background-color: #4CAF50; 
        color: white;
        padding-top: 12px;
        padding-bottom: 12px;
    }

    #thongtin_datphong {
        scroll-margin-top: 100px;
    }

    .thongtin_datphong {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .thongtin_datphong div {
        margin: 20px;
    }

    .thongtin_datphong div h2 {
        font-size: 30px;
        color: #333; 
    }

    .thongtin_datphong div label {
        font-size: 20px;
        color: #333; 
    }

    .thongtin_datphong div input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #agree {
        width: 3%;
    }

</style>
