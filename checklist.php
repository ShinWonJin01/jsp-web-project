<?php
include("header.php");
include("db_connect.php");

$member_id = $_SESSION['id'] ?? 'guest';

// 항목 추가
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item'])) {
  $item = trim($_POST['item']);
  if ($item !== '') {
    $stmt = mysqli_prepare($connect, "INSERT INTO travel_checklist (member_id, item) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $member_id, $item);
    mysqli_stmt_execute($stmt);
  }
}

// 완료 토글
if (isset($_GET['toggle'])) {
  $id = (int) $_GET['toggle'];
  mysqli_query($connect, "UPDATE travel_checklist SET is_done = NOT is_done WHERE id = $id AND member_id = '$member_id'");
}

// 삭제
if (isset($_GET['delete'])) {
  $id = (int) $_GET['delete'];
  mysqli_query($connect, "DELETE FROM travel_checklist WHERE id = $id AND member_id = '$member_id'");
}

$result = mysqli_query($connect, "SELECT * FROM travel_checklist WHERE member_id = '$member_id' ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>여행 체크리스트</title>
  <link rel="stylesheet" href="css/checklist.css">
</head>
<body>
  <div class="checklist-container">
    <h1>🧳 나만의 여행 체크리스트</h1>

    <form method="post" action="">
      <input type="text" name="item" placeholder="준비물을 입력하세요" required>
      <button type="submit">추가</button>
    </form>

    <ul class="checklist">
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <li class="<?= $row['is_done'] ? 'done' : '' ?>">
          <a href="?toggle=<?= $row['id'] ?>" class="toggle">✔</a>
          <span><?= htmlspecialchars($row['item']) ?></span>
          <a href="?delete=<?= $row['id'] ?>" class="delete">🗑</a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
</body>
</html>
