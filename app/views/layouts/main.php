<?php
$user = $user ?? [
    'nama' => 'Aria Sastra',
    'predikat' => 'Pembaca Setia',
    'level' => 12,
    'total_halaman' => 4850,
];
$activePage = $activePage ?? 'dashboard';
$initials = 'AS';
if (!empty($user['nama'])) {
    $parts = preg_split('/\s+/', trim($user['nama']));
    $initials = strtoupper(substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle ?? 'ReadTrack') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= e(asset_url('css/style.css')) ?>">
</head>
<body class="app-body">
    <div class="app-shell">
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

        <aside class="sidebar" id="appSidebar" aria-label="Navigasi Utama">
            <div class="sidebar-top">
                <a href="<?= e(page_url('dashboard')) ?>" class="sidebar-brand">
                    <?php
                    $badgeSize = 'sm';
                    require APP_PATH . '/views/partials/brand_logo.php';
                    ?>
                    <span class="sidebar-brand-text">ReadTrack</span>
                </a>

                <nav class="sidebar-nav">
                    <a href="<?= e(page_url('dashboard')) ?>" class="nav-item <?= $activePage === 'dashboard' ? 'is-active' : '' ?>">
                        <svg class="nav-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                            <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                            <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                            <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="<?= e(page_url('koleksi')) ?>" class="nav-item <?= $activePage === 'koleksi' ? 'is-active' : '' ?>">
                        <svg class="nav-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 19V5"/>
                            <path d="M9 19V5"/>
                            <path d="M14 5l4 14"/>
                            <path d="M19 5l1.5 14"/>
                        </svg>
                        <span>Koleksi Buku</span>
                    </a>

                    <a href="<?= e(page_url('sedang-dibaca')) ?>" class="nav-item <?= $activePage === 'sedang-dibaca' ? 'is-active' : '' ?>">
                        <svg class="nav-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                        </svg>
                        <span>Sedang Dibaca</span>
                    </a>

                    <a href="<?= e(page_url('riwayat')) ?>" class="nav-item <?= $activePage === 'riwayat' ? 'is-active' : '' ?>">
                        <svg class="nav-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="9"/>
                            <polyline points="12 7 12 12 15.5 14"/>
                        </svg>
                        <span>Riwayat Membaca</span>
                    </a>
                </nav>
            </div>

            <div class="sidebar-footer">
                <div class="user-profile-box">
                    <div class="user-avatar" aria-hidden="true"><?= e($initials) ?></div>
                    <div class="user-meta">
                        <div class="user-name"><?= e($user['nama']) ?></div>
                        <div class="user-role"><?= e($user['predikat']) ?></div>
                    </div>
                    <a href="<?= e(page_url('login')) ?>" class="logout-icon-btn" title="Keluar / Halaman Login" aria-label="Keluar ke halaman Login">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                    </a>
                </div>
            </div>
        </aside>

        <div class="main-area">
            <div class="mobile-topbar">
                <button type="button" class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Buka menu navigasi">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <line x1="3" y1="12" x2="21" y2="12"/>
                        <line x1="3" y1="18" x2="21" y2="18"/>
                    </svg>
                </button>
                <span class="mobile-brand-title">ReadTrack</span>
                <span class="level-pill level-pill-sm">Lv <?= (int) $user['level'] ?></span>
            </div>

            <main class="page-content">
                <?= $content ?>
            </main>
        </div>
    </div>

    <div id="rt-toast" class="rt-toast" role="status" aria-live="polite"></div>
    <script src="<?= e(asset_url('js/app.js')) ?>"></script>
</body>
</html>
