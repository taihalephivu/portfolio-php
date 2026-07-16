<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – hungtech</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base; ?>/public/css/style.css">
</head>
<body class="admin-body">
<div class="admin-login-page">
    <div class="admin-login-box">
        <div class="admin-login-logo">hungtech.</div>
        <p class="admin-login-sub"><?php echo $t['admin_login']; ?></p>

        <?php if (!empty($error)): ?>
        <div class="admin-alert error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="" class="admin-form">
            <label for="admin-username"><?php echo $t['admin_username']; ?></label>
            <input type="text" id="admin-username" name="username" autocomplete="username" required placeholder="admin">

            <label for="admin-password"><?php echo $t['admin_password']; ?></label>
            <input type="password" id="admin-password" name="password" autocomplete="current-password" required placeholder="••••••••">

            <button type="submit" class="admin-btn admin-btn-primary" style="width:100%; margin-top:4px;">
                <?php echo $t['admin_submit']; ?>
            </button>
        </form>

        <div style="margin-top: 20px; text-align: center;">
            <a href="<?php echo $base; ?>/" style="color: #64748B; font-size: 0.82rem;">← <?php echo $t['nav_home']; ?></a>
        </div>
    </div>
</div>
</body>
</html>
