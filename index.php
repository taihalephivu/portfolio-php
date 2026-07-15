<?php
// Bật hiển thị lỗi nếu cần debug (có thể tắt trên production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Bao gồm dữ liệu từ file data.php
require_once 'data.php';

// Trích xuất dữ liệu cho dễ sử dụng
$personal = $portfolioData['personal'];
$skills = $portfolioData['skills'];
$projects = $portfolioData['projects'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | <?php echo htmlspecialchars($personal['name']); ?></title>
    <meta name="description" content="Portfolio của <?php echo htmlspecialchars($personal['name']); ?> - <?php echo htmlspecialchars($personal['role']); ?>">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bg-glow"></div>
    <div class="bg-glow-2"></div>

    <header>
        <div class="container">
            <h1 class="hero-title"><?php echo htmlspecialchars($personal['name']); ?>.</h1>
            <p class="hero-subtitle"><?php echo htmlspecialchars($personal['role']); ?></p>
            <p class="hero-intro"><?php echo htmlspecialchars($personal['intro']); ?></p>
        </div>
    </header>

    <main class="container">
        <!-- SKILLS SECTION -->
        <section id="skills">
            <h2 class="section-title">Kỹ năng nổi bật</h2>
            <div class="skills-grid">
                <?php foreach ($skills as $skill): ?>
                    <div class="skill-card">
                        <div class="skill-name">
                            <span><?php echo htmlspecialchars($skill['name']); ?></span>
                            <span><?php echo $skill['level']; ?>%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" data-level="<?php echo $skill['level']; ?>"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- PROJECTS SECTION -->
        <section id="projects">
            <h2 class="section-title">Dự án tiêu biểu</h2>
            <div class="projects-grid">
                <?php foreach ($projects as $project): ?>
                    <div class="project-card">
                        <div class="project-image-container">
                            <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="project-image" loading="lazy">
                        </div>
                        <div class="project-content">
                            <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="project-desc"><?php echo htmlspecialchars($project['description']); ?></p>
                            <div class="project-tags">
                                <?php foreach ($project['tags'] as $tag): ?>
                                    <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- CONTACT SECTION -->
        <section id="contact">
            <h2 class="section-title">Liên hệ</h2>
            <div class="contact-container">
                <p>Bạn có một ý tưởng dự án hoặc muốn hợp tác? Hãy gửi email cho tôi!</p>
                <a href="mailto:<?php echo htmlspecialchars($personal['email']); ?>" class="contact-email">
                    <?php echo htmlspecialchars($personal['email']); ?>
                </a>
                <div class="social-links">
                    <?php foreach ($personal['socials'] as $platform => $url): ?>
                        <a href="https://<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener noreferrer" class="social-link">
                            <?php echo ucfirst($platform); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($personal['name']); ?>. Xây dựng bằng PHP, HTML & CSS.</p>
    </footer>

    <script>
        // Intersection Observer để kích hoạt hiệu ứng thanh tiến trình (progress bar) khi scroll đến
        document.addEventListener('DOMContentLoaded', () => {
            const progressBars = document.querySelectorAll('.progress');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const level = entry.target.getAttribute('data-level');
                        entry.target.style.width = level + '%';
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            progressBars.forEach(bar => {
                observer.observe(bar);
            });
        });
    </script>
</body>
</html>
