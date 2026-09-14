<?php

session_start();

if (
    !isset($_SESSION["login"]) ||
    $_SESSION["login"] !== true
) {

    header("Location: login.php?required=1");
    exit;

}

$username = $_SESSION["username"] ?? "Reyya";

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Dashboard — Reyya</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 20px;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            color: #555d63;

            overflow: hidden;

            background:
                radial-gradient(
                    circle at 10% 15%,
                    #e4f1f8,
                    transparent 31%
                ),
                radial-gradient(
                    circle at 90% 85%,
                    #f1e3dc,
                    transparent 31%
                ),
                #f8fbfd;
        }


        /* dekorasi */

        .decor {
            position: fixed;
            z-index: 1;

            pointer-events: none;
        }

        .decor.one {
            top: 12%;
            left: 10%;

            color: #a3bec8;
            font-size: 28px;

            animation:
                float 4s ease-in-out infinite;
        }

        .decor.two {
            top: 18%;
            right: 12%;

            color: #c7a99d;
            font-size: 23px;

            animation:
                sparkle 3s ease-in-out infinite;
        }

        .decor.three {
            bottom: 14%;
            left: 13%;

            color: #9fb9c3;
            font-size: 27px;

            animation:
                float 5s ease-in-out infinite;
        }

        .decor.four {
            bottom: 18%;
            right: 12%;

            color: #c5a99d;
            font-size: 24px;

            animation:
                sparkle 4s ease-in-out infinite;
        }


        @keyframes float {

            0%,100% {
                transform:
                    translateY(0);
            }

            50% {
                transform:
                    translateY(-10px);
            }

        }


        @keyframes sparkle {

            0%,100% {
                opacity: .3;
                transform: scale(1);
            }

            50% {
                opacity: .9;
                transform: scale(1.15);
            }

        }


        /* card */

        .dashboard-card {
            width: 100%;
            max-width: 430px;

            padding: 42px 30px;

            position: relative;
            z-index: 2;

            text-align: center;

            background:
                rgba(255,255,255,.94);

            border:
                1px solid #dfe8eb;

            border-radius: 25px;

            box-shadow:
                0 20px 55px
                rgba(73,94,104,.13);
        }


        .icon {
            width: 68px;
            height: 68px;

            margin:
                0 auto 15px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #e1eff5,
                    #f0e2da
                );

            font-size: 30px;
        }


        .small-text {
            color: #7896a4;

            font-size: 10px;

            font-weight: bold;
        }


        h1 {
            margin-top: 7px;

            color: #4d565c;

            font-size: 27px;

            line-height: 1.25;
        }


        .message {
            margin-top: 8px;

            color: #858b8f;

            font-size: 11px;
        }


        .username {
            color: #7695a4;

            font-weight: bold;
        }


        .portfolio-button {

            display: inline-block;

            margin-top: 22px;

            padding: 11px 18px;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #8eafbb,
                    #b9a494
                );

            color: white;

            text-decoration: none;

            font-size: 11px;

            font-weight: bold;

            transition: .2s;

        }


        .portfolio-button:hover {

            transform:
                translateY(-2px);

        }


        .logout-button {

            display: block;

            margin-top: 11px;

            color: #8a7480;

            text-decoration: none;

            font-size: 10px;

        }


        .footer {

            margin-top: 20px;

            color: #a0a6a9;

            font-size: 9px;

        }


        /* falling */

        .falling-item {

            position: fixed;

            top: -40px;

            z-index: 1;

            pointer-events: none;

            opacity: .42;

            animation:
                fallingMove linear forwards;

        }


        @keyframes fallingMove {

            0% {

                transform:
                    translate3d(
                        0,
                        -40px,
                        0
                    )
                    rotate(0);

                opacity: 0;

            }

            10% {

                opacity: .5;

            }

            50% {

                transform:
                    translate3d(
                        20px,
                        50vh,
                        0
                    )
                    rotate(180deg);

            }

            100% {

                transform:
                    translate3d(
                        -20px,
                        110vh,
                        0
                    )
                    rotate(360deg);

                opacity: 0;

            }

        }

    </style>

</head>

<body>


    <!-- dekorasi -->

    <div class="decor one">
        🌸
    </div>

    <div class="decor two">
        ✦
    </div>

    <div class="decor three">
        ♡
    </div>

    <div class="decor four">
        ✧
    </div>


    <!-- dashboard -->

    <div class="dashboard-card">

        <div class="icon">
            🌷
        </div>

        <p class="small-text">
            LOGIN BERHASIL ♡
        </p>

        <h1>
            Selamat, kamu berhasil login!
        </h1>

        <p class="message">

            Selamat datang,
            <span class="username">
                <?= htmlspecialchars($username); ?>
            </span>
            ✨

        </p>


        <a
            href="index.html"
            class="portfolio-button">

            Masuk ke Portfolio →

        </a>


        <a
            href="logout.php"
            class="logout-button">

            Logout

        </a>


        <p class="footer">
            Made with ♡ by Reyya
        </p>

    </div>


    <!-- bunga jatuh -->

    <script>

        const fallingTypes = [
            "🌸",
            "❀",
            "✿",
            "♡",
            "✦",
            "✧"
        ];


        function createFallingItem() {

            const item =
                document.createElement("span");

            item.className =
                "falling-item";

            item.textContent =
                fallingTypes[
                    Math.floor(
                        Math.random() *
                        fallingTypes.length
                    )
                ];

            item.style.left =
                Math.random() *
                100 +
                "vw";

            item.style.fontSize =
                (
                    9 +
                    Math.random() * 12
                ) +
                "px";

            const duration =
                7 +
                Math.random() * 7;

            item.style.animationDuration =
                duration +
                "s";

            document.body.appendChild(
                item
            );

            setTimeout(
                function () {
                    item.remove();
                },
                (duration + 2) * 1000
            );

        }


        setInterval(
            createFallingItem,
            700
        );


        for (
            let i = 0;
            i < 8;
            i++
        ) {

            setTimeout(
                createFallingItem,
                i * 300
            );

        }

    </script>

</body>

</html>