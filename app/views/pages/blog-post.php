<?php $l = $lang; ?>

<main style="padding-top: 100px; min-height: 80vh;">
    <div class="container" style="max-width: 900px; padding-bottom: 80px;">

        <!-- Header -->
        <div style="margin-bottom: 50px;">
            <a href="<?php echo $base; ?>/blog" class="btn btn-outline btn-sm" style="margin-bottom: 24px; display:inline-flex; align-items:center; gap:8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                <?php echo $t['back_to_blog']; ?>
            </a>

            <div class="post-date" style="margin-bottom: 14px; font-size: 0.9rem; display:flex; gap: 16px; flex-wrap: wrap; color: var(--text-3);">
                <span style="display:flex; align-items:center; gap:5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <?php echo $t['published_on']; ?>: <?php echo date('d/m/Y', strtotime($post['date'])); ?>
                </span>
                <span style="display:flex; align-items:center; gap:5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <?php echo htmlspecialchars($post['author'] ?? 'Hưng'); ?>
                </span>
            </div>

            <h1 class="post-single-title">
                <?php echo htmlspecialchars($post['title'][$l] ?? $post['title']['vi'] ?? ''); ?>
            </h1>

            <div style="display:flex; gap:8px; flex-wrap:wrap; margin-top: 16px;">
                <?php foreach ($post['tags'] as $tag): ?>
                <span class="post-tag"><?php echo htmlspecialchars($tag); ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Thumbnail -->
        <?php if (!empty($post['image'])): ?>
        <img src="<?php echo htmlspecialchars($post['image']); ?>"
             alt="<?php echo htmlspecialchars($post['title'][$l] ?? ''); ?>"
             class="post-single-thumb">
        <?php endif; ?>

        <!-- Content -->
        <div class="card" style="padding: 48px;">
            <div class="post-content">
                <?php echo $post['content'][$l] ?? $post['content']['vi'] ?? ''; ?>
            </div>
        </div>

        <!-- Back -->
        <div style="margin-top: 40px; text-align: center;">
            <a href="<?php echo $base; ?>/blog" class="btn btn-outline">
                <?php echo $t['back_to_blog']; ?>
            </a>
        </div>
    </div>
</main>
