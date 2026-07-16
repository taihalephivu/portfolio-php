<?php
$l  = $lang;
$so = $profile['social'] ?? [];
$skills = $profile['skills'] ?? [];
$experiences = $profile['experiences'][$l] ?? [];
?>

<!-- ═══════════════ HERO ═══════════════ -->
<section id="hero">
    <div class="hero-content container">
        <!-- Text Side -->
        <div class="hero-text">
            <h1 class="hero-name">
                <?php echo htmlspecialchars($l === 'vi' ? $profile['name'] : $profile['name_en']); ?>
            </h1>
            <p class="hero-title"><?php echo htmlspecialchars($profile['title'][$l] ?? ''); ?></p>
            <p class="hero-bio"><?php echo htmlspecialchars($profile['bio'][$l] ?? ''); ?></p>

            <div class="hero-actions">
                <a href="#contact" class="btn btn-primary">
                    <?php echo $t['hero_cta']; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="<?php echo $base; ?>/cv" class="btn btn-outline">
                    <?php echo $t['hero_cv']; ?>
                </a>
            </div>

            <!-- Social Icons -->
            <div class="hero-social">
                <?php if (!empty($so['github'])): ?>
                <a href="<?php echo htmlspecialchars($so['github']); ?>" target="_blank" rel="noopener" class="social-icon-btn" title="GitHub" id="hero-github">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .3a12 12 0 0 0-3.79 23.4c.6.1.83-.26.83-.57v-2.2c-3.34.72-4.04-1.61-4.04-1.61-.55-1.38-1.34-1.75-1.34-1.75-1.09-.75.08-.73.08-.73 1.2.08 1.83 1.24 1.83 1.24 1.07 1.83 2.8 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.66-.3-5.46-1.33-5.46-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.11-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 6.01 0c2.29-1.55 3.3-1.23 3.3-1.23.65 1.65.24 2.87.12 3.17.77.84 1.23 1.91 1.23 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.68.83.57A12 12 0 0 0 12 .3z"/></svg>
                </a>
                <?php endif; ?>
                <?php if (!empty($so['linkedin'])): ?>
                <a href="<?php echo htmlspecialchars($so['linkedin']); ?>" target="_blank" rel="noopener" class="social-icon-btn" title="LinkedIn" id="hero-linkedin">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
                <?php endif; ?>
                <?php if (!empty($so['facebook'])): ?>
                <a href="<?php echo htmlspecialchars($so['facebook']); ?>" target="_blank" rel="noopener" class="social-icon-btn" title="Facebook" id="hero-facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <?php endif; ?>
                <?php if (!empty($so['telegram'])): ?>
                <a href="<?php echo htmlspecialchars($so['telegram']); ?>" target="_blank" rel="noopener" class="social-icon-btn" title="Telegram" id="hero-telegram">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21.95 5.005l-3.306 15.617c-.25 1.118-.9 1.397-1.825.87l-5-3.688-2.415 2.32c-.267.267-.49.49-.1.49l.356-5.053 9.176-8.29c.4-.356-.088-.554-.619-.198L7.11 14.408l-4.907-1.533c-1.065-.334-1.085-1.065.223-1.577l19.175-7.397c.886-.334 1.661.199 1.35 1.104z"/></svg>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Avatar Side -->
        <div class="hero-visual">
            <div class="avatar-wrapper">
                <div class="avatar-ring"></div>
                <img src="<?php echo $base; ?>/<?php echo htmlspecialchars($profile['avatar'] ?? 'public/avatar.jpg'); ?>"
                     alt="<?php echo htmlspecialchars($profile['name']); ?>"
                     class="avatar-img"
                     id="hero-avatar">
                <span class="avatar-badge">😉Always on, always ready.</span>
            </div>
        </div>
    </div>
</section>

<main>

