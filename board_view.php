<?php
include("header.php");
include("db_connect.php");

$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM board WHERE idx = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>게시글 상세보기</title>
  <link rel="stylesheet" href="css/board_view.css">
</head>
<body>
  <div class="view-container">
    <h2>게시글 상세보기</h2>
    <?php if ($row): ?>
      <div class="form-group">
        <label>제목</label>
        <p><?php echo htmlspecialchars($row['subject']); ?></p>
      </div>
      <div class="form-group">
        <label>작성자</label>
        <p><?php echo htmlspecialchars($row['name']); ?></p>
      </div>
      <div class="form-group">
        <label>내용</label>
        <div class="content-box">
          <?php echo nl2br(htmlspecialchars($row['content'])); ?>
        </div>
      </div>
      <?php if ($row['upfile']): ?>
        <div class="form-group">
          <label>첨부파일</label>
          <a href="uploads/<?php echo $row['upfile']; ?>" download><?php echo $row['upfile']; ?></a>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <p>존재하지 않는 게시글입니다.</p>
    <?php endif; ?>

    <div class="btn-box">
      <a href="board.php" class="write-btn">목록으로</a>
    </div>
  </div>
</body>
</html>
