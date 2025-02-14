<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .cube-loader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotateX(-30deg);
            transform-style: preserve-3d;
            animation: animate 2s linear infinite;
            display: none;
            z-index: 9999;
        }

        @keyframes animate {
            0% {
                transform: translate(-50%, -50%) rotateX(-30deg) rotateY(0);
            }

            100% {
                transform: translate(-50%, -50%) rotateX(-30deg) rotateY(360deg);
            }
        }

        .cube-loader .cube-wrapper {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            transform-style: preserve-3d;
        }

        .cube-loader .cube-wrapper .cube-span {
            position: absolute;
            width: 100%;
            height: 100%;
            transform: rotateY(calc(90deg * var(--i))) translateZ(37.5px);
            background: linear-gradient(to bottom,
                    hsl(330, 3.13%, 25.1%) 0%,
                    hsl(176.63, 48.32%, 43.88%) 27.9%,
                    hsl(176.88, 96.24%, 57.59%) 96.3%);
        }

        .cube-top {
            position: absolute;
            width: 75px;
            height: 75px;
            background: hsl(330, 3.13%, 25.1%) 0%;
            transform: rotateX(90deg) translateZ(37.5px);
            transform-style: preserve-3d;
        }

        .cube-top::before {
            content: '';
            position: absolute;
            width: 75px;
            height: 75px;
            background: hsl(176.61, 42.28%, 40.7%) 19.6%;
            transform: translateZ(-90px);
            filter: blur(10px);
            box-shadow: 0 0 10px #323232,
                0 0 20px hsl(176.61, 42.28%, 40.7%) 19.6%,
                0 0 30px #323232,
                0 0 40px hsl(176.61, 42.28%, 40.7%) 19.6%;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:  rgba(255, 255, 255, 0.8);
            display: none; /* Chỉ hiển thị khi đang tải */
            z-index: 9998;
        }
    </style>
</head>

<body>
    <div class="loading-overlay"></div>
    <div class="cube-loader" id="loader">
        <div class="cube-top"></div>
        <div class="cube-wrapper">
            <span style="--i:0" class="cube-span"></span>
            <span style="--i:1" class="cube-span"></span>
            <span style="--i:2" class="cube-span"></span>
            <span style="--i:3" class="cube-span"></span>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const loader = document.getElementById("loader");
            const overlay = document.querySelector(".loading-overlay");

            loader.style.display = "block";
            overlay.style.display = "block"; // Hiển thị overlay

            window.addEventListener("load", function () {
                loader.style.display = "none";
                overlay.style.display = "none"; // Ẩn overlay
            });
        });
    </script>
</body>

</html>
