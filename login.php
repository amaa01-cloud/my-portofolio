<?php
session_start();

$error = "";
$warning = "";

/*
|--------------------------------------------------------------------------
| Warning jika user mencoba masuk tanpa login
|--------------------------------------------------------------------------
*/

if (
    isset($_GET["required"]) &&
    $_GET["required"] === "1"
) {
    $warning = "⚠️ Silakan login terlebih dahulu";
}


/*
|--------------------------------------------------------------------------
| Proses Login
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    // Login sederhana tanpa database
    $usernameBenar = "reyya";
    $passwordBenar = "12345";

    if (
        $username === $usernameBenar &&
        $password === $passwordBenar
    ) {

        session_regenerate_id(true);

        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;

        header("Location: dashboard.php");
        exit;

    } else {

        $error = "Username atau password salah.";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login — Reyya</title>

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
                linear-gradient(
                    135deg,
                    #f8fbfd,
                    #faf5f2
                );
        }


        /* =====================================
           DEKORASI SUDUT
        ===================================== */

        .decor {
            position: fixed;
            z-index: 1;

            pointer-events: none;
            user-select: none;
        }

        .decor.one {
            top: 12%;
            left: 10%;

            color: #a3bec8;
            font-size: 28px;

            animation:
                floatOne 4s ease-in-out infinite;
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
                floatTwo 5s ease-in-out infinite;
        }

        .decor.four {
            bottom: 18%;
            right: 12%;

            color: #c5a99d;
            font-size: 24px;

            animation:
                sparkle 4s ease-in-out infinite;
        }


        @keyframes floatOne {

            0%, 100% {
                transform:
                    translateY(0)
                    rotate(0deg);
            }

            50% {
                transform:
                    translateY(-9px)
                    rotate(6deg);
            }

        }


        @keyframes floatTwo {

            0%, 100% {
                transform:
                    translateY(0);
            }

            50% {
                transform:
                    translateY(-11px);
            }

        }


        @keyframes sparkle {

            0%, 100% {
                opacity: .3;
                transform: scale(1);
            }

            50% {
                opacity: .9;
                transform: scale(1.15);
            }

        }


        /* =====================================
           LOGIN CARD
        ===================================== */

        .login-card {
            width: 100%;
            max-width: 410px;

            padding: 38px 32px;

            position: relative;
            z-index: 2;

            background:
                rgba(255,255,255,.93);

            border:
                1px solid #dfe8eb;

            border-radius: 25px;

            box-shadow:
                0 20px 55px
                rgba(73,94,104,.13);

            backdrop-filter: blur(12px);

            animation:
                cardAppear .7s ease;
        }


        @keyframes cardAppear {

            from {
                opacity: 0;
                transform:
                    translateY(18px)
                    scale(.98);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0)
                    scale(1);
            }

        }


        /* =====================================
           ICON
        ===================================== */

        .login-icon {
            width: 64px;
            height: 64px;

            margin:
                0 auto 13px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #e1eef4,
                    #f0e2da
                );

            font-size: 29px;
        }


        /* =====================================
           TEXT
        ===================================== */

        .welcome-text {
            text-align: center;

            color: #7896a4;

            font-size: 11px;
            font-weight: bold;
        }

        .login-card h1 {
            margin-top: 4px;

            text-align: center;

            color: #4d565c;

            font-size: 29px;
        }

        .description {
            margin-top: 6px;

            text-align: center;

            color: #858b8f;

            font-size: 11px;
        }


        /* =====================================
           WARNING
        ===================================== */

        .warning-message {
            margin-top: 17px;

            padding: 10px 12px;

            border-radius: 9px;

            background: #fff4df;

            border:
                1px solid #f0dfbc;

            color: #997c4b;

            text-align: center;

            font-size: 10px;
        }


        /* =====================================
           ERROR
        ===================================== */

        .error-message {
            margin-top: 10px;

            padding: 10px 12px;

            border-radius: 9px;

            background: #f8e8e9;

            color: #b76f79;

            text-align: center;

            font-size: 10px;
        }


        /* =====================================
           FORM
        ===================================== */

        form {
            margin-top: 23px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;

            margin-bottom: 6px;

            color: #60676d;

            font-size: 11px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;

            padding: 12px 13px;

            border:
                1px solid #dce5e8;

            border-radius: 10px;

            outline: none;

            background: #fcfdfe;

            color: #4e565a;

            font-size: 12px;

            transition: .2s;
        }

        .form-group input::placeholder {
            color: #adb5b9;
        }

        .form-group input:focus {
            border-color: #9bb7c3;

            background: white;

            box-shadow:
                0 0 0 3px
                rgba(145,174,187,.12);
        }


        /* =====================================
           LOGIN BUTTON
        ===================================== */

        .login-button {
            width: 100%;

            padding: 12px;

            border: none;

            border-radius: 11px;

            background:
                linear-gradient(
                    135deg,
                    #8eafbb,
                    #b9a494
                );

            color: white;

            font-size: 12px;
            font-weight: bold;

            cursor: pointer;

            box-shadow:
                0 7px 18px
                rgba(99,127,139,.15);

            transition: .2s;
        }

        .login-button:hover {
            transform: translateY(-2px);
        }

        .login-button:active {
            transform: translateY(0);
        }


        /* =====================================
           FOOTER
        ===================================== */

        .footer-text {
            margin-top: 21px;

            text-align: center;

            color: #a0a6a9;

            font-size: 9px;
        }


        /* =====================================
           BUNGA JATUH
        ===================================== */

        .falling-item {
            position: fixed;

            top: -40px;

            z-index: 1;

            pointer-events: none;
            user-select: none;

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
                    rotate(0deg);

                opacity: 0;
            }

            10% {
                opacity: .5;
            }

            30% {
                transform:
                    translate3d(
                        20px,
                        30vh,
                        0
                    )
                    rotate(80deg);
            }

            55% {
                transform:
                    translate3d(
                        -18px,
                        55vh,
                        0
                    )
                    rotate(170deg);
            }

            80% {
                transform:
                    translate3d(
                        22px,
                        80vh,
                        0
                    )
                    rotate(260deg);
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


        /* =====================================
           MOBILE
        ===================================== */

        @media (max-width: 500px) {

            .login-card {
                padding: 31px 22px;
                border-radius: 21px;
            }

            .login-card h1 {
                font-size: 25px;
            }

            .decor.one {
                left: 4%;
            }

            .decor.two {
                right: 5%;
            }

            .decor.three {
                left: 5%;
            }

            .decor.four {
                right: 5%;
            }

        }

    </style>

</head>


<body>


    <!-- DEKORASI -->

    <div class="decor one">
        🌸
    </div>

    <div class="decor two">
        ✦
    </div>

    <div class="decor three">
        ✿
    </div>

    <div class="decor four">
        ✧
    </div>


    <!-- LOGIN -->

    <div class="login-card">

        <div class="login-icon">
            🌙
        </div>


        <p class="welcome-text">
            Welcome back ♡
        </p>


        <h1>
            Hello, Reyya!
        </h1>


        <p class="description">
            Login untuk masuk ke dashboard.
        </p>


        <!-- WARNING BELUM LOGIN -->

        <?php if ($warning !== ""): ?>

            <div class="warning-message">

                <?= htmlspecialchars($warning); ?>

            </div>

        <?php endif; ?>


        <!-- ERROR LOGIN -->

        <?php if ($error !== ""): ?>

            <div class="error-message">

                <?= htmlspecialchars($error); ?>

            </div>

        <?php endif; ?>


        <!-- FORM -->

        <form
            method="POST"
            action="login.php">


            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username"
                    value="<?= htmlspecialchars($_POST["username"] ?? ""); ?>"
                    autocomplete="username"
                    required>

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required>

            </div>


            <button
                type="submit"
                class="login-button">

                Login ✨

            </button>


        </form>


        <p class="footer-text">
            Made with ♡ by Reyya
        </p>

    </div>


    <!-- FALLING DECORATION -->

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
                (duration + 2) *
                1000
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