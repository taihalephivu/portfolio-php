<?php
require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../core/DataStore.php';

/**
 * ApiController – JSON API endpoints for chat and data.
 */
class ApiController extends BaseController
{
    public function dispatch(string $path): void
    {
        header('Content-Type: application/json; charset=utf-8');
        match($path) {
            '/chat/messages' => $this->getChatMessages(),
            '/chat/send'     => $this->sendChatMessage(),
            '/posts'         => $this->getPosts(),
            '/search'        => $this->search(),
            default          => $this->json(['error' => 'Not found'], 404),
        };
    }

    private function getChatMessages(): void
    {
        $this->json(DataStore::getChat());
    }

    private function sendChatMessage(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['error' => 'Method not allowed'], 405);
        }
        $body = json_decode(file_get_contents('php://input'), true);
        $name = htmlspecialchars(trim($body['name'] ?? 'Visitor'), ENT_QUOTES);
        $msg  = htmlspecialchars(trim($body['message'] ?? ''), ENT_QUOTES);
        if (!$msg) {
            $this->json(['error' => 'Message is required'], 400);
        }
        DataStore::addChatMessage(['name' => $name, 'message' => $msg, 'is_admin' => false]);
        $this->json(['success' => true]);
    }

    private function getPosts(): void
    {
        $this->json(DataStore::getPosts());
    }

    private function search(): void
    {
        $q = trim($_GET['q'] ?? '');
        $qLower = mb_strtolower($q, 'UTF-8');
        
        if ($q === '') {
            $this->json(['projects' => [], 'posts' => []]);
            return;
        }

        $projects = DataStore::getProjects();
        $posts    = DataStore::getPosts();
        
        $matchedProjects = [];
        $matchedPosts = [];
        
        foreach ($projects as $p) {
            $title = mb_strtolower($p['title'][$this->lang] ?? $p['title']['vi'] ?? '', 'UTF-8');
            $desc = mb_strtolower($p['desc'][$this->lang] ?? $p['desc']['vi'] ?? '', 'UTF-8');
            $tags = array_map(fn($t) => mb_strtolower($t, 'UTF-8'), $p['tags'] ?? []);
            
            $match = str_contains($title, $qLower) || str_contains($desc, $qLower);
            if (!$match) {
                foreach ($tags as $tag) {
                    if (str_contains($tag, $qLower)) {
                        $match = true; break;
                    }
                }
            }
            if ($match) {
                $matchedProjects[] = [
                    'title' => $p['title'][$this->lang] ?? $p['title']['vi'] ?? '',
                    'url' => (!empty($p['demo'])) ? $p['demo'] : ((!empty($p['repo'])) ? $p['repo'] : '#'),
                    'type' => 'project'
                ];
            }
        }
        
        foreach ($posts as $p) {
            $title = mb_strtolower($p['title'][$this->lang] ?? '', 'UTF-8');
            $summary = mb_strtolower($p['summary'][$this->lang] ?? '', 'UTF-8');
            $tags = array_map(fn($t) => mb_strtolower($t, 'UTF-8'), $p['tags'] ?? []);
            
            $match = str_contains($title, $qLower) || str_contains($summary, $qLower);
            if (!$match) {
                foreach ($tags as $tag) {
                    if (str_contains($tag, $qLower)) {
                        $match = true; break;
                    }
                }
            }
            if ($match) {
                $matchedPosts[] = [
                    'title' => $p['title'][$this->lang] ?? '',
                    'url' => '/blog/' . ($p['slug'] ?? ''),
                    'type' => 'post'
                ];
            }
        }
        
        
        $profile = DataStore::getProfile();
        $matchedOthers = [];
        
        // Static sections
        $sections = [
            'Liên hệ' => ['keywords' => ['liên hệ', 'contact', 'email', 'social'], 'url' => '/#contact'],
            'Giới thiệu' => ['keywords' => ['giới thiệu', 'about', 'profile', 'bio', 'tiểu sử'], 'url' => '/#about'],
            'Kỹ năng' => ['keywords' => ['kỹ năng', 'skill', 'skills', 'công nghệ'], 'url' => '/#skills'],
            'Kinh nghiệm' => ['keywords' => ['kinh nghiệm', 'experience', 'làm việc', 'học tập'], 'url' => '/#experience']
        ];
        foreach ($sections as $name => $sec) {
            foreach ($sec['keywords'] as $kw) {
                if (str_contains(mb_strtolower($name, 'UTF-8'), $qLower) || str_contains($kw, $qLower)) {
                    $matchedOthers[] = [
                        'title' => $name,
                        'url' => $sec['url'],
                        'type' => 'section'
                    ];
                    break;
                }
            }
        }
        
        // Skills
        if (isset($profile['skills'])) {
            foreach ($profile['skills'] as $skill) {
                if (str_contains(mb_strtolower($skill['name'], 'UTF-8'), $qLower)) {
                    $matchedOthers[] = [
                        'title' => $skill['name'],
                        'url' => '/#skills',
                        'type' => 'skill'
                    ];
                }
            }
        }
        
        // Experiences
        $exps = $profile['experiences'][$this->lang] ?? $profile['experiences']['vi'] ?? [];
        foreach ($exps as $exp) {
            $title = mb_strtolower($exp['title'] ?? '', 'UTF-8');
            $company = mb_strtolower($exp['company'] ?? '', 'UTF-8');
            $desc = mb_strtolower($exp['desc'] ?? '', 'UTF-8');
            
            if (str_contains($title, $qLower) || str_contains($company, $qLower) || str_contains($desc, $qLower)) {
                $matchedOthers[] = [
                    'title' => ($exp['title'] ?? '') . ' - ' . ($exp['company'] ?? ''),
                    'url' => '/#experience',
                    'type' => 'experience'
                ];
            }
        }

        $this->json([
            'projects' => $matchedProjects,
            'posts' => $matchedPosts,
            'others' => $matchedOthers
        ]);
    }
}
