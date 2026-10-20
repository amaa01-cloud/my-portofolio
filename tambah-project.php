<?php

// 1. Wajib dipanggil paling atas untuk mengaktifkan $_SESSION

if (session_status() === PHP_SESSION_NONE) {

    session_start();

}



require_once __DIR__ . '/config/database.php';



$errors = [];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $judul = trim($_POST['judul'] ?? '');

    $deskripsi = trim($_POST['deskripsi'] ?? '');

    $teknologi = trim($_POST['teknologi'] ?? '');

    $tautan = trim($_POST['tautan'] ?? '');

    $dibuatPada = trim($_POST['dibuat_pada'] ?? '');



    // Validasi

    if ($judul === '') {

        $errors[] = 'Judul wajib diisi.';

    }



    if ($dibuatPada === '') {

        $errors[] = 'Tanggal dibuat wajib diisi.';

    }



    // Jika tidak ada error, simpan ke database

    if (empty($errors)) {

        $stmt = $pdo->prepare(

            'INSERT INTO projects (judul, deskripsi, teknologi, tautan, dibuat_pada)

             VALUES (:judul, :deskripsi, :teknologi, :tautan, :dibuat_pada)'

        );



        $stmt->execute([

            'judul' => $judul,

            'deskripsi' => $deskripsi,

            'teknologi' => $teknologi,

            'tautan' => $tautan,

            'dibuat_pada' => $dibuatPada,

        ]);



        header('Location: dashboard-project.php');

        exit;

    }

}



include 'layout/header.php';

include 'layout/sidebar.php';

?>



<main class="main-content">

    <div class="project-section"
        style="width: 100%; max-width: 700px; background: #ffffff; padding: 30px; border-radius: 24px; box-shadow: 0 10px 30px rgba(255, 182, 193, 0.25); margin-top: 20px;">



        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">

            <h2 style="font-size: 1.5rem; color: #2b2d42; margin: 0;">Tambah Project Baru ✨</h2>

            <a href="dashboard-project.php" style="color: #ff758f; text-decoration: none; font-weight: 600;">←
                Kembali</a>

        </div>



        <!-- Pesan Error Validasi -->

        <?php if (!empty($errors)): ?>

            <div
                style="background-color: #ffe6ea; border: 1px solid #ff758f; padding: 12px 20px; border-radius: 12px; margin-bottom: 20px;">

                <ul style="color: #d63384; margin: 0; padding-left: 20px; font-size: 0.9rem;">

                    <?php foreach ($errors as $pesan): ?>

                        <li><?= htmlspecialchars($pesan) ?></li>

                    <?php endforeach; ?>

                </ul>

            </div>

        <?php endif; ?>



        <!-- Form Input -->

        <form method="post">

            <div style="margin-bottom: 15px;">

                <label style="display: block; font-weight: 600; color: #2b2d42; margin-bottom: 5px;">Judul Project
                </label>

                <input type="text" name="judul" value="<?= htmlspecialchars($judul ?? '') ?>"
                    style="width: 100%; padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px; box-sizing: border-box;">

            </div>



            <div style="margin-bottom: 15px;">

                <label style="display: block; font-weight: 600; color: #2b2d42; margin-bottom: 5px;">Deskripsi</label>

                <textarea name="deskripsi" rows="4"
                    style="width: 100%; padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px; box-sizing: border-box;"><?= htmlspecialchars($deskripsi ?? '') ?></textarea>

            </div>



            <div style="margin-bottom: 15px;">

                <label style="display: block; font-weight: 600; color: #2b2d42; margin-bottom: 5px;">Teknologi</label>

                <input type="text" name="teknologi" placeholder="Contoh: PHP, MySQL, Bootstrap"
                    value="<?= htmlspecialchars($teknologi ?? '') ?>"
                    style="width: 100%; padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px; box-sizing: border-box;">

            </div>



            <div style="margin-bottom: 15px;">

                <label style="display: block; font-weight: 600; color: #2b2d42; margin-bottom: 5px;">Tautan
                    (Link)</label>

                <input type="url" name="tautan" placeholder="https://..." value="<?= htmlspecialchars($tautan ?? '') ?>"
                    style="width: 100%; padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px; box-sizing: border-box;">

            </div>



            <div style="margin-bottom: 20px;">

                <label style="display: block; font-weight: 600; color: #2b2d42; margin-bottom: 5px;">Tanggal Dibuat
                </label>

                <input type="date" name="dibuat_pada" value="<?= htmlspecialchars($dibuatPada ?? '') ?>"
                    style="padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px;">

            </div>



            <button type="submit"
                style="background: #ff758f; color: white; padding: 12px 24px; border: none; border-radius: 12px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 12px rgba(255, 117, 143, 0.3);">

                Simpan Project

            </button>

        </form>
    </div>
</main>

<?php
include 'layout/footer.php';
?>