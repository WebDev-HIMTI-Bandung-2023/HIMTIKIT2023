<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page not found</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <style>
        body {
            background-color: #0a1b39;
        }

        .bg {
            position: fixed;
            top: 50%;
            left: 50%;
            height: 1px;
            width: 1px;
            background-color: #296bcf;
            border-radius: 50%;
            box-shadow: -24vw -44vh 2px 2px #296bcf, 38vw -4vh 0px 0px #296bcf, -20vw -48vh 1px 2px #296bcf, -39vw 38vh 3px 1px #296bcf, -42vw -11vh 0px 3px #296bcf, 12vw 15vh 3px 3px #296bcf, 42vw 6vh 3px 2px #296bcf, -8vw 9vh 0px 2px #296bcf, 34vw -38vh 1px 0px #296bcf, -17vw 45vh 3px 1px #296bcf, 22vw -36vh 3px 2px #296bcf, -42vw 1vh 1px 0px #296bcf;
            animation: zoom 7s alternate infinite;
        }

        .main {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        lottie-player {
            width: 480px;
            margin-left: -180px;
        }

        h1 {
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            font-size: 3.5em;
            color: white;
            margin: 0;
        }

        h2 {
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            font-size: 2.5em;
            white-space: nowrap;
            color: white;
            margin: 0;
            margin-bottom: 25px;
        }

        .custom-btn {
            display: inline-block;
            outline: 0;
            border: 0;
            cursor: pointer;
            will-change: box-shadow, transform;
            background: radial-gradient(100% 100% at 100% 0%, #89E5FF 0%, #5468FF 100%);
            box-shadow: 0px 2px 4px rgb(45 35 66 / 40%), 0px 7px 13px -3px rgb(45 35 66 / 30%), inset 0px -3px 0px rgb(58 65 111 / 50%);
            padding: 0 32px;
            border-radius: 6px;
            color: #fff;
            height: 48px;
            font-size: 18px;
            text-shadow: 0 1px 0 rgb(0 0 0 / 40%);
            transition: box-shadow 0.15s ease, transform 0.15s ease;
        }

        .custom-btn:hover {
            box-shadow: 0px 4px 8px rgb(45 35 66 / 40%), 0px 7px 13px -3px rgb(45 35 66 / 30%), inset 0px -3px 0px #3c4fe0;
            transform: translateY(-2px);
        }

        .custom-btn:active {
            box-shadow: inset 0px 3px 7px #3c4fe0;
            transform: translateY(2px);
        }

        @media (min-width: 1367px) {
            lottie-player {
                margin: 0;
                width: 28vw;
            }

            h1 {
                font-size: 4vw;
            }

            h2 {
                font-size: 3vw;
            }

            .custom-btn {
                width: 22vw;
                height: 4vw;
                font-size: 2vw;
            }
        }

        @media (max-width: 800px) {
            .main {
                flex-direction: column;
                text-align: center;
            }

            lottie-player {
                width: 300px;
                margin: 0;
                margin-bottom: -50px;
            }

            h1,
            h2 {
                font-size: 2em;
            }
        }

        @media (max-width: 300px) {
            lottie-player {
                width: 90vw;
                margin: 0;
            }

            h1,
            h2 {
                font-size: 10vw;
            }

            h1 {
                margin-top: -20px;
            }
        }

        @keyframes zoom {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.5);
            }
        }
    </style>
</head>

<body>
    <div class="bg"></div>

    <div class="main">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_XcpUTy.json" background="transparent"
            speed="1" loop autoplay>
        </lottie-player>

        <div class="text">
            <h1>Ooopss...</h1>
            <h2>Page Not Found</h2>
            <button class="custom-btn" onclick="window.location.href = '/'">Back to Homepage</button>
        </div>
    </div>
</body>

</html>
