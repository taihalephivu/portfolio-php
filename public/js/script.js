/**
 * hungtech Portfolio – Main JavaScript
 * Features: Theme toggle, Scroll reveal, Skill progress, Project search, Chat widget, Hamburger menu
 */
// Detect base URL from script path before DOMContentLoaded
const _scriptSrc = document.currentScript?.src || '';
const _baseUrl   = _scriptSrc.split('/public')[0] || '';

document.addEventListener('DOMContentLoaded', () => {

    // ─────────────────────────────────────────────────────────────────────────
    // 1. DARK / LIGHT THEME TOGGLE
    // ─────────────────────────────────────────────────────────────────────────
    const themeBtn = document.getElementById('theme-toggle');
    const moonIcon = document.getElementById('icon-moon');
    const sunIcon  = document.getElementById('icon-sun');
    const html     = document.documentElement;

    const savedTheme = localStorage.getItem('theme') || 'dark';
    applyTheme(savedTheme);

    themeBtn?.addEventListener('click', () => {
        const current = html.getAttribute('data-theme');
        applyTheme(current === 'dark' ? 'light' : 'dark');
    });

    function applyTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        if (moonIcon && sunIcon) {
            moonIcon.style.display = theme === 'dark' ? 'block' : 'none';
            sunIcon.style.display  = theme === 'light' ? 'block' : 'none';
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // 2. HAMBURGER MOBILE MENU
    // ─────────────────────────────────────────────────────────────────────────
    const hamburger = document.getElementById('hamburger');
    const navLinks  = document.getElementById('nav-links');

    hamburger?.addEventListener('click', () => {
        navLinks?.classList.toggle('mobile-open');
    });

    // Close menu when a link is clicked
    navLinks?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => navLinks.classList.remove('mobile-open'));
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 3. NAVBAR: scroll shadow + active link highlight + Back to Top
    // ─────────────────────────────────────────────────────────────────────────
    const navbar = document.getElementById('navbar');
    const backToTop = document.getElementById('back-to-top');

    window.addEventListener('scroll', () => {
        if (navbar) {
            navbar.style.boxShadow = window.scrollY > 20
                ? '0 4px 20px rgba(0,0,0,0.15)'
                : 'none';
        }
        // Show/hide back-to-top button
        if (backToTop) {
            backToTop.classList.toggle('visible', window.scrollY > 300);
        }
        highlightNavLink();
    }, { passive: true });

    // Back to top – smooth scroll
    backToTop?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    function highlightNavLink() {
        const isHome = document.getElementById('hero') !== null;
        const path = window.location.pathname;
        
        if (!isHome) {
            // Subpage logic (Blog, CV)
            document.querySelectorAll('.nav-links a').forEach(a => {
                const href = a.getAttribute('href') || '';
                // Check if the link points to the current path (e.g., /blog)
                const isActive = href.includes(path);
                a.classList.toggle('active', isActive);
            });
            return;
        }

        // Homepage scroll spy
        const sections = document.querySelectorAll('section[id], header[id]');
        let current = '';
        sections.forEach(sec => {
            if (window.scrollY >= sec.offsetTop - 120) current = sec.id;
        });
        
        document.querySelectorAll('.nav-links a').forEach(a => {
            if (current) {
                a.classList.toggle('active', a.getAttribute('href')?.includes('#' + current));
            } else {
                a.classList.remove('active');
            }
        });
        // If at very top, highlight first item
        if (!current && window.scrollY < 100) {
            const firstNav = document.querySelector('.nav-links a');
            if (firstNav) firstNav.classList.add('active');
        }
    }
    
    // Call once on load
    highlightNavLink();

    // ─────────────────────────────────────────────────────────────────────────
    // 4. SCROLL REVEAL
    // ─────────────────────────────────────────────────────────────────────────
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

    // ─────────────────────────────────────────────────────────────────────────
    // 5. SKILL PROGRESS BARS – animate on scroll
    // ─────────────────────────────────────────────────────────────────────────
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const fill = entry.target;
                fill.style.width = (fill.dataset.level || 0) + '%';
            } else {
                entry.target.style.width = '0%';
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll('.progress-fill').forEach(bar => progressObserver.observe(bar));


    // ─────────────────────────────────────────────────────────────────────────
    // 7. CHAT WIDGET
    // ─────────────────────────────────────────────────────────────────────────
    const chatToggle   = document.getElementById('chat-toggle');
    const chatBox      = document.getElementById('chat-box');
    const chatClose    = document.getElementById('chat-close');
    const chatMessages = document.getElementById('chat-messages');
    const chatName     = document.getElementById('chat-name');
    const chatMsg      = document.getElementById('chat-msg');
    const chatSend     = document.getElementById('chat-send');

    // Use global base URL detected outside DOMContentLoaded
    const baseUrl = _baseUrl;

    chatToggle?.addEventListener('click', () => {
        chatBox?.classList.toggle('open');
        if (chatBox?.classList.contains('open')) {
            loadChatMessages();
        }
    });

    chatClose?.addEventListener('click', () => chatBox?.classList.remove('open'));

    chatSend?.addEventListener('click', sendMessage);
    chatMsg?.addEventListener('keydown', e => { if (e.key === 'Enter') sendMessage(); });

    function loadChatMessages() {
        fetch(baseUrl + '/api/chat/messages')
            .then(r => r.json())
            .then(msgs => renderMessages(msgs))
            .catch(() => {});
    }

    function renderMessages(msgs) {
        if (!chatMessages) return;
        chatMessages.innerHTML = '';
        if (!msgs.length) {
            chatMessages.innerHTML = '<p style="text-align:center; color: var(--text-3); font-size:0.85rem; padding: 20px;">👋 Hãy gửi tin nhắn!</p>';
            return;
        }
        msgs.forEach(msg => {
            const isAdmin = msg.is_admin;
            const div = document.createElement('div');
            div.className = 'chat-msg ' + (isAdmin ? 'admin' : 'visitor');
            div.innerHTML = `
                <span class="chat-msg-name">${escHtml(msg.name)} · ${msg.time}</span>
                <div class="chat-bubble">${escHtml(msg.message)}</div>
            `;
            chatMessages.appendChild(div);
        });
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function sendMessage() {
        const name = chatName?.value.trim() || 'Visitor';
        const message = chatMsg?.value.trim();
        if (!message) return;

        fetch(baseUrl + '/api/chat/send', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name, message }),
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                if (chatMsg) chatMsg.value = '';
                loadChatMessages();
            }
        })
        .catch(() => {});
    }

    function escHtml(str) {
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // 8. COUNTER ANIMATION (Stats)
    // ─────────────────────────────────────────────────────────────────────────
    const statNums = document.querySelectorAll('.stat-num');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.dataset.animated) {
                entry.target.dataset.animated = 'true';
                // Simple pop-in effect
                entry.target.style.transform = 'scale(0.8)';
                entry.target.style.transition = 'transform 0.4s cubic-bezier(0.34,1.56,0.64,1)';
                requestAnimationFrame(() => {
                    entry.target.style.transform = 'scale(1)';
                });
            }
        });
    }, { threshold: 0.5 });
    statNums.forEach(el => counterObserver.observe(el));

    // ─────────────────────────────────────────────────────────────────────────
    // 9. SMOOTH SCROLL for anchor links
    // ─────────────────────────────────────────────────────────────────────────
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    // ─────────────────────────────────────────────────────────────────────────
    // 10. TYPEWRITER EFFECT FOR HERO NAME
    // ─────────────────────────────────────────────────────────────────────────
    const heroName = document.querySelector('.hero-name');
    if (heroName) {
        const text = heroName.textContent.trim();
        heroName.textContent = '';
        let i = 0;
        function typeWriter() {
            if (i < text.length) {
                heroName.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, Math.random() * 50 + 80); // random delay between 80-130ms for natural feel
            }
        }
        setTimeout(typeWriter, 500); // Start after fadeUp animation
    }

    // ─────────────────────────────────────────────────────────────────────────
    // 11. NAV GLOBAL SEARCH
    // ─────────────────────────────────────────────────────────────────────────
    const navSearchInput = document.getElementById('nav-search-input');
    const navSearchResults = document.getElementById('nav-search-results');
    
    if (navSearchInput && navSearchResults) {
        let debounceTimer;
        
        navSearchInput.addEventListener('input', (e) => {
            clearTimeout(debounceTimer);
            const query = e.target.value.trim();
            
            if (query.length === 0) {
                navSearchResults.classList.remove('active');
                navSearchResults.innerHTML = '';
                return;
            }
            
            debounceTimer = setTimeout(() => {
                fetch(`${_baseUrl}/api/search?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        navSearchResults.innerHTML = '';
                        navSearchResults.classList.add('active');
                        
                        let total = (data.projects?.length || 0) + (data.posts?.length || 0) + (data.others?.length || 0);
                        
                        if (total === 0) {
                            navSearchResults.innerHTML = '<div class="search-no-results">Không tìm thấy kết quả.</div>';
                            return;
                        }
                        
                        const renderItem = (item) => {
                            let typeLabel = '';
                            if (item.type === 'project') typeLabel = 'Dự án';
                            else if (item.type === 'post') typeLabel = 'Bài viết';
                            else if (item.type === 'section') typeLabel = 'Mục trang';
                            else if (item.type === 'skill') typeLabel = 'Kỹ năng';
                            else if (item.type === 'experience') typeLabel = 'Kinh nghiệm';
                            
                            let url = item.url;
                            // API already returns subfolder-aware URLs
                            // Only prepend base for URLs starting with / that don't already include it
                            if (url.startsWith('/') && !url.startsWith(_baseUrl)) {
                                url = _baseUrl + url;
                            }

                            return `
                            <a href="${url}" class="search-result-item">
                                <span class="search-result-title">${escHtml(item.title)}</span>
                                <span class="search-result-type">${typeLabel}</span>
                            </a>
                            `;
                        };
                        
                        let html = '';
                        if (data.others?.length) {
                            data.others.forEach(p => { html += renderItem(p); });
                        }
                        if (data.projects?.length) {
                            data.projects.forEach(p => { html += renderItem(p); });
                        }
                        if (data.posts?.length) {
                            data.posts.forEach(p => { html += renderItem(p); });
                        }
                        
                        navSearchResults.innerHTML = html;
                    })
                    .catch(err => console.error('Search error:', err));
            }, 300);
        });
        
        // Hide when clicking outside
        document.addEventListener('click', (e) => {
            if (!navSearchInput.contains(e.target) && !navSearchResults.contains(e.target)) {
                navSearchResults.classList.remove('active');
            }
        });
        
        // Show again when focused if there's text
        navSearchInput.addEventListener('focus', () => {
            if (navSearchInput.value.trim().length > 0 && navSearchResults.innerHTML !== '') {
                navSearchResults.classList.add('active');
            }
        });
    }

});
