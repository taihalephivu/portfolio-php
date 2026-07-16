<div class="admin-topbar">
    <h1><?php echo $t['admin_dashboard']; ?></h1>
    <span style="color: #64748B; font-size: 0.85rem;"><?php echo date('d/m/Y H:i'); ?></span>
</div>
<div class="admin-content">
    <!-- Stats -->
    <div class="admin-stats">
        <div class="admin-card admin-stat">
            <div class="admin-stat-num"><?php echo count($posts); ?></div>
            <div class="admin-stat-label"><?php echo $t['admin_posts']; ?></div>
        </div>
        <div class="admin-card admin-stat">
            <div class="admin-stat-num"><?php echo count($projects); ?></div>
            <div class="admin-stat-label"><?php echo $t['admin_projects']; ?></div>
        </div>
        <div class="admin-card admin-stat">
            <div class="admin-stat-num"><?php echo count(array_filter($posts, fn($p) => $p['published'] ?? false)); ?></div>
            <div class="admin-stat-label"><?php echo $lang === 'vi' ? 'Đã xuất bản' : 'Published'; ?></div>
        </div>
        <div class="admin-card admin-stat">
            <div class="admin-stat-num"><?php echo count($chat); ?></div>
            <div class="admin-stat-label"><?php echo $lang === 'vi' ? 'Tin nhắn' : 'Messages'; ?></div>
        </div>
    </div>

    <!-- Recent posts -->
    <div class="admin-card" style="margin-bottom: 24px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 20px;">
            <h2 style="font-size: 1rem; font-weight: 700;"><?php echo $lang === 'vi' ? 'Bài viết gần đây' : 'Recent Posts'; ?></h2>
            <a href="<?php echo $base; ?>/admin/posts/new" class="admin-btn admin-btn-primary" style="padding: 8px 16px; font-size: 0.82rem;"><?php echo $lang === 'vi' ? '+ Viết bài mới' : '+ New Post'; ?></a>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th><?php echo $lang === 'vi' ? 'Tiêu đề' : 'Title'; ?></th>
                    <th><?php echo $lang === 'vi' ? 'Ngày' : 'Date'; ?></th>
                    <th><?php echo $lang === 'vi' ? 'Trạng thái' : 'Status'; ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (array_slice($posts, 0, 5) as $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['title'][$lang] ?? $p['title']['vi'] ?? ''); ?></td>
                    <td style="color: #64748B;"><?php echo $p['date']; ?></td>
                    <td><span class="badge <?php echo ($p['published'] ?? false) ? 'pub' : 'draft'; ?>"><?php echo ($p['published'] ?? false) ? ($lang === 'vi' ? 'Xuất bản' : 'Published') : ($lang === 'vi' ? 'Nháp' : 'Draft'); ?></span></td>
                    <td><a href="<?php echo $base; ?>/admin/posts/<?php echo $p['id']; ?>/edit"><?php echo $lang === 'vi' ? 'Sửa' : 'Edit'; ?></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Quick links -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div class="admin-card" style="text-align: center; cursor: pointer;" onclick="location.href='<?php echo $base; ?>/admin/profile'">
            <div style="font-size: 2rem; margin-bottom: 10px;">👤</div>
            <div style="font-weight: 600; font-size: 0.9rem;"><?php echo $t['admin_profile']; ?></div>
        </div>
        <div class="admin-card" style="text-align: center; cursor: pointer;" onclick="location.href='<?php echo $base; ?>/admin/chat'">
            <div style="font-size: 2rem; margin-bottom: 10px;">💬</div>
            <div style="font-weight: 600; font-size: 0.9rem;"><?php echo $t['admin_chat']; ?></div>
        </div>
    </div>
</div>
