<?php
require 'cek_session.php';
require_once __DIR__ . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id) {
        $stmt = $pdo->prepare('DELETE FROM projects WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}

// Kembalikan ke halaman dashboard setelah selesai
header('Location: dashboard-project.php');
exit;