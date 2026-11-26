<?php
$radius = 48;
$circumference = 2 * M_PI * $radius;
$percent = max(0, min(100, (int) ($stats['persen_tahunan'] ?? 0)));
$dashOffset = $circumference * (1 - ($percent / 100));
?>

<header class="page-header">
    <div>
        <h1 class="page-title">Selamat Datang, <?= e($user['nama_panggilan']) ?>!</h1>
        <p class="page-subtitle">Berikut adalah ringkasan progres membacamu hari ini.</p>
    </div>

    <div class="header-actions">
        <div class="header-actions-top">
            <span class="level-pill">
                Level <?= (int) $user['level'] ?> &bull; <?= number_format((int) $user['total_halaman'], 0, ',', '.') ?> Halaman
            </span>
            <button type="button" class="btn btn-outline btn-sm" data-toast="Halaman Quick Guide akan ditambahkan pada tahap berikutnya.">
                Quick guide
            </button>
        </div>
        <button type="button" class="btn btn-primary" data-toast="Pop-up Tambah Buku akan diimplementasikan pada tahap berikutnya.">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            <span>Tambah Buku</span>
        </button>
    </div>
</header>

<section class="stat-grid" aria-label="Statistik Koleksi Buku">
    <article class="stat-card">
        <div class="stat-card-top">
            <span class="stat-label">Total Buku</span>
            <span class="stat-icon-badge badge-amber" aria-hidden="true">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
                </svg>
            </span>
        </div>
        <div class="stat-value"><?= (int) $stats['total_buku'] ?></div>
    </article>

    <article class="stat-card">
        <div class="stat-card-top">
            <span class="stat-label">Belum Dibaca</span>
            <span class="stat-icon-badge badge-coral" aria-hidden="true">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
                </svg>
            </span>
        </div>
        <div class="stat-value"><?= (int) $stats['belum_dibaca'] ?></div>
    </article>

    <article class="stat-card">
        <div class="stat-card-top">
            <span class="stat-label">Sedang Dibaca</span>
            <span class="stat-icon-badge badge-blue" aria-hidden="true">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                </svg>
            </span>
        </div>
        <div class="stat-value"><?= (int) $stats['sedang_dibaca'] ?></div>
    </article>

    <article class="stat-card">
        <div class="stat-card-top">
            <span class="stat-label">Selesai</span>
            <span class="stat-icon-badge badge-green" aria-hidden="true">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
            </span>
        </div>
        <div class="stat-value"><?= (int) $stats['selesai'] ?></div>
    </article>
</section>

<section class="dashboard-widgets" aria-label="Ringkasan Aktivitas Membaca">
    <article class="widget-card">
        <div class="widget-header">
            <h2 class="widget-title">Progres Membaca Tahunan</h2>
        </div>
        <div class="donut-wrap">
            <div class="donut-chart">
                <svg class="donut-svg" viewBox="0 0 120 120" aria-hidden="true">
                    <circle class="donut-track" cx="60" cy="60" r="<?= $radius ?>"/>
                    <circle
                        class="donut-fill"
                        cx="60"
                        cy="60"
                        r="<?= $radius ?>"
                        stroke-dasharray="<?= number_format($circumference, 2, '.', '') ?>"
                        stroke-dashoffset="<?= number_format($dashOffset, 2, '.', '') ?>"
                    />
                </svg>
                <div class="donut-center">
                    <span class="donut-percent"><?= $percent ?>%</span>
                    <span class="donut-sub"><?= (int) $stats['selesai'] ?> / <?= (int) $stats['total_buku'] ?> Buku</span>
                </div>
            </div>
            <p class="widget-caption">
                Selesai membidik target tahun ini! <?= (int) $stats['sisa_target'] ?> buku lagi untuk melengkapi targetmu.
            </p>
        </div>
    </article>

    <article class="widget-card">
        <div class="widget-header">
            <h2 class="widget-title">Terakhir Dibaca</h2>
            <a href="<?= e(page_url('sedang-dibaca')) ?>" class="widget-link">
                <span>Lanjutkan</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>
            </a>
        </div>

        <div class="last-read-card">
            <div class="last-read-main">
                <?php
                $coverTheme = $lastRead['cover_theme'];
                $coverTitle = $lastRead['judul'];
                $coverSize = 'md';
                $showCoverTitle = true;
                require APP_PATH . '/views/partials/book_cover.php';
                ?>
                <div class="last-read-info">
                    <h3 class="last-read-title"><?= e($lastRead['judul']) ?></h3>
                    <p class="last-read-author"><?= e($lastRead['penulis']) ?></p>
                    <span class="last-read-status"><?= e($lastRead['status']) ?></span>
                </div>
            </div>

            <div class="progress-track" aria-label="Progres membaca <?= (int) $lastRead['persen'] ?>%">
                <div class="progress-fill" style="width: <?= (int) $lastRead['persen'] ?>%;"></div>
            </div>
        </div>
    </article>

    <article class="widget-card">
        <div class="widget-header">
            <h2 class="widget-title">Buku Bulan Ini</h2>
        </div>
        <div class="monthly-wrap">
            <div class="monthly-badge"><?= (int) $stats['buku_bulan_ini'] ?></div>
            <p class="widget-caption">
                <?= (int) $stats['buku_bulan_ini'] ?> buku berhasil dituntaskan pada bulan <?= e($stats['nama_bulan']) ?>. Target tercapai!
            </p>
        </div>
    </article>
</section>
