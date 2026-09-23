<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Reyya</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        }

        html {
            height: 100%;
        }

        body {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            background-color: #fff0f3;
            color: #4a4a4a;
        }

        /* STYLES HEADER */
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 24px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(255, 182, 193, 0.3);
            z-index: 100;
            position: sticky;
            top: 0;
        }

        .left-header {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #d63384;
            cursor: pointer;
            padding: 4px;
            line-height: 1;
        }

        .top-navbar .logo {
            font-weight: 700;
            font-size: 1.15rem;
            color: #d63384;
            letter-spacing: -0.3px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
        }

        .btn-logout-small {
            text-decoration: none;
            color: #ff6b81;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 14px;
            border: 1px solid #ff6b81;
            border-radius: 20px;
            transition: all 0.25s ease;
        }

        .btn-logout-small:hover {
            background-color: #ff6b81;
            color: #ffffff;
        }

        /* STYLES SIDEBAR & LAYOUT TENGAH */
        .dashboard-wrapper {
            display: flex;
            flex: 1; 
            position: relative;
            width: 100%;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(2px);
            z-index: 140;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #ffffff;
            padding: 28px 20px;
            border-right: 1px solid #ffe6ea;
            z-index: 150;
            flex-shrink: 0;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: #b5838d;
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            color: #6c757d;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: #ffe6ea;
            color: #d63384;
            font-weight: 600;
        }

        .main-content {
            flex: 1;
            padding: 30px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .dashboard-card {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(255, 182, 193, 0.35);
            text-align: center;
            max-width: 440px;
            width: 100%;
            z-index: 2;
        }

        .dashboard-card .icon {
            font-size: 3.2rem;
            margin-bottom: 12px;
            line-height: 1;
        }

        .dashboard-card .small-text {
            font-size: 0.8rem;
            color: #ff758f;
            letter-spacing: 1.5px;
            font-weight: 700;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .dashboard-card h1 {
            font-size: 1.45rem;
            color: #2b2d42;
            margin-bottom: 10px;
            line-height: 1.35;
        }

        .dashboard-card .message {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 28px;
        }

        .dashboard-card .username {
            color: #d63384;
            font-weight: 700;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .portfolio-button,
        .logout-button {
            display: block;
            width: 100%;
            padding: 12px 20px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.25s ease;
            text-align: center;
        }

        .portfolio-button {
            background-color: #ff758f;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(255, 117, 143, 0.25);
        }

        .portfolio-button:hover {
            background-color: #ff4d6d;
            box-shadow: 0 6px 16px rgba(255, 77, 109, 0.35);
            transform: translateY(-1px);
        }

        .logout-button {
            background-color: #f8f9fa;
            color: #6c757d;
            border: 1px solid #dee2e6;
        }

        .logout-button:hover {
            background-color: #ffe6ea;
            color: #d63384;
            border-color: #ffe6ea;
        }

        .decor {
            position: absolute;
            font-size: 1.8rem;
            opacity: 0.5;
            user-select: none;
            pointer-events: none;
        }

        .decor.one { top: 10%; left: 8%; }
        .decor.two { top: 18%; right: 10%; }
        .decor.three { bottom: 15%; left: 12%; }
        .decor.four { bottom: 18%; right: 10%; }

        /* STYLES FOOTER */
        .main-footer {
            text-align: center;
            padding: 16px;
            background-color: #ffffff;
            border-top: 1px solid #ffe6ea;
            font-size: 0.85rem;
            color: #888;
            z-index: 10;
            margin-top: auto;
        }

        .falling-item {
            position: fixed;
            top: -30px;
            user-select: none;
            pointer-events: none;
            z-index: 9999;
            animation: fall linear infinite;
        }

        @keyframes fall {
            to {
                transform: translateY(108vh) rotate(360deg);
            }
        }

        @media (max-width: 1024px) {
            .sidebar {
                width: 210px;
                padding: 24px 16px;
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .user-text {
                display: none;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                transform: translateX(-100%);
                box-shadow: 4px 0 20px rgba(0, 0, 0, 0.08);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                padding: 30px 16px;
            }

            .dashboard-card {
                padding: 30px 20px;
            }

            .dashboard-card h1 {
                font-size: 1.3rem;
            }

            .decor {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 480px) {
            .top-navbar {
                padding: 10px 16px;
            }

            .top-navbar .logo {
                font-size: 1rem;
            }

            .dashboard-card .icon {
                font-size: 2.8rem;
            }

            .dashboard-card h1 {
                font-size: 1.2rem;
            }

            .decor.one { top: 5%; left: 4%; }
            .decor.two { top: 8%; right: 5%; }
            .decor.three { bottom: 8%; left: 6%; }
            .decor.four { bottom: 10%; right: 5%; }
        }
    </style>
</head>
<body>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- ========================================== -->
    <!-- KODE PALING ATAS: HEADER                   -->
    <!-- ========================================== -->
    <header class="top-navbar">
        <div class="left-header">
            <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Toggle Navigation">☰</button>
            <div class="logo">
                ✨ Reyya's Workspace
            </div>
        </div>
        <div class="user-profile">
            <span class="user-text">Halo, <strong><?= htmlspecialchars($_SESSION["username"]); ?></strong></span>
            <a href="logout.php" class="btn-logout-small">Logout</a>
        </div>
    </header>