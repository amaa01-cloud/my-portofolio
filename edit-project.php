<?php
require 'cek_session.php';
require_once __DIR__ . '/config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: dashboard-project.php');
    exit;
}

// Ambil data project berdasarkan ID
$stmt = $pdo->prepare('SELECT * FROM projects WHERE id = :id');
$stmt->execute(['id' => $id]);
$project = $stmt->fetch();

if (!$project) {
    header('Location: dashboard-project.php');
    exit;
}

// Proses update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $teknologi = $_POST['teknologi'] ?? '';
    $tautan = $_POST['tautan'] ?? '';
    $dibuatPada = $_POST['dibuat_pada'] ?? date('Y-m-d');

    $updateStmt = $pdo->prepare(
        'UPDATE projects SET judul = :judul, deskripsi = :deskripsi, teknologi = :teknologi, tautan = :tautan, dibuat_pada = :dibuat_pada WHERE id = :id'
    );
    $updateStmt->execute([
        'judul' => $judul,
        'deskripsi' => $deskripsi,
        'teknologi' => $teknologi,
        'tautan' => $tautan,
        'dibuat_pada' => $dibuatPada,
        'id' => $id
    ]);

    header('Location: dashboard-project.php');
    exit;
}

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<main class="main-content">
    <div class="decor one">🌸</div>
    <div class="decor two">✦</div>
    <div class="decor three">♡</div>
    <div class="decor four">✧</div>

    <div class="project-section"
        style="width: 100%; max-width: 800px; background: #ffffff; padding: 30px; border-radius: 24px; box-shadow: 0 10px 30px rgba(255, 182, 193, 0.25); z-index: 2; margin-top: 20px;">
        <h2 style="font-size: 1.5rem; color: #2b2d42; margin-bottom: 20px;">Edit Project ✨</h2>

        <form method="post" action="">
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #2b2d42;">Judul
                    Project</label>
                <input type="text" name="judul" value="<?= htmlspecialchars($project['judul']) ?>" required
                    style="width: 100%; padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px; font-size: 0.95rem; outline: none;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #2b2d42;">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    style="width: 100%; padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px; font-size: 0.95rem; outline: none;"><?= htmlspecialchars($project['deskripsi']) ?></textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #2b2d42;">Teknologi</label>
                <input type="text" name="teknologi" value="<?= htmlspecialchars($project['teknologi']) ?>"
                    placeholder="Contoh: PHP, MySQL, CSS"
                    style="width: 100%; padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px; font-size: 0.95rem; outline: none;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #2b2d42;">Tautan
                    (Link)</label>
                <input type="url" name="tautan" value="<?= htmlspecialchars($project['tautan']) ?>"
                    placeholder="https://..."
                    style="width: 100%; padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px; font-size: 0.95rem; outline: none;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #2b2d42;">Tanggal
                    Dibuat</label>
                <input type="date" name="dibuat_pada" value="<?= htmlspecialchars($project['dibuat_pada']) ?>" required
                    style="width: 100%; padding: 10px; border: 1px solid #ffe6ea; border-radius: 8px; font-size: 0.95rem; outline: none;">
            </div>

            <div style="display: flex; align-items: center; gap: 15px;">
                <button type="submit"
                    style="background: #ff758f; color: white; border: none; padding: 10px 20px; border-radius: 12px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 12px rgba(255, 117, 143, 0.3);">Simpan
                    Perubahan</button>
                <a href="dashboard-project.php"
                    style="color: #6c757d; text-decoration: none; font-weight: 600; font-size: 0.95rem;">Batal</a>
            </div>
        </form>
    </div>
</main>

<?php
include 'layout/footer.php';
?>