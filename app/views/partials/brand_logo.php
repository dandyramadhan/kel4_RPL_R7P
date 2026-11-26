<?php
/**
 * Partial Brand Logo
 * Otomatis menampilkan file logo kustom dari public/assets/img/logo.{png,svg,jpg,jpeg,webp}
 * jika tersedia, atau fallback ke ikon SVG bawaan ReadTrack.
 * Variabel opsional: $badgeSize ('md'|'sm')
 */
$badgeSize = $badgeSize ?? 'md';
$logoFile = null;
foreach (['logo.png', 'logo.svg', 'logo.webp', 'logo.jpg', 'logo.jpeg'] as $candidate) {
    if (file_exists(PUBLIC_PATH . '/assets/img/' . $candidate)) {
        $logoFile = $candidate;
        break;
    }
}
?>
<?php if ($logoFile !== null): ?>
    <img
        src="<?= e(asset_url('img/' . $logoFile)) ?>"
        alt="Logo ReadTrack"
        class="brand-logo-img <?= $badgeSize === 'sm' ? 'brand-logo-img-sm' : '' ?>"
    >
<?php else: ?>
    <span class="brand-badge <?= $badgeSize === 'sm' ? 'brand-badge-sm' : '' ?>">
        <svg width="<?= $badgeSize === 'sm' ? '20' : '22' ?>" height="<?= $badgeSize === 'sm' ? '20' : '22' ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
        </svg>
    </span>
<?php endif; ?>
