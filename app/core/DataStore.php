<?php
/**
 * DataStore – Flat-file JSON data access layer.
 * All reads/writes to the /data directory go through here.
 */
class DataStore
{
    private static string $dataDir = '';

    public static function init(): void
    {
        self::$dataDir = dirname(__DIR__, 2) . '/data/';
    }

    private static function path(string $file): string
    {
        if (self::$dataDir === '') self::init();
        return self::$dataDir . $file . '.json';
    }

    public static function read(string $file): array
    {
        $p = self::path($file);
        if (!file_exists($p)) return [];
        $json = file_get_contents($p);
        return json_decode($json, true) ?? [];
    }

    public static function write(string $file, array $data): bool
    {
        $p = self::path($file);
        $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return file_put_contents($p, $json) !== false;
    }

    // ── Profile ──────────────────────────────────────────────────────────────
    public static function getProfile(): array
    {
        return self::read('profile');
    }

    public static function saveProfile(array $profile): bool
    {
        return self::write('profile', $profile);
    }

    // ── Projects ─────────────────────────────────────────────────────────────
    public static function getProjects(): array
    {
        return self::read('projects');
    }

    public static function saveProjects(array $projects): bool
    {
        return self::write('projects', $projects);
    }

    public static function getProjectBySlug(string $slug): ?array
    {
        foreach (self::getProjects() as $p) {
            if (($p['slug'] ?? '') === $slug) return $p;
        }
        return null;
    }

    // ── Posts ─────────────────────────────────────────────────────────────────
    public static function getPosts(bool $onlyPublished = true): array
    {
        $all = self::read('posts');
        if ($onlyPublished) {
            $all = array_values(array_filter($all, fn($p) => $p['published'] ?? false));
        }
        usort($all, fn($a, $b) => strcmp($b['date'], $a['date']));
        return $all;
    }

    public static function getPostById(int $id): ?array
    {
        foreach (self::read('posts') as $p) {
            if (($p['id'] ?? 0) === $id) return $p;
        }
        return null;
    }

    public static function getPostBySlug(string $slug): ?array
    {
        foreach (self::read('posts') as $p) {
            if (($p['slug'] ?? '') === $slug) return $p;
        }
        return null;
    }

    public static function savePost(array $post): bool
    {
        $posts = self::read('posts');
        $found = false;
        foreach ($posts as &$p) {
            if ($p['id'] === $post['id']) { $p = $post; $found = true; break; }
        }
        if (!$found) $posts[] = $post;
        return self::write('posts', array_values($posts));
    }

    public static function deletePost(int $id): bool
    {
        $posts = array_values(array_filter(self::read('posts'), fn($p) => $p['id'] !== $id));
        return self::write('posts', $posts);
    }

    public static function nextPostId(): int
    {
        $posts = self::read('posts');
        if (empty($posts)) return 1;
        return max(array_column($posts, 'id')) + 1;
    }

    // ── Chat ─────────────────────────────────────────────────────────────────
    public static function getChat(): array
    {
        return self::read('chat');
    }

    public static function addChatMessage(array $msg): bool
    {
        $chat = self::read('chat');
        $msg['id'] = empty($chat) ? 1 : (max(array_column($chat, 'id')) + 1);
        $msg['time'] = date('Y-m-d H:i');
        $chat[] = $msg;
        return self::write('chat', $chat);
    }

    // ── Admin auth ────────────────────────────────────────────────────────────
    public static function getAdmin(): array
    {
        return self::read('admin');
    }

    public static function verifyAdmin(string $username, string $password): bool
    {
        $admin = self::getAdmin();
        if (($admin['username'] ?? '') !== $username) return false;
        return password_verify($password, $admin['password_hash'] ?? '');
    }
}
