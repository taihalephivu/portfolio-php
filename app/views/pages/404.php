<main style="padding-top: 100px; min-height: 80vh; display:flex; align-items:center; justify-content:center;">
    <div style="text-align:center; padding: 60px 24px;">
        <div style="font-size: 6rem; margin-bottom: 20px;">🌀</div>
        <h1 class="section-title" style="font-size: 5rem; margin-bottom: 16px;">
            <span class="accent">404</span>
        </h1>
        <p style="font-size: 1.2rem; color: var(--text-2); margin-bottom: 32px;">
            <?php echo $t['404_desc'] ?? 'Page not found.'; ?>
        </p>
        <a href="<?php echo $base; ?>/" class="btn btn-primary">
            <?php echo $t['404_back'] ?? '← Back to Home'; ?>
        </a>
    </div>
</main>
