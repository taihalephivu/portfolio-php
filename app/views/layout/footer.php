    <!-- ═══════════════ CHAT WIDGET ═══════════════ -->
    <div id="chat-widget">
        <div class="chat-box" id="chat-box">
            <div class="chat-header">
                <span><?php echo $t['chat_title']; ?></span>
                <button class="chat-close" id="chat-close" aria-label="Close chat">×</button>
            </div>
            <div class="chat-messages" id="chat-messages">
                <!-- Messages loaded by JS -->
            </div>
            <div class="chat-footer">
                <input id="chat-name" class="chat-input" type="text" placeholder="<?php echo $t['chat_ph']; ?>" maxlength="40">
                <div class="chat-send-row">
                    <input id="chat-msg" class="chat-input" type="text" placeholder="<?php echo $t['chat_msg_ph']; ?>" maxlength="300">
                    <button class="chat-send-btn" id="chat-send"><?php echo $t['chat_send']; ?></button>
                </div>
            </div>
        </div>
        <button class="chat-toggle" id="chat-toggle" aria-label="Open chat">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            </svg>
        </button>
    </div>

    <!-- ═══════════════ BACK TO TOP ═══════════════ -->
    <button class="back-to-top" id="back-to-top" aria-label="Back to top" title="Back to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"/>
        </svg>
    </button>

    <!-- ═══════════════ FOOTER ═══════════════ -->
    <footer>
        <div class="footer-inner">
            <div class="footer-logo">hungtech.</div>
            <p class="footer-copy"><?php echo $t['footer_copy']; ?></p>
        </div>
    </footer>
    <script src="<?php echo $base; ?>/public/js/script.js?v=<?php echo time(); ?>"></script>
</body>
</html>
