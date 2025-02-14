<style>
    /* From Uiverse.io by alexruix */

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 10px;
        width: 100%;
    }



    .card {
        margin: 30px;
        width: 100px;
        height: 130px;
        border-radius: 20px;
        background: #f5f5f5;
        position: relative;
        padding: 1.8rem;
        border: 2px solid #c3c6ce;
        transition: 0.5s ease-out;
        overflow: visible;
    }

    .booked {
            background-color: #f8d7da;
            border-color: #f5c6cb;
    }

    .card-details {
        color: black;
        height: 100%;
        gap: .5em;
        display: grid;
        place-content: center;
    }

    .btn-delete {
        color: red;
        text-decoration: none;
        font-size: 1.2rem;
        position: absolute;
        top: 0;
        right: 0;
        padding: .5rem;
        transition: 0.3s ease-out;
    }
    .card-button {
        text-align: center;
        text-decoration: none;
        transform: translate(-50%, 125%);
        width: 60%;
        border-radius: 1rem;
        border: none;
        background-color: #008bf8;
        color: #fff;
        font-size: 1rem;
        padding: .5rem 1rem;
        position: absolute;
        left: 50%;
        bottom: 0;
        opacity: 0;
        transition: 0.3s ease-out;
    }

    .text-body {
        text-align: center;
        font-size: 1.5em;
        color: rgb(134, 134, 134);
    }

    /*Text*/
    .text-title {
        font-size: 2em;
        font-weight: bold;
    }

    /*Hover*/
    .card:hover {
        border-color: #008bf8;
        box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
    }

    .card:hover .card-button {
        transform: translate(-50%, 50%);
        opacity: 1;
    }
</style>