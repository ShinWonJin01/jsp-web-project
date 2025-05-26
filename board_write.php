<?php // board_write.php - 게시글 작성 폼
include("header.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>게시판 글쓰기</title>
  <link rel="stylesheet" href="css/board_write.css">
</head>
<body>
  <div class="form-container">
    <h2>게시판 글쓰기</h2>
    <form method="post" action="write_action.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">작성자</label>
        <input type="text" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="title">제목</label>
        <input type="text" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="content">내용</label>
        <textarea id="content" name="content" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label for="upfile">첨부 파일</label>
        <input type="file" id="upfile" name="upfile">
      </div>
      <button type="submit" class="submit-btn">작성</button>
    </form>
  </div>
</body>
</html>