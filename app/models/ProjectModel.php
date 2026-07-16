<?php
/**
 * Model: ProjectModel
 * Quản lý dữ liệu các dự án (Projects).
 * Dữ liệu được phân tách theo ngôn ngữ.
 */
class ProjectModel
{
    private array $data = [
        'vi' => [
            [
                'title'    => 'E-Commerce Platform',
                'category' => 'Web App',
                'desc'     => 'Hệ thống bán hàng trực tuyến đầy đủ tính năng: giỏ hàng, thanh toán và quản lý đơn hàng.',
                'tags'     => ['ReactJS', 'Node.js', 'MongoDB'],
                'image'    => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title'    => 'Task Manager',
                'category' => 'Productivity',
                'desc'     => 'Ứng dụng quản lý công việc hàng ngày với giao diện kéo thả trực quan và nhắc nhở thông minh.',
                'tags'     => ['VueJS', 'Firebase', 'CSS'],
                'image'    => 'https://images.unsplash.com/photo-1540350394557-8d14678e7f91?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title'    => 'Personal Portfolio',
                'category' => 'Website',
                'desc'     => 'Trang portfolio cá nhân đa ngôn ngữ, hỗ trợ dark/light mode và tích hợp tìm kiếm theo mô hình MVC.',
                'tags'     => ['PHP', 'HTML/CSS', 'JavaScript'],
                'image'    => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=600&q=80',
            ],
        ],
        'en' => [
            [
                'title'    => 'E-Commerce Platform',
                'category' => 'Web App',
                'desc'     => 'Full-featured online shopping system with cart, checkout, and order management.',
                'tags'     => ['ReactJS', 'Node.js', 'MongoDB'],
                'image'    => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title'    => 'Task Manager',
                'category' => 'Productivity',
                'desc'     => 'Daily task management app with an intuitive drag-and-drop UI and smart reminders.',
                'tags'     => ['VueJS', 'Firebase', 'CSS'],
                'image'    => 'https://images.unsplash.com/photo-1540350394557-8d14678e7f91?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title'    => 'Personal Portfolio',
                'category' => 'Website',
                'desc'     => 'Multilingual personal portfolio with dark/light mode and integrated search built on MVC pattern.',
                'tags'     => ['PHP', 'HTML/CSS', 'JavaScript'],
                'image'    => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=600&q=80',
            ],
        ],
    ];

    /**
     * Lấy toàn bộ dự án theo ngôn ngữ.
     * @param string $lang
     * @return array
     */
    public function getByLang(string $lang): array
    {
        return $this->data[$lang] ?? $this->data['vi'];
    }
}
