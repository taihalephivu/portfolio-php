<div class="admin-topbar">
    <h1><?php echo $post ? ($lang === 'vi' ? 'Sửa bài viết' : 'Edit Post') : ($lang === 'vi' ? 'Viết bài mới' : 'New Post'); ?></h1>
    <a href="<?php echo $base; ?>/admin/posts" class="admin-btn" style="background: rgba(255,255,255,0.06); color: #94A3B8; padding: 8px 16px; font-size: 0.85rem; border-radius: 10px;">
        ← <?php echo $lang === 'vi' ? 'Về danh sách' : 'Back to list'; ?>
    </a>
</div>
<div class="admin-content">
    <?php if (!empty($success)): ?>
    <div class="admin-alert success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
    <div class="admin-alert error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <div class="admin-card">
        <form method="POST" action="" class="admin-form">
            <div class="form-grid">
                <div>
                    <label>Tiêu đề (VI)</label>
                    <input type="text" name="title_vi" value="<?php echo htmlspecialchars($post['title']['vi'] ?? ''); ?>" required>
                </div>
                <div>
                    <label>Title (EN)</label>
                    <input type="text" name="title_en" value="<?php echo htmlspecialchars($post['title']['en'] ?? ''); ?>">
                </div>
            </div>

            <label>Slug (URL)</label>
            <input type="text" name="slug" value="<?php echo htmlspecialchars($post['slug'] ?? ''); ?>" required placeholder="vd: bai-viet-cua-toi">

            <div class="form-grid">
                <div>
                    <label>Tóm tắt (VI)</label>
                    <textarea name="summary_vi"><?php echo htmlspecialchars($post['summary']['vi'] ?? ''); ?></textarea>
                </div>
                <div>
                    <label>Summary (EN)</label>
                    <textarea name="summary_en"><?php echo htmlspecialchars($post['summary']['en'] ?? ''); ?></textarea>
                </div>
            </div>

            <div class="form-grid">
                <div>
                    <label>Nội dung (VI) – HTML</label>
                    <textarea name="content_vi" style="min-height: 200px;"><?php echo htmlspecialchars($post['content']['vi'] ?? ''); ?></textarea>
                </div>
                <div>
                    <label>Content (EN) – HTML</label>
                    <textarea name="content_en" style="min-height: 200px;"><?php echo htmlspecialchars($post['content']['en'] ?? ''); ?></textarea>
                </div>
            </div>

            <div class="form-grid">
                <div>
                    <label><?php echo $lang === 'vi' ? 'Ngày đăng' : 'Publish Date'; ?></label>
                    <input type="date" name="date" value="<?php echo htmlspecialchars($post['date'] ?? date('Y-m-d')); ?>">
                </div>
                <div>
                    <label><?php echo $lang === 'vi' ? 'Tags (cách nhau bởi dấu phẩy)' : 'Tags (comma separated)'; ?></label>
                    <input type="text" name="tags" value="<?php echo htmlspecialchars(implode(', ', $post['tags'] ?? [])); ?>">
                </div>
            </div>

            <label>URL Ảnh bìa</label>
            <input type="text" name="image" value="<?php echo htmlspecialchars($post['image'] ?? ''); ?>" placeholder="https://...">

            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px;">
                <input type="checkbox" id="published" name="published" value="1" <?php echo ($post['published'] ?? false) ? 'checked' : ''; ?> style="width: auto; margin: 0;">
                <label for="published" style="margin: 0; color: #E2E8F0; font-size: 0.9rem; cursor: pointer;">
                    <?php echo $lang === 'vi' ? 'Xuất bản ngay' : 'Publish now'; ?>
                </label>
            </div>

            <button type="submit" class="admin-btn admin-btn-primary">
                💾 <?php echo $lang === 'vi' ? 'Lưu bài viết' : 'Save Post'; ?>
            </button>
        </form>
    </div>
</div>
