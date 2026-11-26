<?php
require_once __DIR__ . '/BaseController.php';

/**
 * AuthController
 * Menangani tampilan halaman Register dan Login (Tahap 1: UI/UX Preview).
 */
class AuthController extends BaseController
{
    public function login(): void
    {
        $this->view('auth/login', [
            'pageTitle' => 'Masuk ke Akun - ReadTrack',
            'activePage' => 'login',
        ], 'layouts/auth');
    }

    public function register(): void
    {
        $this->view('auth/register', [
            'pageTitle' => 'Daftar Akun Baru - ReadTrack',
            'activePage' => 'register',
        ], 'layouts/auth');
    }
}
