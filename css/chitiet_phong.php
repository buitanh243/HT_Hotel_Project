<style>
    .container {
        width: 80%;
        background-color: #f0f8ff; /* AliceBlue */
        margin: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
    }

    .card {
        width: 100%;
        background-color:rgb(244, 244, 240); 
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-body {
        width: 100%;
        /* background-color: #fafad2;  */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .row {
        width: 100%;
        background-color: #fafad2; /* LightGoldenRodYellow */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .col-6 {
        width: 50%;
        background-color: #fafad2; /* LightGoldenRodYellow */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    img {
        width: 100%;
        height: 100%;
    }

    h3 {
        font-size: 30px;
        color: #333; /* Darker text color */
    }

    p {
        font-size: 20px;
        color: #666; /* Medium text color */
    }

    .chitiet {
        display: flex;
        flex-direction: column;
    }

    .thongtin {
        display: grid;
        grid-template-areas: "h3 h3"
            "mota mota"
            "gia loai"
            "btn-back btn-back";
    }

    #mota {
        grid-area: mota;
    }

    #gia {
        grid-area: gia;
    }

    #loai {
        grid-area: loai;
    }

    .btn-back {
        grid-area: btn-back;
        text-decoration: none;
        background-color: #87cefa; /* LightSkyBlue */
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    .btn-back:hover {
        background-color: #4682b4; /* SteelBlue */
    }

    /* .btn {
        grid-area: btn;
        text-decoration: none;
        background-color: #87cefa; 
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    .btn:hover {
        background-color: #4682b4; 
    } */

    @media screen and (max-width: 768px) {
        .container {
            width: 100%;
            margin: 0;
        }

        .card, .card-body, .col-6 {
            width: 100%;
        }
        img {
            width: 100%;
            height: 100%;
        }

        h3 {
            font-size: 20px;
        }

        p {
            font-size: 15px;
        }

        .thongtin {
            display: grid;
            grid-template-areas: "h3 h3"
                "mota mota"
                "gia loai"
                "btn-back btn-back";
        }

        #mota {
            grid-area: mota;
        }

        #gia {
            grid-area: gia;
        }

        #loai {
            grid-area: loai;
        }

        .btn-back {
            grid-area: btn-back;
            text-decoration: none;
            background-color: #87cefa; /* LightSkyBlue */
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        /* .btn {
            grid-area: btn;
            text-decoration: none;
            background-color: #87cefa; 
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-back:hover {
            background-color: #4682b4; 
        } */
    }
</style>