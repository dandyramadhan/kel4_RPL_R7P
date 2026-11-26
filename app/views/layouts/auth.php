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
<body class="auth-body">
    <main class="auth-wrapper">
        <a href="<?= e(page_url('dashboard')) ?>" class="auth-brand" aria-label="ReadTrack">
            <?php
            $badgeSize = 'md';
            require APP_PATH . '/views/partials/brand_logo.php';
            ?>
            <span class="auth-brand-text">ReadTrack</span>
        </a>

        <?= $content ?>
    </main>

    <div id="rt-toast" class="rt-toast" role="status" aria-live="polite"></div>
    <script src="<?= e(asset_url('js/app.js')) ?>"></script>
</body>
</html>
