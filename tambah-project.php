
<?php
// 1. Wajib dipanggil paling atas untuk mengaktifkan $_SESSION
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $teknologi = $_POST['teknologi'] ?? '';
    $tautan = $_POST['tautan'] ?? '';
    $dibuatPada = $_POST['dibuat_pada'] ?? '';

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

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<main style="padding: 20px;">
    <h1>Tambah Project Baru</h1>
    <p><a href="dashboard-project.php">← Kembali ke Dashboard</a></p>

    <form method="post" style="max-width: 500px;">
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Judul Project</label>
            <input type="text" name="judul" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Deskripsi</label>
            <textarea name="deskripsi" rows="4" required style="width: 100%; padding: 8px;"></textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Teknologi</label>
            <input type="text" name="teknologi" placeholder="Contoh: PHP, MySQL" style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Tautan (Link)</label>
            <input type="url" name="tautan" placeholder="https://..." style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Tanggal Dibuat</label>
            <input type="date" name="dibuat_pada" required style="padding: 8px;">
        </div>

        <button type="submit" style="padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px;">Simpan Project</button>
    </form>
</main>

<?php
include 'layout/footer.php';
?>