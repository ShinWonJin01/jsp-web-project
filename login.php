<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>로그인</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div id="wrapper">
    <div class="home-link">
		  <a href="home.php">🏠 홈으로</a>
	  </div>

    <h1>로그인</h1>
    <form method="post" action="login_output.php">
      
      <label for="id" class="input-label">아이디</label>
      <input type="text" id="id" name="id" class="input-box" maxlength="20" placeholder="아이디를 입력하세요" required>

      <label for="pw" class="input-label">비밀번호</label>
      <input type="password" id="pw" name="pw" class="input-box" maxlength="20" placeholder="비밀번호를 입력하세요" required>

      <div class="btn_area">
        <button type="submit" id="btnJoin">로그인하기</button>
      </div>

    </form>
  </div>
</body>
</html>
