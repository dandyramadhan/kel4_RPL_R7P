<?php
/**
 * Entry Point & Front Controller ReadTrack
 * Mendukung akses via `php -S localhost:8000 -t public` maupun Laragon/XAMPP.
 */

define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', __DIR__);

/**
 * Menghasilkan URL dasar relatif terhadap folder public.
 */
function base_url(string $path = ''): string
{
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $base = ($scriptDir === '/' || $scriptDir === '.') ? '' : rtrim($scriptDir, '/');
    if ($path === '') {
        return $base === '' ? '/' : $base . '/';
    }
    return $base . '/' . ltrim($path, '/');
}

/**
 * Menghasilkan URL untuk file statis di public/assets.
 */
function asset_url(string $assetPath): string
{
    return base_url('assets/' . ltrim($assetPath, '/'));
}

/**
 * Menghasilkan URL untuk routing halaman internal.
 */
function page_url(string $page): string
{
    return base_url('index.php?page=' . urlencode($page));
}

/**
 * Escape HTML untuk keamanan output.
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

require_once APP_PATH . '/controllers/AuthController.php';
require_once APP_PATH . '/controllers/DashboardController.php';
require_once APP_PATH . '/controllers/BookController.php';

$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'register':
        (new AuthController())->register();
        break;
    case 'login':
        (new AuthController())->login();
        break;
    case 'dashboard':
        (new DashboardController())->index();
        break;
    case 'koleksi':
        (new BookController())->koleksi();
        break;
    case 'sedang-dibaca':
        (new BookController())->sedangDibaca();
        break;
    case 'riwayat':
        (new BookController())->riwayat();
        break;
    default:
        (new DashboardController())->index();
        break;
}
