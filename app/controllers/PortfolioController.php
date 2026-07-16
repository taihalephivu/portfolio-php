<?php
require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../core/DataStore.php';

class PortfolioController extends BaseController
{
    public function index(): void
    {
        $profile  = DataStore::getProfile();
        $projects = DataStore::getProjects();
        $posts    = DataStore::getPosts();
        $data = compact('profile', 'projects', 'posts');

        $this->render('layout/header', $data);
        $this->render('pages/home',    $data);
        $this->render('layout/footer', $data);
    }

    public function cv(): void
    {
        $profile = DataStore::getProfile();
        $this->render('layout/header', compact('profile'));
        $this->render('pages/cv',      compact('profile'));
        $this->render('layout/footer', []);
    }

    public function notFound(): void
    {
        $this->render('layout/header', []);
        $this->render('pages/404',     []);
        $this->render('layout/footer', []);
    }
}