<!-- ═══════════════ ABOUT ═══════════════ -->
<section id="about">
    <div class="container">
        <div class="about-grid reveal">
            <div class="about-text">
                <div class="section-header">
                    <h2 class="section-title"><?php echo $t['about_title']; ?></h2>
                </div>
                <p><?php echo htmlspecialchars($profile['bio'][$l] ?? ''); ?></p>
                <p><?php echo $l === 'vi'
                    ? 'Tôi tin rằng một giao diện đẹp phải đi kèm trải nghiệm người dùng xuất sắc. Luôn học hỏi, cải tiến và đam mê tạo ra sản phẩm chất lượng.'
                    : 'I believe beautiful design must come with an excellent user experience. Always learning, improving, and passionate about creating quality products.'; ?>
                </p>
                <a href="<?php echo $base; ?>/cv" class="btn btn-primary" style="margin-top: 20px;">
                    <?php echo $t['hero_cv']; ?>
                </a>
            </div>
            <div class="about-stats">
                <div class="stat-card">
                    <div class="stat-num">2+</div>
                    <div class="stat-label"><?php echo $l === 'vi' ? 'Năm kinh nghiệm' : 'Years Experience'; ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">10+</div>
                    <div class="stat-label"><?php echo $l === 'vi' ? 'Dự án hoàn thành' : 'Projects Done'; ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">5+</div>
                    <div class="stat-label"><?php echo $l === 'vi' ? 'Công nghệ thành thạo' : 'Technologies'; ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">100%</div>
                    <div class="stat-label"><?php echo $l === 'vi' ? 'Cam kết chất lượng' : 'Quality Commitment'; ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════ SKILLS ═══════════════ -->
<section id="skills">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="section-title"><?php echo $t['skills_title']; ?></h2>
        </div>
        <div class="skills-grid">
            <?php foreach ($skills as $skill): ?>
            <div class="card skill-card reveal">
                <div class="skill-header">
                    <div class="skill-name">
                        <span class="skill-icon"><?php echo $skill['icon'] ?? ''; ?></span>
                        <span><?php echo htmlspecialchars($skill['name']); ?></span>
                    </div>
                    <span class="skill-pct"><?php echo $skill['level']; ?>%</span>
                </div>
                <div class="progress-track">
                    <div class="progress-fill" data-level="<?php echo $skill['level']; ?>"></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════ EXPERIENCE / CV ═══════════════ -->
