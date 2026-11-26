<?php
/**
 * Partial Cover Buku
 * Variabel opsional: $coverTheme, $coverTitle, $coverSize ('sm'|'md'|'lg'), $showCoverTitle (bool)
 */
$coverTheme = $coverTheme ?? 'blue';
$coverTitle = $coverTitle ?? '';
$coverSize = $coverSize ?? 'md';
$showCoverTitle = $showCoverTitle ?? true;
?>
<div class="book-cover book-cover-<?= e($coverSize) ?> cover-theme-<?= e($coverTheme) ?>" aria-hidden="true">
    <?php if ($showCoverTitle && $coverTitle !== ''): ?>
        <span class="book-cover-title"><?= e($coverTitle) ?></span>
    <?php endif; ?>
    <span class="book-cover-bookmark">
        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
        </svg>
    </span>
</div>
