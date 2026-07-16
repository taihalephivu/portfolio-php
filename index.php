<?php
/**
 * Entry Point (Front Controller)
 * Routes: /, /blog, /blog/{slug}, /cv, /admin, /admin/*, /api/*
 */

session_start();

// ─── Autoload ────────────────────────────────────────────────────────────────
require_once __DIR__ . '/app/core/DataStore.php';
require_once __DIR__ . '/app/core/Auth.php';
require_once __DIR__ . '/app/core/BaseController.php';
require_once __DIR__ . '/app/controllers/PortfolioController.php';
require_once __DIR__ . '/app/controllers/BlogController.php';
require_once __DIR__ . '/app/controllers/AdminController.php';
require_once __DIR__ . '/app/controllers/ApiController.php';

// ─── Parse request URI ────────────────────────────────────────────────────────
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
// Strip query string
$path = parse_url($requestUri, PHP_URL_PATH);
// Strip base path (e.g. /portfolio-php) – XAMPP sub-folder support
$scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
if ($scriptDir !== '' && str_starts_with($path, $scriptDir)) {
    $path = substr($path, strlen($scriptDir));
}
$path = '/' . ltrim($path, '/');
$path = rtrim($path, '/') ?: '/';

// ─── Language resolution ─────────────────────────────────────────────────────
if (isset($_GET['lang']) && in_array($_GET['lang'], ['vi', 'en'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = $_SESSION['lang'] ?? 'vi';

// ─── Router ──────────────────────────────────────────────────────────────────
if ($path === '/' || $path === '/index.php') {
    (new PortfolioController($lang))->index();
}
elseif ($path === '/blog') {
    (new BlogController($lang))->index();
}
elseif (preg_match('#^/blog/(.+)$#', $path, $m)) {
    (new BlogController($lang))->show($m[1]);
}
elseif ($path === '/cv') {
    (new PortfolioController($lang))->cv();
}
elseif ($path === '/admin/login') {
    (new AdminController($lang))->login();
}
elseif ($path === '/admin/logout') {
    (new AdminController($lang))->logout();
}
elseif (str_starts_with($path, '/admin')) {
    Auth::requireLogin();
    $subPath = substr($path, 6) ?: '/';
    (new AdminController($lang))->dispatch($subPath);
}
elseif (str_starts_with($path, '/api')) {
    (new ApiController($lang))->dispatch(substr($path, 4) ?: '/');
}
else {
    http_response_code(404);
    (new PortfolioController($lang))->notFound();
}
