<?php $l = $lang; ?>

<main style="padding-top: 100px; min-height: 80vh;">
    <div class="container" style="padding-bottom: 80px;">

        <div class="section-header reveal" style="margin-bottom: 50px; text-align: center;">
            <div class="section-tag">Blog</div>
            <h1 class="section-title"><?php echo $t['blog_title']; ?></h1>
        </div>

        <?php if (empty($posts)): ?>
        <div style="text-align:center; padding: 80px 0; color: var(--text-2);">
            <div style="font-size: 4rem; margin-bottom: 20px;">📝</div>
            <p><?php echo $l === 'vi' ? 'Chưa có bài viết nào.' : 'No articles yet.'; ?></p>
        </div>
        <?php else: ?>
        <div class="blog-grid">
            <?php foreach ($posts as $post): ?>
            <a href="<?php echo $base; ?>/blog/<?php echo htmlspecialchars($post['slug']); ?>" class="card post-card reveal" style="display:block; color:inherit;">
                <div class="post-thumb">
                    <img src="<?php echo htmlspecialchars($post['image']); ?>"
                         alt="<?php echo htmlspecialchars($post['title'][$l] ?? ''); ?>"
                         loading="lazy">
                </div>
                <div class="post-body">
                    <div class="post-date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <?php echo date('d/m/Y', strtotime($post['date'])); ?>
                    </div>
                    <h2 class="post-title"><?php echo htmlspecialchars($post['title'][$l] ?? ''); ?></h2>
                    <p class="post-summary"><?php echo htmlspecialchars($post['summary'][$l] ?? ''); ?></p>
                    <div class="post-footer">
                        <div class="post-tags">
                            <?php foreach (array_slice($post['tags'], 0, 2) as $tag): ?>
                            <span class="post-tag"><?php echo htmlspecialchars($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <span class="btn btn-outline btn-sm"><?php echo $t['read_more']; ?></span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</main>
