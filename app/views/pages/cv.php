<?php
$l = $lang;
$experiences = $profile['experiences'][$l] ?? [];
?>

<main style="padding-top: 100px; min-height: 80vh;">
    <div class="container" style="max-width: 900px; padding-bottom: 80px;">

        <!-- CV Header -->
        <div class="cv-header reveal">
            <div class="section-tag"><?php echo $t['cv_title']; ?></div>
            <h1 class="section-title"><?php echo htmlspecialchars($l === 'vi' ? $profile['name'] : $profile['name_en']); ?></h1>
            <p style="color: var(--text-2); font-size: 1.1rem; margin: 10px 0 20px;">
                <?php echo htmlspecialchars($profile['title'][$l] ?? ''); ?>
            </p>
            <p style="color: var(--text-2); margin-bottom: 24px;">
                📧 <?php echo htmlspecialchars($profile['email'] ?? ''); ?>
            </p>
            <a href="<?php echo $base; ?>/<?php echo htmlspecialchars($profile['cv_file'] ?? '#'); ?>"
               download
               class="btn btn-yellow cv-download-btn">
                <?php echo $t['cv_download']; ?>
            </a>
        </div>

        <!-- Experience Timeline -->
        <div class="section-header reveal" style="margin-top: 60px; margin-bottom: 30px;">
            <h2 class="section-title"><?php echo $t['exp_title']; ?></h2>
        </div>

        <div class="timeline-wrapper">
            <?php foreach ($experiences as $exp): ?>
            <div class="card timeline-item reveal">
                <span class="exp-type <?php echo $exp['type'] === 'education' ? 'edu' : 'work'; ?>">
                    <?php echo $exp['type'] === 'education'
                        ? '🎓 ' . ($l === 'vi' ? 'Học tập' : 'Education')
                        : '💼 ' . ($l === 'vi' ? 'Làm việc' : 'Work'); ?>
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

        <!-- Skills -->
        <div class="section-header reveal" style="margin-top: 60px; margin-bottom: 30px;">
            <h2 class="section-title"><?php echo $t['skills_title']; ?></h2>
        </div>
        <div class="skills-grid">
            <?php foreach ($profile['skills'] ?? [] as $skill): ?>
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

        <!-- Bottom CTA -->
        <div style="margin-top: 60px; text-align:center; display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
            <a href="<?php echo $base; ?>/<?php echo htmlspecialchars($profile['cv_file'] ?? '#'); ?>" download class="btn btn-yellow">
                <?php echo $t['cv_download']; ?>
            </a>
            <a href="<?php echo $base; ?>/#contact" class="btn btn-primary">
                <?php echo $t['hero_cta']; ?>
            </a>
        </div>
    </div>
</main>
