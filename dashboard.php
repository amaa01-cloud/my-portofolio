<?php
include 'cek_session.php';
include 'layout/header.php';
include 'layout/sidebar.php';

?>



 <main class="main-content">
            <div class="decor one">🌸</div>
            <div class="decor two">✦</div>
            <div class="decor three">♡</div>
            <div class="decor four">✧</div>

            <div class="dashboard-card">
                <div class="icon">🌷</div>
                <p class="small-text">LOGIN BERHASIL ♡</p>
                <h1>Selamat, kamu berhasil login!</h1>
                <p class="message">
                    Selamat datang, 
                    <span class="username">
                        <?= htmlspecialchars($_SESSION["username"]); ?>
                    </span>
                    ✨
                </p>
                <div class="action-buttons">
                    <a href="index.html" class="portfolio-button">
                        Masuk ke Portfolio →
                    </a>
                    <a href="logout.php" class="logout-button">
                        Logout
                    </a>
                </div>
            </div>
        </main>




<?php
include 'layout/footer.php';

?>