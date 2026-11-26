<section class="auth-card" aria-labelledby="login-title">
    <h1 id="login-title" class="auth-title">Masuk ke Akun</h1>

    <form class="auth-form" action="<?= e(base_url('index.php')) ?>" method="get">
        <input type="hidden" name="page" value="dashboard">

        <div class="form-group">
            <label for="login-email" class="form-label">Email <span class="required">*</span></label>
            <input id="login-email" type="email" class="auth-input" placeholder="nama@email.com" required>
        </div>

        <div class="form-group">
            <label for="login-password" class="form-label">Kata Sandi <span class="required">*</span></label>
            <input id="login-password" type="password" class="auth-input" placeholder="Masukkan kata sandi" required>
        </div>

        <button type="submit" class="auth-submit-btn">Masuk</button>
    </form>

    <div class="auth-divider">or</div>

    <button type="button" class="google-btn" data-toast="Preview UI Tahap 1: Login dengan Google akan disiapkan pada tahap autentikasi.">
        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17Z"/>
            <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.11-6.72-4.96H1.29v3.14C3.26 21.3 7.31 24 12 24Z"/>
            <path fill="#FBBC05" d="M5.28 14.24c-.24-.72-.38-1.49-.38-2.24s.14-1.52.38-2.24V6.62H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.38l3.99-3.14Z"/>
            <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.31 0 3.26 2.7 1.29 6.62l3.99 3.14c.95-2.85 3.6-4.96 6.72-4.96Z"/>
        </svg>
        <span>Login with Google</span>
    </button>

    <p class="auth-switch">
        Belum punya akun? <a href="<?= e(page_url('register')) ?>">Daftar sekarang</a>
    </p>
</section>
