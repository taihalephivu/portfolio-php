<?php
require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../core/DataStore.php';

class BlogController extends BaseController
{
    public function index(): void
    {
        $posts = DataStore::getPosts();
        $this->render('layout/header', ['pageTitle' => $this->t['nav_blog'] ?? 'Blog']);
        $this->render('pages/blog',    compact('posts'));
        $this->render('layout/footer', []);
    }

    public function show(string $slug): void
    {
        $post = DataStore::getPostBySlug($slug);
        if (!$post || !($post['published'] ?? false)) {
            http_response_code(404);
            $this->render('layout/header', []);
            $this->render('pages/404',     []);
            $this->render('layout/footer', []);
            return;
        }
        $this->render('layout/header', ['pageTitle' => $post['title'][$this->lang] ?? '']);
        $this->render('pages/blog-post', compact('post'));
        $this->render('layout/footer',   []);
    }
}