<section id="experience" style="background: var(--bg-alt);">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="section-title"><?php echo $t['exp_title']; ?></h2>
        </div>
        <div class="timeline-wrapper">
            <?php foreach ($experiences as $exp): ?>
            <div class="card timeline-item reveal">
                <span class="exp-type <?php echo $exp['type'] === 'education' ? 'edu' : 'work'; ?>">
                    <?php echo $exp['type'] === 'education' ? '🎓 ' . ($l === 'vi' ? 'Học tập' : 'Education') : '💼 ' . ($l === 'vi' ? 'Làm việc' : 'Work'); ?>
                </span>
                <h3 class="exp-title"><?php echo htmlspecialchars($exp['title']); ?></h3>
                <p class="exp-meta">
                    <?php echo htmlspecialchars($exp['company']); ?>
                    &nbsp;|&nbsp;
                    <span><?php echo htmlspecialchars($exp['period']); ?></span>
                </p>
                <p class="exp-desc"><?php echo htmlspecialchars($exp['desc']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div style="margin-top: 40px; text-align: center;">
            <a href="<?php echo $base; ?>/cv" class="btn btn-yellow">
                <?php echo $t['cv_download']; ?>
            </a>
        </div>
    </div>
</section>

<!-- ═══════════════ PROJECTS ═══════════════ -->
<section id="projects">
    <div class="container">
        <div class="projects-header reveal">
            <div>
                <h2 class="section-title"><?php echo $t['projects_title']; ?></h2>
            </div>
        </div>
        <div class="projects-grid" id="projects-grid">
            <?php foreach ($projects as $proj): ?>
            <div class="card project-card project-item reveal">
                <div class="project-thumb">
                    <img src="<?php echo htmlspecialchars($proj['image']); ?>"
                         alt="<?php echo htmlspecialchars($proj['title'][$l] ?? $proj['title']['vi']); ?>"
                         loading="lazy">
                    <div class="project-overlay">
                        <?php if (!empty($proj['demo'])): ?>
                        <a href="<?php echo htmlspecialchars($proj['demo']); ?>" target="_blank" rel="noopener" class="btn btn-yellow btn-sm"><?php echo $t['view_demo']; ?></a>
                        <?php endif; ?>
                        <?php if (!empty($proj['repo'])): ?>
                        <a href="<?php echo htmlspecialchars($proj['repo']); ?>" target="_blank" rel="noopener" class="btn btn-outline btn-sm" style="color:#fff;border-color:rgba(255,255,255,0.4)"><?php echo $t['view_repo']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="project-body">
                    <span class="project-cat"><?php echo htmlspecialchars($proj['category'][$l] ?? $proj['category']['vi'] ?? ''); ?></span>
                    <h3 class="project-name"><?php echo htmlspecialchars($proj['title'][$l] ?? $proj['title']['vi'] ?? ''); ?></h3>
                    <p class="project-desc"><?php echo htmlspecialchars($proj['desc'][$l] ?? $proj['desc']['vi'] ?? ''); ?></p>
                    <div class="project-tags">
                        <?php foreach ($proj['tags'] as $tag): ?>
                        <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <p id="no-results" class="no-results" style="display:none">
            <?php echo $l === 'vi' ? 'Không tìm thấy dự án phù hợp.' : 'No matching projects found.'; ?>
        </p>
    </div>
</section>

<!-- ═══════════════ BLOG ═══════════════ -->
<section id="blog" style="background: var(--bg-alt);">
    <div class="container">
        <div class="section-header reveal" style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:16px;margin-bottom:40px;">
            <div>
                <h2 class="section-title"><?php echo $t['blog_title']; ?></h2>
            </div>
            <a href="<?php echo $base; ?>/blog" class="btn btn-outline"><?php echo $t['view_all']; ?></a>
        </div>
        <div class="blog-grid">
            <?php foreach (array_slice($posts, 0, 3) as $post): ?>
            <a href="<?php echo $base; ?>/blog/<?php echo htmlspecialchars($post['slug']); ?>" class="card post-card reveal" style="display:block;color:inherit;">
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
                    <h3 class="post-title"><?php echo htmlspecialchars($post['title'][$l] ?? ''); ?></h3>
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
    </div>
</section>

<!-- ═══════════════ CONTACT ═══════════════ -->
<section id="contact">
    <div class="container">
        <div class="contact-grid reveal">
            <div class="contact-info">
                <h2 class="section-title"><?php echo $t['contact_title']; ?> <span class="accent">Hưng</span></h2>
                <p><?php echo $t['contact_desc']; ?></p>
                <a href="mailto:<?php echo htmlspecialchars($profile['email'] ?? ''); ?>" class="contact-email" id="contact-email-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <?php echo htmlspecialchars($profile['email'] ?? ''); ?>
                </a>
                <div class="social-grid">
                    <?php if (!empty($so['github'])): ?>
                    <a href="<?php echo htmlspecialchars($so['github']); ?>" target="_blank" rel="noopener" class="social-btn github" id="contact-github">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .3a12 12 0 0 0-3.79 23.4c.6.1.83-.26.83-.57v-2.2c-3.34.72-4.04-1.61-4.04-1.61-.55-1.38-1.34-1.75-1.34-1.75-1.09-.75.08-.73.08-.73 1.2.08 1.83 1.24 1.83 1.24 1.07 1.83 2.8 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.66-.3-5.46-1.33-5.46-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.11-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 6.01 0c2.29-1.55 3.3-1.23 3.3-1.23.65 1.65.24 2.87.12 3.17.77.84 1.23 1.91 1.23 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.68.83.57A12 12 0 0 0 12 .3z"/></svg>
                        GitHub
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($so['linkedin'])): ?>
                    <a href="<?php echo htmlspecialchars($so['linkedin']); ?>" target="_blank" rel="noopener" class="social-btn linkedin" id="contact-linkedin">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                        LinkedIn
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($so['facebook'])): ?>
                    <a href="<?php echo htmlspecialchars($so['facebook']); ?>" target="_blank" rel="noopener" class="social-btn facebook" id="contact-facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        Facebook
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($so['telegram'])): ?>
                    <a href="<?php echo htmlspecialchars($so['telegram']); ?>" target="_blank" rel="noopener" class="social-btn telegram" id="contact-telegram">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21.95 5.005l-3.306 15.617c-.25 1.118-.9 1.397-1.825.87l-5-3.688-2.415 2.32c-.267.267-.49.49-.1.49l.356-5.053 9.176-8.29c.4-.356-.088-.554-.619-.198L7.11 14.408l-4.907-1.533c-1.065-.334-1.085-1.065.223-1.577l19.175-7.397c.886-.334 1.661.199 1.35 1.104z"/></svg>
                        Telegram
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contact-visual">
                <div class="card" style="padding: 40px; text-align: center;">
                    <div style="font-size: 4rem; margin-bottom: 20px;">🚀</div>
                    <h4><?php echo $l === 'vi' ? 'Sẵn sàng hợp tác!' : 'Ready to Collaborate!'; ?></h4>
                    <p><?php echo $l === 'vi'
                        ? 'Tôi luôn mở cửa cho các cơ hội mới – freelance, full-time hoặc dự án thú vị. Hãy liên hệ với tôi!'
                        : 'I\'m always open to new opportunities – freelance, full-time, or exciting projects. Reach out to me!'; ?>
                    </p>
                    <a href="mailto:<?php echo htmlspecialchars($profile['email'] ?? ''); ?>" class="btn btn-primary" style="margin-top: 24px;">
                        <?php echo $t['hero_cta']; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
