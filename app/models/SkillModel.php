<?php
/**
 * Model: SkillModel
 * Quản lý dữ liệu kỹ năng (Skills).
 */
class SkillModel
{
    /**
     * Trả về danh sách tất cả kỹ năng.
     * @return array
     */
    public function getAll(): array
    {
        return [
            ['name' => 'HTML5 / CSS3',        'level' => 90],
            ['name' => 'JavaScript (ES6+)',    'level' => 85],
            ['name' => 'ReactJS',              'level' => 80],
            ['name' => 'VueJS',                'level' => 75],
            ['name' => 'UI/UX Design',         'level' => 85],
            ['name' => 'PHP',                  'level' => 70],
        ];
    }
}
