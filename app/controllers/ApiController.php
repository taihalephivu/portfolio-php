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
}
