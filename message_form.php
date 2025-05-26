<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>쪽지 보내기</title>
  <link rel="stylesheet" href="css/message_form.css">
</head>
<body>
  <div class="message-container">
    <h2>📨 쪽지 보내기</h2>

    <div class="message-links">
      <a href="message_box.php?mode=rv">▶ 수신 쪽지함</a>
      <a href="message_box.php?mode=send">▶ 송신 쪽지함</a>
    </div>

    <form method="post" action="write_action2.php">
      <div class="form-group">
        <label for="send_id">보내는 사람</label>
        <input type="text" id="send_id" name="send_id" value="<?php echo $_SESSION['id'] ?? ''; ?>" readonly>
      </div>

      <div class="form-group">
        <label for="rv_id">수신 아이디</label>
        <input type="text" id="rv_id" name="rv_id" required>
      </div>

      <div class="form-group">
        <label for="subject">제목</label>
        <input type="text" id="subject" name="subject" required>
      </div>

      <div class="form-group">
        <label for="content">내용</label>
        <textarea id="content" name="content" rows="10" required></textarea>
      </div>

      <div class="form-actions">
        <button type="submit">보내기</button>
      </div>
    </form>
  </div>
</body>
</html>
