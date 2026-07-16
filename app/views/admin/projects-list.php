<div class="admin-topbar">
    <h1><?php echo $t['admin_projects']; ?></h1>
    <span style="color: #64748B; font-size: 0.85rem;"><?php echo $lang === 'vi' ? 'Chỉnh sửa trong file data/projects.json' : 'Edit in data/projects.json'; ?></span>
</div>
<div class="admin-content">
    <div class="admin-card">
        <p style="color: #94A3B8; margin-bottom: 20px; font-size: 0.9rem;">
            <?php echo $lang === 'vi'
                ? '💡 Để thêm/sửa/xóa dự án, chỉnh sửa file <code style="background:rgba(255,255,255,0.08);padding:2px 8px;border-radius:6px;">data/projects.json</code>.'
                : '💡 To add/edit/delete projects, edit the file <code style="background:rgba(255,255,255,0.08);padding:2px 8px;border-radius:6px;">data/projects.json</code>.'; ?>
        </p>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><?php echo $lang === 'vi' ? 'Tên dự án' : 'Project Name'; ?></th>
                    <th><?php echo $lang === 'vi' ? 'Danh mục' : 'Category'; ?></th>
                    <th>Tags</th>
                    <th><?php echo $lang === 'vi' ? 'Demo' : 'Demo'; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $proj): ?>
                <tr>
                    <td style="color: #64748B;"><?php echo $proj['id']; ?></td>
                    <td><?php echo htmlspecialchars($proj['title']['vi'] ?? ''); ?></td>
                    <td style="color: #94A3B8; font-size: 0.85rem;"><?php echo htmlspecialchars($proj['category']['vi'] ?? ''); ?></td>
                    <td>
                        <?php foreach (array_slice($proj['tags'], 0, 3) as $tag): ?>
                        <span style="background: rgba(139,92,246,0.15); color: #A78BFA; padding: 2px 8px; border-radius: 12px; font-size: 0.72rem; margin-right: 4px;"><?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php if (!empty($proj['demo'])): ?>
                        <a href="<?php echo htmlspecialchars($proj['demo']); ?>" target="_blank" style="color: #60A5FA; font-size: 0.85rem;">Demo ↗</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
