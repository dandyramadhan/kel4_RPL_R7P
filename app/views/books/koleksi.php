<header class="page-header">
    <div>
        <h1 class="page-title">Koleksi Buku</h1>
        <p class="page-subtitle">Kelola seluruh buku dalam rak virtual milikmu.</p>
    </div>

    <div class="header-actions">
        <span class="level-pill">
            Level <?= (int) $user['level'] ?> &bull; <?= number_format((int) $user['total_halaman'], 0, ',', '.') ?> Halaman
        </span>
    </div>
</header>

<section class="filter-toolbar" aria-label="Filter Koleksi Buku">
    <div class="search-box">
        <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input id="koleksiSearch" type="search" class="search-input" placeholder="Cari judul atau penulis...">
    </div>

    <select id="koleksiCategory" class="filter-select" aria-label="Filter Kategori">
        <option value="all">Semua Kategori</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= e($category) ?>"><?= e($category) ?></option>
        <?php endforeach; ?>
    </select>

    <select id="koleksiStatus" class="filter-select" aria-label="Filter Status">
        <option value="all">Status</option>
        <option value="belum_dibaca">Not started</option>
        <option value="sedang_dibaca">Reading</option>
        <option value="selesai">Finished</option>
    </select>

    <button type="button" class="btn btn-primary" data-toast="Pop-up Tambah Buku akan diimplementasikan pada tahap berikutnya.">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        <span>Tambah Buku</span>
    </button>
</section>

<section class="book-grid" id="koleksiGrid" aria-label="Daftar Koleksi Buku">
    <?php foreach ($books as $book): ?>
        <?php
        $categoryClass = 'cat-' . strtolower(preg_replace('/[^a-z0-9]+/i', '-', $book['kategori']));
        $statusClass = 'status-not-started';
        if ($book['status_key'] === 'sedang_dibaca') {
            $statusClass = 'status-reading';
        } elseif ($book['status_key'] === 'selesai') {
            $statusClass = 'status-finished';
        }
        ?>
        <article
            class="book-card"
            data-title="<?= e($book['judul']) ?>"
            data-author="<?= e($book['penulis']) ?>"
            data-category="<?= e($book['kategori']) ?>"
            data-status="<?= e($book['status_key']) ?>"
        >
            <div class="book-card-body">
                <?php
                $coverTheme = $book['cover_theme'];
                $coverTitle = $book['judul'];
                $coverSize = 'md';
                $showCoverTitle = true;
                require APP_PATH . '/views/partials/book_cover.php';
                ?>
                <div class="book-card-info">
                    <span class="category-pill <?= e($categoryClass) ?>"><?= e($book['kategori']) ?></span>
                    <h2 class="book-card-title"><?= e($book['judul']) ?></h2>
                    <p class="book-card-author"><?= e($book['penulis']) ?></p>
                </div>
            </div>

            <div class="book-card-footer">
                <span class="status-pill <?= e($statusClass) ?>"><?= e($book['status']) ?></span>
                <div class="card-icon-actions">
                    <button
                        type="button"
                        class="icon-action-btn"
                        title="Edit Buku"
                        aria-label="Edit <?= e($book['judul']) ?>"
                        data-toast="Halaman Edit Buku untuk '<?= e($book['judul']) ?>' akan ditambahkan pada tahap berikutnya."
                    >
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                        </svg>
                    </button>
                    <button
                        type="button"
                        class="icon-action-btn is-danger"
                        title="Hapus Buku"
                        aria-label="Hapus <?= e($book['judul']) ?>"
                        data-toast="Konfirmasi Hapus Buku untuk '<?= e($book['judul']) ?>' akan ditambahkan pada tahap berikutnya."
                    >
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                            <path d="M10 11v6"/>
                            <path d="M14 11v6"/>
                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                        </svg>
                    </button>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
</section>

<div id="koleksiEmpty" class="empty-state is-hidden">
    Tidak ada buku yang sesuai dengan kata kunci atau filter yang dipilih.
</div>

<footer class="collection-footer">
    <span id="koleksiCount" class="collection-count">Menampilkan koleksi buku</span>
    <nav class="pagination" aria-label="Navigasi halaman koleksi">
        <button type="button" class="page-btn" aria-label="Halaman sebelumnya">&lsaquo;</button>
        <button type="button" class="page-btn is-active" aria-current="page">1</button>
        <button type="button" class="page-btn">2</button>
        <button type="button" class="page-btn">3</button>
        <button type="button" class="page-btn" aria-label="Halaman berikutnya">&rsaquo;</button>
    </nav>
</footer>
