<?php
// Note: BaseController, DataStore, and Auth are already required by index.php

class AdminController extends BaseController
{
    // ─── Login / Logout ───────────────────────────────────────────────────────
    public function login(): void
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $u = trim($_POST['username'] ?? '');
            $p = $_POST['password'] ?? '';
            if (DataStore::verifyAdmin($u, $p)) {
                Auth::login($u);
                $this->redirect('admin');
            } else {
                $error = $this->lang === 'vi'
                    ? 'Tên đăng nhập hoặc mật khẩu không đúng.'
                    : 'Invalid username or password.';
            }
        }
        if (Auth::isLoggedIn()) { $this->redirect('admin'); }
        $this->render('admin/login', compact('error'));
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('admin/login');
    }

    // ─── Admin dispatcher ─────────────────────────────────────────────────────
    public function dispatch(string $path): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        match(true) {
            $path === '/' || $path === ''       => $this->dashboard(),
            $path === '/posts'                  => $this->postsList(),
            $path === '/posts/new'              => $this->postForm(null),
            (bool)preg_match('#^/posts/(\d+)/edit$#', $path, $m) => $this->postForm((int)$m[1]),
            (bool)preg_match('#^/posts/(\d+)/delete$#', $path, $m) => $this->deletePost((int)$m[1]),
            $path === '/profile'                => $this->profileForm(),
            $path === '/chat'                   => $this->chat(),
            $path === '/projects'               => $this->projectsList(),
            default                             => $this->dashboard(),
        };
    }

    // ─── Dashboard ───────────────────────────────────────────────────────────
    private function dashboard(): void
    {
        $posts    = DataStore::getPosts(false);
        $projects = DataStore::getProjects();
        $profile  = DataStore::getProfile();
        $chat     = DataStore::getChat();
        $this->render('admin/layout', ['content' => 'admin/dashboard', 'posts' => $posts, 'projects' => $projects, 'profile' => $profile, 'chat' => $chat]);
    }

    // ─── Posts ────────────────────────────────────────────────────────────────
    private function postsList(): void
    {
        $posts = DataStore::getPosts(false);
        $this->render('admin/layout', ['content' => 'admin/posts-list', 'posts' => $posts]);
    }

    private function postForm(?int $id): void
    {
        $post = $id ? DataStore::getPostById($id) : null;
        $success = $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title_vi   = trim($_POST['title_vi']   ?? '');
            $title_en   = trim($_POST['title_en']   ?? '');
            $summary_vi = trim($_POST['summary_vi'] ?? '');
            $summary_en = trim($_POST['summary_en'] ?? '');
            $content_vi = $_POST['content_vi'] ?? '';
            $content_en = $_POST['content_en'] ?? '';
            $slug       = trim($_POST['slug']   ?? '');
            $tags_raw   = trim($_POST['tags']   ?? '');
            $image      = trim($_POST['image']  ?? '');
            $published  = isset($_POST['published']);
            $date       = trim($_POST['date']   ?? date('Y-m-d'));

            if ($title_vi && $slug) {
                $tags = array_map('trim', explode(',', $tags_raw));
                $newPost = [
                    'id'        => $id ?? DataStore::nextPostId(),
                    'slug'      => $slug,
                    'title'     => ['vi' => $title_vi, 'en' => $title_en],
                    'summary'   => ['vi' => $summary_vi, 'en' => $summary_en],
                    'content'   => ['vi' => $content_vi, 'en' => $content_en],
                    'date'      => $date,
                    'tags'      => $tags,
                    'image'     => $image,
                    'published' => $published,
                    'author'    => 'Hưng',
                ];
                DataStore::savePost($newPost);
                $post = $newPost;
                $success = $this->lang === 'vi' ? 'Đã lưu bài viết thành công!' : 'Post saved successfully!';
            } else {
                $error = $this->lang === 'vi' ? 'Vui lòng điền tiêu đề và slug.' : 'Please fill in title and slug.';
            }
        }
        $this->render('admin/layout', ['content' => 'admin/post-form', 'post' => $post, 'success' => $success, 'error' => $error]);
    }

    private function deletePost(int $id): void
    {
        DataStore::deletePost($id);
        $this->redirect('admin/posts');
    }

    // ─── Profile ─────────────────────────────────────────────────────────────
    private function profileForm(): void
    {
        $profile = DataStore::getProfile();
        $success = $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profile['name']    = trim($_POST['name']    ?? $profile['name']);
            $profile['name_en'] = trim($_POST['name_en'] ?? $profile['name_en']);
            $profile['title']['vi'] = trim($_POST['title_vi'] ?? '');
            $profile['title']['en'] = trim($_POST['title_en'] ?? '');
            $profile['bio']['vi']   = trim($_POST['bio_vi']   ?? '');
            $profile['bio']['en']   = trim($_POST['bio_en']   ?? '');
            $profile['email']  = trim($_POST['email']  ?? $profile['email']);
            $profile['social']['github']   = trim($_POST['github']   ?? '');
            $profile['social']['linkedin'] = trim($_POST['linkedin'] ?? '');
            $profile['social']['facebook'] = trim($_POST['facebook'] ?? '');
            $profile['social']['telegram'] = trim($_POST['telegram'] ?? '');
            DataStore::saveProfile($profile);
            $success = $this->lang === 'vi' ? 'Đã cập nhật hồ sơ!' : 'Profile updated!';
        }
        $this->render('admin/layout', ['content' => 'admin/profile-form', 'profile' => $profile, 'success' => $success, 'error' => $error]);
    }

    // ─── Chat ─────────────────────────────────────────────────────────────────
    private function chat(): void
    {
        $messages = DataStore::getChat();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $msg = trim($_POST['message'] ?? '');
            if ($msg) {
                DataStore::addChatMessage(['name' => 'Admin', 'message' => $msg, 'is_admin' => true]);
            }
            $this->redirect('admin/chat');
        }
        $this->render('admin/layout', ['content' => 'admin/chat', 'messages' => $messages]);
    }

    // ─── Projects ─────────────────────────────────────────────────────────────
    private function projectsList(): void
    {
        $projects = DataStore::getProjects();
        $this->render('admin/layout', ['content' => 'admin/projects-list', 'projects' => $projects]);
    }
}
