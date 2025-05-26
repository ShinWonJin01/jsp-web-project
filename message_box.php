<?php
include("header.php");
include("db_connect.php");

$mode = $_GET['mode'] ?? 'rv'; // 'rv' = 받은 쪽지, 'send' = 보낸 쪽지
$user_id = $_SESSION['id'] ?? '';

if ($mode === 'send') {
    $sql = "SELECT * FROM message WHERE send_id = '$user_id' ORDER BY reg_date DESC";
    $title = "송신 쪽지함";
} else {
    $sql = "SELECT * FROM message WHERE rv_id = '$user_id' ORDER BY reg_date DESC";
    $title = "수신 쪽지함";
}

$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="css/message_box.css">
</head>
<body>
  <div class="message-box-container">
    <h2><?php echo $title; ?></h2>
    <div class="message-links">
      <a href="message_box.php?mode=rv">▶ 수신 쪽지함</a>
      <a href="message_box.php?mode=send">▶ 송신 쪽지함</a>
    </div>
    <table class="message-table">
      <thead>
        <tr>
          <th>번호</th>
          <th><?php echo ($mode === 'send') ? '받는 사람' : '보낸 사람'; ?></th>
          <th>제목</th>
          <th>날짜</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $count = mysqli_num_rows($result);
        if ($count > 0):
          while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
          <td><?php echo $count--; ?></td>
          <td><?php echo htmlspecialchars(($mode === 'send') ? $row['rv_id'] : $row['send_id']); ?></td>
          <td>
            <a href="message_view.php?idx=<?php echo $row['idx']; ?>&mode=<?php echo $mode; ?>">
              <?php echo htmlspecialchars($row['subject']); ?>
            </a>
          </td>
          <td><?php echo substr($row['reg_date'], 0, 16); ?></td>
        </tr>
        <?php endwhile; else: ?>
        <tr><td colspan="4">쪽지가 없습니다.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
