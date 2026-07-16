<?php
/**
 * Base Controller – shared render helper and URL helper.
 */
class BaseController
{
    protected string $lang;
    protected array  $t;
    protected string $base;

    public function __construct(string $lang)
    {
        $this->lang = $lang;
        $this->t    = require __DIR__ . '/../../lang/' . $lang . '.php';
        // Base URL for assets/links
        $this->base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    }

    protected function url(string $path = ''): string
    {
        return $this->base . '/' . ltrim($path, '/');
    }

    protected function render(string $view, array $data = []): void
    {
        $data['lang'] = $this->lang;
        $data['t']    = $this->t;
        $data['base'] = $this->base;
        extract($data);
        $path = __DIR__ . '/../views/' . $view . '.php';
        if (!file_exists($path)) {
            die("View not found: {$path}");
        }
        require $path;
    }

    protected function json(mixed $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . $this->url($path));
        exit;
    }
}
