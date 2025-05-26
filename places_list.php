<?php
include("header.php");
include("db_connect.php");

$region = $_GET['region'] ?? '';
$sql = "SELECT * FROM places WHERE region = '$region'";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($region) ?> 지역 여행지</title>
  <link rel="stylesheet" href="css/places_list.css">
</head>
<body>
  <div class="region-container">
    <h1><?= htmlspecialchars($region) ?>의 추천 여행지</h1>

    <div class="grid">
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="place-card">
          <img src="<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['name']) ?>">
          <h3><?= htmlspecialchars($row['name']) ?></h3>
          <p><?= htmlspecialchars($row['description']) ?></p>
        </div>
      <?php endwhile; ?>

      <?php if (mysqli_num_rows($result) === 0): ?>
        <p>해당 지역의 여행지가 아직 등록되지 않았습니다.</p>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
