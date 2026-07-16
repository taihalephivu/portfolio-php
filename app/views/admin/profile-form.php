<div class="admin-topbar">
    <h1><?php echo $t['admin_profile']; ?></h1>
</div>
<div class="admin-content">
    <?php if (!empty($success)): ?>
    <div class="admin-alert success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <div class="admin-card">
        <form method="POST" action="" class="admin-form">
            <div class="form-grid">
                <div>
                    <label>Tên (VI)</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($profile['name'] ?? ''); ?>">
                </div>
                <div>
                    <label>Name (EN)</label>
                    <input type="text" name="name_en" value="<?php echo htmlspecialchars($profile['name_en'] ?? ''); ?>">
                </div>
            </div>
            <div class="form-grid">
                <div>
                    <label>Chức danh (VI)</label>
                    <input type="text" name="title_vi" value="<?php echo htmlspecialchars($profile['title']['vi'] ?? ''); ?>">
                </div>
                <div>
                    <label>Job Title (EN)</label>
                    <input type="text" name="title_en" value="<?php echo htmlspecialchars($profile['title']['en'] ?? ''); ?>">
                </div>
            </div>
            <div class="form-grid">
                <div>
                    <label>Tiểu sử ngắn (VI)</label>
                    <textarea name="bio_vi"><?php echo htmlspecialchars($profile['bio']['vi'] ?? ''); ?></textarea>
                </div>
                <div>
                    <label>Short Bio (EN)</label>
                    <textarea name="bio_en"><?php echo htmlspecialchars($profile['bio']['en'] ?? ''); ?></textarea>
                </div>
            </div>
            <label>Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($profile['email'] ?? ''); ?>">

            <h3 style="font-size: 0.95rem; font-weight: 700; color: #60A5FA; margin: 8px 0 16px;"><?php echo $lang === 'vi' ? '🔗 Mạng xã hội' : '🔗 Social Links'; ?></h3>
            <div class="form-grid">
                <div>
                    <label>GitHub URL</label>
                    <input type="url" name="github" value="<?php echo htmlspecialchars($profile['social']['github'] ?? ''); ?>" placeholder="https://github.com/...">
                </div>
                <div>
                    <label>LinkedIn URL</label>
                    <input type="url" name="linkedin" value="<?php echo htmlspecialchars($profile['social']['linkedin'] ?? ''); ?>" placeholder="https://linkedin.com/in/...">
                </div>
                <div>
                    <label>Facebook URL</label>
                    <input type="url" name="facebook" value="<?php echo htmlspecialchars($profile['social']['facebook'] ?? ''); ?>" placeholder="https://fb.com/...">
                </div>
                <div>
                    <label>Telegram URL</label>
                    <input type="url" name="telegram" value="<?php echo htmlspecialchars($profile['social']['telegram'] ?? ''); ?>" placeholder="https://t.me/...">
                </div>
            </div>

            <button type="submit" class="admin-btn admin-btn-primary">
                💾 <?php echo $lang === 'vi' ? 'Cập nhật hồ sơ' : 'Update Profile'; ?>
            </button>
        </form>
    </div>
</div>
