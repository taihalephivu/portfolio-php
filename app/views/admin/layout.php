<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – hungtech</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base; ?>/public/css/style.css">
</head>
<body class="admin-body">
<div class="admin-layout">

    <!-- ── SIDEBAR ── -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-logo">hungtech.</div>
        <div class="admin-sidebar-user">
            👤 <?php echo htmlspecialchars(Auth::user()); ?>
        </div>
        <nav class="admin-nav">
            <a href="<?php echo $base; ?>/admin" class="<?php echo $content === 'admin/dashboard' ? 'active' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                <?php echo $t['admin_dashboard']; ?>
            </a>
            <a href="<?php echo $base; ?>/admin/posts" class="<?php echo str_contains($content, 'posts') ? 'active' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                <?php echo $t['admin_posts']; ?>
            </a>
            <a href="<?php echo $base; ?>/admin/profile" class="<?php echo str_contains($content, 'profile') ? 'active' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <?php echo $t['admin_profile']; ?>
            </a>
            <a href="<?php echo $base; ?>/admin/projects" class="<?php echo str_contains($content, 'projects') ? 'active' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                <?php echo $t['admin_projects']; ?>
            </a>
            <a href="<?php echo $base; ?>/admin/chat" class="<?php echo str_contains($content, 'chat') ? 'active' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <?php echo $t['admin_chat']; ?>
            </a>
        </nav>
        <div class="admin-sidebar-footer">
            <a href="<?php echo $base; ?>/" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                <?php echo $t['nav_home']; ?>
            </a>
            <a href="<?php echo $base; ?>/admin/logout" style="margin-top: 8px; color: #F87171 !important;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                <?php echo $t['admin_logout']; ?>
            </a>
        </div>
    </aside>

    <!-- ── MAIN CONTENT ── -->
    <div class="admin-main">
        <?php require __DIR__ . '/../' . $content . '.php'; ?>
    </div>

</div>
</body>
</html>
