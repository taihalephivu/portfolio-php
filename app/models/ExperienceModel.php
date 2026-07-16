<?php
/**
 * Model: ExperienceModel
 * Quản lý dữ liệu học tập và kinh nghiệm làm việc (Education & Experience).
 * Dữ liệu được phân tách theo ngôn ngữ.
 */
class ExperienceModel
{
    private array $data = [
        'vi' => [
            [
                'title'   => 'Cử nhân CNTT',
                'company' => 'Đại học Giao Thông Vận Tải',
                'period'  => '2019 - 2023',
                'type'    => 'education',
                'desc'    => 'Tốt nghiệp loại Giỏi chuyên ngành Kỹ thuật Phần mềm. Tham gia nhiều câu lạc bộ học thuật và cuộc thi lập trình.',
            ],
            [
                'title'   => 'Thực tập sinh Front-end',
                'company' => 'Công ty Tech VN',
                'period'  => '2023 - 2024',
                'type'    => 'work',
                'desc'    => 'Tham gia phát triển giao diện người dùng cho hệ thống quản lý nội bộ bằng ReactJS.',
            ],
            [
                'title'   => 'Lập trình viên Front-end',
                'company' => 'Công ty Phần mềm XYZ',
                'period'  => '2024 - Hiện tại',
                'type'    => 'work',
                'desc'    => 'Chịu trách nhiệm chính xây dựng các module front-end. Tối ưu hóa hiệu năng và cải thiện UX.',
            ],
        ],
        'en' => [
            [
                'title'   => 'Bachelor of IT',
                'company' => 'University of Technology',
                'period'  => '2019 - 2023',
                'type'    => 'education',
                'desc'    => 'Graduated with Honors in Software Engineering. Participated in academic clubs and programming contests.',
            ],
            [
                'title'   => 'Front-end Intern',
                'company' => 'Tech VN Corp',
                'period'  => '2023 - 2024',
                'type'    => 'work',
                'desc'    => 'Developed UI for an internal management system using ReactJS.',
            ],
            [
                'title'   => 'Front-end Developer',
                'company' => 'XYZ Software Inc.',
                'period'  => '2024 - Present',
                'type'    => 'work',
                'desc'    => 'Mainly responsible for building critical front-end modules. Optimized performance and improved UX.',
            ],
        ],
    ];

    /**
     * Lấy danh sách kinh nghiệm theo ngôn ngữ.
     * @param string $lang
     * @return array
     */
    public function getByLang(string $lang): array
    {
        return $this->data[$lang] ?? $this->data['vi'];
    }
}
