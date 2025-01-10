<style>
    footer {
        background-color: #343a40;
        display: grid;
        grid-template-areas: "address social logo";
        color: white;
    }

    .address {
        grid-area: address;
        padding: 20px;
        justify-content: center;
    }

    .address i {
        font-size: 30px;
        color: red;
    }

    .social-list {
        padding-top: 50px;
        display: flex;
        color: white;
        grid-area: social;
        justify-content: center;
        height: 300px;
        align-items: center;
    }

    .social-list a {
        color: white;
        font-size: 30px;
        height: 30px;
        margin: 30px;
    }


    .map_canvas {
        padding-top: 20px;
    }

    .map_canvas iframe {
        width: 100%;
        height: 300px;
    }

    .ft-img {
        display: flex;
        justify-content: center;
        grid-area: logo;
        align-items: center;
        flex-direction: column;
    }

    .ft-img p {
        font-size: 20px;
        font-weight: bold;
    }

    .ft-img img {
        width: 200px;
        height: 200px;
        margin: 20px;
    }
</style>