<header class="page-header">
    <div>
        <h1 class="page-title">Sedang Dibaca</h1>
        <p class="page-subtitle">Pantau progres membacamu secara berkala di sini.</p>
    </div>

    <div class="header-actions">
        <span class="level-pill">
            Level <?= (int) $user['level'] ?> &bull; <?= number_format((int) $user['total_halaman'], 0, ',', '.') ?> Halaman
        </span>
    </div>
</header>

<section class="reading-list" aria-label="Daftar Buku yang Sedang Dibaca">
    <?php foreach ($readingBooks as $book): ?>
        <?php
        $total = max(1, (int) $book['total_halaman']);
        $current = max(0, min($total, (int) $book['halaman_terakhir']));
        $percent = (int) round(($current / $total) * 100);
        $isExpanded = !empty($book['is_expanded']);
        ?>
        <article class="reading-item-card <?= $isExpanded ? 'is-expanded' : '' ?>">
            <div class="reading-item-top">
                <div class="reading-item-info">
                    <?php
                    $coverTheme = $book['cover_theme'];
                    $coverTitle = $book['judul'];
                    $coverSize = 'md';
                    $showCoverTitle = true;
                    require APP_PATH . '/views/partials/book_cover.php';
                    ?>
                    <div>
                        <h2 class="reading-item-title"><?= e($book['judul']) ?></h2>
                        <p class="reading-item-author"><?= e($book['penulis']) ?></p>
                        <div class="reading-item-meta">
                            <span><?= e($book['tanggal_mulai']) ?></span>
                            <strong class="js-page-counter"><?= $current ?> / <?= $total ?></strong>
                        </div>
                    </div>
                </div>

                <span class="status-pill status-reading"><?= e($book['status']) ?></span>
            </div>

            <div class="progress-track">
                <div class="progress-fill" style="width: <?= $percent ?>%;"></div>
            </div>

            <div class="reading-inline-editor <?= $isExpanded ? '' : 'is-hidden' ?>">
                <div class="inline-editor-fields">
                    <label for="page-input-<?= (int) $book['id'] ?>">Update Halaman Terakhir:</label>
                    <input
                        id="page-input-<?= (int) $book['id'] ?>"
                        type="number"
                        class="page-number-input"
                        min="0"
                        max="<?= $total ?>"
                        value="<?= $current ?>"
                    >
                    <span><?= $total ?></span>
                </div>
                <button type="button" class="btn btn-primary btn-sm js-save-progress">
                    Simpan Progres
                </button>
            </div>

            <div class="reading-collapsed-actions <?= $isExpanded ? 'is-hidden' : '' ?>">
                <button type="button" class="btn btn-outline btn-sm js-open-progress">
                    Update Progres
                </button>
            </div>
        </article>
    <?php endforeach; ?>
</section>
