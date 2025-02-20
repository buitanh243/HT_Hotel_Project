<style>
    .img-1 {
        padding: 70px 0 50px 0;
        height: 500px;
        width: 100%;
    }

    .img-1 img {
        width: 100%;
        height: 100%;
    }

    .img-1 img {
        animation: kenburns-bottom-right 5s ease-out both;
    }

    @keyframes kenburns-bottom-right {
        0% {
            transform: scale(1) translate(0, 0);
            transform-origin: 84% 84%;
        }

        100% {
            transform: scale(1.25) translate(20px, 15px);
            transform-origin: right bottom;
        }
    }

    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        flex-direction: column;
        color: #333;
    }

    .content h1 {
        padding-top: 20px;
        animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    @keyframes text-pop-up-top {
        0% {
            transform: translateY(100%);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* === removing default button style ===*/
    .content h1 {
        margin: 0;
        height: auto;
        background: transparent;
        padding: 0;
        border: none;
        cursor: pointer;
    }

    /* button styling */
    .content h1 {
        --border-right: 6px;
        --text-stroke-color: rgba(52, 67, 142, 0.6);
        --animation-color: #37FF8B;
        --fs-size: 2em;
        letter-spacing: 3px;
        text-decoration: none;
        font-size: var(--fs-size);
        font-family: "Arial";
        position: relative;
        text-transform: uppercase;
        color: #343a40;
        -webkit-text-stroke: 1px var(--text-stroke-color);
    }

    /* this is the text, when you hover on button */
    .hover-text {
        position: absolute;
        box-sizing: border-box;
        content: attr(data-text);
        color: var(--animation-color);
        width: 0%;
        inset: 0;
        border-right: var(--border-right) solid var(--animation-color);
        overflow: hidden;
        transition: 0.5s;
        -webkit-text-stroke: 1px var(--animation-color);
    }

    /* hover */
    .content h1:hover .hover-text {
        width: 110%;
        filter: drop-shadow(0 0 23px var(--animation-color))
    }



    .content-1 {
        font-size: medium;
        -webkit-animation: tracking-in-expand 0.7s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
        animation: tracking-in-expand 0.7s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
    }

    @-webkit-keyframes tracking-in-expand {
        0% {
            letter-spacing: -0.5em;
            opacity: 0;
        }

        40% {
            opacity: 0.6;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes tracking-in-expand {
        0% {
            letter-spacing: -0.5em;
            opacity: 0;
        }

        40% {
            opacity: 0.6;
        }

        100% {
            opacity: 1;
        }
    }

    .content-1 p {
        font-size: 20px;
        color: #333;
    }

    .img-2 {
        margin-top: 30px;
        -webkit-animation: vibrate-1 0.3s linear infinite both;
        animation: vibrate-1 0.3s linear infinite both;
    }

    @-webkit-keyframes vibrate-1 {
        0% {
            -webkit-transform: translate(0);
            transform: translate(0);
        }

        20% {
            -webkit-transform: translate(-2px, 2px);
            transform: translate(-2px, 2px);
        }

        40% {
            -webkit-transform: translate(-2px, -2px);
            transform: translate(-2px, -2px);
        }

        60% {
            -webkit-transform: translate(2px, 2px);
            transform: translate(2px, 2px);
        }

        80% {
            -webkit-transform: translate(2px, -2px);
            transform: translate(2px, -2px);
        }

        100% {
            -webkit-transform: translate(0);
            transform: translate(0);
        }
    }

    @keyframes vibrate-1 {
        0% {
            -webkit-transform: translate(0);
            transform: translate(0);
        }

        20% {
            -webkit-transform: translate(-2px, 2px);
            transform: translate(-2px, 2px);
        }

        40% {
            -webkit-transform: translate(-2px, -2px);
            transform: translate(-2px, -2px);
        }

        60% {
            -webkit-transform: translate(2px, 2px);
            transform: translate(2px, 2px);
        }

        80% {
            -webkit-transform: translate(2px, -2px);
            transform: translate(2px, -2px);
        }

        100% {
            -webkit-transform: translate(0);
            transform: translate(0);
        }
    }

    .row {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
        width: 60%;
    }

    .col {
        text-align: center;
        flex: 1;
        margin: 10px;
    }

    .col i {
        font-size: 40px;
        color: #343a40;
        /* Màu icon */
        margin-bottom: 10px;
    }

    .col p {
        font-size: 18px;
        color: #333;
    }

    /* room */
    .room-product {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
        width: 100%;
    }



    .product {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80%;
        height: 500px;
    }

    /* card room */
    #card_room {
        scroll-margin-top: 100px;
    }

    .card_room {
        width: 600px;
        margin: 20px;
        position: relative;
        display: flex;
        flex-direction: column;
        background-color: #343a40;
        padding: 10px;
        border-radius: 6px;
        gap: 0.5rem;
        height: 350px;
    }

    .card_room a {
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        text-decoration: none;
        font-size: 1.2em;
        transition: 0.2s ease-in-out;
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
    }

    .card_form {
        position: relative;
        width: 100%;
        height: 15em;
        border-radius: 4px;
        transition: 0.2s ease-in-out;
        overflow: hidden;
    }

    .card_form img {
        width: 100%;
        height: 100%;
    }

    .card_form span {
        font-size: 1.5em;
        position: absolute;
        inset: 0;
        padding: 5px 10px;
        color: #fff;
        background-image: linear-gradient(to top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);
        opacity: 0;
        transition: all 0.2s ease-in-out;
    }

    .card_room:hover .card_form span,
    .card_room:hover .card_data span {
        opacity: 1;
    }

    .card_data {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card_data span {
        color: rgb(200, 206, 211);
        display: flex;
        align-items: center;
        font-size: 1.2em;
        transition: 0.2s ease-in-out;
        opacity: 0;
    }

    .text {
        display: flex;
        justify-content: center;
        flex-direction: column;
        color: white;
    }

    .text_m {
        font-size: 1.2em;
    }

    .text_s {
        margin-top: 10px;
        color: rgb(181, 185, 188);
        /* Adjusted to match the theme */
        font-size: 0.6em;
    }

    .cube {
        width: max-content;
        height: 10px;
        transition: all 0.2s;
        transform-style: preserve-3d;
    }

    .cube label {
        font-size: 16px;
    }

    .card_room:hover .cube {
        transform: rotateX(90deg);
    }

    .side {
        width: max-content;
        height: 1em;
        display: flex;
        justify-content: center;
        align-items: center;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: bold;
    }

    .top {
        transform: rotateX(-90deg) translate3d(0, 0, 0em);
    }

    .front {
        transform: translate3d(0, 0, 1em);
    }

    .sologan {
        margin: 100px 50px 100px 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .sologan p {
        font-size: 20px;
        color: #333;
        margin-left: 20px;
    }
</style>