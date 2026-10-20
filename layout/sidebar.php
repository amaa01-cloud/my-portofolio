<?php
// 1. Ambil nama file dari halaman yang sedang aktif di browser
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- ========================================== -->
<!-- KODE TENGAH: SIDEBAR & MAIN CONTENT        -->
<!-- ========================================== -->
<div class="dashboard-wrapper">
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-title">Menu Utama</div>
        <ul class="sidebar-menu">
            <!-- Akan aktif jika halaman yang dibuka dashboard.php -->
            <li>
                <a href="dashboard.php" class="<?= ($current_page == 'dashboard.php') ? 'active' : ''; ?>">🌸 Dashboard</a>
            </li>
            
            <!-- Akan aktif jika halaman yang dibuka index.html -->
            <li>
                <a href="index.html" class="<?= ($current_page == 'index.html') ? 'active' : ''; ?>">📁 Portfolio</a>
            </li>
            
            <!-- Akan aktif jika halaman yang dibuka dashboard-project.php ATAU tambah-project.php -->
            <li>
                <a href="dashboard-project.php" class="<?= ($current_page == 'dashboard-project.php' || $current_page == 'tambah-project.php') ? 'active' : ''; ?>">👤 Projects</a>
            </li>
            
            <!-- Logout tidak perlu active -->
            <li>
                <a href="logout.php">🚪 Logout</a>
            </li>
        </ul>
    </aside>