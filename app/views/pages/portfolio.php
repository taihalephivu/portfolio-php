    <!-- ==================== HERO ==================== -->
    <header id="hero">
        <div class="container hero-content">
            <p class="hero-tag">👋 Hello World!</p>
            <h1 class="hero-title"><?php echo htmlspecialchars($t['hero_title']); ?></h1>
            <p class="hero-subtitle"><?php echo htmlspecialchars($t['hero_subtitle']); ?></p>
            <p class="hero-intro"><?php echo htmlspecialchars($t['hero_desc']); ?></p>
            <a href="#contact" class="btn btn-primary"><?php echo htmlspecialchars($t['nav_contact']); ?></a>
        </div>
    </header>

    <main class="container">

        <!-- ==================== ABOUT ==================== -->
        <section id="about">
            <h2 class="section-title"><?php echo htmlspecialchars($t['about_title']); ?></h2>
            <div class="card about-card">
                <p><?php echo htmlspecialchars($t['about_desc']); ?></p>
            </div>
        </section>

        <!-- ==================== SKILLS ==================== -->
        <section id="skills">
            <h2 class="section-title"><?php echo htmlspecialchars($t['skills_title']); ?></h2>
            <div class="skills-grid">
                <?php foreach ($skills as $skill): ?>
                    <div class="card skill-card">
                        <div class="skill-name">
                            <span><?php echo htmlspecialchars($skill['name']); ?></span>
                            <span class="skill-pct"><?php echo $skill['level']; ?>%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" data-level="<?php echo $skill['level']; ?>"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- ==================== EXPERIENCE ==================== -->
        <section id="experience">
            <h2 class="section-title"><?php echo htmlspecialchars($t['exp_title']); ?></h2>
            <div class="timeline">
                <?php foreach ($experiences as $exp): ?>
                    <div class="card timeline-item">
                        <span class="exp-badge <?php echo $exp['type'] === 'education' ? 'badge-edu' : 'badge-work'; ?>">
                            <?php echo $exp['type'] === 'education' ? '🎓' : '💼'; ?>
                        </span>
                        <h3 class="timeline-title"><?php echo htmlspecialchars($exp['title']); ?></h3>
                        <p class="timeline-meta">
                            <?php echo htmlspecialchars($exp['company']); ?>
                            &nbsp;|&nbsp;
                            <span><?php echo htmlspecialchars($exp['period']); ?></span>
                        </p>
                        <p class="timeline-desc"><?php echo htmlspecialchars($exp['desc']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- ==================== PROJECTS ==================== -->
        <section id="projects">
            <div class="section-header">
                <h2 class="section-title"><?php echo htmlspecialchars($t['projects_title']); ?></h2>
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input id="project-search"
                           type="text"
                           placeholder="<?php echo htmlspecialchars($t['search_ph']); ?>"
                           autocomplete="off">
                </div>
            </div>

            <div class="projects-grid" id="projects-container">
                <?php foreach ($projects as $project): ?>
                    <div class="card project-card project-item">
                        <div class="project-image-container">
                            <img src="<?php echo htmlspecialchars($project['image']); ?>"
                                 alt="<?php echo htmlspecialchars($project['title']); ?>"
                                 class="project-image" loading="lazy">
                        </div>
                        <div class="project-content">
                            <span class="project-category"><?php echo htmlspecialchars($project['category']); ?></span>
                            <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="project-desc"><?php echo htmlspecialchars($project['desc']); ?></p>
                            <div class="project-tags">
                                <?php foreach ($project['tags'] as $tag): ?>
                                    <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <p id="no-results" class="no-results" style="display:none;">
                <?php echo $lang === 'vi' ? 'Không tìm thấy dự án phù hợp.' : 'No matching projects found.'; ?>
            </p>
        </section>

        <!-- ==================== CONTACT ==================== -->
        <section id="contact">
            <h2 class="section-title"><?php echo htmlspecialchars($t['contact_title']); ?></h2>
            <div class="card contact-card">
                <p class="contact-desc"><?php echo htmlspecialchars($t['contact_desc']); ?></p>
                <a href="mailto:hung@example.com" class="contact-email" id="contact-email">
                    hung@example.com
                </a>
                <div class="social-links">
                    <a href="https://fb.com"       target="_blank" rel="noopener noreferrer" class="social-link" id="link-facebook">Facebook</a>
                    <a href="https://github.com"   target="_blank" rel="noopener noreferrer" class="social-link" id="link-github">GitHub</a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-link" id="link-linkedin">LinkedIn</a>
                </div>
            </div>
        </section>

    </main>
