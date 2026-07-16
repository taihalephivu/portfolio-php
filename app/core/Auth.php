<?php
/**
 * Auth – Session-based admin authentication helper.
 */
class Auth
{
    public static function login(string $username): void
    {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user']      = $username;
        $_SESSION['admin_time']      = time();
    }

    public static function logout(): void
    {
        unset($_SESSION['admin_logged_in'], $_SESSION['admin_user'], $_SESSION['admin_time']);
    }

    public static function isLoggedIn(): bool
    {
        return !empty($_SESSION['admin_logged_in']);
    }

    public static function requireLogin(): void
    {
        if (!self::isLoggedIn()) {
            $base = dirname($_SERVER['SCRIPT_NAME']);
            header('Location: ' . rtrim($base, '/') . '/admin/login');
            exit;
        }
    }

    public static function user(): string
    {
        return $_SESSION['admin_user'] ?? '';
    }
}
