<div class="admin-topbar">
    <h1>💬 <?php echo $t['admin_chat']; ?></h1>
    <span style="color: #64748B; font-size: 0.85rem;"><?php echo count($messages); ?> <?php echo $lang === 'vi' ? 'tin nhắn' : 'messages'; ?></span>
</div>
<div class="admin-content" style="height: calc(100vh - 73px); display: flex; flex-direction: column; padding: 0;">
    <!-- Messages -->
    <div class="admin-chat-messages" id="admin-chat-msgs">
        <?php foreach ($messages as $msg): ?>
        <div style="display:flex; flex-direction:column; max-width: 75%; align-self: <?php echo ($msg['is_admin'] ?? false) ? 'flex-end; align-items:flex-end' : 'flex-start'; ?>; gap: 4px;">
            <span style="font-size: 0.72rem; color: #64748B;"><?php echo htmlspecialchars($msg['name']); ?> · <?php echo $msg['time']; ?></span>
            <div style="padding: 12px 16px; border-radius: 16px; font-size: 0.9rem; line-height: 1.5;
                <?php echo ($msg['is_admin'] ?? false)
                    ? 'background: linear-gradient(135deg, #1D4ED8, #6D28D9); color: #fff; border-bottom-right-radius: 4px;'
                    : 'background: rgba(255,255,255,0.06); color: #E2E8F0; border: 1px solid rgba(255,255,255,0.08); border-bottom-left-radius: 4px;'; ?>">
                <?php echo htmlspecialchars($msg['message']); ?>
            </div>
        </div>
        <?php endforeach; ?>
        <?php if (empty($messages)): ?>
        <div style="text-align:center; color: #64748B; padding: 40px;"><?php echo $lang === 'vi' ? 'Chưa có tin nhắn nào.' : 'No messages yet.'; ?></div>
        <?php endif; ?>
    </div>

    <!-- Reply form -->
    <form method="POST" action="" style="border-top: 1px solid rgba(255,255,255,0.06);">
        <div class="admin-chat-footer">
            <input type="text" name="message" class="admin-chat-input"
                   placeholder="<?php echo $lang === 'vi' ? 'Nhập phản hồi của bạn...' : 'Type your reply...'; ?>"
                   required autocomplete="off">
            <button type="submit" class="admin-btn admin-btn-primary">
                <?php echo $lang === 'vi' ? 'Gửi' : 'Send'; ?>
            </button>
        </div>
    </form>
</div>
<script>
    // Scroll to bottom
    const msgs = document.getElementById('admin-chat-msgs');
    if (msgs) msgs.scrollTop = msgs.scrollHeight;
</script>
