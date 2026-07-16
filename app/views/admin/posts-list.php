<div class="admin-topbar">
    <h1><?php echo $t['admin_posts']; ?></h1>
    <a href="<?php echo $base; ?>/admin/posts/new" class="admin-btn admin-btn-primary">
        + <?php echo $lang === 'vi' ? 'Viết bài mới' : 'New Post'; ?>
    </a>
</div>
<div class="admin-content">
    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><?php echo $lang === 'vi' ? 'Tiêu đề (VI)' : 'Title (VI)'; ?></th>
                    <th><?php echo $lang === 'vi' ? 'Ngày đăng' : 'Date'; ?></th>
                    <th><?php echo $lang === 'vi' ? 'Trạng thái' : 'Status'; ?></th>
                    <th><?php echo $lang === 'vi' ? 'Thao tác' : 'Actions'; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $p): ?>
                <tr>
                    <td style="color: #64748B;"><?php echo $p['id']; ?></td>
                    <td><?php echo htmlspecialchars($p['title']['vi'] ?? ''); ?></td>
                    <td style="color: #64748B;"><?php echo $p['date']; ?></td>
                    <td>
                        <span class="badge <?php echo ($p['published'] ?? false) ? 'pub' : 'draft'; ?>">
                            <?php echo ($p['published'] ?? false) ? ($lang === 'vi' ? 'Xuất bản' : 'Published') : ($lang === 'vi' ? 'Nháp' : 'Draft'); ?>
                        </span>
                    </td>
                    <td style="display:flex; gap:12px; align-items:center;">
                        <a href="<?php echo $base; ?>/admin/posts/<?php echo $p['id']; ?>/edit" style="color: #60A5FA;">
                            <?php echo $lang === 'vi' ? 'Sửa' : 'Edit'; ?>
                        </a>
                        <a href="<?php echo $base; ?>/admin/posts/<?php echo $p['id']; ?>/delete"
                           onclick="return confirm('<?php echo $lang === 'vi' ? 'Xác nhận xóa bài này?' : 'Delete this post?'; ?>')"
                           style="color: #F87171;">
                            <?php echo $lang === 'vi' ? 'Xóa' : 'Delete'; ?>
                        </a>
                        <a href="<?php echo $base; ?>/blog/<?php echo $p['slug']; ?>" target="_blank" style="color: #94A3B8; font-size: 0.8rem;">
                            <?php echo $lang === 'vi' ? 'Xem' : 'View'; ?>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($posts)): ?>
                <tr><td colspan="5" style="text-align:center; padding: 40px; color: #64748B;"><?php echo $lang === 'vi' ? 'Chưa có bài viết nào.' : 'No posts yet.'; ?></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
