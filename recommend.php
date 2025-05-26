<?php
include("header.php");
include("db_connect.php");

// 랜덤 여행지 1개 불러오기
$sql = "SELECT * FROM places ORDER BY RAND() LIMIT 1";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>여행지 추천</title>
  <link rel="stylesheet" href="css/recommend.css">
</head>
<body>
  <div class="recommend-container">
    <h1>오늘의 랜덤 여행지</h1>

    <?php if ($row): ?>
    <div class="place-card">
      <img src="<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['name']) ?>">
      <h2><?= htmlspecialchars($row['name']) ?></h2>
      <p class="region">[<?= htmlspecialchars($row['region']) ?>]</p>
      <p class="desc"><?= htmlspecialchars($row['description']) ?></p>
    </div>
    <?php endif; ?>

    <div class="btn-box">
      <a href="recommend.php" class="refresh-btn">🔄 다른 여행지 보기</a>
    </div>
  </div>
</body>
</html>
