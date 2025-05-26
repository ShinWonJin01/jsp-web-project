<?php
include("header.php");
include("db_connect.php");

$id = $_SESSION['id'] ?? '';
$sql = "SELECT * FROM member WHERE id = '$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>회원 정보 수정</title>
  <link rel="stylesheet" href="css/member_form.css">
</head>
<body>
  <div class="member-container">
    <h2>회원 정보 수정</h2>
    <form method="post" action="member_update.php">
      <div class="form-group">
        <label for="id">아이디</label>
        <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" readonly>
      </div>

      <div class="form-group">
        <label for="name">이름</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
      </div>

      <div class="form-group">
        <label for="phonenum">휴대폰 번호</label>
        <input type="text" id="phonenum" name="phonenum" value="<?php echo htmlspecialchars($row['phonenum']); ?>" required>
      </div>

      <div class="form-group">
        <label for="email">이메일</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
      </div>

      <div class="form-group">
        <label for="sex">성별</label>
        <select id="sex" name="sex">
          <option value="남자" <?= $row['sex'] === '남자' ? 'selected' : '' ?>>남자</option>
          <option value="여자" <?= $row['sex'] === '여자' ? 'selected' : '' ?>>여자</option>
        </select>
      </div>

      <div class="form-group">
        <label for="current_pw">현재 비밀번호</label>
        <input type="password" id="current_pw" name="current_pw">
    </div>

    <div class="form-group">
        <label for="new_pw1">새 비밀번호</label>
        <input type="password" id="new_pw1" name="new_pw1">
    </div>

    <div class="form-group">
        <label for="new_pw2">새 비밀번호 확인</label>
        <input type="password" id="new_pw2" name="new_pw2">
    </div>

        <button type="submit" class="submit-btn">정보 수정</button>
    </form>
  </div>
</body>
</html>
