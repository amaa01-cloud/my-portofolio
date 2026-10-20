<?php
require 'cek_session.php';
require_once __DIR__ . '/config/database.php';

$stmt = $pdo->query('SELECT * FROM projects ORDER BY dibuat_pada DESC');
$projects = $stmt->fetchAll();

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<main class="main-content">
    <div class="decor one">🌸</div>
    <div class="decor two">✦</div>
    <div class="decor three">♡</div>
    <div class="decor four">✧</div>

    <div class="project-section" style="width: 100%; max-width: 1000px; background: #ffffff; padding: 30px; border-radius: 24px; box-shadow: 0 10px 30px rgba(255, 182, 193, 0.25); z-index: 2; margin-top: 20px;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="font-size: 1.5rem; color: #2b2d42; margin: 0;">Daftar Project ✨</h2>
            <a href="tambah-project.php" style="background: #ff758f; color: white; padding: 10px 18px; border-radius: 12px; text-decoration: none; font-size: 0.9rem; font-weight: 600; box-shadow: 0 4px 12px rgba(255, 117, 143, 0.3);">
                + Tambah Project
            </a>
        </div>

        <?php if (count($projects) === 0): ?>
            <p style="color: #6c757d; font-size: 0.95rem;">Belum ada project.</p>
        <?php else: ?>
            <div style="width: 100%; overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.9rem;">
                    <thead>
                        <tr style="background-color: #fff0f3; color: #d63384;">
                            <!-- Tambahkan Kolom Header ID -->
                            <th style="padding: 12px 16px; border-bottom: 2px solid #ffe6ea;">ID</th>
                            <th style="padding: 12px 16px; border-bottom: 2px solid #ffe6ea;">Judul</th>
                            <th style="padding: 12px 16px; border-bottom: 2px solid #ffe6ea;">Deskripsi</th>
                            <th style="padding: 12px 16px; border-bottom: 2px solid #ffe6ea;">Teknologi</th>
                            <th style="padding: 12px 16px; border-bottom: 2px solid #ffe6ea;">Tautan</th>
                            <th style="padding: 12px 16px; border-bottom: 2px solid #ffe6ea;">Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): ?>
                            <tr style="transition: background 0.2s;" onmouseover="this.style.backgroundColor='#fff9fa'" onmouseout="this.style.backgroundColor='transparent'">
                                <!-- Tampilkan Nilai ID dari Database -->
                                <td style="padding: 12px 16px; border-bottom: 1px solid #ffe6ea; font-weight: bold; color: #ff758f;"><?= htmlspecialchars($project['id']) ?></td>
                                <td style="padding: 12px 16px; border-bottom: 1px solid #ffe6ea; font-weight: 600; color: #2b2d42;"><?= htmlspecialchars($project['judul']) ?></td>
                                <td style="padding: 12px 16px; border-bottom: 1px solid #ffe6ea; color: #6c757d;"><?= htmlspecialchars($project['deskripsi']) ?></td>
                                <td style="padding: 12px 16px; border-bottom: 1px solid #ffe6ea; color: #6c757d;"><?= htmlspecialchars($project['teknologi']) ?></td>
                                <td style="padding: 12px 16px; border-bottom: 1px solid #ffe6ea;">
                                    <a href="<?= htmlspecialchars($project['tautan']) ?>" target="_blank" style="color: #ff758f; font-weight: 600; text-decoration: none;">Lihat →</a>
                                </td>
                                <td style="padding: 12px 16px; border-bottom: 1px solid #ffe6ea; color: #888;"><?= htmlspecialchars($project['dibuat_pada']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
include 'layout/footer.php';
?>