<?php
include("header.php");
include("db_connect.php");

// 게시글 목록 불러오기
$sql = "SELECT * FROM board ORDER BY idx DESC";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>게시판</title>
  <link rel="stylesheet" href="css/board.css">
</head>
<body>
  <div class="list-container">
    <h2>게시판</h2>
    <table class="board-table">
      <colgroup>
        <col style="width: 10%;">
        <col style="width: 40%;">
        <col style="width: 15%;">
        <col style="width: 20%;">
        <col style="width: 15%;">
      </colgroup>
      <thead>
        <tr>
          <th>번호</th>
          <th>제목</th>
          <th>작성자</th>
          <th>작성일</th>
          <th>첨부</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $number = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
          $idx = $number--;
          $subject = htmlspecialchars($row['subject']);
          $name = htmlspecialchars($row['name']);
          $date = substr($row['created_at'], 0, 10);  // 예: 2024-05-25
          $hasFile = $row['upfile'] ? "O" : "X";
          echo "
          <tr>
            <td>$idx</td>
            <td><a href=\"board_view.php?id={$row['idx']}\">$subject</a></td>
            <td>$name</td>
            <td>$date</td>
            <td>$hasFile</td>
          </tr>";
        }

        if (mysqli_num_rows($result) == 0) {
          echo "<tr><td colspan='5'>등록된 게시글이 없습니다.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <div class="write-button-box">
      <a href="board_write.php" class="write-btn">작성하기</a>
    </div>
  </div>
</body>
</html>
