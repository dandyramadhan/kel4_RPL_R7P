<?php
/**
 * BaseController
 * Menyediakan helper render view, redirect, dan URL helper untuk seluruh controller.
 */

class BaseController
{
    /**
     * Render file view dengan layout opsional.
     */
    protected function view(string $viewPath, array $data = [], ?string $layout = 'layouts/main'): void
    {
        $viewFile = APP_PATH . '/views/' . $viewPath . '.php';
        if (!file_exists($viewFile)) {
            http_response_code(404);
            echo 'View tidak ditemukan: ' . htmlspecialchars($viewPath, ENT_QUOTES, 'UTF-8');
            return;
        }

        extract($data, EXTR_SKIP);

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        if ($layout !== null) {
            $layoutFile = APP_PATH . '/views/' . $layout . '.php';
            if (file_exists($layoutFile)) {
                require $layoutFile;
                return;
            }
        }

        echo $content;
    }

    /**
     * Redirect ke halaman internal aplikasi.
     */
    protected function redirect(string $page): void
    {
        header('Location: ' . page_url($page));
        exit;
    }
}
