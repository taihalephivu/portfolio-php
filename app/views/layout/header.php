<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang); ?>" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' | hungtech' : 'Hưng – Software Engineer & Portfolio'; ?></title>
    <meta name="description" content="Portfolio cá nhân của Hưng – Software Engineer & UI/UX Designer. Dự án, bài viết và thông tin liên hệ.">
    <meta property="og:title" content="hungtech Portfolio">
    <meta property="og:description" content="Software Engineer & UI/UX Designer">
    <meta name="theme-color" content="#1E40AF">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?php echo $base; ?>/public/css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Background Glows -->
    <div class="bg-glow bg-glow-1"></div>
    <div class="bg-glow bg-glow-2"></div>

    <!-- ═══════════════ NAVBAR ═══════════════ -->
    <nav class="navbar" id="navbar">
        <div class="container nav-container">
            <!-- Logo -->
            <a href="<?php echo $base; ?>/" class="logo">hungtech.</a>

            <!-- Nav Links -->
            <ul class="nav-links" id="nav-links">
                <li><a href="<?php echo $base; ?>/#hero"       id="nav-home"><?php echo $t['nav_home']; ?></a></li>
                <li><a href="<?php echo $base; ?>/#projects"   id="nav-projects"><?php echo $t['nav_projects']; ?></a></li>
                <li><a href="<?php echo $base; ?>/blog"        id="nav-blog"><?php echo $t['nav_blog']; ?></a></li>
                <li><a href="<?php echo $base; ?>/#about"      id="nav-about"><?php echo $t['nav_about']; ?></a></li>
                <li><a href="<?php echo $base; ?>/cv"          id="nav-cv"><?php echo $t['nav_cv']; ?></a></li>
                <li><a href="<?php echo $base; ?>/#contact"    id="nav-contact"><?php echo $t['nav_contact']; ?></a></li>
            </ul>

            <!-- Controls -->
            <div class="nav-controls">
                <div class="nav-search-wrapper">
                    <div class="search-box nav-search-box">
                        <span class="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        </span>
                        <input type="text" id="nav-search-input" placeholder="<?php echo htmlspecialchars($t['search_ph'] ?? 'Search...'); ?>" autocomplete="off">
                    </div>
                    <div id="nav-search-results" class="nav-search-results"></div>
                </div>

                <!-- Theme toggle -->
                <button id="theme-toggle" class="control-btn" aria-label="Toggle theme" title="Toggle theme">
                    <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                    <svg id="icon-sun"  xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                </button>

                <!-- Language switch -->
                <div class="lang-switch">
                    <a href="?lang=vi" class="<?php echo $lang === 'vi' ? 'active' : ''; ?>" id="lang-vi">VI</a>
                    <span>|</span>
                    <a href="?lang=en" class="<?php echo $lang === 'en' ? 'active' : ''; ?>" id="lang-en">EN</a>
                </div>

                <!-- Mobile hamburger -->
                <button class="hamburger" id="hamburger" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>
