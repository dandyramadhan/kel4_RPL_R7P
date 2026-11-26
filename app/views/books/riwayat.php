<header class="page-header">
    <div>
        <h1 class="page-title">Riwayat Membaca</h1>
        <p class="page-subtitle">Evaluasi pencapaian membaca buku yang telah selesai.</p>
    </div>

    <div class="header-actions">
        <span class="level-pill">
            Level <?= (int) $user['level'] ?> &bull; <?= number_format((int) $user['total_halaman'], 0, ',', '.') ?> Halaman
        </span>
    </div>
</header>

<section class="filter-toolbar" aria-label="Filter Riwayat Membaca">
    <div class="search-box">
        <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input id="riwayatSearch" type="search" class="search-input" placeholder="Cari buku yang selesai...">
    </div>

    <select id="riwayatCategory" class="filter-select" aria-label="Filter Kategori Riwayat">
        <option value="all">Semua Kategori</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= e($category) ?>"><?= e($category) ?></option>
        <?php endforeach; ?>
    </select>

    <span class="history-toolbar-right">Finished books</span>
</section>

<section class="table-card" aria-label="Tabel Riwayat Buku Selesai">
    <div class="table-responsive">
        <table class="history-table">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Halaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="riwayatTableBody">
                <?php foreach ($finishedBooks as $book): ?>
                    <?php
                    $categoryClass = 'cat-' . strtolower(preg_replace('/[^a-z0-9]+/i', '-', $book['kategori']));
                    ?>
                    <tr
                        data-title="<?= e($book['judul']) ?>"
                        data-author="<?= e($book['penulis']) ?>"
                        data-category="<?= e($book['kategori']) ?>"
                    >
                        <td>
                            <?php
                            $coverTheme = $book['cover_theme'];
                            $coverTitle = $book['judul'];
                            $coverSize = 'sm';
                            $showCoverTitle = !empty($book['show_cover_title']);
                            require APP_PATH . '/views/partials/book_cover.php';
                            ?>
                        </td>
                        <td class="history-book-title"><?= e($book['judul']) ?></td>
                        <td><?= e($book['penulis']) ?></td>
                        <td>
                            <span class="category-pill <?= e($categoryClass) ?>"><?= e($book['kategori']) ?></span>
                        </td>
                        <td><?= e($book['tanggal_mulai']) ?></td>
                        <td><?= e($book['tanggal_selesai']) ?></td>
                        <td><?= (int) $book['total_halaman'] ?></td>
                        <td>
                            <button
                                type="button"
                                class="history-detail-link"
                                data-toast="Halaman Detail Buku untuk '<?= e($book['judul']) ?>' akan ditambahkan pada tahap berikutnya."
                            >
                                Lihat Detail
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="riwayatEmpty" class="empty-state is-hidden">
        Tidak ada riwayat bacaan yang cocok dengan pencarian Anda.
    </div>
</section>
