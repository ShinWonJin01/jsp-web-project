<?php
include("header.php");
include("db_connect.php");

$idx = $_GET['idx'] ?? 0;
$mode = $_GET['mode'] ?? 'rv';
$user_id = $_SESSION['id'] ?? '';

$sql = "SELECT * FROM message WHERE idx = $idx";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

// 보안: 자신의 쪽지만 조회 가능
if ($mode === 'rv' && $row['rv_id'] !== $user_id) {
  echo "<script>alert('수신 쪽지만 열람 가능합니다.'); history.back();</script>";
  exit;
}
if ($mode === 'send' && $row['send_id'] !== $user_id) {
  echo "<script>alert('송신 쪽지만 열람 가능합니다.'); history.back();</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>쪽지 보기</title>
  <link rel="stylesheet" href="css/message_view.css">
</head>
<body>
  <div class="message-view-container">
    <h2>쪽지 내용 보기</h2>
    <div class="view-box">
      <p><strong>제목:</strong> <?php echo htmlspecialchars($row['subject']); ?></p>
      <p><strong><?php echo ($mode === 'send') ? '받는 사람' : '보낸 사람'; ?>:</strong> <?php echo htmlspecialchars(($mode === 'send') ? $row['rv_id'] : $row['send_id']); ?></p>
      <p><strong>보낸 날짜:</strong> <?php echo $row['reg_date']; ?></p>
      <hr>
      <div class="content-box">
        <?php echo nl2br(htmlspecialchars($row['content'])); ?>
      </div>
    </div>
    <div class="btn-box">
      <a href="message_box.php?mode=<?php echo $mode; ?>" class="back-btn">목록으로</a>
    </div>
  </div>
</body>
</html>
